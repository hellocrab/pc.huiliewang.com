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
	<!--<link type="text/css" rel="stylesheet" href="__PUBLIC__/css/background-detail.css">-->
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
					<a data-toggle="tooltip" data-placement="right" data-original-title="报表分析" <?php if($action_name == 'collection' || $action_name == 'analytics' || $action_name == 'record'|| $action_name == 'projecttrend'|| $action_name == 'resume'|| $action_name == 'project'|| $action_name == 'customer'|| ($action_name == 'department' && $module_name == 'leads')|| $action_name == 'business'|| $action_name == 'achievement'|| $action_name == 'weektrend'|| $action_name == 'monthtrend' || $action_name == 'yieldrate' || $action_name == 'departmentrate'): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('leads','analytics')): ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php elseif(checkPerByAction('customer','analytics')): ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php elseif(checkPerByAction('business','analytics')): ?>href="<?php echo U('business/analytics','content_id=1');?>"<?php elseif(checkPerByAction('finance','analytics')): ?>href="<?php echo U('finance/analytics','content_id=1');?>"<?php elseif(checkPerByAction('product','analytics')): ?>href="<?php echo U('product/analytics','content_id=1');?>"<?php elseif(checkPerByAction('log','analytics')): ?>href="<?php echo U('log/analytics','content_id=1');?>"<?php else: ?>href="<?php echo U('leads/analytics','content_id=1');?>"<?php endif; ?> ><i class="fa fa-area-chart"></i><span class="menu_code">报表</span></a>
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
					<a data-toggle="tooltip" data-placement="right" data-original-title="背景调查" <?php if($module_name == 'background' && $action_name != 'background'): ?>class="active"<?php endif; ?> <?php if(checkPerByAction('background','index')): ?>href="<?php echo U('background/index');?>"<?php elseif(checkPerByAction('examine','index')): ?>href="<?php echo U('examine/index');?>"<?php elseif(checkPerByAction('knowledge','index')): ?>href="<?php echo U('knowledge/index');?>"<?php elseif(checkPerByAction('announcement','index')): ?>href="<?php echo U('announcement/index');?>"<?php elseif(checkPerByAction('sign','index')): ?>href="<?php echo U('sign/index');?>"<?php elseif(checkPerByAction('background','index')): ?>href="<?php echo U('background/index');?>"<?php elseif(checkPerByAction('background','index')): ?>href="<?php echo U('background/index');?>"<?php endif; ?>><i class="fa fa-user"></i><span class="menu_code">背调</span></a>
				</li>
				<?php endif; ?>
				<?php if (in_array('log',$new_module_list)): ?>
				<li>
					<a data-toggle="tooltip" data-placement="right" data-original-title="回款" <?php if(($module_name == 'return' || $module_name == 'return' )): ?>class="active"<?php endif; ?> href="<?php echo U('Return/index');?>"><i class="fa fa-credit-card"></i><span class="menu_code">回款</span></a>
				</li>
				<?php endif; ?>
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
					<?php elseif($module_name == 'background' || $module_name == 'index'): ?>
					<li <?php if($action_name == 'index'||$action_name == 'add'||$action_name == 'add_more'||$action_name == 'edit'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('background/index');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;对内背景调查</a></li>
					<li <?php if($action_name == 'index_external'||$action_name == 'add_external'||$action_name == 'add_more_external'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('background/index_external');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;对外背景调查</a></li>
					<?php elseif($module_name == 'return' || $module_name == 'index'): ?>
					<li <?php if($action_name == 'index'||$action_name == 'backrecord'||$action_name == 'ticketrecord'||$action_name == 'add'): ?>class="active"<?php endif; ?> ><a href="<?php echo U('return/index');?>"><span class="fa fa-inbox" style="display:inline"></span>&nbsp;&nbsp;回款</a></li>
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

<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/PCASClass.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/docode.js" type="text/javascript"></script>
<!-- nice-scroll -->
<script src="__PUBLIC__/style/js/plugins/nice-scroll/jquery.nicescroll.min.js" type="text/javascript"></script>
<script type="text/javascript" src="__PUBLIC__/style/js/TableFreeze.js"></script>
<script src="__PUBLIC__/js/mxcrm_more.js" type="text/javascript"></script>
<!-- Select2 -->
<script src="__PUBLIC__/style/js/plugins/jsTree/jstree.min.js"></script>
<link href="__PUBLIC__/style/css/plugins/jsTree/style.min.css" rel="stylesheet">
<style>
    body{
        overflow-y: hidden;
    }
    .option{padding-left:-30px;}
    #oDivL_tab_Test3{background-color: #fff;}
    .status_ico{
        position: absolute;
        top: -46px;
        background: #FFF;
        border: 1px solid #AAA;
        border-radius: 5px;
        padding: 7px;
        width: 220px;
        display: inline-block;
        display: none;
        left: 50%;
        margin-left: -159px;
        z-index: 101;
    }
    .status_ico:before {
        content: "";
        width: 0;
        height: 0;
        border-left: 10px solid transparent;
        border-right: 10px solid transparent;
        border-top: 10px solid #AAA;
        position: absolute;
        bottom: -10px;
        left: 100px;
    }
    .status_ico:after{
        content: "";
        width: 0;
        height: 0;
        border-left: 9px solid transparent;
        border-right: 9px solid transparent;
        border-top: 9px solid #FFF;
        position: absolute;
        bottom: -9px;
        left: 101px;
    }
    .LocalDataUIB{
        margin-left: -4px;
    }
    .LocalDataUIB-input{
        left: 5px;
    }
</style>
<script>
    $(function(){
        var scroll_width = 10;
        $("#table_div").height(window.innerHeight-$("#table_div").offset().top-$("#tfoot_div").height()-parseInt($("#table_container").css("padding-bottom").replace("px",""))-10);
        $(window).resize(function(){
            $("#table_div").height(window.innerHeight-$("#table_div").offset().top-$("#tfoot_div").height()-parseInt($("#table_container").css("padding-bottom").replace("px",""))-10);
            $("#oDivL_tab_Test3").height($("#table_div").height()-1).width($("#oTableLH_tab_Test3").width());
            $("#oDivH_tab_Test3").height($("#oTableLH_tab_Test3").height()).width($("#table_div").width());
        })
        $(".nicescroll").niceScroll({
            cursorcolor: "#999",//#CC0071 光标颜色
            cursoropacitymax: 0.4, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
            touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
            cursorwidth: scroll_width+"px", //像素光标的宽度
            cursorborder: "0", //     游标边框css定义
            cursorborderradius: "3px",//以像素为光标边界半径
            autohidemode: false, //是否隐藏滚动条
            zindex:100,
            background:"#F3F3F5",//滚动条背景色
        });
        $("#tab_Test3").FrozenTable(1,0,3);
        $("#oDivL_tab_Test3").height($("#table_div").height()-scroll_width-1).width($("#oTableLH_tab_Test3").width()).css({'zIndex':9});
        $("#oDivL_tab_Test3").css({"background-color":"#fff","border-right":"1px solid #e7eaec"});
        $("#oTableLH_tab_Test3").css({"border-right":"1px solid #e7eaec"});
        $("#oDivH_tab_Test3").height($("#oTableLH_tab_Test3").height()).width($("#table_div").width()-scroll_width).css({'zIndex':9});

        $("#left_list").height(window.innerHeight-$("#left_list").offset().top-30);
        $(window).resize(function(){
            $("#left_list").height(window.innerHeight-$("#left_list").offset().top-30);
        })
    })
</script>
<div style="display:none" id="dialog-log" title="加入项目">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
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
    <div class="row" >
        <div class="col-md-12">
            <div class="ibox float-e-margins">
                <div class="title-bar" style="position: relative;z-index: 99;">
                    <div class="row  clearfix" id="title-hide" style="display:none;">
                        <ul class="breadcrum pull-left">
                            <li>已选中&nbsp;<span id="icheck_num"></span>&nbsp;项</li>
                            <li>
                                <!--<span><a href="javascript:void(0);" class="link excelExport"><i class="fa fa-download"></i>&nbsp;导入</a></span>-->
                            </li>
                            <li class="last_li"><big><a class="fa fa-times pull-right" id="back-show"></a></big></li>
                        </ul>
                    </div>
                    <div class="row " id="title-show" >
                        <form class="form-inline" id="" action="" method="get">
                            <ul class="breadcrum pull-right" style="margin-bottom: 0px">
                                <div class="btn-group ">
                                    <button data-toggle="dropdown" class="btn btn-primary dropdown-toggle" aria-expanded="false">操作 <span class="caret"></span>
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a id="import_excel" class="link" href="javascript:void(0);"><i class="fa fa-upload"></i>&nbsp;导入</a></li>
                                        <!--<li><a href="javascript:void(0);" class="link excelExport"><i class="fa fa-download"></i>&nbsp;导出</a></li>-->
                                    </ul>
                                </div>
                            </ul>
                        </form>

                        <form id="searchForm" class="form-group" method="get" style="margin-bottom: 0px;">
                            <input type="hidden" name="m" value="integral" />
                            <input type="hidden" name="a" value="index" />
                            <div class="nav pull-left" style="margin:2px 0 0 15px;width: 165px;">
                                <div class="input-group">
                                    <select class="form-control select2" style="min-width:165px;max-width: 165px;height: 0px;" name="position_info" id="position_info" >
                                        <option class="all" value="all">--请选择升降级状态--</option>
                                        <option class="all" value="0" <?php if(($_GET['position_info'] == 0) and is_numeric($_GET['position_info'])): ?>selected<?php endif; ?>>正常</option>
                                        <option class="all" value="1" <?php if($_GET['position_info'] == 1): ?>selected<?php endif; ?>>升级</option>
                                        <option class="all" value="-1" <?php if($_GET['position_info'] == -1): ?>selected<?php endif; ?>>降级</option>
                                    </select>
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
                        </form>
                    </div>
                </div>
                <div class="row" style="margin: 0;" >
                    <div class="pull-left" style="width:16.222%;color: #000;display: none;">
                        <div class="ibox-title clearfix" style="padding-top: 4px;">
                            <div class="detail-title clearfix">
                                <div class="pull-left all-inline" >
                                    <a href="<?php echo U('product/index');?>">
                                        <span class="fa fa-inbox" style="font-size:18px;color:#667B8F"></span>
                                        <span style="color:#667B8F">全部人才</span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="ibox-content" style="min-height: 300px;border-top: none;">
                            <div id="left_list" class="full-height-scroll">
                                <div id="knowledge-tree" >
                                    <?php echo ($tree_code); ?>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="pull-right" style="width:100%">
                        <div class="ibox-content clearfix" id="table_container" style="z-index: 1;">
                            <form id="form1" action="" method="Post" style="position:relative;">
                                <div id="table_div" class="nicescroll">
                                    <table class="table table-hover table-striped table_thead_fixed" id="tab_Test3">
                                        <?php if($list == null): ?><div style="background-color:#fff;"><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div></div>
                                            <?php else: ?>
                                            <tr id="childNodes_num" class="tabTh">
                                                <td style="max-width: 60px;width:74px;padding:0 10px 0 7px;">
                                                    <div class="checkbox checkbox-primary">
                                                        <input type="checkbox" class="check_all"/>
                                                        <label for=""></label>
                                                    </div>
                                                </td>

                                                <td>姓名</td>
                                                <td>部门</td>
                                                <td>职级</td>
                                                <?php if(is_array($month_num)): $i = 0; $__LIST__ = $month_num;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><td><?php echo ($vo); ?></td><?php endforeach; endif; else: echo "" ;endif; ?>
                                                <td>周期业绩</td>
                                                <td>升降级提示</td>
                                                <td>操作</td>
                                            </tr>
                                            <tbody>
                                            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="controls_tr">
                                                    <td>
                                                        <div class="checkbox checkbox-primary">
                                                            <input name="product_id[]" class="check_list" type="checkbox" value="<?php echo ($vo["eid"]); ?>" <?php if($vo['is_deleted'] == '0'): ?>rel1="0"<?php else: ?>rel1="1"<?php endif; ?>/>
                                                            <label for=""></label>
                                                        </div>
                                                    </td>
                                                    <td data-id="<?php echo ($vo['user_id']); ?>" > <?php echo ($vo["full_name"]); ?></td>
                                                    <td><?php echo ($vo["department_name"]); ?></td>
                                                    <td><?php echo ($vo["rank_name"]); ?></td>
                                                    <?php if(is_array($month_yj)): $i = 0; $__LIST__ = $month_yj;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><td><input type="text" readonly="readonly" style="width: 70px;" value="<?php echo ($vo[$v]); ?>"></td><?php endforeach; endif; else: echo "" ;endif; ?>
                                                    <td><?php echo ($vo["total"]); ?></td>
                                                    <td>
                                                        <?php if($vo['position_info'] == -1 and ($vo['current_month'] == 6 or $vo['current_month'] == 12)): ?><a class="label label-danger jjstatus" style="color: white;" data-id="<?php echo ($vo['user_id']); ?>">取消降级 </a>
                                                            <?php elseif($vo['position_info'] == 1 ): ?><a class="label label-primary sjstatus" style="color: white;" data-id="<?php echo ($vo['user_id']); ?>">取消升级 </a>
                                                            <?php else: ?>
                                                            正常<?php endif; ?>
                                                    </td>
                                                    <td>
                                                        <input type="button" class="btn btn-xs  btn-info xiugai" value="修改" onclick="edittext(this)" >
                                                        <input type="button" class="btn btn-xs  btn-success baocun" value="保存" onclick="savetext(this)" style="display: none">
                                                    </td>
                                                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
                                            <tbody><?php endif; ?>
                                    </table>
                                </div>
                                <div id="tfoot_div" class="clearfix">
                                    <div class="clearfix" id="tfoot_page">
                                        <?php if($fields_search || $_GET['field']): ?><span class="pull-left" style="margin-left:25px;margin-top:10px;">本次搜索结果<span style="color:#F8AC59"> <?php echo ($count); ?> </span>条数据<a href="<?php echo U('product/index');?>" class="btn" style="background:#fff;border:1px solid #ccc;margin-left:10px;color:#999;" id="clearnumber">清除搜索条件</a></span><?php endif; ?>
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
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="" style="display:none;" id="dialog-import" title="导入数据">
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
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<link href="__PUBLIC__/css/litebox.css" rel="stylesheet">

<script type="text/javascript">
    /*让复选框默认取消选择*/
    $(':checkbox').prop('checked', false);

    $(".controls_tr").mouseenter(function(){
        $(this).find(".controls").show();
    }).mouseleave(function(){
        $(this).find(".controls").hide();
    });
    var url = "<?php echo U('product/getcurrentstatus');?>";
    var limit_size = 1000;
    var count = '<?php echo ($count); ?>';

    var ii = 1;

    if ("<?php echo C('isMobile');?>" == "1") {
        width = $('.container').width() * 0.9;
    } else {
        width = 800;
    }

    $("#dialog-role-info").dialog({
        autoOpen: false,
        modal: true,
        width: width,
        maxHeight: 550,
        position: ["center",100]
    });
    $("#dialog-import").dialog({
        autoOpen: false,
        modal: true,
        width: width,
        maxHeight: 400,
        position: ["center",100]
        // buttons: {
        // 	"确定": function () {
        // 		$('#excelimport_dialog').submit();
        // 		$(this).dialog("close");
        // 	},
        // 	"取消": function () {
        // 		$(this).dialog("close");
        // 	}
        // }
    });

    /*添加筛选条件*/
    var m = 1;
    $('#add_btn').click(function(){
        m += 1;
        $('#search_add').append('<div id="con_search_'+m+'" style="float:left;width:650px;padding-top:10px;margin:0px 10px 0 10px;"><div  id="rem_'+m+'" class="pull-left" style="line-height:30px;"><a href="javascript:void(0);" class="rem_search" rel="'+m+'" title="移除"><span class="fa fa-times-circle"></span></a></div>&nbsp;<ul class="nav pull-left" style="margin:0px 0 0 5px;width:620px"><li class="pull-left"><select id="field_'+m+'"  style="width:auto" class="form-control input-sm field_name new-select" onchange="changeCondition('+m+')" name=""><option class="" value="name">--请选择筛选条件--</option><?php if(is_array($field_list)): $i = 0; $__LIST__ = $field_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['form_type'] == 'p_box' && $v['field'] == 'category_id'): ?><option class="product_category" value="<?php echo ($v[field]); ?>" rel="product" ><?php echo ($v[name]); ?></option><?php else: ?><option class="<?php echo ($v['form_type']); ?>" value="<?php echo ($v['field']); ?>" rel="product" <?php if($vo['field'] == $v['field']): ?>selected="selected"<?php endif; ?>><?php echo ($v[name]); ?></option><?php endif; endforeach; endif; else: echo "" ;endif; ?><option class="role" value="owner_role_id"><?php echo L('PRINCIPAL');?></option><option class="date" value="create_time"><?php echo L('CREATION_TIME');?></option><option class="date" value="update_time"><?php echo L('MODIFICATION_TIME');?></option></select>&nbsp;&nbsp;</li><li class="pull-left" id="conditionContent_'+m+'"><select id="condition_'+m+'" style="width:auto" class="form-control input-sm new-select" name="condition" onchange="changeSearch()"><option value="contains"><?php echo L('INCLUDE');?></option><option value="not_contain">不包括</option><option value="is"><?php echo L('YES');?></option><option value="isnot"><?php echo L('ISNOT');?></option><option value="start_with"><?php echo L('BEGINNING_CHARACTER');?></option><option value="end_with"><?php echo L('TERMINATION_CHARACTER');?></option><option value="is_empty"><?php echo L('Mandatory');?></option><option value="is_not_empty">不为空</option></select>&nbsp;&nbsp;</li><li class="pull-left" id="searchContent_'+m+'"><input id="search_'+m+'" type="text" style="width:160px;" class="input-medium form-control input-sm search-query" name="search"/>&nbsp;&nbsp;</li></ul></div>');
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
        modal: true,
        width: 750,
        height: 500,
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
    });

    $('.sjstatus').click(function () {
        var _this = $(this);
        swal({
                title: "确定取消该员工的升级吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            },
            function () {
                var user_id = _this.attr("data-id");
                $.ajax({
                    type: "post",
                    url: "<?php echo U('integral/position_edit');?>",
                    data: {
                        user_id: user_id,
                        position_info: -1
                    },
                    success: function (data) {
                        if (data.status == 1) {
                            location = location;
                        }
                    }
                })
            });
    });
    $('.jjstatus').click(function () {
        var _this = $(this);
        swal({
                title: "确定取消该员工的降级吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            },
            function () {
                var user_id = _this.attr("data-id");
                $.ajax({
                    type: "post",
                    url: "<?php echo U('integral/position_edit');?>",
                    data: {
                        user_id: user_id,
                        position_info: 1
                    },
                    success: function (data) {
                        if (data.status == 1) {
                            location = location;
                        }
                    }
                });
            });
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

    $("#dosearch").click(function () {
        result = checkSearchForm();
        if (result) {
            $("#act").val('search');
            $("#searchForm").submit();
        }
    });

    $("#import_excel").click(function () {
        $('#dialog-import').dialog('open');
        $('#dialog-import').load('<?php echo U("integral/excelimport");?>');
    });
    $(".role_info").click(function () {
        $role_id = $(this).attr('rel');
        $('#dialog-role-info').dialog('open');
        $('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>' + $role_id);
    });

    //编辑人才状态效果
    $(function () {
        //点击效果
        $(".editstatus").click(function () {
            $(".status_ico").hide();
            $(this).next().show();
        })
        //点击确认按钮修改状态
        $(".status_btnedit").click(function () {
            var product_id=parseInt($(this).closest("tr").find(".check_list").val());
            var status=$(this).closest(".editable-controls").find("select option:selected").val();
            $.ajax({
                type: "post",
                url:"/index.php?m=product&a=editstatus&id="+product_id,
                data:{
                    product_id:product_id,
                    status:status
                },
                success:function (data) {
                    console.log(data);
                    swal("温馨提示！", "状态修改成功！", "success");
                    window.location=location;

                },
                error:function () {

                }
            })
        })
    })

    $(document).click(function(e){
        var _con = $('.editstatus,.editable-controls select');   // 设置目标区域
        if(!_con.is(e.target) && _con.has(e.target).length === 0){
            $(".status_ico").hide();
        };
    });

    $(".log_calllist").click(function(){
        $('#dialog-log').dialog('open');
        $('#dialog-log').load('<?php echo U("log/resume_project","r=RCustomerLog&module=customer&id=");?>'+$(this).attr('rel'));
        $.fn.modal.Constructor.prototype.enforceFocus = function() {};
    });

    $("#dialog-log").dialog({
        autoOpen: false,
        // modal: true,
        width: 750,
//      minHeight: 300,
        maxHeight: 500,
        position: ["center",100],
        buttons: {
            "确定": function () {

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

    $(".select2").select2();

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
    //文本框变为可编辑状态
    function edittext(data) {
        var tr = $($(data).parent().parent());
        var tdcount = tr.children().length-3;
        for (let i = 0;i<tdcount;i++){
            if (tr.children().eq(i).children().length>0&&tr.children().eq(i).children().length<2&&i>3){
                $(tr.children().eq(i).children().eq(0)).removeAttr('readonly');
            }
        }
        $($($(data).parent()).children().eq(1)).css('display','block');
        $(data).css('display','none');
    }
    //发送文本框值
    function savetext(data) {
        var tr = $($(data).parent().parent());
        var tdcount = tr.children().length - 2;
        var value = [];
        var postdata = {};
        for (let i = 0;i<tdcount;i++){
            if (tr.children().eq(i).children().length>0&&tr.children().eq(i).children().length<2&&i>3){
                value[i]=$(tr.children().eq(i).children().eq(0)).val();
                $(tr.children().eq(i).children().eq(0)).attr('readonly','readonly');
            }else if(i==1){
                value[i] = $(tr.children().eq(i)).attr('data-id');
            }
        }
        var th = $($('#childNodes_num').children());
        var thvalue = [];
        for (let i = 0;i<tdcount-1;i++) {
            if(i>3){
                thvalue[i] = th.eq(i).text();
                postdata[thvalue[i]] = value[i];
            }else if(i==1){
                thvalue[i] = "data-id";
                postdata[thvalue[i]] = value[i];
            }
        }
        $.ajax({
                type: "POST",
                url: "<?php echo U('integral/edit_index');?>",
                data: {
                    postdata:postdata,
                    belong : 1
                },
                async:false,
                dataType:'json',
                success: function(data) {
                    console.log(data)
                }
            }

        )
        $($($(data).parent()).children().eq(0)).css('display','block');
        $(data).css('display','none');
    }
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
<style>
    .slimScrollDiv{
        overflow: inherit !important;
    }

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