<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-05
 * Time: 16:47
 */

class ProductCViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project'=>array('*','_type'=>'LEFT'),
            'customer'=>array('name','_on'=>'customer.customer_id=fine_project.com_id')
        );
    }
}