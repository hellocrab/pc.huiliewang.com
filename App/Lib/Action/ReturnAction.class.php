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
    public function index(){
        $this->timeSearch();
        //$this->assign('daterange',$this->timePlug());
        $list =  M('payment_planperiod')->join("LEFT JOIN mx_payment_plan ON mx_payment_plan.Id = mx_payment_planperiod.plan_id")->select();

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
        $this->assign('type',$type);
        $this->display();

    }

    public function addd(){
        $adata = I('post.');
        $plan = array(
            'customer'=>$adata['customer'],
            'contracttitle'=>$adata['contracttitle'],
            'total'=>intval($adata['total']),
            'signtime'=>$adata['signtime'],
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