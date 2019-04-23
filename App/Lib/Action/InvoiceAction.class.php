<?PHP
/**
*发票模块
*
**/
class InvoiceAction extends Action{

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
	    $title="财务管理";
        $this->assign("title",$title);
		$action = array(
			'permission'=>array('view_ajax'),
			'allow'=>array('adddata','viewdata','editdata','customer_invoice','check_list','getcontractinvoice',"examine","refuse","refund","count","bill","editer","distribution","distribution_int","sendout","goback","revoke","excelExport")
		);
		B('Authenticate', $action);
		$this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);

//        $a = ACTION_NAME;
//        $this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);

	}

	/**
	 * 发票列表
	 * @param
	 * @author
	 * @return
	 */
	public function index(){
        $where = [];
	    if($this->_permissionRes){
            $where['create_role_id'] = array('in',$this->_permissionRes);
        }else{
            $where['create_role_id'] = session('role_id');
        }
        $this->applyNum = M("invoice")->where("type='%s'","apply")->where($where)->count();
        $this->examineNum = M("invoice")->where("type='%s'","examine")->where($where)->count();
        $this->billingNum = M("invoice")->where("type='%s'","billing")->where($where)->count();
        $this->moneyNum = M("invoice")->where("type='%s'","money")->where($where)->count();
        $this->distributionNum = M("invoice")->where("type='%s'","distribution")->where($where)->count();
        $this->grantNum = M("invoice")->where("type='%s'","grant")->where($where)->count();
        $this->returnNum = M("invoice")->where("type='%s'","return")->where($where)->count();
        $this->refundNum = M("invoice")->where("type='%s'","refund")->where($where)->count();
        $this->refuseNum = M("invoice")->where("type='%s'","refuse")->where($where)->count();

//        $param = $_GET;
//        unset($param['m']);
//        unset($param['a']);


        $this->process = array("calllist"=>"CallList","adviser"=>"顾问面试","tj"=>"简历推荐","interview"=>"客户面试","pass"=>"面试通过","offer"=>"Offer","enter"=>"入职","safe"=>"过保");
        $type = I("type")?I("type"):"apply";
        $this->type = $type;
        $d_invoice = D('InvoiceView');
        $order = 'create_time desc';
//        $where = array();
        $p = intval($_GET['p']) ? intval($_GET['p']) : 1;
        $m_customer = M('Customer');
        $m_contract = M('Contract');
        $m_user = M('User');

        //普通搜索
        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
            if($field == 'name'){
                $where['_string'] = 'invoice.name like "%'.$search.'%" or contract.number like "%'.$search.'%" or customer.name like "%'.$search.'%"';
            }else{
                switch ($condition) {
                    case "is" : $where[$field] = array('eq',$search);break;
                    case "isnot" :  $where[$field] = array('neq',$search);break;
                    case "contains" :  $where[$field] = array('like','%'.$search.'%');break;
                    case "not_contain" :  $where[$field] = array('notlike','%'.$search.'%');break;
                    case "start_with" :  $where[$field] = array('like',$search.'%');break;
                    case "end_with" :  $where[$field] = array('like','%'.$search);break;
                    case "is_empty" :  $where[$field] = array('eq','');break;
                    case "is_not_empty" :  $where[$field] = array('neq','');break;
                    case "gt" :  $where[$field] = array('gt',$search);break;
                    case "egt" :  $where[$field] = array('egt',$search);break;
                    case "lt" :  $where[$field] = array('lt',$search);break;
                    case "elt" :  $where[$field] = array('elt',$search);break;
                    case "eq" : $where[$field] = array('eq',$search);break;
                    case "neq" : $where[$field] = array('neq',$search);break;
                    case "between" : $where[$field] = array('between',array($search-1,$search+86400));break;
                    case "nbetween" : $where[$field] = array('not between',array($search,$search+86399));break;
                    case "tgt" :  $where[$field] = array('gt',$search+86400);break;
                    default : $where[$field] = array('eq',$search);
                }
            }
            $params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$search);
            //过滤不在权限范围内的role_id
