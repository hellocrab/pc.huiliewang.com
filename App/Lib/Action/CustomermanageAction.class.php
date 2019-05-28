<?php
/**++++++++++++++++++++++++++++++++++++++++++++++++++
 * DESC: 客户管理接口
 * User: SOSO
 * Date: 2019/5/13
 *+++++++++++++++++++++++++++++++++++++++++++++++++++
 */

class CustomermanageAction extends Action
{
    protected $_permissionRes = '';
    protected $pro_type = [0 => '初始条件', 1 => '面试快', 2 => '入职快', 3 => '专业猎头'];
    protected $rank_name = ['A' => 'A级', 'B' => 'B级', 'C' => 'C级'];
    protected $call_record = [1 => '接通电话', 2 => '电话未接听', 3 => '无效电话', 4 => '电话忙'];
    protected $degree = [5 => '非常满意', 4 => '满意', 3 => '基本满意', 2 => '不太满意', 1 => '不满意'];

    /**
     * 用于判断权限
     * @permission 无限制
     * @allow 登录用户可访问
     * @other 其他根据系统设置
     * */
    public function _initialize() {

        $title = "客户回访";
        $this->assign("title", $title);
        $action = array(
            'permission' => array(),
            'allow' => array()
        );
        B('Authenticate', $action);
        $this->_permissionRes = getPerByAction(MODULE_NAME, ACTION_NAME);
    }

    /**
     * @desc 客户回访
     */
    public function index() {
        $this->_permissionRes = getPerByAction(MODULE_NAME, 'customers');
        if (!$this->_permissionRes) {
            $this->error('您没有权限操作', 'index');
        }
        $this->display();
    }

    /**
     * @desc 客户回访
     */
    public function visit() {
        if (!$this->_permissionRes) {
            $this->error('您没有权限操作');
        }
        $this->display();
    }

    /**
     * @desc 操作权限检测
     */
    private function authCheck() {
        if (!$this->_permissionRes) {
            $this->response('您没有权限操作', 500, false);
        }
    }

    /**
     * @desc 消息返回
     * @param array $info
     * @param int $code
     * @param bool $isSuccess
     */
    private function response($info = [], $code = 200, $isSuccess = true) {
        $return = ['success' => $isSuccess, 'code' => $code, 'info' => $info];
        $this->ajaxReturn($return);
    }

    /**
     * @desc 分级标准设置列表
     */
    public function rank() {
        $rankModel = M('customer_rank_config')->field('id,name,min_condition,max_condition,pro_type')->order('sort asc');
        $list = $rankModel->select();
        $return = [];
        $conditionName = '贡献金额';
        foreach ($list as $info) {
            $type = $info['pro_type'];
            $conditionName == 1 && $conditionName = '入职人数';
            $typeName = $this->pro_type[$type];
            if (!$return[$type]) {
                $return[$type] = ['id' => $type, 'name' => $typeName, 'condition_name' => $conditionName, 'sons' => [$info]];
            } else {
                array_push($return[$type]['sons'], $info);
            }
        }
        $return = array_values($return);
        $this->response($return);
    }

    /**
     * @desc  分级标准设置
     */
    public function rank_update() {
        $this->authCheck();
        $list = BaseUtils::getStr($_REQUEST['data']);
        $res = false;
        foreach ($list as $info) {
            $data = [];
            $id = $info['id'];
            if (!$id) {
                continue;
            }
            if ($info['max_condition'] && $info['min_condition'] && ($info['min_condition'] >= $info['max_condition'])) {
                $this->response('最小值不能大于等于最大值', 500, false);
            }
            $info['max_condition'] && $data['max_condition'] = $info['max_condition'];
            $info['min_condition'] && $data['min_condition'] = $info['min_condition'];
            if ($data) {
                $data['up_time'] = time();
                $res = M('customer_rank_config')->where(['id' => $id])->save($data);
            }
        }
        if (!$res) {
            $this->response('操作失败', 500, false);
        }
        $this->response('操作成功');
    }

