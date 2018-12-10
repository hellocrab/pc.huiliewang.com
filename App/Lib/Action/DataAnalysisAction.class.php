<?php
class DataAnalysisAction extends Action {

    /**
     *  用于判断权限
     *  @permission 无限制
     *  @allow 登录用户可访问
     *  @other 其他根据系统设置
     **/
    public function _initialize(){
        $title="报表管理";
        $this->assign("title",$title);
//        $action = array(
//            'permission'=>array(),
//            'allow'=>array('validate','check','checkinfo','getcustomeroriginal','close','getcurrentstatus','excelimportact','clistdialog','edit_ajax','settop','yc_share','share_list','ajax_share')
//        );
//        B('Authenticate', $action);
//        $this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);
    }


    /**
     *  业绩统计
     *
     **/
    public function achievement_beifen(){
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                if(empty($user_type)){
                    //过滤销售岗角色用户
                    $m_user = M('User');
                    foreach($below_ids as $k=>$v){
                        $user_type = '';
                        $user_type = $m_user->where('role_id = %d',$v)->getField('type');
                        if($user_type == 1){
                            $type_role_array[] = $v;
                        }
                    }
                    $role_id_array = $type_role_array;
                }else{
                    $role_id_array = $below_ids;
                }
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
        }else{
            $create_time = array('elt',$end_time);
        }
        $where['addtime'] = $create_time;
        //根据项目类型统计
        $this->msk = M("achievement")->where($where)->where(array("type"=>"1"))->count();//面试快
        $this->ctxm = M("achievement")->where($where)->where(array("type"=>"3"))->count();//专业猎头
        $this->rzk = M("achievement")->where($where)->where(array("type"=>"2"))->count();//入职快
        $this->qt = M("achievement")->where($where)->where(array("type"=>"5"))->count();//其他
//        $business = M("business")->where($where)->select();
        $typeCount = M("achievement")->where($where)->count();
        $this->mskbl = round($this->msk/$typeCount,4)*100;
        $this->ctxmbl = round($this->ctxm/$typeCount,4)*100;
        $this->rzkbl = round($this->rzk/$typeCount,4)*100;
        $this->qtbl = round($this->qt/$typeCount,4)*100;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    public function achievement(){
        $d_business = D('AchievementDView');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);

//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }


        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['addtime'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['addtime'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";


        $where_source['user_id'] = array("in",$role_id_array);
        $own_customer_count_total = $d_business->where($where_source)->sum('integral');

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'pro_type';
        $this->field = $field;
        $field_name = '';

        $field_count_list = array();
        if($field=="industry"){
            foreach ($industry_name as $k=>$v) {

                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['_string'] = "FIND_IN_SET('".$k."',industry)";
                $target_count = $d_business ->where($where_source)->sum('integral');
                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;

                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                }

            }
        }elseif($field=="pro_type"){
            $pro_type = array("3","1","2","5");
            foreach ($pro_type as $k=>$v) {

                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['pro_type'] = $v;
                $target_count = $d_business ->where($where_source)->sum('integral');
                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;

                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                }
            }
        }elseif($field=="location"){
            $field_total_count = 0;
            //自定义字段统计表格
            $location = $d_business->field("address")->where($where_source)->group("address")->limit(10)->select();

            foreach ($location as $k=>$list){
                $map['address'] = $list['address'];
                $list['count'] = $d_business->where($where_source)->where($map)->group("address")->sum('integral');
                $field_count_array[] = '['.'"'.$city_name[$list['address']].'",'.$list['count'].']';
                $field_total_count += $list['count'];
                $field_count_list[$k]['name'] = $city_name[$list['address']];
                $field_count_list[$k]['num'] = $list['count'];
                $field_count_list[$k]['rate'] = round($list['count']/$own_customer_count_total,4)*100;
            }
        }

        $this->field_count = implode(',', $field_count_array);
        $this->field_count_list = $field_count_list;
        $this->field = $field;
        $this->field_name = $field_name;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


