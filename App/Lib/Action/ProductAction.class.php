<?php

class ProductAction extends Action
{

    protected static $degree = [
        1 => '高中',
        2 => '中专',
        3 => '大专',
        4 => '本科',
        5 => '硕士',
        6 => '博士',
        7 => 'MBA/EMBA',
        8 => '博士后'
    ];

    public function _initialize()
    {
        $title = "人才管理";
        $this->assign("title", $title);

//		$action = array(
//			'permission'=>array('getProductByBusiness'),
//			'allow'=>array('adddialog','editdialog', 'allproductdialog','validate','check','delimg','sortimg','mutildialog','changecontent','getmonthlyamount','getmonthlysales','getcurrentstatus','mutildialog_product_contract','mutildialog_product','advance_search','categorylist')
//		);
//		B('Authenticate', $action);
//		$this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);
    }

    /**
     *  Ajax检测产品名称
     *
     * */
    public function check()
    {
        if ($_REQUEST['product_id']) {
            $where['product_id'] = array('neq', $_REQUEST['product_id']);
        }
        import("@.ORG.SplitWord");
        $sp = new SplitWord();
        $m_product = M('Product');
        if ($this->isAjax()) {
            //$fields_info = M('Fields')->where(array('model'=>'product','field'=>'name'))->field('is_validate,is_unique')->find();
            //if(intval($fields_info['is_validate']) == 1 && intval($fields_info['is_unique']) == 1){
            $split_result = $sp->SplitRMM($_POST['name']);
            if (!is_utf8($split_result))
                $split_result = iconv("GB2312//IGNORE", "UTF-8", $split_result);
            $result_array = explode(' ', trim($split_result));
            $name_list = $m_product->where($where)->getField('name', true);
            $seach_array = array();
            foreach ($name_list as $k => $v) {
                $search = 0;
                foreach ($result_array as $k2 => $v2) {
                    if (strpos($v, $v2) > -1) {
                        $v = str_replace("$v2", "<span style='color:red;'>$v2</span>", $v, $count);
                        $search += $count;
                    }
                }
                if ($search > 0)
                    $seach_array[$k] = array('value' => $v, 'search' => $search);
            }
            $seach_sort_result = array_sort($seach_array, 'search', 'desc');
            if (empty($seach_sort_result)) {
                $this->ajaxReturn(0, '可以添加', 0);
            } else {
                $this->ajaxReturn($seach_sort_result, '已创建相近产品', 1);
            }
            //}else{
            //	$this->ajaxReturn(0,'可以添加',0);
            //}
        }
    }

    public function get_hash_table($table, $code, $s = 256)
    {
        $hash = sprintf("%u", crc32($code));
        $hash1 = intval(fmod($hash, $s));
        return $table . "_" . $hash1;
    }

    public function favorite()
    {
        $eid = I("eid");
        if ($eid) {
            $data['eid'] = $eid;
            $data['role_id'] = session("role_id");
            $result = M("resume_collection")->where($data)->find();
            if ($result) {
                $this->ajaxReturn('', '已收藏！', 3);
            } else {
                $data['addtime'] = time();
                $results = M("resume_collection")->add($data);
                if ($results) {
                    $this->ajaxReturn('1', '收藏成功！', 1);
                } else {
                    $this->ajaxReturn('1', '收藏失败！', 2);
                }
            }
        } else {
            $this->ajaxReturn('1', '参数错误！', 2);
        }
    }

    public function unfavorite()
    {
        $eid = I("eid");
        if ($eid) {
            $data['eid'] = $eid;
            $data['role_id'] = session("role_id");
            $result = M("resume_collection")->where($data)->find();
            if ($result) {
                $results = M("resume_collection")->where($data)->delete();
                if ($results) {
                    $this->ajaxReturn('1', '取消收藏成功！', 1);
                } else {
                    $this->ajaxReturn('', '取消收藏失败！', 2);
                }
            } else {
                $this->ajaxReturn('1', '该简历未收藏！', 2);
            }
        } else {
            $this->ajaxReturn('1', '参数错误！', 2);
        }
    }

    /**
     * 产品验证
     *
     * */
    public function validate()
    {
        if ($this->isAjax()) {
            if (!$this->_request('clientid', 'trim') || !$this->_request($this->_request('clientid', 'trim'), 'trim'))
                $this->ajaxReturn("", "", 3);
            $field = M('Fields')->where('model = "product" and field = "%s"', $this->_request('clientid', 'trim'))->find();
            $m_product = $field['is_main'] ? D('Product') : D('ProductData');
            $where[$this->_request('clientid', 'trim')] = array('eq', $this->_request($this->_request('clientid', 'trim'), 'trim'));
            if ($this->_request('id', 'intval', 0)) {
                $where[$m_product->getpk()] = array('neq', $this->_request('id', 'intval', 0));
            }
            if ($this->_request('clientid', 'trim')) {
                if ($m_product->where($where)->find()) {
                    $this->ajaxReturn("", "", 1);
                } else {
                    $this->ajaxReturn("", "", 0);
                }
            } else {
                $this->ajaxReturn("", "", 0);
            }
        }
    }

    public function index()
    {

        $by = $this->_get('by', 'trim');
        if ($by == 'favorite') {
            $eids = M("resume_collection")->where("role_id=%d", session("role_id"))->getField("eid", true);
            $where['eid'] = array('in', $eids);
        }
        if ($by == 'myself') {
            $where['creator_role_id'] = session("role_id");
        }
//        if ($by != 'deleted') {
//            $where['is_deleted'] = array('neq',1);
//            unset($where['by']);
//        }

        if ($_GET['listrows']) {
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        } else {
            $listrows = 15;
            $params[] = "listrows=15";
        }
        $this->listrows = $listrows;


        import('@.ORG.Page'); // 导入分页类

        $resume = M("resume");


        $where['is_show'] = 1;
        $where['model'] = "resume";
        $this->field_list = M('Fields')->where($where)->order('order_id ASC')->select();
        //自定义字段
        $field_array = getIndexFields('resume');
        $name_field_array = array();
        foreach ($field_array as $k => $v) {
            $name_field_array[] = $v;
        }
        $this->field_array = $name_field_array;

        //普通查询
        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
            if ($this->_request('state')) {
                $state = $this->_request('state', 'trim');
                $address_where[] = '%' . $state . '%';
                if ($this->_request('city')) {
                    $city = $this->_request('city', 'trim');
                    $address_where[] = '%' . $city . '%';
                    if ($this->_request('area')) {
                        $area = $this->_request('area', 'trim');
                        $address_where[] = '%' . $this->_request('area', 'trim') . '%';
                    }
                }
                if ($search)
                    $address_where[] = '%' . $search . '%';
                $params = array('field=' . trim($_REQUEST['field']), 'condition=' . $condition, 'state=' . $this->_request('state', 'trim'), 'city=' . $this->_request('city', 'trim'), 'area=' . $this->_request('area', 'trim'), 'search=' . $this->_request('search', 'trim'));
                if ($condition == 'not_contain') {
                    $where[$field] = array('notlike', $address_where, 'OR');
                } else {
                    $where[$field] = array('like', $address_where, 'AND');
                }
            } else {

                if ($field == 'name') {
                    //$where['name'] = array('like',$search);
                    $c_where['_string'] = 'name like "%' . $search . '%" or telephone like "%' . $search . '%"';
                    if (strlen($search) == 11 && is_numeric($search)) {
                        $where['telephone'] = array('eq', $search);
                    } else {
                        $where['name'] = array('like', '%' . $search . '%');
                    }
                }
            }
            //过滤不在权限范围内的role_id
            if (trim($_REQUEST['field']) == 'owner_role_id') {
                if (!in_array(trim($search), $this->_permissionRes)) {
                    $where['owner_role_id'] = array('in', implode(',', $this->_permissionRes));
                }
            }
        }
        //多选类型字段
        $check_field_arr = M('Fields')->where(array('model' => 'customer', 'form_type' => 'box', 'setting' => array('like', '%' . "'type'=>'checkbox'" . '%')))->getField('field', true);
        //高级搜索
        if (!$_GET['field']) {
            $no_field_array = array('act', 'content', 'p', 'condition', 'listrows', 'daochu', 'this_page', 'current_page', 'export_limit', 'desc_order', 'asc_order', 'selectexcelxport', 'by', 'scene_id', 'order_field', 'order_type');

            foreach ($_GET as $k => $v) {
                if (!in_array($k, $no_field_array)) {
                    if ($k == "industry" && $v) {
                        if ($where['_string']) {
                            $where['_string'] .= " and FIND_IN_SET('" . $v . "',industry)";
                        } else {
                            $where['_string'] = "FIND_IN_SET('" . $v . "',industry)";
                        }
                    } elseif ($k == "job_class" && $v) {
                        if ($where['_string']) {
                            $where['_string'] .= " and FIND_IN_SET('" . $v . "',job_class)";
                        } else {
                            $where['_string'] = "FIND_IN_SET('" . $v . "',job_class)";
                        }
                    } elseif ($k == "intentCity" && $v) {
                        if ($where['_string']) {
                            $where['_string'] .= " and FIND_IN_SET('" . $v . "',intentCity)";
                        } else {
                            $where['_string'] = "FIND_IN_SET('" . $v . "',intentCity)";
                        }
                    } elseif ($k == "creater_role_id" && $v) {
                        $v = $v['value'];
                        $where['creator_role_id'] = $v;
                    } elseif (is_array($v)) {
                        if ($v['state']) {
                            $address_where[] = '%' . $v['state'] . '%';

                            if ($v['city']) {
                                $address_where[] = '%' . $v['city'] . '%';

                                if ($v['area']) {
                                    $address_where[] = '%' . $v['area'] . '%';
                                }
                            }
                            if ($v['search'])
                                $address_where[] = '%' . $v['search'] . '%';

                            if ($v['condition'] == 'not_contain') {
                                $where[$k] = array('notlike', $address_where, 'OR');
                            } else {
                                $where[$k] = array('like', $address_where, 'AND');
                            }
                        } elseif (($v['start'] != '' || $v['end'] != '')) {
                            if ($k == 'create_time') {
                                $k = 'customer.create_time';
                            } elseif ($k == 'update_time') {
                                $k = 'customer.update_time';
                            }
                            //时间段查询
                            if ($v['start'] && $v['end']) {
                                $where[$k] = array('between', array(strtotime($v['start']), strtotime($v['end']) + 86399));
                            } elseif ($v['start']) {
                                $where[$k] = array('egt', strtotime($v['start']));
                            } else {
                                $where[$k] = array('elt', strtotime($v['end']) + 86399);
                            }
                        } elseif (($v['value']) != '') {
                            if (in_array($k, $check_field_arr)) {
                                $where[$k] = field($v['value'], 'contains');
                            } else {
                                if ($k == 'status_id') {
                                    $business_map['status_id'] = $v['value'];
                                } else {
                                    // $v['condition'] = $v['condition'] ? : 'contains';
                                    $where[$k] = field($v['value'], $v['condition']);
                                }
                            }
                        }
                    } else {
                        if (!empty($v)) {
                            $where[$k] = field($v);
                        }
                    }
                }
                if ($k == 'resume.addtime') {
                    $k = 'addtime';
                } elseif ($k == 'resume.lastupdate') {
                    $k = 'lastupdate';
                }
                if (is_array($v)) {

                    foreach ($v as $key => $value) {
                        $params[] = $k . '[' . $key . ']=' . $value;
                    }
                } else {
                    $params[] = $k . '=' . $v;
                }
            }
        }

        foreach ($params as $k => $v) {
            if (strpos($v, '[condition]=') || strpos($v, '[value]=') || strpos($v, '[state]=') || strpos($v, '[city]=') || strpos($v, '[area]=') || strpos($v, '[start]=') || strpos($v, '[end]=')) {
                $field = explode('[', $v);

                if (strpos($field[0], '.')) {
                    $ex_field = explode('.', $field[0]);
                    $field[0] = $ex_field[1];
                }

                if (strpos($v, '[condition]=')) {
                    $condition = explode('=', $v);
                    $fields_search[$field[0]]['field'] = $field[0];
                    $fields_search[$field[0]]['condition'] = $condition[1];
                } elseif (strpos($v, '[state]=')) {
                    $state = explode('=', $field[1]);
                    $fields_search[$field[0]]['state'] = $state[1];
                } elseif (strpos($v, '[city]=')) {
                    $city = explode('=', $field[1]);
                    $fields_search[$field[0]]['city'] = $city[1];
                } elseif (strpos($v, '[area]=')) {
                    $area = explode('=', $field[1]);
                    $fields_search[$field[0]]['area'] = $area[1];
                } elseif (strpos($v, '[start]=')) {
                    $start = explode('=', $field[1]);
                    $fields_search[$field[0]]['field'] = $field[0];
                    $fields_search[$field[0]]['start'] = $start[1];
                } elseif (strpos($v, '[end]=')) {
                    $end = explode('=', $field[1]);
                    $fields_search[$field[0]]['end'] = $end[1];
                } else {
                    $value = explode('=', $v);
                    if ($fields_search[$field[0]]['field']) {
                        $fields_search[$field[0]]['value'] = $value[1];
                    } else {
                        $fields_search[$field[0]]['field'] = $field[0];
                        $fields_search[$field[0]]['condition'] = 'eq';
                        $fields_search[$field[0]]['value'] = $value[1];
                    }
                }
                $fields_search[$field[0]]['form_type'] = $fields_data_list[$field[0]];
            }
        }


