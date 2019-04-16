<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-28
 * Time: 18:01
 */

class FineProjectCcViewModel extends ViewModel{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project'=>array('*','_type'=>'LEFT'),
            'user'=>array('user_id','full_name'=>'user_name','_on'=>'user.role_id=fine_project.tracker','_type'=>'RIGHT'),
            'resume'=>array('eid','name','curCompany'=>'current_company','curDepartment'=>'current_department','curPosition'=>'current_job','sex','curSalary','wantsalary'=>'hope_salary','telephone','edu','job_class','_on'=>'resume.eid=fine_project.resume_id','_type'=>'RIGHT'),
            'fine_project_cc'=>array('fine_id','call_result','gj','age','onwork','company_position','current_receive','off_reason','chance',
                'marital','native','plans','addtime','_on'=>"fine_project.id=fine_project_cc.fine_id"),
        );
    }
}