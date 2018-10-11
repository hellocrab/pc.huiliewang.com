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
    .product-table>tbody td:first-child{
        border-left: none !important;
    }
    .product-table>tbody td:last-child{
        border-right: none !important;
    }
    #tab0 .panel-body{
        padding-left: 0px !important;
    }
</style>
<ul class="nav nav-tabs" id="left_list">
    <li class="active">
        <a href="#tab0" data-toggle="tab" type="tab0">相关项目</a>
    </li>

	<?php if($share_num != 1): ?><!--<li class="">-->
        <!--<a href="#tab2" data-toggle="tab" type="tab2">客户详情</a>-->
    <!--</li>-->
    <li class="">
        <a href="#tab3" data-toggle="tab" type="tab3">联系人</a>
    </li>
    <li class="">
        <a href="#tab5" data-toggle="tab" type="tab5">合同</a>
    </li>
    <li class="">
        <a href="#tab6" data-toggle="tab" type="tab6">发票列表</a>
    </li><?php endif; ?>
    <li class="">
        <a href="#tab1" data-toggle="tab" type="tab1">跟进记录</a>
    </li>
	<!--<li class="">-->
        <!--<a href="#tab9" data-toggle="tab" type="tab9">日程</a>-->
    <!--</li>-->
    <!--<?php if($business_id == ''): ?>-->
		<!--<li class="">-->
	        <!--<a href="#tab8" data-toggle="tab" type="tab8">操作记录</a>-->
	    <!--</li>-->
	<!--<?php endif; ?>-->
    <!--<li class="">-->
        <!--<a href="#tab7" data-toggle="tab" type="tab7">附件</a>-->
    <!--</li>-->

   <!--  <div class="nav pull-right">
        <?php if($is_business_code == 1): ?><span style="line-height: 30px;">（ 商机编号：<?php echo ($business[0]['code']); ?> ）</span><?php endif; ?>
    </div> -->
