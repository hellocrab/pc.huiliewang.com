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



    //通话记录融通
    public function index(){
        //过滤查询条件
//        $where =  array();
//        $caller = $_GET['caller'] ? BaseUtils::getStr($_GET['caller'],'string') : '';
//        $callee = $_GET['callee'] ? BaseUtils::getStr($_GET['callee'],'string') : '' ;
//        $context = $_GET['context'] ? BaseUtils::getStr($_GET['context'],'int') : '' ;
//        $by  =   BaseUtils::getStr($_GET['by'],'string') == '0' ? '<' : '>';
//        $billsecond = $_GET['billsecond'] ? BaseUtils::getStr($_GET['billsecond'],'int') : '' ;
        $start_time = $_GET['start_time'] ? BaseUtils::getStr($_GET['start_time'],'string'): date('Y-m-d H:i:s',time()-24* 86400);
        $end_time = $_GET['end_time'] ? BaseUtils::getStr($_GET['end_time'],'string'): date('Y-m-d H:i:s', time() );

        $params = [];
        $params['start_time'] = $start_time;
        $params['end_time'] = $end_time;
        
        $this->ppRecord($params);
        
    }
    
    
    
    /**
     * 品聘通话记录获取
     */
    public function ppRecord($params){
        //显示通话记录
        $maxId = 0;
        $_maxId = M('phone_record_catch')->field('maxId')->where(['status' => 0])->find();
        if($_maxId){
            
        }
        
        $data = [];
        $data['maxId'] = 0;
        $data['starTime'] = $params['start_time'];
        $data['endTime'] = $params['end_time'];
        $data['userData'] = '7be4a9ce-8ea2-4c74-b822-f4472194621d';
        $data = json_encode($data);
        $auth = 'NjJXOUptSHVlUWdoUExKbXJMVS1leUoxYzJWeVNXUWlPaUkxTlozSTZiMGgzaEl2T1lHaGUxbjFiNGZjSFM2RnBRc1BpbmdQaW5nQDEx';// base64_encode($data);
        $url = "http://211.152.35.81:8766/call/record/voice";
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:'.$auth);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
//        var_dump($result['data'][0]);exit;
        $this->assign('msg',$result['data']);
        $this->display();
    }


    /*
     * 融营云记录获取
     */
    private function ryyRecord()
    {
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