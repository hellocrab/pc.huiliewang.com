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

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">
<script src="__PUBLIC__/js/PCASClass.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/docode.js" type="text/javascript"></script>
<style>
	.itembq{
		height: 32px;line-height: 32px;
	}
	#right-sidebar-log{
		width: 40% !important;
		box-shadow: -2px -1px 10px #ccc;
		background-color: #fff;
		overflow: hidden;
		position: fixed;
		top: 60px;
		right: -40%;
		z-index: 99;
		bottom: 0;
	}
	#business_table td{border: 0;}
</style>
<div class="wrapper wrapper-content animated fadeIn">
    <div class="row">
	    <div class="col-lg-12">
			<!-- <div class="white-bg" style="padding:7px 25px 0px 25px;margin-bottom:15px;">
				<div class="row " id="title-show">
					<ul class="nav pull-left" style="margin:2px 0 0 15px;">
						<span><img src="__PUBLIC__/img/product_view_icon.png" style="margin-bottom:9px;" alt=""></span>
						<span style="font-size:21px;margin-left:5px"><?php echo ($product['name']); ?></span>
					</ul>
				</div>
			</div> -->

		    <div class="tabs-container" style="width: 100%;float: left;">
				<div class="title-bar" style="">
					<div class="row " id="title-show" style="border-bottom: 1px solid #e7eaec;padding-bottom: 10px;">
						<ul class="nav pull-left" style="margin:0px 10px 0px 20px;">
							<span><img src="__PUBLIC__/img/view_icon.png" style="margin-bottom:9px;" alt=""></span>
							<span style="font-size:24px;color: #000;"><?php echo ($resume["name"]); ?></span>&nbsp;&nbsp;
							<span class="basic_item"><?php echo ($resume["sex"]); ?></span>
							<span class="basic_item">28岁</span>
							<span class="basic_item"><?php echo ($resume["edu"]); ?></span>
							<span class="basic_item"><?php echo ($resume["exp"]); ?></span>
						</ul>
                        <?php if($resume['isperfect']): ?><embed src="/Public/img/svg/excel.svg" width="24px" height="24px" type="image/svg+xml" pluginspage="http://www.adobe.com/svg/viewer/install/" style="margin-top: 6px;"><?php endif; ?>
						<div class="btn-group pull-right">
							<button data-toggle="dropdown" class="btn btn-default dropdown-toggle" aria-expanded="false" style="margin-right: 15px;">操作 <span class="caret"></span>
							</button>
							<ul class="dropdown-menu">
								<li><a id="1" href="<?php echo U('product/edit','id='.$_GET['id']);?>"><i class="fa fa-edit (alias)"></i>&nbsp;编辑</a></li>
								<!--<li><a id="" href="#"><i class="fa fa-bell-o"></i>&nbsp;添加提醒</a></li>-->
								<!--<li><a id="" href="#"><i class="fa fa-comments"></i>&nbsp;添加备注</a></li>-->
							</ul>
						</div>
                        <?php if($resume['favorite']): ?><a href="javascript:viod(0);" class="btn btn-outline btn-default pull-right" id="unfavorite" rel="<?php echo ($_GET['id']); ?>" style="margin-right: 15px;">取消收藏</a>
                        <?php else: ?>
                            <a href="javascript:viod(0);" class="btn btn-outline btn-default pull-right" id="favorite" rel="<?php echo ($_GET['id']); ?>" style="margin-right: 15px;">加入收藏夹</a><?php endif; ?>
						<a href="javascript:viod(0);" class="btn btn-outline btn-default pull-right log_calllist" id="add_pro" rel="<?php echo ($_GET['id']); ?>" style="margin-right: 15px;">加入CallList</a>&nbsp;&nbsp;
					</div>
					<div class="row">
						<div class="form-horizontal view-group " >
						<div class="form-group">
							<label class="col-lg-2 control-label">联系电话</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($resume["telephone"]); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">简历编号</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($resume["eid"]); ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">邮箱</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($resume["email"]); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">创建人</label>
							<div class="col-lg-4">
								<p class="form-p">
									<a class="role_info" rel="<?php echo ($resume['creator_role_id']); ?>" href="javascript:void(0)" style="margin-right: 5px;"><?php echo ($resume['full_name']); ?></a>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">目前职位</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($resume["curPosition"]); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">创建时间</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo (date('Y-m-d H:i',$resume["addtime"])); ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">目前城市</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo ($resume["location"]); ?>
								</p>
							</div>
							<label class="col-lg-2 control-label">最后更新时间</label>
							<div class="col-lg-4">
								<p class="form-p">
									<?php echo (date('Y-m-d H:i',$resume["lastupdate"])); ?>
								</p>
							</div>
						</div>
						<div class="form-group">
							<label class="col-lg-2 control-label">设置标签</label>
							<div class="col-lg-10">
								<div class="yibiqiao" style="float: left;margin: 0;">
                                    <?php if(is_array($resume['label'])): $i = 0; $__LIST__ = $resume['label'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; if($vo != null): ?><span class="itembq"><span class="resume_label"><?php echo ($vo); ?></span><i class="mrl10 icon-remove"></i></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<input type="text" class="form-control bqinput bqcontent" maxlength="20px">
								<a href="javascript:void(0)" class="addgw" id="addbq" style="vertical-align: -webkit-baseline-middle;margin-left: 10px;">+添加标签</a>
							</div>
						</div>
					</div>
					</div>
				</div>
		    	<div style="padding: 15px 0px 0px 20px; background: rgb(255, 255, 255); min-height: 492.48px;" id="left-content">
					<ul class="nav nav-tabs" id="left_list" style="height:40px;">
						<li><a href="#tab3" data-toggle="tab" type="tab3">简历原件</a></li>
						<li class="active" ><a href="#tab1" data-toggle="tab" type="tab1">人才详情</a></li>
						<li><a href="#tab4" data-toggle="tab" type="tab4">参与项目</a></li>
						<li><a href="#tab5" data-toggle="tab" type="tab5">备注</a></li>
						<li><a href="#tab6" data-toggle="tab" type="tab6" style="display: none;">简历日志</a></li>
						<li><a href="#tab2" data-toggle="tab" type="tab2">附件</a></li>
					</ul>
					<div class="tab-content ">
						<div class="tab-pane in active " id="tab1">
							<div class="panel-body">
								<div class="ibox-content gray-log" style="border: none;padding: 10px 20px;">
									基本信息
								</div>
								<div class="form-horizontal view-group " >
									<div class="form-group">
										<label class="col-lg-2 control-label">性别</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["sex"]); ?>
											</p>
										</div>
										<label class="col-lg-2 control-label">目前年薪</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["curSalary"]); ?>万
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">出生年月</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo (date('Y-m',$resume["birthday"])); ?>
											</p>
										</div>
										<label class="col-lg-2 control-label">目前公司</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["curCompany"]); ?>
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">电话</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["telephone"]); ?>
											</p>
										</div>
										<label class="col-lg-2 control-label">目前职位</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["curPosition"]); ?>
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">邮箱</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["email"]); ?>
											</p>
										</div>
                                        <label class="col-lg-2 control-label">目前状态</label>
                                        <div class="col-lg-4">
                                            <p class="form-p">
                                                <?php echo ($resume["curStatus"]); ?>
                                            </p>
                                        </div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">学历</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["edu"]); ?>
											</p>
										</div>
										<label class="col-lg-2 control-label">目前城市</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["location"]); ?>
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">毕业学校</label>
										<div class="col-lg-4">
											<p class="form-p">
												重庆电子科技大学
											</p>
										</div>
										<label class="col-lg-2 control-label">意向城市</label>
										<div class="col-lg-4">
											<p class="form-p">
												<?php echo ($resume["intentCity"]); ?>
											</p>
										</div>
									</div>
									<!--<div class="form-group">-->
										<!--<label class="col-lg-2 control-label">目前状态</label>-->
										<!--<div class="col-lg-10">-->
											<!--<p class="form-p">-->
												<!--<?php echo ($resume["curStatus"]); ?>-->
											<!--</p>-->
										<!--</div>-->
									<!--</div>-->
									<div class="form-group">
										<label class="col-lg-2 control-label">行业</label>
										<div class="col-lg-10">
											<p class="form-p">
												<?php if(is_array($resume["industry"])): $i = 0; $__LIST__ = $resume["industry"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="label label-warning" style="margin-right: 5px;"><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
												<!--<span class="label label-warning">电子/互联网</span>-->
											</p>
										</div>
									</div>
									<div class="form-group">
										<label class="col-lg-2 control-label">职能</label>
										<div class="col-lg-10">
											<p class="form-p">
												<?php if(is_array($resume["job_class"])): $i = 0; $__LIST__ = $resume["job_class"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="label label-primary" style="margin-right: 5px;"><?php echo ($vo); ?></span><?php endforeach; endif; else: echo "" ;endif; ?>
												<!--<span class="label label-primary">政府研发</span>-->
											</p>
										</div>
									</div>
								</div>

								<div class="ibox-content gray-log contenttitle">
									工作经历
								</div>
								<div class="col-lg-12 contentview">
									<?php if(is_array($resume_work)): $i = 0; $__LIST__ = $resume_work;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="msg_item">
										<p>
											<span class="co3f16"><?php echo ($vo["company"]); ?></span>
											<span class="co9f16 ml10"><?php echo ($vo["jobPosition"]); ?></span>
											<span class="co9f13 fright"><?php echo (date("Y-m",$vo["starttime"])); ?> 至 <?php echo (date("Y-m",$vo["endtime"])); ?></span>
										</p>
										<p>
											<span class="co9f14">所在部门:</span>
											<span class="co3f14"><?php echo ($vo["depart"]); ?></span>
										</p>
										<p>
											<span class="titlebb">公司介绍</span>
										</p>
										<div class="co6f13 m_b_10"><?php echo ($vo["companyDes"]); ?></div>
										<p>
											<span class="titlebb">职责描述</span>
										</p>
										<div class="co6f13 m_b_10"><?php echo ($vo["duty"]); ?></div>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="ibox-content gray-log contenttitle">
									项目经历
								</div>
								<div class="col-lg-12 contentview">
									<?php if(is_array($resume_project)): $i = 0; $__LIST__ = $resume_project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="msg_item">
										<p>
											<span class="co9f13"><?php echo (date("Y-m",$vo["starttime"])); ?> 至 <?php echo (date("Y-m",$vo["endtime"])); ?></span>
											<span class="co3f16 ml10"><?php echo ($vo["proName"]); ?></span>
										</p>

										<p>
											<span class="co9f14">项目职位:</span>
											<span class="co3f14"><?php echo ($vo["proOffice"]); ?></span>
										</p>
										<p>
											<span class="co9f14">所在公司:</span>
											<span class="co3f14"><?php echo ($vo["proCompany"]); ?></span>
										</p>
										<p>
											<span class="co9f14">项目描述:</span>
											<span class="co3f14"><?php echo ($resume["proDes"]); ?></span>
										</p>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="ibox-content gray-log contenttitle">
									教育经历
								</div>
								<div class="col-lg-12 contentview">
									<?php if(is_array($resume_edu)): $i = 0; $__LIST__ = $resume_edu;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><p>
											<span class="school"><?php echo ($vo["schoolName"]); ?></span>
											<span class="time">(<?php echo (date("Y-m",$vo["starttime"])); ?>-<?php echo (date("Y-m",$vo["endtime"])); ?>)</span>
											<span class="major"><?php echo ($vo["majorName"]); ?></span>
											<span class="major"><?php echo ($vo["degree"]); ?></span>
										</p><?php endforeach; endif; else: echo "" ;endif; ?>
								</div>
								<div class="ibox-content gray-log contenttitle">
									优劣势分析
								</div>
								<div class="col-lg-12 contentview"><?php echo ($resume["evaluate"]); ?></div>
								<div class="ibox-content gray-log contenttitle">
									技能
								</div>
								<div class="col-lg-12 contentview"><?php echo ($resume["skill"]); ?></div>
								<div class="ibox-content gray-log contenttitle">
									语言能力
								</div>
								<div class="col-lg-12 contentview">
                                    <?php echo ($resume["language"]); ?>
								</div>

							</div>
							<div class="panel-body ">
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
							</div>
						</div>
						<div class="tab-pane fade back_box" id="tab3">
							<div class="panel-body">
								 <div class="ibox">
								   <?php if($resume['url']): ?><input type="hidden" value="<?php echo ($resume["url"]); ?>" id="resumeurl">
                                       <body onload="load()">
                                       <iframe id="iframe" style="width: 100%;min-height:1000px;"></iframe>
                                       </body>
									<?php else: ?>
                                       <div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div><?php endif; ?>
                                 </div>
							</div>
						</div>
						<div id="tab4"  class="tab-pane">
							<div class="panel-body" style="padding-left: 0px;">
								<div class="ibox">
									<div class="tab-content">
										<div id="st1" class="tab-pane fade in active tab-content">
											<div class="title-bar" style="position: relative;z-index: 99;display: none;">
												<div class="row  clearfix" id="title-hide" style="display: block;">
													<input type="hidden" class="select_arr" value="">
													<ul class="breadcrum pull-left">
														<li>已选中&nbsp;<span class="icheck_num">1</span>&nbsp;项</li>
														<li>
															<a class="add_customer" href="javascript:void(0)"  rel="removecc">&nbsp;从CallList移除</a>
															<a class="add_customer" href="javascript:void(0)"  rel="tjgw">&nbsp;推荐给顾问面试</a>
														</li>
														<li class="last_li" style="bottom: 10px;"><big><a class="fa fa-times pull-right" id="back-show"></a></big></li>
													</ul>
												</div>
											</div>
											<table class="table select-table table-bordered">
												<tr class="tabTh" style="background-color:#f9fafc;">
													<td style="text-align:right;background-color:#f9fafc;padding:14px;color:#999;border-right: none;">项目阶段</td>
													<td style="text-align:left;background-color:#f9fafc;padding:14px;color:#999;border-left: none;"></td>
													<td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">项目名称</td>
													<td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">所属客户</td>
													<td style="text-align:center;background-color:#f9fafc;padding:14px;color:#999">跟进人</td>
													<td style="border-right: 1px solid #e7eaec;text-align:center;background-color:#f9fafc;padding:14px;color:#999">最近操作时间</td>
												</tr>
												<tbody>
												<?php if(is_array($project)): $i = 0; $__LIST__ = $project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
														<td style="text-align:center;padding:14px;color:#666;border-right: none;" colspan="2"><input type="button" class="btn btn-primary btn-sm slidebar-nav" value="<?php echo ($process[$vo['status']]); ?> >" style="width: 80px;" data-id="<?php echo ($vo['id']); ?>"></td>
														<td style="text-align:left;padding:14px;color:#666;border-left: none;display: none">
															<span class="icosgj">
																 <embed src="/Public/img/svg/yijieting.svg" width="30px" height="30px" type="image/svg+xml" pluginspage="http://www.adobe.com/svg/viewer/install/">
																<div class="beizhus"></div>
															</span>
															<span class="icosgj">
																<embed src="/Public/img/svg/ztgenjin.svg" width="30px" height="30px" type="image/svg+xml" pluginspage="http://www.adobe.com/svg/viewer/install/">
																<div class="beizhus">暂停跟进</div>
															</span>
															<span class="icosgj">
																<embed src="/Public/img/svg/mubiao.svg" width="30px" height="30px" type="image/svg+xml" pluginspage="http://www.adobe.com/svg/viewer/install/">
																<div class="beizhus">不是目标候选人</div>
															</span>
														</td>
														<td style="text-align:center;padding:14px;color:#666;"><a  href="<?php echo U('business/view','id='.$vo['project_id']);?>" style="margin-right: 5px;"><?php echo ($vo["business_name"]); ?></a></td>
														<td style="text-align:center;padding:14px;color:#666;"><a  href="<?php echo U('customer/view','id='.$vo['com_id']);?>" style="margin-right: 5px;"><?php echo ($vo["customer_name"]); ?></a></td>
														<td style="text-align:center;padding:14px;color:#666;">
															<a class="role_info" rel="<?php echo ($vo['tracker']); ?>" href="javascript:void(0)" style="margin-right: 5px;"><?php echo ($vo["user_name"]); ?></a>
														</td>
														<td style="text-align:center;padding:14px;color:#666;"><?php echo (date('Y-m-d H:i:s',$vo["addtime"])); ?></td>
													</tr><?php endforeach; endif; else: echo "" ;endif; ?>

												</tbody>
											</table>
										</div>
									</div>
								</div>
							</div>
						</div>
						<div class="tab-pane " id="tab2">
							<div class="panel-body">
								<div class="header1">
									<div class="pull-left">
										<a href="javascript:void(0);" type="button" class="add_file btn btn-primary"><i class="fa fa-upload"></i>&nbsp;&nbsp;上传</a>
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
											<td>上传时间</td>
                                            <td>操作</td>
										</tr>
										<?php if(is_array($info["file"])): $i = 0; $__LIST__ = $info["file"];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
												<td>
													<img src="__PUBLIC__/productImg/<?php echo ($vo['pic']); ?>" alt="">&nbsp;&nbsp;&nbsp;
													<a <?php if(in_array(getExtension($vo['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($vo['file_path']); ?>" data-litebox-group="group-<?php echo ($info['resume_id']); ?>" title="点击查看大图"<?php else: ?>href="javascript:;" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);"<?php endif; ?>><?php echo ($vo["name"]); ?></a>
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
														<!--<a href="javascript:void(0);" rel="<?php echo ($vo['file_id']); ?>" class="change_file" data-id="<?php echo ($_GET['id']); ?>">替换</a>-->
														<a href="javascript:void(0);" rel="<?php echo ($vo['file_id']); ?>" class="del_file"><?php echo L('DELETE');?></a>
														<a href="javascript:;" file="<?php echo ($vo["file_path"]); ?>" filename="<?php echo ($vo["name"]); ?>" onclick="filedown(this);">下载</a>
													</td><?php endif; ?>
											</tr><?php endforeach; endif; else: echo "" ;endif; ?>

									</table><?php endif; ?>
							</div>
						</div>
						<div id="tab5" class="tab-pane fade in">
							<div class="panel-body">
								<?php if($content != 'resource'): ?><div id="form-div">
										<form id="add-form" action="<?php echo U('Log/add');?>" method="post">
											<input type='hidden' name="r" value="rResumeLog"/>
											<input type='hidden' name="module" value="resume"/>
											<input type='hidden' id="resume_id" name="id" value="<?php echo ($resume['eid']); ?>"/>
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
													<td style="border-top:0;">&nbsp;&nbsp;</td>
													<td class="tdleft" style="width:120px;">快捷添加：</td>
													<td style="width:300px;">
														<select id="replay_list" class="form-control select2" onchange="selectReply()" style="width:80%;float:left;">
															<option value="">--请选择--</option>
															<?php if(is_array($reply_list)): $i = 0; $__LIST__ = $reply_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['content']); ?>" rel="<?php echo ($vo['status_id']); ?>"><?php echo ($vo['str_content']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
														</select>&nbsp;&nbsp;
														<a href="javascript:void(0)" id="setting_reply_dialog" title="管理快捷跟进模板" style="line-height: 30px;margin-left:10px;"><i class="fa fa-cog" style="color:#999;"></i></a>
													</td>
													<td  style="border-top:0;">&nbsp;&nbsp;</td>
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
						<div class="tab-pane " id="tab6">
							<div class="panel-body">
								<div class="header1">
									<div style="clear:both;"></div>
								</div>
								<table class="table product-table">
										<!--无数据的时候显示-->
									<div style="background-color:#fff;display: none;"><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div></div>
									<tr>
										<td>字段</td>
										<td>操作人</td>
										<td>操作时间</td>
									</tr>
									<tr>
										<td>
											简历创建
										</td>
										<td>
											<a href="#">操作人</a>
										</td>
										<td class="tdleft">
											2018-12-12 10:21
										</td>
									</tr>
								</table>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tabs-container" style="width: 29%;float: left;background: #e6e9f0;margin-left: 1%;min-height:632px;display: none">
				<div class="title-bar" style="float: left;width: 100%;">
					<div class="row " id="title-show" style="border-bottom: 1px solid #e7eaec;padding-bottom: 10px;">
						<span style="color: #333333;font-size: 14px;margin-left: 10px;">最新备注</span>
						<div class="btn-group pull-right">
							<i class="fa fa-edit (alias)" id="editbtn" style="margin-right: 15px;cursor: pointer;font-size: 20px;"></i>
						</div>
					</div>
					<div class="row beizhucontent" style="min-height:50px;padding: 20px;">
						<div style="padding-bottom: 10px;">ququququ</div>
						<span class="btn-group pull-right">
							<span>2018-12-12 </span>
							<a href="#" style="margin-left: 5px;">张航宇</a>
						</span>
					</div>
					<form method="post" action="#">
						<div class="form-group editerea" style="display: none;">
							<div class="col-sm-12" style="padding:0">
								<textarea class="form-control textedit" style="height:84px;border:0;outline:0;border-bottom:1px solid #ddd;resize:none" name="note"></textarea>
								</div>
							<div class="col-sm-12" style="text-align: right;">
								<button class="btn btn-info" type="submit"><i class="fa fa-sms"></i>保存</button>
								<span class="btn btn-default cancel" type="button"><i class="fa fa-sms"></i>取消</span>
							</div>
						</div>
					</form>


				</div>
				<div style="background: rgb(255, 255, 255); min-height: 492.48px;width: 100%;float: left;" id="left-content">
					<table class="table table-hover table-striped table_thead_fixed">
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
						<tr>
							<td><a href="#">田浩</a></td>
						</tr>
					</table>
				</div>
			</div>

			</div>
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
<div class="" style="display:none;" id="dialog-role-info" title="<?php echo L('EMPLOYEE_INFORMATION');?>">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<div class="" style="display:none;" id="dialog-mark" title="添加备注信息">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div style="display:none" id="dialog-log" title="加入项目">
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
<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>
<script type="text/javascript">
//页面加载时执行Tab start
$(function(){
	var thisId = window.location.hash;
	var atype = thisId.substr(1);
	$('#left_list a[type="'+atype+'"]').tab('show');
 });


$(function () {
    var resumeurl=$("#resumeurl").val();
    var iframe;
    iframe = document.getElementById("iframe");
    if(resumeurl){
        iframe.src = "//"+resumeurl;
    }

})
// 页面加载时执行Tab end
$('#left_list a').click(function (e) {
	var maodian = '#'+$(this).attr('type');
	url_jump(maodian);
});
function url_jump(maodian){
    var url = "<?php echo U('product/view','id='); echo ($resume[eid]); ?>"+maodian;
    window.history.replaceState({},0,'http://'+window.location.host+url);
}

//初始化图片查看插件
$('.litebox').liteBox({
  revealSpeed: 400,
  background: 'rgba(0,0,0,.8)',
  overlayClose: true,
  escKey: true,
  navKey: true,
  errorMessage: '图片加载失败.'
});
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

//排序
$(".ui-sortable").sortable({
	connectWith: ".box-secondary",
	stop:function() {
		var images_arr = new Array();
		$(".box-secondary").each(function(key, val){
			images_arr.push($(val).attr('rel'));
		});

		$.post('<?php echo U("product/sortImg");?>',{images_arr:images_arr.join(',')},'json');
	}
});
<?php if(C('ismobile') == 1): ?>width=$('.container').width() * 0.9;<?php else: ?>width=800;<?php endif; ?>
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
$("#dialog-file").dialog({
    autoOpen: false,
    modal: true,
	width: width,
	maxHeight: 400,
	position: ["center",100],
	buttons: {
		"确定": function () {
		   location.reload();
		},
		"取消": function () {
			$(this).dialog("close");
		}
	}
});
$(".add_file").click(function(){
	$('#dialog-file').dialog('open');
	$('#dialog-file').load('<?php echo U("file/add","r=RResumeFile&module=resume&id=".$resume[eid]);?>');
});
$(".more").click(function(){
	log_id = $(this).attr('rel');
	$('#llog_'+log_id).attr('class','');
	$('#slog_'+log_id).attr('class','hide');
});


$(".log_calllist").click(function(){
    $('#dialog-log').dialog('open');
    $('#dialog-log').load('<?php echo U("log/resume_project","r=RCustomerLog&module=customer&id=");?>'+$(this).attr('rel'));
});


$("#dialog-log").dialog({
    autoOpen: false,
//    modal: true,
    width: 750,
//    minHeight:300,
    maxHeight: 500,
    position: ["center",100],
    buttons: {
        "确定": function () {
            var log_content = $('#log_content').val();
            if(log_content == ""){
                alert_crm("请填写沟通记录！");
                $("#log_content").focus();
                return false;
            }
            var status_id = $('#status_id option:selected').val();
            if ($('#save_reply').is(':checked') && status_id == '') {
                alert_crm("请选择跟进类型！");
                $("#status_id").focus();
                return false;
            }
            $.ajax({
                type:'post',
                url: "<?php echo U('Log/add_fine_project');?>",
                data:$('#dialog_form1').serialize(),
                async: false,
                success: function (data) {
                    if (data.status == 1) {
                        swal("操作成功！", "该人选成功加入项目！", "success");
                        $("#dialog-log").dialog("close");
                        // location.reload();
                    } else {
                        swal({
                            title: "操作失败！",
                            text:data.info,
                            type: "error"
                        });
                        return false;
                    }
                },
                dataType: 'json'
            });
        },
        "取消": function () {
            $(this).dialog("close");
        }
    },
    close: function() {
        $(this).html('');
    }
});

$(".del_beizhu").click(function () {
    var bid=$(this).attr("rel");
    swal({
        title: "您确定要删除这条备注信息吗？",
        text: "删除后将无法恢复，请谨慎操作！",
        type: "warning",
        showCancelButton: true,
        confirmButtonColor: "#DD6B55",
        confirmButtonText: "是的，我要删除！",
        cancelButtonText:'让我再考虑一下…',
        closeOnConfirm:false,
        closeOnCancel:false
    },function (isConfirm) {
        if (isConfirm) {
            $.ajax({
                type:'get',
                url: "url"+bid,
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
    })
})

$('.del_product').click(function(){
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
	            url: "<?php echo U('file/delete','r=RFileProduct&id=');?>"+file_id,
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

// 下架
$('#delete_product').click(function(){
	var product_id = "<?php echo ($product['product_id']); ?>";
	swal({
		title: "温馨提示",
		text: "您确定要下架这个产品吗？",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "是的，我要下架！",
        cancelButtonText:'让我再考虑一下…',
        closeOnConfirm:false,
        closeOnCancel:false
	},
	function(isConfirm){
        if (isConfirm) {
        	$.ajax({
	            type:'get',
	            url: "<?php echo U('product/delete','id=');?>"+product_id,
	            async: false,
	            success: function (data) {
					if (data.status == 1) {
						swal("下架成功！", "您已经下架了该产品！", "success");
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
            swal("已取消","您取消了下架操作！","error");
        }
    });
});

//上架产品
$('#revert_product').click(function(){
	var product_id = "<?php echo ($product['product_id']); ?>";
	swal({
		title: "温馨提示",
		text: "您确定要上架这个产品吗？",
		type: "warning",
		showCancelButton: true,
		confirmButtonColor: "#DD6B55",
		confirmButtonText: "是的，我要上架！",
        cancelButtonText:'让我再考虑一下…',
        closeOnConfirm:false,
        closeOnCancel:false
	},
	function(isConfirm){
        if (isConfirm) {
        	$.ajax({
	            type:'get',
	            url: "<?php echo U('product/revert','product_id=');?>"+product_id,
	            async: false,
	            success: function (data) {
					if (data.status == 1) {
						swal("上架成功！", "您已经上架了该产品！", "success");
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
            swal("已取消","您取消了下架操作！","error");
        }
    });
});

$(".addmark").click(function () {
    $('#dialog-mark').dialog('open');
    $('#dialog-mark').load("<?php echo U('product/addmark');?>");
})
$(".editmark").click(function () {
    $('#dialog-mark').dialog('open');
    $('#dialog-mark').load("<?php echo U('product/addmark');?>");
})

$("#dialog-mark").dialog({
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
                $('#resume_id').val(item);
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

$("#addbq").click(function () {
    var addbq=$(".bqcontent").val();
    var num=$(".itembq").length;
    if(num>=5){
        alert_crm("最多添加5个标签！");
        $(".bqcontent").val("");
        return false;
    }
    if(addbq==""){
        alert_crm("标签不能为空！");
        return false;
    }
    var flag=0;
    $(".itembq").each(function () {
        var _this=$(this);
        if(addbq==_this.text()){
            flag=1;
        }
    })
    if(flag==1){
        alert_crm("不能添加相同标签！");
        $(".bqcontent").val("");
        return false;
    }


    $.ajax({
		type:"post",
		url:"<?php echo U('product/addbq');?>",
		data:{
            addbq:addbq,
			eid:"<?php echo ($resume['eid']); ?>"
		},
		success:function (data) {
            $(".yibiqiao").append('<span class="itembq">'+addbq+'<i class="mrl10 icon-remove"></i></span>');
            $(".bqcontent").val("");
        }
	})


})

//删除标签
$("body").on("click",".icon-remove",function () {
    $(this).closest(".itembq").remove();
    var resume_label = Array();
    $(".resume_label").each(function () {
        resume_label.push($(this).html());
    })
    resume_label = resume_label.join(",");

    $.ajax({
		type:"post",
		url:"<?php echo U('product/dellable');?>",
		data:{
            resume_label:resume_label,
			eid:"<?php echo ($resume['eid']); ?>"
		}
	})

})

	$("#editbtn").click(function () {
		$(".beizhucontent").hide();
		$(".editerea").show();
		$(".textedit").focus();
    })

	$(".cancel").click(function () {
        $(".textedit").val("");
        $(".beizhucontent").show();
        $(".editerea").hide();
    })

//项目详情阶段操作
var timer;
$(document).on('click','.slidebar-nav',function(){

    var customer_id = $(this).attr('data-id');
    clearTimeout(timer);
    timer=setTimeout(function () {

        if($("#right-sidebar-log").css('right') != '0px'){
            $("#right-sidebar-log").animate({right:'0px'}, 600);
        }
        $('#sidebar-container').load("/index.php?m=business&a=listajax&id="+customer_id);
    },1000);
});

$(document).on("click",".closeslide",function () {
    if($("#right-sidebar-log").css('right') == '0px'){
        $("#right-sidebar-log").animate({right:'-40%'}, 400);
    }
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

	<div class="sidebar-container" id="sidebar-container">

	</div>
</div>
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



    var resume_id = "<?php echo ($resume_id); ?>";

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

            log_type = 'RResumeLog';
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
            $("#resume_id").val(resume_id);
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
                        url: "<?php echo U('file/delete','r=RResumeFile&id=');?>"+file_id,
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