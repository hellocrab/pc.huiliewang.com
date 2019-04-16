<?php

class CatchAction extends Action {

    const ZHANJOB_BASE_URL = "http://api.zhanjob.com/";
    const USER_ACCOUNT1 = "1020074734@qq.com";
    const USER_PASSWORD1 = "abc121224";
    const USER_ACCOUNT2 = "1637071754@qq.com";
    const USER_PASSWORD2 = "qinhaili19950624";
    const USER_ACCOUNT3 = "yh38615890@sina.cn";
    const USER_PASSWORD3 = "yh38615890";
    const USER_ACCOUNT4 = "995917894@qq.com";
    const USER_PASSWORD4 = "ghf995917894";

    private $login_url = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/user/login_account";
    private $resumes_list = self::ZHANJOB_BASE_URL . "zjob-resume/api/resume/library/company/resumes/limits";
    private $resumes = self::ZHANJOB_BASE_URL . "zjob-resume/api/web/resume/getResume";
    private $project_list = self::ZHANJOB_BASE_URL . "zjob-web/api/v1/project/get_con_project_page_list";
    private $machine_ids = [
        '172.18.69.143' => 1,
        '172.18.69.144' => 2,
        '172.18.69.142' => 3,
        '172.18.69.145' => 4
    ];
    private $mid = 0;

    public function __construct() {
        parent::__construct();
        $this->mid = $this->machine_ids[$_SERVER['SERVER_ADDR']];
        import("@.ORG.Curl");
    }

    public function userlogin() {
        exit;
        if($this->mid == 1){
            $login_data = ['account' => self::USER_ACCOUNT1, 'password' => self::USER_PASSWORD1];
        }elseif ($this->mid == 2) {
            $login_data = ['account' => self::USER_ACCOUNT2, 'password' => self::USER_PASSWORD2];
        }elseif ($this->mid == 3) {
            $login_data = ['account' => self::USER_ACCOUNT3, 'password' => self::USER_PASSWORD3];
        } else {
            $login_data = ['account' => self::USER_ACCOUNT4, 'password' => self::USER_PASSWORD4];
        }
        

        $result = Curl::send($this->login_url, $login_data, 'post', '', 1, Curl::CONTENT_TYPE_FORM_URLENCODE);
        var_dump($result);
        $content = json_decode($result['result']['content']);
        $token = $content->data->token;
        $auth = $content->data->auth;
        $userid = $content->data->user_id;
        M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->save(['status' => 1]);
        $res = M('catch_cookie')->add(['token' => $token, 'auth' => $auth, 'userid' => $userid, 'status' => 0,'mid' => $this->mid]);
    }

    public function getResumesLimit() {
        exit;
        var_dump($this->mid);
        $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();

        $a = M('catch_resumes_limit')->where(['m_id' => $this->mid])->order('id desc')->find();
        if (empty($a['id'])) {
            $limit_data = ['containsAny' => 0, 'pageNo' => 1, 'pageSize' => 50, 'userId' => $cookie['userid']];
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
                $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();
            }
            $content = json_decode($result['result']['content']);
            $data = $content->data;
            $page_count = $data->page_count;
            $list = $data->list;

            foreach ($list as $l) {
                $_list[] = $l->resumeId;
            }
            $resumes_list = implode(',', $_list);
            M('catch_resumes_limit')->add(['total' => $page_count, 'now' => 1, 'status' => 0, 'resumes_list' => $resumes_list, time => date('Y-m-d H:i:s', time()), 'm_id' => $this->mid]);
            exit;
        }

        $res = M('catch_resumes_limit')->where(['status' => 2, 'm_id' => $this->mid])->field('id')->order('id desc')->find();
        if ($res) {
            M('catch_resumes_limit')->where(['id' => $res['id'], 'm_id' => $this->mid])->save(['status' => 0]);
            exit;
        }