</ul>
<div class="tab-content">
    <div  id="tab0"  class="tab-pane fade in active">
        <div class="panel-body">
            <?php if(I('content') != 'resource'): ?><div class="header1">
                <div class="pull-left">
                    <a href="/index.php?m=business&a=add&customer_id=<?php echo I('id');?>" class="add_file btn btn-primary"><i class="fa fa-plus-circle mr_5"></i>新建项目</a>
                </div>
                <div style="clear:both;"></div>
            </div><?php endif; ?>
            <table class="table product-table">
                <tbody>
                <tr>
                    <td>项目名称</td>
                    <td>项目类型</td>
                    <td>项目状态</td>
                    <td>负责人</td>
                    <td>创建时间</td>
                    <td>最近更新时间</td>
                </tr>
                <?php if($business): if(is_array($business)): $i = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                        <td>
                            <a href="<?php echo U('business/view','id='.$vo['business_id']);?>"><?php echo ($vo["name"]); ?></a>
                        </td>
                        <td><?php echo ($vo["pro_type"]); ?></td>
                        <td><?php echo ($vo["status_type"]); ?></td>
                        <td>
                            <?php if(is_array($vo["joiner"])): $i = 0; $__LIST__ = $vo["joiner"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($v['id']); ?>" href="javascript:void(0)" style="margin-right: 5px;"><?php echo ($v['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                            <!--<a href="#"><?php echo ($vo["joiner"]); ?></a>-->
                        </td>
                        <td><?php echo (date("Y-m-d H:i:s",$vo["create_time"])); ?></td>
                        <td><?php echo (date("Y-m-d H:i:s",$vo["update_time"])); ?></td>
                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                <?php else: ?>
                    <tr style="background-color:#fff;">
                        <td colspan="6">
                        <div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
                        </td>
                    </tr><?php endif; ?>
                </tbody>
            </table>
        </div>
    </div>
    <div id="tab0"  class="tab-pane fade in active" style="display: none;">
        <div class="" style="width:26.222%;margin-bottom: 10px;margin-top: 18px;float: left;">
            <div class="ibox-title clearfix">
                <div class="detail-title clearfix">
                    <div class="pull-left all-inline">
                        <img src="/Public/img/chanpxx.png" alt="">&nbsp;
                        <div class="text-tag" style="top: 2px;color: #676A6C;">
                            <span>相关项目</span>
                        </div>
                    </div>
                    <div class="pull-left text-center" style="margin-left: 20px;">
                        <input type="hidden" id="maodian" value="#tab1">
                        <button class="btn btn-outline btn-success all_business_a" id="customer-relation" onclick="customer_relation(this);" style="border-radius: 6px;width: 100%;line-height:30px;padding: 0px;width: 80px;" type="button">全部</button>
                    </div>
                    <!-- 分享不显示 -->
                    <div class="pull-right detail-right">
							<span rel="1">
								<a data-toggle="tooltip" data-placement="top" class="addproduct" rel="1" title="" data-original-title="添加商机" href="javascript:void(0);">
										<span class="plus-num">+</span>
									</a>							</span>
                    </div>                </div>
            </div>
            <div class="ibox-content" style="padding: 0px 0px 20px;border-top:none;min-height:430px;">
                <div class="product-list" style="cursor: pointer; background-color: rgb(255, 255, 255);" rel="2">
                    <!--竖线 -->
                    <div class="row ping-p">
                        <div class="col-md-1">
                            <div class="pull-left color-a">
                                <a href="javascript:void(0);" rel="2" style="font-size: 13px" class="product-a"><i class="fa fa-bookmark"></i></a>
                            </div>
                        </div>
                        <div class="col-md-10">
                            <p>2018-03-07 11:46</p>
                        </div>
                        <div class="col-md-1">
                            <div class="pull-right social-action dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-angle-down" style="font-size:20px;cursor:pointer"></i>
                                    </span>
                                <ul class="dropdown-menu m-t-xs">
                                    <li>
                                        <a href="/index.php?m=business&amp;a=view&amp;id=2">详情</a>
                                        <a href="/index.php?m=business&amp;a=edit&amp;id=2">编辑</a>
                                        <a href="javascript:void(0);" class="business_delete" rel="2">删除</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row ping-p">
                        <div class="col-md-3">
                            <p>项目名称</p>
                        </div>
                        <div class="col-md-7">
                            <p class="p-333">M_20180307-0002</p>
                        </div>
                        <div class="col-md-1"></div>
                    </div>
                    <div class="row ping-p edit-show">
                        <div class="col-md-3">
                            <p>维护人</p>
                        </div>
                        <div class="col-md-7">
                            <p class="p-333">维护人姓名</p>
                        </div>
                        <div class="col-md-1 color-a-edit" style="font-size: 15px">
                            <a style="display:none" rel="2" class="editproduct" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                        </div>
                    </div>
                    <div class="row ping-p">
                        <div class="col-md-3">
                            <p>项目阶段</p>
                        </div>
                        <div class="col-md-4">
                            <div class="progress progress-mini" style="cursor:pointer;background-color: #DDD;" data-toggle="tooltip" data-placement="top" data-original-title="完成收款">
                                <div class="progress-bar progress-bar-success" style="width: 100%;"></div>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <p class="p-333">完成收款</p>
                        </div>
                        <div class="col-md-1 color-a" style="font-size: 15px">
                            <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right" data-original-title="推进进度" rel="2" class="advance">
                                <i class="fa fa-forward"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="" style="width:71.5%;margin-bottom: 10px;margin-top: 18px;float: left;margin-left: 20px;border: 1px solid #ccc;min-height: 504px;">
            <ul class="nav nav-tabs" id="itemlists">
                <li class="itembtn active">
                    <a href="javascript:void(0);" data-toggle="itab" type="itab0" aria-expanded="true">项目动态</a>
                </li>
                <li class="itembtn">
                    <a href="javascript:void(0);" data-toggle="itab" type="itab1">跟进记录</a>
                </li>
                <li class="itembtn">
                    <a href="javascript:void(0);" data-toggle="itab" type="itab2">附件</a>
                </li>
            </ul>
            <div class="listsitem">
                <div class="itmelist" style="margin-top: 30px;margin-left: 20px;">
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="加入项目">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="顾问面试">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="推荐简历">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="面试">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="通过面试">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="offer">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="入职">
                        <label for="itme1" class="linelian"></label>
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>
                    <div class="stepitem">
                        <input type="button" class="button btn-default btn-color btn-sm" name="itme1" value="过保">
                        <div class="text-center" style="margin-top: 5px;"><a href="#">2</a></div>
                    </div>

                </div>
                <div class="itmelist" style="display: none;">跟进记录</div>
                <div class="itmelist" style="display: none;">附件</div>
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
    					<textarea name="content" placeholder="添加跟进记录" id="log-text" style="resize:none;" class="form-control" cols="30" rows="2"></textarea>
                        <table class="table business_table" style="border:none;margin-top:15px;display:none;" id="business_table">
                            <tr >
                                <td class="tdleft" style="width:120px;">跟进类型：</td>
                                <td style="width:120px;">
                                    <select name="status_id" id="status_id" class="form-control" onchange="selectStatus()">
                                        <option value="">--请选择--</option>
                                            <option value="1">电话</option><option value="2">发邮件</option><option value="3">发短信</option><option value="4">见面拜访</option><option value="5">基本情况</option><option value="6">备注</option>
                                        <!--<?php if(is_array($status_list)): $i = 0; $__LIST__ = $status_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                            <!--<option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option>-->
                                        <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
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
                            <!--<?php if (empty($business_id)): ?>-->
                                <!--<tr>-->
                                    <!--<td class="tdleft" style="width:120px;">关联商机：</td>-->
                                    <!--<td colspan="5">-->
                                        <!--<div class="text-left" id="product-radio" style="padding-top:8px;">-->
                                            <!--<?php if (empty($business_id)): ?>-->
                                            <!--<?php if(is_array($business)): $key = 0; $__LIST__ = $business;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?>-->
                                                <!--<div class="radio radio-info radio-inline" style="margin-left: 10px;">-->
                                                    <!--<input type="radio" name="id" class="business_code" id="status_<?php echo ($key); ?>" code="<?php echo ($vo["code"]); ?>" value="<?php echo ($vo["business_id"]); ?>">-->
                                                    <!--<label for="status_<?php echo ($key); ?>">&nbsp;<?php echo ($vo["code"]); ?>&nbsp;&nbsp;&nbsp;</label>&nbsp;&nbsp;-->
                                                <!--</div>-->
                                            <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                            <!--<?php endif; ?>-->
                                        <!--</div>-->
                                    <!--</td>-->
                                <!--</tr>-->
                            <!--<?php endif; ?>-->
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
            <div class="ibox-content gray-log" style="border: none;padding: 10px 20px;">
               基本信息
            </div>
            <div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户名称</div>
                    <div class="col-lg-7"><?php echo ($customer['name']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">薪资架构</div>
                    <div class="col-lg-7"><?php echo ($customer['salary_structure']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户行业</div>
                    <div class="col-lg-7"><?php echo ($customer['industry']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户产品</div>
                    <div class="col-lg-7"><?php echo ($customer['products']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">城市</div>
                    <div class="col-lg-7"><?php echo ($customer['address']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户规模</div>
                    <div class="col-lg-7"><?php echo ($customer['scale']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">电话</div>
                    <div class="col-lg-7"><?php echo ($customer['telephone']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户年产值</div>
                    <div class="col-lg-7"><?php echo ($customer['output_value']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">网址</div>
                    <div class="col-lg-7"><?php echo ($customer['website']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">客户同行竞争对手</div>
                    <div class="col-lg-7"><?php echo ($customer['competitor']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">地址</div>
                    <div class="col-lg-7"><?php echo ($customer['location']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">上班时间</div>
                    <div class="col-lg-7"><?php echo ($customer['work_time']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">邮箱</div>
                    <div class="col-lg-7"><?php echo ($customer['email']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">福利（保险、公积金）</div>
                    <div class="col-lg-7"><?php echo ($customer['reinsurance']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">传真</div>
                    <div class="col-lg-7"><?php echo ($customer['fax']); ?></div>
                </div>
                <div class="col-lg-6 form_bottm">
                    <div class="col-lg-3 text-right">福利（餐补、住宿、车补）</div>
                    <div class="col-lg-7"><?php echo ($customer['	allowance']); ?></div>
                </div>
            </div>
            <div class="ibox-content gray-log" style="border: none;padding: 10px 20px;">
                公司简介
            </div>
            <div class="col-lg-12" style="margin-top: 15px;line-height: 24px;"><?php echo ($customer['introduce']); ?></div>
        </div>
    </div>
    <div id="tab3" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox">
    			<?php if(I('content') != 'resource'): ?><div class="pull-left" style="padding-bottom: 15px">
                        <!--<a class="btn btn-primary btn-sm" rel="<?php echo ($customer_id); ?>" rel1="<?php echo ($business_id); ?>" id="rel_contacts" style="" href="javascript:void(0);">关联联系人</a>-->
                        <?php if($business_id): ?><a class="btn btn-primary btn-sm" href="<?php echo U('contacts/add',array('redirect'=>'business','redirect_id'=>$business_id));?>">添加联系人</a>
                        <?php else: ?>
                            <a class="btn btn-primary btn-sm" href="<?php echo U('contacts/add',array('redirect'=>'customer','redirect_id'=>$customer_id));?>">添加联系人</a><?php endif; ?>
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
                            <td>操作</td>
                        </tr>
                        <tbody>
                            <?php if(is_array($contacts_list)): $i = 0; $__LIST__ = $contacts_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><a href="<?php echo U('contacts/view','id='.$vo['contacts_id']);?>"><?php echo ($vo['name']); ?><span class="text-danger m_l_5">(首要)</span></a></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['crm_dbxxve']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['telephone']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['email']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['qq_no']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['post']); ?></td>
                                <td style="text-align:center;padding:14px;color:#666;border-right: 1px solid #e7eaec;"><?php echo ($vo['saltname']); ?></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#999"> <a class="role_info" rel="<?php echo ($vo['creator_role_id']); ?>" href="javascript:void(0)"><?php echo ($vo["user_name"]); ?></a></td>
                                <td style="border-right: 1px solid #e7eaec;text-align:center;padding:14px;color:#999"><?php echo (date('Y-m-d H:i',$vo['create_time'])); ?></td>
                                <td class="dropdown">
                                <?php if($content != 'resource'): ?><span class="dropdown-toggle" data-toggle="dropdown" style="cursor:pointer;color:#8FA1B2">
                                        <i class="fa fa-angle-down fa-lg"></i>
                                    </span>
                                    <ul class="dropdown-menu">
                                        <?php if($business_id): ?><li><a rel="<?php echo U('contacts/relToBusiness',array('business_id'=>$business_id,'contacts_id'=>$vo['contacts_id'],'act_n'=>2));?>" href="javascript:void(0);" class="not_rel_contacts" >解除关联</a></li><?php endif; ?>
                                        <li><a href="<?php echo U('contacts/edit',array('id'=>$vo['contacts_id']));?>">编辑</a></li>
                                        <?php if($business_id == ''): if($vo['contacts_id'] != $mail_contacts_id): ?><li><a class="set_major" href="javascript:void(0);" rel="<?php echo ($vo['contacts_id']); ?>">设为首要</a></li>
                                                <li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="delete">删除</a></li>
                                            <?php else: ?>
                                                <li><a title="删除联系人" href="javascript:void(0)" class="del_contacts" rel="<?php echo ($vo['contacts_id']); ?>" rel1="mdelete" rel2="<?php echo ($customer_id); ?>">删除</a></li><?php endif; endif; ?>
                                    </ul><?php endif; ?>
                                </td>
                            </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                        </tbody>
                    </table><?php endif; ?>
            </div>
        </div>
    </div>
	<div id="tab5" class="tab-pane fade in">
        <div class="panel-body">
            <div class="ibox">
                <?php if(I('content') != 'resource'): ?><div class="pull-left" style="padding-bottom: 15px">
                        <a class="btn btn-primary btn-sm"  style="" href="<?php echo U('contract/add','customer_id='.$customer_id);?>">添加合同</a>
                    </div><?php endif; ?>
			<?php if($contract_list): ?><table class="table select-table table-bordered">
                    <thead>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">合同编号</td>
                         <td style="background:#F9FaFC;text-align:center;color:#999;">合同标题</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">审批状态</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">预计回款金额（元）</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">开始时间</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">到期时间</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;">保证期</td>

                        <td style="background:#F9FaFC;text-align:center;color:#999;">创建者</td>
                        <td style="background:#F9FaFC;text-align:center;color:#999;display: none;"></td>

                    </thead>
                    <tbody class="body_border">
						<?php if(is_array($contract_list)): $i = 0; $__LIST__ = $contract_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><tr>
								<td style="text-align:center;"><a href="<?php echo U('contract/view','id='.$v['contract_id']);?>"><?php echo ($v['number']); ?></a></td>
								 <td style="text-align:center;"><?php echo ($v['contract_name']); ?></td>
                                <td style="text-align:center;"><?php if($v['is_checked'] == '2'): ?><span class="fa fa-circle" style="color:#F5715F"></span>&nbsp;&nbsp;&nbsp;拒绝
                                    <?php elseif($v['is_checked'] == '1'): ?>
                                    <span class="fa fa-circle" style="color:#7CCA4E"></span>&nbsp;&nbsp;&nbsp;通过
                                    <?php else: ?>
                                    <span class="fa fa-circle" style="color:#F5CA00"></span>&nbsp;&nbsp;&nbsp;待审<?php endif; ?>
                                </td>
                                <td style="text-align:center;"><?php echo ($v["price"]); ?></td>
                                <td style="text-align:center;"><?php if(!empty($v["end_date"])): echo (date("Y-m-d",$v["start_date"])); endif; ?></td>
								<td style="text-align:center;"><?php if(!empty($v["end_date"])): echo (date("Y-m-d",$v["end_date"])); endif; ?></td>
                                <td style="text-align:center;"><?php echo ($v["crm_deadline_time"]); ?></td>
								<td style="text-align:center;"><?php if(!empty($v["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($v["owner"]["role_id"]); ?>" href="javascript:void(0)"><?php echo ($v["owner"]["user_name"]); ?></a><?php endif; ?></td>
                                <td class="dropdown" style="display: none;">
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
                <div class="pull-left" style="padding-bottom: 15px;display: none;">
                    <?php if($business_id == ''): if($invoice_info == ''): ?><a class="btn btn-primary btn-sm" id="add_invoice" href="javascript:void(0);">添加发票</a>
                        <?php else: ?>
                            <a class="btn btn-primary btn-sm" id="view_invoice" rel="<?php echo ($invoice_info['id']); ?>" href="javascript:void(0);">查看发票</a><?php endif; endif; ?>
                </div>
    			<?php if($receivingorder_list): ?><table class="table select-table">
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
                            <?php if(is_array($receivingorder_list)): $i = 0; $__LIST__ = $receivingorder_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
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
                        </tbody>
                    </table>
    			<?php else: ?>
    				<div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div><?php endif; ?>
			</div>
		</div>
	</div>
	<div class="tab-pane fade in" id="tab7">
	    <div class="panel-body">
    		<?php if($content != 'resource'): ?><div class="pull-right">
    				<a href="javascript:void(0);" type="button" class="add_file btn btn-primary" rel="<?php if (empty($business_id)){echo 'customer';}else{echo 'business';} ?>"><i class="fa fa-upload"></i>&nbsp;&nbsp;上传</a>
    			</div><?php endif; ?>
			<div style="clear:both;"></div>
		</div>
		<?php if($file_info == null): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
		<?php else: ?>
			<table class="table product-table">
				<tr>
					<td>附件名称</td>
					<td><?php echo L('SIZE');?></td>
					<td>上传人</td>
					<td>上传时间</td>
					<?php if($content != 'resource'): ?><td>操作</td><?php endif; ?>
				</tr>
				<?php if(is_array($file_info)): $i = 0; $__LIST__ = $file_info;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
						<td>
							<img src="__PUBLIC__/productImg/<?php echo ($vo['pic']); ?>" alt="">&nbsp;&nbsp;&nbsp;
							<a <?php if(in_array(getExtension($vo['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($vo['file_path']); ?>" title="点击查看大图" data-litebox-group="group-1"<?php else: ?>href="javascript:;" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);"<?php endif; ?>><?php echo ($vo["name"]); ?></a>
						</td>
						<td>
							<?php echo ($vo["size"]); ?>KB
						</td>
						<td>
							<?php if(!empty($vo["owner"]["user_name"])): ?><a class="role_info" rel="<?php echo ($vo['owner']['role_id']); ?>" href="javascript:void(0)"><?php echo ($vo["owner"]["user_name"]); ?></a><?php endif; ?>
						</td>
						<td>
							<?php if(!empty($vo["create_date"])): echo (date("Y-m-d H:i",$vo["create_date"])); endif; ?>
						</td>
						<?php if($content != 'resource'): ?><td class="tdleft">
							<a href="javascript:void(0);" class="file_delete" rel="<?php echo ($vo['file_id']); ?>"><?php echo L('DELETE');?></a>
							<a href="javascript:void(0);" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);">下载</a>
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

        //设置联系人重要程度
        $(".set_major").click(function () {
           var contractid= $(this).attr('rel');
           $.ajax({
               url:'',
               type:'post',
               data:{
                   contractid,contractid
               },
               success:function (data) {
                   if(data.status == 1){
                       swal("操作提示！", "联系人设置成功！", "success");
                       location.reload();
                   }else{
                       swal("操作提示！", "设置失败，请重试！", "error");
                       return false;
                   }

               }
           })
        })
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
            var url = "<?php echo U('customer/view','id=');?>"+customer_id+"&content=<?php echo I('content');?>"+maodian;
        }else{
            if(bid){
                var url = "<?php echo U('customer/view','id=');?>"+customer_id+'&bid='+bid+"&content=<?php echo I('content');?>"+maodian;
            }else{
                var url = "<?php echo U('customer/view','id=');?>"+customer_id+"&content=<?php echo I('content');?>"+maodian;
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
        var module = $(this).attr('rel');
        if(module == 'customer'){
            $('#dialog-file').dialog('open');
            $('#dialog-file').load('<?php echo U("file/add","r=RCustomerFile&module=customer&id=".$customer_id);?>');
        }else if(module == 'business'){
            $('#dialog-file').dialog('open');
            $('#dialog-file').load('<?php echo U("file/add","r=RBusinessFile&module=business&id=".$business_id);?>');
        }
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



</script>