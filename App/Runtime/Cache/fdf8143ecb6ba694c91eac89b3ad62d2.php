<?php if (!defined('THINK_PATH')) exit();?><style>
	.radio label::before{border:1px solid #ccc;}
</style>
<div class="col-lg-12">
	<div class="table-content" id="table_container" style="padding-bottom:10px">
		<div class="ibox-content" style="border-bottom: none;">
			<div class="row " style="margin-left: 5px;">
				<div class="nav pull-right" >
					<button class="btn btn-primary" type="button" id="add_scene_dialog">&nbsp; 添加自定义场景</button>
				</div>
			</div>
		</div>
		<div class="ibox-content" style="background-color:#FFFAF0;">
			<span>拖拽位置可以设置场景显示顺序</span>
		</div>
		<div class="col-sm-12 ibox-content" style="border-top: none;padding:0px 2px;">
			<div id="table_div_scene" class="full-height-scroll" style="left:0px;top:0px;">
				<table class="table table-hover table-striped table_thead_fixed sort-list" id="tab_Test3_scene">
					<?php if(!empty($scene_list)): ?><thead>
							<tr colspan="6" class="tabTh" style="background-color:#f3f3f3;line-height:42px;height:42px;">
								<td width="10%">&nbsp;</td>
								<td width="20%">名称</td>
								<td width="20%">默认</td>
								<td width="10%">是否启用</td>
								<td width="20%"><?php echo L('OPERATING');?></td>
							</tr>
						</thead>
						<tbody>
						<?php if(is_array($scene_list)): $i = 0; $__LIST__ = $scene_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr class="controls_tr" id="tr_<?php echo ($vo['id']); ?>">
								<td><input type="hidden" class="check_list_scene" name="id[]" value="<?php echo ($vo["id"]); ?>"/></td>
								<td><?php echo ($vo["name"]); ?></td>
								<td>
									<div class="radio radio-info radio-inline" style="padding-left:20px;">
										<input type="radio" class="is_default" name="is_default"  rel="<?php echo ($vo['id']); ?>" <?php if($vo['id'] == $default_scene): ?>checked<?php endif; ?> /><label for=""></label>
									</div>
								</td>
								<td>
									<?php if($vo['type'] == 0): if($vo['is_hide'] == 0): ?><a class="is_hide" href="javascript:void(0);" rel="<?php echo ($vo['id']); ?>" title="不启用" ><span id="hide_span_<?php echo ($vo['id']); ?>" class="fa fa-toggle-on" style="color:#ccc;font-size:20px;"></span></a>
										<?php else: ?>
											<a class="is_hide" href="javascript:void(0);" rel="<?php echo ($vo['id']); ?>" title="启用" ><span id="hide_span_<?php echo ($vo['id']); ?>" class="fa fa-toggle-off" style="color:#ccc;font-size:20px;"></span></a><?php endif; endif; ?>
								</td>
								<td>
									<?php if($vo['type'] == 0): ?><a class="edit_scene" style="float:left;" href="javascript:void(0);" rel="<?php echo ($vo['id']); ?>" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;
										<a class="delete" style="float:left;margin-left:10px;" href="javascript:void(0);" rel="<?php echo ($vo['id']); ?>" title="删除"><i class="fa fa-times"></i></a><?php endif; ?>
								</td>
							</tr><?php endforeach; endif; else: echo "" ;endif; ?>
						</tbody>
					<?php else: ?>
						<tr>
							<td><?php echo L('EMPTY_TPL_DATA');?></td>
						</tr><?php endif; ?>
				</table>
				</div>
			</div>
		</div>
	</div>
</div>
<div style="display:none;" id="dialog-edit_scene" title="场景修改">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<script type="text/javascript">
$(document).on('click','.edit_scene',function(){
	var id = $(this).attr('rel');
	$('#dialog-edit_scene').dialog('open');
	$('#dialog-edit_scene').load('<?php echo U("system/scene_edit","module=customer&id=");?>'+id);
});

$("#dialog-edit_scene").dialog({
    autoOpen: false,
    modal: true,
	width: 750,
	height: 500,
	position: ["center",100],
	buttons: {
		"确定": function () {
			if ($('#scene_name').val == '') {
				alert_crm('请填写场景名称！');
				return false;
			}
			dohDialog();
			var temp = '';
			if(dosearchDialog == 1){
				var scene_id = $('#scene_id').val();		
				$.ajax({
		            type:'post',
		            url: "<?php echo U('system/scene_edit');?>",
		            data:$("#searchFormDialog").serialize(),
		            async: false,
		            success: function (data) {
						if (data.status == 1) {
							swal("温馨提示！", "修改成功！", "success");
							// location.reload();
							temp += '<td><input type="hidden" class="check_list_scene" name="id[]" value="'+data.data.id+'"/></td>\
									<td>'+data.data.name+'</td>\
									<td>\
									<div class="radio radio-info radio-inline" style="padding-left:20px;">';
							if (data.data.is_default == 1) {
								temp += '<input type="radio" class="is_default" name="is_default"  rel="'+data.data.id+'" checked /><label for=""></label>';
							} else {
								temp += '<input type="radio" class="is_default" name="is_default"  rel="'+data.data.id+'"/><label for=""></label>';
							}
							temp += '</div>\
								</td>\
								<td>';
							if (data.data.is_hide == 0) {
								temp += '<a class="is_hide" href="javascript:void(0);"  rel="'+data.data.id+'" title="不启用" ><span class="fa fa-toggle-on" id="hide_span_'+data.data.id+'" style="color:#ccc;font-size:20px;"></span></a>';
							} else {
								temp += '<a class="is_hide" href="javascript:void(0);" rel="'+data.data.id+'" title="启用" ><span class="fa fa-toggle-off" id="hide_span_'+data.data.id+'" style="color:#ccc;font-size:20px;"></span></a>';
							}
							temp += '</td>\
									<td>\
										<a class="edit_scene" style="float:left;" href="javascript:void(0);" rel="'+data.data.id+'" title="编辑"><i class="fa fa-pencil"></i></a>&nbsp;&nbsp;\
										<a class="delete" style="float:left;margin-left:10px;" href="javascript:void(0);" rel="'+data.data.id+'" title="删除"><i class="fa fa-times"></i></a>\
									</td>';
							$('#tr_'+scene_id).html(temp);
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
		        $(this).dialog("close");
	        }
		},
		"取消": function () {
			$(this).dialog("close");
		}
	},
	close:function(){ 
		$(this).html(''); 
	}
});

$("#add_scene_dialog").click(function(){
	$('#dialog-add_scene').dialog('open');
	$('#dialog-add_scene').load('<?php echo U("system/scene_add","module=customer"."&dialog=1");?>');
});

//是否默认
$('#tab_Test3_scene').on('change','.is_default',function(){
// $('.is_default').change(function(){
	var scene_id = $(this).attr('rel');
	$.ajax({
		type:'get',
		url:'index.php?m=system&a=sceneDefault&scene_id='+scene_id+'&type=default',
		async: true,
		success: function(data) {
			if(data.status == 1){
				//swal({
				//	title: "",
				//	text: data.info,
				//})
			}else{
				swal({
					title: "",
					text: data.info,
				})
			}
		}
	});
})

//是否启用
$('#tab_Test3_scene').on('click','.is_hide',function(){
	var scene_id = $(this).attr('rel');
	$.ajax({
		type:'get',
		url:'index.php?m=system&a=sceneDefault&scene_id='+scene_id+'&type=hide',
		async: true,
		success: function(data) {
			if(data.status == 1){
				if (data.data == 1) {
					$('#hide_span_'+scene_id).removeClass('fa-toggle-on');
					$('#hide_span_'+scene_id).addClass('fa-toggle-off');
				} else {
					$('#hide_span_'+scene_id).removeClass('fa-toggle-off');
					$('#hide_span_'+scene_id).addClass('fa-toggle-on');
				}
			}else{
				swal({
					title: "",
					text: data.info,
				})
			}
		}
	});
})

$("table tbody").sortable({
	connectWith: "table tbody",
	stop:function() {
		position = [];
		$.each($(".check_list_scene"), function(i, item){position.push(item.value)});
		$.get('<?php echo U("system/scenesort");?>',{postion:position.join(',')}, function(data){
			if (data.status == 1) {
				$(".alert.alert-success").remove();
				
				$(".page-header").after('<div class="alert alert-success"><button type="button" class="close" data-dismiss="alert">×</button>' + data.info + '</div>');
			} else {
				$(".alert.alert-error").remove();
				swal({
					title: "顺序保存失败!",
					type: "error"
				});
				$(".page-header").after('<div class="alert alert-error"><button type="button" class="close" data-dismiss="alert">×</button>' + data.info + '</div>');
			}
		}, 'json');
	}
});

$('#tab_Test3_scene').on('click','.delete',function(){
	var scene_id = $(this).attr('rel');
	swal({
		title: "您确定要删除该场景？",
		text: "删除后将无法恢复，请谨慎操作！",
		type: "warning",   
		showCancelButton: true,   
		confirmButtonColor: "#DD6B55",   
		confirmButtonText: "是的，我要删除！",
        cancelButtonText:'让我再考虑一下…',
        closeOnConfirm:false,
        closeOnCancel:false
	},
	function(isConfirm){
        if (isConfirm) {
        	$.ajax({
	            type:'GET',
	            url: "<?php echo U('system/sceneDefault','scene_id=');?>"+scene_id+'&type=del',
	            async: false,
	            success: function (data) {
					if (data.status == 1) {
						swal("删除成功！", "您已经永久删除了该场景！", "success");
						$('#tr_'+scene_id).remove();
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
            swal("已取消","您取消了删除操作！","error");
        }
    });
});
</script>