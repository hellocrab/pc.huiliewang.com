<?php
/**
*商机模块
*
**/
class BusinessAction extends Action{
	/**
	*用于判断权限
	*@permission 无限制
	*@allow 登录用户可访问
	*@other 其他根据系统设置
	**/
	public function _initialize(){
	    $title="项目管理";
    	$this->assign("title",$title);
		$action = array(
			'permission'=>array(),
			'allow'=>array('validate','check','revert','getsalesfunnel','getcurrentstatus','choose','return_choose','product_view','advance_search','addduibi','view_ajax','getbusinessstatus')
		);
		B('Authenticate', $action);
		$this->_permissionRes = getPerByAction(MODULE_NAME,ACTION_NAME);
	}

	/**
	*Ajax检测商机名称
	*
	**/
	public function check() {
		if($_REQUEST['business_id']){
			$where['business_id'] = array('neq',$_REQUEST['business_id']);
		}
		import("@.ORG.SplitWord");
		$sp = new SplitWord();
		$m_business = M('Business');
		$useless_words = array(L('COMPANY'),L('LIMITED'),L('DI'),L('LIMITED_COMPANY'));
		if ($this->isAjax()) {
			$split_result = $sp->SplitRMM($_POST['name']);
			if(!is_utf8($split_result)) $split_result = iconv("GB2312//IGNORE", "UTF-8", $split_result) ;
			$result_array = explode(' ',trim($split_result));
			if(count($result_array) < 2){
				$this->ajaxReturn(0,'',0);
				die;
			}
			foreach($result_array as $k=>$v){
				if(in_array($v,$useless_words)) unset($result_array[$k]);
			}
			$name_list = $m_business->where($where)->getField('name', true);
			$seach_array = array();
			foreach($name_list as $k=>$v){
				$search = 0;
				foreach($result_array as $k2=>$v2){
					if(strpos($v, $v2) > -1){
						$v = str_replace("$v2","<span style='color:red;'>$v2</span>", $v, $count);
						$search += $count;
					}
				}
				if($search > 2) $seach_array[$k] = array('value'=>$v,'search'=>$search);
			}
			$seach_sort_result = array_sort($seach_array,'search','desc');
			if(empty($seach_sort_result)){
				$this->ajaxReturn(0,L('ABLE_ADD'),0);
			}else{
				$this->ajaxReturn($seach_sort_result,L('CUSTOMER_IS_CREATED'),1);
			}
		}
	}

