<?php
//phpinfo();exit;
date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');

//php index.php test 20190301 20190304
//php index.php product 20190301 20190304
$todayTime = date("Y-m-d", time());
$dateStart = isset($argv[2]) ? ($argv[2]) : $todayTime;//date("Y-m-d", strtotime("-1 day"));
$dateEnd = isset($argv[3]) ? $argv[3] : date("Y-m-d", strtotime("+1 day"));
$userIds = isset($argv[4]) ? $argv[4] : '';
$env = isset($argv[1]) ? $argv[1] : '';

//时间判断
if (!$dateStart || !$dateEnd) {
    echo "请输入时间";
    return false;
}
$dateStartInt = strtotime($dateStart);
$dateEndInt = strtotime($dateEnd);
if ($dateStartInt >= $dateEndInt) {
    echo '时间输入有误';
    return false;
}
if ($dateEndInt > strtotime($todayTime)) {
//    echo '截至日期不能超过今天';
//    return false;
}

$conn = dbconn($env); //数据库连接
//用户列表
$userSql = "SELECT * from mx_user where status = 1 ";
$userIds && $userSql = $userSql . " WHERE user_id in ({$userIds}) ";
$userQuery = $conn->query($userSql);
$userList = $userQuery->fetchAll(PDO::FETCH_ASSOC);

