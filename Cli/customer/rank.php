<?php
/**
 *++++++++++++++++++++++++++++++++++++++++++++++++++
 * DESC: 客户等级初始数据【满足客户条件的进入客户等级池】
 * User: SOSO
 * Date: 2019/5/13
 *+++++++++++++++++++++++++++++++++++++++++++++++++++
 */
date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');

class Rank
{
    protected $invoiceTable = 'mx_invoice';
    protected $achievementTable = 'mx_achievement';
    protected $customer = 'mx_customer';
    protected $contacts = 'mx_contacts';
    protected $rank = 'mx_customer_rank';
    protected $rankList = 'mx_customer_rank_list';
    protected $config = 'mx_customer_rank_config';
    protected $contact_r = 'mx_r_contacts_customer';
    protected $users = 'mx_user';
    protected $message = 'mx_message';
    protected $dbConn;

    /**
     * @desc 数据库链接
     * Rank constructor.
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
        $sql = "select * from {$this->achievementTable} where `com_id` > 0 and `type` > 0 order by id desc ";
        $list = $this->selectSql($sql);
        if (!$list) {
            return false;
        }
        //1、客户贡献的业绩金额
        $achievements = [];
        foreach ($list as $info) {
            if (!isset($achievements[$info['com_id']])) {
                $achievements[$info['com_id']] = ['customer_id' => $info['com_id'], 'money' => $info['integral'], 'achievement_money' => $info['integral']];
                continue;
            }
            $achievements[$info['com_id']]['money'] += $info['integral'];
            $achievements[$info['com_id']]['achievement_money'] += $info['integral'];
        }
        if (!$achievements) {
            return false;
        }

        //客户等级初始值
        $defaultMoney = $this->rankConfig(0);
        if (!$defaultMoney) {
            return false;
        }
        $limitMoney = $defaultMoney[0]['min_condition'];
        //2、查询客户退票金额 @todo 系统未实现

        //客户数据操作
        foreach ($achievements as $customer) {
            if ($customer['money'] < $limitMoney) {
                continue;
            }
            //3、获取客户信息
            $customerInfo = $this->customerInfo($customer);
            if (!$customerInfo) {
                continue;
            }

            $customerId = $customer['customer_id'];
            //是否已经同步过
            $rankSql = "select * from {$this->rank} where `customer_id` = {$customerId} ";
            $where = [];
            $rankInfo = $this->selectSql($rankSql, false);

            //是否手工分级
            $isManual = false;
            if ($rankInfo && ($rankInfo['is_manual'] == 1 || $rankInfo['is_black'] == 1)) {
                $isManual = true;
            }

            //4、计算客户等级和项目类型
            $ranks = $this->customerType($customerId, $isManual);
            if ($ranks) {
                $customerInfo['rank_name'] = $ranks['rank'];
                $customerInfo['pro_type'] = $ranks['pro_type'];
                $customerInfo['rank_id'] = $ranks['rank_id'];
            }

            //更新数据
            if ($rankInfo) {
                $where['eq'] = ['customer_id' => $customerId];
                $customerInfo['up_time'] = time();
            } else {
                //添加
                $customerInfo['add_time'] = time();
            }
            $res = $this->saveData($this->rank, $customerInfo, $where);
            if ($res) {
                echo "客户：{$customerId} success " . PHP_EOL;
            }
        }
        echo "all data success" . PHP_EOL;
    }

    /**
     * @desc  计算客户等级和项目类型
     * @param $customerId
     * @param bool $isManual 是否手工分级
     * @return array
     */
    private function customerType($customerId, $isManual = false) {

        //1、计算客户给个项目类型贡献金额 【同步记录到config表】
        $sql = "select  `type`,sum(integral) as integral from {$this->achievementTable} where com_id = {$customerId} group by `type`";
        $list = $this->selectSql($sql);
        //每个项目类型对应的业绩金额
        $data = [];
        foreach ($list as $info) {
            //线下慧面试 =》面试快
            $info['type'] == 5 && $info['type'] = 1;
            //线下慧入职 =》入职快
            $info['type'] == 6 && $info['type'] = 2;
            //线下专业猎头 =》专业猎头
            $info['type'] == 7 && $info['type'] = 3;
            $data[$info['type']] = $info['integral'];
        }
        //删除列表历史数据
        $sqlList = "select * from {$this->rankList} where customer_id = {$customerId}";
        if ($this->selectSql($sqlList, false)) {
            $this->deleteData($this->rankList, ['eq' => ['customer_id' => $customerId]]);
        }
        //2、计算客户每个项目类型对应的等级
        $proTypeList = [];
        foreach ($data as $type => $integral) {
            $typeData = ['pro_type' => $type, 'integral' => $integral, 'customer_id' => $customerId, 'add_time' => time()];
            $conditions = $this->rankConfig($type);
            if (!$conditions) {
                continue;
            }
            foreach ($conditions as $condition) {
                $min = $condition['min_condition'];
                $max = $condition['max_condition'];
                //D级别【默认】
                $typeData['rank_name'] = 'D';
                $typeData['rank_id'] = 0;

                //根据业绩或者人数计算的项目类型
                $typeData['enter_num'] = 0;
                if ($type == 2) {
                    //入职人数
                    $integral = $this->getEnters($customerId, $type);
                    $typeData['enter_num'] = $integral;
                }
                //B或者C 级别
                if ($integral >= $min && ($max > 0 && $integral < $max)) {
                    $typeData['rank_name'] = $condition['name'];
                    $typeData['rank_id'] = $condition['id'];
                    break;
                }
                //A级别
                if ($integral >= $min && !$max) {
                    $typeData['rank_name'] = $condition['name'];
                    $typeData['rank_id'] = $condition['id'];
                    break;
                }
            }
            //添加每个项目类型的等级数据
            $this->saveData($this->rankList, $typeData);
            $proTypeList[$type] = [
                'pro_type' => $type,
                'name' => $typeData['rank_name'],
                'integral' => $typeData['integral'],
                'rank_id' => $typeData['rank_id']
            ];
        }

        //手工分级  不更新等级信息
        if ($isManual) {
            return [];
        }
        //计算等级信息
        $rank_name = [];
        $integrals = [];
        foreach ($proTypeList as $key => $pro) {
            $rank_name[$key] = $pro['name'];
            $integrals[$key] = $pro['integral'];
        }
        array_multisort($rank_name, SORT_STRING, SORT_ASC, $integrals, SORT_NUMERIC, SORT_DESC, $proTypeList);
        $customerRank = $proTypeList[0]['name'];
        $customerType = $proTypeList[0]['pro_type'];
        $customerRankId = $proTypeList[0]['rank_id'];
        return ['rank' => $customerRank, 'pro_type' => $customerType, 'rank_id' => $customerRankId];
    }