    /**
     * @desc  客户分级列表
     */
    public function customers() {
        $this->authCheck();
        $params = $_REQUEST;
        $page = I('page', 1);
        $pageSize = I('page_size', 15);
        $name = BaseUtils::getStr($params['name']);
        $order = BaseUtils::getStr($params['order_file']);
        $asc = BaseUtils::getStr($params['order_asc']);

        //条件处理
        $where = [];
        $selectFields = ['is_manual', 'is_black', 'rank_name', 'is_perfection', 'name', 'pro_type', 'is_manual', 'birth_month']; //筛选字段
        foreach ($params as $fields => $value) {
            if ('' == $value) {
                continue;
            }
            if (in_array($fields, $selectFields)) {
                $value = BaseUtils::getStr($value);
                //客户信息是否完善
                if ($fields == 'is_perfection') {
                    $value && $where['customer_name'] = ['neq', ''];
                    !$value && $where['customer_name'] = '';
                    continue;
                }
                //名字模糊查询
                if ($fields == 'name' && $value) {
                    $map = [];
                    $map['customer_name'] = ['like', "%{$name}%"];
                    $map['contact_name'] = ['like', "%{$name}%"];
                    $map['_logic'] = 'OR';
                    $where['_complex'] = $map;
                    continue;
                }
                //生日筛选
                if ($fields == "birth_month") {
                    $moth = intval($value);
                    $moth = strlen($moth) == 1 ? "0{$moth}" : $moth;
                    $value = $moth;
                }
                $where[$fields] = $value;
            }
        }
        //查询权限
        if ($this->_permissionRes) {
            $where['role_id'] = ['in', $this->_permissionRes];
        }
        //排序处理
        $model = M('customer_rank')->where($where);
        if (in_array($order, ['money'])) {
            $model = $model->order("{$order} {$asc}");
        }

        //分页
        $startNo = ($page - 1) * $pageSize;
        $list = $model->limit($startNo, $pageSize)->select();
        $counts = M('customer_rank')->where($where)->count();

        foreach ($list as &$info) {
            include APP_PATH . "Common/city.cache.php";
            include APP_PATH . "Common/industry.cache.php";
            $info['city'] = $city_name[$info['city']];
            $info['industry'] = $industry_name[$info['industry']];
            $info['rank_name'] = $info['rank_name'] . '级';
            $info['pro_type'] = $this->pro_type[$info['pro_type']];
            $info['add_time'] = date('Y-m-d', $info['add_time']);
            $info['up_time'] = date('Y-m-d', $info['up_time']);
            $info['role_name'] = M('user')->where(['user_id' => $info['role_id']])->getField('full_name');
            !$info['role_name'] && $info['role_name'] = '';
            $money_list = M('customer_rank_list')->where(['customer_id' => $info['customer_id']])->field('rank_name,integral,pro_type')->select();
            $data = [];
            foreach ($money_list as $moneys) {
                $data[$moneys['pro_type']] = $moneys['integral'];
            }
            $enterNum = M('customer_rank_list')->where(['customer_id' => $info['customer_id'], 'pro_type' => 2])->getField('enter_num');
            $info['enter_num'] = intval($enterNum);
            $info['money_list'] = $data ? $data : [];
        }
        if (!$list) {
            $list = [];
            $counts = 0;
        }
        $this->response(['list' => $list, 'current_page' => $page, 'counts' => $counts, 'listrows' => $pageSize]);
    }

