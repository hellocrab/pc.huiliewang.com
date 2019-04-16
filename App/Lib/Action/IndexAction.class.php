<?php

//
class IndexAction extends Action {

    public function _initialize() {
        $action = array(
            'permission' => array(),
            'allow' => array('index', 'widget_edit', 'widget_delete', 'widget_add', 'sortcharts', 'dynamic_data', 'getTransLocation', 'updatedata')
        );
        B('Authenticate', $action);
        $this->_permissionRes = getPerByAction(MODULE_NAME, ACTION_NAME);
    }

    public function index() {
        $title = "首页";
        $this->assign("title", $title);
        //手机访问跳转
        if (isMobile()) {
            $mobile = str_replace('index.php', 'mobile', $_SERVER["PHP_SELF"]);
            header("Location: http://" . $_SERVER['SERVER_NAME'] . ':' . $_SERVER["SERVER_PORT"] . $mobile);
        }
        $user = M('User');
        $dashboard = $user->where('user_id = %d', session('user_id'))->getField('dashboard');
        $widget = unserialize($dashboard);

        foreach ($widget['sort'] as $k => $v) {
            $res[] = $widget['dashboard'][$v];
        }

        $this->widget = $res;

        //动态信息
        $m_action_log = M('ActionLog');
        $m_comment = M('Comment');
        $m_customer = M('Customer');
        $m_leads = M('Leads');
        $m_business = M('Business');
        $m_resume = M('Resume');
        $m_sales = M('Sales');
        $m_contacts = M('Contacts');
        $m_contract = M('Contract');
        $m_product = M('Product');
        $m_log = M('Log');
        $m_fields = M('Fields');
        $m_r_file_log = M('RFileLog');
        $m_file = M('File');
        $m_log_talk = M('LogTalk'); //日志评论回复表
        $m_event = M('Event');
        $m_task = M('Task');
        $where = array(); //查询条件
        $where['action_delete'] = 0;
        $opeartion = 'view'; //默认都跳转到view界面
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $this->p = $p;
        $by = isset($_GET['by']) ? trim($_GET['by']) : '';
        //module=log时，module_id为log表的log_id; module为dynamic时，module_id为action_log表的log_id
        switch ($by) {
            case 'customer' :
                $where['module_name'] = array('eq', 'customer');
                break;
            case 'log' :
                $where['module_name'] = array('eq', 'log');
                break;
            case 'sign' :
                $where['module_name'] = array('eq', 'sign');
                break;
            case 'examine' :
                $where['module_name'] = array('eq', 'examine');
                break;
            case 'task' :
                $where['module_name'] = array('eq', 'task');
                break;
            case 'business' :
                $where['module_name'] = array('eq', 'business');
                break;
            case 'crm' :
                $where['module_name'] = array('not in', 'log,examine,sign');
                break;
        }
        if (!empty($reply)) {
            $params[] = "reply=" . trim($_GET['reply']);
        }

        if ($_GET['department_id']) {
            $department_id = intval($_GET['department_id']);
            //选中部门下的所有员工
            $subPositionIdArr = M('position')->where('department_id = %d', $department_id)->order('position_id asc')->getField('position_id', true);
            $subRoleIdArr = M('role')->where(array('position_id' => array('in', $subPositionIdArr)))->getField('role_id', true); //部门下role_id
            if (!session('admin')) {
                //条件为选中部门下,我的下属员工的role_id
                $mySubRoleIdArr = getSubRoleId(); //我的下属role_id
                $where['role_id'] = array('in', array_intersect($subRoleIdArr, $mySubRoleIdArr));
            } else {
                $where['role_id'] = array('in', $subRoleIdArr);
            }
        } else {
            //条件为选中部门下,我的下属员工的role_id
            if (!session('?admin')) {
                $where['role_id'] = array('in', getSubRoleId());
            }
        }

        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            if ($field == 'role') {
                if (!empty($search)) {
                    $same_role_id_array = M('user')->where('name like "%s"', "%$search%")->getField('role_id', true);
                    $role_id_array = getSubRoleId(true, 1);  //下属role_id
                    $role_idArr = array_intersect($same_role_id_array, $role_id_array); //交集
                    $where['role_id'] = array('in', $role_idArr);
                }
            } elseif ($field == 'content') {
                $where['content'] = array('like', "%$search%");
            }
            $params = array('field=' . trim($_REQUEST['field']), 'search=' . $search);
        }
        $action_log = $m_action_log->where($where)->order('create_time desc')->page($p . ',10')->select();
        $count = $m_action_log->where($where)->count();
        import("@.ORG.Page");
        $Page = new Page($count, 10);
        if (!empty($_GET['by'])) {
            $params[] = "by=" . trim($_GET['by']);
        }
        $m_sign_img = M('signImg');
        $r_contract_sales = M('r_contract_sales');
        foreach ($action_log as $k => $v) {
            if ($v['module_name'] == 'finance') {
                $module_name = substr($v['param_name'], 2);
            } else {
                $module_name = $v['module_name'];
            }
            $param_name = $v['param_name'];

            $action_log[$k]['sign_img'] = $m_sign_img->where('sign_id = "%d"', $v['action_id'])->select();
            $m_module_name = M($module_name);
            $pk_id = $m_module_name->getPk();
            $object_module = $m_module_name->where("$pk_id = %d", $v['action_id'])->find();

//            if ($v['module_name'] == 'examine') {
//                $name = $object_module['content'];
//            } 
            if ($v['module_name'] == 'contract') {
                $name = $object_module['number'];
//            } elseif ($v['module_name'] == 'sales') {
//                $contract_id = $r_contract_sales->where('sales_id =%d', $v['action_id'])->getField('contract_id');
//                $name = $m_contract->where('contract_id =%d', $contract_id)->getField('number');
//            } elseif ($v['module_name'] == 'purchase') {
//                $name = $object_module['sn_code'];
            } elseif ($v['module_name'] == 'user') {
                $name = $object_module['full_name'];
//            } elseif ($v['module_name'] == 'examine') {
//                $name = $object_module['content'] ? $object_module['content'] : '查看详情';
            } else {
                $name = $object_module['name'];
            }
            if (empty($name)) {
                $name = $object_module['subject'];
            }
            //如果是日志，则追加日志内容
            if ($v['action_name'] == 'mylog_add') {
                $apContent = $object_module['content'];
                $appHtml = strip_tags($apContent);
                //如果是日志，则跳转到mylog_view
                $action_name = 'mylog_view';
            } else {
                $appHtml = '';
                $action_name = strtolower($v['action_name']);
            }
            $action_log[$k]['creator'] = getUserByRoleId($v['role_id']);

//            $username = $action_log[$k]['creator']['user_name'];
            $operation = L(strtolower($v['action_name'])) . '了';
//            if ($v['module_name'] == "quote") {
//                $module = '报价单';
//            } elseif ($v['module_name'] == 'sales') {
//                $module = '销售合同';
//            } elseif ($v['module_name'] == 'purchase' && $v['action_name'] == 'outof') {
//                $module = '采购退货';
//            } else {
            $module = L(strtolower($v['module_name']));
//            }
            $action_log[$k]['dynamic'] = $operation . $module;

            $action_log[$k]['address'] = $object_module['address'] . ' ' . $object_module['title'];
            $action_log[$k]['log'] = $object_module['log'];
            $action_log[$k]['x'] = $object_module['x'];
            $action_log[$k]['y'] = $object_module['y'];
            //外勤签到相关客户
            $sign_customer_id = '';
            $sign_customer_id = M('Sign')->where(array('sign_id' => $v['action_id']))->getField('customer_id');
            $customer_info = M('Customer')->where(array('customer_id' => $sign_customer_id))->field('name,customer_id')->find();
            $action_log[$k]['customer_info'] = $customer_info;

            //获取阶段
            switch ($v['module_name']) {
                case 'log' :
                    $log_info = $m_log->where('log_id =%d', $v['action_id'])->find();
                    $action_log[$k]['cut_content'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=mylog_view&' . $param_name . '&id=' . $v['action_id'] . '" title="查看详情" style="color:#676a6c;">' . cutString($log_info['content'], 110) . '</a>';
                    $action_log[$k]['log_content'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=mylog_view&' . $param_name . '&id=' . $v['action_id'] . '" title="查看详情" style="color:#676a6c;">' . $log_info['content'] . '</a>';
                    ;
                    $action_log[$k]['content_open'] = 0;
                    //是否需展开全文
                    if (mb_strlen($log_info['content'], 'UTF8') > 109) {
                        $action_log[$k]['content_open'] = 1;
                    }
                    //附件
                    $file_ids = array();
                    $file_ids = $m_r_file_log->where('log_id = %d', $v['action_id'])->getField('file_id', true);
                    $log_files = $m_file->where(array('file_id' => array('in', $file_ids)))->select();
                    if (!empty($file_ids)) {
                        foreach ($log_files as $key => $value) {
                            $log_files[$key]['size'] = ceil($value['size'] / 1024);
                            /* 判断文件格式 对应其图片 */
                            $log_files[$key]['pic'] = show_picture($value['name']);
                            $log_files[$key]['cut_name'] = cutString($value['name'], 25);
                        }
                    }
                    $action_log[$k]['log_files'] = $log_files;
                    $action_log[$k]['file_count'] = count($file_ids);
                    //日志评论
                    $action_log[$k]['comment_count'] = $m_log_talk->group('g_mark')->where('log_id = %d', $v['action_id'])->count();
                    break;
                case 'customer' :
                    $customer_list = $m_customer->where('customer_id =%d', $v['action_id'])->find();
                    $fields_type = $m_fields->where('model = "customer" and field = "industry"')->getField('name');
                    $fields_type2 = $m_fields->where('model = "customer" and field = "origin"')->getField('name');
                    $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v['action_id'] . '">' . $name . '</a>';
                    $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $customer_list['industry'];
                    $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . $customer_list['origin'] . '&nbsp;&nbsp;' . $something;
                    break;
                case 'contract' :
                    $contract_list = $m_contract->where('contract_id =%d', $v['action_id'])->find();
                    if ($contract_list['type'] == 1) {
                        $customer_name = M('customer')->where('customer_id = %d', $contract_list['customer_id'])->getField('name');
                    } elseif ($contract_list['type'] == 2) {
                        $customer_name = M('supplier')->where('supplier_id = %d', $info['supplier_id'])->getField('name');
                    }
                    $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v['action_id'] . '">' . $contract_list['number'] . '</a>';
                    $action_log[$k]['type1'] = '<span style="color:#000">客户/供应商&nbsp:&nbsp</span>' . $customer_name;
                    $action_log[$k]['type2'] = '<span style="color:#000">状态&nbsp:&nbsp</span>' . $contract_list['status'] . '&nbsp;&nbsp;' . $something;
                    break;
                case 'business' :
                    $business_info = $m_business->where('business_id =%d', $v['action_id'])->find();
                    $status_name = M('business_status')->where('status_id =%d', $business_info['status_id'])->getField('name');
                    $fields_type = $m_fields->where('model = "business" and field = "status_id"')->getField('name');
                    $fields_type2 = $m_fields->where('model = "business" and field = "nextstep_time"')->getField('name');

                    $action_log[$k]['type'] = '<a href="./index.php?m=customer' . '&a=view&id=' . $business_info['customer_id'] . '&bid=' . $v['action_id'] . '">' . $name . '</a>';
                    $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $status_name;
                    $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . date("Y-m-d H:i", $business_info['nextstep_time']) . '&nbsp;&nbsp;' . $something;
                    break;
                case 'user' :
                    $user_list = D('UserView')->where('user.user_id =%d', $v['action_id'])->find();
                    $action_log[$k]['type'] = $name;
                    $action_log[$k]['type1'] = '<span style="color:#000">用户类型&nbsp:&nbsp</span>' . $user_list['category_name'];
                    $action_log[$k]['type2'] = '<span style="color:#000">岗位&nbsp:&nbsp</span>' . $user_list['role_name'] . '&nbsp;&nbsp;' . $something;
                    break;
                case 'product' :
                    $product_list = $m_product->where('product_id =%d', $v['action_id'])->find();
                    $category_name = M('product_category')->where('category_id =%d', $product_list['category_id'])->getField('name');
                    $fields_type = $m_fields->where('field = "category_id" and model = "product"')->getField('name');
                    $fields_type2 = $m_fields->where('model = "product" and field = "standard"')->getField('name');
                    $action_log[$k]['type'] = $name;
                    $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $category_name;
                    $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . $product_list['standard'] . '&nbsp;&nbsp;' . $something;
                    break;
//                case 'sales' :
//                    $sales_list = $m_sales->where('sales_id =%d', $v['action_id'])->find();
//                    if ($sales_list['status'] == 97) {
//                        $status = '未出库';
//                    } elseif ($sales_list['status'] == 98) {
//                        $status = '已出库';
//                    } elseif ($sales_list['status'] == 99) {
//                        $status = '未入库';
//                    } else {
//                        $status = '已入库';
//                    }
//                    $customer_name = $m_customer->where('customer_id = %d', $sales_list['customer_id'])->getField('name');
//                    $contract_id = $r_contract_sales->where('sales_id =%d', $v['action_id'])->getField('contract_id');
//                    $sales_number = $m_contract->where('contract_id =%d', $contract_id)->getField('number');
//                    $action_log[$k]['type'] = $sales_number;
//                    $action_log[$k]['type1'] = '<span style="color:#000">客户/供应商&nbsp:&nbsp</span>' . $customer_name;
//                    $action_log[$k]['type2'] = '<span style="color:#000">状态&nbsp:&nbsp</span>' . $status . '&nbsp;&nbsp;' . $something;
//                    break;
//                case 'leads' :
//                    $leads_list = $m_leads->where('leads_id =%d', $v['action_id'])->find();
//                    $fields_type = $m_fields->where('field = "source" and model = "leads"')->getField('name');
//                    $fields_type2 = $m_fields->where('model = "leads" and field = "nextstep_time"')->getField('name');
//                    $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v['action_id'] . '">' . $name . '</a>';
//                    $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $leads_list['source'];
//                    $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . date("Y-m-d H:i", $leads_list['nextstep_time']) . '&nbsp;&nbsp;' . $something;
//                    break;
//                case 'event' :
//                    $event_info = $m_event->where('event_id =%d', $v['action_id'])->find();
//                    $start_date = $event_info['start_date'] ? date("Y-m-d H:i", $event_info['start_date']) : '';
//                    $end_date = $event_info['end_date'] ? date("Y-m-d H:i", $event_info['end_date']) : '';
//                    $action_log[$k]['type'] = $event_info['subject'];
//                    $action_log[$k]['type1'] = '<span style="color:#000">开始时间&nbsp:&nbsp</span>' . $start_date;
//                    $action_log[$k]['type2'] = '<span style="color:#000">结束时间&nbsp:&nbsp</span>' . $end_date . '&nbsp;&nbsp;' . $something;
//                    break;
                case 'finance' :
                    $type = substr($v['param_name'], 2);
                    $finance_info = M($type)->where($type . '_id = %d', $v['action_id'])->find();
                    $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v[action_id] . '">' . $finance_info['name'] . '</a>';
                    break;
//                case 'examine' :
//                    $examine_info = M('Examine')->where('examine_id =%d', $v['action_id'])->find();
//                    //审批类型
//                    switch ($examine_info['type']) {
//                        case '1': $type_name = '普通审批';
//                            break;
//                        case '2': $type_name = '请假审批';
//                            break;
//                        case '3': $type_name = '普通报销';
//                            break;
//                        case '4': $type_name = '差旅报销';
//                            break;
//                        case '5': $type_name = '出差申请';
//                            break;
//                        case '6': $type_name = '借款申请';
//                            break;
//
//                        default : $type_name = '普通审批';
//                            break;
//                    }
//                    $action_log[$k]['type'] = '<a href="./index.php?m=examine&a=view&id=' . $v["action_id"] . '">' . $name . '【' . $type_name . '】' . '</a>';
//                    break;
//                case 'task' :
//                    $task_info = $m_task->where('task_id =%d', $v['action_id'])->find();
//                    $action_log[$k]['type'] = $task_info['subject'];
//                    break;
            }
        }
        $this->actionLog = $action_log;
        $show = $Page->show();
        $this->page = $show;

        //查询今日数据(首页简报)，默认为自己和下属的数据
        $briefing_role_ids = array();
        if (session('?admin')) {
            $briefing_role_ids = getSubRoleId(true, 1);
        } else {
            $briefing_role_ids = getSubRoleId();
        }
        //检出当前用户所在部门下所有role_id,//部门下role_id
        $department_id_session = intval(session('department_id'));
        $subPositionId_Arr = M('position')->where('department_id = %d', $department_id_session)->order('position_id asc')->getField('position_id', true);
        $subRoleId_Arr = M('role')->where(array('position_id' => array('in', $subPositionId_Arr)))->getField('role_id', true);

        $create_time = array();
        //今日时间范围
        $start_time_day = strtotime(date('Y-m-d'));
        $end_time_day = strtotime(date('Y-m-d')) + 86400;
        $create_time[0] = array('between', array($start_time_day, $end_time_day));
        //本周时间范围
        $now_date = date("Y-m-d"); //当前日期
        $first = 1; //$first =1 表示每周星期一为开始时间 0表示每周日为开始时间
        $w = date("w", strtotime($now_date)); //获取当前周的第几天 周日是 0 周一 到周六是 1 -6
        $d = $w ? $w - $first : 6; //如果是周日 -6天
        $start_time_week = strtotime("" . $now_date . " -" . $d . " days"); //本周开始时间
        $end_time_week = strtotime("" . date("Y-m-d", $start_time_week) . " +7 days"); //本周结束时间
        $create_time[1] = array('between', array($start_time_week, $end_time_week));
        //本月时间范围
        $start_time_month = strtotime(date('Y-m-01'));
        $end_time_month = strtotime(date("Y") . "-" . date("m") . "-" . date("t")) + 86400;
        $create_time[2] = array('between', array($start_time_month, $end_time_month));
        //本年时间范围
        $year = @date("Y", time());
        $year_next = $year + 1;
        $start_time_year = strtotime("$year-01-01");
        $end_time_year = strtotime("$year_next-01-01");
        $create_time[3] = array('between', array($start_time_year, $end_time_year));
        //上周时间
        $now_date = date('Y-m-d');
        $first = 1; //$first =1 表示每周星期一为开始时间 0表示每周日为开始时间
        $w = date('w',strtotime($now_date));
        $d = $w ? $w - $first : 6;
        $d += 7;
        $start_last_week = strtotime("" . $now_date . " -" . $d . " days"); //上周一开始时间
        $end_last_week = strtotime("".date('Y-m-d',$start_last_week).' +7 days');//上周末结束时间
        $create_time[4] = array('between',array($start_last_week,$end_last_week));

        $customer_count = array();
        $contacts_count = array();
        $business_count = array();
        $log_count = array();
        $mylog_count = array();
        //个人数据 4/9
        $self_customer_count = array();
        $self_contacts_count = array();
        $self_business_count  = array();
        $self_contact_count = array();
        //所在部门下数据 4/10
        $dep_customer_count = array();
        $dep_contacts_count = array();
        $dep_business_count = array();
        $dep_contact_count = array();
        foreach ($create_time as $k => $v) {
            $customer_count[] = $m_customer->where(array('creator_role_id' => array('in', $briefing_role_ids), 'is_deleted' => 0, 'create_time' => $v))->count();
            $contacts_count[] = $m_contacts->where(array('creator_role_id' => array('in', $briefing_role_ids), 'is_deleted' => 0, 'create_time' => $v))->count();
            $business_count[] = $m_business->where(array('creator_role_id' => array('in', $briefing_role_ids), 'is_deleted' => 0, 'create_time' => $v))->count();
            //$resume_count[] = $m_resume->where(array('creator_role_id' => array('in', $briefing_role_ids), 'addtime' => $v))->count();
            $contract_count[] = $m_contract->where(array('creator_role_id' => array('in', $briefing_role_ids), 'is_deleted' => 0, 'create_time' => $v))->count();
            //$log_count[] = $m_log->where(array('role_id' => array('in', $briefing_role_ids), 'category_id' => 1, 'create_date' => $v))->count(); //沟通日志
            //$mylog_count[] = $m_log->where(array('role_id' => array('in', $briefing_role_ids), 'category_id' => array('neq', 1), 'create_date' => $v))->count(); //工作日志

            //个人数据获取
            $self_customer_count[] = $m_customer->where(array('creator_role_id'=>session('role_id'),'is_deleted' => 0 , 'create_time' =>  $v)) ->count();
            $self_contacts_count[] = $m_contacts->where(array('creator_role_id'=>session('role_id'),'is_deleted' => 0 , 'create_time' =>  $v)) ->count();
            $self_contact_count[] = $m_contract->where(array('creator_role_id'=>session('role_id'),'is_deleted' => 0 , 'create_time' =>  $v)) ->count();
            $self_business_count[] = $m_business->where(array('creator_role_id'=>session('role_id'),'is_deleted' => 0 , 'create_time' =>  $v)) ->count();

            //部门数据获取
            $dep_customer_count[] = $m_customer->where(array('creator_role_id' => array('in', $subRoleId_Arr), 'is_deleted' => 0, 'create_time' => $v))->count();
            $dep_contacts_count[] = $m_contacts->where(array('creator_role_id' => array('in', $subRoleId_Arr), 'is_deleted' => 0, 'create_time' => $v))->count();
            $dep_business_count[] = $m_business->where(array('creator_role_id' => array('in', $subRoleId_Arr), 'is_deleted' => 0, 'create_time' => $v))->count();
            $dep_contact_count[] = $m_contract->where(array('creator_role_id' => array('in', $subRoleId_Arr), 'is_deleted' => 0, 'create_time' => $v))->count();

        }
        /**个人首页数据*/

        //是否填写日志
//        $mylog_count_today = $m_log->where(array('role_id' => session('role_id'), 'category_id' => array('neq', 1), 'create_date' => $create_time[0]))->count(); //工作日志
//        $this->mylog_count_today = $mylog_count_today;
//
//        //指标数据
//        $blows_id = getPerByAction('finance', 'target'); //权限判断
//        $m_receivables = M('Receivables');
//        $m_receivingorder = M('Receivingorder');
//        $sum_receivables_price = 0.00;
//        $sum_price = 0.00;
//        $sum_price_month = 0.00;
//        $sum_price_week = 0.00;
//        $sum_price_year = 0.00;
//        $schedule = 0;
//        if ($blows_id) {
//            $owner_customer_ids = $m_customer->where(array('owner_role_id' => session('role_id')))->getField('customer_id', true);
//            // $owner_business_ids = $m_business->where(array('customer_id'=>array('in',$owner_customer_ids)))->getField('business_id',true);
//            $owner_contract_ids = $m_contract->where(array('customer_id' => array('in', $owner_customer_ids), 'is_checked' => 1))->getField('contract_id', true);
//
//            //应收款
//            $receivables_ids = array();
//            $receivables_list = $m_receivables->where(array('contract_id' => array('in', $owner_contract_ids)))->field('receivables_id,price')->select();
//            foreach ($receivables_list as $k => $v) {
//                $sum_receivables_price += $v['price']; //应收款总额
//                $receivables_ids[] = $v['receivables_id'];
//            }
//            //总回款
//            $sum_price = $m_receivingorder->where(array('receivables_id' => array('in', $receivables_ids), 'status' => 1))->sum('money');
//            //收款进度
//            if ($sum_receivables_price == 0 || $sum_receivables_price == 0.00 || $sum_price > $sum_receivables_price) {
//                $schedule = 100;
//            } else {
//                $schedule = round(($sum_price / $sum_receivables_price), 4) * 100;
//            }
//
//            //本月回款
//            $sum_price_month = $m_receivingorder->where(array('receivables_id' => array('in', $receivables_ids), 'status' => 1, 'pay_time' => $create_time[2]))->sum('money');
//            //本周回款
//            $sum_price_week = $m_receivingorder->where(array('receivables_id' => array('in', $receivables_ids), 'status' => 1, 'pay_time' => $create_time[1]))->sum('money');
//            //本年回款
//            $sum_price_year = $m_receivingorder->where(array('receivables_id' => array('in', $receivables_ids), 'status' => 1, 'pay_time' => $create_time[3]))->sum('money');
//            $sum_price = !empty($sum_price) ? $sum_price : '0.00';
//            $sum_price_month = !empty($sum_price_month) ? $sum_price_month : '0.00';
//            $sum_price_week = !empty($sum_price_week) ? $sum_price_week : '0.00';
//            $sum_price_year = !empty($sum_price_year) ? $sum_price_year : '0.00';
//            $schedule = !empty($schedule) ? $schedule : '0.00';
//        }
        $anly_count = array('customer_count' => $customer_count, 'contacts_count' => $contacts_count, 'business_count' => $business_count, 'contract_count' => $contract_count, 'log_count' => $log_count, 'mylog_count' => $mylog_count, 'sum_price' => $sum_price, 'sum_price_month' => $sum_price_month, 'sum_price_week' => $sum_price_week, 'sum_price_year' => $sum_price_year, 'schedule' => $schedule);
        $this->anly_count = $anly_count;

        //渲染个人统计 4/9
        $self_count = array('self_customer_count'=>$self_customer_count,'self_contacts_count'=>$self_contacts_count,'self_business_count'=>$self_business_count,'self_contract_count'=>$self_contact_count);
        $this->self_count = $self_count;
        //渲染部门统计 4/10
        $dep_count = array('dep_customer_count'=>$dep_customer_count,'dep_contacts_count'=>$dep_contacts_count,'dep_business_count'=>$dep_business_count,'dep_contract_count'=>$dep_contact_count);
        $this->dep_count = $dep_count;
        //渲染上班人数、offer人数、客户面试数、推荐客户数
        $be = $this->time_range();
        foreach ($be as $k=>$v){
            $be[$k] = date('Y-m-d',$v);
        }
//        M('user')->select();
        $data = M('report_intergral')->field('sum(offer_num) as offerNum,sum(interview_num) as interviewNum,sum(fine_project_num) as fineNum')->where(array('report_date'=>array('between',$be)))->find();
        $this->datasum = $data;
        $this->alert = parseAlert();
        $this->display();
    }

    //offer、面试人数、推荐简历数 各栏统计的接口( 参数part & range)
    public function face_part(){
        $part = $_GET['part']; // offer、面试人数、推荐简历数
        $part = 'offer_num';
        $time_range = $_GET['range'] ? BaseUtils::getStr($_GET['range']) : 'currentweek'; //currentweek、currentmonth、lastweek、lastmonth
        $be = $this->time_range($time_range);
        foreach ($be as $k=>$v){
            $be[$k] = date('Y-m-d',$v);
        }
        switch ($part){
            case 'offer_num':
                $data = M('report_intergral')->field('sum(offer_num) as offerNum')->where(array('report_date'=>array('between',$be)))->find();
                break;
            case 'interview_num':
                $data = M('report_intergral')->field('sum(interview_num) as interviewNum')->where(array('report_date'=>array('between',$be)))->find();
                break;
            case 'fine_project':
                $data = M('report_intergral')->field('sum(fine_project_num) as fineNum')->where(array('report_date'=>array('between',$be)))->find();
                break;
        }
        $data = ['succ' => true, 'code' => 200, 'data' => $data];
        $this->ajaxReturn($data);
    }
    //首页项目统计接口( 参数)
    public function pipeline(){
        include APP_PATH . "Common/job.cache.php";
        $d_v_business = D('BusinessTopView');
        $fine_project = D("ProjectView");
        $d_business = D('BusinessView');
        $type = $_GET['type'] ? BaseUtils::getStr($_GET['type']) :  '';
        $type = 'onjob';
        switch (trim($type)){
            case 'offer' :
                $data = $fine_project->where(array('fine_project.status'=>6))->order('fine_project.updatetime desc')->limit(10)->select();
                foreach ($data as $k=>$v){
                    $da = M('resume')->field('name,birthday,telephone,email')->where(array('eid'=>$v['resume_id']))->find();
                    $data[$k]['name'] = $da['name'];
                    $data[$k]['birthday'] = $da['birthday'];
                    $data[$k]['telephone'] = $da['telephone'];
                    $data[$k]['email']= $da['email'];
                    $data[$k]['status'] = '签订offer';
                    $jobclass = $d_business->where(array('business.business_id' => $v['business_id']))->getField('jobclass');
                    if($jobclass){
                        $className = '';
                        foreach (explode(',',$jobclass) as $classId){
                            $className .= $job_name[$classId] .'  ';
                        }
                    }
                    $data[$k]['user'] = M('user')->where(array('role_id'=>$v['tracker']))->getField('full_name');
                    $data[$k]['jobname'] = $className;
                }
                break;
            case 'onjob' :
                $data = $fine_project->where(array('fine_project.status'=>6))->order('fine_project.updatetime desc')->limit(10)->select();
                foreach ($data as $k=>$v){
                    $da = M('resume')->field('name,birthday,telephone,email')->where(array('eid'=>$v['resume_id']))->find();
                    $data[$k]['name'] = $da['name'];
                    $data[$k]['birthday'] = $da['birthday'];
                    $data[$k]['telephone'] = $da['telephone'];
                    $data[$k]['email']= $da['email'];
                    $data[$k]['status'] = '签订offer';
                    $jobclass = $d_business->where(array('business.business_id' => $v['business_id']))->getField('jobclass');
                    if($jobclass){
                        $className = '';
                        foreach (explode(',',$jobclass) as $classId){
                            $className .= $job_name[$classId] .'  ';
                        }
                    }
                    $data[$k]['user'] = M('user')->where(array('role_id'=>$v['tracker']))->getField('full_name');
                    $data[$k]['jobname'] = $className;
                }
                break;
            default:
                $data = $d_v_business->where(array('status_id'=>1))-> order('update_time desc')-> limit(10)->select();
                include APP_PATH . "Common/city.cache.php";
                foreach ($data as $k=>$v){
                    $data[$k]['customer'] = M('customer')->where(array('customer_id'=>$v['customer_id']))->getField('name');
                    if ($data[$k]['address']) {
                        $arr = array();
                        $address = explode(",", $data[$k]['address']);
                        foreach ($address as $li) {
                            $arr[] = $city_name[$li];
                        }
                        $data[$k]['address'] = implode(",", $arr);
                    }
                    $roleIds = explode(',', $v['owner_role_id']);
                    $where2['role_id'] = array('in', $roleIds);
                    $data[$k]['owner'] = M('user')->where($where2)->field('full_name,role_id')->select();
                    $data[$k]['updatetime'] = date('Y-m-d H:i');
                    $data[$k]['status'] = '项目进展中';
                }
                break;
        }
        header('content-type:text/html;charset=utf-8');
        dump($data);die;
        return $data;
    }

    //本周，上周，本月，上月。默认是本周
    public function time_range($range){
        switch ($range){

        case 'lastweek':
            //上周时间
        $now_date = date('Y-m-d');
        $first = 1; //$first =1 表示每周星期一为开始时间 0表示每周日为开始时间
        $w = date('w',strtotime($now_date));
        $d = $w ? $w - $first : 6;
        $d += 7;
        $start_last_week = strtotime("" . $now_date . " -" . $d . " days"); //上周一开始时间
        $end_last_week = strtotime("".date('Y-m-d',$start_last_week).' +7 days');//上周末结束时间
        $between_time = array($start_last_week,$end_last_week);
        break;

        case 'currentmonth':
            //本月时间范围
        $start_time_month = strtotime(date('Y-m-01'));
        $end_time_month = strtotime(date("Y") . "-" . date("m") . "-" . date("t")) + 86400;
        $between_time = array($start_time_month, $end_time_month);
        break;

        case 'lastmonth':
            //上月时间范围
        $begin_time = date('Y-m-01 00:00:00',strtotime('-1 month'));
        $end_time = date("Y-m-d 23:59:59", strtotime(-date('d').'day'));
        $between_time = array(strtotime($begin_time),strtotime($end_time));
        break;
        default :
                //本周时间范围
                $now_date = date("Y-m-d"); //当前日期
                $first = 1; //$first =1 表示每周星期一为开始时间 0表示每周日为开始时间
                $w = date("w", strtotime($now_date)); //获取当前周的第几天 周日是 0 周一 到周六是 1 -6
                $d = $w ? $w - $first : 6; //如果是周日 -6天
                $start_time_week = strtotime("" . $now_date . " -" . $d . " days"); //本周开始时间
                $end_time_week = strtotime("" . date("Y-m-d", $start_time_week) . " +7 days"); //本周结束时间
                $between_time = array($start_time_week, $end_time_week);
                break;
        }
        return $between_time;
    }

    //签到地图加载
    public function getTransLocation() {

        $x = trim($_GET['longtitude']);
        $y = trim($_GET['latitude']);
        $url = "http://api.map.baidu.com/geoconv/v1/?coords=$x,$y&from=3&to=5&ak=Z0Fo0ib1GUgWlylCWeLvQh2U";
        $res = json_decode(file_get_contents($url));

        if ($res->status == 0) {
            $data['x'] = $res->result[0]->x;
            $data['y'] = $res->result[0]->y;
            $this->ajaxReturn($data, 'success', 1);
        }
    }

    //动态数据加载
    public function dynamic_data() {
        if ($this->isAjax()) {
            //动态信息
            $m_action_log = M('actionLog');
            $m_comment = M('comment');
            $m_customer = M('customer');
            $m_leads = M('leads');
            $m_business = M('business');
            $m_sales = M('sales');
            $m_contacts = M('contacts');
            $m_contract = M('contract');
            $m_product = M('product');
            $m_log = M('Log');
            $m_fields = M('fields');
            $m_r_file_log = M('RFileLog');
            $m_file = M('File');
            $m_event = M('Event');
            $m_task = M('Task');
            $m_log_talk = M('LogTalk'); //日志评论回复表
            $where = array(); //查询条件
            $where['action_delete'] = 0;
            $opeartion = 'view'; //默认都跳转到view界面
            $p = isset($_REQUEST['p']) ? intval($_REQUEST['p']) : 1;
            $this->p = $p;
            $by = isset($_REQUEST['by']) ? trim($_REQUEST['by']) : 'crm';
            //module=log时，module_id为log表的log_id; module为dynamic时，module_id为action_log表的log_id
            switch ($by) {
                case 'customer' :
                    $where['module_name'] = array('eq', 'customer');
                    break;
                case 'log' :
                    $where['module_name'] = array('eq', 'log');
                    break;
                case 'sign' :
                    $where['module_name'] = array('eq', 'sign');
                    break;
                case 'examine' :
                    $where['module_name'] = array('eq', 'examine');
                    break;
                case 'task' :
                    $where['module_name'] = array('eq', 'task');
                    break;
                case 'business' :
                    $where['module_name'] = array('eq', 'business');
                    break;
                case 'crm' :
                    $where['module_name'] = array('not in', 'log,examine,sign');
                    break;
            }

            if ($_GET['department_id']) {
                $department_id = intval($_GET['department_id']);
                //选中部门下的所有员工
                $subPositionIdArr = M('position')->where('department_id = %d', $department_id)->order('position_id asc')->getField('position_id', true);
                $subRoleIdArr = M('role')->where(array('position_id' => array('in', $subPositionIdArr)))->getField('role_id', true); //部门下role_id
                if (!session('admin')) {
                    //条件为选中部门下,我的下属员工的role_id
                    $mySubRoleIdArr = getSubRoleId(); //我的下属role_id
                    $where['role_id'] = array('in', array_intersect($subRoleIdArr, $mySubRoleIdArr));
                } else {
                    $where['role_id'] = array('in', $subRoleIdArr);
                }
            } else {
                //条件为选中部门下,我的下属员工的role_id
                if (!session('?admin')) {
                    $where['role_id'] = array('in', getSubRoleId());
                }
            }

            if ($_REQUEST["field"]) {
                $field = trim($_REQUEST['field']);
                $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
                if ($field == 'role') {
                    if (!empty($search)) {
                        $same_role_id_array = M('user')->where('name like "%s"', "%$search%")->getField('role_id', true);
                        $role_id_array = getSubRoleId(true, 1);  //下属role_id
                        $role_idArr = array_intersect($same_role_id_array, $role_id_array); //交集
                        $where['role_id'] = array('in', $role_idArr);
                    }
                } elseif ($field == 'content') {
                    $where['content'] = array('like', "%$search%");
                }
                $params = array('field=' . trim($_REQUEST['field']), 'search=' . $search);
            }

            //模糊查询 , , 参数by,name
            $name = $_GET['search'] ? BaseUtils::getStr($_GET['search']) : '';
            if($name){
                //根据模糊姓名，查出所有role_id
                $data = M('user')->where(array('full_name'=>array('like','%'.$name.'%')))->getField('role_id',true);
                //合并$where['role_id'][1],并封装
                $data = array_intersect($data,$where['role_id'][1]);
                $where['role_id'] = array('in', $data);
            }

            $action_log = $m_action_log->where($where)->order('create_time desc')->page($p . ',10')->select();
            $count = $m_action_log->where($where)->count();
            import("@.ORG.Page");
            $Page = new Page($count, 5);
            if (!empty($_GET['by'])) {
                $params[] = "by=" . trim($_GET['by']);
            }
            $m_sign_img = M('signImg');
            $r_contract_sales = M('r_contract_sales');
            foreach ($action_log as $k => $v) {
                if ($v['module_name'] == 'finance') {
                    $module_name = substr($v['param_name'], 2);
                } else {
                    $module_name = $v['module_name'];
                }
                $param_name = $v['param_name'];
                $action_log[$k]['create_time'] = date('Y-m-d H:i:s', $v['create_time']);
                $action_log[$k]['sign_img'] = $m_sign_img->where('sign_id = "%d"', $v['action_id'])->select();
                $m_module_name = M($module_name);
                $pk_id = $m_module_name->getPk();
                $object_module = $m_module_name->where("$pk_id = %d", $v['action_id'])->find();

                if ($v['module_name'] == 'examine') {
                    $name = $object_module['content'];
                } elseif ($v['module_name'] == 'contract') {
                    $name = $object_module['number'];
                } elseif ($v['module_name'] == 'sales') {
                    $contract_id = $r_contract_sales->where('sales_id =%d', $v['action_id'])->getField('contract_id');
                    $name = $m_contract->where('contract_id =%d', $contract_id)->getField('number');
                } elseif ($v['module_name'] == 'purchase') {
                    $name = $object_module['sn_code'];
                } else {
                    $name = $object_module['name'];
                }
                if (empty($name)) {
                    $name = $object_module['subject'];
                }
                //如果是日志，则追加日志内容
                if ($v['action_name'] == 'mylog_add') {
                    $apContent = $object_module['content'];
                    $appHtml = strip_tags($apContent);
                    //如果是日志，则跳转到mylog_view
                    $action_name = 'mylog_view';
                } else {
                    $appHtml = '';
                    $action_name = strtolower($v['action_name']);
                }
                $action_log[$k]['creator'] = getUserByRoleId($v['role_id']);

//                $username = $action_log[$k]['creator']['user_name'];
                $operation = L(strtolower($v['action_name'])) . '了';
//                if ($v['module_name'] == "quote") {
//                    $module = '报价单';
//                } elseif ($v['module_name'] == 'sales') {
//                    $module = '销售合同';
//                } elseif ($v['module_name'] == 'purchase' && $v['action_name'] == 'outof') {
//                    $module = '采购退货';
//                } else {
                $module = L(strtolower($v['module_name']));
//                }
                $action_log[$k]['dynamic'] = $operation . $module;

                $action_log[$k]['address'] = $object_module['address'] . ' ' . $object_module['title'];
                $action_log[$k]['log'] = $object_module['log'];
                $action_log[$k]['x'] = $object_module['x'];
                $action_log[$k]['y'] = $object_module['y'];
                //外勤签到相关客户
                $sign_customer_id = '';
                $sign_customer_id = M('Sign')->where(array('sign_id' => $v['action_id']))->getField('customer_id');
                $customer_info = M('Customer')->where(array('customer_id' => $sign_customer_id))->field('name,customer_id')->find();
                $action_log[$k]['customer_info'] = $customer_info ? $customer_info : array();

                //获取阶段
                switch ($v['module_name']) {
                    case 'log' :
                        $log_info = $m_log->where('log_id =%d', $v['action_id'])->find();
                        $action_log[$k]['cut_content'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=mylog_view&' . $param_name . '&id=' . $v['action_id'] . '" title="查看详情" style="color:#676a6c;">' . cutString($log_info['content'], 110) . '</a>';
                        $action_log[$k]['log_content'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=mylog_view&' . $param_name . '&id=' . $v['action_id'] . '" title="查看详情" style="color:#676a6c;">' . $log_info['content'] . '</a>';
                        ;
                        $action_log[$k]['content_open'] = 0;
                        //是否需展开全文
                        if (strlen($log_info['content']) > 120) {
                            $action_log[$k]['content_open'] = 1;
                        }
                        //附件
                        $file_ids = array();
                        $file_ids = $m_r_file_log->where('log_id = %d', $v['action_id'])->getField('file_id', true);
                        $log_files = $m_file->where(array('file_id' => array('in', $file_ids)))->select();
                        if (!empty($file_ids)) {
                            foreach ($log_files as $key => $value) {
                                $log_files[$key]['size'] = ceil($value['size'] / 1024);
                                /* 判断文件格式 对应其图片 */
                                $log_files[$key]['pic'] = show_picture($value['name']);
                                $log_files[$key]['cut_name'] = cutString($value['name'], 25);
                            }
                        }
                        $action_log[$k]['log_files'] = $log_files;
                        $action_log[$k]['file_count'] = count($file_ids);
                        //日志评论
                        $action_log[$k]['comment_count'] = $m_log_talk->group('g_mark')->where('log_id = %d', $v['action_id'])->count();
                        break;
                    case 'customer' :
                        $customer_list = $m_customer->where('customer_id =%d', $v['action_id'])->find();
                        $fields_type = $m_fields->where('model = "customer" and field = "industry"')->getField('name');
                        $fields_type2 = $m_fields->where('model = "customer" and field = "origin"')->getField('name');
                        $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v[action_id] . '">' . $name . '</a>';
                        $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $customer_list['industry'];
                        $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . $customer_list['origin'] . '&nbsp;&nbsp;' . $something;
                        break;
                    case 'contract' :
                        $contract_list = $m_contract->where('contract_id =%d', $v['action_id'])->find();
                        if ($contract_list['type'] == 1) {
                            $customer_name = M('customer')->where('customer_id = %d', $contract_list['customer_id'])->getField('name');
                        } elseif ($contract_list['type'] == 2) {
                            $customer_name = M('supplier')->where('supplier_id = %d', $info['supplier_id'])->getField('name');
                        }
                        $action_log[$k]['type'] = $contract_list['number'];
                        $action_log[$k]['type1'] = '<span style="color:#000">客户/供应商&nbsp:&nbsp</span>' . $customer_name;
                        $action_log[$k]['type2'] = '<span style="color:#000">状态&nbsp:&nbsp</span>' . $contract_list['status'] . '&nbsp;&nbsp;' . $something;
                        break;
                    case 'business' :
                        $business_info = $m_business->where('business_id =%d', $v['action_id'])->find();
                        $status_name = M('business_status')->where('status_id =%d', $business_info['status_id'])->getField('name');
                        $fields_type = $m_fields->where('model = "business" and field = "status_id"')->getField('name');
                        $fields_type2 = $m_fields->where('model = "business" and field = "nextstep_time"')->getField('name');
                        $action_log[$k]['type'] = '<a href="./index.php?m=customer' . '&a=view&id=' . $business_info['customer_id'] . '&bid=' . $v[action_id] . '">' . $name . '</a>';
                        $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $status_name;
                        $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . date("Y-m-d H:i", $business_info['nextstep_time']) . '&nbsp;&nbsp;' . $something;
                        break;
                    case 'user' :
                        $user_list = D('UserView')->where('user.user_id =%d', $v['action_id'])->find();
                        $action_log[$k]['type'] = $name;
                        $action_log[$k]['type1'] = '<span style="color:#000">用户类型&nbsp:&nbsp</span>' . $user_list['category_name'];
                        $action_log[$k]['type2'] = '<span style="color:#000">岗位&nbsp:&nbsp</span>' . $user_list['role_name'] . '&nbsp;&nbsp;' . $something;
                        break;
                    case 'product' :
                        $product_list = $m_product->where('product_id =%d', $v['action_id'])->find();
                        $category_name = M('product_category')->where('category_id =%d', $product_list['category_id'])->getField('name');
                        $fields_type = $m_fields->where('field = "category_id" and model = "product"')->getField('name');
                        $fields_type2 = $m_fields->where('model = "product" and field = "standard"')->getField('name');
                        $action_log[$k]['type'] = $name;
                        $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $category_name;
                        $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . $product_list['standard'] . '&nbsp;&nbsp;' . $something;
                        break;
//                    case 'sales' :
//                        $sales_list = $m_sales->where('sales_id =%d', $v['action_id'])->find();
//                        if ($sales_list['status'] == 97) {
//                            $status = '未出库';
//                        } elseif ($sales_list['status'] == 98) {
//                            $status = '已出库';
//                        } elseif ($sales_list['status'] == 99) {
//                            $status = '未入库';
//                        } else {
//                            $status = '已入库';
//                        }
//                        $customer_name = M('customer')->where('customer_id = %d', $sales_list['customer_id'])->getField('name');
//                        $contract_id = $r_contract_sales->where('sales_id =%d', $v['action_id'])->getField('contract_id');
//                        $sales_number = $m_contract->where('contract_id =%d', $contract_id)->getField('number');
//                        $action_log[$k]['type'] = $sales_number;
//                        $action_log[$k]['type1'] = '<span style="color:#000">客户/供应商&nbsp:&nbsp</span>' . $customer_name;
//                        $action_log[$k]['type2'] = '<span style="color:#000">状态&nbsp:&nbsp</span>' . $status . '&nbsp;&nbsp;' . $something;
//                        break;
//                    case 'leads' :
//                        $leads_list = $m_leads->where('leads_id =%d', $v['action_id'])->find();
//                        $fields_type = $m_fields->where('field = "source" and model = "leads"')->getField('name');
//                        $fields_type2 = $m_fields->where('model = "leads" and field = "nextstep_time"')->getField('name');
//                        $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v['action_id'] . '">' . $name . '</a>';
//                        $action_log[$k]['type1'] = '<span style="color:#000">' . $fields_type . '&nbsp:&nbsp</span>' . $leads_list['source'];
//                        $action_log[$k]['type2'] = '<span style="color:#000">' . $fields_type2 . '&nbsp:&nbsp</span>' . date("Y-m-d H:i", $leads_list['nextstep_time']) . '&nbsp;&nbsp;' . $something;
//                        break;
//                    case 'event' :
//                        $event_info = $m_event->where('event_id =%d', $v['action_id'])->find();
//                        $start_date = $event_info['start_date'] ? date("Y-m-d H:i", $event_info['start_date']) : '';
//                        $end_date = $event_info['end_date'] ? date("Y-m-d H:i", $event_info['end_date']) : '';
//                        $action_log[$k]['type'] = $event_info['subject'];
//                        $action_log[$k]['type1'] = '<span style="color:#000">开始时间&nbsp:&nbsp</span>' . $start_date;
//                        $action_log[$k]['type2'] = '<span style="color:#000">结束时间&nbsp:&nbsp</span>' . $end_date . '&nbsp;&nbsp;' . $something;
//                        break;
                    case 'finance' :
                        $type = substr($v['param_name'], 2);
                        $finance_info = M($type)->where($type . '_id = %d', $v['action_id'])->find();
                        $action_log[$k]['type'] = '<a href="./index.php?m=' . $v['module_name'] . '&a=view&' . $param_name . '&id=' . $v[action_id] . '">' . $finance_info['name'] . '</a>';
                        break;
//                    case 'examine' :
//                        $examine_info = M('Examine')->where('examine_id =%d', $v['action_id'])->find();
//                        //审批类型
//                        switch ($examine_info['type']) {
//                            case '1': $type_name = '普通审批';
//                                break;
//                            case '2': $type_name = '请假审批';
//                                break;
//                            case '3': $type_name = '普通报销';
//                                break;
//                            case '4': $type_name = '差旅报销';
//                                break;
//                            case '5': $type_name = '出差申请';
//                                break;
//                            case '6': $type_name = '借款申请';
//                                break;
//
//                            default : $type_name = '普通审批';
//                                break;
//                        }
//                        $action_log[$k]['type'] = '<a href="./index.php?m=examine&a=view&id=' . $v["action_id"] . '">' . $name . '【' . $type_name . '】' . '</a>';
//                        break;
//                    case 'task' :
//                        $task_info = $m_task->where('task_id =%d', $v['action_id'])->find();
//                        $action_log[$k]['type'] = $task_info['subject'];
//                        break;
                }
            }
            if ($_REQUEST['date_type'] == 1) {
                $this->actionLog = $action_log;
                $this->display();
            } else {
                if ($action_log) {
                    $action_log = ['succ' => true, 'code' => 200 , 'info' => $action_log];
                    $this->ajaxReturn($action_log);
//                    $this->ajaxReturn($action_log,'success',1);
                } else {
                    $action_log = ['succ' => true, 'code' => 200 , 'info' => '没有更多数据啦！'];
                    $this->ajaxReturn($action_log);
//                    $this->ajaxReturn('没有更多数据啦！','error',0);
                }
            }
        }
    }

    public function widget_edit() {
        $user = M('User');
        $dashboard = $user->where('user_id = %d', session('user_id'))->getField('dashboard');
        $widgets = unserialize($dashboard);
        if (isset($_GET['id']) && $_GET['id'] != '') {
            /**
             * 所有的小部件
             * Function : 判断模块下的某个操作是否有权限
             * @action  : 默认使用index操作来判断权限
             */
            $widget_module = array(
//				array('module'=>'customer','action'=>'index','tag'=>'Salesfunnel','name'=>'销售漏斗'),
                array('module' => 'customer', 'action' => 'index', 'tag' => 'Customerorigin', 'name' => '客户信息来源'),
                array('module' => 'log', 'action' => 'index', 'tag' => 'Notepad', 'name' => '便笺'),
                array('module' => 'customer', 'action' => 'index', 'tag' => 'Productmonthlysales', 'name' => '合同金额统计'),
//				array('module'=>'customer','action'=>'index','tag'=>'Productmonthlyamount','name'=>'月最高销量'),
//				array('module'=>'finance','action'=>'index_receivables','tag'=>'Receivemonthly','name'=>'回款金额统计'),
//				array('module'=>'finance','action'=>'index_receivables','tag'=>'Receiveyearcomparison','name'=>'财务年度对比')
            );

            //如果没有权限，从数组中去除
            foreach ($widget_module as $k => $v) {
                if ($v['module'] == 'log')
                    continue; //默认便笺所有人都有权限
                if (!in_array(session('role_id'), getPerByAction($v['module'], $v['action']))) {
                    unset($widget_module[$k]);
                }
            }
            //商机状态组
            $this->type_list = M('BusinessType')->select();
            $this->widget_module = $widget_module;
            $this->edit_demo = $widgets['dashboard'][$_GET['id']];
            $this->display();
        } elseif (isset($_POST['widget_id']) && $_POST['widget_id'] != '') {
            $title = $_POST['title'] != '' && isset($_POST['title']) ? $_POST['title'] : '未定义组件';
            $widgets['dashboard'][$_POST['widget_id']]['title'] = $title;
            $widgets['dashboard'][$_POST['widget_id']]['widget'] = $_POST['widget'];
            $widgets['dashboard'][$_POST['widget_id']]['level'] = $_POST['level'] == '' ? 0 : $_POST['level'];
            $widgets['dashboard'][$_POST['widget_id']]['status_type_id'] = $_POST['status_type_id'] == '' ? 1 : intval($_POST['status_type_id']);

            if ($user->where('user_id = %d', session('user_id'))->setField('dashboard', serialize($widgets))) {
                alert('success', L('MODIFY_THE_COMPONENT_INFORMATION_SUCCESSFULLY', array($title)), U('index/index'));
            } else {
                alert('error', L('MODIFY_THE_COMPONENT_INFORMATION_NO_CHANGE', array($title)), U('index/index'));
            }
        }
    }

    public function widget_delete() {
        if (isset($_GET['id']) && $_GET['id'] != '') {
            $user = M('User');
            $dashboard = $user->where('user_id = %d', session('user_id'))->getField('dashboard');
            $widget = unserialize($dashboard);

            unset($widget['dashboard'][$_GET['id']]);
            unset($widget['sort'][array_search($_GET['id'], $widget['sort'])]);

            if ($user->where('user_id = %d', session('user_id'))->setField('dashboard', serialize($widget))) {
                alert('success', L('THE_COMPONENT_WAS_REMOVED_SUCCESSFULLY'), U('index/index'));
            } else {
                alert('error', L('THE_COMPONENT_WAS_REMOVED_FAILURE'), $_SERVER['HTTP_REFERER']);
            }
        }
    }

    //serialize  unserialize
    public function widget_add() {
        if ($this->isPost()) {
            if ($_POST['widget']) {
//			if(1==2){
                $user = M('User');
                $title = $_POST['title'] != '' && isset($_POST['title']) ? $_POST['title'] : L('UNNAMED_COMPONENT');
                $dashboard = $user->where('user_id = %d', session('user_id'))->getField('dashboard');
                $widget = unserialize($dashboard);
                if (!is_array($widget)) {
                    $widget = array();
                }

                $max_id = 0;
                foreach ($widget['dashboard'] as $v) {
                    if ($v['id'] > $max_id)
                        $max_id = $v['id'];
                }

                $widget['dashboard'][$max_id + 1] = array('widget' => $_POST['widget'], 'level' => $_POST['level'], 'title' => $title, 'id' => $max_id + 1, 'status_type_id' => intval($_POST['status_type_id']));

                $widget['sort'][] = $max_id + 1;

                $newdashboard['dashboard'] = serialize($widget);
                if ($user->where('user_id = %d', session('user_id'))->save($newdashboard)) {
                    alert('success', L('ADD_COMPONENTS_TO_SUCCESS'), $_SERVER['HTTP_REFERER']);
                }
            } else {
                alert('error', L('ADD_THE_COMPONENT_FAILS_PLEASE_FILL_IN_THE_COMPONENT_NAME'), $_SERVER['HTTP_REFERER']);
            }
        } else {
            /**
             * 所有的小部件
             * Function : 判断模块下的某个操作是否有权限
             * @action  : 默认使用index操作来判断权限
             */
            //获取客户来源 字段标识
            $m_fields = M('Fields');
            $origin_name = $m_fields->where(array('model' => 'customer', 'field' => 'origin'))->getField('name');
            $widget_module = array(
//				array('module'=>'customer','action'=>'index','tag'=>'Salesfunnel','name'=>'销售漏斗'),
                array('module' => 'customer', 'action' => 'index', 'tag' => 'Customerorigin', 'name' => $origin_name),
                array('module' => 'log', 'action' => 'index', 'tag' => 'Notepad', 'name' => '便笺'),
                array('module' => 'customer', 'action' => 'index', 'tag' => 'Productmonthlysales', 'name' => '合同金额统计'),
//				array('module'=>'customer','action'=>'index','tag'=>'Productmonthlyamount','name'=>'月最高销量'),
//				array('module'=>'finance','action'=>'index_receivables','tag'=>'Receivemonthly','name'=>'回款金额统计'),
                array('module' => 'finance', 'action' => 'index_receivables', 'tag' => 'Receiveyearcomparison', 'name' => '财务年度对比')
            );

            //如果没有权限，从数组中去除
            foreach ($widget_module as $k => $v) {
                if ($v['module'] == 'log')
                    continue; //默认便笺所有人都有权限
                if (!in_array(session('role_id'), getPerByAction($v['module'], $v['action']))) {
                    unset($widget_module[$k]);
                }
            }
            //商机状态组
            $this->type_list = M('BusinessType')->select();
            $this->widget_module = $widget_module;
            $this->alert = parseAlert();
            $this->display();
        }
    }

    //首页图表排序
    public function sortCharts() {
        $chart_arr = explode(',', $_POST['chart_arr']); //用户拖动后的顺序
        $m_user = M('user');
        $dashboardSer = $m_user->where('role_id = %d', session('role_id'))->getField('dashboard'); //拖动前数据库的顺序
        $dashboard = unserialize($dashboardSer);
        $dashboard['sort'] = $chart_arr;
        $m_user->where('role_id = %d', session('role_id'))->setField('dashboard', serialize($dashboard));
    }

    /**
     * 首页升级内容提示
     * @param
     * @author
     * @return
     */
    public function updateData() {
        if ($this->isAjax()) {
            $update_show = 1;
            $this->ajaxReturn('', 'success', $update_show);
        }
    }

}
