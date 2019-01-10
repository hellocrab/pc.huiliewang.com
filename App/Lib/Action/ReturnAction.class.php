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
        $test1 = M("payment_plan")->field('business_id')->select();
        foreach ($test1 as $k => $v){
            $test[]=intval($v['business_id']);
        }
        $d_v_business = D('BusinessView');
        if(count($test))
            $business = $d_v_business->where(['business_id'=>['not in',$test]])->select();
        else
            $business = $d_v_business->select();
        $this->assign('business',$business);
        $this->display();
    }

//展示回款记录主页面
    //ajax展示负责人
    public function personChanged(){
        $per_id = $_POST['person_id'];
//        $role_id = M("user")->where(array('user_id'=>intval($per_id)))->getField('role_id');
        $role_id = intval($per_id);
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
        $nums = M("payment_plan")->where(array('customer_id'=>intval($customer_id),'business_id'=>intval($b_id)))->getField('nums');
        $plan_id = M("payment_plan")->where(array('customer_id'=>intval($customer_id),'business_id'=>intval($b_id)))->getField("Id");
        $num = M("payment_planperiod")->field('num')->where(array('plan_id'=>intval($plan_id),'status'=>0))->select();
        $data['num'] = $num ;
        $data['nums'] = intval($nums);
        $data['business_id']= $b_id;
        $data['customer_id']= $customer_id;
        $data['customer_name'] = $customer_name;
        echo json_encode($data);
    }

    //ajax展示对应期次
    public function modifyStatus(){
        $flag = M("payment_planperiod")->where(array("Id"=>intval($_POST['period_id'])))->save(array('status'=>intval($_POST['status_value'])));
//        dump($flag);exit;
        $plan_id = M("payment_planperiod")->where(array("Id"=>intval($_POST['period_id'])))->getField("plan_id");
        $data = M("payment_planperiod")->where(array("plan_id"=>intval($plan_id)))->select();
        $tt = true;
        $statuss = '';
        foreach ($data as $k=>$v){
            if(intval($v['status'])==0) $tt = false;
        }
        if($tt){
            M("payment_plan")->where(array("Id"=>intval($plan_id)))->save(array('pstatus'=>1));
            $statuss = '完成';
        }
        else{
            M("payment_plan")->where(array("Id"=>intval($plan_id)))->save(array('pstatus'=>0));
            $statuss = '未完成';
        }
        //对应期次状态json传输
        $current_status = intval($_POST['status_value']) == 0 ? '未完成' : '完成' ;
        if($flag) echo '{"status":"1","statuss":"'.$statuss.'","current_status":"'.$current_status.'"}';else echo '{"status":"2","statuss":"'.$statuss.'","current_status":"'.$current_status.'"}';
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
            'total'=>$planed_money,
            'status'=>0
            );
        $plan_id =  M("payment_plan")->add($data1);
        $flag = true;
        for( $i = 1 ; $i<=$nums ;$i++ ){
            $data2 = array(
                'plan_id'=>$plan_id,
                'num'=>$i,
                'money'=>$data['money'.$i],
                'property'=>$data['property'.$i],
                'ontime'=>$data['time'.$i],
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
        //根据权限查找判断
//        $test1 = M("payment_plan")->field('business_id')->select();
//        foreach ($test1 as $k => $v){
//            $test[]=intval($v['business_id']);
//        }
//        $d_v_business = D('BusinessView');
//        if(count($test))
//            $business = $d_v_business->where(['business_id'=>['not in',$test]])->select();
//        else
//            $business = $d_v_business->select();
        $business_id = $_GET['plan_id']; //
        $plan_id = $_GET['plan'];  //
        $plan = M("payment_plan")->where(array('Id'=>intval($plan_id)))->find();
        $periods = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
        $d_v_business = D('BusinessView');
        $business = $d_v_business->where(array('business_id'=>$business_id))->find();
        foreach ($periods as $k=>$v ){
            $periods[$k]['plan_time'] = $periods[count($periods)-1]['ontime'];
        }

        $test1 = M("payment_plan")->field('business_id')->select();
        foreach ($test1 as $k => $v){
            $test[]=intval($v['business_id']);
        }
        if(count($test))
            $business_all = $d_v_business->where(['business_id'=>['not in',$test]])->select();
        else
            $business_all = $d_v_business->select();

        $user = M("user") -> select();
        //已回款金额、状态、付款方式、回款时间计算
        $plan['money_backed'] = 0;
        $plan['total_count'] = 0;
        $plan['backed_num'] = '未开始还款';
        $plan['status'] = intval($plan['pstatus']) == 0 ? '未完成' : '完成';
        foreach ($periods as $k=>$v) {
            $record = M("payment_record")->where(array('periodplan_id'=>intval($v['Id'])))->select();
            if(count($record)) $plan['backed_num'] = $v['num'];
            $total = 0;
            $method = '';$time = '';
            foreach ($record as $k1 => $v1){
                $total += floatval($v1['money']);
                $method = $v1['paymethod'];
                $time = $v1['paytime'];
            }
            $periods[$k]['total'] = $total;
            $plan['money_backed'] += $total;
            $plan['total_count'] += count($record);
            $periods[$k]['status'] = intval($periods[$k]['status'])==0 ? '未完成' : "完成";
//            $periods[$k]['status'] = $total < floatval($v['money']) ? '未完成' : "完成";
//            if($total > floatval($v['money']))
//                M("payment_planperiod")->where(array('Id'=>intval($v['Id'])))->save(array('status'=>1));
//            else
//                M("payment_planperiod")->where(array('Id'=>intval($v['Id'])))->save(array('status'=>0));
            $periods[$k]['method'] = $method;
            $periods[$k]['paytime'] = $time;
        }
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
//        dump($_POST);exit;
        $period_id = $_POST['period_id'];
        $plan_id = $_POST['plan_id'];
        $nums = $_POST['nums'];
        M("payment_plan")->where(array('Id'=>intval($plan_id)))->save(array('nums'=>(intval($nums)-1)));
        M("payment_planperiod")->where(array('Id'=>intval($period_id)))->delete();
        $update = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
        foreach ($update as $k => $v){
            $data = array('num'=>($k+1));
            M("payment_planperiod")->where(array('Id'=>intval($v['Id'])))->save($data);
        }
        //修改计划状态
        $period = M("payment_planperiod")->where(array('Id'=>intval($period_id)))->select();
        $flag = true ;
        foreach ($period as $k=>$v){
            $flag = intval($v['status']) == 0 ? false:true;
        }
        if($flag) M('payment_plan')->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>1));
        else M('payment_plan')->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>0));
        echo '{"status":"1"}';
    }
    // 回款计划的编辑
    public function plan_edit(){
        $plan_id = intval($_POST['plan_id']);
        $bus_id = intval($_POST['business_id']);
        $customer = $_POST['customer'];
        $person = intval($_POST['person']);
        $contract = intval($_POST['contract']); //新的business_id
        $total = intval($_POST['total']); //计划总金额
        $nums = intval($_POST['nums']);
        $add_num = intval($_POST['add_nums']);
        $data = array(
            'customer'=>$customer,
            'customer_id'=> intval($_POST['customer_id']),
            'business_id'=>$contract,
            'business'=>M("business")->where(array('business_id'=>$contract))->getField('name'),
            'total'=>$total,
            'nums'=>$add_num,
        );
        M("payment_plan")->where(array('Id'=>$plan_id))->save($data);
        $business_id = M("payment_plan")->where(array('Id'=>$plan_id))->getField("business_id");
        M("business")->where(array('business_id'=>intval($business_id)))->save(array('creator_role_id'=>intval($person)));
        if($add_num>$nums)
        for($i=($nums+1);$i>1&&$i<=$add_num;$i++){
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
        $search_peoject = $_GET['search_project'] ? BaseUtils::getStr($_GET['search_project'],'string'): '';
        $start_time = $_GET['start_time'] ? BaseUtils::getStr($_GET['start_time'],'string'): '';
        $end_time = $_GET['end_time'] ? BaseUtils::getStr($_GET['end_time'],'string'): '';
        
        
        $where = array();
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,true); //权限问题

        if($search_peoject){
            $where['mx_payment_plan.business'] =  array('like','%'.$search_peoject.'%');
        }
        if($start_time && $end_time){
            $where['pp.ontime'] = array('between',array($start_time,$end_time));
        }
        
        if(!$start_time && $end_time){
            $where['pp.ontime'] = array('between',array(date('Y-m-d',strtotime("-1years",strtotime($end_time))),$end_time));//自动计算1年前的 日期
        }
        
        if(!$end_time && $start_time){
            $where['pp.ontime'] = array('between',array($start_time,date('Y-m-d',strtotime("+1years",strtotime($start_time)))));//自动计算1年后的 日期
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

////        $count = $user->where($where_source)->count() ? $user->where($where_source)->count() : '0';
        $count = M("payment_plan")->where($where)->count();
        $p_num = ceil($count/$listrows);
        $p = isset($_GET['p'])?$_GET['p']:1;
        if($p_num<$p){
            $p = $p_num;
        }
        $data = M("payment_plan")->join('left join mx_payment_planperiod pp ON mx_payment_plan.Id = pp.plan_id')->where($where)->group('pp.plan_id')->order("mx_payment_plan.Id desc")->Page($p.','.$listrows)->select();
//        $count =M("payment_plan")->join('left join mx_payment_planperiod pp ON mx_payment_plan.Id = pp.plan_id')->where($where)->group('pp.plan_id')->count() ? count($data) : '0';
        $count = $count ? $count : '0';

        foreach ($data as $k => $v){
            $time = M("payment_planperiod")->where(array('plan_id'=>intval($v['plan_id']),'num'=>$v['nums']))->getField('ontime');
            $periodplan = M("payment_planperiod")->where(array('plan_id'=>intval($v['plan_id'])))->select();
            $e_total = 0;
            $data[$k]['isdelete'] = 0;
            foreach ($periodplan as $k1=>$v1){
                $money = M('payment_record')->where(array('periodplan_id'=>$v1['Id']))->select();
                foreach ($money as $k2 => $v2){
                    $e_total += floatval($v2['money']);
                }
                if(count($money))  $data[$k]['isdelete'] = 1;
            }
            $data[$k]['e_total'] = $e_total;
//            $data[$k]['status'] = $e_total<floatval($v['total']) ? '未完成' : '完成';
            $data[$k]['pstatus'] = intval($data[$k]['pstatus']) == 0 ? '未完成' : '完成';
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

    /**
     * 回款记录
     */
    public function record_index(){

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
        $count =M("payment_record")->count() ? M("payment_record")->count() : '0';
        $p_num = ceil($count/$listrows);
        $p = isset($_GET['p'])?$_GET['p']:1;
        if($p_num<$p){
            $p = $p_num;
        }
        $data = M("payment_record")->Page($p.','.$listrows)->order('Id desc')->select();
        foreach ($data as $k => $v){
            $plan_id = M("payment_planperiod")->where(array('Id'=>intval($v['periodplan_id'])))->getField('plan_id');
            $data[$k]['nums'] = M("payment_planperiod")->where(array('Id'=>intval($v['periodplan_id'])))->getField('num');
            $data[$k]['customer'] = M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('customer');
            $data[$k]['business'] = M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('business');
            $data[$k]['ontime'] = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($data[$k]['nums'])))->getField('ontime');
        }
        $Page = new Page($count,$listrows);// 实例化分页类 传入总记录数和每页显示的记录数
        $show = $Page->show();// 显示分页栏
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('plist',$data);
        $this->display();
    }

    //回款记录编辑修改
    public function record_edit(){
        $data = array(
            'periodplan_id' => intval($_POST['periodplan_id']),
            'paytime'=> $_POST['paytime'],
            'createtime' => $_POST['createtime'],
            'paytime_modify'=>date('y-m-d'),
            'money' => $_POST['money'],
            'paymethod' => $_POST['paymethod'],
            'paytype' => intval($_POST['paytype']),
            'creater' => $_POST['creater'],
            'receiver' => $_POST['receiver'],
            'delayed' => intval($_POST['delayed']),
            'delayeddays' => $_POST['delayeddays'],
            'overed' => intval($_POST['overed']),
            'remark' => $_POST['remark']
        );
        M("payment_record")->where(array('Id'=>intval($_POST['record_id'])))->save($data);
        $person = $_POST['person'];
        //编辑期次回款状态，计划回款状态
//        M("payment_planperiod")->where(array('Id'=>intval($_POST['periodplan_id'])))->save(array('status'=>intval($_POST['overed'])));
        $planperiod_money = M("payment_planperiod")->where(array('Id'=>intval($_POST['periodplan_id'])))->getField('money');//取出当前期次的金额
        $record = M("payment_record")->field('money')->where(array('periodplan_id'=>intval($_POST['periodplan_id'])))->select();
        $hs = 0;
        if(count($record))
            foreach ($record as $k=>$v){
                $hs += floatval($v['money']);
            }
        if($hs>=floatval($planperiod_money))
            M("payment_planperiod")->where(array('Id'=>intval($_POST['periodplan_id'])))->save(array('status'=>1));
        else
            M("payment_planperiod")->where(array('Id'=>intval($_POST['periodplan_id'])))->save(array('status'=>0));
        //对应计划状态的修改
        $plan_id = M("payment_planperiod")->where(array('Id'=>intval($_POST['periodplan_id'])))->getField("plan_id");
        $flag = true;
        $planperiod = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
        foreach ($planperiod as $k=>$v){
             if (intval($v['status']) == 0){
                 $flag = false ;
             }
        }
        if($flag) M("payment_plan")->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>1));else M("payment_plan")->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>0));
        $period_id = M("payment_record")->where(array('Id'=>intval($_POST['record_id'])))->getField("periodplan_id");
        $plan_id = M("payment_planperiod")->where(array('Id'=>intval($period_id)))->getField("plan_id");
        $business_id = M("payment_plan")-> where(array('Id'=>intval($plan_id)))->getField("business_id");
        M("business")->where(array('business_id'=>intval($business_id)))->save(array('creator_role_id'=>intval($person)));
        $this->ajaxReturn(1,'success',1);
    }

    //回款记录编辑页显示
    public function edit_record(){
        $periodplan_id = intval($_GET['periodplan_id']);
        $record_id = intval($_GET['Id']);
        $record = M("payment_record")->where(array('Id'=>$record_id,'periodplan_id'=>$periodplan_id))->find();
        $record['num'] = M("payment_planperiod")->where(array('Id'=>$periodplan_id))->getField('num');
        $plan_id = M("payment_planperiod")->where(array('Id'=>$periodplan_id))->getField('plan_id');
        $record['customer'] = M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('customer');
        $record['nums'] = M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('nums');
        $business_id = intval(M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('business_id'));
        $d_v_business = D('BusinessView');
        $business = $d_v_business->where(array('business_id'=>$business_id))->find();
        $record['business'] = M("payment_plan")->where(array('Id'=>intval($plan_id)))->getField('business');
        switch ($record['paytype']){
            case '1': $record['paytype'] = '预付款';break;
            case '2': $record['paytype'] = '首付款';break;
            case '3': $record['paytype'] = '过保付款';break;
            case '4': $record['paytype'] = '慧猎系列款';break;
        }
        switch ($record['delayed']){
            case '1':$record['delayed'] = "逾期未完成";break;
            case '2':$record['delayed'] = "逾期未回款";break;
            case '3':$record['delayed'] = "逾期已完成";break;
            case '4':$record['delayed'] = "未逾期";break;
        }
        $d_v_business = D('BusinessView');
//        $business_all =  $d_v_business->select();
        $business_all =  M("payment_plan")->where(array('status'=>0))->select();
        $user = M("user") -> select();
        $this->assign('full_name',$_SESSION['full_name']);
        $this->assign('user',$user);
        $this->assign('business_all',$business_all);
        $this->assign('business',$business);
        $this->assign('record',$record);
        $this->display();
    }

    //汇款记录的删除
    public function deletePlanPeriod(){
        $plan_id = $_POST['plan_id']; //获取回款记录的id
        //记录删除 ，对应期次和计划状态修改
        $period_id = M("payment_record")->where(array('Id'=>intval($plan_id)))->getField('periodplan_id');//取出对应期次ID
        M("payment_record")->where(array('Id'=>intval($plan_id)))->delete();
        $plan = M('payment_planperiod')->where(array('Id'=>intval($period_id)))->getField('plan_id'); //取出对应的计划id
        $planperiod_money = M('payment_planperiod')->where(array('Id'=>intval($period_id)))->getField('money');
        $record = M("payment_record")->field('money')->where(array('periodplan_id'=>intval($period_id)))->select();
        $hs = 0;
        if(count($record))
            foreach ($record as $k=>$v){
                $hs += floatval($v['money']);
            }
        if($hs>=floatval($planperiod_money))
            M("payment_planperiod")->where(array('Id'=>intval($period_id)))->save(array('status'=>1));
        else
            M("payment_planperiod")->where(array('Id'=>intval($period_id)))->save(array('status'=>0));
        //回款记录添加时，对应计划状态修改
        $period = M("payment_planperiod")->where(array('Id'=>intval($period_id)))->select();
        $flag = true ;
        foreach ($period as $k=>$v){
            $flag = intval($v['status']) == 0 ? false:true;
        }
        if($flag) M('payment_plan')->where(array('Id'=>intval($plan)))->save(array('pstatus'=>1));
        else M('payment_plan')->where(array('Id'=>intval($plan)))->save(array('pstatus'=>0));
        echo '{"status":"1"}';
    }

    //回款记录添加
    public function record_add(){
        $plan_id = M("payment_plan")->where(array('customer_id'=>intval($_POST['customer_id']),'business_id'=>intval($_POST['business_id'])))->getField('Id');
        $planMoney = M("payment_plan")->where(array('customer_id'=>intval($_POST['customer_id']),'business_id'=>intval($_POST['business_id'])))->getField('total');
        $period_id = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($_POST['num'])))->getField('Id');
        $plantime = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($_POST['num'])))->getField('ontime');
        $planperiod_money = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($_POST['num'])))->getField('money');
        //期次总金额 计划总金额对比
