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

<script src="__PUBLIC__/js/chart/highcharts.js"></script>
<script src="__PUBLIC__/js/chart/modules/exporting.js"></script>
<script src="__PUBLIC__/js/chart/modules/funnel.js"></script>
<script src="__PUBLIC__/style/js/plugins/nice-scroll/jquery.nicescroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/style/js/TableFreeze.js"></script>

<!-- echarts -->
<script type="text/javascript" src="__PUBLIC__/js/echarts/echarts.js"></script>
<!-- daterangepicker -->
<link href="__PUBLIC__/css/daterangepicker.css" rel="stylesheet">
<script src="__PUBLIC__/js/daterangepicker/daterangepicker.js"></script>
<!--jQuery导出插件-->
<script type="text/javascript" src="__PUBLIC__/js/table-export/jquery.base64.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/table-export/tableExport.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/table-export/jspdf/libs/sprintf.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/table-export/jspdf/jspdf.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/table-export/jspdf/libs/base64.js"></script>
<!--jQuery导出插件-->
<style>
    body{
        overflow-y: hidden;
    }
</style>

<div class="wrapper wrapper-content">
    <div class="row">
        <div class="col-lg-12">
            <div class="ibox float-e-margins">
                <style>
	table tbody tr{cursor:move;}
	.active {color: #000;}
	.nav.nav-tabs-left li{width:100%;}
	.nav-tabs-left>li.active>a{border-top:white;color: #19aa8d !important;background-color:#fff;}

	/*主要样式*/
	.subNavBox{width:100%;margin-top:0px;margin-bottom:50px;}
	.subNav{
		cursor:pointer;
		font-size:14px;
		color:#375264;
		line-height:40px;
		padding-left:10px;
		/*background:url(__PUBLIC__/img/jiantou1.jpg) no-repeat;background-position:95% 50%*/
	}
	.subNav_text{
		cursor:pointer;
		font-size:14px;
		color:#375264;
		line-height:40px;
		padding-left:10px;
		/*background:url(__PUBLIC__/img/jiantou1.jpg) no-repeat;background-position:95% 50%*/
	}
	.subNavBox ul{margin-bottom:18px;}
	.subNav:hover{color:#375264;}
	.currentDd{color:#375264}
	/*.currentDt{background-image:url(__PUBLIC__/img/jiantou.jpg);}*/
	.navContent{list-style: none;display: none;padding-left: 13px;}
	.navContent li a{display:block;width:100%;height:32px;text-align:left;font-size:14px;line-height:32px;color:#75899D}
	.li_text{padding-left:10px;width: 100%;float:left;line-height:32px;margin-bottom:3px;}
	.li_text:hover{background-color:#f5f5f5;}
	.li_text_active{float:left;padding-left:10px;background-color:#f5f5f5;width: 100%;border-left:2px solid #03a9f4;line-height:32px;margin-bottom:3px;color:#03a9f4;font-weight:500}
</style>
<script type="text/javascript">
$(function(){
	$("#left_height").height(window.innerHeight-$("#left_height").offset().top-32);
	$("#right_height").height(window.innerHeight-$("#right_height").offset().top-50);
	$(window).resize(function(){
		$("#left_height").height(window.innerHeight-$("#left_height").offset().top-32);
		$("#right_height").height(window.innerHeight-$("#right_height").offset().top-50);
	});
})
</script>
<div class="col-sm-2 ibox-title" id="left_height" style="background-color:#fff;" >
	<div class="full-height-scroll">
		<?php
 $module_name = strtolower(MODULE_NAME); $action_name = strtolower(ACTION_NAME); $content_id = intval($_GET['content_id']); ?>
		<div class="subNavBox">
            <div rel="leads" class="subNav currentDd currentDt">业绩数据分析</div>
            <ul class="navContent" rel="leads" style="display:block;margin-bottom:0px;">
                <li >
                    <a class="color1 <?php if($module_name == "leads" && $action_name == "analytics"): ?>li_text_active<?php endif; ?>" href="<?php echo U('leads/analytics');?>"><span class="li_text">员工业绩分析</span></a>
                </li>

            </ul>
            <div rel="leads" class="subNav currentDd currentDt">项目数据分析</div>
            <ul class="navContent" rel="leads" style="display:block;margin-bottom:0px;">
                <li >
                    <a class="color1 <?php if($action_name == "business"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/business');?>"><span class="li_text">员工项目进展分析</span></a>
                </li>
                <!--<li >-->
                    <!--<a class="color1 <?php if($module_name == "customer" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('customer/analytics','content_id=1');?>"><span class="li_text">员工项目进展分析</span></a>-->
                <!--</li>-->
            </ul>
            <div rel="business" class="subNav currentDd currentDt">自定义数据分析</div>
            <ul class="navContent" style="display:block">
                <li >
                    <a class="<?php if($action_name == "achievement"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/achievement');?>"><span class="li_text">业绩自定义分析</span></a>

                </li>
                <li >
                    <!--<a class="<?php if($module_name == "business" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=3');?>"><span class="li_text">客户自定义分析</span></a>-->
                    <a class="<?php if($action_name == "customer"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/customer');?>"><span class="li_text">客户自定义分析</span></a>
                </li>
                <li >
                    <a class="<?php if($action_name == "project"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/project');?>"><span class="li_text">项目自定义分析</span></a>
                    <!--<a class="<?php if($module_name == "business" && $content_id == 8): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=8');?>"><span class="li_text">项目自定义分析</span></a>-->
                </li>
                <li >
                    <a class="<?php if($action_name == "ispresent"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/ispresent');?>"><span class="li_text">到场数自定义分析</span></a>
                </li>
                <li >
                    <a class="<?php if($action_name == "resume"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/resume');?>"><span class="li_text">简历自定义分析</span></a>
                    <!--<a class="<?php if($module_name == "business" && $content_id == 10): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=10');?>"><span class="li_text">简历自定义分析</span></a>-->
                </li>
            </ul>
            <div rel="business" class="subNav currentDd currentDt">趋势数据分析</div>
            <ul class="navContent" style="display:block">
                <!--<li >-->
                    <!--<a class="<?php if($module_name == "business" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=1');?>"><span class="li_text">项目漏斗分析</span></a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a class="<?php if($module_name == "business" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=2');?>"><span class="li_text">项目漏斗分析</span></a>-->
                <!--</li>-->
                <li >
                    <a class="<?php if($action_name == "projecttrend"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/projecttrend');?>"><span class="li_text">趋势分析（日）</span></a>
                    <!--<a class="<?php if($module_name == "business" && $content_id == 4): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=4');?>"><span class="li_text">趋势分析（日）</span></a>-->
                </li>
                <li >
                    <a class="<?php if($action_name == "weektrend"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/weektrend');?>"><span class="li_text">趋势分析（周）</span></a>
                    <!--<a class="<?php if($module_name == "business" && $content_id == 5): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=5');?>"><span class="li_text">趋势分析（周）</span></a>-->
                </li>
                <li >
                    <a class="<?php if($action_name == "monthtrend"): ?>li_text_active<?php endif; ?>" href="<?php echo U('dataAnalysis/monthtrend');?>"><span class="li_text">趋势分析（月）</span></a>
                    <!--<a class="<?php if($module_name == "business" && $content_id == 6): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=6');?>"><span class="li_text">趋势分析（月）</span></a>-->
                </li>
            </ul>
            <div rel="business" class="subNav currentDd currentDt">客户结果分析</div>
            <ul class="navContent" style="display:block">
                <li >
                    <a class="<?php if($module_name == "contract" && $content_id == 1): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=1');?>"><span class="li_text">合同金额统计</span></a>
                </li>
                <li >
                    <a class="<?php if($module_name == "contract" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=2');?>"><span class="li_text">回款金额统计</span></a>
                </li>
                <li >
                    <a class="<?php if($module_name == "contract" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=3');?>"><span class="li_text">合同金额TOP10</span></a>
                </li>
            </ul>
            <div rel="business" class="subNav currentDd currentDt">业绩管理分析</div>
            <ul class="navContent" style="display:block">
                <li >
                    <a class="color1 <?php if($module_name == "contract" && $action_name == "collection"): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/collection');?>"><span class="li_text">业绩目标</span></a>
                </li>
            </ul>
            <!--<div rel="log" class="subNav currentDd currentDt">员工办公统计</div>-->
            <!--<ul class="navContent" style="display:block">-->
                <!--<li >-->
                    <!--<a class="<?php if($module_name == "examine" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('examine/analytics','content_id=1');?>"><span class="li_text">审批统计</span></a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a <?php if($module_name == 'kaoqin' && $action_name == 'record' ): ?>class="li_text_active"<?php endif; ?> href="<?php echo U('kaoqin/record');?>"><span class="li_text">考勤记录</span></a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a <?php if($module_name == 'kaoqin' && $action_name == 'analytics' ): ?>class="li_text_active"<?php endif; ?> href="<?php echo U('kaoqin/analytics');?>"><span class="li_text">考勤统计</span></a>-->
                <!--</li>-->
            <!--</ul>-->
            <!--<div rel="log" class="subNav currentDd currentDt">员工日志分析</div>-->
            <!--<ul class="navContent" style="display:block">-->
                <!--<li >-->
                    <!--<a class="<?php if($module_name == "log" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('log/analytics','content_id=1');?>"><span class="li_text">工作日志</span></a>-->
                <!--</li>-->
                <!--<li >-->
                    <!--<a class="<?php if($module_name == "log" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('log/analytics','content_id=2');?>"><span class="li_text">沟通日志</span></a>-->
                <!--</li>-->
                <!--<?php if(C('CALL_CENTER') == 1): ?>-->
                <!--<li>-->
                    <!--<a class="<?php if($module_name == "call" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('call/record','content_id=3');?>"><span class="li_text">电话记录</span></a>-->
                <!--</li>-->
                <!--<?php endif; ?>-->
            <!--</ul>-->


			<!--<div rel="leads" class="subNav currentDd currentDt">线索数据分析</div>-->
			<!--<ul class="navContent" rel="leads" style="display:block;margin-bottom:0px;">-->
				<!--<li >-->
					<!--<a class="color1 <?php if($module_name == "leads"): ?>li_text_active<?php endif; ?>" href="<?php echo U('leads/analytics');?>"><span class="li_text">员工线索分析</span></a>-->
				<!--</li>-->
			<!--</ul>-->
            <!--<div rel="customer" class="subNav currentDd currentDt">客户数据分析</div>
            <ul class="navContent" style="display:block">
                <li >
                    <a class="color1 <?php if($module_name == "customer" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('customer/analytics','content_id=1');?>"><span class="li_text">员工客户分析</span></a>
                </li>
                <li >
                    <a class="<?php if($module_name == "customer" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('customer/analytics','content_id=2');?>"><span class="li_text">客户自定义分析</span></a>
                </li>
                 <li >
                    <a class="<?php if($module_name == "customer" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('customer/city_analytics','content_id=3');?>"><span class="li_text">客户地区统计分析</span></a>
                </li>
			</ul>-->
			<!--<div rel="business" class="subNav currentDd currentDt">客户过程分析</div>
			<ul class="navContent" style="display:block">
				<li >
					<a class="<?php if($module_name == "business" && ($content_id == 1 || $content_id == "")): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=1');?>"><span class="li_text">员工商机分析</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "business" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=2');?>"><span class="li_text">销售漏斗分析</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "business" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=3');?>"><span class="li_text">商机金额分布统计</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "business" && $content_id == 4): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=4');?>"><span class="li_text">商机趋势分析（日）</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "business" && $content_id == 5): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=5');?>"><span class="li_text">商机趋势分析（周）</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "business" && $content_id == 6): ?>li_text_active<?php endif; ?>" href="<?php echo U('business/analytics','content_id=6');?>"><span class="li_text">商机趋势分析（月）</span></a>
				</li>
			</ul>
			<div rel="finance" class="subNav currentDd currentDt" style="display: none;">客户结果分析</div>
			<ul class="navContent" style="display:none">
				<li >
					<a class="<?php if($module_name == "contract" && $content_id == 1): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=1');?>"><span class="li_text">合同金额统计</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "contract" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=2');?>"><span class="li_text">回款金额统计</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "contract" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/analytics','content_id=3');?>"><span class="li_text">合同金额TOP10</span></a>
				</li>
			</ul>-->
			<!--<div rel="contract" class="subNav currentDd currentDt">业绩管理分析</div>-->
			<!--<ul class="navContent" rel="contract" style="display:block;margin-bottom:0px;">-->
				<!--<li >-->
					<!--<a class="color1 <?php if($module_name == "contract" && $action_name == "collection"): ?>li_text_active<?php endif; ?>" href="<?php echo U('contract/collection');?>"><span class="li_text">业绩目标</span></a>-->
				<!--</li>-->
			<!--</ul>-->
			<!-- <div rel="product" class="subNav currentDd currentDt">产品销量分析</div>
			<ul class="navContent" style="display:block">
				<li >
					<a class="<?php if($module_name == "product" && $content_id == 1): ?>li_text_active<?php endif; ?>" href="<?php echo U('product/analytics','content_id=1');?>"><span class="li_text">产品统计</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "product" && $content_id == 2): ?>li_text_active<?php endif; ?>" href="<?php echo U('product/analytics','content_id=2');?>"><span class="li_text">销量TOP20</span></a>
				</li>
				<li >
					<a class="<?php if($module_name == "product" && $content_id == 3): ?>li_text_active<?php endif; ?>" href="<?php echo U('product/analytics','content_id=3');?>"><span class="li_text">销售额统计</span></a>
				</li>
			</ul> -->


		</div>
	</div>
</div>
<div style="display: none;" id="dialog-advance_search" title="高级筛选">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
	//高级筛选
	$("#dialog-advance_search").dialog({
		autoOpen: false,
		modal: true,
		width: 600,
		maxHeight: 450,
		position: ["center",100],
		buttons: {
			"确定": function () {
				var select_role = 0;
				var arys = new Array();
				var type_id = $('#type_id').val();
				var content_id = $('#content_id').val();
				$('#types_id').val(type_id);
				$('#contents_id').val(content_id);
				$('#advance_search_form').submit();
				return true;
			},
			"取消": function () {
				$(this).dialog("close");
			}
		}
	});

	function changeRole(){
		department_id = $("#department option:selected").val();
		$.ajax({
			type:'get',
			url:'index.php?m=user&a=getrolebydepartment&department_id='+department_id,
			async:true,
			success:function(data){
				options = '<option value="all"><?php echo L('ALL');?></option>';
				if(data.data != null){
					$.each(data.data, function(k, v){
						options += '<option value="'+v.role_id+'">'+v.role_name+"-"+v.user_name+'</option>';
					});
				}
				$("#role").html(options);
				<?php if($_GET['role']): ?>$("#role option[value='<?php echo ($_GET['role']); ?>']").prop("selected", true);<?php endif; ?>
			},
			dataType:'json'});
	}
	// <?php if($_GET['department'] and $_GET['department'] != 'all'): ?>// 	$("#department option[value='<?php echo ($_GET['department']); ?>']").prop("selected", true);
	// 	changeRole();
	//<?php endif; ?>
	// <?php if($_GET['department'] == 'all'): ?>// 	$("#role option[value='<?php echo ($_GET['role']); ?>']").prop("selected", true);
	//<?php endif; ?>
</script>

                <input type="hidden" id="content_id" value="<?php echo ($content_id); ?>">
                <div class="col-lg-10">
                    <div class="ibox-content" style="padding-bottom:10px;border-bottom: none;">
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
                        <form id="" class="form-group" method="get" style="margin-bottom: 0px;">
                            <input type="hidden" name="m" value="dataAnalysis" />
                            <input type="hidden" name="a" value="projecttrend" />
                            <div class="row" style="height: 45px;">
                                <div class="col-lg-4">
                                    <div class="pull-left" >
										<span style="font-size: 18px;color: #000;">
											趋势分析（日）
										</span>
                                    </div>
                                </div>
                                <div class="col-lg-5">
                                </div>
                                
                            </div>

                            <input type="hidden" name="dbname" id="dbname" value="<?php echo ($dbname); ?>" />
                            <input type="hidden" name="select_type" value="<?php echo ($select_type); ?>" />
                            <input type="hidden" name="content_id" value="<?php echo ($_GET['content_id']); ?>" />
                            <div class="row">
                                <div class="col-lg-12" >
                                    <div class="nav pull-left" style="margin:2px 0 0 15px;width: 165px;margin-right: 20px;">
                                        <div class="input-group">
                                            <select class="form-control input-sm " style="min-width:165px;max-width: 165px;" name="field" >
                                                <option value="achievement" <?php if($field == 'achievement'): ?>selected<?php endif; ?>>业绩</option>
                                                <option value="hkNum" <?php if($field == 'hkNum'): ?>selected<?php endif; ?> >回款个数</option>
                                                <option value="contract" <?php if($field == 'contract'): ?>selected<?php endif; ?>>新增BD数</option>
                                                <option value="customer" <?php if($field == 'customer'): ?>selected<?php endif; ?>>新增客户</option>
                                                <option value="project" <?php if($field == 'project'): ?>selected<?php endif; ?>>新增项目</option>
                                                <option value="resume" <?php if($field == 'resume'): ?>selected<?php endif; ?>>新增简历</option>
                                                <option value="fine_project" <?php if($field == 'fine_project'): ?>selected<?php endif; ?>>推荐企业人数</option>
                                                <option value="interview" <?php if($field == 'interview'): ?>selected<?php endif; ?>>面试人数</option>
                                                <option value="interview_times" <?php if($field == 'interview_times'): ?>selected<?php endif; ?>>面试次数</option>
                                                <option value="ispresent" <?php if($field == 'ispresent'): ?>selected<?php endif; ?>>到场数</option>
                                                <option value="offer" <?php if($field == 'offer'): ?>selected<?php endif; ?>>offer</option>
                                                <option value="offerd" <?php if($field == 'offerd'): ?>selected<?php endif; ?>>offer掉</option>
                                                <option value="enter" <?php if($field == 'enter'): ?>selected<?php endif; ?>>入职数</option>
                                                <option value="safe" <?php if($field == 'safe'): ?>selected<?php endif; ?>>过保数</option>
                                            </select>
                                            <!--<select class="form-control select2" style="min-width:165px;max-width: 165px;height: 0px;">-->
                                            <!--<option class="all" value="项目类型">回款项目类型</option>-->
                                            <!--<option class="all" value="所属行业">所属行业</option>-->
                                            <!--<option class="all" value="所属地区">所属地区</option>-->
                                            <!--</select>-->
                                        </div>
                                    </div>
                                    <div class="nav pull-left" style="margin:2px 0 0 0;">
                                        <div class="input-group">
                                            <input type="text" name="between_date" id="reservation" class="form-control" style="width:300px;"/>
                                            <i class="glyphicon glyphicon-calendar fa fa-calendar" style="position: absolute;bottom: 10px;right: 24px;top: auto;cursor: pointer;"></i>
                                        </div>
                                    </div>
                                    <?php if($_GET['dbname'] == ''): ?><div class="nav pull-left" style="margin:2px 0 0 15px;width: 165px;">
                                            <div class="input-group">
                                                <select class="form-control select2" style="min-width:165px;max-width: 165px;height: 0px;" name="department" id="department" onchange="changeRole()">
                                                    <option class="all" value="all"><?php echo L('ALL');?></option>
                                                    <?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["department_id"]); ?>" <?php if($_GET['department'] == $vo['department_id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="nav pull-left" style="margin:2px 0 0 15px;width: 165px;">
                                            <div class="input-group">
                                                <select class="form-control select2" style="min-width:165px;max-width: 165px;height: 0px;" name="role" id="role" onchange="changeCondition()">
                                                    <option class="all" value="all"><?php echo L('ALL');?></option>
                                                    <?php if(is_array($roleList)): $i = 0; $__LIST__ = $roleList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["role_id"]); ?>" <?php if($_GET['role'] == $vo['role_id']): ?>selected<?php endif; ?>><?php echo ($vo["role_name"]); ?>-<?php echo ($vo["user_name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
                                                </select>
                                            </div>
                                        </div><?php endif; ?>



                                    <div class="pull-left" style="margin-left: 20px;">
                                        <button type="submit" id="analytics_search" class="btn btn-primary">立即搜索</button>
                                    </div>
                                </div>
                            </div>


                        </form>
                    </div>
                    <div class="ibox-content clearfix" id="right_height" style="border-top: none;">
                        <div id="content_4" class="th_content full-height-scroll">
                            <div id="canvas_day" style="max-width:inherit;min-width:100%; height: 450px;">
                                <div style="background-color:#fff;"><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div></div>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="hide" id="dialog-import" title="<?php echo L('IMPORT_DATA');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display: none;" id="dialog-role-info" title="员工信息">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-addduibi" title="添加对比">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<script type="text/javascript">
    //时间插件
    $('#reservation').daterangepicker({
        startDate: '<?php echo ($start_date); ?>',
        endDate: '<?php echo ($end_date); ?>',
        //minDate: '01/01/2012',    //最小时间
        maxDate : moment(), //最大时间
        showDropdowns : true,
        showWeekNumbers : false, //是否显示第几周
        // timePicker : true, //是否显示小时和分钟
        // timePickerIncrement : 60, //时间的增量，单位为分钟
        timePicker12Hour : false, //是否使用12小时制来显示时间
        ranges : {
            //'最近1小时': [moment().subtract('hours',1), moment()],
            '今日': [moment().startOf('day'), moment()],
            '昨日': [moment().subtract('days', 1).startOf('day'), moment().subtract('days', 1).endOf('day')],
            '上月': [moment().subtract('days', '<?php echo ($daterange[0][start_day]); ?>'), moment().subtract('days', '<?php echo ($daterange[0][end_day]); ?>')],
            '本月': [moment().subtract('days', '<?php echo ($daterange[1][start_day]); ?>'), moment()],
            '上季度': [moment().subtract('days', '<?php echo ($daterange[2][start_day]); ?>'), moment().subtract('days', '<?php echo ($daterange[2][end_day]); ?>')],
            '本季度': [moment().subtract('days', '<?php echo ($daterange[3][start_day]); ?>'), moment()],
            '上一年': [moment().subtract('days', '<?php echo ($daterange[4][start_day]); ?>'), moment().subtract('days', '<?php echo ($daterange[4][end_day]); ?>')],
            '本年': [moment().subtract('days', '<?php echo ($daterange[5][start_day]); ?>'), moment()],
            // '最近7日': [moment().subtract('days', 6), moment()],
            // '最近30日': [moment().subtract('days', 29), moment()]
        },
        opens : 'right', //日期选择框的弹出位置
        buttonClasses : [ 'btn btn-default' ],
        applyClass : 'btn-small btn-primary blue',
        cancelClass : 'btn-small',
        separator : ' to ',
        locale : {
            applyLabel : '确定',
            cancelLabel : '取消',
            fromLabel : '起始时间',
            toLabel : '结束时间',
            customRangeLabel : '自定义',
            daysOfWeek : [ '日', '一', '二', '三', '四', '五', '六' ],
            monthNames: ["一月","二月","三月","四月","五月","六月","七月","八月","九月","十月","十一月","十二月"],
            firstDay : 1 ,
            format : 'YYYY-MM-DD', //控件中from和to 显示的日期格式
        },
        "alwaysShowCalendars": true,
        function(start, end, label) {
            //回调
            $('#reservation').val(start.format('YYYY-MM-DD HH:mm:ss') + ' - ' + end.format('YYYY-MM-DD HH:mm:ss'))
            // console.log("New date range selected: ' + start.format('YYYY-MM-DD') + ' to ' + end.format('YYYY-MM-DD') + ' (predefined range: ' + label + ')");
        }
    });

    $("#dialog-addduibi").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 450,
        position: ["center",100],
        buttons: {
            "确定": function () {
                var select_role = 0;
                var arys = new Array();
                var type_id = $('#type_id').val();
                var content_id = $('#content_id').val();
                $('#types_id').val(type_id);
                $('#contents_id').val(content_id);
                $('.duibi_role_id').each(function(k, v){
                    duibi_id = $(this).find("option:selected").val();
                    if(duibi_id){
                        if(jQuery.inArray(duibi_id,arys) >= 0){
                            swal({
                                title: "对比员工不能重复！",
                                type: "error"
                            });
                            return false;
                        }
                        arys[k] = duibi_id;
                        select_role +=1;
                    }
                })
                var select_type = $('#select_type').val();
                if(select_role < 2){
                    swal({
                        title: "对比员工至少2位!",
                        type: "error"
                    });
                    return false;
                }else if(select_type == '' || select_type == 0){
                    swal({
                        title: "对比时间不能为空！",
                        type: "error"
                    });
                    return false;
                }else{
                    $('#remind_form').submit();
                    return true;
                }
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });

    $("#addduibi").click(function(){
        var mokuai_id = $('#type_id').val();
        var content_id = $('#content_id').val();
        var dbname = $('#dbname').val();
        var select_type = $('#select_type').val();
        $('#dialog-addduibi').dialog('open');
        $('#dialog-addduibi').load('<?php echo U("business/addduibi","content_id=");?>'+content_id +'&dbname='+dbname+'&select_type='+select_type);
    });

    $("#dialog-role-info").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 550,
        position: ["center",100]
    });

    $(".role_info").click(function(){
        $role_id = $(this).attr('rel');
        $('#dialog-role-info').dialog('open');
        $('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
    });
    $(function () {
        var canvas_width = $('#an_chart').width();
        var canvas_height = $('#an_chart').height();
        $('#canvas_day').css({width:canvas_width*0.6});

        var chart3;
        // Build the chart3
        $('#canvas_day').highcharts({
            chart3: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false
            },
            title: {
                text: '<?php echo L('TREND_ANALYSIS_BY_THE_DAY');?>'
            },
            xAxis: {
                categories: [<?php echo ($day_count); ?>],
                labels: {
                    rotation:60,
                    y:40,
                    x:15,
                    step:3
                }
            },
            yAxis: {
                title: {
                    text: null
                },
                min: 0,
            },
            legend: {
                align: 'left',
                verticalAlign: 'top',
                y: 0,
                floating: true,
                borderWidth: 0
            },
            tooltip: {
                shared: true,
                crosshairs: true
            },
            plotOptions: {
                series: {
                    cursor: 'pointer',
                    point: {
                        events: {
                            click: function() {
                                hs.htmlExpand(null, {
                                    pageOrigin: {
                                        x: this.pageX,
                                        y: this.pageY
                                    },
                                    headingText: this.series.name,
                                    maincontentText: Highcharts.dateFormat('%A, %b %e, %Y', this.x) +':<br/> '+
                                    this.y +' visits',
                                    width: 200
                                });
                            }
                        }
                    },
                    marker: {
                        lineWidth: 1
                    }
                }
            },
            series: [{
                name: '<?php echo ($trendtitle); ?>',
                data: [<?php echo ($day_create_count); ?>]
            }]
        });
    });


    // 搜索
    $(".select_time_a").click(function(){
        var select_time = $(this).attr('rel');
        var type_id = "<?php echo ($_GET['type_id']); ?>";
        var content_id = "<?php echo ($_GET['content_id']); ?>";
        window.location.href="<?php echo U('business/analytics','&type_id=');?>"+type_id+'&content_id='+content_id+'&select_type='+select_time+'&department=all&role=all';
    });

    $("#user_type").click(function(){
        var user_type = $(this).is(':checked');
        var between_date = $('#reservation').val();
        if(user_type == true){
            window.location.href = "<?php echo U('business/analytics','content_id=1'.'&between_date=');?>"+between_date;
        }else{
            window.location.href = "<?php echo U('business/analytics','&content_id=1'.'&between_date=');?>"+between_date+'&user_type=1';
        }
    });
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