        $res_limit = M('catch_resumes_limit')->where(['status' => 0, 'm_id' => $this->mid])->field('id,now,resumes_list')->order('id desc')->find();
        if (empty($res_limit)) {
            $res1 = M('catch_resumes_limit')->where(['status' => 1, 'm_id' => $this->mid])->field('id,now,total')->order('id desc')->find();
            if ($res1['now'] + 1 < $res1['total']) {
                M('catch_resumes_limit')->add(['now' => $res1['now'] + 1, 'status' => 0, time => date('Y-m-d H:i:s', time()), 'm_id' => $this->mid]);
                $limit_id = M('catch_resumes_limit')->getLastInsID();

                $header = [
                    "Content-type: application/json;charset='utf-8'",
                    'Host:api.zhanjob.com',
                    "X-AUTH: {$cookie['token']}",
                    "X-Requested-With:XMLHttpRequest",
                    "X-USER:{$cookie['userid']}",
                    'Origin:http://www.zhanjob.com'
                ];

                $limit_data = ['containsAny' => 0, 'pageNo' => $res1['now'] + 1, 'pageSize' => 50, 'userId' => $cookie['userid']];
                $result = Curl::send($this->resumes_list, $limit_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                if (empty($result)) {
                    $this->userlogin();
                    $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();
                }
                $content = json_decode($result['result']['content']);
                $data = $content->data;
                $page_count = $content->data->page_count;
                $list = $content->data->list;

                foreach ($list as $l) {
                    $_list[] = $l->resumeId;
                }
                $resumes_list = implode(',', $_list);
                M('catch_resumes_limit')->where(['id' => $limit_id, 'm_id' => $this->mid])->save(['resumes_list' => $resumes_list, 'total' => $page_count]);
            } elseif (!$res1['total']) {
                $header = [
                    "Content-type: application/json;charset='utf-8'",
                    'Host:api.zhanjob.com',
                    "X-AUTH: {$cookie['token']}",
                    "X-Requested-With:XMLHttpRequest",
                    "X-USER:{$cookie['userid']}",
                    'Origin:http://www.zhanjob.com'
                ];

                $limit_data = ['containsAny' => 0, 'pageNo' => $res1['now'], 'pageSize' => 50, 'userId' => $cookie['userid']];
                $result = Curl::send($this->resumes_list, $limit_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                if (empty($result)) {
                    $this->userlogin();
                    $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();
                }
                $content = json_decode($result['result']['content']);
                $data = $content->data;
                $page_count = $content->data->page_count;
                $list = $content->data->list;

                foreach ($list as $l) {
                    $_list[] = $l->resumeId;
                }
                $resumes_list = implode(',', $_list);
                M('catch_resumes_limit')->where(['id' => $res1['id'], 'm_id' => $this->mid])->save(['resumes_list' => $resumes_list, 'total' => $page_count, 'status' => 0]);
            }
        } else {
            if (!$res_limit['resumes_list']) {
                $header = [
                    "Content-type: application/json;charset='utf-8'",
                    'Host:api.zhanjob.com',
                    "X-AUTH: {$cookie['token']}",
                    "X-Requested-With:XMLHttpRequest",
                    "X-USER:{$cookie['userid']}",
                    'Origin:http://www.zhanjob.com'
                ];

                $limit_data = ['containsAny' => 0, 'pageNo' => $res_limit['now'], 'pageSize' => 50, 'userId' => $cookie['userid']];
                $result = Curl::send($this->resumes_list, $limit_data, 'post', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                if (empty($result)) {
                    $this->userlogin();
                    $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();
                }
                $content = json_decode($result['result']['content']);
                $data = $content->data;
                $page_count = $content->data->page_count;
                $list = $content->data->list;

                foreach ($list as $l) {
                    $_list[] = $l->resumeId;
                }
                $resumes_list = implode(',', $_list);
                M('catch_resumes_limit')->where(['id' => $res_limit['id'], 'm_id' => $this->mid])->save(['resumes_list' => $resumes_list, 'total' => $page_count]);
            }
        }



    }
    
    public function getResumes() 
            {
        exit;
        $res = M('catch_resumes_limit')->where(['status' => 0, 'm_id' => $this->mid])->field('id,now,resumes_list')->order('id desc')->find();
        $cookie = M('catch_cookie')->where(['status' => 0, 'mid' => $this->mid])->find();
        $_list = explode(',', $res['resumes_list']);
        var_dump($_list);
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
                        $result = Curl::send($this->resumes, $resumes_data, 'get', '', 1, Curl::CONTENT_TYPE_JSON, $header);
                    }
                    
                    $content = json_decode($result['result']['content']);
                    $data = $content->data;

                    $insert_data = [
                        'name' => $data->name,
                        'creator_role_id' => 0,
                        'creator_role_name' => $data->create_user->cn_name,
                        'creator_role_phone' => $data->create_user->mobile,
                        'addtime' => strlen($data->create_time) > 10 ? substr($data->create_time, 0, 10) : $data->create_time,
                        'lastupdate' => strlen($data->modify_time) > 10 ? substr($data->modify_time, 0, 10) : $data->modify_time,
                        'file_path' => '',
                        'hits' => 0,
                        'status' => 0,
                        'integrity' => 80,
                        'basic_info' => 0,
                        'r_status' => '',
                        'location' => '',
                        'wantsalary' => 0,
                        'url' => '',
                        'language' => $data->language_text,
                        'evaluate' => $data->self_evaluation,
                        'birthYear' => $data->birth_year,
                        'birthMouth' => $data->birth_month,
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
                        'label' => '', //$data->labels,
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
//                    var_dump(M()->getLastSql());exit;
                    $eid = M()->getLastInsID();

                    //languages
                    $languages = $data->languages;
                    foreach ($languages as $lang) {
                        $languages_data = [
                            'eid' => $eid,
                            'language' => $lang->language,
                            'proficiency' => $lang->proficiency,
                            'grade' => $lang->grade,
                            'languageOther' => $lang->languageOther,
                            'listen_speak' => $lang->listen_speak,
                            'read_write' => $lang->read_write
                        ];
                        M('resume_languages')->add($languages_data);
                    }

                    //edu
                    $educationals = $data->educationals;
                    foreach ($educationals as $edu) {
                        $edu_data = [
                            'eid' => $eid,
                            'starttime' => $edu->start_date,
                            'endtime' => $edu->end_date,
                            'schoolName' => $edu->school,
                            'majorName' => $edu->profession,
                            'degree' => $edu->education,
                            'school_category' => $edu->school_category,
                            'recruitment' => $edu->recruitment
                        ];
                        M('resume_edu')->add($edu_data);
                    }

                    //work
                    $work_expers = $data->work_expers;
                    foreach ($work_expers as $we) {
                        $work_data = [
                            'eid' => $eid,
                            'work_exper_id' => $we->work_exper_id,
                            'starttime' => strlen($we->start_date) > 10 ? substr($we->start_date, 0, 10) : $we->start_date,
                            'endtime' => strlen($we->end_date) > 10 ? substr($we->end_date, 0, 10) : $we->end_date,
                            'company' => $we->company_name,
                            'companyDes' => $we->company_introduction,
                            'salary' => $we->salary,
                            'salary_remark' => $we->salary_remark,
                            'reasons_for_leaving' => $we->reasons_for_leaving
                        ];
                        M('resume_work')->add($work_data);
                        $work_inser_sql = M('resume_work')->getLastSql();
                        $work_id = M('resume_work')->getLastInsID();

                        //position
                        $position_expers = $we->position_expers;
                        foreach ($position_expers as $pe) {
                            $position_data = [
                                'work_id' => $work_id,
                                'position_exper_id' => $pe->position_exper_id,
                                'start_date' => strlen($we->start_date) > 10 ? substr($we->start_date, 0, 10) : $we->start_date,
                                'end_date' => strlen($we->end_date) > 10 ? substr($we->end_date, 0, 10) : $we->end_date,
                                'position' => $pe->position,
                                'city_id' => $pe->city_id,
                                'city_text' => $pe->city_text,
                                'report_to' => $pe->report_to,
                                'underling_num' => $pe->underling_num,
                                'department' => $pe->department,
                                'responsibility' => $pe->responsibility,
                                'performance' => $pe->performance
                            ];
                            M('resume_work_position')->add($position_data);
                        }
                    }

                    //project
                    $project_expers = $data->project_expers;
                    if (!empty($project_expers)) {
                        foreach ($project_expers as $pro_e) {
                            $project_data = [
                                'eid' => $eid,
                                'addtime' => 0,
                                'starttime' => strlen($pro_e->start_date) > 10 ? substr($pro_e->start_date, 0, 10) : $pro_e->start_date,
                                'endtime' => strlen($pro_e->end_date) > 10 ? substr($pro_e->end_date, 0, 10) : $pro_e->end_date,
                                'proName' => $pro_e->project_name,
                                'proOffice' => $pro_e->position,
                                'proDes' => $pro_e->description,
                                'proCompany' => $pro_e->company_name,
                                'project_exper_id' => $pro_e->project_exper_id,
                                'responsibility' => $pro_e->responsibility,
                                'performance' => $pro_e->performance
                            ];
                            M('resume_project')->add($project_data);
                        }
                    }

                    //data
                    $resumes_data = [
                        'language' => $data->language_text,
                        'evaluate' => $data->self_evaluation,
                        'eid' => $eid
                    ];
                    M('resume_data')->add($resumes_data);
                    M('catch_resumes_limit')->where(['id' => $res['id'], 'm_id' => $this->mid])->save(['status' => 1]);
                }
            } else {

                exit();
            }
        } catch (Exception $ex) {
            M('catch_resumes_limit')->where(['id' => $res['id'], 'm_id' => $this->mid])->save(['status' => 2]);
        }
    }

}