        $count = $resume->where($where)->count() ? $resume->where($where)->count() : '0';

        $p_num = ceil($count / $listrows);
        $p = isset($_GET['p']) ? $_GET['p'] : 1;
        if ($p_num < $p) {
            $p = $p_num;
        }

        //客户导出
        if (trim($_GET['act']) == 'excel') {
            $dc_id = $_GET['daochu'];
            if ($dc_id != '') {
                $where['eid'] = array('in', $dc_id);
            }
            $list = $resume->where($where)->order('addtime desc')->Page($p . ',' . $listrows)->select();
            if (checkPerByAction('resume', 'excelexport')) {
                session('export_status', 1);
                foreach ($list as $k => $li) {
                    if ($list[$k]['industry']) {
                        $industry = explode(",", $list[$k]['industry']);
                        $data = "";
                        foreach ($industry as $l) {
                            $data[] = $industry_name[$l];
                        }
                        $list[$k]['industry'] = implode(",", $data);
                    }

                    if ($list[$k]['job_class']) {
                        $job_class = explode(",", $list[$k]['job_class']);
                        $data = "";
                        foreach ($job_class as $l) {
                            $data[] = $job_name[$l];
                        }
                        $list[$k]['job_class'] = implode(",", $data);
                    }
                    if ($list[$k]['intentCity']) {
                        $intentCity = explode(",", $list[$k]['intentCity']);
                        $data = "";
                        foreach ($intentCity as $l) {
                            $data[] = $city_name[$l];
                        }
                        $list[$k]['intentCity'] = implode(",", $data);
                    }
                    if ($list[$k]['location']) {
                        $list[$k]['location'] = $city_name[$list[$k]['location']];
                    }
                    if ($list[$k]['sex']) {
                        $list[$k]['sex'] = $list[$k]['sex'] == 1 ? "男" : "女";
                    }
                }
                $this->excelExport($list);
            } else {
                alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            $list = $resume->where($where)->order('addtime desc')->Page($p . ',' . $listrows)->select();
        }

        foreach ($list as $key => $li) {
            $where = "";
            $where['eid'] = $li['eid'];
            $where['role_id'] = session("role_id");
            $list[$key]['favorite'] = M("resume_collection")->where($where)->find();
            $list[$key]['birthday'] <= 0 && $list[$key]['birthday'] = strtotime("{$list[$key]['birthYear']}-{$list[$key]['birthMouth']}");
        }
        include APP_PATH . "Common/job.cache.php";
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";
        $this->assign('city_name', $city_name);
        $this->assign('industry_name', $industry_name);
        $this->assign('job_name', $job_name);

        $Page = new Page($count, $listrows); // 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show(); // 分页显示输出


        $this->assign('list', $list); // 赋值数据集
        $this->assign('page', $show); // 赋值分页输出
        $this->assign('count', $count);
        $this->fields_search = $fields_search;
        $this->alert = parseAlert();
        $this->display(); // 输出模板
    }

    public function edit()
    {
        header("Content-type: text/html; charset=utf-8");
        if ($this->isPost()) {
            header("Content-type: text/html; charset=utf-8");
            $eid = $_POST['eid'];

            $m_resume = D('Resume');
//            $m_customer_data = D('CustomerData');
            $field_list = M('Fields')->where(array('model' => 'resume', 'in_add' => 1))->order('order_id')->select();
            $_POST['birthday'] = strtotime($_POST['birthday']);
            if($_POST['birthday']){
                $bluck = $_POST['birthday'];
                $_POST['birthYear'] = intval(date('Y',$bluck));
                $_POST['birthMouth'] = intval(date("m",$bluck));
            }
            $_POST['startWorkyear'] = date('Y',strtotime($_POST['startWorkyear']));

            $projectExp = $_POST['projectExp'];
            $eduExp = $_POST['eduExp'];
            $workExp = $_POST['workExp'];
            unset($_POST['eduExp']);
            unset($_POST['workExp']);
            unset($_POST['projectExp']);
            unset($_POST['customer_id']);
            unset($_POST['business_name']);
            $_POST['isperfect'] = $_POST['isperfect'] ? 1 : 0;
            M("resume")->create();
            $_POST['lastupdate'] = time();
            $result = M("resume")->where("eid=%d", $eid)->save($_POST);

            if ($result) {
                if ($workExp) {
                    M("resume_work")->where("eid=%d", $eid)->delete();
                    for ($i = 0; $i < count($workExp['starttime']); $i++) {
                        $data = "";
                        $data['starttime'] = strtotime($workExp['starttime'][$i]);
                        $data['endtime'] = strtotime($workExp['endtime'][$i]);
                        $data['company'] = $workExp['company'][$i];
                        $data['companyDes'] = $workExp['companyDes'][$i];
                        $data['jobPosition'] = $workExp['jobPosition'][$i];
                        $data['depart'] = $workExp['depart'][$i];
                        $data['duty'] = $workExp['duty'][$i];
                        $data['eid'] = $eid;
                        M("resume_work")->add($data);
                    }
                }

                if ($eduExp) {
                    M("resume_edu")->where("eid=%d", $eid)->delete();
                    for ($i = 0; $i < count($eduExp['starttime']); $i++) {
                        $data = "";
                        $data['starttime'] = strtotime($eduExp['starttime'][$i]);
                        $data['endtime'] = strtotime($eduExp['endtime'][$i]);
                        $data['schoolName'] = $eduExp['schoolName'][$i];
                        $data['majorName'] = $eduExp['majorName'][$i];
                        $data['degree'] = $eduExp['degree'][$i];
                        $data['eid'] = $eid;
                        M("resume_edu")->add($data);
                    }
                }


                if ($projectExp) {
                    M("resume_project")->where("eid=%d", $eid)->delete();
                    for ($i = 0; $i < count($projectExp['starttime']); $i++) {
                        $data = "";
                        $data['starttime'] = strtotime($projectExp['starttime'][$i]);
                        $data['endtime'] = strtotime($projectExp['endtime'][$i]);
                        $data['proName'] = $projectExp['proName'][$i];
                        $data['proCompany'] = $projectExp['proCompany'][$i];
                        $data['proOffice'] = $projectExp['proOffice'][$i];
                        $data['proDes'] = $projectExp['proDes'][$i];
                        $data['eid'] = $eid;
                        M("resume_project")->add($data);
                    }
                }
                //候选人加入项目
                $businessId = $_POST['business_id'];
                if ($businessId) {
                    $businessInfo = M("business")->where("business_id=%d", $businessId)->field("customer_id")->find();
                    $data = [];
                    $data['resume_id'] = $eid;
                    $data['project_id'] = $_POST['business_id'];
                    $data['tracker'] = session("role_id");
                    $data['com_id'] = $businessInfo['customer_id'];
                    $data['status'] = 1;

                    $where = ['resume_id'=>$eid,'project_id'=>$businessId,'com_id'=>$businessInfo['customer_id']];
                    if(!M("fine_project")->where($where)->find()){
                        $data['addtime'] = time();
                        M("fine_project")->add($data);
                    }else{
                        M("fine_project")->where($where)->save($data);
                    }
                    alert('success', L('PRODUCT_ADDED_SUCCESSFULLY'), U('business/view', 'id=' . $_POST['business_id']));
                }

                alert('success', L('PRODUCT_EDIT_SUCCESS'), U('product/index'));
            } else {
                $this->error("写入数据失败");
            }
        } else {
            if (I("id")) {
                $where['eid'] = I("id");
                $info = M("resume")->where($where)->find();
                $this->resume_work = M("resume_work")->where($where)->select();
                $this->resume_edu = M("resume_edu")->where($where)->select();
                $this->resume_project = M("resume_project")->where($where)->select();
                $alert = parseAlert();
                $this->alert = $alert;
                $info['birthday'] = $info['birthday'] > 0 ? $info['birthday'] : strtotime("{$info['birthYear']}-{$info['birthMouth']}");
                $resume = $info;
                strlen($resume['startWorkyear']) > 4 && $resume['startWorkyear'] = date('Y-m',$resume['startWorkyear']);
                $this->assign('resume',$resume);
            }
//            $m_warehouse = M('warehouse');
            // $this->house_list = $m_warehouse ->select();
//            $field_list = field_list_html("add","product");
            //dump($field_list);die;
//            $this->field_list = $field_list;
//            $this->alert = parseAlert();
            $this->display();
        }
    }

    public function add1()
    {
        if ($this->isPost()) {
            header("Content-type: text/html; charset=utf-8");
            var_dump($_POST);
            exit();
            $index['sex'] = $_POST['sex'];
//		    $index['jobs_id'] = $_POST['jobs_id'];
//		    $index['jobs_id1'] = $_POST['jobs_id1'];
//		    $index['jobs_id2'] = $_POST['jobs_id2'];
            $index['edu'] = $_POST['education'];
            $index['addtime'] = time();
            $index['lastupdate'] = time();


            $data['name'] = $_POST['name'];
            $data['sex'] = $_POST['sex'];
            $data['telephone'] = $_POST['telephone'];
            $data['edu'] = $_POST['education'];
            if ($_POST['workExp']) {
                $num = count($_POST['workExp']['startDateStr']);
                for ($i = 0; $i < $num; $i++) {
                    $work_content[$i]['startDateStr'] = strtotime($_POST['workExp']['startDateStr'][$i]);
                    $work_content[$i]['endDateStr'] = strtotime($_POST['workExp']['endDateStr'][$i]);
                    $work_content[$i]['companyName'] = $_POST['workExp']['companyName'][$i];
                    $work_content[$i]['posName'] = $_POST['workExp']['posName'][$i];
                    $work_content[$i]['workDes'] = $_POST['workExp']['workDes'][$i];
                }
                $data['work_content'] = serialize($work_content);
            }


            if ($_POST['projectExp']) {
                $num = count($_POST['projectExp']['startDateStr']);
                for ($i = 0; $i < $num; $i++) {
                    $project_content[$i]['startDateStr'] = strtotime($_POST['projectExp']['startDateStr'][$i]);
                    $project_content[$i]['endDateStr'] = strtotime($_POST['projectExp']['endDateStr'][$i]);
                    $project_content[$i]['proName'] = $_POST['projectExp']['proName'][$i];
                    $project_content[$i]['projectOffice'] = $_POST['projectExp']['projectOffice'][$i];
                    $project_content[$i]['proDes'] = $_POST['projectExp']['proDes'][$i];
                }
                $data['project_content'] = serialize($project_content);
            }

            if ($_POST['eduExp']) {
                $num = count($_POST['eduExp']['startDateStr']);
                for ($i = 0; $i < $num; $i++) {
                    $edu_content[$i]['startDateStr'] = strtotime($_POST['eduExp']['startDateStr'][$i]);
                    $edu_content[$i]['endDateStr'] = strtotime($_POST['eduExp']['endDateStr'][$i]);
                    $edu_content[$i]['schoolName'] = $_POST['eduExp']['schoolName'][$i];
                    $edu_content[$i]['majorName'] = $_POST['eduExp']['majorName'][$i];
                    $edu_content[$i]['degree'] = $_POST['eduExp']['degree'][$i];
                }
                $data['edu_content'] = serialize($edu_content);
            }
            $data['addtime'] = time();
            $data['lastupdate'] = time();

            $index_id = M("resume_index", 'huilie_', 'connection')->add($index);
            $data['id'] = $index_id;
            $tablename = $this->get_hash_table("resume", $index_id);
            $id = M($tablename, 'huilie_', 'connection')->add($data);
            if ($id) {
                alert('success', L('PRODUCT_ADDED_SUCCESSFULLY'), U('product/index'));
            } else {
                $this->error("写入数据失败");
            }
        } else {
            $m_warehouse = M('warehouse');
            // $this->house_list = $m_warehouse ->select();
            $field_list = field_list_html("add", "product");
            //dump($field_list);die;
            $this->field_list = $field_list;
            $this->alert = parseAlert();
            $this->display();
        }
    }

