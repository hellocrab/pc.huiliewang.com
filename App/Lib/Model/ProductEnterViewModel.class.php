<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-06
 * Time: 09:59
 */

class ProductEnterViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_enter'=>array('*','_type'=>'LEFT'),
            'fine_project'=>array('id','com_id','_on'=>'fine_project_enter.fine_id = fine_project.id'),
        );
    }
}