    /**
     * @desc  获取入职人数
     * @param $customerId
     * @param int $proType
     * @return int|mixed
     */
    private function getEnters($customerId, $proType = 2) {
        $tableProject = 'mx_fine_project';
        $tableInterview = 'mx_fine_project_enter';
        $tableBusiness = 'mx_business';
        $sql = "SELECT count(distinct(pro.resume_id)) as counts FROM {$tableProject} as pro , {$tableInterview} as enter ,{$tableBusiness} as bu " .
            "where enter.fine_id = pro.id " .
            "and bu.business_id = pro.project_id " .
            " and pro.com_id = {$customerId} " .
            "and bu.customer_id = {$customerId} " .
            "and  bu.pro_type = {$proType}";
        $info = $this->selectSql($sql, false);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    }

    /**
     * @desc 获取等级配置
     * @param int $pro_type
     * @return array
     */
    private function rankConfig($pro_type = 0) {
        $sql = "select * from {$this->config} where `pro_type` = {$pro_type}";
        $list = $this->selectSql($sql, true);
        if (!$list) {
            return [];
        }
        $data = [];
        foreach ($list as $info) {
            $data[$info['name']] = $info;
        }
        return array_values($data);
    }

    /**
     * @desc  客户基本信息信息获取
     * @param $customer
     * @return array|bool
     */
    private function customerInfo($customer) {
        if (!$customer || !is_array($customer)) {
            return false;
        }
        $customerId = $customer['customer_id'];
        $customerSql = "select * from {$this->customer} where customer_id = {$customerId} ";
        $customerInfo = $this->selectSql($customerSql, false);
        if (!$customerInfo) {
            return false;
        }
        $customer['industry'] = $customerInfo['industry']; //行业
        $customer['customer_name'] = $customerInfo['name']; //客户名
        $customer['role_id'] = $customerInfo['customer_owner_id']; //维护人
        $customer['city'] = $customerInfo['address']; //所在城市
        $contactsId = $customerInfo['contacts_id'];
        $contactsInfo = $this->getContactsInfo($customerId, $contactsId);
        $customer['job'] = $contactsInfo['job'];
        $customer['phone'] = $contactsInfo['phone'];
        $customer['birth_day'] = $contactsInfo['birth_day'];
        $customer['birth_month'] = $contactsInfo['birth_month'];
        $customer['contact_name'] = $contactsInfo['contact_name'];
        $customer['contacts_id'] = $contactsInfo['contacts_id'];

        //发送信息
        $this->sentMessage($customerId, $customer['customer_name']);
        return $customer;
    }