    /**
     * @desc  客户分级编辑
     * 【级别设置、拉黑操作】
     */
    public function edit() {
        $this->authCheck();
        $customerId = BaseUtils::getStr(I('customer_id', 0), 'int'); //客户ID
        $proType = BaseUtils::getStr(I('pro_type', 0), 'int'); //项目类型
        $rankName = strtoupper(BaseUtils::getStr(I('rank_name', ''))); //等级名称
        $isBlack = BaseUtils::getStr(I('is_black', 0), 'int'); //是否加入黑名单
        $isManual = BaseUtils::getStr(I('is_manual', ''), 'int'); //是否加入黑名单
        $note = BaseUtils::getStr(I('note', '')); //备注信息

        if ($customerId <= 0) {
            $this->response('参数：customer_id 必填', 500, false);
        }
        $info = M('customer_rank')->where(['customer_id' => $customerId])->find();
        if (!$info) {
            $this->response('客户不存在分级信息', 500, false);
        }
        $data = [];
        //项目类型修改
        if ($proType && $this->pro_type[$proType] && $info['pro_type'] != $proType) {
            $data['pro_type'] = $proType;
            $data['is_manual'] = 1;
        }
        //客户等级手工修改
        if ($rankName && $this->rank_name[$rankName] && $info['rank_name'] != $rankName) {
            $data['rank_name'] = $rankName;
            $data['is_manual'] = 1;
        }
        //手工分级修改
        if (isset($_REQUEST['is_manual']) && $isManual == 0) {
            $data['is_manual'] = 0;
        }
        //备注信息
        $note && $data['note'] = $note;
        //黑名单
        if (isset($_REQUEST['is_black']) && $isBlack !== '') {
            $data['is_black'] = $isBlack;
        }
        if (!$data) {
            $this->response('参数有误', 500, false);
        }
        $data['up_time'] = time();
        $res = M('customer_rank')->where(['customer_id' => $customerId])->save($data);
        if ($res === false) {
            $this->response(M('customer_rank')->getError(), 500, false);
        }
        $this->response('操作成功');
    }

    /**
     * @desc 读取公纵配置信息
     */
    public function getConfig() {
        $proType = $this->pro_type;
        unset($proType[0]);
        $data = [
            'pro_type' => $proType,
            'rank' => $this->rank_name,
        ];
        $this->response($data);
    }


    /**
     * @desc 客户回访条件配置
     */
    public function visitConfig() {
        $rankModel = M('customer_visit_config')->field('id,name,min_condition,unit,times,pro_type')->order('sort asc');
        $list = $rankModel->select();
        $return = [];

        foreach ($list as $info) {
            $type = $info['pro_type'];
            $conditionName = '金额';
            $type == 2 && $conditionName = '入职';
            if ($type == 3) {
                $conditionName = '签单';
                $info['times'] > 0 && $conditionName = "入职";
            }
            $info['condition_name'] = $conditionName;
            $typeName = $this->pro_type[$type];
            if (!$return[$type]) {
                $return[$type] = ['id' => $type, 'name' => $typeName, 'sons' => [$info]];
            } else {
                array_push($return[$type]['sons'], $info);
            }
        }
        $return = array_values($return);
        $this->response($return);
    }

    /**
     * @desc 回访条件更改
     */
    public function visitConfigUp() {
        $list = BaseUtils::getStr($_REQUEST['data']);
        $res = false;
        foreach ($list as $info) {
            $data = [];
            $id = $info['id'];
            if (!$id) {
                continue;
            }
            $info['times'] && $data['times'] = $info['times'];
            $info['min_condition'] && $data['min_condition'] = $info['min_condition'];
            if ($data) {
                $data['up_time'] = time();
                $res = M('customer_visit_config')->where(['id' => $id])->save($data);
            }
        }
        if (!$res) {
            $this->response('操作失败', 500, false);
        }
        $this->response('操作成功');
    }

