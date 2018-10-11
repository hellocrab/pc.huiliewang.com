<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<title><?php echo ($title); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="author" content="<?php echo L('AUTHOR');?>"/>
	<!-- 360浏览器默认使用Webkit内核 -->
	<meta name="renderer" content="webkit">
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
	<script src="__PUBLIC__/style/js/jquery-2.1.1.js"></script>
	<link type="text/css" href="__PUBLIC__/css/jquery-ui-1.10.0.custom.css" rel="stylesheet" />
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link rel="stylesheet" href="__PUBLIC__/resume_selector/common.41f94c00.css">
	<link rel="stylesheet" href="__PUBLIC__/resume_selector/resume.search.12eb3a9b.css">
	<link href="__PUBLIC__/style/css/bootstrap.min.css" rel="stylesheet">
	<link href="__PUBLIC__/style/font-awesome/css/font-awesome.css" rel="stylesheet">
	<link href="__PUBLIC__/css/font-awesome.min.css" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/hovershow.css" rel="stylesheet"/>
	<!-- animate -->
	<link rel='stylesheet' href='__PUBLIC__/css/animate/animate.min.css'>
	<link rel="stylesheet" href="__PUBLIC__/css/animate/notification.css">
	<style type="text/css">
		a.active{
			font-weight: bold;
			color: #777;
		}
		.nobr{
			white-space:nowrap;
		}
		#header-top{
		    position: fixed;
		    /*width: 87.3%;*/
		    right:0px;
		    z-index: 102;
		}
		.sidebar-collapse{z-index:9999;}
		.tooltip{width:85px;line-height:36px;}
		.tooltip-inner{padding:3px 12px;text-align:left;}
		.table{margin-bottom:0px;}
		@media (max-width: 768px){
			.nav.left-side{
				display: none;
			}
		}
		.navbar{margin-bottom:0px;}
		.check_list{width: 20px;height: 20px;}
		.check_all{width: 20px;height: 20px;}
		.check_all{width: 20px;height: 20px;}
		input[type=checkbox], input[type=radio]{margin-top:0px;}
		.radio.radio-inline {padding-left: 0px;}
		.alert-error{margin:20px;line-height:30px;}
		.text{color:#000;}
		.notification{top:150px;z-index:9999;}

		.checkbox, .radio{margin:0 auto;}

		/*闪烁效果*/
		.crm_heart{
		    animation:heart 1s ease infinite;
		}

		@keyframes heart {
	        0% {color:#FF6D57;}
	        100%{color:#93A6B5;}
		}


	</style>


	<!-- Toastr style -->
	<link href="__PUBLIC__/style/css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<!-- Sweet Alert -->
	<link href="__PUBLIC__/style/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
	<link href="__PUBLIC__/style/css/style.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/plugins/awesome-bootstrap-checkbox/awesome-bootstrap-checkbox.css" rel="stylesheet">
	<!-- Mainly scripts -->
	<script src="__PUBLIC__/style/js/bootstrap.min.js"></script>
	<script src="__PUBLIC__/js/daterangepicker/moment.min.js"></script>
	<script src="__PUBLIC__/style/js/jquery.form.js" type="text/javascript"></script>
	<!-- <script src="__PUBLIC__/style/js/plugins/metisMenu/jquery.metisMenu.js"></script> -->
	<script src="__PUBLIC__/style/js/plugins/slimscroll/jquery.slimscroll.min.js"></script>
	<!-- Toastr -->
	<script src="__PUBLIC__/style/js/plugins/toastr/toastr.min.js"></script>
	<!-- Custom and plugin javascript -->
	<script src="__PUBLIC__/style/js/plugins/pace/pace.min.js"></script>
	<script src="__PUBLIC__/style/js/inspinia.js"></script>
	<script src="__PUBLIC__/js/mxcrm_zh-cn.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/mxcrm.js" type="text/javascript"></script>
	<!-- jQuery UI -->
	<script src="__PUBLIC__/js/jquery-ui-1.10.0.custom.min.js" type="text/javascript"></script>
	<script src="__PUBLIC__/js/WdatePicker.js" type="text/javascript"></script>
	<!-- Sweet alert -->
	<script src="__PUBLIC__/style/js/plugins/sweetalert/sweetalert.min.js"></script>
	<!-- Jquery Validate -->
	<script src="__PUBLIC__/style/js/plugins/validate/jquery.validate.min.js"></script>
	<script src="__PUBLIC__/style/js/plugins/validate/messages_zh.min.js"></script>
	<script src="__PUBLIC__/js/bootstrap-tooltip.js"></script>
	<!-- 下拉筛选 -->
	<link rel="stylesheet" href="__PUBLIC__/css/bootstrap-select.css">
	<script type="text/javascript" src="__PUBLIC__/js/bootstrap-select.js" charset="UTF-8"></script>
	<!-- select2 -->
	<link href="__PUBLIC__/style/css/plugins/select2/select2.min.css" rel="stylesheet">
	<script src="__PUBLIC__/style/js/plugins/select2/select2.full.min.js"></script>

	<link href="__PUBLIC__/css/new.css">

</head>
<script>

$(function(){
    sessionStorage.removeItem("idskey");
    sessionStorage.removeItem("nameskey");

	var innerHeight = window.innerHeight;
	if(innerHeight < 768){
		innerHeight = 768;
	}
	$("#page-wrapper").css("min-height",innerHeight);
	$(window).resize(function(){
		var innerHeight = window.innerHeight;
		if(innerHeight < 768){
			innerHeight = 768;
		}
		$("#page-wrapper").css("min-height",innerHeight);
	});
	$(".select2").select2({
        placeholder: "--请选择--"
        // allowClear: true
    });
});
</script>
<!-- <body class="navbar fixed-sidebar"> -->
<body class="navbar">
	<div id="wrapper">

		<nav class="navbar-default navbar-static-side" role="navigation" style="width: 120px;">
	        <div class="sidebar-collapse">
	        	<?php
 $module_name = strtolower(MODULE_NAME); $action_name = strtolower(ACTION_NAME); $t = strtolower($_GET['t']); $module_list = array('customer','business','product','contract','finance','analytics','log','contacts','sendsms','setting'); $new_module_list = array(); foreach($module_list as $k=>$v){ switch($v){ case 'customer' : if (checkPerByAction('leads','index')) { $new_module_list[] = 'customer'; } elseif (checkPerByAction('customer','index')) { $new_module_list[] = 'customer'; } elseif (checkPerByAction('contacts','index')) { $new_module_list[] = 'customer'; } elseif (checkPerByAction('member','index')) { $new_module_list[] = 'customer'; } break; case 'business' : if (checkPerByAction('business','index')) { $new_module_list[] = 'business'; } break; case 'product' : if (checkPerByAction('product','index')) { $new_module_list[] = 'product'; } break; case 'contract' : if (checkPerByAction('contract','index')) { $new_module_list[] = 'contract'; } elseif (checkPerByAction('order','index')) { $new_module_list[] = 'contract'; } break; case 'finance' : if (checkPerByAction('finance','index_receivables')) { $new_module_list[] = 'finance'; } elseif (checkPerByAction('finance','index_receivingorder')) { $new_module_list[] = 'finance'; } elseif (checkPerByAction('finance','index_payables')) { $new_module_list[] = 'finance'; } elseif (checkPerByAction('finance','index_paymentorder')) { $new_module_list[] = 'finance'; } elseif (checkPerByAction('invoice','index')) { $new_module_list[] = 'finance'; } break; case 'analytics' : if (checkPerByAction('customer','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('business','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('finance','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('product','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('leads','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('contract','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('log','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('kaoqin','analytics')) { $new_module_list[] = 'analytics'; } elseif (checkPerByAction('kaoqin','record')) { $new_module_list[] = 'analytics'; } break; case 'log' : if (checkPerByAction('log','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('examine','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('knowledge','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('announcement','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('sign','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('event','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('task','index')) { $new_module_list[] = 'log'; } elseif (checkPerByAction('kaoqin','index')) { $new_module_list[] = 'log'; } break; case 'contacts' : if (checkPerByAction('user','contacts')) { $new_module_list[] = 'contacts'; } break; case 'sendsms' : if (checkPerByAction('setting','sendsms')) { $new_module_list[] = 'sendsms'; } break; case 'setting' : if (checkPerByAction('user','index')) { $new_module_list[] = 'setting'; } elseif (checkPerByAction('kaoqin','setting')) { $new_module_list[] = 'setting'; } break; } } $m_scene_default = M('SceneDefault'); $m_scene = M('Scene'); $customer_default_scene = $m_scene_default->where(array('role_id'=>session('role_id'),'module'=>'customer'))->getField('scene_id'); if (!$customer_default_scene) { $customer_default_info = $m_scene->where(array('module'=>'customer','type'=>1))->order('id asc')->find(); } else { $customer_default_info = $m_scene->where(array('id'=>$customer_default_scene))->find(); } if ($customer_default_info['type'] == 1) { $customer_url = U('customer/index','by='.$customer_default_info['by']); } else { $customer_url = U('customer/index','scene_id='.$customer_default_info['id']); } $authorize_setting = C('AUTHORIZE_SETTING'); $days_remaining = '100'; if ($authorize_setting['NUM'] <= 5 && !empty($authorize_setting['OPENTIME']) && $authorize_setting['OPENTIME'] > '20171116') { if ($authorize_setting['NUM'] > 2) { $days_remaining = round((strtotime($authorize_setting['ENDTIME'])-time())/86400); $authorize_setting['ENDTIME'] = date('Y年m月d日',strtotime($authorize_setting['ENDTIME'])); } else { $authorize_setting['ENDTIME'] = '永久免费'; } } else { if (($authorize_setting['NUM'] > 5)) { $days_remaining = round((strtotime($authorize_setting['ENDTIME'])-time())/86400); $authorize_setting['ENDTIME'] = date('Y年m月d日',strtotime($authorize_setting['ENDTIME'])); } else { $authorize_setting['ENDTIME'] = '永久免费'; } } ?>
	            <ul class="nav metismenu left-side" id="side-menu" >
	                <li class="nav-header" style="padding:6px 21px 21px;">
	                    <br>
	                    <?php
 $img = M('User')->where('user_id = %d', session('user_id'))->getField('img'); $defaultinfo_info = M('Config')->where('name = "defaultinfo"')->find(); $defaultinfo = unserialize($defaultinfo_info['value']); ?>
	                    <div class="logo-element" style="margin: -17px -25px;">
	                    	<?php if($defaultinfo['logo_min_thumb_path']): ?><img class="img-circle" src="<?php echo ($defaultinfo['logo_min_thumb_path']); ?>" style="width: 38px;height: 38px;margin-right:0px;" alt="<?php echo ($defaultinfo['name']); ?>">
	                    	<?php else: ?>
	                    		<img class="img-circle" src="__PUBLIC__/img/logo2.png" style="width: 38px;height: 38px;margin-right:0px;" alt="MXCRM"><?php endif; ?>
	                    </div>
	                </li>
	                <li >
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="首页" <?php if($module_name == 'index'): ?>class="active"<?php endif; ?> href="<?php echo U('index/index');?>"><i class="fa fa-home"></i><span class="menu_code">首页</span></a>
	                </li>

	                <?php if (in_array('customer',$new_module_list)): ?>
	                <li >
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="客户管理" <?php if(($module_name == 'customer' && $action_name != 'analytics') || $module_name == 'contacts' || $module_name == 'member'): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('customer','index')): ?>href="<?php echo ($customer_url); ?>"<?php elseif(checkPerByAction('contacts','index')): ?>href="<?php echo U('contacts/index');?>"<?php elseif(checkPerByAction('leads','index')): ?>href="<?php echo U('leads/index');?>"<?php else: ?>href="<?php echo U('customer/index','by=me');?>"<?php endif; ?> ><i class="fa fa-user"></i><span class="menu_code">客户</span></a>
	                </li>
	                <?php endif; ?>
	                <?php if (in_array('business',$new_module_list)): ?>
	                <li >
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="项目管理" <?php if($module_name == 'business' && $action_name != 'analytics'): ?>class="active"<?php endif; ?> href="<?php echo U('business/index');?>" ><i class="fa fa-suitcase"></i><span class="menu_code">项目</span></a>
	                </li>
	                <?php endif; ?>

	                <li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="人才管理" <?php if($module_name == 'product' && $action_name != 'category'): ?>class="active"<?php endif; ?> href="<?php echo U('product/index');?>"><i class="fa fa-inbox"></i><span class="menu_code">人才</span></a>
	                </li>

	                <?php if (in_array('contract',$new_module_list)): ?>
					<li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="合同订单" <?php if(($module_name == 'contract' && $action_name != 'analytics' && $action_name != 'collection' && $action_name != 'examine') || $module_name == 'order'): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('contract','index')): ?>href="<?php echo U('contract/index');?>"<?php elseif(checkPerByAction('order','index')): ?>href="<?php echo U('order/index');?>"<?php endif; ?>><i class="fa fa-file-text"></i><span class="menu_code">合同</span></a>
	                </li>
	                <?php endif; ?>




					<li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="财务发票" <?php if(($module_name == 'invoice' || $module_name == 'finance')): ?>class="active"<?php endif; ?> href="<?php echo U('finance/index');?>"><i class="fa fa-credit-card"></i><span class="menu_code">财务</span></a>
	                </li>
	              
	                <?php if (in_array('analytics',$new_module_list)): ?>
					<li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="报表分析" <?php if($action_name == 'collection' || $action_name == 'analytics' || $action_name == 'record'|| $action_name == 'projecttrend'|| $action_name == 'resume'|| $action_name == 'project'|| $action_name == 'customer'|| ($action_name == 'department' && $module_name == 'leads')|| $action_name == 'business'|| $action_name == 'achievement'|| $action_name == 'weektrend'|| $action_name == 'monthtrend'): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('leads','analytics')): ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php elseif(checkPerByAction('customer','analytics')): ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php elseif(checkPerByAction('business','analytics')): ?>href="<?php echo U('business/analytics','content_id=1');?>"<?php elseif(checkPerByAction('finance','analytics')): ?>href="<?php echo U('finance/analytics','content_id=1');?>"<?php elseif(checkPerByAction('product','analytics')): ?>href="<?php echo U('product/analytics','content_id=1');?>"<?php elseif(checkPerByAction('log','analytics')): ?>href="<?php echo U('log/analytics','content_id=1');?>"<?php else: ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php endif; ?> ><i class="fa fa-area-chart"></i><span class="menu_code">报表</span></a>
	                </li>
	                <?php endif; ?>


					<li>
						<a data-toggle="tooltip" data-placement="right" data-original-title="积分业绩" <?php if(($module_name == 'integral')): ?>class="active"<?php endif; ?> href="<?php echo U('integral/index');?>"><i class="fa fa-leaf"></i><span class="menu_code">积分</span></a>
					</li>

	                <?php if (in_array('log',$new_module_list)): ?>
					<li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="日程" <?php if($module_name == 'log' && $action_name != 'analytics' || ($module_name == 'examine' && $action_name != 'analytics') || $module_name == 'announcement' || ($module_name == 'knowledge' && $action_name != 'category') || $module_name == 'sign' || $module_name == 'event' || $module_name == 'task' || ($module_name == 'kaoqin' && $action_name == 'index')): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('event','index')): ?>href="<?php echo U('event/index');?>"<?php elseif(checkPerByAction('examine','index')): ?>href="<?php echo U('examine/index');?>"<?php elseif(checkPerByAction('knowledge','index')): ?>href="<?php echo U('knowledge/index');?>"<?php elseif(checkPerByAction('announcement','index')): ?>href="<?php echo U('announcement/index');?>"<?php elseif(checkPerByAction('sign','index')): ?>href="<?php echo U('sign/index');?>"<?php elseif(checkPerByAction('event','index')): ?>href="<?php echo U('event/index');?>"<?php elseif(checkPerByAction('task','index')): ?>href="<?php echo U('task/index');?>"<?php endif; ?>><i class="fa fa-desktop"></i><span class="menu_code">日程</span></a>
	                </li>
	                <?php endif; ?>
	                <!--<?php if (in_array('contacts',$new_module_list)): ?>-->
	                <!--<li>-->
	                	<!--<a data-toggle="tooltip" data-placement="right" data-original-title="通讯录" <?php if($module_name == 'user' && ($action_name == 'contacts' || $action_name == 'view')): ?>class="active"<?php endif; ?> href="<?php echo U('user/contacts');?>" ><i class="fa fa-phone-square"></i></a>-->
	                <!--</li>-->
	                <!--<?php endif; ?>-->
	                <!--<?php if (in_array('sendsms',$new_module_list)): ?>-->
					<!--<li>-->
	                	<!--<a data-toggle="tooltip" data-placement="right" data-original-title="营销" <?php if($action_name == 'sendsms' || $action_name == 'smsrecord' || $action_name == 'sendemail' || $module_name == 'email' || $module_name == 'sms'): ?>class="active"<?php endif; ?> href="<?php echo U('setting/sendsms');?>"><i class="fa fa-envelope"></i></a>-->
	                <!--</li>-->
	                <!--<?php endif; ?>-->
					<!---->

	                <?php if (in_array('setting',$new_module_list)): ?>
	                <li>
	                	<a data-toggle="tooltip" data-placement="right" data-original-title="系统设置" <?php if(($module_name == 'setting' && ($action_name != 'sendsms' && $action_name != 'smsrecord' && $action_name != 'sendemail')) || ($module_name == 'user' && $action_name != 'contacts' && $action_name != 'view') || $action_name == 'category' || ($module_name == 'kaoqin' && $action_name != 'analytics' && $action_name != 'record' && $action_name != 'index') || ($module_name == 'contract' && $action_name == 'examine')): ?>class="active"<?php endif; ?> <?php if(session('?admin')): ?>href="<?php echo U('setting/defaultinfo');?>"<?php elseif(checkPerByAction('user','index')): ?>href="<?php echo U('user/index');?>"<?php elseif(checkPerByAction('kaoqin','setting')): ?>href="<?php echo U('kaoqin/setting');?>"<?php else: ?>href="<?php echo U('setting/defaultinfo');?>"<?php endif; ?> ><i class="fa fa-cog"></i><span class="menu_code">系统</span></a>
	                </li>
	                <?php endif; ?>
	            </ul>
	        </div>
	    </nav>
		<div id="page-wrapper" class="gray-bg" style="background:#e6e9f0">
    		<div class="row border-bottom white-bg" style="box-shadow: 0px 4px 13px -8px #5A5A5A;z-index: 102;">
				<nav class="navbar navbar-default nav-head navbar-static-top" role="navigation" style="margin-bottom: 0">
					<?php
 $module_name = strtolower(MODULE_NAME); $action_name = strtolower(ACTION_NAME); $t = strtolower($_GET['t']); ?>
					<ul class="nav navbar-nav navbar-left navbar-form-custom" style="min-width:60%;">
						<?php if ($module_name == 'index'): ?>
							<li <?php if($module_name == 'index' && $action_name == 'index'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('index/index');?>"><span class="fa fa-home" style="display:inline"></span>&nbsp;&nbsp;首页</a></li>
						<?php elseif($action_name == 'analytics' || $action_name == 'collection' || $action_name == 'city_analytics' || $action_name == 'record'): ?>
							<li <?php if($action_name == 'analytics' || $action_name == 'city_analytics' || $action_name == 'record'): ?>class="active"<?php endif; ?>><a href="<?php echo U('customer/analytics');?>"><span class="fa fa-area-chart" style="display:inline"></span>&nbsp;&nbsp;数据分析</a></li>
						<?php elseif ($module_name == 'customer' && $action_name != 'analytics' && $action_name != 'city_analytics' || $module_name == 'contacts' || $module_name == 'member' || $module_name == 'leads') : ?>
							<!--<li <?php if($module_name == 'leads' && $_GET['by'] != 'public'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('leads/index');?>"><span class="fa fa fa-child" style="display:inline"></span>&nbsp;&nbsp;线索</a></li>-->
							<!--<li <?php if($module_name == 'leads' && $_GET['by'] == 'public'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('leads/index','by=public');?>"><span class="fa fa fa-child" style="display:inline"></span>&nbsp;&nbsp;线索池</a></li>-->
							<li <?php if($module_name == 'customer' && $_GET['content'] != 'resource' && $_GET['content'] != 'city_analytics'): ?>class="active"<?php endif; ?> ><a href="<?php echo ($customer_url); ?>"><span class="fa fa-user" style="display:inline"></span>&nbsp;&nbsp;客户</a></li>
							<li <?php if($_GET['content'] == 'resource'): ?>class="active"<?php endif; ?>><a href="<?php echo U('customer/index','by=me&content=resource');?>"><span class="fa fa-group" style="display:inline"></span>&nbsp;&nbsp;客户池</a></li>
							<li <?php if($module_name == 'contacts'): ?>class="active"<?php endif; ?>><a href="<?php echo U('contacts/index');?>"><span class="fa fa-phone-square" style="display:inline"></span>&nbsp;&nbsp;客户联系人</a></li>
						<?php elseif($module_name == 'business' && $action_name != 'analytics'): ?>
							<li class="active"><a href="<?php echo U('business/index');?>"><span class="fa fa-suitcase" style="display:inline"></span>&nbsp;&nbsp;项目管理</a></li>
						<?php elseif($module_name == 'product' && $action_name = 'index'): ?>
							<li class="active"><a href="<?php echo U('product/index');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;人才管理</a></li>
						<?php elseif($module_name == 'integral' && $action_name = 'index'): ?>
						<li class="active"><a href="<?php echo U('integral/index');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;积分管理</a></li>
						<?php elseif($module_name == 'contract' || $module_name == 'order'): ?>
							<li <?php if($module_name == 'contract'): ?>class="active"<?php endif; ?>><a href="<?php echo U('contract/index');?>"><span class="fa fa-list-alt" style="display:inline"></span>&nbsp;&nbsp;合同</a></li>
						<?php elseif($module_name == 'finance' || $module_name == 'invoice'): ?>
							<!--<li <?php if($module_name == 'finance' && $t == 'receivingorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=receivingorder');?>"><span class="fa fa-money" style="display:inline"></span>&nbsp;&nbsp;回款单</a></li>-->
							<!--<li <?php if($module_name == 'finance' && $t == 'payables'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=payables');?>"><span class="fa fa-credit-card" style="display:inline"></span>&nbsp;&nbsp;应付款</a></li>-->
							<!--<li <?php if($module_name == 'finance' && $t == 'paymentorder'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index','t=paymentorder');?>"><span class="fa fa-money" style="display:inline"></span>&nbsp;&nbsp;付款单</a></li>-->
							<?php
 if(checkPerByAction('invoice','index')){ ?>
							<li <?php if($module_name == 'invoice'): ?>class="active"<?php endif; ?>><a href="<?php echo U('invoice/index');?>"><span class="fa fa-bookmark" style="display:inline"></span>&nbsp;&nbsp;发票</a></li>
						<?php
 } ?>

                            <li <?php if($module_name == 'finance'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index');?>"><span class="fa fa-credit-card" style="display:inline"></span>&nbsp;&nbsp;发票分配明细汇总</a></li>
						<?php elseif($module_name == 'log' || $module_name =='examine' || ($module_name == 'knowledge' && $action_name != 'category') || $module_name == 'announcement' || $module_name == 'sign' || $module_name == 'event' || $module_name == 'task' || ($module_name == 'kaoqin' && $action_name == 'index') ): ?>
							<!--<li <?php if($module_name == 'log'): ?>class="active"<?php endif; ?>><a href="<?php echo U('log/index');?>"><span class="fa fa-pencil-square" style="display:inline"></span>&nbsp;&nbsp;工作日志</a></li>-->
							<!--<li <?php if($module_name == 'examine'): ?>class="active"<?php endif; ?>><a href="<?php echo U('examine/index');?>"><span class="fa fa-check-square-o" style="display:inline"></span>&nbsp;&nbsp;审批</a></li>-->
							<li <?php if($module_name == 'knowledge' && $action_name != 'category'): ?>class="active"<?php endif; ?>><a href="<?php echo U('knowledge/index');?>"><span class="fa fa-book" style="display:inline"></span>&nbsp;&nbsp;知识</a></li>
							<li <?php if($module_name == 'announcement'): ?>class="active"<?php endif; ?>><a href="<?php echo U('announcement/index');?>"><span class="fa fa-volume-up" style="display:inline"></span>&nbsp;&nbsp;公告</a></li>
							<!--<li <?php if($module_name == 'sign'): ?>class="active"<?php endif; ?>><a href="<?php echo U('sign/index');?>"><span class="fa fa-map-pin" style="display:inline"></span>&nbsp;&nbsp;定位签到</a></li>-->
							<li <?php if($module_name == 'event'): ?>class="active"<?php endif; ?>><a href="<?php echo U('event/index');?>"><span class="fa fa-calendar" style="display:inline"></span>&nbsp;&nbsp;日程</a></li>
							<li <?php if($module_name == 'task'): ?>class="active"<?php endif; ?>><a href="<?php echo U('task/index');?>"><span class="fa fa-tasks" style="display:inline"></span>&nbsp;&nbsp;任务</a></li>
							<!--<li <?php if($module_name == 'kaoqin'): ?>class="active"<?php endif; ?>><a href="<?php echo U('kaoqin/index');?>"><span class="fa fa-hand-pointer-o" style="display:inline"></span>&nbsp;&nbsp;考勤月历</a></li>-->
						<?php elseif(($module_name == 'setting' && ($action_name =='sendsms' || $action_name =='smsrecord' || $action_name =='sendemail'))|| $module_name == 'email' || $module_name == 'sms'): ?>
							<li <?php if(($module_name == 'setting' && $action_name == 'sendsms')|| $module_name == 'sms'): ?>class="active"<?php endif; ?>><a href="<?php echo U('setting/sendsms');?>"><span class="fa fa-comments-o" style="display:inline"></span>&nbsp;&nbsp;<?php echo L('SEND_SMS');?></a></li>
							<li <?php if($module_name == 'setting' && $action_name == 'smsrecord'): ?>class="active"<?php endif; ?>><a href="<?php echo U('setting/smsrecord');?>"><span class="fa fa-envelope" style="display:inline"></span>&nbsp;&nbsp;<?php echo L('SMS_RECORD');?></a></li>
							<li <?php if(($module_name == 'setting' && $action_name == 'sendemail')|| $module_name == 'email'): ?>class="active"<?php endif; ?>><a href="<?php echo U('setting/sendemail');?>"><span class="fa fa-folder" style="display:inline"></span>&nbsp;&nbsp;<?php echo L('SEND_EMAIL');?></a></li>
						<?php elseif(($module_name == 'user' && $action_name != 'contacts' && $action_name != 'view') || ($module_name == 'setting' && ($action_name !='sendsms' && $action_name !='smsrecord' && $action_name !='sendemail')) || $action_name == 'category' || ($module_name == 'accountsetting') || ($module_name == 'kaoqin' && $action_name == 'setting') ): ?>
							<li <?php if($module_name == 'user' && $action_name == 'edit' && ($_GET['id'] == '' || $_GET['id'] == session('role_id'))): ?>class="active"<?php endif; ?>>
								<a href="<?php echo U('user/edit');?>"><span class="fa fa-user" style="display:inline"></span>&nbsp;&nbsp;个人中心</a>
							</li>
							<li <?php if($module_name == 'setting' || ($module_name == 'user' && $action_name != 'edit') || $action_name == 'category' || ($module_name == 'user' && $action_name == 'edit' && $_GET['id'] != session('role_id') && $_GET['id'] != '') || ($module_name == 'accountsetting') || ($module_name == 'kaoqin' && $action_name == 'setting')): ?>class="active"<?php endif; ?>><a href="<?php echo U('user/index');?>"><span class="fa fa-cog" style="display:inline"></span>&nbsp;&nbsp;系统设置</a></li>
						<?php elseif($module_name == 'user' && ($action_name == 'contacts' || $action_name == 'view')): ?>
							<li <?php if($module_name == 'user'): ?>class="active"<?php endif; ?>><a href="<?php echo U('user/contacts');?>"><span class="fa fa-phone-square" style="display:inline"></span>&nbsp;&nbsp;通讯录</a></li>
						<?php elseif($module_name == 'message'): ?>
							<li <?php if($module_name == 'message'): ?>class="active"<?php endif; ?>><a href="<?php echo U('message/index');?>"><span class="fa fa-bank" style="display:inline"></span>&nbsp;&nbsp;消息中心</a></li>
						<?php endif; ?>
					</ul>
					<ul class="nav navbar-top-links navbar-right" style="margin-right:0px;">
						<li class="dropdown" style="">
		                    <a class="dropdown-toggle count-info" id="todo_url"  data-toggle="dropdown" href="#" title="待办事项">
		                        <img src="__PUBLIC__/img/remain.png" alt="" /><div class="label label-info" style="background-color: #FA7252;" id="todo_num"></div>
		                    </a>
	                   		<ul class="dropdown-menu dropdown-alerts folder-list m-b-md" style="width:250px;">
	                   			<?php $contract_examine_role_ids = M('ContractExamine')->getField('role_id',true); ?>
	                   			<?php if (checkPerByAction('contract','check') || in_array(session('role_id'),$contract_examine_role_ids)): ?>
			            			<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('contract/index','contract_checked=1&by=all');?>"><i class="fa fa-list-alt"></i>&nbsp;&nbsp;待审核的合同<span class="label label-info pull-right" style="background-color: #FA7252;" id="header_check_contract_num"></span></a></li>
			            		<?php endif; ?>
								<?php if (checkPerByAction('finance','check')): ?>
			            			<!--<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('finance/index','t=receivingorder&status[value]=0&by=all');?>"><i class="fa fa-money"></i>&nbsp;&nbsp;待审核的回款<span class="label label-info pull-right" style="background-color: #FA7252;" id="header_receivables_num"></span></a></li>-->
			            		<?php endif; ?>
								<?php if (checkPerByAction('examine','index')): ?>
			            			<!--<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('examine/index','by=me_examine&examining=1');?>"><i class="fa fa-check-square-o"></i>&nbsp;&nbsp;待处理的审批流<span class="label label-info pull-right" style="background-color: #FA7252;" id="header_examine_num"></span></a></li>-->
								<?php endif; ?>
								<?php if (checkPerByAction('contract','index')): ?>
									<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('contract/index','by=dqcontact');?>"><i class="fa fa-user"></i>&nbsp;&nbsp;合同到期提醒<span class="label label-info pull-right" style="background-color: #FA7252;" id="header_dqcontact_num"></span></a></li>
								<?php endif; ?>

								<?php if (checkPerByAction('finance','index_receivables')): ?>
			            			<!--<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('finance/index','t=receivables&r_status=1&by=me');?>"><i class="fa fa-money"></i>&nbsp;&nbsp;应收款提醒<span class="label label-info pull-right" style="background-color: #FA7252;" id="receivables_num"></span></a></li>-->
			            		<?php endif; ?>
			            		<?php if (checkPerByAction('customer','index')): ?>
			            			<li style="border-bottom:1px dashed #e7eaec !important;"><a href="<?php echo U('customer/index','by=todaycontact');?>"><i class="fa fa-user"></i>&nbsp;&nbsp;今日需跟进客户<span class="label label-info pull-right" style="background-color: #FA7252;" id="header_follow_customer_num"></span></a></li>
			            		<?php endif; ?>
	                   		</ul>
		                </li>
		                <li class="dropdown" style="">
		                    <a class="dropdown-toggle count-info" id="event_url" data-toggle="dropdown" href="#" title="今日日程">
		                        <img src="__PUBLIC__/img/event.png" alt="" /><span class="label label-warning" id="event_num"></span>
		                    </a>
	                   		<ul class="dropdown-menu dropdown-alerts">
			            		<li class="list-group" role="presentation" id="event_group" style="height:220px;display:none;">
	                        		<div class="full-height-scroll" id="event_list" data-height="220px" data-plugin="slimScroll" style="overflow: hidden; width: auto;">
                                    </div>
                        		</li>
                        		<li>
			                        <div class="text-center link-block">
			                            <a href="<?php echo U('event/index');?>">
			                                <strong>查看全部日程</strong>
			                                <i class="fa fa-angle-right"></i>
			                            </a>
			                        </div>
			                    </li>
			            		<li class="divider" style="height:0px;"></li>
	                   		</ul>
		                </li>
		                <li class="dropdown">
		                    <a class="dropdown-toggle count-info" id="message_url" data-toggle="dropdown" href="#" title="站内信">
		                        <img src="__PUBLIC__/img/bell.png" alt="" /><span class="label label-primary" id="message_num"></span>
		                    </a>
	                    	<ul class="dropdown-menu dropdown-alerts" style="width:365px;">
	                    		<li class="list-group" role="presentation" id="message_group" style="height:220px;display:none;">
	                        		<div class="full-height-scroll" id="message_list" data-height="220px" data-plugin="slimScroll" style="overflow: hidden; width: auto;">
	                        		</div>
	                        	</li>
	                    		<li>
			                        <div class="text-center link-block">
			                            <a href="<?php echo U('message/index');?>">
			                                <strong>站内信列表</strong>
			                                <i class="fa fa-angle-right"></i>
			                            </a>
			                        </div>
			                    </li>
			                    <li class="divider" style="height:0px;"></li>
	                    	</ul>
		                </li>
		                <li style="padding-left: 30px;">
							<a href="#" class="dropdown-toggle" data-toggle="dropdown" style="padding: 2px;">
								<?php
 $img = M('User')->where('user_id = %d', session('user_id'))->getField('thumb_path'); ?>
								<?php if($img != ''): ?><img alt="头像" style="height:38px;width:38px" class="img-circle" src="<?php echo ($img); ?>" />
								<?php else: ?>
									<img alt="头像" style="height:38px;width:38px" class="img-circle" src="__PUBLIC__/img/avatar_default.png" /><?php endif; ?>
							</a>
							<ul class="dropdown-menu">
								<li><a href="<?php echo U('user/edit');?>">个人资料</a></li>
                                <li><a href="<?php echo U('setting/lockscreen');?>">一键锁屏</a></li>
								<li class="divider"></li>
								<li><a class="logout" href="javascript:void(0);"><?php echo L('EXIT');?></a></li>
							</ul>
						</li>
		            </ul>
				</nav>
    		</div>
			<div class="modal inmodal" id="Profile" tabindex="-1" role="dialog" aria-hidden="true">
				<div class="modal-dialog modal-lg">
					<div class="modal-content animated bounceInRight">

					</div>
				</div>
			</div>
			<!-- 模态框 -->
			<div class="modal inmodal fade" id="Modal_login" tabindex="-1"  style=" overflow:auto; border:1px solid #000000;" role="dialog" >
			    <div class="modal-dialog modal-md" style="width:700px;">
			        <div class="modal-content" id="login_modal">

			        </div>
			    </div>
			</div>


<script type="text/javascript">

$(document).on('click','#authorize',function(){
	$('#Modal_anthorize').modal('show');
});

$('[data-toggle="tooltip"]').tooltip({html:true});
/*时间插件*/
$('.date').datepicker({
  format: "yyyy-mm-dd",
  todayBtn: "linked",
  keyboardNavigation: false,
  forceParse: false,
  calendarWeeks: true,
  autoclose: true
});
$("#dialog-message-send").dialog({
    autoOpen: false,
    modal: true,
	width: 800,
	maxHeight: 600,
	position: ["center",100]
});

$(function(){
	/*站内信*/
	message_tips();
	login_tips();
	$("#header_send_message").click(function(){
		$('#dialog-message-send').dialog('open');
		$('#dialog-message-send').load('<?php echo U("message/send");?>');
	});
	/*让复选框默认取消选择*/
	//$(':checkbox').prop('checked', false);

	/*记录菜单隐藏状态*/
	$(".navbar-minimalize").click(function(){
		var arr,reg = new RegExp("(^| )mini-navbar=([^;]*)(;|$)");
		arr = document.cookie.match(reg);
		if(arr){
			var nav_status = unescape(arr[2]) == 1 ? 0:1;
		}else{
			var nav_status = 1;
		}
		document.cookie = "mini-navbar="+nav_status;
	});
});

function salert(){
	var txt = "<?php if(is_array($alert["content"])): foreach($alert["content"] as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): echo ($vv); endforeach; endif; endforeach; endif; ?>";
	if(txt != ''){
		swal(txt, "", "<?php echo ($alert['type'][0]); ?>")
	}
}

/*退出提示*/
$('.logout').click(function () {
	swal({
		title: "确定退出登录?",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "确定",
		cancelButtonText: "取消",
		closeOnConfirm: false
        },
		function (isConfirm) {
			if (isConfirm) {
				window.location="<?php echo U('user/logout');?>";
			}
		}
	);
});

/*提交失败返回前一页*/
var href = "<?php echo ($error); ?>";
if(href != '' && href != null){
	swal({
		title: "添加失败!",type: "error",
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "返回",
		closeOnConfirm: false
	},
	function(){
		location.href = 'javascript:history.back(-1)';
	});
}
var login_show = 0;
function login_tips(){
	$.get("<?php echo U('message/logintips');?>", function(data){
		var is_login = data.data['is_login'];
        if(is_login == 0 && login_show != 1){
        	 $.ajax({
		        type: "GET",
		        url: "<?php echo U('user/loginajax');?>",
		        async: true,
		        success: function(data) {
		            if(data.status != 2){
		                $("#login_modal").parent().removeClass("modal-lg").addClass("modal-md");
			            $url = "<?php echo U('user/loginajax');?>";
			            $('#Modal_login').modal('show');
			            login_show = 1;
			            $('#login_modal').load($url);
		            }else{
		            	 login_show = 1;
		            }
		        }
		    });
        }
	},'json')
	setTimeout('login_tips()',20000);
}

/*轮询*/
var mark_count = 1;//标记第一次弹出
/*初始默认值*/
var msg_num = '0,0';

function message_tips(){
	$.get("<?php echo U('message/tips');?>", function(data){
        var is_lock = data.data['is_lock'];
        if(is_lock == 1){
            location.href = "<?php echo U('setting/lockscreen');?>";
        }
		//卡片提醒显示与隐藏
		var message_html = '';
		var new_num = data.data['message']+','+data.data['contract_count'];

		//待办事项
		$('#header_check_contract_num').html(data.data['check_contract_num']);
		$('#header_dqcontact_num').html(data.data['contract_num']);
		$('#header_examine_num').html(data.data['examine_num']);
		$('#header_receivables_num').html(data.data['receivingorder_num']);
		$('#receivables_num').html(data.data['receivables_num']);
		$('#header_follow_customer_num').html(data.data['today_customer']);
		if (data.data['todo_num']) {
			$('#todo_num').html(data.data['todo_num']);
		} else {
			$('#todo_num').html('');
		}

		//导航提醒实时写入数值
		if(data.data['message'] != 0 && data.data['message'] != ''){
			$('#message_group').show();
			//桌面提醒
			if(data.data['data_list']){
				$(data.data['data_list']).each(function(k, v){
					if (data.data['data_list_count'] < 3) {
						animateMessage(v.role_info.thumb_path, v.role_info.full_name, v.content_msubstr);
					}
				    aaa(v.role_info.thumb_path, v.role_info.full_name, v.content, v.url_link);
				});
			}
			$('#message_num').html(data.data['message']);
			$('#message_list').html('');
			if(data.data['message_num'] != 0 && data.data['message_num'] != ''){
				message_html += '<a href="<?php echo U('message/index');?>" style="width:100%;color:#676a6c;padding:5px !important;border-bottom:1px dashed #ddd;float:left;margin-bottom:5px;">\
		                    <div style="padding:0 10px;">\
		                        <img src="__PUBLIC__/img/Messenger.png" title="小助手"> 您有<strong>'+data.data['message_num']+'</strong>条消息待查看\
		                        <span class="pull-right text-muted small" style="line-height:30px;">'+data.data['message_time']+'前</span>\
		                    </div>\
		                </a>';
			}

			if(data.data['message_announcement_count'] != 0 && data.data['message_announcement_count'] != ''){
				message_html += '<a href="<?php echo U('message/index','by=announcement');?>" style="width:100%;color:#676a6c;padding:5px !important;border-bottom:1px dashed #ddd;float:left;margin-bottom:5px;">\
		                    <div style="padding:0 10px;">\
		                        <img src="__PUBLIC__/img/System.png" title="系统公告"> 您有<strong>'+data.data['message_announcement_count']+'</strong>条公告信息待查看\
		                        <span class="pull-right text-muted small" style="line-height:30px;">'+data.data['announcement_time']+'前</span>\
		                    </div>\
		                </a>';
			}
			if(data.data['role_message_list']){
				$(data.data['role_message_list']).each(function(k, v){
				    message_html += '<a href="<?php echo U('message/message_view','to_role_id=');?>'+v.role_id+'" title="点击回复" style="width:100%;color:#676a6c;padding:5px !important;border-bottom:1px dashed #ddd;float:left;margin-bottom:5px;" >\
	                            <div class="dropdown-messages-box" style="padding:0 10px;">\
	                                <div class="pull-left">\
	                                    <img alt="image" class="img-circle" src="'+v.thumb_path+'">&nbsp;\
	                                </div>\
	                                <div style="overflow:hidden;">\
	                                    <span>'+v.full_name+'</span><span class="label label-warning pull-right" style="margin-right: 3px;border-radius:50% !important;">'+v.unread_num+'</span><br>\
	                                    <span style="word-wrap: break-word;word-break: normal;float:left;margin-top:10px;width:100%;">'+v.content+'</span><br>\
	                                    <small class="text-muted pull-right" style="margin-top: 5px;">'+v.send_time+'</small>\
	                                </div>\
	                            </div>\
	                        </a>';
				});
			}
			$('#message_list').append(message_html);
		}else{
			$('#message_group').hide();
		}
		//日程提醒
		var event_temp = '';
		if(data.data['event_list'] != 0 && data.data['event_list'] != ''){
			$('#event_group').show();
			$('#event_list').html('');
			$('#event_num').html(data.data['event_num']);
			$.each(data.data['event_list'], function(k, v){
				event_temp += '<a href="<?php echo U('event/index');?>" title="点击查看" style="padding:5px !important;border-bottom:1px dashed #ddd;float:left;margin-bottom:5px;width:100%;">\
	                                <div style="overflow:hidden;padding:0 10px;">\
	                                	<span class="pull-left" style="color:'+v.color+';line-height:26px;"><i class="fa fa-circle"></i>&nbsp;&nbsp;'+v.subject+'</span><br>\
	                                    <small class="text-muted pull-right" style="margin-top: 5px;">'+v.between_date+'</small>\
	                                </div>\
	                            </a>';
			});
			$('#event_list').append(event_temp);
		}else{
			$('#event_group').hide();
		}
	},'json')
	setTimeout('message_tips()',30000);
}

/*head 特效*/
$('.nav-head .navbar-left li').mouseover(function(){
	$(this).find('a span').css("color", '#ffb173');
});

$('.nav-head .navbar-left li').mouseout(function(){
	$(this).find('a span').css("color", '#e6e9f2');
});
</script>

<script type="text/javascript">
function aaa(icon, name, content, url_link){
    var t = new Date().toLocaleString();
    var options={
        dir: "ltr",
        lang: "utf-8",
        icon: icon,
        body: content
    };
    if(Notification && Notification.permission === "granted"){
        var n = new Notification(name + t, options);
        //5秒后自动关闭
        n.onshow = function(){
            setTimeout(function () {
	            n.close();
	        }, 5000)
        };
        n.onclick = function() {
            // alert("You clicked me!");
            window.location = url_link;
            n.close();
        };
        n.onclose = function(){
            console.log("notification closed!");
        };
        n.onerror = function() {
            console.log("An error accured");
        }
    }
}

function mouseoveriframe(width,zindex,url) {
    $("#if"+zindex).remove();
    var height=$(window).height()-70;
    var iframebox="<iframe id='if"+zindex+"' src='"+url+"'  scrolling='yes' width='"+width+"' height='"+height+"' style='position: fixed;box-shadow: -5px -5px 10px #bbb;border: 2px solid #eee;z-index: "+zindex+";right: -"+width+"px;top: 70px;'></iframe>";
//    var button='<button class="btn btn-xs btn-primary" type="button" style="">关闭</button>';

    $('body').append(iframebox);
//    $("#title-show").append(button);

    setTimeout(function () {
        $("#if"+zindex).animate({right:"10px"})
    },1000)
}







</script>

<script type="text/javascript" src="__PUBLIC__/js/PCASClass.js" ></script>
<style>
    .a{
        display:block;
    }
    .form-p{line-height: 25px;height: 25px;}
    .form-p-owner{line-height: 25px;height: 25px;padding-top: 5px;font-size: 14px;color: #000;}
    .product-a-line{border-left: 3px solid #19aa8d !important;}
    .product-list:hover{background-color: #f3f3f4;}
    .all_business{background-color: #fff;color: #00aaef;}
    .all_business_a{background-color: #00aaef;color: #fff !important;}
    .form-horizontal .control-label{color: #999;}
</style>
<div class="wrapper wrapper-content animated fadeIn" >
    <div class="ibox-content" style="padding-top:9px;padding-bottom:4px;">
        <?php if(!empty($alert['content'])): if(is_array($alert['content'])): foreach($alert['content'] as $k=>$v): if(is_array($v)): foreach($v as $kk=>$vv): ?><input type="hidden" class="alert_tishi" rel="<?php echo ($k); ?>" value="<?php echo ($vv); ?>"><?php endforeach; endif; endforeach; endif; ?>
<input type="hidden" id="alert_defaultinfo_name" value="<?php echo C('defaultinfo.name');?>" />
<script>
    $(document).ready(function() {
        var tishi = $('.alert_tishi').val();
        var is_success = $('.alert_tishi').attr('rel');
        var alert_defaultinfo_name = $('#alert_defaultinfo_name').val();
        setTimeout(function() {
            if(is_success == 'error'){
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 4000,
                    fadeIn: 7000
                };
                toastr.error(alert_defaultinfo_name,tishi);
            }else{
                toastr.options = {
                    closeButton: true,
                    progressBar: true,
                    showMethod: 'slideDown',
                    timeOut: 2000
                };
                toastr.success(alert_defaultinfo_name,tishi);
            }
        }, 800);
    });
</script><?php endif; ?>
        <input type="hidden" name="content" id="content" value="<?php echo ($content); ?>">
        <input type="hidden" id="bid" value="<?php echo ($_GET['bid']); ?>">
        <div class="row border-bottom">
            <div class="col-md-9">
                <div class="all-inline">
                    <span><img src="__PUBLIC__/img/customer_view_icon.png" style="margin-bottom:9px;" alt=""></span>
                    <h2 class="h2-customer-name" style="font-weight:400;color: #000;"><?php echo ($customer['name']); ?></h2>
                    <span style="font-size:20px">
					<?php if(checkPerByAction('customer','customerlock')): ?><a style="margin-left:10px;" href="<?php echo U('customer/customerlock','customer_id='.$customer['customer_id']);?>">
                        <?php if($customer['is_locked']): ?><img  title="<?php echo L('UNLOCK_TITLE');?>" src="__PUBLIC__/img/locking.png"/>
                        <?php else: ?>
                            <img title="<?php echo L('LOCK_TITLE');?>" src="__PUBLIC__/img/unlocking.png"/><?php endif; ?>
                        </a><?php endif; ?>
                    </span>
                    <?php if($share_num != 1 && $content != 'resource'): ?><a href="javascript:void(0);" id="share_list" rel="<?php echo ($customer['customer_id']); ?>" style="color:#ffb173"><i class="fa fa-share"></i>当前共享给<span id="share_count"><?php if($share_counts): echo ($share_counts); else: ?>0<?php endif; ?></span>名成员</a><?php endif; ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="btn-group pull-right">
                    <a href="javascript:void(0)" class="btn btn-outline btn-default pull-right togglebtn">操作&nbsp;&nbsp;<i class="fa fa-angle-down"></i></a>
                    <ul class="togglediv">
                        <li><a href="<?php echo U('customer/edit','id='.$customer['customer_id']);?>" style="margin-right: 15px;"><i class="fa fa-pencil"></i>&nbsp;&nbsp;编辑</a></li>
                        <?php if($content != 'resource'): ?><li><a href="javascript:void(0);" id="transfer_name" rel="<?php echo ($customer['customer_id']); ?>" style="margin-right: 15px;"><i class="fa fa-exchange"></i>&nbsp;&nbsp;转移</a></li><?php endif; ?>
                        <li>
                            <a href="javascript:void(0);" id="remind" rel="<?php echo ($customer['customer_id']); ?>">
                                <i class="fa fa-bell-o"></i>&nbsp;&nbsp;添加提醒
                            </a>
                        </li>
                    </ul>
                </div>
                <div class="pull-right" style="padding-right: 15px;">
                    <?php if($customer['remind_info']): ?><a href="javascript:void(0);" id="remind_view" rel="<?php echo ($customer['customer_id']); ?>" title="查看提醒">
                            <span class="fa fa-bell-o" style="font-size:16px;color:orange;line-height: 32px;"></span>
                        </a><?php endif; ?>
                </div>
            </div>
        </div>
        <div class="row" style="padding-top: 20px;">
            <div class="col-md-9">
                <input type="hidden" id="contacts_id" value="<?php echo ($customer['contacts_id']); ?>" />
                <form role="form" class="form-horizontal view-group" method="post">
                    <div class="form-group">
                        <label class="col-sm-2 control-label">客户名称</label>
                        <div class="col-sm-4">
                            <p class="form-p color-a-edit">
                                <span style="cursor:pointer;"><?php echo ($customer['name']); ?></span><a href="javascript:void(0);" class="fa fa-pencil pencil-size field-edit hide"></a>
                            </p>
                        </div>
                        <div class="col-sm-3 hide">
                            <input type="text" class="form-control" name="name" value="<?php echo ($customer['name']); ?>" id="customer_name">
                        </div>
                        <div class="col-lg-1 hide"></div>
                        <!--<label class="col-sm-2 control-label">客户类型</label>-->
                        <!--<div class="col-sm-4">-->
                            <!--<p class="form-p-owner" style="margin-bottom: 0px;">-->
                                <!--<a class="" href="javascript:void(0)">-->
                                    <!--<?php if($customer['customer_type'] == '0'): ?>-->
                                        <!--<span class="label label-danger">面试快</span>-->
                                        <!--<?php elseif($customer['customer_type'] == '1'): ?>-->
                                        <!--<span class="label label-info">传统项目客户</span>-->
                                        <!--<?php else: ?>-->
                                        <!--<span class="label label-warning">其他类型</span>-->
                                    <!--<?php endif; ?>-->
                                <!--</a>-->
                            <!--</p>-->
                        <!--</div>-->
                        <label class="col-sm-2 control-label">客户状态</label>
                        <div class="col-sm-4">
                            <p class="form-p-owner" style="margin-bottom: 0px;">
                                <a class="" href="javascript:void(0)">
                                    <?php if($vo['customer_status'] == '重点客户'): ?><span class="label label-success editstatus">重点客户</span>
                                        <?php elseif($customer['customer_status'] == '试单客户'): ?>
                                        <span class="label label-danger editstatus">试单客户</span>
                                        <?php elseif($customer['customer_status'] == '准备签约'): ?>
                                        <span class="label editstatus">准备签约</span>
                                        <?php elseif($customer['customer_status'] == '电话沟通'): ?>
                                        <span class="label label-purple editstatus">电话沟通</span>
                                        <?php elseif($customer['customer_status'] == '准备拜访'): ?>
                                        <span class="label css-Interview editstatus">准备拜访</span>
                                        <?php elseif($customer['customer_status'] == '无意向'): ?>
                                        <span class="label label-primary editstatus">无意向</span>
                                        <?php elseif($customer['customer_status'] == '黑名单'): ?>
                                        <span class="label label-black editstatus">黑名单</span>
                                        <?php elseif($customer['customer_status'] == '无状态'): ?>
                                        <span class="label label-warning editstatus">无状态</span>
                                        <?php else: ?>
                                        <span class="label label-primary editstatus">编辑</span><?php endif; ?>
                                </a>
                            </p>
                        </div>

                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">客户等级</label>
                        <div class="col-sm-4">
                            <p class="form-p">
                                <!-- 星星 -->
                                <?php $start = $customer['grade']+1; $end = 6-$customer['grade']; ?>
                                <span style="cursor:pointer;color:#D0D0D0;">
                                    <?php $__FOR_START_1013405809__=1;$__FOR_END_1013405809__=$start;for($i=$__FOR_START_1013405809__;$i < $__FOR_END_1013405809__;$i+=1){ ?><i class="fa fa-star star-orange"></i>&nbsp;<?php } $__FOR_START_1341671400__=1;$__FOR_END_1341671400__=$end;for($i=$__FOR_START_1341671400__;$i < $__FOR_END_1341671400__;$i+=1){ ?><i class="fa fa-star"></i>&nbsp;<?php } ?>
                                </span>
                                <a href="javascript:void(0);" class="fa fa-pencil pencil-size field-edit hide"></a>
                            </p>
                        </div>
                        <div class="col-sm-3 hide">
                            <select name="grade" class="form-control" id="edit-grade">
                                <option value="1">一星</option>
                                <option value="2">二星</option>
                                <option value="3">三星</option>
                                <option value="4">四星</option>
                                <option value="5">五星</option>
                            </select>
                        </div>
                        <div class="col-lg-1 hide"></div>
                        <label class="col-sm-2 control-label">客户联系人</label>
                        <div class="col-sm-4">
                            <p class="form-p1" style="line-height: 25px;height: 25px;">
                                <a href="<?php echo U('contacts/view');?>&id=<?php echo ($customer['contacts_id']); ?>"><?php echo ($customer['contacts_name']); ?></a>
                            </p>
                        </div>


                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 control-label">创建者</label>
                        <div class="col-sm-4">
                            <p class="form-p-owner" style="margin-bottom: 0px;">
                                <a class="role_info" rel="<?php echo ($customer['owner']['role_id']); ?>" href="javascript:void(0)"><?php echo ($customer['owner']['full_name']); ?></a>
                            </p>
                        </div>
                        <label class="col-sm-2 control-label">创建时间</label>
                        <div class="col-sm-4">
                            <p class="form-p-owner" style="margin-bottom: 0px;"><?php echo (date("Y-m-d H:i:s",$customer['create_time'])); ?></p>
                        </div>
                    </div>


                    <div class="form-group">
                        <label class="col-sm-2 control-label">客户维护人</label>
                        <div class="col-sm-4">
                            <p class="form-p-owner" style="margin-bottom: 0px;">
                                <?php if(is_array($customer['customer_owner_name'])): $i = 0; $__LIST__ = $customer['customer_owner_name'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a class="role_info" rel="<?php echo ($vo['id']); ?>" href="javascript:void(0)" style="margin-right: 5px;"><?php echo ($vo['name']); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
                                <!--<a class="role_info" rel="<?php echo ($customer['customer_owner_id']); ?>" href="javascript:void(0)"><?php echo ($customer['customer_owner_name']); ?></a>-->
                            </p>
                        </div>

                    </div>

                    <div id="list-show" style="display:none;" rel="false">
                        <?php if(is_array($field_list)): $k = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($vo['form_type'] == 'datetime' && $customer[$vo['field']] != 0){ $customer[$vo['field']] = date('Y-m-d H:i', $customer[$vo['field']]); }elseif ($vo['form_type'] == 'datetime' && $customer[$vo['field']] == 0) { $customer[$vo['field']] = ' '; } ?>
                            <?php if ($k%2 == 0): ?>
                            <label class="col-lg-2 control-label">
                                <?php echo ($vo['name']); ?>
                            </label>
                            <div class="col-lg-4">
                                <?php if ($vo['field'] != null): ?>
                                <p class="form-p" <?php if($vo['form_type'] == 'textarea'): ?>style="word-break:break-all;height:auto;"<?php endif; ?>>
                                <span style="cursor:pointer;color:#<?php echo ($vo['color']); ?>">
                                    <?php if($vo['form_type'] == 'industrys'): echo ($industry_name[$customer[$vo['field']]]); ?>
                                     <?php elseif($vo['form_type'] == 'district'): ?>
                                    <?php echo ($city_name[$customer[$vo['field']]]); ?>
                                    <?php else: ?>
                                    <?php echo ($customer[$vo['field']]); endif; ?>
                                </span><a href="javascript:void(0);" class="fa fa-pencil pencil-size field-edit hide"></a>
                                </p>
                                <?php endif; ?>
                            </div>
                            <div class="col-lg-3 hide">
                                <?php echo ($vo['html']); ?>
                            </div>
                            <div class="col-lg-1 hide"></div>
                    </div>
                    <?php else: ?>
                    <div class="form-group">
                        <label class="col-lg-2 control-label"><?php echo ($vo['name']); ?></label>
                        <div class="col-lg-4">
                            <p class="form-p" <?php if($vo['form_type'] == 'textarea'): ?>style="word-break:break-all;height:auto;"<?php endif; ?>>
                            <span style="cursor:pointer;color:#<?php echo ($vo['color']); ?>">
                               <?php if($vo['form_type'] == 'industrys'): echo ($industry_name[$customer[$vo['field']]]); ?>
                               <?php elseif($vo['form_type'] == 'district'): ?>
                                    <?php echo ($city_name[$customer[$vo['field']]]); ?>
                                <?php else: ?>
                                    <?php echo ($customer[$vo['field']]); endif; ?>
                            </span>
                            <a href="javascript:void(0);" class="fa fa-pencil pencil-size field-edit hide"></a>
                            </p>
                        </div>
                        <div class="col-lg-3 hide">
                            <?php echo ($vo['html']); ?>
                        </div>
                        <div class="col-lg-1 hide"></div>
                        <?php endif; endforeach; endif; else: echo "" ;endif; ?>
                    </div>
                </form>
            </div>
            <div class="col-md-3">
            </div>
        </div>
        <div class="row">
            <div class="col-md-12 ">
                <div class="text-right">
                    <a href="javascript:void(0);" id="geng-d">更多&nbsp;<span class="fa fa-sort-amount-asc"></span></a>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="wrapper wrapper-content animated fadeIn" style="padding-top:10px;">
    <div class="row" style="margin: 0">
        <div class="pull-left" style="width:26.222%;margin-bottom: 10px;display: none">
            <div class="ibox-title clearfix">
                <div class="detail-title clearfix">
                    <div class="pull-left all-inline">
                        <img src="__PUBLIC__/img/chanpxx.png" alt="">&nbsp;
                        <div class="text-tag" style="top: 2px;color: #676A6C;">
                            <span>相关项目</span>
                        </div>
                    </div>
                    <div class="pull-left text-center" style="margin-left: 20px;">
                        <input type="hidden" id="maodian" />
                        <button class="btn btn-outline btn-success all_business_a" id="customer-relation"  onclick="customer_relation(this);" style="border-radius: 6px;width: 100%;line-height:30px;padding: 0px;width: 80px;" type="button">全部</button>
                    </div>
                    <?php if($share_num != 1): ?><!-- 分享不显示 -->
                        <div class="pull-right detail-right">
							<span rel="<?php echo ($customer['customer_id']); ?>">
								<?php if($content != 'resource'): ?><a data-toggle="tooltip" data-placement="top" class="addproduct" rel="<?php echo ($customer['customer_id']); ?>" title="" data-original-title="添加商机" href="javascript:void(0);">
										<span class="plus-num">+</span>
									</a><?php endif; ?>
							</span>
                        </div><?php endif; ?>
                </div>
            </div>
            <div class="ibox-content" style="padding: 0px 0px 20px;border-top:none;min-height:500px;">
                <?php if(is_array($customer['business'])): $i = 0; $__LIST__ = $customer['business'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="product-list" style="cursor:pointer;" rel="<?php echo ($vo['business_id']); ?>">
                        <!--竖线 -->
                        <div class="row ping-p">
                            <div class="col-md-1">
                                <div class="pull-left color-a">
                                    <a href="javascript:void(0);" rel="<?php echo ($vo['business_id']); ?>" style="font-size: 13px" class="product-a"><i class="fa fa-bookmark"></i></a>
                                </div>
                            </div>
                            <div class="col-md-10">
                                <p><?php echo date('Y-m-d H:i', $vo['create_time']);?></p>
                            </div>
                            <?php if($content != 'resource' && $share_num != 1): ?><div class="col-md-1">
                                    <div class="pull-right social-action dropdown">
                                    <span class="dropdown-toggle" data-toggle="dropdown">
                                        <i class="fa fa-angle-down" style="font-size:20px;cursor:pointer"></i>
                                    </span>
                                        <ul class="dropdown-menu m-t-xs">
                                            <li>
                                                <a href="<?php echo U('business/view','id='.$vo['business_id']);?>" >详情</a>
                                                <a href="<?php echo U('business/edit','id='.$vo['business_id']);?>" >编辑</a>
                                                <a href="javascript:void(0);" class="business_delete" rel="<?php echo ($vo['business_id']); ?>" >删除</a>
                                            </li>
                                        </ul>
                                    </div>
                                </div><?php endif; ?>
                        </div>
                        <div class="row ping-p">
                            <div class="col-md-3">
                                <p>项目名称</p>
                            </div>
                            <div class="col-md-7">
                                <p class="p-333"><?php echo ($vo['name']); ?></p>
                            </div>
                            <div class="col-md-1"></div>
                        </div>
                        <div class="row ping-p edit-show">
                            <!-- <div class="col-md-1">
                                <span class="sq-tag"></span>
                            </div> -->
                            <div class="col-md-3">
                                <p>维护人</p>
                            </div>
                            <div class="col-md-7">
                                <p class="p-333" >维护人姓名</p>
                            </div>
                            <?php if($content != 'resource' && $share_num != 1): ?><div class="col-md-1 color-a-edit"  style="font-size: 15px">
                                    <a style="display:none" rel="<?php echo ($vo['business_id']); ?>" class="editproduct" href="javascript:void(0);"><i class="fa fa-pencil"></i></a>
                                </div><?php endif; ?>
                        </div>
                        <div class="row ping-p">
                            <!-- <div class="col-md-1"></div> -->
                            <div class="col-md-3">
                                <p>项目阶段</p>
                            </div>
                            <div class="col-md-4">
                                <div class="progress progress-mini" style="cursor:pointer;background-color: #DDD;" data-toggle="tooltip" data-placement="top" class="" data-original-title="<?php echo ($vo['status']); ?>">
                                    <div class="progress-bar <?php if($vo['status_id']==99){echo 'progress-bar-danger';}else{if($vo['progress']<=30){echo 'progress-bar-danger';}elseif($vo['progress']<=60){echo 'progress-bar-warning';}elseif($vo['progress']<99){echo '';}else{echo 'progress-bar-success';}} ?>" style="width: <?php echo ($vo['progress']); ?>%;"></div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <p class="p-333" ><?php echo ($vo['status']); ?></p>
                            </div>
                            <?php if($content != 'resource' && $share_num != 1): ?><div class="col-md-1 color-a" style="font-size: 15px">
                                    <?php if($vo['status_id'] == 99): ?><i class="fa fa-times-circle" style="color: #ED5565;"></i>
                                        <?php else: ?>
                                        <a href="javascript:void(0);" data-toggle="tooltip" data-placement="right"  data-original-title="推进进度" rel="<?php echo ($vo['business_id']); ?>" class="advance">
                                            <i class="fa fa-forward"></i>
                                        </a><?php endif; ?>
                                </div><?php endif; ?>
                        </div>
                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
            </div>
        </div>
        <div class="pull-right" style="width:100%;margin-bottom: 10px;">
            <div class="tabs-container ibox-content product-content" style="min-height:608px;">
            </div>
        </div>
    </div>
</div>
<input type="hidden" id="share_num" value="<?php echo ($share_num); ?>">
<div style="display:none" id="dialog-remind_view" title="提醒内容">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-remind" title="提醒">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>
<div style="display:none" id="dialog-editproduct" title="编辑产品">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-advance" title="阶段变更">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div  id="dialog-addproduct" title="添加商机">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div  id="dialog-share-list" title="客户共享成员列表">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-transform" title="客户转移">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<script type="text/javascript" language="javascript" >
    $(function () {
        $(".togglebtn").click(function () {
            $(".togglediv").toggle();
        })
    })

    $(document).click(function(e){
        var con=$(".togglediv,.togglebtn");
        //目标区域之外的地方
        if(!con.is(e.target) && con.has(e.target).length===0){
            $(".togglediv").hide();
        }

    })
    //客户转移
    $("#transfer_name").click(function(){
        var id_array = new Array();
        id_array.push($(this).attr('rel'));
        if(id_array.length == 0){
            alert("<?php echo L('YOU_HAVE_NOT_CHOSEN_ANY_CUSTOMERS');?>");
        }else{
            var customer_ids = id_array.join(",");
            $('#dialog-transform').dialog('open');
            $('#dialog-transform').load("<?php echo U('customer/transfer_edit');?>","customer_id="+customer_ids);
        }
    });
    $("#dialog-transform").dialog({
        autoOpen: false,
        width: 530,
        maxHeight: 600,
        position: ["center",100],
        buttons: {
            "确认转移": function () {
                $('#form_transfer').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });
    //共享列表
    $("#share_list").click(function(){
        var customer_id = $(this).attr('rel');
        $('#dialog-share-list').load('<?php echo U("customer/share_list","customer_id=");?>'+customer_id);
        $('#dialog-share-list').dialog('open');
    });
    $("#dialog-share-list").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 700,
        maxHeight: 500,
        position: ["center",100],
        buttons: {
            "关闭": function () {
                $(this).dialog("close");
            }
        }
    });

    var customer_status = $('#customer_status').val();
    if(customer_status == '已成交客户'){
        $('#customer_status').attr('disabled',true);
    }
    /**
     * 如果是图片时 双击可查看大图
     */
    $('.litebox_file').liteBox({
        revealSpeed: 400,
        background: 'rgba(0,0,0,.8)',
        overlayClose: true,
        escKey: true,
        navKey: true,
        errorMessage: '图片加载失败.'
    });
    $(document).ready(function(){
        /*默认的 星星下拉框*/
        $('#edit-grade').val("<?php echo ($customer['grade']); ?>");

        /* 非ajax 提交后跳转 到指定的产品 */
        var business_id ="<?php echo $_GET['bid']; ?>";
        business_id = Number(business_id);
        if(business_id >= 1){
            $(".product-list[rel="+business_id+"]").trigger('click');
        }else{
            $('#customer-relation').trigger('click');
        }

    });
    /*添加商机*/
    $("#dialog-addbusiness").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 850,
        maxHeight: 500,
        position: ["center",100],
        buttons: {
            "确定": function () {
                if(typeof($('.bus_product').val()) == 'undefined' ||  $('.bus_product').val() == '0'){
                    alert_crm('请至少选择一个产品！');
                }else{
                    $('#addbusiness_form').submit();
                    $(this).dialog("close");
                }
            },
            "取消": function () {
                $(this).dialog("close");
            }
        },
        close: function() {
            $(this).empty();
        }
    });
    /*选择产品*/
    $("#dialog-addproduct").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 850,
        maxHeight: 500,
        position: ["center",100],
        buttons: {
            "确定": function () {
                var is_product = $('.cproduct_id').val();
                if(is_product == 'undefined' || is_product == '0'){
                    alert_crm('请至少选择一个产品！');
                }else{
                    $('#addbusiness_form').submit();
                    $(this).dialog("close");
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
    $(".addproduct").click(function(){
        var customer_id = $(this).attr('rel');
        $('#dialog-addproduct').load('<?php echo U("product/mutildialog_product","customer_id=");?>'+customer_id);
        $('#dialog-addproduct').dialog('open');
    });

    $(".editproduct").click(function(){
        var business_id = $(this).attr('rel');
        $('#dialog-editproduct').dialog('open');
        $('#dialog-editproduct').load('<?php echo U("product/mutildialog_product","business_id=");?>'+business_id);
    });
    /*编辑商机*/
    $("#dialog-editproduct").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 850,
        maxHeight: 400,
        position: ["center",100],
        buttons: {
            "确定": function () {
                var is_product = $('.cproduct_id').val();
                if(is_product == 'undefined' || is_product == '0'){
                    alert_crm('请至少选择一个产品！');
                }else{
                    $('#addbusiness_form').submit();
                    $(this).dialog("close");
                }
            },
            "取消": function () {
                $(this).html('');
                $(this).dialog("close");
            }
        },
        close: function() {
            /*关闭清空数据*/
            $(this).empty();
        }
    });

    /*修改商机的 鼠标放上 效果*/
    $('.edit-show').mouseover(function(){
        $(this).find('a').show();
    });

    $('.edit-show').mouseout(function(){
        $(this).find('a').hide();
    });

    /*营销阶段*/
    $("#dialog-advance").dialog({
        autoOpen: false,
        modal: true,
        minWidth: 320,
        maxHeight: 800,
        position: ["center",100]
    });
    $(".advance").click(function(){
        var business_id = $(this).attr('rel');
        $('#dialog-advance').dialog('open');
        $('#dialog-advance').load('<?php echo U("business/advance","id=");?>'+business_id);
    });

    /* "更多" 的收起 展开*/
    $('#geng-d').click(function(){
        var rel = $('#list-show').attr('rel');
        var html = '';
        if(rel == 'false'){
            $('#list-show').attr('rel', 'true');
            $('#list-show').slideToggle("3000");
            html = '收起&nbsp;<span class="fa fa-sort-amount-desc"></span>';
            $(this).html(html);
        }else{
            $('#list-show').attr('rel', 'false');
            $('#list-show').slideToggle("3000");
            html = '展开&nbsp;<span class="fa fa-sort-amount-asc"></span>';
            $(this).html(html);

        }
    });

    /*添加商机的 提示框*/
    $('[data-toggle="tooltip"]').tooltip({html:true});


    /*客户修改 鼠标放上显示编辑*/
    $('.form-p').mouseover(function(){
        var content = $('#content').val();
        if(content != 'resource'){
            $(this).find('a').removeClass('hide');
        }
    });

    $('.form-p').mouseout(function(){
        $(this).find('a').addClass('hide');
    });
    /*product list 点击效果*/
    $('.product-list').click(function(){
        // var rel = $(this).find('.product-a');
        var rel = $(this);
        var business_id = rel.attr('rel');
        $('#bid').val(business_id);
        var customer_id = "<?php echo ($customer['customer_id']); ?>";
        var tab = window.location.hash;
        product_detail(rel);

        //url追加business_id
        var title = '';
        var url = './index.php?m=customer&a=view&id='+customer_id+'&bid='+business_id+tab;
        var state = {
            title: title,
            url: url
        };
        history.pushState(state, '', './index.php?m=customer&a=view&id='+customer_id+'&bid='+business_id+tab);
    });

    // 商机删除
    $('.business_delete').click(function(){
        var business_id = $(this).attr('rel');
        swal({
                title: "您确定要删除这条商机吗？",
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
                        url: "<?php echo U('business/delete','id=');?>"+business_id,
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

    /*客户修改的逻辑
    * 分为 多个下拉框 时间 单选框 复选框,
    * 需要优化的是:
    * 多个下拉框 单选框 复选框 的提交是根据"form-group 捕捉的, 体验不好
    * ajax提交可以封装成一个函数
    *
    */
    $('.form-p').click(function(){
        var ori_name = null;
        var ori_val = null;
        var name = null;
        var val = null;
        var cus_id = "<?php echo ($customer['customer_id']); ?>";
        var con_id = $('#contacts_id').val();
        var col_4 = $(this).parent();
        var input_div = col_4.next();
        var input = col_4.next().children();
        var sel = input_div.find("[input_type='address']");
        var chec = input_div.find("input[type='checkbox']");
        var radio = input_div.find("input[type='radio']");
        var time = input_div.find("input[input_type='time']");
        var no_click = null
        if(sel.length>2 || chec.length || radio.length || time.length){
            col_4.hide();
            input_div.removeClass('hide');
            input_div.next().removeClass('hide');
            /*复选框*/
            if(chec.length){
                no_click = chec.parent().parent().parent().attr('no_click','1');
                $('.form-group').bind('click', function(){
                    var ret = $(this).attr('no_click');
                    if(ret){

                    }else{
                        var check_val = '';
                        input_div.find("input[type='checkbox']:checked").each(function(){
                            check_val += $(this).val()+',';
                        });
                        ori_name = chec.attr('name');
                        ori_val = col_4.find('span').text();
                        $.post("<?php echo U('edit_ajax');?>", { field: ori_name, val: check_val, customer_id: cus_id, contacts_id: con_id }, function(data){
                            if(data.status == 1){
                                col_4.find('span').text(check_val);
                                col_4.show();
                                input_div.addClass('hide');
                                input_div.next().addClass('hide');
                            }else{
                                input.val(ori_val);
                                col_4.show();
                                input_div.addClass('hide');
                                input_div.next().addClass('hide');
                                alert_crm(data.data);
                            }
                            if(data.data != '' && con_id == ''){
                                $('#contacts_id').val(data.data);
                            }
                            $('.form-group').unbind();
                            chec.parent().parent().parent().removeAttr('no_click');
                        } );
                    }
                });
            } else if(radio.length){
                /*单选框*/
                no_click = radio.parent().parent().parent().attr('no_click','1');
                ori_name = radio.attr('name');
                ori_val = radio.filter(':checked').val();
                $('.form-group').bind('click', function(){
                    var ret = $(this).attr('no_click');
                    if(!ret){
                        val = radio.filter(':checked').val();
                        if(ori_val != val){
                            $.post("<?php echo U('edit_ajax');?>", { field: ori_name, val: val, customer_id: cus_id, contacts_id: con_id }, function(data){
                                if(data.status == 1){
                                    col_4.find('span').text(val);
                                    col_4.show();
                                    input_div.addClass('hide');
                                    input_div.next().addClass('hide');
                                }else{
                                    input.val(ori_val);
                                    col_4.show();
                                    input_div.addClass('hide');
                                    input_div.next().addClass('hide');
                                    alert_crm(data.data);
                                }
                                if(data.data != '' && con_id == ''){
                                    $('#contacts_id').val(data.data);
                                }
                                $('.form-group').unbind();
                                radio.parent().parent().parent().removeAttr('no_click');
                            } );
                        }else{
                            col_4.show();
                            input_div.addClass('hide');
                            input_div.next().addClass('hide');
                        }
                    }
                });
            } else if(time.length){
                /*时间*/
                no_click = time.parent().parent().attr('no_click','1');
                ori_name = time.attr('name');
                ori_val = time.val();
                $('.form-group').bind('click', function(){
                    var ret = $(this).attr('no_click');
                    if(!ret){
                        val = time.val();
                        if(ori_val != val){
                            var new_val = Date.parse(new Date(val));
                            new_val = new_val / 1000;
                            $.post("<?php echo U('edit_ajax');?>", { field: ori_name, val: new_val, customer_id: cus_id, contacts_id: con_id }, function(data){
                                if(data.status == 1){
                                    col_4.find('span').text(val);
                                    col_4.show();
                                    input_div.addClass('hide');
                                    input_div.next().addClass('hide');
                                }else{
                                    input.val(ori_val);
                                    col_4.show();
                                    input_div.addClass('hide');
                                    input_div.next().addClass('hide');
                                    alert_crm($data.data);
                                }
                                $('.form-group').unbind();
                                $('.form-group').removeAttr('no_click');
                            } );
                        }else{
                            col_4.show();
                            input_div.addClass('hide');
                            input_div.next().addClass('hide');
                        }
                    }
                });
            } else if(sel.length>2){
                /*多个单选框*/
                no_click = sel.parent().parent().attr('no_click','1');
                ori_name = sel.attr('name');
                ori_val = col_4.find('span').text();
                $('.form-group').bind('click', function(){
                    var ret = $(this).attr('no_click');
                    if(ret){

                    }else{
                        var sel_val = '';
                        sel.each(function(){
                            sel_val += $(this).val()+',';
                        });
                        $.post("<?php echo U('edit_ajax');?>", { field: ori_name, val: sel_val, customer_id: cus_id, contacts_id: con_id }, function(data){
                            if(data.status == 1){
                                col_4.find('span').text(sel_val);
                                col_4.show();
                                input_div.addClass('hide');
                                input_div.next().addClass('hide');
                            }else{
                                input.val(ori_val);
                                col_4.show();
                                input_div.addClass('hide');
                                input_div.next().addClass('hide');
                                alert_crm(data.data);
                            }
                            if(data.data != '' && con_id == ''){
                                $('#contacts_id').val(data.data);
                            }
                            $('.form-group').unbind();
                            sel.parent().parent().removeAttr('no_click');
                        } );
                    }
                });
            }
            return false;
        }
        ori_val = input.val();
        ori_name = input.attr('name');
        col_4.hide();
        input_div.removeClass('hide');
        input_div.next().removeClass('hide');
        input.focus();
        $(input).focusout(function(){
            /* input框 */
            val = input.val().trim();
            if(ori_val != val){
                $.post("<?php echo U('edit_ajax');?>", { field: ori_name, val: val, customer_id: cus_id, contacts_id: con_id }, function(data){
                    if(data.status == 1){
                        if(ori_name == 'grade'){
                            /*星星*/
                            var star_html = '';
                            for (var i=0;i<val;i++){
                                star_html += '<i class="fa fa-star star-orange"></i>&nbsp;';
                            }
                            for (var i=0;i<5-val;i++){
                                star_html += '<i class="fa fa-star"></i>&nbsp;';
                            }
                            col_4.find('span').html(star_html);
                        }else{
                            input.val(val);
                            col_4.find('span').text(val);
                        }
                        if(ori_name == 'name'){
                            $('.h2-customer-name').text(val);
                        }
                        col_4.show();
                        input_div.addClass('hide');
                        input_div.next().addClass('hide');
                    }else{
                        input.val(ori_val);
                        col_4.show();
                        input_div.addClass('hide');
                        input_div.next().addClass('hide');
                        alert_crm(data.data);
                    }
                    if(data.data != '' && (con_id == '' || con_id == 0)){
                        $('#contacts_id').val(data.data);
                    }
                    $(input).unbind();
                });
            }else{
                col_4.show();
                input_div.addClass('hide');
                input_div.next().addClass('hide');
            }
        });
    });

    /*商机详情 加载的圈圈效果*/
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
    /*单个商机*///obj为要打开的标签页
    var content_id = 0;
    //function product_detail(e,obj){
    //    var business_id = $(e).attr('rel');
    //	var content = $('#content').val();
    //	var share_num = $('#share_num').val();
    //    if (content_id == business_id) {
    //        return false;
    //    }
    //    content_id = business_id;
    //    $('.product-list').removeClass('product-a-line');
    //    $('#customer-relation').removeClass('all_business_a');
    //    $('#customer-relation').addClass('all_business');
    //    $(e).addClass('product-a-line');
    //    $('.product-list').css('background-color','#fff');
    //    $(e).css('background-color','#f3f3f4');
    //    $('.product-content').html(detail_html);
    //    $('.product-content').load("<?php echo U('customer/view_ajax');?>", {id: business_id,type:1,content:content,share_num:share_num}, function(){
    //        $(obj).trigger('click');
    //    });
    //}
    /*所有商机*///obj为要打开的标签页
    function customer_relation(e,obj){
        var maodian = $('#maodian').val();
        var share_num = $('#share_num').val();
        customer_url_jump(maodian);
        $('.product-a').removeClass('product-a-color');
        $('.product-list').removeClass('product-a-line');
        $('.product-list').css('background-color','#fff');
        var customer_id = "<?php echo ($customer['customer_id']); ?>";
        var content = $('#content').val();
        content_id = 0;
        $('.product-content').html(detail_html);
        $('.product-content').load("<?php echo U('customer/view_ajax');?>", {id: customer_id,content:content,share_num:share_num}, function(){
            $(obj).trigger('click');
        });
    }
    function customer_url_jump(maodian){
        var content = "<?php echo ($_GET['content']); ?>"?"<?php echo ($_GET['content']); ?>":1;
        var customer_id = "<?php echo ($customer['customer_id']); ?>";
        var url = "<?php echo U('customer/view','id=');?>"+customer_id+maodian+'&content='+content;
        $('#bid').val('');
        window.history.replaceState({},0,'http://'+window.location.host+url);
    }

    $("#remind").click(function(){
        var customer_id = "<?php echo ($customer['customer_id']); ?>";
        $('#dialog-remind').dialog('open');
        $('#dialog-remind').load("<?php echo U('remind/add','module=customer&module_id=');?>"+customer_id);
    });

    $("#remind_view").click(function(){
        var customer_id = "<?php echo ($customer['customer_id']); ?>";
        $('#dialog-remind_view').dialog('open');
        $('#dialog-remind_view').load("<?php echo U('remind/view','module=customer&module_id=');?>"+customer_id);
    });
    $("#dialog-remind").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 400,
        position: ["center",100],
        buttons: {
            "确定": function () {
                if($('#dialog_content').val() == ''){
                    alert_crm("请填写提醒内容！")
                    $("#dialog_content").focus();
                }else{
                    $('#remind_form').submit();
                    $(this).dialog("close");
                }
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-remind_view").dialog({
        autoOpen: false,
        modal: true,
        width: 500,
        maxHeight: 400,
        position: ["center",100],
        buttons: {
            "删除": function () {
                swal({
                        title: "您确认删除吗？" ,
                        type: "warning",
                        showCancelButton: true,
                        confirmButtonColor: "#DD6B55",
                        confirmButtonText: "确定",
                        closeOnConfirm: false
                    },
                    function(){
                        var dislog_module_id = $('#dislog_module_id').val();
                        var dislog_module = $('#dislog_module').val();
                        $.ajax({
                            type:'post',
                            url: "<?php echo U('remind/delete');?>",
                            data: {module_id: dislog_module_id,module: dislog_module},
                            async: false,
                            success: function (data) {
                                if (data.status == 1) {
                                    swal("操作成功！", "提醒删除成功！", "success");
                                    $("#dialog-remind_view").dialog("close");
                                } else {
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
                    });
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });

    $(function () {
        //切换效果
        $("body").on("click","#itemlists .itembtn",function () {
            var index=$(this).index();
            $(".itembtn").removeClass("active");
            $(this).addClass("active");
            $(".listsitem .itmelist").hide();
            $(".listsitem .itmelist").eq(index).show();

        })
    })

</script>
<?php echo W('Record');?>
	</div>
</div>
<!-- nice-scroll -->
<script src="__PUBLIC__/style/js/plugins/nice-scroll/jquery.nicescroll.min.js" type="text/javascript"></script>
<style>
    .left_chat-message{
        float:left;
        max-width: 90%;
        background: #EFF1F3 !important;
        color:#000 !important;
        margin-left: 34px;
        margin-top: -22px;
        border:1px solid #CECECE;
        border-radius: 3px;
    }
    .right_chat-message{
        float:right;
        max-width: 90%;
        background: #EFF1F3 !important;
        color:#000 !important;
        margin-right: 50px;
        margin-top: -22px;
        border:1px solid #CECECE;
        border-radius: 3px;
    }
    .feedback_content {
        font-size: 13px;
        padding: 5px 15px;
    }
    .feedback_content .left {
        text-align: left;
        clear: both;
    }
    .feedback_content .right {
        text-align: right;
        clear: both;
    }
    .feedback_content > div {
        padding-bottom: 20px;
    }
    .feedback_body{
        padding:1px !important;
    }
</style>
<script>
    $(function(){
        var scroll_width = 5;
        $(".nicescroll").niceScroll({
            cursorcolor: "#ccc",//#CC0071 光标颜色 
            cursoropacitymax: 0.5, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0 
            touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备 
            cursorwidth: scroll_width+"px", //像素光标的宽度 
            cursorborder: "0", //     游标边框css定义 
            cursorborderradius: "5px",//以像素为光标边界半径 
            autohidemode: false, //是否隐藏滚动条 
            zindex:100,
            background:"#F3F3F5",//滚动条背景色
        }); 
    }); 
</script>







<script src="__PUBLIC__/js/animate/index.js"></script>

<script src="__PUBLIC__/js/animate/notification.js"></script>
<!-- layer -->
<script src="__PUBLIC__/js/layer/layer.js"></script>

<script src="__PUBLIC__/js/call/call.js"></script>
<script type='text/javascript'>

$(document).ready(function(){

//    var tid = 0;
//    $( ".projectname" ).hover( function() {
//        tid = setTimeout( function() {
//            //当触发hover就开始自动在1秒后执行相应代码
//            var href=$(this).attr("href");
//            mouseoveriframe("1200","1000",href);
//        }, 1000 );
//    }, function() {
//        clearTimeout( tid );//当在1秒内退出了hover事件就取消计时代码
//    } );

	var timer;
    $(".projectname").on("mouseenter",function () {
        var href=$(this).attr("href1");
        timer=setTimeout(function () {
            mouseoveriframe("1200","1000",href);
        },1000)
	});
    $(".projectname").on("mouseleave",function (){
        clearTimeout(timer);
	})



    /*复选框选择效果*/
    if($('.check_all').size() > 0){
        var icheck_num = 0;
        var all_check_num = 0;
        /*选择所有and取消所有*/
        $(".check_all").change(function(){
            $("input[class='check_list']").prop('checked', $(this).prop("checked"));//选中
            // if($(".check_all").prop("checked")){
            if($(this).is(":checked")){ //jQuery方式判断
                $(".single_btn").hide().children().each(function(){
                    $(this).attr('rel','');
                })
                $('#title-hide').show();
                $('#title-show').hide();
                all_check_num = $("input[class='check_list']:checked").length;
            }else{
                $('#title-hide').hide();
                $('#title-show').show();
                all_check_num = 0;
            }

            if(document.getElementById("oDivL_tab_Test3")){
                if ($(".check_all:checked").size()>0 && icheck_num % 2 == 0) {
                    icheck_num = all_check_num/2;
                    $("#icheck_num").text(all_check_num/2);
                } else {
                    icheck_num = all_check_num;
                    $("#icheck_num").text(all_check_num);
                }
            } else {
                icheck_num = all_check_num;
                // all_check_num = $("input[class='check_list']:checked").length;
                // icheck_num = all_check_num;
                $("#icheck_num").text(icheck_num);
            }
        });
        /*让隐藏标签显示*/
        $('.check_list').click(function(){
            if($(this).prop("checked")){
                icheck_num++;
            }else{
                icheck_num--;
            }
            $("#icheck_num").text(icheck_num);
            //处理单选时才有的操作
            if (icheck_num == 1) {
                $(".single_btn").show().children().each(function(){
                    $(this).attr('rel',$("input.check_list:checked").val());
                    $('#log_customer').attr('rel1',$("input.check_list:checked").attr('rel'));
                    $('#add_calllist').attr('rel',$("input.check_list:checked").val());
                    $('#favorite').attr('rel',$("input.check_list:checked").val());

					$('#log_business').attr('rel',$("input.check_list:checked").attr('rel'));
                    $('.business_btn').children().attr('rel1',$("input.check_list:checked").attr('rel'));

                    $('#examine_type').val($("input.check_list:checked").attr('rel'));
                    if($("input.check_list:checked").attr('rel1') == 1){
                        $('#to_top_span').html('&nbsp;取消置顶');
                        $('#to_check').html('<input type="hidden" id="is_checked" value="2">&nbsp;撤销');
                        $('#user_span').html('<a id="delete" href="javascript:void(0)" onclick="del_user(2)"><i class="fa fa-check"></i>&nbsp;启用账号</a>');
                    }else{
                        $('#to_top_span').html('&nbsp;置顶');
                        var rel_name = $("input.check_list:checked").attr('rel3');
                        $('#to_check').html('<input type="hidden" id="is_checked" rel="'+rel_name+'" value="1">&nbsp;审核');
                    }
                })
            } else {
                var id_array = new Array();
                $(".check_list:checked").each(function() {
                    id_array.push($(this).val());
                });
                var ids=id_array.join(",");
                $('#add_calllist').attr('rel',ids);
                $(".single_btn").hide().children().each(function(){
                    $(this).attr('rel','');
                })
            }
            if(icheck_num <= 0){
                $('#title-hide').hide();
                $('#title-show').show();
            }else{
                $('#title-hide').show();
                $('#title-show').hide();
            }
        });
        /*点插 取消所有选中*/
        $('#back-show').click(function(){
            icheck_num = 0;
            $("#icheck_num").text(icheck_num);
            $('#title-hide').hide();
            $('#title-show').show();
            $(".check_list,.check_all").attr("checked",false);
        });
    }
});

$(function () {

    $("iframe").find("nav").hide();

})

function Se(id) {
    return document.getElementById(id)
}
window.onload = function() {
    var oBox =  Se("box"),
        oBottom = Se("right-sidebar-log"),
        oLine = Se("linetoggle");

    $("body").on("mousedown","#linetoggle",function (e) {
        var Cwide=$("#right-sidebar-log").width();
        var disX = (e || event).clientX;
        document.onmousemove = function(e) {
            var Cx=(e || event).clientX;
            var MoveX = disX - Cx;
            oBottom.style.width = Cwide + MoveX + "px";
            return false
        };
        document.onmouseup = function() {
            document.onmousemove = null;
            document.onmouseup = null;
        };
    });
};

</script>
</body>
</html>