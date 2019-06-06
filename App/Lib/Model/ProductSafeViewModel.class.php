<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-06
 * Time: 10:38
 */

class ProductSafeViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_safe'=>array('*','_type'=>'LEFT'),
            'fine_project'=>array('id','com_id','_on'=>'fine_project_safe.fine_id = fine_project.id'),
        );
    }
}