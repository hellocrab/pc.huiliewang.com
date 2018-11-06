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
       /* if(I('get.ac')){
            $this->output();
        }*/
        $backGround = M('background');
        $delete['delete'] = 0 ;
        $by = I('get.by');
        $search = I('get.search');
        $listrows = I('get.listrows')?I('get.listrows'):10;
        $field = 'education_add,update,remark,delete';
        $p = isset($_GET['p'])?$_GET['p']:1;
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
                $data = $backGround->order('s_name')->field($field,true)->where($delete)->page($p.','.$listrows)->select();
                break;
        }
        if($search){
            $map['s_name'] = array('like',$search.'%');
            $where['delete'] = 0;
            $this->assign('search',$search);
            $data = $backGround->order('s_name')->where($where)->where($map)->field($field,true)->select();
        }
        foreach ($data as $k => $val){
            $data[$k]['msg_id'] = json_decode($val['msg_id']);
        }
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
            $msgList = $backGroundMsg->where($where)->select();
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
        unset($data['bgmsgs']);
        foreach ($bgmsgDatas as $k => $v){
            if (count($v)>13){
                $v['update'] = $time;
                $msgId[] = $v['id'];//需要更新背调信息ID集合
                $update[$k] = $v;
            }//需要更新的背调信息
            else{
                $v['date'] = $time;
                $v['s_id'] = $id;
                $add[] = $v;
            }//新增背调信息
        }
        if (count($add)>0){
            $r3 = $backGroundMsg->addAll($add);//若存在新增背调信息则写入数据库
        }
        $map['Id'] = array('in',$msgId);
        $date = $backGroundMsg->where($map)->field('id,date')->select();//获取录入日期
        foreach ($update as $k => $v){
            foreach ($date as $key => $val){
                if ($val['id']=$v['id']){
                    $update[$k]['date'] = (int)$val['date'];
                }
            }
            $update[$k]['s_id'] = $id;
        }
        $r1 = $backGroundMsg->where($map)->setField($delete);//删除更改前背调信息
        $r2 = $backGroundMsg->addAll($update);//添加新的背调信息
        //更新员工信息表背调字段
        unset($where);
        $where['s_id'] = $id;
        $where['delete'] = 0;
        $bdmsg = $backGroundMsg->where($where)->field('id')->select();
        $data['update'] = $time;
        $r4 = $backGround->where('Id ='.$id)->setField($data);
        $this->updatemsg($bdmsg,$id);
        if($r1||$r2||$r3||$bgmsgDatas==''||$r4){
            echo '{"status":"true"}';
        }else{
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
            foreach ($msg as $k => $v){
                foreach ($v as $key => $val){
                    $val[] = $sId[$k]['Id'];
                    $msgData[] = $val;
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
            for($i = 0;$i<(count($msgId)/2);$i++){
                $idList1["msg_id"] = $msgId[$i*2]['Id'];
                $idList2["msg_id"] = $msgId[$i*2+1]['Id'];
                $msgIdData[$i] =array($idList1,$idList2);
            }
            foreach ($msgIdData as $k => $v){
                $msgIdData[$k] = json_encode($v);
            }
            //以下代码待修改
            $backGround->startTrans();
            foreach ($sId as $k => $v){
                $where['Id'] = $v;
                $map['msg_id'] = $msgIdData[$k];
                $result3 = $backGround->where($where)->setField($map);
                if($result3){
                    $backGround->commit();
                }
                else{
                    $backGround->rollback();
                }
            }
        }
    }

    function readyOutPut(){
        $get = I("get.ids");
        if($get){
            $this->output($get);
        }
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

    function output($data){
        $map['Id'] = array('in',explode(',',$data));
        $map2['s_id'] = $map['Id'];
        $backGround = M('background');
        $list1 = $backGround->where($map)->order('Id')->field('msg_id,remark,delete,update,date,education_add',true)->select();
        $backGroundMsg = M('background_msg');
        $list2 = $backGroundMsg->where($map2)->order('s_id')->select();
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
        $this->exportExcel($outList,'backGroundMsg',$listKey);
        session('export_status', 0);
    }
}