        /*
        * 客户自定义
        */
    public function customer(){
        $d_business = M('customer');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";


        $where_source['creator_role_id'] = array("in",$role_id_array);
        $own_customer_count_total = $d_business->where($where_source)->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'industry';


        $field_name = '';
        $field_count_list = array();
        if($field=="industry"){
            foreach ($industry_name as $k=>$v) {
                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['_string'] = "FIND_IN_SET('".$k."',industry)";
                $target_count = $d_business ->where($where_source)->count();
                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;
                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                }
            }
        }else{
            $field_total_count = 0;
            //自定义字段统计表格
            $location = $d_business->field("address,count('address') as count")->where($where_source)->group("address")->limit(10)->select();
            foreach ($location as $k=>$list){
                $field_count_array[] = '['.'"'.$city_name[$list['address']].'",'.$list['count'].']';
                $field_total_count += $list['count'];
                $field_count_list[$k]['name'] = $city_name[$list['address']];
                $field_count_list[$k]['num'] = $list['count'];
                $field_count_list[$k]['rate'] = round($list['count']/$own_customer_count_total,4)*100;
            }
        }
        $this->field_count = implode(',', $field_count_array);
        $this->field_count_list = $field_count_list;
        $this->field = $field;
        $this->field_name = $field_name;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }



    public function project(){
        $d_business = M('business');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";


        $where_source['creator_role_id'] = array("in",$role_id_array);
        $own_customer_count_total = $d_business->where($where_source)->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'industry';


        $field_name = '';
        $field_count_list = array();
        if($field=="industry"){
            foreach ($industry_name as $k=>$v) {
                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['_string'] = "FIND_IN_SET('".$k."',industry)";
                $target_count = $d_business ->where($where_source)->count();
                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;
                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                }
            }
        }else{
            $field_total_count = 0;
            //自定义字段统计表格
            $location = $d_business->field("address,count('address') as count")->where($where_source)->group("address")->limit(10)->select();
            foreach ($location as $k=>$list){
                $field_count_array[] = '['.'"'.$city_name[$list['address']].'",'.$list['count'].']';
                $field_total_count += $list['count'];
                $field_count_list[$k]['name'] = $city_name[$list['address']];
                $field_count_list[$k]['num'] = $list['count'];
                $field_count_list[$k]['rate'] = round($list['count']/$own_customer_count_total,4)*100;
            }
        }
        $this->field_count = implode(',', $field_count_array);
        $this->field_count_list = $field_count_list;
        $this->field = $field;
        $this->field_name = $field_name;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    public function ispresent(){
        $d_business = D('ProductDView');

        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['addtime'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['addtime'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";

        $where_source['tracker'] = array("in",$role_id_array);
        $where_source['ispresent'] = 1;
        $own_customer_count_total = $d_business->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'industry';


        $field_name = '';
        $field_count_list = array();
        if($field=="industry"){
            foreach ($industry_name as $k=>$v) {
                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['industry'] = $k;
                $target_count = $d_business ->where($where_source)->count();

                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;
                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                }
            }
        }else{
            $field_total_count = 0;
            //自定义字段统计表格
            $location = $d_business->field("address,count('address') as count")->where($where_source)->group("business.address")->limit(10)->select();
            foreach ($location as $k=>$list){
                $field_count_array[] = '['.'"'.$city_name[$list['address']].'",'.$list['count'].']';
                $field_total_count += $list['count'];
                $field_count_list[$k]['name'] = $city_name[$list['address']];
                $field_count_list[$k]['num'] = $list['count'];
                $field_count_list[$k]['rate'] = round($list['count']/$own_customer_count_total,4)*100;
            }
        }
        $this->field_count = implode(',', $field_count_array);
        $this->field_count_list = $field_count_list;
        $this->field = $field;
        $this->field_name = $field_name;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }

    /**
     *  客户统计
     *
     **/
    public function customer_beifen(){
        $d_customer = M('Customer');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                if(empty($user_type)){
                    //过滤销售岗角色用户
                    $m_user = M('User');
                    foreach($below_ids as $k=>$v){
                        $user_type = '';
                        $user_type = $m_user->where('role_id = %d',$v)->getField('type');
                        if($user_type == 1){
                            $type_role_array[] = $v;
                        }
                    }
                    $role_id_array = $type_role_array;
                }else{
                    $role_id_array = $below_ids;
                }
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        //自定义字段统计（下拉、单选）
        $fields_list = M('Fields')->where(array('model'=>'customer','form_type'=>'box','setting'=>array(array('like',"%'type'=>'select'%"),array('like',"%'type'=>'radio'%"),'or')))->select();
//        var_dump($fields_list);exit();
        $fields_array = array();
        $fields_list_array = array();
        foreach ($fields_list as $k=>$v) {
            $fields_array[$k]['field'] = $v['field'];
            $fields_array[$k]['field_name'] = $v['name'];
            $fields_list_array[] = $v['field'];
        }
//        var_dump($fields_array);exit();
        $own_customer_count_total = $d_customer->where(array('is_deleted'=>0,'create_time'=>$create_time))->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'grade';
        $field_name = '';

        if (in_array($field, $fields_list_array)) {
            foreach ($fields_list as $k=>$v) {
                if ($v['field'] == $field) {
                    //自定义字段统计图
                    $field_count_array = array();
                    $setting_str_field = '$fieldList='.$v['setting'].';';
                    eval($setting_str_field);
                    $field_total_count = 0;
                    //自定义字段统计表格
                    $field_count_list = array();
                    foreach($fieldList[data] as $k1=>$v1){
                        unset($where_source[$v['field']]);
                        $where_source[$v['field']] = $v1;
                        $target_count = $d_customer ->where($where_source)->count();
                        $field_count_array[] = '['.'"'.$v1.'",'.$target_count.']';
                        $field_total_count += $target_count;

                        $field_count_list[$k1]['name'] = $v1;
                        $field_count_list[$k1]['num'] = $target_count;
                        $field_count_list[$k1]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                    }
                    $field_count_array[] = '["'.L('OTHER').'",'.($own_customer_count_total-$field_total_count).']';
                    $this->field_count = implode(',', $field_count_array);
                    $field_count_list[] = array('name'=>'其他','num'=>$own_customer_count_total-$field_total_count,'rate'=>round(($own_customer_count_total-$field_total_count)/$own_customer_count_total,3)*100);
                    $this->field_count_list = $field_count_list;
                    $field_name = $v['name'];
                    break;
                }
            }
        }

        $this->field = $field;
        $this->field_name = $field_name;
        $this->fields_array = $fields_array;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    /*
     * 项目统计
     */
    public function business(){


        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }




        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);



        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
        }else{
            $create_time = array('elt',$end_time);
        }
        $where['business.create_time'] = $create_time;
        $where['business.creator_role_id'] = array("in",implode(',', $role_id_array));
