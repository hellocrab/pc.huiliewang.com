<?php
/**++++++++++++++++++++++++++++++++++++++++++++++++++
 * DESC: 客户管理接口
 * User: SOSO
 * Date: 2019/5/13
 *+++++++++++++++++++++++++++++++++++++++++++++++++++
 */

class CustomerManageAction extends Action
{
    protected $_permissionRes = '';
    protected $pro_type = [0 => '初始条件', 1 => '面试快', 2 => '入职快', 3 => '专业猎头'];

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
        $this->display();
    }

    /**
     * @desc 客户回访
     */
    public function visit() {
        $this->display();
    }

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
        $list = BaseUtils::getStr($_REQUEST);
        $res = false;
        foreach ($list as $info) {
            $data = [];
            $id = $info['id'];
            if (!$id) {
                continue;
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
        $selectFields = ['is_manual', 'is_black', 'is_perfection', 'rank', 'pro_type', 'is_manual', 'birth_month']; //筛选字段
        foreach ($params as $fields => $value) {
            if (in_array($fields, $selectFields)) {
                $value = BaseUtils::getStr($value);
                $where[$fields] = $value;
            }
        }
        //名字查询
        if ($name) {
            $map = [];
            $map['customer_name'] = ['like', "%{$name}%"];
            $map['contact_name'] = ['like', "%{$name}%"];
            $map['_logic'] = 'OR';
            $where['_complex'] = $map;
        }
        //排序处理
        $model = M('customer_rank')->where($where);
        if (in_array($order, ['money'])) {
            $model = $model->order("{$order} {$asc}");
        }
        //分页
        $startNo = ($page - 1) * $pageSize;
        $list = $model->limit($startNo, $pageSize)->select();
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
        }
        $this->response($list);
    }

    /**
     * @desc  客户分级编辑
     * 【级别设置、拉黑操作】
     */
    public function edit() {
        $this->authCheck();
        $customerId = BaseUtils::getStr(I('customer_id', 0), 'int'); //客户ID
        $proType = BaseUtils::getStr(I('pro_type', 0), 'int'); //项目类型
        $rankName = BaseUtils::getStr(I('rank', '')); //等级名称
        $isBlack = BaseUtils::getStr(I('is_black', 0), 'int'); //是否加入黑名单
        $note = BaseUtils::getStr(I('note', '')); //备注信息

        if ($customerId <= 0) {
            $this->response('参数：customer_id 必填', 500, false);
        }
        $data = [];
        $proType && $data['pro_type'] = $proType;
        $rankName && $data['rank_name'] = $rankName;
        $note && $data['note'] = $rankName;
        if (isset($_REQUEST['is_black'])) {
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
            'rank' => ['A' => 'A级', 'B' => 'B级', 'C' => 'C级']
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
        $list = BaseUtils::getStr($_REQUEST);
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
    public function waitVisit() {

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
     * @desc 客户详情内页
     */
    public function customerInfo() {

    }

    /**
     * @desc 回访备注
     */
    public function visitRemark() {

    }
}