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
						<a data-toggle="tooltip" data-placement="right" data-original-title="职级升降" <?php if(($module_name == 'integral')): ?>class="active"<?php endif; ?> href="<?php echo U('integral/index');?>"><i class="fa fa-leaf"></i><span class="menu_code">职级</span></a>
					</li>
					<li>
						<a data-toggle="tooltip" data-placement="right" data-original-title="培训管理" <?php if(($module_name == 'train' || $module_name == 'teacher')): ?>class="active"<?php endif; ?> href="<?php echo U('train/index');?>"><i class="fa fa-graduation-cap" style="width: 14px;"></i><span class="menu_code">培训</span></a>
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
							<li <?php if($action_name == 'index' &&$_GET['via'] == ''): ?>class="active"<?php endif; ?>><a href="<?php echo U('integral/index');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;专业猎头</a></li>
							<li <?php if($_GET['via'] == internet): ?>class="active"<?php endif; ?> > <a href="<?php echo U('integral/internet','via=internet');?>"> <span class="fa fa-group" style="display:inline"></span>&nbsp;&nbsp;互联网+</a></li>
						<?php elseif($module_name == 'contract' || $module_name == 'order'): ?>
							<li <?php if($module_name == 'contract'): ?>class="active"<?php endif; ?>><a href="<?php echo U('contract/index');?>"><span class="fa fa-list-alt" style="display:inline"></span>&nbsp;&nbsp;合同</a></li>
						<?php
 elseif($module_name == 'train' || $module_name == 'teacher'): ?>
						<li <?php if($module_name == 'finance'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index');?>"><span class="fa fa-credit-card" style="display:inline"></span>&nbsp;&nbsp;课程管理</a></li>
						<li <?php if($module_name == 'finance'): ?>class="active"<?php endif; ?>><a href="<?php echo U('finance/index');?>"><span class="fa fa-credit-card" style="display:inline"></span>&nbsp;&nbsp;考试管理</a></li>
						<li <?php if($module_name == 'teacher'): ?>class="active"<?php endif; ?>><a href="<?php echo U('teacher/index');?>"><span class="fa fa-credit-card" style="display:inline"></span>&nbsp;&nbsp;教师后台</a></li>
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

<link rel="stylesheet" href="__PUBLIC__/css/class.public.css" />
<script src="__PUBLIC__/js/addResume.js"></script>

<style>
    body{overflow-y:hidden; }
    #main_pic_prev{width: 120px;height: 120px;border: 1px dashed #d3d3d6;}
    .add_body_title{
        margin:15px auto 30px auto;
    }
    .form-horizontal .control-label{
        text-align: right;
    }
    .fileinput-button1{
        position: relative;
        overflow: hidden;
    }
    .note-codable{
        display: none;
        width: 100%;
        padding: 10px;
        margin-bottom: 0;
        font-family: Menlo,Monaco,monospace,sans-serif;
        font-size: 14px;
        color: #ccc;
        background-color: #222;
        border: 0;
        -webkit-border-radius: 0;
        -moz-border-radius: 0;
        border-radius: 0;
        box-shadow: none;
        -webkit-box-sizing: border-box;
        -moz-box-sizing: border-box;
        -ms-box-sizing: border-box;
        box-sizing: border-box;
        resize: none;
    }
    .timerinput{
        width:120px; display:inline;height: 32px;background: #ffffff !important;
    }
    .resume_area{
        width: 100%;
        height: 100%;
        resize: none;
        outline: none;
        padding: 20px;
        border: none;
    }

    .btn{
        line-height: 21px;
    }
    .form-control, .single-line{
        left: 0 !important;
    }
    .deletebtn{
        margin-bottom: 10px;
    }
    .btnclosee{
        position: absolute;
        right: 30px;
        top:10px;
    }
    .submitfiles{
        padding-left: 15px;
    }
    .youzhi input{
        content: "";
        display: inline-block;
        width: 17px;
        height: 17px;
        margin-left: -20px;
        border: 1px solid #cccccc;
        border-radius: 3px;
        background-color: #fff;
    }

</style>
<script type="text/javascript" src="__PUBLIC__/js/PCASClass.js" ></script>
<link rel="stylesheet" href="__PUBLIC__/css/jquery.fileupload.css" type="text/css" />
<script>
    $(function(){
        $(".add_body").height(window.innerHeight-$("#add_body").offset().top-$("#tfoot_div").height()-40);
        $(window).resize(function(){
            $(".add_body").height(window.innerHeight-$("#add_body").offset().top-$("#tfoot_div").height()-40);
        })
    })
</script>
<!--职位类别start-->
<div class="sPopupDiv none" id="jobdiv" style="float:left;"></div>
<!--职位类别end-->
<div class="wrapper wrapper-content animated fadeIn col-md-12">
    <form class="form-horizontal" id="form" role="form" action="<?php echo U('product/add');?>" method="post" enctype="multipart/form-data">
        <input type='hidden' name="r" <?php if(isset($r)): ?>value="<?php echo ($r); ?>"<?php endif; ?>/>
        <input type='hidden' name="module" <?php if(isset($r)): ?>value="<?php echo ($module); ?>"<?php endif; ?>/>
        <input type='hidden' name="id" <?php if(isset($r)): ?>value="<?php echo ($model_id); ?>"<?php endif; ?>/>
        <input type='hidden' name="eid" value="<?php echo I('id');?>"/>
        <div class="ibox-content add_body" id="add_body">
            <div class="row full-height-scroll">
                <div class="col-md-12 add_body" >
                    <div class="">
                        <div class="row" >
                            <div class="col-md-8 add_body_title">
                                <div class="all-inline">
                                    <span class="sq-tag"></span>
                                    <div class="text-tag">
                                        <span>添加人才信息</span>
                                    </div>
                                </div>
                            </div>
                            <div  id="resume-search-form" class="col-md-8 add_body_form" style="margin-left:15px;">
                                <input type="hidden" name="url" />
                                <div class="form-group">
                                    <label class="col-md-3 control-label">上传简历：</label>
                                    <div class="col-md-7" style="margin-left: -15px;">
                                        <div class="submitfiles"></div>
                                        <div class="col-md-4">
                                            <select class="form-control required" id="standard"  aria-required="true">
                                                <option value="原始简历">原始简历</option>
                                                <option value="推荐报告">推荐报告</option>
                                                <option value="背景调查">背景调查</option>
                                                <option value="其他资料">其他资料</option>
                                            </select>
                                            <span id="standardTip" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="btn btn-default fileinput-button" style="width: 100%;">
                                                <span>上传简历</span>
                                                <input type="file"  id="uploadresume"/>
                                            </div>
                                        </div>

                                        <div class="col-md-4">
                                            <div class="btn btn-default textdialog" style="width: 100%;">
                                                <span>粘贴简历</span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">加入项目：</label>
                                    <div class="col-md-6">
                                        <input type="hidden" name="business_id" id="business_id" value="<?php echo I('pro_id');?>">
                                        <input class="form-control" placeholder="请点击选择需要加入的项目" type="text" name="business_name" id="business_name" value="<?php echo ($project_name); ?>" readonly="true" style="cursor:pointer;" title="请点击选择">
                                    </div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">姓名：</label>
                                    <div class="col-md-6">
                                        <input class="form-control required" type="text" id="name" name="name" value="<?php echo ($resume["name"]); ?>">
                                        <span id="sketchTip"style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                    <div class="col-md-2 youzhi">
                                        <input  type="checkbox" name="isperfect">
                                        <label for="">优质人选</label>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">性别：</label>
                                    <div class="col-md-6">
                                        <div class="radio radio-info radio-inline" style="margin-left: 20px;margin-right: 20px;">
                                            <input type="radio" name="sex" checked class="sex" value="1">
                                            <label for="sex">男</label>
                                        </div>
                                        <div class="radio radio-info radio-inline">
                                            <input type="radio" name="sex" class="sex" value="2">
                                            <label for="sex">女</label>
                                        </div>
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-3 control-label">所在城市：</label>
                                    <div class="col-md-6">
                                        <input data-selector="dqs" data-option="1" class="text" type="text" placeholder="选择目前所在地区" id="dqs" name="location" data-ui="LocalDataUIB" style="display: none;width:100%;height:40px;"/>
                                    </div>
                                    <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-3 control-label">意向城市：</label>
                                    <div class="col-md-6">
                                        <input data-selector="wantdqs" class="text" type="text" placeholder="选择期望工作城市" id="wantdqs" name="intentCity" data-ui="LocalDataUIB" style="display: none;width: 100%;" />
                                    </div>
                                    <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>
                                <div  class="form-group">
                                    <label class="col-md-3 control-label">行业：</label>
                                    <div class="col-md-6">
                                        <input data-selector="industrys" class="text required" type="text" placeholder="请选择行业" id="industrys" name="industry" data-ui="LocalDataUID" style="display: none;width:100%;height:40px;" aria-required="true" rell="行业"  value="<?php echo ($resume["industry"]); ?>"  />
                                    </div>
                                    <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>

                                </div>

                                <div  class="form-group">
                                    <label class="col-md-3 control-label">职能：</label>
                                    <div class="col-md-6">
                                        <input data-selector="jobtitles" class="text required" type="text" placeholder="请选择职能"  id="jobtitles" name="job_class" data-ui="LocalDataUID" style="display: none;width:100%;height:40px;" aria-required="true" required  value="<?php echo ($resume["job_class"]); ?>"/>
                                    </div>
                                    <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">出生年月：</label>
                                    <div class="col-sm-6">
                                        <input class="form-control text-center timerinput" id="birthday" type="text"  onFocus="WdatePicker({dateFmt:'yyyy-MM', maxDate:'2038-01-01'})" readonly="readonly" name="birthday" style="width: 100%;height: 32px;text-align: left;" >
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;"></span></div>
                                </div>

                                <div class="form-group">
                                    <label class="col-md-3 control-label">手机：</label>
                                    <div class="col-md-6">
                                        <input class="form-control required mobile" type="text" id="telphone" name="telephone" value="<?php echo ($resume["telephone"]); ?>">
                                        <span id="sketchTip" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">邮箱：</label>
                                    <div class="col-md-6">
                                        <input class="form-control email" type="text" id="email" name="email" value="<?php echo ($resume["email"]); ?>">
                                        <span id="" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;"></span></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">学历：</label>
                                    <div class="col-md-6">
                                        <select class="form-control required" id="education" name="edu" aria-required="true">
                                            <option value="专科">专科</option>
                                            <option value="本科">本科</option>
                                            <option value="硕士">硕士</option>
                                            <option value="MBA/EMBA">MBA/EMBA</option>
                                            <option value="博士">博士</option>
                                            <option value="博士后">博士后</option>
                                        </select>
                                        <span style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">开始工作时间：</label>
                                    <div class="col-sm-6">
                                        <input class="form-control text-center timerinput" id="startWorkyear" type="text" onFocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="startWorkyear" style="width: 100%;height: 32px;text-align: left;" value="<?php echo ($resume["startWorkyear"]); ?>">
                                    </div>
                                    <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;"></span></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">目前公司：</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="curCompany" name="curCompany" value="<?php echo ($resume["curCompany"]); ?>">
                                        <span id="" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">目前职位：</label>
                                    <div class="col-md-6">
                                        <input class="form-control" type="text" id="curPosition" name="curPosition" value="<?php echo ($resume["curPosition"]); ?>">
                                        <span id="" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">目前年薪：</label>
                                    <div class="col-md-6" style="position: relative;">
                                        <input class="form-control number" type="text" id="curSalary" name="curSalary" value="<?php echo ($resume["curSalary"]); ?>">
                                        <span id="" style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>
                                        <span class="unit">万</span>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>
                                <div class="form-group">
                                    <label class="col-md-3 control-label">求职状态：</label>
                                    <div class="col-md-6">
                                        <select class="form-control" id="curStatus" name="curStatus">
                                            <option value="">--请选择--</option>
                                            <option value="在职，看看新机会">在职，看看新机会</option>
                                            <option value="在职，急寻新工作">在职，急寻新工作</option>
                                            <option value="在职，暂无跳槽打算">在职，暂无跳槽打算</option>
                                            <option value="离职，正在找工作">离职，正在找工作</option>
                                        </select>
                                    </div>
                                    <div class="col-md-2"></div>
                                </div>

                                <div class="form-group workExp">
                                    <label class="col-md-3 control-label">工作经历：</label>
                                    <div class="col-lg-9">
                                        <div class="panel panel-default" style="padding-top: 20px;margin-right: 20px;margin-top: 10px;">
                                            <!--<?php if(!empty($resume_work)): ?>-->
                                                <!--<?php if(is_array($resume_work)): $i = 0; $__LIST__ = $resume_work;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                                    <!--<input  type="hidden"  name="workExp[id][]" value="<?php echo ($vo["id"]); ?>"/>-->
                                                    <!--<div style="background: none" class="panel-body3">-->
                                                        <!--<div class="form-group">-->
                                                            <!--<label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>-->
                                                            <!--<div class="col-sm-10">-->
                                                                <!--<input class="form-control text-center timerinput required" id="workyearFrom" type="text" placeholder="年-月"   onFocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="workExp[starttime][]" value="<?php echo (date("Y-m",$vo["starttime"])); ?>"><span>-&gt;</span>-->
                                                                <!--<input class="form-control text-center timerinput required" id="workyearEnd" type="text" placeholder="年-月"    onFocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})"  readonly="readonly" name="workExp[endtime][]" value="<?php echo (date("Y-m",$vo["endtime"])); ?>">-->
                                                                <!--<div class="checkbox checkbox-info checkbox-inline" style="vertical-align: baseline;">-->
                                                                    <!--<input type="checkbox">-->
                                                                    <!--<label>目前在职<span class="text-danger">*</span></label>-->
                                                                <!--</div>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group" >-->
                                                            <!--<label class="col-sm-2 control-label">公司名称<span class="text-danger">*</span></label>-->
                                                            <!--<div class="col-sm-9">-->
                                                                <!--<input class="form-control required" type="text" id="companyName" name="workExp[company][]" value="<?php echo ($vo["company"]); ?>"/>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group">-->
                                                            <!--<label class="col-sm-2 control-label">公司介绍<span class="text-danger"></span></label>-->
                                                            <!--<div class="col-sm-9">-->
                                                                <!--<textarea class="msd-elastic form-control" id="companyDes" style="min-height: 66px; overflow: hidden; word-wrap: break-word; resize: none;" name="workExp[companyDes][]"><?php echo ($vo["companyDes"]); ?></textarea>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group">-->
                                                            <!--<label class="col-sm-2 control-label">职位<span class="text-danger">*</span></label>-->
                                                            <!--<div class="col-sm-4">-->
                                                                <!--<input class="form-control required" type="text" id="jobPosition" name="workExp[jobPosition][]" value="<?php echo ($vo["jobPosition"]); ?>">-->
                                                            <!--</div>-->
                                                            <!--<label class="col-sm-1 control-label">部门<span class="text-danger"></span></label>-->
                                                            <!--<div class="col-sm-4">-->
                                                                <!--<input class="form-control" type="text" id="depart" name="workExp[depart][]" value="<?php echo ($vo["depart"]); ?>">-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                        <!--<div class="form-group">-->
                                                            <!--<label class="col-sm-2 control-label">职责描述<span class="text-danger"></span></label>-->
                                                            <!--<div class="col-sm-9">-->
                                                                <!--<textarea class="msd-elastic form-control" id="jobContent" name="workExp[duty][]" style="min-height: 136px; overflow: hidden; word-wrap: break-word; resize: none; height: 136px;"><?php echo ($vo["duty"]); ?></textarea>-->
                                                            <!--</div>-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                            <!--<?php else: ?>-->
                                                <div style="background: none" class="panel-body3">
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control text-center timerinput required" id="workyearFrom" type="text" placeholder="年-月"   onFocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="workExp[starttime][]" style="height: 32px;"><span>-&gt;</span>
                                                            <input class="form-control text-center timerinput required" id="workyearEnd" type="text" placeholder="年-月"    onFocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})"  readonly="readonly" name="workExp[endtime][]" style="height: 32px;">
                                                            <div class="checkbox checkbox-info checkbox-inline" style="vertical-align: baseline;">
                                                                <input type="checkbox">
                                                                <label>目前在职<span class="text-danger">*</span></label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-group" >
                                                        <label class="col-sm-2 control-label">公司名称<span class="text-danger">*</span></label>
                                                        <div class="col-sm-9">
                                                            <input class="form-control required" type="text" id="companyName" name="workExp[company][]"/>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">公司介绍<span class="text-danger"></span></label>
                                                        <div class="col-sm-9">
                                                            <textarea class="msd-elastic form-control" id="companyDes" style="min-height: 66px; overflow: hidden; word-wrap: break-word; resize: none;" name="workExp[companyDes][]"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">职位<span class="text-danger">*</span></label>
                                                        <div class="col-sm-3">
                                                            <input class="form-control required" type="text" id="jobPosition" name="workExp[jobPosition][]">
                                                        </div>
                                                        <label class="col-sm-2 control-label">部门<span class="text-danger"></span></label>
                                                        <div class="col-sm-4">
                                                            <input class="form-control" type="text" id="depart" name="workExp[depart][]">
                                                        </div>
                                                    </div>
                                                    <div class="form-group">
                                                        <label class="col-sm-2 control-label">职责描述<span class="text-danger"></span></label>
                                                        <div class="col-sm-9">
                                                            <textarea class="msd-elastic form-control" id="jobContent" name="workExp[duty][]" style="min-height: 136px; overflow: hidden; word-wrap: break-word; resize: none; height: 136px;"></textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            <!--<?php endif; ?>-->

                                            <div class="panel-footer">
                                                <button class="btn btn-success btn-xs" type="button" onclick="expadd('workExp')">增加新的工作经历</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="form-group eduExp">
                                    <label class="col-md-3 control-label">教育经历：</label>
                                    <div class="col-lg-9">
                                        <!--<?php if(!empty($resume_edu)): ?>-->
                                            <!--<div class="panel panel-default adddefault addedu" onclick="faddEdu();" style="display: none;">-->
                                                <!--<span class="fa fa-plus-circle" style="margin-right: 10px;"></span>添加教育经历-->
                                            <!--</div>-->
                                            <!--<div class="panel panel-default" style="padding-top: 20px;margin-right: 20px;">-->
                                                <!--<?php if(is_array($resume_edu)): $i = 0; $__LIST__ = $resume_edu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                                                    <!--<input  type="hidden"  name="eduExp[id][]" value="<?php echo ($vo["id"]); ?>"/>-->
                                                    <!--<div style="background: none" class="panel-body3">-->
                                                    <!--<div class="form-group">-->
                                                        <!--<label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>-->
                                                        <!--<div class="col-sm-10">-->
                                                            <!--<input class="form-control text-center timerinput required" id="eduyearFrom" type="text" placeholder="年-月" onfocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="eduExp[starttime][]" value="<?php echo (date("Y-m",$vo["starttime"])); ?>"><span>-&gt;</span>-->
                                                            <!--<input class="form-control text-center timerinput required" id="eduyearEnd" type="text" placeholder="年-月" onfocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="eduExp[endtime][]" value="<?php echo (date("Y-m",$vo["endtime"])); ?>">-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                    <!--<div class="form-group">-->
                                                        <!--<label class="col-sm-2 control-label">学校名称<span class="text-danger">*</span></label>-->
                                                        <!--<div class="col-sm-9">-->
                                                            <!--<input class="form-control required" type="text" name="eduExp[schoolName][]" id="schoolName" value="<?php echo ($vo["schoolName"]); ?>">-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                    <!--<div class="form-group">-->
                                                        <!--<label class="col-sm-2 control-label">专业<span class="text-danger">*</span></label>-->
                                                        <!--<div class="col-sm-3">-->
                                                            <!--<input class="form-control required" type="text" id="majorName" name="eduExp[majorName][]" value="<?php echo ($vo["majorName"]); ?>">-->
                                                        <!--</div>-->
                                                        <!--<label class="col-sm-2 control-label">学历<span class="text-danger">*</span></label>-->
                                                        <!--<div class="col-md-3">-->
                                                            <!--<select class="form-control required" id="degree" name="eduExp[degree][]" aria-required="true">-->
                                                                <!--<option value="专科">专科</option>-->
                                                                <!--<option value="本科">本科</option>-->
                                                                <!--<option value="硕士">硕士</option>-->
                                                                <!--<option value="MBA/EMBA">MBA/EMBA</option>-->
                                                                <!--<option value="博士">博士</option>-->
                                                                <!--<option value="博士后">博士后</option>-->
                                                            <!--</select>-->
                                                            <!--<span style="float: left;line-height: 32px;margin-left: 5%;color:red;"></span>-->
                                                        <!--</div>-->
                                                    <!--</div>-->
                                                    <!--<button class="btn col-sm-offset-2 btn-danger btn-xs deletebtn" type="button">删除</button></div>-->
                                                <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                                                <!--<div class="panel-footer">-->
                                                    <!--<button class="btn btn-success btn-xs" type="button" onclick="expadd('eduExp')">增加新的教育经历</button>-->
                                                <!--</div>-->
                                            <!--</div>-->
                                        <!--<?php else: ?>-->
                                            <div class="panel panel-default adddefault addedu" onclick="faddEdu();">
                                                <span class="fa fa-plus-circle" style="margin-right: 10px;"></span>添加教育经历
                                            </div>
                                            <div class="panel panel-default" style="padding-top: 20px;margin-right: 20px;display: none;">
                                                <div class="panel-footer">
                                                    <button class="btn btn-success btn-xs" type="button" onclick="expadd('eduExp')">增加新的教育经历</button>
                                                </div>
                                            </div>
                                        <!--<?php endif; ?>-->
                                    </div>
                                </div>

                                <div class="form-group projectExp">
                                    <label class="col-md-3 control-label">项目经历：</label>
                                    <div class="col-lg-9">
                                        <?php if(!empty($resume_project)): ?><div class="panel panel-default adddefault addpro" style="display: none;" onclick="faddPro();">
                                                <span class="fa fa-plus-circle" style="margin-right: 10px;"></span>添加项目经历
                                            </div>
                                                <div class="panel panel-default" style="padding-top: 20px;margin-right: 20px;">
                                                    <?php if(is_array($resume_project)): $i = 0; $__LIST__ = $resume_project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><input type="hidden" name="projectExp[id][]" value="<?php echo ($vo["id"]); ?>" />
                                                        <div style="background: none" class="panel-body3">
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>
                                                            <div class="col-sm-10">
                                                                <input class="form-control text-center timerinput required" id="projectyearFrom" type="text" placeholder="年-月" onfocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="projectExp[starttime][]" value="<?php echo (date("Y-m",$vo["starttime"])); ?>"><span>-&gt;</span>
                                                                <input class="form-control text-center timerinput required" id="projectyearEnd" type="text" placeholder="年-月" onfocus="WdatePicker({dateFmt:'yyyy-MM',maxDate:'2038-01-01'})" readonly="readonly" name="projectExp[endtime][]" value="<?php echo (date("Y-m",$vo["endtime"])); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">项目名称<span class="text-danger">*</span></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control required" type="text" id="proName" name="projectExp[proName][]" value="<?php echo ($vo["proName"]); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">所在公司<span class="text-danger">*</span></label>
                                                            <div class="col-sm-4">
                                                                <input class="form-control required" type="text" id="proCompany" name="projectExp[proCompany][]" value="<?php echo ($vo["proCompany"]); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">项目职位<span class="text-danger"></span></label>
                                                            <div class="col-sm-9">
                                                                <input class="form-control" type="text" id="proOffice" name="projectExp[proOffice][]" value="<?php echo ($vo["proOffice"]); ?>">
                                                            </div>
                                                        </div>
                                                        <div class="form-group">
                                                            <label class="col-sm-2 control-label">项目描述<span class="text-danger"></span></label>
                                                            <div class="col-sm-9">
                                                                <textarea class="msd-elastic form-control" id="proDes" name="projectExp[proDes][]" style="min-height: 136px; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 136px;"><?php echo ($vo["proDes"]); ?></textarea>
                                                            </div>
                                                        </div>
                                                        <button class="btn col-sm-offset-2 btn-danger btn-xs deletebtn" type="button">删除</button></div><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <div class="panel-footer">
                                                        <button class="btn btn-success btn-xs" type="button" onclick="expadd('projectExp')">增加新的项目经历</button>
                                                    </div>
                                                </div>
                                        <?php else: ?>
                                            <div class="panel panel-default adddefault addpro" onclick="faddPro();">
                                                <span class="fa fa-plus-circle" style="margin-right: 10px;"></span>添加项目经历
                                            </div>
                                            <div class="panel panel-default" style="padding-top: 20px;margin-right: 20px;display: none;">
                                                <div class="panel-footer">
                                                    <button class="btn btn-success btn-xs" type="button" onclick="expadd('projectExp')">增加新的项目经历</button>
                                                </div>
                                            </div><?php endif; ?>

                                    </div>
                                </div>
                                <!--<div class="form-group">-->
                                    <!--<label class="col-md-3 control-label">优劣势分析：</label>-->
                                    <!--<div class="col-md-6" style="position: relative;">-->
                                        <!--<textarea class="msd-elastic form-control" id="evaluate" name="evaluate" style="min-height: 136px; overflow: hidden; word-wrap: break-word; resize: none; height: 136px;"></textarea>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-2"></div>-->
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                    <!--<label class="col-md-3 control-label">技能：</label>-->
                                    <!--<div class="col-md-6" style="position: relative;">-->
                                        <!--<textarea class="msd-elastic form-control" id="skill" name="skill" style="min-height: 36px; overflow: hidden; word-wrap: break-word; resize: none; height: 36px;"></textarea>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-2"></div>-->
                                <!--</div>-->
                                <!--<div class="form-group">-->
                                    <!--<label class="col-md-3 control-label">语言能力：</label>-->
                                    <!--<div class="col-md-6" style="position: relative;">-->
                                        <!--<textarea class="msd-elastic form-control" id="language" name="language" style="min-height: 36px; overflow: hidden; word-wrap: break-word; resize: none; height: 36px;"></textarea>-->
                                    <!--</div>-->
                                    <!--<div class="col-md-2"></div>-->
                                <!--</div>-->


                                <?php if(is_array($field_list['data'])): $key = 0; $__LIST__ = $field_list['data'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><div class="form-group"  style="display: none;">
                                        <label class="col-md-4 control-label"><?php echo ($vo["name"]); ?>：</label>
                                        <?php if($vo['form_type'] == 'textarea'): if($vo['tip_start'] == 1): ?><div class="col-md-6">
                                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                                </div>
                                                <div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                                <?php else: ?>
                                                <div class="col-md-8">
                                                    <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                                                </div><?php endif; ?>
                                            <?php elseif($vo['form_type'] == 'address'): ?>
                                            <?php if($vo['tip_start'] == 1): ?><div class="col-md-7">
                                                    <?php echo ($vo["html"]); ?>
                                                </div>
                                                <div class="col-md-1"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                                <?php else: ?>
                                                <div class="col-md-8">
                                                    <?php echo ($vo["html"]); ?>
                                                </div><?php endif; ?>
                                            <?php else: ?>
                                            <div class="col-md-6">
                                                <?php echo ($vo["html"]); ?>
                                            </div>
                                            <?php if($vo['tip_start'] == 1 || $vo['field'] == 'customer_id'): ?><div class="col-md-2"><span style="color: red;line-height: 32px;margin-left: 10px;">*</span></div>
                                                <?php else: ?>
                                                <div class="col-md-2"></div><?php endif; endif; ?>
                                    </div><?php endforeach; endif; else: echo "" ;endif; ?>
                            </div>
                            <div class="col-md-1 pull-right">
                                <!-- <div style="height: 100%; border-right: 1px dashed gray;">&nbsp;sadf</div> -->
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="tfoot_div" class="clearfix">
            <div class="clearfix" id="tfoot_page">
                <div class="ibox-content" style="border-top: none;">
                    <div class="col-sm-offset-2" style="text-align:center;margin-left:0px;">
                        <button type="submit" id="save_submit" class="btn btn-primary">保存</button>
                        <input class="btn btn-default" type="button" onclick="javascript:history.go(-1)" value="<?php echo L('RETURN');?>"/>
                    </div>
                </div>
            </div>
        </div>
    </form>
</div>

<div class="" style="display:none;" id="dialog-validate" title="<?php echo L('TEST_RESULTS');?>">
    <?php echo L('HAVE_THE_FOLLOWING_PRODUCTS_ARE_SIMILAR_TO_THE_PRODUCT_NAME');?>
    <div id="search_content"></div>
</div>
<div style="display:none;"  id="dialog-resume" title="粘贴简历">
    <div class="form-group">
        <label class="col-sm-1 control-label ng-binding">文件名称</label>
        <div class="col-sm-11">
            <input class="form-control ng-pristine ng-untouched ng-valid" type="text">
        </div>
        <div class="col-sm-12">
            <textarea class="msd-elastic form-control parse-content" style="margin-top: 10px;height: 280px;width: 100%;outline: none;resize: none; overflow: hidden; word-wrap: break-word;"></textarea>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-business" title="选择项目">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<link href="__PUBLIC__/css/selector.css" rel="stylesheet" />
<script type="text/javascript" src="__PUBLIC__/js/uploadPreview.js"></script>
<script src="__PUBLIC__/js/citydata.js"></script>
<script src="__PUBLIC__/js/cityselector_o.js"></script>

<script type="text/javascript">


//    lieselect();
    //初始化上传图片
    $("body").on('click','input[type="file"]', function(){
//	var selector = $(this).attr('id');
//	$("#"+selector).uploadPreview({ Img: selector+"_prev", Width: 120, Height: 120 });
    });
    $(document).ready(function(){

        $(document).on("click",".btnclosee",function (event) {
            var width=$("#right-sidebar-log").width();
            if($("#right-sidebar-log").css('right') == '0px'){
                $("#right-sidebar-log").animate({right:'-'+width+'px'}, 400);
            }
            $("#linetoggle").remove();
        })

        $(".jCitySelector").loadCitySelector();

        $('#save_submit').prop('disabled',false);
        /*form表单验证*/
        $("#form").validate({
            submitHandler:function(form){
                $('#save_submit').off().on("click",function(){
                    var industrys = $("#industrys").val();
                    var jobtitles = $("#jobtitles").val();
                    var dqs = $("#dqs").val();
                    var wantdqs= $("#wantdqs").val();
                    var telephone=$("#telphone").val();
                    var flag=0;
                    $("input[data-selector=industrys]").val(industrys);
                    $("input[data-selector=jobtitles]").val(jobtitles);
                    $("input[data-selector=dqs]").val(dqs);
                    $("input[data-selector=wantdqs]").val(wantdqs);

                    if(industrys){
                        $("span[data-name=industry]").find("input").css("border","1px solid #d8e3ef");
                    }
                    if(jobtitles){
                        $("span[data-name=job_class]").find("input").css("border","1px solid #d8e3ef");
                    }
                    if(dqs){
                        $("span[data-name=location]").find("input").css("border","1px solid #d8e3ef");
                    }
                    if(wantdqs){
                        $("span[data-name=intentCity]").find("input").css("border","1px solid #d8e3ef");
                    }
                    if(industrys=="" || industrys==null){
                        alert_crm("请填写行业信息！");
                        $("span[data-name=industry]").find("input").css("border","1px dotted #cc5965");
                        return;
                    }
                    if(jobtitles=="" || jobtitles==null){
                        alert_crm("请填写职能信息！");
                        $("span[data-name=job_class]").find("input").css("border","1px dotted #cc5965");
                        return;
                    }
                    if(dqs=="" || dqs==null){
                        alert_crm("请填写所在城市信息！");
                        $("span[data-name=location]").find("input").css("border","1px dotted #cc5965");
                        return;
                    }
                    if(wantdqs=="" || wantdqs==null){
                        alert_crm("请选择意向城市！");
                        $("span[data-name=intentCity]").find("input").css("border","1px dotted #cc5965");
                        return;
                    }
                    $.ajax({
                        url:"/index.php?m=product&a=check_tel",
                        type:"post",
                        async:false,
                        data:{
                            telephone:telephone
                        },
                        success:function (data) {
                           if(data){
                               alert_crm("该手机号码已经存在！");
                               flag=0;
                               $("input[name=telephone]").css("border","1px dotted #cc5965");
                               return;
                           }else{
                               $("input[name=telephone]").css("border","1px solid #d8e3ef");
                               flag=1;
                               return;
                           }
                        }
                    });

                    if(dqs && jobtitles && industrys && wantdqs && flag){
                        form.submit();
                    }

                });

            }
        });

        $("#uploadresume").on("change",function () {
            var dataform = new FormData();
            dataform.append("file",$('#uploadresume')[0].files[0]);
//            dataform.append("resume",$('#uploadresume')[0].files[0]);
//            dataform.append("secret_key","LR1snHUsXWzLHehzcZRbk9aENhZ0Nk0000047aff");

            $.ajax({
//                url:"https://api.youyun.com/v1/resume",
                url:"/index.php?m=parse&a=index",
                type:"post",
                data:dataform,
                processData:false,
                contentType:false,
                success:function(data){
                    console.log(data);
                    if(data){
//                        location = "/index.php?m=product&a=edit&id="+data;
                    }
//                    var content=JSON.parse(data);
//                    //内容解析显示在页面中
//                    $("#name").val(content.name);
//                    var sex=content.sex;
//                    if(sex=="女"){
//                        $("input[name=sex]").eq(1).prop("checked","checked");
//                    }
//                    $("#telphone").val(content.telphone);
//                    $("#birthday").val(content.birthday);
////                    $("#dqs").val(content.living);
//                    $("#email").val(content.email);
//                    $("#curSalary").val(content.wage_current);
//                    $("input[name=url]").val(content.url);
//                    $("input[data-selector=dqs]").attr("value",content.living);
//                    $("input[data-selector=industry]").attr("value",content.hy);
//                    $("input[data-selector=job_class]").attr("value",content.job_classid);
////                    $("#dqs").val(content.living);
////                    $("input[data-selector=dqs]").val(content.living);
////                    $("input[data-selector=wantdqs]").val(wantdqs);
//                    $("#wantdqs").val(content.wage_current);
////                    lieselect();
//                    var edu=content.edu;
//                    $("#education option").each(function () {
//                        if(edu==$(this).attr("value")){
//                            $(this).attr("selected",true);
//                        }
//                    })
//
//                    var worksdata = content.workExp;
//                    var edudata = content.eduExps;
//                    var prodata = content.proExp;
//                    if(worksdata){
//                        $(".workExp .panel-body3").remove();
//                        $.each(worksdata,function(i,v){
//                            addWork(v);
//                        });
//                    }
//
//                    if(edudata){
//                        $(".eduExp .addedu").hide();
//                        $.each(edudata,function(i,v){
//                            addEdu(v);
//                        });
//                        $("#degree option").each(function () {
//                            if($(this).parent().attr("data-value")==$(this).val()){
//                                $(this).attr("selected","selected");
//                            }
//                        })
//                    }
//
//                    if(prodata){
//                        $(".projectExp .addpro").hide();
//                        $.each(prodata,function(i,v){
//                            addPro(v);
//                        });
//                    }

                    //出现右边的滑框
//                    if($("#right-sidebar-log").css('right') != '0px'){
//                        $("#right-sidebar-log").animate({right:'0px'}, 600);
//                        $("#right-sidebar-log").css("width","60%");
//                    }
//                    $('#sidebar-container').html("<div class='btn btn-primary btnclosee'>关闭</div><textarea class='resume_area'>"+content.content+"</textarea>");
//                    if($("#linetoggle").length>0){
//                        return
//                    }else{
//                        $('#sidebar-container').before("<div id='linetoggle'><div class='btn_ico'></div></div>");
//                    }
                },
                error:function(e){
                    alert("错误！！");
//                    window.clearInterval(timer);
                }
            });
        })
    });

    $(function () {
        $(document).on('click','.textdialog',function () {
            $('#dialog-resume').dialog('open');
        });

        $('#business_name').click(function () {
            $('#dialog-business').dialog('open');
            $('#dialog-business').load("<?php echo U('business/listdialog');?>");
        });
    })

    $("#dialog-business").dialog({
        autoOpen: false,
        modal: true,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="business"]:checked').val();
                var name = $('input:radio[name="business"]:checked').parent().next().html();
                if(item){
                    $('#business_id').val(item);
                    $('#business_name').val(name);
                }
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    $("#dialog-resume").dialog({
        autoOpen: false,
        modal: true,
        width: 1100,
        maxHeight: 500,
        buttons: {
            "确定": function () {

                $.ajax({
                    type:"post",
                    url:"<?php echo U('parse/parse_action');?>",
                    data:{
                        content:$(".parse-content").val()
                    },
                    success:function(data){
                        var content=JSON.parse(data);
                        //内容解析显示在页面中
                        $("#name").val(content.name);
                        var sex=content.sex;
                        if(sex=="女"){
                            $("input[name=sex]").eq(1).prop("checked","checked");
                        }
                        $("#telphone").val(content.telphone);
                        $("#birthday").val(content.birthday);
                        $("input[name=url]").val(content.url);
//                    $("#dqs").val(content.living);
                        $("#email").val(content.email);
                        $("#curSalary").val(content.wage_current);
//                    $("#dqs").val(content.living);
                    $("input[data-selector=dqs]").attr("value",content.living);
                    $("input[data-selector=industry]").attr("value",content.hy);
                    $("input[data-selector=job_class]").attr("value",content.job_classid);
//                    $("input[data-selector=dqs]").attr("value",content.living);
//                    $("input[data-selector=wantdqs]").val(wantdqs);
//                        $("#wantdqs").val(content.wage_current);

                        var edu=content.edu;
                        $("#education option").each(function () {
                            if(edu==$(this).attr("value")){
                                $(this).attr("selected",true);
                            }
                        })
                        var worksdata = content.workExp;
                        var edudata = content.eduExps;
                        var prodata = content.proExp;
                        if(worksdata){
                            $(".workExp .panel-body3").remove();
                            $.each(worksdata,function(i,v){
                                addWork(v);
                            });
                        }

                        if(edudata){
                            $(".eduExp .addedu").hide();
                            $.each(edudata,function(i,v){
                                addEdu(v);
                            });
                        }

                        if(prodata){
                            $(".projectExp .addpro").hide();
                            $.each(prodata,function(i,v){
                                addPro(v);
                            });
                        }

                        //出现右边的滑框
//                        if($("#right-sidebar-log").css('right') != '0px'){
//                            $("#right-sidebar-log").animate({right:'0px'}, 600);
//                            $("#right-sidebar-log").css("width","60%");
//                        }
//                        $('#sidebar-container').html("<div class='btn btn-primary btnclosee'>关闭</div><textarea class='resume_area'>"+content.content+"</textarea>");
                        if($("#linetoggle").length>0){
                            return
                        }else{
                            $('#sidebar-container').before("<div id='linetoggle'><div class='btn_ico'></div></div>");
                        }
                    }
                })

                //追加产品信息
                $(".se_product_").each(function(){

                });
                $(this).dialog("close");
            },
            "取消": function () {
                $(this).dialog("close");
            }
        },
        position: ["center", 100],
        close:function(){
//            $(this).html('');
        }
    });



    $(function () {
        $("body").on("click",".deletebtn",function () {
            var item=$(this).closest(".panel").find(".panel-body3");
            if(item.length==1){
                item.closest(".col-lg-9").find(".adddefault").show();
                item.parent().remove();
            }
            $(this).closest(".panel-body3").remove();
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




<div id="right-sidebar-log">
    <!--the css for jquery.mCustomScrollbar-->
    <link rel="stylesheet" href="__PUBLIC__/emoji/css/jquery.mCustomScrollbar.min.css"/>
    <!--the css for this plugin-->
    <link rel="stylesheet" href="__PUBLIC__/emoji/css/jquery.emoji.css"/>
    <!--(Optional) the js for jquery.mCustomScrollbar's addon-->
    <script src="__PUBLIC__/emoji/js/jquery.mousewheel-3.0.6.min.js"></script>
    <!--the js for jquery.mCustomScrollbar-->
    <script src="__PUBLIC__/emoji/js/jquery.mCustomScrollbar.min.js"></script>
    <!--the js for this plugin-->
    <script src="__PUBLIC__/emoji/js/jquery.emoji.js"></script>

    <!--<div class="sidebar-container" id="sidebar-container">-->

    <!--</div>-->
</div>

<style>

    .sidebar-container ul.nav-tabs li a{
        background: #fff !important;
        color: #a7b1c2 !important;
        font-weight: 600 !important;
        padding: 14px 20px 14px !important;
        border-right: none !important;
    }
    .sidebar-container nav{
        display: none;
    }
    .sidebar-container #page-wrapper{
        margin-left: 0px;
    }
    #sidebar-container{
        box-shadow: rgb(187, 187, 187) -1px 10px 10px;
        border: 2px solid rgb(238, 238, 238);
    }

    #right-sidebar-log{
        width: 60%;
        right: -60%;
        background-color: #fff;
        position: fixed;
        top: 60px;
        z-index: 1009;
        bottom: 0;
        box-shadow: -5px -5px 1px #ccc;
    }

</style>
<script src="__PUBLIC__/resume_selector/common.21a64352.js"></script>
<script src="__PUBLIC__/resume_selector/resume.search.910ebde0.js "></script>