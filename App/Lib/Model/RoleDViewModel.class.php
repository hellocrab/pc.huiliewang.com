<?php 
class RoleDViewModel extends ViewModel{
	public $viewFields = array(
		'role'=>array('user_id', 'role_id', 'position_id', '_type'=>'LEFT'),
		'position'=>array('department_id','name'=>'position_name','_on'=>'position.position_id=role.position_id', '_type'=>'LEFT'),
		'role_department'=>array('name'=>'department_name', '_on'=>'role_department.department_id=position.department_id')
	);
}