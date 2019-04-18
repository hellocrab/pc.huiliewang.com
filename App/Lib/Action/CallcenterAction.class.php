<?php

class CallcenterAction extends Action
{

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
    function startWork($timestamp, $sourceTel = '') {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "https://wdapi.yuntongxin.vip/bind/agentOnWork/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["voipAccount" => $sourceTel];
        $data = json_encode($data);
        $ch = curl_init();

        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_HTTP_VERSION, '1.0');
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        $uuid = $result['statuscode'];
        return $uuid;
    }

    //坐席下班
    function offWork($timestamp, $sourceTel) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);

        $url = "http://47.96.62.197:8090/bind/agentOffWork/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["voipAccount" => $sourceTel];
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
        $fineId = isset($_POST['fineId']) ? $_POST['fineId'] : 0; //客户联系人/简历ID
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
        $sourceTel = '';
        if (!session('tel')) {
            if (session('role_id')) {
                $user = M('user')->where(['role_id' => session('role_id')])->field('user_id,telephone')->find();
                if ($user['telephone']) {
                    session('tel', $user['telephone']);
                    $sourceTel = $user['telephone'];
                } else {
                    exit(json_encode(['code' => 0, 'msg' => '请绑定手机号码']));
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
            $sourceTel = M('user')->where(['role_id' => session('role_id')])->getField('ryy_tel');
            if (!$sourceTel) {
                exit(json_encode(['code' => 0, 'msg' => '请设置坐席号，谢谢']));
            }
            $timestamp = date('YmdHis');
            $uuid = $this->startWork($timestamp, $sourceTel);
            if ($uuid != 200) {
                //融营云服务暂时不可用
                exit(json_encode(['code' => $uuid == 200 ? 1 : 0, 'msg' => '融营云呼叫中心暂时停止服务，请联系管理员']));
            }
            $callStatus = $this->rongYinYunCall($timestamp, $tel, $sourceTel);
            if ($callStatus['statuscode'] == 200) {
                $callsId = $callStatus['data'];
                $this->record($callsId, ['fine_id' => $fineId, 'setingNbr' => $sourceTel, 'calleeNum' => $tel]);
                echo json_encode(['code' => $callStatus['statuscode'] == 200 ? 1 : 0, 'msg' => '拨打成功']);
            }
            $this->offWork($timestamp, $sourceTel);
        }
    }

    /**
     * 融营云呼叫
     */

    private function rongYinYunCall($timestamp, $tel, $sourceTel) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "https://wdapi.yuntongxin.vip/bind/callEvent/v2?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = ["Appid" => self::APPID, "Phone" => $tel, "voipAccount" => $sourceTel];

        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_HTTP_VERSION, '1.0');

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

    /**
     * @desc  通话记录添加/维护
     * @param $callsId
     * @param array $data
     * @return bool|mixed
     */
    private function record($callsId, $data = []) {
        if (!$callsId || !$data) {
            return false;
        }
        $recordObj = M('phone_record');
        $callInfo = $recordObj->where(['sec_id' => $callsId])->find();
        if (!$callInfo) {
            //添加通话记录
            if (!$data['setingNbr']) {
                return false;
            }
            $settingNbr = $data['setingNbr'];
            $dataUser = [
                'role_id' => session('role_id'), 'sec_id' => $callsId, 'setingNbr' => $settingNbr, 'add_time' => time(), 'sessionId' => $callsId,
                'user_name' => session('full_name'), 'department_id' => session('department_id'), 'user_id' => session('user_id'), 'callerNum' => $settingNbr
            ];
            $data = array_merge($dataUser, $data);
            return $recordObj->add($data);
        }
        //更新通话记录
        return $recordObj->where(['sec_id' => $callsId])->save($data);
    }

    /**
     * @desc 通话回掉地址
     * Caller_Id_Number String 必填 坐席号码
     * Destination_Number String 必填 客户号码
     * Context String 必填 呼入呼出类型 0 呼出 1 呼入
     * Start_Stamp DateTime 必填 开始时间
     * End_Stamp DateTime 必填 结束时间
     * Billsec Int 必填 通话时长
     * RecordUrl String 可填 录音地址
     * CallSid String 必填 通话唯一标识
     * @return bool|mixed
     */
    public function call_back() {
        $content = file_get_contents('php://input');
//        $content = file_get_contents('./str.json');
        if (!$content) {
            return false;
        }
        BaseUtils::addLog("融营云回掉参数 ： {$content}", 'callback_log', '/var/log/rongyinyun/');
        $content = json_decode($content, true);
        $contentList = $content['Table'];
        if (!$contentList || empty($contentList)) {
            return false;
        }
        //循环list
        foreach ($contentList as $content) {
            if (!$content['CallSid']) {
                continue;
            }
            //判断是否存在
            $callInfo = M('phone_record')->where(['sec_id' => $content['CallSid']])->find();
            if(!$callInfo){
                continue;
            }
            $data = [];
            //通话截至时间
            $data['call_end_time'] = '';
            if ($content['End_Stamp']) {
                preg_match("/\((\d{10}).*\)/", $content['End_Stamp'], $matchEnd);
                $endTime = $matchEnd[1];
                if ($endTime) {
//                    $endTime += 8 * 3600;
                    $data['call_end_time'] = date('Y-m-d H:i:s', $endTime);
                }

            }
            //通话开始时间
            $data['callOutAnswerTime'] = '';
            if ($content['Start_Stamp']) {
                preg_match("/\((\d{10}).*\)/", $content['Start_Stamp'], $match);
                $startTime = $match[1];
                if ($startTime) {
//                    $startTime += 8 * 3600;
                    $data['callOutAnswerTime'] = date('Y-m-d H:i:s', $startTime);
                }
            }
            $data['sec_id'] = $content['CallSid']; //唯一标识
            $data['duration'] = $content['Billsec']; //通话时长
            $data['recordUrl'] = $content['RecordUrl']; // 录音地址
            $data['recordFlag'] = $content['RecordUrl'] ? 1 : 0; // 录音地址
            $data['direction'] = $content['Context']; // 呼入呼出类型
            $data['callback_time'] = time(); // 回掉时间记录
            $callerNum = $content['Caller_Id_Number'];

            //录音地址处理
            $data['oss_record_url'] = '';
            if ($data['recordUrl']) {
                $pathInfo = pathinfo($data['recordUrl']);
                $extension = $pathInfo['extension'];
                $dir = "./Uploads/temp/";
                if (!is_dir($dir)) {
                    @mkdir($dir, 0755, true);
                }
                $localFile = "{$dir}{$data['sec_id']}.{$extension}"; //临时文件存放
                $res = copy($data['recordUrl'], $localFile);
                if ($res) {
                    import("AliOss", dirname(realpath(APP_PATH)) . '/vendor/oss/', '.php');
                    $ossFile = "call_record/{$callerNum}/{$data['sec_id']}.{$extension}";
                    $ossClient = new AliOssAction();
                    $ossUrl = $ossClient->upFile($localFile, $ossFile);
                    unlink($localFile);
                    $data['oss_record_url'] = $ossUrl;
                }
            }
            $this->record($data['sec_id'], $data);
        }

    }


    /**
     * @desc  获取通话账单
     * @param $timestamp
     * @param $CallSid
     * @return mixed
     */
    public function getRecords($timestamp, $CallSid) {
        $sig = $this->getsig($timestamp);
        $auth = $this->getauth($timestamp);
        $url = "https://wdapi.yuntongxin.vip/query/callReCord/v1?Sig=" . $sig;
        $header = array('Content-Type:' . 'application/json;charset=utf-8',
            'Accept:' . 'application/json',
            'Authorization:' . $auth);
        $data = [
            "Appid" => self::APPID,
            "Caller" => '80469800000237',
            "MaxId" => 100,
            "CallSid" => $CallSid
        ];

        $data = json_encode($data);
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_HTTPHEADER, $header);
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // 对认证证书来源的检查
        curl_setopt($ch, CURLOPT_SSL_VERIFYHOST, false); // 从证书中检查SSL加密算法是否存在
        curl_setopt($ch, CURLOPT_HTTP_VERSION, '1.0');

        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        $msg = curl_exec($ch);
        $result = json_decode($msg, true);
        return $result;
    }

}
