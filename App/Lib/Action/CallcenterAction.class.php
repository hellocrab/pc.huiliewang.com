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

        //日志记录
        $channelName = [1 => '品聘', '2' => '融营云'];
        $typeName = [1 => '人才', 2 => '客户联系人'];
        $userName = session('full_name');
        $log = [
            'role_id' => session('role_id'),
            'module_name' => strtolower(MODULE_NAME),
            'action_name' => strtolower(ACTION_NAME),
            'create_time' => time(),
            'action_id' => $fineId,
            'param_name' => "user_name = {$userName} , channel = $channel , type = {$type} , tel = {$tel} , fine_id = {$fineId}",
            'content' => " 顾问：{$userName} 选择通道：" . $channelName[$channel] . " 拨打了来源：{$typeName[$type]} 的电话 : {$tel}， fine_id 为: {$fineId}"
        ];
        M('action_log')->add($log);

        $phoneRecordData = ['fine_id' => $fineId, 'setingNbr' => $sourceTel, 'calleeNum' => $tel, 'source' => $type, 'item_id' => $itemId];
        if ($channel == 1) {
            //品聘坐席外呼
            $msg = $this->pinPingCall($sourceTel, $tel);
            $isSuccess = $msg['meta']['success'];
            if (!$isSuccess) {
                exit(json_encode(['code' => 0, 'msg' => $msg['meta']['message']]));
            }
            //成功
            $callsId = $msg['data'];
            $this->record($callsId, $phoneRecordData, $channel);
            exit(json_encode(['code' => 1, 'msg' => '拨打成功']));

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
                exit(json_encode(['code' => 0, 'msg' => '融营云呼叫中心暂时停止服务，请联系管理员']));
            }
            $callStatus = $this->rongYinYunCall($timestamp, $tel, $sourceTel);
            if ($callStatus['statuscode'] == 200) {
                $callsId = $callStatus['data'];
                $this->record($callsId, $phoneRecordData, $channel);
                echo json_encode(['code' => 1, 'msg' => '拨打成功']);
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
        $msg = json_decode($msg, true);
        return $msg;
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
     * @param $channel [1 => '品聘', '2' => '融营云'];
     * @param array $data
     * @return bool|mixed
     */
    private function record($callsId, $data = [], $channel) {
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
                'user_name' => session('full_name'), 'department_id' => session('department_id'), 'user_id' => session('user_id'), 'callerNum' => $settingNbr, 'channel' => $channel
            ];
            $data = array_merge($dataUser, $data);
            return $recordObj->add($data);
        }
        return false;
    }

    /**
     * @desc 通话回掉地址
     * @return bool|mixed
     */
    public function call_back() {
        $contentOri = file_get_contents('php://input');
        if (!$contentOri) {
            return false;
        }
        //防止超时
        set_time_limit(0);
        ini_set("memory_limit", "1024M");

        $content = json_decode($contentOri, true);
        if (isset($content['Table']) && $content['Table']) {
            BaseUtils::addLog("融营云回掉参数 ：$contentOri ", 'callback_log', '/var/log/rongyinyun/');
            return $this->rongYinYunCallBack($content);
        }
        //品聘回掉
        BaseUtils::addLog("品聘回掉参数 ：{$contentOri}", 'callback_log', '/var/log/pinping/');
        $res = $this->pinPingCallBack($content);
        echo $res;
    }

    /**
     * @desc 品评批量回调接口
     * @return bool|string
     */
    public function call_back_batch() {
        $contentOri = file_get_contents('php://input');
        if (!$contentOri) {
            exit('fail');
        }
        //防止超时
        set_time_limit(0);
        ini_set("memory_limit", "1024M");
        $contents = json_decode($contentOri, true);
        //品聘回掉
        BaseUtils::addLog("品聘批量回掉参数 ：{$contentOri}", 'callback_batch_log', '/var/log/pinping/');
        $return = 'success';
        foreach ($contents as $content) {
            if ('fail' == $this->pinPingCallBack($content)) {
                $return = 'fail';
                break;
            }
        }
        echo $return;
    }

    /**
     * @desc 品聘回调处理
     * @param $content
     * @return bool
     */
    public function pinPingCallBack($content) {
        if (!$content) {
            return 'fail';
        }
        //数据处理
        $sessionId = $content['sessionId'];
        if (!$sessionId) {
            return 'fail';
        }
        $where = ['sec_id' => $sessionId, 'channel' => 1];
        $recordInfo = M('phone_record')->where($where)->find();
        if (!$recordInfo) {
            return 'success';
        }
        if ($recordInfo['oss_record_url']) {
            return 'success';
        }
        $data = [];
        $data['sec_id'] = $sessionId;
        $data['sessionId'] = $sessionId;
        $data['direction'] = $content['direction'] ? $content['direction'] : 0;
        $data['call_end_time'] = $content['callEndTime'] ? $content['callEndTime'] : '';
        $data['fwdAnswerTime'] = $content['fwdAnswerTime'] ? $content['fwdAnswerTime'] : '';
        $data['callOutAnswerTime'] = $content['callOutAnswerTime'] ? $content['callOutAnswerTime'] : '';
        $data['recordFlag'] = $content['recordFlag'] ? $content['recordFlag'] : 0;
        $data['recordUrl'] = $content['recordFileDownloadUrl'] ? $content['recordFileDownloadUrl'] : '';
        $data['duration'] = $content['duration'] ? $content['duration'] : 0;
        $data['callmin'] = $content['callmin'] ? $content['callmin'] : 0;
        $data['callback_time'] = time(); // 回掉时间记录

        $data['oss_record_url'] = '';
        if ($data['recordUrl']) {
            $callerNum = $recordInfo['setingNbr'];
            $data['oss_record_url'] = $this->fileToOss($data['recordUrl'], $sessionId, $callerNum, 1);
        }
        $res = M('phone_record')->where($where)->save($data);
        return $res === false ? 'fail' : 'success';
    }

    /**
     * @desc 荣营云回掉处理
     * @param $content
     * @return bool
     */
    public function rongYinYunCallBack($content) {
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
            $where = ['sec_id' => $content['CallSid'], 'channel' => 2];
            $callInfo = M('phone_record')->where($where)->find();
            if (!$callInfo) {
                continue;
            }
            $data = [];
            //通话截至时间
            $data['call_end_time'] = '';
            if ($content['End_Stamp']) {
                preg_match("/\((\d{10}).*\)/", $content['End_Stamp'], $matchEnd);
                $endTime = $matchEnd[1];
                if ($endTime) {
                    $data['call_end_time'] = date('Y-m-d H:i:s', $endTime);
                }
            }
            //通话开始时间
            $data['callOutAnswerTime'] = '';
            if ($content['Start_Stamp']) {
                preg_match("/\((\d{10}).*\)/", $content['Start_Stamp'], $match);
                $startTime = $match[1];
                if ($startTime) {
                    $data['callOutAnswerTime'] = date('Y-m-d H:i:s', $startTime);
                }
            }
            $data['sec_id'] = $content['CallSid']; //唯一标识
            $data['duration'] = $content['Billsec']; //通话时长
            $data['recordUrl'] = $content['RecordUrl']; // 录音地址
            $data['recordFlag'] = $content['RecordUrl'] ? 1 : 0; // 录音地址
            $data['direction'] = $content['Context']; // 呼入呼出类型
            $data['callback_time'] = time(); // 回掉时间记录

            //录音地址处理
            $data['oss_record_url'] = '';
            if ($data['recordUrl']) {
                $callerNum = $content['Caller_Id_Number'];
                $data['oss_record_url'] = $this->fileToOss($data['recordUrl'], $data['sec_id'], $callerNum);
            }
            M('phone_record')->where($where)->save($data);
        }
        return true;
    }

    /**
     * @desc 录音文件上传OSS
     * @param $recordUrl
     * @param $sessionId
     * @param $callerNum
     * @param $channel
     * @return string
     */
    static function fileToOss($recordUrl, $sessionId, $callerNum, $channel = 2) {
        $pathInfo = $recordUrl;
        $extension = $pathInfo['extension'];
        $extension = strtolower($extension);
        if (!in_array($extension, ['wav', 'mp3', 'amr', 'wma'])) {
            $extension = 'wav';
        }

        $dir = "./Uploads/temp_{$channel}/";
        if (!is_dir($dir)) {
            @mkdir($dir, 0755, true);
        }

        import("AliOss", dirname(realpath(APP_PATH)) . '/vendor/oss/', '.php');
        $ossClient = new AliOssAction();
        $ossFile = "call_record_{$channel}/{$callerNum}/{$sessionId}.{$extension}";
        $ossUrl = '';
        //看有没有上传过OSS
        if (AliOssAction::checkFile($ossFile)) {
            $ossUrl = "http://pc-huiliewang.oss-cn-hangzhou.aliyuncs.com/" . $ossFile;
        } else {
            //下载到本地然后上传
            $localFile = "{$dir}{$sessionId}.{$extension}"; //临时文件存放
            $res = true;
            if (!file_exists($localFile)) {
                $recordUrl = str_replace('https', 'http', $recordUrl);
                $res = copy($recordUrl, $localFile);
            }
            if ($res || file_exists($localFile)) {
                $ossUrl = $ossClient->upFile($localFile, $ossFile);
                unlink($localFile);
            }
        }
        return $ossUrl;
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
