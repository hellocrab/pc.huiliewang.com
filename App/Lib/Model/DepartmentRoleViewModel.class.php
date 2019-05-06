<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-05-06
 * Time: 17:08
 */

class DepartmentRoleViewModel extends ViewModel{
    public $viewFields = array(
        'role'=>array('*','_type'=>'LEFT'),
        'position'=>array('*','_on'=>'role.position_id = position.position_id','_type'=>'LEFT'),
        'role_department'=>array('*','_on'=>'position.department_id=role_department.department_id')
    );
}