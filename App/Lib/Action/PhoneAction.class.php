<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-18
 * Time: 09:07
 */
class PhoneAction extends Action
{

    public function _initialize() {
        $title = "通话记录";
        $this->assign("title", $title);

//        $action = array(
//            'permission' => array('listDialog'),
//            'allow' => array('validate', 'check', 'revert', 'getsalesfunnel', 'getcurrentstatus', 'choose', 'return_choose', 'product_view', 'advance_search', 'addduibi', 'view_ajax', 'getbusinessstatus', 'view_slide', 'view_ajax', 'project_adviser', 'project_cc', 'project_tj', 'project_interview', 'project_offer', 'project_enter', 'remove', 'msbz', 'khms', 'tjfk', 'fapiao', 'offer', 'ruzhi', 'safe', 'listajax', 'addcc', 'addgwms', 'addgw', 'addbz', 'remove', 'msbz', 'edit_project', 'invoiceReCheck')
//        );
//        B('Authenticate', $action);
        $this->_permissionRes = getPerByAction('Leads', 'analytics');
    }

    //通话记录
    public function index() {
        //过滤查询条件
        $p = isset($_GET['p']) ? intval($_GET['p']) : 1;
        $start_time = $_GET['start_time'] ? BaseUtils::getStr($_GET['start_time'], 'string') : date('Y-m-d H:i:s', time() - 24 * 86400);
        $end_time = $_GET['end_time'] ? BaseUtils::getStr($_GET['end_time'], 'string') : date('Y-m-d H:i:s', time());
        $role = isset($_GET['role']) ? BaseUtils::getStr($_GET['role'], 'string') : '';
        $department = isset($_GET['department']) ? BaseUtils::getStr($_GET['department'], 'string') : '';
        $pageSize = isset($_GET['listrows']) ? intval($_GET['listrows']) : 15;

        //去掉品聘通话记录接口 editor by yanghao 20190504
        $field = "id,"
            . "fine_id,"
            . "user_name,"
            . "department,"
            . "setingNbr,"
            . "direction,"
            . "callerNum,"
            . "calleeNum,"
            . "call_end_time,"
            . "fwdAnswerTime,"
            . "callOutAnswerTime,"
            . "recordFlag,"
            . "recordUrl,"
            . "oss_record_url,"
            . "duration,"
            . "callmin,"
            . "source,"
            . "item_id,"
            . "channel";

        $where = [];
        $start_Time = strtotime($start_time);
        $end_Time = strtotime($end_time);

        if (!isset($_GET['role']) || $role == 'all') {
            if ($this->_permissionRes) {
                $allRoles = implode(',', $this->_permissionRes);
                $ownerWhere['_string'] .= "  role_id in ({$allRoles}) and duration>0 and add_time > {$start_Time} and add_time < {$end_Time}"; //加入通话判断
            }
        } else {
            $ownerWhere['_string'] .= "  role_id in ({$role}) and duration>0 and add_time > {$start_Time} and add_time < {$end_Time}";
        }

        if(isset($_GET['department']) && $department !== 'all'){
            $where['department_id'] = $department;
        }

        $where['_complex'] = $ownerWhere;
        $where['_logic'] = 'AND';
        $order = "id desc";


        //页数
        if ($_GET['listrows']) {
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        } else {
            $listrows = 15;
            $params[] = "listrows=" . $listrows;
        }
        $count = M('phone_record')->where($where)->order($order)->count();

        $p_num = ceil($count / $listrows);
        if ($p_num < $p) {
            $p = $p_num;
        }
        import("@.ORG.Page");
        $Page = new Page($count, $listrows);
        $this->assign('page', $Page->show());

        $list = M('phone_record')->where($where)->field($field)->page($p . ',' . $listrows)->order($order)->select();
//        var_dump(M('phone_record')->getLastSql());
//        exit;
        foreach ($list as &$info) {
            $info['item_name'] = '';
            $fineId = $info['fine_id'];
            $itemId = $info['item_id'];
            $source = $info['source'];
            if (!$itemId) {
                continue;
            }
            if ($source == 1) {
                $resumeName = M('resume')->where(['eid' => $itemId])->getField('name');
                $info['item_name'] = "简历：<a href= " .U('product/view',['id'=>$itemId]) . ">{$resumeName}</a> ";
                if ($fineId > 0) {
                    $project_id = M('fine_project')->where(['id' => $fineId])->getField('project_id');
                    $businessName = M('business')->where(['business_id' => $project_id])->getField('name');
                    $info['item_name'] .= "<br/><br/>项目：<a href= " . U('business/view',['id'=>$project_id]) .">{$businessName}</a>";
                }
            }
            if ($source == 2) { //客户
                $contactsName = M('contacts')->where(['contacts_id' => $itemId])->getField('name');
                $info['item_name'] = "客户联系人：<a href=" .U('contacts/view',['id' => $itemId]) . ">{$contactsName}</a> ";
            }
        }


        //读取部门与人员列表
        $url = getCheckUrlByAction('Leads', 'analytics');
        $below_ids = getPerByAction('Leads', 'analytics');
        $per_type = M('Permission')->where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if ($per_type == 2 || session('?admin')) {
            $departmentList = M('roleDepartment')->select();
        } else {
            $ids = getSubDepartmentBrId();
            if ($ids) {
                $departmentList = M('roleDepartment')->where(['department_id' => ['in', $ids]])->select();
            } else {
                $departmentList = M('roleDepartment')->where('department_id =%d', session('department_id'))->select();
            }
        }

        $roleList = array();
        foreach ($below_ids as $roleId) {
            $roleList[$roleId] = getUserByRoleId($roleId);
        }


        $this->assign("listrows", $pageSize);
        $this->assign('start_time', $start_time);
        $this->assign('end_time', $end_time);
        $this->assign('departmentList', $departmentList);
        $this->assign('roleList', $roleList);
        $this->assign('list', $list);
        $this->display();
    }

}
