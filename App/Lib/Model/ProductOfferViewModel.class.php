<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-06-05
 * Time: 19:33
 */

class ProductOfferViewModel extends ViewModel
{
    public $viewFields;
    public function _initialize(){
        $this->viewFields = array(
            'fine_project_offer'=>array('*','_type'=>'LEFT'),
            'fine_project'=>array('id','com_id','_on'=>'fine_project_offer.fine_id = fine_project.id'),
        );
    }
}