<?php
class AchievementDViewModel extends ViewModel{
    public $viewFields = array(
        'achievement'=>array('*','_type'=>'LEFT'),
        'business'=>array('address','industry','pro_type','_on'=>'achievement.project_id=business.business_id')
    );
}