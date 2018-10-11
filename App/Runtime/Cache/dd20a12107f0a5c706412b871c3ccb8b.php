<?php if (!defined('THINK_PATH')) exit();?><style>
	#datas tr{cursor : pointer;}
</style>
<div class="clearfix">
	<input type="hidden" name="m" value="customer" />
	<input type="hidden" name="a" value="listdialog" />
	<input type="hidden" name="row" id="row" value="<?php echo ($_GET['row']); ?>" />
	<input type="hidden" name="contract_id" id="contract_id" value="<?php echo ($_GET['contract_id']); ?>" />
	<ul class="nav pull-left form-inline">
		<li class="pull-left" >
			<select class="form-control" style="width:auto" id="field" onchange="changeCondition()" name="field">
            	<option class="" value="name">--请选择--</option>
				<?php if(is_array($field_array)): $i = 0; $__LIST__ = $field_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($v['field'] != 'customer_owner_id'): if($v[name] != '所在城市' && $v[name] != '所属行业'): ?><option class="<?php if($v['form_type'] == 'address'): ?>text<?php else: echo ($v['form_type']); endif; ?>" value="<?php echo ($v[field]); ?>" rel="customer" <?php if($search_field['field'] == $v[field]): ?>selected<?php endif; ?>><?php echo ($v[name]); ?></option><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
				<option class="role" value="owner_role_id" <?php if($search_field['field'] == 'owner_role_id'): ?>selected<?php endif; ?>><?php echo L('PRINCIPAL');?></option>
				<option class="date" value="create_time" <?php if($search_field['field'] == 'create_time'): ?>selected<?php endif; ?>><?php echo L('CREATION_TIME');?></option>
				<option class="date" value="update_time" <?php if($search_field['field'] == 'update_time'): ?>selected<?php endif; ?>><?php echo L('MODIFICATION_TIME');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select class="form-control" id="condition" style="width:auto" name="condition" onchange="changeSearch()">
				<option value="contains" <?php if($search_field['condition'] == 'contains'): ?>selected<?php endif; ?>><?php echo L('CONTAINS');?></option>
				<option value="not_contain" <?php if($search_field['condition'] == 'not_contain'): ?>selected<?php endif; ?>><?php echo L('NOT_CONTAIN');?></option>
				<option value="is" <?php if($search_field['condition'] == 'is'): ?>selected<?php endif; ?>><?php echo L('IS');?></option>
				<option value="isnot" <?php if($search_field['condition'] == 'isnot'): ?>selected<?php endif; ?>><?php echo L('ISNOT');?></option>
				<option value="start_with" <?php if($search_field['condition'] == 'start_with'): ?>selected<?php endif; ?>><?php echo L('START_WITH');?></option>
				<option value="end_with" <?php if($search_field['condition'] == 'end_with'): ?>selected<?php endif; ?>><?php echo L('END_WITH');?></option>
				<option value="is_empty" <?php if($search_field['condition'] == 'is_empty'): ?>selected<?php endif; ?>><?php echo L('IS_EMPTY');?></option>
				<option value="is_not_empty" <?php if($search_field['condition'] == 'is_not_empty'): ?>selected<?php endif; ?>><?php echo L('IS_NOT_EMPTY');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="searchContent" class="pull-left">
			<input id="search" type="text" class="input-medium form-control search-query" name="search" value="<?php echo ($search_field['search']); ?>" onkeydown="if(event.keyCode==13)d_changeCondition(0)"/>
		</li>
		<li class="pull-left">
			&nbsp;&nbsp;<button class="btn btn-primary" onclick="d_changeCondition(0)"><?php echo L('SEARCH');?></button>
		</li>
	</ul>
</div>
<?php if(empty($customerList)): ?><div class="alert"><?php echo L('TEMPORARILY_NO_DATA');?></div>
<?php else: ?>
<table class="table table-hover" style="margin-top: 5px;">
	<thead>
		<tr style="background-color:#F5F5F6;">
			<th>&nbsp;</th>
			<!--<th>客户名称</th>-->
            <?php if(is_array($field_array)): $i = 0; $__LIST__ = $field_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($i < 4 && $v[name] != '客户名称'): ?><th><?php echo (($v[name])?($v[name]):'&nbsp;'); ?></th><?php endif; endforeach; endif; else: echo "" ;endif; ?>
		</tr>
	</thead>
	<tfoot id="footers">
		<tr>
			<td colspan="5">
				<?php echo ($page); ?>
			</td>
		</tr>
	</tfoot>
	<tbody id="datas">
		<?php if(is_array($customerList)): $i = 0; $__LIST__ = $customerList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="cursor:pointer;">
				<td>
					<input type="radio" class="customer_id" name="customer" value="<?php echo ($vo["customer_id"]); ?>" rel="<?php echo ($vo["contacts_id"]); ?>" />
					<input type="hidden" name="contacts_name" value="<?php echo ($vo["contacts_name"]); ?>" />
					<input type="hidden" name="telephone" value="<?php echo ($vo["telephone"]); ?>">
				</td>
				<td><?php echo ($vo['name']); ?></td>
				<?php if(is_array($field_array)): $i = 0; $__LIST__ = $field_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i; if($i < 4 && $v[field] != 'name'): if($v['form_type'] == 'datetime'): ?><td><?php if(empty($vo[$v['field']])): else: echo (date("Y-m-d",$vo[$v['field']])); endif; ?></td>
						<?php else: ?>
							<td><?php echo ($vo[$v['field']]); ?></td><?php endif; endif; endforeach; endif; else: echo "" ;endif; ?>
			</tr><?php endforeach; endif; else: echo "" ;endif; ?>
	</tbody>
</table><?php endif; ?>
<script type="text/javascript">
	$('#go_page').change(function(){
		var sel = $(this).val();
		$('#dialog-customer-list').load(sel,function(){
			changeCondition();
		});
		return false;
	});
	$("#datas tr").click(function(){
		$(this).find('td:first-child .customer_id').prop('checked', true);
	});
	$(function(){
		$('#footers a').click(function(){
			var rel = $(this).attr('href');
			$('#dialog-customer-list').load(rel);
			return false;
		});
	});

	function d_changeCondition(){
		var field = $('#field option:selected').val();
		var condition = $('#condition option:selected').val();
		var search = $('#search').val();
		var contract_id = $('#contract_id').val();
		var url = "<?php echo U('customer/listdialog','field=');?>"+field+'&condition='+condition+'&search='+search+'&contract_id='+contract_id;
		$('#dialog-customer-list').load(url,function(){
			changeCondition();
		});
	}
</script>