    /**
     * @todo 未完成
     * @desc  消息发送
     * @param $customerId
     * @param $customerName
     * 1、联系人维护通知：进入分级系统的客户如果缺少联系人姓名、联系电话、职位、生日、
     * 性别等信息，系统自动发送弹窗信息至与客户贡献金额最大的项目负责人【联系人不是他 新建一个、】，关闭后每天弹出一次，
     * 客户联系人及联系电话填写完成停止通知提醒
     * 2、生日提醒通知：
     * 生日对象：进入分级系统客户的所有联系人、提醒人：与客户最近签约的项目负责人
     * 提醒时间：15天前提醒一次，生日前一天提醒一次
     */
    private function sentMessage($customerId, $customerName) {
        //联系人维护通知
        //1、贡献金额最大的项目负责人
        $userRoleId = $this->getCustomerUser($customerId);
        //2、联系人【创建/修改】
        if ($userRoleId) {
            $contactsInfo = $this->getContactsInfo($customerId);
            if (!$contactsInfo || !$contactsInfo['is_perfection']) {
                //3、发送维护消息
                $content = "《{$customerName}》客户需完善联系人信息：姓名、电话、职位、生日";
                $data = [
                    'to_role_id' => $userRoleId,
                    'from_role_id' => 0,
                    'content' => $content,
                    'send_time' => time(),
                    'deadline' => strtotime(date('Y-m-d') . " 23:59:59"),
                    'type' => 1,
                    'params' => json_encode(['customer_id' => $customerId]),
                    'link' => "/index.php?m=contacts&a=complete&customerId={$customerId}&userRoleId={$userRoleId}&from=rank",
                ];
                $this->saveData($this->message, $data);
            }
        }
        //客户联系人生日提醒
        $contactsSql = "select * from {$this->contact_r} where customer_id = {$customerId} order by id desc";
        $contactsList = $this->selectSql($contactsSql, true);
        $contentBirthday = '';
        foreach ($contactsList as $info) {
            $contactsId = $info['contacts_id'];
            $contactsInfo = $this->getContactsInfo(0, $contactsId);
            $birthDay = $contactsInfo['birth_day'];
            $birthMonth = $contactsInfo['birth_month'];
            if (!$contactsInfo['phone'] || !$birthDay || !$birthMonth) {
                continue;
            }
            //计算是否是15天生日获取当天生日
            $currentBirthday = strtotime(date('Y', time()) . "{$birthMonth}{$birthDay}");
            $currentDay = strtotime(date('Ymd', time()));
            //当天生日提醒
            $day = 1;
            if ($currentBirthday == $currentDay) {
                $contentBirthday = "您有客户：{$customerName} 联系人：{$contactsInfo['contact_name']} 今天生日";
            }
            //提前15天发送
            if (($currentDay - $currentBirthday) == 15 * 24 * 3600) {
                $day = 15;
                $contentBirthday = "您有客户：{$customerName}  联系人：{$contactsInfo['contact_name']} 15天后生日";
            }

            if (!$contentBirthday) {
                continue;
            }
            //消息发送
            $data = [];
            $data['to_role_id'] = $contactsInfo['creator_role_id'];
            $data['from_role_id'] = 0;
            $data['content'] = $contentBirthday;
            $data['send_time'] = time();
            $data['deadline'] = strtotime(date('Y-m-d')) + $day * 3600 * 24;
            $data['type'] = 2;
            $data['link'] = '';
            $data['params'] = json_encode(['customer_id' => $customerId, 'contacts_id' => $contactsId]);
            $this->saveData($this->message, $data);
        }

    }

