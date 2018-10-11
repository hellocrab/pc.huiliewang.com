<?php
class ResumeViewModel extends ViewModel{
    public $viewFields = array(
        'resume'=>array('*', '_type'=>'LEFT'),
        'user'=>array('full_name', '_on'=>'user.role_id=resume.creator_role_id','_type'=>'LEFT'),
        'role'=>array('position_id','_on'=>'resume.creator_role_id=role.role_id','_type'=>'LEFT'),
        'position'=>array('department_id','_on'=>'position.position_id=role.position_id','_type'=>'LEFT'),
        'role_department'=>array('name'=>'department_name','_on'=>'role_department.department_id=position.department_id')
    );
}