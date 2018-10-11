<?php if (!defined('THINK_PATH')) exit();?><style>
	.active >a{height:38px;!important}
</style>
<form action="<?php echo U('Customer/share');?>" id="share_form" method="post">
	<input type="hidden" name="customer_id" value="<?php echo ($customer_id); ?>"/>
	<table type="hidden" class="table table-hover">
		<tbody>
			<?php if($user_info['role_id'] > 0): ?><input type="hidden" name="to_role_id" value="<?php echo ($user_info["role_id"]); ?>" id="to_role_id"/>
			<?php else: ?>
				<tr>
					<td>
						<div class="tabs-container">
							<ul class="nav nav-tabs">
								<?php if(is_array($departments_list)): $k = 0; $__LIST__ = $departments_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><li <?php if($vo['department_id'] == session('department_id')): ?>class="active"<?php endif; ?>>
										<a class="ta" rel="<?php echo ($k); ?>" data-toggle="tab"><?php echo ($vo['name']); ?></a>
									</li><?php endforeach; endif; else: echo "" ;endif; ?>
							</ul>
							<div class="tab-content">
								<?php if(is_array($departments_list)): $k = 0; $__LIST__ = $departments_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="tab-pane <?php if($vo['department_id'] == session('department_id')): ?>active<?php endif; ?>" id="ta<?php echo ($k); ?>" style="line-height: 30px;">
										<input type="checkbox" class="check_all" rel="<?php echo ($k); ?>" style="width:13px;height:13px;"/>&nbsp;<span style="font-weight: bold;"><?php echo L('SELECT_ALL');?></span><br/>
										<?php if(is_array($vo['user'])): $i = 0; $__LIST__ = $vo['user'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i;?><span style="width:25%; float:left;">
												<label>
													<input type="checkbox" class="about_role_id muti_role_id<?php echo ($k); ?>" name="to_role_id[]" rel="<?php echo ($temp['user_name']); ?>" <?php if($temp['is_checked'] == 1): ?>checked<?php endif; ?> value="<?php echo ($temp["role_id"]); ?>" />
													<?php echo ($temp['user_name']); ?>【<?php echo ($temp["role_name"]); ?>】
												</label>&nbsp; 
											</span><?php endforeach; endif; else: echo "" ;endif; ?>
									</div><?php endforeach; endif; else: echo "" ;endif; ?>
							</div>
						</div>
					</td>
				</tr><?php endif; ?>
		</tbody>
	</table>
</form>
<div id="dialog-to-role-list" class="hide" title="<?php echo L('SELECT_THE_RECIPIENT');?>">loading...</div>
<script type="text/javascript">
$(function(){
	// $("#ta1").addClass('active').removeClass('hide');
	$('.ta').click(
		function(){
			var num = $(this).attr('rel');
			var list = new Array();
			<?php if(is_array($departments_list)): $k = 0; $__LIST__ = $departments_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?>list.push(<?php echo ($k); ?>);<?php endforeach; endif; else: echo "" ;endif; ?>
			for (var i=0;i<list.length;i++){
				if(num == list[i]){
					$('#ta'+(i+1)).show().addClass('active').removeClass('hide');
				}else{
					$('#ta'+(i+1)).hide().removeClass('active').addClass('hide');
				}
			}
		}
	);
	$('.check_all').click(
		function(){
			var k = $(this).attr('rel');
			$("input.muti_role_id"+k).prop('checked', $(this).prop("checked"));
		}
	);
});
</script>