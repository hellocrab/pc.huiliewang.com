<?php if (!defined('THINK_PATH')) exit();?><!-- <?php if($_GET['leads']== 'leads'): ?><div id="leads_id" style="display:none;"><?php echo ($_GET['id']); ?></div><?php endif; ?> -->
<div class="clearfix">
	<form class="form-inline" id="dd">
		<?php if($_GET['leads'] == 'leads'): ?><input type="hidden" name="leads" value="leads"/>
			<input type="hidden" name="id" id="leads_id" value="<?php echo ($_GET['id']); ?>"/><?php endif; ?>
		<ul class="nav pull-left form-inline">
			<li class="pull-left">
				<select style="width:auto;" class="form-control" name="d_department" id="d_department" >
					<option class="all" value="all"><?php echo L('ALL');?></option>
					<?php if(is_array($departmentList)): $i = 0; $__LIST__ = $departmentList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo["department_id"]); ?>" <?php if($search_field['d_department'] == $vo['department_id']): ?>selected<?php endif; ?> ><?php echo ($vo["name"]); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
				</select>&nbsp;&nbsp;
			</li>
			<li class="pull-left">
				<input class="form-control" id="d_name" type="text" name="d_name" value="<?php echo ($search_field['d_name']); ?>" placeholder="<?php echo L('USER_NAME');?>" onkeydown="if(event.keyCode==13)changeCondition1(0)"/>&nbsp;&nbsp;
			</li>
			<li class="pull-left">
				<input type="hidden" name="m" value="user"/>
				<input type="hidden" name="a" value="listdialogs"/>
				<input type="hidden" name="by" id="dialog_by" value="<?php echo ($by); ?>"/>
				<input type="button" onclick="changeCondition1(0)" class="btn btn-primary" value="<?php echo L('SEARCH');?>"/>
			</li>
		</ul>
	</form>
</div>
<?php if($role_list): ?><table class="table table-hover">
		<thead>
		<tr>
			<th>&nbsp;</th>
			<th><?php echo L('STAFF');?></th>
			<th><?php echo L('DEPARTMENT');?></th>
			<th><?php echo L('POSITION');?></th>
			<th><?php echo L('SEX');?></th>
			<th>Email</th>
			<th><?php echo L('TELPHONE');?></th>
		</tr>
		</thead>
		<tfoot id="footers">
		<tr>
			<td colspan="7">
				<?php echo ($page); ?>
			</td>
		</tr>
		</tfoot>
		<tbody id="data2">
		<?php if(role_list != null): if(is_array($role_list)): $i = 0; $__LIST__ = $role_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr style="cursor:pointer">
					<td>
						<div class="radio radio-info radio-inline" style="margin-left:15px;">
							<input name="owner" class="owner" type="radio" rel="<?php echo ($vo['user_name']); ?>" rel2="<?php echo ($vo['img']); ?>" value="<?php echo ($vo["role_id"]); ?>"><label for=""></label>
						</div>
					</td>
					<td><?php echo ($vo["user_name"]); ?></td>
					<td><?php echo ($vo["department_name"]); ?></td>
					<td><?php echo ($vo["role_name"]); ?></td>
					<td><?php if($vo['sex'] == 1): echo L('MALE'); elseif($vo['sex'] == 2): echo L('FEMALE'); endif; ?></td>
					<td><?php echo ($vo["email"]); ?></td>
					<td><?php echo ($vo["telephone"]); ?></td>
				</tr><?php endforeach; endif; else: echo "" ;endif; ?>
			<?php else: ?>
			<tr>
				<td><?php echo L('EMPTY_DATA');?></td>
			</tr><?php endif; ?>
		</tbody>
	</table>
	<?php else: ?>
	<div style="clear:both">
		<div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div>
	</div><?php endif; ?>
<script type="text/javascript">
    $('#go_page').change(function(){
        var sel = $(this).val();
        $('#dialog-role-list2').load(sel);
        return false;
    });
    $(function(){
        $('#footers a').click(function(){
            var rel = $(this).attr('href');
            $('#dialog-role-list2').load(rel);
            return false;
        });
    });

    $("#data2 tr").click(function(){
        $(this).find('td:first-child .owner').prop('checked', true);
    });
    function changeCondition1(){
        $('#dialog-role-list2').load('index.php?'+$("#dd").serialize());
    }
</script>