<?php

/**
 * 线索模块
 *
 * */
class LeadsAction extends Action
{

    /**
     * 用于判断权限
     * @permission 无限制
     * @allow 登录用户可访问
     * @other 其他根据系统设置
     * */
    public function _initialize() {

        $title = "报表管理";
        $this->assign("title", $title);
        $action = array(
            'permission' => array(),
            'allow' => array('transform', 'checkinfo', 'changecontent', 'getaddchartbyroleid', 'getownchartbyroleid', 'check', 'receive', 'fenpei', 'batchreceive', 'assigndialog', 'batchassign', 'revert', 'validate', 'remove', 'excelimportdownload', 'getcurrentstatus', 'excelimportact', 'change_customer', 'field_save', 'analyticsCount', 'analytics', 'dialoghk', 'dialogbd', 'dialogcustomer', 'dialogprojectnum', 'dialogresumenum', 'dialogfinenum', 'dialoginterview', 'dialoginterviewt', 'dialogpresent', 'dialogoffer', 'dialogofferd', 'dialogenter', 'dialogsafe','exportExcel','dialogcallist','dialogcc')
        );
        B('Authenticate', $action);
        $this->_permissionRes = getPerByAction(MODULE_NAME, ACTION_NAME);
    }

    /**
     * 部门业绩达成率
     */
    public function departmentrate() {
        $integral = D('DepartmentIntegral');
        $m_target = M('Target');
        $department = M('role_department');
        $set = array();
        $where['parent_id'] = 1;
        $fessial = $department->where($where)->select();
        // 查询事业部
        $fk = 0;
        foreach ($fessial as $k => $v) {
            $result = $department->where(array('parent_id' => intval($v['department_id'])))->select();  // 事业部下的所有部门（role_department表）
            $set[$fk]['unit'] = $v['name'];
            if (!empty($result)) {
                foreach ($result as $k1 => $v1) {
                    $set[$fk]['department_id'] = $v1['department_id'];
                    $set[$fk]['part'] = $v1['name'];
                    //存储详细业绩信息
                    $set[$fk]['detail'] = array();
                    for ($i = 0; $i <= 11; $i++) {
                        //计算部门全部目前业绩总和
                        $data = $integral->where("role_department.department_id=%d and yjtime=%d", intval($v1['department_id']), mktime(0, 0, 0, ($i + 1), 1, date('Y')))->select();
                        $total = 0;
                        foreach ($data as $k => $v) {
                            $total += intval($v['achievement']);
                        }
                        $set[$fk]['detail'][$i]['achieve'] = $total;
                        //查询目标
                        $res = $m_target->where(array('id_type' => 1, 'id' => intval($v1['department_id']), 'year' => intval(date('Y'))))->find();
                        $set[$fk]['detail'][$i]['target'] = $res['month' . ($i + 1)];
                        //计算目标达成率
                        if (empty($res['month' . ($i + 1)]))
                            $set[$fk]['detail'][$i]['targetRate'] = null;
                        else
                            $set[$fk]['detail'][$i]['targetRate'] = round(($total / $res['month' . ($i + 1)]), 2);
                        //取出晋升业绩
                        $set[$fk]['detail'][$i]['promoteAchieve'] = $res['topachieve' . ($i + 1)];
                        //取出出勤比
                        $set[$fk]['detail'][$i]['attendanceRate'] = $res['attendanceRate' . ($i + 1)];
                        //计算业绩达成率
                        list($current, $topachieve) = split('/', $res['attendanceRate' . ($i + 1)]);
                        $set[$fk]['detail'][$i]['yieldRate'] = round($total / intval($res['topachieve' . ($i + 1)]) * (intval($current) / intval($topachieve)), 2);
                    }
                    $fk++;
                }
            }
        }
        $this->assign('list', $set);
        $this->display();
    }

    /**
     * 设置部门目标
     */
    public function set_target() {
        $m_target = M('Target');

        if ($this->isPost()) {
            $where['target_type'] = intval($_POST['target_type']);
            $where['year'] = intval($_POST['year']);
            $department_id = intval($_POST['department_id']);
            if (!empty($department_id)) {
                //检查是否已经设置
                $where['id_type'] = 1;
                $where['id'] = $department_id;
                $target = $m_target->where($where)->find();
                if ($m_target->create()) {
                    $m_target->id_type = 1;
                    $m_target->id = $department_id;
                    if ($target) {
                        $m = $m_target->where('target_id = %d', $target['target_id'])->save();
                    } else {
                        $m = $m_target->add();
                    }
                    if ($m !== false) {
                        alert('success', '设置成功！', $_SERVER['HTTP_REFERER']);
                    } else {
                        alert('error', '保存失败！', $_SERVER['HTTP_REFERER']);
                    }
                } else {
                    alert('error', '保存失败！', $_SERVER['HTTP_REFERER']);
                }
            } else if (is_array($_POST['role_ids'])) {
                foreach ($_POST['role_ids'] as $k => $v) {
                    //检查是否已经设置
                    $where['id_type'] = 2;
                    $where['id'] = $v;
                    $target = $m_target->where($where)->find();
                    if ($m_target->create()) {
                        $m_target->id_type = 2;
                        $m_target->id = $v;

                        if ($target) {
                            $m = $m_target->where('target_id = %d', $target['target_id'])->save();
                        } else {
                            $m = $m_target->add();
                        }
                        if ($m === false) {
                            alert('error', '保存失败！', $_SERVER['HTTP_REFERER']);
                        }
                    } else {
                        alert('error', '保存失败！', $_SERVER['HTTP_REFERER']);
                    }
                }
                alert('success', '设置成功！', $_SERVER['HTTP_REFERER']);
            }
        } else {
            $rel = intval($_GET['rel']);
            if ($rel == 1 || $rel == 2) {
                //部门岗位
                $url = getCheckUrlByAction(MODULE_NAME, ACTION_NAME);
                $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
                if ($per_type == 2 || session('?admin')) {
                    $departmentList = M('roleDepartment')->select();
                } else {
                    $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
                }
                $this->assign('departmentList', $departmentList);
            } else if ($rel == 3) { //修改部门目标
                $where['target_type'] = intval($_GET['target_type']);
                $where['id_type'] = 1;
                $where['id'] = intval($_GET['id']);
                $where['year'] = intval($_GET['year']);
                $target = $m_target->where($where)->find();
                $target['name'] = M('roleDepartment')->where('department_id = %d', intval($_GET['id']))->getField('name');
                $this->assign('target', $target);
            } else if ($rel == 4) { //修改个人目标
                $where['target_type'] = intval($_GET['target_type']);
                $where['id_type'] = 2;
                $where['id'] = intval($_GET['id']);
                $where['year'] = intval($_GET['year']);
                $target = $m_target->where($where)->find();
                $target['name'] = M('User')->where('role_id = %d', intval($_GET['id']))->getField('full_name');
                $this->assign('target', $target);
            }

            //年份列表
            $this->year_list = range(2015, 2050);

            $this->alert = parseAlert();
            $this->display();
        }
    }

    /**
     * 字段查重
     * */
    public function checkinfo() {
        if ($this->isAjax()) {
            $field_value = $_POST['field_value'];
            $field_name = $_POST['field_name'];
            $leads_id = intval($_POST['leads_id']);
            $m_leads = M('Leads');
            $m_customer = M('Customer');
            $where[$field_name] = $field_value;
            if ($leads_id) {
                $where['leads_id'] = $leads_id;
            }
            $where['is_deleted'] = 0;
            $info = $m_leads->where($where)->field('owner_role_id,creator_role_id,update_time,leads_id')->find(); //判断是否存在，如存在获取负责人
            if ($info) {
                $outdays = M('config')->where('name="leads_outdays"')->getField('value'); //获取自动回收时间
                $outdate = empty($outdays) ? time() : time() - 86400 * $outdays;
                $url = U('leads/view', 'id=' . $info['leads_id']);
                if ($info['owner_role_id'] == 0 || $info['update_time'] < $outdate) { //如果负责人为空或超时未跟进未线索池
                    $create_role_name = M('user')->where('role_id =%d', $info['creator_role_id'])->getField('name');
                    $message = '该线索已存在<a target="_blank" href="' . $url . '">线索池</a>中！创建人为:' . $create_role_name;
                } else {
                    $owner_role_name = M('user')->where('role_id =%d', $info['owner_role_id'])->getField('name');
                    $message = '该线索已存在<a target="_blank" href="' . $url . '">线索</a>中！负责人为:' . $owner_role_name;
                }
                $this->ajaxReturn($message, '线索重复！', 1);
            } else {
                $this->ajaxReturn(0, '为空！', 0);
            }
        }
    }

    /**
     * 线索名验重
     *
     * */
    public function check() {
        if ($_REQUEST['leads_id']) {
            $where['leads_id'] = array('neq', $_REQUEST['leads_id']);
        }
        import("@.ORG.SplitWord");
        $sp = new SplitWord();
        $m_leads = M('Leads');
        $m_customer = M('Customer');
        //ignore words
        $useless_words = array(L('COMPANY'), L('LIMITED'), L('OF'), L('COMPANY_LIMITED'));
        if ($this->isAjax()) {
            $split_result = $sp->SplitRMM($_POST['name']);
            if (!is_utf8($split_result))
                $split_result = iconv("GB2312//IGNORE", "UTF-8", $split_result);
            $result_array = explode(' ', trim($split_result));
            if (count($result_array) < 2) {
                $this->ajaxReturn(0, '', 0);
                die;
            }
            foreach ($result_array as $k => $v) {
                if (in_array($v, $useless_words))
                    unset($result_array[$k]);
            }

            $leads_commpany_list = $m_leads->where($where)->getField('name', true);
            $customer_commpany_list = $m_customer->getField('name', true);

            $search_array = array();
            foreach ($leads_commpany_list as $k => $v) {
                $search = 0;
                foreach ($result_array as $k2 => $v2) {
                    if (strpos($v, $v2) > -1) {
                        $v = str_replace("$v2", "<span style='color:red;'>$v2</span>", $v, $count);
                        $search += $count;
                    }
                }
                if ($search > 2)
                    $search_array[$k] = array('value' => $v, 'search' => $search);
            }
            $seach_sort_result['leads'] = array_sort($search_array, 'search', 'desc');

            $customer_search_array = array();
            foreach ($customer_commpany_list as $k => $v) {
                $search = 0;
                foreach ($result_array as $k2 => $v2) {
                    if (strpos($v, $v2) > -1) {
                        $v = str_replace("$v2", "<span style='color:red;'>$v2</span>", $v, $count);
                        $search += $count;
                    }
                }
                if ($search > 2)
                    $customer_search_array[$k] = array('value' => $v, 'search' => $search);
            }
            $seach_sort_result['customer'] = array_sort($customer_search_array, 'search', 'desc');

            $leads_search = $seach_sort_result['leads'];
            $customer_search = $seach_sort_result['customer'];

            if (empty($leads_search) && empty($customer_search)) {
                $this->ajaxReturn(0, L('YOU_CAN_ADD'), 0);
            } else {
                $this->ajaxReturn($seach_sort_result, L('EXIST_SAME_LEADS_OR_COMPANY'), 1);
            }
        }
    }

    /**
     * 线索字段ajax验证
     *
     * */
    public function validate() {
        if ($this->isAjax()) {
            if (!$this->_request('clientid', 'trim') || !$this->_request($this->_request('clientid', 'trim'), 'trim'))
                $this->ajaxReturn("", "", 3);
            $field = M('Fields')->where('model = "leads" and field = "%s"', $this->_request('clientid', 'trim'))->find();
            $m_leads = $field['is_main'] ? D('Leads') : D('LeadsData');
            $where[$this->_request('clientid', 'trim')] = array('eq', $this->_request($this->_request('clientid', 'trim'), 'trim'));
            if ($this->_request('id', 'intval', 0)) {
                $where[$m_leads->getpk()] = array('neq', $this->_request('id', 'intval', 0));
            }
            if ($this->_request('clientid', 'trim')) {
                if ($m_leads->where($where)->find()) {
                    $this->ajaxReturn("", "", 1);
                } else {
                    $this->ajaxReturn("", "", 0);
                }
            } else {
                $this->ajaxReturn("", "", 0);
            }
        }
    }

