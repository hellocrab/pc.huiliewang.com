<?php if (!defined('THINK_PATH')) exit();?><style>
	.control-label{
		float: left;
		width: 160px;
		padding-top: 5px;
		text-align: right;
		margin-right:10px;
	}
	.control-group{
		float:left;
		width:100%;
		margin:10px;
	}
</style>
<form class="form-inline" action="<?php echo U('index/widget_edit');?>" id="widget_edit" method="post" >
	<input name="widget_id" type="hidden" value="<?php echo ($edit_demo['id']); ?>"/>
	<div class="control-group">
		<label class="control-label"><?php echo L('COMPONENT_NAME');?></label>
		<div class="controls">
			<input type="text" id="title" class="form-control" name="title" value="<?php echo ($edit_demo['title']); ?>" style="width:150px;"/>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">选择组件</label>
		<div class="controls">
			<select name="widget" id="widget" onchange="changeWidget()" class="form-control" style="width:150px;">
				<?php if(is_array($widget_module)): $i = 0; $__LIST__ = $widget_module;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option mod="<?php echo ($vo["module"]); ?>" act="<?php echo ($vo["action"]); ?>" rel="<?php echo ($vo['name']); ?>" value="<?php echo ($vo["tag"]); ?>" <?php if($edit_demo['widget'] == $vo['tag']): ?>selected="selected"<?php endif; ?>>
						<?php echo ($vo["name"]); ?>
					</option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>
	<div class="control-group" id="status_type" style="display:none;">
		<label class="control-label">选择商机状态组</label>
		<div class="controls">
			<select name="status_type_id" id="status_type_id" class="form-control" onchange="changeTypeStatus()" style="width:150px;">
				<?php if(is_array($type_list)): $i = 0; $__LIST__ = $type_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["id"]); ?>" <?php if($edit_demo['status_type_id'] == $vo['id']): ?>selected<?php endif; ?>><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
		</div>
	</div>
	<div class="control-group">
		<label class="control-label">数据来源</label>
		<div class="controls">
			<select name="level" id="level" class="form-control" style="width:150px;">
				<option value="0" <?php if($edit_demo['level'] == '0'): ?>selected="selected"<?php endif; ?>>自己</option>
				<option value="1" <?php if($edit_demo['level'] == '1'): ?>selected="selected"<?php endif; ?>>自己和下属</option>
			</select>
		</div>
	</div>
	<!-- <div class="control-group">
		<label class="control-label"></label>
		<div class="controls">
			<input name="submit" class="btn btn-primary" type="submit" value="<?php echo L('SAVE');?>"/>
		</div>
	</div> -->
</form>
<script type="text/javascript">
	/**
	 * 页面加载时根据操作人权限去除部分无需设置权限的数据来源
	 **/
	$(document).ready(function(){
		var widget = $('#widget').val();
		if(widget == 'Notepad'){
			$('#level').attr('disabled', true);
		}else{
			changeLevel();
		}
	});
	
	/**
	 * level值改变时根据操作人权限去除部分无需设置权限的数据来源
	 **/
	$('#widget').change(function(){
		var widget = $('#widget').val();
		if(widget == 'Notepad'){
			$('#level').attr('disabled', true);
		}else{
			changeLevel();
		}
	});
	
	function changeLevel(){
		//获取权限
		var module = $("select[name='widget'] option:selected").attr("mod");
		var action = $("select[name='widget'] option:selected").attr("act");
		$.ajax({
			type : 'get',
			url  : '<?php echo U("user/getActionAuthority");?>',
			data : {'module' : module, 'action' : action},
			dataType : 'json',
			success  : function(result){
				if(result.data == '1' || result.data == '2' || result.data == '4'){
					//自己和下属、所有人、部门所有人
					$('#level').attr('disabled', false);
				}else if(result.data == '3'){
					//仅自己
					$('#level').attr('disabled',true);
				}
			},
			error : function(result){
				alert('获取权限失败，请重试！');
			}
		});
	}

	changeWidget();
	function changeWidget(){
		var widget_name	= $('#widget option:selected').attr('rel');
		if ($('#widget option:selected').val() == 'Salesfunnel') {
			$('#status_type').show();
			changeTypeStatus();
		} else {
			$('#status_type').hide();
		}
		$('#title').val(widget_name);
	}
	
	function changeTypeStatus(){
		var widget_name	= $('#widget option:selected').attr('rel');
		var status_name = $('#status_type_id option:selected').text();
		$('#title').val(widget_name+'【'+status_name+'】');
	}
</script>