//        $business = M("business")->where($where)->select();
        $business = D("BusinessaView")->where($where)->select();
        $total_report = array();
        foreach ($business as $key=>$list){
            $business[$key]['department_name'] = D("RoleDView")->where("role.role_id=%d",$list['creator_role_id'])->getField("department_name");

//            $business[$key]['department'] = M("role_department")->where(array('role_id'=>'calllist'))->count();

            $business[$key]['calllistNum'] = M("fine_project")->where(array('status'=>1,'project_id'=>$list['business_id']))->count();
            $total_report['calllistNum'] +=$business[$key]['calllistNum'];
            $business[$key]['adviserNum'] = M("fine_project")->where(array('status'=>2,'project_id'=>$list['business_id']))->count();
            $total_report['adviserNum'] +=$business[$key]['adviserNum'];
            $business[$key]['tjNum'] = M("fine_project")->where(array('status'=>3,'project_id'=>$list['business_id']))->count();
            $total_report['tjNum'] +=$business[$key]['tjNum'];
            $business[$key]['interviewNum'] = M("fine_project")->where(array('status'=>4,'project_id'=>$list['business_id']))->count();
            $total_report['interviewNum'] +=$business[$key]['interviewNum'];

            $business[$key]['presentNum'] = M("fine_project")->where(array('ispresent'=>1,'project_id'=>$list['business_id']))->count();
            $total_report['presentNum'] +=$business[$key]['presentNum'];
            $business[$key]['passNum'] = M("fine_project")->where(array('status'=>5,'project_id'=>$list['business_id']))->count();
            $total_report['passNum'] +=$business[$key]['passNum'];

            $business[$key]['offerNum'] = M("fine_project")->where(array('status'=>6,'project_id'=>$list['business_id']))->count();
            $total_report['offerNum'] +=$business[$key]['offerNum'];
            $business[$key]['offerdNum'] = M("fine_project")->where(array('status'=>6,'stop'=>1,'project_id'=>$list['business_id']))->count();
            $total_report['offerdNum'] +=$business[$key]['offerdNum'];
            $business[$key]['enterNum'] = M("fine_project")->where(array('status'=>7,'project_id'=>$list['business_id']))->count();
            $total_report['enterNum'] +=$business[$key]['enterNum'];
            $business[$key]['safeNum'] = M("fine_project")->where(array('status'=>8,'project_id'=>$list['business_id']))->count();
            $total_report['safeNum'] +=$business[$key]['safeNum'];
        }
        $this->total_report = $total_report;
        $this->business = $business;
        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    /*
     * 项目图标自定义
     */
    public function project_beifen(){
        $d_business = M('business');
        //权限判断
//        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(session('?admin')){
            $below_ids = getSubRoleId(true, 1);
        }else{
            $below_ids = getSubRoleId();
        }
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                if(empty($user_type)){
                    //过滤销售岗角色用户
                    $m_user = M('User');
                    foreach($below_ids as $k=>$v){
                        $user_type = '';
                        $user_type = $m_user->where('role_id = %d',$v)->getField('type');
                        if($user_type == 1){
                            $type_role_array[] = $v;
                        }
                    }
                    $role_id_array = $type_role_array;
                }else{
                    $role_id_array = $below_ids;
                }
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        //自定义字段统计（下拉、单选）
        $fields_list = M('Fields')->where(array('model'=>'business','form_type'=>'box','setting'=>array(array('like',"%'type'=>'select'%"),array('like',"%'type'=>'radio'%"),'or')))->select();
