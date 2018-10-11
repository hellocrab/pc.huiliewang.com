<?php
class FineProjectViewModel extends ViewModel{
    public $viewFields = array(
        'fine_project'=>array('*','_type'=>'LEFT'),
        'user'=>array('user_id','full_name'=>'user_name','_on'=>'user.role_id=fine_project.tracker','_type'=>'LEFT'),
        'business'=>array('business_id','name'=>'business_name','_on'=>'business.business_id=fine_project.project_id','_type'=>'LEFT'),
        'resume'=>array('eid','name'=>'resume_name','_on'=>'resume.eid=fine_project.resume_id')
    );
}