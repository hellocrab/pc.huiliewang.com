<?php if (!defined('THINK_PATH')) exit();?><style>
	#datas tr{cursor : pointer;}
</style>
<div>
	<ul class="nav pull-left">
		<li class="pull-left">
			<select id="field" class="form-control input-sm" style="width:auto" onchange="changeCondition()" name="field">
				<option class="word" value=""><?php echo L('PLEASE_SELECT_A_FILTER_CONDITION');?></option>
				<option class="word" value="business.name"><?php echo L('BUSINESS_NAME');?></option>
			</select>&nbsp;&nbsp;
		</li>
		<li id="conditionContent" class="pull-left" style="margin-left:10px;">
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
		<li id="searchContent" class="pull-left" style="margin-left:10px;">
			<input id="search" type="text" class="input-medium form-control input-sm search-query" name="search" value="<?php echo ($search_field['search']); ?>" onkeydown="if(event.keyCode==13)changeCondition1()" />&nbsp;&nbsp;
		</li>
		<li class="pull-left" style="margin-left:10px;">
			<button type="button" class="btn btn-primary" onclick="changeCondition1()"><?php echo L('SEARCH');?></button>
		</li>
	</ul>
</div>
<p>&nbsp;</p>
<?php if(empty($businessList)): ?><div style="clear:both">
		<div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
	</div>
<?php else: ?>
	<table class="table table-hover">
		<thead>
			<tr style="background-color:#F5F5F6;">
				<th></th>
				<th>项目名称</th>
				<th>公司名称</th>
				<th><?php echo L('LINKMAN');?></th>
				<!--<th><?php echo L('AMOUNT');?></th>-->
				<th><?php echo L('PHASE');?></th>
				<th>项目类型</th>
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
			<?php if(is_array($businessList)): $i = 0; $__LIST__ = $businessList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="cursor:pointer;">
					<td>
						<input type="radio" name="business" class="business_rad" value="<?php echo ($vo["business_id"]); ?>"/>
						<input type="hidden" id="dialog_customer_id" value="<?php echo ($vo["customer_id"]); ?>"/>
						<input type="hidden" id="dialog_contacts_id" value="<?php echo ($vo["contacts_id"]); ?>"/>
					</td>
					<td><?php echo ($vo["name"]); ?></td>
					<td><a target="_blank" href="<?php echo U('customer/view','id='.$vo['customer_id']);?>"><?php echo ($vo["customer_name"]); ?></a></td>
					<td><a target="_blank" href="<?php echo U('contacts/view','id='.$vo['contacts_id']);?>"><?php echo ($vo["contacts_name"]); ?></a></td>
					<!--<td><?php if($vo['final_price'] > 0): echo ($vo["final_price"]); else: ?>0.00<?php endif; ?></td>-->
					<td><?php echo ($vo["status_name"]); ?></td>
					<td><?php echo ($vo["pro_type"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
		</tbody>
	</table><?php endif; ?>
<script type="text/javascript">
	$('#go_page').change(function(){
		var sel = $(this).val();
		$('#dialog-business').load(sel,function(){
			changeCondition();
		});
		return false;
	});

	$("#datas tr").click(function(){
		$(this).find('td:first-child .business_rad').prop('checked', true);
	});

	$(function(){
		$('#footers a').click(function(){
			var rel = $(this).attr('href');
			$('#dialog-business').load(rel);
			return false;
		});
	});

	function changeCondition1(p){
		var field = $('#field option:selected').val();
		var condition = $('#d_condition option:selected').val();
		var search = $('#search').val();
		var dialog_customer_id = $('#dialog_customer_id').val();
		var url = "<?php echo U('business/listDialog');?>"+'&field='+field+'&condition='+condition+'&search='+search;
		$('#dialog-business').load(url,function(){
			changeCondition();
		});
	}
</script>