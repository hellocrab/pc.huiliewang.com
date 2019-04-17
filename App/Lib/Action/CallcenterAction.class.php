<?php

class CallCenterAction extends Action {

    const APPID = '00000000699efd070169e76bd4970372';
    const APP_TOKEN = "3ff246aa87687839df55f843459e47b6";

    /**
     * 融营云呼叫中心SIG获取
     */
    function getsig($timestamp) {
        $authtoken = "5bee00bd21de4a65a50e14d714d58412"; // 账户授权令牌
        $account = self::APPID;
        $sig = strtoupper(md5($authtoken . ":" . $account . ":" . $timestamp));
        return $sig;
    }

    /**
     * 融营云呼叫中心auth获取
     */
    function getauth($timestamp) {
        $authtoken = self::APPID; // APPID
        $datatoken = "3ff246aa87687839df55f843459e47b6"; // appToken
        $auth = base64_encode($authtoken . ":" . $datatoken . ":" . $timestamp);
        return $auth;
    }

    //坐席上班
    function startWork($timestamp) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "https://wdapi.yuntongxin.vip/bind/agentOnWork/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["voipAccount" => "80469800000256"];
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        $uuid = $result['statuscode'];
        return $uuid;
    }

    //坐席下班
    function offWork($timestamp) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);

        $url = "http://47.96.62.197:8090/bind/agentOffWork/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["voipAccount" => "80469800000256"];
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        $uuid = $result['resp']['Msg'];
        return $uuid;
    }

    /**
     * @return mixed
     * 电话外呼
     */
    public function call_out() {
        $tel = $_POST['tel'] ? BaseUtils::getStr(trim($_POST['tel'])) : '0';
        $type = isset($_POST['type']) ? intval($_POST['type']) : 0; //1、简历 2、客户联系人
        $itemId = isset($_POST['itemId']) ? $_POST['itemId'] : 0; //客户联系人/简历ID
        $channel = $_POST['channel'] ? BaseUtils::getStr(trim(I('channel'))) : 1;
        if ($itemId > 0) {
            //简历联系人电话
            if ($type == 1) {
                $tel = M('resume')->where(['eid' => $itemId])->getField('telephone');
            }
            //客户联系人电话
            if ($type == 2) {
                $tel = M('contacts')->where(['contacts_id' => $itemId])->getField('telephone');
            }
        }

        if (!session('tel')) {
            if (session('role_id')) {
                $user = M('user')->where(['role_id' => session('role_id')])->field('user_id,telephone')->find();
                if ($user['telephone']) {
                    session('tel', $user['telephone']);
                    $sourceTel = $user['telephone'];
                } else {
                    echo json_encode(['code' => $msg->meta->success ? 1 : 0, 'msg' => '请绑定手机号码']);
                }
            }
        } else {
            $sourceTel = session('tel');
        }

        if ($channel == 1) {
            //品聘坐席外呼
            $this->pinPingCall($sourceTel, $tel);
        } elseif ($channel == 2) {
            //融营云坐席外呼
            $timestamp = date('YmdHis');
            $uuid = $this->startWork($timestamp);
            if ($uuid != 200) {
                //融营云服务暂时不可用
                echo json_encode(['code' => $uuid == 200 ? 1 : 0, 'msg' => '融营云呼叫中心暂时停止服务，请联系管理员']);
            }
            $callStatus = $this->rongYinYunCall($timestamp, $tel);
            if($callStatus['statuscode'] == 200){
                echo json_encode(['code' => $callStatus['statuscode'] == 200 ? 1 : 0, 'msg' => '拨打成功']);
            }
            $this->offWork($timestamp);
        }



//        坐席下班
//        $this->offWork($timestamp);
//        $result = json_decode($msg, true);
//        $uuid=$result['resp']['Msg'];
    }

    /*
     * 融营云呼叫
     */

    private function rongYinYunCall($timestamp, $tel) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "https://wdapi.yuntongxin.vip/bind/callEvent/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["Appid" => self::APPID, "Phone" => $tel, "voipAccount" => "80469800000256"];
        
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        return $result;
    }

    /**
     * 品聘呼叫
     */
    private function pinPingCall($sourceTel, $tel) {
        $url = "http://211.152.35.81:8766/rest/voiceCall/api";
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json'
        );
//            'Authorization:'.$auth
        $data = ["callerNbr" => "+86" . $sourceTel,
            "calleeNbr" => "+86" . $tel,
            "userData" => "7be4a9ce-8ea2-4c74-b822-f4472194621d",
            "setingNbr" => "PP2703844206"];
        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $msg = json_decode($msg);
        echo json_encode(['code' => $msg->meta->success ? 1 : 0, 'msg' => $msg->meta->message]);
    }

    /**
     * 获取通话记录
     */
    public function call_record() {
        $timestamp = date('YmdHis');
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);

        $url = "http://47.96.62.197:8090/query/callReCord/v1?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["CompanyName" => "nanfangxinhua",
            "MaxId" => 100,
            "BeginTime" => "",
            "EndTime" => "",
            "CallSid" => "",
            "Caller" => "",
            "Callee" => ""
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
//        $uuid=$result['resp']['Msg'];
        $this->assign('msg', $result[data]);
        $this->display();
    }

}
