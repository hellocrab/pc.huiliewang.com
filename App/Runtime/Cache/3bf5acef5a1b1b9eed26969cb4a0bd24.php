<?php if (!defined('THINK_PATH')) exit();?><div>
	<?php if(empty($check_list)): ?><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
	<?php else: ?>
		<?php if(is_array($check_list)): $i = 0; $__LIST__ = $check_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div style="padding-bottom:20px;border-left:1px solid #ccc;margin: 5px 0 0 15px;">
				<?php if($vo['is_checked'] == 1): ?><i class="fa fa-circle pull-left" style="margin-left:-4.5px;color:#72CE56;font-size:10px;"></i>
				<?php else: ?>
					<i class="fa fa-circle pull-left" style="margin-left:-4.5px;color:#FB8F7A;font-size:10px;"></i><?php endif; ?>
				<div class="pull-left" style="margin-left:10px;color:#999">
					<div><?php echo (date("H:i",$vo['check_time'])); ?></div>
					<div><?php echo (date("Y/m/d",$vo['check_time'])); ?></div>
				</div>
				<div class="pull-left" style="margin-left:10%">
					<?php if($vo['user']['thumb_path']): ?><img src="<?php echo ($vo['user']['thumb_path']); ?>" style="width:30px;height:30px;border-radius:50px;margin-top:5px;">
					<?php else: ?>
						<img src="__PUBLIC__/img/moren.png" style="width:30px;height:30px;border-radius:50px;margin-top:5px;"><?php endif; ?>
				</div>
				<div class="pull-left" style="margin-left:10px;">
					<div><?php echo ($vo['user']['full_name']); ?></div>
					<div>
						<?php if($vo['is_checked'] == 1): ?>已通过合同审核
						<?php elseif($vo['is_checked'] == 2): ?>
							驳回了合同审核
						<?php else: ?>
							撤销了合同审核<?php endif; ?>
						<?php if($vo['content']): ?>,备注：<?php echo ($vo['content']); endif; ?>
					</div>
				</div>
				<div style="clear:both"></div>
			</div><?php endforeach; endif; else: echo "" ;endif; endif; ?>
</div>