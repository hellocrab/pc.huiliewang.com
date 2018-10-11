<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
	<meta charset="utf-8">
	<title><?php echo L('LOGIN_TITLE');?></title>
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	<meta name="description" content=""/>
	<meta name="author" content="<?php echo L('AUTHOR');?>"/>
	<link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>
	<link href="__PUBLIC__/style/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="__PUBLIC__/css/bootstrap-responsive.min.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/plugins/toastr/toastr.min.css" rel="stylesheet">
	<link rel="stylesheet" href="__PUBLIC__/css/baseuser.css"/>
	<script src="__PUBLIC__/style/js/jquery-2.1.1.js"></script>
    <script src="__PUBLIC__/style/js/bootstrap.min.js"></script>
    <!-- <script src="__PUBLIC__/style/js/plugins/iCheck/icheck.min.js"></script> -->
    <script src="__PUBLIC__/style/js/plugins/toastr/toastr.min.js"></script>
    <script src="__PUBLIC__/js/jquery.base64.js"></script>
	<script src="__PUBLIC__/js/jquery.md5.js"></script>
    <!-- ladda -->
	<script src="__PUBLIC__/style/js/plugins/ladda/spin.min.js"></script>
	<script src="__PUBLIC__/style/js/plugins/ladda/ladda.min.js"></script>
	<script src="__PUBLIC__/style/js/plugins/ladda/ladda.jquery.min.js"></script>
	<link href="__PUBLIC__/style/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
</head>
<style>
	.errorInput {border:1px solid red;}
</style>
<body>
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
<div class="content-login">
    <div class="imgdefault" style="background:url(__PUBLIC__/img/default.jpg)no-repeat; width:100%; height:100%; background-size:100% 100%; position:absolute; filter:progid:DXImageTransform.Microsoft.AlphaImageLoader(src='__PUBLIC__/img/default.jpg',sizingMethod='scale');  " >

    </div>
    <div class="logininfo">
	    <div class="logininfowidth">
	        <div class="loginrq ">
	            <a href="javascript:;">
	               	<img <?php if($logo): ?>src= "<?php echo ($logo); ?>"<?php else: ?>src= "__PUBLIC__/img/mx.png"<?php endif; ?> style="width: 234px;height:72px;" />
	            </a>
	        </div>
		    <form action="" class="formtheme" method="post" id="login_form">
			    <div class="logininputList logininputListUser">
			        <input type="text" class="inputinfo" name="name" id="name" placeholder="账号" value="" autofocus="autofocus">
			     </div>
			    <div class="logininputList logininputListPwd">
			 		<input type="password" class="inputinfo" name="password" id="password" value="" placeholder="密码">
			    </div>
			    <div class="logininputList" style="margin-top:-12px;margin-bottom: 10px;">
					<button class="ladda-button loginBtninfo" id="loginsub" data-style="zoom-in" type="submit">
						<span class="ladda-label">登 录</span><span class="ladda-spinner"></span>
					</button>
			    </div>
			    <p class="logininputList" style="padding-top: 30px;"><a style="margin-right: 15px;" href="<?php echo U('user/lostpw');?>">忘记密码?</a></p>
		    </form>
		    <p style="text-align: center;top:180px;position: relative;display: none;">
		    	<a><small>&copy;<?php echo date('Y',time());?> MXCRM</small></a>
		 	</p>
	    </div>
    </div>
</div>
</body>
<script type="text/javascript">
	// $('body').keydown(function(event){
	//     if(event.keyCode == "13"){
	//         $('#loginsub').click();
	//     }
	// });
	$('#loginsub').click(function() {
		$.base64.utf8encode = true;
		if($('#name').val() == ''){
			$('#name').focus();
			return false;
		}
		if($('#password').val() == ''){
			$('#password').focus();
			return false;
		}
		if($('#password').val()){
			$('#password').val($.md5($.trim($('#password').val())));
		}
	});
	//保存按钮loading
	$( '.ladda-button' ).ladda( 'bind', { timeout: 2000 } );
</script>
</html>