//        var_dump($fields_list);exit();
        $fields_array = array();
        $fields_list_array = array();
        foreach ($fields_list as $k=>$v) {
            $fields_array[$k]['field'] = $v['field'];
            $fields_array[$k]['field_name'] = $v['name'];
            $fields_list_array[] = $v['field'];
        }
//        var_dump($fields_array);exit();
        $own_customer_count_total = $d_business->where(array('is_deleted'=>0,'create_time'=>$create_time))->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'grade';
        $field_name = '';

        if (in_array($field, $fields_list_array)) {
            foreach ($fields_list as $k=>$v) {
                if ($v['field'] == $field) {
                    //自定义字段统计图
                    $field_count_array = array();
                    $setting_str_field = '$fieldList='.$v['setting'].';';
                    eval($setting_str_field);
                    $field_total_count = 0;
                    //自定义字段统计表格
                    $field_count_list = array();
                    foreach($fieldList[data] as $k1=>$v1){
                        unset($where_source[$v['field']]);
                        $where_source[$v['field']] = $v1;
                        $target_count = $d_business ->where($where_source)->count();
                        $field_count_array[] = '['.'"'.$v1.'",'.$target_count.']';
                        $field_total_count += $target_count;

                        $field_count_list[$k1]['name'] = $v1;
                        $field_count_list[$k1]['num'] = $target_count;
                        $field_count_list[$k1]['rate'] = round($target_count/$own_customer_count_total,4)*100;
                    }
                    $field_count_array[] = '["'.L('OTHER').'",'.($own_customer_count_total-$field_total_count).']';
                    $this->field_count = implode(',', $field_count_array);
                    $field_count_list[] = array('name'=>'其他','num'=>$own_customer_count_total-$field_total_count,'rate'=>round(($own_customer_count_total-$field_total_count)/$own_customer_count_total,3)*100);
                    $this->field_count_list = $field_count_list;
                    $field_name = $v['name'];
                    break;
                }
            }
        }

        $this->field = $field;
        $this->field_name = $field_name;
        $this->fields_array = $fields_array;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    /*
     * 项目及业绩线性图自定义
     */
    public function projecttrend(){
        $d_business = M('business');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $role_id_array = $below_ids;
            }
        }

        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }


        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        if ($end_time - 86400*30 > $start_time) {
            $this_time = $end_time - 86400*30;
        } else {
            $this_time = $start_time;
        }

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'customer';
        $this->field = $field;
        /*
         * 业绩
         */
        while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {

            $day_count_array[] = "'".date('Y/m/d', $this_time)."'";
            $time1 = strtotime(date('Y-m-d', $this_time));
            $time2 = $time1 + 86400;

            if($field=="customer"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("customer")->where($where_day_create)->count();
                $this->trendtitle = "创建客户";
            }elseif ($field=="project"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("business")->where($where_day_create)->count();
                $this->trendtitle = "创建项目";
            }elseif ($field=="resume"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("resume")->where($where_day_create)->count();
                $this->trendtitle = "创建简历";
            }elseif ($field=="fine_project"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "推荐企业人数";
            }elseif ($field=="interview"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',4);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "面试人数";
            }elseif ($field=="interview_times"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',4);
                $where_day_create['tracker'] = array("in",$role_id_array);
//                echo $time1."---".$time2;exit();
                 $interview_times = M("fine_project")->where($where_day_create)->sum("interview_times");
                $day_create_count_array[]=$interview_times?$interview_times:0;
                $this->trendtitle = "面试次数";
            }elseif ($field=="offer"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',6);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "offer数";
            }elseif ($field=="offerd"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',6);
                $where_day_create['stop'] = 1;
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "offer掉数";
            }elseif ($field=="achievement"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['user_id'] = array("in",$role_id_array);
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $achievement = M("achievement")->where($where_day_create)->sum("integral");
                $day_create_count_array[] =$achievement?$achievement:0;
                $this->trendtitle = "业绩统计";
            }elseif ($field=="contract"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("contract")->where($where_day_create)->count();
                $this->trendtitle = "新增BD统计";
            }elseif ($field=="hkNum"){
                $where_day_create['type'] = "distribution";
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['create_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("invoice")->where($where_day_create)->count();
                $this->trendtitle = "回款个数统计";
            }elseif ($field=="ispresent"){
                $where_day_create['ispresent'] = 1;
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "到场数统计";
            }elseif ($field=="enter"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',7);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "入职数统计";
            }

            $this_time += 86400;
        }

        $this->day_count = implode(',', $day_count_array);
        $this->day_create_count = implode(',', $day_create_count_array);
        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }


    public function getAchievementOriginal	(){
        $dashboard = M('user')->where('user_id = %d', session('user_id'))->getField('dashboard');
        $widget = unserialize($dashboard);
        $id = intval($_GET['id']);
        foreach($widget['dashboard'] as $k=>$v){
            if($v['widget'] == 'Customerorigin' && $v['id'] == $id){
                if($v['level'] == '1'){
                    $where['owner_role_id'] = array('in',getSubRoleId());
                }else{
                    $where['owner_role_id'] = array('eq', session('role_id'));
                }
            }
        }

        $m_customer = M('customer');
        $original = $m_customer->Distinct(true)->field('origin')->getField('origin',true);
        $originalArr = array_filter($original);
        $customerArr = array();
        $where['is_deleted'] = array('eq',0);
        foreach($originalArr as $v){
            $where['origin'] = array('eq',$v);
            $origin_count = $m_customer ->where($where)->count();
            $customerArr['series'][] = array('value'=>intval($origin_count), 'name'=>$v);
            $customerArr['legend'][] = $v;
        }
        $this->ajaxReturn($customerArr,'success',1);
    }


    /*
     * 周趋势图自定义
     */

    public function weektrend(){
        $d_business = M('business');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME);
