<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/11/6
 * Time: 10:04
 */
class ReturnAction extends Action
{
    public function _initialize(){
        $title="回款";
        $this->assign("title",$title);
    }
    //展示合同
    public function add_new(){
        $d_contract = D('ContractView');
        $contract = $d_contract->select();
        $this->assign('contract',$contract);
        $this->display();
    }
    //ajax展示客户
    public function contractChanged(){
        $c_id = $_POST['contract_id'];
        $customer_id = M('contract')->where(array('contract_id'=>intval($c_id)))->field('customer_id');
        dump($customer_id);exit;
        $customer_name = M('customer')->where(array('customer_id'=>intval($customer_id)))->field('customer_name');
        dump($customer_name);
        echo json_encode($c_id);
    }

    //新增回款计划,存入数据库
    public function plan_add(){
        dump($_POST);exit;
    }

    public function index(){
        $this->timeSearch();
        //$this->assign('daterange',$this->timePlug());
        $d_contract = D('ContractView');
        $by = isset($_GET['by']) ? trim($_GET['by']) : 'me';
        $this->by = $by;
        $where = array();
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,true); //权限问题
        // if(empty($_GET['owner_role_id'])){
        // 	$where['contract.owner_role_id'] = array('in', $this->_permissionRes);
        // }
        $order = 'contract.update_time desc,contract.contract_id asc';
        if($_GET['desc_order']){
            $order = 'contract.'.trim($_GET['desc_order']).' desc,contract.contract_id asc';
        }elseif($_GET['asc_order']){
            $order = 'contract.'.trim($_GET['asc_order']).' asc,contract.contract_id asc';
        }
        switch ($by){
            case 'create':
                $where['creator_role_id'] = session('role_id');
                break;
            case 'sub' :
                $where['contract.owner_role_id'] = array('in',implode(',', $below_ids));
                break;
            case 'subcreate' :
                $where['creator_role_id'] = array('in',implode(',', $below_ids));
                break;
            case 'today' :
                $where['due_time'] =  array('between',array(strtotime(date('Y-m-d')) -1 ,strtotime(date('Y-m-d')) + 86400));
                break;
            case 'week' :
                $week = (date('w') == 0)?7:date('w');
                $where['due_time'] =  array('between',array(strtotime(date('Y-m-d')) - ($week-1) * 86400 -1 ,strtotime(date('Y-m-d')) + (8-$week) * 86400));
                break;
            case 'month' :
                $next_year = date('Y')+1;
                $next_month = date('m')+1;
                $month_time = date('m') ==12 ? strtotime($next_year.'-01-01') : strtotime(date('Y').'-'.$next_month.'-01');
                $where['due_time'] = array('between',array(strtotime(date('Y-m-01')) -1 ,$month_time));
                break;
            case 'add' :
                $order = 'contract.create_time desc,contract.contract_id asc';
                break;
            case 'deleted' :
                $where['is_deleted'] = 1;
                break;
            case 'update' :
                $order = 'contract.update_time desc,contract.contract_id asc';
                break;
            case 'me' :
                $where['contract.owner_role_id'] = session('role_id');
                break;
            case 'check' :
                $where['contract.is_checked'] = 1;
                break;
            case 'no_check' :
                $where['contract.is_checked'] = 0;
                break;
            case 'refuse' :
                $where['contract.is_checked'] = 2;
                break;
            case 'dqcontact' :
                $days = C('defaultinfo.contract_alert_time') ? intval(C('defaultinfo.contract_alert_time')) : 30;
                $temp_time = time()+$days*86400;
                $where['contract.is_checked'] = 1;
                $where['contract.contract_status'] = 0;
                $where['contract.owner_role_id'] = session('role_id');
                $where['end_date'] = array('elt',$temp_time);
                break;
            default: $where['contract.owner_role_id'] = array('in',getPerByAction(MODULE_NAME,ACTION_NAME));break;
        }

