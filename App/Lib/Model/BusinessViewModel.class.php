<?php
	class BusinessViewModel extends ViewModel {
        public $viewFields;
		public function _initialize(){
			$main_must_field = array('*');
            
			$main_list = array_unique(array_merge(M('Fields')->where(array('model'=>'business','is_main'=>1))->getField('field', true),$main_must_field));
			$main_list['_type'] = 'LEFT';
			$data_list = M('Fields')->where(array('model'=>'business','is_main'=>0))->getField('field', true);
			$data_list['_on'] = 'business.business_id = business_data.business_id';
            $data_list['_type'] = 'LEFT';
			
			$this->viewFields = array(
				'business'=>$main_list,
				'business_data'=>$data_list,
				'contacts'=>array('name'=>'contacts_name', '_on'=>'contacts.contacts_id=business.contacts_id','_type'=>'LEFT'),
				'customer'=>array('name'=>'customer_name', '_on'=>'customer.customer_id=business.customer_id','_type'=>'LEFT'),
				'user'=>array('full_name'=>'user_name', '_on'=>'user.role_id=business.creator_role_id','_type'=>'LEFT'),
                'role'=>array('position_id','_on'=>'business.creator_role_id=role.role_id','_type'=>'LEFT'),
                'position'=>array('department_id','_on'=>'position.position_id=role.position_id','_type'=>'LEFT'),
                'role_department'=>array('name'=>'department_name','_on'=>'role_department.department_id=position.department_id')
			);
		}
	}