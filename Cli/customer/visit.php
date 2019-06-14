<?php
/**
 *++++++++++++++++++++++++++++++++++++++++++++++++++
 * DESC: 客户回访初始数据来源
 * User: SOSO
 * Date: 2019/5/27
 *+++++++++++++++++++++++++++++++++++++++++++++++++++
 */
date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');

class Visit
{
    protected $config = "mx_customer_visit_config";
    protected $visit = "mx_customer_visit";
    protected $achievement = 'mx_achievement';
    protected $customer = 'mx_customer';
    protected $customer_data = 'mx_customer_data';
    protected $contacts = "mx_contacts";
    protected $contactsR = "mx_r_contacts_customer";
    protected $user = 'mx_users';
    protected $role = 'mx_role';
    protected $position = 'mx_position';
    protected $role_department = 'mx_role_department';

    protected $offer = "mx_fine_project_offer";
    protected $enter = "mx_fine_project_enter";
    protected $business = "mx_business";
    protected $fine = "mx_fine_project";
    protected $dbConn;

    /**
     * @desc 数据库链接
     * Visit constructor.
     */
    public function __construct() {
        if ($this->dbConn) {
            return;
        }
        $this->dbConn = $this->dbConn();
    }

    /**
     * @desc 入口
     */
    public function index() {
        //1、线上面试快
        $this->interview(1);
        //线下面试快
        $this->interview(5);
        //2、线上入职快
        $this->offer(2);
        //线下入职快
        $this->offer(6);
        //3、线上专业猎头
        $this->professional(3);
        //线下专业猎头
        $this->professional(7);
    }

