<?php if (!defined('THINK_PATH')) exit();?><form class="form-horizontal" id="status_form1" action="<?php echo U('setting/category_add');?>" method="post">
	<table class="table" style="border:none;">
		<tr>
			<td style="border:none;text-align:right">账户名称：</td>
			<td style="border:none;">
				<input type="text" name="open_bank" id="open_bank" class="form-control"/>
			</td>
			<td style="border:none;">
				<span style="color: red;line-height: 32px;">*</span>
			</td>
		</tr>
		<tr>
			<td style="border:none;text-align:right">账号/卡号：</td>
			<td style="border:none;">
				<input type="text" name="bank_account" id="bank_account" class="form-control"/>
			</td>
			<td style="border:none;">
				<span style="color: red;line-height: 32px;">*</span>
			</td>
		</tr>
		<tr>
			<td style="border:none;text-align:right">账户类别：</td>
			<td style="border:none;">
				<input type="text" name="company" id="company" class="form-control"/>
			</td>
			<td style="border:none;">
				<span style="color: red;line-height: 32px;">*</span>
			</td>
		</tr>
		<tr>
			<td style="border:none;text-align:right">备注：</td>
			<td style="border:none;">
				<textarea class="form-control" rows="4" name="description"></textarea>
			</td>
			<td style="border:none;"></td>
		</tr>
	</table>
</form>