<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" language="javascript" src="__PUBLIC__/js/jquery.form.js"></script>
<form id="form_excelImport_info" method="post" enctype="multipart/form-data">
	<table class="table table-hover form-inline">
		<tr>
			<td class="tdleft" width="20%"><?php echo L('FILE_SPECIFICATION');?></td> 
			<td><?php echo L('IMPORT_EXCEL_FILE_PAY_ATTENTION_TO_THE_CHOICE_OF_THE_DATA_CONTENT');?>
			<p><?php echo L('Allow_type_XLS_no_more_than_20MB_file_total_size');?></p></td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('SELECT_IMPORT_FILE');?></td>
			<td><p id="attachment1"><input type="file" id="file" name="excel"/></p><p style="color:red"><?php echo L('IMPORT_FILE_PLEASE_BE_SURE_TO_USE_PROPRIETARY_DATA_WHEN_THE_IMPORT_TEMPLATE');?>&nbsp;<a href="<?php echo U('customer/excelImportDownload');?>"><?php echo L('NOKIA_MONITOR_TEST');?></a></p></td>
		</tr>
		<tr>
			<td class="tdleft">文件中客户重复</td>
			<td>
				<div class="checkbox checkbox-primary" style="padding-left: 0px;">
					<input name="is_jump" id="jump" class="check_list" type="radio" value="1" checked="checked" >
					<label for="jump">跳过并继续执行</label>
				</div>
				<div class="checkbox checkbox-primary">
					<input name="is_jump" id="stop" class="check_list" type="radio" value="2">
					<label for="stop">终止导入</label>
				</div>
			</td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('PRINCIPAL');?></td>
			<td>
				<input type="hidden" id="owner_id" name="owner_role_id" value="<?php echo (session('role_id')); ?>"/>
				<input type="text" id="owner_name" name="owner_name" value="<?php echo (session('name')); ?>" class="form-control" /> &nbsp;&nbsp;

				<!-- <input class="btn btn-mini" id="putremove"  type="button" value="<?php echo L('IN_THE_CUSTOMER_POOL');?>"/> -->
				<div class="checkbox checkbox-primary">
					<input class="check_list" id="put_poor" type="checkbox">
					<label for="put_poor">将导入客户全部放入客户池</label>
				</div>
			</td>
		</tr>
		<tr>
			<td>&nbsp;</td>
			<td>
				<div style="float: right;">
					<button type="button" id="submit" class="btn btn-primary" role="button" ><span class="ui-button-text">确定</span></button>
					<button type="button" class="btn" role="button" aria-disabled="false" onclick="javascript:$('#dialog-import').dialog('close');"><span class="ui-button-text">取消</span></button>
				</div>
			</td>
		</tr>
	</table>
</form>
<div id="importcontent" style="display:none">
	<div style="padding:10px;background-color:#f9f9f9;border:1px solid #f6f6f6;">
		共<span id="all_rows" style="color:green"></span>条数据，导入至第<span id="this_rows" style="color:green"></span>条，导入成功<span id="success_rows" style="color:green"></span>条，导入失败<span id="error_rows" style="color:red"></span>条
		<span id="import"></span>
	</div>
	<div id="error_message" style="color:red;height:250px"></div>
	<div style="float: right;">
		<a class="btn btn-primary" href="<?php echo U('customer/index');?>">确定</a>
	</div>
</div>
<div style="display:none" id="dialog-role-list" title="<?php echo L('CHOOSE_HEAD_OF_THE_CUSTOMER');?>">loading...</div>
<script type="text/javascript">
$("#submit").click(function(){
	$("#form_excelImport_info").ajaxSubmit({
		type:'post',
		url:'<?php echo U("customer/excelImport");?>',
		success:function(data){
			if(data.status == 1){
				$("#form_excelImport_info").hide();
				$("#importcontent").show();

				//隐藏dialog右上角 “x”
				$(".ui-dialog-titlebar-close").hide();

				var owner_role_id = $("#owner_id").val();
				var num = 3;
				update(num, data.data, owner_role_id, $('input[name=is_jump]:checked').val());
			}else{
				alert_crm('导入文件时出错！');
			}
		}
	});
});
var success_rows = 0;
var error_rows = 0;
function update(no,path,owner_role_id,is_jump){
	var url = "<?php echo U('customer/excelImportact','num=');?>"+no+'&path='+path+'&owner_role_id='+owner_role_id+'&is_jump='+is_jump;
	$.get(url,function(data){
		if(data.status == 1){
			$.each(data.data.message, function(k, v){
				if(v.error_message){
					error_rows ++;
					$('#error_message').append('<p style="padding:3px;">第"'+v.no+'"行出错,"'+v.error_message+'"</p>');
				}else{
					success_rows ++;
				}
				$("#this_rows").html(v.no-2);
				$("#success_rows").html(success_rows);
				$("#error_rows").html(error_rows);
			});
			$("#all_rows").html(data.data.allrow -2);	
			if(no+99 < data.data.allrow ){
				$("#import").html('正在导入...');
				update(no+101,path,owner_role_id)
			}else{
				$("#import").html('<span style="color:green">导入成功</span><a href="<?php echo U('customer/index');?>">刷新</a>');
			}
		}else if(data.status == 2){
			alert_crm(data.data);
		}else{
			alert_crm(data.info);
		}
	});
}

$("#dialog-role-list").dialog({
	autoOpen: false,
	modal: true,
	width: 600,
	maxHeight: 400,
	buttons: {
		"确定": function () {
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').attr('rel');
			$('#owner_name').val(name);
			$('#owner_id').val(item);
			$(this).dialog("close"); 
		},
		"取消": function () {
			$(this).dialog("close");
		}
	},
	position: ["center", 100]
});
$(function(){
	$('#owner_name').click(
		function(){

			$('#put_poor').removeAttr("checked");

			$('#dialog-role-list').dialog('open');
			$('#dialog-role-list').load("<?php echo U('user/listDialog');?>");
		}
	);
	/*$('#putremove').click(
		function(){
			$('#owner_id').attr('value', '');
			$('#owner_name').attr('value', '');
		}
	);*/

	//导入客户是否放入客户池
	$('#put_poor').click(function(){
		if ($(this).is(':checked')) {
			$('#owner_id').val('');
			$('#owner_name').val('');
		} else {
			$('#owner_id').val("<?php echo (session('role_id')); ?>");
			$('#owner_name').val("<?php echo (session('name')); ?>");
		}
	});
});
</script>