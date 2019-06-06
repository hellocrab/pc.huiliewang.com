<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-05
 * Time: 17:11
 */

class ProductAdViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_adviser'=>array('*','_type'=>'LEFT'),
            'fine_project'=>array('id','com_id','_on'=>'fine_project_adviser.fine_id = fine_project.id'),
        );
    }
}