	/**
	*商机列表页（默认页面）
	*
	**/
	public function index(){

        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";
		$d_v_business = D('BusinessTopView');
		$below_ids = getPerByAction(MODULE_NAME,ACTION_NAME,true);
		$p = isset($_GET['p']) ? intval($_GET['p']) : 1 ;
		$by = isset($_GET['by']) ? trim($_GET['by']) : 'me';
		$where = array();
		$params = array();

		$order = "top.set_top desc, top.top_time desc ,business_id desc";

		if($_GET['desc_order']){
			$order = 'top.set_top desc, top.top_time desc ,'.trim($_GET['desc_order']).' desc,business_id asc';
		}elseif($_GET['asc_order']){
			$order = 'top.set_top desc, top.top_time desc ,'.trim($_GET['asc_order']).' asc,business_id asc';
		}

		switch ($by) {
			case 'create' : $where['business.creator_role_id'] = session('role_id'); break;
			case 'sub' : $where['business.owner_role_id'] =array('in',$below_ids); break;
			case 'subcreate' :
				$where['creator_role_id'] =array('in',$below_ids); break;
			case 'today' :
				$where['business.owner_role_id'] = session('role_id');
				$where['nextstep_time'] =  array(array('lt',strtotime(date('Y-m-d', time()))+86400), array('gt',0), 'and');
				break;
			case 'week' :
				$where['nextstep_time'] =  array(array('lt',strtotime(date('Y-m-d', time())) + (8-date('N', time())) * 86400), array('gt', 0),'and');
				break;
			case 'month' :
				$where['nextstep_time'] =  array(array('lt',strtotime(date('Y-m-01', strtotime('+1 month')))), array('gt', 0),'and');
				break;
			case 'd7' :
				$where['update_time'] =  array('lt',strtotime(date('Y-m-d', time()))-86400*6);
				break;
			case 'd15' :
				$where['update_time'] =  array('lt',strtotime(date('Y-m-d', time()))-86400*14);
				break;
			case 'd30' :
				$where['update_time'] =  array('lt',strtotime(date('Y-m-d', time()))-86400*29);
				break;
			case 'deleted' : $where['is_deleted'] = 1; break;
			case 'add' : $order = 'business.create_time desc,business.business_id asc'; break;
			case 'update' : $order = 'business.update_time desc,business.business_id asc'; break;
			case 'me' : $where['business.owner_role_id'] = session('role_id'); break;
			default :
				$where['business.owner_role_id'] = array('in',implode(',', $this->_permissionRes));
				break;
		}
		if ($_REQUEST["field"]) {
			$field = trim($_REQUEST['field']);
			$search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
			$condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

			if($field =="customer_id"){
				$c_where['name'] = array('like','%'.$search.'%');
				//权限
				$customer_ids = M('Customer')->where($c_where)->getField('customer_id',true);
				$where[$field] = array('in',$customer_ids);
			}elseif($field =="status_id"){
				unset($where['status_id']);
			}elseif($field == 'name'){
				//获取客户ID
				$cus_where['name'] = array('like','%'.$search.'%');
				$customer_ids = M('Customer')->where($cus_where)->getField('customer_id',true);
				$customer_str = implode(',',$customer_ids);
				//获取联系人ID
				$c_where['_string'] = 'name like "%'.$search.'%" or telephone like "%'.$search.'%"';
				$contacts_ids = M('contacts')->where($c_where)->getField('contacts_id',true);
				$contacts_str = implode(',',$contacts_ids);
				if($customer_str && $contacts_str){
					$where['_string'] = 'business.name like "%'.$search.'%" or business.customer_id in ('.$customer_str.') or business.contacts_id in ('.$contacts_str.')';
				}elseif($customer_str){
					$where['_string'] = 'business.name like "%'.$search.'%" or business.customer_id in ('.$customer_str.')';
				}elseif($contacts_str){
					$where['_string'] = 'business.name like "%'.$search.'%" or business.contacts_id in ('.$contacts_str.')';
				}else{
					$where['_string'] = 'business.name like "%'.$search.'%"';
				}

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
			$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$search );
			//过滤不在权限范围内的role_id
			if(trim($_REQUEST['field']) == 'owner_role_id'){
				if(!in_array(trim($search),$below_ids)){
					$where['owner_role_id'] = array('in',$below_ids);
				}
			}
		}
        $check_field_arr = M('Fields')->where(array('model'=>'business','form_type'=>'box','setting'=>array('like','%'."'type'=>'checkbox'".'%')))->getField('field',true);
        //高级搜索
        if(!$_GET['field']){
            $no_field_array = array('act','content','p','condition','listrows','daochu','this_page','current_page','export_limit','desc_order','asc_order','selectexcelxport','by','scene_id','order_field','order_type');
            foreach($_GET as $k=>$v){
                if(!in_array($k,$no_field_array)){
                    if(is_array($v)){
                        if ($v['state']){
                            $address_where[] = '%'.$v['state'].'%';

                            if($v['city']){
                                $address_where[] = '%'.$v['city'].'%';

                                if($v['area']){
                                    $address_where[] = '%'.$v['area'].'%';
                                }
                            }
                            if($v['search']) $address_where[] = '%'.$v['search'].'%';

                            if($v['condition'] == 'not_contain'){
                                $where[$k] = array('notlike', $address_where, 'OR');
                            }else{
                                $where[$k] = array('like', $address_where, 'AND');
                            }
                        } elseif (($v['start'] != '' || $v['end'] != '')) {
                            if($k == 'create_time'){
                                $k = 'customer.create_time';
                            }elseif($k == 'update_time'){
                                $k = 'customer.update_time';
                            }
                            //时间段查询
                            if ($v['start'] && $v['end']) {
                                $where[$k] = array('between',array(strtotime($v['start']),strtotime($v['end'])+86399));
                            } elseif ($v['start']) {
                                $where[$k] = array('egt',strtotime($v['start']));
                            } else {
                                $where[$k] = array('elt',strtotime($v['end'])+86399);
                            }
                        } elseif(($v['value']) != '') {
                            if (in_array($k,$check_field_arr)) {
                                $where[$k] = field($v['value'],'contains');
                            } else {
                                if($k == 'status_id'){
                                    $business_map['status_id'] = $v['value'];
                                }else{
                                    // $v['condition'] = $v['condition'] ? : 'contains';
                                    $where[$k] = field($v['value'],$v['condition']);
                                }
                            }
                        }
                    }else{
                        if(!empty($v)){
                            $where[$k] = field($v);
                        }
                    }
                }
                if($k == 'customer.create_time'){
                    $k = 'create_time';
                }elseif($k == 'customer.update_time'){
                    $k = 'update_time';
                }
                if(is_array($v)){
                    foreach ($v as $key => $value) {
                        $params[] = $k.'['.$key.']='.$value;
                    }
                }else{
                    $params[] = $k.'='.$v;
                }
            }
            //过滤不在权限范围内的role_id
            if(isset($where['owner_role_id'])){
                if(is_array($where['owner_role_id']) && $where['owner_role_id']['1'] && !in_array(intval($where['owner_role_id']['1']),$this->_permissionRes)){
                    $where['owner_role_id'] = array('in',implode(',', $this->_permissionRes));
                }
            }
        }
        //高级搜索字段
        $fields_list_data = M('Fields')->where(array('model'=>array('in',array('','customer')),'is_main'=>1))->field('field,form_type')->select();
        foreach($fields_list_data as $k=>$v){
            $fields_data_list[$v['field']] = $v['form_type'];
        }
        $fields_search = array();
        foreach($params as $k=>$v){
            if(strpos($v,'[condition]=') || strpos($v,'[value]=') || strpos($v,'[state]=') || strpos($v,'[city]=') || strpos($v,'[area]=') || strpos($v,'[start]=') || strpos($v,'[end]=')){
                $field = explode('[',$v);

                if(strpos($field[0],'.')){
                    $ex_field = explode('.',$field[0]);
                    $field[0] = $ex_field[1];
                }

                if (strpos($v,'[condition]=')) {
                    $condition = explode('=',$v);
                    $fields_search[$field[0]]['field'] = $field[0];
                    $fields_search[$field[0]]['condition'] = $condition[1];
                } elseif (strpos($v,'[state]=')) {
                    $state = explode('=',$field[1]);
                    $fields_search[$field[0]]['state'] = $state[1];
                } elseif (strpos($v,'[city]=')) {
                    $city = explode('=',$field[1]);
                    $fields_search[$field[0]]['city'] = $city[1];
                } elseif (strpos($v,'[area]=')) {
                    $area = explode('=',$field[1]);
                    $fields_search[$field[0]]['area'] = $area[1];
                } elseif (strpos($v,'[start]=')) {
                    $start = explode('=',$field[1]);
                    $fields_search[$field[0]]['field'] = $field[0];
                    $fields_search[$field[0]]['start'] = $start[1];
                } elseif (strpos($v,'[end]=')) {
                    $end = explode('=',$field[1]);
                    $fields_search[$field[0]]['end'] = $end[1];
                } else {
                    $value = explode('=',$v);
                    if($fields_search[$field[0]]['field']){
                        $fields_search[$field[0]]['value'] = $value[1];
                    }else{
                        $fields_search[$field[0]]['field'] = $field[0];
                        $fields_search[$field[0]]['condition'] = 'eq';
                        $fields_search[$field[0]]['value'] = $value[1];
                    }
                }
                $fields_search[$field[0]]['form_type'] = $fields_data_list[$field[0]];
            }
        }

		if (!isset($where['is_deleted'])) {
			$where['is_deleted'] = 0;
		}
		if (!isset($where['business.owner_role_id'])) {
			//权限
			$where['business.owner_role_id'] = array('in', $this->_permissionRes);
		}
		//商机状态
		if($_GET['status_id']){
            $where['status_id'] = intval($_GET['status_id']);
            $params[] = 'status_id='.intval($_GET['status_id']);
        }

        if($_GET['pro_type']){
            $where['pro_type'] = $_GET['pro_type'];
            $params[] = 'pro_type='.$_GET['pro_type'];
        }
		//商机状态分组
		if($_GET['status_type_id']){
			$where['status_type_id'] = intval($_GET['status_type_id']);
			$params[] = 'status_type_id='.intval($_GET['status_type_id']);
		}

		$order = empty($order) ? 'update_time desc,business_id asc' : $order;
		if(trim($_GET['act']) == 'excel'){
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
		if($_GET['listrows']){
			$listrows = intval($_GET['listrows']);
			$params[] = "listrows=" . intval($_GET['listrows']);
		}else{
			$listrows = 15;
			$params[] = "listrows=".$listrows;
		}
		import("@.ORG.Page");

		//过滤空商机
		// $where['code'] = array('neq','');
		// $where['name'] = array('neq','..');
		$list = $d_v_business->where($where)->order($order)->page($p.','.$listrows)->select();
		$count =  $d_v_business->where($where)->count();
		$p_num = ceil($count/$listrows);
		if($p_num<$p){
			$p = $p_num;
		}

		$Page = new Page($count,$listrows);
		if (!empty($_GET['by'])) {
			$params[] = "by=".trim($_GET['by']);
		}
		$this->parameter = implode('&', $params);
		//by_parameter(特殊处理)
		$this->by_parameter = str_replace('by='.$_GET['by'], '', implode('&', $params));

		if ($_GET['desc_order']) {
			$params[] = "desc_order=" . trim($_GET['desc_order']);
		} elseif($_GET['asc_order']){
			$params[] = "asc_order=" . trim($_GET['asc_order']);
		}

		$Page->parameter = implode('&', $params);
		$this->assign('page', $Page->show());

		$m_user = M('User');
		$m_customer = M('Customer');
		$m_business_status = M('BusinessStatus');
		$m_contacts = M('Contacts');
		$m_r_business_contacts = M('RBusinessContacts');
		$m_r_contacts_customer = M('RContactsCustomer');

		$m_remind = M('Remind');
		$m_receivables = M('Receivables');
		$m_receivingorder = M('Receivingorder');
		$m_contract = M('Contract');
		$m_r_business_product = M('RBusinessProduct');
		$d_business_product = D('BusinessProductView');
		$m_business_data = M('BusinessData');

		foreach($list as $k => $v){
			//判断附表
			if (!$m_business_data->where(array('business_id'=>$v['business_id']))->find()) {
				$res_data = array();
				$res_data['business_id'] = $v['business_id'];
				$m_business_data->add($res_data);
			}
			$list[$k]['owner'] = $m_user->where('role_id = %d', $v['owner_role_id'])->field('full_name,role_id')->find();
			$list[$k]['creator'] = $m_user->where('role_id = %d', $v['creator_role_id'])->field('full_name,role_id')->find();
			//相关客户
			$list[$k]['customer_name'] = $m_customer->where('customer_id = %s',$v['customer_id'])->getField('name');
			//商机联系人
			$business_contacts_id = $m_r_business_contacts->where('business_id = %d',$v['business_id'])->order('id desc')->getField('contacts_id');
			if(!$business_contacts_id){
				//客户联系人
				$contacts_id = $m_r_contacts_customer->where('customer_id = %d',$v['customer_id'])->order('id desc')->getField('contacts_id');
			}else{
				$contacts_id = $business_contacts_id;
			}
			if($contacts_id){
				$contacts_info = array();
				$contacts_info = $m_contacts->where('contacts_id = %d',$contacts_id)->field('name,telephone')->find();
				$list[$k]['c_telephone'] = $contacts_info['telephone'];
				$list[$k]['contacts_name'] = $contacts_info['name'];
				$list[$k]['contacts_id'] = $contacts_id;
			}

			//提醒
			$remind_info = array();
			$remind_info = $m_remind->where(array('module'=>'business','module_id'=>$v['business_id'],'create_role_id'=>session('role_id'),'is_remind'=>array('neq',1)))->order('remind_id desc')->find();
			$list[$k]['remind_time'] = !empty($remind_info) ? $remind_info['remind_time'] : '';
			//产品名称
			$product_name = array();
			$product_name = $d_business_product->where('r_business_product.business_id = (%d)', $v['business_id'])->getField('name',true);
			if($product_name){
				if(count($product_name) > 1){
					$list[$k]['product_name'] = $product_name[0].'、...';
				}else{
					$list[$k]['product_name'] = $product_name[0];
				}
			}
			//进度
			$status_info = $m_business_status->where(array('status_id'=>$v['status_id'],'type_id'=>$v['status_type_id']))->field('name,order_id,is_end')->find();

			$status_count = $m_business_status->where(array('type_id'=>$v['status_type_id']))->count();
			$list[$k]['status_info'] = $status_info;
			$status_order = $status_info['order_id'];
			$progress = intval($status_order/$status_count > 1 ? 100 : $status_order*100/$status_count);
			$list[$k]['progress'] = $progress;
			//收款进度
			$contract_info = $m_contract->where('business_id = %d',$v['business_id'])->field('contract_id,price')->find();
			$schedule = 0;
			if($contract_info){
				//应收款
				$receivables_id = $m_receivables->where('contract_id = %d',$contract_info['contract_id'])->getField('receivables_id');
				//回款金额
				$sum_price = 0;
				$sum_price = $m_receivingorder->where(array('receivables_id'=>$receivables_id,'status'=>1))->sum('money');
				//当前收款进度
				if($sum_price){
					if($contract_info['price'] == 0 || $contract_info['price'] == ''){
						$schedule = 100;
					}else{
						$schedule = round(($sum_price/$contract_info['price'])*100,2);
					}
				}
			}
			$list[$k]['schedule'] = $schedule;
            if($list[$k]['address']){
                $arr = array();
                $address = explode(",",$list[$k]['address']);
                foreach ($address as $li){
                    $arr[] = $city_name[$li];
                }
                $list[$k]['address'] = implode(",",$arr);
            }

 		}

 		//商机状态分类
 		$this->status_type_list = M('BusinessType')->select();
 		$status_type_id = $_GET['status_type_id'] ? intval($_GET['status_type_id']) : 1;
 		//商机状态
 		$status_list = $m_business_status->where(array('type_id'=>$status_type_id))->order('order_id asc')->select();
 		$this->status_list = $status_list;
 		//自定义字段
 		$field_array = getIndexFields('business');
 		$name_field_array = array();
		foreach($field_array as $k=>$v){
			if($v['field'] != 'name'){
				$name_field_array[] = $v;
			}
		}
		$this->field_array = $name_field_array;
        $this->fields_search = $fields_search;
		$this->listrows = $listrows;
		$this->assign('list',$list);
		$this->assign('count',$count);
		$this->alert = parseAlert();
	    $this->display();
	}

	/**
	*添加商机
	*
	**/
	public function add(){
		$m_config = M('Config');
		$m_business = D('Business');
		$m_business_data = D('BusinessData');
        $user = M('user')->where('status =%d',1)->field('full_name,user_id')->select();
        $this->assign("user",$user);
		if ($this->isPost()) {
			$m_r_business_product = M('RBusinessProduct');

			$customer_id = intval($_POST['customer_id']);
			if(empty($customer_id)){
				$this->error(L('THE_CUSTOMER_CANNOT_BE_EMPTY'));
			}
			// if(count($_POST['business']['product']) == 0){
			// 	$this->error('请至少选择一个产品');
			// }
			$field_list = M('Fields')->where(array('model'=>'business','in_add'=>1))->order('order_id')->select();
			foreach ($field_list as $v){
				switch($v['form_type']) {
					case 'address':
						$_POST[$v['field']] = implode(chr(10),$_POST[$v['field']]);
					break;
					case 'datetime':
						$_POST[$v['field']] = strtotime($_POST[$v['field']]);
					break;
					case 'box':
						eval('$field_type = '.$v['setting'].';');
						if($field_type['type'] == 'checkbox'){
							$b = array_filter($_POST[$v['field']]);
							$_POST[$v['field']] = !empty($b) ? implode(chr(10),$b) : '';
						}
					break;
				}
			}
			if($m_business->create()){
				if($m_business_data->create() !== false){
					//商机状态
					$m_business->status_id = $_POST['status_id'] ? intval($_POST['status_id']) : 0;
					$m_business->status_type_id = $_POST['status_type_id'] ? intval($_POST['status_type_id']) : 1;
					$m_business->create_time = $m_business->update_time = time();
					$m_business->creator_role_id = $m_business->owner_role_id = session('role_id');
					//商机编号
					$business_custom = $m_config->where('name = "business_custom"')->getField('value');
					$business_max_id = $m_business->max('business_id');
					$business_max_code = str_pad($business_max_id+1,4,0,STR_PAD_LEFT);//填充字符串的左侧（将字符串填充为新的长度）
					$code = $business_custom.date('Ymd').'-'.$business_max_code;

					if (empty($_POST['name'])) {
						$m_business->name = $code;
					}
					$m_business->code = $_POST['code'] ? trim($_POST['code']) : $code;
					$m_business->prefixion = $business_custom;
					if ($business_id = $m_business->add()) {
						$m_business_data->business_id = $business_id;
						if ($m_business_data->add()) {
							//商机关联联系人
							if($_POST['contacts_id']){
								$contacts_data = array();
								$contacts_data['business_id'] = $business_id;
								$contacts_data['contacts_id'] = intval($_POST['contacts_id']);
								$res = M('RBusinessContacts')->add($contacts_data);
							}
							if($business_id){
								//客户到期时间
								$m_customer = M('Customer');
								$m_customer->where('customer_id = %d',$customer_id)->setField('update_time',time());
								//关联产品信息
								$business_product_ids = $_POST['business']['product'];
								foreach($business_product_ids as $k=>$v){
									$product_data = array();
									$product_data['business_id'] = $business_id;
									$product_data['product_id'] = $v['product_id'];
									$product_data['ori_price'] = $v['ori_price'];
									$product_data['discount_rate'] = $v['discount_rate'];
									$product_data['unit_price'] = $v['unit_price'];
									$product_data['amount'] = $v['amount'];
									$product_data['subtotal'] = $v['subtotal'];
									$product_data['unit'] = $v['unit'];
									$m_r_business_product->add($product_data);
								}
								//相关附件
								if($_POST['file']){
									$m_business_file = M('RBusinessFile');
									foreach($_POST['file'] as $v){
										$file_data = array();
										$file_data['business_id'] = $business_id;
										$file_data['file_id'] = $v;
										$m_business_file->add($file_data);
									}
								}
								//判断商机状态
								$status_info = M('BusinessStatus')->where(array('type_id'=>intval($_POST['status_type_id']),'status_id'=>intval($_POST['status_id'])))->find();

								if($status_info['is_end'] == 3){
									$m_customer->where('customer_id = %d', $customer_id)->setField('is_locked',1);
								}
								actionLog($business_id);
								if ($_POST['submit'] == L('SAVE') || $_POST['submit'] == '保存商机') {
									alert('success', L('ADD_BUSINESS_SUCCESS'), U('customer/view','id='.$customer_id));
								} else {
									alert('success', L('ADD_BUSINESS_SUCCESS'), $_SERVER['HTTP_REFERER']);
								}
							} else {
								$this->error(L('ADD_BUSINESS_FAILURE'));
							}
						}
					}
				} else {
					$this->error($m_business_data->getError());
				}
			}else{
				$this->error($m_business->getError());
			}
		}else{
			//商机编号
			$business = array();
			$business_custom = $m_config->where('name = "business_custom"')->getField('value');
			// $business_max_id = $m_config->where(array('name'=>'business_code'))->getField('value');
			$business_max_id = $m_business->max('business_id');
			$business_max_code = str_pad($business_max_id+1,4,0,STR_PAD_LEFT);//填充字符串的左侧（将字符串填充为新的长度）
			$code = date('Ymd').'-'.$business_max_code;
			$business['code'] = $code;
			$business['business_custom'] = $business_custom;
			$business['name'] = "";
			//商机状态组
			$this->type_list = M('BusinessType')->select();
			//商机状态
			$status_list = M('BusinessStatus')->where(array('type_id'=>1))->order('order_id asc')->select();
			if($_GET['customer_id']){
				$customer_id = intval($_GET['customer_id']);
				$customer_info = M('Customer')->where('customer_id = %d',$customer_id)->field('name,contacts_id')->find();
				if(!$customer_info){
					alert('error','参数错误！',U('business/index'));
				}
				//如果存在首要联系人，则查出首要联系人。否则查出联系人中第一个。
				$contacts = array();
				$m_contacts = M('Contacts');
				if(!empty($customer_info['contacts_id'])){
					$contacts_info = $m_contacts->where('is_deleted = 0 and contacts_id = %d',$customer_info['contacts_id'])->field('name')->find();
					$business['contacts_id'] = $customer_info['contacts_id'];
					$business['contacts_name'] = $contacts_info['name'];
				}else{
					$contacts_customer = M('RContactsCustomer')->where('customer_id = %d',$customer_id)->limit(1)->order('id desc')->select();

					if(!empty($contacts_customer)){
						$contacts_info = $m_contacts->where('is_deleted = 0 and contacts_id = %d',$contacts_customer[0]['contacts_id'])->field('name')->find();
					}
					$business['contacts_id'] = $contacts_customer[0]['contacts_id'];
					$business['contacts_name'] = $contacts_info['name'];
				}
				$business['customer_id'] = $customer_id;
				$business['customer_name'] = $customer_info['name'];
			}
			$this->status_list = $status_list;
			//可能性
			$possibility_list = array();
			for ($x=1; $x<=10; $x++) {
				$possibility_list[] = $x*10;
			}
			$this->possibility_list = $possibility_list;
			$this->business = $business;

			 $where['isdelete']='0';
            $company_list = M('customer')->where($where)->select();
            $this->company_list =$company_list;

			//自定义字段
			$this->field_list = field_list_html('add','business');
			$this->alert = parseAlert();
			$this->display();
		}
	}



	/**
	*修改商机
	*
	**/
	public function edit(){
		if($this->isPost()){
			$business_id = $_POST['business_id'] ? intval($_POST['business_id']) : '';
		}else{
			$business_id = $_GET['id'] ? intval($_GET['id']) : '';
		}
		$d_business = D('BusinessView');
		$m_customer = M('Customer');
		$m_contacts = M('Contacts');
		$m_r_business_product = M('RBusinessProduct');
		$m_product = M('product');

		$business_info = $d_business->where(array('business.business_id'=>$business_id))->find();
		if(!$business_info){
			alert('error','数据不存在或已删除！',$_SERVER['HTTP_REFERER']);
		}
		$m_business_data = M('BusinessData');
		//判断附表
		if (!$m_business_data->where(array('business_id'=>$business_info['business_id']))->find()) {
			$res_data = array();
			$res_data['business_id'] = $business_info['business_id'];
			$m_business_data->add($res_data);
		}

		//判断权限
		$below_ids = getPerByAction('business','edit');
		if($business_info && !in_array($business_info['owner_role_id'],$below_ids)){
			alert('error','您没有此权利！',$_SERVER['HTTP_REFERER']);
		}
		$field_list = M('Fields')->where('model = "business"')->order('order_id')->select();

		if($this->isPost()){
			$m_business = D('Business');
			$m_business_data = D('BusinessData');
			foreach ($field_list as $v){
				switch($v['form_type']) {
					case 'address':
						$_POST[$v['field']] = implode(chr(10),$_POST[$v['field']]);
					break;
					case 'datetime':
						$_POST[$v['field']] = strtotime($_POST[$v['field']]);
					break;
					case 'box':
						eval('$field_type = '.$v['setting'].';');
						if($field_type['type'] == 'checkbox'){
							$_POST[$v['field']] = implode(chr(10),$_POST[$v['field']]);
						}
					break;
				}
			}
			if($m_business->create()){
				$m_business->update_time = time();
				if ($m_business_data->create() !== false) {
					$a = $m_business->save();
					if ($m_business_data->where(array('business_id'=>$business_id))->find()) {
						$b = $m_business_data->save();
					} else {
						$m_business_data->business_id = $business_id;
						$b = $m_business_data->add();
					}

					if ($a && $b !== false) {
						if($_POST['contacts_id']){
							$contacts_data = array();
							$contacts_data['contacts_id'] = intval($_POST['contacts_id']);
							$res = M('RBusinessContacts')->where('business_id = %d',$business_id)->find();
							if ($res) {
								M('RBusinessContacts')->where('business_id = %d',$business_id)->save($contacts_data);
							} else {
								$contacts_data['business_id'] = $business_id;
								M('RBusinessContacts')->add($contacts_data);
							}
						}
						$update_res = true;
						$add_res = true;
						$delete_res = true;
						//有r_id的为更新，之前有现在无的为删除，其他的为新增
						$old_r_ids = $m_r_business_product->where('business_id = %d', $business_id)->getField('id',true);
						$new_r_ids = array();
						$business_product_ids = $_POST['business']['product'];
						foreach($business_product_ids as $v){
							$new_r_ids[] = $v['r_id'];
						}
						//获取差集(需要删除的r_id)
						$delete_r_ids = array_diff($old_r_ids,$new_r_ids);
						foreach($business_product_ids as $v){
							$product_data = array();
							$product_data['business_id'] = $business_id;
							$product_data['product_id'] = $v['product_id'];
							$product_data['ori_price'] = $v['ori_price'];
							$product_data['discount_rate'] = $v['discount_rate'];
							$product_data['unit_price'] = $v['unit_price'];
							$product_data['amount'] = $v['amount'];
							$product_data['subtotal'] = $v['subtotal'];
							$product_data['unit'] = $v['unit'];
							if(!empty($v['r_id'])){
								//更新
								$update_res = $m_r_business_product->where('id = %d',$v['r_id'])->save($product_data);
							}else{
								//添加
								$add_res = $m_r_business_product->add($product_data);
							}
						}
						//删除
						if($delete_res){
							$delete_res = $m_r_business_product->where(array('id'=>array('in',$delete_r_ids)))->delete();
						}
						alert('success','修改商机成功！',U('business/view','id='.$business_id));
					}else{
						alert('error','修改失败，请重试！',$_SERVER['HTTP_REFERER']);
					}
				}
			} else {
				$this->error($m_business->getError());
			}
		}else{
			//商机状态
			$status_list = M('BusinessStatus')->where(array('type_id'=>$business_info['status_type_id']))->order('order_id asc')->select();
			//商机状态组
			$this->type_list = M('BusinessType')->select();
			//客户
			$customer_name = $m_customer->where('customer_id = %d',$business_info['customer_id'])->getField('name');
			$business_info['customer_name'] = $customer_name;
			//联系人
			$contacts_name = $m_contacts->where('contacts_id = %d',$business_info['contacts_id'])->getField('name');
			$business_info['contacts_name'] = $contacts_name;
			//商品信息
			$product_list = $m_r_business_product->where('business_id = %d',$business_id)->select();
			foreach($product_list as $k=>$v){
				$product = array();
				$product = $m_product->where('product_id = %d',$v['product_id'])->field('name,category_id')->find();
				$product_list[$k]['product'] = $product;
			}
			$this->product_list = $product_list;
			$this->status_list = $status_list;
			//可能性
			$possibility_list = array();
			for ($x=1; $x<=10; $x++) {
				$possibility_list[] = $x*10;
			}
			$this->possibility_list = $possibility_list;
			$this->business_info = $business_info;
			//自定义字段
			$this->field_list = field_list_html('edit','business',$business_info);
			$this->alert = parseAlert();
			$this->display();
		}
	}

	//商机详情
	public function view(){
		$business_id = $_GET['id'] ? intval($_GET['id']) : '';
		if(!$business_id){
			alert('error','参数错误！',U('business/index'));
		}
		//判断附表有无数据（没有则新建）
		$m_business_data = M('BusinessData');
		$res_data = $m_business_data->where(array('business_id'=>$business_id))->find();
		if (!$res_data) {
			$bus_data = array();
			$bus_data['business_id'] = $business_id;
			$m_business_data->add($bus_data);
		}

		$d_business = D('BusinessView');
		$m_customer = M('Customer');
		$m_contacts = M('Contacts');
		$m_business_status = M('BusinessStatus');
		$below_ids = getPerByAction('business','view');
		//判断权限
		$business_info = $d_business->where(array('business.business_id'=>$business_id))->find();

        if($business_info['joiner']){
            $customer_owner_ids = explode(",",$business_info['joiner']);
            $customer_owner_name = "";
            foreach ($customer_owner_ids as $key=>$list){
                $full_name=M("user")->field("full_name")->where('role_id = %d', $list)->find();
                $customer_owner_name[$key]['name'] = $full_name['full_name'];
                $customer_owner_name[$key]['id'] = $list;
            }
            $business_info['joiner'] = $customer_owner_name;
        }

		if($business_info && !in_array($business_info['owner_role_id'],$below_ids)){
			alert('error','您没有此权利！',$_SERVER['HTTP_REFERER']);
		}
		$customer_info = $m_customer->where(array('customer_id'=>$business_info['customer_id']))->field('name')->find();
		//商机联系人
		$contacts_info = $m_contacts->where(array('contacts_id'=>$business_info['contacts_id']))->field('name,telephone')->find();
		$business_info['customer_info'] = $customer_info;
		$business_info['contacts_info'] = $contacts_info;
		//商机状态
		$business_info['status_order_id'] = $m_business_status->where(array('status_id'=>$business_info['status_id'],'type_id'=>$business_info['status_type_id']))->getField('order_id');
		$this->status_list = $m_business_status->where(array('type_id'=>$business_info['status_type_id']))->order('order_id asc')->select();
		$this->business_info = $business_info;
		$this->business_id = $business_id;
		//自定义字段
		$this->field_list = M('Fields')->where(array('model'=>'business','field'=>array('not in',array('name','status_id'))))->order('is_main desc, order_id asc')->select();
		$this->alert = parseAlert();
		$this->display();
	}

	//商机详情
    	public function view_slide(){
    		$business_id = $_GET['id'] ? intval($_GET['id']) : '';
    		if(!$business_id){
    			alert('error','参数错误！',U('business/index'));
    		}
    		//判断附表有无数据（没有则新建）
    		$m_business_data = M('BusinessData');
    		$res_data = $m_business_data->where(array('business_id'=>$business_id))->find();
    		if (!$res_data) {
    			$bus_data = array();
    			$bus_data['business_id'] = $business_id;
    			$m_business_data->add($bus_data);
    		}

    		$d_business = D('BusinessView');
    		$m_customer = M('Customer');
    		$m_contacts = M('Contacts');
    		$m_business_status = M('BusinessStatus');
    		$below_ids = getPerByAction('business','view');
    		//判断权限
    		$business_info = $d_business->where(array('business.business_id'=>$business_id))->find();
    		if($business_info && !in_array($business_info['owner_role_id'],$below_ids)){
    			alert('error','您没有此权利！',$_SERVER['HTTP_REFERER']);
    		}
    		$customer_info = $m_customer->where(array('customer_id'=>$business_info['customer_id']))->field('name')->find();
    		//商机联系人
    		$contacts_info = $m_contacts->where(array('contacts_id'=>$business_info['contacts_id']))->field('name,telephone')->find();
    		$business_info['customer_info'] = $customer_info;
    		$business_info['contacts_info'] = $contacts_info;
    		//商机状态
    		$business_info['status_order_id'] = $m_business_status->where(array('status_id'=>$business_info['status_id'],'type_id'=>$business_info['status_type_id']))->getField('order_id');
    		$this->status_list = $m_business_status->where(array('type_id'=>$business_info['status_type_id']))->order('order_id asc')->select();
    		$this->business_info = $business_info;
    		$this->business_id = $business_id;
    		//自定义字段
    		$this->field_list = M('Fields')->where(array('model'=>'business','field'=>array('not in',array('name','status_id'))))->order('is_main desc, order_id asc')->select();
    		$this->alert = parseAlert();
    		$this->display();
    	}

	//商机详情加载
	public function view_ajax(){
        $business_id = I("id");
        $project['calllist'] = M("fine_project")->where("status='%s' and project_id=%d","calllist",I("id"))->select();
        $project['adviser'] = M("fine_project")->where("status='%s' and project_id=%d","adviser",I("id"))->select();
        $project['tj'] = M("fine_project")->where("status='%s' and project_id=%d","tj",I("id"))->select();
        $project['interview'] = M("fine_project")->where("status='%s' and project_id=%d","interview",I("id"))->select();
        $project['pass'] = M("fine_project")->where("status='%s' and project_id=%d","pass",I("id"))->select();
        $project['offer'] = M("fine_project")->where("status='%s' and project_id=%d","offer",I("id"))->select();
        $project['enter']= M("fine_project")->where("status='%s' and project_id=%d","enter",I("id"))->select();
        $project['safe'] = M("fine_project")->where("status='%s' and project_id=%d","safe",I("id"))->select();
        $project = $this->getMoreProject($project);

        $business = M("business")->where("business_id=%d",I("id"))->select();
        $this->pro_type = $business[0]['pro_type'];

        $this->assign("project",$project);

        include APP_PATH."Common/job.cache.php";
        include APP_PATH."Common/city.cache.php";
        include APP_PATH."Common/industry.cache.php";
        $this->industry_name = $industry_name;
        $this->city_name = $city_name;
        $this->job_name = $job_name;
        $d_business = D('BusinessView');
        $business_info = $d_business->where(array('business.business_id'=>$business_id))->find();
        $this->business_info = $business_info;
        //自定义字段
        $this->field_list = M('Fields')->where(array('model'=>'business','field'=>array('not in',array('name','status_id'))))->order('is_main desc, order_id asc')->select();

        $d_contacts = D('ContactsView');
        $where['customer_id'] = $business_info['customer_id'];
        $this->contacts_list = $d_contacts->where($where)->select();


        $this->process = array("calllist"=>"CallList","adviser"=>"顾问面试","tj"=>"简历推荐","interview"=>"客户面试","pass"=>"面试通过","offer"=>"Offer","enter"=>"入职","safe"=>"过保");
        $this->type_name = array("apply"=>"申请中","examine"=>"已审批","billing"=>"已开出","money"=>"收到款","distribution"=>"已分配","grant"=>"已发放","return"=>"退回","refund"=>"退款","refuse"=>"审批驳回");
        $map['project_id'] = $business_info['business_id'];
        $this->invoice = D("InvoiceView")->where($map)->select();
        $this->business_id = $business_id;

        $m_r_business_log = M('rBusinessLog');
        $m_log = M('Log');
        $m_user = M('User');
        $m_log_status = M('LogStatus');
        $m_r_business_file = M('rBusinessFile');
        foreach ($business as $k_bus => $vo_bus) {
            //沟通日志
            $log_ids = $m_r_business_log->where('business_id = %d', $vo_bus['business_id'])->getField('log_id', true);
            $business[$k_bus]['log'] = $m_log->where('log_id in (%s)', implode(',', $log_ids))->order('log_id desc')->select();
            $log_count = $m_log->where('log_id in (%s)', implode(',', $log_ids))->count();
            $business[$k_bus]['log_count'] = empty($log_count)? 0 : $log_count;
            foreach ($business[$k_bus]['log'] as $key=>$value) {
                $role_info = array();
                $role_info = $m_user->where('role_id = %d', $value['role_id'])->field('full_name,thumb_path,role_id')->find();
                if (!$role_info['thumb_path']) {
                    $role_info['thumb_path'] = './Public/img/avatar_default.png';
                }
                $business[$k_bus]['log'][$key]['owner'] = $role_info;
                $business[$k_bus]['log'][$key]['code'] = $vo_bus['code'];
                $business[$k_bus]['log'][$key]['log_type'] = 'rBusinessLog';
                $status_name = $m_log_status->where('id = %d',$value['status_id'])->getField('name');
                $business[$k_bus]['log'][$key]['status_name'] = $status_name ? $status_name : '';

                $business_logs[] = $business[$k_bus]['log'][$key];
            }
            //商机附件
            $business_file_ids = array();
            $business_file_ids = $m_r_business_file->where('business_id = %d', $vo_bus['business_id'])->getField('file_id', true);
            $business[$k_bus]['business_file_ids'] = $business_file_ids;

            $business_info = $vo_bus;
            $business_info['mark'] = 1;
        }
        $this->status_list = M('LogStatus')->select();
        $this->log_list = $business_logs;


        //文件
        $file_ids = M('rBusinessFile')->where('business_id = %d', $business_id)->getField('file_id', true);
        $info['file'] = M('file')->where('file_id in (%s)', implode(',', $file_ids))->select();
        $file_count = 0;
        foreach ($info['file'] as $key=>$value) {
            $info['file'][$key]['owner'] = D('RoleView')->where('role.role_id = %d', $value['role_id'])->find();
            $info['file'][$key]['size'] = ceil($value['size']/1024);
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
            $info['file'][$key]['pic'] = $pic;
            $file_count++;
        }
        $this->info = $info;
//        M("fine_project")
		$this->display();
	}

    public function listajax(){

        $project = M("fine_project")->where("id=%d",I("id"))->find();
        $business = M("business")->where("business_id=%d",$project['project_id'])->field("pro_type")->find();
        $this->pro_type = $business['pro_type'];
        if ($this->pro_type=="面试快"){
            $this->process = array("calllist"=>0,"adviser"=>1,"tj"=>2,"interview"=>3);
            $this->process_name = array("CallList","顾问面试","简历推荐","客户面试");
        }elseif ($this->pro_type=="入职快"){
            $this->process = array("calllist"=>0,"adviser"=>1,"tj"=>2,"interview"=>3,"pass"=>4,"offer"=>5,"enter"=>6);
            $this->process_name = array("CallList","顾问面试","简历推荐","客户面试","面试通过","Offer","入职");
        }else{
            $this->process = array("calllist"=>0,"adviser"=>1,"tj"=>2,"interview"=>3,"pass"=>4,"offer"=>5,"enter"=>6,"safe"=>7);
            $this->process_name = array("CallList","顾问面试","简历推荐","客户面试","面试通过","Offer","入职","过保");
        }
        $this->pro_count = count($this->process);

        $project = $this->fine_project($project);
//        var_dump($project['tj']);exit();
//        echo $project['project_id'];exit();
//        $job = M("business")->field("name")->where("business_id=%d",$project['project_id'])->find();
	    $this->assign("project",$project);
	    $this->display();
    }

    public function fine_project($li){
        $job = M('Business')->field('name')->where('business_id = %d',$li['project_id'])->find();

//        $resume = M($this->get_hash_table("resume",$li['resume_id']),'huilie_','connection')->field("id,name,sex,current_company,current_job,telphone,hope_salary")->find();

        $resume = M("resume")->where("eid=%d",$li['resume_id'])->find();
        $li['name'] =$resume['name'];
        $li['sex'] =$resume['sex']=1?"男":"女";
        $li['current_company'] =$resume['curCompany'];
        $li['current_job'] =$resume['curPosition'];
        $li['telphone'] =$resume['telphone'];
        $li['hope_salary'] =$resume['hope_salary'];
        $tracker = M("user")->field("full_name,thumb_path")->where("user_id=%d",$li['tracker'])->find();
        $li['tracker_name'] =$tracker['full_name'];
        $li['thumb_path'] =$tracker['thumb_path'];
        $data['adviser_remark'] =   array_filter(unserialize($li['adviser_remark']));
        $data['adviser_content'] =   array_filter(unserialize($li['adviser_content']));
        $data['adviser_more'] =   array_filter(unserialize($li['adviser_more']));
        if($data['adviser_more']){
            $li['adviser_more'] = $this->timeArr($data['adviser_more']);
//            var_dump($li['adviser_more']);exit();
        }
        $li['adviser'] = $this->merge_log($data);
        $li['tj_log'] =   array_filter(unserialize($li['tj_log']));
        $data = "";
        $data['tj_remark'] =   array_filter(unserialize($li['tj_remark']));
        $data['tj_more'] =   array_filter(unserialize($li['tj_more']));
        $li['tj'] = $this->merge_log($data);

        $data = "";
        $data['interview_remark'] =  array_filter(unserialize( $li['interview_remark']));
        $data['interview_content'] =  array_filter(unserialize( $li['interview_content']));
        $li['interview'] = $this->merge_log($data);

        $li['remove_remark'] =  array_filter(unserialize($li['remove_remark']));

        $data = "";
        $data['cc_remark'] = array_filter(unserialize($li['cc_remark']));
        if($data['cc_remark']){
            foreach ($data['cc_remark'] as $k=>$list){
                $calllist_tracker = M("user")->field("full_name")->where("user_id=%d",$list['tracker'])->find();
                $data['cc_remark'][$k]['tracker'] = $calllist_tracker['full_name'];
            }
        }
        $data['calllist_remark'] =  array_filter(unserialize($li['calllist_remark']));
        $li['cc_remark'] = $this->timeArr($data['cc_remark']);

        $li['calllist'] = $this->merge_log($data);


        $data = "";
        $data['offer_remark'] =  array_filter(unserialize($li['offer_remark']));
        $li['offer'] = $this->merge_log($data);


        $data = "";
        $data['enter_remark'] =  array_filter(unserialize($li['enter_remark']));
        $data['enter_content'] =  array_filter(unserialize($li['enter_content']));
        $li['enter'] = $this->merge_log($data);


        $li['job_name'] = $job['name'];

        return $li;
    }


    /*
     * 时间数据转换
     */
    public function timeArr($data){
        $arr = "";
        arsort($data);
        foreach ($data as $list){
            if($list['call_result']=="接通电话"){
                $list['call_ico1'] = "yijieting";
            }elseif ($list['call_result']=="电话未接听"){
                $list['call_ico1'] = "weijietong";
            }elseif ($list['call_result']=="无效电话"){
                $list['call_ico1'] = "konghao";
            }elseif ($list['call_result']=="电话忙"){
                $list['call_ico1'] = "guaduan";
            }

            if($list['gj']){
                $list['call_ico2'] = "jxgenjin";
            }else{
                $list['call_ico2'] = "ztgenjin";
            }

            if($list['target']){
                $list['call_ico3'] = "mubiao";
            }else{
                $list['call_ico3'] = "buheshi";
            }

            if($list['gj']){
                $list['adviser_ico'] = "jxgenjin";
            }else{
                $list['adviser_ico'] = "ztgenjin";
            }

            $arr[] = $list;
        }
        return $arr;
    }

    /*
     * 将二维数组转换为一维数组
     */
    public function merge_log($arr){
        $data = array();
        foreach ($arr as $key=>$list){

            foreach ($list as $k=>$li){
                $data[$k][$key] = $li;
            }
        }
        krsort($data);
        return $data;
    }


    public function getMoreProject($project){
	    $arr = array();
        foreach ($project as $key=>$list){
            $arr[$key] = array();
            if($list){
                foreach ($list as $li){
                    $li = $this->fine_project($li);
                    $arr[$key][] = $li;
                }
            }

        }
        return $arr;
    }



    public function edit_project(){

	    if($this->isPOST()){
            $id = $_POST['id'];
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,cc_remark,status")->find();
	        if($_POST['kind']=="calllist"){
	            $data['call_result'] = $_POST['call_result'];
	            $data['gj'] = $_POST['gj'];
	            $data['gjtime'] = $_POST['gjtime'];
	            $data['target'] = $_POST['target'];
	            $data['remarks'] = $_POST['remarks'];
	            $data['target'] = $_POST['target'];
                $data['operator'] = session('user_id');
	            $data['tracker'] = session("user_id");
	            $data['addtime'] = time();
	            $cc_remark = $project['cc_remark']?unserialize($project['cc_remark']):array();
	            if($_POST['key']){
                    unset($cc_remark[$_POST['key']]);
                }
                $cc_remark[time()] = $data;
	            $arr['cc_remark'] = serialize($cc_remark);
	            $result = M("fine_project")->where("id=%d",$id)->save($arr);
	            if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#". $this->project_st($project['status']));
                }
            }elseif ($_POST['kind']=="tj"){
                $arr['status'] = "tj";
                $data['operator'] = session("user_id");
                $data['addtime'] = time();
                $arr['tj_log'] = serialize($data);
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#". $this->project_st($arr['status']));
                }
            }elseif ($_POST['kind']=="pass"){
                $arr['status'] = "pass";
                $data['operator'] = session("user_id");
                $data['addtime'] = time();
                $arr['pass_log'] = serialize($data);
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    $this->ajaxReturn(1,'success',1);
                }
            }elseif ($_POST['kind']=="restart"){
                $arr['stop'] = 0;
                $arr['remove_remark'] = "";
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    $this->ajaxReturn(1,'success',1);
                }
            }
        }

    }

        /*
         * 项目位置
         */
        public function project_st($data){
            if($data=="calllist"){
                $str = "st1";
            }elseif ($data=="adviser"){
                $str = "st2";
            }elseif ($data=="tj"){
                $str = "st3";
            }elseif ($data=="interview"){
                $str = "st4";
            }elseif ($data=="pass"){
                $str = "st5";
            }elseif ($data=="offer"){
                $str = "st6";
            }elseif ($data=="enter"){
                $str = "st7";
            }elseif ($data=="safe"){
                $str = "st8";
            }
            return $str;
        }
	    //CC备注弹框页面
    	public function addcc(){
            if(I("key")){
                $project = M("fine_project")->field("cc_remark")->where("id=%d",I("id"))->find();
                $cc = unserialize($project['cc_remark']);
                $cc_list = $cc[I("key")];
                $this->assign("cc_list",$cc_list);
//                var_dump($cc[I("key")]);exit();
            }
    		$this->display();
    	}

    	 //推荐顾问面试
        public function addgwms(){
            $id = I("id");

            $project= M("fine_project")->where("id=%d",$id)->field("project_id,resume_id,status")->find();
            $project = $this->fine_project($project);
            $user = M("user")->field("user_id,name,img")->where("user_id = %d",session("user_id"))->find();
            $this->assign("user",$user);
            $this->assign("project",$project);

            if($this->isPost()){
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $arr['adviser_content'] =serialize($data);
                $arr['status'] ="adviser";
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }
            }
            $this->display();
        }

        public function addgw(){
            $user = M("user")->field("user_id,name,img")->select();
            $this->assign("user",$user);
            $this->display();
        }

         //推荐顾问面试
        public function addbz(){
            $id = I("id");

            $project= M("fine_project")->where("id=%d",$id)->field("project_id,calllist_remark,adviser_remark,tj_remark,interview_remark,pass_remark,offer_remark,enter_remark,safe_remark,status")->find();
            $project = $this->fine_project($project);
            $this->assign("project",$project);

            if($this->isPost()){
                $field = $project['status']."_remark";
                $project[$field] = unserialize($project[$field]);
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $project[$field][time()] = $_POST;
                $arr[$field] = serialize($project[$field]);
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }
            }
            $this->display();
        }
         //推荐顾问面试
        public function remove(){
            $id = I("id");
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,resume_id,status")->find();
            $project = $this->fine_project($project);
            $this->assign("project",$project);
            if($this->isPost()){
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $arr["remove_remark"] = serialize($data);
                $arr["stop"] = 1;
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }
            }
            $this->display();
        }
	    //顾问面试备注
        public function msbz(){
            $id = I("id");
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,adviser_more,status")->find();

            if(I('key')){
                $adviser_content = unserialize($project['adviser_more']);
                $adviser_content = $adviser_content[I('key')];
                $this->assign("list",$adviser_content);
            }

            if($this->isPost()){
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $arr['adviser_more'] = serialize($data);
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }
            }
            $this->display();
        }




        //客户面试
        public function khms(){
            $id = I("id");
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,status,resume_id,interview_content")->find();

            if($this->isPost()){
                $field = "interview_content";
                $project[$field] = unserialize($project[$field]);

                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $project[$field][time()] = $_POST;
                $arr[$field] = serialize($project[$field]);
                $arr['status'] = "interview";
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                $result = M("fine_project")->where("id=%d",$id)->setInc('interview_times');
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }
            }
            $project = $this->fine_project($project);
            $this->assign("project",$project);
            $this->display();
        }



        //推荐反馈
        public function tjfk(){
            $id = I("id");

            $project= M("fine_project")->where("id=%d",$id)->field("project_id,status,tj_more,resume_id")->find();
            $project = $this->fine_project($project);
            if(I('key')){
                $tj_more = unserialize($project['tj_more']);
                $tj_more = $tj_more[I('key')];

                $this->assign("list",$tj_more);
            }
            if($this->isPost()){
                if(empty($_POST['gj'])){
                    $arr['stop'] = 1;
                }
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $arr['tj_more'] = serialize($data);
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }

            }
            $this->display();
        }

        //项目发票
        public function fapiao(){
            $id = I("id");
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,resume_id,id,status,com_id")->find();

            $pro_type = M("business")->where("business_id=%d",$project['project_id'])->field("pro_type")->find();
            $this->pro_type = $pro_type['pro_type'];
            $m_invoice = M('Invoice');
            //生成编号
            $invoice_max_id = $m_invoice->max('invoice_id');
            $invoice_max_id = $invoice_max_id+1;
            $invoice_max_code = str_pad($invoice_max_id,4,0,STR_PAD_LEFT);//填充字符串的左侧（将字符串填充为新的长度）
            $this->name = 'NO'.date('Ymd').'-'.$invoice_max_code;
            if($this->isPost()){
                unset($_POST['id']);
                unset($_POST['content']);
                if($_POST['ispresent']){
                    $data['ispresent'] = $_POST['ispresent'];
                    M("fine_project")->where("id=%d",$id)->save($data);
                    unset($_POST['ispresent']);
                }
                $_POST['fine_id'] = $project['id'];
                $_POST['type'] = "apply";
                $_POST['project_id'] = $project['project_id'];
                $_POST['resume_id'] = $project['resume_id'];
                $_POST['customer_id'] = $project['com_id'];
                $_POST['project_stage'] = $project['status'];
                $_POST['create_role_id'] = session("user_id");
                $_POST['create_time'] = time();
                $_POST['update_time'] = time();
                $_POST['project_type'] = $pro_type['pro_type'];
                $result = $m_invoice->add($_POST);


                if($result){
                    alert('success', '开票成功！', U("business/view","id=".$project['project_id']));
                }else{
                    $this->error('添加失败，请重试！');
                }
            }

            $this->display();
        }

        //推荐反馈
        public function offer(){
            $id = I("id");

            $project= M("fine_project")->where("id=%d",$id)->field("project_id,status,resume_id")->find();
            $project = $this->fine_project($project);
            $this->assign("project",$project);

            if($this->isPost()){
                $arr['offer_content'] = serialize($_POST);
                $arr['status'] = "offer";
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }

            }
            $this->display();
        }
         //推荐反馈
        public function ruzhi(){
            $id = I("id");
            $project= M("fine_project")->where("id=%d",$id)->field("project_id,status,resume_id")->find();
            $project = $this->fine_project($project);
            $this->assign("project",$project);
            if($this->isPost()){
                $_POST['addtime'] = time();
                $_POST['operator'] = session('user_id');
                $data[time()] = $_POST;
                $arr['enter_content'] = serialize($data);
                $arr['status'] = "enter";
                $result = M("fine_project")->where("id=%d",$id)->save($arr);
                if($result){
                    alert('success', '项目状态推进成功！', U("business/view","id=".$project['project_id'])."#".$this->project_st($project['status']));
                }

            }
            $this->display();
        }
         //费用变更
        public function changefy(){


            $this->display();
        }
	public function view_ajax_beifen(){
	    $where['project_id'] = $_POST['id'];
	    $where['status'] = "calllist";
	    $users = M("fine_project")->where($where)->select();
	    $this->assign("contacts_list",$users);
	    $this->display();
    }
	//客户列表产品详情
	public function product_view(){
		$business_id = $this->_get('id','intval');
		$m_business = M('Business');
		$m_product = M('Product');
		$m_r_business_product = M('RBusinessProduct');
		$m_product_category = M('ProductCategory');
		$business_product = $m_r_business_product->where('business_id = %d', $business_id)->select();
		$business_info = $m_business->where('business_id = %d',$business_id)->find();
		foreach ($business_product as $k => $v) {
			$info = $m_product->where('product_id = %d', $v['product_id'])->find();
			$business_product[$k]['info'] = $info;
			$business_product[$k]['name'] = $info['name'];
			$business_product[$k]['category_name'] = $m_product_category->where('category_id = %d',$info['category_id'])->getField('name');
		}
		$this->business_info = $business_info;
		$this->business_product = $business_product;
		$this->display();
	}

	/**
	*删除商机
	*
	**/
	public function delete(){
		$m_business = M('Business');
		$m_contract = M('Contract');
		$m_log = M('Log');
		$r_module = array('RBusinessCustomer', 'Event'=>'RBusinessEvent', 'File'=>'RBusinessFile', 'Log'=>'RBusinessLog', 'RBusinessProduct', 'Task'=>'RBusinessTask');
		if (intval($_GET['id']) || $_POST['business_id']) {
			$business_id = array();
			if ($_GET['id']) {
				$business_id[] = intval($_GET['id']);
			} elseif ($_POST['business_id']){
				$business_id = $_POST['business_id'];
			}
			$business_list = $m_business->where(array('business_id'=>array('in',$business_id)))->select();
			$m_customer = M('Customer');
			$m_config = M('Config');
			$delete_business_ids = array();
			$rel_business = array();
			$error_message = array();

			$below_ids = getPerByAction('business','view');
			foreach($business_list as $k=>$v){

				//判断权限
				if (!in_array($v['owner_role_id'],$below_ids)) {
					$error_message[] = '商机《'.$v['name'].'》删除失败,您没有此权利！';
				} else {
					$delete_business_ids[$k]['business_id'] = $v['business_id'];
					$delete_business_ids[$k]['name'] = $v['name'] ? $v['name'] : $v['code'];
				}
			}

			if (is_array($business_list)) {
				if ($delete_business_ids) {
					//判断是否有相关合同(如有合同，则需先删除合同信息)
					foreach($delete_business_ids as $k=>$v){
						$contract_info = $m_contract->where(array('business_id'=>$v['business_id']))->find();
						if($contract_info){
							$error_message[] = '商机《'.$v['name'].'》下已有合同，请先删除相关合同信息！';
						}else{
							if($m_business->where('business_id = %d', $v['business_id'])->delete()){
								M('BusinessData')->where(array('business_id'=>$v['business_id']))->delete();
								actionLog($v['business_id']);
								foreach ($r_module as $key2=>$value2) {
									if(!is_int($key2)){
										$module_ids = M($value2)->where('business_id = %d', $v['business_id'])->getField($key2 . '_id',true);
										$m_key = M($key2);
										$m_key->where($key2 . '_id in (%s)', implode(',', $module_ids))->delete();
										M($value2)->where('business_id = %d', $v['business_id'])->delete();
									}
								}
							} else {
								$error_message[] = '商机《'.$v['name'].'》删除失败！';
							}
						}
					}
					if($error_message){
						$message_data = '部分商机删除失败,失败原因如下：';
						foreach($error_message as $v){
							$message_data .= $v;
						}
						$this->ajaxReturn('',$message_data,0);
					}else{
						$this->ajaxReturn('',L('DELETE_THE_SUCCESS'),1);
					}
				} else {
					$this->ajaxReturn('','您没有此权利！',0);
				}
			} else {
				$this->ajaxReturn('',L('YOU_WANT_TO_DELETE_THE_RECORD_DOES_NOT_EXIST'),0);
			}
		} else {
			$this->ajaxReturn('',L('PLEASE_SELECT_ITEMS_TO_DELETE'),0);
		}
	}

	public function listDialog(){
		$d_business = D('BusinessTopView');
//		$where['business.is_end'] = array('gt',0);
		$where['owner_role_id'] = array('in', $this->_permissionRes);
		$where['is_deleted'] = 0;
		if($_GET['customer_id']){
			$where['customer_id'] = intval($_GET['customer_id']);
		}

		if ($_REQUEST["field"]) {
			$field = trim($_REQUEST['field']);
			$search = empty($_REQUEST['search']) ? '' : trim($_REQUEST['search']);
			$condition = empty($_REQUEST['condition']) ? 'is' : trim($_REQUEST['condition']);

			if ('create_time' == $field || 'update_time' == $field) {
				$search = is_numeric($search)?$search:strtotime($search);
			}
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
			$params = array('field='.trim($_REQUEST['field']), 'condition='.$condition, 'search='.$_REQUEST["search"]);
		}
		$p = !$_REQUEST['p']||$_REQUEST['p']<=0 ? 1 : intval($_REQUEST['p']);

		import("@.ORG.DialogListPage");
//        $data = $d_business->select();
//        var_dump($where);exit();
		$list = $d_business->order('business.create_time desc')->where($where)->page($p.',10')->select();

		$m_customer = M('Customer');
		$m_business_status = M('BusinessStatus');
		$m_contacts = M('Contacts');
		$m_r_contacts_customer = M('RContactsCustomer');

		foreach($list as $k=>$v){
			$customer_info = array();
			$customer_info = $m_customer->where('customer_id = %d', $v['customer_id'])->field('name,contacts_id')->find();
			$list[$k]['customer_name'] = $customer_info['name'];
			//阶段
			$list[$k]['status_name'] = $m_business_status->where(array('status_id'=>$v['status_id'],'type_id'=>$v['status_type_id']))->getField('name');

			//联系人
			//如果存在首要联系人，则查出首要联系人。否则查出联系人中第一个。
			$contacts_info = $m_contacts->where('is_deleted = 0 and contacts_id = %d',$customer_info['contacts_id'])->field('contacts_name,telephone')->find();
			if($contacts_info){
				$list[$k]['contacts_id'] = $customer_info['contacts_id'];
				$list[$k]['contacts_name'] = $contacts_info['name'];
				$list[$k]['telephone'] = $contacts_info['telephone'];
			}else{
				$contacts_customer = $m_r_contacts_customer->where('customer_id = %d',$v['customer_id'])->limit(1)->order('id desc')->select();
				if(!empty($contacts_customer)){
					$contacts = $m_contacts->where('is_deleted = 0 and contacts_id = %d',$contacts_customer[0]['contacts_id'])->find();
					$list[$k]['contacts_id'] = $contacts['contacts_id'];
					$list[$k]['contacts_name'] = $contacts['name'];
					$list[$k]['telephone'] = $contacts['telephone'];
				}
			}

		}
		$count = $d_business->where($where)->count();

		$this->search_field = $_REQUEST;//搜索信息
		$Page = new Page($count,10);
		$Page->parameter = implode('&', $params);
		$this->assign('page',$Page->show());

		$this->assign('businessList',$list);
		$this->display();
	}

	/**
	*商机推进
	*
	**/
	public function advance(){
		if($this->isPost()){
			$business_id = $_REQUEST['business_id'] ? intval($_REQUEST['business_id']) : 0;
			$is_updated = false;
			$m_r_bs = M('RBusinessStatus');
			$m_customer = M('Customer');
			$m_business = M('Business');
			$business = $m_business->where('business_id = %d', $business_id)->find();
			if(!in_array($business['owner_role_id'] , getPerByAction('business','edit'))){
				alert('error',  L('HAVE NOT PRIVILEGES'),$_SERVER['HTTP_REFERER']);
			}
			//推进历史
			$data['business_id'] = $business_id;
			$data['status_id'] = intval($_REQUEST['status_id']);
			$data['description'] = '';
			$data['owner_role_id'] = $business['owner_role_id'];
			$data['update_time'] = time();
			$data['update_role_id'] = session('role_id');
			$data['total_price'] = $business['final_price'];
			$m_r_bs->add($data);

			$data2['update_time'] = time();

			if($_POST['status_check']){
				//项目失败
				$data2['status_id'] = intval($_POST['status_check']);
			}else{
				$data2['status_id'] = intval($_REQUEST['status_id']);
				$status_info = M('BusinessStatus')->where(array('type_id'=>$business['status_type_id'],'status_id'=>intval($_REQUEST['status_id'])))->find();
				if($status_info['is_end'] == 3){
					//锁定客户
					$m_customer->where('customer_id = %d', $business['customer_id'])->setField('is_locked',1);
				}
			}
			if($_POST['nextstep_time']){
				$data2['nextstep_time'] = strtotime($_POST['nextstep_time']);
			}
			$data2['nextstep'] = trim($_POST['nextstep']);
			$data2['update_role_id'] = session('role_id');

			if($m_business->where('business_id = %d', $business_id)->save($data2)){
				//客户到期时间
				$m_customer->where('customer_id = %d',$business['customer_id'])->setField('update_time',time());
				actionLog($business_id);
				if($this->isAjax()){
					$this->ajaxReturn('',L('TO_PROMOTE_SUCCESS'),1);
				}else{
					alert('success', L('TO_PROMOTE_SUCCESS'), $_SERVER['HTTP_REFERER']);
				}
			}else{
				if($this->isAjax()){
					$this->ajaxReturn('',L('PROMOTE_FAILURE_DATA_NO_CHANGE'),0);
				}else{
					alert('error', L('PROMOTE_FAILURE_DATA_NO_CHANGE'),$_SERVER['HTTP_REFERER']);
				}
			}
		}elseif($this->isGet()){
			$business_id = intval($_GET['id']);
			if($business_id > 0){
				$m_business_status = M('BusinessStatus');
				$business_info = M('Business')->where('business_id = %d', $business_id)->field('status_id,status_type_id')->find();
				$order_id = $m_business_status->where(array('status_id'=>$business_info['status_id'],'type_id'=>$business_info['status_type_id']))->getField('order_id');
				if(!$order_id) {
					$order_id = 0;
				}
				$statusList = $m_business_status->where(array('order_id'=>array('egt',$order_id),'type_id'=>$business_info['status_type_id'],'is_end'=>array('neq',2)))->order('order_id')->select();
				//项目失败id
				$fail_status_id = $m_business_status->where(array('type_id'=>$business_info['status_type_id'],'is_end'=>2))->getField('status_id');
				$this->fail_status_id = $fail_status_id;
				$this->statusList = $statusList;
				$this->business_id = $business_id;
				$this->display();
			}else{
				alert('error',  L('PARAMETER_ERROR'),$_SERVER['HTTP_REFERER']);
			}
		}
	}

	/**
	*商机统计
	*
	**/
	public function analytics(){
		$m_business = M('Business');
		$m_contract = M('Contract');
		$content_id = $_GET['content_id'] ? intval($_GET['content_id']) : 1;
		if($_GET['dbname'] && $content_id == 2){
			$status_type_id = $_GET['status_type_id'] ? intval($_GET['status_type_id']) : 1;
			$this->type_list = M('BusinessType')->select();
			//商机漏斗对比
			$statusList = M('BusinessStatus')->order('order_id desc')->where(array('type_id'=>$status_type_id,'is_end'=>array('neq',2)))->select();
			if(is_array($_GET['dbname'])){
				$dbname = $_GET['dbname'];
				$this->dbname = implode(',',$_GET['dbname']);
			}else{
				$dbname = explode(',', $_GET['dbname']);
				$this->dbname = $_GET['dbname'];
			}
			foreach($dbname as $k=>$v){
				$user = getUserByRoleId($v);
				$where_status['owner_role_id'] = $v;
				if($_GET['select_type'] == 1){
					$start=strtotime(date('Y-m-01 00:00:00'));
					$end = strtotime(date('Y-m-d H:i:s'));
					$where_status['create_time'] = array('between',array($start,$end));
				}elseif($_GET['select_type'] == 2){
					$month=date('m');
					if($month==1 || $month==2 ||$month==3){
						$start=strtotime(date('Y-01-01 00:00:00'));
						$end=strtotime(date("Y-03-31 23:59:59"));
					}elseif($month==4 || $month==5 ||$month==6){
						$start=strtotime(date('Y-04-01 00:00:00'));
						$end=strtotime(date("Y-06-30 23:59:59"));
					}elseif($month==7 || $month==8 ||$month==9){
						$start=strtotime(date('Y-07-01 00:00:00'));
						$end=strtotime(date("Y-09-30 23:59:59"));
					}else{
						$start=strtotime(date('Y-10-01 00:00:00'));
						$end=strtotime(date("Y-12-31 23:59:59"));
					}
					$where_status['create_time'] = array('between',array($start,$end));
				}elseif($_GET['select_type'] == 3){
					$year = strtotime(date('Y-01-01 00:00:00'));
					$where_status['create_time'] = array('egt',$year);
				}elseif($_GET['select_type'] == 4){
					if($_GET['start_time']) $start_time = strtotime(date('Y-m-d',strtotime($_GET['start_time'])));
					$end_time = $_GET['end_time'] ?  strtotime(date('Y-m-d 23:59:59',strtotime($_GET['end_time']))) : strtotime(date('Y-m-d 23:59:59',time()));
					if($start_time){
						$where_status['create_time'] = array(array('lt',$end_time),array('gt',$start_time), 'and');
					}else{
						$where_status['create_time'] = array('lt',$end_time);
					}
				}
				if($_GET['select_type'] < 3){
					$this->start_date = date('Y-m-d',$start);
					$this->end_date = date('Y-m-d',$end);
				}else{
					if($_GET['select_type'] == 3){
						$this->start_date = date('Y-m-d',$year);
						$this->end_date = date('Y-m-d',time());
					}elseif($_GET['select_type'] == 4){
						$this->start_date = date('Y-m-d',$start_time);
						$this->end_date = date('Y-m-d',$end_time);
					}
				}

				$this->select_type = $_GET['select_type'];

				//商机阶段统计图
				$status_count_array = array();
				$where_status['is_deleted'] = 0;
				//总的商机数量
				$target_count_total = 0;
				$where_status['status_id'] = array('not in',array('0','99'));
				$target_count_total = $m_business ->where($where_status)->count();
				$status_count = '';
				foreach($statusList as $val){
					unset($where_status['status_id']);
					$where_status['status_id'] = $val['status_id'];
					$target_count = $m_business->where($where_status)->count();
					$status_count_array[] = '['.'"'.$val['name'].'",'.$target_count.']';
				}
				$status_count = implode(',', array_reverse($status_count_array));
				$duibi_array[$k]['status_count_array'] = $status_count;
				$duibi_array[$k]['user'] = $user;
			}
			$this->duibi_array = $duibi_array;
		}else{
			//是否仅查询销售岗
			$user_type = $_REQUEST['user_type'] ? 1 : '';
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
			$this->start_date = date('Y-m-d',$start_time);
			$this->end_date = date('Y-m-d',$end_time);

			$where_source['creator_role_id'] = array('in', implode(',', $role_id_array));
			$where_status['owner_role_id'] = array('in', implode(',', $role_id_array));
			$where_money['owner_role_id'] = array('in', implode(',', $role_id_array));
			$where_day_create['creator_role_id'] = array('in', implode(',', $role_id_array));
			$where_day_success['owner_role_id'] = array('in', implode(',', $role_id_array));

			if($start_time){
				$where_source['create_time'] = array(array('lt',$end_time),array('gt',$start_time), 'and');
				$where_status['create_time'] = array(array('lt',$end_time),array('gt',$start_time), 'and');
				$where_money['create_time'] = array(array('lt',$end_time),array('gt',$start_time), 'and');
				$create_time= array(array('lt',$end_time),array('gt',$start_time), 'and');
			}else{
				$where_source['create_time'] = array('lt',$end_time);
				$where_status['create_time'] = array('lt',$end_time);
				$where_money['create_time'] = array('lt',$end_time);
				$create_time = array('lt',$end_time);
			}

			$d_business_customer = D('BusinessCustomer');
			$m_contract = M('Contract');
			$d_receivables_contract = D('ReceivablesContract');
			$m_receivingorder = M('Receivingorder');

			//判断是否有数据
			$business_add_count = $m_business->where(array('create_time'=>$create_time,'create_role_id'=>array('in',$role_id_array)))->find();
			$this->business_add_count = $business_add_count;

			if($content_id == 1){
				$own_count_total = 0;
				$follow_count_total = 0;
				$success_count_total = 0;
				$deal_count_total = 0;
				$business_rate_total = 0;
				$contract_price_total = 0;
				$contract_average_total = 0;
				$receivingorder_price_total = 0;
				$un_receivingorder_price_total = 0;
				$receivingorder_rate_total = 0;
				$contract_count_total = 0;
				//跟进中状态ID
				$m_business_status = M('BusinessStatus');
				$follow_status_ids = $m_business_status->where(array('is_end'=>array('lt',2)))->getField('status_id',true);
				//项目成功状态ID
				$success_status_ids = $m_business_status->where(array('is_end'=>array('eq',3)))->getField('status_id',true);

				foreach($role_id_array as $v){
					$user = getUserByRoleId($v);
					//过滤已停用用户
					if($user['status'] == 1){
						$add_count = 0;
						$add_count = $m_business->where(array('is_deleted'=>0, 'creator_role_id'=>$v, 'create_time'=>$create_time))->count();
						//商机数（商机负责人为所属客户的负责人）
						$own_business_ids = $d_business_customer->where(array('customer.owner_role_id'=>$v, 'create_time'=>$create_time ))->getField('business_id',true);
						$own_count = $own_business_ids ? count($own_business_ids) : '0';
						//跟进中
						$follow_count = 0;
						$follow_count = $m_business->where(array('business_id'=>array('in',$own_business_ids),'status_id'=>array('in',$follow_status_ids)))->count();
						//已成交
						$success_count = 0;
						$success_count = $m_business->where(array('business_id'=>array('in',$own_business_ids),'status_id'=>array('in',$success_status_ids)))->count();
						//已失败
						$deal_count = 0;
						$deal_count = $own_count-($follow_count+$success_count);
						//商机赢单率
						$business_rate = round($success_count/$own_count,2)*100;
						//商机成交金额
						$contract_price = '0';
						$contract_price = $m_contract->where(array('business_id'=>array('in',$own_business_ids),'is_checked'=>1,'create_time'=>$create_time))->sum('price');
						$contract_price = round($contract_price,2);

						//平均商机金额
						$contract_count = $m_contract->where(array('business_id'=>array('in',$own_business_ids),'is_checked'=>1,'create_time'=>$create_time))->count();
						$contract_average = $contract_price ? round($contract_price/$contract_count,0) : '0';

						//回款金额
						$receivables_ids = $d_receivables_contract->where(array('contract.business_id'=>array('in',$own_business_ids)))->getField('receivables_id',true);
						$receivingorder_price = '0';
						if($receivables_ids){
							$receivingorder_price = $m_receivingorder->where(array('receivables_id'=>array('in',$receivables_ids),'status'=>1,'create_time'=>$create_time))->sum('money');
						}
						$receivingorder_price = $receivingorder_price ? round($receivingorder_price,2) : '0';

						//未回款金额
						$un_receivingorder_price = '0';
						$un_receivingorder_price = $contract_price-$receivingorder_price;
						//回款比例
						$receivingorder_rate = '0';
						$receivingorder_rate = $receivingorder_price ? round($receivingorder_price/$contract_price,2)*100 : '0';

						$reportList[] = array("user"=>$user,"add_count"=>$add_count,"own_count"=>$own_count,"follow_count"=>$follow_count,"success_count"=>$success_count,"deal_count"=>$deal_count,"business_rate"=>$business_rate,"contract_price"=>$contract_price,"contract_average"=>$contract_average,"receivingorder_price"=>$receivingorder_price,"un_receivingorder_price"=>$un_receivingorder_price,"receivingorder_rate"=>$receivingorder_rate);

						$own_count_total += $own_count;
						$follow_count_total += $follow_count;
						$success_count_total += $success_count;
						$deal_count_total += $deal_count;
						$contract_price_total += $contract_price;
						$contract_count_total += $contract_count;
						$receivingorder_price_total += $receivingorder_price;
						$un_receivingorder_price_total += $un_receivingorder_price;
					}
				}
				//总商机赢单率
				$business_rate_total = round($success_count_total/$own_count_total,2)*100;
				//合同平均金额
				$contract_average_total = $contract_price_total ? round($contract_price_total/$contract_count_total,0) : '0';
				//总回款比例
				$receivingorder_rate_total = $receivingorder_price_total ? round($receivingorder_price_total/$contract_price_total,2)*100 : '0';

				$this->total_report = array("own_count_total"=>$own_count_total, "follow_count_total"=>$follow_count_total,"success_count_total"=>$success_count_total,"deal_count_total"=>$deal_count_total,"business_rate_total"=>$business_rate_total,"contract_price_total"=>$contract_price_total,"contract_average_total"=>$contract_average_total,"receivingorder_price_total"=>$receivingorder_price_total,"un_receivingorder_price_total"=>$un_receivingorder_price_total,"receivingorder_rate_total"=>$receivingorder_rate_total);

				$this->reportList = $reportList;
			}
			$m_fields = M('Fields');
			$field_list = $m_fields->where(array('model'=>'business'))->select();
			$field = array();
			foreach($field_list as $v){
				$field[$v['field']] = $v['name'];
			}
			$this->assign('field',$field);

			//商机阶段统计图
			if($content_id == 2){
				$status_type_id = $_GET['status_type_id'] ? intval($_GET['status_type_id']) : 1;
				$this->type_list = M('BusinessType')->select();

				$status_count_array = array();
				$status_list = M('BusinessStatus')->order('order_id desc')->where(array('type_id'=>$status_type_id,'is_end'=>array('neq',2)))->select();
				$where_status['is_deleted'] = 0;
				$temp_count = 0;

				foreach($status_list as $k=>$v){
					unset($where_status['status_id']);
					$where_status['status_id'] = $v['status_id'];
					$target_count = $m_business->where($where_status)->count();
					$status_count_array[] = '['.'"'.$v['name'].'",'.$target_count.']';
					$temp_count += $target_count;
				}
				$this->status_count = implode(',', array_reverse($status_count_array));

				$status_list_array = M('BusinessStatus')->order('order_id asc')->where(array('type_id'=>$status_type_id,'is_end'=>array('neq',2)))->select();
				$status_count_list = array(); //表格数据
				foreach($status_list_array as $k=>$v){
					unset($where_status['status_id']);
					$where_status['status_id'] = $v['status_id'];
					$target_count = $m_business->where($where_status)->count();

					$status_count_list[$k]['name'] = $v['name'];
					$final_price_total = '0.00';
					$final_price_total = $m_business->where($where_status)->sum('final_price');
					$status_count_list[$k]['money'] = $final_price_total;
					$status_count_list[$k]['num'] = $target_count;
				}
				$this->status_count_list = $status_count_list;
			}

			/*时间序列图(按日)*/
			if($content_id == 4){
				if ($end_time - 86400*30 > $start_time) {
					$this_time = $end_time - 86400*30;
				} else {
					$this_time = $start_time;
				}
				while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {
					$day_count_array[] = "'".date('Y/m/d', $this_time)."'";
					$time1 = strtotime(date('Y-m-d', $this_time));
					$time2 = $time1 + 86400;

					$where_day_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$day_create_count_array[] = $m_business->where($where_day_create)->count();

					$where_day_success['update_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$success_status_ids = M('BusinessStatus')->where(array('is_end'=>3))->getField('status_id',true);
					$where_day_success['status_id'] = array('in',$success_status_ids);
					$day_success_count_array[] = $m_business->where($where_day_success)->count();
					$this_time += 86400;
				}
				$this->day_count = implode(',', $day_count_array);
				$this->day_create_count = implode(',', $day_create_count_array);
				$this->day_success_count = implode(',', $day_success_count_array);
			}

			/*时间序列图(按周)*/
			if($content_id == 5){
				if ($end_time - 86400*365 > $start_time) {
					$this_time = $end_time - 86400*365 - 86400 * date('w');
				} else {
					$this_time = $start_time - 86400 * date('w');
				}
				while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {

					$week_count_array[] = "'".date('Y', $this_time).' s'.date('W',$this_time)."'";
					$time1 = strtotime(date('Y-m-d', $this_time));
					$time2 = $time1 + 86400*7;

					$where_week_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$week_create_count_array[] = $m_business->where($where_week_create)->count();

					$where_week_success['update_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$success_status_ids = M('BusinessStatus')->where(array('is_end'=>3))->getField('status_id',true);
					$where_day_success['status_id'] = array('in',$success_status_ids);
					$week_success_count_array[] = $m_business->where($where_week_success)->count();
					$this_time += 86400*7;
				}
				$this->week_count = implode(',', $week_count_array);
				$this->week_create_count = implode(',', $week_create_count_array);
				$this->week_success_count = implode(',', $week_success_count_array);
			}

			/*时间序列图(按月)*/
			if($content_id == 6){
				if ($end_time - 86400*365 > $start_time) {
					$this_time = $end_time - 86400*365;
				} else {
					$this_time = $start_time;
				}
				while(date('Y-m-d', $this_time) <= date('Y-m-d', $end_time)) {
					$month_count_array[] = "'".date('Y/m', $this_time)."'";
					$time1 = strtotime(date('Y-m', $this_time));
					$time2 = mktime(0,0,0,date('m', $this_time)+1,1,date('Y', $this_time));

					$where_month_create['create_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$month_create_count_array[] = $m_business->where($where_month_create)->count();

					$where_month_success['update_time'] = array(array('lt',$time2),array('gt',$time1), 'and');
					$success_status_ids = M('BusinessStatus')->where(array('is_end'=>3))->getField('status_id',true);
					$where_day_success['status_id'] = array('in',$success_status_ids);
					$month_success_count_array[] = $m_business->where($where_month_success)->count();
					$this_time = mktime(date('H', $this_time),date('i', $this_time),date('s', $this_time),date('m', $this_time)+1,date('d', $this_time),date('Y', $this_time));
				}
				$this->month_count = implode(',', $month_count_array);
				$this->month_create_count = implode(',', $month_create_count_array);
				$this->month_success_count = implode(',', $month_success_count_array);
			}

			$max_money = $m_business->where($where_money)->Max('total_price');
			$min_money = $m_business->where($where_money)->Min('total_price');
			if($max_money == $min_money){
				$target_count = $m_business ->where($where_money)->count();
				$money_count_array[] = '["'.$max_money.L('YUAN').'",'.$target_count.']';
			}else{
				$rank1 = round($min_money,2);
				$rank2 = round($min_money + ($max_money - $min_money) * 0.25,2);
				$rank3 = round($min_money + ($max_money - $min_money) * 0.5,2);
				$rank4 = round($min_money + ($max_money - $min_money) * 0.75,2);
				$rank5 = round($max_money,2);
				$money_where = array(
					array('name'=>$rank1.'~'.$rank2.L('YUAN'),'where_money'=>array(array('elt',$rank2),array('egt',$rank1), 'and')),
					array('name'=>$rank2.'~'.$rank3.L('YUAN'),'where_money'=>array(array('elt',$rank3),array('gt',$rank2), 'and')),
					array('name'=>$rank3.'~'.$rank4.L('YUAN'),'where_money'=>array(array('elt',$rank4),array('gt',$rank3), 'and')),
					array('name'=>$rank4.'~'.$rank5.L('YUAN'),'where_money'=>array(array('elt',$rank5),array('egt',$rank4), 'and'))
				);

				$money_count_array = array();
				foreach($money_where as $v){
					$where_money['total_price'] = $v['where_money'];
					$target_count = $m_business ->where($where_money)->count();
					$money_count_array[] = '['.'"'.$v['name'].'",'.$target_count.']';
				}
			}
			$this->money_count = implode(',', $money_count_array);

			$idArray = getPerByAction(MODULE_NAME,ACTION_NAME,false);
			$roleList = array();
			foreach($idArray as $roleId){
				$roleList[$roleId] = getUserByRoleId($roleId);
			}
			$this->roleList = $roleList;
			$url = getCheckUrlByAction(MODULE_NAME,ACTION_NAME);
			$per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
			if($per_type == 2 || session('?admin')){
				$departmentList = M('roleDepartment')->select();
			}else{
				$departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
			}
			$this->assign('departmentList', $departmentList);
		}
		//时间插件处理（计算开始、结束时间距今天的天数）
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
		$this->daterange = $daterange;

		$this->type_id = intval($_GET['type_id']);
		$this->content_id = intval($_GET['content_id']);
		$this->alert = parseAlert();
		$this->display();
	}

	/**
	 * 首页销售漏斗统计
	 **/
	public function getSalesFunnel(){
		$dashboard = M('user')->where('user_id = %d', session('user_id'))->getField('dashboard');
		$widget = unserialize($dashboard);
		$id = intval($_GET['id']);
		$status_type_id = 1;
		foreach($widget['dashboard'] as $k=>$v){
			if($v['widget'] == 'Salesfunnel' && $v['id'] == $id){
				if($v['level'] == '1'){
					$where['owner_role_id'] = array('in',getSubRoleId());
				}else{
					$where['owner_role_id'] = array('eq', session('role_id'));
				}
				$status_type_id = $v['status_type_id'] ? $v['status_type_id'] : 1;
			}
		}
		$fail_status_id = M('BusinessStatus')->where(array('is_end'=>array('eq',2)))->getField('status_id',true);
		$m_business = M('Business');
		$status_count_array = array();
		$status = M('BusinessStatus')->order('order_id desc')->where(array('type_id'=>$status_type_id,'status_id'=>array('not in',$fail_status_id)))->order('order_id asc')->getField('status_id,name',true);
		$statusList = array();
		$where['is_deleted'] = array('eq',0);
		foreach($status as $k=>$v){
			$where['status_id'] = array('eq',$k);
			$status_count = $m_business ->where($where)->count();
			$statusList[] = array($v, intval($status_count));
		}
		$this->ajaxReturn($statusList,'success',1);
	}

	//销售漏斗对比
	public function addduibi(){
		if($_GET['dbname']){
			$dbname = explode(',',$_GET['dbname']);
		}
		$this->dbname = $dbname;
		$this->dbname_count = count($dbname);

		$idArray = getPerByAction(MODULE_NAME,ACTION_NAME,false);
		//$idArray = getSubRoleId(true, 1);
		$roleList = array();
		foreach($idArray as $roleId){
			$roleList[$roleId] = getUserByRoleId($roleId);
		}
		$this->dbroleList = $roleList;
		$this->display();
	}

	//商机统计高级搜索
	public function advance_search(){
		$module_name = trim($_GET['module_name']);
		$action_name = trim($_GET['action_name']);
		$idArray = getPerByAction($module_name,$action_name,false);
		//$idArray = getSubRoleId(true, 1);
		$roleList = array();
		foreach($idArray as $roleId){
			$roleList[$roleId] = getUserByRoleId($roleId);
		}
		$this->roleList = $roleList;
		$url = getCheckUrlByAction($module_name,$action_name);
		$per_type =  M('Permission') -> where('position_id = %d and url = "%s"', session('position_id'), $url)->getField('type');
		if($per_type == 2 || session('?admin')){
			$departmentList = M('roleDepartment')->select();
		}else{
			$departmentList = M('roleDepartment')->where('department_id =%d',session('department_id'))->select();
		}
		$this->assign('departmentList', $departmentList);
		$this->type_id = intval($_GET['type_id']);
		$this->content_id = intval($_GET['content_id']);
		$this->display();
	}

	/**
	 * 获取商机状态
	 * @param
	 * @author
	 * @return
	 */
	public function getbusinessStatus(){
		$type_id = $_GET['type_id'] ? intval($_GET['type_id']) : 0;
		if (!$type_id) {
			$this->ajaxReturn('','参数错误！',0);
		}
		$status_list = M('BusinessStatus')->where(array('type_id'=>$type_id))->order('order_id asc')->select();
		$this->ajaxReturn($status_list,'',1);
	}

}
