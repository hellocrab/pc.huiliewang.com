<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019/2/16
 * Time: 11:48
 */



class AliOssAction extends Action
{

    public function __construct()
    {
        import("AliOss",dirname(realpath(APP_PATH)).'/vendor/oss/','.php');
        $aliOss = new AliOss();

        $info = $aliOss::upFile('....');
        var_dump($info);die;
    }

    public function index()
    {
        echo 1;
    }

}