//            if(trim($_REQUEST['field']) == 'create_role_id'){
//                if(!in_array(trim($search),$this->_permissionRes)){
//                    $where['create_role_id'] = array('in',$this->_permissionRes);
//                }
//            }
        }

        //高级搜索
        $fields_search = array();
        if(!$_GET['field']){
            foreach($_GET as $kd => $vd){
                if ($kd != 'act' && $kd != 'content' && $kd != 'p' && $kd != 'search' && $kd != 'listrows' && $kd != 'by') {
                    if(in_array($kd,array('is_checked'))){
                        if(!empty($vd)){
                            $where[$kd] = $vd['value'];
                            $fields_search[$kd]['field'] = $kd;
                            $fields_search[$kd]['value'] = $vd['value'];
                        }
                    }elseif(in_array($kd,array('create_time','update_time'))){
                        $where[$kd] = field($vd['value'], $vd['condition']);
                        $fields_search[$kd]['field'] = $kd;
                        $fields_search[$kd]['start'] = $vd['start'];
                        $fields_search[$kd]['end'] = $vd['end'];
                        $fields_search[$kd]['form_type'] = 'datetime';

                        //时间段查询
                        if ($vd['start'] && $vd['end']) {
                            $where[$kd] = array('between',array(strtotime($vd['start']),strtotime($vd['end'])+86399));
                        } elseif ($vd['start']) {
                            $where[$kd] = array('egt',strtotime($vd['start']));
                        } else {
                            $where[$kd] = array('elt',strtotime($vd['end'])+86399);
                        }
                    }elseif($kd =='create_role_id'){
                        if(!empty($vd)){
                            $where['invoice.create_role_id'] = $vd['value'];
                            $fields_search[$kd]['field'] = $kd;
                            $fields_search[$kd]['value'] = $vd['value'];
                        }
                    }else{
                        if(is_array($vd)) {
                            if(!empty($vd['value'])){
                                $where[$kd] = field($vd['value'], $vd['condition']);
                                $fields_search[$kd]['field'] = $kd;
                                $fields_search[$kd]['condition'] = $vd['condition'];
                                $fields_search[$kd]['value'] = $vd['value'];
                            }
                        }else{
                            if(!empty($vd)){
                                $where[$kd] = field($vd);
                                $fields_search[$kd]['field'] = $kd;
                                $fields_search[$kd]['value'] = $vd['value'];
                            }
                        }
                    }
                }
                if($kd != 'search'){
                    if(is_array($vd)){
                        foreach ($vd as $key => $value) {
                            $params[] = $kd . '[' . $key . ']=' . $value;
                        }
                    }else{
                        $params[] = $kd . '=' . $vd;
                    }
                }
            }
            //过滤不在权限范围内的role_id
//            if(isset($where['invoice.create_role_id'])){
//                if(!empty($where['invoice.create_role_id']) && !in_array(intval($where['invoice.create_role_id']),$this->_permissionRes)){
//                    $where['invoice.create_role_id'] = array('in',implode(',', $this->_permissionRes));
//                }
//            }
        }

        //业务形态和时间的筛选
        $type_business = $_GET['type_business'] ? BaseUtils::getStr($_GET['type_business'] ,'string') : '' ;
        $applyed_time = $_GET['applyed_time'] ? BaseUtils::getStr($_GET['applyed_time'],'string') : '' ;
        $applyed_endtime = $_GET['applyed_endtime'] ? BaseUtils::getStr($_GET['applyed_endtime'],'string') : '';
        if($type_business)
            $where['project_type'] = $type_business;
        if ($applyed_time && $applyed_endtime)
            $where['create_time'] = array('between',array(strtotime($applyed_time),strtotime($applyed_endtime)));
        if(! ($applyed_time && $applyed_endtime)){
            if($applyed_time)
                $where['create_time'] = array('gt',strtotime($applyed_time));
            if($applyed_endtime)
                $where['create_time'] = array('lt',strtotime($applyed_endtime));
        }
        header('content-type:text/html;charset=utf-8');
        unset($where['type_business']);
        unset($where['applyed_time']);
        unset($where['applyed_endtime']);

        $where['type'] = $type;
        if(trim($_GET['act']) == 'excel'){
//            if(checkPerByAction('invoice','excelexport')){
            if(1==1){
                $dc_id = $_GET['daochu'];
                if($dc_id !=''){
                    $where['invoice_id'] = array('in',$dc_id);
                }
                unset($where['daochu']);
                unset($where['type']);
                $current_page = intval($_GET['current_page']);
                $export_limit = intval($_GET['export_limit']);
                $limit = ($export_limit*($current_page-1)).','.$export_limit;
                $businessList = $d_invoice->where($where)->order($order)->select();
                session('export_status', 1);
                $this->excelExport($businessList);
            }else{
                alert('error',  L('HAVE NOT PRIVILEGES'),$_SERVER['HTTP_REFERER']);
            }
        }
        if($_GET['listrows']){
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        }else{
            $listrows = 15;
            $params[] = "listrows=".$listrows;
        }

        $p = intval($_GET['p']) ? intval($_GET['p']) : 1;
        $count = $d_invoice->where($where)->count();
        $p_num = ceil($count/$listrows);
        if($p_num<$p){
            $p = $p_num;
        }
        $invoice_list = $d_invoice->where($where)->page($p.','.$listrows)->order($order)->select();
        foreach ($invoice_list as $key=>$list){
            $invoice_list[$key]['examine_content'] = unserialize($list['examine_content']);
            $invoice_list[$key]['billing_content'] = unserialize($list['billing_content']);
            $invoice_list[$key]['money_content'] = unserialize($list['money_content']);
            $invoice_list[$key]['back_content'] = unserialize($list['back_content']);
            $invoice_list[$key]['grant_content'] = unserialize($list['grant_content']);
            $invoice_list[$key]['refund_content'] = unserialize($list['refund_content']);
            $invoice_list[$key]['return_content'] = unserialize($list['return_content']);
        }
        import("@.ORG.Page");
        $Page = new Page($count,$listrows);
        $this->listrows = $listrows;
        $Page->parameter = implode('&', $params);
        $this->assign('page', $Page->show());
        $this->assign('count', $count);
        $this->invoice_list = $invoice_list;
        $this->alert = parseAlert();
        $this->display();



