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
    protected static $ossClient;
    // 阿里云主账号AccessKey拥有所有API的访问权限，风险很高。强烈建议您创建并使用RAM账号进行API访问或日常运维，请登录 https://ram.console.aliyun.com 创建RAM账号。
    protected $accessKeyId = "<yourAccessKeyId>";
    protected $accessKeySecret = "<yourAccessKeySecret>";
    // Endpoint以杭州为例，其它Region请按实际情况填写。
    protected $endpoint = "http://oss-cn-hangzhou.aliyuncs.com";
    // 存储空间名称
    private static $bucket = "<yourBucketName>";
    // 文件名称
    protected $object = "<yourObjectName>";
    // <yourLocalFile>由本地文件路径加文件名包括后缀组成，例如/users/local/myfile.txt
    protected $filePath = "<yourLocalFile>";

    public function __construct()
    {
        self::$ossClient = new OssClient($this->accessKeyId, $this->accessKeySecret, $this->endpoint);
    }

    /**
     * @desc OSS文件上传
     * @param $filePath string 本地文件
     * @param $object string aliOSS文件存放地址
     * @return string
     */
    public static function upFile($filePath, $object)
    {
        try {
            self::$ossClient->uploadFile(self::$bucket, $object, $filePath);
        } catch (OssException $e) {
            return $e->getMessage();
        }
        return $object;
    }
}