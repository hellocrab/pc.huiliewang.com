<?php
	class BusinessaViewModel extends ViewModel {
        public $viewFields;
		public function _initialize(){
			$this->viewFields = array(
				'business'=>array('name','customer_id','business_id','creator_role_id','pro_type','_type'=>'LEFT'),
				'user'=>array('full_name'=>'user_name','_on'=>'business.creator_role_id=user.role_id','_type'=>'LEFT'),
				'customer'=>array('name'=>'customer_name','_on'=>'business.customer_id=customer.customer_id')

			);
		}
	}