    public function check_tel()
    {
        if ($_POST) {
            $where['telephone'] = intval($_POST['telephone']);
            $id = M("resume")->where($where)->find();

            if ($id) {
                echo "电话已存在";
                exit();
            }
        }
    }

    public function add()
    {
        if ($this->isPost()) {
            header("Content-type: text/html; charset=utf-8");
//            var_dump($_POST);exit();
            $m_resume = D('Resume');
//            $m_customer_data = D('CustomerData');
            $field_list = M('Fields')->where(array('model' => 'resume', 'in_add' => 1))->order('order_id')->select();
            $_POST['birthday'] = strtotime($_POST['birthday']);
            if($_POST['birthday']){
                $bluck = $_POST['birthday'];
                $_POST['birthYear'] = intval(date('Y',$bluck));
                $_POST['birthMouth'] = intval(date("m",$bluck));
            }
            $_POST['startWorkyear'] = strtotime($_POST['startWorkyear']);
            $_POST['addtime'] = time();
            $_POST['lastupdate'] = time();
            $_POST['isperfect'] = $_POST['isperfect'] ? 1 : 0;
            $_POST['creator_role_id'] = session("role_id");
            $projectExp = $_POST['projectExp'];
            $eduExp = $_POST['eduExp'];
            $workExp = $_POST['workExp'];
            unset($_POST['eduExp']);
            unset($_POST['workExp']);
            unset($_POST['projectExp']);
            M("resume")->create();
            $eid = M("resume")->add();

            if ($eid) {
                for ($i = 0; $i < count($workExp['starttime']); $i++) {
                    $data = "";
                    $data['starttime'] = strtotime($workExp['starttime'][$i]);
                    $data['endtime'] = strtotime($workExp['endtime'][$i]);
                    $data['company'] = $workExp['company'][$i];
                    $data['companyDes'] = $workExp['companyDes'][$i];
                    $data['jobPosition'] = $workExp['jobPosition'][$i];
                    $data['depart'] = $workExp['depart'][$i];
                    $data['duty'] = $workExp['duty'][$i];
                    $data['eid'] = $eid;
                    M("resume_work")->add($data);
                }

                for ($i = 0; $i < count($eduExp['starttime']); $i++) {
                    $data = "";
                    $data['starttime'] = strtotime($eduExp['starttime'][$i]);
                    $data['endtime'] = strtotime($eduExp['endtime'][$i]);
                    $data['schoolName'] = $eduExp['schoolName'][$i];
                    $data['majorName'] = $eduExp['majorName'][$i];
                    $data['degree'] = $eduExp['degree'][$i];
                    $data['eid'] = $eid;
                    M("resume_edu")->add($data);
                }


                for ($i = 0; $i < count($projectExp['starttime']); $i++) {
                    $data = "";
                    $data['starttime'] = strtotime($projectExp['starttime'][$i]);
                    $data['endtime'] = strtotime($projectExp['endtime'][$i]);
                    $data['proName'] = $projectExp['proName'][$i];
                    $data['proCompany'] = $projectExp['proCompany'][$i];
                    $data['proOffice'] = $projectExp['proOffice'][$i];
                    $data['proDes'] = $projectExp['proDes'][$i];
                    $data['eid'] = $eid;
                    M("resume_project")->add($data);
                }


                if ($_POST['business_id']) {
                    $customer_id = M("business")->where("business_id=%d", $_POST['business_id'])->field("customer_id")->find();
                    $data = [];
                    $data['resume_id'] = $eid;
                    $data['project_id'] = $_POST['business_id'];
                    $data['tracker'] = session("role_id");
                    $data['com_id'] = $customer_id['customer_id'];
                    $data['status'] = 1;
                    $data['addtime'] = time();
                    M("fine_project")->add($data);
                    alert('success', L('PRODUCT_ADDED_SUCCESSFULLY'), U('business/view', 'id=' . $_POST['business_id']));
                } else {
                    alert('success', L('PRODUCT_ADDED_SUCCESSFULLY'), U('product/index'));
                }
            } else {
                $this->error("写入数据失败");
            }
        } else {

            if (I('pro_id')) {
                $this->project_name = M("business")->where("business_id=%d", I('pro_id'))->getField("name");
            }
            $m_warehouse = M('warehouse');
            // $this->house_list = $m_warehouse ->select();
            $field_list = field_list_html("add", "product");
            //dump($field_list);die;
            $this->field_list = $field_list;
            $this->alert = parseAlert();
            $this->display();
        }
    }

    public function add_more()
    {
        $this->display();
    }

    public function view2222()
    {
        $product_id = isset($_GET['id']) ? intval($_GET['id']) : 0;
        $field_list = M('Fields')->where('model = "product"')->order('order_id')->select();
        foreach ($field_list as $k => $v) {
            if (trim($v['input_tips'])) {
                $input_tips = ' &nbsp; <span style="color:red">(' . L('INFUSE') . $v['input_tips'] . ')</span>';
            } else {
                $input_tips = '';
            }
        }
        if (0 == $product_id) {
            alert('error', L('PARAMETER_ERROR'), U('product/index'));
        } else {
            $product = D('ProductView')->where('product.product_id = %d', $product_id)->find();
            $product['owner'] = D('RoleView')->where('role.role_id = %d', $product['creator_role_id'])->find();
            $log_ids = M('rLogProduct')->where('product_id = %d', $product_id)->getField('log_id', true);
            if (!empty($log_ids)) {
                $product['log'] = M('log')->where('log_id in (%s)', implode(',', $log_ids))->select();
            }
            $log_count = 0;
            foreach ($product['log'] as $key => $value) {
                $product['log'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['role_id'])->find();
                $log_count++;
            }
            $product['log_count'] = $log_count;

            $file_ids = M('rFileProduct')->where('product_id = %d', $product_id)->getField('file_id', true);
            if (!empty($file_ids)) {
                $product['file'] = M('file')->where('file_id in (%s)', implode(',', $file_ids))->select();
                $file_count = 0;
                foreach ($product['file'] as $key => $value) {
                    $product['file'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['role_id'])->find();
                    $product['file'][$key]['size'] = ceil($value['size'] / 1024);
                    /* 判断文件格式 对应其图片 */
                    $houzhui = getExtension($value['name']);
                    switch ($houzhui) {
                        case 'doc':
                            $pic = 'doc.png';
                            break;
                        case 'docx':
                            $pic = 'doc.png';
                            break;
                        case 'pptx':
                            $pic = 'ppt.png';
                            break;
                        case 'ppt':
                            $pic = 'ppt.png';
                            break;
                        case 'xls':
                            $pic = 'excel.png';
                            break;
                        case 'zip':
                            $pic = 'zip.png';
                            break;
                        case 'zip':
                            $pic = 'zip.png';
                            break;
                        case 'pdf':
                            $pic = 'pdf.png';
                            break;
                        case 'png':
                            $pic = 'pic.png';
                            break;
                        case 'jpg':
                            $pic = 'pic.png';
                            break;
                        case 'jpeg':
                            $pic = 'pic.png';
                            break;
                        case 'gif':
                            $pic = 'pic.png';
                            break;
                        default:
                            $pic = 'unknown.png';
                            break;
                    }
                    $product['file'][$key]['pic'] = $pic;

                    $file_count++;
                }
                $product['file_count'] = $file_count;
            }

            //产品图片
            $m_product_images = M('productImages');
            $product['images']['main'] = $m_product_images->where('product_id = %d and is_main = 1', $product_id)->find();
            $product['images']['secondary'] = $m_product_images->where('product_id = %d and is_main = 0', $product_id)->order('listorder asc')->select();
            foreach ($field_list as $k => $v) {
                if ($v['field'] == 'category_id') {
                    $field_list[$k]['field'] = 'category_name';
                }
                if (stristr('http://', $v['default_value']) && 'http://' != $product[$v['field']] && '' != $product[$v['field']]) {
                    $product[$v['field']] = '<a href=' . $product[$v['field']] . ' target="_blank">' . $product[$v['field']] . '</a>';
                }
            }
            //日程信息
            $m_event = M('event');
            $m_user = M('user');
            $event_list = $m_event->where('module ="product" and module_id =%d', $product_id)->select();
            foreach ($event_list as $k => $v) {
                $event_list[$k]['create_role_name'] = $m_user->where('role_id =%d', $v['creator_role_id'])->getField('full_name');
                $event_list[$k]['img'] = $m_user->where('role_id =%d', $v['creator_role_id'])->getField('img');
            }
            $this->event_list = $event_list;
            $this->product = $product;
            $this->field_list = $field_list;
            $this->alert = parseAlert();
            $this->display();
        }
    }

    public function addmark()
    {
        $this->status_list = M('LogStatus')->select();
        $this->display();
    }

    public function view()
    {
        $this->status_list = M('LogStatus')->select();
        include APP_PATH . "Common/job.cache.php";
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";
        $eid = I("id");
        $resume = D("ResumeView")->where("resume.eid=%d", $eid)->find();
        $resume['label'] = explode(",", $resume['label']);
        if ($resume['startWorkyear']) {
            $startYear =  $resume['startWorkyear'];
            strlen($resume['startWorkyear']) > 4 && $startYear = date('Y',$resume['startWorkyear']);
            $resume['exp'] = date("Y") - $startYear . "年工作经验";
        }
        if ($resume['location']) {
            $resume['location'] = $city_name[$resume['location']];
        }
        if ($resume['birthYear']) {
            $resume['age'] = date("Y") - $resume['birthYear'];
        } else {
            if ($resume['birthday'])
                $resume['age'] = date("Y") - date('Y', $resume['birthday']);
            else
                $resume['age'] = '';
        }
        $resume['birthday'] > 0 ? $resume['birthday'] : strtotime("{$resume['birthYear']}-{$resume['birthMouth']}");
        if (!$resume['birthMouth']) {
            $resume['birthMouth'] = date("Y") - date('m', $resume['birthday']);
        } else {

            $resume['birthMouth'] = '-' . $resume['birthMouth'];
        }

        //文件
        $file_ids = M('rResumeFile')->where('resume_id = %d', $eid)->getField('file_id', true);
        $info['file'] = M('file')->where('file_id in (%s)', implode(',', $file_ids))->select();
        $file_count = 0;
        foreach ($info['file'] as $key => $value) {
            $info['file'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['role_id'])->find();
            $info['file'][$key]['size'] = ceil($value['size'] / 1024);
            /* 判断文件格式 对应其图片 */
            $houzhui = getExtension($value['name']);
            switch ($houzhui) {
                case 'doc':
                    $pic = 'doc.png';
                    break;
                case 'docx':
                    $pic = 'doc.png';
                    break;
                case 'pptx':
                    $pic = 'ppt.png';
                    break;
                case 'ppt':
                    $pic = 'ppt.png';
                    break;
                case 'xls':
                    $pic = 'excel.png';
                    break;
                case 'zip':
                    $pic = 'zip.png';
                    break;
                case 'zip':
                    $pic = 'zip.png';
                    break;
                case 'pdf':
                    $pic = 'pdf.png';
                    break;
                case 'png':
                    $pic = 'pic.png';
                    break;
                case 'jpg':
                    $pic = 'pic.png';
                    break;
                case 'jpeg':
                    $pic = 'pic.png';
                    break;
                case 'gif':
                    $pic = 'pic.png';
                    break;
                default:
                    $pic = 'unknown.png';
                    break;
            }
            $info['file'][$key]['pic'] = $pic;
            $file_count++;
        }

        $this->info = $info;
        if ($resume['intentCity']) {
            $arr = "";
            $intentCity = explode(",", $resume['intentCity']);
            foreach ($intentCity as $list) {
                $arr[] = $city_name[$list];
            }
            $resume['intentCity'] = implode(",", $arr);
        }

        if ($resume['job_class']) {
            $arr = "";
            $job_class = explode(",", $resume['job_class']);
            foreach ($job_class as $list) {
                $arr[] = $job_name[$list];
            }
            $resume['job_class'] = implode(',',$arr);
        }

        if ($resume['industry']) {
            $arr = "";
            $industry = explode(",", $resume['industry']);
            foreach ($industry as $list) {
                $arr[] = $industry_name[$list];
            }
            $resume['now_industry'] = implode(',',$arr);
        }
        $resume['now_industry'] = $resume['now_industry'];

        $resume['sex'] = $resume['sex'] == 1 ? "男" : "女";
        $resume_work = M("resume_work")->where("eid=%d", $eid)->select();
        foreach ($resume_work as $kw => $rw) {
            $_position = M('resume_work_position')->where(['work_id' => $rw['id']])->find();
            $resume_work[$kw]['position'][] = $_position;
        }
        $this->resume_work = $resume_work;

        $this->resume_data = M("resume_data")->where("eid=%d", $eid)->select();

        //edu 
        $this->resume_edu = M("resume_edu")->where("eid=%d", $eid)->select();
//        $resume['edu'] = self::$degree[$this->resume_edu[0]['degree']];
        $resume['school'] = $this->resume_edu[0]['schoolName'];
        $resume['creator_role_name'] = M('user')->where(['role_id'=>$resume['creator_role_id']])->getField('full_name');
        $this->resume_project = M("resume_project")->where("eid=%d", $eid)->select();
        $map['eid'] = $resume['eid'];
        $map['role_id'] = session("role_id");
        $collect = M("resume_collection")->where($map)->find();
        if ($collect) {
            $resume['favorite'] = 1;
        }
        $this->resume = $resume;

        $m_r_customer_log = M('rResumeLog');
        $m_log = M('Log');
        $m_user = M('User');
        $m_log_status = M('LogStatus');
        //沟通日志
        $log_ids = $m_r_customer_log->where('resume_id = %d', $resume['eid'])->getField('log_id', true);
        $customer['log'] = $m_log->where('log_id in (%s)', implode(',', $log_ids))->order('log_id desc')->select();
        $log_count = $m_log->where('log_id in (%s)', implode(',', $log_ids))->count();
        $customer['log_count'] = empty($log_count) ? 0 : $log_count;
        foreach ($customer['log'] as $key => $value) {
            $role_info = array();
            $role_info = $m_user->where('role_id = %d', $value['role_id'])->field('full_name,thumb_path,role_id')->find();
            if (!$role_info['thumb_path']) {
                $role_info['thumb_path'] = './Public/img/avatar_default.png';
            }
            $customer['log'][$key]['owner'] = $role_info;
            $customer['log'][$key]['log_type'] = 'rBusinessLog';
            $status_name = $m_log_status->where('id = %d', $value['status_id'])->getField('name');
            $customer['log'][$key]['status_name'] = $status_name ? $status_name : '';

            $business_logs[] = $customer['log'][$key];
        }

        $this->log_list = $business_logs;

        $this->process = array("calllist" => "CallList", "adviser" => "顾问面试", "tj" => "简历推荐", "interview" => "客户面试", "pass" => "面试通过", "offer" => "Offer", "enter" => "入职", "safe" => "过保");
        //参与项目
        $this->project = D("ProjectView")->where("fine_project.resume_id=%d", $eid)->select();
//        header('content-type:text/html;charset=utf-8');
//        dump($resume);die;
        $this->display();
    }

