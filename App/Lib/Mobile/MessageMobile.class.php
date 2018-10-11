<?php
class MessageMobile extends Action{
	public function _initialize(){
		$action = array(
			'permission'=>array(),
			'allow'=>array('index','tips','select','contact_all')
		);
		B('AppAuthenticate', $action);
	}

	/*
	 * 1.����ͨѶ¼�û�����
	 * 2.���ز����µ�ͬ���б�
	 * 3.���ز�������
	 */
	public function index(){
		if($this->isPost()){
			//���뺺����
			import('@.ORG.GetPY');
			//ʵ����
			$py = new GetPY();
			if($_GET['from_role_id']){ //Ա������
				$user_info = D('RoleView')->where(array('role_id'=>intval($_GET['from_role_id'])))->field('email,telephone,address,user_name,sex,role_id,department_name,role_name,img')->find();
				$user_info['img'] = empty($user_info['img']) ? '' : $user_info['img'];
				$user_info = empty($user_info) ? array() : $user_info;
				$this->ajaxReturn($user_info,'success',1);
			}
			$d_role = D('RoleView');
			if($_GET['department_id']){  //����������Ա���б�
				if($_REQUEST["name"]){
					$where['user_name'] = array('like','%'.$_REQUEST["name"].'%');
				}
				$where['status'] = 1;
				$where['position.department_id'] = intval($_GET['department_id']);
				$user_list = $d_role->where($where)->field('user_name,role_id,department_id,telephone,department_name,role_name,img')->select();
				if( empty($user_list)){
					$user_list = array();
				}else{
					foreach($user_list as $k=>$v){
						$user_list[$k]['img'] = empty($v['img']) ? '' : $v['img'];
						$user_list[$k]['k'] = $py->getFirstPY($v['user_name']); //�������� ���غ�������ĸ
					}
				}
				$this->ajaxReturn($user_list,'success',2);
			}elseif($_GET['by'] == 'sub'){//���ص�ǰ�û������б�
				//$below_ids = getSubRoleByRole(session('role_id'),false);
				$below_ids = getSubRoleId(session('role_id'),false);
				$role_list = empty($below_ids) ? array() : $below_ids;
				foreach($role_list as $k=>$v){
					$user_info = $d_role->where('role.role_id = %d and status = 1',$v)->field('user_name,role_id,telephone,department_id,department_name,role_name,img')->find();
					if($user_info){
						$user_list[] = $user_info;
					}
				}
				if( empty($user_list)){
					$user_list = array();
				}else{
					foreach($user_list as $k=>$v){
						$user_list[$k]['img'] = empty($v['img']) ? '' : $v['img'];
						$user_list[$k]['k'] = $py->getFirstPY($v['user_name']); //�������� ���غ�������ĸ
					}
				}
				$this->ajaxReturn($user_list,'success',2);
			}else{//�������в����Լ�Ĭ�ϵ�ǰ��¼�û���������Ա���б�
				$departments_list = M('roleDepartment')->field('department_id,name')->select();
				$department_id = $d_role->where('role.role_id = %d', session('role_id'))->getField('department_id');
				$role_list = M('Role')->field('role_id')->select();
				foreach($role_list as $k=>$v){
					$user_info = $d_role->where('role.role_id = %d and status = 1',$v)->field('user_name,role_id,telephone,department_id,department_name,role_name,img')->find();
					if($user_info){
						$user_list[] = $user_info;
					}
				}
				if($departments_list){
					foreach($departments_list as $k=>$v){
						if($v['department_id'] == $department_id){
							$departments_list[$k]['check'] = 'check';
						}else{
							$departments_list[$k]['check'] = ' ';
						}
					}
				}else{
					$departments_list = array();
				}
				if( empty($user_list)){
					$user_list = array();
				}else{
					foreach($user_list as $k=>$v){
						$user_list[$k]['img'] = empty($v['img']) ? '' : $v['img'];
						$user_list[$k]['k'] = $py->getFirstPY($v['user_name']); //�������� ���غ�������ĸ
					}
				}
				$data['departments_list'] = $departments_list;
				$data['user_list'] = $user_list;
				$this->ajaxReturn($data,'success',3);
			}
		}
	}
	public function contact_all(){
		if($this->isPost()){
			$d_role = D('RoleView');
			$departments_list = M('roleDepartment')->field('department_id,name')->select();
				$user_list = $d_role->where('status = 1')->field('user_name,role_id,telephone,department_id,department_name,role_name,img')->select();
				if($departments_list){
					foreach($departments_list as $k=>$v){
						if($v['department_id'] == $department_id){
							$departments_list[$k]['check'] = 'check';
						}else{
							$departments_list[$k]['check'] = ' ';
						}
					}
				}else{
					$departments_list = array();
				}
				if( empty($user_list)){
					$user_list = array();
				}else{
					foreach($user_list as $k=>$v){
						$user_list[$k]['img'] = empty($v['img']) ? '' : $v['img'];
					}
				}
				$data['departments_list'] = $departments_list;
				$data['user_list'] = $user_list;
				$this->ajaxReturn($data,'success',3);
		}else{
			$this->ajaxReturn('','',5);
		}
	}
	//վ����Ա���б�
	public function select(){
		$d_role = D('RoleView');
		if($_GET['type'] == 'all'){
			$list = $d_role->where(array('status'=>1))->field('user_name,department_name,role_name,role_id,img')->select();
			$this->ajaxReturn($list,'success',1);
		}elseif($_GET['type'] == 'department'){
			$departments_list = M('roleDepartment')->field('department_id,name')->select();
			$list = array();
			if($departments_list){
				foreach($departments_list as $v){
					$tmp['department_name'] = $v['name'];
					$roleList = $d_role->where('position.department_id = %d and status = 1', $v['department_id'])->field('user_name,department_name,role_name,role_id,img')->select();
					$tmp['list'] = $roleList ? $roleList : array();
					$list[] = $tmp;
				}
			}
		}elseif($_GET['type'] == 'examine'){
			//����������Ȩ�޵��б�
			$position_ids = M('Permission')->where("url = 'examine/add_examine'")->getField('position_id',true);
			$role_ids_array = $d_role->where('role.position_id in(%s)', implode(',', $position_ids))->getField('role_id', true);
			$user_ids_array =  $d_role->where('user.status = 1 and user.category_id = 1')->getField('role_id',true);
			if($role_ids_array){
				$role_array = array_merge($role_ids_array,$user_ids_array);
				$role_array = array_unique($role_array);
			}else{
				$role_array = $user_ids_array;
			}
			foreach($role_array as $k=>$v){
				$user_info = $d_role->where('role.role_id = %d and status = 1',$v)->field('user_name,role_id,img')->find();
				if($user_info){
					$list[] = $user_info;
				}
			}
			if( empty($list)){
				$list = array();
			}else{
				foreach($list as $k=>$v){
					$list[$k]['img'] = empty($v['img']) ? '' : $v['img'];
					//$user_list[$k]['k'] = $py->getFirstPY($v['user_name']); //�������� ���غ�������ĸ
				}
			}
		}
		$this->ajaxReturn($list,'success',1);
	}

