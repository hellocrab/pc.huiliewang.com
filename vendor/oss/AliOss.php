<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/16
 * Time: 11:48
 */

require_once __DIR__ . '/autoload.php';

use OSS\OssClient;
use OSS\Core\OssException;

class AliOss
{
    static $errorMess;
    protected static $ossClient;
    // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
    protected $accessKeyId = "LTAICZ7goroUPoYh";
    protected $accessKeySecret = "qXfaSjVazvj0WSn5nQS92LU5M2uzGZ";
    // Endpoint以杭州为例，其它Region请按实际情况填写。
    protected $endpoint = "http://oss-cn-hangzhou.aliyuncs.com";
    static $endpointName = "oss-cn-hangzhou.aliyuncs.com";
    // 存储空间名称
    private static $bucket = "pc-huiliewang";
//    // 文件名称
//    protected $object = "<yourObjectName>";
//    // <yourLocalFile>由本地文件路径加文件名包括后缀组成，例如/users/local/myfile.txt
//    protected $filePath = "<yourLocalFile>";

    public function __construct() {
        self::$ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
    }

    /**
     * @desc OSS文件上传
     * @param $filePath string 本地文件
     * @param $object string aliOSS文件存放地址
     * @return string
     */
    public static function upFile($filePath, $object) {
        try {
            self::$ossClient->uploadFile(self::$bucket, $object, $filePath);
        } catch (OssException $e) {
            self::$errorMess = $e->getMessage();
            return false;
        }
//        http://pc-huiliewang.oss-cn-hangzhou.aliyuncs.com/5c88aa8e050551140.doc
        return self::$bucket . '.' . self::$endpointName . '/' . $object;
    }

    /**
     * @desc 创建OSS空间
     * @param $name
     * @return string
     */
    public static function createBucket($name) {
        try {
            // 设置存储空间的存储类型为低频访问类型，默认是标准类型。
            $options = array(
                OssClient::OSS_STORAGE => OssClient::OSS_STORAGE_IA
            );
            // 设置存储空间的权限为公共读，默认是私有读写。
            self::$ossClient->createBucket($name, OssClient::OSS_ACL_TYPE_PUBLIC_READ, $options);
        } catch (OssException $e) {
            return $e->getMessage();
        }
        return $name;
    }

    /**
     * @desc 检测文件是否存在
     * @param $object
     * @return OssClient|string|null
     */
    public static function checkFile($object) {
        try {
            $exist = self::$ossClient->doesObjectExist(self::$bucket, $object);
        } catch (OssException $e) {
            return $e->getMessage();
        }
        return $exist;
    }

    public static function getInfo($object) {
        try {
            $objectMeta = self::$ossClient->getObjectMeta(self::$bucket, $object);
        } catch (OssException $e) {
            printf(__FUNCTION__ . ": FAILED\n");
            printf($e->getMessage() . "\n");
            return;
        }
        print_r($objectMeta);
        die;
    }
}