    public function dellable()
    {
        if ($this->isPost()) {
            $data['label'] = $_POST['resume_label'];
            $result = M("resume")->where("eid=%d", $_POST['eid'])->save($data);
            echo $result;
            exit();
        }
    }

    public function addbq()
    {
        if ($this->isPost()) {
            $resume = M("resume")->where("eid=%d", $_POST['eid'])->getField("label");
            $data['label'] = $resume ? $resume . "," . $_POST['addbq'] : $_POST['addbq'];
            $result = M("resume")->where("eid=%d", $_POST['eid'])->save($data);
            echo $result;
            exit();
//	        $data['addbq'] = $_POST['addbq'];
        }
//	    var_dump($_POST);exit();
    }

    public function view1()
    {
        include APP_PATH . "Common/job.cache.php";
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";
        $eid = I("id");
        $resume = D("ResumeView")->where("resume.eid=%d", $eid)->find();
        if ($resume['startWorkyear']) {
            $resume['exp'] = date("Y") - date("Y", strtotime($resume['startWorkyear'])) . "年工作经验";
        }
        if ($resume['location']) {
            $resume['location'] = $city_name[$resume['location']];
        }

        if ($resume['intentCity']) {
            $arr = "";
            $intentCity = explode(",", $resume['intentCity']);
            foreach ($intentCity as $list) {
                $arr[] = $city_name[$list];
            }
            $resume['intentCity'] = implode(",", $arr);
        }

        if ($resume['job_class']) {
            $arr = "";
            $job_class = explode(",", $resume['job_class']);
            $resume['job_class'] = "";
            foreach ($job_class as $list) {
                $resume['job_class'][] = $job_name[$list];
            }
                        $resume['job_class'] = implode(",",$arr);
        }

        if ($resume['industry']) {
            //            $arr= "";
            $industry = explode(",", $resume['industry']);
            $resume['industry'] = "";
            foreach ($industry as $list) {
                $resume['industry'][] = $industry_name[$list];
            }
            //            $resume['industry'] = implode(",",$arr);
        }

        $resume['sex'] = $resume['sex'] == 1 ? "男" : "女";
        $this->resume_work = M("resume_work")->where("eid=%d", $eid)->select();
        $this->resume_edu = M("resume_edu")->where("eid=%d", $eid)->select();
        $this->resume_project = M("resume_project")->where("eid=%d", $eid)->select();
        $this->resume = $resume;
        $this->display();
    }

    public function delete()
    {
        $m_product = M('product');
        $m_product_data = M('product_data');
        $m_product_images = M('productImages');
        $r_module = array('Log' => 'RLogProduct', 'File' => 'RFileProduct', 'rproductProduct', 'rContractProduct');
        if ($this->isPost()) {
            $product_ids = is_array($_POST['product_id']) ? implode(',', $_POST['product_id']) : '';
            if ('' == $product_ids) {
                alert('error', L('YOU_HAVE_NOT_CHOOSE_ANY_CONTENT'), $_SERVER['HTTP_REFERER']);
            } else {
                $delete_data = array();
                $delete_date['is_deleted'] = 1;
                $delete_date['delete_role_id'] = session('role_id');
                $delete_date['delete_time'] = time();
                $product_delete = $m_product->where('product_id in (%s)', $product_ids)->save($delete_date);
                if ($product_delete) {
                    alert('success', '产品已下架！', $_SERVER['HTTP_REFERER']);
                } else {
                    alert('error', '产品下架失败，请联系管理员！', $_SERVER['HTTP_REFERER']);
                }

                //彻底删除数据（保留，后期可能使用）
                // $product_delete = $m_product->where('product_id in (%s)', $product_ids)->delete();
                // $product_data_delete = $m_product_data->where('product_id in (%s)', $product_ids)->delete();
                // if($product_delete && $product_data_delete){
                // 	foreach ($_POST['product_id'] as $value) {
                // 		actionLog($value);
                // 		foreach ($r_module as $key2=>$value2) {
                // 			$module_ids = M($value2)->where('product_id = %d', $value)->getField($key2 . '_id', true);
                // 			M($value2)->where('product_id = %d', $value) -> delete();
                // 			if(!is_int($key2)){
                // 				M($key2)->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
                // 			}
                // 		}
                // 		//删除图片
                // 		$images_files = $m_product_images->where('product_id = %d', $value)->select();
                // 		foreach($images_files as $files){
                // 			@unlink($files['path']);
                // 		}
                // 		$m_product_images->where('product_id = %d', $value)->delete();
                // 		M('Stock')->where('product_id =%d and amounts = 0',$value)->delete();
                // 	}
                // 	alert('success', L('DELETE_THE_SUCCESS') ,$_SERVER['HTTP_REFERER']);
                // } else {
                // 	alert('error', L('DELETE_FAILED_PLEASE_CONTACT_YOUR_ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
                // }
            }
        } elseif ($_GET['id']) {
            $product_id = intval($_GET['id']);
            $product = $m_product->where('product_id = %d', $product_id)->find();
            if (is_array($product)) {
                //判断库存
                // $stock_count = M('stock')->where('product_id = %d', $product['product_id'])->sum('amounts');
                // if($stock_count > 0){
                // 	alert('error', L('THE_PRODUCT_IS_AVAILABLE_FROM_STOCK_AND_CAN_NOT_BE_DELETED'), $_SERVER['HTTP_REFERER']);
                // }
                $delete_data = array();
                $delete_date['is_deleted'] = 1;
                $delete_date['delete_role_id'] = session('role_id');
                $delete_date['delete_time'] = time();
                $product_delete = $m_product->where('product_id = %d', $product_id)->save($delete_date);
                if ($product_delete) {
                    $this->ajaxReturn('', '产品已下架！', 1);
                } else {
                    $this->ajaxReturn('', '产品下架失败，请联系管理员！', 0);
                }

                //彻底删除数据（保留，后期可能使用）
                // if($m_product->where('product_id = %d', $product_id)->delete()){
                // 	foreach ($r_module as $key2=>$value2) {
                // 		if(!is_int($key2)){
                // 			$module_ids = M($value2)->where('product_id = %d', $product_id)->getField($key2 . '_id', true);
                // 			M($value2)->where('product_id = %d', $product_id) -> delete();
                // 			M($key2)->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
                // 		}
                // 	}
                // 	//删除图片
                // 	$images_files = $m_product_images->where('product_id = %d', $product_id)->select();
                // 	foreach($images_files as $files){
                // 		@unlink($files['path']);
                // 	}
                // 	$m_product_images->where('product_id = %d', $product_id)->delete();
                // 	alert('success', L('DELETE_THE_SUCCESS'), $_SERVER['HTTP_REFERER']);
                // }else{
                // 	alert('error', L('DELETE_FAILED_PLEASE_CONTACT_YOUR_ADMINISTRATOR'),$_SERVER['HTTP_REFERER']);
                // }
            } else {
                $this->ajaxReturn('', L('YOU_WANT_TO_DELETE_THE_RECORD_DOES_NOT_EXIST'), 0);
            }
        } else {
            alert('error', L('PLEASE_SELECT_PRODUCT_TO_DELETE'), $_SERVER['HTTP_REFERER']);
        }
    }

    //上架产品（类似回收站还原逻辑）
    public function revert()
    {
        if ($this->isPost()) {
            $product_ids = is_array($_POST['product_id']) ? implode(',', $_POST['product_id']) : intval($_POST['product_id']);
            if ('' == $product_ids) {
                alert('error', L('YOU_HAVE_NOT_CHOOSE_ANY_CONTENT'), $_SERVER['HTTP_REFERER']);
            } else {
                $m_product = M('Product');
                $res_product = $m_product->where('product_id in (%s)', $product_ids)->setField('is_deleted', 0);
                if ($res_product) {
                    alert('success', '产品已上架！', $_SERVER['HTTP_REFERER']);
                } else {
                    alert('error', '产品上架失败，请重试！', $_SERVER['HTTP_REFERER']);
                }
            }
        } elseif ($this->isGet()) {
            $product_id = intval($_GET['product_id']);
            if ($product_id) {
                $m_product = M('Product');
                $res_product = $m_product->where('product_id = %d', $product_id)->setField('is_deleted', 0);
                if ($res_product) {
                    $this->ajaxReturn('', '产品已上架！', 1);
                } else {
                    $this->ajaxReturn('', '产品上架失败或已上架，请重试！', 0);
                }
            } else {
                $this->ajaxReturn('', '参数错误！', 0);
            }
        }
    }

