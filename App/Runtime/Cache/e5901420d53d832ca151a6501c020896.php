<?php if (!defined('THINK_PATH')) exit();?><style>
	.dialog_table >tbody>tr>td {
		border:none;
	}
</style>
<form class="form-horizontal" id="dialog_form1" action="<?php echo U('Log/add_fine_project');?>" method="post">
	<table class="table dialog_table" style="border:none;">
		<input type='hidden' name="module" id="dialog_module" <?php if(isset($module)): ?>value="<?php echo ($module); ?>"<?php endif; ?>/>
		<input type='hidden' name="id" id="dialog_module_id" rel="<?php echo ($module_name); ?>" value="<?php echo ($model_id); ?>"/>
		<input type="hidden" name="r" value="<?php echo ($r); ?>" />


			<tr >
				<td class="tdleft">候选人名称：</td>
				<td>
					<?php echo ($user['name']); ?>
					<input type="hidden" name="resume_id" value="<?php echo ($user['eid']); ?>" />
				</td>

			</tr>
		<tr>
			<td class="tdleft">添加项目：</td>
			<td>
				<select id="replay_list" class="form-control select2" name="project" style="width: 460px;">
					<option value="">--请选择--</option>
					<?php if(is_array($project)): $i = 0; $__LIST__ = $project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['business_id']); ?>" rel="<?php echo ($vo['business_id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>
                <!--<input type="hidden" class="form-control" id="project" name="project" style="width: 460px;">-->
                <!--<input type="text" class="form-control" id="project_sou" style="width: 460px;">-->
                <!--<div class="list_pro" style="display: none;">-->
                    <!--<?php if(is_array($project)): $i = 0; $__LIST__ = $project;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>-->
                        <!--<p class="pro_item" data-value="<?php echo ($vo['business_id']); ?>" rel="<?php echo ($vo['business_id']); ?>"><?php echo ($vo['name']); ?></p>-->
                    <!--<?php endforeach; endif; else: echo "" ;endif; ?>-->
                <!--</div>-->

			</td>
		</tr>
	</table>
</form>
<script>

$(function () {
   
    $(".select2").select2();



})

</script>