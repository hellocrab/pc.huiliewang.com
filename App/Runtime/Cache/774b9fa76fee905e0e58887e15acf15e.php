<?php if (!defined('THINK_PATH')) exit();?><style>
	.nav > li > a{color:#000;}
	.active{color: #666;}
	.active >a{height:38px;!important}
	.check_all{width: 14px;height: 14px;}
	.modal-body{max-height: 420px;overflow-y:auto;}
</style>
<div class="modal-header">
	<b>授权</b>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<style>
	.hide{display: none;}
</style>
<div class="modal-body clearfix" >
	<form id="form1">
		<input type="hidden" name="position_id" value="<?php echo ($position_id); ?>"/>
		<div class="tabs-container">
			<div class="full-height-scroll" style="left:0px;top:0px;">
				<ul class="nav nav-tabs">
					<li class="active">
						<a class="ta" rel="2" href="#tab2" data-toggle="tab"><?php echo L('CUSTOMER');?>管理</a>
					</li>

					<li>
						<a class="ta" rel="3" href="#tab3" data-toggle="tab"><?php echo L('CONTRACT');?>订单</a>
					</li>
					<li>
						<a class="ta" rel="4" href="#tab4" data-toggle="tab"><?php echo L('FINANCE');?>管理</a>
					</li>
					<li>
						<a class="ta" rel="6" href="#tab5" data-toggle="tab">报表管理</a>
					</li>
					<li>
						<a class="ta" rel="7" href="#tab7" data-toggle="tab">办公</a>
					</li>

					<li>
						<a class="ta" rel="8" href="#tab8" data-toggle="tab"><?php echo L('USER');?></a>
					</li>
				</ul>
				<div class="tab-content">
					<div class="tab-pane active" id="tab2" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="2"/><?php echo L('SELECT_ALL');?><br/>
						<h4 style="padding-top: 10px;clear:both;">客户</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/index"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/index'])): ?>display:none;<?php endif; ?>"  name="customer[index]">
								<option <?php if($owned_permission['customer/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['customer/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['customer/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['customer/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/view"/><?php echo L('BROWSE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/view'])): ?>display:none;<?php endif; ?>"  name="customer[view]">
								<option <?php if($owned_permission['customer/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['customer/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['customer/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['customer/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['customer/add'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="customer/add"/><?php echo L('CREATE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/edit"/><?php echo L('EDIT');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/edit'])): ?>display:none;<?php endif; ?>"  name="customer[edit]">
								<option <?php if($owned_permission['customer/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['customer/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['customer/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['customer/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/delete"/><?php echo L('DELETE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/delete'])): ?>display:none;<?php endif; ?>"  name="customer[delete]">
								<option <?php if($owned_permission['customer/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['customer/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['customer/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['customer/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/customerlock'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/customerlock"/>锁定客户&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/excelexport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/excelexport"/><?php echo L('EXCEL_EXPORT');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/excelimport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/excelimport"/><?php echo L('EXCEL_IMPORT');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/analytics'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/analytics"/>统计&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/analytics'])): ?>display:none;<?php endif; ?>"  name="customer[analytics]">
								<option <?php if($owned_permission['customer/analytics'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['customer/analytics'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['customer/analytics'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['customer/analytics'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['customer/transfer_edit'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="customer/transfer_edit"/>转移&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['customer/share'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="customer/share"/>分享&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['customer/close_share'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="customer/close_share"/>取消分享&nbsp;
						</span>
						<h4 style="padding-top: 10px;clear:both;">客户池</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/del_resource'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/del_resource"/><?php echo L('DELETE');?>&nbsp;
						</span>
						<h4 style="padding-top: 10px;clear:both;">商机</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/index"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['business/index'])): ?>display:none;<?php endif; ?>"  name="business[index]">
								<option <?php if($owned_permission['business/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['business/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['business/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['business/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['business/add'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="business/add"/><?php echo L('CREATE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/view"/><?php echo L('BROWSE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['business/view'])): ?>display:none;<?php endif; ?>"  name="business[view]">
								<option <?php if($owned_permission['business/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['business/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['business/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['business/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/edit"/><?php echo L('EDIT');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['business/edit'])): ?>display:none;<?php endif; ?>"  name="business[edit]">
								<option <?php if($owned_permission['business/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['business/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['business/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['business/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/delete"/><?php echo L('DELETE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['business/delete'])): ?>display:none;<?php endif; ?>"  name="business[delete]">
								<option <?php if($owned_permission['business/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['business/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['business/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['business/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<!-- <span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/excelexport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/excelexport"/><?php echo L('EXCEL_EXPORT');?>&nbsp;
						</span> -->
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['business/analytics'])): ?>checked="checked"<?php endif; ?> name="per[]" value="business/analytics"/><?php echo L('ANALYTICS');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['business/analytics'])): ?>display:none;<?php endif; ?>"  name="business[analytics]">
								<option <?php if($owned_permission['business/analytics'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['business/analytics'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['business/analytics'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['business/analytics'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<h4 style="padding-top: 10px;clear:both;">联系人</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contacts/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contacts/index"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contacts/index'])): ?>display:none;<?php endif; ?>"  name="contacts[index]">
								<option <?php if($owned_permission['contacts/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contacts/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contacts/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contacts/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contacts/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contacts/view"/><?php echo L('BROWSE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contacts/view'])): ?>display:none;<?php endif; ?>"  name="contacts[view]">
								<option <?php if($owned_permission['contacts/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contacts/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contacts/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contacts/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['contacts/add'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="contacts/add"/><?php echo L('CREATE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contacts/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contacts/edit"/><?php echo L('EDIT');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contacts/edit'])): ?>display:none;<?php endif; ?>"  name="contacts[edit]">
								<option <?php if($owned_permission['contacts/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contacts/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contacts/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contacts/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contacts/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contacts/delete"/><?php echo L('DELETE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contacts/delete'])): ?>display:none;<?php endif; ?>"  name="contacts[delete]">
								<option <?php if($owned_permission['contacts/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contacts/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contacts/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contacts/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<!-- <h4 style="padding-top: 10px;clear:both;">客户关怀</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/cares'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/cares"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/cares'])): ?>display:none;<?php endif; ?> " name="customer[cares]">
								<option <?php if($owned_permission['customer/cares'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['customer/cares'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['customer/cares'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['customer/cares'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/caresview'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/caresview"/><?php echo L('BROWSE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/caresview'])): ?>display:none;<?php endif; ?>"  name="customer[caresview]">
								<option <?php if($owned_permission['customer/caresview'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['customer/caresview'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['customer/caresview'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['customer/caresview'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['customer/caresadd'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="customer/caresadd"/><?php echo L('CREATE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/caresedit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/caresedit"/><?php echo L('EDIT');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/caresedit'])): ?>display:none;<?php endif; ?>"  name="customer[caresedit]">
								<option <?php if($owned_permission['customer/caresedit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['customer/caresedit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['customer/caresedit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['customer/caresedit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['customer/caresdelete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="customer/caresdelete"/><?php echo L('DELETE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['customer/caresdelete'])): ?>display:none;<?php endif; ?>"  name="customer[caresdelete]">
								<option <?php if($owned_permission['customer/caresdelete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['customer/caresdelete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['customer/caresdelete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['customer/caresdelete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span> -->
					</div>
					<div class="tab-pane" id="tab3" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="3"/><?php echo L('SELECT_ALL');?><br/>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/index"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contract/index'])): ?>display:none;<?php endif; ?>"  name="contract[index]">
								<option <?php if($owned_permission['contract/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contract/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contract/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contract/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/view"/><?php echo L('BROWSE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contract/view'])): ?>display:none;<?php endif; ?>"  name="contract[view]">
								<option <?php if($owned_permission['contract/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contract/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contract/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contract/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" <?php if(isset($owned_permission['contract/add'])): ?>checked="checked"<?php endif; ?> type="checkbox" name="per[]" value="contract/add"/><?php echo L('CREATE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/edit"/><?php echo L('EDIT');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contract/edit'])): ?>display:none;<?php endif; ?>"  name="contract[edit]">
								<option <?php if($owned_permission['contract/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contract/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contract/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contract/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/delete"/><?php echo L('DELETE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contract/delete'])): ?>display:none;<?php endif; ?>"  name="contract[delete]">
								<option <?php if($owned_permission['contract/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contract/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contract/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contract/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/collection'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/collection"/>业绩管理&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/analytics'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/analytics"/>统计&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['contract/analytics'])): ?>display:none;<?php endif; ?>"  name="contract[analytics]">
								<option <?php if($owned_permission['contract/analytics'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['contract/analytics'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['contract/analytics'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['contract/analytics'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<!-- <span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['finance/add_receivablesplan'])): ?>checked="checked"<?php endif; ?> name="per[]" value="finance/add_receivablesplan"/>回款计划&nbsp;
						</span>-->
						<span style="width:25%; float:left;">
							<input id="revo_check" class="check_opt hide" type="checkbox" <?php if(isset($owned_permission['contract/revokeCheck'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/revokeCheck"/>
							<input id="check" class="check_opt" type="checkbox" <?php if(isset($owned_permission['contract/check'])): ?>checked="checked"<?php endif; ?> name="per[]" value="contract/check"/>审核&nbsp;

						</span>
					</div>
					<div class="tab-pane" id="tab4" style="height:300px;line-height:30px;padding:20px 15px">
						<span style="width:25%; float:left;">
							<input type="checkbox" class="check_all" rel="4"/><?php echo L('SELECT_ALL');?> &nbsp;
						</span>





						<h4 style="padding-top: 10px;clear:both;">发票</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['finance/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="finance/index"/>发票业绩明细&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['finance/index'])): ?>display:none;<?php endif; ?>"  name="finance[index]">
								<option <?php if($owned_permission['finance/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['finance/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['finance/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['finance/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<!--<span style="width:25%; float:left;">-->
							<!--<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['finance/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="finance/index"/>发票业绩明细-->
						<!--</span>-->
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['invoice/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="invoice/index"/>发票审核
						</span>

					</div>
					<div class="tab-pane" id="tab5" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="5"/><?php echo L('SELECT_ALL');?><br/>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['leads/analytics'])): ?>checked="checked"<?php endif; ?> name="per[]" value="leads/analytics"/>员工业绩分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['leads/analytics'])): ?>display:none;<?php endif; ?>"  name="leads[analytics]">
								<option <?php if($owned_permission['leads/analytics'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['leads/analytics'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['leads/analytics'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['leads/analytics'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/business'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/business"/>员工项目进展分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/business'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[business]">
								<option <?php if($owned_permission['dataanalysis/business'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/business'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/business'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/business'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/customer'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/customer"/>客户自定义分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/customer'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[customer]">
								<option <?php if($owned_permission['dataanalysis/customer'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/customer'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/customer'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/customer'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/project'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/project"/>项目自定义分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/project'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[project]">
								<option <?php if($owned_permission['dataanalysis/project'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/project'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/project'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/project'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/ispresent'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/ispresent"/>到场数自定义分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/ispresent'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[ispresent]">
								<option <?php if($owned_permission['dataanalysis/ispresent'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/ispresent'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/ispresent'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/ispresent'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/achievement'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/achievement"/>业绩自定义分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/achievement'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[achievement]">
								<option <?php if($owned_permission['dataanalysis/achievement'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/achievement'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/achievement'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/achievement'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/resume'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/resume"/>简历自定义分析&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/resume'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[resume]">
								<option <?php if($owned_permission['dataanalysis/resume'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/resume'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/resume'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/resume'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/projecttrend'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/projecttrend"/>趋势分析(日)&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/projecttrend'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[projecttrend]">
								<option <?php if($owned_permission['dataanalysis/projecttrend'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/projecttrend'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/projecttrend'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/projecttrend'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/weektrend'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/weektrend"/>趋势分析(周)&nbsp;&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/weektrend'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[weektrend]">
								<option <?php if($owned_permission['dataanalysis/weektrend'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/weektrend'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/weektrend'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/weektrend'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['dataanalysis/monthtrend'])): ?>checked="checked"<?php endif; ?> name="per[]" value="dataanalysis/monthtrend"/>趋势分析(月)&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['dataanalysis/monthtrend'])): ?>display:none;<?php endif; ?>"  name="dataanalysis[monthtrend]">
								<option <?php if($owned_permission['dataanalysis/monthtrend'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['dataanalysis/monthtrend'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['dataanalysis/monthtrend'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['dataanalysis/monthtrend'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
					</div>
					<div class="tab-pane" id="tab6" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="6"/><?php echo L('SELECT_ALL');?><br/>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['setting/sendsms'])): ?>checked="checked"<?php endif; ?> name="per[]" value="setting/sendsms"/><?php echo L('ALL_SEND_SMS');?>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['setting/smsrecord'])): ?>checked="checked"<?php endif; ?> name="per[]" value="setting/smsrecord"/>短信发件箱
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['setting/sendemail'])): ?>checked="checked"<?php endif; ?> name="per[]" value="setting/sendemail"/><?php echo L('ALL_SEND_EMAIL');?>
						</span>
					</div>
					<div class="tab-pane" id="tab7" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="7"/><?php echo L('SELECT_ALL');?><br/>
						<h4 style="padding-top: 10px;clear:both;">工作日志</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['log/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/index"/><?php echo L('VISIBLE');?>&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['log/index'])): ?>display:none;<?php endif; ?>" name="log[index]">
								<option <?php if($owned_permission['log/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['log/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['log/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['log/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['log/mylog_add'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/mylog_add"/><?php echo L('CREATE');?>&nbsp;
							</select>		
						</span>
						<span style="width:25%; float:left;">
							<input id="viewajax" class="check_opt hide" type="checkbox" <?php if(isset($owned_permission['log/viewajax'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/viewajax"/>&nbsp;	
							<input class="check_opt" id="mylog_view" type="checkbox" <?php if(isset($owned_permission['log/mylog_view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/mylog_view"/>详情&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['log/mylog_view'])): ?>display:none;<?php endif; ?>" name="log[mylog_view]">
								<option <?php if($owned_permission['log/mylog_view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['log/mylog_view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['log/mylog_view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['log/mylog_view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['log/mylog_edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/mylog_edit"/><?php echo L('EDIT');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['log/log_delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/log_delete"/><?php echo L('DELETE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['log/analytics'])): ?>checked="checked"<?php endif; ?> name="per[]" value="log/analytics"/>统计&nbsp;
							<select style="width:auto;<?php if(!isset($owned_permission['log/analytics'])): ?>display:none;<?php endif; ?>" name="log[analytics]">
								<option <?php if($owned_permission['log/analytics'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['log/analytics'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['log/analytics'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['log/analytics'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<h4 style="padding-top: 10px;clear:both;">知识</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/index"/><?php echo L('VISIBLE');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['knowledge/index'])): ?>display:none;<?php endif; ?>"  name="knowledge[index]">
								<option <?php if($owned_permission['knowledge/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['knowledge/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['knowledge/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['knowledge/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/view"/><?php echo L('BROWSE');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['knowledge/view'])): ?>display:none;<?php endif; ?>"  name="knowledge[view]">
								<option <?php if($owned_permission['knowledge/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['knowledge/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['knowledge/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['knowledge/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/add'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/add"/><?php echo L('CREATE');?>&nbsp;
							</select>		
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/edit"/><?php echo L('EDIT');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['knowledge/edit'])): ?>display:none;<?php endif; ?>"  name="knowledge[edit]">
								<option <?php if($owned_permission['knowledge/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['knowledge/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['knowledge/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['knowledge/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/delete"/><?php echo L('DELETE');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['knowledge/delete'])): ?>display:none;<?php endif; ?>"  name="knowledge[delete]">
								<option <?php if($owned_permission['knowledge/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['knowledge/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['knowledge/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['knowledge/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/excelexport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/excelexport"/><?php echo L('EXCEL_EXPORT');?>&nbsp;
							</select>		
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['knowledge/excelimport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="knowledge/excelimport"/><?php echo L('EXCEL_IMPORT');?>&nbsp;
							</select>		
						</span>
						<h4 style="padding-top: 10px;clear:both;">公告</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['announcement/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="announcement/index"/><?php echo L('VISIBLE');?>&nbsp;
							<!-- 	<select style="width:auto;<?php if(!isset($owned_permission['announcement/index'])): ?>display:none;<?php endif; ?>"  name="announcement[index]">
                                    <option <?php if($owned_permission['announcement/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
                                    <option <?php if($owned_permission['announcement/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
                                    <option <?php if($owned_permission['announcement/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
                                    <option <?php if($owned_permission['announcement/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
                                </select> -->
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['announcement/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="announcement/view"/><?php echo L('BROWSE');?>&nbsp;
							<!-- <select style="width:auto;<?php if(!isset($owned_permission['announcement/view'])): ?>display:none;<?php endif; ?>"  name="announcement[view]">
								<option <?php if($owned_permission['announcement/view'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['announcement/view'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['announcement/view'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['announcement/view'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select> -->
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['announcement/add'])): ?>checked="checked"<?php endif; ?> name="per[]" value="announcement/add"/><?php echo L('CREATE');?>&nbsp;
							</select>		
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['announcement/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="announcement/edit"/><?php echo L('EDIT');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['announcement/edit'])): ?>display:none;<?php endif; ?>"  name="announcement[edit]">
								<option <?php if($owned_permission['announcement/edit'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['announcement/edit'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['announcement/edit'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['announcement/edit'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['announcement/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="announcement/delete"/><?php echo L('DELETE');?>&nbsp;	
							<select style="width:auto;<?php if(!isset($owned_permission['announcement/delete'])): ?>display:none;<?php endif; ?>"  name="announcement[delete]">
								<option <?php if($owned_permission['announcement/delete'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
							<option <?php if($owned_permission['announcement/delete'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
							<option <?php if($owned_permission['announcement/delete'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
							<option <?php if($owned_permission['announcement/delete'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select>
						</span>

						<h4 style="padding-top: 10px;clear:both;">日程</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['event/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="event/index"/><?php echo L('VISIBLE');?>&nbsp;
							<!-- <select style="width:auto;<?php if(!isset($owned_permission['event/index'])): ?>display:none;<?php endif; ?>"  name="event[index]">
								<option <?php if($owned_permission['event/index'] == 1): ?>selected="selected"<?php endif; ?> value="1"><?php echo L('PERMISSION_SUB');?></option>
								<option <?php if($owned_permission['event/index'] == 2): ?>selected="selected"<?php endif; ?> value="2"><?php echo L('PERMISSION_EVERYONE');?></option>
								<option <?php if($owned_permission['event/index'] == 3): ?>selected="selected"<?php endif; ?> value="3"><?php echo L('PERMISSION_SELF');?></option>
								<option <?php if($owned_permission['event/index'] == 4): ?>selected="selected"<?php endif; ?> value="4"><?php echo L('PERMISSION_DEPARTMENT');?></option>
							</select> -->
						</span>
						<!-- <span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['event/excelexport'])): ?>checked="checked"<?php endif; ?> name="per[]" value="event/excelexport"/><?php echo L('EXCEL_EXPORT');?>&nbsp;
							</select>		
						</span> -->
						<h4 style="padding-top: 10px;clear:both;">任务</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/index"/><?php echo L('VISIBLE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/view"/><?php echo L('BROWSE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/add'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/add"/><?php echo L('CREATE');?>&nbsp;
							</select>		
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/edit"/><?php echo L('EDIT');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/delete'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/delete"/>归档&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['task/del'])): ?>checked="checked"<?php endif; ?> name="per[]" value="task/del"/>删除&nbsp;
						</span>

					</div>
					<div class="tab-pane" id="tab8" style="height:300px;line-height:30px;padding:20px 15px">
						<input type="checkbox" class="check_all" rel="8"/><?php echo L('SELECT_ALL');?><br/>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['user/index'])): ?>checked="checked"<?php endif; ?> name="per[]" value="user/index"/><?php echo L('VISIBLE');?>&nbsp;	
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['user/view'])): ?>checked="checked"<?php endif; ?> name="per[]" value="user/view"/><?php echo L('BROWSE');?>&nbsp;
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['user/user_add'])): ?>checked="checked"<?php endif; ?> name="per[]" value="user/user_add"/><?php echo L('CREATE');?>&nbsp;	
						</span>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['user/edit'])): ?>checked="checked"<?php endif; ?> name="per[]" value="user/edit"/><?php echo L('EDIT');?>&nbsp;	
						</span>
						<h4 style="padding-top: 10px;clear:both;">通讯录</h4>
						<span style="width:25%; float:left;">
							<input class="check_opt" type="checkbox" <?php if(isset($owned_permission['user/contacts'])): ?>checked="checked"<?php endif; ?> name="per[]" value="user/contacts"/>列表&nbsp;	
						</span>
					</div>
				</div>
			</div>
		</div>
	</form>
</div>

<script type="text/javascript">
    $("#mylog_view").change(function(){
        $("#viewajax").prop('checked', $(this).prop("checked"));
    });
    $("#check").change(function(){
        $("#revo_check").prop('checked', $(this).prop("checked"));
    });
    $("#fcheck").change(function(){
        $("#frevo_check").prop('checked', $(this).prop("checked"));
    });
    $("#icheck").change(function(){
        $("#irevo_check").prop('checked', $(this).prop("checked"));
    });

    $(function(){
        $(".check_all").click(function(){
            var rel = $(this).attr('rel');
            if($(this).prop('checked') == true){
                $('#tab'+rel).find(".check_opt").prop('checked', $(this).prop("checked")).next().show();
            }else{
                $('#tab'+rel).find(".check_opt").prop('checked', $(this).prop("checked")).next().hide();
            }
        });
        $(".check_opt").click(function(){
            if($(this).prop('checked') == true){
                $(this).next().show();
                //if($(this).next().length > 0)	$(this).next().find("option[value='2']").prop("selected", true);
            }else{
                $(this).next().hide();
                //if($(this).next().length > 0)	$(this).next().find("option[value='1']").prop("selected", true);
            }

        });
    });
    $("#adbtn").click(
        function() {
            $.post('<?php echo U("user/user_authorize");?>',$("#form1").serialize(), function(data){
                if(data.status == 1){
                    swal({
                        title: "授权成功！",
                        text: "跳转中!",
                        type: "success"
                    });
                    $('#Modal').modal('hide');
                    top.location.reload();
                }else{
                    swal({
                        title: "授权失败!",
                        text: data.info,
                        type: "error"
                    });
                }
            }, 'json');
        }
    );
    /*	$('.ta').click(
            function(){
                var num = $(this).attr('rel');
                for (var i=1;i<19;i++){
                    if(num == i){
                        $('#ta'+i).show();
                    }else{
                        $('#ta'+i).hide();
                    }
                }
            }
        );*/
</script>
<div class="modal-footer" style="padding:8px 22px;">
	<button type="button" id="adbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>