    /**
     * 线索列表页面
     *
     * */
    public function index() {
        $by = isset($_GET['by']) ? trim($_GET['by']) : 'me';
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $below_ids = getPerByAction(MODULE_NAME, ACTION_NAME, true);
        $d_v_leads = D('LeadsView');
        $outdays = M('config')->where('name="leads_outdays"')->getField('value');
        $outdate = empty($outdays) ? 0 : time() - 86400 * $outdays;
        $where = array();
        $params = array();
        $order = "create_time desc";
        $todaywhere['have_time'] = $where['have_time'] = array('egt', $outdate);

        if ($_GET['desc_order']) {
            $order = trim($_GET['desc_order']) . ' desc';
        } elseif ($_GET['asc_order']) {
            $order = trim($_GET['asc_order']) . ' asc';
        }

        switch ($by) {
            case 'today' :
                $where['nextstep_time'] = array(array('lt', strtotime(date('Y-m-d', time())) + 86400), array('gt', 0), 'and');
                $where['owner_role_id'] = session('role_id');
                break;
            case 'week' :
                $w = date("w", time()); //获取当前周的第几天 周日是 0 周一 到周六是 1 -6
                $d = $w ? $w - 1 : 6; //如果是周日 -6天
                $start_week = strtotime("" . date("Y-m-d") . " -" . $d . " days"); //本周开始时间
                $end_week = strtotime("" . date("Y-m-d", $start_week) . " +7 days"); //本周结束时间

                $where['nextstep_time'] = array(array('gt', $start_week), array('lt', $end_week), 'and');
                break;
            case 'month' :
                $where['nextstep_time'] = array(array('lt', strtotime(date('Y-m-01', strtotime('+1 month')))), array('gt', strtotime(date('Y-m-01'))), 'and');
                break;
            case 'd7' :
                $where['update_time'] = array('lt', strtotime(date('Y-m-d', time())) - 86400 * 6);
                break;
            case 'd15' :
                $where['update_time'] = array('lt', strtotime(date('Y-m-d', time())) - 86400 * 14);
                break;
            case 'd30' :
                $where['update_time'] = array('lt', strtotime(date('Y-m-d', time())) - 86400 * 29);
                break;
            case 'add' :
                $order = 'create_time desc';
                break;
            case 'update' :
                $order = 'update_time desc';
                break;
            case 'sub' :
                $where['owner_role_id'] = array('in', implode(',', $below_ids));
                break;
            case 'subcreate' :
                $where['creator_role_id'] = array('in', implode(',', $below_ids));
                break;
            case 'public' :
                unset($where['have_time']);
                $where['_string'] = "leads.owner_role_id=0 or leads.have_time < $outdate";
                break;
            case 'deleted':
                $where['is_deleted'] = 1;
                unset($where['have_time']);
                break;
            case 'transformed' :
                $where['is_transformed'] = 1;
                break;
            case 'me' :
                $where['owner_role_id'] = session('role_id');
                break;
            default :
                $where['owner_role_id'] = array('in', implode(',', $this->_permissionRes));
                break;
        }
        $this->by = $by;
        if ($by != 'deleted') {
            $where['is_deleted'] = array('neq', 1);
        }
        if ($by != 'transformed' && $by != 'deleted') {
            $where['is_transformed'] = array('neq', 1);
        }
        //权限判断
        if ($this->_permissionRes && !isset($where['owner_role_id']) && $by != 'public') {
            if ($by != 'deleted') {
                $where['owner_role_id'] = array('in', $this->_permissionRes);
            } else {
                $where['owner_role_id'] = array('in', '0,' . implode(',', $this->_permissionRes));
            }
        }

        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);

            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);

            if ($this->_request('state')) {

                $state = $this->_request('state', 'trim');
                $address_where[] = '%' . $state . '%';

                if ($this->_request('city')) {
                    $city = $this->_request('city', 'trim');
                    $address_where[] = '%' . $city . '%';

                    if ($this->_request('area')) {
                        $area = $this->_request('area', 'trim');
                        $address_where[] = '%' . $area . '%';
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
                $field_date = M('Fields')->where('is_main=1 and (model="" or model="leads") and form_type="datetime"')->select();
                foreach ($field_date as $v) {
                    if ($field == $v['field'] || $field == 'customer.create_time' || $field == 'customer.update_time')
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
                $params = array('field=' . trim($_REQUEST['field']), 'condition=' . $condition, 'search=' . $_REQUEST["search"]);
            }
            //过滤不在权限范围内的role_id
            if (trim($_REQUEST['field']) == 'owner_role_id') {
                if (!in_array(trim($search), $below_ids)) {
                    $where['owner_role_id'] = array('in', $below_ids);
                }
            }
        }
        //多选类型字段
        $check_field_arr = M('Fields')->where(array('model' => 'leads', 'form_type' => 'box', 'setting' => array('like', '%' . "'type'=>'checkbox'" . '%')))->getField('field', true);
        //高级搜索
        if (!$_GET['field']) {
            foreach ($_GET as $k => $v) {
                if ($k != 'act' && $k != 'content' && $k != 'p' && $k != 'condition' && $k != 'listrows' && $k != 'daochu' && $k != 'this_page' && $k != 'current_page' && $k != 'export_limit' && $k != 'desc_order' && $k != 'asc_order' && $k != 'by') {
                    if (is_array($v)) {
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
                                $k = 'leads.create_time';
                            } elseif ($k == 'update_time') {
                                $k = 'leads.update_time';
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
                                $where[$k] = field($v['value'], $v['condition']);
                            }
                        }
                    } else {
                        if (!empty($v)) {
                            $where[$k] = field($v);
                        }
                    }
                }
                if (is_array($v)) {
                    foreach ($v as $key => $value) {
                        $params[] = $k . '[' . $key . ']=' . $value;
                    }
                } else {
                    $params[] = $k . '=' . $v;
                }
            }
            //过滤不在权限范围内的role_id
            if (isset($where['owner_role_id'])) {
                if (is_array($where['owner_role_id']) && !empty($where['owner_role_id']['1']) && !in_array(intval($where['owner_role_id']['1']), $this->_permissionRes)) {
                    $where['owner_role_id'] = array('in', implode(',', $this->_permissionRes));
                    // $where['owner_role_id'] = array('in',$below_ids);
                }
            }
        }
        //高级搜索字段
        $fields_list_data = M('Fields')->where(array('model' => array('in', array('', 'leads')), 'is_main' => 1))->field('field,form_type')->select();
        foreach ($fields_list_data as $k => $v) {
            $fields_data_list[$v['field']] = $v['form_type'];
        }
        $fields_search = array();
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
        $this->fields_search = $fields_search;

        if (trim($_GET['act'] == 'sms')) {
            if (!checkPerByAction('setting', 'sendsms')) {
                alert('error', L('DO NOT HAVE PRIVILEGES'), $_SERVER['HTTP_REFERER']);
            } else {
                $leadsList = $d_v_leads->where($where)->select();
                $contacts = array();
                foreach ($leadsList as $k => $v) {
                    $contacts[] = array('name' => $v['contacts_name'], 'customer_name' => $v['name'], 'telephone' => trim($v['mobile']));
                }
                $this->contacts = $contacts;
                $this->alert = parseAlert();
                $this->display('Setting:sendsms');
            }
        } elseif (trim($_GET['act']) == 'excel') {
            if (checkPerByAction('leads', 'excelexport')) {
                $order = $order ? $order : 'create_time desc';
                $dc_id = $_GET['daochu'];
                if ($dc_id != '') {
                    $where['leads_id'] = array('in', $dc_id);
                }
                $current_page = intval($_GET['current_page']);
                $export_limit = intval($_GET['export_limit']);
                $limit = ($export_limit * ($current_page - 1)) . ',' . $export_limit;
                $leadsList = $d_v_leads->where($where)->order($order)->limit($limit)->select();
                $this->excelExport($leadsList);
            } else {
                alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            if ($_GET['listrows']) {
                $listrows = intval($_GET['listrows']);
                $params[] = "listrows=" . intval($_GET['listrows']);
            } else {
                $listrows = 15;
                $params[] = "listrows=" . $listrows;
            }
            $count = $d_v_leads->where($where)->count();

            $p_num = ceil($count / $listrows);
            if ($p_num < $p) {
                $p = $p_num;
            }
            $list = $d_v_leads->where($where)->page($p . ',' . $listrows)->order($order)->select();
            import("@.ORG.Page");
            $Page = new Page($count, $listrows);
            if (!empty($_GET['by'])) {
                $params[] = 'by=' . trim($_GET['by']);
            }
            $this->parameter = implode('&', $params);
            //by_parameter(特殊处理)
            $this->by_parameter = str_replace('by=' . $_GET['by'], '', implode('&', $params));

            if ($_GET['desc_order']) {
                $params[] = "desc_order=" . trim($_GET['desc_order']);
            } elseif ($_GET['asc_order']) {
                $params[] = "asc_order=" . trim($_GET['asc_order']);
            }
            $Page->parameter = implode('&', $params);

            $this->assign('page', $Page->show());

            if ($by == 'deleted') {
                foreach ($list as $k => $v) {
                    $list[$k]["delete_role"] = getUserByRoleId($v['delete_role_id']);
                    $list[$k]["owner"] = getUserByRoleId($v['owner_role_id']);
                    $list[$k]["creator"] = getUserByRoleId($v['creator_role_id']);
                }
            } elseif ($by == 'transformed') {
                $m_business = M('Business');
                $m_contacts = M('Contacts');
                $m_customer = M('Customer');
                foreach ($list as $k => $v) {
                    $list[$k]["owner"] = getUserByRoleId($v['owner_role_id']);
                    $list[$k]["creator"] = getUserByRoleId($v['creator_role_id']);
                    $list[$k]["transform_role"] = getUserByRoleId($v['transform_role_id']);
                    $list[$k]["business_name"] = $m_business->where('business_id = %d', $v['business_id'])->getField('name');
                    $list[$k]["contacts_name"] = $m_contacts->where('contacts_id = %d', $v['contacts_id'])->getField('name');
                    $list[$k]["customer_name"] = $m_customer->where('customer_id = %d', $v['customer_id'])->getField('name');
                }
            } else {
                $m_remind = M('Remind');
                foreach ($list as $k => $v) {
                    $days = 0;
                    //提醒
                    $remind_info = array();
                    $remind_info = $m_remind->where(array('module' => 'leads', 'module_id' => $v['leads_id'], 'create_role_id' => session('role_id'), 'is_remind' => array('neq', 1)))->order('remind_id desc')->find();
                    $list[$k]['remind_time'] = !empty($remind_info) ? $remind_info['remind_time'] : '';
                    $list[$k]["owner"] = D('RoleView')->where('role.role_id = %d', $v['owner_role_id'])->find();
                    $list[$k]["creator"] = D('RoleView')->where('role.role_id = %d', $v['creator_role_id'])->find();
                    $days = M('leads')->where('leads_id = %d', $v['leads_id'])->getField('have_time');
                    $list[$k]["days"] = $outdays - floor((time() - $days) / 86400);
                }
            }

            $todaywhere['is_deleted'] = array('neq', 1);
            $todaywhere['is_transformed'] = array('neq', 1);
            $todaywhere['owner_role_id'] = session('role_id');
            $todaywhere['nextstep_time'] = array(array('lt', strtotime(date('Y-m-d', time())) + 86400), array('gt', 0), 'and');
            $this->todaycount = $d_v_leads->where($todaywhere)->count();

            $this->listrows = $listrows;
            $d_role_view = D('RoleView');
            $this->role_list = $d_role_view->where('role.role_id in (%s)', implode(',', $below_ids))->select();
            $this->assign('leadslist', $list);
            $this->assign('count', $count);
            $this->field_array = getIndexFields('leads');
            $this->field_list = getMainFields('leads');
            $this->alert = parseAlert();
            $this->display();
        }
    }

    /**
     * 线索添加页面
     *
     * */
    public function add() {
        if ($this->isPost()) {
            $m_leads = D('Leads');
            $m_leads_data = D('LeadsData');
            $field_list = M('Fields')->where('model = "leads"  and in_add = 1')->order('order_id')->select();
            foreach ($field_list as $v) {
                switch ($v['form_type']) {
                    case 'address':
                        $_POST[$v['field']] = implode(chr(10), $_POST[$v['field']]);
                        break;
                    case 'datetime':
                        $_POST[$v['field']] = strtotime($_POST[$v['field']]);
                        break;
                    case 'box':
                        eval('$field_type = ' . $v['setting'] . ';');
                        if ($field_type['type'] == 'checkbox') {
                            $b = array_filter($_POST[$v['field']]);
                            $_POST[$v['field']] = !empty($b) ? implode(chr(10), $b) : '';
                        }
                        break;
                }
            }
            if ($m_leads->create()) {
                if ($m_leads_data->create() !== false) {
                    if ($_POST['nextstep_time'])
                        $m_leads->nextstep_time = $_POST['nextstep_time'];
                    $m_leads->create_time = time();
                    $m_leads->update_time = time();
                    $m_leads->have_time = time();
                    $m_leads->creator_role_id = session('role_id');
                    $m_leads->owner_role_id = session('role_id');
                    if ($leads_id = $m_leads->add()) {
                        $m_leads_data->leads_id = $leads_id;
                        $m_leads_data->add();
                        actionLog($leads_id);
                        if ($_POST['submit'] == L('SAVE')) {
                            alert('success', L('LEADS_ADD_SUCCESS'), U('leads/view', 'id=' . $leads_id));
                        } else {
                            alert('success', L('LEADS_ADD_SUCCESS'), U('leads/view', 'id=' . $leads_id));
                        }
                    } else {
                        $this->error(L('INVALIDATE_PARAM_ADD_LEADS_FAILED'));
                    }
                } else {
                    $this->error($m_leads_data->getError());
                }
            } else {
                $this->error($m_leads->getError());
            }
        } else {
            $field_list = field_list_html("add", "leads");
            $this->field_list = $field_list;
            $this->alert = parseAlert();
            $this->display();
        }
    }

    /**
     * 线索编辑页面
     *
     * */
    public function edit() {
        $leads_id = $this->_get('id', 'intval', intval($_POST['leads_id']));
        if (!$leads_id) {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        } elseif (!$d_v_leads = D('LeadsView')->where('leads.leads_id = %d', $leads_id)->find()) {
            alert('error', L('LEADS_DOES_NOT_EXIST'), $_SERVER['HTTP_REFERER']);
        } elseif ($this->_permissionRes && !in_array($d_v_leads['owner_role_id'], $this->_permissionRes)) {
            alert('error', L('DO NOT HAVE PRIVILEGES'), $_SERVER['HTTP_REFERER']);
        }

        $field_list = M('Fields')->where('model = "leads"')->order('order_id')->select();
        if ($this->isPost()) {
            $m_leads = M('Leads');
            $m_leads_data = M('LeadsData');
            foreach ($field_list as $v) {
                switch ($v['form_type']) {
                    case 'address':
                        $_POST[$v['field']] = implode(chr(10), $_POST[$v['field']]);
                        break;
                    case 'datetime':
                        $_POST[$v['field']] = strtotime($_POST[$v['field']]);
                        break;
                    case 'box':
                        eval('$field_type = ' . $v['setting'] . ';');
                        if ($field_type['type'] == 'checkbox') {
                            $_POST[$v['field']] = implode(chr(10), $_POST[$v['field']]);
                        }
                        break;
                }
            }
            if ($m_leads->create()) {
                if ($m_leads_data->create() !== false) {
                    $m_leads->update_time = time();
                    $a = $m_leads->where('leads_id= %d', $_REQUEST['leads_id'])->save();
                    $b = $m_leads_data->where('leads_id=%d', $_REQUEST['leads_id'])->save();
                    if ($a && $b !== false) {
                        actionLog($_REQUEST['leads_id']);
                        alert('success', L('LEADS_MODIFIED_SUCCESSFULLY'), $_POST['jump_url']);
                    } else {
                        $this->error(L('LEADS_MODIFIED_FAILED'));
                    }
                } else {
                    $this->error($m_leads_data->getError());;
                }
            } else {
                $this->error($m_leads->getError());
            }
        } elseif ($_REQUEST['id']) {
            $d_v_leads['owner'] = D('RoleView')->where('role.role_id = %d', $d_v_leads['owner_role_id'])->find();

            $field_list = field_list_html("edit", "leads", $d_v_leads);
            $this->field_list = $field_list;
            $this->leads = $d_v_leads;
            $this->alert = parseAlert();
            $this->jump_url = $_SERVER['HTTP_REFERER'];
            $this->display();
        } else {
            $this->error(L('INVALIDATE_PARAM'));
        }
    }

    /**
     * 线索回收站删除
     *
     * */
    public function completeDelete() {
        $m_leads = M('Leads');
        $m_leads_data = M('LeadsData');
        $r_module = array('Log' => 'RLeadsLog', 'File' => 'RFileLeads', 'Event' => 'REventLeads', 'Task' => 'RLeadsTask');
        if ($this->isPost()) {
            $leads_ids = is_array($_POST['leads_id']) ? implode(',', $_POST['leads_id']) : '';
            if ('' == $leads_ids) {
                alert('error', L('NOT CHOOSE ANY'), $_SERVER['HTTP_REFERER']);
            } else {
                if (!session('?admin')) {
                    alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
                }
                if (($m_leads->where('leads_id in (%s)', $leads_ids)->delete()) && ($m_leads_data->where('leads_id in (%s)', $leads_ids)->delete())) {
                    foreach ($_POST['leads_id'] as $value) {
                        actionLog($value);
                        foreach ($r_module as $key2 => $value2) {
                            $module_ids = M($value2)->where('leads_id = %d', $value)->getField($key2 . '_id', true);
                            M($value2)->where('leads_id = %d', $value)->delete();
                            if (!is_int($key2)) {
                                M($key2)->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
                            }
                        }
                    }
                    alert('success', L('DELETED SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
                } else {
                    alert('error', L('DELETE FAILED CONTACT THE ADMINISTRATOR'), $_SERVER['HTTP_REFERER']);
                }
            }
        } elseif ($_GET['id']) {
            $leads = $m_leads->where('leads_id = %d', $_GET['id'])->find();
            if (is_array($leads)) {
                if ($leads['owner_role_id'] == session('role_id') || session('?admin')) {
                    if ($m_leads->where('leads_id = %d', $_GET['id'])->delete()) {
                        foreach ($r_module as $key2 => $value2) {
                            $module_ids = M($value2)->where('leads_id = %d', $_GET['id'])->getField($key2 . '_id', true);
                            M($value2)->where('leads_id = %d', $_GET['id'])->delete();
                            if (!is_int($key2)) {
                                M($key2)->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
                            }
                        }
                        actionLog($_GET['id']);
                        alert('success', L('DELETED SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
                    } else {
                        alert('error', L('DELETE FAILED CONTACT THE ADMINISTRATOR'), $_SERVER['HTTP_REFERER']);
                    }
                } else {
                    alert('error', L('HAVE NOT PRIVILEGES'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                alert('error', L('LEADS_DOES_NOT_EXIST'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            alert('error', L('SELECT_LEADS_TO_DELETE'), $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 线索删除
     *
     * */
    public function delete() {
        $m_leads = M('Leads');
        $m_leads_data = M('LeadsData');
        $r_module = array('Log' => 'RLeadsLog', 'File' => 'RFileLeads', 'Event' => 'REventLeads', 'Task' => 'RLeadsTask');
        if ($this->isPost()) {
            $leads_ids = is_array($_POST['leads_id']) ? implode(',', $_POST['leads_id']) : '';
            if (!$leads_ids) {
                $this->ajaxReturn('', L('HAVE_NOT_CHOOSE_ANY_CONTENT'), 0);
            }
            $where = array();
            if (!session('?admin') && !checkPerByAction('leads', 'del_public')) {
                $where['owner_role_id'] = array('in', $this->_permissionRes);
                //判断是否属于线索池
                $where_public = array();
                $where_public['owner_role_id'] = array('in', $this->_permissionRes);
                $where_public['leads_id'] = array('in', $leads_ids);
                $outdays = M('Config')->where('name="leads_outdays"')->getField('value');
                $outdate = empty($outdays) ? 0 : time() - 86400 * $outdays;
                $where_public['have_time'] = array('gt', $outdate);

                $public_leads_ids = D('LeadsView')->where($where_public)->getField('leads_id', true);
            }
            $where['leads_id'] = array('in', $leads_ids);
            $del_leads_ids = $m_leads->where($where)->getField('leads_id', true);
            if (!session('?admin') && !checkPerByAction('leads', 'del_public')) {
                if ($public_leads_ids) {
                    $del_leads_ids = array_intersect($del_leads_ids, $public_leads_ids);
                } else {
                    $del_leads_ids = array();
                }
            }

            if (($m_leads->where(array('leads_id' => array('in', $del_leads_ids)))->delete()) && ($m_leads_data->where(array('leads_id' => array('in', $del_leads_ids)))->delete())) {
                foreach ($del_leads_ids as $value) {
                    actionLog($value);
                    foreach ($r_module as $key2 => $value2) {
                        $module_ids = M($value2)->where('leads_id = %d', $value)->getField($key2 . '_id', true);
                        M($value2)->where('leads_id = %d', $value)->delete();
                        if (!is_int($key2)) {
                            M($key2)->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
                        }
                    }
                }
                $this->ajaxReturn('', L('DELETED SUCCESSFULLY'), 1);
            } else {
                $this->ajaxReturn('', L('DELETE FAILED CONTACT THE ADMINISTRATOR'), 0);
            }
        }
    }

    /**
     * 线索查看页面
     *
     **/
    public function view() {
        $d_role = D('RoleView');
        $leads_id = $this->_get('id', 'intval');
        $outdays = M('config')->where('name="leads_outdays"')->getField('value');
        $outdate = empty($outdays) ? 0 : time() - 86400 * $outdays;
        $where['have_time'] = array('egt', $outdate);
        $where['owner_role_id'] = array('neq', 0);
        $where['leads_id'] = $leads_id;
        if (!$leads_id) {
            alert('error', L('PARAMETER_ERROR'), U('leads/index'));
        } elseif ($temp = D('Leads')->where($where)->find()) {
            if (!in_array($temp['owner_role_id'], $this->_permissionRes)) {
                alert('error', L('DO NOT HAVE PRIVILEGES'), U('leads/index'));
            }
        }
        $leads = D('LeadsView')->where('leads.leads_id = %d', $leads_id)->find();

        $field_list = M('Fields')->where('model = "leads"')->order('order_id')->select();
        $leads['owner'] = $d_role->where('role.role_id = %d', $leads['owner_role_id'])->find();
        $leads['creator'] = $d_role->where('role.role_id = %d', $leads['creator_role_id'])->find();
        //沟通日志
        $log_ids = M('rLeadsLog')->where('leads_id = %d', $leads_id)->getField('log_id', true);
        $leads['log'] = M('log')->where('log_id in (%s)', implode(',', $log_ids))->order('log_id desc')->select();
        $m_user = M('User');
        $m_log_status = M('LogStatus');
        foreach ($leads['log'] as $key => $value) {
            $leads['log'][$key]['owner'] = $m_user->where('role_id = %d', $value['role_id'])->field('full_name,role_id,thumb_path')->find();
            $leads['log'][$key]['log_type'] = 'rLeadsLog';
            $status_name = $m_log_status->where('id = %d', $value['status_id'])->getField('name');
            $leads['log'][$key]['status_name'] = $status_name ? $status_name : '';
        }

        $file_ids = M('rFileLeads')->where('leads_id = %d', $leads_id)->getField('file_id', true);
        $leads['file'] = M('file')->where('file_id in (%s)', implode(',', $file_ids))->select();
        foreach ($leads['file'] as $key => $value) {
            $leads['file'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['role_id'])->find();
            $leads['file'][$key]['size'] = ceil($value['size'] / 1024);
            /* 判断文件格式 对应其图片 */
            $leads['file'][$key]['pic'] = show_picture($value['name']);
        }

        //负责人日志
        $leads['record'] = M('leadsRecord')->where('leads_id = %d', $leads_id)->select();
        $record_count = 0;
        foreach ($leads['record'] as $key => $value) {
            $leads['record'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['owner_role_id'])->find();
            $record_count++;
        }
        //日程信息
        $m_event = M('event');
        $m_user = M('user');
        $event_list = $m_event->where('module ="leads" and module_id =%d', $leads_id)->select();
        foreach ($event_list as $k => $v) {
            $event_list[$k]['create_role_name'] = $m_user->where('role_id =%d', $v['creator_role_id'])->getField('full_name');
            $event_list[$k]['img'] = $m_user->where('role_id =%d', $v['creator_role_id'])->getField('img');
        }

        $this->event_list = $event_list;
        $leads['record_count'] = $record_count;
        $this->statusList = M('BusinessStatus')->order('order_id')->select();
        $this->leads = $leads;
        $this->field_list = $field_list;
        $this->alert = parseAlert();
        $this->display();
    }

    /**
     * 导出excel
     *
     * */
    public function excelExport($leadsList = false) {
        C('OUTPUT_ENCODE', false);
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("mxcrm");
        $objProps->setLastModifiedBy("mxcrm");
        $objProps->setTitle("mxcrm Leads Data");
        $objProps->setSubject("mxcrm Leads Data");
        $objProps->setDescription("mxcrm Leads Data");
        $objProps->setKeywords("mxcrm Leads Data");
        $objProps->setCategory("Leads");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $j = 0;
        $field_list = M('Fields')->where('model = \'leads\'')->order('order_id')->select();
        foreach ($field_list as $field) {
            if ($field['form_type'] == 'address') {
                for ($a = 0; $a <= 4; $a++) {
                    $j++;
                    $pCoordinate = PHPExcel_Cell::stringFromColumnIndex($j - 1); //生成Excel
                    $address = array('所在省', '所在市', '所在县/区', '街道信息');
                    $objActSheet->setCellValue($pCoordinate . '1', $address[$a]);
                }
                $j--;
            } else {
                $j++;
                $pCoordinate = PHPExcel_Cell::stringFromColumnIndex($j - 1); //生成Excel
                $objActSheet->setCellValue($pCoordinate . '1', $field['name']);
            }
        }

        if (is_array($leadsList)) {
            $list = $leadsList;
        } else {
            $where['owner_role_id'] = array('in', getSubRoleId());
            $where['is_deleted'] = 0;
            $list = M('Leads')->where($where)->select();
        }

        $i = 1;
        foreach ($list as $k => $v) {
            $data = M('LeadsData')->where("leads_id = $v[leads_id]")->find();
            if (!empty($data)) {
                $v = $v + $data;
            }
            $i++;
            $m = 0;
            foreach ($field_list as $field) {
                if ($field['form_type'] == 'datetime') {
                    $m++;
                    $pCoordinate_a = PHPExcel_Cell::stringFromColumnIndex($m - 1); //生成Excel
                    if ($v[$field['field']] == 0 || strlen($v[$field['field']]) != 10) {
                        $objActSheet->setCellValue($pCoordinate_a . $i, '');
                    } else {
                        $objActSheet->setCellValue($pCoordinate_a . $i, date('Y-m-d H:i', $v[$field['field']]));
                    }
                } elseif ($field['form_type'] == 'number' || $field['form_type'] == 'floatnumber' || $field['form_type'] == 'phone' || $field['form_type'] == 'mobile' || ($field['form_type'] == 'text' && is_numeric($v[$field['field']]))) {
                    //防止使用科学计数法，在数据前加空格
                    $m++;
                    $pCoordinate_a = PHPExcel_Cell::stringFromColumnIndex($m - 1); //生成Excel
                    $objActSheet->setCellValue($pCoordinate_a . $i, ' ' . $v[$field['field']]);
                } elseif ($field['form_type'] == 'address') {
                    $address = $v[$field['field']];
                    $arr_address = explode(chr(10), $address);
                    for ($a = 0; $a <= 4; $a++) {
                        $m++;
                        $pCoordinate_a = PHPExcel_Cell::stringFromColumnIndex($m - 1); //生成Excel
                        $objActSheet->setCellValue($pCoordinate_a . $i, $arr_address[$a]);
                    }
                    $m--;
                } else {
                    $m++;
                    $pCoordinate_a = PHPExcel_Cell::stringFromColumnIndex($m - 1); //生成Excel
                    $objActSheet->setCellValue($pCoordinate_a . $i, $v[$field['field']]);
                }
            }
        }
        $current_page = intval($_GET['current_page']);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //ob_end_clean();
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=mxcrm_leads_" . date('Y-m-d', mktime()) . "_" . $current_page . ".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
        session('export_status', 0);
    }

    public function getCurrentStatus() {
        $this->ajaxReturn(intval(session('export_status')), 'success', 1);
    }

    /**
     * 下载excel模板
     *
     * */
    public function excelImportDownload() {
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("mxcrm");
        $objProps->setLastModifiedBy("mxcrm");
        $objProps->setTitle("mxcrm leads");
        $objProps->setSubject("mxcrm leads Data");
        $objProps->setDescription("mxcrm leads Data");
        $objProps->setKeywords("mxcrm leads Data");
        $objProps->setCategory("mxcrm");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $ascii = 65;
        $cv = '';
        $field_list = M('Fields')->where('model = \'leads\' ')->order('order_id')->select();
        foreach ($field_list as $field) {
            if ($field['form_type'] == 'address') {
                for ($i = 0; $i < 4; $i++) {
                    $address = array('所在省', '所在市', '所在县/区', '详细地址');
                    $objActSheet->setCellValue($cv . chr($ascii) . '2', $address[$i]);
                    $ascii++;
                    if ($ascii == 91) {
                        $ascii = 66;
                        $cv = chr(strlen($cv) + 65);
                    }
                }
            } else {

                //检查该字段若必填，加上"*"
                $field['name'] = sign_required($field['is_validate'], $field['is_null'], $field['name']);

                $objActSheet->setCellValue($cv . chr($ascii) . '2', $field['name']);
                $ascii++;
                if ($ascii == 91) {
                    $ascii = 65;
                    $cv = chr(strlen($cv) + 65);
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
        header("Content-Disposition:attachment;filename=mxcrm_leads.xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
    }

    /**
     * 导入excel
     *
     * */
    public function excelImport() {
        if ($this->isPost()) {
            if (isset($_FILES['excel']['size']) && $_FILES['excel']['size'] != null) {
                import('@.ORG.UploadFile');
                $upload = new UploadFile();
                $upload->maxSize = 20000000;
                $upload->allowExts = array('xls');
                $dirname = UPLOAD_PATH . date('Ym', time()) . '/' . date('d', time()) . '/';
                if (!is_dir($dirname) && !mkdir($dirname, 0777, true)) {
                    alert('error', L('ATTACHMENTS TO UPLOAD DIRECTORY CANNOT WRITE'), $_SERVER['HTTP_REFERER']);
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
                import("ORG.PHPExcel.PHPExcel");
                $PHPExcel = new PHPExcel();
                $PHPReader = new PHPExcel_Reader_Excel2007();
                if (!$PHPReader->canRead($savepath)) {
                    $PHPReader = new PHPExcel_Reader_Excel5();
                }
                $PHPExcel = $PHPReader->load($savepath);
                $currentSheet = $PHPExcel->getSheet(0);
                $allRow = $currentSheet->getHighestRow();
                $data['savepath'] = $savepath;
                $data['allrow'] = $allRow;
                if ($savepath) {
                    $this->ajaxReturn($data, 'success', 1);
                } else {
                    $this->ajaxReturn(0, 'error', 0);
                }
            } else {
                alert('error', L('UPLOAD FAILED'), $_SERVER['HTTP_REFERER']);
            };
        } else {
            $this->display();
        }
    }

    public function excelImportact() {
        $m_leads = D('Leads');
        $m_leads_data = D('LeadsData');
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
        $currentRow = intval($_GET['num']);
        $field_list = M('Fields')->where('model = \'leads\'')->order('order_id')->select();
        if ($currentRow + 99 <= $allRow) {
            $rows_excal = $currentRow + 99;
        } else {
            $rows_excal = $allRow;
        }
        $message = array();
        for ($currentRow; $currentRow <= $rows_excal; $currentRow++) {
            $data = array();
            $data['creator_role_id'] = session('role_id');
            $data['owner_role_id'] = intval($_GET['owner_role_id']);
            $data['create_time'] = time();
            $data['update_time'] = time();
            $data['have_time'] = time();
            $ascii = 65;
            $cv = '';
            foreach ($field_list as $field) {
                if ($field['form_type'] == 'address') {
                    $address = array();
                    for ($i = 0; $i < 4; $i++) {
                        $info = (String)$currentSheet->getCell($cv . chr($ascii) . $currentRow)->getValue();
                        $address[] = $info;
                        $ascii++;
                        if ($ascii == 91) {
                            $ascii = 65;
                            $cv .= chr(strlen($cv) + 65);
                        }
                    }
                    if ($field['is_main'] == 1) {
                        $data[$field['field']] = implode(chr(10), $address);
                    } else {
                        $data_date[$field['field']] = implode(chr(10), $address);
                    }
                } else {
                    $cell = $currentSheet->getCell($cv . chr($ascii) . $currentRow);
                    $info = $cell->getValue();
                    if ($cell->getDataType() == PHPExcel_Cell_DataType::TYPE_NUMERIC) {
                        $cellstyleformat = $cell->getParent()->getStyle($cell->getCoordinate())->getNumberFormat();

                        //formatcode 为 yyyy/m 时间格式
                        $formatcode = $cellstyleformat->getFormatCode();
                        if (preg_match('/^(\[\$[A-Z]*-[0-9A-F]*\])*[hmsdy]/i', $formatcode)) {
                            $info = gmdate("Y-m-d H:i", PHPExcel_Shared_Date::ExcelToPHP($info));
                        } else {
                            $info = PHPExcel_Style_NumberFormat::toFormattedString($info, $formatcode);
                        }
                    } else {
                        $info = (String)$cell->getCalculatedValue();
                    }
                    if ($field['is_main'] == 1) {
                        $data[$field['field']] = ($field['form_type'] == 'datetime' && $info != null) ? intval(strtotime($info)) : $info;
                    } else {
                        $data_date[$field['field']] = ($field['form_type'] == 'datetime' && $info != null) ? intval(strtotime($info)) : $info;
                    }
                    $ascii++;
                    if ($ascii == 91) {
                        $ascii = 65;
                        $cv = chr(strlen($cv) + 65);
                    }
                }
            }
            if ($m_leads->create($data) && $m_leads_data->create($data_date)) {
                $leads_id = $m_leads->add();
                $m_leads_data->leads_id = $leads_id;
                $m_leads_data->add();
            } else {
                $error_message = $m_leads->getError() . $m_leads_data->getError();

                $error_flag = 1;
            }
            $temp['error_message'] = $error_message;
            $temp['no'] = $currentRow;
            $message[] = $temp;

            //出现错误时候停止
            if (intval($_GET['is_jump']) == 2 && $error_flag == 1)
                break;
        }
        $return['allrow'] = $allRow;
        $return['message'] = $message;
        if ($return) {
            $this->ajaxReturn($return, 'success', 1);
        } else {
            $this->ajaxReturn('', 'error', 0);
        }
    }

    /**
     * 弹框选择分页
     *
     * */
    public function listDialog() {
        $m_leads = M('Leads');
        $outdays = M('config')->where('name="leads_outdays"')->getField('value');
        $outdate = empty($outdays) ? 0 : time() - 86400 * $outdays;
        $where['have_time'] = array('egt', $outdate);
        $where['is_deleted'] = 0;
        $where['is_transformed'] = 0;
        $where['owner_role_id'] = array('in', $this->_permissionRes);

        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

            if ('create_time' == $field || 'update_time' == $field) {
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
            $params = array('field=' . trim($_REQUEST['field']), 'condition=' . $condition, 'search=' . $_REQUEST["search"]);
        }
        $p = !$_REQUEST['p'] || $_REQUEST['p'] <= 0 ? 1 : intval($_REQUEST['p']);

        import("@.ORG.DialogListPage");

        $leadsList = $m_leads->where($where)->order('create_time desc')->page($p . ',10')->select();
        $count = $m_leads->where($where)->count();

        $this->search_field = $_REQUEST; //搜索信息
        $Page = new Page($count, 10);
        $Page->parameter = implode('&', $params);
        $this->assign('page', $Page->show());

        $this->leadsList = $leadsList;
        $this->display();
    }

    /**
     * 放入线索池
     *
     * */
    public function remove() {
        if ($_POST['leads_id']) {
            if ($this->_permissionRes) {
                $where['owner_role_id'] = array('in', $this->_permissionRes);
                $where['leads_id'] = array('in', $_POST['leads_id']);
                $data['owner_role_id'] = 0;
                $data['have_time'] = 0;
                if (M('Leads')->where($where)->setField($data)) {
                    alert('success', L('BATCH_LEADS_INTO_THE_POOL_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
                } else {
                    alert('error', L('BATCH_LEADS_INTO_THE_POOL_FAILED'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                alert('error', '您没有此权利！', $_SERVER['HTTP_REFERER']);
            }
        } else {
            alert('error', L('NOT CHOOSE ANY'), $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 领取、分配线索操作
     *
     * */
    public function receive() {
        $leads_id = isset($_REQUEST['id']) ? intval(trim($_REQUEST['id'])) : 0;
        if ($_REQUEST['owner_role_id']) {
            $owner_role_id = intval($_REQUEST['owner_role_id']);
        } else {
            $owner_role_id = session('role_id');
        }
        if ($leads_id) {
            $m_leads = M('Leads');
            $m_config = M('Config');
            $leads = $m_leads->where('leads_id = %d', $leads_id)->find();
            $config = $m_config->where(array('name' => 'leads_outdays'))->find();
            if ((time() - $leads['have_time']) < ($config['value'] * 86400) && $leads['owner_role_id'] != 0) {
                alert('error', L('RECEIVED_BY_SOMEONE', array($leads['name'])), $_SERVER['HTTP_REFERER']);
            }
            $update_data = array();
            $update_data['owner_role_id'] = $owner_role_id;
            $update_data['have_time'] = time();
            $update_data['update_time'] = time();
            $a = $m_leads->where('leads_id = %d', $leads_id)->save($update_data);
            if ($a) {
                $d = array('leads_id' => $leads_id, 'owner_role_id' => $owner_role_id, 'start_time' => time());
                M('LeadsRecord')->data($d)->add();
                $title = L('NEW_LEADS_MESSAGE_NOTICE_TITLE');
                $content = L('NEW_LEADS_MESSAGE_NOTICE_CONTENT', array(session('name'), U('Leads/view', 'id=' . $leads_id), $leads['name']));

                if (intval($_POST['message_alert']) == 1) {
                    sendMessage($owner_role_id, $content, 1);
                }
                if (intval($_POST['email_alert']) == 1) {
                    $email_result = sysSendEmail($owner_role_id, $title, $content);
                    if (!$email_result)
                        alert('error', L('MAIL_NOTIFICATION_FAILS_FOR_NOT_SET_EMAIL'), $_SERVER['HTTP_REFERER']);
                }
                if (intval($_POST['sms_alert']) == 1) {
                    $sms_result = sysSendSms($owner_role_id, $content);
                    if (100 == $sms_result) {
                        alert('error', L('SMS_NOTIFICATION_FAILS_FOR_NOT_VALIDATE_NUMBER'), $_SERVER['HTTP_REFERER']);
                    } elseif ($sms_result < 0) {
                        alert('error', L('SMS_NOTIFICATION_FAILS_CODE', array($sms_result)), $_SERVER['HTTP_REFERER']);
                    }
                }

                if ($_REQUEST['owner_role_id']) {
                    alert('success', L('ASSIGN_LEADS_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
                } else {
                    alert('success', L('RECEIVE_LEADS_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                if ($_REQUEST['owner_role_id']) {
                    alert('success', L('ASSIGN_LEADS_FAILED'), $_SERVER['HTTP_REFERER']);
                } else {
                    alert('success', L('RECEIVE_LEADS_FAILED'), $_SERVER['HTTP_REFERER']);
                }
            }
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    /**
     * 批量领取线索操作
     *
     * */
    public function batchReceive() {
        $leads_ids = $_REQUEST['leads_id'];
        $owner_role_id = session('role_id');
        if (empty($leads_ids)) {
            alert('error', L('NOT CHOOSE ANY'), $_SERVER['HTTP_REFERER']);
        }
        $m_leads = M('Leads');
        $m_config = M('Config');
        foreach ($leads_ids as $v) {
            $leads = $m_leads->where('leads_id = %d', $v)->find();
            $config = $m_config->where(array('name' => 'leads_outdays'))->find();
            if ((time() - $leads['have_time']) > ($config['value'] * 86400) || $leads['owner_role_id'] == 0) {
                $data['owner_role_id'] = $owner_role_id;
                $data['have_time'] = time();
                $data['update_time'] = time();
                if ($m_leads->where('leads_id = %d', $v)->save($data)) {
                    M('LeadsRecord')->add(array('leads_id' => $v, 'owner_role_id' => $owner_role_id, 'start_time' => time()));
                } else {
                    alert('success', L('RECEIVE_LEADS_FAILED'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                alert('error', L('RECEIVED_BY_SOMEONE', array($leads['name'])), $_SERVER['HTTP_REFERER']);
            }
        }
        alert('success', L('RECEIVE_LEADS_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
    }

    /**
     * 批量分配线索操作
     *
     * */
    public function batchassign() {
        if ($this->isPost()) {
            $leads_ids = $_POST['leads_id'];
            $owner_role_id = $_POST['owner_id'];
            $message = empty($_POST['message']) ? 0 : $_POST['message'];
            $sms = empty($_POST['sms']) ? 0 : $_POST['sms'];
            $email = empty($_POST['email']) ? 0 : $_POST['email'];
            if (empty($leads_ids)) {
                alert('error', L('NOT CHOOSE ANY'), $_SERVER['HTTP_REFERER']);
            }
            $m_leads = M('Leads');
            $m_config = M('Config');
            $title = L('NEW_LEADS_MESSAGE_NOTICE_TITLE');
            $content = '';
            $success_leads_name = '';
            $error_leads_name = '';
            foreach ($leads_ids as $v) {
                $leads = $m_leads->where('leads_id = %d', $v)->find();
                $config = $m_config->where(array('name' => 'leads_outdays'))->find();
                if ((time() - $leads['have_time']) > ($config['value'] * 86400) || $leads['owner_role_id'] == 0) {
                    $update_data = array();
                    $update_data['owner_role_id'] = $owner_role_id;
                    $update_data['have_time'] = time();
                    $update_data['update_time'] = time();
                    $a = $m_leads->where('leads_id = %d', $v)->save($update_data);
                    if ($a) {
                        $d = array('leads_id' => $v, 'owner_role_id' => $owner_role_id, 'start_time' => time());
                        M('LeadsRecord')->data($d)->add();
                        $url = U('leads/view', 'id=' . $v);
                        $success_leads_name .= '<a href="' . $url . '">' . $leads['name'] . '</a>、';
                    } else {
                        $error_leads_name .= $leads['name'] . '、';
                    }
                } else {
                    alert('error', L('RECEIVED_BY_SOMEONE', array($leads['name'])), $_SERVER['HTTP_REFERER']);
                }
            }

            if ($success_leads_name) {
                $content = L('ASSIGN_LEADS_MESSAGE_NOTICE_CONTENT', array(session('name'), $success_leads_name));
                if ($message == 1) {
                    sendMessage($owner_role_id, $content, 1);
                }
                if ($email == 1) {
                    $email_result = sysSendEmail($owner_role_id, $title, $content);
                    if (!$email_result)
                        alert('error', L('MAIL_NOTIFICATION_FAILS_FOR_NOT_SET_EMAIL'), $_SERVER['HTTP_REFERER']);
                }
                if ($sms == 1) {
                    $sms_result = sysSendSms($owner_role_id, $content);
                    if (100 == $sms_result) {
                        alert('error', L('SMS_NOTIFICATION_FAILS_FOR_NOT_VALIDATE_NUMBER'), $_SERVER['HTTP_REFERER']);
                    } elseif ($sms_result < 0) {
                        alert('error', L('SMS_NOTIFICATION_FAILS_CODE', array($sms_result)), $_SERVER['HTTP_REFERER']);
                    }
                }
            }
            if ($error_leads_name) {
                alert('error', L('BATCH_ASSIGN_LEADS_TO_SOMEONE_FAILED', array($error_leads_name)), $_SERVER['HTTP_REFERER']);
            } else {
                alert('success', L('BATCH_ASSIGN_LEADS_SUCCESSFULLY'), $_SERVER['HTTP_REFERER']);
            }
        }
    }

    /**
     * 批量分配线索操作
     *
     * */
    public function assignDialog() {
        $role_info = getUserByRoleId(session('role_id'));
        $this->role_info = $role_info;
        $this->display();
    }

    /**
     * 单条分配线索弹窗操作
     *
     * */
    public function fenpei() {
        $leads_id = intval($_GET['id']);
        if ($leads_id > 0) {
            $this->leads_id = $leads_id;
            $this->display();
        } else {
            alert('error', L('PARAMETER_ERROR'), $_SERVER['HTTP_REFERER']);
        }
    }

    /*
     * callist个数弹窗
     */
    public function dialogcallist() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $role_id = I("id");
        $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $roleIds = I("roleIds", '');
        $role_id > 0 && $where['tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['tracker'] = ['in', $roleIds];
        $list = D("ProjectView")->where($where)->select();
        include APP_PATH . "Common/job.cache.php";
        foreach ($list as $k => $v) {
            if ($v['job_class']) {
                $arr = [];
                $job_class = explode(",", $v['job_class']);
                foreach ($job_class as $fv) {
                    $arr[] = $job_name[$fv];
                }
                $list[$k]['job_class'] = implode(",", $arr);
            }
        }
        $this->assign('list', $list);
        $this->display();
    }

    /*
     * cc备注弹窗
     */
    public function dialogcc() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $role_id = I("id");
        $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $roleIds = I("roleIds", '');
        $role_id > 0 && $where['tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['tracker'] = ['in', $roleIds];
        $list = D("FineProjectCcView")->where($where)->select();
        include APP_PATH . "Common/job.cache.php";
        foreach ($list as $k => $v) {
            if ($v['job_class']) {
                $arr = [];
                $job_class = explode(",", $v['job_class']);
                foreach ($job_class as $fv) {
                    $arr[] = $job_name[$fv];
                }
                $list[$k]['job_class'] = implode(",", $arr);
            }
        }
        $this->assign('list', $list);
        $this->display();
    }

    /*
     * 回款个数弹窗
     */

    public function dialoghk() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $role_id = I("id");
        $where['invoice.type'] = ['in', ["distribution", 'grant']];
        $roleIds = I("roleIds", '');
        $role_id > 0 && $where['invoice.create_role_id'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['invoice.create_role_id'] = ['in', $roleIds];

        $where['invoice.create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("InvoiceView")->where($where)->select();
        $this->display();
    }

    /*
     * 合同bd弹窗
     */

    public function dialogbd() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $role_id = I("id");
        $where['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $roleIds = I("roleIds", '');
        $role_id > 0 && $where['creator_role_id'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['creator_role_id'] = ['in', $roleIds];
        $this->list = D("ContractView")->where($where)->select();
        $this->display();
    }

    /*
     * 新增客户弹窗
     */

    public function dialogcustomer() {
        include APP_PATH . "Common/industry.cache.php";
        include APP_PATH . "Common/city.cache.php";
        $this->industry_name = $industry_name;
        $this->city_name = $city_name;
        $start_time = I("start_date");
        $end_time = I("end_date");
//        $role_id = I("id");
//        $where['customer.creator_role_id'] = $role_id;
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['customer.creator_role_id'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['customer.creator_role_id'] = ['in', $roleIds];
        $where['customer.create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("CustomerInfoView")->where($where)->select();
        $this->display();
    }

    /*
     * 新增项目弹窗
     */

    public function dialogprojectnum() {
        $start_time = I("start_date");
        $end_time = I("end_date");
//        $role_id = I("id");
//        $where['business.creator_role_id'] = $role_id;

        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['business.creator_role_id'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['business.creator_role_id'] = ['in', $roleIds];
        $where['business.create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("BusinessView")->where($where)->select();
        $this->display();
    }

    /*
     * 新增简历弹窗
     */

    public function dialogresumenum() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['resume.creator_role_id'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['resume.creator_role_id'] = ['in', $roleIds];
//        $where['resume.creator_role_id'] = $role_id;
        $where['resume.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $list = D("ResumeView")->where($where)->select();
        //引入城市数据
        include APP_PATH . "Common/city.cache.php";
        //修改  年龄和城市
        foreach ($list as $k => $v) {
            //修改意向城市信息
            if ($v['intentCity']) {
                $arr = "";
                $intentCity = explode(",", $v['intentCity']);
                foreach ($intentCity as $vl) {
                    $arr[] = $city_name[$vl];
                }
                $list[$k]['intentCity'] = implode(",", $arr);
            } else {
                $list[$k]['intentCity'] = '-';
            }
            //按照birthYear修改年龄信息
            if ($v['birthYear'])
                $list[$k]['age'] = intval(date("Y", time())) - intval($v['birthYear']);

        }
        $this->assign('list', $list);
        $this->display();
    }

    /*
     * 推荐简历弹窗
     */
    public function dialogfinenum() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.tjaddtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("ProjectView")->where($where)->select();
        $this->display();
    }

    /*
     * 面试人数
     */

    public function dialoginterview() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.status'] = array('egt', 4);
        $where['fine_project_interview.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $projectSafeModel = new ProjectStepViewModel('fine_project_interview');
        $list = $projectSafeModel->where($where)->select();
        $newList = [];
        foreach ($list as $info) {
            $info['beizhu'] = M('fine_project_bz')->where(['fine_id'=>$info['fine_id'],'status'=>3])->order('id desc')->getField('beizhu');
            $newList[$info['resume_id']] = $info;
        }
        $this->list = $newList;

        $this->display();
    }

    /*
     * 面试次人数
     */

    public function dialoginterviewt() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.interview_times'] = array('egt', 1);
        $where['fine_project_interview.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $projectSafeModel = new ProjectStepViewModel('fine_project_interview');
        $this->list = $projectSafeModel->where($where)->select();
        $this->display();
    }

    /*
     * 到场人数
     */

    public function dialogpresent() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.ispresent'] = 1;
        $where['fine_project.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("ProjectView")->where($where)->select();
//        $this->list =  D("ResumeView")->where($where)->select();
        $this->display();
    }

    /**
     * offer信息查询
     */
    public function dialogoffer() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.status'] = array('egt', 6);
        $where['fine_project_offer.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
//        $this->list = D("ProjectView")->where($where)->select();
//        $this->list =  D("ResumeView")->where($where)->select();
        $projectSafeModel = new ProjectStepViewModel('fine_project_offer');
        $this->list = $projectSafeModel->where($where)->select();
        $this->display();
    }

    public function dialogofferd() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];
        $where['fine_project.status'] = 6;
        $where['fine_project.stop'] = 1;
        $where['fine_project.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $this->list = D("ProjectView")->where($where)->select();
//        $this->list =  D("ResumeView")->where($where)->select();
        $this->display();
    }

    /**
     * 入职信息查询
     */
    public function dialogenter() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];

        $where['fine_project.status'] = array('egt', 7);
        $where['fine_project_enter.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
//        $this->list = D("ProjectView")->where($where)->select();
//        $this->list =  D("ResumeView")->where($where)->select();
        $projectSafeModel = new ProjectStepViewModel('fine_project_enter');
        $this->list = $projectSafeModel->where($where)->select();
        $this->display();
    }

    /**
     * 过保查询
     */
    public function dialogsafe() {
        $start_time = I("start_date");
        $end_time = I("end_date");
        $roleIds = I("roleIds", '');
        $role_id = intval(I("id"));
        $role_id > 0 && $where['fine_project.tracker'] = $role_id;
        ($role_id <= 0 && $roleIds) && $where['fine_project.tracker'] = ['in', $roleIds];

//        $where['fine_project.status'] = array('egt', 8);
        $where['fine_project_safe.addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        $projectSafeModel = new ProjectStepViewModel('fine_project_safe');
        $this->list = $projectSafeModel->where($where)->select();
        $this->display();
    }

    /*
     * 员工业绩分析
     */

    public function analyticsCount($start_time, $end_time, $role_ids = "") {


        $where['user.role_id'] = array('in', $role_ids);
        $member = D("UserView")->field("user_id,full_name,role_name,second_name,role_id,department_name")->where($where)->select();
        foreach ($member as $key => $list) {
            /*
             * 业绩统计
             */
            $where = "";
            $where['user_id'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['paymentNum'] = M("achievement")->where($where)->count();
            $member[$key]['integral'] = M("achievement")->where($where)->Sum("integral");
            $member[$key]['integral'] = $member[$key]['integral'] ? $member[$key]['integral'] : 0;
            $this->integral += $member[$key]['integral'];
//	        $integral = 0;
//	        foreach ($achievement as $li){
//                $integral +=$li['integral'];
//            }
//            $member[$key]['integral'] = $integral;
//            $member[$key]['paymentNum'] = count($achievement);

            /*
             * 新增客户统计
             */
            $where = "";
            $where['creator_role_id'] = $list['role_id'];
            $where['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['customerNum'] = M("customer")->where($where)->count();
            $this->customerNum += $member[$key]['customerNum'];
            /*
             * 新增项目统计
             */
            $where = "";
            $where['creator_role_id'] = $list['role_id'];
            $where['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['projectNum'] = M("business")->where($where)->count();
            $this->projectNum += $member[$key]['projectNum'];
            /*
             * 新增简历统计
             */
            $where = "";
            $where['creator_role_id'] = $list['role_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['resumeNum'] = M("resume")->where($where)->count();
            $this->resumeNum += $member[$key]['resumeNum'];
            /*
             * 推荐人员统计
             */
            $where = "";
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['fineNum'] = M("fine_project")->where($where)->count();
            $this->fineNum += $member[$key]['fineNum'];
            /*
             * 面试人数
             */
            $where = "";
            $map['status'] = array('egt', 4);
            $where['tracker'] = $list['role_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['interviewNum'] = M("fine_project")->where($map)->where($where)->count();
            $this->interviewNum += $member[$key]['interviewNum'];
            /*
             * 面试次数
             */
            $where = "";
            $where['tracker'] = $list['role_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['interviewtNum'] = M("fine_project")->where($where)->Sum("interview_times");
            $member[$key]['interviewtNum'] = $member[$key]['interviewtNum'] ? $member[$key]['interviewtNum'] : 0;
            $this->interviewtNum += $member[$key]['interviewtNum'];
            /*
             * offer统计
             */
            $where = "";
            $map['status'] = array('egt', 6);
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['offerNum'] = M("fine_project")->where($map)->where($where)->count();
            $this->offerNum += $member[$key]['offerNum'];
            /*
             * offer掉统计
             */
            $where = "";
            $map['status'] = array('egt', 6);
            $where['stop'] = 1;
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['offerdNum'] = M("fine_project")->where($map)->where($where)->count();
            $this->offerdNum += $member[$key]['offerdNum'];
            /*
             * 入职统计
             */
            $where = "";
            $map['status'] = array('egt', 7);
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['enterNum'] = M("fine_project")->where($map)->where($where)->count();
            $this->enterNum += $member[$key]['enterNum'];
            /*
             * 过保数
             */
            $where = "";
            $where['status'] = 8;
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['safeNum'] = M("fine_project")->where($where)->count();
            $this->safeNum += $member[$key]['safeNum'];

            /*
             * 到场数
             */
            $where = "";
            $where['ispresent'] = 1;
            $where['tracker'] = $list['user_id'];
            $where['addtime'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['presentNum'] = M("fine_project")->where($where)->count();
            $this->presentNum += $member[$key]['presentNum'];
            /*
             * 回款数
             */

            $where = "";
            $where['type'] = "distribution";
            $where['create_role_id'] = $list['role_id'];
            $where['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['hkNum'] = M("invoice")->where($where)->count();
            $this->hkNum += $member[$key]['hkNum'];

            /*
             * 新增bd数
             */
            $where = "";
            $where['creator_role_id'] = $list['role_id'];
            $where['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
            $member[$key]['bdNum'] = M("contract")->where($where)->count();
            $this->bdNum += $member[$key]['bdNum'];
        }

        return $member;
//        $start_time = strtotime(date('Y-m-01 00:00:00'));
//        $end_time = strtotime(date('Y-m-d H:i:s'));
//
//        $this->start_date = date('Y-m-d',$start_time);
//        $this->end_date = date('Y-m-d',$end_time);
//        $daterange = $this->timeplugs();
//        $this->daterange = $daterange;
//        $this->alert = parseAlert();
//        $this->assign("list",$member);
//        $this->display();
    }

    /**
     * @desc 数据处理
     * @param $map
     * @param $p
     * @param $pageSize
     */
    private function analyticsNum($map, $p, $pageSize, $isExport = 0) {
        if($isExport){
            $p = 1;
            $pageSize = 1000; //导出条数300条
        }
        $countFields = 'sum(integral) as integral,sum(customer_num) as customerNum,sum(project_num) as projectNum,'
            . 'sum(resume_num) as resumeNum,sum(fine_project_num) as fineNum,sum(interview_num) as interviewNum,sum(bd_num) as bdNum,' .
            'sum(hk_num) as hkNum,sum(present_num) as presentNum,sum(safe_num) as safeNum,sum(enter_num) as enterNum ,' .
            'sum(offerd_num) as offerdNum,sum(offer_num) as offerNum,sum(interviewt_num) as interviewtNum , sum(callist_num) as callistnum , sum(cc_num) as ccnum';
        $list = M('report_intergral')->where($map)->field('id,user_role_id,user_id,user_name,department,department_id,' . $countFields)->group('user_id')->order('integral desc,customerNum desc')->page($p, $pageSize)->select();
        //增加员工职位字段和顾问英文名字段
        foreach ($list as $k => $v) {
            $position_name = D('ReportView')->where(array('role_id' => $v['user_role_id']))->getField('position');
            $second_name = M("User")->where(array('user_id' => intval($v['user_id'])))->getField('second_name');
            $list[$k]['position_name'] = $position_name;
            $list[$k]['second_name'] = $second_name;
        }
        $countList = M('report_intergral')->field($countFields)->where($map)->find();
        if ($isExport) {
            $cellName = [
                ['user_name', '员工姓名'], ['department', '部门'], ['position_name', '职位名称'], ['second_name', '顾问英文名'],
                ['integral', '业绩'], ['callistnum', 'callist'], ['ccnum', 'cc备注'], ['hkNum', '回款个数'],
                ['bdNum', '新增BD数'], ['customerNum', '新增客户数'], ['projectNum', '新增项目数'], ['resumeNum', '新增简历数'],
                ['fineNum', '推荐简历数'], ['interviewNum', '面试人数'], ['interviewtNum', '面试次数'], ['offerNum', 'Offer'],
                ['offerdNum', '掉Offer数'], ['enterNum', '入职数'], ['safeNum', '过保数']];
            $this->exportExcel('员工业绩报表--', $cellName, $list, $countList);
            return;
        }
        $this->assign("list", $list);
        $this->assign("countList", $countList);
    }

    /**
     * @param string $expTitle 标题
     * @param $expCellName 导出字段名称
     * @param $expTableData  导出数据列表
     * @param string $countList 数据统计列表
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     * @throws PHPExcel_Writer_Exception
     */

    function exportExcel($expTitle = '', $expCellName, $expTableData, $countList = '') {
        {
            if (count($expTableData) == 0) {
                exit();
            }
            $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
            $fileName = $xlsTitle . time();//or $xlsTitle 文件名称可根据自己情况设定
            $cellNum = count($expCellName);
            $dataNum = count($expTableData);
            import("ORG.PHPExcel.PHPExcel");
            $objPHPExcel = new PHPExcel();
            $objActSheet = $objPHPExcel->getActiveSheet(0);
            $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

            $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle . '  Export time:' . date('Y-m-d H:i:s'));
            $objPHPExcel->getActiveSheet()->getStyle('A1:' . $cellName[$cellNum - 1] . '1')->getFont()->setBold(true); //字体加粗
            $objPHPExcel->getActiveSheet()->getStyle('A1:' . $cellName[$cellNum - 1] . '1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            $size = [80, 80, 80, 80, 20, 20, 20, 20 ,80, 20, 20, 20, 20 ,80, 20, 20, 20, 20, 20, 20];
            for ($i = 0; $i < $cellNum; $i++) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
                $objActSheet->getColumnDimension($cellName[$i])->setAutoSize(true);
                $objActSheet->getColumnDimension($cellName[$i])->setWidth($size[$i]);
                $objPHPExcel->getActiveSheet()->getStyle($cellName[$i] . '2')->getFont()->setBold(true); //字体加粗
                $objPHPExcel->getActiveSheet()->getStyle($cellName[$i] . '2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }
            for ($k = 0; $k < $cellNum; $k++) {
                $k == 0 && $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[0] . (3), '共计:');
                ($k <= 3 && $k > 0) && $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$k] . (3), '');
                $k > 3 && $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$k] . (3), $countList[$expCellName[$k][0]]);
            }
            // Miscellaneous glyphs, UTF-8
            for ($i = 0; $i < $dataNum; $i++) {
                for ($j = 0; $j < $cellNum; $j++) {
                    $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 4),$expTableData[$i][$expCellName[$j][0]]);
                }
            }
            header('pragma:public');
            @ob_end_clean();//清除缓冲区,避免乱码
            header('Content-type: application/octet-stream;charset=utf-8;name="' . $xlsTitle . '.xls"');
            header("Content-Disposition:attachment;filename=$fileName.xls");//attachment新窗口打印inline本窗口打印
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
        }
    }

    /**
     * @desc 员工业绩分析
     */
    public function analytics() {
        $below_ids = getPerByAction(MODULE_NAME, ACTION_NAME);
        //是否仅查询销售岗
        $role_ids = [];
        $role_id_array = [];
        if (intval($_GET['role'])) {
            $role_ids = array(intval($_GET['role']));
        } else {
            if (intval($_GET['department'])) {
                $department_id = intval($_GET['department']);
                foreach (getRoleByDepartmentId($department_id, true) as $k => $v) {
                    $role_ids[] = $v['role_id'];
                }
            } else {
                $role_id_array = $below_ids;
            }
        }

        if ($role_ids) {
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }
        //时间段搜索
        if ($_GET['between_date']) {
            $between_date = explode(' - ', trim($_GET['between_date']));
            if ($between_date[0]) {
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ? strtotime(date('Y-m-d 23:59:59', strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59', time()));
            //当时间是某具体的一天时
        } else {
            $ishow = "含今日";
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->start_date = date('Y-m-d', $start_time);
        $this->end_date = date('Y-m-d', $end_time);

        $pageSize = isset($_GET['listrows']) ? intval($_GET['listrows']) : 15;
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
        //所筛选的时间段是同一天，页面显示同一天
        // _guo_03/26  $map一行与上面块调换位置(同一天显示数量不准确)
        $map = ['report_date' => [['egt', $this->start_date], ['elt', $this->end_date]]];
        $map['user_role_id'] = $role_id_array ? ['in', $role_id_array] : 208;
        $count = M('report_intergral')->where($map)->group('user_id')->select();
        $count = count($count);
        $isExport = isset($_GET['isExport']) ? intval($_GET['isExport']) : 0;
        $this->analyticsNum($map, $p, $pageSize, $isExport);
        import('@.ORG.Page'); // 导入分页类
        $page = new Page($count, $pageSize);
        $show = $page->show(); // 分页显示输出
        $this->assign('page', $show); // 赋值分页输出
        $this->assign("listrows", $pageSize);

        //部门岗位
        $url = getCheckUrlByAction(MODULE_NAME, ACTION_NAME);
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $ids = getSubDepartmentBrId();
            if($ids){
                $departmentList = M('roleDepartment')->where(['department_id'=>['in',$ids]])->select();
            }else{
                $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
            }
        }
        $this->assign('departmentList', $departmentList);

        $roleList = array();
        foreach ($below_ids as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId, 1);
        }
        $this->roleList = $roleList;
        $this->roleIds = implode(',', $role_id_array);
        $dateRange = $this->timeplug();
        $this->daterange = $dateRange;
        $this->type_id = intval($_GET['type_id']);
        $this->content_id = intval($_GET['content_id']);
        $this->assign('ishow', $ishow);
        $this->alert = parseAlert();
        $lastInfo = M('report_intergral')->field('create_time')->order('create_time desc')->find();
        $lastTime = date('Y-m-d H:i:s', $lastInfo['create_time']);
        $this->assign('lastTime', $lastTime);
        $this->display();
    }

    /**
     * 员工分析
     *
     * */
    public function analytics_back() {
        $time1 = time();

        //权限判断
//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        $below_ids = getPerByAction(MODULE_NAME, ACTION_NAME);
        //是否仅查询销售岗
        $user_type = $_REQUEST['user_type'] ? 1 : '';
        if (intval($_GET['role'])) {
            $role_ids = array(intval($_GET['role']));
        } else {
            if (intval($_GET['department'])) {
                $department_id = intval($_GET['department']);
                foreach (getRoleByDepartmentId($department_id, true) as $k => $v) {
                    $role_ids[] = $v['role_id'];
                }
            } else {
                $role_id_array = $below_ids;
            }
        }

        if ($role_ids) {
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }
        //时间段搜索
        if ($_GET['between_date']) {
            $between_date = explode(' - ', trim($_GET['between_date']));
            if ($between_date[0]) {
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ? strtotime(date('Y-m-d 23:59:59', strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59', time()));
        } else {
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }

        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->start_date = date('Y-m-d', $start_time);
        $this->end_date = date('Y-m-d', $end_time);


        $where_source['is_deleted'] = 0;

        $list = $this->analyticsCount($start_time, $end_time, $role_id_array);
        $this->assign("list", $list);


        //部门岗位
        $url = getCheckUrlByAction(MODULE_NAME, ACTION_NAME);
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
        }
        $this->assign('departmentList', $departmentList);

        $roleList = array();
        foreach ($below_ids as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->content_id = intval($_GET['content_id']);
        $this->alert = parseAlert();
        // echo time()-$time1;
        $this->display();
    }

    //时间插件处理
    public function timeplug() {
        //（计算开始、结束时间距今天的天数）
        $daterange = array();
        //上个月
        $daterange[0]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-d', mktime(0, 0, 0, date('m') - 1, 1, date('Y'))))) / 86400;
        $daterange[0]['end_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        //本月
        $daterange[1]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        $daterange[1]['end_day'] = 0;
        //上季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $year = date('Y') - 1;
            $daterange_start_time = strtotime(date($year . '-10-01 00:00:00'));
            $daterange_end_time = strtotime(date($year . '-12-31 23:59:59'));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }
        $daterange[2]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[2]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time - 1) / 86400;
        //本季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-10-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-12-31 23:59:59"));
        }
        $daterange[3]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[3]['end_day'] = 0;
        //上一年
        $year = date('Y') - 1;
        $daterange_start_time = strtotime(date($year . '-01-01 00:00:00'));
        $daterange_end_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[4]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[4]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time) / 86400;
        //本年度
        $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[5]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[5]['end_day'] = 0;
        return $daterange;
    }

    /**
     * 部门分析
     *
     * */
    public function department() {
        $time1 = time();

        //权限判断
        $below_ids = getPerByAction(MODULE_NAME, ACTION_NAME);
        //是否仅查询销售岗
        $user_type = $_REQUEST['user_type'] ? 1 : '';
        if (intval($_GET['role'])) {
            $role_ids = array(intval($_GET['role']));
        } else {
            if (intval($_GET['department'])) {
                $department_id = intval($_GET['department']);
                foreach (getRoleByDepartmentId($department_id, true) as $k => $v) {
                    $role_ids[] = $v['role_id'];
                }
            } else {
                $type_role_array = array();
                if (empty($user_type)) {
                    //过滤销售岗角色用户
                    $m_user = M('User');
                    foreach ($below_ids as $k => $v) {
                        $user_type = '';
                        $user_type = $m_user->where('role_id = %d', $v)->getField('type');
                        if ($user_type == 1) {
                            $type_role_array[] = $v;
                        }
                    }
                    $role_id_array = $type_role_array;
                } else {
                    $role_id_array = $below_ids;
                }
            }
        }
        if ($role_ids) {
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }

        //时间段搜索
        if ($_GET['between_date']) {
            $between_date = explode(' - ', trim($_GET['between_date']));
            if ($between_date[0]) {
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ? strtotime(date('Y-m-d 23:59:59', strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59', time()));
        } else {
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }

        $this->start_time = $start_time;
        $this->end_time = $end_time;

        $this->start_date = date('Y-m-d', $start_time);
        $this->end_date = date('Y-m-d', $end_time);

        $where_source['creator_role_id'] = array('in', implode(',', $role_id_array));

        if ($start_time) {
            $where_source['create_time'] = array(array('elt', $end_time), array('egt', $start_time), 'and');
        } else {
            $where_source['create_time'] = array('elt', $end_time);
        }
        $where_source['is_deleted'] = 0;


        $list = $this->analyticsCount();
        $this->assign("list", $list);


        if ($start_time) {
            $create_time = array(array('elt', $end_time), array('egt', $start_time), 'and');
        } else {
            $create_time = array('elt', $end_time);
        }

        $m_user = M('User');

        //部门岗位
        $url = getCheckUrlByAction(MODULE_NAME, ACTION_NAME);
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
        }
        $this->assign('departmentList', $departmentList);

        $roleList = array();
        foreach ($below_ids as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;

        //时间插件处理（计算开始、结束时间距今天的天数）
        $daterange = array();
        //上个月
        $daterange[0]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-d', mktime(0, 0, 0, date('m') - 1, 1, date('Y'))))) / 86400;
        $daterange[0]['end_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        //本月
        $daterange[1]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        $daterange[1]['end_day'] = 0;
        //上季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $year = date('Y') - 1;
            $daterange_start_time = strtotime(date($year . '-10-01 00:00:00'));
            $daterange_end_time = strtotime(date($year . '-12-31 23:59:59'));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }
        $daterange[2]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[2]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time - 1) / 86400;
        //本季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-10-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-12-31 23:59:59"));
        }
        $daterange[3]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[3]['end_day'] = 0;
        //上一年
        $year = date('Y') - 1;
        $daterange_start_time = strtotime(date($year . '-01-01 00:00:00'));
        $daterange_end_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[4]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[4]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time) / 86400;
        //本年度
        $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[5]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[5]['end_day'] = 0;
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->content_id = intval($_GET['content_id']);
        $this->alert = parseAlert();
        // echo time()-$time1;
        $this->display();
    }

    //时间插件处理（计算开始、结束时间距今天的天数）
    public function timeplugs() {
        $daterange = array();
        //上个月
        $daterange[0]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-d', mktime(0, 0, 0, date('m') - 1, 1, date('Y'))))) / 86400;
        $daterange[0]['end_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        //本月
        $daterange[1]['start_day'] = (strtotime(date('Y-m-d', time())) - strtotime(date('Y-m-01 00:00:00'))) / 86400;
        $daterange[1]['end_day'] = 0;
        //上季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $year = date('Y') - 1;
            $daterange_start_time = strtotime(date($year . '-10-01 00:00:00'));
            $daterange_end_time = strtotime(date($year . '-12-31 23:59:59'));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }
        $daterange[2]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[2]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time - 1) / 86400;
        //本季度
        $month = date('m');
        if ($month == 1 || $month == 2 || $month == 3) {
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        } elseif ($month == 4 || $month == 5 || $month == 6) {
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        } elseif ($month == 7 || $month == 8 || $month == 9) {
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        } else {
            $daterange_start_time = strtotime(date('Y-10-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-12-31 23:59:59"));
        }
        $daterange[3]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[3]['end_day'] = 0;
        //上一年
        $year = date('Y') - 1;
        $daterange_start_time = strtotime(date($year . '-01-01 00:00:00'));
        $daterange_end_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[4]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[4]['end_day'] = (strtotime(date('Y-m-d', time())) - $daterange_end_time) / 86400;
        //本年度
        $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[5]['start_day'] = (strtotime(date('Y-m-d', time())) - $daterange_start_time) / 86400;
        $daterange[5]['end_day'] = 0;

        return $daterange;
    }

    /**
     * 线索转换
     * @param
     * @author
     * @return
     */
    public function change_customer() {
        $leads_id = intval($_GET['id']);
        $m_leads = M('leads');
        $m_customer = M('customer');
        $m_customer_data = M('customer_data');
        $m_contacts = M('contacts');
        $m_r_contacts_customer = M('r_contacts_customer');
        $m_r_leads_log = M('r_leads_log');
        $m_r_customer_log = M('r_customer_log');
        $where['leads_id'] = $leads_id;
        $where['is_deleted'] = 0;
        $where['is_transformed'] = 0;
        $leads_info = $m_leads->where($where)->find();
        if (!$leads_info) {
            $this->ajaxReturn('', '线索数据不存在或已转换', 0);
        }

        //联系人
        $contacts_data['name'] = $leads_info['contacts_name'];
        $contacts_data['telephone'] = $leads_info['mobile'];
        $contacts_data['qq_no'] = $leads_info['position'];
        $contacts_data['email'] = $leads_info['email'];
        $contacts_data['saltname'] = $leads_info['saltname'];
        $contacts_data['create_time'] = time();
        $contacts_id = $m_contacts->add($contacts_data);
        //客户
        $owner_role_id = intval($_GET['role_id']) ? intval($_GET['role_id']) : session('role_id');
        $customer_data['owner_role_id'] = $owner_role_id;
        $customer_data['creator_role_id'] = session('role_id');
        $customer_data['name'] = $leads_info['name'];
        $customer_data['contacts_id'] = $contacts_id;
        $customer_data['address'] = $leads_info['state'] . '/n' . $leads_info['city'] . '/n' . $leads_info['area'] . '/n' . $leads_info['street'];
        $customer_data['create_time'] = time();
        $customer_data['update_time'] = time();
        $customer_data['get_time'] = time();
        $customer_data['nextstep_time'] = $leads_info['nextstep_time'];
        $customer_data['nextstep'] = $leads_info['nextstep'];
        // $customer_data['is_locked'] = 1;
        if ($customer_id = $m_customer->add($customer_data)) {
            $m_customer_data->add(array('customer_id' => $customer_id));
            //线索沟通日志
            $leads_log_ids = $m_r_leads_log->where('leads_id=%d', $leads_id)->getField('log_id', true);
            foreach ($leads_log_ids as $vv) {
                $customer_log['log_id'] = $vv;
                $customer_log['customer_id'] = $customer_id;
                $customer_logs[] = $customer_log;
            }
            if ($m_r_customer_log->addAll($customer_logs)) {
                // $m_r_leads_log->where('leads_id=%d',$leads_id)->delete();
            }
            $leads_data = array();
            $leads_data['contacts_id'] = $contacts_id;
            $leads_data['customer_id'] = $customer_id;
            $leads_data['is_transformed'] = 1;
            $leads_data['transform_role_id'] = session('role_id');
            $m_leads->where('leads_id=%d', $leads_id)->save($leads_data);

            //增加客户下操作记录
            $up_message = '将线索 ' . $leads_info['name'] . ' 转化为客户';
            $arr['create_time'] = time();
            $arr['create_role_id'] = session('role_id');
            $arr['type'] = '修改';
            $arr['duixiang'] = $up_message;
            $arr['model_name'] = 'customer';
            $arr['action_id'] = $customer_id;
            M('ActionRecord')->add($arr);
        } else {
            $this->ajaxReturn(0, "新增错误！", 0);
        }
        $con_cus['contacts_id'] = $contacts_id;
        $con_cus['customer_id'] = $customer_id;
        if ($m_r_contacts_customer->add($con_cus)) {
            $this->ajaxReturn(1, "修改成功！", 1);
        } else {
            $this->ajaxReturn(0, "新增错误！", 0);
        }
    }

    //列表字段值修改
    public function field_save() {
        $m_leads = M("leads");
        $where['leads_id'] = $this->_GET('id');
        if ($this->_GET('filed') == 'nextstep_time') {
            $save[$this->_GET('filed')] = strtotime($this->_GET('commen_name'));
        } else {
            $save[$this->_GET('filed')] = $this->_GET('commen_name');
        }
        if ($m_leads->where($where)->save($save)) {
            if ($this->_GET('filed') == 'xs_fl' && $this->_GET('commen_name') == 'A、电话未接通') {
                //添加沟通日志
                $data = array();
                $data['category_id'] = 1;
                $data['role_id'] = session('role_id');
                $data['create_date'] = time();
                $data['update_date'] = time();
                $data['subject'] = '电话未接通';
                $data['content'] = '电话未接通';
                $log_id = M('Log')->add($data);
                if ($log_id) {
                    $res = M('RLeadsLog')->add(array('leads_id' => $this->_GET('id'), 'log_id' => $log_id));
                }
            }
            $this->ajaxReturn($result, "修改成功！", 1);
        } else {//echo $m_leads->getLastSql();exit;
            $this->ajaxReturn(0, "新增错误！", 0);
        }
    }

    public function add_more() {
        $this->display();
    }

    function excelToArray($name) {
        require_once 'Base/Lib/Classes/PHPExcel/IOFactory.php';

        //加载excel文件
        $filename = 'Uploads/resume_file/' . $name;
        $objPHPExcelReader = PHPExcel_IOFactory::load($filename);

        $sheet = $objPHPExcelReader->getSheet(0);        // 读取第一个工作表(编号从 0 开始)
        $highestRow = $sheet->getHighestRow();           // 取得总行数
        $highestColumn = $sheet->getHighestColumn();     // 取得总列数
        $arr = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ', 'BA', 'BB', 'BC', 'BD', 'BE', 'BF', 'BG', 'BH', 'BI', 'BJ', 'BK', 'BL', 'BM', 'BN', 'BO', 'BP', 'BQ', 'BR', 'BS', 'BT', 'BU', 'BV', 'BW', 'BX', 'BY', 'BZ');
        //读取员工基本信息
        $res_arr = array();
        for ($row = 3; $row <= $highestRow; $row++) {
            $row_arr = array();
            for ($column = 0; $arr[$column] != 'AL'; $column++) {
                $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
                $row_arr[] = $val;
            }
            $res_arr[] = $row_arr;
        }
        return $res_arr;
    }

    public function uploadTarget() {
        /* $year = I('get.year'); */
        $year = date("Y");
        $time = time();
        if ($_FILES) {
            //上传员工背景EXCEL表到uploads/resume_file目录下
            $file = $_FILES['files'];
            $type = end(explode('.', $file['name'][0]));
            $path = $_SERVER['DOCUMENT_ROOT'] . "/Uploads/resume_file/" . $time . "." . $type;
            $upload_path_name = $_SERVER['DOCUMENT_ROOT'] . "/Uploads/resume_file/" . $time . "." . $type;
            $complete_path = time() . "." . $type;
            move_uploaded_file($file['tmp_name'][0], $upload_path_name);
            $data = $this->excelToArray($complete_path);
            foreach ($data as $key => $val) {
                $departmentName[] = $val[0];
            }
            $departmentIdMap['name'] = array('in', $departmentName);
            $roleDepartment = M('role_department');
            $departmentIds = $roleDepartment->where($departmentIdMap)->field('department_id')->select();

            //删除已存在的目标
            $target = M('target');
            foreach ($departmentIds as $key => $val) {
                $targetId[] = $val['department_id'];
            }
            $targetIds['id'] = array('in', $targetId);
            $where['year'] = $year;
            $target->startTrans();
            $deleteResult = $target->where($targetIds)->where($where)->delete();
            if ($deleteResult) {
                $target->commit();
            } else {
                $target->rollback();
            }

            //构建添加数据并添加表中上传目标
            foreach ($data as $key => $val) {
                $data[$key][0] = $departmentIds[$key]['department_id'];
            }
            $dataList = array('id_type' => '1', 'id' => '', 'year' => $year, 'month1' => '', 'month2' => '', 'month3' => '', 'month4' => '', 'month5' => '', 'month6' => '', 'month7' => '', 'month8' => '', 'month9' => '', 'month10' => '', 'month11' => '', 'month12' => '', 'topachieve1' => '', 'topachieve2' => '', 'topachieve3' => '', 'topachieve4' => '', 'topachieve5' => '', 'topachieve6' => '', 'topachieve7' => '', 'topachieve8' => '', 'topachieve9' => '', 'topachieve10' => '', 'topachieve11' => '', 'topachieve12' => '', 'attendanceRate1' => '', 'attendanceRate2' => '', 'attendanceRate3' => '', 'attendanceRate4' => '', 'attendanceRate5' => '', 'attendanceRate6' => '', 'attendanceRate7' => '', 'attendanceRate8' => '', 'attendanceRate9' => '', 'attendanceRate10' => '', 'attendanceRate11' => '', 'attendanceRate12' => '', 'total' => '0');
            //dump($data);
            foreach ($data as $key => $val) {
                $dataList['id'] = $val[0];
                $dataList['total'] = 0;
                for ($i = 1; $i < 13; $i++) {
                    $month = ($i * 3) - 2;
                    $dataList['month' . $i] = (int)$val[$month];
                    $dataList['topachieve' . $i] = (int)$val[($i * 3) - 1];
                    $dataList['attendanceRate' . $i] = $val[$i * 3];
                    $dataList['total'] += $dataList['month' . $i];
                }
                $addData[] = $dataList;
            }
            $target->startTrans();
            $addresult = $target->addAll($addData);
            if ($addresult) {
                $target->commit();
            } else {
                $target->rollback();
            }
        }
    }

}
