<?php if (!defined('THINK_PATH')) exit();?><form action="" id="contract_dialog" method="post">
	<input id="dialog_order_id" name="contract_id" type="hidden" value="<?php echo ($contract_id); ?>" />
	<input type="hidden" name="m" value="contract">
	<input type="hidden" name="a" value="check">
	<table class="table" style="border:none;">
		<tr>
			<td style="border:none;text-align:right">审核结果：</td>
			<td style="border:none;">
				<select name="is_agree" id="is_agree" style="width:300px;" class="form-control required">
					<option value="1">同意</option>
					<option value="2">拒绝</option>
				</select>
			</td>
		</tr>
		<tr class="xianshi">
			<td style="border:none;text-align:right">下一审批人：</td>
			<td style="border:none;">
				<?php if($option == 1): ?><input type="hidden" name="order_id" id="next_order_id" value="<?php echo ($next_order_id); ?>"/>
					<?php if($next_role_info != ''): ?><div class="radio radio-info radio-inline" style="margin-left:20px;">
							<input type="radio" name="examine_status" checked id="openrecycle2" class="openrecycle" value="1">
							<label for="openrecycle2"></label>
						</div>
						<input type="hidden" name="examine_role_id" id="examine_role_id" value="<?php echo ($next_role_info['role_id']); ?>"/>
						<input type="text" style="width:120px;padding:6px 12px;border: 1px solid #d8e3ef;" name="examine_role" disabled="true" value="<?php echo ($next_role_info['full_name']); ?>"/>
						<!-- <div class="radio radio-info radio-inline" style="margin-left:30px;">
							<input type="radio" name="examine_status" id="openrecycle3" class="openrecycle" value="2">
							<label for="openrecycle3">审批结束</label>&nbsp;
						</div> -->
					<?php else: ?>
						<input type="hidden" name="examine_status" value="2"/>
						<span style="line-height: 30px;">审批结束</span><?php endif; ?>
				<?php else: ?>
					<div class="radio radio-info radio-inline" style="margin-left:20px;">
						<input type="radio" name="examine_status" checked id="openrecycle2" class="openrecycle" value="1">
						<label for="openrecycle2"></label>
					</div>
					<input type="hidden"  name="examine_role_id" id="examine_role_id" />
					<input type="text" name="examine_role" style="width:120px;padding:6px 12px;border: 1px solid #d8e3ef;cursor:pointer;" id="examine_role" readonly="true" title="请点击选择" placeholder="请点击选择" />
					<div class="radio radio-info radio-inline" style="margin-left:30px;">
						<input type="radio" name="examine_status" id="openrecycle3" class="openrecycle" value="2">
						<label for="openrecycle3">审批结束</label>&nbsp;
					</div><?php endif; ?>
			</td>
		</tr>
		<tr class="is_show" <?php if($next_role_info != '' || $option == '0'): ?>style="display:none;"<?php endif; ?> >
			<td style="border:none;text-align:right">生成应收款：</td>
			<td style="border:none;">
				<div class="radio radio-info radio-inline" style="padding-left:18px;">
					<input type="radio" name="is_receivables" <?php if($is_receivables == 1): ?>checked<?php endif; ?> id="rece_openrecycle" class="rece_openrecycle" value="1"><label for="rece_openrecycle">是</label>
				</div>
				<div class="radio radio-info radio-inline" style="padding-left:18px;">
					<input type="radio" name="is_receivables" <?php if($is_receivables != 1): ?>checked<?php endif; ?> id="rece_openrecycle1" class="rece_openrecycle" value="2"><label for="rece_openrecycle1">否</label>&nbsp;
				</div>
			</td>
		</tr>
		<tr class="is_show" id="pay_times" <?php if($next_role_info != '' || $option == '0' || $is_receivables != 1): ?>style="display:none;"<?php endif; ?> >
			<td style="border:none;text-align:right">应收款时间：</td>
			<td style="border:none;">
				<input onclick="WdatePicker()" class="form-control required Wdate" style="width:300px;" type="text" id="pay_time" name="pay_time" value="<?php echo date('Y-m-d', time());?>"/>
			</td>
		</tr>
		<tr>
			<td style="border:none;text-align:right">备注：</td>
			<td style="border:none;">
				<input class="form-control required" id="dialog_description" name="description" placeholder="填写理由(非必填)"/>
			</td>
		</tr>
	</table>
</form>
<div style="display:none;" id="dialog-role-list2" title="下一审批人">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div> 
		</div>
	</div>
</div>
<script type="text/javascript">
$("#dialog-role-list2").dialog({
    autoOpen: false,
    modal: true,
	width: 800,
	height:400,
	position:["center",100],
    buttons: { 
        "保存": function () {
			var item = $('input:radio[name="owner"]:checked').val();
			var name = $('input:radio[name="owner"]:checked').attr('rel');
			if(item) {
				$('#examine_role_id').val(item);
				$('#examine_role').val(name);
			}
            $(this).dialog("close"); 
        },
		"取消": function () {
            $(this).dialog("close");
        }
    }
});

$('#examine_role').click(function(){
	$('#dialog-role-list2').dialog('open');
	$('#dialog-role-list2').load('<?php echo U("user/listDialog","by=contract");?>');
});

$('.rece_openrecycle').click(function(){
	var val = $('.rece_openrecycle:checked').val();
	if(val == 2){
		$('#pay_times').hide();
	}else{
		$('#pay_times').show();
	}
});

$('.openrecycle').click(function(){
	var val = $('.openrecycle:checked').val();
	var is_agree = $('#is_agree').val();
	if(val == 2){
		$('#examine_role').attr('disabled',true);
		$('#examine_role').val('');
		$('#examine_role_id').val('');
		if (is_agree == 1) {
			$('.is_show').show();
			if ($('#rece_openrecycle1:checked').val() == 2) {
				$('#pay_times').hide();
			}
		} else {
			$('.is_show').hide();
		}
	}else{
		$('#examine_role').attr('disabled',false);
		$('.is_show').hide();
	}
});

$('#is_agree').change(function(){
	var value = $(this).val();
	var option = '<?php echo ($option); ?>';
	var examine_role_id = $('#examine_role_id').val();
	if(value == 2){
		$('.xianshi').hide();
		$('.is_show').hide();
		// $('#openrecycle3').prop('checked', true);
	}else{
		if ($('#openrecycle3').attr('checked') !== false) {
			if (option == 1) {
				if (examine_role_id == '') {
					$('.is_show').show();
				}
			} else {
				if ($('#openrecycle3:checked').val() == 2) {
					$('.is_show').show();
				}
			}
			if ($('#rece_openrecycle1:checked').val() == 2) {
				$('#pay_times').hide();
			}
		}
		$('.xianshi').show();
	}
});
</script>