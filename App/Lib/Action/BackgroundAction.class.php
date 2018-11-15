<?php

/**
 * Created by PhpStorm.
 * User: Administrator
 * Date: 2018/10/12
 * Time: 15:11
 */
class BackgroundAction extends Action
{
    public function _initialize(){
        $title="背景调查";
        $this->assign("title",$title);
    }
    public function index(){
        $backGround = M('background');
        $delete['delete'] = 0 ;
        $by = I('get.by');
        $search = I('get.search');
        $listrows = I('get.listrows')?I('get.listrows'):10;
        $field = 'education_add,update,remark,delete';
        $p = isset($_GET['p'])?$_GET['p']:1;
        $type = isset($_GET['type'])?$_GET['type']:'all';
        switch ($by){
            case 'all':
                $count = $backGround->order('s_name')->field($field,true)->where($delete)->count();
                $data = $backGround->order('s_name')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
            case 'time':
                $count = $backGround->order('date desc')->field($field,true)->where($delete)->count();
                $data = $backGround->order('date desc')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
            case 'company':
                $count = $backGround->order('s_name')->field($field,true)->where($delete)->count();
                $data = $backGround->order('s_name')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
            case 'industry':
                $count = $backGround->order('industry')->field($field,true)->where($delete)->count();
                $data = $backGround->order('industry')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
            default:
                $count = $backGround->order('s_name')->field($field,true)->where($delete)->count();
                $data = $backGround->order('Id')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
        }
        if($search&&$type){
            $backGroundMsg = M('background_msg');
            switch ($type){
                case 'all':
                    $map['s_name'] = array('like','%'.$search.'%');
                    break;
                case 'time':
                    $search = strtotime($search);
                    $search = substr($search,0,6);
                    $map['date'] = array('like',$search.'%');
                    break;
                case 'company':
                    $map['company_name'] = array('like','%'.$search.'%');
                    $sIds = $backGroundMsg->where($map)->where($delete)->field('s_id')->select();
                    foreach ($sIds as $k => $v){
                        $sid[] = $v['s_id'];
                    }
                    unset($map);
                    $map['Id'] = array("in",$sid);
                    break;
                case 'industry':
                    $map['industry'] = array('like','%'.$search.'%');
                    break;
                default:
                    $map['s_name'] = array('like','%'.$search.'%');
                    break;
            }
            $data = $backGround->order('Id')->where($delete)->where($map)->field($field,true)->select();
        }
        foreach ($data as $k => $val){
            $data[$k]['msg_id'] = json_decode($val['msg_id']);
        }
        $this->assign('search',$search);
        $this->assign('type',$type);
        $this->assign('by',$by);
        $this->assign('data',$data);
        //分页设置
        import('@.ORG.Page');//导入分页类
        $Page = new Page($count,$listrows);
        $data = $Page->show();
        $this->assign('page',$data);
        $this->assign('listrows',$listrows);
        $this->display();
    }
    public function add(){
        if(IS_POST){
            $data = I('post.');
            $data['date'] = time();
            $backGround = M('background');
            $backGroundMsg = M('background_msg');
            if ($data['bgmsgs']){
                $bgmsg = $data['bgmsgs'];
                unset($data['bgmsgs']);
                $backGround->add($data);
                $where['date'] = $data['date'];
                $id = $backGround->where($where)->field('id')->find();
                foreach ($bgmsg as $k => $v){
                    $v['date'] = $data['date'];
                    $v['s_id'] = $id['id'];
                    $list[] = $v;
                }
                $backGroundMsg->addAll($list);
                unset($where);
                $where['s_id'] = $id['id'];
                $msgIds= $backGroundMsg->where($where)->field('id')->select();
                $msgId = array();
                foreach ($msgIds as $k => $v){
                    $val['msg'] =$v['id'];
                    array_push($msgId,$val);
                }
                unset($data);
                unset($where);
                $data['msg_id'] = json_encode($msgId);
                $where['Id'] = $id['id'];
                $backGround->where($where)->setField($data);
                $this->success('添加成功','background/index');
                echo '{"status":"true"}';
            }else{
                $backGround->add($data);
                echo '{"status":"true"}';
            }
        }else {
            $this->display();
        }
    }
    public function delete(){
        if (IS_POST){
            $id = I('post.id');
            $type = I('post.type');
            $delete['delete'] = 1;
            $backGround = M('background');
            $backGroundMsg = M('background_msg');
            if ($type=="all"){
                $backGround->where("id =".$id)->setField($delete);
                $backGroundMsg->where("s_id =".$id)->setField($delete);
                echo '{"status":"1"}';
            }elseif ($type=="bgmsg"){
                $result = $backGroundMsg->where("id =".$id)->setField($delete);
                $sId = $backGroundMsg->where("id =".$id)->field('s_id')->find();
                $sId['delete'] = 0;
                $ids = $backGroundMsg->where($sId)->field('id')->select();
                $msg = array();
                foreach ($ids as $k => $v){
                    $val['msg'] = $v['id'];
                    array_push($msg,$val);
                }
                $where['Id'] = $sId['s_id'];
                $save['msg_id'] = json_encode($msg);
                $backGround->where($where)->setField($save);
                echo '{"status":"1"}';
            }
        }
    }
    public function edit(){
        $data = I('get.id');
        $id = (int)$data;
        unset($data);
        $backGround = M('background');
        $backGroundMsg = M('background_msg');
        if($id>0) {
            $where['s_id'] = $id;
            $where['delete'] = 0;
            $data = $backGround->where("Id =".$id)->find();
            $msgList = $backGroundMsg->where($where)->order('Id')->select();
            $this->assign('id',$id);
            $this->assign('data',$data);
            $this->assign('msglist',$msgList);
            $this->display();
        }else{
            $this->display();
        }
    }
    public function save(){
        $data = I('post.');
        $id = (int)I('get.id');//获取员工ID
        $bgmsgDatas = $data['bgmsgs'];//背调信息集合
        $delete['delete'] = 1;
        $time = time();
        $backGround = M('background');
        $backGroundMsg = M('background_msg');
        $status = 0;
        foreach ($bgmsgDatas as $k => $v){
            if($v['id']){
                $msgMap['Id'] = $v['id'];
                unset($v['id']);
                $rUpdate = $backGroundMsg->where($msgMap)->setField($v);
                if($rUpdate){
                    $status++;
                }
            }else{
                $v['s_id'] = $id;
                $v['date'] = $time;
                $rAdd = $backGroundMsg->add($v);
                if($rAdd){
                    $status++;
                }
            }
        }
        $sIds = $backGroundMsg->where(array('s_id'=>$id,'delete'=>'0'))->field('Id')->select();
        foreach ($sIds as $k => $v){
            $msgId[]=array('msg'=>$v['Id']);
        }
        $msgId = json_encode($msgId);
        $data['msg_id'] = $msgId;
        $rBg = $backGround->where(array('Id'=>$id))->setField($data);
        if($rBg){
            $status++;
        }
        if($status>0){
            echo '{"status":"true"}';
        }
        else{
            echo '{"status":"false"}';
        }
    }
    function deleteall(){
        $ids = I('post.');
        $backGround = M('background');
        $backGroundMsg = M('background_msg');
        foreach ($ids as $k => $v){
            $id = $ids[$k];
        }
        $map['Id'] = array('in',$id);
        $map2['s_id'] = array('in',$id);
        $delete['delete'] = 1;
        $result = $backGround->where($map)->setField($delete);
        $result2 = $backGroundMsg->where($map2)->setField($delete);
        if(($result&&$result2)||$result){
            echo '{"status":"1"}';
        }
        else{
            echo '{"status":"2"}';
        }
    }
    //通用更新员工信息表背调字段方法$ids为背调信息表id集合，$sid为员工id
    function updatemsg($ids,$sid){
        $msgId = Array();
        foreach ($ids as $k => $v){
            $val['msg_id'] = $v['id'];
            array_push($msgId,$val);
        }
        $msgId = json_encode($msgId);
        $where['Id'] = $sid;
        $map['msg_id'] = $msgId;
        $result = M('background')->where($where)->setField($map);
        if($result){
            return true;
        }else{
            return false;
        }

    }
    function bdopen(){
        if(IS_POST){
            $id =I('post.');
            $where['s_id'] = $id['s_id'];
            $where['delete'] = 0;
            $data = M('background_msg')->where($where)->select();
            $data = json_encode($data);
            echo $data;
        }else{
            echo '{"status":"false"}';
        }
    }
    function add_more(){
        $this->display();
    }
    function excelToArray($name){
        require_once 'Base/Lib/Classes/PHPExcel/IOFactory.php';

        //加载excel文件
        $filename = 'Uploads/resume_file/'.$name;
        $objPHPExcelReader = PHPExcel_IOFactory::load($filename);

        $sheet = $objPHPExcelReader->getSheet(0);        // 读取第一个工作表(编号从 0 开始)
        $highestRow = $sheet->getHighestRow();           // 取得总行数
        $highestColumn = $sheet->getHighestColumn();     // 取得总列数
        if($highestColumn=="AF"){
            $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M', 'N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM', 'AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ', 'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM', 'BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ');
            //读取员工基本信息
            $res_arr = array();
            for ($row = 5; $row <= $highestRow; $row++) {
                $row_arr = array();
                for ($column = 0; $arr[$column] != 'AG'; $column++) {
                    $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
                    $row_arr[] = $val;
                }

                $res_arr[] = $row_arr;
            }
            return $res_arr;
        }else{
            return "false";
        }

    }
    function upload(){
        $time = time();
        if ($_FILES){
            //上传员工背景EXCEL表到uploads/resume_file目录下
            $file = $_FILES['files'];
            $type =  end(explode('.', $file['name'][0]));
            $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;
            $upload_path_name = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;
            $complete_path = time().".".$type;
            move_uploaded_file($file['tmp_name'][0],$upload_path_name);
            $data = $this->excelToArray($complete_path);
            if($data=='false'){
                echo '{"type":"false"}';
            }else{
                //数据拆分取得$back,$msg
                foreach ($data as $key => $val){
                    foreach ($val as $k => $v){
                        if($k<6){
                            $backArr[] = $v;
                        }elseif($k<19){
                            $msgArrList1[] = $v;
                        }elseif($k<32){
                            $msgArrList2[] = $v;
                        }
                    }
                    $backArr[] = $time;
                    $msgArrList1[] = $time;
                    $msgArrList2[] = $time;
                    $msgArr = array($msgArrList1,$msgArrList2);
                    $back[] = $backArr;
                    $msg[] =$msgArr;
                    unset($backArr);
                    unset($msgArrList1);
                    unset($msgArrList2);
                    unset($msgArr);
                }
                //整理数据键值更名为字段名存入background表的数据为 $backData
                $backGroundName = array('s_name','department','school','major','education','industry','date');
                foreach ($back as $k => $v){
                    foreach ($v as $key => $val){
                        $backData[$k][$backGroundName[$key]] = $val;
                    }
                }
                $backGround = M('background');
                $backGroundMsg = M('background_msg');
                $backGround->startTrans();
                $result = $backGround->addAll($backData);//添加员工数据进入数据库
                if(!$result){
                    $backGround->rollback();
                }else{
                    $backGround->commit();
                }
                $backGround->rollback();
                $count = count($backData);
                //获取所添加员工的 id 集合
                $sIdList = $backGround->field('Id')->order('id desc')->limit($count)->select();
                //重排列$sIdList 顺序
                for($i =count($sIdList)-1;$i>=0;$i--){
                    $sId[] = $sIdList[$i];
                }
                //筛选空数据
                foreach ($msg as $k => $v){
                    foreach ($v as $key => $val){
                        $msgCheckNull = 0;
                        foreach ($val as $keys =>$vals){
                            if($vals==null){
                                $msgCheckNull++;
                            }
                        }
                        if($msgCheckNull<13){
                            $val[] = $sId[$k]['Id'];
                            $msgData[] = $val;
                        }
                    }
                }
                $backGroundMSgName= array('company_name','enter_time','out_time','position','witness','witness_add','tel','adress','work_performance','bz','reasons','health','salary','date','s_id');
                //整理数据键值更名为字段名存入background_msg表的数据为 $backMsgData
                foreach ($msgData as $k => $v){
                    foreach ($v as $key => $val){
                        $list[$backGroundMSgName[$key]] = $val;
                    }
                    $backMsgData[] = $list;
                }

                $backGroundMsg->startTrans();
                $result2 = $backGroundMsg->addAll($backMsgData);
                if(!$result2){
                    $backGroundMsg->rollback();
                }else{
                    $backGroundMsg->commit();
                }
                //更新background表 msg_id 字段
                foreach ($sId as $k => $v){
                    $sId[$k] = $v['Id'];
                }
                $map['s_id'] = array('in',$sId);
                $msgId = $backGroundMsg->where($map)->field('Id,s_id')->select();
                /*for($i = 0;$i<(count($msgId)/2);$i++){
                    $idList1["msg_id"] = $msgId[$i*2]['Id'];
                    $idList2["msg_id"] = $msgId[$i*2+1]['Id'];
                    $msgIdData[$i] =array($idList1,$idList2);
                }*/
                foreach ($msgId as $k =>$v){
                    foreach ($msgId as $key => $val){
                        if($v['s_id']==$val['s_id']&&$v['Id ']!=$val['Id']){
                            unset($msgId[$key]);
                            $msgId1['msg_id']=$v['Id'];
                            $msgId2['msg_id']=$val['Id'];
                            if($msgId1!=$msgId2){
                                $msgIdData[$val['s_id']] = json_encode(array($msgId1,$msgId2));
                            }else{
                                $msgIdData[$val['s_id']] = json_encode($msgId1);
                            }
                        }
                    }
                }
                //以下代码待修改
                $backGround->startTrans();
                $backGroundCheck = 0;
                foreach ($msgIdData as $k=>$v){
                    $where['Id'] = $k;
                    unset($map);
                    $map['msg_id'] = $msgIdData[$k];
                    $result3 = $backGround->where($where)->setField($map);
                    if(!$result3){
                        $backGroundCheck++;
                    }
                }
                if($backGroundCheck>0){
                    $backGround->rollback();
                    echo '{"type":"false"}';
                }else{
                    $backGround->commit();
                    echo '{"type":"success"}';
                }
            }
        }
    }
    function readyOutPut(){
        $get = I("get.ids");
        $by  = I('get.by');
        if($get){
            $this->output($get,$by);
        }
    }
    //word 导出
    function readyOutPutt(){

        require_once  __DIR__ ."/../../../vendor/phpoffice/phpword/bootstrap.php";
        include_once  __DIR__ ."/../../../vendor/phpoffice/phpword/samples/Sample_Header.php";

        //取出当前id的所有信息
        $get = I("get.ids");
        $userId = intval($get);

        $background = M('external_background')->where(array('Id'=>$userId))->select();
        $edu = M('external_background_edu')->where(array('c_id'=>$userId))->select();
        $qc = M('external_background_qc')->where(array('c_id'=>$userId))->select();
        $work = M('external_background_work')->where(array('c_id'=>$userId))->select();

        foreach ($work as $k => $v){
            $witness[$k] = M('external_background_witness')->where(array('w_id'=>intval($v['Id'])))->select();
        }

        //Word文档样式的导出
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->getSettings()->setUpdateFields(true);
        $section = $phpWord->addSection();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addText('背景调查报告',array('bold'=>true,'宋体'=>true,'size'=>26),array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER, 'spaceAfter' => 100));
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addText('客   户:'.$background[0]['tocompany'],array('bold'=>true,'宋体'=>true,'size'=>16));
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addText('推荐职位:'.$background[0]['jobs'],array('bold'=>true,'宋体'=>true,'size'=>16));
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addText('项目经理:'.$background[0]['consultant'],array('bold'=>true,'宋体'=>true,'size'=>16));
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak(); $section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak(); $section->addTextBreak();
        $section->addText('日期:20'.date('y-m-d',time()),array('bold'=>true,'宋体'=>true,'size'=>16),array('alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::RIGHT,'spaceAfter' => 400));
        $section->addTextBreak();
        //添加页脚
        $footer = $section ->addFooter();
        $footer->addTextBreak();
        $footer->addPreserveText('第{PAGE}页  共{NUMPAGES}页',array('Times New Roman'=>true,'size'=>8),array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $footer->addTextBreak();
        $foTextRun = $footer->addTextRun();
        $foTextRun->addText('南方新华主要办公及服务区域:北京，上海，深圳，广州，杭州，天津，南京，成都，重庆',array('宋体'=>true,'size'=>7));
        $foTextRun->addText('                         服务质量监督TEL:023-88597927 ',array('宋体'=>true,'size'=>7),array('alignment'=> \PhpOffice\PhpWord\SimpleType\Jc::END,'spaceAfter'=>100));
        //添加页眉
        $header = $section->addHeader();
        $textRun = $header->addTextRun();
        $textRun->addImage('Public/img/logo1.png',array('width'=>148,'height'=>42));
        $textRun->addText('                                                   24小时极速猎头+',array('italic'=>true,'size'=>13));
        //第二页
        $section->addPageBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addText('推荐职位-姓名-背景调查报告',array('宋体'=>true,'bold'=>true,'size'=>15),array('alignment'=>\PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addText('报告摘要',array('宋体(正文)'=>true,'bold'=>true,'size'=>15));
        $section->addTextBreak();
        $fancyTableStyle = array('borderSize' => 6, 'borderColor' => '999999');
        $spanTableStyleName = 'Colspan Rowspan';
        $phpWord->addTableStyle($spanTableStyleName, $fancyTableStyle);
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(2500)->addText('核查内容',array('宋体'=>true,'size'=>14));
        $table->addCell(6500)->addText('是否核实',array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('身份信息核实',array('宋体'=>true,'size'=>14));
        $table->addCell(6500);
        $table->addRow(); 
        $table->addCell(2500)->addText('学历信息核实',array('宋体'=>true,'size'=>14));
        $table->addCell(6500);
        $table->addRow();
        $table->addCell(2500)->addText('专业资格核实',array('宋体'=>true,'size'=>14));
        $table->addCell(6500);
        $table->addRow();
        $table->addCell(2500)->addText('工作履历核实',array('宋体'=>true,'size'=>14));
        $table->addCell(6500);
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addText('一、身份信息',array('宋体(正文)'=>true,'bold'=>true,'size'=>15));
        $section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(5400,array('gridSpan'=>2))->addText('身份信息',array('宋体'=>true,'size'=>15),array('alignment'=>\PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $table->addCell(3600)->addText('核实结果',array('宋体'=>true,'size'=>15));
        $table->addRow();
        $table->addCell(1800)->addText('姓名',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($background[0]['name'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('身份证号码',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($background[0]['idnumber'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addText('二、学历信息',array('宋体(正文)'=>true,'bold'=>true,'size'=>15));
        $section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(5400,array('gridSpan'=>2))->addText('学历信息',array('宋体'=>true,'size'=>15),array('alignment'=>\PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $table->addCell(3600)->addText('核实结果',array('宋体'=>true,'size'=>15));
        $table->addRow();
        $table->addCell(1800)->addText('学历类型',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['edu_type'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('专业',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['major'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('入学时间',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['enter_time'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('毕业时间',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['out_time'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('证书编号',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['edu_num'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('信息来源',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($edu[0]['msgbelong'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak(); $section->addTextBreak();
        $section->addText('三、专业资格',array('宋体(正文)'=>true,'bold'=>true,'size'=>15));
        $section->addTextBreak();
        //第三页
        $section->addPageBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(5400,array('gridSpan'=>2))->addText('专业资格',array('宋体'=>true,'size'=>15),array('alignment'=>\PhpOffice\PhpWord\SimpleType\Jc::CENTER));
        $table->addCell(3600)->addText('核实结果',array('宋体'=>true,'size'=>15));
        $table->addRow();
        $table->addCell(1800)->addText('证书名称',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($qc[0]['qc_type'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('证书号码',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($qc[0]['qc_num'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('获证时间',array('宋体'=>true,'size'=>15));
        $table->addCell(3600)->addText($qc[0]['get_time'],array('宋体'=>true,'size'=>15));
        $table->addCell(3600);
        $table->addRow();
        $table->addCell(1800)->addText('信息来源',array('宋体'=>true,'size'=>15));
        $table->addCell(7200,array('gridSpan'=>2))->addText($qc[0]['qc_source'],array('宋体'=>true,'size'=>15));
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $section->addText('四、工作履历',array('宋体(正文)'=>true,'bold'=>true,'size'=>15));
        $section->addTextBreak();
        $table = $section -> addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(9000,array('gridSpan'=>5))->addText('调查企业一',array('宋体'=>true,'bold'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('公司名称:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[0]['company'],array('宋体'=>true,'size'=>15));
        $table->addRow();
        $table->addCell(2500)->addText('在职时间:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[0]['enter_time'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('职位:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[0]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('1.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['witness'].'/'.$witness[0][0]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间的工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有不良记录:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][0]['badrecord'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('2.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['witness'].'/'.$witness[0][1]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['performance'],array('宋体'=>true,'size'=>14));
        //第四页
        $section->addPageBreak();
        $section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(2500)->addText('离职原因:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['reason'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有培训协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['train'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有竞业协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][1]['compete'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('3.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][2]['witness'].'/'.$witness[0][2]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][2]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][2]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][2]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[0][2]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('业绩及团队管理能力:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4));
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(9000,array('gridSpan'=>5))->addText('调查企业二',array('宋体'=>true,'bold'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('公司名称:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[1]['company'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('在职时间:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[1]['enter_time'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('职位:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[1]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('1.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['witness'].'/'.$witness[1][0]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间的工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有不良记录:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][0]['badrecord'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('2.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['witness'].'/'.$witness[1][1]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['relationship'],array('宋体'=>true,'size'=>14));

        //第五页
        $section->addPageBreak();
        $section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('离职原因:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['reason'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有培训协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['train'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有竞业协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][1]['compete'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('3.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][2]['witness'].'/'.$witness[1][2]['position'],array('宋体'=>true,'size'=>14));
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][2]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][2]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][2]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[1][2]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('业绩及团队管理能力:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4));

        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(9000,array('gridSpan'=>5))->addText('调查企业三',array('宋体'=>true,'bold'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('公司名称:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[2]['company'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('在职时间:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[2]['enter_time'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('职位:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($work[2]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('1.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['witness'].'/'.$witness[2][0]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间的工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['performance'],array('宋体'=>true,'size'=>14));
        //第六页
        $section->addPageBreak();
        $section->addTextBreak();
        $section->addTextBreak();$section->addTextBreak();$section->addTextBreak();
        $table = $section->addTable($spanTableStyleName);
        $table->addRow();
        $table->addCell(2500)->addText('是否有不良记录:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['badrecord'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('2.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['witness'].'/'.$witness[2][1]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('离职原因:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['reson'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有培训协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][1]['train'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('是否有竞业协议:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][0]['compete'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('3.证明人姓名/职位:',array('宋体'=>true,'size'=>13,'bold'=>true));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][2]['witness'].'/'.$witness[2][2]['position'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('与被调查人关系:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][2]['relationship'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('调查方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][2]['method'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('证明人联系方式:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][2]['tel'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('被调查者在职期间工作情况(根据证明人口述提供):',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4))->addText($witness[2][2]['performance'],array('宋体'=>true,'size'=>14));
        $table->addRow();
        $table->addCell(2500)->addText('业绩及团队管理能力:',array('宋体'=>true,'size'=>14));
        $table->addCell(6500,array('gridSpan'=>4));

        //缓冲输出
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,'Word2007');
        $fileName = "背景调查报表".date("Ymd");
        header("Content-type: application/vnd.ms-word");
        header("Content-Disposition:attachment;filename=".$fileName.".docx");
        header('Cache-Control: max-age=0');
        ob_clean();
        flush();
        $objWriter->save('php://output');

    }
    function exportExcel($list,$filename,$indexKey=array()){
        require_once 'Base/Lib/Classes/PHPExcel/IOFactory.php';
        require_once 'Base/Lib/Classes/PHPExcel.php';
        require_once 'Base/Lib/Classes//PHPExcel/Writer/Excel2007.php';
        C('OUTPUT_ENCODE', false);

        $header_arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M', 'N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM', 'AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ', 'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM', 'BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ');

        $template = 'Uploads/template/template.xls';          //使用模板
        $objPHPExcel = PHPExcel_IOFactory::load($template);     //加载excel文件,设置模板

        $objWriter = new PHPExcel_Writer_Excel5($objPHPExcel);  //设置保存版本格式

        //接下来就是写数据到表格里面去
        $objActSheet = $objPHPExcel->getActiveSheet();
        /*$objActSheet->setCellValue('A2',  "活动名称：江南极客");
        $objActSheet->setCellValue('C2',  "导出时间：".date('Y-m-d H:i:s'));*/
        $i = 5;
        foreach ($list as $row) {
            foreach ($indexKey as $key => $value){
                //这里是设置单元格的内容
                $objActSheet->setCellValue($header_arr[$key].$i,$row[$value]);
            }
            $i++;
        }

        // 1.保存至本地Excel表格
        //$objWriter->save($filename.'.xls');

        // 2.接下来当然是下载这个表格了，在浏览器输出就好了
        header("Pragma: public");
        header("Expires: 0");
        header("Cache-Control:must-revalidate, post-check=0, pre-check=0");
        header("Content-Type:application/force-download");
        header("Content-Type:application/vnd.ms-execl");
        header("Content-Type:application/octet-stream");
        header("Content-Type:application/download");;
        header('Content-Disposition:attachment;filename="'.$filename.'.xls"');
        header("Content-Transfer-Encoding:binary");
        //$objWriter1 = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
        /* header("Content-Type: application/vnd.ms-excel;");
         header("Content-Disposition:attachment;filename=背调信息".date('Y-m-d',mktime()).".xls");
         header("Pragma:no-cache");
         header("Expires:0");*/
        $objWriter->save('php://output');
    }
    function output($data,$by){
        switch ($by){
            case 'all':
                $order = 'Id';
                break;
            case 'time':
                $order = 'Id';
                break;
            case 'company':
                $order = 'Id';
                break;
            case 'industry':
                $order = 'Id';
                break;
            default:
                $order = 'Id';
                break;
        }
        $map['Id'] = array('in',explode(',',$data));
        $map2['s_id'] = $map['Id'];
        $backGround = M('background');
        $list1 = $backGround->where($map)->order($order)->field('msg_id,remark,delete,update,date,education_add',true)->select();
        $backGroundMsg = M('background_msg');
        $list2 = $backGroundMsg->where($map2)->select();
        foreach ($list1 as $k => $v){
            foreach ($list2 as $key =>$val){
                if($val['s_id']==$v['Id']){
                    $list1[$k]['msg'][] = $val;
                }
            }
        }
        $list = $list1;
        //整理导出信息每行信息
        $listKey = array('s_name','department','school','major','education','industry','company_name0','enter_time0','out_time0','position0','witness0','witness_add0','tel0','adress0','work_performance0','bz0','reasons0','health0','salary0','company_name1','enter_time1','out_time1','position1','witness1','witness_add1','tel1','adress1','work_performance1','bz1','reasons1','health1','salary1');
        for($i=0;$i<count($list);$i++){
            foreach ($listKey as $key => $val){
                if($key<6){
                    foreach ($list[$i] as $k => $v){
                        if($k=='s_name'||$k=='department'||$k=='school'||$k=='major'||$k=='education'||$k=='industry'){
                            $outList[$i][$k] = $v;
                        }elseif($k=='msg'){
                            foreach ($v as $K => $V){
                                foreach ($V as $KEY => $VAL){
                                    if($KEY=='company_name'||$KEY=='enter_time'||$KEY=='out_time'||$KEY=='position'||$KEY=='witness'||$KEY=='witness_add'||$KEY=='tel'||$KEY=='adress'||$KEY=='work_performance'||$KEY=='bz'||$KEY=='reasons'||$KEY=='health'||$KEY=='salary'){
                                        $outList[$i][$KEY."".$K] =$VAL;
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }
        $datetime = date("Ymd ", time());
        if(count($outList)<2){
            $excelName = $outList[0]['s_name'].''.$datetime;
        }else{
            $excelName = '对内背调'.$datetime;
        }
        $this->exportExcel($outList,$excelName,$listKey);
        session('export_status', 0);
    }
    function index_external(){
        $exBackground = M('external_background');
        $listrows = I('get.listrows')?I('get.listrows'):10;
        $p = isset($_GET['p'])?$_GET['p']:1;
        $field = 'name,jobs,tocompany,industry,bz,Id';
        $search = I('get.search');
        $type = I('get.type')==null?'name':I('get.type');
        $typeAllow=array('name','tocompany','industry','jobs');
        $typeN = 0;
        foreach($typeAllow as $k =>$v){
            if($v==$type){
                $typeN++;
            }
        }
        $by = 'Id';
        if($search!=''&&$typeN>0){
            $where[$type]=array('like','%'.$search.'%');
            $count = $exBackground->where($where)->count();
            $data = $exBackground->where($where)->field($field)->page($p.','.$listrows)->order($by)->select();
            $this->assign('data',$data);
        }else{
            $count = $exBackground->count();
            $data = $exBackground->field($field)->page($p.','.$listrows)->order($by)->select();
            $this->assign('data',$data);
        }
        $this->assign('by',$by);
        //分页设置
        import('@.ORG.Page');//导入分页类
        $Page = new Page($count,$listrows);
        $data = $Page->show();
        $this->assign('page',$data);
        $this->assign('listrows',$listrows);
        $this->assign('type',$type);
        $this->assign('search',$search);
        $this->display();
    }
    //对外背调通用删除
    function ex_delete(){
        if(IS_POST){
            $id = I('post.');
            $mapId['Id'] = array('in',$id['Id']);
            $exBg = M('external_background');
            $exBg->startTrans();
            $bg = $exBg->where($mapId)->delete();

            $mapCid['c_id'] = array('in',$id['Id']);
            $exEdu = M('external_background_edu');
            $exEdu->startTrans();
            $edu = $exEdu->where($mapCid)->delete();

            $exQc = M('external_background_qc');
            $exQc->startTrans();
            $qc =$exQc->where($mapCid)->delete();

            $exWork =M('external_background_work');
            $exWork->startTrans();
            $work = $exWork->where($mapCid)->select();
            $workResult = $exWork->where($mapCid)->delete();

            foreach ($work as $k =>$v){
                $wId[] = $v['Id'];
            }
            $mapWid['w_id'] = array('in',$wId);
            $exWitness = M('external_background_witness');
            $exWitness->startTrans();
            $witness = $exWitness->where($mapWid)->delete();
            if($bg||($edu&&$qc&&$workResult&&$witness)){
                $exBg->commit();
                $exEdu->commit();
                $exQc->commit();
                $exWork->commit();
                $exWitness->commit();
                echo '{"status":"1"}';
            }else{
                $exBg->rollback();
                $exEdu->rollback();
                $exQc->rollback();
                $exWork->rollback();
                $exWitness->rollback();
                echo '{"status":"0"}';
            }
        }
    }
    function status(){
        $status = I('get.status');
        echo $status;
    }
    function hxr_detail(){
        if(IS_POST){
            $id = I('post.');
            if((int)$id['Id']){
                $exBackground = M('external_background');
                $bg = $exBackground->field('Id,name,jobs,tocompany,industry,id_pic_src,bz,idnumber')->where($id)->find();
                $exBackgroundEdu = M('external_background_edu');
                $edu = $exBackgroundEdu->where('c_id ='.$id['Id'])->field('c_id',true)->select();
                $exBackgroundQc = M('external_background_qc');
                $qc = $exBackgroundQc->where('c_id ='.$id['Id'])->field('c_id',true)->select();
                $exBackgroundWork = M('external_background_work');
                $work = $exBackgroundWork->where('c_id ='.$id['Id'])->field('c_id',true)->select();
                $exBackgroundWitness = M('external_background_witness');
                foreach ($work as $k => $v){
                    $witness = $exBackgroundWitness->where('w_id ='.$v['Id'])->select();
                    $work[$k]['witness'] = $witness;
                }
                $data['bg'] = $bg;
                $data['edu'] = $edu;
                $data['qc'] = $qc;
                $data['work'] = $work;
                $data = json_encode($data);
                echo $data;
            }
        }
    }
    function add_external(){
        if(IS_POST){
            $data = I('post.');
            $bgKey = ['name','jobs','tocompany','industry','consultant','idnumber','bz'];
            $dataBg = explode(',',$data['bg']);
            for($i = 0;$i<count($dataBg);$i++){
                $bg[$bgKey[$i]] = $dataBg[$i];
            }//$bg 为存入external_background表的数据

            $eduKey = ['school','school_add','edu_type','edu_type_add','major','major_add','enter_time','enter_time_add','out_time','out_time_add','edu_num','edu_num_add','msgbelong','msgbelong_add'];
            $dataEdu = explode(',',$data['edu']);
            $eduCount = count($dataEdu)/count($eduKey);
            for($i=0;$i<$eduCount;$i++){
                for($j=0;$j<count($eduKey);$j++){
                    $edu[$i][$eduKey[$j]] = $dataEdu[$j+(count($eduKey)*$i)];
                }
            }//$edu 为存入external_background_edu表的数据

            $qcKey = ['get_time','get_time_add','out_time','out_time_add','qc_type','qc_type_add','qc_source','qc_source_add','qc_num','qc_num_add'];
            $dataQc = explode(',',$data['qc']);
            $qcCount = count($dataQc)/count($qcKey);
            for($i=0;$i<$qcCount;$i++){
                for($j=0;$j<count($qcKey);$j++){
                    $qc[$i][$qcKey[$j]] = $dataQc[$j+(count($qcKey)*$i)];
                }
            }//$qc 为存入external_background_edu表的数据

            $workKey = ['company','company_add','enter_time','enter_time_add','out_time','out_time_add','position','position_add','witness_count'];
            $dataWork = explode(',',$data['work']);
            $workCount = count($dataWork)/count($workKey);
            for($i=0;$i<$workCount;$i++){
                for($j=0;$j<count($workKey);$j++){
                    $work[$i][$workKey[$j]] = $dataWork[$j+(count($workKey)*$i)];
                }
            }//$work 为存入external_background_work表的数据

            $witnessKey = ['witness','position','tel','relationship','method','performance','badrecord','reason','train','compete'];
            $dataWitness = explode(',',$data['witness']);
            $witnessCount = count($dataWitness)/count($witnessKey);
            for($i=0;$i<$witnessCount;$i++){
                for($j=0;$j<count($witnessKey);$j++){
                    $witness[$i][$witnessKey[$j]] = $dataWitness[$j+(count($witnessKey)*$i)];
                }
            }//$witness 为存入external_background_witness表的数据

            if(!empty($_FILES)){
                $pics = $_FILES;
                //移动所上传图片
                $picName = array_keys($pics);
                foreach ($picName as $key => $val){
                    $type = end(explode('.',$pics[$val]['name']));
                    $name = reset(explode('.',$pics[$val]['name']));
                    if($val =="id"){
                        $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/idpic/".time()."_".$name.".".$type;
                        $idPath = end(explode('/Uploads',$path));
                        $bg['id_pic_src'] = $idPath;
                        move_uploaded_file($pics[$val]['tmp_name'],$path);
                    }elseif(count(explode("edu",$val))>=2){
                        $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/edu/".time()."_".$name.".".$type;
                        $arr['src'] = end(explode('/Uploads',$path));
                        $arr['for'] = end(explode("edu",$val))==''?'0':end(explode("edu",$val));
                        $eduPath[] = $arr;
                        foreach ($eduPath as $k => $v){
                            $edu[$v['for']]['edu_pic_src'] = $v['src'];
                        }//对应数据存入图片地址
                        move_uploaded_file($pics[$val]['tmp_name'],$path);
                    }elseif (count(explode("qc",$val))>=2){
                        $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/qc/".time()."_".$name.".".$type;
                        $arr['src'] = end(explode('/Uploads',$path));
                        $arr['for'] = end(explode("qc",$val))==''?'0':end(explode("qc",$val));
                        $qcPath[] = $arr;
                        foreach ($qcPath as $k => $v){
                            $qc[$v['for']]['qc_pic_src'] = $v['src'];
                        }//对应数据存入图片地址
                        move_uploaded_file($pics[$val]['tmp_name'],$path);
                    }
                }
            }

            //写入数据库
            $exBackground = M('external_background');
            $exBackgroundEdu = M('external_background_edu');
            $exBackgroundQc = M('external_background_qc');
            $exBackgroundWitness = M('external_background_witness');
            $exBackgroundWork = M('external_background_work');


            $exBackground->startTrans();
            $bgResult = $exBackground->add($bg);
            if($bgResult){
                $exBackground->commit();
                $bgId =$exBackground->field('Id')->order('Id desc')->find();
                $exBackgroundEdu->startTrans();
                $eduResult = 0;
                foreach ($edu as $k => $v){
                    $v['c_id'] = $bgId['Id'];
                    $status = $exBackgroundEdu->add($v);
                    if(!$status){
                        $eduResult = 1;
                    }
                }
                $eduResult==0?$exBackgroundEdu->commit(): $exBackgroundEdu->rollback();
                $exBackgroundQc->startTrans();
                $qcResult = 0;
                foreach ($qc as $k => $v){
                    $v['c_id'] = $bgId['Id'];
                    $status = $exBackgroundQc->add($v);
                    if(!$status){
                        $qcResult = 1;
                    }
                }
                $qcResult==0?$exBackgroundQc->commit():$exBackgroundQc->rollback();
                $exBackgroundWork->startTrans();
                $exBackgroundWitness->startTrans();
                foreach ($work as $k => $v){
                    $v['c_id'] = $bgId['Id'];
                    $workResult = $exBackgroundWork->add($v);
                    if($workResult){
                        $workId = $exBackgroundWork->field('Id')->order('Id desc')->find();
                        $countWitness = $v['witness_count'];
                        for($i=0;$i<$countWitness;$i++){
                            $witness[$i]['w_id'] = $workId['Id'];
                            $witnessResult = $exBackgroundWitness->add($witness[$i]);
                            $witnessResult?$exBackgroundWitness->commit():$exBackgroundWitness->rollback();
                            unset($witness[$i]);
                        }
                        $witness = array_values($witness);
                        $exBackgroundWork->commit();
                    }else{
                        $exBackgroundWork->rollback();
                    }
                }
                $this->ajaxReturn('true');
            }else{
                $exBackground->rollback();
            }
        }else{
            //获取账户,,
            $user_id = isset($_REQUEST['id']) ? intval($_REQUEST['id']) : session('user_id');
            $account = M('user')->where(array('user_id'=>intval($user_id)))->getField('name');
            $this->assign('account',$account);
            $this->display();
        }
    }
    //对外背调excel导入
    function ex_excel_upload(){
        if($_FILES){
            $file = $_FILES['files'];
            $type =  end(explode('.', $file['name'][0]));
            $path = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;
            $upload_path_name = $_SERVER['DOCUMENT_ROOT']."/Uploads/resume_file/".time().".".$type;
            $complete_path = time().".".$type;
            move_uploaded_file($file['tmp_name'][0],$upload_path_name);
            $data = $this->ex_excelToArray($complete_path);
            if($data!='false'){
                //数据拆分
                //ex_background表
                foreach ($data as $key => $val){
                    foreach ($val as $k => $v){
                        if($k<=6){
                            $bg[$key][] = $v;
                        }elseif ($k>6&&$k<=13){
                            $edu[$key*2][] = $v;
                        }elseif($k>13&&$k<=20){
                            $edu[$key*2+1][] = $v;
                        }elseif ($k>20&&$k<=25){
                            $qc[$key*2][] = $v;
                        }elseif($k>25&&$k<=30){
                            $qc[$key*2+1][] = $v;
                        }elseif($k>30&&$k<=34){
                            $work[$key*2][] = $v;
                        }elseif($k>74&&$k<=78){
                            $work[$key*2+1][] = $v;
                        }elseif($k>34&&$k<=44){
                            $witness[$key*8][] = $v;
                        }elseif($k>44&&$k<=54){
                            $witness[$key*8+1][] = $v;
                        }elseif($k>54&&$k<=64){
                            $witness[$key*8+2][] = $v;
                        }
                        elseif($k>64&&$k<=74){
                            $witness[$key*8+3][] = $v;
                        }
                        elseif($k>78&&$k<=88){
                            $witness[$key*8+4][] = $v;
                        }
                        elseif($k>88&&$k<=98){
                            $witness[$key*8+5][] = $v;
                        }
                        elseif($k>98&&$k<=108){
                            $witness[$key*8+6][] = $v;
                        }elseif($k>108&&$k<=118){
                            $witness[$key*8+7][] = $v;
                        }
                    }
                }
                $exBg = M('external_background');
                $exBg->startTrans();
                $bg = $this->data_keys_change($bg,'bg');
                $edu =  $this->data_keys_change($edu,'edu');
                $qc = $this->data_keys_change($qc,'qc');
                $work = $this->data_keys_change($work,'work');
                $witness = $this->data_keys_change($witness,'witness');
                $exBgResult = $exBg->addAll($bg);
                if(!$exBgResult){
                    $exBg->rollback();
                }else{
                    $exBg->commit();
                    $cIds = $exBg->field('Id')->order('Id desc')->limit(count($bg))->select();
                    $cIds = $this->array_order_id($cIds);//升序排列cid
                    $edu  = $this->ex_delete_null($this->data_add_id($edu,$cIds,2,'c_id'));
                    $qc = $this->ex_delete_null($this->data_add_id($qc,$cIds,2,'c_id'));
                    $work = $this->ex_delete_null($this->data_add_id($work,$cIds,2,'c_id'));
                    $exEdu = M('external_background_edu');
                    $exEdu->startTrans();
                    $exEduResult = $exEdu->addAll($edu);
                    $exQc = D('external_background_qc');
                    $exQc->startTrans();
                    $exQcResult = $exQc->addAll($qc);
                    $exWork = M('external_background_work');
                    $exWork->startTrans();
                    $exWorkResult = $exWork->addAll($work);
                    if(!$exEduResult&&!$exQcResult&&!$exWorkResult){
                        $exEdu->rollback();
                        $exQc->rollback();
                        $exWork->rollback();
                    }else{
                        $exEdu->commit();
                        $exQc->commit();
                        $exWork->commit();
                        $wIds = $exWork->order('Id desc')->limit(count($work))->field('Id')->select();
                        $wIds = $this->array_order_id($wIds);
                        $witness = $this->ex_delete_null($this->data_add_id($witness,$wIds,4,'w_id'));
                        $exWitness = M('external_background_witness');
                        $exWitnessResult = $exWitness->addAll($witness);
                        if($exWitnessResult){
                            $exWitness->commit();
                            echo '{"type":"success"}';
                        }else{
                            $exWitness->rollback();
                        }
                    }
                }
            }
            else{
                echo '{"type":"false"}';
            }
        }
    }
    //删除为空数据
    function ex_delete_null($data){
        foreach ($data as $k => $v){
            $n = 0;
            foreach ($v as $key => $val){
                if($val==null){
                    $n++;
                }
            }
            if($n==7||$n==4||$n==5||$n==10){
                unset($data[$k]);
            }
        }
        return $data;
    }
    function ex_excelToArray($name){
        require_once 'Base/Lib/Classes/PHPExcel/IOFactory.php';

        //加载excel文件
        $filename = 'Uploads/resume_file/'.$name;
        $objPHPExcelReader = PHPExcel_IOFactory::load($filename);

        $sheet = $objPHPExcelReader->getSheet(0);        // 读取第一个工作表(编号从 0 开始)
        $highestRow = $sheet->getHighestRow();           // 取得总行数
        $highestColumn = $sheet->getHighestColumn();     // 取得总列数
        if($highestColumn=='DO'){
            $arr = array('A','B','C','D','E','F','G','H','I','J','K','L','M', 'N','O','P','Q','R','S','T','U','V','W','X','Y','Z', 'AA','AB','AC','AD','AE','AF','AG','AH','AI','AJ','AK','AL','AM', 'AN','AO','AP','AQ','AR','AS','AT','AU','AV','AW','AX','AY','AZ', 'BA','BB','BC','BD','BE','BF','BG','BH','BI','BJ','BK','BL','BM', 'BN','BO','BP','BQ','BR','BS','BT','BU','BV','BW','BX','BY','BZ','CA','CB','CC','CD','CE','CF','CG','CH','CI','CJ','CK','CL','CM','CN','CO','CP','CQ','CR','CS','CT','CU','CV','CW','CX','CY','CZ','DA','DB','DC','DD','DE','DF','DG','DH','DI','DJ','DK','DL','DM','DN','DO','DP','DQ','DR','DS','DT','DU','DV','DW','DX','DY','DZ','EA','EB','EC','ED','EE','EF','EG','EH','EI','EJ','EK','EL','EM','EN','EO','EP','EQ','ER','ES','ET','EU','EV','EW','EX','EY','EZ');
            //读取员工基本信息
            $res_arr = array();
            for ($row = 3; $row <= $highestRow; $row++) {
                $row_arr = array();
                for ($column = 0; $arr[$column] != 'DP'; $column++) {
                    $val = $sheet->getCellByColumnAndRow($column, $row)->getValue();
                    $row_arr[] = $val;
                }

                $res_arr[] = $row_arr;
            }
            return $res_arr;
        }else{
            echo 'false';
        }

    }
    function array_keys_change($keys,$data){
        foreach ($data as $key => $val){
            foreach ($val as $k => $v){
                $list[$keys[$k]] = $v;
                unset($data[$key]);
                $data[$key] = $list;
            }
        }
        return $data;
    }
    //cid升序排列
    function array_order_id($cid){
        for($i=count($cid)-1;$i>=0;$i--){
            $data[]=$cid[$i];
        }
        return $data;
    }
    //excel数据读取 键值对应
    function data_keys_change($data,$type){
        switch ($type){
            case 'bg':
                $keys = array("name","jobs","tocompany","industry","consultant","idnumber","bz");
                $data = $this->array_keys_change($keys,$data);
                return $data;
                break;
            case 'edu':
                $keys = ['school','edu_type','major','enter_time','out_time','edu_num','msgbelong'];
                $data = $this->array_keys_change($keys,$data);
                return $data;
            case 'qc':
                $keys = ['get_time','out_time','qc_type','qc_source','qc_num'];
                $data = $this->array_keys_change($keys,$data);
                return $data;
            case 'work':
                $keys = ['company','enter_time','out_time','position','witness_count'];
                $data = $this->array_keys_change($keys,$data);
                return $data;
            case 'witness':
                $keys = ['witness','position','tel','relationship','method','performance','badrecord','reason','train','compete'];
                $data = $this->array_keys_change($keys,$data);
                return $data;
        }
    }
    //数据添加c_id/w_id,$type为c_id 或w_id
    function data_add_id($data,$ids,$count,$type){
        for($i=0;$i<count($ids);$i++){
            for($k=0;$k<$count;$k++){
                $data[$i*$count+$k][$type] =$ids[$i]['Id'];
            }
        }
        foreach ($data as $key => $val){
            $n = 0;
            foreach ($val as $keys => $vals){
                if($keys==$type){
                    $n++;
                }
            }
            if($n==0){
                unset($data[$key]);
            }
        }
        return $data;
    }
    //对外背调修改保存
    function save_one(){
        $data = I('post.');
        switch ($data['type']){
            case 'bg':
                $exBackGround = M('external_background');
                $map['name'] = $data['data'][0];
                $map['idnumber'] = $data['data'][5];
                $result = $exBackGround->where(array('Id'=>$data['Id']))->setField($map);
                if($result){
                    echo '1';
                }else{
                    echo '0';
                }
                break;
            case 'edu':
                $exBackGroundEdu = M('external_background_edu');
                $keys  = array('school','edu_type','major','edu_num','msgbelong','enter_time','out_time');
                foreach ($keys as $k => $v){
                    $map[$v]=$data['data'][$k+1];
                }
                $result = $exBackGroundEdu->where(array('Id'=>$data['Id']))->setField($map);
                if($result){
                    echo '1';
                }else{
                    echo '0';
                }
                break;
            case 'qc':
                $exBackGroundQc = M('external_background_qc');
                $keys = array('qc_type','qc_num','get_time','out_time','qc_source');
                foreach ($keys as $k => $v){
                    $map[$v]=$data['data'][$k+1];
                }
                $result = $exBackGroundQc->where(array('Id'=>$data['Id']))->setField($map);
                if($result){
                    echo '1';
                }else{
                    echo '0';
                }
                break;
            case 'work':
                $exBackGroundWork = M('external_background_work');
                $keys = array('company','enter_time','out_time','position');
                foreach ($keys as $k => $v){
                    $map[$v]=$data['data'][$k];
                }
                $result = $exBackGroundWork->where(array('Id'=>$data['Id']))->setField($map);
                if($result){
                    echo '1';
                }else{
                    echo '0';
                }
                break;
            case 'witness':
                $exBackGroundWitness = M('external_background_witness');
                $keys = array('witness','position','tel','relationship','method','performance','badrecord','reason','train','compete');
                foreach ($keys as $k => $v){
                    $map[$v]=$data['data'][$k];
                }
                $result = $exBackGroundWitness->where(array('Id'=>$data['Id']))->setField($map);
                if($result){
                    echo '1';
                }else{
                    echo '0';
                }
                break;
        }
    }
}