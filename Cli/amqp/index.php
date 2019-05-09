<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/4/8
 * Time: 17:08
 */
date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');
include realpath(__DIR__ . '/../../vendor/php-amqplib/RabbitMqBase.php');

/**
 * @desc 回掉数据处理
 * Class consumeUser
 */
class consumeUser
{
    protected $isDeleteUser = false;
    protected $isDeleteReport = true;

    /**
     * @desc 回掉数据处理
     * @param $msg
     */
    public function dealData($msg) {
        $body = $msg->body;

        $bodyArr = json_decode($body, true);
        $userIds = isset($bodyArr['user_ids']) ? $bodyArr['user_ids'] : [];
        $res = true;
        if($userIds){
            echo "TTL: ".$bodyArr['ttl'];
            echo "开始时间：".date('Y-m-d H:i:s',$bodyArr['time']);PHP_EOL;
            echo "当前时间: ".date('Y-m-d H:i:s') . " [x] Received", $body, PHP_EOL;
            foreach ($userIds as $userId){
                echo $userId;
                $res = $this->changeUser($userId);
            }
        }
        $res && $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    }

    /**
     * @desc 更改用户数据 [报表、用户信息删除]
     * @param $userId
     * @param $time
     * @return bool
     */
    public function changeUser($userId, $time = 0) {
        if ($userId <= 0) {
            return true;
        }
        $conn = self::dbconn();
        $tableUser = 'mx_user';
        $tableReport = 'mx_report_intergral';
        $sqlUser = "SELECT * from {$tableUser} where user_id = {$userId} limit 1";
        $queryUser = $conn->query($sqlUser);
        $userInfo = $queryUser->fetch(PDO::FETCH_ASSOC);
        if (!$userInfo || $userInfo['status'] != 2) {
            return true;
        }

        $where = ['eq' => ['user_id' => $userId]];
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            //用户信息删除
            if ($this->isDeleteUser) {
                $connUserMake = new sqlMaker($conn, array('tableName' => $tableUser));
                $sql = $connUserMake->delete(['where' => $where]);
                $conn->exec($sql);
            }
            //用户报表信息删除
            if ($this->isDeleteReport) {
                $connReportMake = new sqlMaker($conn, array('tableName' => $tableReport));
                $sqlReport = $connReportMake->delete(['where' => $where]);
                $conn->exec($sqlReport);
            }
            $conn->commit();
            $res = true;
        } catch (Exception $e) {
            $conn->rollBack();
            $res = false;
            echo "Failed: " . $e->getMessage();
        }
        return $res;
    }

    /**
     * 数据库连接
     * @param string $env
     * @return PDO
     */
    public static function dbconn($env = 'test') {
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
            'host' => '192.168.0.129',
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
}

//消息消费
$consumeUser = new consumeUser();
$config = ['host' => 'localhost', 'port' => 5672, 'user' => 'guest', 'pass' => 'guest', 'vhost' => '/'];
$mq = new \RabbitMq\RabbitMqBase($config, 'oss_exchange_', 'oss_queue_');
$mq->setCallBack([$consumeUser, 'dealData']);
$mq->receiveMess();