//循环每个用户
foreach ($userList as $userInfo) {
    //按照每天统计
    if(!$userInfo || !$userInfo['role_id'] || !$userInfo['user_id']){
        continue;
    }
    $dataList = [];
    $userRoleId = $userInfo['role_id'];
    $userName = $userInfo['full_name'] ? $userInfo['full_name'] : $userInfo['name'];
    $userId = $userInfo['user_id'];
    $depInfo = userDepartment($userId, $conn);
    echo "userId: {$userId} ";
    $dateStartInt = strtotime($dateStart); //初始还开始日期

    while ($dateStartInt < $dateEndInt) {
        $data = [];
        $data['user_id'] = $userId;
        $data['user_role_id'] = $userRoleId;
        $data['user_name'] = $userName;
        $data['department'] = isset($depInfo['name']) ? $depInfo['name'] : '';
        $data['department_id'] = isset($depInfo['department_id']) ? $depInfo['department_id'] : 0;
        $reportTime = date('Y-m-d', $dateStartInt);
        $data['report_date'] = $reportTime;
        $data['create_time'] = time();
        $nextDayInt = $dateStartInt + 3600 * 24; //第二天
        echo "date: {$reportTime} " . PHP_EOL;
        //检查是否同步过
        if (checkExist($userId, $reportTime, $conn)) {
//            $dateStartInt = $nextDayInt; //时间+1天
            $mode = 2; // update
            $where = ['eq'=>['user_id' => $userId,'report_date' => $reportTime] ];
//            continue;
        } else {
            $mode = 1;//insert
            $where = [];
        }

        //1、业绩统计
        $data['integral'] = achievementNum($userId, $dateStartInt, $nextDayInt, $conn);
        //2、绩效统计
        //3、新增客户
        $data['customer_num'] = customerCount($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //4、新增项目
        $data['project_num'] = projectNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //5、新增简历
        $data['resume_num'] = resumeNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //6、推荐人员
        $data['fine_project_num'] = fineProjectNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //7、面试人数
        $interviewNum = interviewNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        $data['interview_num'] = isset($interviewNum['countPerson']) ? $interviewNum['countPerson'] : 0;
        //8、面试次数
        $data['interviewt_num'] = isset($interviewNum['countTimes']) ? $interviewNum['countTimes'] : 0;
        //9、offer统计
        $data['offer_num'] = offerNum($userRoleId, $dateStartInt, $nextDayInt, $conn);

        //10、offer挂掉统计
        $data['offerd_num'] = offeredNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //11、入职统计
        $data['enter_num'] = enterNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //12、过保数
        $data['safe_num'] = safeNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //13、到场数
        $data['present_num'] = presentNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //14、回款数
        $data['hk_num'] = hkNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //15、新增bd数
        $data['bd_num'] = bdNum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //16、加入callist数量
        $data['callist_num'] = callistnum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        //17、cc备注
        $data['cc_num'] = ccnum($userRoleId, $dateStartInt, $nextDayInt, $conn);
        $dateStartInt = $nextDayInt; //时间+1天

        if($mode == 1){
            $dataList[] = $data;
        } else {
            saveData($data, $conn ,2,$where); //更新
        }
    }
    
    if (!$dataList && empty($dataList)) {
        continue;
    }
    if (!saveData($dataList, $conn ,1, [])) {
        echo "{$userName} data save error" . PHP_EOL;
    }
    echo "{$userName} SUCCESS" . PHP_EOL;
}
echo "all USER data SUCCESS" . PHP_EOL;

/**
 * 检查是否同步过数据
 * @param  [type] $userId [description]
 * @param  [type] $date   [description]
 * @return [type]         [description]
 */
function checkExist($userId, $date, $conn)
{
    $table = 'mx_report_intergral';
    $sql = "SELECT * from {$table} where user_id = {$userId} and report_date = '{$date}'";
    $query = $conn->query($sql);
    $info = $query->fetch(PDO::FETCH_ASSOC);
    return isset($info['id']);
}

/**
 * 保存绩效数据
 * @param  [type] $data [description]
 * @param  [type] $conn [description]
 * @return [type]       [description]
 */
function saveData($data, $conn, $mode,$where = []) {
    $table = 'mx_report_intergral';
    try{
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conn->beginTransaction();
        $connMake = new sqlMaker($conn, array('tableName' => $table));
        $res = false;
        if ($mode == 1) {
            $sql = $connMake->insertRows($data);
            $res = $conn->exec($sql);
        } elseif($mode == 2) {
            $sql = $connMake->updateRow(['data' => $data,'where' => $where]);
            $res =  $conn->exec($sql);
        }
        $conn->commit();
        return $res;
    }catch(Exception $e){
        $conn->rollBack();
        echo "Failed: " . $e->getMessage();
    }
}

/**
 * 到场数量
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function presentNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    return 0;
}

/**
 * callist数量
 * @param $userRoleId
 * @param $dateStartInt
 * @param $nextDayInt
 * @param $conn
 * @return int
 */
function callistnum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $sql = "SELECT count(*) as counts FROM {$tableProject} where addtime >= {$dateStartInt} and addtime <= {$nextDayInt} and tracker = {$userRoleId}";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * cc备注数量
 * @param $userRoleId
 * @param $dateStartInt
 * @param $nextDayInt
 * @param $conn
 * @return int
 */
function ccnum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_cc';
    $sql = "SELECT count(*) as counts FROM {$tableProject} as pro , {$tableInterview} as enter where enter.fine_id = pro.id and enter.role_id = {$userRoleId} and  enter.addtime >= {$dateStartInt} and enter.addtime <= {$nextDayInt} ";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * 过保数量
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function safeNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_safe';
    $sql = "SELECT count(distinct(pro.resume_id)) as counts FROM {$tableProject} as pro , {$tableInterview} as enter where enter.fine_id = pro.id and pro.tracker = {$userRoleId} and  enter.addtime >= {$dateStartInt} and enter.addtime < {$nextDayInt} ";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * offer pass掉人次
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function enterNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_enter';
    $sql = "SELECT count(distinct(pro.resume_id)) as counts FROM {$tableProject} as pro , {$tableInterview} as enter where enter.fine_id = pro.id and enter.role_id = {$userRoleId} and  enter.addtime >= {$dateStartInt} and enter.addtime < {$nextDayInt} ";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * offer pass掉人次
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function offeredNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_bhs';
    $sql = "SELECT count(distinct(pro.resume_id)) as counts FROM {$tableProject} as pro , {$tableInterview} as bhs where bhs.fine_id = pro.id and bhs.role_id = {$userRoleId} and bhs.status=6 and bhs.addtime >= {$dateStartInt} and bhs.addtime < {$nextDayInt}";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }

}

