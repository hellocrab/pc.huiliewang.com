<?PHP
/**
 *发票模块
 *
 **/
class IntegralAction extends Action{

//    public $historyArr = array(0=>"apply",1=>"examine",2=>"billing",3=>array("moeny","return"),4=>array("distribution","refund"),5=>"grant");
//    public $historyArr = array("apply"=>array("examine"=>array("billing"=>array("moeny"=>array("distribution"=>array("grant"=>1)),"return"=>1))),2=>,3=>array("moeny","return"),4=>array("distribution","refund"),5=>"grant");

    public $historyArr = array("apply"=>1,"examine"=>"apply","billing"=>"examine","money"=>"billing","return"=>"billing","distribution"=>"money","refund"=>"money","grant"=>"distribution");



    /**
     *用于判断权限
     *@permission 无限制
     *@allow 登录用户可访问
     *@other 其他根据系统设置
     **/
    public function _initialize(){
        $title="积分管理";
        $this->assign("title",$title);
//        $action = array(
//            'permission'=>array('view_ajax'),
//            'allow'=>array('adddata','viewdata','editdata','customer_invoice','check_list','getcontractinvoice',"examine","refuse","refund","count","bill","editer","distribution","distribution_int","sendout","goback","revoke","excelExport")
//        );
//        B('Authenticate', $action);
//        $this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);

    }

    public function index(){
        header("Content-type: text/html; charset=utf-8");

//        $id = M("job_rank")->where("name='%s'","A2")->getField("id");
//        var_dump($id);exit();
        $user = D("UserView");

        if($_GET['listrows']){
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        }else{
            $listrows = 15;
            $params[] = "listrows=15";
        }
        $this->listrows = $listrows;
        import('@.ORG.Page');// 导入分页类

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


        $where_source['user.role_id'] = array("in",$role_id_array);

        if(is_numeric($_GET['position_info'])){

            $where_source['user.position_info'] = $_GET['position_info'];
        }

        $count = $user->where($where_source)->count() ? $user->where($where_source)->count() : '0';

        $p_num = ceil($count/$listrows);
        $p = isset($_GET['p'])?$_GET['p']:1;
        if($p_num<$p){
            $p = $p_num;
        }
        $list = $user->where($where_source)->Page($p.','.$listrows)->select();

//        var_dump($list);exit();
        $Page = new Page($count,$listrows);// 实例化分页类 传入总记录数和每页显示的记录数
        $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
        $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
        $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
        $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
        $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
        $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
        $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
        $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
        $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
        $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
        $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
        $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));

        krsort($yjtime);

        $num = date("m")-1;
        $month_arr = "";
        foreach ($yjtime as $key=>$li){
            $month_num[] = date("Y-m",$li);
            $month_yj[] = "yj".$key;
        }