//        $this->param = $param;
//		$this->display();
	}





    public function getCurrentStatus(){
        $this->ajaxReturn(intval(session('export_status')), 'success', 1);

    }


	/**
	 * 发票添加
	 * @param
	 * @author
	 * @return
	 */
	public function add () {
		$m_invoice = M('Invoice');
		if ($this->isPost()) {
			if ($m_invoice->where(array('name'=>trim($_POST['name'])))->find()) {
				$this->error('发票编号已存在！');
			}
			if (!intval($_POST['contract_id'])) {
				$this->error('合同不能为空！');
			}
			if (!intval($_POST['customer_id'])) {
				$this->error('客户不能为空！');
			}
			if ($m_invoice->create()) {
				$m_invoice->create_role_id = session('role_id');
				$m_invoice->create_time = time();
				$m_invoice->update_time = time();
				$m_invoice->invoice_time = strtotime($_POST['invoice_time']);

				if ($invoice_id = $m_invoice->add()) {
					//相关附件
					if($_POST['file']){
						$m_invoice_file = M('RFileInvoice');
						foreach($_POST['file'] as $v){
							$file_data = array();
							$file_data['invoice_id'] = $invoice_id;
							$file_data['file_id'] = $v;
							$m_invoice_file->add($file_data);
						}
					}
					alert('success','添加成功！',U('invoice/index'));
				} else {
					$this->error('添加失败，请重试！');
				}
			}
		}
		$contract_id = $_GET['contract_id'] ? intval($_GET['contract_id']) : 0;
		if ($contract_id) {
			$contract_info = M('Contract')->where(array('contract_id'=>$contract_id))->field('contract_id,customer_id,price,number')->find();
			//未开票金额
			$is_checked_price = M('Invoice')->where(array('contract_id'=>$contract_id,'is_checked'=>array('neq',2)))->sum('price');
			$no_price = round(($contract_info['price']-$is_checked_price),2);
			$contract_info['no_price'] = ($no_price > 0) ? $no_price : '0.00';
			$customer_name = M('Customer')->where(array('customer_id'=>$contract_info['customer_id']))->getField('name');
			//发票数据
			$invoice_data = M('RCustomerInvoice')->where(array('customer_id'=>$contract_info['customer_id']))->find();
			$data = array();
			$data['contract_info'] = $contract_info;
			$data['customer_name'] = $customer_name;
			$data['invoice_data'] = $invoice_data;
			$this->assign('data',$data);
		}
		//生成编号
		$invoice_max_id = $m_invoice->max('invoice_id');
		$invoice_max_id = $invoice_max_id+1;
		$invoice_max_code = str_pad($invoice_max_id,4,0,STR_PAD_LEFT);//填充字符串的左侧（将字符串填充为新的长度）
		$this->name = 'NO'.date('Ymd').'-'.$invoice_max_code;
		$this->display();
	}

