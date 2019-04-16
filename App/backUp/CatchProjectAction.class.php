<?php

class CatchAction extends Action {

    const ZHANJOB_BASE_URL = "http://api.zhanjob.com/";
    const USER_ACCOUNT = "1637071754@qq.com";
    const USER_PASSWORD = "qinhaili19950624";

    private $login_url = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/user/login_account";

    public function __construct() {
        parent::__construct();
        import("@.ORG.Curl");
    }
    
    
    public function userlogin() {
        $login_data = ['account' => self::USER_ACCOUNT, 'password' => self::USER_PASSWORD];

        $result = Curl::send($this->login_url, $login_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE);
        var_dump($result);
        $content = json_decode($result['result']['content']);
        $token = $content->data->token;
        $auth = $content->data->auth;
        $userid = $content->data->user_id;
        M('catch_cookie3')->where(['status' => 0])->save(['status' => 1]);
        $res = M('catch_cookie3')->add(['token' => $token, 'auth' => $auth, 'userid' => $userid, 'status' => 0]);
    }

    
    /*
     * 抓取project列表
     */

    public function getProjectLimit() {
        $cookie = M('catch_cookie')->where(['status' => 0])->find();

        $a = M('catch_project_limit')->order('id desc')->find();
        if (empty($a['id'])) {
            $limit_data = ['user_id' => $cookie['userid'], 'status_list' => 1, 'order' => 12, 'page' => 1, 'size' => 50];
            $header = [
                "Content-type: application/json;charset='utf-8'",
                'Host:api.zhanjob.com',
                "X-AUTH: {$cookie['token']}",
                "X-Requested-With:XMLHttpRequest",
                "X-USER:{$cookie['userid']}",
                'Origin:http://www.zhanjob.com'
            ];

            $result = Curl::send($this->project_list, $limit_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);

            if (empty($result)) {
                $this->userlogin();
                $cookie = M('catch_cookie')->where(['status' => 0])->find();
            }
            $content = json_decode($result['result']['content']);
            $data = $content->data;

            $page_count = $data->count;
            $list = $data->list;
            foreach ($list as $l) {
                $_list[] = $l->project_id;
            }
            $project_list = implode(',', $_list);
            M('catch_project_limit')->add(['total' => $page_count, 'now' => 1, 'status' => 0, 'project_list' => $project_list, time => date('Y-m-d H:i:s', time())]);
            exit;
        }

        $res = M('catch_project_limit')->where(['status' => 2])->field('id')->order('id desc')->find();
        if ($res) {
            M('catch_project_limit')->where(['id' => $res['id']])->save(['status' => 0]);
            exit;
        }

        $res_limit = M('catch_project_limit')->where(['status' => 0])->field('id,now')->order('id desc')->find();
        if (empty($res_limit)) {
            $res1 = M('catch_project_limit')->where(['status' => 1])->field('now,total')->order('id desc')->find();
            if ($res1['now'] + 1 < $res1['total']) {
                M('catch_project_limit')->add(['now' => $res1['now'] + 1, 'status' => 0, time => date('Y-m-d H:i:s', time())]);
                $limit_id = M()->getLastInsID();

                $header = [
                    "Content-type: application/json;charset='utf-8'",
                    'Host:api.zhanjob.com',
                    "X-AUTH: {$cookie['token']}",
                    "X-Requested-With:XMLHttpRequest",
                    "X-USER:{$cookie['userid']}",
                    'Origin:http://www.zhanjob.com'
                ];

                $limit_data = ['user_id' => $cookie['userid'], 'status_list' => 1, 'order' => 12, 'page' => $res1['now'] + 1, 'size' => 50];
                $result = Curl::send($this->project_list, $limit_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                if (empty($result)) {
                    $this->userlogin();
                    $cookie = M('catch_cookie')->where(['status' => 0])->find();
                }
                $content = json_decode($result['result']['content']);
                $data = $content->data;
                $page_count = $data->count;
                $list = $data->list;

                foreach ($list as $l) {
                    $_list[] = $l->project_id;
                }
                $project_list = implode(',', $_list);
                M('catch_resumes_limit')->where(['id' => $limit_id])->save(['project_list' => $project_list, 'total' => $page_count]);
            }
        } else {
            exit;
        }
    }

}