//        $periodplan = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
//        $e_total = 0;
//        foreach ($periodplan as $k1=>$v1){
//            $money = M('payment_record')->where(array('periodplan_id'=>$v1['Id']))->select();
//            foreach ($money as $k2 => $v2){
//                $e_total += floatval($v2['money']);
//            }
//        }
//        if(floatval($planMoney)>$e_total)
//            M("payment_plan")->where(array('customer_id'=>intval($_POST['customer_id']),'business_id'=>intval($_POST['business_id'])))->save(array('status'=>0));
//        else
//            M("payment_plan")->where(array('customer_id'=>intval($_POST['customer_id']),'business_id'=>intval($_POST['business_id'])))->save(array('status'=>1));

        $record = M("payment_record")->field('money')->where(array('periodplan_id'=>intval($period_id)))->select();
        $hs = floatval($_POST['money']);
        if(count($record))
            foreach ($record as $k=>$v){
                $hs += floatval($v['money']);
            }
        if($hs>=floatval($planperiod_money))
            M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($_POST['num'])))->save(array('status'=>1));
        else
            M("payment_planperiod")->where(array('plan_id'=>intval($plan_id),'num'=>intval($_POST['num'])))->save(array('status'=>0));
        //回款记录添加时，对应计划状态修改
         $period = M("payment_planperiod")->where(array('plan_id'=>intval($plan_id)))->select();
         $flag = true ;
         foreach ($period as $k=>$v){
             $flag = intval($v['status']) == 0 ? false:true;
         }
        if($flag) M('payment_plan')->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>1));
         else M('payment_plan')->where(array('Id'=>intval($plan_id)))->save(array('pstatus'=>0));
         //
        if((strtotime($_POST['date'])-strtotime($plantime))<=0)
            $delayed = 4;
        elseif ($hs==0)
            $delayed = 2;
        elseif ($hs>0 && $hs < floatval($planperiod_money))
            $delayed = 1;
        else $delayed = 3;

        $data = array(
            'periodplan_id'=>intval($period_id),
            'paytime'=>$_POST['date'],
            'createtime'=>date("Y-m-d"),
            'paytime_modify'=>date('y-m-d'),
            'money'=>$_POST['money'],
            'paymethod'=>$_POST['method'],
            'paytype'=>intval($_POST['type']),
            'receiver'=>$_POST['payee'],
            'delayeddays'=>(strtotime($_POST['date'])-strtotime($plantime))<=0 ? 0 : (strtotime($_POST['date'])-strtotime($plantime))/86400,
            'delayed'=> $delayed,
            'remark'=>$_POST['remark']
        );
        $flag = M("payment_record")->add($data);
        if(!empty($flag)) {
            $success = array(
                'status' => 1,
                'info' => '添加成功!',
            );
            $this->ajaxReturn($success);
        }
        else {
            $error = array(
                'status'  => 0,
                'info' => '添加失败!',
            );
            $this->ajaxReturn($error);
        }
    }

    public function add_record(){
        //根据权限查找判断
        $business = M("payment_plan")->where(array('status'=>0))->select();
        $this->assign('business',$business);
        $this->display();
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