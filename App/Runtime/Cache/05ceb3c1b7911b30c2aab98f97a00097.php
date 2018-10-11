<?php if (!defined('THINK_PATH')) exit();?><style>
	.body_border tr td{border:1px solid #e7eaec}
	thead tr td{background:#F9FaFC}
    .conent0{line-height: 30px;}
    .allmap{width:100%;height:150px;display:none;}
    .business_table tbody tr td{border:none;padding:2px;}
	/*活动*/
    .ai-yellow{
        background-color: rgba(254,215,32,.7);
    }
    .ai-blue{
        background-color: rgba(43,161,225,.7);
    }
    .ai-green{
        background-color: rgba(121,196,85,.7);
    }
    .ai-red{
        background-color:rgba(230,88,69,.7);
    }
    .ai-orange{
       background-color:rgba(244,131,61,.7);
    }
    .ai-purple{
        background-color:rgba(166,58,150,.7);
    }
    .ai-dark-blue{
        background-color: rgba(58,153,166,.7);
    }
    #vertical-timeline::before{
        width:0px !important;
    }

    .addMember-remove{
        position: relative;
        margin-right:-10px;
        top: -13px;
        right: 13px;
        display:none;
        font-size: 10px;
        line-height: 1;
        color: #fa7a7a;
        cursor: pointer;
        background-color: #fff;
        border-radius: 50%;
    }
    .form_bottm{
        margin-bottom: 15px;
    }
    .nav > li > a{
        color: inherit;
        font-weight: inherit;
    }
    .houxuanren .nav.nav-tabs li {
        background: none;
        border: none;
        margin-top: 20px;
    }
    #right-sidebar-log{
        width: 40% !important;
        box-shadow: -2px -1px 10px #ccc;
    }
    .icosgj{
        position: relative;
        cursor: pointer;
    }
    .beizhus{
        display: none;
        position: absolute;
        background: #e7e8f2;
        color: #575757;
        border: 1px solid #767676;
        padding: 0px 10px;
        height: 30px;
        min-width: 120px;
        text-align: center;
        line-height: 30px;
        border-radius: 4px;
        top: 14px;
        left: -45px;
    }
    .icosgj:hover .beizhus{
        display: block;

    }
    .label_n{
        margin-right: 5px;
    }
</style>
<ul class="nav nav-tabs" id="left_list">
    <li class="active">
        <a href="#tab0" data-toggle="tab" type="tab0">
            <!--<label class="label_n customer_num">8</label>-->
            候选人
        </a>
    </li>
	<?php if($share_num != 1): ?><li class="">
        <a href="#tab2" data-toggle="tab" type="tab2">职位详情</a>
    </li>
    <li class="">
        <a href="#tab3" data-toggle="tab" type="tab3"><label class="label_n fp_num">1</label>联系人</a>
    </li>
    <!--<li class="">-->
        <!--<a href="#tab4" data-toggle="tab" type="tab4">跟进记录</a>-->
    <!--</li>-->
    <!--<li class="">-->
        <!--<a href="#tab5" data-toggle="tab" type="tab5">合同</a>-->
    <!--</li>-->
    <li class="">
        <a href="#tab6" data-toggle="tab" type="tab6"><label class="label_n fp_num"><?php echo (count($invoice)); ?></label>发票列表</a>
    </li><?php endif; ?>
    <li class="">
        <a href="#tab1" data-toggle="tab" type="tab1"><label class="label_n bz_num" style="display: none">8</label>跟进记录</a>
    </li>
	<!--<li class="">-->
        <!--<a href="#tab9" data-toggle="tab" type="tab9">日程</a>-->
    <!--</li>-->
    <!--<?php if($business_id == ''): ?>-->
		<!--<li class="">-->
	        <!--<a href="#tab8" data-toggle="tab" type="tab8">操作记录</a>-->
	    <!--</li>-->
	<!--<?php endif; ?>-->
    <li class="">
        <a href="#tab7" data-toggle="tab" type="tab7"><label class="label_n fj_num" style="display: none">8</label>附件</a>
    </li>

   <!--  <div class="nav pull-right">
        <?php if($is_business_code == 1): ?><span style="line-height: 30px;">（ 商机编号：<?php echo ($business[0]['code']); ?> ）</span><?php endif; ?>
    </div> -->