    /**
     * @desc 待回访客户
     */
    public function visitList() {
        $page = BaseUtils::getStr(I('page', 1), 'int');
        $pageSize = BaseUtils::getStr(I('pageSize', 15), 'int');
        //回访时间
        $timeStart = BaseUtils::getStr(I('start_time', ''), 'string');
        $timeEnd = BaseUtils::getStr(I('end_time', ''), 'string');
        //事业部
        $departmentId = BaseUtils::getStr(I('department_id', '0'), 'int');
        //业务类型
        $proType = BaseUtils::getStr(I('pro_type', 0), 'int');
        //搜索字段【签单人、客户名、联系人、联系电话】
        $search = BaseUtils::getStr(I('search', ''), 'string');
        //是否有电话
        $isPhone = BaseUtils::getStr(I('is_phone', ''), 'int');
        //是否有商机
        $isBusiness = BaseUtils::getStr(I('is_business', ''), 'int');
        //是否导出操作
        $isExport = BaseUtils::getStr(I('is_export', 0), 'int');

        //时间判断
        if ($timeEnd && ($timeStart > $timeEnd)) {
            $this->response('结束时间不能大于开始时间', 500, false);
        }
        //查询条件组装
        $where = [];
        $timeStart && $where['add_time'] = ['gt', $timeStart];
        $timeEnd && $where['add_time'] = ['lt', $timeEnd];
        $departmentId && $where['p_department_id|department_id'] = $departmentId;
        $proType && $where['pro_type'] = $proType;
        $search && $where['customer_name|contact_name|phone'] = ['like', "%{$search}%"];
        if (isset($_REQUEST['is_phone'])) {
            $isPhone && $where['phone'] = ['neq', ''];
            !$isPhone && $where['phone'] = ['eq', ''];
        }
        if (isset($_REQUEST['is_business'])) {
            $where['business_status'] = $isBusiness;
        }
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";
        if (!$isExport) {
            $pageStart = ($page - 1) * $pageSize;
            $list = M('customer_visit')->where($where)->limit($pageStart, $pageSize)->select();
            foreach ($list as &$info) {
                $info['city'] = $city_name[$info['city']];
                $info['industry'] = $industry_name[$info['industry']];
                $info['add_time'] = date("Y-m-d", $info['add_time']);
                $info['last_visit_time'] && $info['last_visit_time'] = date("Y-m-d", $info['last_visit_time']);
                $info['finish_time'] && $info['finish_time'] = date("Y-m-d", $info['finish_time']);
            }
            $this->response(['list' => $list]);

        } else {
            //@todo 数据导出excel
            //导出excel操作

        }
    }

    /**
     * @desc 已经回访的客户
     */
    public function visited() {

    }

    /**
     * @desc 统计
     */
    public function logs() {

    }

    /**
     * @todo 信息补充完整
     * @desc 客户详情内页
     * 1、客户信息
     * 2、项目列表
     * 3、回访列表信息
     * 4、匹配爱客系统
     * 5、添加项目资料
     */
    public function customerInfo() {
        $customerId = BaseUtils::getStr(I('customer_id', 0), 'int');
        if (!$customerId) {
            $this->response('参数错误', 500, false);
        }
        $customerFiled = "customer_id,contacts_id,customer_owner_id,customer_owner_name,creator_role_id,name as customer_name,telephone";
        $customerInfo = M('customer')->field($customerFiled)->where(['customer_id' => $customerId])->find();
        $visitInfo = M('customer_visit')->where(['customer_id' => $customerId])->find();
        if (!$customerInfo || !$visitInfo) {
            $this->response('客户信息不存在', 500, false);
        }
        //客户等级
        $customerInfo['rank'] = M('customer_rank')->where(['customer_id' => $customerId])->getField('rank_name');
        //回访次数
        $customerInfo['visit_times'] = '';
        //上次回访时间
        $customerInfo['last_visit_time'] = '';
        //客户联系人
        $customerInfo['contacts'] = '';
        //联系电话
        $customerInfo['contacts_phone'] = '';
        //项目列表
        $businessField = "name,business_id,creator_role_id";
        $businessList = M('business')->field($businessField)->where(['customer_id' => $customerId, 'is_deleted' => 0])->select();
        foreach ($businessList as &$businessInfo) {
            //1、项目状态
            $businessInfo['status'] = '';
            //2、面试时间
            $businessInfo['interview_time'] = '';
            //3、offer时间
            $businessInfo['offer_time'] = '';
            //4、入职时间
            $businessInfo['enter_time'] = '';
            //5、回款时间
            $businessInfo['invoice_time'] = '';
            //6、合同开始时间
            $businessInfo['contract_start_time'] = '';
            //7、合同结束时间
            $businessInfo['contract_end_time'] = '';

        }
        $customerInfo['businessList'] = $businessList ? $businessList : [];
        //回访记录
        $visit = M('customer_visit_note')->where(['customer_id' => $customerId])->select();
        $customerInfo['visit_log'] = $visit ? $visit : [];
        $this->response(['info' => $customerInfo]);
    }

    /**
     * @desc 回访备注
     */
    public function visitRemark() {


    }
}