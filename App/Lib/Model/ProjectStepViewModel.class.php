<?php 
	class ProjectStepViewModel extends ViewModel{
		public $viewFields;

		public static $table;
		public function __construct($tableName='',$name = '', $tablePrefix = '', $connection = '')
        {
            self::$table =$tableName;
            parent::__construct($name, $tablePrefix, $connection);
        }
		public function _initialize(){
            $tableName = self::$table;
			$this->viewFields = array(
                'fine_project'=>array('*','_type'=>'LEFT'),
                'project_status'=>array("status_name","status","_on"=>"fine_project.status=project_status.status_id",'_type'=>'LEFT'),
                $tableName=>array("*","_on"=>"fine_project.id={$tableName}.fine_id",'_type'=>'LEFT'),
                'user'=>array('user_id','full_name'=>'tracker_name','thumb_path','_on'=>'user.role_id=fine_project.tracker','_type'=>'LEFT'),
                'business'=>array('business_id','industry','name'=>'business_name','_on'=>'business.business_id=fine_project.project_id','_type'=>'LEFT'),
                'customer'=>array('customer_id','name'=>'customer_name','_on'=>'customer.customer_id=fine_project.com_id','_type'=>'LEFT'),
                'resume'=>array('eid','name','edu','YEAR(CURDATE())-birthYear' => 'age','curDepartment' => 'current_department','curCompany'=>'current_company','curPosition'=>'current_job','sex','curSalary','wantsalary'=>'hope_salary','telephone','_on'=>'resume.eid=fine_project.resume_id','_type'=>'LEFT'),
                'role'=>array('position_id','_on'=>'fine_project.tracker=role.role_id','_type'=>'LEFT'),
                'position'=>array('department_id','_on'=>'position.position_id=role.position_id','_type'=>'LEFT'),
                'role_department'=>array('name'=>'department_name','_on'=>'role_department.department_id=position.department_id')
			);
		}
	}