<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-18
 * Time: 09:07
 */

class PhoneAction extends Action
{
    public function _initialize(){
        $title="分析模块";
        $this->assign("title",$title);
    }

    function getsig($timestamp){
        $authtoken = "0000000067f7f651016812bd9fb200b2"; // 账户授权令牌
        $account = "nanfangxinhua";  // 企业账户
        $sig = strtoupper(md5($authtoken .":". $account .":".$timestamp));
        return $sig;
    }

    function getauth($timestamp){
        $authtoken ="0000000067f7f651016812bd9fb200b2";// APPID
        $datatoken = "19edad3f987b2db5e5037e259b9d8871";// appToken
        $auth = base64_encode($authtoken .":". $timestamp .":". $datatoken);
        return $auth;
    }

    //展示通话记录
    public function index(){
        //过滤查询条件
        $where =  array();
        $caller = $_GET['caller'] ? BaseUtils::getStr($_GET['caller'],'string') : '';
        $callee = $_GET['callee'] ? BaseUtils::getStr($_GET['callee'],'string') : '' ;
        $context = $_GET['context'] ? BaseUtils::getStr($_GET['context'],'int') : '' ;
        $by  =   BaseUtils::getStr($_GET['by'],'string') == '0' ? '<' : '>';
        $billsecond = $_GET['billsecond'] ? BaseUtils::getStr($_GET['billsecond'],'int') : '' ;
        $start_time = $_GET['start_time'] ? BaseUtils::getStr($_GET['start_time'],'string'): '';
        $end_time = $_GET['end_time'] ? BaseUtils::getStr($_GET['end_time'],'string'): '';


        //显示通话记录
        $timestamp= date('YmdHis');
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "http://47.96.62.197:8090/query/callReCord/v1?Sig=".$sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:'.$auth);
        $data = ["CompanyName"=>"nanfangxinhua",
            "MaxId"=>100,
            "BeginTime"=>"",
            "EndTime"=>"",
            "CallSid"=>"",
            "Caller"=>"",
            "Callee"=>""
        ];
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        $this->assign('msg',$result[data]);
        $this->display();
    }

}