//        for ($i=1;$i<=$num;$i++){
//            $month_num[] = $i."月份业绩";
//            $month_yj[] = "yj".$i;
//        }
        foreach ($list as $key=>$li){

           foreach ($yjtime as $k=>$i){

                $data['yjtime'] = $i;
                $data['user_id'] = $li['user_id'];

                $field = "yj".$k;
                $achievement= M("integral")->where($data)->getField("achievement");
                $list[$key][$field] = $achievement?$achievement:0;
            }

//            $list[$key]['sj'] = $this->positionRF($li['rank_name'],$li['user_id']);
        }

        $show = $Page->show();// 分页显示输出

        //客户导出
        if(trim($_GET['act']) == 'excel'){
            $dc_id = $_GET['daochu'];
            if($dc_id !=''){
                $where['eid'] = array('in',$dc_id);
            }
            $list = M('resume')->where($where)->order('addtime desc')->Page($p.','.$listrows)->select();
            if(checkPerByAction('resume','excelexport')){
                session('export_status', 1);
                foreach ($list as $k=>$li){
                    if($list[$k]['industry']){
                        $industry = explode(",",$list[$k]['industry']);
                        $data = "";
                        foreach ($industry as $l){
                            $data[] = $industry_name[$l];
                        }
                        $list[$k]['industry'] = implode(",",$data);
                    }

                    if($list[$k]['job_class']){
                        $job_class = explode(",",$list[$k]['job_class']);
                        $data = "";
                        foreach ($job_class as $l){
                            $data[] = $job_name[$l];
                        }
                        $list[$k]['job_class'] = implode(",",$data);
                    }
                    if($list[$k]['intentCity']){
                        $intentCity = explode(",",$list[$k]['intentCity']);
                        $data = "";
                        foreach ($intentCity as $l){
                            $data[] = $city_name[$l];
                        }
                        $list[$k]['intentCity'] = implode(",",$data);
                    }
                    if($list[$k]['location']){
                        $list[$k]['location'] = $city_name[$list[$k]['location']];
                    }
                    if($list[$k]['sex']){
                        $list[$k]['sex'] = $list[$k]['sex']=1?"男":"女";
                    }
                }
                $this->excelExport($list);
            }else{
                alert('error',  L('HAVE NOT PRIVILEGES'),$_SERVER['HTTP_REFERER']);
            }
        }


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


        $this->assign('list',$list);// 赋值数据集
        $this->assign('page',$show);// 赋值分页输出
        $this->assign('count',$count);
        $this->assign('month_num',$month_num);
        $this->assign('month_yj',$month_yj);
        $this->alert=parseAlert();
        $this->display();
    }

    //导出
    public function excelExport($productList=false){
        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";
        C('OUTPUT_ENCODE', false);
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("mxcrm");
        $objProps->setLastModifiedBy("mxcrm");
        $objProps->setTitle("mxcrm Product");
        $objProps->setSubject("mxcrm Product Data");
        $objProps->setDescription("mxcrm Product Data");
        $objProps->setKeywords("mxcrm Product");
        $objProps->setCategory("mxcrm");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $ascii = 65;
        $cv = '';
        $field_list = M('Fields')->where('model = \'resume\'')->order('order_id')->select();
        foreach($field_list as $field){
            if($field['form_type'] == 'address'){
                for($a=0;$a<=4;$a++){
                    $address = array('所在省','所在市','所在县/区','街道信息');
                    $objActSheet->setCellValue($cv.chr($ascii).'1', $address[$a]);
                    $ascii++;
                    if($ascii == 91){
                        $ascii = 66;
                        $cv .= chr(strlen($cv)+65);
                    }
                }
                $ascii--;
            }else{
                $objActSheet->setCellValue($cv.chr($ascii).'1', $field['name']);
                $ascii++;
                if($ascii == 91){
                    $ascii = 65;
                    $cv = chr(strlen($cv)+65);
                }
            }
        }
        if(is_array($productList)){
            $list = $productList;
        }else{
            $list = D('ProductView')->select();
        }
        $i = 1;
        foreach ($list as $k => $v) {
            $data = m('ProductData')->where("product_id = $v[product_id]")->find();
            if(!empty($data)){
                $v = $v+$data;
            }
            $i++;
            $ascii = 65;
            $cv = '';
            foreach($field_list as $field){
                if($field['form_type'] == 'datetime'){
                    if($v[$field['field']] == 0 || strlen($v[$field['field']]) != 10){
                        $objActSheet->setCellValue($cv.chr($ascii).$i, '');
                    }else{
                        $objActSheet->setCellValue($cv.chr($ascii).$i, date('Y-m-d H:i',$v[$field['field']]));
                    }
                }elseif($field['form_type'] == 'number' || $field['form_type'] == 'floatnumber' || $field['form_type'] == 'phone' || $field['form_type'] == 'mobile' || ($field['form_type'] == 'text' && is_numeric($v[$field['field']]))){
                    //防止使用科学计数法，在数据前加空格
                    $objActSheet->setCellValue($cv.chr($ascii).$i, ' '.$v[$field['field']]);
                }elseif($field['field'] == 'category_id'){
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d',$v['category_id'])->find();
                    $objActSheet->setCellValue($cv.chr($ascii).$i, $category['name']);
                }elseif($field['field'] == 'category_id'){
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d',$v['category_id'])->find();
                    $objActSheet->setCellValue($cv.chr($ascii).$i, $category['name']);
                }elseif($field['field'] == 'category_id'){
                    $m_category = M('ProductCategory');
                    $category = $m_category->where('category_id = %d',$v['category_id'])->find();
                    $objActSheet->setCellValue($cv.chr($ascii).$i, $category['name']);
                }elseif($field['form_type'] == 'address'){
                    $temp = str_replace('=', '', $v[$field['field']]);
                    $address = $temp;
                    $arr_address = explode(chr(10),$address);
                    for($j=0;$j<4;$j++){
                        $objActSheet->setCellValue($cv.chr($ascii).$i, $arr_address[$j]);
                        $ascii++;
                        if($ascii == 91){
                            $ascii = 65;
                            $cv .= chr(strlen($cv)+65);
                        }
                    }
                    $ascii--;
                }else{
                    $objActSheet->setCellValue($cv.chr($ascii).$i, $v[$field['field']]);
                }
                $ascii++;
                if($ascii == 91){
                    $ascii = 65;
                    $cv = chr(strlen($cv)+65);
                }
            }

        }
        $current_page = intval($_GET['current_page']);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        //ob_end_clean();
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=mxcrm_product_".date('Y-m-d',mktime())."_".$current_page.".xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
        session('export_status', 0);
    }


    /*
     * 职位升降判断
     * job_rank当前职能等级   month_yj当年每月业绩集合
     */
    function positionRF($user_id){
        $user = D("UserView");
        $data = $user->where("user.user_id=%d",$user_id)->find();
        $direction = $data['department_label'];
        $job_rank = $data['rank_name'];
        $result = 0;
        if($direction==1){
            if($job_rank=="A2"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<5000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 3*8000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="A3"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<6000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 6*9000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="A4"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<7000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 6*10000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C1"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<8000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 9*12000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C2"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<9000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 9*14000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C3"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<10000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*16000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C4"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<11000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*18000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C5"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<12000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*20000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="C6"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<13000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*22000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="D1"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<14000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*24000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="D2"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<15000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*26000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="D3"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<16000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*28000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="D4"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<17000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*30000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }elseif ($job_rank=="D5"){
                $where['yjtime'] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->getField("achievement");
                if($current_count<18000*0.5){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
                $count = 12*32000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $yjtime[7] = mktime(0,0,0,date('m')-7,1,date('Y'));
                $yjtime[8] = mktime(0,0,0,date('m')-8,1,date('Y'));
                $yjtime[9] = mktime(0,0,0,date('m')-9,1,date('Y'));
                $yjtime[10] = mktime(0,0,0,date('m')-10,1,date('Y'));
                $yjtime[11] = mktime(0,0,0,date('m')-11,1,date('Y'));
                $yjtime[12] = mktime(0,0,0,date('m')-12,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }
            }
        }elseif ($direction==24){
            if($job_rank=="A2"){
                $count = 6*60000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="A3"){
                $count = 6*75000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="A4"){
                $count = 6*90000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C1"){
                $count = 6*120000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C2"){
                $count = 6*150000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C3"){
                $count = 6*180000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C4"){
                $count = 6*210000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C5"){
                $count = 6*240000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }elseif ($job_rank=="C6"){
                $count = 6*270000;
                $yjtime[1] = mktime(0,0,0,date('m')-1,1,date('Y'));
                $yjtime[2] = mktime(0,0,0,date('m')-2,1,date('Y'));
                $yjtime[3] = mktime(0,0,0,date('m')-3,1,date('Y'));
                $yjtime[4] = mktime(0,0,0,date('m')-4,1,date('Y'));
                $yjtime[5] = mktime(0,0,0,date('m')-5,1,date('Y'));
                $yjtime[6] = mktime(0,0,0,date('m')-6,1,date('Y'));
                $where['yjtime']=array('in',implode(",",$yjtime));
                $where['user_id']=$user_id;
                $current_count= M("integral")->where($where)->sum("achievement");
                $current_count = $current_count?$current_count:0;
                if($current_count>$count){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>1));
                    $result = 1;
                }elseif ($current_count<=30000){
                    M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>-1));
                    $result = -1;
                }
            }
        }


        return $result;
    }


    public function position_edit(){
        $position = array(27=>"A2",30=>"A3",31=>"A4",32=>"C1",33=>"C2",34=>"C3",35=>"C4",36=>"C5",37=>"C6",38=>"D1",39=>"D2",40=>"D3",41=>"D4",42=>"D5",43=>"D6",44=>"D7",45=>"D8",46=>"D9",47=>"D10",48=>"P1",49=>"P2",50=>"P3");
        if($this->isPost()){
            $user_id = $_POST['user_id'];
            $position_info = $_POST['position_info'];
            if($position_info==1){
                $result = M("user")->where("user_id=%d",$user_id)->setInc('job_rank');
                M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>0));
                if($result){
                    $this->ajaxReturn("成功",'success',1);
                }
            }elseif ($position_info==-1){
                $result = M("user")->where("user_id=%d",$user_id)->setDec('job_rank');
                M("user")->where("user_id=%d",$user_id)->save(array("position_info"=>0));
                if($result){
                    $this->ajaxReturn("成功",'success',1);
                }
            }