    /**
     * @desc 面试快
     * 面试快：首次金额满>=1w，以后每满1w且间隔3个月出现1次
     * 1、首次访记录添加
     * 2、下次回访【下次回访截至金额 -- 上次回访完成时间产生的金额】
     * 3、记录历史数据
     * @param int $proType
     * @return bool
     */
    public function interview($proType = 1) {
        $sql = "select com_id as customer_id,sum(integral) as integral  from {$this->achievement} " .
            " where `com_id` > 0" .
            " and `project_id` > 0" .
            " and `type` = {$proType}" .
            " group by com_id desc";
        $achievements = $this->selectSql($sql);
        if (!$achievements) {
            return false;
        }
        //回访条件
        $config = $this->config($proType);
        $firstCondition = $config['first']; //首次回访条件
        $nestCondition = $config['nest']; //下次回访条件
        //查询是否是首次回访
        foreach ($achievements as $info) {
            $customerId = $info['customer_id'];
            $money = $info['integral'];
            $history = $this->history($customerId, $proType);
            if (!$history) {
                //查询是否按照签单信息判断
                $isSign = $firstCondition['is_sign'];
                if ($isSign == 1) {
                    //根据签单信息判断
                    $minCondition = 0;
                    $signInfo = $this->signInfo($customerId);
                    if (!$signInfo['sign_date']) {
                        continue;
                    }
                } else {
                    //首次回访
                    $minCondition = $firstCondition['min_condition'];
                    if ($money < $minCondition) {
                        continue;
                    }
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => 0, 'times' => 1, 'condition' => $minCondition, 'current_condition' => $money, 'time_condition' => 0
                ];
            } else {
                //下次回访
                $status = $history['status'];
                $finishTime = $history['finish_time'];
                $times = $history['times'] + 1;
                $nest_visit = $history['nest_visit'];
                if ($status == 0 && $nest_visit == 1) {
                    //未处理的
                    continue;
                }
                $thisTimeSql = "select sum(integral) as integral from {$this->achievement} " .
                    " where `project_id` > 0 " .
                    " and `com_id` = {$customerId}" .
                    " and `type` = {$proType}" .
                    " and  addtime > {$finishTime}";
                $info = $this->selectSql($thisTimeSql);
                $thisTimesMoney = isset($info['integral']) ? $info['integral'] : 0;
                //是否满足条件
                $lastMoney = $nestCondition['min_condition']; //下次满足条件金额
                $lastTime = $nestCondition['times'] * 3600 * 24; //下次满足条件时间间隔
                if ($thisTimesMoney < $lastMoney || (time() - $finishTime) < $lastTime) {
                    //不满足条件的
                    continue;
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => $finishTime, 'times' => $times, 'condition' => $lastMoney, 'current_condition' => $thisTimesMoney, 'time_condition' => $nestCondition['times']
                ];
            }
            $res = $this->visitAdd($customerId, $data, $proType);
            if (!$res) {
                echo "{$customerId} error !!" . PHP_EOL;
                continue;
            }
            echo "{$customerId} SUCCESS" . PHP_EOL;
        }
        echo "ALL proType: {$proType} SUCCESS" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    /**
     * @desc 入职快
     * 首次入职人数等于1个，以后每满2个入职间隔3个月出现1次
     * 1、首次访记录添加
     * 2、下次回访【下次回访截至入职人数 -- 上次回访完成时间产生的入职人数】
     * 3、记录历史数据
     * @param int $proType
     */
    public function offer($proType = 2) {
        $filed = "b.business_id,b.telephone,b.customer_id,b.creator_role_id,enter.id as enter_id";
        $sql = "select {$filed} from {$this->business} as b ,{$this->fine} as fine ,{$this->enter} as enter" .
            " where enter.fine_id = fine.id" .
            " and fine.project_id = b.business_id" .
            " and b.pro_type = {$proType}" .
            " order by enter.addtime desc";
        $list = $this->selectSql($sql, true);
        //客户列表
        $customers = [];
        foreach ($list as $info) {
            $customerId = $info['customer_id'];
            if (isset($customers[$customerId])) {
                $customers[$customerId]['condition']++;
                continue;
            }
            $customers[$customerId] = ['customer_id' => $customerId, 'condition' => 1];
        }
        if (!$customers) {
            exit("没有匹配到客户数据");
        }
        //循环客户,计算每个客户的回访数据
        $config = $this->config($proType);
        $firstCondition = $config['first']; //首次回访条件
        $nestCondition = $config['nest']; //下次回访条件
        foreach ($customers as $customerInfo) {
            $customerId = $customerInfo['customer_id'];
            $condition = $customerInfo['condition'];
            $history = $this->history($customerId, $proType);
            //首次回访
            if (!$history) {
                //查询是否按照签单信息判断
                $isSign = $firstCondition['is_sign'];
                if ($isSign == 1) {
                    //根据签单信息判断
                    $minCondition = 0;
                    $signInfo = $this->signInfo($customerId);
                    if (!$signInfo['sign_date']) {
                        continue;
                    }
                } else {
                    $minCondition = $firstCondition['min_condition'];
                    if ($condition < $minCondition) {
                        continue;
                    }
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => 0, 'times' => 1, 'condition' => $minCondition, 'current_condition' => $condition, 'time_condition' => 0
                ];
            } else {
                //下次回访
                $status = $history['status'];
                $finishTime = $history['finish_time'];
                $times = $history['times'] + 1;
                $nest_visit = $history['nest_visit'];
                if ($status == 0 && $nest_visit == 1) {
                    //未处理的
                    continue;
                }
                $thisTimeSql = "select count('offer.id') as counts  from " .
                    " {$this->business} as b ,{$this->fine} as fine ,{$this->offer} as offer" .
                    " where enter.fine_id = fine.id " .
                    " and fine.project_id = b.business_id" .
                    " and b.pro_type = {$proType}" .
                    " and  b.customer_id = {$customerId}" .
                    " and offer.addtime > {$finishTime}";
                $info = $this->selectSql($thisTimeSql);
                $thisCondition = isset($info['counts']) ? $info['counts'] : 0;
                //是否满足条件
                $nestMin = $nestCondition['min_condition']; //下次满足条件金额
                $nestTime = $nestCondition['times'] * 3600 * 24; //下次满足条件时间间隔
                if ($thisCondition < $nestMin || (time() - $finishTime) < $nestTime) {
                    //不满足条件的
                    continue;
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => $finishTime, 'times' => $times, 'condition' => $nestMin, 'current_condition' => $thisCondition, 'time_condition' => $nestCondition['times']
                ];
            }
            $res = $this->visitAdd($customerId, $data, $proType);
            if (!$res) {
                echo "{$customerId} error !!" . PHP_EOL;
                continue;
            }
            echo "{$customerId} SUCCESS" . PHP_EOL;
        }
        echo "ALL proType:{$proType} SUCCESS" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    /**
     * @desc 专业猎头
     * 首次签单 回访，以后每间隔1个月有1个入职出现1次
     * 1、首次访记录添加
     * 2、下次回访【下次回访截至入职人数 -- 上次回访完成时间产生的入职人数】
     * 3、记录历史数据
     * @param int $proType
     */
    public function professional($proType = 3) {
        $filed = "b.business_id,b.telephone,b.customer_id,b.creator_role_id,enter.id as enter_id";
        $sql = "select {$filed} from {$this->business} as b ,{$this->fine} as fine ,{$this->enter} as enter" .
            " where enter.fine_id = fine.id" .
            " and fine.project_id = b.business_id" .
            " and b.pro_type = {$proType}" .
            " order by enter.addtime desc";
        $list = $this->selectSql($sql, true);
        //客户列表
        $customers = [];
        foreach ($list as $info) {
            $customerId = $info['customer_id'];
            if (isset($customers[$customerId])) {
                $customers[$customerId]['condition']++;
                continue;
            }
            $customers[$customerId] = ['customer_id' => $customerId, 'condition' => 1];
        }
        if (!$customers) {
            exit("没有匹配到客户数据");
        }
        //循环客户,计算每个客户的回访数据
        $config = $this->config($proType);
        $firstCondition = $config['first']; //首次回访条件
        $nestCondition = $config['nest']; //下次回访条件
        foreach ($customers as $customerInfo) {
            $customerId = $customerInfo['customer_id'];
            $condition = $customerInfo['condition'];
            $history = $this->history($customerId, $proType);
            //首次回访
            if (!$history) {
                //查询是否按照签单信息判断
                $isSign = $firstCondition['is_sign'];
                if ($isSign == 1) {
                    //根据签单信息判断
                    $minCondition = 0;
                    $signInfo = $this->signInfo($customerId);
                    if (!$signInfo['sign_date']) {
                        continue;
                    }
                } else {
                    $minCondition = $firstCondition['min_condition'];
                    if ($condition < $minCondition) {
                        continue;
                    }
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => 0, 'times' => 1, 'condition' => $minCondition, 'current_condition' => $condition, 'time_condition' => 0
                ];
            } else {
                //下次回访
                $status = $history['status'];
                $finishTime = $history['finish_time'];
                $times = $history['times'] + 1;
                $nest_visit = $history['nest_visit'];
                if ($status == 0 && $nest_visit == 1) {
                    //未处理的
                    continue;
                }
                $thisTimeSql = "select count('offer.id') as counts  from " .
                    " {$this->business} as b ,{$this->fine} as fine ,{$this->offer} as offer" .
                    " where enter.fine_id = fine.id " .
                    " and fine.project_id = b.business_id" .
                    " and b.pro_type = {$proType}" .
                    " and  b.customer_id = {$customerId}" .
                    " and offer.addtime > {$finishTime}";
                $info = $this->selectSql($thisTimeSql);
                $thisCondition = isset($info['counts']) ? $info['counts'] : 0;
                //是否满足条件
                $nestMin = $nestCondition['min_condition']; //下次满足条件金额
                $nestTime = $nestCondition['times'] * 3600 * 24; //下次满足条件时间间隔
                if ($thisCondition < $nestMin || (time() - $finishTime) < $nestTime) {
                    //不满足条件的
                    continue;
                }
                //添加待回访数据
                $data = [
                    'pro_type' => $proType, 'last_visit_time' => $finishTime, 'times' => $times, 'condition' => $nestMin, 'current_condition' => $thisCondition, 'time_condition' => $nestCondition['times']
                ];
            }
            $res = $this->visitAdd($customerId, $data, $proType);
            if (!$res) {
                echo "{$customerId} error !!" . PHP_EOL;
                continue;
            }
            echo "{$customerId} SUCCESS" . PHP_EOL;
        }
        echo "ALL proType:{$proType} SUCCESS" . PHP_EOL . PHP_EOL . PHP_EOL;
    }

    /**
     * @desc 签单信息
     * @param $customerId
     * @return array
     */
    private function signInfo($customerId) {
        $sql = "select sign_date,signer,seal_company,contract_start,contract_end,invoice_time from {$this->customer_data} where customer_id = {$customerId}";
        $info = $this->selectSql($sql, false);
        return $info;
    }

    /**
     * @desc 待回访数据添加
     * @param $customerId
     * @param array $data
     * @return bool
     */
    private function visitAdd($customerId, $data = []) {
        if (!$customerId || !$data) {
            return false;
        }
        $sql = "select * from {$this->customer} where customer_id = {$customerId}";
        $customerInfo = $this->selectSql($sql, false);
        if (!$customerInfo) {
            return false;
        }
        $contactsId = $customerInfo['contacts_id'];
        $roleId = $customerInfo['creator_role_id'];
        if (!$contactsId) {
            //寻找联系人ID
            $contactsRSql = "select contacts_id from {$this->contactsR}" .
                " where customer_id = {$customerId}" .
                " order by contacts_id desc limit 1";
            $contactsRInfo = $this->selectSql($contactsRSql, false);
            $contactsId = $contactsRInfo['contacts_id'];
        }
        $contactsInfo = [];
        //联系人信息
        if ($contactsId) {
            $contactsSql = "select * from {$this->contacts} where contacts_id = {$contactsId}";
            $contactsInfo = $this->selectSql($contactsSql, false);
        }
        //创建人部门信息
        if ($roleId) {
            $departmentInfo = $this->getRoleDepartInfo($roleId);
            $data['department_id'] = $departmentInfo['id'];
            $data['department_name'] = $departmentInfo['name'];
            $data['p_department_name'] = $departmentInfo['p_name'];
            $data['p_department_id'] = $departmentInfo['p_id'];
        }
        $customerName = $customerInfo['name'];
        $industry = $customerInfo['industry'];
        $city = $customerInfo['address'];
        $data['customer_name'] = $customerName;
        $data['industry'] = $industry;
        $data['customer_id'] = $customerId;
        $data['city'] = $city;
        $data['add_time'] = time();
        $data['role_id'] = $roleId;
        $data['contacts_id'] = $contactsId ? $contactsId : 0;
        $data['contact_name'] = isset($contactsInfo['name']) ? $contactsInfo['name'] : '';
        $data['phone'] = isset($customerInfo['telephone']) ? $customerInfo['telephone'] : '';
        return $this->saveData($this->visit, $data);
    }

    /**
     * @desc  获取用户部门信息
     * @param $roleId
     * @return array
     */
    private function getRoleDepartInfo($roleId) {
        $roleSql = "select depart.department_id,depart.name,depart.parent_id from " .
            "{$this->role} as role ,{$this->role_department} as depart ,{$this->position} pos" .
            " where role.position_id = pos.position_id" .
            " and role.role_id = {$roleId}" .
            " and pos.department_id = depart.department_id";
        $departInfo = $this->selectSql($roleSql, false);
        $departmentId = $departInfo['department_id'];
        $departmentName = $departInfo['name'];
        $parentDepartId = $departInfo['parent_id'];
        $parentSql = "select * from {$this->role_department} where department_id = {$parentDepartId}";
        $parentInfo = $this->selectSql($parentSql, false);
        $pName = $parentInfo['name'];
        return [
            'id' => $departmentId,
            'name' => $departmentName,
            'p_id' => $parentDepartId ? $parentDepartId : $departmentId,
            'p_name' => $pName ? $pName : $departmentName
        ];
    }

    /**
     * @desc 客户回访历史记录
     * @param $customerId
     * @param $proType
     * @param $isAll
     * @return array
     */
    public function history($customerId, $proType = 1, $isAll = false) {
        $exitSql = "select * from {$this->visit}" .
            " where customer_id = {$customerId}" .
            " and pro_type = {$proType}" .
            " order by id desc ";
        return $this->selectSql($exitSql, $isAll);
    }

    /**
     * @desc 获取等级配置
     * @param int $pro_type
     * @return array
     */
    private function config($pro_type = 0) {
        $sql = "select * from {$this->config} where `pro_type` = {$pro_type}";
        $list = $this->selectSql($sql, true);
        if (!$list) {
            return [];
        }
        $data = [];
        foreach ($list as $info) {
            $data[$info['name']] = $info;
        }
        $data = array_values($data);
        $firstCondition = []; //首次回访条件
        $nestCondition = []; //下次回访条件
        foreach ($data as $condition) {
            if ($condition['times'] == 0) {
                $firstCondition = $condition;
                continue;
            }
            $nestCondition = $condition;
        }
        return ['first' => $firstCondition, 'nest' => $nestCondition];
    }

    /**
     * @desc 查询SQL
     * @param $sql string sql查询语句
     * @param $isAll bool 是否多条查询
     * @return array
     */
    private function selectSql($sql, $isAll = true) {
        $query = $this->dbConn->query($sql);
        $list = [];
        if (!$query) {
            return $list;
        }
        return $isAll ? $query->fetchAll(PDO::FETCH_ASSOC) : $query->fetch(PDO::FETCH_ASSOC);
    }

    /**
     * @desc 数据操作 【新增/修改】
     * @param $table  string 表明
     * @param $data  array 更新得数据
     * @param array $where 条件
     * @return bool|int
     */
    private function saveData($table, $data, $where = []) {
        if (!$table || !$data) {
            return false;
        }
        try {
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbConn->beginTransaction();
            $connMake = new sqlMaker($this->dbConn, array('tableName' => $table));
            if (!$where) {
                $sql = $connMake->insertRow($data);
                $res = $this->dbConn->exec($sql);
            } else {
                $sql = $connMake->updateRow(['data' => $data, 'where' => $where]);
                $res = $this->dbConn->exec($sql);
            }
            $this->dbConn->commit();
            return $res;
        } catch (Exception $e) {
            $this->dbConn->rollBack();
            echo "Failed: " . $e->getMessage();
            return false;
        }
    }

    /**
     * @desc  删除数据
     * @param $table
     * @param $where
     * @return bool|int
     */
    private function deleteData($table, $where) {
        try {
            $this->dbConn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->dbConn->beginTransaction();
            $connMake = new sqlMaker($this->dbConn, array('tableName' => $table));
            $sql = $connMake->delete(['where' => $where]);
            $res = $this->dbConn->exec($sql);
            $this->dbConn->commit();
            return $res;
        } catch (Exception $e) {
            $this->dbConn->rollBack();
            echo "Failed: " . $e->getMessage();
            return false;
        }
    }

    /**
     * @desc 数据库连接
     * @param string $env
     * @return PDO
     */
    private function dbConn($env = 'test') {

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
            'host' => '192.168.0.250',
            'port' => 3306,
            'dbname' => 'pinping',
            'username' => 'root',
            'password' => '123456',
            'charset' => 'utf8',
        ];
        $conf = $env == 'test' ? $testConf : $productConf;
        $dsn = "mysql:host={$conf['host']};port={$conf['port']};dbname={$conf['dbname']}";
        $conn = new \PDO($dsn, $conf['username'], $conf['password']);
        if (isset($conf['charset']) && !empty($conf['charset'])) {
            $conn->query('SET NAMES ' . $conf['charset']);
        }
        return $conn;
    }
}

//客户对应业绩满足条件 计算客户等级
$rank = new Visit();
$list = $rank->index();

