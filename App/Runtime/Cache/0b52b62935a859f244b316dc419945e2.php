<?php if (!defined('THINK_PATH')) exit();?><style>
	.table_user{border:none !important}
	.table_user tr{height:35px !important;padding:0px !important;}
	.table_user tr td{border:none !important;height:35px !important;line-height: 35px !important;padding:0px !important;}
</style>
<table class="table table_user" >
	<tbody>
		<tr >
			<td width="15%" rowspan="2" style="padding-bottom:15px !important;height:45px;line-height: 45px;" class="tdleft">
				<?php if($user['img']): ?><img style="border-radius:50%;width:60px;height:60px;" src="<?php echo ($user['img']); ?>"></img>
				<?php else: ?>
					<img src="__PUBLIC__/img/avatar_default.png" style="border-radius:50%;width:60px;height:60px;" /><?php endif; ?>
			</td>
			<td ><span style="font-size:19px;"><?php echo ($user["full_name"]); ?></span> &nbsp;&nbsp;
				<?php if($user['sex'] == 1): ?><img style="margin-top:-3px;" title="男" src="__PUBLIC__/img/nan.png"/>
				<?php elseif($user['sex'] == 2): ?>
					<img style="margin-top:-3px;" title="女" src="__PUBLIC__/img/nv.png"/><?php endif; ?>
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr >
			<td style="padding-bottom:15px !important;height:45px;line-height: 45px;">
				<span style="color:#999;">账号状态:</span>&nbsp;&nbsp;
				<?php if($user['status'] == 1): ?>已激活
				<?php elseif($user['status'] == 2): ?>已停用
				<?php elseif($user['status'] == 3): ?>未激活<?php endif; ?>
			</td>
			<td></td>
			<td></td>
		</tr>
		<tr style="border-top:1px solid #d8e3ef;">
			<td colspan="4"><?php echo L('BASIC_INFO');?></td>
		</tr>
		<tr>
			<td width="15%" class="tdleft"><?php echo L('USERNAME');?></td>
			<td width="35%">
				<?php echo ($user["full_name"]); ?>
				<?php if(is_array($categoryList)): $i = 0; $__LIST__ = $categoryList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$temp): $mod = ($i % 2 );++$i; if($temp["category_id"] == $user['category_id']): ?>（<?php echo ($temp["name"]); ?>）<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</td>
			<td width="15%" class="tdleft">编号</td>
			<td width="35%"><?php echo ($user['number']); ?></td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('DEPARTMENT');?></td>
			<td><?php echo ($user["role"]["department_name"]); ?></td>
			<td class="tdleft"><?php echo L('POSITION');?></td>
			<td><?php echo ($user["role"]["role_name"]); ?></td>
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('TELPHONE');?></td>
			<td><?php if(C('ismobile') == 1): ?><a href="tel:<?php echo ($user["telephone"]); ?>"><?php echo ($user["telephone"]); ?></a><?php else: echo ($user["telephone"]); endif; ?></td>
			<td class="tdleft"><?php echo L('EMAIL');?></td>
			<td><?php echo ($user["email"]); ?></td>
		</tr>
		<tr>
			<td class="tdleft" style="padding-bottom:15px;">QQ</td>
			<td><?php echo ($user["qq"]); ?></td>
			<td colspan="2"></td>
		</tr>
		<tr style="border-top:1px solid #d8e3ef;padding-top:5px;margin-top:10px;">
			<th colspan="4"><?php echo L('MESSAGE');?></th> 
		</tr>
		<tr>
			<td class="tdleft"><?php echo L('CONTENT');?></td>
			<td colspan="3">
				<textarea rows="3" class="form-control" id="dialog_content" name="content"></textarea>
			</td>
		</tr>
		<tr >
			<td>&nbsp;</td>
			<td colspan="3" style="height:45px;line-height: 45px;padding:7px !important;">
				<input class="btn btn-primary pull-right" style="background-color:#fff;border:1px solid #ccc;color:#999" id="close" name="close" type="button" value="<?php echo L('CANCEL');?>"/>&nbsp; &nbsp;
				<input class="btn btn-primary pull-right" style="margin-right:10px;" id="send" name="send" type="button" value="<?php echo L('SEND');?>"/>&nbsp; &nbsp;
				<span id="result"></span>
			</td>
		</tr>
	</tbody>
</table>
<script type="text/javascript">
	$('tbody').keydown(function(event){
		if(event.keyCode == "13"){
			$('#send').click();
		}
	});

	$('#close').click(
		function(){
			$('#dialog-role-info').dialog('close');
		}
	);
	$('#send').click(
		function(){			
			to_role_id = <?php echo ($user["role"]["role_id"]); ?>;
			content = $('#dialog_content').val();
			if(content!=''){
				$("#result").html('<span style="color:red"><?php echo L("SENDING_MESSAGE");?></span>');
				$("#send").attr('disabled', "disabled");
				$.post('<?php echo U("message/ajaxsend");?>',
					{
						to_role_id:to_role_id,
						content:content
					},
					function(data){
						if(data.status == 1){
							$("#result").html('<span style="color:green"><?php echo L("SEND_SUCCESS");?></span>');
							$("#send").attr('disabled', false);
							$("#dialog_content").val("");
						} else if(data.status == 0) {
							$("#result").html('<span style="color:red"><?php echo L("SEND_FAILED");?></span>');
						}
					},
				'json');
			} else {
				$("#result").html('<span style="color:red"><?php echo L("NEED_CONTENT");?></span>');
			}
		}
	);
</script>