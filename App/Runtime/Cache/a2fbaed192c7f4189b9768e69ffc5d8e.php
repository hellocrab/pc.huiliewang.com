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

<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script type="text/javascript" src="__PUBLIC__/style/js/TableFreeze.js"></script>
<script src="__PUBLIC__/js/mxcrm_more.js" type="text/javascript"></script>
<style>
body{
	/*overflow-y: hidden;*/
}
.option{padding-left:-30px;}

.navContent li a{
    color: #75899d;
}
.li_text_active {
    float: left;
    background-color: #f5f5f5;
    padding-left: 10px;
    width: 100%;
    border-left: 2px solid #03a9f4;
    line-height: 32px;
    margin-bottom: 3px;
    color: #03a9f4;
}
    .f13_c99{
        font-size: 13px;
        color: #999999;
    }
    .relitive{
        position: relative;
    }
    .count_num{
        position: absolute;
        right: 10px;
        top: 7px;
        height: 18px;
        background: #a8cbe5;
        padding: 0 10px;
        display: inline-block;
        line-height: 18px;
        color: #fff;
        border-radius: 3px;
        font-size: 12px;
        font-weight: inherit;
    }
</style>
<script>
$(function(){
//	var scroll_width = 5;
//	$("#table_div").height(window.innerHeight-$("#table_div").offset().top-$("#tfoot_div").height()-parseInt($("#table_container").css("padding-bottom").replace("px",""))-10);
//	$(window).resize(function(){
//		$("#table_div").height(window.innerHeight-$("#table_div").offset().top-$("#tfoot_div").height()-parseInt($("#table_container").css("padding-bottom").replace("px",""))-10);
//		$("#oDivL_tab_Test3").height($("#table_div").height()-scroll_width-1).width($("#oTableLH_tab_Test3").width());
//		$("#oDivH_tab_Test3").height($("#oTableLH_tab_Test3").height()).width($("#table_div").width()-scroll_width);
//	})
//	if ("<?php echo ($_GET['by']); ?>") {
//		$("#filter_ul").prev().html($("#filter_ul>li>a.active").text()+'<span class="fa fa-angle-down small_fa"></span>');
//	}
//	$("#tab_Test3").FrozenTable(1,0,3);
//	$("#oDivL_tab_Test3").height($("#table_div").height()-scroll_width).width($("#oTableLH_tab_Test3").width()).css({'zIndex':9});
//	$("#oDivH_tab_Test3").height($("#oTableLH_tab_Test3").height()).width($("#table_div").width()-scroll_width).css({'zIndex':9});
	//$("#oDivH_tab_Test3").css('top','-7px');
})
</script>
<div class="wrapper wrapper-content">
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
    <div class="row">
        <div class="col-lg-12">
        <div class="col-sm-2" style="background-color: rgb(255, 255, 255); padding: 20px; height: 566px;">
            <div class="subNavBox">
                <div class="subNav currentDd currentDt">待操作的发票 </div>
                <ul class="navContent" style="display:block">
                    <li>
                        <a href="<?php echo U('invoice/index',array('type'=>'apply'));?>" class="tikect" data-target="apply" id="now" ><span <?php if($type == 'apply'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>  >申请中的发票<label class="count_num"><?php echo ($applyNum); ?></label></span></a>
                    </li>
                    <li>
                        <a href="<?php echo U('invoice/index',array('type'=>'examine'));?>" class="tikect" data-target="examine" ><span <?php if($type == 'examine'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>已审批的发票<label class="count_num"><?php echo ($examineNum); ?></label></span></a>
                    </li>
                    <li>
                        <a href="<?php echo U('invoice/index',array('type'=>'billing'));?>" class="tikect" data-target="billing" ><span <?php if($type == 'billing'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>已开出发票<label class="count_num"><?php echo ($billingNum); ?></label></span></a>
                    </li>
                    <li>
                        <a href="<?php echo U('invoice/index',array('type'=>'money'));?>" class="tikect" data-target="money" ><span <?php if($type == 'money'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>收到款发票<label class="count_num"><?php echo ($moneyNum); ?></label></span></a>
                    </li>
                </ul>
                <div class="subNav currentDd currentDt">完成操作的发票</div>
                <ul class="navContent" style="display:block">
                    <li><a href="<?php echo U('invoice/index',array('type'=>'distribution'));?>" class="tikect" data-target="distribution"><span <?php if($type == 'distribution'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>已分配发票<label class="count_num"><?php echo ($distributionNum); ?></label></span></a></li>
                    <li><a href="<?php echo U('invoice/index',array('type'=>'grant'));?>" class="tikect" data-target="grant" ><span <?php if($type == 'grant'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>已发放发票<label class="count_num"><?php echo ($grantNum); ?></label></span></a></li>
                </ul>
                <div class="subNav currentDd currentDt">回撤的发票</div>
                <ul class="navContent" style="display:block">
                    <li><a href="<?php echo U('invoice/index',array('type'=>'return'));?>" class="tikect" data-target="return" ><span <?php if($type == 'return'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>退回的发票<label class="count_num"><?php echo ($returnNum); ?></label></span></a></li>
                    <li><a href="<?php echo U('invoice/index',array('type'=>'refund'));?>" class="tikect" data-target="refund" ><span <?php if($type == 'refund'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>退款的发票<label class="count_num"><?php echo ($refundNum); ?></label></span></a></li>
                    <li><a href="<?php echo U('invoice/index',array('type'=>'refuse'));?>" class="tikect" data-target="refuse" ><span <?php if($type == 'refuse'): ?>class="relitive li_text li_text_active"<?php else: ?>class="relitive li_text"<?php endif; ?>>审批驳回发票<label class="count_num"><?php echo ($refuseNum); ?></label></span></a></li>
                </ul>
            </div>
        </div>

        <div class="wrapper wrapper-content animated fadeIn invoice-content" >
            <link rel="stylesheet" href="__PUBLIC__/style/css/dialog.css">
            <div class="col-sm-10 tab-content tab0" id="tab0">
                <div class="ibox float-e-margins">
                    <div class="title-bar" style="position: relative;">
                        <div class="row titlebtns clearfix" style="display:none;">
                            <ul class="breadcrum pull-left">
                                <input type="hidden" class="select_arr" value="">
                                <li>已选中&nbsp;<span class="icheck_num"></span>&nbsp;项</li>
                                <!--<li><a href="javascript:void(0)" class="btn_examine" data_type="multi"><i class="fa fa-legal"></i>&nbsp;审批</a></li>-->
                                <li><a href="javascript:void(0)" class="excelExport"><i class="fa fa-download"></i>&nbsp;导出</a></li>
                                <li><a  href="javascript:void(0)" class="btn_delete" data_type="multi"><i class="fa fa-times"></i>&nbsp;撤销</a></li>
                                <li class="last_li"><big><a class="fa fa-times pull-right btnclose" id="back-show"></a></big></li>
                            </ul>
                        </div>
                        <div class="row notitlebtns">
                            <ul class="nav pull-left" style="margin:2px 0 0 35px;display: none;">
                                <a href="<?php echo U('invoice/add');?>" class="btn btn-primary btn-sm pull-left" style="margin-right:8px"><i class="fa fa-plus-circle"></i>&nbsp; 添加发票<?php echo ($type); ?></a>
                            </ul>
                            <form class="form-inline" id="" action="" method="get">
                                <ul class="breadcrum pull-right" style="margin-bottom: 0px">
                                    <li>
                                        搜索：
                                        <div class="input-group">
                                            <input type="hidden" name="m" value="invoice"/>
                                            <input type="hidden" name="a" value="index"/>
                                            <input type="hidden" name="condition" value="contains"/>
                                            <input type="hidden" name="field" value="name"/>
                                            <input id="short_search" type="text" style="width:160px;" placeholder="请输入发票号码、客户名称、合同编号" onkeydown='if(event.keyCode==13) {$("#short_search_btn").trigger("click");return false;}' class="form-control input-sm" name="search" <?php if($_GET['field'] == 'name'): ?>value="<?php echo ($_GET['search']); ?>"<?php endif; ?>/>
                                            <span class="input-group-btn">
										<button class="btn btn-default btn-search" id="short_search_btn" type="submit"><i class="fa fa-search"></i></button>
									</span>
                                        </div>
                                        &nbsp;&nbsp;<a title="高级搜索" href="javascript:void(0)" id="search_type" class="btn btn-white btn-bitbucket"><i class="fa fa-filter" style="color: #D8E3EF;"></i></a>
                                    </li>
                                    <div class="btn-group">
                                        <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">操作 <span class="caret"></span>
                                        </button>
                                        <ul class="dropdown-menu">
                                            <li><a href="javascript:void(0);" class="link excelExport"><i class="fa fa-download"></i>&nbsp;导出</a></li>	                            </ul>
                                    </div>
                                </ul>
                            </form>
                        </div>
                    </div>
                    <div class="row" style="margin: 0">
                        <div class="ibox-content" style="padding:0px;">
                            <div class="ibox-content clearfix" id="table_container" style="padding:0px;border: none;">
                                <form id="form1" action="" method="Post" style="position:relative;">
                                    <div id="table_div" class="full-height-scroll" style="left:0px;top:0px;overflow-x: hidden;">
                                        <?php if(empty($invoice_list)): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
                                            <?php else: ?>
                                            <div class="dataTables_wrapper form-inline">
                                                <div class="row" style="margin:0;border: 1px solid #ebebeb;border-bottom: 0;border-top: 0;padding-top: 5px">
                                                    <div class="col-sm-8">
                                                        <div class="DTTT_container pull-left">
                                                            <div class="checkbox checkbox-primary">
                                                                <input type="checkbox" class="check_all" name="checkall">
                                                                <label for=""></label>
                                                            </div>
                                                            <span class="ng-binding">全选</span>
                                                        </div>
                                                    </div>
                                                    <div class="col-sm-4" style="line-height:30px">
                                                        <div class="dataTables_length pull-right"><span class="dataTables_info ng-binding" role="status">总共: <?php echo ($count); ?> 条结果</span></div>
                                                    </div>
                                                </div>
                                                <div class="row" style="margin-top:0">
                                                    <div class="col-sm-12">
                                                        <div style="border: 1px solid #e7eaec;border-top: 0">
                                                            <table class="table table-hover" style="margin-bottom:0">
                                                                <tbody>
                                                                <?php if(is_array($invoice_list)): $i = 0; $__LIST__ = $invoice_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr >
                                                                        <td class="project-title">
                                                                            <div class="col-sm-10" style="height: 24px;margin-top: 10px;">
                                                                                <div class="checkbox checkbox-primary" style="float: left;margin-left: -8px;margin-top: -2px;">
                                                                                    <input  name="checklist" class="check_list" type="checkbox" value="<?php echo ($vo["invoice_id"]); ?>" rel="" rel1="" rel2="">
                                                                                    <label></label>
                                                                                </div>
                                                                                <span class="label label-success m-l-xs ng-binding" style="float:left"><?php echo ($vo["billing_type"]); ?></span>
                                                                                <span class="label label-primary m-l-xs ng-binding" style="float:left"><?php echo ($vo["cost_type"]); ?></span>
                                                                                <span class="label label-warning m-l-xs ng-binding" style="float:left"><?php echo ($vo["project_type"]); ?></span>
                                                                                <strong style="color:#333333;float:left" class="ng-binding">&nbsp;<?php echo ($vo['customer_name']); ?>  &nbsp;&nbsp;</strong>
                                                                                <span style="color:#333333;float:left" class="ng-binding">  （<?php echo ($vo['project_stage']); ?>）  &nbsp;&nbsp;</span>
                                                                                <span style="color:#333333;float:left" class="ng-binding">  （金额：<?php echo ($vo['price']); ?>）  &nbsp;&nbsp;</span><span style="color:#333333;float:left" class="ng-binding">  （已收金额：<?php echo ($vo['money']); ?>）  &nbsp;&nbsp;</span>
                                                                            </div>
                                                                            <div class="col-sm-2 project-status text-right">
                                                                                <?php if($type == 'apply'): ?><span class="label label-warning ng-binding">申请中</span>
                                                                                    <?php elseif($type == 'examine'): ?>
                                                                                    <span class="label label-warning ng-binding">待开票</span>
                                                                                    <?php elseif($type == 'billing'): ?>
                                                                                    <span class="label label-warning ng-binding">待付款</span>
                                                                                    <?php elseif($type == 'money'): ?>
                                                                                    <span class="label label-warning ng-binding">待分配</span>
                                                                                    <?php elseif($type == 'distribution'): ?>
                                                                                    <span class="label label-success ng-binding">待发放</span>
                                                                                    <?php elseif($type == 'grant'): ?>
                                                                                    <span class="label label-primary ng-binding">已发放</span>
                                                                                    <?php elseif($type == 'return'): ?>
                                                                                    <span class="label label-warning ng-binding">发票退回</span>
                                                                                    <?php elseif($type == 'refund'): ?>
                                                                                    <span class="label label-warning ng-binding">发票退款</span>
                                                                                    <?php elseif($type == 'refuse'): ?>
                                                                                    <span class="label label-warning ng-binding">发票驳回</span><?php endif; ?>
                                                                            </div>
                                                                            <div class="col-sm-12 p_l_30"  style="height: 24px;">
                                                                                <small><span class="f13_c99 mr_5">公司名称:</span><a target="_blank" href="<?php echo U('customer/view', 'id='.$vo['customer_id']);?>" style="color: #0693CD;font-weight: 400;font-size: 12px"><?php echo ($vo['customer_name']); ?></a></small>
                                                                                <small><span class="f13_c99 ml_20 mr_5">职位名称:</span><a target="_blank" href="<?php echo U('business/view','id='.$vo['business_id']);?>" style="color: #0693CD;font-weight: 400;font-size: 12px"><?php echo ($vo['business_name']); ?></a></small>
                                                                                <small><span class="f13_c99 ml_20 mr_5">候选人:</span><a target="_blank"  href="<?php echo U('product/view', 'id='.$vo['eid']);?>" style="color: #0693CD;font-weight: 400;font-size: 12px"><?php echo ($vo['resume_name']); ?></a></small>
                                                                            </div>
                                                                            <div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                <small><span class="f13_c99 mr_5">备注:</span><?php echo ($vo['description']); ?></small>
                                                                            </div>
                                                                            <div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                <small><span class="f13_c99 mr_5">申请人:</span><a style="color: #0693CD;font-weight: 400;font-size: 12px" class="ng-binding role_info"  rel="<?php echo ($vo['create_role_id']); ?>"> <?php echo ($vo['user_name']); ?></a></small>
                                                                                <small><span class="f13_c99 ml_20 mr_5">申请日期:</span><span><?php echo (date('Y-m-d H:i',$vo['create_time'])); ?></span></small>
                                                                                <small><span class="f13_c99 ml_20 mr_5">发票编号:</span><span><?php echo ($vo['name']); ?></span></small>
                                                                            </div>
                                                                            <?php if($vo['examine_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">审批备注:</span>
                                                                                        <?php echo ($vo['examine_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['examine_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['billing_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">开票时间:</span>
                                                                                        <?php echo ($vo['billing_content']['ctime']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">开票备注:</span>
                                                                                        <?php echo ($vo['billing_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['billing_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['money_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">到款金额:</span>
                                                                                        <?php echo ($vo['money_content']['amount']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">到款时间:</span>
                                                                                        <?php echo ($vo['money_content']['ctime']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">备注:</span>
                                                                                        <?php echo ($vo['money_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['money_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['refund_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">退款金额:</span>
                                                                                        <?php echo ($vo['refund_content']['number']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">退款时间:</span>
                                                                                        <?php echo ($vo['refund_content']['gjtime']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">备注:</span>
                                                                                        <?php echo ($vo['refund_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['refund_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['grant_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">发放时间:</span>
                                                                                        <?php echo ($vo['grant_content']['gjtime']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">备注:</span>
                                                                                        <?php echo ($vo['grant_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['grant_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['return_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">退票时间:</span>
                                                                                        <?php echo ($vo['return_content']['gjtime']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">备注:</span>
                                                                                        <?php echo ($vo['return_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['return_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <?php if($vo['back_content']): ?><div class="col-sm-12 p_l_30" style="height: 24px;">
                                                                                    <small>
                                                                                        <span class="f13_c99 mr_5">回退备注:</span>
                                                                                        <?php echo ($vo['back_content']['description']); ?>
                                                                                        <span class="f13_c99 ml_20 mr_5">操作时间:</span>
                                                                                        <?php echo (date('Y-m-d H:i',$vo['back_content']['addtime'])); ?>
                                                                                    </small>
                                                                                </div><?php endif; ?>
                                                                            <div class="col-sm-12">
                                                                                <div class="project-actions pull-right">
                                                                                    <ul class="nav">
                                                                                        <li style="display:inline-block">
                                                                                            <button class="btn btn-white btn-xs btn_edit" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-pencil"></i>编辑</button>
                                                                                        </li>
                                                                                        <?php if($type == 'apply'): ?><li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_examine" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"  data_type="single"><i class="fa fa-legal"></i>审批</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_delete" type="button" data-id="<?php echo ($vo['invoice_id']); ?>" data_type="single"><i class="fa fa-times"></i>撤销</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'examine'): ?>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_count" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-legal"></i>开票</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'billing'): ?>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_bill" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-rmb"></i>收款</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_refund" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-rotate-right"></i>退票</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'money'): ?>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_assign" type="button" data-id="<?php echo ($vo['invoice_id']); ?>" data-type="<?php echo ($vo["project_type"]); ?>"><i class="fa fa-pie-chart"></i>分配</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_refuse" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-rotate-right"></i>退款</button>
                                                                                            </li>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'distribution'): ?>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_sendout" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-pie-chart"></i>发放</button>
                                                                                            </li>

                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'grant'): ?>

                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li>
                                                                                            <?php elseif($type == 'return' || $type == 'refund'|| $type == 'refuse' ): ?>
                                                                                            <li style="display:inline-block">
                                                                                                <button class="btn btn-white btn-xs btn_return" type="button" data-id="<?php echo ($vo['invoice_id']); ?>"><i class="fa fa-reply"></i>回退</button>
                                                                                            </li><?php endif; ?>
                                                                                    </ul>
                                                                                </div>
                                                                            </div>
                                                                        </td>
                                                                    </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                                                </tbody>
                                                            </table>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <table class="table table-hover table-striped table_thead_fixed" id="tab_Test3" style="background:#fff;margin-bottom:0px;"></table><?php endif; ?>
                                    </div>
                                    <div id="tfoot_div" class="clearfix">
                                        <tr>
                                            <div class="clearfix" id="tfoot_page">
                                                <?php echo ($page); ?><div class="pull-right" style="width:auto;"><select style="width:auto;display:inline-block;" id="listrows" name="listrows" rel="<?php echo ($listrows); ?>" class="form-control input-sm"><option value="10" >10</option><option value="15">15</option><option value="20">20</option><option value="30">30</option><option value="40">40</option><option value="50">50</option><option value="60">60</option><option value="70">70</option><option value="80">80</option><option value="90">90</option><option value="100">100</option></select></div>
<script type="text/javascript">
function changeURLArg(url,arg,arg_val){ 
	var pattern=arg+'=([^&]*)'; 
	var replaceText=arg+'='+arg_val; 
	if(url.match(pattern)){ 
	var tmp='/('+ arg+'=)([^&]*)/gi'; 
	        tmp=url.replace(eval(tmp),replaceText); 
	return tmp; 
	    }else{ 
	if(url.match('[?]')){ 
	return url+'&'+replaceText; 
	        }else{ 
	return url+'?'+replaceText; 
	        } 
	    } 
	return url+'\n'+arg+'\n'+arg_val; 
} 
var list_rows = $("#listrows").attr('rel');
$("#listrows").val(list_rows);
$("#listrows").change(function(){
	var every_listrows = $(this).val();
	var this_url = window.location.search;
	if(this_url.indexOf("listrows") > 0){
		window.location = changeURLArg(this_url,'listrows',every_listrows);
	}else{
		window.location = this_url+"&listrows="+every_listrows;
	}
});
</script>

                                            </div>
                                        </tr>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-check-invoice" title="发票审核">
                <form action="" id="contract_dialog" method="post">
                    <input id="dialog_order_id" name="invoice_id" type="hidden" value="" />
                    <input type="hidden" name="m" value="invoice">
                    <input type="hidden" name="a" value="check">
                    <table class="table" style="border:none;">
                        <tr>
                            <td style="border:none;text-align:right">审核结果：</td>
                            <td style="border:none;">
                                <select name="is_agree" id="is_agree" style="width:300px;" class="form-control required">
                                    <option value="1">同意</option>
                                    <option value="2">拒绝</option>
                                </select>
                            </td>
                        </tr>
                        <tr>
                            <td style="border:none;text-align:right">备注：</td>
                            <td style="border:none;">
                                <textarea class="form-control required" id="dialog_description" name="description" placeholder="填写理由(非必填)"></textarea>
                            </td>
                        </tr>
                    </table>
                </form>
            </div>
            <div style="display:none" id="dialog-field-search" title="高级搜索">
                <form class="form-inline" id="searchForm" action="" method="get">
                    <input type="hidden" name="daochu"  id="daochu"/>
                    <div id="search_add" style="width:650px;float:left;">
                        <?php if(empty($fields_search)): ?><div id="con_search_1" style="float:left;width:650px;margin:0 10px 0 10px;">
                                <ul class="nav pull-left" style="margin:0px 0 0 23px;width:650px">
                                    <li class="pull-left">
                                        <select id="field_1" style="width:auto" class="form-control input-sm field_name new-select" onchange="changeCondition(1)" >
                                            <option class="" value="name">--请选择条件--</option>
                                            <option class="word" value="name">发票号码</option>
                                            <option class="word" value="contract_num">合同编号</option>
                                            <option class="contract_check" value="is_checked">审核状态</option>
                                            <option class="role" value="create_role_id">开票人</option>
                                            <option class="word" value="customer_name">客户名称</option>
                                            <option class="number" value="price">开票金额</option>
                                            <option class="date" value="invoice_time">开票日期</option>
                                            <option class="date" value="create_time">创建时间</option>
                                            <option class="date" value="update_time">修改时间</option>
                                        </select>&nbsp;&nbsp;
                                    </li>
                                    <li class="pull-left" id="conditionContent_1">
                                        <select id="condition_1" style="width:auto" class="form-control input-sm new-select" onchange="changeSearch()" name="name[condition]">
                                            <option value="contains"><?php echo L('CONTAINS');?></option>
                                            <option value="is"><?php echo L('IS');?></option>
                                            <option value="start_with"><?php echo L('START_WITH');?></option>
                                            <option value="end_with"><?php echo L('END_WITH');?></option>
                                            <option value="is_empty"><?php echo L('IS_EMPTY');?></option>
                                        </select>&nbsp;&nbsp;
                                    </li>
                                    <li class="pull-left" id="searchContent_1">
                                        <input id="search_1" type="text" style="width:160px;" class="input-medium form-control input-sm search-query" name="name[value]"/>&nbsp;&nbsp;
                                    </li>
                                </ul>
                            </div>
                            <?php $max_key = 1;?>
                            <?php else: ?>
                            <?php if(is_array($fields_search)): $key1 = 0; $__LIST__ = $fields_search;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key1 % 2 );++$key1;?><div id="con_search_<?php echo ($key1); ?>" style="float:left;width:650px;margin:0px 10px 0 10px;padding-top:10px;">
                                    <div id="rem_<?php echo ($key1); ?>" class="pull-left" style="line-height:30px;"><a href="javascript:void(0);" class="rem_search" rel="<?php echo ($key1); ?>" title="移除"><span class="fa fa fa-times-circle"></span></a></div>
                                    <ul class="nav pull-left" style="margin:0px 0 0 5px;width:620px;">
                                        <li class="pull-left">
                                            <select id="field_<?php echo ($key1); ?>" style="width:auto" class="form-control input-sm field_name new-select" onchange="changeCondition(<?php echo ($key1); ?>)" >
                                                <option class=""  value="name">--请选择条件--</option>
                                                <option class="word" <?php if($vo['field'] == 'name'): ?>selected="selected"<?php endif; ?> value="name">发票号码</option>
                                                <option class="word" <?php if($vo['field'] == 'contract_num'): ?>selected="selected"<?php endif; ?> value="contract_num">合同编号</option>
                                                <option class="contract_check" <?php if($vo['field'] == 'is_checked'): ?>selected="selected"<?php endif; ?> value="is_checked">审核状态</option>
                                                <option class="role" <?php if($vo['field'] == 'create_role_id'): ?>selected="selected"<?php endif; ?> value="create_role_id">开票人</option>
                                                <option class="word" <?php if($vo['field'] == 'customer_name'): ?>selected="selected"<?php endif; ?> value="customer_name">客户名称</option>
                                                <option class="number" <?php if($vo['field'] == 'price'): ?>selected="selected"<?php endif; ?> value="price">开票金额</option>
                                                <option class="date" <?php if($vo['field'] == 'invoice_time'): ?>selected="selected"<?php endif; ?> value="invoice_time">创建时间</option>
                                                <option class="date" <?php if($vo['field'] == 'create_time'): ?>selected="selected"<?php endif; ?> value="create_time">创建时间</option>
                                                <option class="date" <?php if($vo['field'] == 'update_time'): ?>selected="selected"<?php endif; ?> value="update_time">修改时间</option>
                                            </select>&nbsp;&nbsp;
                                        </li>
                                        <li class="pull-left" id="conditionContent_<?php echo ($key1); ?>">
                                            <?php if($vo["form_type"] == 'number'): ?><select id="condition" style="width:auto" class="form-control input-sm" name="<?php echo ($vo['field']); ?>[condition]">
                                                    <option value="gt" <?php if($_GET[$vo['field']][condition] == 'gt'): ?>selected="selected"<?php endif; ?>><?php echo L('GT');?></option>
                                                    <option value="lt" <?php if($_GET[$vo['field']][condition] == 'lt'): ?>selected="selected"<?php endif; ?>><?php echo L('LT');?></option>
                                                    <option value="eq" <?php if($_GET[$vo['field']][condition] == 'eq'): ?>selected="selected"<?php endif; ?>><?php echo L('EQ');?></option>
                                                    <option value="neq" <?php if($_GET[$vo['field']][condition] == 'neq'): ?>selected="selected"<?php endif; ?>><?php echo L('NEQ');?></option>
                                                </select>
                                                <?php elseif($vo["form_type"] == 'datetime'): ?>
                                                <select id="condition" style="width:auto" class="form-control input-sm" name="<?php echo ($vo['field']); ?>[condition]">
                                                    <option value="tgt" <?php if($_GET[$vo['field']][condition] == 'tgt'): ?>selected="selected"<?php endif; ?>><?php echo L('PAST');?></option>
                                                    <option value="lt" <?php if($_GET[$vo['field']][condition] == 'lt'): ?>selected="selected"<?php endif; ?>><?php echo L('BEFORE');?></option>
                                                    <option value="between" <?php if($_GET[$vo['field']][condition] == 'between'): ?>selected="selected"<?php endif; ?>><?php echo L('IN');?></option>
                                                    <option value="nbetween" <?php if($_GET[$vo['field']][condition] == 'nbetween'): ?>selected="selected"<?php endif; ?>><?php echo L('NOTIN');?></option>
                                                </select>
                                                <?php elseif($vo["field"] == 'create_role_id' || $vo["field"] == 'is_checked' || $vo["form_type"] == 'datetime'): ?>
                                                <?php elseif($vo["form_type"] == 'box'): ?>
                                                <span id="<?php echo ($vo['field']); ?>"></span>
                                                <script type="text/javascript">
                                                    var b = '<?php echo ($vo[field]); ?>';
                                                    var c = 'product';
                                                    $.ajax({
                                                        type:'get',
                                                        url:'index.php?m=setting&a=boxfield&model='+c+'&field='+b,
                                                        async:false,
                                                        success:function(data){
                                                            options = '';
                                                            $.each(data.data, function(k, v){
                                                                if('<?php echo ($vo["value"]); ?>' == v){
                                                                    select = 'selected';
                                                                }else{
                                                                    select = '';
                                                                }
                                                                options += "<option value='"+v+"' "+select+">"+v+"</option>";
                                                            });
                                                            $("#<?php echo ($vo['field']); ?>").html('<select class="<?php echo ($vo["field"]); ?> form-control input-sm" style="width:auto" name="<?php echo ($vo["field"]); ?>" ><option value="">--<?php echo L('PLEASE_CHOOSE');?>--</option>' + options + '</select>&nbsp;&nbsp;');
                                                        },
                                                        dataType:'json'
                                                    });
                                                    <?php if(!empty($_GET[$vo['field']])): ?>$(".<?php echo ($vo['field']); ?> option[value='<?php echo ($_GET[$vo['field']]); ?>']").attr('selected','selected');<?php endif; ?>
                                                </script>
                                                <?php elseif($vo["form_type"] == 'address'): ?>
                                                <select id="condition" style="width:auto" class="form-control input-sm" name="<?php echo ($vo['field']); ?>[condition]">
                                                    <option value="contains" <?php if($_GET[$vo['field']][condition] == 'contains'): ?>selected="selected"<?php endif; ?>><?php echo L('IN');?></option>
                                                    <option value="not_contain" <?php if($_GET[$vo['field']][condition] == 'not_contains'): ?>selected="selected"<?php endif; ?>><?php echo L('NOTIN');?></option>
                                                </select>
                                                <select name="<?php echo ($vo['field']); ?>[state]" class="form-control input-sm" id="state" style="width:135px;"></select>
                                                <select name="<?php echo ($vo['field']); ?>[city]" class="form-control input-sm" id="city" style="width:110px;"></select>
                                                <select name="<?php echo ($vo['field']); ?>[area]" class="form-control input-sm" id="area" style="width:110px"></select>
                                                <input type="text" id="search" name="<?php echo ($vo['field']); ?>[search]" value="<?php echo ($_GET[$vo['field']][search]); ?>" class="form-control input-sm" placeholder="<?php echo L('THE_STREET_INFORMATION');?>" class="input-large">
                                                <script type="text/javascript">
                                                    new PCAS("<?php echo ($vo['field']); ?>[state]","<?php echo ($vo['field']); ?>[city]","<?php echo ($vo['field']); ?>[area]","<?php echo $_GET[$vo['field']]['state']; ?>","<?php echo $_GET[$vo['field']]['city']; ?>","<?php echo $_GET[$vo['field']]['area']; ?>");
                                                </script>
                                                <?php else: ?>
                                                <select id="condition" style="width:auto" class="form-control input-sm" name="<?php echo ($vo['field']); ?>[condition]">
                                                    <option value="contains" <?php if($_GET[$vo['field']][condition] == 'contains'): ?>selected="selected"<?php endif; ?>><?php echo L('INCLUDE');?></option>
                                                    <option value="not_contain" <?php if($_GET[$vo['field']][condition] == 'not_contain'): ?>selected="selected"<?php endif; ?>><?php echo L('EXCLUSIVE');?></option>
                                                    <option value="is" <?php if($_GET[$vo['field']][condition] == 'is'): ?>selected="selected"<?php endif; ?>><?php echo L('YES');?></option>
                                                    <option value="isnot" <?php if($_GET[$vo['field']][condition] == 'isnot'): ?>selected="selected"<?php endif; ?>><?php echo L('NO');?></option>
                                                    <option value="start_with" <?php if($_GET[$vo['field']][condition] == 'start_with'): ?>selected="selected"<?php endif; ?>><?php echo L('BEGINNING_CHARACTER');?></option>
                                                    <option value="end_with" <?php if($_GET[$vo['field']][condition] == 'end_with'): ?>selected="selected"<?php endif; ?>><?php echo L('TERMINATION_CHARACTER');?></option>
                                                    <option value="is_empty" <?php if($_GET[$vo['field']][condition] == 'is_empty'): ?>selected="selected"<?php endif; ?>><?php echo L('MANDATORY');?></option>
                                                    <option value="is_not_empty" <?php if($_GET[$vo['field']][condition] == 'is_not_empty'): ?>selected="selected"<?php endif; ?>><?php echo L('ISNOTEMPTY');?></option>
                                                </select><?php endif; ?>
                                        </li>
                                        <li class="pull-left" id="searchContent_<?php echo ($key1); ?>" style="margin-left:5px;">
                                            <?php if($vo["form_type"] != 'box' && $vo["form_type"] != 'address'): if($vo["form_type"] == 'datetime'): ?><input id="start_<?php echo ($vo['field']); ?>" type="text" class="form-control input-sm search-query" name="<?php echo ($vo['field']); ?>[start]" onclick="WdatePicker()" value="<?php echo ($fields_search[$vo['field']][start]); ?>" rel="invoice"/> 至 <input id="end_<?php echo ($vo['field']); ?>" type="text" class="form-control input-sm search-query" name="<?php echo ($vo['field']); ?>[end]" onclick="WdatePicker()" value="<?php echo ($fields_search[$vo['field']][end]); ?>" rel="invoice"/>
                                                    <?php elseif($vo['field'] == 'create_role_id'): ?>
                                                    <span id="owner_role_search" rel="<?php echo ($key1); ?>" rel1="<?php echo ($vo['field']); ?>[value]" rel2="<?php echo ($_GET[$vo['field']][value]); ?>"/>
                                                    <script type="text/javascript">
                                                        var key_id = $('#owner_role_search').attr('rel');
                                                        var search_create_role_id = $('#owner_role_search').attr('rel1');
                                                        var owner_roleid = $('#owner_role_search').attr('rel2');
                                                        $.ajax({
                                                            type:'get',
                                                            url:'index.php?m=user&a=getrolelist',
                                                            async:false,
                                                            success:function(data){
                                                                options = '';
                                                                $.each(data.data, function(k, v){
                                                                    options += '<option value="'+v.role_id+'" checkedit>'+v.user_name+' ['+v.department_name+'-'+v.role_name+'] </option>';
                                                                });
                                                                $("#searchContent_"+key_id+"").html('<select class="selectpicker show-tick form-control input-sm" data-live-search="true" id="search_'+key_id+'" name="'+search_create_role_id+'" style="width:auto">' + options + '</select>');
                                                                var owner_roleid = "<?php echo ($_GET[$vo['field']][value]); ?>";
                                                                $('#search_'+key_id+' option[value='+owner_roleid +']').prop('selected',true);
                                                            },
                                                            dataType:'json'
                                                        });
                                                    </script>
                                                    <?php elseif($vo['field'] == 'is_checked'): ?>
                                                    <select class="form-control input-sm" style="width:auto" name="<?php echo ($vo['field']); ?>[value]">
                                                        <option value="0">待审</option>
                                                        <option value="1" <?php if($_GET[$vo['field']][value] == 1): ?>selected="selected"<?php endif; ?> >通过</option>
                                                        <option value="2" <?php if($_GET[$vo['field']][value] == 2): ?>selected="selected"<?php endif; ?> >拒绝</option>
                                                    </select>
                                                    <?php else: ?>
                                                    <input name="<?php echo ($vo['field']); ?>[value]" type="text" class="form-control input-sm" class="<?php echo ($vo['form_type']); ?>" value="<?php echo ($_GET[$vo['field']][value]); ?>" rel="product"><?php endif; endif; ?>
                                        </li>
                                    </ul>
                                </div>
                                <?php $max_key = ++$key1; endforeach; endif; else: echo "" ;endif; endif; ?>
                    </div>
                    <input type="hidden" name="this_page" value="<?php echo ($this_page); ?>" />
                    <div class="clearfix"></div>
                    <div style="margin-left: 35px;margin-top:0px;"><a href="javascript:void(0);" style="display: -moz-stack;margin: 30px 0px 0px; font-size: 12px; color: rgb(62, 133, 233);" id="add_btn">+添加筛选条件</a>
                    </div>
                    <div class="pull-right" class="button_type" style="margin:20px;">
                        <input type="hidden" name="m" value="invoice"/>
                        <input type="hidden" name="act" id="act" value="index"/>
                        <?php if($_GET['by']!= null): ?><input type="hidden" name="by" value="<?php echo ($_GET['by']); ?>"/><?php endif; ?>
                    </div>
                </form>
            </div>

            <div style="display:none" id="dialog-edit">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-examine">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-count">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-return">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-bill">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-refund">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-assign">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-refuse">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
            <div style="display:none" id="dialog-sendout">
                <div class="spiner-example">
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>



        </div>

    </div>
    </div>
</div>
<script type="text/javascript">
    $("#dialog-edit").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 620,
        position: ["center",100],
        title:"发票",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#edit_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-examine").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"审批发票",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#examine_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-count").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"开票",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#count_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-return").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"回退",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#return_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-bill").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"收款",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                var amount = $("input[name='amount']").val();
                if(amount==""){
                    alert_crm("请输入正确的金额！");return false;
                }
                $('#bill_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-refund").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"退票",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#refund_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-assign").dialog({
        autoOpen: false,
        modal: true,
        width: 660,
        maxHeight: 720,
        position: ["center",100],
        title:"业绩分配",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#assign_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-refuse").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"退款",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#refuse_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });
    $("#dialog-sendout").dialog({
        autoOpen: false,
        modal: true,
        width: 600,
        maxHeight: 420,
        position: ["center",100],
        title:"发放",
        close:function(){
            //selectStatus();//更新
            $(this).html("");
        },
        buttons: {
            "确定": function () {
                $('#sendout_form').submit();
                $(this).dialog("close");
            },
            "取消": function () {
//                selectStatus();//更新
                $(this).dialog("close");
            }
        }
    });

    $(function () {
        //编辑发票
        $(".btn_edit").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-edit').dialog('open');
            $('#dialog-edit').load("/index.php?m=invoice&a=editer&id="+id);
        })

        //审批发票
        $(".btn_examine").on("click",function (){
            var id=0;
            var type=$(this).attr("data_type");
            if(type==="multi"){
                //多个审批
                id=$(this).closest(".breadcrum").find(".select_arr").val();
            }
            if(type==="single"){
                //单独审批
                id=$(this).attr("data-id");
            }
            $('#dialog-examine').dialog('open');
            $('#dialog-examine').load("/index.php?m=invoice&a=examine&id="+id);
        })
        //撤销发票
        $(".btn_delete").click(function(){
            var id=0;
            var title="";
            var type=$(this).attr("data_type");
            if(type==="multi"){
                //批量撤销
                id=$(this).closest(".breadcrum").find(".select_arr").val();
                title="确定要撤销选中的发票吗？";
            }
            if(type==="single"){
                //单独撤销
                id=$(this).attr("data-id");
                title="确定要撤销该发票吗？";
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
                    window.location.href="<?php echo U('invoice/revoke', 'invoice_id=');?>"+id;
                })
        });
        //开票
        $(".btn_count").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-count').dialog('open');
            $('#dialog-count').load("/index.php?m=invoice&a=count&id="+id);
        })
        //回退
        $(".btn_return").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-return').dialog('open');
            $('#dialog-return').load("/index.php?m=invoice&a=goback&id="+id);
        })
        //收款
        $(".btn_bill").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-bill').dialog('open');
            $('#dialog-bill').load("/index.php?m=invoice&a=bill&id="+id);
        })
        //退票
        $(".btn_refund").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-refund').dialog('open');
            $('#dialog-refund').load("/index.php?m=invoice&a=refund&id="+id);
        })
        //业绩分配-传统
        $(".btn_assign").on("click",function (){
            var type=$(this).attr("data-type");
            var id=$(this).attr("data-id");
            $('#dialog-assign').dialog('open');
            if(type=="传统项目"){
                $('#dialog-assign').load("/index.php?m=invoice&a=distribution&id="+id);
            }else{
                $('#dialog-assign').load("/index.php?m=invoice&a=distribution_int&id="+id);
            }
        })

        //退款
        $(".btn_refuse").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-refuse').dialog('open');
            $('#dialog-refuse').load("/index.php?m=invoice&a=refuse&id="+id);
        })
        //发放
        $(".btn_sendout").on("click",function (){
            var id=$(this).attr("data-id");
            $('#dialog-sendout').dialog('open');
            $('#dialog-sendout').load("/index.php?m=invoice&a=sendout&id="+id);
        })




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
                $("#"+st+" .titlebtns").show();
                $("#"+st+" .notitlebtns").hide();
                $("#"+st+" .icheck_num").html(i);
                $("#"+st+" .select_arr").val(id_array);
            }else{
                $("#"+st+" .titlebtns").hide();
                $("#"+st+" .notitlebtns").show();
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
                $("#"+st+" .titlebtns").show();
                $("#"+st+" .notitlebtns").hide();
                $("#"+st+" .icheck_num").html(i);
                $("#"+st+" .select_arr").val(id_array);
            }else{
                $("#"+st+" .titlebtns").hide();
                $("#"+st+" .notitlebtns").show();
            }
        })

        $(".btnclose").click(function () {
            $(".titlebtns").hide();
            $(".notitlebtns").show();
        })
    })


    if ("<?php echo C('isMobile');?>" == "1") {
        width = $('.container').width() * 0.9;
    } else {
        width = 800;
    }

    var tab="<?php echo ($_GET['tab']); ?>";
    var hreflist=$(".navContent li a");
    if(tab){
        $(".tab-content").hide();
        $("."+tab+"").show();
        hreflist.each(function () {
            if($(this).attr("rel")==tab){
                $(".navContent li a span").removeClass("li_text_active");
                $(".navContent li a span").addClass("li_text");
                $(this).find("span").removeClass("li_text");
                $(this).find("span").addClass("li_text_active");
            }
        })
    }else{
        $(".tab-content").hide();
        $(".tab0").show();
        hreflist.each(function () {
            if($(this).attr("rel")=='tab0'){
                $(".navContent li a span").removeClass("li_text_active");
                $(".navContent li a span").addClass("li_text");
                $(".navContent li a span").eq(0).removeClass("li_text");
                $(".navContent li a span").eq(0).addClass("li_text_active");
            }
        })
    }

    /*让复选框默认取消选择*/
    var is_receivables = '<?php echo ($is_receivables); ?>';
    $(':checkbox').prop('checked', false);

    $("#edit_invoice").click(function(){
        window.location.href="<?php echo U('invoice/edit', 'id=');?>"+$(this).attr('rel');
    });
    $("#short_search").val('<?php echo ($_GET['search']); ?>');

    $("#check_invoice").click(function(){
        var is_checked = $('#is_checked').val();
        var id = $(this).attr('rel');
        if(is_checked == 1){
            var order_id = $(this).attr('rel');
            $("#dialog_order_id").val(order_id);
            $('#dialog-check-invoice').dialog('open');
            $("#dialog_description").focus();
        }else{
            swal({
                    title: "确定要撤销审核吗？",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: "#DD6B55",
                    confirmButtonText: "确定",
                    closeOnConfirm: false
                },
                function(){
                    window.location.href="<?php echo U('invoice/revokeCheck', 'invoice_id=');?>"+id;
                });
        }
    });

    $("#dialog-check-invoice").dialog({
        autoOpen: false,
        modal: true,
        width: 444,
        maxHeight: 460,
        position: ["center",100] ,
        buttons: {
            "确定": function () {
                $('#contract_dialog').submit();
                $(this).dialog("close");
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });

    $("#dialog-role-info").dialog({
        autoOpen: false,
        modal: true,
        width: width,
        maxHeight: 550,
        position: ["center",100]
    });


    /**添加筛选条件**/
    var m = <?php echo ($max_key); ?>;
    $('#add_btn').click(function(){
        m += 1;
        $('#search_add').append('<div id="con_search_'+m+'" style="float:left;width:450px;padding-top:10px;margin:0px 10px 0 10px;"><div  id="rem_'+m+'" class="pull-left" style="line-height:30px;"><a href="javascript:void(0);" class="rem_search" rel="'+m+'" title="移除"><span class="fa fa-times-circle"></span></a></div>&nbsp;<ul class="nav pull-left" style="margin:0px 0 0 5px;width:420px"><li class="pull-left"><select id="field_'+m+'"  style="width:auto" class="form-control input-sm field_name new-select" onchange="changeCondition('+m+')" name=""><option class="" value="name">--请选择条件--</option><option class="word" value="name">发票号码</option><option class="word" value="contract_num">合同编号</option><option class="contract_check" value="is_checked">审核状态</option><option class="role" value="create_role_id">开票人</option><option class="word" value="customer_name">客户名称</option><option class="number" value="price">开票金额</option><option class="date" value="invoice_time">开票日期</option><option class="date" value="create_time">创建时间</option><option class="date" value="update_time">修改时间</option></select>&nbsp;&nbsp;</li><li class="pull-left" id="conditionContent_'+m+'"><select id="condition_'+m+'" style="width:auto" class="form-control input-sm new-select" name="condition" onchange="changeSearch()"><option value="contains"><?php echo L('CONTAINS');?></option><option value="is"><?php echo L('IS');?></option><option value="start_with"><?php echo L('START_WITH');?></option><option value="end_with"><?php echo L('END_WITH');?></option><option value="is_empty"><?php echo L('IS_EMPTY');?></option></select>&nbsp;&nbsp;</li><li class="pull-left" id="searchContent_'+m+'"><input id="search_'+m+'" type="text" style="width:160px;" class="input-medium form-control input-sm search-query" name="search"/>&nbsp;&nbsp;</li></ul></div>');
    });
    $(document).on('click','.rem_search',function(){
        var num = $(this).attr('rel');
        $('#con_search_'+num).remove();
    });

    // 筛选重复判断
    var dosearch = 1;
    function doh(){
        var ary = new Array();
        var field_name = '';
        var is_submit = 1;
        $('.field_name').each(function(k, v){
            field_name = $(this).find("option:selected").val();
            if(jQuery.inArray(field_name,ary) >= 0){
                is_submit = 0;
                swal({
                    title: "筛选条件中有重复项！",
                    text: data.info,
                    type: "error"
                });
                dosearch = 0;
                return false;
            }
            ary[k] = field_name;
        })
        if(is_submit == 1){
            $("#searchForm").submit();
        }
    }

    $("#dialog-field-search").dialog({
        autoOpen: false,
        width: 700,
        modal: true,
        height: 350,
        position: ["center",100],
        buttons: {
            "确定": function () {
                doh();
                if(dosearch == 1){
                    $(this).dialog("close");
                }
            },
            "取消": function () {
                $(this).dialog("close");
            }
        }
    });
    $("#search_type").click(function(){
        $("#dialog-field-search").dialog('open');
    })


    $(function(){

        $('#delete').click(function(){
            var id_array = new Array();
            $("input.check_list:checked").each(function(){
                id_array.push($(this).val());
            });
            if(id_array.length == 0){
                alert_crm('您没有选中任何客户！');
                return false;
            }
            swal({
                    title: "您确定要删除发票信息吗？",
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
                            type:'post',
                            url: "<?php echo U('invoice/delete');?>",
                            data: {invoice_id: id_array},
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
        $("#dosearch").click(function(){
            result = checkSearchForm();
            if(result){
                $("#act").val('search');$("#searchForm").submit();
            }
        });
//        var limit_size = 1000;
//        var count = 0;
//
//        $("#excelExport").click(function(){
//            if(count > limit_size){
//                if(confirm('当前导出量过大，将分几次导出，可能需要您等待一段时间，是否继续?')){
//                    remainTime();
//                }
//            }else{
//                var id_array = new Array();
//                $("input[class='check_list']:checked").each(function() {
//                    id_array.push($(this).val());
//                });
//                if(id_array !=''){
//                    if(confirm("<?php echo L('ARE_YOU_SURE_YOU_WANT_TO_EXPORT_THE_BUSINESS_OPPORTUNITIES');?>")){
//                        remainTime();
//                    }
//                }else{
//                    if(confirm("确定要导出全部吗？")){
//                        remainTime();
//                    }
//                }
//            }
//        });
    });
    var limit_size = 1000;
    var ii = 1;
    var count = '<?php echo ($count); ?>';
    $(".excelExport").click(function(){
        if(ii == -1){
            ii = 1;
        }
        var id_array = new Array();
        $("input.check_list:checked").each(function() {
            id_array.push($(this).val());
        });
        if(id_array){
            $("#daochu").val(id_array);
        }
//        alert(id_array);
        $("#act").val('excel');
        $("#current_page").val(ii);
        $("#export_limit").val(limit_size);
        $("#searchForm").submit();
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