//            var_dump($_POST);exit();
        }

    }


    /**
     *  客户导入
     *
     **/
    public function excelImport(){
        if($this->isPost()){
            if (isset($_FILES['excel']['size']) && $_FILES['excel']['size'] != null) {
                import('@.ORG.UploadFile');
                $upload = new UploadFile();
                $upload->maxSize = 20000000;
                $upload->allowExts  = array('xls','xlsx');
                $dirname = UPLOAD_PATH . date('Ym', time()).'/'.date('d', time()).'/';
                if (!is_dir($dirname) && !mkdir($dirname, 0777, true)) {
                    alert('error', L('ATTACHMENTS_TO_UPLOAD_DIRECTORY_CANNOT_WRITE'), $_SERVER['HTTP_REFERER']);
                }
                $upload->savePath = $dirname;
                if(!$upload->upload()) {
                    alert('error', $upload->getErrorMsg(), $_SERVER['HTTP_REFERER']);
                }else{
                    $info =  $upload->getUploadFileInfo();
                }
            }
            if(is_array($info[0]) && !empty($info[0])){
                $savepath = $dirname . $info[0]['savename'];
                if($savepath){
                    $this->ajaxReturn($savepath,'success',1);
                }else{
                    $this->ajaxReturn(0,'error',0);
                }
            }else{
                alert('error', L('UPLOAD_FAILED'), $_SERVER['HTTP_REFERER']);
            }
        }else{
            $this->display();
        }
    }


    public function excelImportact(){
        $m_product = D('product');
        $m_product_data = D('ProductData');
        $savePath = $_GET['path'];
        import("ORG.PHPExcel.PHPExcel");
        $PHPExcel = new PHPExcel();
        $PHPReader = new PHPExcel_Reader_Excel2007();
        if(!$PHPReader->canRead($savePath)){
            $PHPReader = new PHPExcel_Reader_Excel5();
        }
        $PHPExcel = $PHPReader->load($savePath);
        $currentSheet = $PHPExcel->getSheet(0);
        $allRow = $currentSheet->getHighestRow();

        $field_list = array("name","department","achievement","level");

        $currentRow = intval($_GET['num']);
        if($currentRow+99 <=$allRow){
            $rows_excal = $currentRow+100;
        }else{
            $rows_excal = $allRow;
        }
        $achievement = trim((String)$currentSheet->getCell(chr(67)."2")->getValue());
        $yjtime = strtotime(date("Y")."-".$this->findNum($achievement)."-1");

//        echo date("Y-m-d",strtotime("2018-6-1")-1);exit();
        for($currentRow;$currentRow <= $rows_excal;$currentRow++){

            $data = array();
            $data['creator_role_id'] = session('role_id');
            $data['create_time'] = time();
            $data['update_time'] = time();
            $ascii = 65;
            $cv = '';
            $info = "";
            foreach($field_list as $k=>$field){
                $info[$field] = trim((String)$currentSheet->getCell($cv.chr($ascii).$currentRow)->getValue());
                $ascii++;
                if($ascii == 91){
                    $ascii = 65;
                    $cv = chr(strlen($cv)+65);
                }
            }


            $user_id = $this->addUser($info['name'],$info['department'],$info['level']);
            $this->positionRF($user_id);
            $data = "";
            $data['user_id'] =$user_id;
            $data['yjtime'] = $yjtime;
            $result = M("integral")->where($data)->getField("id");
            $data['achievement'] =$info['achievement'];
            if(empty($result)){
                M("integral")->add($data);
            }

//            var_dump($data);exit();
//            var_dump($data);exit();
            $temp['error_message'] = "";
            $temp['no'] = $currentRow;
            $message[] = $temp;
        }


        $return['allrow'] = $allRow;
        $return['message'] = $message;
        if($return){
            $this->ajaxReturn($return,'success',1);
        }else{
            $this->ajaxReturn('','error',0);
        }
    }

    public function addUser($name,$department,$level){
        //姓名查重
        $user_id = M("user")->where("full_name='%s'",$name)->getField("user_id");
        if($user_id){
            return $user_id;
        }else{
            $data['name'] = $name;
            $data['full_name'] = $name;
            $salt = substr(md5(time()),0,4);
            $data['password'] = md5(md5("nfxh2018").$salt);
            $data['salt'] = $salt;
            $data['job_rank'] = M("job_rank")->where("name='%s'",$level)->getField("id");
            $data['category_id'] = 2;
            $data['status'] = 3;
            $data['type'] = 1;
            $data['prefixion'] = "K";
            $user_id = M("user")->add($data);

            $data = "";
            $role = D("DeptView");
            $arr['role_department.name'] = $department;
            $arr['position.name'] = "猎头顾问";
            $data['position_id'] = $role->where($arr)->getField("position_id");
            $data['user_id'] =$user_id;
            $role_id = M("role")->add($data);

            $data = "";
            $data['role_id'] = $role_id;
            $data['number'] = "K_00".$user_id;
            $result = M("user")->where("user_id=%d",$user_id)->save($data);
            return $user_id;
        }

    }

    function test(){
        $this->addUser("砖石王老五","交付一部","A2");
    }

    function findNum($str=''){
        $str=trim($str);
        if(empty($str)){return '';}
        $result='';
        for($i=0;$i<strlen($str);$i++){
            if(is_numeric($str[$i])){
                $result.=$str[$i];
            }
        }
        return $result;
    }
    public function excelImportDownload(){
        C('OUTPUT_ENCODE', false);
        import("ORG.PHPExcel.PHPExcel");
        $objPHPExcel = new PHPExcel();
        $objProps = $objPHPExcel->getProperties();
        $objProps->setCreator("慧猎");
        $objProps->setLastModifiedBy("慧猎");
        $objProps->setTitle("慧猎积分模板");
        $objProps->setSubject("慧猎积分数据");
        $objProps->setDescription("慧猎积分数据");
        $objProps->setKeywords("慧猎积分数据");
        $objProps->setCategory("慧猎");
        $objPHPExcel->setActiveSheetIndex(0);
        $objActSheet = $objPHPExcel->getActiveSheet();

        $objActSheet->setTitle('Sheet1');
        $ascii = 65;
        $cv = '';
        $field_list = array("姓名","部门","n月业绩(n为具体月份)","原职级","岗位");
        foreach($field_list as $field){
            $objActSheet->setCellValue($cv.chr($ascii).'2', $field);
            $ascii++;
            $temp = $cv;
            if($ascii == 91){
                $ascii = 65;
                if($cv){
                    $cv = chr(ord($cv)+1);
                }else{
                    $cv = 'A';
                }
            }
        }

        $objActSheet->mergeCells('A1:'.$cv.chr($ascii).'1');
        $objActSheet->getRowDimension('1')->setRowHeight(20);
        $objActSheet->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); //水平居中
        $objActSheet->getStyle('A1')->getAlignment()->setVertical(PHPExcel_Style_Alignment::VERTICAL_CENTER); //垂直居中
        $objActSheet->getStyle('A1')->getFont()->getColor()->setARGB('FFFF0000');
        $objActSheet->getStyle('A1')->getAlignment()->setWrapText(true);
        $content = '积分信息（*代表必填项）';
        $objActSheet->setCellValue('A1', $content);
        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        header("Content-Type: application/vnd.ms-excel;");
        header("Content-Disposition:attachment;filename=慧猎积分模板.xls");
        header("Pragma:no-cache");
        header("Expires:0");
        $objWriter->save('php://output');
    }


}