    public function editDialog()
    {
        if ($this->isPost()) {
            $r = trim($_POST['r']);
            $d_r = D($r);
            $d_r->create();
            if ($d_r->save()) {
                alert('success', L('MODIFY_THE_SUCCESS'), $_SERVER['HTTP_REFERER']);
            } else {
                alert('error', L('MODIFY_THE_FAILURE'), $_SERVER['HTTP_REFERER']);
            }
        } elseif ($_GET['r'] && $_GET['id']) {
            $rbs = M($_GET['r'])->where('id = %d', $_GET['id'])->find();
            $rbs['info'] = M('product')->where('product_id = %d', $rbs['product_id'])->find();
            $this->r = $_GET['r'];
            $this->rbs = $rbs;
            $this->display();
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    public function listDialog()
    {
        if ($this->isPost()) {
            $r = $_POST['r'];
            $model_id = isset($_POST['id']) ? intval($_POST['id']) : 0;
            $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
            $m_r = M($r);
            $m_id = $_POST['module'] . '_id';  //对应模块的id字段

            $data[$m_id] = $model_id;
            foreach ($_POST['product_id'] as $value) {
                $data['product_id'] = $value;
                if ($m_r->add($data) <= 0) {
                    alert('error', L('SELECT_A_PRODUCT_FAILURE'), $_SERVER['HTTP_REFERER']);
                }
            }
            alert('success', L('SELECT_A_PRODUCT_SUCCESS'), $_SERVER['HTTP_REFERER']);
        } elseif ($_GET['r'] && $_GET['module'] && $_GET['id']) {
            $id_array = M($_GET['r'])->where('%s = %d', $_GET['module'] . '_id', $_GET['id'])->getField('product_id', true);
            $id_array[] = 0;
            $this->r = $_GET['r'];
            $this->module = $_GET['module'];
            $this->model_id = $_GET['id'];
            $d_product = D('ProductView');
            $a = $d_product->where('product_id not in (%s)', implode(',', $id_array))->select();
            $this->list = $a;
            $this->display();
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    public function addDialog()
    {
        if ($this->isPost()) {
            $r = $_POST['r'];
            $model_id = isset($_POST['model_id']) ? intval($_POST['model_id']) : 0;
            $product_id = isset($_POST['product_id']) ? intval($_POST['product_id']) : 0;
            $m_r = D($r);
            $m_id = $_POST['module'] . '_id';  //对应模块的id字段
            $m_r->create();
            $m_r->$m_id = $model_id;
            if ($m_r->add()) {
                alert('success', L('ADD_SUCCESSFUL'), $_SERVER['HTTP_REFERER']);
            } else {
                alert('error', L('ADD_FAILURE'), $_SERVER['HTTP_REFERER']);
            }
        } elseif ($_GET['r'] && $_GET['module'] && $_GET['id']) {
            $id_array = M($_GET['r'])->where('%s = %d', $_GET['module'] . '_id', $_GET['id'])->getField('product_id', true);
            $id_array[] = 0;
            $this->r = $_GET['r'];
            $this->module = $_GET['module'];
            $this->model_id = $_GET['id'];
            $d_product = D('ProductView');
            $a = $d_product->where('product_id not in (%s)', implode(',', $id_array))->select();
            $this->list = $a;
            $this->display();
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    //弹出框
    public function allProductDialog()
    {
        $d_product = D('ProductView');
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;

        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);

            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
            if ('development_time' == $field || 'listing_time' == $field)
                $search = is_numeric($search) ? $search : strtotime($search);;
            if (!empty($field) && !empty($search)) {
                switch ($condition) {
                    case "is" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "isnot" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "contains" :
                        $where[$field] = array('like', '%' . $search . '%');
                        break;
                    case "not_contain" :
                        $where[$field] = array('notlike', '%' . $search . '%');
                        break;
                    case "start_with" :
                        $where[$field] = array('like', $search . '%');
                        break;
                    case "end_with" :
                        $where[$field] = array('like', '%' . $search);
                        break;
                    case "is_empty" :
                        $where[$field] = array('eq', '');
                        break;
                    case "is_not_empty" :
                        $where[$field] = array('neq', '');
                        break;
                    case "gt" :
                        $where[$field] = array('gt', $search);
                        break;
                    case "egt" :
                        $where[$field] = array('egt', $search);
                        break;
                    case "lt" :
                        $where[$field] = array('lt', $search);
                        break;
                    case "elt" :
                        $where[$field] = array('elt', $search);
                        break;
                    case "eq" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "neq" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "between" :
                        $where[$field] = array('between', array($search - 1, $search + 86400));
                        break;
                    case "nbetween" :
                        $where[$field] = array('not between', array($search, $search + 86399));
                        break;
                    case "tgt" :
                        $where[$field] = array('gt', $search + 86400);
                        break;
                    default :
                        $where[$field] = array('eq', $search);
                }
            }
            $params = array('field=' . trim($_REQUEST['field']), 'condition=' . $condition, 'search=' . $_REQUEST["search"]);
        }
        import("@.ORG.DialogListPage");

        $list = $d_product->where($where)->Page($p . ',10')->select();
        // $m_stock = M('stock');
        // $warehouse = M('warehouse')->select();
        // foreach($list as $k=>$v){
        // 	$product_warehouseStr = '';
        // 	$stock_count = $m_stock->where('product_id = %d', $v['product_id'])->sum('amounts');
        // 	$list[$k]['stock_count'] = empty($stock_count) ? $list[$k]['stock_count'] = 0 : $list[$k]['stock_count'] = $stock_count;
        // 	foreach($warehouse as $item){
        // 		$product_warehouseArr[$item['name']] = $m_stock->where('product_id = %d and warehouse_id = %d', $v['product_id'], $item['warehouse_id'])->getField('amounts');
        // 	}
        // 	foreach($product_warehouseArr as $cc=>$gg){
        // 		if(empty($gg)){
        // 			$product_warehouseStr .= $cc.':0 ';
        // 		}else{
        // 			$product_warehouseStr .= $cc.':'.$gg.' ';
        // 		}
        // 	}
        // 	$list[$k]['stock_count_detail'] = $product_warehouseStr;
        // }
        $this->list = $list;
        $count = $d_product->where($where)->count();

        $this->search_field = $_REQUEST; //搜索信息
        $Page = new Page($count, 10);
        $Page->parameter = implode('&', $params);
        $this->assign('page', $Page->show());

        $this->display();
    }

    public function changeContent()
    {
        if ($this->isAjax()) {
            $product = D('ProductView'); // 实例化User对象
            import('@.ORG.Page'); // 导入分页类
            $category = M('product_category');
            $where = array();
            $where['is_deleted'] = 0;
            $params = array();

            $p = !$_REQUEST['p'] || $_REQUEST['p'] <= 0 ? 1 : intval($_REQUEST['p']);
            if ($_REQUEST["field"]) {
                $field = trim($_REQUEST['field']);

                $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
                $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
                if ('development_time' == $field || 'listing_time' == $field)
                    $search = is_numeric($search) ? $search : strtotime($search);;
                if (!empty($field) && !empty($search)) {
                    switch ($condition) {
                        case "is" :
                            $where[$field] = array('eq', $search);
                            break;
                        case "isnot" :
                            $where[$field] = array('neq', $search);
                            break;
                        case "contains" :
                            $where[$field] = array('like', '%' . $search . '%');
                            break;
                        case "not_contain" :
                            $where[$field] = array('notlike', '%' . $search . '%');
                            break;
                        case "start_with" :
                            $where[$field] = array('like', $search . '%');
                            break;
                        case "end_with" :
                            $where[$field] = array('like', '%' . $search);
                            break;
                        case "is_empty" :
                            $where[$field] = array('eq', '');
                            break;
                        case "is_not_empty" :
                            $where[$field] = array('neq', '');
                            break;
                        case "gt" :
                            $where[$field] = array('gt', $search);
                            break;
                        case "egt" :
                            $where[$field] = array('egt', $search);
                            break;
                        case "lt" :
                            $where[$field] = array('lt', $search);
                            break;
                        case "elt" :
                            $where[$field] = array('elt', $search);
                            break;
                        case "eq" :
                            $where[$field] = array('eq', $search);
                            break;
                        case "neq" :
                            $where[$field] = array('neq', $search);
                            break;
                        case "between" :
                            $where[$field] = array('between', array($search - 1, $search + 86400));
                            break;
                        case "nbetween" :
                            $where[$field] = array('not between', array($search, $search + 86399));
                            break;
                        case "tgt" :
                            $where[$field] = array('gt', $search + 86400);
                            break;
                        default :
                            $where[$field] = array('eq', $search);
                    }
                }
                $params = array('field=' . trim($_REQUEST['field']), 'condition=' . $condition, 'search=' . $_REQUEST["search"]);
            }

            if (intval($_REQUEST['cid'])) {
                $sub_category = getSubCategory(intval($_REQUEST['cid']), $category->select());
                foreach ($sub_category as $v) {
                    $id_array[] = $v['category_id'];
                }
                $id_array[] = intval($_REQUEST['cid']);
                $where['category_id'] = array('in', $id_array);
            }
            $count = $product->where($where)->count(); // 查询满足要求的总记录数
            $list = $product->order('product_id desc')->where($where)->Page($p . ',10')->select();
            // $warehouse = M('warehouse')->select();
            // $m_stock = M('stock');
            foreach ($list as $k => $v) {
                // $product_warehouseStr = '';
                // $stock_count = M('stock')->where('product_id = %d', $v['product_id'])->sum('amounts');
                // $list[$k]['stock_count'] = empty($stock_count) ? $list[$k]['stock_count'] = 0 : $list[$k]['stock_count'] = $stock_count;
                // foreach($warehouse as $item){
                // 	$product_warehouseArr[$item['name']] = $m_stock->where('product_id = %d and warehouse_id = %d', $v['product_id'], $item['warehouse_id'])->getField('amounts');
                // }
                // foreach($product_warehouseArr as $cc=>$gg){
                // 	if(empty($gg)){
                // 		$product_warehouseStr .= $cc.':0 ';
                // 	}else{
                // 		$product_warehouseStr .= $cc.':'.$gg.' ';
                // 	}
                // }
                // $list[$k]['stock_count_detail'] = $product_warehouseStr;
                if (empty($v['category_name'])) {
                    $list[$k]['category_name'] = '';
                }
            }

            $data['list'] = $list;
            $data['p'] = $p;
            $data['count'] = $count;
            $data['total'] = $count % 10 > 0 ? ceil($count / 10) : $count / 10;
            $this->ajaxReturn($data, "", 1);
        }
    }

    public function category()
    {
        $product_category = M('product_category');
        $category_list = $product_category->select();
        $category_list = getSubCategory(0, $category_list, '');

        foreach ($category_list as $key => $value) {
            $product = M('product');
            $count = $product->where('category_id = %d', $value['category_id'])->count();
            $category_list[$key]['count'] = $count;
            $category_list[$key]['list'] = $product->where('category_id = %d', $value['category_id'])->select();
        }
        $this->alert = parseAlert();
        $this->assign('category_list', $category_list);
        $this->display();
    }

    public function category_add()
    {
        if ($this->isPost()) {
            $category = D('ProductCategory');
            if (!trim($_POST['name'])) {
                alert('error', '请填写分类名！', $_SERVER['HTTP_REFERER']);
            }
            if ($category->create()) {
                if ($category->add()) {
                    alert('success', L('ADD_SUCCESSFUL'), $_SERVER['HTTP_REFERER']);
                } else {
                    alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            $category = M('product_category');
            $category_list = $category->select();
            $this->assign('category_list', getSubCategory(0, $category_list, ''));
            $this->display();
        }
    }

    public function category_delete()
    {
        $product_category = M('Product_category');
        $product = M('product');
        if ($_POST['category_list']) {
            foreach ($_POST['category_list'] as $value) {
                if ($product->where('category_id = %d', $value)->select()) {
                    $name = $product_category->where('category_id = %d', $value)->getField('name');
                    $this->ajaxReturn('', L('UNDER_THE_CATEGORY_OF_PRODUCTS', array($name)), 0);
                }
                if ($product_category->where('parent_id = %d', $value)->select()) {
                    $name = $product_category->where('category_id = %d', $value)->getField('name');
                    $this->ajaxReturn('', L('UNDER_THE_CATEGORY_OF_CHILD_CATEGORIES', array($name)), 0);
                }
            }
            if ($product_category->where('category_id in (%s)', join($_POST['category_list'], ','))->delete()) {
                $this->ajaxReturn('', L('CATEGORY_WAS_REMOVED_SUCCESSFULLY'), 1);
            } else {
                $this->ajaxReturn('', L('CATEGORY_WAS_REMOVED_FAILED'), 0);
            }
        } elseif ($_GET['id']) {
            if ($product->where('category_id = %d', $_GET['id'])->select()) {
                $name = $product_category->where('category_id = %d', $value)->getField('name');
                alert('error', L('UNDER_THE_CATEGORY_OF_PRODUCTS', array($name)), $_SERVER['HTTP_REFERER']);
            }
            if ($product_category->where('parent_id = %d', $value)->select()) {
                $name = $product_category->where('category_id = %d', $value)->getField('name');
                alert('error', L('UNDER_THE_CATEGORY_OF_CHILD_CATEGORIES', array($name)), $_SERVER['HTTP_REFERER']);
            }
            if ($product_category->where('category_id = %d', $_GET['id'])->delete()) {
                alert('success', L('CATEGORY_WAS_REMOVED_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
            } else {
                alert('error', L('CATEGORY_WAS_REMOVED_FAILED'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    //编辑产品分类信息
    public function category_edit()
    {
        if ($_GET['id']) {
            $product_category = M('product_category');
            $category_list = $product_category->select();
            $this->assign('category_list', getSubCategory(0, $category_list, ''));
            $product_category = M('product_category');
            $categoryList = $product_category->select(); //读取分类列表 加载下拉框
            foreach ($categoryList as $key => $value) {
                if ($value['category_id'] == $_GET['id']) {
                    unset($categoryList[$key]);
                }
            }

            $this->category_list = $categoryList;
            $this->temp = $product_category->where('category_id = %s', $_GET['id'])->find();

            $this->display();
        } elseif ($_POST['category_id']) {
            $product_category = M('product_category');
            if (!trim($_POST['name'])) {
                alert('error', '请填写分类名！', $_SERVER['HTTP_REFERER']);
            }
            $product_category->create();
            if ($product_category->save()) {
                alert('success', L('MODIFY_THE_CATEGORY_INFORMATION_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
            } else {
                alert('error', L('THERE_IS_NO_DATA_CHANGE_MODIFY_THE_CATEGORY_INFORMATION_FAILURE'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    //产品销量统计
    public function analytics()
    {
        $m_product = M('product');

        if (intval($_GET['role'])) {
            $where_role = array('eq', intval($_GET['role']));
        } else {
            if (intval($_GET['department'])) {
                $department_id = intval($_GET['department']);
                foreach (getRoleByDepartmentId($department_id, true) as $k => $v) {
                    $role_id_array[] = $v['role_id'];
                }
            } else {
                $role_array = getPerByAction(MODULE_NAME, ACTION_NAME, false);
                $role_id_array = $role_array;
            }
            $where_role = array('in', implode(',', $role_id_array));
        }
        if ($_GET['category_id']) {
            $idArray = Array();
            $categoryList = getSubCategory($_GET['category_id'], $category_list, '');
            foreach ($categoryList as $value) {
                $idArray[] = $value['category_id'];
            }
            $idList = empty($idArray) ? $_GET['category_id'] : $_GET['category_id'] . ',' . implode(',', $idArray);
            $where['category_id'] = array('in', $idList);
        }
        //时间段搜索
        if ($_GET['select_type'] == 1) {
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        } elseif ($_GET['select_type'] == 2) {
            $month = date('m');
            if ($month == 1 || $month == 2 || $month == 3) {
                $start_time = strtotime(date('Y-01-01 00:00:00'));
                $end_time = strtotime(date("Y-03-31 23:59:59"));
            } elseif ($month == 4 || $month == 5 || $month == 6) {
                $start_time = strtotime(date('Y-04-01 00:00:00'));
                $end_time = strtotime(date("Y-06-30 23:59:59"));
            } elseif ($month == 7 || $month == 8 || $month == 9) {
                $start_time = strtotime(date('Y-07-01 00:00:00'));
                $end_time = strtotime(date("Y-09-30 23:59:59"));
            } else {
                $start_time = strtotime(date('Y-10-01 00:00:00'));
                $end_time = strtotime(date("Y-12-31 23:59:59"));
            }
        } elseif ($_GET['select_type'] == 3) {
            $start_time = strtotime(date('Y-01-01 00:00:00'));
            $end_time = time();
        } elseif ($_GET['select_type'] == 4) {
            if ($_GET['start_time']) {
                $start_time = strtotime(date('Y-m-d', strtotime($_GET['start_time'])));
            }
            $end_time = $_GET['end_time'] ? strtotime(date('Y-m-d 23:59:59', strtotime($_GET['end_time']))) : strtotime(date('Y-m-d 23:59:59', time()));
        } elseif ($_GET['select_type'] == 5) {
            $year = date('Y') - 1;
            $start_time = strtotime(date($year . '-01-01 00:00:00'));
            $end_time = strtotime(date('Y-01-01 00:00:00'));
        } else {
            if ($_GET['start_time']) {
                $start_time = strtotime(date('Y-m-d', strtotime($_GET['start_time'])));
            }
            $end_time = $_GET['end_time'] ? strtotime(date('Y-m-d 23:59:59', strtotime($_GET['end_time']))) : strtotime(date('Y-m-d 23:59:59', time()));
        }
        /* if($_GET['start_time']) $start_time = strtotime(date('Y-m-d',strtotime($_GET['start_time'])));
          $end_time = $_GET['end_time'] ?  strtotime(date('Y-m-d 23:59:59',strtotime($_GET['end_time']))) : strtotime(date('Y-m-d 23:59:59',time())); */
        //统计报表
        $products = M('product')->where($where)->select();
        if ($start_time) {
            $create_time = array(array('elt', $end_time), array('egt', $start_time), 'and');
        } else {
            $create_time = array('elt', $end_time);
        }
        $product_count = array();
        $d_sales_product = D('SalesProductView');
        foreach ($products as $v) {
            $sales_list = $d_sales_product->where(array('is_checked' => 1, 'type' => 0, 'product_id' => $v['product_id'], 'sales_time' => $create_time, 'creator_role_id' => $where_role))->select();
            $product = array();

            $product['name'] = $v['name']; //产品名称
            $product['standard'] = $v['standard']; //规格
            $product['product_id'] = $v['product_id']; //产品id
            $product['count_sales_price'] = 0; //毛利润
            $product['sales_num'] = 0;
            foreach ($sales_list as $val) {
                $product['sales_num'] += $val['amount']; //销量
                $product['count_sales_price'] += ($val['amount'] * $val['unit_price'] * ($val['discount_rate'] / 100));
            }
            $product['count_cost_price'] = $v['cost_price'] * $product['sales_num']; //成本
            $product_count[] = $product;
            $product_total['sales_sales'] += $product['sales_num'];
            $product_total['sales_price'] += $product['count_sales_price'];
            $product_total['sales_cost'] += $product['count_cost_price'];
        }

        //销量TOP20、销售额统计
        $sales_top = $product_count;
        foreach ($sales_top as $key => $row) {
            $sales[$key] = $row['sales_num'];
        }
        array_multisort($sales, SORT_DESC, $sales_top);
        foreach ($sales_top as $k => $v) {
            if ($k > 19) {
                unset($sales_top[$k]);
            }
        }
        $this->sales_top = $sales_top;

        $this->product_count = $product_count;

        //员工列表
        $idArray = getPerByAction(MODULE_NAME, ACTION_NAME, false);
        $roleList = array();
        foreach ($idArray as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;

        //部门列表
        $url = getCheckUrlByAction(MODULE_NAME, ACTION_NAME);
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
        }
        //$departmentList = M('roleDepartment')->select();
        $this->assign('departmentList', $departmentList);

        $this->product_total = $product_total;
        $this->product_count = $product_count;

        $this->type_id = intval($_GET['type_id']);
        $this->content_id = intval($_GET['content_id']);
        $this->alert = parseAlert();
        $this->display();
    }

    public function getProductByBusiness()
    {
        $business_id = $_GET['id'];
        if ($business_id) {
            $r_business_product = M('rBusinessProduct');
            $m_product = M('product');
            $business_product = $r_business_product->where('business_id = %d', $business_id)->select();
            foreach ($business_product as $k => $v) {
                $business_product[$k]['product_name'] = $m_product->where('product_id = %d', $v['product_id'])->getField('name');
                $business_product[$k]['standard'] = $m_product->where('product_id = %d', $v['product_id'])->getField('standard');
            }
            $this->ajaxReturn(array('product' => $business_product, 'total_count' => sizeOf($business_product)), '已获取与商机有关产品！', 1);
        }
    }

    //删除图片
    public function delImg()
    {
        $images_id = $_GET['images_id'];
        if ($images_id) {
            $m_product_images = M('productImages');
            $images_path = $m_product_images->where('images_id = %d', $images_id)->getField('path');
            $result = $m_product_images->where('images_id = %d', $images_id)->delete();
            if ($result) {
                @unlink($images_path);
                $this->ajaxReturn('', '', 1);
            }
        } else {
            $this->ajaxReturn('', L('PARAMETER_ERROR'), 0);
        }
    }

    //图片排序
    public function sortImg()
    {
        $images_files = $_POST['images_arr'];
        $imagesArr = explode(',', $images_files);
        if ($imagesArr) {
            $m_product_images = M('productImages');
            //拖动后的listorder
            $original_listorder = $m_product_images->where('images_id in (%s)', $images_files)->getField('listorder', true);
            sort($original_listorder); //按顺序排列
            //交换顺序
            foreach ($imagesArr as $k => $v) {
                $m_product_images->where('images_id = %d', $v)->setField('listorder', $original_listorder[$k]);
            }
            $this->ajaxReturn('success', '排序成功！', 1);
        }
    }

    //导出
    public function excelExport($productList = false)
    {
        include APP_PATH . "Common/job.cache.php";
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";
        C('OUTPUT_ENCODE', false);
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("mxcrm");
        $objProps->setLastModifiedBy("mxcrm");
        $objProps->setTitle("mxcrm Product");
        $objProps->setSubject("mxcrm Product Data");
        $objProps->setDescription("mxcrm Product Data");
        $objProps->setKeywords("mxcrm Product");
        $objProps->setCategory("mxcrm");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $ascii = 65;
        $cv = '';
        $field_list = M('Fields')->where('model = \'resume\'')->order('order_id')->select();
        foreach ($field_list as $field) {
            if ($field['form_type'] == 'address') {
                for ($a = 0; $a <= 4; $a++) {
                    $address = array('所在省', '所在市', '所在县/区', '街道信息');
                    $objActSheet->setCellValue($cv . chr($ascii) . '1', $address[$a]);
                    $ascii++;
                    if ($ascii == 91) {
                        $ascii = 66;
                        $cv .= chr(strlen($cv) + 65);
                    }
                }
                $ascii--;
            } else {
                $objActSheet->setCellValue($cv . chr($ascii) . '1', $field['name']);
                $ascii++;
                if ($ascii == 91) {
                    $ascii = 65;
                    $cv = chr(strlen($cv) + 65);
                }
            }
        }
        if (is_array($productList)) {
            $list = $productList;
        } else {
            $list = D('ProductView')->select();
        }
        $i = 1;
        foreach ($list as $k => $v) {
            $data = m('ProductData')->where("product_id = $v[product_id]")->find();
            if (!empty($data)) {
                $v = $v + $data;
            }
            $i++;
            $ascii = 65;
            $cv = '';
            foreach ($field_list as $field) {
                if ($field['form_type'] == 'datetime') {
                    if ($v[$field['field']] == 0 || strlen($v[$field['field']]) != 10) {
                        $objActSheet->setCellValue($cv . chr($ascii) . $i, '');
                    } else {
                        $objActSheet->setCellValue($cv . chr($ascii) . $i, date('Y-m-d H:i', $v[$field['field']]));
                    }
                } elseif ($field['form_type'] == 'number' || $field['form_type'] == 'floatnumber' || $field['form_type'] == 'phone' || $field['form_type'] == 'mobile' || ($field['form_type'] == 'text' && is_numeric($v[$field['field']]))) {
                    //防止使用科学计数法，在数据前加空格
                    $objActSheet->setCellValue($cv . chr($ascii) . $i, ' ' . $v[$field['field']]);
                } elseif ($field['field'] == 'category_id') {
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d', $v['category_id'])->find();
                    $objActSheet->setCellValue($cv . chr($ascii) . $i, $category['name']);
                } elseif ($field['field'] == 'category_id') {
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d', $v['category_id'])->find();
                    $objActSheet->setCellValue($cv . chr($ascii) . $i, $category['name']);
                } elseif ($field['field'] == 'category_id') {
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d', $v['category_id'])->find();
                    $objActSheet->setCellValue($cv . chr($ascii) . $i, $category['name']);
                } elseif ($field['form_type'] == 'address') {
                    $temp = str_replace('=', '', $v[$field['field']]);
                    $address = $temp;
                    $arr_address = explode(chr(10), $address);
                    for ($j = 0; $j < 4; $j++) {
                        $objActSheet->setCellValue($cv . chr($ascii) . $i, $arr_address[$j]);
                        $ascii++;
                        if ($ascii == 91) {
                            $ascii = 65;
                            $cv .= chr(strlen($cv) + 65);
                        }
                    }
                    $ascii--;
                } else {
                    $objActSheet->setCellValue($cv . chr($ascii) . $i, $v[$field['field']]);
                }
                $ascii++;
                if ($ascii == 91) {
                    $ascii = 65;
                    $cv = chr(strlen($cv) + 65);
                }
            }
        }
        $current_page = intval($_GET['current_page']);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //ob_end_clean();
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=mxcrm_product_" . date('Y-m-d', mktime()) . "_" . $current_page . ".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
        session('export_status', 0);
    }

    public function getCurrentStatus()
    {
        $this->ajaxReturn(intval(session('export_status')), 'success', 1);
    }

    public function excelImport()
    {
        if ($this->isPost()) {
            if (isset($_FILES['excel']['size']) && $_FILES['excel']['size'] != null) {
                import('@.ORG.UploadFile');
                $upload = new UploadFile();
                $upload->maxSize = 20000000;
                $upload->allowExts = array('xls');
                $dirname = UPLOAD_PATH . date('Ym', time()) . '/' . date('d', time()) . '/';
                if (!is_dir($dirname) && !mkdir($dirname, 0777, true)) {
                    alert('error', L('ATTACHMENTS_TO_UPLOAD_DIRECTORY_CANNOT_WRITE'), $_SERVER['HTTP_REFERER']);
                }
                $upload->savePath = $dirname;
                if (!$upload->upload()) {
                    alert('error', $upload->getErrorMsg(), $_SERVER['HTTP_REFERER']);
                } else {
                    $info = $upload->getUploadFileInfo();
                }
            }

            if (is_array($info[0]) && !empty($info[0])) {
                $savepath = $dirname . $info[0]['savename'];
                if ($savepath) {
                    $this->ajaxReturn($savepath, 'success', 1);
                } else {
                    $this->ajaxReturn(0, 'error', 0);
                }
            } else {
                alert('error', L('UPLOAD_FAILED'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            $this->display();
        }
    }

    public function excelImportact()
    {
        $m_product = D('product');
        $m_product_data = D('ProductData');
        $savePath = $_GET['path'];
        import("ORG.PHPExcel.PHPExcel");
        $PHPExcel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();
        if (!$PHPReader->canRead($savePath)) {
            $PHPReader = new PHPExcel_Reader_Excel5();
        }
        $PHPExcel = $PHPReader->load($savePath);
        $currentSheet = $PHPExcel->getSheet(0);
        $allRow = $currentSheet->getHighestRow();

        $field_list = M('Fields')->where('model = \'product\'')->order('order_id')->select();

        $currentRow = intval($_GET['num']);
        if ($currentRow + 99 <= $allRow) {
            $rows_excal = $currentRow + 100;
        } else {
            $rows_excal = $allRow;
        }
        $message = array();
        for ($currentRow; $currentRow <= $rows_excal; $currentRow++) {

            $data = array();
            $data['creator_role_id'] = session('role_id');
            $data['create_time'] = time();
            $data['update_time'] = time();
            $ascii = 65;
            $cv = '';
            foreach ($field_list as $field) {
                $info = trim((String)$currentSheet->getCell($cv . chr($ascii) . $currentRow)->getValue());
                if ($field['is_main'] == 1) {
                    if ($field['field'] == 'category_id') {
                        $m_product_category = M('ProductCategory');
                        $product_category = $m_product_category->where('name like "%s"', $info)->find();
                        $info = $product_category['category_id'] ? $product_category['category_id'] : 0;
                    }
                    $data[$field['field']] = ($field['form_type'] == 'datetime' && $info != null) ? intval(PHPExcel_Shared_Date::ExcelToPHP($info)) - 8 * 60 * 60 : trim($info);
                } else {
                    $data_date[$field['field']] = ($field['form_type'] == 'datetime' && $info != null) ? intval(PHPExcel_Shared_Date::ExcelToPHP($info)) - 8 * 60 * 60 : trim($info);
                }

                $ascii++;
                if ($ascii == 91) {
                    $ascii = 65;
                    $cv = chr(strlen($cv) + 65);
                }
            }

            if ($m_product->create($data) && $m_product_data->create($data_date)) {

                $product_id = $m_product->add();
                $m_product_data->product_id = $product_id;
                $m_product_data->add();
                //产品增加至仓库
                $stock = M('Stock');
                $warehouse_ids = M('Warehouse')->getField('warehouse_id', true);
                if ($warehouse_ids) {
                    foreach ($warehouse_ids as $vo) {
                        $stock_data['product_id'] = $product_id;
                        $stock_data['warehouse_id'] = $vo;
                        $stock_data['amounts'] = 0;
                        $stock_data['last_change_time'] = time();
                        $stock->add($stock_data);
                    }
                }
            } else {
                //$error_message .= L('LINE ERROR',array($currentRow,$m_product->getError().$m_product_data->getError()));
                $error_message = $m_product->getError() . $m_product_data->getError();
            }
            $temp['error_message'] = $error_message;
            $temp['no'] = $currentRow;
            $message[] = $temp;
        }
        $return['allrow'] = $allRow;
        $return['message'] = $message;
        if ($return) {
            $this->ajaxReturn($return, 'success', 1);
        } else {
            $this->ajaxReturn('', 'error', 0);
        }
    }

    public function excelImportDownload()
    {
        C('OUTPUT_ENCODE', false);
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("mxcrm");
        $objProps->setLastModifiedBy("mxcrm");
        $objProps->setTitle("mxcrm Product");
        $objProps->setSubject("mxcrm Product Data");
        $objProps->setDescription("mxcrm Product Data");
        $objProps->setKeywords("mxcrm Product Data");
        $objProps->setCategory("mxcrm");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $ascii = 65;
        $cv = '';
        $field_list = M('Fields')->where('model = \'product\' ')->order('order_id')->select();
        foreach ($field_list as $field) {
            // $objActSheet->setCellValue($cv.chr($ascii).'2', $field['name']);
            // $ascii++;
            // if($ascii == 91){
            //     $ascii = 65;
            //     $cv = chr(strlen($cv)+65);
            // }

            if ($field['form_type'] == 'address') {
                for ($i = 0; $i < 4; $i++) {
                    $address = array('所在省', '所在市', '所在县', '街道信息');
                    $objActSheet->setCellValue($cv . chr($ascii) . '2', $address[$i]);
                    $ascii++;
                    $temp = $cv;
                    if ($ascii == 91) {
                        $ascii = 65;
                        if ($cv) {
                            $cv = chr(ord($cv) + 1);
                        } else {
                            $cv = 'A';
                        }
                    }
                }
            } else {
                if ($field['form_type'] == 'box' || $field['field'] == 'category_id') {
                    if ($field['field'] == 'category_id') {
                        $category_list = M('ProductCategory')->getField('name', true);
                        $select_value = implode(',', $category_list);
                    } else {
                        eval('$setting=' . $field['setting'] . ';');
                        $select_value = implode(',', $setting['data']);
                    }
                    //数据有效性   start
                    $objValidation = $objActSheet->getCell($cv . chr($ascii) . '3')->getDataValidation();
                    $objValidation->setType(PHPExcel_Cell_DataValidation::TYPE_LIST)
                        ->setErrorStyle(PHPExcel_Cell_DataValidation::STYLE_INFORMATION)
                        ->setAllowBlank(false)
                        ->setShowInputMessage(true)
                        ->setShowErrorMessage(true)
                        ->setShowDropDown(true)
                        ->setErrorTitle('输入的值有误')
                        ->setError('您输入的值不在下拉框列表内.')
                        ->setPromptTitle('--请选择--')
                        ->setFormula1('"' . $select_value . '"');
                    //数据有效性  end
                }
                $objActSheet->setCellValue($cv . chr($ascii) . '2', $field['name']);
                $ascii++;
                $temp = $cv;
                if ($ascii == 91) {
                    $ascii = 65;
                    if ($cv) {
                        $cv = chr(ord($cv) + 1);
                    } else {
                        $cv = 'A';
                    }
                }
            }
        }
        $objActSheet->mergeCells('A1:' . $cv . chr($ascii) . '1');
        $objActSheet->getRowDimension('1')->setRowHeight(80);
        $objActSheet->getStyle('A1')->getFont()->getColor()->setARGB('FFFF0000');
        $objActSheet->getStyle('A1')->getAlignment()->setWrapText(true);
        $content = L('ADRESS');
        $objActSheet->setCellValue('A1', $content);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=mxcrm_product.xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
    }

    //产品树 弹出框
    public function mutildialog()
    {
        $where = array();
        if ($_REQUEST["field"]) {
            if (trim($_REQUEST['field']) == "all") {
                /* $field = is_numeric(trim($_REQUEST['search'])) ? 'product.name|cost_price|sales_price|link|pre_sale_count|stock_count' : 'product.name|link|development_team'; */
            } else {
                $field = trim($_REQUEST['field']);
            }
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

            if ($this->_request('state')) {
                $state = $this->_request('state', 'trim');
                $address_where[] = '%' . $state . '%';

                if ($this->_request('city')) {
                    $city = $this->_request('city', 'trim');
                    $address_where[] = '%' . $city . '%';

                    if ($this->_request('area')) {
                        $area = $this->_request('area', 'trim');
                        $address_where[] = '%' . $this->_request('area', 'trim') . '%';
                    }
                }
                if ($search)
                    $address_where[] = '%' . $search . '%';
                //$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'state='.$this->_request('state','trim'), 'city='.$this->_request('city','trim'),'area='.$this->_request('area','trim'),'search='.$this->_request('search','trim'));
                if ($condition == 'not_contain') {
                    $where[$field] = array('notlike', $address_where, 'OR');
                } else {
                    $where[$field] = array('like', $address_where, 'AND');
                }
            } elseif (!empty($field)) {
                $field_date = M('Fields')->where('(is_main=1 and model="product" and form_type="datetime") or(is_main=1 and model="" and form_type="datetime")')->select();
                foreach ($field_date as $v) {
                    if ($field == $v['field'])
                        $search = is_numeric($search) ? $search : strtotime($search);
                }
                switch ($condition) {
                    case "is" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "isnot" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "contains" :
                        $where[$field] = array('like', '%' . $search . '%');
                        break;
                    case "not_contain" :
                        $where[$field] = array('notlike', '%' . $search . '%');
                        break;
                    case "start_with" :
                        $where[$field] = array('like', $search . '%');
                        break;
                    case "end_with" :
                        $where[$field] = array('like', '%' . $search);
                        break;
                    case "is_empty" :
                        $where[$field] = array('eq', '');
                        break;
                    case "is_not_empty" :
                        $where[$field] = array('neq', '');
                        break;
                    case "gt" :
                        $where[$field] = array('gt', $search);
                        break;
                    case "egt" :
                        $where[$field] = array('egt', $search);
                        break;
                    case "lt" :
                        $where[$field] = array('lt', $search);
                        break;
                    case "elt" :
                        $where[$field] = array('elt', $search);
                        break;
                    case "eq" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "neq" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "between" :
                        $where[$field] = array('between', array($search - 1, $search + 86400));
                        break;
                    case "nbetween" :
                        $where[$field] = array('not between', array($search, $search + 86399));
                        break;
                    case "tgt" :
                        $where[$field] = array('gt', $search + 86400);
                        break;
                    default :
                        $where[$field] = array('eq', $search);
                }
                //$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$_REQUEST["search"]);
            }
        }
        $where['is_deleted'] = 0;
        $product = D('ProductView'); // 实例化对象
        $category = D('ProductCategory'); // 实例化对象
        $list = $product->order('product_id desc')->where($where)->limit(10)->select();
        $count = $product->where($where)->count();
        $category_list = $category->select();
        $this->treecode = getSubCategoryTreeCode(0, 1);
        $this->field_list = getMainFields('product');
        $this->categoryList = getSubCategory(0, $category_list, ''); //类别选项
        $this->total = $count % 10 > 0 ? ceil($count / 10) : $count / 10;
        $this->count_num = $count;
        $this->assign('list', $list); // 赋值数据集
        $this->display(); // 输出模板
    }

    //产品树 弹出框
    public function mutildialog_business()
    {
        if ($_REQUEST["field"]) {
            if (trim($_REQUEST['field']) == "all") {
                /* $field = is_numeric(trim($_REQUEST['search'])) ? 'product.name|cost_price|sales_price|link|pre_sale_count|stock_count' : 'product.name|link|development_team'; */
            } else {
                $field = trim($_REQUEST['field']);
            }
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

            if ($this->_request('state')) {
                $state = $this->_request('state', 'trim');
                $address_where[] = '%' . $state . '%';

                if ($this->_request('city')) {
                    $city = $this->_request('city', 'trim');
                    $address_where[] = '%' . $city . '%';

                    if ($this->_request('area')) {
                        $area = $this->_request('area', 'trim');
                        $address_where[] = '%' . $this->_request('area', 'trim') . '%';
                    }
                }
                if ($search)
                    $address_where[] = '%' . $search . '%';
                //$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'state='.$this->_request('state','trim'), 'city='.$this->_request('city','trim'),'area='.$this->_request('area','trim'),'search='.$this->_request('search','trim'));
                if ($condition == 'not_contain') {
                    $where[$field] = array('notlike', $address_where, 'OR');
                } else {
                    $where[$field] = array('like', $address_where, 'AND');
                }
            } elseif (!empty($field)) {
                $field_date = M('Fields')->where('(is_main=1 and model="product" and form_type="datetime") or(is_main=1 and model="" and form_type="datetime")')->select();
                foreach ($field_date as $v) {
                    if ($field == $v['field'])
                        $search = is_numeric($search) ? $search : strtotime($search);
                }
                switch ($condition) {
                    case "is" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "isnot" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "contains" :
                        $where[$field] = array('like', '%' . $search . '%');
                        break;
                    case "not_contain" :
                        $where[$field] = array('notlike', '%' . $search . '%');
                        break;
                    case "start_with" :
                        $where[$field] = array('like', $search . '%');
                        break;
                    case "end_with" :
                        $where[$field] = array('like', '%' . $search);
                        break;
                    case "is_empty" :
                        $where[$field] = array('eq', '');
                        break;
                    case "is_not_empty" :
                        $where[$field] = array('neq', '');
                        break;
                    case "gt" :
                        $where[$field] = array('gt', $search);
                        break;
                    case "egt" :
                        $where[$field] = array('egt', $search);
                        break;
                    case "lt" :
                        $where[$field] = array('lt', $search);
                        break;
                    case "elt" :
                        $where[$field] = array('elt', $search);
                        break;
                    case "eq" :
                        $where[$field] = array('eq', $search);
                        break;
                    case "neq" :
                        $where[$field] = array('neq', $search);
                        break;
                    case "between" :
                        $where[$field] = array('between', array($search - 1, $search + 86400));
                        break;
                    case "nbetween" :
                        $where[$field] = array('not between', array($search, $search + 86399));
                        break;
                    case "tgt" :
                        $where[$field] = array('gt', $search + 86400);
                        break;
                    default :
                        $where[$field] = array('eq', $search);
                }
                //$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$_REQUEST["search"]);
            }
        }
        $customer_id = trim($_GET['customer_id']);
        if (!empty($_GET['business_id'])) {
            $product_list = D('BusinessProductView')->where('r_business_product.business_id = %d', $_GET['business_id'])->select();
            $this->product_list = $product_list;
        }
        $product = D('ProductView'); // 实例化对象
        $category = D('ProductCategory'); // 实例化对象
        $where = array();
        $list = $product->order('product_id desc')->where($where)->limit(10)->select();
        $count = $product->where($where)->count();
        $category_list = $category->select();
        $this->treecode = getSubCategoryTreeCode(0, 1);
        $this->field_list = getMainFields('product');
        $this->categoryList = getSubCategory(0, $category_list, ''); //类别选项
        $this->total = $count % 10 > 0 ? ceil($count / 10) : $count / 10;
        $this->count_num = $count;
        $this->business_id = trim($_GET['business_id']);
        $this->assign('list', $list); // 赋值数据集
        $this->display(); // 输出模板
    }

    /**
     * 第一层产品
     *
     * */
    public function mutildialog_product()
    {
        $m_product = M('Product');
        if ($_GET['business_id']) {
            $business_id = intval($_GET['business_id']);
            $business = M('Business')->where('business_id = %d', $business_id)->find();
            $product_list = M('rBusinessProduct')->where('business_id = %d', $business_id)->select();
            foreach ($product_list as $k => $v) {
                $product_list[$k]['product_name'] = $m_product->where('product_id = %d', $v['product_id'])->getField('name');
            }
            $business['product'] = $product_list;
            $this->now_rows = count($product_list);
            //可能性
            $possibility_list = array();
            for ($x = 1; $x <= 10; $x++) {
                $possibility_list[] = $x * 10;
            }
            $this->possibility_list = $possibility_list;
            //商机状态组
            $business['business_type_name'] = M('BusinessType')->where(array('id' => $business['status_type_id']))->getField('name');
            $business['status_name'] = M('BusinessStatus')->where(array('type_id' => $business['status_type_id'], 'status_id' => $business['status_id']))->getField('name');

            $this->business = $business;
            $this->display();
        } elseif ($order_id = $_GET['order_id']) {
            $order_info = M('Order')->where('order_id = %d', $order_id)->find();
            $product_list = M('ROrderProduct')->where('order_id = %d', $order_id)->select();
            foreach ($product_list as $k => $v) {
                $product_list[$k]['product_name'] = $m_product->where('product_id = %d', $v['product_id'])->getField('name');
            }
            $order_info['product'] = $product_list;
            $this->now_rows = count($product_list);
            $this->order_info = $order_info;
            $this->display('mutildialog_product_order');
        } else {
            $customer_id = intval($_GET['customer_id']);
            //可能性
            $possibility_list = array();
            for ($x = 1; $x <= 10; $x++) {
                $possibility_list[] = $x * 10;
            }
            //商机编号
            $business = array();
            $m_config = M('Config');
            $business_custom = $m_config->where('name = "business_custom"')->getField('value');
            // $business_max_id = $m_config->where(array('name'=>'business_code'))->getField('value');
            $business_max_id = M('Business')->max('business_id');
            $business_max_code = str_pad($business_max_id + 1, 4, 0, STR_PAD_LEFT); //填充字符串的左侧（将字符串填充为新的长度）
            $business['business_custom'] = $business_custom;
            $business['code'] = date('Ymd') . '-' . $business_max_code;

            //客户名称
            $business['customer_name'] = M('Customer')->where('customer_id = %d', $customer_id)->getField('name');
            //商机状态组
            $this->type_list = M('BusinessType')->select();
            $this->status_list = M('BusinessStatus')->where(array('type_id' => 1))->order('order_id asc')->select();

            $this->business = $business;
            $this->possibility_list = $possibility_list;
            $this->customer_id = $customer_id;
            $this->display();
        }
    }

    public function mutildialog_product_contract()
    {
        $m_r_contract_sales = M('r_contract_sales');
        $m_sales = M('sales');
        if ($contract_id = $_GET['contract_id']) {
            $sales_id = $m_r_contract_sales->where('contract_id = %d', $contract_id)->getField('sales_id');
            $sales = $m_sales->where('sales_id = %d', $sales_id)->find();
            $product_list = M('sales_product')->where('sales_id = %d', $sales_id)->select();
            foreach ($product_list as $k => $v) {
                $product_list[$k]['product_name'] = M('Product')->where('product_id = %d', $v['product_id'])->getField('name');
            }
            $sales['product'] = $product_list;

            //dump($business);die;
            $this->sales = $sales;
            $this->sales_id = $sales_id;
            //$this->business_id = $business_id;
        }
        $this->display();
    }

    /**
     * 首页获取产品销量和销售额统计
     * @ level 0:自己的数据  1:自己和下属的数据
     * */
    public function getmonthlysales()
    {
        $m_product = M('product');
        $m_sales = M('sales');
        $m_sales_product = M('salesProduct');
        $dashboard = M('user')->where('user_id = %d', session('user_id'))->getField('dashboard');
        $widget = unserialize($dashboard);
        $id = intval($_GET['id']);
        foreach ($widget['dashboard'] as $k => $v) {
            if ($v['widget'] == 'Productmonthlysales' && $v['id'] == $id) {
                if ($v['level'] == '1') {
                    $where['creator_role_id'] = array('in', getSubRoleId());
                } else {
                    $where['creator_role_id'] = array('eq', session('role_id'));
                }
            }
        }

        $total_amount = array();
        $total_price = array();
        $year = date('Y');
        $moon = 1;
        $where['type'] = array('eq', 0); //销售
        $where['is_checked'] = array('eq', 1);
        $where['status'] = array(array('eq', 97), array('eq', 98), 'or'); //未出库或已出库
        while ($moon <= 12) {
            if ($moon == 12) {
                $where['sales_time'] = array(array('egt', strtotime($year . '-' . $moon . '-1')), array('lt', strtotime(($year + 1) . '-1-1')), 'and');
            } else {
                $where['sales_time'] = array(array('egt', strtotime($year . '-' . $moon . '-1')), array('lt', strtotime($year . '-' . ($moon + 1) . '-1')), 'and');
            }

            $sales = $m_sales->where($where)->select(); //销售数组
            $single_price = 0; //单个商品月销售总额
            $single_amounts = 0; //单个商品月销售量
            foreach ($sales as $v) {
                //为了防止sales表和sales_product表中的数据对应不上,避免统计数值不准确,所以使用sales_product表中的数据来统计
                $sales_product = $m_sales_product->where('sales_id = %d', $v['sales_id'])->select();
                foreach ($sales_product as $val) {
                    $single_amounts += $val['amount'];
                    $all_price = $val['unit_price'] * $val['amount']; //总额
                    // $after_discount = $all_price - ($all_price * $val['discount_rate']/100);  //折扣后金额
                    // $after_tax = $after_discount + ($after_discount * $val['tax_rate']/100); //税后金额
                    $single_price += $all_price;
                }
                // $single_price = $single_price - $v['discount_price'];//减去整单的折扣额
                $single_price = $single_price * (100 - $v['final_discount_rate']) / 100;
            }

            $total_amount[] = $single_amounts;
            $total_price[] = $single_price;
            $moon++;
        }
        $total_sales = array('amount' => $total_amount, 'price' => $total_price);
        $this->ajaxReturn($total_sales, 'success', 1);
    }

    /**
     * 首页获取最高销量的产品统计
     * @ level 0:自己的数据  1:自己和下属的数据
     * */
    public function getmonthlyamount()
    {
        $m_product = M('product');
        $m_sales = M('sales');
        $m_sales_product = M('salesProduct');
        $dashboard = M('user')->where('user_id = %d', session('user_id'))->getField('dashboard');
        $widget = unserialize($dashboard);
        $id = intval($_GET['id']);
        foreach ($widget['dashboard'] as $k => $v) {
            if ($v['widget'] == 'Productmonthlyamount' && $v['id'] == $id) {
                if ($v['level'] == '1') {
                    $where['creator_role_id'] = array('in', getSubRoleId());
                } else {
                    $where['creator_role_id'] = array('eq', session('role_id'));
                }
            }
        }

        $productData = array();
        $year = date('Y');
        $moon = 1;
        $where['type'] = array('eq', 0); //销售
        $where['is_checked'] = array('eq', 1);
        $where['status'] = array(array('eq', 97), array('eq', 98), 'or'); //未出库或已出库
        while ($moon <= 12) {
            if ($moon == 12) {
                $where['sales_time'] = array(array('egt', strtotime($year . '-' . $moon . '-1')), array('lt', strtotime(($year + 1) . '-1-1')), 'and');
            } else {
                $where['sales_time'] = array(array('egt', strtotime($year . '-' . $moon . '-1')), array('lt', strtotime($year . '-' . ($moon + 1) . '-1')), 'and');
            }

            $salesIdArr = $m_sales->where($where)->getField('sales_id', true); //销售数组
            if (is_array($salesIdArr)) {
                $productArr = $m_sales_product->field('sum(amount) as amount,product_id')->where(array('sales_id' => array('in', $salesIdArr)))->group('product_id')->order('amount desc')->find();
                $product_name = $m_product->where('product_id = %d', $productArr['product_id'])->getField('name');
                $product_amount = empty($productArr['amount']) ? 0 : $productArr['amount'];
            } else {
                $product_name = '无';
                $product_amount = 0;
            }

            $productData[] = array($product_name, intval($product_amount)); //月度最高销售量产品
            $moon++;
        }
        $this->ajaxReturn($productData, 'success', 1);
    }

    //财务统计高级搜索
    public function advance_search()
    {
        $module_name = trim($_GET['module_name']);
        $action_name = trim($_GET['action_name']);
        $idArray = getPerByAction($module_name, $action_name, false);
        //$idArray = getSubRoleId(true, 1);
        $roleList = array();
        foreach ($idArray as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;
        $url = getCheckUrlByAction($module_name, $action_name);
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
        }
        $this->assign('departmentList', $departmentList);
        $this->type_id = intval($_GET['type_id']);
        $this->content_id = intval($_GET['content_id']);
        $this->display();
    }

    //高级搜索获取产品类别
    public function categoryList()
    {
        $category = M('product_category')->select();
        $category_list = getSubCategory(0, $category, '');
        $this->ajaxReturn($category_list, '', 1);
    }

    //修改人才状态
    public function editstatus()
    {
        if ($this->isPost()) {
            $product_id = $_POST['product_id'] ? $_POST['product_id'] : '';
            if ($product_id) {
                //修改操作
                $data['eid'] = $product_id;
                $data['r_status'] = $_POST['status'];

                if (M('resume')->where("eid=%d", $data['eid'])->save($data)) {
                    $this->ajaxReturn('', L('修改成功'), 1);
                } else {
                    $this->ajaxReturn('', L('修改失败'), 2);
                }
            }
        } else {

            $product_id = $_GET['id'] ? $_GET['id'] : '';
            $where['id'] = $product_id;
            $jobrank = M('product')->where($where)->select();

            if ($jobrank) {
                $this->jobrankid = $jobrankid;
                $this->jobrankname = $jobrank[0]['name'];
            } else {
                $this->jobrankid = '0';
                $this->jobrankname = '';
            }

            $this->display();
        }
    }

    function checkTel()
    {
        if (IS_POST) {
            $resume = M('resume');
            $where['telephone'] = I('post.tel');
            $resume->where($where)->find() ? $this->ajaxReturn(true) : $this->ajaxReturn(false);
        }
    }
}
