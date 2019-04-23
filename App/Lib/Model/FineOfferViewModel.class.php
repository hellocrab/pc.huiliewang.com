<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-04-23
 * Time: 11:13
 */

class FineOfferViewModel extends ViewModel{
    public $viewFields = array(
        'fine_project_offer'=>array('*','_type'=>'LEFT'),
        'fine_project'=>array('tracker','updatetime','resume_id','project_id','com_id','_on'=>'fine_project_offer.fine_id=fine_project.id','_type'=>'LEFT'),
        'resume'=>array('creator_role_id','name'=>'resume_name','_on'=>'resume.eid=fine_project.resume_id')
    );
}