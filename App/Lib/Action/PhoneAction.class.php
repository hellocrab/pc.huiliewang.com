<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-18
 * Time: 09:07
 */
class PhoneAction extends Action {

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
                . "channel";

        $where = [];
        $where['starTime'] = $start_time;
        $where['endTime'] = $end_time;
        if ($this->_permissionRes) {
            $allRoles = implode(',', $this->_permissionRes);
            $ownerWhere['_string'] .= "  role_id in ({$allRoles}) and duration>0 ";//加入通话判断
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

        $list =  M('phone_record')->where($where)->field($field)->page($p . ',' . $listrows)->select();
        $this->assign('list',$list);
        
        $this->display();
    }

}
