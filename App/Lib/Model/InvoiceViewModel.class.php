<?php 
	class InvoiceViewModel extends ViewModel {
	   public $viewFields = array(
		'invoice'=>array('*','_type'=>'LEFT'),
		'contract'=>array('number'=>'contract_num', '_on'=>'contract.contract_id=invoice.contract_id','_type'=>'LEFT'),
		'customer'=>array('name'=>'customer_name','customer_id', '_on'=>'customer.customer_id=invoice.customer_id','_type'=>'LEFT'),
		'user'=>array('full_name'=>'user_name','_on'=>'user.role_id=invoice.create_role_id','_type'=>'LEFT'),
		'business'=>array('name'=>'business_name','business_id','_on'=>'business.business_id=invoice.project_id','_type'=>'LEFT'),
		'resume'=>array('name'=>'resume_name','eid','_on'=>'resume.eid=invoice.resume_id','_type'=>'LEFT'),
		'project_status'=>array('status_name'=>'project_stage','_on'=>'invoice.project_stage=project_status.status_id','_type'=>'LEFT'),
        'role'=>array('position_id','_on'=>'invoice.create_role_id=role.role_id','_type'=>'LEFT'),
        'position'=>array('department_id','_on'=>'position.position_id=role.position_id','_type'=>'LEFT'),
        'role_department'=>array('name'=>'department_name','_on'=>'role_department.department_id=position.department_id')
	   );
	} 