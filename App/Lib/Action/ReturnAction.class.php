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
//        $d_contract = D('ContractView');
//        $contract = $d_contract->select();
        //根据权限查找判断
        $d_v_business = D('BusinessView');
        $business = $d_v_business->select();
        $this->assign('business',$business);
        $this->display();
    }

//展示回款记录主页面
    //ajax展示负责人
    public function personChanged(){
        $per_id = $_POST['person_id'];
        $role_id = M("user")->where(array('user_id'=>intval($per_id)))->getField('role_id');
        $position_id = M("role")->where(array('role_id'=>intval($role_id)))->getField('position_id');
        $department_id = M("position")->where(array('position_id'=>intval($position_id)))->getField('department_id');
        $department =  M("role_department")->where(array('department_id'=>intval($department_id)))->getField('name');
        echo json_encode($department);
    }

    //ajax展示客户
    public function contractChanged(){
        $b_id = $_POST['business_id'];
        $customer_id = M("business")->where(array('business_id'=>intval($b_id)))->getField('customer_id');
        $customer_name = M('customer')->where(array('customer_id'=>intval($customer_id) ))->getField('name');
        $data['business_id']= $b_id;
        $data['customer_id']=$customer_id;
        $data['customer_name'] = $customer_name;
        echo json_encode($data);
    }

    //新增回款计划,存入数据库
    public function plan_add(){
        $data = $_POST;
        //期次 nums
        $nums = $data['num'];
        $customer_id = $data['customer_id'];
        $business_id = $data['business_id'];
        $business = $data['business'];
        $customer = $data['customer'];
        $planed_money = $data['planed_money'];
        $data1 = array(
            'nums'=>$nums,
            'customer'=>$customer,
            'customer_id'=>$customer_id,
            'business_id'=>$business_id,
            'business'=>$business,
            'total'=>$planed_money
            );
        $plan_id =  M("payment_plan")->add($data1);
        $flag = true;
        for( $i = 1 ; $i<=$nums ;$i++ ){
            $data2 = array(
                'plan_id'=>$plan_id,
                'num'=>$i,
                'money'=>$data['money'.$i],
                'property'=>$data['property'.$i],
                'ontime'=>$data['time'.$i]
            );
            $period_id = M('payment_planperiod')->add($data2);
            if(empty($period_id)) $flag=false;
        }
        if(!empty($plan_id)){
            if($flag){
                $success = array(
                    'status' => 1,
                    'info' => '添加成功!',
                );
                $this->ajaxReturn($success);
            }
        }
            $error = array(
                'status'  => 0,
                'info' => '添加失败!',
            );
            $this->ajaxReturn($error);

    }

    public function edit_plan(){
        $business_id = $_GET['plan_id'];
        $plan_id = $_GET['plan'];
        $plan = M("payment_plan")->where(array('Id'=>$plan_id))->find();
        $periods = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
        $d_v_business = D('BusinessView');
        $business = $d_v_business->where(array('business_id'=>$business_id))->find();
        foreach ($periods as $k=>$v ){
            $periods[$k]['plan_time'] = $periods[count($periods)-1]['ontime'];
        }
        $business_all =  $d_v_business->select();
        $user = M("user") -> select();
//        dump($user);exit;
        $this->assign('user',$user);
        $this->assign('business_all',$business_all);
        $this->assign('business',$business);
        $this->assign('plan',$plan);
        $this->assign('periods',$periods);
        $this->display();
    }

    //删除回款计划
    public function deletePlan(){
        $plan_id = $_POST['plan_id'];
        M("payment_plan")->where(array("Id"=>intval($plan_id)))->delete();
        M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->delete();
        echo '{"status":"1"}';
    }
    //删除期次
    public function delete(){
        $period_id = $_POST['period_id'];
        $plan_id = $_POST['plan_id'];
        $nums = $_POST['nums'];
        M("payment_plan")->where(array('Id'=>intval($plan_id)))->save(array('nums'=>intval($nums)-1));
        M("payment_planperiod")->where(array('Id'=>intval($period_id)))->delete();
        $update = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
        foreach ($update as $k => $v){
            $data = array('num'=>($k+1));
            M("payment_planperiod")->where(array('Id'=>intval($v['Id'])))->save($data);
        }
        echo '{"status":"1"}';
    }
    // 回款计划的编辑
    public function plan_edit(){
        $plan_id = intval($_POST['plan_id']);
        $customer = $_POST['customer'];
        $person = $_POST['person'];
        $contract = intval($_POST['contract']);
        $department = $_POST['department'];
        $total = intval($_POST['total']); //计划总金额
        $nums = intval($_POST['nums']);
        $add_num = intval($_POST['add_nums']);
        $data = array(
            'customer'=>$customer,
            'business'=>M("business")->where(array('business_id'=>$contract))->getField('name'),
            'total'=>$total,
            'nums'=>$add_num
        );

        M("payment_plan")->where(array('Id'=>$plan_id))->save($data);

        if($add_num>$nums)
        for($i=($nums+1);$i>2&&$i<=$add_num;$i++){
            $data1 = array(
                'plan_id'=>$plan_id,
                'num'=>$i,
                'money'=>$_POST['money'.$i],
                'property'=>$_POST['property'.$i],
                'ontime'=>$_POST['time'.$i],
                'remark'=>$_POST['remark'.$i]
            );
            M('payment_planperiod')->add($data1);
        }
            for($j=1;$j<=$nums;$j++){
                M("payment_planperiod")->where(array('plan_id'=>$plan_id,'num'=>$j))->save(array('property'=>$_POST['property'.$j]));
            }
        $this->ajaxReturn(1,'success',1);
    }

    public function index(){
        $this->timeSearch();
        //$this->assign('daterange',$this->timePlug());
        $d_contract = D('ContractView');
        $payment_plan = M("payment_plan")->select();
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

        //分页
        if($_GET['listrows']){
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        }else{
            $listrows = 15;
            $params[] = "listrows=15";
        }
        $this->listrows = $listrows;
        import('@.ORG.Page');// 导入分页类
        $count =M("payment_plan")->count() ? M("payment_plan")->count() : '0';
        $p_num = ceil($count/$listrows);
        $p = isset($_GET['p'])?$_GET['p']:1;
        if($p_num<$p){
            $p = $p_num;
        }
        $data = M("payment_plan")->Page($p.','.$listrows)->select();
        foreach ($data as $k => $v){
            $time = M("payment_planperiod")->where(array('plan_id'=>intval($v['Id']),'num'=>$v['nums']))->getField('ontime');
            $data[$k]['ontime'] = $time;
        }
        $Page = new Page($count,$listrows);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 显示分页栏
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('plist',$data);
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