        $list =  M('payment_planperiod')->join("LEFT JOIN mx_payment_plan ON mx_payment_plan.Id = mx_payment_planperiod.plan_id")->select();
//汇总计算
        $addMoney = 0;
        foreach ($list as $k=>$v){
            $data = explode(" 元",$v['money']);
            $addMoney+=intval($data[0]);
        }
        $this->assign('money_total',$addMoney);
        $this->assign('list',$list);
        $this->display();
    }
    public function backRecord(){
        $this->timeSearch();
        $this->display();
    }
    public function ticketRecord(){
        $this->timeSearch();
        $this->display();
    }
    public function add(){
        $type = I('get.type');
        $d_contract = D('ContractView');
        $by = isset($_GET['by']) ? trim($_GET['by']) : 'me';
        $this->by = $by;
        $where = array();
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,true); //权限问题
        // if(empty($_GET['owner_role_id'])){
        // 	$where['contract.owner_role_id'] = array('in', $this->_permissionRes);
        // }
        $order = 'contract.update_time desc,contract.contract_id asc';
        if($_GET['desc_order']){
            $order = 'contract.'.trim($_GET['desc_order']).' desc,contract.contract_id asc';
        }elseif($_GET['asc_order']){
            $order = 'contract.'.trim($_GET['asc_order']).' asc,contract.contract_id asc';
        }
        switch ($by){
            case 'create':
                $where['creator_role_id'] = session('role_id');
                break;
            case 'sub' :
                $where['contract.owner_role_id'] = array('in',implode(',', $below_ids));
                break;
            case 'subcreate' :
                $where['creator_role_id'] = array('in',implode(',', $below_ids));
                break;
            case 'today' :
                $where['due_time'] =  array('between',array(strtotime(date('Y-m-d')) -1 ,strtotime(date('Y-m-d')) + 86400));
                break;
            case 'week' :
                $week = (date('w') == 0)?7:date('w');
                $where['due_time'] =  array('between',array(strtotime(date('Y-m-d')) - ($week-1) * 86400 -1 ,strtotime(date('Y-m-d')) + (8-$week) * 86400));
                break;
            case 'month' :
                $next_year = date('Y')+1;
                $next_month = date('m')+1;
                $month_time = date('m') ==12 ? strtotime($next_year.'-01-01') : strtotime(date('Y').'-'.$next_month.'-01');
                $where['due_time'] = array('between',array(strtotime(date('Y-m-01')) -1 ,$month_time));
                break;
            case 'add' :
                $order = 'contract.create_time desc,contract.contract_id asc';
                break;
            case 'deleted' :
                $where['is_deleted'] = 1;
                break;
            case 'update' :
                $order = 'contract.update_time desc,contract.contract_id asc';
                break;
            case 'me' :
                $where['contract.owner_role_id'] = session('role_id');
                break;
            case 'check' :
                $where['contract.is_checked'] = 1;
                break;
            case 'no_check' :
                $where['contract.is_checked'] = 0;
                break;
            case 'refuse' :
                $where['contract.is_checked'] = 2;
                break;
            case 'dqcontact' :
                $days = C('defaultinfo.contract_alert_time') ? intval(C('defaultinfo.contract_alert_time')) : 30;
                $temp_time = time()+$days*86400;
                $where['contract.is_checked'] = 1;
                $where['contract.contract_status'] = 0;
                $where['contract.owner_role_id'] = session('role_id');
                $where['end_date'] = array('elt',$temp_time);
                break;
            default: $where['contract.owner_role_id'] = array('in',getPerByAction(MODULE_NAME,ACTION_NAME));break;
        }
        $list = $d_contract->where($where)->order($order)->select();

        $this->assign('contract',$list);
        $this->assign('type',$type);
        $this->display();

    }

    public function contract(){
        $customer_id = I("get.id");
        $d_contract = D('ContractView');
        $data = $d_contract->where(array('customer_id'=>intval($customer_id)))->find();
        echo json_encode($data);
    }

    public function addd(){
        $adata = I('post.');
        $plan = array(
            'customer'=>$adata['customer'],
            'contracttitle'=>$adata['contracttitle'],
            'total'=>intval($adata['total']),
            'signtime'=>$adata['signtime'],
            'customer_id'=>intval($adata['customer_id'])
        );
        $plan_id = M('payment_plan')->add($plan);
        $num = 1;
        foreach ($adata['peroid'] as $k => $v){
            $dataList[] = array('timereceived'=>$v[0],'proportion'=>$v[1],'money'=>$v[2],'remark'=>$v[3],'plan_id'=>$plan_id,'num'=>$num);
            $num++;
        }
        M('payment_planperiod')->addAll($dataList);
    }

    //添加回款记录
    public function addrecord(){
        $data = I('post.');
    }

    //时间段搜索
    public function timeSearch(){
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }

        $this->start_time = $start_time;
        $this->end_time = $end_time;
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);
    }
    //时间插件处理
    public function timePlug(){
        //（计算开始、结束时间距今天的天数）
        $daterange = array();
        //上个月
        $daterange[0]['start_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-d', mktime(0,0,0,date('m')-1,1,date('Y')))))/86400;
        $daterange[0]['end_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-01 00:00:00')))/86400;
        //本月
        $daterange[1]['start_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-01 00:00:00')))/86400;
        $daterange[1]['end_day'] = 0;
        //上季度
        $month = date('m');
        if($month==1 || $month==2 ||$month==3){
            $year = date('Y')-1;
            $daterange_start_time = strtotime(date($year.'-10-01 00:00:00'));
            $daterange_end_time = strtotime(date($year.'-12-31 23:59:59'));
        }elseif($month==4 || $month==5 ||$month==6){
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        }elseif($month==7 || $month==8 ||$month==9){
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        }else{
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }
        $daterange[2]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[2]['end_day'] = (strtotime(date('Y-m-d',time()))-$daterange_end_time-1)/86400;
        //本季度
        $month=date('m');
        if($month==1 || $month==2 ||$month==3){
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        }elseif($month==4 || $month==5 ||$month==6){
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        }elseif($month==7 || $month==8 ||$month==9){
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }else{
            $daterange_start_time = strtotime(date('Y-10-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-12-31 23:59:59"));
        }
        $daterange[3]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[3]['end_day'] = 0;
        //上一年
        $year = date('Y')-1;
        $daterange_start_time = strtotime(date($year.'-01-01 00:00:00'));
        $daterange_end_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[4]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[4]['end_day'] = (strtotime(date('Y-m-d',time()))-$daterange_end_time)/86400;
        //本年度
        $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[5]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[5]['end_day'] = 0;
        return $daterange;
    }
}