/**
 * offer人次
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function offerNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_offer';
    $sql = "SELECT count(distinct(pro.resume_id)) as counts FROM {$tableProject} as pro , {$tableInterview} as offer where offer.fine_id = pro.id and offer.role_id = {$userRoleId} and offer.addtime >= {$dateStartInt} and offer.addtime < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }

}

/**
 * 面试人数/人次
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function interviewNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $tableProject = 'mx_fine_project';
    $tableInterview = 'mx_fine_project_interview';
    $sql = "SELECT count(distinct(pro.resume_id)) as countPerson,count(*) as countTimes FROM {$tableProject} as pro , {$tableInterview} as vie where vie.fine_id = pro.id and vie.role_id = {$userRoleId} and vie.addtime >= {$dateStartInt} and vie.addtime < {$nextDayInt} ";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info;
    } else {
        return 0;
    }

}

/**
 * 新增BD数量
 * @param  [type] $create_role_id   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function bdNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_contract';
    $sql = "SELECT count(*) as counts from {$table} where creator_role_id = {$userRoleId} and create_time >= {$dateStartInt} and create_time < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}


/**
 * 新增回款数量
 * @param  [type] $create_role_id   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function hkNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_invoice';
    $sql = "SELECT count(*) as counts from {$table} where create_role_id = {$userRoleId} and update_time >= {$dateStartInt} and update_time < {$nextDayInt} and type in( 'distribution','grant') ";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * 新增业绩数量
 * @param  [type] $userId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function achievementNum($userId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_achievement';
    $sql = "SELECT SUM(integral) as counts from {$table} where user_id = {$userId} and addtime >= {$dateStartInt} and addtime < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : '0.00';
    } else {
        return '0.00';
    }
}

/**
 * 推荐人员数量 [推荐人员数是推荐人才到客户]
 * @param  [type] $userId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function fineProjectNum($userId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_fine_project';
    $sql = "SELECT count(*) as counts from {$table} where tracker = {$userId} and tjaddtime >= {$dateStartInt} and tjaddtime < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * 新增简历数量
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function resumeNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_resume';
    $sql = "SELECT count(*) as counts from {$table} where creator_role_id = {$userRoleId} and addtime >= {$dateStartInt} and addtime < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * 新增项目数量
 * @param  [type] $userRoleId   [description]
 * @param  [type] $dateStartInt [description]
 * @param  [type] $nextDayInt   [description]
 * @param  [type] $conn         [description]
 * @return [type]               [description]
 */
function projectNum($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_business';
    $sql = "SELECT count(*) as counts from {$table} where creator_role_id = {$userRoleId} and create_time >= {$dateStartInt} and create_time < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * @desc   客户数量
 * @param  [type] $userRoleId  [description]
 * @param  [type] $startDayInt [description]
 * @param  [type] $nextDayInt  [description]
 * @return [type]              [description]
 */
function customerCount($userRoleId, $dateStartInt, $nextDayInt, $conn)
{
    $table = 'mx_customer';
    $sql = "SELECT count(*) as counts from {$table} where creator_role_id = {$userRoleId} and create_time >= {$dateStartInt} and create_time < {$nextDayInt}";
    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * 获取用户职位信息
 * @param  [type] $userId [description]
 * @param  [type] $conn   [description]
 * @return [type]         [description]
 */
function userDepartment($userId, $conn)
{
    $roleTable = 'mx_role';
    $positionTable = 'mx_position';
    $departmentTable = 'mx_role_department';
    $sql = "SELECT dep.* from {$roleTable} as role , {$positionTable} as pos , {$departmentTable} as dep where pos.position_id=role.position_id and dep.department_id=pos.department_id and role.user_id = {$userId}";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info;
    } else {
        return 0;
    }
}

/**
 * 数据库连接
 * @param string $env
 * @return PDO
 */
function dbconn($env='')
{
    // 数据库链接 配置
    $productConf = array(
        'product' => 'mysql',
        'api' => 'pdo',
        'host' => '172.18.69.141',
        'port' => 3306,
        'dbname' => 'pinping',
        'username' => 'root',
        'password' => 'bffebfb01900fe3af8a8633d3b0b7be2',
        'charset' => 'utf8',
    );
    $testConf = [
        'product' => 'mysql',
        'api' => 'pdo',
        'host' => '192.168.0.168',
        'port' => 3306,
        'dbname' => 'pinping',
        'username' => 'root',
        'password' => '123456',
        'charset' => 'utf8',
    ];
    $conf = $env == 'test' ? $testConf : $productConf;
    $dsn = 'mysql:';
    $dsn .= 'host=' . $conf['host'] . ';port=' . $conf['port'] . ';';
    $dsn .= 'dbname=' . $conf['dbname'];
    $conn = new \PDO($dsn, $conf['username'], $conf['password']);
    if (isset($conf['charset']) && !empty($conf['charset'])) {
        $conn->query('SET NAMES ' . $conf['charset']);
    }
    return $conn;
}

?>