<?php if (!defined('THINK_PATH')) exit();?><script type="text/javascript" language="javascript" src="__PUBLIC__/js/jquery.form.js"></script>
<form id="form_excelImport_info" action="" id="excelimport_dialog" method="post" enctype="multipart/form-data">
	<input type="hidden" name="m" value="product"/>
	<input type="hidden" name="a" value="excelImport"/>
	<table class="table table-hover">
		<tr>
			<td class="tdleft" width="20%"><?php echo L('FILE_SPECIFICATION');?></td> 
			<td><?php echo L('IMPORT_EXCEL_FILE_PAY_ATTENTION_TO_THE_CHOICE_OF_THE_DATA_CONTENT');?>
			<p><?php echo L('ALLOW_TYPE_XLS_NO_MORE_THAN_20MB_FILE_TOTAL_SIZE');?></p></td>
		</tr>
		<tr>
			<td class="tdleft" width="20%"><?php echo L('ERROR_HANDLING');?></td> 
			<td>
				<input id="ownership" type="radio" checked="checked" value="0" name="error_handing"><?php echo L('TERMINATION');?>
				<input id="ownership1" type="radio" value="1" name="error_handing"><?php echo L('SKIP');?>
			</td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('SELECT_IMPORT_FILE');?></td>
			<td><p id="attachment1"><input type="file" name="excel"/></p><p style="color:red"><?php echo L('IMPORT_FILE_PLEASE_BE_SURE_TO_USE_PROPRIETARY_DATA_WHEN_THE_IMPORT_TEMPLATE');?>&nbsp;<a href="<?php echo U('product/excelImportDownload');?>"><?php echo L('NOKIA_MONITOR_TEST');?></a></p></td>
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
	<div style="padding:10px;background-color:#f9f9f9;border:1px solid #f6f6f6;margin-bottom:5px;">
		共<span id="all_rows" style="color:green"></span>条数据，导入至第<span id="this_rows" style="color:green"></span>条，导入成功<span id="success_rows" style="color:green"></span>条，导入失败<span id="error_rows" style="color:red"></span>条
		<span id="import"></span>
	</div>
	<div id="error_message" style="color:red;height:250px">
	</div>
</div>
<script type="text/javascript">
$("#submit").click(function(){
	$("#form_excelImport_info").ajaxSubmit({
		type:'post',
		url:'<?php echo U("product/excelImport");?>',
		success:function(data){
			if(data.status == 1){
				$("#form_excelImport_info").hide();
				$("#importcontent").show();
				var num = 3;
				update(num, data.data);
			}else{
				alert_crm('导入文件时出错！');
			}
		}
	});
});
var success_rows = 0;
var error_rows = 0;
function update(no,path){
	
	var url = "<?php echo U('product/excelImportact','num=');?>"+no+'&path='+path;
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
				update(no+100,path)
			}else{
				$("#import").html('<span style="color:green">导入成功</span><a href="<?php echo U('product/index');?>">刷新</a>');
			}
		}else{
			alert(data.info);
		}
	});
}
</script>