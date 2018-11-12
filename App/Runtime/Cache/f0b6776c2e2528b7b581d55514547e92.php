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
	<script type="text/javascript" src="__PUBLIC__/js/checkuser.js"></script>
	<script type="text/javascript" src="__PUBLIC__/js/WdatePicker.js"></script>
	<link href="__PUBLIC__/style/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
</head>
<style>
	.errorInput {border:1px solid red;}
</style>
<style type="text/css">
	#zhuce {
		padding-left: 30px;
		font-family: AdobeHeitiStd-Regular;
		font-size: 24px;
		font-weight: normal;
		font-stretch: normal;
		letter-spacing: 0px;
		color: #777777;
		position: absolute;
		float: left;
	}
	#close{
		position: relative;
		float: right;
		margin-right: 22px;
	}
	#line{
		width: 570px;
		height: 3px;
		background-color: #eeeeee;
		border-radius: 1px;
		margin-left: 15px;
	}
	.div1{
		margin-top: 17px;
		margin-left: 217px;
		width: 164px;
		height: 25px;
	}
	.div2{
		margin-top: 17px;
		margin-left: 217px;
		width: 164px;
		height: 25px;
	}
	.div3{
		margin-top: 17px;
		margin-left: 217px;
		width: 164px;
		height: 25px;
	}
	.labell{
		font-family: SourceHanSansCN-Normal;
		font-size: 18px;
		font-weight: normal;
		font-stretch: normal;
		letter-spacing: 0px;
		color: #999999;
	}
	.up{
		margin-top: 32px;
	}
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
			    <p class="logininputList" style="padding-top: 30px;">
					<a style="margin-right: auto;" href="javascript:void(0);" id="do_regist">注册</a>
					<a style="margin-right: 15px;" href="<?php echo U('user/lostpw');?>">忘记密码?</a>
				</p>
		    </form>
		    <p style="text-align: center;top:180px;position: relative;display: none;">
		    	<a><small>&copy;<?php echo date('Y',time());?> MXCRM</small></a>
		 	</p>
		</div>
    </div>
	<div style="position: absolute;float: left;top:10%;left:30%;z-index: 99;padding:4px;width:100px;display: none;" id="regist">
		<div style="width: 600px;height: 600px;background-color: #ffffff;box-shadow: 3px 5px 20px 1px rgba(4, 0, 0, 0.13);border-radius: 15px;opacity: 0.98;">
			<div style="padding: 10px;width: 100%;height: 60px;">
				<p id="zhuce">注册</p>
				<a href="javascript:void(0);" id="close"><img src="..\..\..\Public\img\close.png"/></a>
			</div>
			<div id="line"></div>
			<img src="..\..\..\Public\img\first.png" class="div1" style="display: block;"/>
			<img src="..\..\..\Public\img\second.png" class="div2" style="display: none;"/>
			<img src="..\..\..\Public\img\three.png" class="div3" style="display: none;"/>
			<form action="<?php echo U('user/login');?>" method="post" class="form-horizontal" style="width: 398px;height: 269px;margin-left: 91px;">
				<input type="hidden" name="mark" value="7777"/>
				<div class="form-group " style="display: none;">
					<div class="col-sm-1">
					</div>
					<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>员工编号：</label>
					<div class="col-sm-6">
						<div class="input-daterange input-group">
							<span class="input-group-addon" style="background-color:#ccc;"><?php echo ($prefixion); ?></span>
							<input type="text" id="number" name="number" rel="require" class="form-control checkit" value="<?php echo ($number); ?>"/>
							<input type="hidden" id="prefixion" name="prefixion" value="<?php echo ($prefixion); ?>"/>
						</div>
					</div>
					<!-- <div class="col-sm-3 error_msg" id="full_nameTip"></div> -->
				</div>
				<div style="display: block;padding-top: 66px;" class="div11">
					<div class="form-group">
						<label for="full_name" class="col-sm-3 labell">姓名:</label>
						<div class="col-sm-6">
							<input type="text" id="full_name" rel="require" rell="姓名" name="full_name" class="form-control checkit" onblur="checkform(this);">
						</div>
						<div class="col-sm-3 error_msg" id="full_nameTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label for="English" class="col-sm-3 labell">英文名:</label>
						<div class="col-sm-6">
							<input type="text" name="second_name" rel="require" rell="英文名" class="form-control checkit" onblur="checkform(this);" id="English" >
						</div>
						<div class="col-sm-3 error_msg" id="EnglishTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label for="tel" class="col-sm-3 labell">手机:</label>
						<div class="col-sm-6">
							<input type="text" name="telephone" rel="phone" rell="手机" class="form-control checkit" onblur="checkform(this);" id="tel">
						</div>
						<div class="col-sm-3 error_msg" id="telTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label  class="col-sm-3 labell">性别:</label>
						<div class="col-sm-4" >
							<div style="position:absolute;float: left;" class="radio radio-info radio-inline"><input type="radio" value="male" checked="checked" class="sex form-inline" name="sex" />男</div>
							<div style="position:absolute;float: left;margin-left: 60px;" class="radio radio-info radio-inline"><input type="radio" value="female" class="sex form-inline" name="sex"/>女</div>
						</div>
					</div>
					<button type="button" id="nextdiv2" style="margin-left: 80px;margin-top:90px;width: 270px;height: 60px;background-color: #00aaef;border-radius: 15px;" class="btn btn-primary">下一步</button>
				</div>
				<div style="display: none;padding-top: 66px;" class="div21">
					<div class="form-group">
						<label for="account" class="col-sm-3 labell">账号</label>
						<div class="col-sm-6">
							<input type="text" name="name" rel="require" rell="账号" class="form-control checkit" onblur="checkform(this);" id="account">
						</div>
						<div class="col-sm-3 error_msg" id="accountTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label for="pass" class="col-sm-3 labell">密码</label>
						<div class="col-sm-6">
							<input type="password" name="password" rel="password" rell="密码" class="form-control checkit" onblur="checkform(this);" id="pass">
						</div>
						<div class="col-sm-3 error_msg" id="passTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label for="confirmpd" class="col-sm-3 labell">确认密码</label>
						<div class="col-sm-6">
							<input type="password" name="confirmpd" rel="confirmpd" rell="确认密码" class="form-control checkit" onblur="checkform(this);" id="confirmpd">
						</div>
						<div class="col-sm-3 error_msg" id="confirmpdTip" style="color:red;"></div>
					</div>
					<div class="form-group up">
						<label for="email" class="col-sm-3 labell">邮箱</label>
						<div class="col-sm-6">
							<input type="text" name="email" rel="email" rell="邮箱" class="form-control checkit" onblur="checkform(this);" id="email">
						</div>
						<div class="col-sm-3 error_msg" id="emailTip" style="color:red;"></div>
					</div>
					<button type="button" id="nextdiv3" style="margin-left: 80px;margin-top:90px;width: 270px;height: 60px;background-color: #00aaef;border-radius: 15px;" class="btn btn-primary">下一步</button>
				</div>
				<div style="display: none;padding-top: 66px;" class="div31">
					<div class="form-group">
						<label for="name" class="col-sm-3 labell">入职时间:</label>
						<div class="col-sm-6">
							<input class="Wdate text-input small-input form-control" name="entry" id="entry" type="text"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})">
						</div>
					</div>

					<div class="form-group up">
						<label for="name" class="col-sm-3 labell">部门岗位:</label>
						<div class="col-sm-9">
							<select id="department" class="form-control" style="float:left;width:45%;" rel="require" rell="所属部门" name="department_id" onchange="changeRoleContent()">
								<option value="">--所属部门--</option>
								<?php if(is_array($department_list)): $i = 0; $__LIST__ = $department_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i;?><option <?php if($user['department_id'] == $temp['department_id']): ?>selected<?php endif; ?> value="<?php echo ($temp["department_id"]); ?>"><?php echo ($temp["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>&nbsp;&nbsp;
							<select id="role" class="form-control checkit" onchange="checkform(this);" style="float:left;width:50%;margin-left:5px;" rel="require" rell="所属岗位" name="position_id">
								<option value="">--所属岗位--</option>
								<?php if(is_array($position_list)): $i = 0; $__LIST__ = $position_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i;?><option <?php if($user['position_id'] == $temp['position_id']): ?>selected<?php endif; ?> value="<?php echo ($temp["position_id"]); ?>"><?php echo ($temp["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
					</div>

					<div class="form-group up">
						<label for="name" class="col-sm-3 labell">角色</label>
						<div class="col-sm-6">
							<select id="type" class="form-control checkit" onchange="checkform(this);" rel="require" rell="员工角色" name="type">
								<option value="">--员工角色--</option>
								<?php if(is_array($user_type_list)): $key = 0; $__LIST__ = $user_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
						<div class="col-sm-3 error_msg" id="typeTip"></div>
					</div>
					<div class="form-group up">
						<label for="name" class="col-sm-3 labell">职级</label>
						<div class="col-sm-6">
							<select id="jobrank" class="form-control checkit" onchange="checkform(this);"  rel="require" rell="员工职级" name="jobrank">
								<option value="">--员工职级--</option>
								<?php if(is_array($user_jobrank_list)): $key = 0; $__LIST__ = $user_jobrank_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
							</select>
						</div>
						<div class="col-sm-3 error_msg" id="jobrankTip"></div>
					</div>
					<button type="submit" id="submit" style="margin-left: 80px;margin-top:90px;width: 270px;height: 60px;background-color: #00aaef;border-radius: 15px;" class="btn btn-primary">确定</button>
				</div>
			</form>
		</div>
		<script>
            $('#number').blur(function(){
                var number = $(this).val();
                var prefixion = $('#prefixion').val();
                var user_id = "";
                $.ajax({
                    type: "post",
                    async:false,
                    url: "<?php echo U('user/yanchong');?>",
                    data: {number:number,user_id:user_id,prefixion:prefixion},
                    dataType: "json",
                    success : function(result){
                        if(result.status != 1){
                            swal('员工编号不能重复！','',"error");
                            return false;
                        }else{
                            return true;
                        }
                    }
                });
            });
            $(document).ready(function(){
                $('.date').datepicker({
                    format: "yyyy-mm-dd",
                    todayBtn: "linked",
                    keyboardNavigation: false,
                    forceParse: false,
                    calendarWeeks: true,
                    autoclose: true
                });
                $(document).ready(function(){
                    $("#department").change(function(){
                        checkform('#role');
                    });
                    $("#role").change(function(){
                        checkform('#role');
                    });
                });

                $("#adbtn").click(function(){
                    if(input_msg && before_submit()){
                        $.ajax({
                            type: "POST",
                            url: "<?php echo U('user_add');?>",
                            data:$("#ad_Form").serialize(),
                            async: true,
                            success: function(data) {
                                if(data.status == 1){
                                    swal({
                                        title: "添加成功！",
                                        text: "跳转中!",
                                        type: "success"
                                    });
                                    $('#Modal').modal('hide');
                                    top.location.reload();
                                }else{
                                    swal({
                                        title: "添加失败!",
                                        text: data.info,
                                        type: "error"
                                    });
                                }
                            }
                        });
                    }else{
                        var item_id = [];
                        $('.checkit').each(function(k,v){
                            checkform(v);
                            item_id.push($(v).attr('id'));
                        });
                        $.each(item_id,function(k,v){
                            if($('#'+v+'Tip').html() == ''){
                                item_id.splice(k,1);
                            }
                        });
                        $('#'+item_id[0]).focus();
                        return false;
                    }
                });
            });
            function changeRoleContent(){
                department_id = $('#department').val();
                if(department_id == ''){
                    $("#role").html('');
                }else{
                    $.ajax({
                        type:'get',
                        url:'index.php?m=user&a=login&id='+department_id,
                        async:false,
                        success:function(data){
                            options = '';
                            if(data.data){
                                $.each(data.data, function(k, v){
                                    options += '<option value="'+v.position_id+'">'+v.name+'</option>';
                                });
                            }
                            $("#role").html(options);
                        },
                        dataType:'json'
                    });
                }
            }
            $('#role').click(
                function(){
                    department_id = $('#department').val();
                    if(department_id == ''){
                        swal({
                            title: "温馨提示",
                            text: "<?php echo L('SELECT_DEPARTMENT_FIRST');?>"
                        })
                        return false;
                    }
                }
            );
		</script>
	</div>
</div>
</body>

<script type="text/javascript">
	$('#close').click(function () {
		$('#regist').css('display','none');
		$('.div1').css('display','block');
		$('.div2').css('display','none');
		$('.div3').css('display','none');
		$('.div11').css('display','block');
		$('.div21').css('display','none');
		$('.div31').css('display','none');
    });
	$('#do_regist').click(function () {
		$('#regist').css('display','block');
    });
	$('#nextdiv2').click(function () {
        var myreg = /\S/;
        var myregphone = /^(0|86|17951)?(13[0-9]|15[012356789]|17[678]|18[0-9]|14[57])[0-9]{8}$/;
	    var full_name = $('#full_name').val();
	    var English = $('#English').val();
	    var tel = $('#tel').val();
		if(tel !=''&&English!=''&&full_name!= '' && myreg.test(full_name) && myreg.test(English) && myregphone.test(tel))
        {
            $('.div21').css('display','block');
            $('.div11').css('display','none');
            $('.div1').css('display','none');
            $('.div2').css('display','block');
		}else {
		    return false;
		}
    });
	$('#nextdiv3').click(function () {
	    var account = $('#account').val();
	    var pass = $('#pass').val();
	    var confirmpd = $('#confirmpd').val();
	    var email = $('#email').val();
        var myreg = /\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/;
	    if( account !=''&& pass!='' && pass==confirmpd && confirmpd != '' && email != '' && myreg.test(email)){
            $('.div31').css('display','block');
            $('.div21').css('display','none');
            $('.div2').css('display','none');
            $('.div3').css('display','block');
		}else {
	        return false;
		}
    });
	$('#submit').click(function () {
		var entry = $('#entry').val();
		if (entry == ''){
		    return false;
		}
    });
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