//	public function test(){
//        $data['name'] = 222;
//        M('Invoice')->add($data);exit();
//    }

	/**
	 * 发票详情
	 * @param
	 * @author
	 * @return
	 */
	public function view(){
		$invoice_id = $_GET['id'] ? intval($_GET['id']) : 0;
		if(!$invoice_id){
			alert('error','参数错误！',$_SERVER['HTTP_REFERER']);
		}
		$m_invoice = M('Invoice');
		$m_customer = M('Customer');
		$m_contract = M('Contract');
		$m_r_file_invoice = M('RFileInvoice');
		$m_file = M('File');
		$m_user = M('User');
		$invoice_info = $m_invoice->where(array('invoice_id'=>$invoice_id))->find();
		//权限判断
		if(empty($invoice_info)) {
			alert('error', L('THE_CONTRACT_DOES_NOT_EXIST_OR_HAS_BEEN_DELETED'), U('invoice/index'));
		}elseif(!in_array($invoice_info['create_role_id'], $this->_permissionRes)) {
			alert('error',L('DO NOT HAVE PRIVILEGES'),$_SERVER['HTTP_REFERER']);
		}
		switch ($invoice_info['billing_type']) {
			case 1 : $billing_type_name = '增值税普通发票'; break;
			case 2 : $billing_type_name = '增值税专用发票'; break;
			case 3 : $billing_type_name = '收据'; break;
		}
		$invoice_info['billing_type_name'] = $billing_type_name;
		$invoice_info['customer_name'] = $m_customer->where(array('customer_id'=>$invoice_info['customer_id']))->getField('name');
		$invoice_info['contract_num'] = $m_contract->where(array('contract_id'=>$invoice_info['contract_id']))->getField('number');
		$invoice_info['create_info'] = $m_user->where(array('role_id'=>$invoice_info['create_role_id']))->field('full_name,thumb_path')->find();
		if ($invoice_info['is_checked']) {
			$check_role_info = $m_user->where(array('role_id'=>$invoice_info['check_role_id']))->field('full_name,thumb_path')->find();
		}
		$invoice_info['check_role_info'] = $check_role_info ? $check_role_info : array();
		//附件信息
		$file_ids = $m_r_file_invoice->where('invoice_id = %d', $invoice_id)->getField('file_id', true);
		$invoice_info['file'] = $m_file->where('file_id in (%s)', implode(',', $file_ids))->select();
		$file_count = 0;
		foreach ($invoice_info['file'] as $key=>$value) {
			$invoice_info['file'][$key]['owner'] = $m_user->where('role_id = %d', $value['role_id'])->field('full_name')->find();
			$invoice_info['file'][$key]['size'] = ceil($value['size']/1024);
			/*判断文件格式 对应其图片*/
			$houzhui = getExtension($value['name']);
			switch ($houzhui) {
				case 'doc':
					$pic = 'doc.png';
					break;
				case 'docx':
					$pic = 'doc.png';
					break;
				case 'pptx':
					$pic = 'ppt.png';
					break;
				case 'ppt':
					$pic = 'ppt.png';
					break;
				case 'xls':
					$pic = 'excel.png';
					break;
				case 'zip':
					$pic = 'zip.png';
					break;
				case 'zip':
					$pic = 'zip.png';
					break;
				case 'pdf':
					$pic = 'pdf.png';
					break;
				case 'png':
					$pic = 'pic.png';
					break;
				case 'jpg':
					$pic = 'pic.png';
					break;
				case 'jpeg':
					$pic = 'pic.png';
					break;
				case 'gif':
					$pic = 'pic.png';
					break;
				default:
					$pic = 'unknown.png';
					break;
			}
			$invoice_info['file'][$key]['pic'] = $pic;
			$file_count++;
		}
		$invoice_info['file_count'] = $file_count;

		$this->invoice_info = $invoice_info;
		$this->alert = parseAlert();
		$this->display();
	}

	/**
	 * 发票编辑
	 * @param
	 * @author
	 * @return
	 */
	public function edit(){
		$invoice_id = $_REQUEST['id'] ? intval($_REQUEST['id']) : 0;
		if(!$invoice_id){
			alert('error','参数错误！',$_SERVER['HTTP_REFERER']);
		}
		$m_invoice = M('Invoice');
		$m_customer = M('Customer');
		$m_contract = M('Contract');
		$invoice_info = $m_invoice->where(array('invoice_id'=>$invoice_id))->find();
		//权限判断
		if(empty($invoice_info)) {
			alert('error', L('THE_CONTRACT_DOES_NOT_EXIST_OR_HAS_BEEN_DELETED'), U('invoice/index'));
		}elseif(!in_array($invoice_info['create_role_id'], $this->_permissionRes)) {
			alert('error',L('DO NOT HAVE PRIVILEGES'),$_SERVER['HTTP_REFERER']);
		}
		$invoice_info['customer_name'] = $m_customer->where(array('customer_id'=>$invoice_info['customer_id']))->getField('name');
		$invoice_info['contract_info'] = $m_contract->where(array('contract_id'=>$invoice_info['contract_id']))->field('number,price')->find();

		if ($invoice_info['is_checked'] == 1) {
			alert('error','该发票已审核，不能编辑！',$_SERVER['HTTP_REFERER']);
		}

		if ($this->isPost()) {
			if ($m_invoice->where(array('invoice_id'=>array('neq',$invoice_id),'name'=>trim($_POST['name'])))->find()) {
				$this->error('发票编号已存在！');
			}
			if (!intval($_POST['contract_id'])) {
				$this->error('合同不能为空！');
			}
			if (!intval($_POST['customer_id'])) {
				$this->error('客户不能为空！');
			}
			if ($m_invoice->create()) {
				$m_invoice->invoice_time = strtotime($_POST['invoice_time']);
				$m_invoice->update_time = time();
				$m_invoice->is_checked = 0;
				$m_invoice->check_role_id = 0;
				$m_invoice->check_time = 0;

				if ($invoice_id = $m_invoice->where(array('invoice_id'=>$invoice_id))->save()) {
					alert('success','修改成功！',U('invoice/index'));
				} else {
					$this->error('修改失败，请重试！');
				}
			}
		}
		$this->invoice_info = $invoice_info;
		$this->alert = parseAlert();
		$this->display();
	}

	/**
	 * 发票删除
	 * @param
	 * @author
	 * @return
	 */
	public function delete(){
		$m_invoice = M('Invoice');
		$invoice_ids = is_array($_REQUEST['invoice_id']) ? $_REQUEST['invoice_id'] : array($_REQUEST['invoice_id']);
		if ($invoice_ids) {
			//过滤出已审核的发票
			$is_invoice_ids = array();
			$is_invoice_ids = $m_invoice->where(array('invoice_id'=>array('in',$invoice_ids),'is_checked'=>'1'))->getField('invoice_id',true);
			$del_invoice_ids = array();
			if (empty($is_invoice_ids)) {
				$del_invoice_ids = $invoice_ids;
			} else {
				foreach ($invoice_ids as $v) {
					if (!in_array($v,$is_invoice_ids)) {
						$del_invoice_ids[] = $v;
					}
				}
			}

			if ($del_invoice_ids) {
				//权限判断
				foreach ($del_invoice_ids as $v) {
					$invoice_info = $m_invoice->where('invoice_id = %d', $v)->find();
					if (!in_array($invoice_info['create_role_id'], $this->_permissionRes)){
						$this->ajaxReturn('','部分发票无权限，不能批量删除！',0);
					}
				}
				if ($m_invoice->where(array('invoice_id'=>array('in',$del_invoice_ids)))->delete()) {
					//删除相关附件信息
					M('RFileInvoice')->where(array('invoice_id'=>array('in',$del_invoice_ids)))->delete();

					if ($is_invoice_ids) {
						$this->ajaxReturn('','部分发票已审核不能删除，请撤销审核后重新操作！',0);
					} else {
						$this->ajaxReturn('','删除成功！',1);
					}
				} else {
					$this->ajaxReturn('','删除失败，请重试！',0);
				}
			} else {
				$this->ajaxReturn('','已审核的发票不能删除，请撤销审核后重新操作！',0);
			}
		} else {
			$this->ajaxReturn('','参数错误！',0);
		}
	}


	/**
	 * 发票审核
	 * @param
	 * @author
	 * @return
	 */
	public function check(){
		$invoice_id = $_POST['invoice_id'] ? intval($_POST['invoice_id']) : 0;
		$is_agree = $this->_post('is_agree','intval');
		$m_invoice = M('Invoice');
		$invoice_info = $m_invoice->where('invoice_id = %d', $invoice_id)->find();
		if (!$invoice_info) {
			alert('error', '参数错误！',$_SERVER['HTTP_REFERER']);
		}
		if ($invoice_info['is_checked'] != 1) {
			$data = array();
			$is_agree = $_POST['is_agree'] ? intval($_POST['is_agree']) : 0;
			if ($is_agree == 1) {
				$data['is_checked'] = 1;
			} elseif ($is_agree == 2) {
				$data['is_checked'] = 2;
			} else {
				alert('error', '请求错误!', $_SERVER['HTTP_REFERER']);
			}
			$data['check_role_id'] = session('role_id');
			$data['check_time'] = time();
			if ($m_invoice->where(array('invoice_id'=>$invoice_id))->save($data)) {
				//审核记录
				$check_data = array();
				$check_data['invoice_id'] = $invoice_id;
				$check_data['role_id'] = session('role_id');
				$check_data['is_checked'] = $data['is_checked'];
				$check_data['content'] = $_POST['description'];
				$check_data['check_time'] = time();
				M('InvoiceCheck')->add($check_data);
				//发送站内信
				if ($is_agree == 1) {
					$url = U('invoice/view','id='.$invoice_id);
					sendMessage($invoice_info['create_role_id'],'您创建的发票《<a href="'.$url.'">'.$invoice_info['name'].'</a>》<font style="color:green;">已通过审核</font>！',1);
				} else {
					sendMessage($invoice_info['create_role_id'],'您创建的发票《<a href="'.$url.'">'.$invoice_info['name'].'</a>》<font style="color:red;">经审核已被拒绝！请及时更正！</font>！',1);
				}
				alert('success','发票审核成功！',$_SERVER['HTTP_REFERER']);
			}
		} else {
			alert('error', '该发票已审核，请勿重复操作！',$_SERVER['HTTP_REFERER']);
		}
	}

	/**
	 * 发票撤销审核
	 * @param
	 * @author
	 * @return
	 */
	public function revokeCheck(){
		$invoice_id = $_GET['invoice_id'] ? intval($_GET['invoice_id']) : 0;
		$m_invoice = M('Invoice');
		$invoice_info = $m_invoice->where(array('invoice_id'=>$invoice_id))->find();
		if (!$invoice_info) {
			alert('error', L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
		}
		//权限判断
		if (!checkPerByAction('invoice','check')) {
			alert('error',L('DO NOT HAVE PRIVILEGES'),$_SERVER['HTTP_REFERER']);
		}

		if ($invoice_info['is_checked'] != 0) {
			$data = array();
			$data['is_checked'] = 0;
			$data['check_role_id'] = '';
			if ($m_invoice->where(array('invoice_id'=>$invoice_id))->save($data)) {
				//审核记录
				$check_data = array();
				$check_data['invoice_id'] = $invoice_id;
				$check_data['role_id'] = session('role_id');
				$check_data['is_checked'] = 0;
				$check_data['check_time'] = time();
				M('InvoiceCheck')->add($check_data);
				//发送站内信
				$url = U('invoice/view','id='.$invoice_id);
				sendMessage($invoice_info['create_role_id'],'您创建的发票《<a href="'.$url.'">'.$invoice_info['name'].'</a>》<font style="color:red;">已被撤销审核</font>！',1);
				alert('success','撤销审核成功！',$_SERVER['HTTP_REFERER']);
			} else {
				alert('error','撤销审核操作失败！',$_SERVER['HTTP_REFERER']);
			}
		}else{
			alert('error','该发票已撤销审核，请勿重复操作！',$_SERVER['HTTP_REFERER']);
		}
	}

	//审核历史
	public function check_list(){
		$m_invoice_check = M('InvoiceCheck');
		$m_user = M('user');
		$invoice_id = intval($_GET['id']);
		if ($invoice_id) {
			$check_list = $m_invoice_check ->where('invoice_id =%d',$invoice_id)->order('check_id asc')->select();
			foreach ($check_list as $k=>$v) {
				$check_list[$k]['user'] = $m_user ->where('role_id =%d',$v['role_id'])->find();
			}
			$this->check_list = $check_list;
		}
		$this->display();
	}


	/**
	 * 客户下发票数据添加
	 * @param
	 * @author
	 * @return
	 */
	public function addData () {
		$customer_id = $_REQUEST['customer_id'] ? intval($_REQUEST['customer_id']) : 0;
		$m_r_customer_invoice = M('RCustomerInvoice');
		if (!$customer_id) {
			if ($this->isAjax()) {
				$this->ajaxReturn('','参数错误！',0);
			} else {
				echo '<div class="alert alert-error">参数错误！</div>';die();
			}
		}
		$invoice_info = $m_r_customer_invoice->where(array('customer_id'=>$customer_id))->find();
		if ($this->isPost()) {
			if ($m_r_customer_invoice->create()) {
				$m_r_customer_invoice->create_time = time();
				$m_r_customer_invoice->update_time = time();
				$m_r_customer_invoice->create_role_id = session('role_id');
				if ($m_r_customer_invoice->add()) {
					$this->ajaxReturn('','success',1);
				} else {
					$this->ajaxReturn('','添加失败！',0);
				}
			}
		}
		$this->invoice_info = $invoice_info;
		$this->display('add_dialog');
	}

	/**
	 * 客户下发票数据编辑
	 * @param
	 * @author
	 * @return
	 */
	public function editData () {
		$invoice_id = $_REQUEST['invoice_id'] ? intval($_REQUEST['invoice_id']) : 0;
		$m_r_customer_invoice = M('RCustomerInvoice');
		if (!$invoice_id) {
			if ($this->isAjax()) {
				$this->ajaxReturn('','参数错误！',0);
			} else {
				echo '<div class="alert alert-error">参数错误！</div>';die();
			}
		}
		$invoice_info = $m_r_customer_invoice->where(array('id'=>$invoice_id))->find();
		if ($this->isPost()) {
			if ($m_r_customer_invoice->create()) {
				$m_r_customer_invoice->update_time = time();
				if ($m_r_customer_invoice->where(array('id'=>$invoice_id))->save()) {
					$this->ajaxReturn('','success',1);
				} else {
					$this->ajaxReturn('','修改失败！',0);
				}
			}
		}
		$this->invoice_info = $invoice_info;
		$this->display('edit_dialog');
	}

	/**
	 * 客户下发票数据查看
	 * @param
	 * @author
	 * @return
	 */
	public function viewData () {
		$invoice_id = $_REQUEST['invoice_id'] ? intval($_REQUEST['invoice_id']) : 0;
		if (!$invoice_id) {
			echo '<div class="alert alert-error">参数错误！</div>';die();
		}
		$invoice_info = M('RCustomerInvoice')->where(array('id'=>$invoice_id))->find();
		$invoice_info['customer_name'] = M('Customer')->where(array('customer_id'=>$invoice_info['customer_id']))->getField('name');
		//判断编辑权限

		$this->invoice_info = $invoice_info;
		$this->display('view_dialog');
	}


	public function view_ajax(){
        $this->process = array("calllist"=>"CallList","adviser"=>"顾问面试","tj"=>"简历推荐","interview"=>"客户面试","pass"=>"面试通过","offer"=>"Offer","enter"=>"入职","safe"=>"过保");
	    $type = I("type");
        $d_invoice = D('InvoiceView');
        $order = 'update_time desc';
        $where = array();
        $p = intval($_GET['p']) ? intval($_GET['p']) : 1;
        $m_customer = M('Customer');
        $m_contract = M('Contract');
        $m_user = M('User');

        //普通搜索
        if ($_REQUEST["field"]) {
            $field = trim($_REQUEST['field']);
            $search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
            $condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);
            if($field == 'name'){
                $where['_string'] = 'invoice.name like "%'.$search.'%" or contract.number like "%'.$search.'%" or customer.name like "%'.$search.'%"';
            }else{
                switch ($condition) {
                    case "is" : $where[$field] = array('eq',$search);break;
                    case "isnot" :  $where[$field] = array('neq',$search);break;
                    case "contains" :  $where[$field] = array('like','%'.$search.'%');break;
                    case "not_contain" :  $where[$field] = array('notlike','%'.$search.'%');break;
                    case "start_with" :  $where[$field] = array('like',$search.'%');break;
                    case "end_with" :  $where[$field] = array('like','%'.$search);break;
                    case "is_empty" :  $where[$field] = array('eq','');break;
                    case "is_not_empty" :  $where[$field] = array('neq','');break;
                    case "gt" :  $where[$field] = array('gt',$search);break;
                    case "egt" :  $where[$field] = array('egt',$search);break;
                    case "lt" :  $where[$field] = array('lt',$search);break;
                    case "elt" :  $where[$field] = array('elt',$search);break;
                    case "eq" : $where[$field] = array('eq',$search);break;
                    case "neq" : $where[$field] = array('neq',$search);break;
                    case "between" : $where[$field] = array('between',array($search-1,$search+86400));break;
                    case "nbetween" : $where[$field] = array('not between',array($search,$search+86399));break;
                    case "tgt" :  $where[$field] = array('gt',$search+86400);break;
                    default : $where[$field] = array('eq',$search);
                }
            }
            $params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$search);
            //过滤不在权限范围内的role_id
//            if(trim($_REQUEST['field']) == 'create_role_id'){
//                if(!in_array(trim($search),$this->_permissionRes)){
//                    $where['create_role_id'] = array('in',$this->_permissionRes);
//                }
//            }
        }

        //高级搜索
        $fields_search = array();
        if(!$_GET['field']){
            foreach($_GET as $kd => $vd){
                if ($kd != 'act' && $kd != 'content' && $kd != 'p' && $kd != 'search' && $kd != 'listrows' && $kd != 'by') {
                    if(in_array($kd,array('is_checked'))){
                        if(!empty($vd)){
                            $where[$kd] = $vd['value'];
                            $fields_search[$kd]['field'] = $kd;
                            $fields_search[$kd]['value'] = $vd['value'];
                        }
                    }elseif(in_array($kd,array('create_time','update_time'))){
                        $where[$kd] = field($vd['value'], $vd['condition']);
                        $fields_search[$kd]['field'] = $kd;
                        $fields_search[$kd]['start'] = $vd['start'];
                        $fields_search[$kd]['end'] = $vd['end'];
                        $fields_search[$kd]['form_type'] = 'datetime';

                        //时间段查询
                        if ($vd['start'] && $vd['end']) {
                            $where[$kd] = array('between',array(strtotime($vd['start']),strtotime($vd['end'])+86399));
                        } elseif ($vd['start']) {
                            $where[$kd] = array('egt',strtotime($vd['start']));
                        } else {
                            $where[$kd] = array('elt',strtotime($vd['end'])+86399);
                        }
                    }elseif($kd =='create_role_id'){
                        if(!empty($vd)){
                            $where['invoice.create_role_id'] = $vd['value'];
                            $fields_search[$kd]['field'] = $kd;
                            $fields_search[$kd]['value'] = $vd['value'];
                        }
                    }else{
                        if(is_array($vd)) {
                            if(!empty($vd['value'])){
                                $where[$kd] = field($vd['value'], $vd['condition']);
                                $fields_search[$kd]['field'] = $kd;
                                $fields_search[$kd]['condition'] = $vd['condition'];
                                $fields_search[$kd]['value'] = $vd['value'];
                            }
                        }else{
                            if(!empty($vd)){
                                $where[$kd] = field($vd);
                                $fields_search[$kd]['field'] = $kd;
                                $fields_search[$kd]['value'] = $vd['value'];
                            }
                        }
                    }
                }
                if($kd != 'search'){
                    if(is_array($vd)){
                        foreach ($vd as $key => $value) {
                            $params[] = $kd . '[' . $key . ']=' . $value;
                        }
                    }else{
                        $params[] = $kd . '=' . $vd;
                    }
                }
            }
            //过滤不在权限范围内的role_id
//            if(isset($where['invoice.create_role_id'])){
//                if(!empty($where['invoice.create_role_id']) && !in_array(intval($where['invoice.create_role_id']),$this->_permissionRes)){
//                    $where['invoice.create_role_id'] = array('in',implode(',', $this->_permissionRes));
//                }
//            }
        }
        $this->fields_search = $fields_search;

        if($_GET['listrows']){
            $listrows = intval($_GET['listrows']);
            $params[] = "listrows=" . intval($_GET['listrows']);
        }else{
            $listrows = 15;
            $params[] = "listrows=".$listrows;
        }
        $where['type'] = $type;
        $p = intval($_GET['p']) ? intval($_GET['p']) : 1;
        $count = $d_invoice->where($where)->count();
        $p_num = ceil($count/$listrows);
        if($p_num<$p){
            $p = $p_num;
        }

        $invoice_list = $d_invoice->where($where)->page($p.','.$listrows)->order($order)->select();

        foreach ($invoice_list as $key=>$list){
            $invoice_list[$key]['examine_content'] = unserialize($list['examine_content']);
            $invoice_list[$key]['billing_content'] = unserialize($list['billing_content']);
            $invoice_list[$key]['money_content'] = unserialize($list['money_content']);
            $invoice_list[$key]['back_content'] = unserialize($list['back_content']);
            $invoice_list[$key]['grant_content'] = unserialize($list['grant_content']);
            $invoice_list[$key]['refund_content'] = unserialize($list['refund_content']);
            $invoice_list[$key]['return_content'] = unserialize($list['return_content']);
        }
        import("@.ORG.Page");
        $Page = new Page($count,$listrows);
        $this->listrows = $listrows;
        $Page->parameter = implode('&', $params);
        $this->assign('page', $Page->show());
        $this->assign('count', $count);
        $this->invoice_list = $invoice_list;
        $this->alert = parseAlert();
	    $this->display();
    }

	/**
	 * ajax获取客户下发票信息
	 * @param
	 * @author
	 * @return
	 */
	public function customer_invoice() {
		$customer_id = $_POST['customer_id'] ? intval($_POST['customer_id']) : 0;
		if (!$customer_id) {
			$this->ajaxReturn('','参数错误！',0);
		}
		$m_r_customer_invoice = M('RCustomerInvoice');
		$invoice_info = $m_r_customer_invoice->where(array('customer_id'=>$customer_id))->find();
		$this->ajaxReturn($invoice_info ? $invoice_info : array(),'',1);
	}


	public function examine(){
	    $id = I("id");
	    if($this->isPost()){
            if($_POST['type']){
                $data['type'] = "examine";
                $data['is_checked'] = 1;
            }else{
                $data['type'] = "refuse";
                $data['is_checked'] = 2;
            }
            $_POST['addtime'] = time();
            $data['examine_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    public function examine_all(){
        $invoice_id = $_GET['invoice_id']?$_GET['invoice_id']:0;
        $data['type'] = "examine";
        $data['is_checked'] = 1;
        $data['examine_content'] = '批量通过';
        $data['update_time'] = time();
        $result = M("invoice")->where("invoice_id in (%s)",$invoice_id)->save($data);
        if($result)
            alert('success', '发票状态屁量修改成功！', $_SERVER['HTTP_REFERER']);
        else
            alert('error','撤销失败！',$_SERVER['HTTP_REFERER']);
    }

    //退款
    public function refuse(){
        $id = I("id");
        if($this->isPost()){
            $data['type'] = "refund";
            $_POST['addtime'] = time();
            $data['refund_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    //退款
    public function refund(){
        $id = I("id");
        if($this->isPost()){
            $data['type'] = "return";
            $_POST['addtime'] = time();
            $data['return_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    public function count(){
        $id = I("id");
        if($this->isPost()){
            $data['type'] = "billing";
            $_POST['addtime'] = time();
            $_POST['invoice_time'] =strtotime($_POST['ctime']);
            $data['billing_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    public function bill(){
        $id = I("id");
        if($this->isPost()){
            $data['type'] = "money";
            $data['money'] = $_POST['amount'];
            $_POST['addtime'] = time();
            $data['money_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }


    /*
     * 编辑发票
     */
    public function editer(){
        $id = I("id");
        $this->invoice = D("InvoiceView")->where("invoice.invoice_id=%d",$id)->find();

        if($this->isPost()){
            $id = $_POST['invoice_id'];
            $result = M("invoice")->where("invoice_id=%d",$id)->save($_POST);
            $invoice = M("invoice")->where("invoice_id=%d",$id)->find();
            if($result !== false){
                alert('success', '发票修改成功！', U("invoice/index",'&type='.$invoice['type']));
            }else{
                alert('error', '发票修改失败！', U("invoice/index",'&type='.$invoice['type']));
            }
        }
        if(trim($_GET['act']) == 'excel'){

            echo  44;exit();
            if(checkPerByAction('business','excelexport')){
                $dc_id = $_GET['daochu'];
                if($dc_id !=''){
                    $where['business_id'] = array('in',$dc_id);
                }
                $current_page = intval($_GET['current_page']);
                $export_limit = intval($_GET['export_limit']);
                $limit = ($export_limit*($current_page-1)).','.$export_limit;
                $businessList = $d_v_business->where($where)->order($order)->limit($limit)->select();
                session('export_status', 1);
                $this->excelExport($businessList);
            }else{
                alert('error',  L('HAVE NOT PRIVILEGES'),$_SERVER['HTTP_REFERER']);
            }
        }


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
        $field_list = M('Fields')->where('model = \'invoice\'')->order('order_id')->select();
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
     * 分配发票
     */
    public function distribution(){

        $id = I("id");
        header("Content-type: text/html; charset=utf-8");
        $invoice  = M("invoice")->field("money,fine_id,create_role_id")->where("invoice_id=%d",$id)->find();
        $this->user = M("user")->where("user_id=%d",$invoice['create_role_id'])->field("full_name,user_id")->find();
        $this->assign("money",$invoice['money']);

        if($this->isPost()){
            $project = M("fine_project")->where("id=%d",$invoice['fine_id'])->field("resume_id,project_id,com_id,tracker")->find();
            $business = M("business")->where("business_id=%d",$project['project_id'])->field("pro_type")->find();
            $num = count($_POST['user']);
            $map['type'] = "distribution";
            M("invoice")->where("invoice_id=%d",$id)->save($map);
            for ($i=0;$i<=$num;$i++){

                $data = array();
                $data['user_id'] = $_POST['user'][$i];
                $data['integral'] = $_POST['anum'][$i];
                $data['tikect_type'] = $_POST['tikect_type'][$i];
                $data['resume_id'] = $project['resume_id'];
                $data['project_id'] = $project['project_id'];
                $data['com_id'] = $project['com_id'];
                $data['type'] = $business['pro_type'];
                $data['addtime'] = time();
                $result = M("achievement")->add($data);
            }
            if($result){

                alert('success','分配成功！',$_SERVER['HTTP_REFERER']);
            }else{
                alert('error','分配失败！',$_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    public function distribution_int(){

        $id = I("id");
        header("Content-type: text/html; charset=utf-8");
        $invoice  = M("invoice")->field("money,fine_id,create_role_id")->where("invoice_id=%d",$id)->find();
        $createUserId = $invoice['create_role_id'];
        $userInfo= M("user")->where("role_id=%d",$createUserId)->find();
        $this->user_name = $userInfo['full_name'];
        $this->assign("money",$invoice['money']);
        $this->assign("createUserId",$userInfo['user_id']);

        if($this->isPost()){
            $project = M("fine_project")->where("id=%d",$invoice['fine_id'])->field("resume_id,project_id,com_id,tracker")->find();
            $business = M("business")->where("business_id=%d",$project['project_id'])->field("pro_type")->find();
            $data = array();
            $data['user_id'] = $_POST['user'];
            $data['integral'] = $_POST['anum'];
            $data['tikect_type'] = $_POST['tikect_type'];
            $data['resume_id'] = $project['resume_id'];
            $data['project_id'] = $project['project_id'];
            $data['com_id'] = $project['com_id'];
            $data['type'] = $business['pro_type'];
            $data['addtime'] = time();

            $map['type'] = "distribution";

            M("invoice")->where("invoice_id=%d",$id)->save($map);
            $result = M("achievement")->add($data);

            if($result){

                alert('success','分配成功！',$_SERVER['HTTP_REFERER']);
            }else{
                alert('error','分配失败！',$_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }


    /*
     * 发放发票
     */
    public function sendout(){
        $id = I("id");
        if($this->isPost()){
            $data['type'] = "grant";
            $_POST['addtime'] = time();
            $data['grant_content'] = serialize($_POST);
            $data['update_time'] = time();
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success', '发票状态修改成功！', $_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }

    /*
     * 返回上一次操作
     */
    public function goback(){
        if($this->isPost()){
            $id = I("id");
            $invoice = M("invoice")->field("type")->where("invoice_id=%d",$id)->find();
            $data['type'] = $this->historyArr[$invoice['type']];
            $data[$data['type']."_content"] = "";
            $_POST['addtime'] = time();
            $data['back_content'] = serialize($_POST);
            $result = M("invoice")->where("invoice_id=%d",$id)->save($data);
            if($result){
                alert('success','回退成功！',$_SERVER['HTTP_REFERER']);
            }else{
                alert('error','回退失败！',$_SERVER['HTTP_REFERER']);
            }
        }
        $this->display();
    }


    /*
     * 发票撤销
     */
    public function revoke(){
        $invoice_id = $_GET['invoice_id']?$_GET['invoice_id']:0;
        if($invoice_id){
            $result = M("invoice")->where("invoice_id in (%s)",$invoice_id)->delete();
            if($result){
                alert('success','撤销成功！',$_SERVER['HTTP_REFERER']);
            }else{
                alert('error','撤销失败！',$_SERVER['HTTP_REFERER']);
            }
        }

    }

	/**
	 * ajax获取合同下已收发票总额
	 * @param
	 * @author
	 * @return
	 */
	public function getContractInvoice() {
		if ($this->isAjax()) {
			$contract_id = $_GET['contract_id'] ? intval($_GET['contract_id']) : 0;
			if (!$contract_id) {
				$this->ajaxReturn('','error',0);
			}
			$invoice_price = M('Invoice')->where(array('contract_id'=>$contract_id,'is_checked'=>array('neq',2)))->sum('price');
			$data['data'] = $invoice_price ? $invoice_price : '0';
			$data['info'] = 'success';
			$data['status'] = 1;
			$this->ajaxReturn($data,'JSON');
		}
	}
}
