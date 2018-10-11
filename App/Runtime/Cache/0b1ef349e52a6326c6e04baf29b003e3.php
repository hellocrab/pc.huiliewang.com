<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="__PUBLIC__/css/validator.css"/>
<script type="text/javascript" src="__PUBLIC__/js/checkuser.js"></script>
<style>
	.close{font-size:34px;font-weight:400;color:#fff;}
	.close:hover{color:#fff;}
</style>
<div class="modal-header" style="padding:3px 10px;">
	<b style="font-size:16px;">添加员工</b>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body clearfix">
	<form id="ad_Form" class="form-horizontal m-t" method="post">
		<input type="hidden" name="position_id" id="position_id" value="<?php echo ($position_id); ?>">
		<input type="hidden" name="department_id" id="department_id" value="<?php echo ($department_id); ?>">
		<div class="col-sm-12">
			<?php if($department_id != '' && $position_id != ''): ?><div class="form-group">
					<div class="col-sm-1">
					</div>
					<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>岗位名称：</label>
					<div class="col-sm-6">
						<input type="text"  readonly="readonly" value="<?php echo ($de_po); ?>" class="form-control"/>
					</div>
				</div><?php endif; ?>
			<?php if(C('CALL_CENTER') == 1): ?>
				<div class="form-group ">
					<div class="col-sm-1"></div>
					<label class="control-label col-sm-2" for="name" style="width:110px;">坐席号：</label>
					<div class="col-sm-6">
						<select name="extid" class="form-control">
							<option value="请选择">请选择</option>
							<?php $__FOR_START_1323144622__=C('EXTID_MIN');$__FOR_END_1323144622__=C('EXTID_MAX');for($i=$__FOR_START_1323144622__;$i <= $__FOR_END_1323144622__;$i+=1){ ?><option value="<?php echo ($i); ?>"><?php echo ($i); ?></option><?php } ?>
						</select>
					</div>
				</div>
			<?php endif; ?>
			<div class="form-group ">
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
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>姓名：</label>
				<div class="col-sm-6">
					<input type="text" id="full_name" name="full_name" rel="require" rell="姓名" class="form-control checkit" onblur="checkform(this);" />
				</div>
				<div class="col-sm-3 error_msg" id="full_nameTip"></div>
			</div>
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>英文名：</label>
				<div class="col-sm-6">
					<input type="text" id="second_name" name="second_name" rel="require" rell="英文名" class="form-control checkit" onblur="checkform(this);" />
				</div>
				<div class="col-sm-3 error_msg" id="second_nameTip"></div>
			</div>
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>邮箱：</label>
				<div class="col-sm-6">
					<input type="text" id="email" name="email" rel="email" rell="邮箱" class="form-control checkit" onblur="checkform(this);" />
				</div>
				<div class="col-sm-3 error_msg" id="emailTip"></div>
			</div>
			<div class="form-group">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>登录账号：</label>
				<div class="col-sm-6">
					<input type="text" id="name" name="name" rel="require" rell="登录账号" class="form-control checkit" onblur="checkform(this);"/>
				</div>
				<div class="col-sm-3 error_msg" id="nameTip"></div>
			</div>
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>初始密码：</label>
				<div class="col-sm-6">
					<input type="password" id="password" name="password" rel="password" rell="初始密码" class="form-control checkit" onblur="checkform(this);" />
				</div>
				<div class="col-sm-3 error_msg" id="passwordTip"></div>
			</div>
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>确认密码：</label>
				<div class="col-sm-6">
					<input type="password" id="confirmpd" name="confirmpd" rel="confirmpd" rell="确认密码" class="form-control checkit" onblur="checkform(this);"/>
				</div>
				<div class="col-sm-3 error_msg" id="confirmpdTip"></div>
			</div>
			<?php if($customer_num == 1): ?><div class="form-group ">
					<div class="col-sm-1">
					</div>
					<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>客户数量：</label>
					<div class="col-sm-6">
						<input type="text" id="customer_num" name="customer_num" class="form-control" />
					</div>
					<div class="col-sm-3 error_msg" id="confirmpdTip"></div>
				</div><?php endif; ?>

			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;">入职日期：</label>
				<div class="col-sm-6">
					<input class="Wdate text-input small-input form-control" name="entry" id="entry" type="text"  onClick="WdatePicker({dateFmt:'yyyy-MM-dd'})" style="width:280px;">
				</div>
			</div>
			<?php if($department_id == '' && $position_id == ''): ?><div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>部门岗位：</label>
				<div class="col-sm-6" >
					<select id="department" class="form-control" style="float:left;width:50%;" rel="require" rell="所属部门" name="department_id" onchange="changeRoleContent()">
						<option value="">--所属部门--</option>
						<?php if(is_array($department_list)): $i = 0; $__LIST__ = $department_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i;?><option <?php if($user['department_id'] == $temp['department_id']): ?>selected<?php endif; ?> value="<?php echo ($temp["department_id"]); ?>"><?php echo ($temp["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>&nbsp;&nbsp;
					<select id="role" class="form-control checkit" onchange="checkform(this);" style="float:left;width:45%;margin-left:5px;" rel="require" rell="所属岗位" name="position_id">
						<option value="">--所属岗位--</option>
						<?php if(is_array($position_list)): $i = 0; $__LIST__ = $position_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i;?><option <?php if($user['position_id'] == $temp['position_id']): ?>selected<?php endif; ?> value="<?php echo ($temp["position_id"]); ?>"><?php echo ($temp["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="col-sm-3 error_msg" id="roleTip"></div>
			</div><?php endif; ?>

			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>角色：</label>
				<div class="col-sm-6">
					<select id="type" class="form-control checkit" onchange="checkform(this);" style="float:left;width:50%;" rel="require" rell="员工角色" name="type">
						<option value="">--员工角色--</option>
						<?php if(is_array($user_type_list)): $key = 0; $__LIST__ = $user_type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><option value="<?php echo ($key); ?>"><?php echo ($vo); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="col-sm-3 error_msg" id="typeTip"></div>
			</div>

			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>职级：</label>
				<div class="col-sm-6">
					<select id="jobrank" class="form-control checkit" onchange="checkform(this);" style="float:left;width:50%;" rel="require" rell="员工职级" name="jobrank">
						<option value="">--员工职级--</option>
						<?php if(is_array($user_jobrank_list)): $key = 0; $__LIST__ = $user_jobrank_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($key % 2 );++$key;?><option value="<?php echo ($vo["id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
				<div class="col-sm-3 error_msg" id="jobrankTip"></div>
			</div>





			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>手机：</label>
				<div class="col-sm-6">
					<input type="text" id="telephone" name="telephone" rel="phone" rell="手机" class="form-control checkit" onblur="checkform(this);"/>
				</div>
				<div class="col-sm-3 error_msg" id="telephoneTip"></div>
			</div>
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name" style="width:110px;"><span style="color:#FF0011;">*</span>性别：</label>
				<div class="col-sm-6">
					<div class="radio radio-info radio-inline" style="margin-left: 25px;">
                        <input type="radio" id="sex_1"  name="sex" value="1" checked="checked" />
                        <label for="sex_1"><?php echo L('MALE');?></label>
                    </div>
                    <div class="radio radio-info radio-inline" style="margin-left: 25px;">
                        <input type="radio" id="sex_2" name="sex" value="2" />
                        <label for="sex_2"><?php echo L('FEMALE');?></label>
                    </div>
				</div>
			</div>
			<div class="form-group " style="margin:-8px;">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2" for="name"></label>
				<div class="col-sm-3" id="mes" style="color:red;"></div>
				<div class="col-sm-6"></div>
			</div>
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
			url:'index.php?m=user&a=getPositionlistByDepartment&id='+department_id,
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
<div class="modal-footer" style="padding:8px 22px;">
	<button type="button" id="adbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>