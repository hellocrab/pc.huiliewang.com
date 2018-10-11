<?php 
	class ProductDViewModel extends ViewModel{
		public $viewFields;
		public function _initialize(){
			$this->viewFields = array(
                'fine_project'=>array('*','_type'=>'LEFT'),
                'business'=>array('business_id','industry','address','name'=>'business_name','_on'=>'business.business_id=fine_project.project_id')
			);
		}
	}