<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2019-02-22 _guo_
 * Time: 17:27
 */

class ReportViewModel extends ViewModel
{
    public $viewFields = array(
        'role'=>array('*', '_type'=>'LEFT'),
        'position'=>array('name'=>'position','_on'=>'role.position_id = position.position_id','_type'=>''),
    );
}