	//��̬����
	public function tips(){
		$token = $_REQUEST['token'];
		$user_id = M('user')->where('token = "%s"',$token)->getField('user_id');
		session('user_id',$user_id);
		if($this->isPost()){
			$last_read_time = M('User')->where('role_id = %d',session('role_id'))->getField('last_read_time');
			$all_ids = getSubRoleId();
			if($last_read_time){
				$last_read_time = json_decode($last_read_time,true);
				if($last_read_time['customer']){
					$customer['create_time'] = array('gt',$last_read_time['customer']);
				}
				if($last_read_time['customer_resource']){
					$outdays = M('config') -> where('name="customer_outdays"')->getField('value');
					$outdate = empty($outdays) ? 0 : time()-86400*$outdays;
					$outdates = empty($outdays) ? 0 : $last_read_time['customer_resource']-86400*$outdays;
					$customer_resource['update_time&owner_role_id&is_deleted'] = array(array('gt', $last_read_time['customer_resource']),array('eq',0),array('neq',1),'_multi'=>true);
					$customer_resource['update_time&update_time&is_deleted'] = array(array('lt', $outdate),array('gt',$outdates),array('neq',1),'_multi'=>true);
					$customer_resource['_logic'] = 'OR';
				}
				if($last_read_time['business']){
					$business['create_time'] = array('gt',$last_read_time['business']);
				}
				if($last_read_time['announcement']){
					$announcement['create_time'] = array('gt',$last_read_time['announcement']);
				}
			}

			//�ͻ���
			if(empty($customer_resource)){
				$customer_resource['owner_role_id'] = 0;
				$customer_resource['update_time'] = array('gt',$last_read_time['customer_resource']);
				$customer_resource['is_deleted'] = array('neq',1);
			}
			$count['customer_resource'] = M('Customer')->where($customer_resource)->count();

			//�ͻ�
			$customer['owner_role_id'] = array('in',implode(',', $all_ids));
			$customer['is_deleted'] = array('neq',1);
			$count['customer'] = M('Customer')->where($customer)->count();

			//�̻�
			$business['owner_role_id'] = array('in',implode(',', $all_ids));
			$count['business'] = M('Business')->where($business)->count();

			//վ����
			$message['to_role_id'] = session('role_id');
			$message['read_time'] = 0;
			$message['status'] = array("neq",1);
			$count['message'] = M('Message')->where($message)->count();

			//����
			$m_announcement = M('announcement');
			$announcement['department'] = array('like', '%('.session('department_id').')%');
			$announcement['status'] = array('eq', 1);
			$count['announcement'] = $m_announcement->where($announcement)->count();

			$this->ajaxReturn($count,'success',1);
		}
	}

}