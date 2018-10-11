<?php
	class ProjectCcViewModel extends ViewModel {
        public $viewFields;
		public function _initialize(){

			$this->viewFields = array(
				'fine_project'=>array("*","_type"=>"LEFT"),
				'project_status'=>array("status_name","_on"=>"fine_project.status=project_status.status_id",'_type'=>'LEFT'),
				'customer'=>array("name"=>"customer_name","_on"=>"fine_project.com_id=customer.customer_id",'_type'=>'LEFT'),
				'business'=>array("name"=>"business_name","_on"=>"fine_project.project_id=business.business_id",'_type'=>'LEFT'),
				'resume'=>array("name"=>"resume_name","_on"=>"fine_project.resume_id=resume.eid")
			);
		}
	}