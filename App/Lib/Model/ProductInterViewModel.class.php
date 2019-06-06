<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-05
 * Time: 18:13
 */

class ProductInterViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_interview'=>array('*','_type'=>'LEFT'),
            'fine_project'=>array('id','com_id','_on'=>'fine_project_interview.fine_id = fine_project.id'),
        );
    }
}