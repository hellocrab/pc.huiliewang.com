<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
	<span><?php if($_GET['move']): ?>移动<?php else: ?>修改部门信息<?php endif; ?></span>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body clearfix">
	<form id="ed_Form" class="form-horizontal m-t" action="<?php echo U('User/department_edit');?>" method="Post">
	<div class="col-sm-12">
		<input type="hidden" id="department_id" name="department_id" value="<?php echo ($department["department_id"]); ?>"/>
		<?php if($_GET['move']): ?><div class="form-group col-sm-offset-1">
				<label class="control-label col-sm-3" for="parent_id">移动到父级：</label>
				<div class="col-sm-4">
					<select id="parent_id" name="parent_id" class="form-control">
						<option value="0"><?php echo L('THE_TOP_DEPARTMENT');?></option>
						<?php if(is_array($department_list)): $i = 0; $__LIST__ = $department_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($department['parent_id'] == $vo['department_id']): ?>selected<?php endif; ?> value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
		<?php else: ?>
			<div class="form-group col-sm-offset-1">
				<label class="control-label col-sm-2" for="parent_id"><?php echo L('SUPERIORS_DEPARTMENT');?>：</label>
				<div class="col-sm-4">
					<select id="parent_id" name="parent_id" class="form-control">
						<option value="0"><?php echo L('THE_TOP_DEPARTMENT');?></option>
						<?php if(is_array($department_list)): $i = 0; $__LIST__ = $department_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($department['parent_id'] == $vo['department_id']): ?>selected<?php endif; ?> value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</div>
			</div>
			<div class="form-group col-sm-offset-1">
				<label class="control-label col-sm-2" for="name"><?php echo L('DEPARTMENT_NAME');?>：</label>
				<div class="col-sm-4">
					<input type="text" id="name" name="name" value="<?php echo ($department["name"]); ?>" class="form-control"/>
				</div>
			</div>
			<div class="form-group col-sm-offset-1">
				<!--<label class="control-label col-sm-2" for="name"><?php echo L('DEPARTMENT_NAME');?>：</label>-->
				<label class="control-label col-sm-2" for="name">部门标签：</label>
				<div class="col-sm-4">
					<?php if(is_array($department_label)): $i = 0; $__LIST__ = $department_label;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="checkbox checkbox-primary">
							<input type="checkbox" name="department_label[]" <?php if(in_array($vo['id'],$department['department_label'])): ?>checked<?php endif; ?> value="<?php echo ($vo["id"]); ?>"  class="check_all"/>
							<label for=""><?php echo ($vo["name"]); ?></label>

						</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>

			</div>
			<div class="form-group col-sm-offset-1">
				<label class="control-label col-sm-2" for="description"><?php echo L('DEPARTMENT_DESCRIPTION');?>：</label>
				<div class="col-sm-6">
					<textarea id="description" name="description" class="form-control"><?php echo ($department["description"]); ?></textarea>
				</div>
			</div><?php endif; ?>
	</div>
	</form>
</div>
<script>
    $(document).ready(function(){
		$('.date').datepicker({
			format: "yyyy-mm-dd",
            todayBtn: "linked",
            keyboardNavigation: false,
            forceParse: false,
            calendarWeeks: true,
            autoclose: true
        });
		$("#edbtn").click(function(){

			$.ajax({
				type: "POST",
				url: "<?php echo U('department_edit');?>",
				data:$("#ed_Form").serialize(),
				async: true,
				success: function(data) {
					if(data.status == 1){
						swal({
							title: "保存成功！",
							text: "",
							type: "success"
						});
						$('#Modal').modal('hide');
						top.location.reload();
						//location.reload();
						//$("#file").load"<?php echo U('debtor/listFile','id='.$debtor_id);?>");
					}else{
						 swal({
							title: "保存修改失败！",
							text: data.info,
							type: "error"
						});
					}
				}
			});
		})
	});
</script>
<div class="modal-footer">
	<button type="button" id="edbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>