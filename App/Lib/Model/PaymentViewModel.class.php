<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-01-14
 * Time: 10:08
 */

class PaymentViewModel extends ViewModel{
    public $viewFields;
    public function _initialize(){
        parent::_initialize();
        $this->viewFields = array(
            'payment_plan' =>array('*','_type'=>'LEFT'),
            'payment_planperiod'=>array('Id'=>'ppid','plan_id'=>'plan_id','num'=>'num','money'=>'money','property'=>'property','ontime'=>'ontime','status'=>'status','remark'=>'remark','_on'=>'payment_plan.Id = payment_planperiod.plan_id and payment_plan.nums=payment_planperiod.num')
        );

    }
}