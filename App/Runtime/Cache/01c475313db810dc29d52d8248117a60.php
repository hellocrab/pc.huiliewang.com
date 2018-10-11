<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header">
	<span>添加子部门</span>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body clearfix">
	<form id="ad_Form" class="form-horizontal m-t" method="Post">
	<div class="col-sm-12">
		<div class="form-group col-sm-offset-1">
			<label class="control-label col-sm-2" for="parent_id"><?php echo L('SUPERIORS_DEPARTMENT');?>：</label>
			<div class="col-sm-4">
				<select name="parent_id" id="parent_id" class="form-control" >
					<option value="0"><?php echo L('THE_TOP_DEPARTMENT');?></option>
					<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option <?php if($_REQUEST['id'] == $vo['department_id']): ?>selected<?php endif; ?>  value="<?php echo ($vo["department_id"]); ?>"><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
		</div>
		<div class="form-group col-sm-offset-1">
			<label class="control-label col-sm-2" for="name"><?php echo L('DEPARTMENT_NAME');?>：</label>
			<div class="col-sm-4">
				<input type="text" id="name" name="name" class="form-control" />
			</div>
		</div>

		<div class="form-group col-sm-offset-1">
			<!--<label class="control-label col-sm-2" for="name"><?php echo L('DEPARTMENT_NAME');?>：</label>-->
			<label class="control-label col-sm-2" for="name">部门标签：</label>
			<div class="col-sm-4">
				<?php if(is_array($department_label)): $i = 0; $__LIST__ = $department_label;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="checkbox checkbox-primary">
						<input type="checkbox" name="department_label[]" value="<?php echo ($vo["id"]); ?>" class="check_all"/>
						<label for=""><?php echo ($vo["name"]); ?></label>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
			</div>

		</div>



		<div class="form-group col-sm-offset-1">
			<label class="control-label col-sm-2" for="description"><?php echo L('DEPARTMENT_DESCRIPTION');?>：</label>
			<div class="col-sm-6">
				<textarea name="description" id="description" class="form-control"></textarea>
			</div>
		</div>
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
        $("#ad_Form").validate({
		     rules: {
		         name: {
		             required: true
		         }
		     }
		 });
		$("#adbtn").click(function(){
			$.ajax({
				type: "POST",
				url: "<?php echo U('department_add');?>",
				data:$("#ad_Form").serialize(),
				async: true,
				success: function(data) {
					if(data.status == 1){
						swal({
							title: "添加成功！",
							text: "即将刷新页面!",
							type: "success"
						});
						$('#Modal').modal('hide');
						location.reload();
						//$("#file").load"<?php echo U('debtor/listFile','id='.$debtor_id);?>");
					}else{
						 swal({
							title: "添加失败!",
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
	<button type="button" id="adbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>