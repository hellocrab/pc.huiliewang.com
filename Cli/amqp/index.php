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
    /**
     * @desc 回掉数据处理
     * @param $msg
     */
    public function dealData($msg) {
        $body = $msg->body;
        echo date('Y-m-d H:i:s') . " [x] Received", $body, PHP_EOL;
        $bodyArr = json_decode($body, true);
        $userId = $bodyArr['user_id'];
        echo $userId;
        $res = $this->changeUser($userId);
        $res && $msg->delivery_info['channel']->basic_ack($msg->delivery_info['delivery_tag']);
    }

    /**
     * @desc 更改用户数据 [报表、用户信息删除]
     * @param $userId
     * @param $time
     * @return bool
     */
    public function changeUser($userId, $time = 0) {

        $conn = self::dbconn();
        $tableUser = 'mx_user';
        $tableReport = 'mx_report_intergral';
        $sqlUser = "SELECT * from {$tableUser} where user_id = {$userId} limit 1";
        $queryUser = $conn->query($sqlUser);
        $userInfo = $queryUser->fetch(PDO::FETCH_ASSOC);
        if (!$userInfo || $userInfo['status'] != 2) {
            return true;
        }
        $connUserMake = new sqlMaker($conn, array('tableName' => $tableUser));
        $userWhere = ['eq' => ['user_id' => $userId]];
        $connReportMake = new sqlMaker($conn, array('tableName' => $tableReport));
        $reportWhere = ['eq' => ['user_id' => $userId]];
        try {
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $conn->beginTransaction();
            $sql = $connUserMake->delete(['where' => $userWhere]);
            $sqlReport = $connReportMake->delete(['where' => $reportWhere]);
            $conn->exec($sql);
            $conn->exec($sqlReport);
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
$mq = new \RabbitMq\RabbitMqBase();
$mq->setCallBack([$consumeUser, 'dealData']);
$mq->deadReceive();