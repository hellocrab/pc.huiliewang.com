<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-01
 * Time: 15:52
 */

class FineProjectCcResumeModel extends ViewModel{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_cc'=>array('id','fine_id','gjtime','_type'=>'LEFT'),
            'fine_project'=>array('resume_id','project_id','_on'=>'fine_project_cc.fine_id = fine_project.id','_type'=>'LEFT'),
            'resume'=>array('name','_on'=>'resume.eid=fine_project.resume_id'),
        );
    }
}