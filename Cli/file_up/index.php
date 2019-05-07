<?php
/**
 * @desc  通话录音上传OSS
 * User: Administrator
 * Date: 2019/5/6
 * Time: 18:22
 */
date_default_timezone_set("PRC");
header('Content-Type: textml; charset=utf-8');
set_time_limit(0);
ini_set("memory_limit", "1024M");
// include libs
include realpath(__DIR__ . '/../sqlBase/sqlMaker/Mysql.php');
include realpath(__DIR__ . '/../../vendor/oss/AliOss.php');


$limitNo = isset($argv[1]) ? ($argv[1]) : 10;
$page = isset($argv[2]) ? ($argv[2]) : 1;
$channel = isset($argv[3]) ? ($argv[3]) : 1; // 1：品评 2：融云云
$env = 'product'; //数据库

$localDir = realpath(__DIR__ . "/../../Uploads/temp_{$channel}/");
if (!is_dir($localDir)) {
    @mkdir($localDir, 0755, true);
}

$startNo = ($page - 1) * $limitNo;

$table = 'mx_phone_record';
$conn = dbconn($env); //数据库连接
//用户列表
$sql = "SELECT * from {$table} where channel = {$channel} and recordFlag = 1 and oss_record_url = '' and recordUrl is not null order by id limit {$startNo} , {$limitNo}";
$query = $conn->query($sql);
$list = $query->fetchAll(PDO::FETCH_ASSOC);
$extension = 'wav';
$connMake = new sqlMaker($conn, array('tableName' => $table));

$timeStart = time();
if (!$list) {
    exit('no data to up');
}
foreach ($list as $info) {
    $id = $info['id'];
    if ($info['oss_record_url']) {
        continue;
    }
    $recordUrl = $info['recordUrl'];
    $callerNum = $info['setingNbr'];
    $sessionId = $info['sec_id'];
    $ossFile = "call_record_{$channel}/{$callerNum}/{$sessionId}.{$extension}";
    //下载到本地然后上传
    $localFile = "{$localDir}/{$sessionId}.{$extension}"; //临时文件存放
    $res = true;
    if (!file_exists($localFile)) {
        $recordUrl = str_replace('https', 'http', $recordUrl);
        $res = copy($recordUrl, $localFile);
    }
    $ossUrl = '';
    if ($res || file_exists($localFile)) {
        $ossUrl = upFile($localFile, $ossFile);
        unlink($localFile);
    }
    if (!$ossUrl) {
        continue;
    }

    $where = ['eq' => ['id' => $id]];
    $sqlUp = $connMake->updateRow(['data' => ['oss_record_url' => $ossUrl], 'where' => $where]);
    $resUp = $conn->exec($sqlUp);
    if ($resUp) {
        echo "{$sessionId} SUCCESS" . PHP_EOL;
    } else {
        echo "{$sessionId}  ERROR" . PHP_EOL;
    }
}

echo "all SUCCESS" . PHP_EOL;
echo "all time: " . (time() - $timeStart) . ' s';


/**
 * @desc oss上传
 * @param $localFile
 * @param $ossFile
 * @return bool|string
 */
function upFile($localFile, $ossFile) {
    $ossClient = new AliOss();
    $res = $ossClient::upFile($localFile, $ossFile);
    if (!$res) {
        return false;
    }
    return $res;
}

/**
 * 数据库连接
 * @param string $env
 * @return PDO
 */
function dbconn($env = '') {
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
    $dsn = 'mysql:';
    $dsn .= 'host=' . $conf['host'] . ';port=' . $conf['port'] . ';';
    $dsn .= 'dbname=' . $conf['dbname'];
    $conn = new \PDO($dsn, $conf['username'], $conf['password']);
    if (isset($conf['charset']) && !empty($conf['charset'])) {
        $conn->query('SET NAMES ' . $conf['charset']);
    }
    return $conn;
}