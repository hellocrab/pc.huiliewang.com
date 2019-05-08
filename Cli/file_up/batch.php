<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/5/7
 * Time: 16:59
 */

date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');

// 个数
$rows = isset($argv[1]) ? $argv[1] : 21; //总条数
$page = isset($argv[2]) ? $argv[2] : 3; //进程数

//未上传数量
$allCount = getAllCounts();
//总条数是否大于未同步条数
if ($rows > $allCount) {
    $rows = $allCount;
}
//分页数是否大于总条数
if ($page > $rows) {
    $page = $rows;
}

$limit = (int)ceil($rows / $page);
$indexPath = realpath(__DIR__ . '/index.php');
for ($i = 1; $i <= $page; $i++) {
    $cmd = "nohup php  {$indexPath} " . $limit . " " . $i . ' &';
    echo $cmd, PHP_EOL;
    popen($cmd, "r");
}

/**
 * @desc 未同步数量
 * @param int $channel
 * @return int
 */
function getAllCounts($channel = 1) {
    $table = 'mx_phone_record';
    $conn = dbConn();
    $sql = "SELECT count(*) as counts from {$table} where channel = {$channel} and recordFlag = 1 and oss_record_url = '' and recordUrl is not null ";

    $query = $conn->query($sql);
    if ($query) {
        $info = $query->fetch(PDO::FETCH_ASSOC);
        return $info['counts'] > 0 ? $info['counts'] : 0;
    } else {
        return 0;
    }
}

/**
 * desc 数据库连接
 * @return PDO
 */
function dbConn() {
    // 数据库链接 配置
    $conf = array(
        'product' => 'mysql',
        'api' => 'pdo',
        'host' => '172.18.69.141',
        'port' => 3306,
        'dbname' => 'pinping',
        'username' => 'root',
        'password' => 'bffebfb01900fe3af8a8633d3b0b7be2',
        'charset' => 'utf8',
    );
    $dsn = 'mysql:';
    $dsn .= 'host=' . $conf['host'] . ';port=' . $conf['port'] . ';';
    $dsn .= 'dbname=' . $conf['dbname'];
    $conn = new \PDO($dsn, $conf['username'], $conf['password']);
    if (isset($conf['charset']) && !empty($conf['charset'])) {
        $conn->query('SET NAMES ' . $conf['charset']);
    }
    return $conn;
}