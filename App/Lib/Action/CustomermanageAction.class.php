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
    protected $proTypes = [
        1 => '线上面试快', //面试快
        2 => '线上入职快', //入职快
        3 => '线上专业猎头', //专业猎头
        4 => '线下慧沟通', //慧简历
        5 => '线下慧面试', //面试快
        6 => '线下慧入职', // 入职快
        7 => '线下专业猎头'//专业猎头
    ];
    protected $rank_name = ['A' => 'A级', 'B' => 'B级', 'C' => 'C级', 'D' => 'D级'];
    protected $call_status = [1 => '接通电话', 2 => '电话未接听', 3 => '无效电话', 4 => '电话忙'];
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
            $this->error('您没有权限操作');
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
     * @desc 回访内页
     */
    public function customer_info() {
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
        $name = trim(BaseUtils::getStr($params['name']));
        $order = trim(BaseUtils::getStr($params['order_file']));
        $asc = trim(BaseUtils::getStr($params['order_asc']));

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
            'allProType' => $this->proTypes
        ];
        $this->response($data);
    }


    /**
     * @desc 客户回访条件配置
     */
    public function visitConfig() {
        $rankModel = M('customer_visit_config')->field('id,name,min_condition,unit,times,pro_type,is_sign')->order('sort asc');
        $list = $rankModel->select();
        $return = [];

        foreach ($list as $info) {
            $type = $info['pro_type'];
            $conditionName = '金额';
            ($type == 2 || $type == 6) && $conditionName = '入职';
            if ($type == 3 || $type == 7) {
                $conditionName = '签单';
                $info['times'] > 0 && $conditionName = "入职";
            }
            $info['condition_name'] = $conditionName;
            $typeName = $this->proTypes[$type];
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
        if (!$this->_permissionRes) {
            $this->response('您没有权限操作', 500, false);
        }
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
            if ($info['is_sign'] == 0 && $info['min_condition']) {
                $data['is_sign'] = 0;
            } else {
                $data['is_sign'] = 1;
                $data['min_condition'] = 0;
            }
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
     * @desc 商机取消
     */
    public function businessCancel() {
        $visitId = BaseUtils::getStr(I('visit_id'), 'int');
        if (!$visitId) {
            $this->response('visit_id缺失', 500, false);
        }
        M('customer_visit')->where(['id' => $visitId])->save(['business_status' => 0]);
        $this->response('操作成功');
    }

    /**
     * @desc 待回访客户
     * @desc 已经回访客户列表
     */
    public function visitList() {
        $this->_permissionRes = getPerByAction(MODULE_NAME, 'visit');
        $page = BaseUtils::getStr(I('page', 1), 'int');
        $pageSize = BaseUtils::getStr(I('page_size', 15), 'int');
        //回访时间
        $timeStart = BaseUtils::getStr(I('start_time', ''), 'string');
        $timeEnd = BaseUtils::getStr(I('end_time', ''), 'string');
        //事业部
        $departmentId = BaseUtils::getStr(I('department_id', '0'), 'int');
        //业务类型
        $proType = BaseUtils::getStr(I('pro_type', 0), 'int');
        //搜索字段【签单人、客户名、联系人、联系电话】
        $search = trim(BaseUtils::getStr(I('search', ''), 'string'));
        //是否有电话
        $isPhone = BaseUtils::getStr(I('is_phone', ''), 'int');
        //是否有商机
        $isBusiness = BaseUtils::getStr(I('is_business', ''), 'int');
        //是否导出操作
        $isExport = BaseUtils::getStr(I('is_export', 0), 'int');
        //回访状态 1:已经回访 0:待回访
        $visitStatus = BaseUtils::getStr(I('visit_status', 0));

        //时间判断
        if ($timeEnd && ($timeStart > $timeEnd)) {
            $this->response('结束时间不能大于开始时间', 500, false);
        }

        //查询条件组装
        $where = [];
        if ($timeEnd) {
            $timeEnd = $timeEnd . ' 23:59:59';
        }
        $timeStart && $where['add_time'] = ['gt', strtotime($timeStart)];
        $timeEnd && $where['add_time'] = ['lt', strtotime($timeEnd)];
        if ($timeStart && $timeEnd) {
            $where['add_time'] = [['gt', strtotime($timeStart)], ['lt', strtotime($timeEnd)]];
        }
        $departmentId && $where['p_department_id|department_id'] = $departmentId;
        $proType && $where['pro_type'] = $proType;
        $where['status'] = $visitStatus;
        if ($visitStatus == 1) {
            $where['status'] = ['in', [1, 2]];
        }
        $search && $where['customer_name|contact_name|phone|signer'] = ['like', "%{$search}%"];
        if (isset($_REQUEST['is_phone']) && strlen($isPhone) > 0) {
            $isPhone && $where['phone'] = ['neq', ''];
            if ($isPhone === 0) {
                $where["_string"] = "phone = '' or phone_invalid = 1 ";
            } else {
                $where["_string"] = "phone <> '' or phone_invalid = 0 ";
            }
        }
        if (isset($_REQUEST['is_business']) && strlen($isBusiness) > 0) {
            $where['business_status'] = $isBusiness;
        }
        $where['role_id'] = ['in', $this->_permissionRes];
        include APP_PATH . "Common/city.cache.php";
        include APP_PATH . "Common/industry.cache.php";

        if (!$isExport) {
            $pageStart = ($page - 1) * $pageSize;
            $list = M('customer_visit')->where($where)->order('id desc')->limit($pageStart, $pageSize)->select();
            foreach ($list as &$info) {
                $customerId = $info['customer_id'];
                $info['pro_type'] = $this->proTypes[$info['pro_type']];
                $info['city'] = $city_name[$info['city']];
                $info['is_business'] =  $info['business_status'];
                $info['industry'] = $industry_name[$info['industry']];
                $info['add_time'] = date("Y-m-d", $info['add_time']);
                $info['last_visit_time'] && $info['last_visit_time'] = date("Y-m-d", $info['last_visit_time']);
                $info['finish_time'] && $info['finish_time'] = date("Y-m-d", $info['finish_time']);
                $signInfo = $this->signInfo(false, $customerId);
                $info['signer'] = $signInfo['signer'];
                $this->infoMaintain($customerId, $info);
            }
            $counts = M('customer_visit')->where($where)->count();
            $this->response(['list' => $list, 'current_page' => $page, 'counts' => $counts]);

        } else {
            //@todo 数据导出excel
            //导出excel操作
            $list = M('customer_visit')->where($where)->limit(0, 500)->select();
            foreach ($list as &$info) {
                $customerId = $info['customer_id'];
                $lastPro = $this->lastBusiness($customerId, $info['pro_type']);
                $info['update_time'] = $lastPro['last_update'];
                $info['status'] = $lastPro['pro_status'];
                $info['pro_name'] = $lastPro['name'];
                $info['offer_time'] = $lastPro['offer'] ? date("Y-m-d", $lastPro['offer']) : '';
                $info['enter_time'] = $lastPro['enter'] ? date("Y-m-d", $lastPro['enter']) : '';

                $info['pro_type'] = $this->proTypes[$info['pro_type']];
                $info['city'] = $city_name[$info['city']];
                $info['industry'] = $industry_name[$info['industry']];

                $roles = M('customer')->where(['customer_id' => $customerId])->getField("creator_role_id");
                $info['manager'] = M('user')->where(['role_id' => $roles])->getField("full_name");

                $signInfo = $this->signInfo(false, $customerId);
                $info['contract_start'] = $signInfo['contract_start'] ? $signInfo['contract_start'] : '';
                $info['contract_end'] = $signInfo['contract_end'] ? $signInfo['contract_end'] : '';
                $info['invoice_time'] = $signInfo['invoice_time'] ? $signInfo['invoice_time'] : '';
                $info['seal_company'] = $signInfo['seal_company'] ? $signInfo['seal_company'] : '';
                $info['signer'] = $signInfo['signer'] ? $signInfo['signer'] : '';

            }
            $expCellName = [
                ['pro_type', '项目类型'],
                ['department_name', '部门'],
                ['signer', '签单人'],
                ['p_department_name', '事业部'],
                ['customer_name', '客户'],
                ['industry', '行业'],
                ['product', '产品'],
//                ['callsucc_num', '保证期'],
                ['seal_company', '盖章公司'],
                ['manager', '项目经理'],
                ['pro_name', '职位名称'],
                ['status', '进展'],
                ['update_time', '更新时间'],
                ['offer_time', 'offer日期'],
                ['enter_time', '入职日期'],
                ['invoice_time', '回款日期'],
                ['contract_start', '合同开始'],
                ['contract_end', '合同结束']
            ];
            $this->exportExcel('客户待回访数据', $list, $expCellName);
        }
    }

    /**
     * @desc  信息维护
     * @param $customerId
     * @param $info
     * @return bool
     */
    private function infoMaintain($customerId, $info) {
        $visitInfo = M('customer_visit')->where(['customer_id' => $customerId])->find();
        $data = [];
        if (!$visitInfo['signer'] && $info['signer']) {
            $data['signer'] = $info['signer'];
        }
        $customerInfo = M('customer')->where(['customer_id' => $customerId])->find();
        $contactsInfo = $this->customerContacts($customerInfo['contacts_id'], $customerId);
        if (!$visitInfo['phone']) {
            $contactsId = $customerInfo['contacts_id'];
            $phone = M('contacts')->where(['contacts_id' => $contactsId])->getField('telephone');
            $phone && $data['phone'] = $phone;
        } else {
            if ($contactsInfo['telephone'] && $contactsInfo['telephone'] != $visitInfo['phone']) {
                $data['phone'] = $contactsInfo['telephone'];
                $data['contact_name'] = $contactsInfo['name'];
                $data['contacts_id'] = $contactsInfo['contacts_id'];
            }
        }
        if ($data) {
            M('customer_visit')->where(['customer_id' => $customerId])->save($data);
        }
    }

    /**
     * @desc 统计
     */
    public function logs() {
        $page = BaseUtils::getStr(I('page', 1), 'int');
        $pageSize = BaseUtils::getStr(I('page_size', 15), 'int');
        //回访时间
        $timeStart = BaseUtils::getStr(I('start_time', ''), 'string');
        $timeEnd = BaseUtils::getStr(I('end_time', ''), 'string');
        //事业部
        $departmentId = BaseUtils::getStr(I('department_id', '0'), 'int');
        //业务类型
        $proType = BaseUtils::getStr(I('pro_type', 0), 'int');
        //是否导出操作
        $isExport = BaseUtils::getStr(I('is_export', 0), 'int');
        $search = BaseUtils::getStr(I('search', ''), 'string');
        $where = [];
        //时间判断
        if ($timeEnd && ($timeStart > $timeEnd)) {
            $this->response('结束时间不能大于开始时间', 500, false);
        }
        $timeStart && $where['visit.finish_time'] = ['gt', strtotime($timeStart)];
        $timeEnd && $where['visit.finish_time'] = ['lt', strtotime($timeEnd)];
        if ($timeStart && $timeEnd) {
            $where['visit.finish_time'] = [['gt', strtotime($timeStart)], ['lt', strtotime($timeEnd)]];
        }
        if ($search) {
            $where['customer_name|signer|contact_name|phone'] = ['like', "%{$search}%"];
        }
        $departmentId && $where['visit.p_department_id'] = $departmentId;
        $proType && $where['visit.pro_type'] = $proType;
        $where['visit.role_id'] = ['in', $this->_permissionRes];

        $model = M('customer_visit_note');
        $fields = "note.pro_type,visit.p_department_name,visit.p_department_id";
        if ($isExport) {
            $page = 1;
            $pageSize = 500;
        }
        $starNo = ($page - 1) * $pageSize;
        $list = $model->field($fields)->alias('note')
            ->join("mx_customer_visit visit ON visit.id = note.visit_id")
            ->where($where)
            ->group("note.pro_type,visit.p_department_id")
            ->limit($starNo, $pageSize)
            ->select();

        $map = [];
        $timeStart && $map['visit.finish_time'] = ['gt', $timeStart];
        $timeEnd && $map['visit.finish_time'] = ['lt', $timeEnd];
        $list = $this->getLogData($list, $map);
        //数据列表
        if (!$isExport) {
            $counts = $model->field($fields)->alias('note')
                ->join("mx_customer_visit visit ON visit.id = note.visit_id")
                ->where($where)
                ->group("visit.pro_type,visit.p_department_id")
                ->select();
            $counts = count($counts);
            $this->response(['list' => $list, 'current_page' => $page, 'counts' => $counts]);
        } else {
            //excel导出
            $expCellName = [
                ['pro_type', '项目类型'],
                ['p_department_name', '部门'],
                ['raw_data', '原始数据'],
                ['can_visit', '可回访数据'],
                ['visit_success', '回访成功'],
                ['in_time', '及时联系'],
                ['not_in_time', '未及时联系'],
                ['understand', '岗位理解'],
                ['not_understand', '岗位不理解'],
                ['recommend', '推荐简历'],
                ['not_recommend', '未推荐简历'],
                ['resume_enough', '推荐足够数量'],
                ['resume_not_enough', '未推荐足够数量'],
                ['business', '商机'],
                //推荐质量满意度
                ['quality_very_satisfied', '推荐质量非常满意'],
                ['quality_satisfaction', '推荐质量满意'],
                ['quality_general', '推荐质量基本满意'],
                ['quality_dissatisfied', '推荐质量不满意'],
                ['quality_very_dissatisfied', '推荐质量不太满意'],
                //推荐数量满意度
                ['recommends_very_satisfied', '推荐数量非常满意'],
                ['recommends_satisfaction', '推荐数量满意'],
                ['recommends_general', '推荐数量基本满意'],
                ['recommends_dissatisfied', '推荐数量不满意'],
                ['recommends_very_dissatisfied', '推荐数量不太满意'],
                //服务满意度
                ['service_very_satisfied', '服务非常满意'],
                ['service_satisfaction', '服务满意'],
                ['service_general', '服务基本满意'],
                ['service_dissatisfied', '服务不满意'],
                ['service_very_dissatisfied', '服务不太满意'],
                //反馈速度满意度
                ['feedback_very_satisfied', '反馈速度非常满意'],
                ['feedback_satisfaction', '反馈速度满意'],
                ['feedback_general', '反馈速度基本满意'],
                ['feedback_dissatisfied', '反馈速度不满意'],
                ['feedback_very_dissatisfied', '反馈速度不太满意'],
                //入职人员满意度
                ['enter_very_satisfied', '入职人员非常满意'],
                ['enter_satisfaction', '入职人员满意'],
                ['enter_general', '入职人员基本满意'],
                ['enter_dissatisfied', '入职人员不满意'],
                ['enter_very_dissatisfied', '入职人员不太满意'],
                //整体满意度
                ['very_satisfied', '整体非常满意'],
                ['satisfaction', '整体满意'],
                ['general', '整体基本满意'],
                ['dissatisfied', '整体不满意'],
                ['very_dissatisfied', '整体不太满意'],
            ];
            $this->exportExcel('回访数据统计', $list, $expCellName);
        }
    }

    /**
     * @desc 统计回访数据
     * @param $list
     * @param array $map
     * @return mixed
     */
    private function getLogData($list, $map = []) {
        $visitModel = M('customer_visit');
        $noteModel = M('customer_visit_note');
        foreach ($list as &$info) {
            $map['pro_type'] = $info['pro_type'];
            $map['p_department_id'] = $info['p_department_id'];
            $info['pro_type'] = $this->pro_type[$info['pro_type']];
            //原始数据
            $info['raw_data'] = $visitModel->where($map)->count();
            //可回访数据
            $info['can_visit'] = $visitModel->where($map)->where(['status' => 0])->count();
            //回访成功
            $info['visit_success'] = $visitModel->where($map)->where(['status' => 1])->count();
            //及时联系
            $field = "DISTINCT visit_id";
            $noteModel = $noteModel->where($map);
            $info['in_time'] = $noteModel->where(['is_in_time' => 1])->count($field);
            //未及时联系
            $info['not_in_time'] = $noteModel->where(['is_in_time' => 0])->count($field);
            //理解岗位
            $info['understand'] = $noteModel->where(['is_understand' => 1])->count($field);
            //不理解岗位
            $info['not_understand'] = $noteModel->where(['is_understand' => 0])->count($field);
            //推荐简历
            $info['recommend'] = $noteModel->where(['is_recommend' => 1])->count($field);
            //未推荐简历
            $info['not_recommend'] = $noteModel->where(['is_recommend' => 0])->count($field);
            //推荐足够数量
            $info['resume_enough'] = $noteModel->where(['is_resume_enough' => 1])->count($field);
            $info['resume_not_enough'] = $noteModel->where(['is_resume_enough' => 0])->count($field);

            //推荐质量满意度
            $info['quality_very_satisfied'] = $noteModel->where(['quality_degree' => 5])->count($field);
            $info['quality_satisfaction'] = $noteModel->where(['quality_degree' => 4])->count($field);
            $info['quality_general'] = $noteModel->where(['quality_degree' => 3])->count($field);
            $info['quality_dissatisfied'] = $noteModel->where(['quality_degree' => 2])->count($field);
            $info['quality_very_dissatisfied'] = $noteModel->where(['quality_degree' => 1])->count($field);

            //推荐数量满意度
            $info['recommends_very_satisfied'] = $noteModel->where(['recommends_degree' => 5])->count($field);
            $info['recommends_satisfaction'] = $noteModel->where(['recommends_degree' => 4])->count($field);
            $info['recommends_general'] = $noteModel->where(['recommends_degree' => 3])->count($field);
            $info['recommends_dissatisfied'] = $noteModel->where(['recommends_degree' => 2])->count($field);
            $info['recommends_very_dissatisfied'] = $noteModel->where(['recommends_degree' => 1])->count($field);

            //服务满意度
            $info['service_very_satisfied'] = $noteModel->where(['service_degree' => 5])->count($field);
            $info['service_satisfaction'] = $noteModel->where(['service_degree' => 4])->count($field);
            $info['service_general'] = $noteModel->where(['service_degree' => 3])->count($field);
            $info['service_dissatisfied'] = $noteModel->where(['service_degree' => 2])->count($field);
            $info['service_very_dissatisfied'] = $noteModel->where(['service_degree' => 1])->count($field);

            //反馈速度满意度
            $info['feedback_very_satisfied'] = $noteModel->where(['feedback_degree' => 5])->count($field);
            $info['feedback_satisfaction'] = $noteModel->where(['feedback_degree' => 4])->count($field);
            $info['feedback_general'] = $noteModel->where(['feedback_degree' => 3])->count($field);
            $info['feedback_dissatisfied'] = $noteModel->where(['feedback_degree' => 2])->count($field);
            $info['feedback_very_dissatisfied'] = $noteModel->where(['feedback_degree' => 1])->count($field);

            //入职人员满意度
            $info['enter_very_satisfied'] = $noteModel->where(['enter_degree' => 5])->count($field);
            $info['enter_satisfaction'] = $noteModel->where(['enter_degree' => 4])->count($field);
            $info['enter_general'] = $noteModel->where(['enter_degree' => 3])->count($field);
            $info['enter_dissatisfied'] = $noteModel->where(['enter_degree' => 2])->count($field);
            $info['enter_very_dissatisfied'] = $noteModel->where(['enter_degree' => 1])->count($field);

            //整体满意度
            $info['very_satisfied'] = $noteModel->where(['degree' => 5])->count($field);
            $info['satisfaction'] = $noteModel->where(['degree' => 4])->count($field);
            $info['general'] = $noteModel->where(['degree' => 3])->count($field);
            $info['dissatisfied'] = $noteModel->where(['degree' => 2])->count($field);
            $info['very_dissatisfied'] = $noteModel->where(['degree' => 1])->count($field);

            //信息不准确
            $info['Information_error'] = $noteModel->where(['call_status' => 3])->count($field);;
            //商机信息
            $info['business'] = $noteModel->where(['is_business' => 1])->count($field);
        }
        return $list;
    }

    /**
     * @desc 不回访
     */
    public function notVisit() {
        $visitId = BaseUtils::getStr(I('visit_id', 0));
        $note = BaseUtils::getStr(I('visit_note', ''));
        if (!$visitId) {
            $this->response('参数错误', 500, false);
        }
        $info = M('customer_visit')->where(['id' => $visitId])->find();
        if (!$info) {
            $this->response('数据错误', 500, false);
        }
        if ($info['status'] == 1) {
            $this->response('已经回访过了', 500, false);
        }
        $data = [
            'visit_id' => $visitId, 'customer_id' => $info['customer_id'], 'pro_type' => $info['pro_type'], 'create_role' => session('role_id'),
            'is_finish' => 1, 'finish_time' => time(), 'visit_note' => $note, 'add_time' => time(), 'visit_status' => 2, 'is_finish' => 2
        ];
        $res = M('customer_visit_note')->add($data);
        if ($res) {
            $this->changeVisit($visitId, ['status' => 2]);
            $this->response();
        }
        $this->response("系统错误", 500, false);
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
        $customerFiled = "customer_id,contacts_id,customer_owner_id,customer_owner_name,creator_role_id,name as customer_name,telephone,create_time";
        $customerInfo = M('customer')->field($customerFiled)->where(['customer_id' => $customerId])->find();
        $visitInfo = M('customer_visit')->where(['customer_id' => $customerId])->find();
        if (!$customerInfo || !$visitInfo) {
            $this->response('客户信息不存在', 500, false);
        }
        $customerInfo['create_time'] = date("Y-m-d", $customerInfo['create_time']);
        //1客户等级
        $customerInfo['rank'] = M('customer_rank')->where(['customer_id' => $customerId])->getField('rank_name');
        //回访次数
        $visitInfo = M('customer_visit')->field('times,last_visit_time,contact_name,phone')->where(['customer_id' => $customerId, 'status' => 1])->order('id desc')->find();
        $customerInfo['visit_times'] = $visitInfo['times'] ? $visitInfo['times'] : 0;
        //上次回访时间
        $customerInfo['last_visit_time'] = $visitInfo['last_visit_time'] ? date('Y-m-d', $visitInfo['last_visit_time']) : '';
        //客户联系人
        $contactsInfo = $this->customerContacts($customerInfo['contacts_id'], $customerId);
        $customerInfo['contacts'] = $contactsInfo['name'];
        //联系电话
        $customerInfo['contacts_phone'] = $contactsInfo['telephone'];
        //签约信息
        $signInfo = $this->signInfo(false, $customerId);
        //回款时间
        $customerInfo['invoice_time'] = $signInfo['invoice_time'] ? $signInfo['invoice_time'] : '';
        //合同开始时间
        $customerInfo['contract_start_time'] = $signInfo['contract_start'] ? $signInfo['contract_start'] : '';
        //合同结束时间
        $customerInfo['contract_end_time'] = $signInfo['contract_end'] ? $signInfo['contract_end'] : '';
        //盖章公司
        $customerInfo['seal_company'] = $signInfo['seal_company'];
        //签单人
        $customerInfo['signer'] = $signInfo['signer'] ? $signInfo['signer'] : '';

        //项目列表
        $businessField = "name,business_id,creator_role_id,update_time,pro_type,creator_role_id,owner_role_id";
        $businessList = M('business')->field($businessField)->where(['customer_id' => $customerId, 'is_deleted' => 0])->order('business_id desc')->limit(50)->select();
        foreach ($businessList as &$businessInfo) {
            $businessId = $businessInfo['business_id'];
            $businessInfo['update_time'] = date("Y-m-d", $businessInfo['update_time']);
            $businessInfo['pro_type'] = isset($this->proTypes[$businessInfo['pro_type']]) ? $this->proTypes[$businessInfo['pro_type']] : '无';
            //1、项目状态
            $statusId = M('fine_project')->where(['project_id' => $businessId])->order("status desc")->getField('status');
            $businessInfo['status'] = isset(C('PROJECT_STATUS')[$statusId]) ? C('PROJECT_STATUS')[$statusId] : '无';
            //2、面试时间
            $businessInfo['interview_time'] = $this->businessLog($businessId, 'fine_project_interview');
            //3、offer时间
            $businessInfo['offer_time'] = $this->businessLog($businessId, 'fine_project_offer');
            //4、入职时间
            $businessInfo['enter_time'] = $this->businessLog($businessId, 'fine_project_enter');
            //5、项目经理
            $roleList = M('user')->where("role_id in ({$businessInfo['owner_role_id']})")->getField("full_name", true);
            $businessInfo['owner_list'] = implode(",", $roleList);
            //事业部
            $departments = $this->departments($businessInfo['creator_role_id']);
            $businessInfo['p_department'] = $departments['p_department'];
            //部门
            $businessInfo['department'] = $departments['department'];
        }
        $customerInfo['businessList'] = $businessList ? $businessList : [];
        //回访记录
        $visit = M('customer_visit_note')->where(['customer_id' => $customerId])->order('id desc')->select();
        foreach ($visit as &$visitInfo) {
            $visitInfo['add_time'] = date("Y-m-d H:i:s", $visitInfo['add_time']);
            $visitInfo['call_status'] = $this->call_status[$visitInfo['call_status']] ? $this->call_status[$visitInfo['call_status']] : '无';
            $visitInfo['phone_record'] = $visitInfo['phone_record'] ? $visitInfo['phone_record'] : '无';
            $userName = M('user')->where(['role_id' => $visitInfo['create_role']])->getField('full_name');
            $visitInfo['create_role'] = $userName ? $userName : '';
        }
        $customerInfo['visit_log'] = $visit ? $visit : [];
        $this->response(['info' => $customerInfo]);
    }

    /**
     * @desc 获取客户所有的顾问
     * @param int $customerId
     */
    public function getCustomerUsers($customerId = 0) {
        if (!$customerId) {
            $customerId = BaseUtils::getStr(I('customer_id', 0), 'int');
        }
        $business = M('business')->field("owner_role_id,creator_role_id")->where(['customer_id' => $customerId])->select();
        $roles = "";
        foreach ($business as $role) {
            $ownerIds = $role['owner_role_id'];
            $creator = $role['creator_role_id'];
            if (!$ownerIds) {
                $ownerIds = $creator;
            }
            if (!$ownerIds) {
                continue;
            }
            $roles .= "{$ownerIds},";
        }
        $roles = rtrim($roles, ",");
        $users = [];
        if ($roles) {
            $list = explode(',', $roles);
            $list = array_unique($list);
            foreach ($list as $roleId) {
                if (!$roleId) {
                    continue;
                }
                $name = M('user')->where(['role_id' => $roleId])->getField("full_name");
                $users[] = ['name' => $name ? $name : '', 'id' => $roleId];
            }
        }
        $this->response(["list" => $users]);
    }

    /**
     * @desc 部门和上级部门信息
     * @param $roleId
     * @return array
     */
    private function departments($roleId) {
        $positionId = M('role')->where(['role_id' => $roleId])->getField('position_id');
        $departmentId = M('position')->where(['position_id' => $positionId])->getField('department_id');
        $parentDepartmentId = M('role_department')->where(['department_id' => $departmentId])->getField('parent_id');
        $departmentList = M('role_department')->where(['department_id' => ['in', "{$departmentId},{$parentDepartmentId}"]])->getField('department_id,name', true);
        return [
            'department' => $departmentList[$departmentId],
            'p_department' => $departmentList[$parentDepartmentId] ? $departmentList[$parentDepartmentId] : $departmentList[$departmentId]];
    }

    /**
     * @desc 项目流程数据
     * @param $table
     * @param $where
     * @param string $field
     * @return mixed
     */
    private function businessLog($where, $table, $field = "log.addtime") {
        if ($where > 0) {
            $where = ['fine.project_id' => $where];
        }

        $info = M('fine_project')
            ->alias('fine')
            ->join("INNER JOIN mx_{$table} log ON log.fine_id = fine.id")
            ->where($where)
            ->order("{$field} asc")
            ->getField($field);
        return $field && $info ? date("Y-m-d", $info) : '';
    }

    /**
     * @desc 最新项目信息
     * @param $customerId
     * @param $type
     * @return mixed|string
     */
    private function lastBusiness($customerId, $type = 0) {
        $businessInfo = M('business')->where(['customer_id' => $customerId, 'pro_type' => $type])->order('business_id desc')->find();
        $fineInfo = M('fine_project')->where(['project_id' => $businessInfo['business_id'], 'com_id' => $customerId])->order("status desc")->find();
        $fineId = $fineInfo['id'];
        $businessInfo['pro_status'] = C('PROJECT_STATUS')[$fineInfo['status']];
        $businessInfo['last_update'] = $fineInfo['updatetime'] ? date("Y-m-d", $fineInfo['updatetime']) : '';
        $businessInfo['offer'] = M('fine_project_offer')->where(['fine_id' => $fineId])->order("addtime")->getField("addtime");
        $businessInfo['enter'] = M('fine_project_enter')->where(['fine_id' => $fineId])->order("addtime")->getField("addtime");
        return $businessInfo;
    }

    /**
     * @desc 回访备注
     */
    public function visitRemark() {
        if (!$this->_permissionRes) {
            $this->response('您没有权限操作', 500, false);
        }
        $params = $_REQUEST;
        if (!$params) {
            $this->response('请求数据错误', 500, false);
        }
        $visitId = BaseUtils::getStr($params['visit_id']);
        $isFinish = BaseUtils::getStr($params['is_finish']);
        $info = M('customer_visit')->where(['id' => $visitId])->find();
        if (!$info) {
            $this->response('请求数据错误', 500, false);
        }
        $mustFields = [
            'call_status' => '电话结果', 'pro_type' => '项目类型', 'is_follow' => '是否跟进',
            'is_finish' => '是否完成回访', 'is_business' => '是否有商机', 'nest_visit' => '下次是否回放'
        ];
        //必填项检测
        if ($isFinish == 1) {
            foreach ($mustFields as $field => $name) {
                if (!isset($params[$field])) {
                    $this->response("请选择 {$name}", 500, false);
                }
            }
        }
        $customerId = $info['customer_id'];
        $customerInfo = M('customer')->where(['customer_id' => $customerId])->find();
        $creator = $customerInfo['creator_role_id'];
        $data = [];
        foreach ($params as $key => $value) {
            $value = BaseUtils::getStr($value);
            //电话结果
            if ($key == "call_status") {
                (!isset($this->call_status[$value]) && $isFinish) && $this->response('请选择正确的电话结果', 500, false);
                //联系方式错误发送消息
                if ($value == 3) {
                    ($value == 3 && $isFinish) && $this->messageNotice($creator, $customerId, 5);
                    M('customer_visit')->where(['id' => $visitId])->save(['phone_invalid' => 1]);
                }

            }
            //项目类型
            if ($key == "pro_type" && $value) {
                (!isset($this->proTypes[$value]) && $isFinish) && $this->response('请选择正确的项目类型', 500, false);
            }
            //评分分数检测
            if (in_array($key, ['matching_degree', 'service_degree', 'feedback_degree', 'quality_degree', 'degree', 'recommends_degree', 'enter_degree']) && $value) {
                (!isset($this->degree[$value]) && $isFinish) && $this->response('满意度评分错误', 500, false);
            }
            //下次跟进时间
            if ($key == 'follow_time' && $value) {
                $value = strtotime($value);
                $this->messageNotice(session('role_id'), $customerId, 4);
            }
            //回访完成
            if ($key == "is_finish" && $value == 1) {
                $data['finish_time'] = time();
            }
            //有商机
            if ($key == 'is_business' && $value) {
                M('customer_visit')->where(['id' => $visitId])->save(['business_status' => 1]);
            }
            //消息通知顾问
            if ($key == "message_role" && $value > 1) {
                $this->messageNotice($value, $customerId);
            }
            $data[$key] = $value;
        }
        if (!$data) {
            $this->response('请求数据错误', 500, false);
        }
        $data['add_time'] = time();
        $data['create_role'] = session('role_id');
        $data['customer_id'] = $info['customer_id'];
        $data['update_time'] = time();
        $data['p_department_id'] = $info['p_department_id'];
        $data['p_department_name'] = $info['p_department_name'];
        $res = M('customer_visit_note')->add($data);
        if (!$res) {
            $this->response("系统错误", 500, false);
        }
        $data['is_finish'] == 1 && $this->changeVisit($visitId, ['status' => 1, 'business_status' => $params['is_business']]);
        $this->response();
    }

    /**
     * @desc  客户签单信息添加
     */
    public function signInfoAdd() {
        $customerId = BaseUtils::getStr(I('customer_id', 0), 'int');
        $signer = BaseUtils::getStr(I('signer', 0));
        $company = BaseUtils::getStr(I('seal_company', ''));
        $start = BaseUtils::getStr(I('contract_start', ''));
        $end = BaseUtils::getStr(I('contract_end', ''));
        $invoiceTime = BaseUtils::getStr(I('invoice_time', ''));
        $customerInfo = M('customer')->where(['customer_id' => $customerId])->find();
        if (!$customerId || !$customerInfo) {
            $this->response("客户信息缺失", 500, false);
        }
        $data = [];
        $signer && $data['signer'] = $signer;
        $company && $data['seal_company'] = $company;
        $start && $data['contract_start'] = strtotime($start);
        $end && $data['contract_end'] = strtotime($end);
        $invoiceTime && $data['invoice_time'] = strtotime($invoiceTime);
        if (!$data) {
            $this->response("数据错误", 500, false);
        }
        $data['sign_date'] = time();
        $res = M('customer_data')->where(['customer_id' => $customerId])->save($data);
        !$res && $this->response("系统错误", 500, false);
        $this->response("操作成功");
    }

    /**
     * @desc 获取签单信息
     * @param int $customerId
     * @param bool $isAjax 是否是接口获取
     * @return array|mixed|string
     */
    public function signInfo($isAjax = true, $customerId = 0) {
        if ($customerId <= 0) {
            $customerId = BaseUtils::getStr(I('customer_id', 0), 'int');
        }
        $info = M('customer_data')
            ->field("customer_id,signer,seal_company,contract_start,contract_end,invoice_time")
            ->where(['customer_id' => $customerId])
            ->find();
        if ($info) {
            $info['contract_start'] = $info['contract_start'] ? date("Y-m-d", $info['contract_start']) : '';
            $info['contract_end'] = $info['contract_end'] ? date("Y-m-d", $info['contract_end']) : '';
            $info['invoice_time'] = $info['invoice_time'] ? date("Y-m-d", $info['invoice_time']) : '';
            $info['customer'] = M('customer')->where(['customer_id' => $customerId])->getField("name");
        } else {
            $info = [];
        }
        if (!$isAjax) {
            return $info;
        }
        $this->response($info);
    }

    /**
     * @desc  推送商机通知给顾问
     * @param $roleId
     * @param $customerId
     * @param $type
     */
    private function messageNotice($roleId, $customerId, $type = 3) {
        //消息发送
        $customerName = M('customer')->where(['customer_id' => $customerId])->getField('name');
        if (4 == $type) {
            //跟进消息
            $url = "";
            sendMessage($roleId, '&nbsp;&nbsp;温馨提醒：回访客户《<a href="' . $url . '" title="点击查看">' . $customerName . '</a>》<font style="color:green;">需进行跟进沟通</font>！', 1);
            return;
        }
        $content = '';
        $link = '';
        if (3 == $type) {
            $content = "{$customerName}客户  有商机信息，详情询问客服部";
        }
        if (5 == $type) {
            $content = "{$customerName}客户 联系方式错误，请更正";
            $link = "/index.php?m=customer&a=edit&id={$customerId}";
        }
        $data = [];
        $data['to_role_id'] = $roleId;
        $data['from_role_id'] = session('role_id') ? session('role_id') : 0;
        $data['content'] = $content;
        $data['send_time'] = time();
        $data['deadline'] = strtotime(date('Y-m-d')) + 3600 * 24;
        $data['type'] = $type;
        $data['link'] = $link;
        $data['degree'] = 2;
        $data['params'] = json_encode(['customer_id' => $customerId]);
        $messageId = M('message')->add($data);
        if ($messageId && 5 == $type) {
            $link = "/index.php?m=customer&a=edit&id={$customerId}&messageId={$messageId}";
            M('message')->where(['message_id' => $messageId])->save(['link' => $link]);
        }
        return $messageId;
    }

    /**
     * @desc 客户联系人信息
     * @param $contactsId
     * @param int $customerId
     * @return bool|mixed|string
     */
    private function customerContacts($contactsId, $customerId = 0) {
        if (!$contactsId && !$customerId) {
            return false;
        }
        if (!$contactsId && $customerId > 0) {
            $contactsId = M('r_contacts_customer')->where(['customer_id' => $customerId])->order('id desc')->getField('contacts_id');
        }
        return M('contacts')->field("name,post,sex,telephone")->where(['contacts_id' => $contactsId])->find();
    }

    /**
     * @desc  回访状态更新[回访或者不回访]
     * @param $id
     * @param array $data
     * @return bool
     */
    private function changeVisit($id, $data = []) {
        $model = M('customer_visit');
        $info = $model->where(['id' => $id])->find();
        if (!$info) {
            return false;
        }
        $data['update_time'] = time();
        $data['is_finish'] = 1;
        $data['finish_time'] = time();
        $data['last_visit_time'] = time();
        return M('customer_visit')->where(['id' => $id])->save($data);
    }

    /**
     * @desc EXCEL数据导出
     * @param $expTitle
     * @param $data
     * @param $expCellName
     * @throws PHPExcel_Exception
     * @throws PHPExcel_Reader_Exception
     * @throws PHPExcel_Writer_Exception
     */
    private function exportExcel($expTitle, $data, $expCellName) {
        {
            if (count($data) == 0) {
                exit();
            }
            $xlsTitle = iconv('utf-8', 'gb2312', $expTitle);//文件名称
            $fileName = $xlsTitle . time();
            $cellNum = count($expCellName);
            $dataNum = count($data);
            import("ORG.PHPExcel.PHPExcel");
            $objPHPExcel = new PHPExcel();
            $objActSheet = $objPHPExcel->getActiveSheet(0);
            $cellName = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I', 'J', 'K', 'L', 'M', 'N', 'O', 'P', 'Q', 'R', 'S', 'T', 'U', 'V', 'W', 'X', 'Y', 'Z', 'AA', 'AB', 'AC', 'AD', 'AE', 'AF', 'AG', 'AH', 'AI', 'AJ', 'AK', 'AL', 'AM', 'AN', 'AO', 'AP', 'AQ', 'AR', 'AS', 'AT', 'AU', 'AV', 'AW', 'AX', 'AY', 'AZ');

            //标题设置
            $objPHPExcel->getActiveSheet(0)->mergeCells('A1:' . $cellName[$cellNum - 1] . '1');//合并单元格
            $objPHPExcel->setActiveSheetIndex(0)->setCellValue('A1', $expTitle . '  Export time:' . date('Y-m-d H:i:s'));
            $objPHPExcel->getActiveSheet()->getStyle('A1:' . $cellName[$cellNum - 1] . '1')->getFont()->setBold(true); //字体加粗
            $objPHPExcel->getActiveSheet()->getStyle('A1:' . $cellName[$cellNum - 1] . '1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

            //表头设置
            $size = [10, 18, 18, 18, 24, 24, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18, 18];
            for ($i = 0; $i < $cellNum; $i++) {
                $objPHPExcel->setActiveSheetIndex(0)->setCellValue($cellName[$i] . '2', $expCellName[$i][1]);
                $objActSheet->getColumnDimension($cellName[$i])->setWidth($size[$i]);
                $objPHPExcel->getActiveSheet()->getStyle($cellName[$i] . '2')->getFont()->setBold(true); //字体加粗
                $objPHPExcel->getActiveSheet()->getStyle($cellName[$i] . '2')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);
            }

            //填充数据
            for ($i = 0; $i < $dataNum; $i++) {
                for ($j = 0; $j < $cellNum; $j++) {
                    $objPHPExcel->getActiveSheet(0)->setCellValue($cellName[$j] . ($i + 3), $data[$i][$expCellName[$j][0]]);
                }
            }

            //下载输出
            header('pragma:public');
            @ob_end_clean();//清除缓冲区,避免乱码
            header("Content-type: application/octet-stream;charset=utf-8;name={$xlsTitle}.xls");
            header("Content-Disposition:attachment;filename={$fileName}.xls");//attachment新窗口打印inline本窗口打印
            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
            $objWriter->save('php://output');
            exit();
        }
    }

    /**
     * @desc 联系人修改记录
     */
    public function contactsUpLog() {
        $customerId = BaseUtils::getStr(I('customerId'));
        if (!$customerId) {
            $this->response("参数customerId错误", 500, false);
        }
        $logs = ContactsModel::logs($customerId);
        $this->response(['list' => $logs]);
    }
}