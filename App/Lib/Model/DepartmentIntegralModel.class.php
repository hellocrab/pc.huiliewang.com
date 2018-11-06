<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-10-17
 * Time: 16:23
 */

class DepartmentIntegralModel extends ViewModel
{
    public $viewFields = array(
        'integral' => array('user_id','achievement','yjtime','_type'=>'LEFT'),
        'role' => array('position_id','user_id','_on'=>'integral.user_id =role.user_id','_type'=>'LEFT',),
        'position' =>array('position_id','department_id','_on'=>'role.position_id=position.position_id','_type'=>'LEFT'),
        'role_department' => array('department_id','name','_on'=>'position.department_id=role_department.department_id','_type'=>'LEFT'),
    );
}