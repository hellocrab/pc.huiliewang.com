<?php if (!defined('THINK_PATH')) exit();?><style>
	#datas tr{cursor : pointer;}
</style>
<div class="clearfix form-inline">
	<ul class="nav pull-left">
		<li class="pull-left">
			<input type="hidden" id="dialog_customer_id" value="<?php echo ($customer_id); ?>" />
			<select style="width:auto" class="form-control" id="field" name="field" onchange="changeCondition()">
				<option class="word" value="name">联系人<?php echo L('NAME');?></option>
				<?php if(is_array($field_array)): $i = 0; $__LIST__ = $field_array;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><option class="<?php if($v['form_type'] == 'address'): ?>text<?php else: echo ($v['form_type']); endif; ?>" value="<?php echo ($v[field]); ?>" rel="contacts" <?php if($search_field['field'] == $v[field]): ?>selected<?php endif; ?>><?php echo ($v[name]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				<option class="date" value="create_time" <?php if($search_field['field'] == 'create_time'): ?>selected<?php endif; ?>><?php echo L('CREATION_TIME');?></option>
				<option class="date" value="update_time" <?php if($search_field['field'] == 'update_time'): ?>selected<?php endif; ?>><?php echo L('MODIFICATION_TIME');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left">
			<select id="d_condition" class="form-control" style="width:auto" name="condition" onchange="changeSearch()">
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
			<input id="search" type="text" class="input-medium form-control search-query" name="search" value="<?php echo ($search_field['search']); ?>" onkeydown="if(event.keyCode==13)d_changeContent(0)"/>&nbsp;&nbsp;
		</li>
		<li class="pull-left">
			<input type="button" onclick="d_changeContent(0)" class="btn btn-primary" value="<?php echo L('SEARCH');?>"/>
		</li>
	</ul>
	<!-- <div class="pull-right">
		<a target="_blank" class="btn btn-primary btn-sm" href="<?php echo U('contacts/add','redirect=customer&redirect_id='.$customer_id);?>"><?php echo L('NEW_LINK');?></a>
	</div> -->
</div>
<?php if(empty($contactsList)): ?><div style="clear:both">
		<div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
	</div>
<?php else: ?>
	<table class="table table-hover">
		<thead>
			<tr>
				<th>&nbsp;</th>
				<th width="15%"><?php echo L('NAME');?></th>
				<th width="30%"><?php echo L('BELONGS TO THE CUSTOMER');?></th>
				<th width="15%"><?php echo L('PHONE');?></th>
				<th width="15%"><?php echo L('EMAIL');?></th>
				<th width="25%"><?php echo L('POSITION');?></th>
			</tr>
		</thead>
		<tfoot id="footers">
			<tr>
				<td colspan="6">
					<?php echo ($page); ?>
				</td>
			</tr>
		</tfoot>
		<tbody id="datas">
			<?php if(is_array($contactsList)): $i = 0; $__LIST__ = $contactsList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
					<td>
						<input type="radio" name="contacts" class="contacts_rad" value="<?php echo ($vo["contacts_id"]); ?>"/>
						<input type="hidden" name="customer_id" value="<?php echo ($vo['customer']['customer_id']); ?>" rel="<?php echo ($vo['customer']['name']); ?>"/>
					</td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><a target="_blank" href="<?php echo U('customer/view','id='.$vo['customer']['customer_id']);?>"><?php echo ($vo["customer"]["name"]); ?></a></td>
					<?php if(C('ismobile') != 1): ?><td><?php echo ($vo["telephone"]); ?></td>
					<td><?php echo ($vo["email"]); ?></td><?php endif; ?>			
					<td><?php echo ($vo["post"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table>
	<script type="text/javascript">
		$('#go_page').change(function(){
			var sel = $(this).val();
			$('#dialog-contacts-list').load(sel,function(){
				changeCondition();
			});
			return false;
		});

		$("#datas tr").click(function(){
			$(this).find('td:first-child .contacts_rad').prop('checked', true);
		});

		$(function(){
			$('#footers a').click(function(){ 
				var rel = $(this).attr('href'); 
				$('#dialog-contacts-list').load(rel);   
				return false;
			});
		});

		function d_changeContent(p){
			var field = $('#field option:selected').val();
			var condition = $('#d_condition option:selected').val();
			var search = $('#search').val();
			var dialog_customer_id = $('#dialog_customer_id').val();
			var url = "<?php echo U('contacts/radiolistdialog','id=');?>"+dialog_customer_id+'&field='+field+'&condition='+condition+'&search='+search;
			$('#dialog-contacts-list').load(url,function(){
				changeCondition();
			});
		}

		$('#search').val('<?php echo ($search_field['search']); ?>');
	</script><?php endif; ?>