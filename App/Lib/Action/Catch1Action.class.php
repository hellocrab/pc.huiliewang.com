<?php

class Catch1Action extends Action {

    const ZHANJOB_BASE_URL = "http://api.zhanjob.com/";
    const USER_ACCOUNT = "1637071754@qq.com";
    const USER_PASSWORD = "qinhaili19950624";

    private $login_url = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/user/login_account";
    private $customer_list = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/enterprise/get_company_page_list";
    private $customer_view = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/enterprise/get_company_for_view"; //取得客户基本信息
    private $customer_update = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/enterprise/get_company_for_update"; //取得客户详细信息
    private $customer_auth = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/customer/auth_get_list";

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
        M('catch_cookie2')->where(['status' => 0])->save(['status' => 1]);
        $res = M('catch_cookie2')->add(['token' => $token, 'auth' => $auth, 'userid' => $userid, 'status' => 0]);
    }

    /**
     * 获取客户公海列表
     */
    public function getCustomerLimit() {
        $cookie = M('catch_cookie2')->where(['status' => 0])->find();

        $a = M('catch_customer_limit')->order('id desc')->find();
        if (empty($a['id'])) {
            $limit_data = ['user_id' => $cookie['userid'], 'relational_to_me' => 0, 'order' => 10, 'page' => 1, 'size' => 20];
            $header = [
                "Content-type: application/json;charset='utf-8'",
                'Host:api.zhanjob.com',
                "X-AUTH: {$cookie['token']}",
                "X-Requested-With:XMLHttpRequest",
                "X-USER:{$cookie['userid']}",
                'Origin:http://www.zhanjob.com'
            ];

            $result = Curl::send($this->customer_list, $limit_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);

            if (empty($result)) {
                $this->userlogin();
                $cookie = M('catch_cookie2')->where(['status' => 0])->find();
            }
            $content = json_decode($result['result']['content']);
            $data = $content->data;

            $page_count = $data->count;
            $list = $data->list;
            foreach ($list as $l) {
                $_list[] = $l->cooperation_id;
            }
            $customer_list = implode(',', $_list);
            M('catch_customer_limit')->add(['total' => $page_count, 'now' => 1, 'status' => 0, 'customer_list' => $customer_list, time => date('Y-m-d H:i:s', time())]);
            exit;
        }

        $res = M('catch_customer_limit')->where(['status' => 2])->field('id')->order('id desc')->find();
        if ($res) {
            M('catch_customer_limit')->where(['id' => $res['id']])->save(['status' => 0]);
            exit;
        }

        $res_limit = M('catch_customer_limit')->where(['status' => 0])->field('id,now')->order('id desc')->find();
        if (empty($res_limit)) {
            $res1 = M('catch_customer_limit')->where(['status' => 1])->field('now,total')->order('id desc')->find();
            if ($res1['now'] + 1 < $res1['total']) {
                M('catch_customer_limit')->add(['now' => $res1['now'] + 1, 'status' => 0, time => date('Y-m-d H:i:s', time())]);
                $limit_id = M()->getLastInsID();

                $header = [
                    "Content-type: application/json;charset='utf-8'",
                    'Host:api.zhanjob.com',
                    "X-AUTH: {$cookie['token']}",
                    "X-Requested-With:XMLHttpRequest",
                    "X-USER:{$cookie['userid']}",
                    'Origin:http://www.zhanjob.com'
                ];
                    
                $limit_data = ['user_id' => $cookie['userid'], 'relational_to_me' => 0, 'order' => 10, 'page' => $res1['now'] + 1, 'size' => 20];
                
                $result = Curl::send($this->customer_list, $limit_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                if (empty($result)) {
                    $this->userlogin();
                    $cookie = M('catch_cookie2')->where(['status' => 0])->find();
                }
                $content = json_decode($result['result']['content']);
                $data = $content->data;
                $page_count = $data->count;
                $list = $data->list;

                foreach ($list as $l) {
                    $_list[] = $l->cooperation_id;
                }
                $customer_list = implode(',', $_list);
                M('catch_customer_limit')->where(['id' => $limit_id])->save(['customer_list' => $customer_list, 'total' => $page_count]);
            }
        } else {
            exit;
        }
    }

    /**
     * 获取客户详情
     */
    public function getCustomer() {
        $res = M('catch_customer_limit')->where(['status' => 0])->field('id,now,cooperation_list')->order('id desc')->find();
        $cookie = M('catch_cookie2')->where(['status' => 0])->find();
        $_list = explode(',', $res['cooperation_list']);
        try {
            if ($_list) {
                foreach ($_list as $l) {
                    $header = [
                        "Content-type: application/x-www-form-urlencoded;charset=UTF-8",
                        'Host:api.zhanjob.com',
                        "X-AUTH: {$cookie['token']}",
                        "X-Requested-With:XMLHttpRequest",
                        "X-USER:{$cookie['userid']}",
                        'Origin:http://www.zhanjob.com'
                    ];

                    $cooperation_data = [
                        'cooperation_id' => $l,
                        'shadeloading' => 0,
                        'isloading' => 0
                    ];
                    $result_view = Curl::send($this->cooperation_view, $cooperation_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE, $header);
                    if (empty($result_view)) {
                        $this->userlogin();
                        $cookie = M('catch_cookie2')->where(['status' => 0])->find();
                        $result_view = Curl::send($this->cooperation_view, $cooperation_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE, $header);
                    }


                    $content = json_decode($result_view['result']['content']);
                    $data = $content->data;

                    foreach ($data->cm_user_list as $cu) {
                        $_cm_user[] = $cu->cn_name;
                    }
                    $cm_user_str = implode(',', $_cm_user);

                    //获取customer_update
                    $cooperation_update_data = ['cooperation_id' => $l];
                    $result_update = Curl::send($this->cooperation_update, $cooperation_update_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE, $header);
                    if (empty($result_update)) {
                        $this->userlogin();
                        $cookie = M('catch_cookie2')->where(['status' => 0])->find();
                        $result_update = Curl::send($this->cooperation_update, $cooperation_update_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE, $header);
                    }
                    $content_update = json_decode($result_update['result']['content']);
                    $data_upate = $content_update->data;

                    $customer = [
                        'cooperation_code' => $data->cooperation_code,
                        'name' => $data->hr_company_name,
                        'hr_company_logo' => $data->hr_company_logo,
                        'short_name' => $data->hr_company_short_name,
                        'customer_owner_name' => $data->bd_user->user_name,
                        'customer_owner_en_name' => $data->bd_user->user_en_name,
                        'create_time' => strlen($data->create_time) > 10 ? substr($data->create_time, 0, 10) : $data->create_time,
                        'update_time' => strlen($data->modify_time) > 10 ? substr($data->modify_time, 0, 10) : $data->modify_time,
                        'is_deleted' => 0,
                        'is_locked' => 0,
                        'owner_role_id' => 0,
                        'delete_role_id' => 0,
                        'location' => $data->address,
                        'telephone' => $data->telephone,
                        'cm_user' => $data->cm_user,
                        'cm_user_name' => $cm_user_str,
                        'industry_text' => $data_upate->industry_text,
                        'years_number' => $data_upate->years_number
                    ];

                    M('customer')->add($customer);
                    $customer_id = M()->getLastInsID();
                    //添加data数据
                    if ($customer_id) {
                        $customer_data = [
                            'customer_id' => $customer_id,
                            'website' => $data->website
                        ];
                        M('customer_data')->add($customer_data);
                    }


                    //获取联系人
                    if ($customer_id) {
                        $auth_header = [
                            "Content-type: application/json;charset='utf-8'",
                            'Host:api.zhanjob.com',
                            "X-AUTH: {$cookie['token']}",
                            "X-Requested-With:XMLHttpRequest",
                            "X-USER:{$cookie['userid']}",
                            'Origin:http://www.zhanjob.com'
                        ];

                        $cooperation_auth_data = [
                            'con_company_id' => $data_upate->con_company_id,
                            'customer_company_id' => $data->cooperation_id,
                            'order_direction' => 2,
                            'order_field' => 'create_time',
                            'page' => 1,
                            'size' => 20,
                            'user_id' => $cookie['userid']
                        ];
                        $result_auth = Curl::send($this->cooperation_auth, $cooperation_auth_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $auth_header);
                        $content_auth = json_decode($result_auth['result']['content']);
                        $data_auth = $content_auth->data;
                        $list_auth = $data_auth->list;
                        foreach ($list_auth as $kla => $la) {
                            $customer_auth_data = [
                                'name' => $la->cn_name,
                                'department' => $la->department_name,
                                'post' => $la->position,
                                'telephone' => $la->telephone,
                                'email' => $la->email,
                                'job_type_text' => $la->job_type_text
                            ];
                            M('contacts')->add($customer_auth_data);
                            $contacts_id = M()->getLastInsID();

                            $contact_customer_r_data = ['contacts_id' => $contacts_id, 'customer_id' => $customer_id];
                            if ($kla == 0) {
                                M('customer')->where(['customer_id' => $customer_id])->save(['contacts_id' => $contacts_id]);
                            }
                            M('r_contacts_customer')->add($contact_customer_r_data);
                        }
                    }
                    M('catch_customer_limit')->where(['id' => $res['id']])->save(['status' => 1]);
                }
            } else {
                exit();
            }
        } catch (Exception $ex) {
            M('catch_customer_limit')->where(['id' => $res['id']])->save(['status' => 2]);
        }
    }

}