</ul>
<div class="tab-content">
    <div id="tab0"  class="tab-pane fade in active">
        <div class="panel-body" style="padding-left: 0px;">
            <div class="ibox">

                <div class="" style="padding-bottom: 15px">
                    <a class="btn btn-default" href="/index.php?m=product&a=add&pro_id=<?php echo I('id');?>">新增一份简历</a>
                    <a class="btn btn-default" href="/index.php?m=product&a=index&pro_id=<?php echo ($project['business_id']); ?>" target="_blank">从人才库搜索</a>
                    <a class="btn btn-default" href="/index.php?m=product&a=add_more&pro_id=<?php echo ($project['business_id']); ?>" target="_blank">批量导入简历</a>
                </div>

                <div class="houxuanren" style="padding-bottom: 15px">
                    <ul class="nav nav-tabs" style="background: #f9fafc;height: 70px;">
                        <li class="active"><a class="" href="#tj"  data-toggle="tab" type="tj">智能推荐</a></li>
                        <li><a class="" href="#st1"  data-toggle="tab" type="st1">CallList（<?php echo (count($project['calllist'])); ?>）</a></li>
                        <li><a class="btn btn-primarya" href="#st2"  data-toggle="tab" type="st2">顾问面试（<?php echo (count($project['adviser'])); ?>）</a></li>
                        <li><a class="btn btn-primarya" href="#st3"  data-toggle="tab" type="st3">推荐人才（<?php echo (count($project['tj'])); ?>）</a></li>
                        <li><a class="btn btn-primarya" href="#st4"  data-toggle="tab" type="st4">面试（<?php echo (count($project['interview'])); ?>）</a></li>
                        <?php if(($pro_type == '传统项目') OR ($pro_type == '其他')): ?><li><a class="btn btn-primarya" href="#st5"  data-toggle="tab" type="st5">面试通过（<?php echo (count($project['pass'])); ?>）</a></li>
                            <li><a class="btn btn-primarya" href="#st6"  data-toggle="tab" type="st6">Offer（<?php echo (count($project['offer'])); ?>）</a></li>
                            <li><a class="btn btn-primarya" href="#st7"  data-toggle="tab" type="st7">入职（<?php echo (count($project['enter'])); ?>）</a></li>
                            <li><a class="btn btn-primarya" href="#st8"  data-toggle="tab" type="st8">过保（<?php echo (count($project['safe'])); ?>）</a></li>
                        <?php elseif($pro_type == '入职快'): ?>
                            <li><a class="btn btn-primarya" href="#st5"  data-toggle="tab" type="st5">面试通过（<?php echo (count($project['pass'])); ?>）</a></li>
                            <li><a class="btn btn-primarya" href="#st6"  data-toggle="tab" type="st6">Offer（<?php echo (count($project['offer'])); ?>）</a></li>
                            <li><a class="btn btn-primarya" href="#st7"  data-toggle="tab" type="st7">入职（<?php echo (count($project['enter'])); ?>）</a></li><?php endif; ?>
                    </ul>
                </div>

                <div class="tab-content">
                <div id="tj"  class="tab-pane fade in active tab-content">
                    <div class="title-bar" style="position: relative;z-index: 99;display: none;">
                        <div class="row  clearfix" id="title-hide" style="display: block;">
                            <input type="hidden" class="select_arr" value="">
                            <ul class="breadcrum pull-left">
                                <li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>
                                <li><a class="add_customer" href="javascript:void(0)" rel="addcc"><i class="fa fa-users"></i>&nbsp;加入CallList</a></li>
                                <li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>
                            </ul>
                        </div>
                    </div>
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">
                                <div class="checkbox checkbox-primary">
                                    <input name="checkall" class="check_list" type="checkbox">
                                    <label></label>
                                </div>
                            </td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">操作</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['calllist']): ?><tr>
                                <td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">
                                    <div class="checkbox checkbox-primary">
                                        <input name="checklist" value="1" class="check_list" type="checkbox">
                                        <label></label>
                                    </div>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><span class="" style="<?php echo ($mail_contacts_id == $vo['contacts_id'] ? '':'display:none'); ?>"><?php echo ($vo['name']); ?></span></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm" value="加入CallList >" style="width: 100px;" data-id="<?php echo ($vo['id']); ?>"></td>
                                <td style="text-align:center;padding:14px;color:#666;">公司名称</td>
                                <td style="text-align:center;padding:14px;color:#666;">职位</td>
                                <td style="text-align:center;padding:14px;color:#666;">男</td>
                                <td style="text-align:center;padding:14px;color:#666;">24万</td>
                                <td style="text-align:center;padding:14px;color:#666;">18785858585</td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;">2018-03-16 09:49:03</td>
                            </tr><?php endif; ?>
                        </tbody>
                    </table>
                </div>

                <div id="st1" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num">1</span>&nbsp;项</li>-->
                                <!--<li>-->
                                    <!--<a class="add_customer" href="javascript:void(0)"  rel="removecc">&nbsp;从CallList移除</a>-->
                                    <!--<a class="add_customer" href="javascript:void(0)"  rel="tjgw">&nbsp;推荐给顾问面试</a>-->
                                <!--</li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>


                            <?php if(is_array($project[calllist])): $i = 0; $__LIST__ = $project[calllist];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="CallList >" style="width: 80px;" data-id="<?php echo ($vo['id']); ?>"></td>
                                <td style="text-align:left;padding:14px;color:#666;">

                                    <?php if($vo['call_result']): ?><span class="icosgj">
                                             <embed src="/Public/img/svg/<?php echo ($call_ico1[$vo['call_result']]); ?>.svg" width="30px" height="30px"
                                                    type="image/svg+xml"
                                                    pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                            <div class="beizhus"><?php echo ($vo['call_result']); ?></div>
                                        </span>
                                        <span class="icosgj">
                                             <embed src="/Public/img/svg/<?php echo ($call_ico2[$vo['ccgj']]); ?>.svg" width="30px" height="30px"
                                                    type="image/svg+xml"
                                                    pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                            <div class="beizhus">
                                                <?php if($vo['ccgj']): ?>继续跟进
                                                <?php else: ?>
                                                暂停跟进<?php endif; ?>
                                            </div>
                                        </span>
                                        <span class="icosgj">
                                       <embed src="/Public/img/svg/<?php echo ($call_ico3[$vo['target']]); ?>.svg" width="30px" height="30px"
                                              type="image/svg+xml"
                                              pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">
                                            <?php if($vo['target']): ?>是目标候选人
                                            <?php else: ?>
                                            不是目标候选人<?php endif; ?>
                                        </div>
                                    </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;">
                                    <div class="nowap" style="max-width: 100px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;" title="<?php echo ($vo['current_company']); ?>"><?php echo ($vo['current_company']); ?></div>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;">
                                    <div class="nowap" style="max-width: 100px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;" title=" <?php echo ($vo['current_job']); ?>"> <?php echo ($vo['current_job']); ?></div>
                               </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telephone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st2" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)"  rel="tjkehu">&nbsp;推荐人才给客户</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                            <?php if($project['adviser']): if(is_array($project['adviser'])): $i = 0; $__LIST__ = $project['adviser'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="顾问面试 >"   data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                <?php if($vo['adgj']): ?><span class="icosgj">
                                         <embed src="/Public/img/svg/<?php echo ($adviser_ico[$vo['adgj']]); ?>.svg" width="30px" height="30px"
                                                type="image/svg+xml"
                                                pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">
                                             <?php if($vo['adgj']): ?>继续跟进
                                                <?php else: ?>
                                                暂停跟进<?php endif; ?>
                                        </div>
                                    </span>

                                    <span class="icosgj">
                                        <embed src="/Public/img/svg/goutong.svg" width="30px" height="30px"
                                               type="image/svg+xml"
                                               pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">已沟通</div>
                                    </span>
                                <?php else: ?>
                                    <span class="icosgj">
                                     <embed src="/Public/img/svg/daigoutong.svg" width="30px" height="30px"
                                            type="image/svg+xml"
                                            pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">需要我沟通</div>
                                    </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st3" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)"  rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['tj']): if(is_array($project['tj'])): $i = 0; $__LIST__ = $project['tj'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="推荐人才 >"   data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                <?php if($vo['stop']): ?><span class="icosgj">
                                         <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                type="image/svg+xml"
                                                pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">不合适</div>
                                    </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st4" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['interview']): if(is_array($project['interview'])): $i = 0; $__LIST__ = $project['interview'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="客户面试 >"  data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                    <?php if($vo['stop']): ?><span class="icosgj">
                                         <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                type="image/svg+xml"
                                                pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">不合适</div>
                                    </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st5" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['pass']): if(is_array($project['pass'])): $i = 0; $__LIST__ = $project['pass'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="面试通过 >"  data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                    <?php if($vo['stop']): ?><span class="icosgj">
                                             <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                    type="image/svg+xml"
                                                    pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                            <div class="beizhus">不合适</div>
                                        </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st6" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['offer']): if(is_array($project['offer'])): $i = 0; $__LIST__ = $project['offer'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="Offer >"  data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                    <?php if($vo['stop']): ?><span class="icosgj">
                                             <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                    type="image/svg+xml"
                                                    pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                            <div class="beizhus">不合适</div>
                                        </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?> </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st7" class="tab-pane fade in tab-content">
                    <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                        <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                            <!--<input type="hidden" class="select_arr" value="">-->
                            <!--<ul class="breadcrum pull-left">-->
                                <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                            <!--</ul>-->
                        <!--</div>-->
                    <!--</div>-->
                    <table class="table select-table">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                <!--<div class="checkbox checkbox-primary">-->
                                    <!--<input name="checkall" class="check_list" type="checkbox">-->
                                    <!--<label></label>-->
                                <!--</div>-->
                            <!--</td>-->
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                            <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                            <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                        </tr>
                        <tbody>
                        <?php if($project['enter']): if(is_array($project['enter'])): $i = 0; $__LIST__ = $project['enter'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><?php echo ($vo['name']); ?></a></td>
                                <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="入职 >"  data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                <td style="text-align:left;padding:14px;color:#666;">
                                    <?php if($vo['stop']): ?><span class="icosgj">
                                         <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                type="image/svg+xml"
                                                pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                        <div class="beizhus">不合适</div>
                                    </span><?php endif; ?>
                                </td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_company']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['current_job']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php if($vo['sex'] == 1): ?>男<?php else: ?>女<?php endif; ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['hope_salary']); ?>万</td>
                                <td style="text-align:center;padding:14px;color:#666;"><?php echo ($vo['telphone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;"><a href="javascript:void(0);" class="role_info" rel="<?php echo ($vo['tracker']); ?>"><?php echo ($vo['tracker_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo['updatetime'])); ?></td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                        </tbody>
                    </table>
                </div>
                <div id="st8" class="tab-pane fade in tab-content">
                        <!--<div class="title-bar" style="position: relative;z-index: 99;display: none;">-->
                            <!--<div class="row  clearfix" id="title-hide" style="display: block;">-->
                                <!--<input type="hidden" class="select_arr" value="">-->
                                <!--<ul class="breadcrum pull-left">-->
                                    <!--<li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>-->
                                    <!--<li><a class="add_customer" href="javascript:void(0)" rel="buheshi">&nbsp;设为不合适</a></li>-->
                                    <!--<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right back-show" id="back-show"></a></big></li>-->
                                <!--</ul>-->
                            <!--</div>-->
                        <!--</div>-->
                        <table class="table select-table">
                            <tr class="tabTh" style="background-color:#f9fafc;">
                                <!--<td width="30px" style="border-left: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">-->
                                    <!--<div class="checkbox checkbox-primary">-->
                                        <!--<input name="checkall" class="check_list" type="checkbox">-->
                                        <!--<label></label>-->
                                    <!--</div>-->
                                <!--</td>-->
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                                <td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999">项目阶段</td>
                                <td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999"></td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">公司名称</td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">性别</td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">年薪</td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">联系方式</td>
                                <td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
                            </tr>
                            <tbody>
                            <?php if($project['safe']): if(is_array($project['safe'])): $i = 0; $__LIST__ = $project['safe'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <!--<td  width="30px" style="border-left: 1px solid #e7eaec;text-align:center;padding:14px;color:#999">-->
                                        <!--<div class="checkbox checkbox-primary">-->
                                            <!--<input name="checklist" value="1" class="check_list" type="checkbox">-->
                                            <!--<label></label>-->
                                        <!--</div>-->
                                    <!--</td>-->
                                    <td style="text-align:center;padding:14px;color:#666;"><a href="<?php echo U('product/view','id='.$vo['resume_id']);?>"><span class="" style="<?php echo ($mail_contacts_id == $vo['contacts_id'] ? '':'display:none'); ?>"><?php echo ($vo['name']); ?></span></a></td>
                                    <td style="text-align:right;padding:14px;color:#666;"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="过保 >"  data-id="<?php echo ($vo['id']); ?>" style="width: 80px;"></td>
                                    <td style="text-align:left;padding:14px;color:#666;">
                                        <?php if($vo['stop']): ?><span class="icosgj">
                                             <embed src="/Public/img/svg/sbuheshi.svg" width="30px" height="30px"
                                                    type="image/svg+xml"
                                                    pluginspage="http://www.adobe.com/svg/viewer/install/" />
                                            <div class="beizhus">不合适</div>
                                        </span><?php endif; ?>
                                    </td>
                                    <td style="text-align:center;padding:14px;color:#666;">公司名称</td>
                                    <td style="text-align:center;padding:14px;color:#666;">职位</td>
                                    <td style="text-align:center;padding:14px;color:#666;">男</td>
                                    <td style="text-align:center;padding:14px;color:#666;">24万</td>
                                    <td style="text-align:center;padding:14px;color:#666;">18785858585</td>
                                    <td style="text-align:center;padding:14px;color:#666;"><a href="#">跟进人</a></td>
                                    <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#666;">2018-03-16 09:49:03</td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div id="tab1" class="tab-pane fade in">
        <div class="panel-body">
            <?php if($content != 'resource'): ?><div id="form-div">
                    <form id="add-form" action="<?php echo U('Log/add');?>" method="post">
    					<input type='hidden' name="r" value="rBusinessLog"/>
    					<input type='hidden' name="module" value="business"/>
    					<input type='hidden' id="business_id" name="id" value="<?php echo ($business_id); ?>"/>
    					<input type='hidden' name="role_id" value="<?php echo (session('role_id')); ?>"/>
    					<textarea name="content" placeholder="添加备注" id="log-text" style="resize:none;" class="form-control" cols="30" rows="2"></textarea>
                        <table class="table business_table" style="border:none;margin-top:15px;display:none;" id="business_table">
                            <tr >
                                <td class="tdleft" style="width:120px;">跟进类型：</td>
                                <td style="width:120px;">
                                    <select name="status_id" id="status_id" class="form-control" onchange="selectStatus()">
                                        <option value="">--请选择--</option>
                                        <?php if(is_array($status_list)): $i = 0; $__LIST__ = $status_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tdleft" style="width:120px;">快捷添加：</td>
                                <td style="width:300px;">
                                    <select id="replay_list" class="form-control select2" onchange="selectReply()" style="width:80%;float:left;">
                                        <option value="">--请选择--</option>
                                        <?php if(is_array($reply_list)): $i = 0; $__LIST__ = $reply_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['content']); ?>" rel="<?php echo ($vo['status_id']); ?>"><?php echo ($vo['str_content']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>&nbsp;&nbsp;
                                    <a href="javascript:void(0)" id="setting_reply_dialog" title="管理快捷跟进模板" style="line-height: 30px;margin-left:10px;"><i class="fa fa-cog" style="color:#999;"></i></a>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tdleft" style="width:120px;">下次联系时间：</td>
                                <td style="width:120px;">
                                    <input type="text" value="" id="nextstep_time_log" class="form-control Wdate" name="nextstep_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" style="width: 170px;">
                                </td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tdleft" style="width:120px;">保存为跟进模板：</td>
                                <td style="width:120px;">
                                    <div class="checkbox checkbox-primary">
                                        <input type="hidden" name="type" value="2" />
                                        <input name="save_reply" class="select_list" id="save_reply" type="checkbox" value="1"/>
                                        <label for=""></label>
                                    </div>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                            </tr>
                            <?php if (empty($business_id)): ?>
                                <tr>
                                    <td class="tdleft" style="width:120px;">关联商机：</td>
                                    <td colspan="5">
                                        <div class="text-left" id="product-radio" style="padding-top:8px;">
                                            <?php if (empty($business_id)): ?>
                                            <?php if(is_array($business)): $key = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="radio radio-info radio-inline" style="margin-left: 10px;">
                                                    <input type="radio" name="id" class="business_code" id="status_<?php echo ($key); ?>" code="<?php echo ($vo["code"]); ?>" value="<?php echo ($vo["business_id"]); ?>">
                                                    <label for="status_<?php echo ($key); ?>">&nbsp;<?php echo ($vo["code"]); ?>&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;
                                                </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <?php endif; ?>
                                        </div>
                                    </td>
                                </tr>
                            <?php endif; ?>
                        </table>
    					<div>
    						<div class="text-right" id="log-btn" style="padding-top:8px;display:none;"><button class="btn btn-primary" id="add_log" type="button">添加</button>&nbsp;</div><br>
    					</div>
                    </form>
                </div><?php endif; ?>
            <div id="log-list" style="margin-top: 10px;">
                <?php if(is_array($log_list)): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ibox-content gray-log" log-rel="<?php echo ($vo['log_id']); ?>" >
                        <div class="social-feed-separated clearfix">
                            <div class="social-feed-box">
        						<?php if($content != 'resource' && $vo['sign'] == '0' && $vo['role_id'] == session('role_id')): ?><div class="pull-right social-action dropdown">
                                        <span data-toggle="dropdown" class="dropdown-toggle">
                                            <i style="font-size:20px;cursor:pointer" class="fa fa-angle-down"></i>
                                        </span>
                                        <ul class="dropdown-menu m-t-xs" >
                                            <li><a rel="<?php echo ($vo['log_id']); ?>" href="javascript:void(0);" type="<?php echo ($vo['log_type']); ?>" onclick="del_confirm(this);"><?php echo L('DELETE');?></a></li>
                                        </ul>
                                    </div><?php endif; ?>
                                <?php if($vo['sign'] == 1): ?><div class="social-avatar">
                                        <img alt="image" style="width:35px;height:35px;" class="img-circle" src="<?php echo ($vo['owner']['thumb_path']); ?>">
                                        <a class="role_info name-colors"  rel="<?php echo ($vo['owner']['role_id']); ?>" href="javascript:void(0);"><?php echo ($vo['owner']['full_name']); ?></a>&nbsp;&nbsp;
                                        <span class="text-muted">发布了一条签到记录</span>&nbsp;&nbsp;&nbsp;
                                        <span class="text-muted" ><?php echo (date("Y-m-d H:i",$vo['create_date'])); ?></span>
                                        <div class="text-muted" style="padding:0 15px 0 50px;">
                                            <div class="conent0" style="width:100%;">
                                                <img style="width:15px;height:15px;vertical-align:text-bottom;" src="__PUBLIC__/img/location.png"/>
                                                <span style="color:#666"><?php echo ($vo['sign_info']['address']); ?></span>
                                                <input class="longitude" type="hidden" rel="<?php echo ($vo['sign_info']['y']); ?>"/>
                                                <!-- <a href="javascript:void(0);" style="font-size:12px;" class="map" >显示地图</a> -->
                                                <div id="allmap<?php echo ($vo['log_id']); ?>" rel="allmap<?php echo ($vo['log_id']); ?>" class="allmap"></div>
                                                <input class="latitude" type="hidden" rel="<?php echo ($vo['sign_info']['x']); ?>"/>
                                            </div>
                                            <div class="conent0">
                                                <span style="color:#000">签到说明：<?php echo ($vo['sign_info']['log']); ?></span>
                                            </div>
                                            <div class="conent0">
                                                <div style="color:#000">现场照片：</div>
                                                <?php if(is_array($vo['sign_img'])): $i = 0; $__LIST__ = $vo['sign_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="box-secondary" rel="<?php echo ($vo["img_id"]); ?>" style="width:100px;height:100px;float:left;margin-left:5px;">
                                                        <a href="<?php echo ($v["path"]); ?>" target="_self" class="litebox_file" data-litebox-group="group-<?php echo ($vo['log_id']); ?>">
                                                            <img src="<?php echo ($v["path"]); ?>" class="thumbnail thumb100" style="width:100%;height:100%;">
                                                        </a>
                                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                                <div style="clear:both;"></div>
                                            </div>
                                        </div>
                                    </div>
                                <?php else: ?>
                                    <div class="social-avatar">
                                        <img alt="image" style="width:35px;height:35px;" class="img-circle" src="<?php echo ($vo['owner']['thumb_path']); ?>">
                                        <a class="role_info name-colors"  rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0);"><?php echo ($vo['owner']['full_name']); ?></a>&nbsp;&nbsp;
                                        <span class="text-muted">发布了一条快速记录</span>&nbsp;&nbsp;&nbsp;
                                        <span class="text-muted" ><?php echo (date("Y-m-d H:i",$vo["create_date"])); ?>&nbsp;&nbsp;<a title="沟通类型" href="javascript:void(0);"><?php echo ($vo['status_name']); ?></a></span>
                                    </div>
                                    <div class="social-body">
                                        <span style="word-wrap:break-word;line-height: 21px;color: #000;"><?php echo ($vo['content']); ?></span>

                                        <?php if($vo['nextstep_time']): ?><div class="social-avatar" style="padding-top:10px;">
                                                <span class="text-muted pull-right">下次联系时间：<?php echo (date("Y-m-d H:i",$vo['nextstep_time'])); ?></span>
                                            </div><?php endif; ?>
                                    </div><?php endif; ?>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
    <div id="tab4" class="tab-pane fade in">
        <div class="panel-body">
            <?php if($content != 'resource'): ?><div id="form-div">
                    <form id="add-form" action="<?php echo U('Log/add');?>" method="post">
                        <input type='hidden' name="r" value="rBusinessLog"/>
                        <input type='hidden' name="module" value="business"/>
                        <input type='hidden' id="business_id" name="id" value="<?php echo ($business_id); ?>"/>
                        <input type='hidden' name="role_id" value="<?php echo (session('role_id')); ?>"/>
                        <textarea name="content" placeholder="添加跟进记录" id="log-text" style="resize:none;" class="form-control" cols="30" rows="2"></textarea>
                        <table class="table business_table" style="border:none;margin-top:15px;display:none;" id="business_table">
                            <tr >
                                <td class="tdleft" style="width:120px;">跟进类型：</td>
                                <td style="width:120px;">
                                    <select name="status_id" id="status_id" class="form-control" onchange="selectStatus()">
                                        <option value="">--请选择--</option>
                                        <?php if(is_array($status_list)): $i = 0; $__LIST__ = $status_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tdleft" style="width:120px;">快捷添加：</td>
                                <td style="width:300px;">
                                    <select id="replay_list" class="form-control select2" onchange="selectReply()" style="width:80%;float:left;">
                                        <option value="">--请选择--</option>
                                        <?php if(is_array($reply_list)): $i = 0; $__LIST__ = $reply_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['content']); ?>" rel="<?php echo ($vo['status_id']); ?>"><?php echo ($vo['str_content']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                    </select>&nbsp;&nbsp;
                                    <a href="javascript:void(0)" id="setting_reply_dialog" title="管理快捷跟进模板" style="line-height: 30px;margin-left:10px;"><i class="fa fa-cog" style="color:#999;"></i></a>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                            </tr>
                            <tr>
                                <td class="tdleft" style="width:120px;">下次联系时间：</td>
                                <td style="width:120px;">
                                    <input type="text" value="" id="nextstep_time_log" class="form-control Wdate" name="nextstep_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" style="width: 170px;">
                                </td>
                                <td>&nbsp;&nbsp;</td>
                                <td class="tdleft" style="width:120px;">保存为跟进模板：</td>
                                <td style="width:120px;">
                                    <div class="checkbox checkbox-primary">
                                        <input type="hidden" name="type" value="2" />
                                        <input name="save_reply" class="select_list" id="save_reply" type="checkbox" value="1"/>
                                        <label for=""></label>
                                    </div>
                                </td>
                                <td>&nbsp;&nbsp;</td>
                            </tr>
                            <?php if (empty($business_id)): ?>
                            <tr>
                                <td class="tdleft" style="width:120px;">关联商机：</td>
                                <td colspan="5">
                                    <div class="text-left" id="product-radio" style="padding-top:8px;">
                                        <?php if (empty($business_id)): ?>
                                        <?php if(is_array($business)): $key = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="radio radio-info radio-inline" style="margin-left: 10px;">
                                                <input type="radio" name="id" class="business_code" id="status_<?php echo ($key); ?>" code="<?php echo ($vo["code"]); ?>" value="<?php echo ($vo["business_id"]); ?>">
                                                <label for="status_<?php echo ($key); ?>">&nbsp;<?php echo ($vo["code"]); ?>&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;
                                            </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                        <?php endif; ?>
                                    </div>
                                </td>
                            </tr>
                            <?php endif; ?>
                        </table>
                        <div>
                            <div class="text-right" id="log-btn" style="padding-top:8px;display:none;"><button class="btn btn-primary" id="add_log" type="button">添加</button>&nbsp;</div><br>
                        </div>
                    </form>
                </div><?php endif; ?>
            <div id="log-list" style="margin-top: 10px;">
                <?php if(is_array($log_list)): $i = 0; $__LIST__ = $log_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="ibox-content gray-log" log-rel="<?php echo ($vo['log_id']); ?>" >
                        <div class="social-feed-separated clearfix">
                            <div class="social-feed-box">
                                <?php if($content != 'resource' && $vo['sign'] == '0' && $vo['role_id'] == session('role_id')): ?><div class="pull-right social-action dropdown">
                                        <span data-toggle="dropdown" class="dropdown-toggle">
                                            <i style="font-size:20px;cursor:pointer" class="fa fa-angle-down"></i>
                                        </span>
                                        <ul class="dropdown-menu m-t-xs" >
                                            <li><a rel="<?php echo ($vo['log_id']); ?>" href="javascript:void(0);" type="<?php echo ($vo['log_type']); ?>" onclick="del_confirm(this);"><?php echo L('DELETE');?></a></li>
                                        </ul>
                                    </div><?php endif; ?>
                                <?php if($vo['sign'] == 1): ?><div class="social-avatar">
                                        <img alt="image" style="width:35px;height:35px;" class="img-circle" src="<?php echo ($vo['owner']['thumb_path']); ?>">
                                        <a class="role_info name-colors"  rel="<?php echo ($vo['owner']['role_id']); ?>" href="javascript:void(0);"><?php echo ($vo['owner']['full_name']); ?></a>&nbsp;&nbsp;
                                        <span class="text-muted">发布了一条签到记录</span>&nbsp;&nbsp;&nbsp;
                                        <span class="text-muted" ><?php echo (date("Y-m-d H:i",$vo['create_date'])); ?></span>
                                        <div class="text-muted" style="padding:0 15px 0 50px;">
                                            <div class="conent0" style="width:100%;">
                                                <img style="width:15px;height:15px;vertical-align:text-bottom;" src="__PUBLIC__/img/location.png"/>
                                                <span style="color:#666"><?php echo ($vo['sign_info']['address']); ?></span>
                                                <input class="longitude" type="hidden" rel="<?php echo ($vo['sign_info']['y']); ?>"/>
                                                <!-- <a href="javascript:void(0);" style="font-size:12px;" class="map" >显示地图</a> -->
                                                <div id="allmap<?php echo ($vo['log_id']); ?>" rel="allmap<?php echo ($vo['log_id']); ?>" class="allmap"></div>
                                                <input class="latitude" type="hidden" rel="<?php echo ($vo['sign_info']['x']); ?>"/>
                                            </div>
                                            <div class="conent0">
                                                <span style="color:#000">签到说明：<?php echo ($vo['sign_info']['log']); ?></span>
                                            </div>
                                            <div class="conent0">
                                                <div style="color:#000">现场照片：</div>
                                                <?php if(is_array($vo['sign_img'])): $i = 0; $__LIST__ = $vo['sign_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="box-secondary" rel="<?php echo ($vo["img_id"]); ?>" style="width:100px;height:100px;float:left;margin-left:5px;">
                                                        <a href="<?php echo ($v["path"]); ?>" target="_self" class="litebox_file" data-litebox-group="group-<?php echo ($vo['log_id']); ?>">
                                                            <img src="<?php echo ($v["path"]); ?>" class="thumbnail thumb100" style="width:100%;height:100%;">
                                                        </a>
                                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                                                <div style="clear:both;"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <?php else: ?>
                                    <div class="social-avatar">
                                        <img alt="image" style="width:35px;height:35px;" class="img-circle" src="<?php echo ($vo['owner']['thumb_path']); ?>">
                                        <a class="role_info name-colors"  rel="<?php echo ($vo["owner"]["role_id"]); ?>" href="javascript:void(0);"><?php echo ($vo['owner']['full_name']); ?></a>&nbsp;&nbsp;
                                        <span class="text-muted">发布了一条快速记录</span>&nbsp;&nbsp;&nbsp;
                                        <span class="text-muted" ><?php echo (date("Y-m-d H:i",$vo["create_date"])); ?>&nbsp;&nbsp;<a title="沟通类型" href="javascript:void(0);"><?php echo ($vo['status_name']); ?></a></span>
                                    </div>
                                    <div class="social-body">
                                        <span style="word-wrap:break-word;line-height: 21px;color: #000;"><?php echo ($vo['content']); ?></span>
                                        <?php if($vo['code']): ?><div class="log-relation"><i class="fa fa-bookmark"></i>&nbsp;<span>相关商机 : <?php echo ($vo['code']); ?></span></div><?php endif; ?>
                                        <?php if($vo['nextstep_time']): ?><div class="social-avatar" style="padding-top:10px;">
                                                <span class="text-muted pull-right">下次联系时间：<?php echo (date("Y-m-d H:i",$vo['nextstep_time'])); ?></span>
                                            </div><?php endif; ?>
                                    </div><?php endif; ?>
                            </div>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
    </div>
	<div id="tab9" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox">
               <?php if(empty($event_list)): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
					<?php else: ?>
						<?php if(is_array($event_list)): $i = 0; $__LIST__ = $event_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="padding-bottom:20px;border-left:1px solid #ccc;margin: 5px 0 0 15px;">
								<?php if($vo['color']): ?><i class="fa fa-circle pull-left" style="margin-left:-5px;color:<?php echo ($vo['color']); ?>;font-size:12px;"></i>
								<?php else: ?>
									<i class="fa fa-circle pull-left" style="margin-left:-5px;color:#FB8F7A;font-size:12px;"></i><?php endif; ?>
								<div class="pull-left" style="margin-left:25px;color:#999">
									<div><?php echo (date("H:i",$vo['start_date'])); ?></div>
									<div><?php echo (date("Y/m/d",$vo['start_date'])); ?></div>
								</div>
								<div class="pull-left" style="margin-left:25px;color:#999">
									<div style="margin-top:11px;">~</div>
								</div>
								<div class="pull-left" style="margin-left:25px;color:#999">
									<div><?php echo (date("H:i",$vo['end_date'])); ?></div>
									<div><?php echo (date("Y/m/d",$vo['end_date'])); ?></div>
								</div>
								<div class="pull-left" style="margin-left:25px;"><img src="<?php echo ($vo['img']); ?>" style="width:30px;height:30px;border-radius:50px;margin-top:5px;"></div>
								<div class="pull-left" style="margin-left:10px;width:60%">
									<div><?php echo ($vo['create_role_name']); ?> &nbsp;<?php if($vo['bus_num']): ?>(<?php echo ($vo['bus_num']); ?>)<?php endif; ?></div>
									<div><?php echo ($vo['subject']); ?></div>
								</div>
								<div style="clear:both"></div>
							</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
            </div>
        </div>
    </div>
    <div id="tab2" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox-content gray-log" style="border: none;padding: 10px 20px;margin-bottom: 20px;">
               基本要求
            </div>
            <div>
                <?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["form_type"] != 'textarea'): if($vo["field"] == minsalary): ?><div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right">年薪范围</div>
                            <div class="col-lg-7">￥<?php echo ($business_info['minsalary']); ?>-<?php echo ($business_info['maxsalary']); ?>万元</div>
                            </div>
                        <?php elseif($vo["field"] == minage): ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right">年龄范围</div>
                            <div class="col-lg-7"><?php echo ($business_info['minage']); ?>-<?php echo ($business_info['maxage']); ?>岁</div>
                            </div>
                        <?php elseif($vo["field"] == minexp): ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right">工作年限要求</div>
                            <div class="col-lg-7"><?php echo ($business_info['minexp']); ?>-<?php echo ($business_info['maxexp']); ?>年</div>
                            </div>
                        <?php elseif($vo["field"] == industry): ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right"><?php echo ($vo["name"]); ?></div>
                            <div class="col-lg-7"><?php echo ($industry_name[$business_info[$vo[field]]]); ?></div>
                            </div>
                        <?php elseif($vo["field"] == address): ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right"><?php echo ($vo["name"]); ?></div>
                            <div class="col-lg-7"><?php echo ($city_name[$business_info[$vo[field]]]); ?></div>
                            </div>
                        <?php elseif($vo["field"] == jobclass): ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right"><?php echo ($vo["name"]); ?></div>
                            <div class="col-lg-7"><?php echo ($job_name[$business_info[$vo[field]]]); ?></div>
                            </div>
                        <?php elseif($vo["field"] == pro_type || $vo["field"] == customer_id || $vo["field"] == contacts_id || $vo["field"] == grade): ?>

                        <?php else: ?>
                            <div class="col-lg-6 form_bottm">
                            <div class="col-lg-3 text-right"><?php echo ($vo["name"]); ?></div>
                            <div class="col-lg-7"><?php echo ($business_info[$vo[field]]); ?></div>
                            </div><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>

            </div>
            <?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo["form_type"] == 'textarea'): ?><div class="ibox-content gray-log contenttitle">
                    <?php echo ($vo["name"]); ?>
                </div>
                <div class="col-lg-12 contentview"><?php echo ($business_info[$vo[field]]); ?></div><?php endif; endforeach; endif; else: echo "" ;endif; ?>
        </div>
    </div>
    <div id="tab3" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox">
    			<?php if($content != 'resource'): ?><div class="pull-left" style="padding-bottom: 15px">
                        <!--<a class="btn btn-primary btn-sm" rel="<?php echo ($customer_id); ?>" rel1="<?php echo ($business_id); ?>" id="rel_contacts" style="" href="javascript:void(0);">关联联系人</a>-->
                        <?php if($business_id): ?><!--<a class="btn btn-primary btn-sm" href="<?php echo U('contacts/add',array('redirect'=>'business','redirect_id'=>$business_id));?>">添加联系人</a>-->
                        <?php else: ?>
                            <!--<a class="btn btn-primary btn-sm" href="<?php echo U('contacts/add',array('redirect'=>'customer','redirect_id'=>$customer_id));?>">添加联系人</a>--><?php endif; ?>
                    </div><?php endif; ?>
                <?php if(empty($contacts_list)): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
                <?php else: ?>
                    <table class="table select-table table-bordered">
                        <tr class="tabTh" style="background-color:#f9fafc;">
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">姓名</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">重要程度</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">手机号</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">邮箱</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">QQ</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">职位</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">尊称</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">创建者</td>
                            <td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">创建时间</td>
                            <!--<td></td>-->
                        </tr>
                        <tbody>
                            <?php if(is_array($contacts_list)): $i = 0; $__LIST__ = $contacts_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><a href="<?php echo U('contacts/view','id='.$vo['contacts_id']);?>"><?php echo ($vo['name']); ?><span class="" style="<?php echo ($mail_contacts_id == $vo['contacts_id'] ? '':'display:none'); ?>"><?php echo ($vo['name']); ?></span></a></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['crm_dbxxve']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['telephone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['email']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['qq_no']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['post']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['saltname']); ?></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#999"><a class="role_info" rel="<?php echo ($vo['creator_role_id']); ?>" href="javascript:void(0)"><?php echo ($vo['user_name']); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#999"><?php echo (date("Y-m-d",$vo['create_time'])); ?></td>
                                <!--<td class="dropdown">-->
                                <!--<?php if($content != 'resource'): ?>-->
                                    <!--<span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:#8FA1B2">-->
                                        <!--<i class="fa fa-angle-down fa-lg"></i>-->
                                    <!--</span>-->
                                    <!--<ul class="dropdown-menu">-->
                                        <!--<?php if($business_id): ?>-->
                                            <!--<li><a rel="<?php echo U('contacts/relToBusiness',array('business_id'=>$business_id,'contacts_id'=>$vo['contacts_id'],'act_n'=>2));?>" href="javascript:void(0);" class="not_rel_contacts" >解除关联</a></li>-->
                                        <!--<?php endif; ?>-->
                                        <!--<li><a href="<?php echo U('contacts/edit',array('id'=>$vo['contacts_id']));?>">编辑</a></li>-->
                                        <!--<?php if($business_id == ''): ?>-->
                                            <!--<?php if($vo['contacts_id'] != $mail_contacts_id): ?>-->
                                                <!--<li><a title="" href="<?php echo U('contacts/changeToFirstContact', 'id='.$vo['contacts_id'].'&customer_id='.$customer_id);?>">设为首要</a></li>-->
                                                <!--<li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="delete">删除</a></li>-->
                                            <!--<?php else: ?>-->
                                                <!--<li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="mdelete" rel2="<?php echo ($customer_id); ?>">删除</a></li>-->
                                            <!--<?php endif; ?>-->
                                        <!--<?php endif; ?>-->
                                    <!--</ul>-->
                                <!--<?php endif; ?>-->
                                <!--</td>-->
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table><?php endif; ?>
            </div>
        </div>
    </div>
	<div id="tab5" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox">
                <div class="pull-left" style="padding-bottom: 15px">
                    <a class="btn btn-primary btn-sm" rel="<?php echo ($customer_id); ?>" rel1="<?php echo ($business_id); ?>" id="rel_contacts" style="" href="javascript:void(0);">添加合同</a>
                </div>
			<?php if($contract_list): ?><table class="table select-table table-bordered">
                    <thead>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">合同编号</td>
                         <td style="background:#F9FaFC;text-align:center;color:#999;">合同标题</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">审批状态</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">合同状态</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">预计回款金额（元）</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">开始时间</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">到期时间</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">保证期</td>

                        <td style="background:#F9FaFC;text-align:center;color:#999;">创建者</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;"></td>

                    </thead>
                    <tbody class="body_border">
						<?php if(is_array($contract_list)): $i = 0; $__LIST__ = $contract_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align:center;"><a href="<?php echo U('contract/view','id='.$v['contract_id']);?>"><?php echo ($v['number']); ?></a></td>
								 <td style="text-align:center;"><?php echo ($v['customer_name']); ?></td>
                                <td style="text-align:center;"><?php if($v['is_checked'] == '2'): ?><span class="fa fa-circle" style="color:#F5715F"></span>&nbsp;&nbsp;&nbsp;拒绝
                                    <?php elseif($v['is_checked'] == '1'): ?>
                                    <span class="fa fa-circle" style="color:#7CCA4E"></span>&nbsp;&nbsp;&nbsp;通过
                                    <?php else: ?>
                                    <span class="fa fa-circle" style="color:#F5CA00"></span>&nbsp;&nbsp;&nbsp;待审<?php endif; ?>
                                </td>
                                <td style="text-align:center;">寻访中</td>
                                <td style="text-align:center;"><?php echo ($v["price"]); echo L('YUAN');?></td>
                                <td style="text-align:center;"><?php if(!empty($v["end_date"])): echo (date("Y-m-d",$v["start_date"])); endif; ?></td>
								<td style="text-align:center;"><?php if(!empty($v["end_date"])): echo (date("Y-m-d",$v["end_date"])); endif; ?></td>
                                <td style="text-align:center;">保证期</td>
								<td style="text-align:center;"><?php if(!empty($v["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($v["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["owner"]["user_name"]); ?></a><?php endif; ?></td>
                                <td class="dropdown">
                                    <?php if($content != 'resource'): ?><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:#8FA1B2">
                                        <i class="fa fa-angle-down fa-lg"></i>
                                    </span>
                                        <ul class="dropdown-menu">
                                            <?php if($business_id): ?><li><a rel="<?php echo U('contacts/relToBusiness',array('business_id'=>$business_id,'contacts_id'=>$vo['contacts_id'],'act_n'=>2));?>" href="javascript:void(0);" class="not_rel_contacts" >解除关联</a></li><?php endif; ?>
                                            <li><a href="<?php echo U('contacts/edit',array('id'=>$vo['contacts_id']));?>">编辑</a></li>
                                            <?php if($business_id == ''): if($vo['contacts_id'] != $mail_contacts_id): ?><li><a title="" href="<?php echo U('contacts/changeToFirstContact', 'id='.$vo['contacts_id'].'&customer_id='.$customer_id);?>">设为首要</a></li>
                                                    <li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="delete">删除</a></li>
                                                    <?php else: ?>
                                                    <li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="mdelete" rel2="<?php echo ($customer_id); ?>">删除</a></li><?php endif; endif; ?>
                                        </ul><?php endif; ?>
                                </td>

							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
                    </tbody>
                </table>
			<?php else: ?>
				<?php if($contract_info['contract_id']){ ?>
					<div style="font-size:13px;font-weight:700;margin-top:15px;"><span style="border-left:5px solid #19AA8D;padding-left:10px;height:10px;"></span>基本信息</div>
					<div class="form-horizontal view-group " style="background:#F2F4F7;margin-top:15px;padding:10px 10px 10px">
						<div class="form-group">
							<label class="col-lg-2 control-label"><?php echo L('CONTRACT_NO');?></label>
							<div class="col-lg-4">
								<p class="form-p">
                                    <a href="<?php echo U('contract/view','id='.$contract_info['contract_id']);?>">
									<?php echo ($contract_info["number"]); ?>
                                    </a>
								</p>
							</div>
							<label class="col-lg-2 control-label"><?php echo L('SIGNING_TIME');?></label>
							<div class="col-lg-4">
								<div class="pull-left" style="margin-top:6px;color:#000;"><?php echo (date("Y-m-d",$contract_info["due_time"])); ?></div>
								<div class="pull-right social-action dropdown" style="margin-top:6px;">
									<span data-toggle="dropdown" class="dropdown-toggle">
										<i style="font-size:20px;cursor:pointer" class="fa fa-angle-down"></i>
									</span>
									<ul class="dropdown-menu m-t-xs" >
										<li><a href="<?php echo U('contract/view','id='.$contract_info['contract_id']);?>">详情</a></li>
									</ul>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">签约<?php echo L('CUSTOMER');?></label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($contract_info["customer_name"]); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">合同名称</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($contract_info["contract_name"]); ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">合同签约人</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($contract_info['owner_name']); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">合同金额</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($contract_info["price"]); ?>
								</p>
							</div>
						</div>
						<div style="display:none;" id="contract_content">
							<div class="form-group">
								<label class="col-lg-2 control-label">合同生效时间</label>
								<div class="col-lg-4">
									<p class="form-p">
										<?php echo (date("Y-m-d",$contract_info['start_date'])); ?>
									</p>
								</div>
								<label class="col-lg-2 control-label">合同到期时间</label>
								<div class="col-lg-4">
									<p class="form-p">
										<?php echo (date("Y-m-d",$contract_info['end_date'])); ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">合同创建人</label>
								<div class="col-lg-4">
									<p class="form-p">
										<?php echo ($contract_info['creator_name']); ?>
									</p>
								</div>
								<label class="col-lg-2 control-label">合同创建时间</label>
								<div class="col-lg-4">
									<p class="form-p">
										<?php echo (date("Y-m-d",$contract_info["create_time"])); ?>
									</p>
								</div>
							</div>
							<div class="form-group">
								<label class="col-lg-2 control-label">合同备注</label>
								<div class="col-lg-10">
									<p class="form-p">
										<?php echo ($contract_info["description"]); ?>
									</p>
								</div>
							</div>
						</div>
					</div>
					<div style="font-size:13px;font-weight:700;margin-top:20px;">
						<span style="border-left:5px solid #19AA8D;padding-left:10px;height:10px;"></span>审核信息
					</div>
					<div>
						<div class="pull-left"><img src="<?php echo ($contract_info['creator_info']['img']); ?>" style="width:45px;height:45px;margin:10px 0 0 10px;border-radius:50px;"></div>
						<div class="pull-left" style="margin:10px 0 0 10px;">
							<div class="control-label" style="margin-top:2px;font-size:16px;color:#B4B1C2"><a class="role_info" rel="<?php echo ($contract_info['creator_info']['role_id']); ?>" href="javascript:void(0)"><?php echo ($contract_info['creator_info']['full_name']); ?></a></div>
							<div class="control-label" style="margin-top:2px;font-size:15px;"><?php echo (date("Y-m-d H:i",$contract_info["create_time"])); ?></div>
						</div>
						<div class="pull-left" style="margin-left:6%;margin-top:25px;">
							<span class="fa fa-circle" style="color:#B4B1C2"></span>
							<span class="fa fa-circle" style="color:#B4B1C2"></span>
							<span class="fa fa-circle" style="color:#B4B1C2"></span>
						</div>
						<div class="pull-left" style="margin-left:6%;">
                            <img <?php if($contract_info['examine']): ?>src="<?php echo ($contract_info['examine']['img']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?> style="width:45px;height:45px;margin:10px 0 0 10px;border-radius:50px;">
                        </div>
						<div class="pull-left" style="margin:10px 0 0 10px;">
							<div class="control-label" style="margin-top:2px;font-size:16px;color:#B4B1C2">
								<?php if($contract_info['is_checked'] != 0): ?><a class="role_info" rel="<?php echo ($contract_info['examine']['role_id']); ?>" href="javascript:void(0)"><?php echo ($contract_info['examine']['full_name']); ?></a>
								<?php else: ?>
									合同审核员<?php endif; ?>
							</div>
							<div class="control-label" style="margin-top:2px;font-size:15px;">
								<?php if($contract_info['is_checked'] == 1): ?><span style="color:#19AA8D">通过</span>
								<?php elseif($contract_info['is_checked'] == 2): ?>
									<span style="color:#F5715F">拒绝</span>
								<?php else: ?>
									<span style="color:#F5CA00">待审</span><?php endif; ?>
							</div>
						</div>
						<div style="clear:both"></div>
					</div>
				<?php }else{ ?>
                    <?php if($is_business_code == 1 && empty($is_find)){ ?>
						<div class="pull-right" style="padding-bottom: 15px">
							<a class="btn btn-primary btn-sm" href="<?php echo U('contract/add','business_id='.$c_business_id);?>">添加合同</a>
						</div>
						<div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
                    <?php } ?>
				<?php } endif; ?>
			</div>
		</div>
	</div>
	<div id="tab6" class="tab-pane fade in">
		<div class="panel-body">
			<div class="ibox">
                <!--<div class="pull-left" style="padding-bottom: 15px">-->
                    <!--<?php if($business_id == ''): ?>-->
                        <!--<?php if($invoice_info == ''): ?>-->
                            <!--<a class="btn btn-primary btn-sm" id="add_invoice" href="javascript:void(0);">添加发票</a>-->
                        <!--<?php else: ?>-->
                            <!--<a class="btn btn-primary btn-sm" id="view_invoice" rel="<?php echo ($invoice_info['id']); ?>" href="javascript:void(0);">查看发票</a>-->
                        <!--<?php endif; ?>-->
                    <!--<?php endif; ?>-->
                <!--</div>-->

                <table class="table select-table">
                    <thead>
                        <tr>
                            <td style="text-align:center;color:#999;">发票编号</td>
                            <td style="text-align:center;color:#999;">发票抬头</td>
                            <td style="text-align:center;color:#999;">项目名称</td>
                            <td style="text-align:center;color:#999;">候选人</td>
                            <td style="text-align:center;color:#999;">审批状态</td>
                            <td style="text-align:center;color:#999;">费用类型</td>
                            <td style="text-align:center;color:#999;">发票类型</td>
                            <td style="text-align:center;color:#999;">收款时间</td>
                            <td style="text-align:center;color:#999;">收款金额</td>
                            <td style="text-align:center;color:#999;">创建者</td>

                        </tr>
                    </thead>
                    <tbody class="body_border">
                        <?php if($invoice): if(is_array($invoice)): $i = 0; $__LIST__ = $invoice;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                    <td style="text-align:center;"><?php echo ($vo["name"]); ?></td>
                                    <td style="text-align:center;"><?php echo ($vo["invoice_header"]); ?></td>
                                    <td style="text-align:center;"><?php echo ($vo["business_name"]); ?></td>
                                    <td style="text-align:center;"><?php echo ($vo["resume_name"]); ?></td>
                                    <td style="text-align:center;">
                                        <?php echo ($type_name[$vo[type]]); ?>
                                    </td>
                                    <td style="text-align:center;"><?php echo ($vo["cost_type"]); ?></td>
                                    <td style="text-align:center;"><?php echo ($vo["billing_type"]); ?></td>
                                    <td style="text-align:center;"><?php echo (date("Y-m-d",$vo['create_time'])); ?></td>
                                    <td style="text-align:center;"><?php echo ($vo['money']); ?>元</td>
                                    <td style="text-align:center;"><?php if(!empty($vo["user_name"])): ?><a class="role_info" rel="<?php echo ($vo["create_role_id"]); ?>" href="javascript:void(0)"><?php echo ($vo["user_name"]); ?></a><?php endif; ?></td>
                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        <?php else: ?>
                            <tr style="background-color:#fff;">
                                <td colspan="10">
                                    <div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
                                </td>
                            </tr><?php endif; ?>
                    </tbody>
                </table>
			</div>
		</div>
	</div>
	<div class="tab-pane fade in" id="tab7">
	    <div class="panel-body">
            <div class="">
                <a href="javascript:void(0);" type="button" class="add_file btn btn-primary" rel="<?php if (empty($business_id)){echo 'customer';}else{echo 'business';} ?>"><i class="fa fa-upload"></i>&nbsp;&nbsp;上传</a>
            </div>
			<div style="clear:both;"></div>
		</div>

        <?php if($info["file"] == null): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
            <?php else: ?>
            <table class="table product-table">
                <tr>
                    <td>附件名称</td>
                    <td><?php echo L('SIZE');?></td>
                    <td>上传人</td>
                    <td>上传时间</td><td>操作</td>
                </tr>
                <?php if(is_array($info["file"])): $i = 0; $__LIST__ = $info["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td>
                            <img src="__PUBLIC__/productImg/<?php echo ($vo['pic']); ?>" alt="">&nbsp;&nbsp;&nbsp;
                            <a <?php if(in_array(getExtension($vo['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($vo['file_path']); ?>" data-litebox-group="group-<?php echo ($info['contract_id']); ?>" title="点击查看大图"<?php else: ?>href="javascript:;" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);"<?php endif; ?>><?php echo ($vo["name"]); ?></a>
                        </td>
                        <td>
                            <?php echo ($vo["size"]); ?>KB
                        </td>
                        <?php if(C('ismobile') != 1): ?><td>
                                <?php if(!empty($vo["owner"]["user_name"])): echo ($vo["owner"]["user_name"]); endif; ?>
                            </td>
                            <td>
                                <?php if(!empty($vo["create_date"])): echo (date("Y-m-d H:i",$vo["create_date"])); endif; ?>
                            </td>
                            <td class="tdleft">
                                <a href="javascript:void(0);" rel="<?php echo ($vo['file_id']); ?>" class="del_file"><?php echo L('DELETE');?></a>
                                <a href="javascript:;" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);">下载</a>
                            </td><?php endif; ?>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>

            </table><?php endif; ?>
	</div>
	<div class="tab-pane fade in" id="tab8">
	     <div id="tab-3" class="tab-pane">
			<div id="vertical-timeline" class="vertical-container light-timeline" style="width:100%;">
				<?php if(is_array($group_list)): $i = 0; $__LIST__ = $group_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><div class="col-sm-12">
						<div class="pull-left">
							<span style="line-height:32px;margin-right: 10px;">
								<small><?php echo ($vo1['create_date']); ?>&nbsp;<?php echo ($vo1['week_name']); ?></small>
							</span>
						</div>
						<div class="pull-left">
							<?php if(is_array($vo1['action_list'])): $i = 0; $__LIST__ = $vo1['action_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="vertical-timeline-block" style="margin:0px;border-left:1px solid #ccc;margin-left:20px;">
									<i class="fa fa-circle pull-left" style="margin-left:-6px;color:#CAD7EF;margin-top:9px;font-size:12px;"></i>
									<div class="vertical-timeline-content" style="padding-top: 0px;margin-left:20px;">
										<div class="pull-left">
											<span class="pull-left" style="line-height:32px;margin-right: 10px;">
												<small><?php echo (date('H:i',$vo['create_time'])); ?></small>
											</span>
											<a class="role_info pull-left" rel="<?php echo ($vo['create_role_info']['role_id']); ?>" href="javascript:void(0)" style="margin-right:5px;">
												<img alt="image" class="img-circle" style="width:32px;height:32px;" <?php if($vo['create_role_info']['thumb_path']): ?>src="<?php echo ($vo['create_role_info']['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
											</a>
											<span class="pull-left" style="line-height:32px;">
												<div class="pull-left"><?php echo ($vo['create_role_info']['full_name']); ?>&nbsp;&nbsp;</div>
												<div class="pull-left"><?php echo ($vo['duixiang']); ?></div>
												<div style="clear:both;"></div>
											</span>
											<?php if(is_array($vo['role_list'])): $i = 0; $__LIST__ = $vo['role_list'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($vo1['role_id']); ?>" href="javascript:void(0)" style="margin-right:5px;">
													<img alt="image" class="img-circle" style="width:32px;height:32px;" <?php if($vo1['thumb_path']): ?>src="<?php echo ($vo1['thumb_path']); ?>"<?php else: ?>src="__PUBLIC__/img/avatar_default.png"<?php endif; ?>>
												</a>
												<span style="line-height:32px;"><?php echo ($vo1['full_name']); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
										</div>
									</div>
								</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
	</div>
</div>
<div style="display:none" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFORMATION');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-contacts" title="关联联系人">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-file" title="<?php echo L('ADD_ATTACHMENT');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-setting_reply" title="管理快捷沟通">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>

<div class="modal inmodal fade" id="addInvoice" aria-hidden="true" aria-labelledby="addInvoice" role="dialog" tabindex="-1" style="overflow:auto; border:1px solid #000000;">
    <div class="modal-dialog modal-md" style="width:700px;">
        <div class="modal-content" id="add_invoice_dialog">

        </div>
    </div>
</div>
<div class="modal inmodal fade" id="editInvoice" aria-hidden="true" aria-labelledby="editInvoice" role="dialog" style="overflow:auto; border:1px solid #000000;">
    <div class="modal-dialog modal-md" style="width:700px;">
        <div class="modal-content" id="edit_invoice_dialog">

        </div>
    </div>
</div>

<div class="modal inmodal fade" id="viewInvoice" aria-hidden="true" aria-labelledby="viewInvoice" role="dialog" tabindex="-1" style="overflow:auto; border:1px solid #000000;">
    <div class="modal-dialog modal-md" style="width:700px;">
        <div class="modal-content form-horizontal" id="view_invoice_dialog">

        </div>
    </div>
</div>


<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Z0Fo0ib1GUgWlylCWeLvQh2U"></script>
<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>
<script>


    /*任务详情 加载的圈圈效果*/
    var detail_html = '<div class="spiner-example">\
					<div class="sk-spinner sk-spinner-fading-circle">\
						<div class="sk-circle1 sk-circle"></div>\
						<div class="sk-circle2 sk-circle"></div>\
						<div class="sk-circle3 sk-circle"></div>\
						<div class="sk-circle4 sk-circle"></div>\
						<div class="sk-circle5 sk-circle"></div>\
						<div class="sk-circle6 sk-circle"></div>\
						<div class="sk-circle7 sk-circle"></div>\
						<div class="sk-circle8 sk-circle"></div>\
						<div class="sk-circle9 sk-circle"></div>\
						<div class="sk-circle10 sk-circle"></div>\
						<div class="sk-circle11 sk-circle"></div>\
						<div class="sk-circle12 sk-circle"></div>\
					</div>\
				</div>';
    //快捷沟通
    $(".select2").select2();

    $("#dialog-setting_reply").dialog({
        autoOpen: false,
        // modal: true,
        width: 550,
        maxHeight: 450,
        position: ["center",100],
        close:function(){
            selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#status_form1').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $(function(){
        $("#setting_reply_dialog").click(function(){
            $('#dialog-setting_reply').dialog('open');
            $('#dialog-setting_reply').load('<?php echo U("setting/replyList");?>');
        });
    })

    function selectStatus(){
        var status_id = $("#status_id option:selected").val();
        var temp = '<option value="">--请选择--</option>';
        $.ajax({
            type:'post',
            url: "<?php echo U('setting/getReplyByStatus');?>",
            data: {status_id: status_id},
            async: false,
            success: function (data) {
                $.each(data.data, function(k, v){
                    temp += '<option value="'+v.content+'">'+v.str_content+'</option>';
                });
            },
            dataType: 'json'
        });
        $('#replay_list').html(temp);
    }

    function selectReply(){
        var replay_content = $("#replay_list option:selected").val();
        var status_id = $("#replay_list option:selected").attr('rel');
        //修改跟进类型
        $("#status_id option[value="+status_id+"]").attr('selected',true);
        //判断是否替换
        var log_content = $('#log-text').val();
        if (log_content !== '') {
            swal({
                title: '',
                text: '已填写沟通日志内容，确定要替换吗？',
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确认",
                cancelButtonText: "取消",
                closeOnConfirm: true,
                closeOnCancel:  true}, function(isConfirm){
                if (isConfirm) {
                    $('#log-text').val(replay_content);
                } else {
                    return false;
                }
            });
        } else {
            $('#log-text').val(replay_content);
        }
    }

    $('#log-list').on('click','.map',function(){
        $(this).next('.allmap').slideToggle('show');
        var a =$(this).siblings('.longitude').attr('rel');
        var b =$(this).siblings('.latitude').attr('rel');
        var vals = $(this).next('.allmap').attr('rel');
        var url = "<?php echo U('index/gettranslocation');?>"+"&longtitude="+a+"&latitude="+b;
        $.get(url, function(data){
            var x = data.data.x;
            var y = data.data.y;
            setTimeout("mapInit("+y+","+x+","+vals+")",1000);
        })
    });

    function mapInit(x,y,mapID){
        var map = new BMap.Map(mapID);
        var point = new BMap.Point(y, x);
        map.centerAndZoom(point, 15);
        var marker = new BMap.Marker(point);  // 创建标注
        map.addOverlay(marker);               // 将标注添加到地图中
        map.enableScrollWheelZoom(true);
    };
    /**
    * 页面加载时执行Tab start
     */
    $(function(){
        var thisId = window.location.hash;
        var atype = thisId.substr(1);
        // $('#left_list a[type="'+atype+'"]').trigger('click');
        $('#left_list a[type="'+atype+'"]').tab('show');
        $('.houxuanren a[type="'+atype+'"]').tab('show');
     });
    /**
    * 页面加载时执行Tab end
     */
    $('#left_list a').click(function (e) {
        // $(this).tab('show');
        var maodian = '#'+$(this).attr('type');
        url_jump(maodian);
		var bid = $('#bid').val();
		if(bid == ''){
			$('#customer-relation').removeClass('all_business');
			$('#customer-relation').addClass('all_business_a');
		}
    });

    function url_jump(maodian){
        $('#maodian').val(maodian);
        var customer_id = "<?php echo ($customer_id); ?>";
        var module_business_id = $('#module_business_id').val();
        var bid = $('#bid').val();
        if(module_business_id){
            var url = "<?php echo U('business/view','id=');?>"+module_business_id+maodian;
        }else{
            if(bid){
                var url = "<?php echo U('customer/view','id=');?>"+customer_id+'&bid='+bid+maodian;
            }else{
                var url = "<?php echo U('customer/view','id=');?>"+customer_id+maodian;
            }
        }

        // $("body").scrollTop(0);
        // window.location.href = 'http://'+window.location.host+url;
        window.history.replaceState({},0,'http://'+window.location.host+url);
    }
    var business_id = "<?php echo ($business_id); ?>";

    /**
     * 附件 如果是图片时 双击可查看大图
     */
    $('.litebox_file').liteBox({
      revealSpeed: 400,
      background: 'rgba(0,0,0,.8)',
      overlayClose: true,
      escKey: true,
      navKey: true,
      errorMessage: '图片加载失败.'
    });
	$("#dialog-file").dialog({
		autoOpen: false,
		modal: true,
		width: 800,
		maxHeight: 400,
		position: ["center",100],
		buttons: {
			"确定": function () {
				location.reload();
			},
			"取消": function () {
                $(this).html('');//清空缓存
				$(this).dialog("close");
			}
		}
	});

    $(".add_file").click(function(){
        $('#dialog-file').dialog('open');
        $('#dialog-file').load('<?php echo U("file/add","r=RBusinessFile&module=business&id=".$business_id);?>');
    });


    $(".role_info").click(function(){
        $role_id = $(this).attr('rel');
        $('#dialog-role-info').dialog('open');
        $('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
    });

    $("#dialog-role-info").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 550,
        position: ["center",100]
    });

	$('.business_code').on('click',function(){
		var is_checked = $(this).attr('rel');
		if(is_checked == 1){
			$(this).attr('rel','');
			$(this).prop('checked', false);
		}else{
			$('.business_code').attr('rel','');
			$(this).attr('rel',1);
		}
	});
    /*单选框取消选择*/
    $('#product-radio ins').on('click',function(){
        var checked = $(this).parent().hasClass('hahha');

        if(!checked){
            $(this).parent().addClass('checked');
            $(this).parent().addClass('hahha');
            $(this).prev().prop('checked',true);
        }else{
            $(this).parent().removeClass('checked');
            $(this).parent().removeClass('hahha');
            $(this).prev().prop('checked',false);
        }
    });
    /*关联联系人*/
    $("#dialog-contacts").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 850,
        maxHeight: 600,
        position: ["center",100],
        buttons: {
            "确定": function () {
                var _this = this;
                var contacts_ids = new Array();
                $('.contacts_ch:checked').each(function(k,v){
                    contacts_ids.push($(v).val());
                }).val();
                if(contacts_ids.length == 0){
                    alert_crm('请至少选择一个联系人！');
                }else{
                    $.get("<?php echo U('contacts/relToBusiness');?>&act_n=1&contacts_id="+contacts_ids+"&business_id="+business_id, {},function(ret){
                        if (ret[0] == 'success') {
                            var temp_business_id = business_id;
                            $('.product-content').html(detail_html);
                            product_detail($('.product-list[rel='+temp_business_id+']').find('.product-a'),"a[href='#tab-3']");
                            $(_this).dialog("close");
                        } else {
                            alert_crm(ret[1]);
                        }
                    })

                }
            },
            "取消": function () {
                $(this).html('');
                $(this).dialog("close");
            }
        },
        close: function() {
        $(this).empty();
        }
    });

    $("#rel_contacts").click(function(){
        $('#dialog-contacts').html('');
        // var customer_id = $(this).attr('rel');
        // var business_id = $(this).attr('rel1');
        $('#dialog-contacts').load('<?php echo U("contacts/checklistdialog",array("id"=>$customer_id,"business_id"=>$business_id));?>');
        $('#dialog-contacts').dialog('open');
    });
    //解绑联系人
    $(".not_rel_contacts").click(function(){
        var _this = this;
        swal({
            title: '确定要解除绑定吗？',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            closeOnConfirm: true,
            closeOnCancel:  true}, function(isConfirm){
            if (isConfirm) {
                $.get($(_this).attr('rel'),{},function(ret){
                    if (ret[0] == 'success') {
                        var temp_business_id = business_id;
                        $('.product-content').html(detail_html);
                        product_detail($('.product-list[rel='+temp_business_id+']').find('.product-a'),"a[href='#tab-3']");
                    } else {
                        alert_crm(ret[1]);
                    }
                })
            } else {
                return false;
            }
        });
    })
    /*跟进记录*/
    function btnHide(){
        $('#log-text').attr('rows',1);
        $('#log-btn').hide();
        $('#business_table').hide();
        $('#log-text').val('');
    }
    $('#log-text').focus(function(){
        $(this).attr('rows',4);
        $('#log-btn').show();
        $('#business_table').show();
        $('#add_log').prop('disabled',false);
    });
    $('#log-text').focusout(function(){
        var code_id = $("input[name='id']:checked").val();
        if($(this).val() == '' && code_id == ''){
            btnHide();
        }
    });
    $('#quxiao').click(function(){
        btnHide();
        return false;
    });
    /*ajax 提交记录*/

    $('#add_log').click(function(){
        var log_content = $.trim($('#log-text').val());
        if(log_content == ''){
            alert_crm('沟通日志内容不能为空！');
            return false;
        }
        //跟进类型
        // var status_id = $('#status_id option:selected').val();
        // if (status_id == '') {
        //     alert_crm('跟进类型不能为空！');
        //     $('#add_log').prop('disabled',false);
        // }

        var radio_id = $('#product-radio input:radio:checked').val();
        var code = $('#product-radio input:radio:checked').attr('code');
        var html_code = "<div class='log-relation'><i class='fa fa-bookmark'></i>&nbsp;<span>相关商机:"+code+"</span></div>";
        //console.log(radio_id);
        var log_type = 'rBusinessLog';

        var status_name = '';
        if ($('#status_id option:selected').text() !== '--请选择--') {
            status_name = $('#status_id option:selected').text();
        }
        var nextstep_time_log = '';
        if ($('#nextstep_time_log').val() !== '') {
            nextstep_time_log = $('#nextstep_time_log').val();
        }

        if(radio_id == null || radio_id == 0){
            var html_code = '';
            $("#business_id").val(business_id);

            if(business_id == null || business_id == 0){
                $("[name='r']").val('RCustomerLog');
                $("[name='module']").val('customer');
                $("#business_id").val("<?php echo ($customer_id); ?>");
                log_type = 'rCustomerLog';
            }
        }

        $(this).prop('disabled',true);
        $.post("<?php echo U('Log/add');?>", $("#add-form").serialize(), function(data){
            if(data.status == 1){
                var content = $('#log-text').val().replace('&nbsp','&NBSP');
                var log_html = "<div class='ibox-content gray-bg' log-rel='"+data.data.log_id+"' style='margin-bottom: 18px'><div class='social-feed-separated clearfix'><div class='social-feed-box'><div class='pull-right social-action dropdown'><span data-toggle='dropdown' class='dropdown-toggle'><i style='font-size:20px;cursor:pointer' class='fa fa-angle-down'></i></span><ul class='dropdown-menu m-t-xs' ><li><a  rel='"+data.data.log_id+"' href='javascript:void(0);' type='"+log_type+"' onclick='del_confirm(this);'><?php echo L('DELETE');?></a></li></ul></div><div class='social-avatar'><img alt='image' style='width:35px;height:35px;' class='img-circle' src='"+data.data.owner.thumb_path+"'><a class='role_info name-colors'  rel='"+data.data.owner.role_id+"' href='javascript:void(0)'>"+data.data.owner.full_name+"</a>&nbsp;&nbsp;<span class='text-muted'>添加了一条快速记录</span>&nbsp;&nbsp;<span class='text-muted' >"+data.data.date+"&nbsp;&nbsp;<a title='沟通类型' href='javascript:void(0);'>"+status_name+"</a></span></div><div class='social-body'><span style='word-wrap:break-word;line-height: 21px;color: #000;'>"+content+"</span>"+html_code+"</div>";
                if (nextstep_time_log !== '1970-01-01 08:00') {
                    log_html += "<div class='social-avatar' style='padding-top:10px;''><span class='text-muted pull-right'>下次联系时间："+nextstep_time_log+"</span></div>";
                }
                log_html += "</div></div></div>";

                $('#log-list').prepend(log_html);
                btnHide();
            }else{
                alert_crm('添加失败, 请重试');
            }
            $("[name='r']").val('rBusinessLog');
            $("[name='module']").val('business');
            $("#business_id").val(business_id);
        });
    });
    /*删除日志*/
    function del_confirm(e){
        swal({
            title: "确定要删除沟通日志吗？",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "是的，我要删除！",
            cancelButtonText:'让我再考虑一下…',
            closeOnConfirm:false,
            closeOnCancel:false
        },
        function(isConfirm){
            if (isConfirm) {
                var log_id = $(e).attr('rel');
                var type = $(e).attr('type');
                $.get("<?php echo U('log/delete');?>", {r:type, id:log_id}, function(data){
                    if(data != 0){
                        swal({
                            title: "删除成功！",
                            text: "",
                            type: "success"
                        });
                        $("[log-rel='"+log_id+"']").remove();
                    }else{
                        swal({
                            title: "操作失败！",
                            text:data.info,
                            type: "error"
                        })
                        return false;
                    }
                });
            } else {
                swal("已取消","您取消了删除操作！","error");
            }
        });
    };
    //删除联系人
    $('.del_contacts').click(function(){
        var contacts_id = $(this).attr('rel');
        var type = $(this).attr('rel1');
        var customer_id = $(this).attr('rel2');
        swal({
            title: "您确定要删除联系人吗？",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "是的，我要删除！",
            cancelButtonText:'让我再考虑一下…',
            closeOnConfirm:false,
            closeOnCancel:false
        },
        function(isConfirm){
            if (isConfirm) {
                if(type == 'mdelete'){
                    //删除首要联系人
                    $.ajax({
                        type:'get',
                        url: "<?php echo U('contacts/mdelete','r=rContactsCustomer&module_id=');?>"+customer_id+'&id='+contacts_id,
                        async: false,
                        success: function (data) {
                            if (data.status == 1) {
                                swal("删除成功！", "您已经永久删除了信息！", "success");
                                location.reload();
                            }else{
                                swal({
                                    title: "操作失败！",
                                    text:data.info,
                                    type: "error"
                                })
                                return false;
                            }
                        },
                        dataType: 'json'
                    });
                }else{
                    $.ajax({
                        type:'get',
                        url: "<?php echo U('contacts/delete','id=');?>"+contacts_id,
                        async: false,
                        success: function (data) {
                            if (data.status == 1) {
                                swal("删除成功！", "您已经永久删除了信息！", "success");
                                location.reload();
                            }else{
                                swal({
                                    title: "操作失败！",
                                    text:data.info,
                                    type: "error"
                                })
                                return false;
                            }
                        },
                        dataType: 'json'
                    });
                }
            } else {
                swal("已取消","您取消了删除操作！","error");
            }
        });
    });
    //删除附件
    $('.file_delete').click(function(){
        var file_id = $(this).attr('rel');
        swal({
            title: "您确定要删除附件信息吗？",
            text: "删除后将无法恢复，请谨慎操作！",
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "是的，我要删除！",
            cancelButtonText:'让我再考虑一下…',
            closeOnConfirm:false,
            closeOnCancel:false
        },
        function(isConfirm){
            if (isConfirm) {
                $.ajax({
                    type:'get',
                    url: "<?php echo U('file/delete','r=RCustomerFile&id=');?>"+file_id,
                    async: false,
                    success: function (data) {
                        if (data.status == 1) {
                            swal("删除成功！", "您已经永久删除了信息！", "success");
                            location.reload();
                        }else{
                            swal({
                                title: "操作失败！",
                                text:data.info,
                                type: "error"
                            })
                            return false;
                        }
                    },
                    dataType: 'json'
                });
            } else {
                swal("已取消","您取消了删除操作！","error");
            }
        });
    });

    $(".editproduct_view").click(function(){
    	var business_id = $(this).attr('rel');
    	var customer_id = "<?php echo ($customer['customer_id']); ?>";
    	$('#dialog-editproduct').dialog('open');
    	$('#dialog-editproduct').load('<?php echo U("product/mutildialog_product","business_id=");?>'+business_id);
    });

    //发票
    $('#add_invoice').click(function(){
        var customer_id = "<?php echo ($customer_id); ?>";
        $('#addInvoice').modal('show');
        var url = "<?php echo U('invoice/addData','customer_id=');?>"+customer_id;
        $('#add_invoice_dialog').load(url);
    });
    $('#view_invoice').click(function(){
        var invoice_id = $(this).attr('rel');
        $('#viewInvoice').modal('show');
        var url = "<?php echo U('invoice/viewData','invoice_id=');?>"+invoice_id;
        $('#view_invoice_dialog').load(url);
    });


    $("input[name='checkall']").click(function () {

        var st=$(this).closest(".tab-content").attr("id");
        $("#"+st+" input[name='checklist']").prop('checked', $(this).prop("checked"));
        var i=0;
        var id_array = new Array();
        $("#"+st+" input[name='checklist']").each(function () {
            if($(this).prop("checked")){
                i++;
                id_array.push($(this).val());
            }
        })
        if(i>0){
            $("#"+st+" .title-bar").show();
            $("#"+st+" .icheck_num").html(i);
            $("#"+st+" .select_arr").val(id_array);
        }else{
            $("#"+st+" .title-bar").hide();
        }
    })

    $("input[name='checklist']").click(function () {
        var st=$(this).closest(".tab-content").attr("id");
        var i=0;
        var id_array = new Array();
        $("#"+st+" input[name='checklist']").each(function () {
            if($(this).prop("checked")){
                i++;
                id_array.push($(this).val());
            }
        })

        if(i>0){
            $("#"+st+" .title-bar").show();
            $("#"+st+" .icheck_num").html(i);
            $("#"+st+" .select_arr").val(id_array);
        }else{
            $("#"+st+" .title-bar").hide();
        }

    })

    $(".back-show").click(function () {
        $(".title-bar").hide();
        $("input[name='checklist']").prop('checked', false);
        $("input[name='checkall']").prop('checked', false);
    })


</script>


<script type="text/javascript">

    //鼠标点击空白处，隐藏右侧滑出
//    document.onmousedown=function(event){
//        if(event.target.className == 'right-sidebar-toggle-log') return;
//
//        var div = document.getElementById("right-sidebar-log");
//        var x=event.clientX;
//        var y=event.clientY;
//        var divx1 = div.offsetLeft;
//        var divy1 = div.offsetTop;
//        var divx2 = div.offsetLeft + div.offsetWidth;
//        var divy2 = div.offsetTop + div.offsetHeight;
//        if( x < divx1 || x > divx2 || y < divy1 || y > divy2){
//            if($("#right-sidebar-log").css('right') == '0px'){
//                $("#right-sidebar-log").animate({right:'-60%'}, 400);
//            }
//        }
//    }

    $(document).on("click",".closeslide",function () {
        if($("#right-sidebar-log").css('right') == '0px'){
            $("#right-sidebar-log").animate({right:'-60%'}, 600);
        }
    })

    //日志详情弹出
    var timer;
    $(document).on('click','.slidebar-nav',function(){

        var customer_id = $(this).attr('data-id');
        $(".emoji_container").remove();
        if($("#right-sidebar-log").css('right') != '0px'){
            $("#right-sidebar-log").animate({right:'0px'}, 600);
        }
        $('#task-content').html(detail_html);
        $('#sidebar-container').load("/index.php?m=business&a=listajax&id="+customer_id);

//        clearTimeout(timer);
//        timer=setTimeout(function () {
//
//            if($("#right-sidebar-log").css('right') != '0px'){
//                $("#right-sidebar-log").animate({right:'0px'}, 600);
//            }
//            $('#sidebar-container').load("/index.php?m=business&a=listajax&id="+customer_id);
//        },1000);
    });

    $(".right-sidebar-toggle-log").on("mouseleave",function (){
        clearTimeout(timer);
    })

    $(".add_customer").click(function(){
        var rel=$(this).attr("rel");
        //获取选中的候选人
        var select_ids=$(this).closest(".title-bar").find(".select_arr").val();
        var title="";
        var status=0;
        if(rel=="addcc"){
            title="确定加入CallList吗?";
            status=1;
        }
        if(rel=="removecc"){
            title="将候选人从CallList移除";
            status=2;
        }
        if(rel=="tjgw"){
            title="确定推荐给顾问面试?";
            status=3;
        }
        if(rel=="tjkehu"){
            title="确定推荐人才给客户?";
            status=4;
        }
        if(rel=="buheshi"){
            title="确定设置候选人为不合适?";
            status=5;
        }
        swal({
                title: title,
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    type:"post",
                    url:"",
                    data:{
                        select_ids:select_ids,
                        status:status
                    },
                    success:function () {
                        window.href=href;
                    },
                    error:function () {

                    }
                })
            });
    });

    $('.del_file').click(function(){
        var file_id = $(this).attr('rel');
        swal({
                title: "您确定要删除这个附件吗？",
                text: "删除后将无法恢复，请谨慎操作！",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "是的，我要删除！",
                cancelButtonText:'让我再考虑一下…',
                closeOnConfirm:false,
                closeOnCancel:false
            },
            function(isConfirm){
                if (isConfirm) {
                    $.ajax({
                        type:'get',
                        url: "<?php echo U('file/delete','r=RBusinessFile&id=');?>"+file_id,
                        async: false,
                        success: function (data) {
                            if (data.status == 1) {
                                swal("删除成功！", "您已经永久删除了信息！", "success");
                                location.reload();
                            }else{
                                swal({
                                    title: "操作失败！",
                                    text:data.info,
                                    type: "error"
                                })
                                return false;
                            }
                        },
                        dataType: 'json'
                    });
                } else {
                    swal("已取消","您取消了删除操作！","error");
                }
            });
    });

</script>