//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $role_id_array = $below_ids;
            }
        }

        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        if ($end_time - 86400*30 > $start_time) {
            $this_time = $end_time - 86400*30;
        } else {
            $this_time = $start_time;
        }

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'customer';
        $this->field = $field;

        /*时间序列图(按周)*/
        if ($end_time - 86400*365 > $start_time) {
            $this_time = $end_time - 86400*365 - 86400 * date('w');
        } else {
            $this_time = $start_time - 86400 * date('w');
        }
        while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {
            $week_count_array[] = "'".date('Y', $this_time).' s'.date('W',$this_time)."'";
            $time1 = strtotime(date('Y-m-d', $this_time));
            $time2 = $time1 + 86400*7;

            if($field=="customer"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("customer")->where($where_day_create)->count();
                $this->trendtitle = "创建客户";
            }elseif ($field=="project"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("business")->where($where_day_create)->count();
                $this->trendtitle = "创建项目";
            }elseif ($field=="resume"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("resume")->where($where_day_create)->count();
                $this->trendtitle = "创建简历";
            }elseif ($field=="fine_project"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "推荐企业人数";
            }elseif ($field=="interview"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',4);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "面试人数";
            }elseif ($field=="interview_times"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',4);
                $where_day_create['tracker'] = array("in",$role_id_array);
//                echo $time1."---".$time2;exit();
                $interview_times = M("fine_project")->where($where_day_create)->sum("interview_times");
                $day_create_count_array[]=$interview_times?$interview_times:0;
                $this->trendtitle = "面试次数";
            }elseif ($field=="offer"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',6);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "offer数";
            }elseif ($field=="offerd"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',6);
                $where_day_create['stop'] = 1;
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "offer掉数";
            }elseif ($field=="achievement"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['user_id'] = array("in",$role_id_array);
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $achievement = M("achievement")->where($where_day_create)->sum("integral");
                $day_create_count_array[] =$achievement?$achievement:0;
                $this->trendtitle = "业绩统计";
            }elseif ($field=="contract"){
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['creator_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("contract")->where($where_day_create)->count();
                $this->trendtitle = "新增BD统计";
            }elseif ($field=="hkNum"){
                $where_day_create['type'] = "distribution";
                $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['create_role_id'] = array("in",$role_id_array);
                $day_create_count_array[] = M("invoice")->where($where_day_create)->count();
                $this->trendtitle = "回款个数统计";
            }elseif ($field=="ispresent"){
                $where_day_create['ispresent'] = 1;
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "到场数统计";
            }elseif ($field=="enter"){
                $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
                $where_day_create['status'] = array('egt',7);
                $where_day_create['tracker'] = array("in",$role_id_array);
                $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
                $this->trendtitle = "入职数统计";
            }
            $this_time += 86400*7;
        }
        $this->week_count = implode(',', $week_count_array);
        $this->week_create_count = implode(',', $day_create_count_array);

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }

    /*
     * 月趋势图自定义
     */
    public function monthtrend(){
    $d_business = M('business');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME);