    /**
     * @desc  获取签单客户金额最大的用户ID
     * @param $customerId
     * @param string $notInUsers
     * @return mixed
     */
    private function getCustomerUser($customerId, $notInUsers = '') {
        $sql = "select user_id from {$this->achievementTable} where com_id = {$customerId}";
        if ($notInUsers) {
            $notInUsers = ltrim($notInUsers, ',');
            $sql .= " and user_id not in ($notInUsers)";
        }
        $sql .= " order by integral desc limit 1";
        $info = $this->selectSql($sql, false);
        $userRoleId = isset($info['user_id']) ? $info['user_id'] : 0;
        if (!$userRoleId) {
            return 0;
        }
        $userSql = "select user_id from {$this->users} where role_id = {$userRoleId} and status = 1";
        $userInfo = $this->selectSql($userSql, false);
        if (!$userInfo) {
            $notInUsers .= ",{$userRoleId}";
            $this->getCustomerUser($customerId, $notInUsers);
        }
        return $userInfo ? $userInfo['user_id'] : 0;
    }

    /**
     * @desc 客户联系人信息
     * @param $customerId
     * @param $contactsId
     * @return array
     */
    private function getContactsInfo($customerId = 0, $contactsId = 0) {

        $data = [];
        if ($customerId > 0) {
            $sql = "select con.contacts_id from {$this->customer} as cus ,{$this->contact_r} as r , {$this->contacts} con " .
                "where cus.customer_id = r.customer_id and con.contacts_id = r.contacts_id and cus.customer_id = {$customerId} " .
                " and con.is_deleted = 0 order by con.contacts_id desc limit 1";
            $contact_r_info = $this->selectSql($sql, false);
            $contactsId = isset($contact_r_info['contacts_id']) ? $contact_r_info['contacts_id'] : 0;
        }
        $contactsInfo = [];
        if ($contactsId > 0) {
            $contactSql = "select * from {$this->contacts} where `contacts_id` = {$contactsId} ";
            $contactsInfo = $this->selectSql($contactSql, false);
        }

        //生日月份/日期
        $birthMoth = '';
        $birthDay = '';
        if ($contactsInfo['birthday']) {
            $days = explode('-', $contactsInfo['birthday']);
            $birthMoth = isset($days[0]) ? $days[0] : '';
            $birthDay = isset($days[1]) ? $days[1] : '';
        }
        $data['creator_role_id'] = isset($contactsInfo['creator_role_id']) ? $contactsInfo['creator_role_id'] : 0; //创建人
        $data['job'] = isset($contactsInfo['post']) ? $contactsInfo['post'] : ''; //联系人行业
        $data['phone'] = isset($contactsInfo['telephone']) ? $contactsInfo['telephone'] : ''; //联系人电话
        $data['contacts_id'] = isset($contactsInfo['contacts_id']) ? $contactsInfo['contacts_id'] : 0; //联系人ID
        $data['contact_name'] = isset($contactsInfo['name']) ? $contactsInfo['name'] : ''; //联系人电话
        $data['birth_day'] = $birthDay; //联系人生日天
        $data['birth_month'] = $birthMoth; //联系人生日月份
        //判断信息是否完善
        $is_perfection = true;
        if (!$data || !$data['birth_month'] || !$data['contact_name'] || !$data['phone']) {
            $is_perfection = false;
        }
        $data['is_perfection'] = $is_perfection;
        return $data;
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
    public function saveData($table, $data, $where = []) {
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
        if ($env == 'test') {
            $conf = $testConf;
        } else {
            $conf = $productConf;
        }
        $dsn = "mysql:host={$conf['host']};port={$conf['port']};dbname={$conf['dbname']}";
        $conn = new \PDO($dsn, $conf['username'], $conf['password']);
        if (isset($conf['charset']) && !empty($conf['charset'])) {
            $conn->query('SET NAMES ' . $conf['charset']);
        }
        return $conn;
    }
}

//客户对应业绩满足条件 计算客户等级
$rank = new Rank();
$list = $rank->index();

