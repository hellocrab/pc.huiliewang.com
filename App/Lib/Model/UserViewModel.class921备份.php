<?php 
	class UserViewModel extends ViewModel{
		public $viewFields = array(
			'user'=>array('user_id','name','position_info','full_name','second_name','hometown','sex','img','email','telephone','address','status', '_type'=>'LEFT'),
			'user_category'=>array('name'=>'category_name','category_id', '_on'=>'user.category_id=user_category.category_id', '_type'=>'LEFT'),
			'job_rank'=>array('name'=>'rank_name', '_on'=>'job_rank.id=user.job_rank', '_type'=>'LEFT'),
			'role'=>array('role_id', 'position_id', '_on'=>'user.user_id=role.user_id', '_type'=>'LEFT'),
			'position'=>array('name'=>'role_name', 'parent_id',  'department_id', 'description', '_on'=>'position.position_id=role.position_id', '_type'=>'LEFT'),
			'role_department'=>array('name'=>'department_name','department_label', '_on'=>'role_department.department_id=position.department_id')
			);
	}