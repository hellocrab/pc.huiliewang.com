<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/16
 * Time: 11:48
 */


class AliOssAction extends Action
{

    static $errorMess;

    public function __construct() {
        import("AliOss", dirname(realpath(APP_PATH)) . '/vendor/oss/', '.php');
    }

    /**
     * �����ļ��ϴ�
     * @param $localFile
     * @param $ossFile
     * @return string
     */
    public static function upFile($localFile, $ossFile) {
        $ossClient = new AliOss();
        $res = $ossClient::upFile($localFile, $ossFile);
        if (!$res) {
            self::$errorMess = $ossClient::$errorMess;
            return false;
        }
        return $res;

    }

    /**
     * @desc �����ռ���
     * @param $name
     * @return string
     */
    public function createBucket() {
        $name = 'pc-huiliewang';
        $ossClient = new AliOss();
        $res = $ossClient::createBucket($name);
        var_dump($res);
        die;
    }

    /**
     * @desc ����ļ��Ƿ����
     * @param $fileName
     * @return \OSS\OssClient|string|null
     */
    public static function checkFile($fileName) {
        $ossClient = new AliOss();
        return $ossClient::checkFile($fileName);
    }

    /**
     * @desc �ļ���Ϣ
     * @param $fileName
     */
    public static function getInfo($fileName) {
        $ossClient = new AliOss();
        return $ossClient::getInfo($fileName);
    }

}