//        if(session('?admin')){
//            $below_ids = getSubRoleId(true, 1);
//        }else{
//            $below_ids = getSubRoleId();
//        }
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $role_id_array = $below_ids;
            }
        }

        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



    //时间段搜索
    if($_GET['between_date']){
        $between_date = explode(' - ',trim($_GET['between_date']));
        if($between_date[0]){
            $start_time = strtotime($between_date[0]);
        }
        $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
    }else{
        $start_time = strtotime(date('Y-m-01 00:00:00'));
        $end_time = strtotime(date('Y-m-d H:i:s'));
    }
    $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
    $this->start_date = date('Y-m-d',$start_time);
    $this->end_date = date('Y-m-d',$end_time);




    if($start_time){
        $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
        $where_source['create_time'] = $create_time;
    }else{
        $create_time = array('elt',$end_time);
        $where_source['create_time'] = array('elt',$end_time);
    }
    header("Content-type: text/html; charset=utf-8");
    if ($end_time - 86400*30 > $start_time) {
        $this_time = $end_time - 86400*30;
    } else {
        $this_time = $start_time;
    }

    $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'customer';
    $this->field = $field;


    if ($end_time - 86400*365 > $start_time) {
        $this_time = $end_time - 86400*365;
    } else {
        $this_time = $start_time;
    }
    while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {
        $month_count_array[] = "'".date('Y/m', $this_time)."'";
        $time1 = strtotime(date('Y-m', $this_time));
        $time2 = mktime(0,0,0,date('m', $this_time)+1,1,date('Y', $this_time));

        if($field=="customer"){
            $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['creator_role_id'] = array("in",$role_id_array);
            $day_create_count_array[] = M("customer")->where($where_day_create)->count();
            $this->trendtitle = "创建客户";
        }elseif ($field=="project"){
            $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['creator_role_id'] = array("in",$role_id_array);
            $day_create_count_array[] = M("business")->where($where_day_create)->count();
            $this->trendtitle = "创建项目";
        }elseif ($field=="resume"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['creator_role_id'] = array("in",$role_id_array);
            $day_create_count_array[] = M("resume")->where($where_day_create)->count();
            $this->trendtitle = "创建简历";
        }elseif ($field=="fine_project"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "推荐企业人数";
        }elseif ($field=="interview"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['status'] = array('egt',4);
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "面试人数";
        }elseif ($field=="interview_times"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['status'] = array('egt',4);
            $where_day_create['tracker'] = array("in",$role_id_array);
//                echo $time1."---".$time2;exit();
            $interview_times = M("fine_project")->where($where_day_create)->sum("interview_times");
            $day_create_count_array[]=$interview_times?$interview_times:0;
            $this->trendtitle = "面试次数";
        }elseif ($field=="offer"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['status'] = array('egt',6);
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "offer数";
        }elseif ($field=="offerd"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['status'] = array('egt',6);
            $where_day_create['stop'] = 1;
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "offer掉数";
        }elseif ($field=="achievement"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['user_id'] = array("in",$role_id_array);
            $where_day_create['creator_role_id'] = array("in",$role_id_array);
            $achievement = M("achievement")->where($where_day_create)->sum("integral");
            $day_create_count_array[] =$achievement?$achievement:0;
            $this->trendtitle = "业绩统计";
        }elseif ($field=="contract"){
            $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['creator_role_id'] = array("in",$role_id_array);
            $day_create_count_array[] = M("contract")->where($where_day_create)->count();
            $this->trendtitle = "新增BD统计";
        }elseif ($field=="hkNum"){
            $where_day_create['type'] = "distribution";
            $where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['create_role_id'] = array("in",$role_id_array);
            $day_create_count_array[] = M("invoice")->where($where_day_create)->count();
            $this->trendtitle = "回款个数统计";
        }elseif ($field=="ispresent"){
            $where_day_create['ispresent'] = 1;
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "到场数统计";
        }elseif ($field=="enter"){
            $where_day_create['addtime'] = array(array('lt',$time2),array('gt',$time1), 'and');
            $where_day_create['status'] = array('egt',7);
            $where_day_create['tracker'] = array("in",$role_id_array);
            $day_create_count_array[] = M("fine_project")->where($where_day_create)->count();
            $this->trendtitle = "入职数统计";
        }
        $this_time = mktime(date('H', $this_time),date('i', $this_time),date('s', $this_time),date('m', $this_time)+1,date('d', $this_time),date('Y', $this_time));
    }
    $this->month_count = implode(',', $month_count_array);
    $this->month_create_count = implode(',', $day_create_count_array);
        
    //用户权限验证
    $idArray = $below_ids;
    $roleList = array();
    foreach($idArray as $roleId){
        $roleList[$roleId] = getUserByRoleId($roleId);
    }
    $this->roleList = $roleList;


    //部门权限验证
    $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
    $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
    if($per_type == 2 || session('?admin')){
        $departmentList = M('roleDepartment')->select();
    }else{
        $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
    }
    $this->alert = parseAlert();
    $this->assign('departmentList', $departmentList);


    $daterange = $this->timeplug();
    $this->daterange = $daterange;

    $this->type_id = intval($_GET['type_id']);
    $this->display();
}

    /*
     * 简历自定义
     */
    public function resume(){
        $d_business = M('resume');
        //权限判断
        $below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,false);
        if(intval($_GET['role'])){
            $role_ids = array(intval($_GET['role']));
        }else{
            if(intval($_GET['department'])){
                $department_id = intval($_GET['department']);
                foreach(getRoleByDepartmentId($department_id, true) as $k=>$v){
                    $role_ids[] = $v['role_id'];
                }
            }else{
                $type_role_array = array();
                $role_id_array = $below_ids;
            }
        }
        if($role_ids){
            //数组交集
            $role_id_array = array_intersect($role_ids, $below_ids);
        }



        //时间段搜索
        if($_GET['between_date']){
            $between_date = explode(' - ',trim($_GET['between_date']));
            if($between_date[0]){
                $start_time = strtotime($between_date[0]);
            }
            $end_time = $between_date[1] ?  strtotime(date('Y-m-d 23:59:59',strtotime($between_date[1]))) : strtotime(date('Y-m-d 23:59:59',time()));
        }else{
            $start_time = strtotime(date('Y-m-01 00:00:00'));
            $end_time = strtotime(date('Y-m-d H:i:s'));
        }
        $this->between_date = $_GET['between_date'] ? trim($_GET['between_date']) : date('Y-m-01').' - '.date('Y-m-d');
        $this->start_date = date('Y-m-d',$start_time);
        $this->end_date = date('Y-m-d',$end_time);




        if($start_time){
            $create_time= array(array('elt',$end_time),array('egt',$start_time), 'and');
            $where_source['create_time'] = $create_time;
        }else{
            $create_time = array('elt',$end_time);
            $where_source['create_time'] = array('elt',$end_time);
        }
        header("Content-type: text/html; charset=utf-8");
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";


        $where_source['creator_role_id'] = array("in",$role_id_array);
        $own_customer_count_total = $d_business->where($where_source)->count();

        $field = $_REQUEST['field'] ? trim($_REQUEST['field']) : 'industry';


        $field_name = '';

        $field_count_list = array();
        if($field=="industry"){
            foreach ($industry_name as $k=>$v) {

                $field_total_count = 0;
                //自定义字段统计表格
                $where_source['_string'] = "FIND_IN_SET('".$k."',industry)";
                $target_count = $d_business ->where($where_source)->count();
//                    if($target_count){
//                        echo $k."---";
//                    }
                if($target_count){
                    $field_count_array[] = '['.'"'.$v.'",'.$target_count.']';
                    $field_total_count += $target_count;

                    $field_count_list[$k]['name'] = $v;
                    $field_count_list[$k]['num'] = $target_count;
                    $field_count_list[$k]['rate'] = round($target_count/$own_customer_count_total,4)*100;


                }

            }
        }else{
            $field_total_count = 0;
            //自定义字段统计表格

            $location = $d_business->field("location,count('location') as count")->where($where_source)->group("location")->select();
            foreach ($location as $k=>$list){
                $field_count_array[] = '['.'"'.$city_name[$list['location']].'",'.$list['count'].']';
                $field_total_count += $list['count'];
                $field_count_list[$k]['name'] = $city_name[$list['location']];
                $field_count_list[$k]['num'] = $list['count'];
                $field_count_list[$k]['rate'] = round($list['count']/$own_customer_count_total,4)*100;
            }
        }

        $this->field_count = implode(',', $field_count_array);
        $this->field_count_list = $field_count_list;
        $this->field = $field;
        $this->field_name = $field_name;
        $this->field_count_list = $field_count_list;

        //用户权限验证
        $idArray = $below_ids;
        $roleList = array();
        foreach($idArray as $roleId){
            $roleList[$roleId] = getUserByRoleId($roleId);
        }
        $this->roleList = $roleList;


        //部门权限验证
        $url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
        $per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
        if($per_type == 2 || session('?admin')){
            $departmentList = M('roleDepartment')->select();
        }else{
            $departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
        }
        $this->alert = parseAlert();
        $this->assign('departmentList', $departmentList);


        $daterange = $this->timeplug();
        $this->daterange = $daterange;

        $this->type_id = intval($_GET['type_id']);
        $this->display();
    }

    //权限验证
    public function perVerify(){

    }


    //时间插件处理
    public function timeplug(){
        //（计算开始、结束时间距今天的天数）
        $daterange = array();
        //上个月
        $daterange[0]['start_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-d', mktime(0,0,0,date('m')-1,1,date('Y')))))/86400;
        $daterange[0]['end_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-01 00:00:00')))/86400;
        //本月
        $daterange[1]['start_day'] = (strtotime(date('Y-m-d',time()))-strtotime(date('Y-m-01 00:00:00')))/86400;
        $daterange[1]['end_day'] = 0;
        //上季度
        $month = date('m');
        if($month==1 || $month==2 ||$month==3){
            $year = date('Y')-1;
            $daterange_start_time = strtotime(date($year.'-10-01 00:00:00'));
            $daterange_end_time = strtotime(date($year.'-12-31 23:59:59'));
        }elseif($month==4 || $month==5 ||$month==6){
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        }elseif($month==7 || $month==8 ||$month==9){
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        }else{
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }
        $daterange[2]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[2]['end_day'] = (strtotime(date('Y-m-d',time()))-$daterange_end_time-1)/86400;
        //本季度
        $month=date('m');
        if($month==1 || $month==2 ||$month==3){
            $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-03-31 23:59:59"));
        }elseif($month==4 || $month==5 ||$month==6){
            $daterange_start_time = strtotime(date('Y-04-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-06-30 23:59:59"));
        }elseif($month==7 || $month==8 ||$month==9){
            $daterange_start_time = strtotime(date('Y-07-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-09-30 23:59:59"));
        }else{
            $daterange_start_time = strtotime(date('Y-10-01 00:00:00'));
            $daterange_end_time = strtotime(date("Y-12-31 23:59:59"));
        }
        $daterange[3]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[3]['end_day'] = 0;
        //上一年
        $year = date('Y')-1;
        $daterange_start_time = strtotime(date($year.'-01-01 00:00:00'));
        $daterange_end_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[4]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[4]['end_day'] = (strtotime(date('Y-m-d',time()))-$daterange_end_time)/86400;
        //本年度
        $daterange_start_time = strtotime(date('Y-01-01 00:00:00'));
        $daterange[5]['start_day'] = (strtotime(date('Y-m-d',time()))-$daterange_start_time)/86400;
        $daterange[5]['end_day'] = 0;
        return $daterange;
    }
}

