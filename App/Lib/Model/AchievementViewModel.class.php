<?php
class AchievementViewModel extends ViewModel{
    public $viewFields = array(
        'achievement'=>array('*','_type'=>'LEFT'),
        'business'=>array('name'=>'project_name','business_id','_on'=>'achievement.project_id=business.business_id','_type'=>'LEFT'),
        'customer'=>array('name'=>'customer_name','customer_id','_on'=>'customer.customer_id=achievement.com_id','_type'=>'LEFT'),
        'user'=>array('full_name'=>'user_name','_on'=>'achievement.user_id=user.role_id','_type'=>'LEFT'),
        'resume'=>array('name'=>'resume_name','eid','_on'=>'achievement.resume_id=resume.eid','_type'=>'LEFT'),
        'role'=>array('position_id','_on'=>'achievement.user_id=role.role_id','_type'=>'LEFT'),
        'position'=>array('department_id','_on'=>'position.position_id=role.position_id','_type'=>'LEFT'),
        'role_department'=>array('name'=>'department_name','_on'=>'role_department.department_id=position.department_id')
    );
}