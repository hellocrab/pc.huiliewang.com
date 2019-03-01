<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-28
 * Time: 18:01
 */

class FineProjectCcViewModel extends ViewModel{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project'=>array('*','_type'=>'LEFT'),
            'project_cc'=>array("*","_on"=>"fine_project.id=project_cc.fine_id",'_type'=>'LEFT'),
        );
    }
}