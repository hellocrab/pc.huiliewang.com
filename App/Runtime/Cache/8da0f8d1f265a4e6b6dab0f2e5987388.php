<?php if (!defined('THINK_PATH')) exit();?><div class="modal-header" style="padding:3px 10px;">
	<b style="font-size:16px;">添加岗位</b>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>	
</div>
<div class="modal-body clearfix">
	<form id="ad_Form" class="form-horizontal m-t" method="Post">
		<input type="hidden" name="department_id" value="<?php echo ($department_id); ?>">
	<div class="col-sm-12">
		<div class="form-group">
			<label class="control-label col-sm-2 col-sm-offset-1" for="name">岗位名称：</label>  
			<div class="col-sm-8">
				<input type="text" name="name"  class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2 col-sm-offset-1" for="name">所属部门：</label>  
			<div class="col-sm-8">
				<input type="text" readonly="readonly" value="<?php echo ($department_name); ?>" class="form-control" />
			</div>
		</div>
		<div class="form-group">
			<label class="control-label col-sm-2 col-sm-offset-1" for="name">上级岗位：</label>  
			<div class="col-sm-4">
				<select id="depart" class="form-control">
					<option value="a">--选择部门--</option>
					<?php if(is_array($department_list)): $k = 0; $__LIST__ = $department_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option value="<?php echo ($vo['department_id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="col-sm-4">
				<select id="posi" name="parent_id" class="form-control">
					<option value="">--选择上级岗位--</option>
					<?php if(is_array($position_list)): $k = 0; $__LIST__ = $position_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><option deId="<?php echo ($vo['department_id']); ?>" value="<?php echo ($vo['position_id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
			</div>
			<div class="col-sm-4">
			</div>
		</div>

		<div class="form-group ">
			<label class="control-label col-sm-2 col-sm-offset-1" for="name">岗位描述：</label>  
			<div class="col-sm-8">
				<textarea name="description" id="" class="form-control" cols="30" rows="3"></textarea>
			</div>
		</div>
	</div>
	</form>
</div>
<script>
//二级联动
	$(document).ready(function(){
		var de_id = '';
		var de = $('#depart');
		var po = $('#posi');
		de.bind('change', function(){
			de_id = $(this).val();
			po.children().first().prop("selected", 'selected');
			if(de_id != 'a'){
				po.children().each(function(){
					if($(this).attr('deId') != de_id){
						$(this).hide();
					}else{
						$(this).show();
					}
				});
			}else{
				po.children().show();
			}
		});
	});
</script>

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
		$("#adbtn").click(function(){
	        	$.ajax({
				type: "POST",
				url: "<?php echo U('position_create');?>",
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
						//window.location.href = '<?php echo U('User/department');?>?department_id=<?php echo ($department_id); ?>';
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
<div class="modal-footer" style="padding:8px 22px;">
	<button type="button" id="adbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>