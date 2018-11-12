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

<link type="text/css" href="__PUBLIC__/css/dynamic.css" rel="stylesheet" />
<link type="text/css" href="__PUBLIC__/css/flat/blue.css" rel="stylesheet">
<style>
	/**
	 * 首页仪表盘
	 **/
	.wall .span6, .wall .span4{
		margin-bottom:20px;
	}
	.dash-border{
		border-collapse: separate;
		border-left: 0;
		height:300px;
		/**border:1px solid lightgray;*/
		font-family:Microsoft Yahei;
		overflow:hidden;
	}
	.dash-border a{
		text-decoration: none;
	}
	.dash-border .content-chart{
		padding: 10px;
		width: auto;
		height: 79%;
		text-align: center;
		line-height: 15;
	}
	.dash-border .dash-title{
		font-size:15px;
		color:#000;
		height:41px;
		line-height: 2.5;
		padding-left:10px;
		background: #F8F9FA;
	}
	.dash-border .dash-swtich{
		float: right;
		padding-right: 10px;
		font-size: 12px;
		line-height: 3.8;
		color: #999;
	}
	.dash-border .cut-line{
		width: 97%;
		margin: 0 auto;
		border-bottom: 1px solid lightgray;
	}
	.content-item{
		font-size:13px;
		line-height:2.8;
	}
	.content-item .content-main{
		float:left;
		width: 95%;
		white-space: nowrap;
		overflow: hidden;
		text-overflow: ellipsis;
		padding-left:15px;
		color: #666;
		margin-top: 5px;

	}
	.content-item .content-time{
		float:right;
		padding-right:20px;
		color: #888;
	}
	.error_msg{
		font-size: 13px;
		color: #808080;
	}
	.notepad{
		width:94.7%;
		height:79%;
		margin:5px;
		resize: none;
	}
	.sort-item{
		margin-top:10px;
		border:1px solid #ddd;
		background-color:#fff;
	}
	.allmap{width:100%;height:150px;display:none;}
	.top-panel>ul>li a.active{font-weight:400;}
	.list0>li a{color:#93A6B5;}
	.list0>li a:active{color:#337ab7;}
	.col-span{
		float: left;
		position: relative;
	    min-height: 1px;
	    width: 20%;
	    margin-left: 0px;
	    text-align: center;
	}

	/*日志评论*/
	.talkcontent{
		clear: both;
		padding:10px;
	}
	.talkcontent .talknow{
		padding:10px;
	}
	.imgtx{
		width: 28px;
		float: left;
	}
	.neirong{
		margin-left: 42px;
		word-wrap: break-word;
		border-bottom:1px solid #eee;
	}
	.reply_talk{
		margin: 12px 0 12px 0;
	}
	.reply_content{
	    border: 1px solid #aaa;
	    min-height: 80px;
	    padding: 10px;
	    border-radius: 2px;
	    margin-left: 43px;
	}
	.reply_content:empty::before{
	    color:#cab0ba;
	    content:attr(placeholder);
	}
	.btn_reply{
		margin-top: 0px;
		float: right;
	}
	.content_lanage
	{
		border: 1px solid #eee;
	    min-height: 51px;
	    padding: 10px;
	    border-radius: 2px;
	}
	.content_lanage:empty::before{
	    color:#cab0ba;
	    content:attr(placeholder);
	}
	.talkcontent{padding:0px;}
	.talkcontent .talknow{padding:10px 0px;}
	.tsinfo{padding: 6px;line-height: 30px;}
	#table_div{margin-bottom: 15px;}

/*任务相关*/
	.dropdown, .dropup{
		position: relative;
	}
	.dropdown-menu.bullet{
		margin-top: 12px;
	}
	.dropdown-menu{
		padding: 1px 0;
	    margin-top: 3px;
	    border-radius: 0;
	    -webkit-box-shadow: 0 3px 12px rgba(0,0,0,.05);
	    box-shadow: 0 3px 12px rgba(0,0,0,.05);
	    -webkit-transition: .25s;
	    -o-transition: .25s;
	    transition: .25s;
	    position: absolute;
	    top: 100%;
	    left: 0;
	    z-index: 1200;
	    display: none;
	    float: left;
	    min-width: 160px;
	    padding: 5px 0;
	    margin: 2px 0 0;
	    font-size: 14px;
	    text-align: left;
	    list-style: none;
	    background-color: #fff;
	    -webkit-background-clip: padding-box;
	    background-clip: padding-box;
	    border: 1px solid #ccc;
	    border: 1px solid #e4eaec;
	    border-radius: 3px;
	    -webkit-box-shadow: 0 6px 12px rgba(0,0,0,.175);
	}
	.dropdown-menu>li{
		padding: 0 3px;
    	margin: 2px 0;
	}
	.taskboard-stage-header .dropdown-menu>li>a{
		padding: 6px 10px;
	    -webkit-transition: background-color .25s;
	    -o-transition: background-color .25s;
	    transition: background-color .25s;
	    display: block;
	    padding: 3px 20px;
	    clear: both;
	    font-weight: 400;
	    line-height: 1.6;
	    color: #76838f;
	    white-space: nowrap;
	}
	.dropdown-menu li .icon:first-child, .dropdown-menu li>a .icon:first-child{
		width: 1em;
	    margin-right: .5em;
	    text-align: center;
	}

	#right-sidebar-task{
		width: 50% !important;
		right: -60%;
		background-color: #fff;
	    overflow: hidden;
	    position: fixed;
	    top: 60px;
	    z-index: 1009;
	    bottom: 0;
	    box-shadow: 0px 2px 1px #888888;
	}
	.agile-list li{
		margin-bottom: -1px;
		border:none;
	}
	.taskboard-stage{
		height:90% !important;
	}
	.taskboard-stages{
		overflow-y:hidden !important;
	}

	.color-selector>li{
		position: relative;
	    display: inline-block;
	    width: 24px;
	    height: 24px;
	    margin: 0 5px 0 0;
	    border-radius: 100%;
	}
	.bg-blue-600 label:before{
		background-color: #62a8ea!important;
	}
	.bg-green-600 label:before{
		background-color: #46be8a!important;
	}
	.bg-cyan-600 label:before{
		background-color: #57c7d4!important;
	}
	.bg-orange-600 label:before{
		background-color: #f2a654!important;
	}
	.bg-red-600 label:before{
		background-color: #f96868!important;
	}
	.bg-blue-grey-600 label:before{
		background-color: #526069!important;
	}
	.bg-purple-600 label:before{
		background-color: #926dde!important;
	}

	.bg-blue-600 label:after{
		background-color: #62a8ea!important;
	}
	.bg-green-600 label:after{
		background-color: #46be8a!important;
	}
	.bg-cyan-600 label:after{
		background-color: #57c7d4!important;
	}
	.bg-orange-600 label:after{
		background-color: #f2a654!important;
	}
	.bg-red-600 label:after{
		background-color: #f96868!important;
	}
	.bg-blue-grey-600 label:after{
		background-color: #526069!important;
	}
	.bg-purple-600 label:after{
		background-color: #926dde!important;
	}
	.radio label:before{
		width:24px;
		height:24px;
	}
	.radio label:after{
		left:6px;
		top: 4px;
		font-family: "FontAwesome";
    	content: "\f00c";
    	color: #fff;
	}
	.img-circle{
		margin-right:0px;
	}
	.list-group-item:hover{
		background-color: #fafafb !important;
	}
	.taskboard-list .list-group-item .task-members{
		float:left;
	}
	.action-wrap{
		float:left;
		width:100%;
		height:10%;
		min-height: 40px;
		background-color: #fff;
	}
</style>
<script type="text/javascript" src="__PUBLIC__/js/chart/highcharts.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/mychart/macarons.js"></script>
<script src="__PUBLIC__/js/mychart/echarts-plain.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/jquery.e-calendar.js"></script>
<script type="text/javascript" src="__PUBLIC__/js/chart/funnel.js"></script>
<!-- echarts -->
<script type="text/javascript" src="__PUBLIC__/js/echarts/echarts.js"></script>
<!-- nice-scroll -->
<script src="__PUBLIC__/style/js/plugins/nice-scroll/jquery.nicescroll.min.js" type="text/javascript"></script>
<!--the css for jquery.mCustomScrollbar-->
<link rel="stylesheet" href="__PUBLIC__/emoji/css/jquery.mCustomScrollbar.min.css"/>
<!--the css for this plugin-->
<link rel="stylesheet" href="__PUBLIC__/emoji/css/jquery.emoji.css"/>
<script>
$(function(){
	$("#table_div").height(window.innerHeight-$("#table_div").offset().top-10);
	$(window).resize(function(){
		$("#table_div").height(window.innerHeight-$("#table_div").offset().top-10);
	})
	var scroll_width = 5;
	$(".nicescroll").niceScroll({
		cursorcolor: "#ccc",//#CC0071 光标颜色
	    cursoropacitymax: 1, //改变不透明度非常光标处于活动状态（scrollabar“可见”状态），范围从1到0
	    touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
	    cursorwidth: scroll_width+"px", //像素光标的宽度
	    cursorborder: "0", //     游标边框css定义
	    cursorborderradius: "5px",//以像素为光标边界半径
	    autohidemode: false, //是否隐藏滚动条
	    zindex:100,
	    background:"#F3F3F5",//滚动条背景色
	});
})
</script>

<div class="page-wrapper wrapper wrapper-content animated fadeIn" >
	<div class="row">
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
		<div class="col-sm-12" style="margin-bottom: 20px;">
		<div class="row">
			<div class="col-sm-8" >
				<div class="table-content container-fluid ibox-title">
					<div class="col-sm-12">
						<div class="col-sm-1">
							<span style="font-size:18px;line-height:25px;color: #000;vertical-align: middle;">简报</span>
						</div>
						<div class="col-sm-11">
							<div class="col-span">
								<span style="color: #000;">新增客户</span>
								<div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['customer_count'][0]); ?>个</span></div>
							</div>
							<div class="col-span">
								<span style="color: #000;">新增联系人</span>
								<div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['contacts_count'][0]); ?>个</span></div>
							</div>
							<div class="col-span">
								<span style="color: #000;">新增项目</span>
								<div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['business_count'][0]); ?>个</span></div>
							</div>
							<!--<div class="col-span">-->
								<!--<span style="color: #000;">新增沟通日志</span>-->
								<!--<div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['log_count'][0]); ?>篇</span></div>-->
							<!--</div>-->
							<!--<div class="col-span">-->
								<!--<span style="color: #000;">工作日志</span>-->
								<!--<div style="margin-top:10px;">-->
									<!--<?php if($mylog_count_today > 0): ?>-->
										<!--<span style="font-size:15px;"><i class="fa fa-check-circle" style="color:#19AA8D;"></i>&nbsp;&nbsp;今日已完成</span>-->
									<!--<?php else: ?>-->
										<!--<a href="<?php echo U('log/mylog_add');?>" style="color:#999;" title="点击跳转日志添加页面"><span style="font-size:15px;"><i class="fa fa-exclamation-circle" style="color:#FFCC00;"></i>&nbsp;&nbsp;今日未填写</span></a>-->
									<!--<?php endif; ?>-->
								<!--</div>-->
							<!--</div>-->
                            <div class="col-span">
                                <span style="color: #000;">新增人才</span>
                                <div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['resume_count'][0]); ?>个</span></div>
                            </div>
                            <div class="col-span">
                                <span style="color: #000;">新增合同</span>
                                <div style="margin-top:10px;"><span style="font-size:15px;"><?php echo ($anly_count['contract_count'][0]); ?>个</span></div>
                            </div>
							<div style="clear:both;"></div>
						</div>
					</div>
				</div>
				<div class="table-content container-fluid ibox-title" style="border-top: none;">
					<div class="col-sm-12" style="margin-bottom: 5px;">
						<div class="col-sm-1" style="padding:0px;text-align: center;">
							<span style="font-size:13px;line-height:25px;color: #000;">本周新增</span>
						</div>
						<div class="col-sm-11">
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['customer_count'][1]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contacts_count'][1]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['business_count'][1]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['resume_count'][1]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contract_count'][1]); ?>个</span></div>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
					<div class="col-sm-12" style="margin-bottom: 5px;">
						<div class="col-sm-1" style="padding:0px;text-align: center;">
							<span style="font-size:13px;line-height:25px;color: #000;">本月新增</span>
						</div>
						<div class="col-sm-11">
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['customer_count'][2]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contacts_count'][2]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['business_count'][2]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['resume_count'][2]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contract_count'][2]); ?>个</span></div>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
					<div class="col-sm-12" style="margin-bottom: 5px;">
						<div class="col-sm-1" style="padding:0px;text-align: center;">
							<span style="font-size:13px;line-height:25px;color: #000;">本年新增</span>
						</div>
						<div class="col-sm-11">
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['customer_count'][3]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contacts_count'][3]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['business_count'][3]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['resume_count'][3]); ?>个</span></div>
							</div>
							<div class="col-span">
								<div ><span style="font-size:15px;"><?php echo ($anly_count['contract_count'][3]); ?>个</span></div>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
				</div>
				<div class="table-content container-fluid ibox-title" style="margin-top: 10px;display: none;">
					<div class="col-sm-12">
						<div class="col-sm-1">
							<span style="font-size:18px;line-height:25px;color: #000;">指标</span>
						</div>
						<div class="col-sm-11">
							<div class="col-span" style="padding-left: none;">
								<span style="color: #000;">收款进度</span>
								<div class="project-completion" style="margin-top:10px;">
									<small><?php echo ($anly_count['schedule']); ?>%</small>
		                            <div class="progress progress-mini">
		                                <div style="width: <?php echo ($anly_count['schedule']); ?>%;" class="progress-bar"></div>
		                            </div>
								</div>
							</div>
							<div class="col-span" style="padding-left: none;">
								<span style="color: #000;">历史收款金额</span>
								<div style="margin-top:10px;"><span style="font-size:20px;color: #ffb173;"><?php echo ($anly_count['sum_price']); ?></span>元</div>
							</div>
							<div class="col-span" style="padding-left: none;">
								<span style="color: #000;">本周收款金额</span>
								<div style="margin-top:10px;"><span style="font-size:20px;color: #ffb173;"><?php echo ($anly_count['sum_price_week']); ?></span>元</div>
							</div>
							<div class="col-span" style="padding-left: none;">
								<span style="color: #000;">本月收款金额</span>
								<div style="margin-top:10px;"><span style="font-size:20px;color: #ffb173;"><?php echo ($anly_count['sum_price_month']); ?></span>元</div>
							</div>
							<div class="col-span" style="padding-left: none;">
								<span style="color: #000;">全年收款总额</span>
								<div style="margin-top:10px;"><span style="font-size:20px;color: #ffb173;"><?php echo ($anly_count['sum_price_year']); ?></span>元</div>
							</div>
							<div style="clear:both;"></div>
						</div>
					</div>
				</div>
				<div class="row" id="widgets" style="">
					<div class="wall">
						<div class="col-sm-12 sort-list">
							<?php if(is_array($widget)): $i = 0; $__LIST__ = $widget;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i; $vo['redirect'] = $vo['widget']; ?>
								<?php echo W('Common', $vo); endforeach; endif; else: echo "" ;endif; ?>
							<div class="col-sm-6 sort-item" style="background: #fff;">
								<a id="add" style="width: 100%;height: 100%;float: left;" title="添加仪表盘">
									<div class="dash-border">
										<div class="content-chart" style="font-size: 15px;color: #7D899C; width: 100%; height: 100%;">
											<div style="float: left;margin:0 auto;width: 100%;">
												<i class="fa fa-filter" style="#7D899C;"></i>&nbsp; 添加仪表盘
											</div>
										</div>
									</div>
								</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="col-sm-4" style="background-color:#fff;border: 1px solid #ccc;">
				<div class="ibox-title" style="border: none;">
					<div class="pull-left">
						<span style="height:35px;font-size:14px;color: #000;">工作圈</span>
					</div>
					<div class="pull-right" id="log_add" style="display: none;">
						<a href="<?php echo U('log/mylog_add');?>"><span style="height:35px;font-size:14px;color: #000;">写日志</span></a>
					</div>
				</div>
				<div class="ibox-title" style="border-width: 1px 0 0;">
					<div class="top-panel" style="border-bottom:0px;">
						<ul class="list0 pull-left" style="margin-left:-40px;">
							<li><a href="javascript:void(0)" class="dynamic_type active" id="crm" rel="crm">全部动态</a></li>
							<li><a href="javascript:void(0)" class="dynamic_type" id="customer" rel="customer">客户相关</a></li>
							<!--<li><a href="javascript:void(0)" class="dynamic_type" id="product" rel="product">人才相关</a></li>-->
							<!--<li><a href="javascript:void(0)" class="dynamic_type" id="log" rel="log" >日志相关</a></li>-->
							<li><a href="javascript:void(0)" class="dynamic_type" id="business" rel="business" >项目相关</a></li>
							<!--<li><a href="javascript:void(0)" class="dynamic_type" id="sign" rel="sign" >签到相关</a></li>-->
						</ul>
					</div>
				</div>
				<input type="hidden" id="dynamic_type" value="crm" />
				<input type="hidden" id="p" value="<?php echo ($p); ?>"/>
				<input type="hidden" id="load" value="1"/>
				<div class="middle-content nicescroll" id="table_div" style="margin-top:0px;width:100%;border-bottom: 1px solid #ddd;" >
					<?php if(empty($actionLog)): ?><div class="alert alert-info">暂无动态信息</div>
					<?php else: ?>
						<div id="list">
						<?php if(is_array($actionLog)): $i = 0; $__LIST__ = $actionLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="dy-content" id="anchor_<?php echo ($vo["log_id"]); ?>">
								<div class="title3">
									<?php if(empty($vo['creator']['thumb_path'])): ?><img src="__PUBLIC__/img/avatar_default.png" class="avatar"/>
									<?php else: ?>
										<img src="<?php echo ($vo["creator"]["thumb_path"]); ?>" class="avatar"/><?php endif; ?>
								</div>
								<div class="role0">
									<p>
										<a href="javascript:void(0)" class="role_info" rel="<?php echo ($vo["creator"]["role_id"]); ?>"><?php echo ($vo["creator"]["user_name"]); ?>（<?php echo ($vo["creator"]["department_name"]); ?> - <?php echo ($vo["creator"]["role_name"]); ?>）</a>
										|<span style="padding-left:10px;color: #000;"><?php echo ($vo["dynamic"]); ?></span>
									</p>
								</div>
								<?php if($vo['module_name'] == 'sign'): ?><div class="conent0" style="width:100%;">
										<img style="height:15px;vertical-align:text-bottom;" src="__PUBLIC__/img/location.png"/>
										<span style="color:#666"><?php echo ($vo["address"]); ?></span>
										<input class="longitude" type="hidden" rel="<?php echo ($vo["y"]); ?>"/>
										<a href="javascript:void(0);" style="font-size:12px;" class="pull-right map" >显示地图</a>
										<div id="allmap<?php echo ($key+1); ?>" rel="allmap<?php echo ($key+1); ?>" class="allmap"></div>
										<input class="latitude" type="hidden" rel="<?php echo ($vo["x"]); ?>"/>
									</div>
									<div class="conent0">
										<span style="color:#000">相关客户：<a href="<?php echo U('customer/view','id='.$vo['customer_info']['customer_id']);?>"><?php echo ($vo['customer_info']['name']); ?></a></span>
									</div>
									<div class="conent0">
										<span style="color:#000">签到说明：<?php echo ($vo["log"]); ?></span>
									</div>
									<div class="conent0">
										<div style="color:#000">现场照片：</div>
										<?php if(is_array($vo['sign_img'])): $i = 0; $__LIST__ = $vo['sign_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="box-secondary" rel="<?php echo ($vo["img_id"]); ?>" style="width:30%;float:left;">
												<a href="<?php echo ($v["path"]); ?>" target="_self" class="litebox" data-litebox-group="group-1">
													<img src="<?php echo ($v["path"]); ?>" class="thumbnail thumb100">
												</a>
											</div><?php endforeach; endif; else: echo "" ;endif; ?>
										<div style="clear:both;"></div>
									</div>
								<?php elseif($vo['module_name'] == 'log'): ?>
									<div class="conent0" style="font-size: 12px;"><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></div>
									<div class="conent0" id="content_<?php echo ($vo['log_id']); ?>" style="word-wrap: break-word;word-break: normal;padding:10px 20px;padding-top: 10px;"><?php echo ($vo['cut_content']); ?></div>
									<?php if($vo['content_open'] == 1): ?><div class="conent0" style="padding: 0px;">
									    	<div id="open_<?php echo ($vo['log_id']); ?>" class="panel-collapse collapse">
									            <div class="panel-body" style="word-wrap: break-word;word-break: normal;padding-left: 20px;padding-top: 10px;">
									               <?php echo ($vo["log_content"]); ?>
									            </div>
									        </div>
									        <div class="panel-heading" style="padding-left: 20px;">
								                <a data-toggle="collapse" data-parent="#accordion"
								                href="#open_<?php echo ($vo['log_id']); ?>" class="hide_content" rel="<?php echo ($vo['log_id']); ?>" rel1="0">展开全文</a>
									        </div>
										</div><?php endif; ?>
									<?php if($vo['log_files']): ?><div class="conent0" style="padding-left: 20px;padding-right:10px;margin-right: 10px;border: 1px dashed #d8e3ef;">
											<span class="tsinfo"><img src="__PUBLIC__/img/addFile.png"/><span class="fujian">附件&nbsp;(<?php echo ($vo['file_count']); ?>)</span></span>
											<?php if(is_array($vo['log_files'])): $i = 0; $__LIST__ = $vo['log_files'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$files): $mod = ($i % 2 );++$i;?><div class="file_tr" style="padding: 6px;">
													<img src="__PUBLIC__/productImg/<?php echo ($files['pic']); ?>">&nbsp;
													<a <?php if(in_array(getExtension($files['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($files['file_path']); ?>" data-litebox-group="group-<?php echo ($vo['log_id']); ?>" title="点击查看大图"<?php else: ?>href="javascript:;" file="<?php echo ($files["file_path"]); ?>" filename="<?php echo ($files["name"]); ?>" onclick="filedown(this);"<?php endif; ?> title="<?php echo ($files['name']); ?>"><?php echo ($files["cut_name"]); ?></a><span style="color:#646464;">&nbsp;(&nbsp;<?php echo ($files['size']); ?>KB&nbsp;)</span>&nbsp;&nbsp;<a class="controls_file" style="float: right;display: none;" href="javascript:void(0);" file="<?php echo ($files["file_path"]); ?>" filename="<?php echo ($files["name"]); ?>" onclick="filedown(this);" title="<?php echo ($files['name']); ?>">下载</a>
												</div><?php endforeach; endif; else: echo "" ;endif; ?>
										</div><?php endif; ?>
									<div class="conent0" style="padding:10px 20px;height: 35px;">
									<?php if($vo['comment_count'] > 0): ?><div class="pull-left ">
							                <a href="javascript:void(0)" class="log_comment" id="log_comment_<?php echo ($vo['action_id']); ?>" rel="<?php echo ($vo['log_id']); ?>" rel1="0" rel2 = "<?php echo ($vo['action_id']); ?>">展开评论</a>
								        </div><?php endif; ?>
									<div class="pull-right" style="margin-right: 5px;">
										<a href="javascript:void(0)" class="reply" rel="<?php echo ($vo['action_id']); ?>" rel1="0"><span id="reply_<?php echo ($vo['action_id']); ?>" style="height:35px;font-size:14px;">回复</span></a>
									</div>
									</div>
									<div class="conent0" id="reparynow_<?php echo ($vo['action_id']); ?>" style="padding-left: 20px;padding-right: 20px;display: none;">
										<div id="content_lanage_<?php echo ($vo['action_id']); ?>" class="content_lanage" rel="<?php echo ($vo['action_id']); ?>" contenteditable="true" placeholder="添加回复..."></div>
										<div style="margin-top: 5px;">
											<input type="image" id="btn_emoji_<?php echo ($vo['action_id']); ?>" src="__PUBLIC__/img/emoji.png" />
											<button disabled="true" id="but_sub_<?php echo ($vo['action_id']); ?>" style="display: none;" class="btn btn-primary subit add_language pull-right" rel="<?php echo ($vo['action_id']); ?>" type="button">发 表</button>
										</div>
									</div>
									<div class="conent0" style="padding-left: 20px;padding-right: 20px;">
										<div class="talkcontent" rel="<?php echo ($vo['log_id']); ?>" id="talkcontent_<?php echo ($vo['action_id']); ?>">

										</div>
									</div>
								<?php elseif($vo['module_name'] == 'task'): ?>
									<div class="conent0" style="font-size: 12px;"><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></div>
									<div class="conent0"><a class="task_view" href="javascript:void(0);" rel="<?php echo ($vo['action_id']); ?>"><?php echo ($vo["type"]); ?></a></div>
								<?php else: ?>
									<div class="conent0" style="font-size: 12px;"><?php echo (date('Y-m-d H:i:s',$vo["create_time"])); ?></div>
									<div class="conent0"><?php echo ($vo["type"]); ?></div><?php endif; ?>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
						</div><?php endif; ?>
				</div>
				<div style="clear:both;"></div>
			</div>
		</div>
		</div>
	</div>
</div>

<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>

<div id="dialog-message" style="display:none" title="<?php echo L('ADD_A_PANEL_COMPONENT');?>">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<div id="dialog-message2" style="display:none" title="<?php echo L('MODIFY_THE_PANEL_COMPONENT');?>">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<div id="dialog-role-info" style="display:none" title="<?php echo L('DIALOG_USER_INFO');?>">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Z0Fo0ib1GUgWlylCWeLvQh2U"></script>
<link href="__PUBLIC__/css/litebox.css" rel="stylesheet" type="text/css">
<script src="__PUBLIC__/js/litebox.min.js" type="text/javascript"></script>
<script src="__PUBLIC__/js/images-loaded.min.js" type="text/javascript"></script>
<!--(Optional) the js for jquery.mCustomScrollbar's addon-->
<script src="__PUBLIC__/emoji/js/jquery.mousewheel-3.0.6.min.js"></script>
<!--the js for jquery.mCustomScrollbar-->
<script src="__PUBLIC__/emoji/js/jquery.mCustomScrollbar.min.js"></script>
<!--the js for this plugin-->
<script src="__PUBLIC__/emoji/js/jquery.emoji.js"></script>
<script type="text/javascript">


$(document).on('mouseenter','.file_tr',function(){
	$(this).find(".controls_file").show();
});
$(document).on('mouseleave','.file_tr',function(){
	$(this).find(".controls_file").hide();
});
//流加载
$(document).ready(function (){
	var loading = false;  //状态标记
	var deviation = 10; //事件偏移量
	var nScrollHight = 0; //滚动距离总长(注意不是滚动条的长度)
	var nScrollTop = 0;   //滚动到的当前位置
	var nDivHight = $("#table_div").height();
	var scrollTop = $("#table_div").scrollTop();

	$("#table_div").scroll(function(){
		var type = $('#dynamic_type').attr('value');
		var p = $('#p').val();
		var load = $('#load').val();
		nScrollHight = $(this)[0].scrollHeight;
		nScrollTop = $(this)[0].scrollTop;
		if(loading){
			return false;
		}
		if(nScrollTop + nDivHight + deviation >= nScrollHight && load == 1){
			loading = true;
			//alert("滚动条到底部了");
			temp_loading = "";
			temp_loading = "<div class='loading' id='loading'><div class='spiner-example'><div class='sk-spinner sk-spinner-three-bounce'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div></div></div>";
			$("#message_div").scrollTop(nScrollTop + deviation + 200);
			$("#list").append(temp_loading);
			var temp = "";
            var no_data = "";
            p++;
			$('#p').val(p);
			$.ajax({
				type:'get',
				url:'index.php?m=index&a=dynamic_data&p='+p+'&by='+type,
				async : false,
				success : function(data){
					temp = "";
					$('#no_data').remove();
					if (data.status == 1) {
						$.each(data.data, function(k, v){
							var ke = k+1;
							temp += "<div class='dy-content' id='anchor_"+v.log_id+"'><div class = 'title3'>";
							if(v.creator.thumb_path){
								temp += "<img src='"+v.creator.thumb_path+"' class='avatar'/>";
							}else{
								temp += "<img src='__PUBLIC__/img/avatar_default.png' class='avatar'/>";
							}
							temp += "</div><div class='role0'><p><a href='javascript:void(0)' class='role_info' rel='"+v.creator.role_id+"'>"+v.creator.user_name+"（"+v.creator.department_name+" - "+v.creator.role_name+"）</a>|<span style='padding-left:10px;color:#000;'>"+v.dynamic+"</span></p></div>";
							if(v.module_name == 'sign'){
								temp += "<div class='conent0' style='width:100%;'><img style='height:15px;vertical-align:text-bottom;' src='__PUBLIC__/img/location.png'></img><span style='color:#000'>"+v.address+"</span><input class='longitude' type='hidden' rel='"+v.y+"'/><a href='javascript:void(0);' style='font-size:12px;' class='pull-right map' >显示地图</a><div id='allmap"+ke+"' rel='allmap"+ke+"' class='allmap'></div><input class='latitude' type='hidden' rel='"+v.x+"'/></div><div class='conent0'><span style='color:#000'>相关客户：<a href='<?php echo U('customer/view','id='."+v.customer_info.customer_id+");?>'>"+v.customer_info.name+"</a></span></div><div class='conent0'><span style='color:#000'>签到说明："+v.log+"</span></div><div class='conent0'><div style='color:#000'>现场照片：</div>";
								$.each(v.sign_img, function(key, val){
									temp += "<div class='box-secondary' rel='"+val.img_id+"' style='width:30%;float:left;'><a href='"+val.path+"' target='_self' class='litebox' data-litebox-group='group-1'><img src='"+val.path+"' class='thumbnail thumb100'></a></div>";
								})
								temp += "<div style='clear:both;'></div></div>";
							}else if(v.module_name == 'log'){
								temp +=	"<div class='conent0' style='font-size: 12px;'>"+v.create_time+"</div><div class='conent0' id='content_'+v.log_id style='word-wrap: break-word;word-break: normal;padding:10px 20px;padding-top: 10px;'>"+v.cut_content+"</div>";
								if(v.content_open == 1){
									temp += "<div class='conent0' style='padding: 0px;'><div id='open_'+v.log_id class='panel-collapse collapse'><div class='panel-body' style='word-wrap: break-word;word-break: normal;padding-left: 20px;padding-top: 10px;'>"+v.log_content+"</div></div><div class='panel-heading' style='padding-left: 20px;'><a data-toggle='collapse' data-parent='#accordion' href='#open_'+v.log_id class='hide_content' rel='"+v.log_id+"' rel1='0'>展开全文</a></div></div>";
								}
								if(v.log_files != ''){
									temp += "<div class='conent0' style='padding-left: 20px;padding-right:10px;margin-right: 10px;border: 1px dashed #d8e3ef;'><span class='tsinfo'><img src='__PUBLIC__/img/addFile.png'/><span class='fujian'>附件&nbsp;("+v.file_count+")</span></span>";

									$.each(v.log_files, function(key, files){
										temp += "<div style='padding: 6px;'><img src='__PUBLIC__/productImg/"+files.pic+"'>&nbsp;";
										if(js_getExtension(files.name)){
											temp += "<a class='litebox_file' href='"+files.file_path+"' data-litebox-group='group-"+v.log_id+"' title='点击查看大图' title='"+files.name+"'>"+files.cut_name+"</a><span style='color:#646464;'>&nbsp;(&nbsp;"+files.size+"KB&nbsp;)</span>&nbsp;&nbsp;<a style='float: right;' href='javascript:void(0);' file='"+files.file_path+"' filename='"+files.name+"' onclick='filedown(this);' title='"+files.name+"'>下载</a>";
										}
										temp += "</div>";
									})
									temp += "</div>";
								}
								temp += "<div class='conent0' style='padding:10px 20px;height: 35px;'>";
								if(v.comment_count > 0){
									temp += "<div class='pull-left '><a href='javascript:void(0)' class='log_comment' id='log_comment_+"+v.action_id+"' rel='"+v.log_id+"' rel1='0' rel2 = '"+v.action_id+"'>展开评论</a></div>";
								}
								temp += "<div class='pull-right' style='margin-right: 5px;'><a href='javascript:void(0)' class='reply' rel='"+v.action_id+"' rel1='0'><span id='reply_"+v.action_id+"' style='height:35px;font-size:14px;'>回复</span></a></div></div><div class='conent0' id='reparynow_"+v.action_id+"' style='padding-left: 20px;padding-right: 20px;display: none;'><div id='content_lanage_"+v.action_id+"' class='content_lanage' rel='"+v.action_id+"' contenteditable='true' placeholder='添加回复...'></div><div style='margin-top: 5px;'><input type='image' id='btn_emoji_"+v.action_id+"' src='__PUBLIC__/img/emoji.png' /><button disabled='true' id='but_sub_"+v.action_id+"' style='display: none;' class='btn btn-primary subit add_language pull-right' rel='"+v.action_id+"' type='button'>发 表</button></div></div><div class='conent0' style='padding-left: 20px;padding-right: 20px;'><div class='talkcontent' rel='"+v.log_id+"' id='talkcontent_"+v.action_id+"'></div></div>";
							}else if(v.module_name == 'task'){
								temp += "<div class='conent0' style='font-size: 12px;'>"+v.create_time+"</div><div class='conent0'><a class='task_view' href='javascript:void(0);' rel='"+v.action_id+"'>"+v.type+"</a></div>";
							}else{
								temp += "<div class='conent0' style='font-size: 12px;'>"+v.create_time+"</div><div class='conent0'>"+v.type+"</div>";
							}
							temp +=	"</div>";
						})
					} else {
						p--;
						$('#p').val(p);
						// alert_crm(data.data);
                        no_data = "<p id='no_data' style='margin-top: 20px;text-align: center;'>没有更多数据</p>";
                        $('#load').val('0');
					}
				}
			});
			if(no_data == ''){
				setTimeout(function() {
					$("#message_div").scrollTop(nScrollTop + deviation - 200);
					$('#loading').remove();
					$("#list").append(temp);
					loading = false;
				}, 1500);   //模拟延迟
            }else{
                setTimeout(function() {
                	$("#message_div").scrollTop(nScrollTop + deviation);
                    $('#loading').remove();
                    $("#list").append(no_data);
                    loading = false;
                }, 1500);   //模拟延迟
            }

			//litebox
			$('.litebox').liteBox({
			  revealSpeed: 400,
			  background: 'rgba(0,0,0,.8)',
			  overlayClose: true,
			  escKey: true,
			  navKey: true,
			  errorMessage: '图片加载失败.'
			});

			$('.litebox_file').liteBox({
			  revealSpeed: 400,
			  background: 'rgba(0,0,0,.8)',
			  overlayClose: true,
			  escKey: true,
			  navKey: true,
			  errorMessage: '图片加载失败.'
			});

			//地图
			$("#list").on("click", ".map", function(){
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
		}
		if (nScrollTop == 0) {  //滚动到头部执行事件
			//alert("我到头部了");
        }
	});
});

//获取文件名后缀(是否图片类型)
function js_getExtension(file){
	var file = file;
	var filename = file.replace(/.*(\/|\\)/, "");
	var fileExt = (/[.]/.exec(filename)) ? /[^.]+$/.exec(filename.toLowerCase()) : '';
	var img_arr = ["jpg","jpeg","gif","png"];
	if($.inArray(fileExt,img_arr)){
		return true;
	}else{
		return false;
	}
}

//动态类型切换加载
$('.dynamic_type').click(function(){
    var type = $(this).attr('rel');
	$('#dynamic_type').val(type);
	$(".dynamic_type").removeClass("active");	//移除样式
	$('#'+type).addClass("active"); //追加样式
	var detail_html = '<div class="spiner-example"><div class="sk-spinner sk-spinner-three-bounce"><div class="sk-bounce1"></div><div class="sk-bounce2"></div><div class="sk-bounce3"></div></div></div>';
	$('#table_div').html(detail_html);
	$('#p').val(1);
	$('#table_div').load("<?php echo U('index/dynamic_data');?>", {by: type,date_type:1});
	if(type == 'log'){
		$('#log_add').show();
	}else{
		$('#log_add').hide();
	}

	$(document).on('click','.role_info',function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});
	$(document).ready(function (){
		//litebox
		$('.litebox').liteBox({
		  revealSpeed: 400,
		  background: 'rgba(0,0,0,.8)',
		  overlayClose: true,
		  escKey: true,
		  navKey: true,
		  errorMessage: '图片加载失败.'
		});

		$('.litebox_file').liteBox({
		  revealSpeed: 400,
		  background: 'rgba(0,0,0,.8)',
		  overlayClose: true,
		  escKey: true,
		  navKey: true,
		  errorMessage: '图片加载失败.'
		});
	});

	//地图
	$('#list').on("click", ".map", function(){
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
});

//展开全文
$(document).on('click','.hide_content',function(){
	var rel = $(this).attr('rel');
	var rel1 = $(this).attr('rel1');
	if(rel1 == 0){
		$('#content_'+rel).hide();
		$(this).attr('rel1',1);
		$(this).html('收起全文');
	}else{
		$('#content_'+rel).show();
		$(this).attr('rel1',0);
		$(this).html('展开全文');
	}
});

/**日志评论start**/

//最后一个样式
$(".neirong:last").css('border','none');
 //展开评论
$(document).on('click','.log_comment',function(){
 	var log_id = $(this).attr('rel2');
 	var action_id = $(this).attr('rel');
 	var rel1 = $(this).attr('rel1');
	if(rel1 == 0){
		//加载效果
	 	var load = "<div class='spiner-example'><div class='sk-spinner sk-spinner-three-bounce'><div class='sk-bounce1'></div><div class='sk-bounce2'></div><div class='sk-bounce3'></div></div></div>";
	 	$('#talkcontent_'+log_id).html(load);
		setTimeout(function() {
			var send_role_id = $('#send_role_id').val();
			var url = "<?php echo U('log/commentShow');?>";
			$('#talkcontent_'+log_id).load(url,{log_id:log_id});
		}, 500);   //模拟延迟
		$(this).attr('rel1',1);
		$(this).html('收起评论');
	}else{
		$('#talkcontent_'+log_id).html('');
		$(this).attr('rel1',0);
		$(this).html('展开评论');
	}
});

//回复
$(document).on('click','.reply',function(){
	var log_id = $(this).attr('rel');
	var rel1 = $(this).attr('rel1');
	if(rel1 == 0){
		$("#reparynow_"+log_id).slideToggle("3000");
		$(this).attr('rel1',1);
		$("#content_lanage_"+log_id).emoji({
			button:"#btn_emoji_"+log_id,
		    showTab: true,
		    animation: 'slide',
		    icons: [{
		    	name: "小表情",
		        path: "__PUBLIC__/emoji/img/tieba/",
		        maxNum: 50,
		        file: ".jpg",
		        placeholder: ":{alias}:",
		        alias: {
		            1: "hehe",
		            2: "haha",
		            3: "tushe",
		            4: "a",
		            5: "ku",
		            6: "lu",
		            7: "kaixin",
		            8: "han",
		            9: "lei",
		            10: "heixian",
		            11: "bishi",
		            12: "bugaoxing",
		            13: "zhenbang",
		            14: "qian",
		            15: "yiwen",
		            16: "yinxian",
		            17: "tu",
		            18: "yi",
		            19: "weiqu",
		            20: "huaxin",
		            21: "hu",
		            22: "xiaonian",
		            23: "neng",
		            24: "taikaixin",
		            25: "huaji",
		            26: "mianqiang",
		            27: "kuanghan",
		            28: "guai",
		            29: "shuijiao",
		            30: "jinku",
		            31: "shengqi",
		            32: "jinya",
		            33: "pen",
		            34: "aixin",
		            35: "xinsui",
		            36: "meigui",
		            37: "liwu",
		            38: "caihong",
		            39: "xxyl",
		            40: "taiyang",
		            41: "qianbi",
		            42: "dnegpao",
		            43: "chabei",
		            44: "dangao",
		            45: "yinyue",
		            46: "haha2",
		            47: "shenli",
		            48: "damuzhi",
		            49: "ruo",
		            50: "OK"
		        },
		        title: {
		            1: "呵呵",
		            2: "哈哈",
		            3: "吐舌",
		            4: "啊",
		            5: "酷",
		            6: "怒",
		            7: "开心",
		            8: "汗",
		            9: "泪",
		            10: "黑线",
		            11: "鄙视",
		            12: "不高兴",
		            13: "真棒",
		            14: "钱",
		            15: "疑问",
		            16: "阴脸",
		            17: "吐",
		            18: "咦",
		            19: "委屈",
		            20: "花心",
		            21: "呼~",
		            22: "笑脸",
		            23: "冷",
		            24: "太开心",
		            25: "滑稽",
		            26: "勉强",
		            27: "狂汗",
		            28: "乖",
		            29: "睡觉",
		            30: "惊哭",
		            31: "生气",
		            32: "惊讶",
		            33: "喷",
		            34: "爱心",
		            35: "心碎",
		            36: "玫瑰",
		            37: "礼物",
		            38: "彩虹",
		            39: "星星月亮",
		            40: "太阳",
		            41: "钱币",
		            42: "灯泡",
		            43: "茶杯",
		            44: "蛋糕",
		            45: "音乐",
		            46: "haha",
		            47: "胜利",
		            48: "大拇指",
		            49: "弱",
		            50: "OK"
		        }
		    },
		       { name: "萌萌哒",
		        path: "__PUBLIC__/emoji/img/qq/",
		        maxNum: 91,
		        excludeNums: [41, 45, 54],
		        file: ".gif"
		    }]
		});

		$('#reply_'+log_id).html('取消');
	}else{
		$("#reparynow_"+log_id).slideToggle("3000");
		$(this).attr('rel1',0);
		$('#reply_'+log_id).html('回复');
	}
});

$(document).on('focus','.content_lanage',function(){
	var rel = $(this).attr('rel');
	$(".subit").removeAttr('disabled');
	$("#but_sub_"+rel).fadeIn("3000");
});
$(document).on('focusout','.content_lanage',function(){
	var rel = $(this).attr('rel');
	var content = $(this).html();
	if(!content){
		$("#but_sub_"+rel).fadeOut("3000");
		$(".subit").prop('disabled',true);
		$(this).html('');
	}
});

//点击发表后
function add_after(log_id){
	var log_id = log_id;
	$('#content_lanage_'+log_id).html('');
	$('#content_lanage_'+log_id).attr('placeholder');
	$("#but_sub_"+log_id).fadeOut("3000");
	$(".subit").prop('disabled',true);
}
/*
*添加首次回复调用
 */
$(document).on('click','.add_language',function(){
	var log_id = $(this).attr('rel');
	var content_lanage = $('#content_lanage_'+log_id).html();
	$.post("<?php echo U('log/myCommont');?>",{content:content_lanage,log_id:log_id},function(data){
			if(data.status == 1){
				add_after(log_id);//还原初始状态
				var url = "<?php echo U('log/commentShow');?>";
 				$('#talkcontent_'+log_id).load(url,{log_id:log_id});
 				//收起评论
 				$('#log_comment_'+log_id).attr('rel1',1);
				$('#log_comment_'+log_id).html('收起评论');
			}else{
				alert_crm(data.info);
			}
		},"json"
	);
});

/**日志评论end**/

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

//排序
$(".sort-list").sortable({
	stop:function() {
		var chart_arr = new Array();
		$(".sort-item").each(function(key, val){
			chart_arr.push($(val).attr('rel'));
			console.log($(val).attr('rel'));
		});
		$.post('<?php echo U("index/sortCharts");?>',{chart_arr:chart_arr.join(',')},'json');
	}
});
//litebox
$('.litebox').liteBox({
  revealSpeed: 400,
  background: 'rgba(0,0,0,.8)',
  overlayClose: true,
  escKey: true,
  navKey: true,
  errorMessage: '图片加载失败.'
});

$('#dialog-collection').dialog({
	autoOpen: false,
	modal: true,
	width: 930,
	maxHeight: 480,
	position :["center",100]
});

$('#dialog-message').dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position :["center",100],
	buttons: {
		"<?php echo L('OK');?>": function () {
			$('#widget_add').submit();
			$(this).dialog("close");
		},
		"<?php echo L('CANCEL');?>": function () {
			$(this).dialog("close");
		}
	}
});

$('#dialog-message2').dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	position :["center",100],
	buttons: {
		"<?php echo L('OK');?>": function () {
			$('#widget_edit').submit();
			$(this).dialog("close");
		},
		"<?php echo L('CANCEL');?>": function () {
			$(this).dialog("close");
		}
	}
});
$("#dialog-role-info").dialog({
    autoOpen: false,
    modal: true,
	width: 600,
	minHeight: 420,
	position: ["center",100]
});

$(function(){
	$("#add").click(
		function(){
			$('#dialog-message').dialog('open');
			$('#dialog-message').load('<?php echo U("index/widget_add");?>');
		}
	);
	$("#collection_target").click(function(){
		$role_id = $(this).attr('rel');
		$('#dialog-collection').dialog('open');
		$('#dialog-collection').load('<?php echo U("index/collection_add","owner_role_id=");?>'+$role_id);
	});
	$(".update").click(
		function(){
			id = $(this).attr('rel');
			$('#dialog-message2').dialog('open');
			$('#dialog-message2').load("<?php echo U('index/widget_edit','id=');?>"+id);
		}
	);
	$("#list").on("click", ".role_info", function(){
		$role_id = $(this).attr('rel');
		$('#dialog-role-info').dialog('open');
		$('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
	});

	//包含下属
	$("#include_subordinates").click(function(){
		var subordinates = $(this).is(':checked');
		if(subordinates == true){
			window.location.href = "<?php echo U('index/index', 'is_checked=');?>"+1;
		}else{
			window.location.href = "<?php echo U('index/index', 'is_checked=');?>"+2;
		}
	});
});
$(document).ready(function(){
	$("#list").on("click", ".map", function(){
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
});

$("#dialog-role-info").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 550,
	position: ["center",100]
});
function mapInit(x,y,mapID){
	var map = new BMap.Map(mapID);
	var point = new BMap.Point(y, x);
	map.centerAndZoom(point, 15);
	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);               // 将标注添加到地图中
	map.enableScrollWheelZoom(true);
	marker.setAnimation(BMAP_ANIMATION_BOUNCE);
/*
	// 默认河南省郑州市
	var map = new BMap.Map(mapID);
	var point = new BMap.Point(y,x);
	map.centerAndZoom(point,15);
	// 根据聚焦点缩放
	map.enableScrollWheelZoom(true);

	var marker = new BMap.Marker(point);  // 创建标注
	map.addOverlay(marker);               // 将标注添加到地图中
	//marker.setAnimation(BMAP_ANIMATION_BOUNCE);

	geoc.getLocation(point, function(rs){
		//alert(rs.address);
	});*/
}

//任务
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
//鼠标点击空白处，隐藏右侧滑出
document.onmousedown=function(event){
	if($(".litebox-overlay").length > 0) return;
	if($("#dialog_open").val() == 1) return;
	if(event.target.className == 'right-sidebar-toggle-task') return;

    var div = document.getElementById("right-sidebar-task");
    var x=event.clientX;
    var y=event.clientY;
    var divx1 = div.offsetLeft;
    var divy1 = div.offsetTop;
    var divx2 = div.offsetLeft + div.offsetWidth;
    var divy2 = div.offsetTop + div.offsetHeight;
    if( x < divx1 || x > divx2 || y < divy1 || y > divy2){
        if($("#right-sidebar-task").css('right') == '0px'){
            $("#right-sidebar-task").animate({right:'-60%'}, 400);
        }
    }
}
//任务详情弹出
$(document).on('click','.task_view',function(){
	var task_id = $(this).attr('rel');
	// var is_show = document.getElementById("is_show").value;
	$(".emoji_container").remove();
	if($("#right-sidebar-task").css('right') != '0px'){
		$("#right-sidebar-task").animate({right:'0px'}, 600);
	}

    $('#task-content').html(detail_html);
    $('#sidebar-container').load("<?php echo U('task/view','task_id=');?>"+task_id);
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


<div id="right-sidebar-task">
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