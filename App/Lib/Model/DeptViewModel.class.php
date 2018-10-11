<?php
class DeptViewModel extends ViewModel{
    public $viewFields = array(
        'position'=>array('name'=>'role_name', 'parent_id',  'department_id', 'description','position_id'),
        'role_department'=>array('name'=>'department_name', '_on'=>'role_department.department_id=position.department_id', '_type'=>'LEFT')
    );
}