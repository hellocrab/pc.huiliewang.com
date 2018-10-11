<?php if (!defined('THINK_PATH')) exit();?><div class="tab-content">
	<a id="add_share" rel="<?php echo ($customer_id); ?>" href="javascript:void(0);">添加成员</a>
	<div id="tab-1" class="tab-pane active" style="margin-top:10px;">
		<div class="full-height-scroll">
			<div class="table-responsive">
				<table class="table table-striped table-hover">
					<tbody>
						<tr>
							<td>成员头像</td>
							<td>成员姓名</td>
							<td>分享时间</td>
							<td>分享人</td>
							<td>操作</td>
						</tr>
						<?php if($share_list): if(is_array($share_list)): $i = 0; $__LIST__ = $share_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr id="tr_share_<?php echo ($vo['share_id']); ?>">
								<td><?php if($vo['img']): ?><img style="width:35px;height:35px;" src="<?php echo ($vo['img']); ?>"><?php else: ?><img style="width:35px;height:35px;" src="__PUBLIC__/img/default_img.png"><?php endif; ?> </td>
								<td><?php echo ($vo['by_sharename']); ?></td>
								<td ><?php echo (date("Y-m-d H:i",$vo['share_time'])); ?></td>
								<td> <?php echo ($vo['sharename']); ?></td>
								<td><a href="javascript:void(0);" class="yc_share" rel="<?php echo ($vo['share_id']); ?>">移除</a></td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php else: ?>
							<tr>
								<td colspan="5"><div style="text-align:center;color:#E4E4E4;font-size:22px;font-weight:700;padding-top:15px;">
	<img src="__PUBLIC__/img/exclamation_mark.png" style="margin-top:-3px;">&nbsp;&nbsp;暂无数据
</div></td>
							</tr><?php endif; ?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
</div>
<div style="display:none" id="dialog-share" title="分享客户">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<script>
	$('#share_count').html('<?php echo ($share_counts); ?>');
	//客户分享
	$("#add_share").click(function(){
		var id_array = new Array();
		var customer_id = $(this).attr('rel');
		id_array.push(customer_id);
		var customer_ids = id_array.join(",");
		$('#dialog-share').dialog('open');
		$('#dialog-share').load("<?php echo U('customer/share');?>","customer_id="+customer_ids+'&is_one=1');
	});
	$("#dialog-share").dialog({
		autoOpen: false,
		modal: true,
		width: 720,
		maxHeight: 600,
		position: ["center",100],
		buttons: {
			"确认分享": function () {
				var customer_id = $('#add_share').attr('rel');
				var share_array = new Array();
				$(".about_role_id:checked").each(function(){
					share_array.push($(this).val());
				});
				$.ajax({
					type: "post",
					async:false,
					url: "<?php echo U('customer/ajax_share');?>", 
					data: {customer_id:customer_id,share_owner_ids:share_array},
					dataType: "json",
					success : function(data){
						if(data.status != 1){
							swal("操作失败","操作失败！","error");
							return false;
						}else{
							$('#dialog-share-list').load('<?php echo U("customer/share_list","customer_id=");?>'+customer_id); 
							return true;
						}
					}
				});
				$(this).dialog("close");
			},
			"取消": function () {
				$(this).dialog("close");
			}
		}
	});
	$('.yc_share').click(function(){
		var share_id = $(this).attr('rel');
		swal({
			title: "您确定要移除成员信息吗？",
			text: "移除后该成员将无法共享次客户信息！",
			type: "warning",   
			showCancelButton: true,   
			confirmButtonColor: "#DD6B55",   
			confirmButtonText: "是的，移除！",
			cancelButtonText:'让我再考虑一下…',
			closeOnConfirm:false,
			closeOnCancel:false
		},
		function(isConfirm){
			if (isConfirm) {
				$.ajax({
					type:'get',
					url: "<?php echo U('customer/yc_share','share_id=');?>"+share_id,
					async: false,
					success: function (data) {
						if (data.status == 1) {
							$('#tr_share_'+share_id).remove();
							var share_count = $('#share_count').html();
							$('#share_count').html(share_count-1);
							swal("移除成功！", "您已经移除了此成员信息！", "success");
						}else{
							swal({
								title: "操作失败！",
								text:data.info,
								type: "error"
							})
							return false;
						}
					},
					dataType: 'json'
				});
			} else {
				swal("已取消","您取消了此操作！","error");
			}
		});
	});
</script>