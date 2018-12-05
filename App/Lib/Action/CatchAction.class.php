<?php

class CatchAction extends Action {

    const ZHANJOB_BASE_URL = "http://api.zhanjob.com/";
    const USER_ACCOUNT = "1020074734@qq.com";
    const USER_PASSWORD = "abc121224";

    private $login_url = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/user/login_account";
    private $resumes_list = self::ZHANJOB_BASE_URL . "zjob-resume/api/resume/library/company/resumes/limits";
    private $resumes = self::ZHANJOB_BASE_URL . "zjob-resume/api/web/resume/getResume";

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
        M('catch_cookie')->where(['status' => 0])->save(['status' => 1]);
        $res = M('catch_cookie')->add(['token' => $token, 'auth' => $auth, 'userid' => $userid, 'status' => 0]);
//        var_dump($content);
    }

    public function getResumesLimit() {

        $cookie = M('catch_cookie')->where(['status' => 0])->find();

        $a = M('catch_resumes_limit')->order('id desc')->find();
        if (empty($a['id'])) {
            $limit_data = ['containsAny' => 0, 'pageNo' => 1, 'pageSize' => 20, 'userId' => 4929];
            $header = [
                "Content-type: application/json;charset='utf-8'",
                'Host:api.zhanjob.com',
                "X-AUTH: {$cookie['token']}",
                "X-Requested-With:XMLHttpRequest",
                "X-USER:{$cookie['userid']}",
                'Origin:http://www.zhanjob.com'
            ];

            $result = Curl::send($this->resumes_list, $limit_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $header);
            if (empty($result)) {
                $this->userlogin();
                $cookie = M('catch_cookie')->where(['status' => 0])->find();
            }
            $content = json_decode($result['result']['content']);
            $data = $content->data;
            $page_count = $data->page_count;
            $list = $data->list;

            foreach ($list as $l) {
                $_list[] = $l->resumeId;
            }
            $resumes_list = implode(',', $_list);
            M('catch_resumes_limit')->add(['total' => $page_count, 'now' => 1, 'status' => 0, 'resumes_list' => $resumes_list, time => date('Y-m-d H:i:s', time())]);
            exit;
        }

        $res = M('catch_resumes_limit')->where(['status' => 2])->field('id')->order('id desc')->find();
        if ($res) {
            M('catch_resumes_limit')->where(['id' => $res['id']])->save(['status' => 0]);
            exit;
        }

        $res = M('catch_resumes_limit')->where(['status' => 0])->field('id')->order('id desc')->find();
        if (empty($res)) {
            $res1 = M('catch_resumes_limit')->where(['status' => 1])->field('now')->order('id desc')->find();
            $limit_data = ['containsAny' => 0, 'pageNo' => 1, 'pageSize' => 20, 'userId' => 4929];
            $header = [
                "Content-type: application/json;charset='utf-8'",
                'Host:api.zhanjob.com',
                "X-AUTH: {$cookie['token']}",
                "X-Requested-With:XMLHttpRequest",
                "X-USER:{$cookie['userid']}",
                'Origin:http://www.zhanjob.com'
            ];

            $result = Curl::send($this->resumes_list, $limit_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $header);
            if (empty($result)) {
                $this->userlogin();
                $cookie = M('catch_cookie')->where(['status' => 0])->find();
            }
            $content = json_decode($result['result']['content']);
            $data = $content->data;
            $page_count = $content->data->page_count;
            $list = $content->data->list;

            if ($res1['now'] < $page_count) {
                foreach ($list as $l) {
                    $_list[] = $l->resumeId;
                }
                $resumes_list = implode(',', $_list);

                M('catch_resumes_limit')->add(['total' => $page_count, 'now' => $res1['now'] + 1, 'status' => 0, 'resumes_list' => $resumes_list, time => date('Y-m-d H:i:s', time())]);
                exit;
            }
        }
    }

    public function getResumes() {
        $res = M('catch_resumes_limit')->where(['status' => 0])->field('id,now,resumes_list')->order('id desc')->find();
        $cookie = M('catch_cookie')->where(['status' => 0])->find();

        $_list = explode(',', $res['resumes_list']);
        try {
            if ($_list) {
                foreach ($_list as $l) {
                    $header = [
                        "Content-type: application/json;charset='utf-8'",
                        'Host:api.zhanjob.com',
                        "X-AUTH: {$cookie['token']}",
                        "X-Requested-With:XMLHttpRequest",
                        "X-USER:{$cookie['userid']}",
                        'Origin:http://www.zhanjob.com'
                    ];

                    $resumes_data = [
                        'resumeId' => $l,
                        'shadeloading' => 0,
                        'userId' => $cookie['userid']
                    ];
                    $result = Curl::send($this->resumes, $resumes_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                    if (empty($result)) {
                        $this->userlogin();
                        $cookie = M('catch_cookie')->where(['status' => 0])->find();
                    }
                    $content = json_decode($result['result']['content']);
                    $data = $content->data;

                    $insert_data = [
                        'name' => $data->name,
                        'birthday' => $data->birth_year . '-' . $data->birth_month,
                        'sex' => $data->sex == 1 ? 2 : 1,
                        'telephone' => $data->mobile,
                        'email' => $data->email,
                        'wechat_number' => $data->wechat_number,
                        'wechat_qr' => $data->wechat_qr,
                        'qq_number' => $data->qq_number,
                        'microblog' => $data->microblog,
                        'blood_type' => $data->blood_type,
                        'blood_type_text' => $data->blood_type_text,
                        'linkedin' => $data->linkedin,
                        'curCompany' => $data->curCompany,
                        'curDepartment' => $data->curDepartment,
                        'curPosition' => $data->curPosition,
                        'job_type' => $data->job_type,
                        'job_type_text' => $data->job_type_text,
                        'now_job_type' => $data->now_job_type,
                        'now_industry' => $data->now_industry,
                        'label' => $data->labels,
                        'expect_job_type_text' => $data->expect_job_type_text,
                        'expect_city_text' => $data->expect_city_text,
                        'job_class' => $data->expect_position,
                        'work_status' => $data->work_status,
                        'curStatus' => $data->curStatus,
                        'work_status_remark' => $data->work_status_remark,
                        'secrecy' => $data->secrecy,
                        'startWorkyear' => $data->start_working_year,
                    ];

                    switch ($data->marital_status_text) {
                        case '保密' :
                            $insert_data['marital_status'] = 3;
                            break;
                        case '已婚' :
                            $insert_data['marital_status'] = 2;
                            break;
                        case '未婚' :
                            $insert_data['marital_status'] = 1;
                            break;
                        default :
                            $insert_data['marital_status'] = 1;
                            break;
                    }

                    M('resume')->add($insert_data);
                    $eid = M()->getLastInsID();

                    //edu
                    $educationals = $data->educationals;
                    foreach ($educationals as $edu) {
                        $edu_data = [
                            'eid' => $eid,
                            'starttime' => $data->start_date,
                            'endtime' => $data->end_date,
                            'schoolName' => $data->school,
                            'majorName' => $data->profession,
                            'degree' => $data->education,
                            'school_category' => $data->school_category,
                            'recruitment' => $data->recruitment
                          ];
                        M('resume_edu')->add($edu_data);
                    }

                    M('resume_data')->add(['language' => $data->language_text]);
                    var_dump($data);
                    exit;
                }
            } else {
                exit();
            }
        } catch (Exception $ex) {
            
        }
    }

}
