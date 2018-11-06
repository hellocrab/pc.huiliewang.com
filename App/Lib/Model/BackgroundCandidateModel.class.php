<?php
/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018-11-06
 * Time: 10:42
 */

    class BackgroundCandidateModel extends ViewModel{
        public $viewFields = array(
            'external_background'=>array('id','name','jobs','tocompany','industry','consultant','idnumber','_type'=>'LEFT'),
            'external_background_edu'=>array('cid','school','edu_type','major','enter_time','out_time','edu_num','msgbelong','_on'=>'external_background.id=external_background_edu.cid','_type'=>'LEFT'),
            'external_background_qc'=>array('cid','get_time','out_time'=>'qc_out_time','qc_type','qc_source','qc_num','_on'=>'external_background_edu.cid=external_background_qc.cid','_type'=>'LEFT'),
            'external_background_work'=>array('cid','company','enter_time'=>'wk_enter','out_time'=>'wk_out','position','_on'=>'external_background_qc.cid=external_background_work.cid','_type'=>'LEFT'),
            'external_background_witness'=>array()
        );
    }