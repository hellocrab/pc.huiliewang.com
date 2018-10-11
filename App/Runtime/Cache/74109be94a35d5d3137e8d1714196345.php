<?php if (!defined('THINK_PATH')) exit();?><style>
	.body-span{
		line-height:25px;
		padding-top:0px;
	}
	.form-horizontal .control-label{
		text-align: right;
	}
	.close{font-size:34px;font-weight:400;color:#fff;}
    .close:hover{color:#fff;}
</style>
<div class="modal-header" style="border:none;">
    <b style="font-size:16px;">日程详情</b>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body col-sm-12">
    <?php if($event_info['event_type'] == 1): ?><div class="form-group ">
    		<label class="control-label col-sm-2">内容：</label>
    		<div class="col-sm-10">
    			<span class="body-span"><?php echo ($event_info['subject']); ?></span>
    		</div>
    	</div>
        <div class="form-group">
            <label class="col-sm-2 control-label">开始：</label>
            <div class="col-sm-10">
                <span class="body-span"><?php echo (date('Y-m-d H:i:s',$event_info['start_date'])); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">结束：</label>
            <div class="col-sm-10">
                <span class="body-span"><?php echo (date('Y-m-d H:i:s',$event_info['end_date'])); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2 control-label">相关<?php echo ($event_info['relevant_name']); ?>：</label>
            <div class="col-sm-10">
                <span class="body-span"><a target="_blank" href="./index.php?m=<?php echo ($event_info['module']); ?>&a=view&id=<?php echo ($event_info['module_id']); ?>"><?php echo ($event_info['module_name']); ?></a></span>
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-2 control-label">内容：</label>
            <div class="col-sm-10">
                <span class="body-span"><?php echo ($event_info['venue']); ?></span>
            </div>
        </div> -->
        <div class="form-group">
            <label class="col-sm-2 control-label">描述：</label>
            <div class="col-sm-10">
            	<span class="body-span"><?php echo ($event_info['description']); ?></span>
            </div>
        </div>
        <div class="form-group">
            <label class="control-label col-sm-2">标记：</label>
            <div class="col-sm-10">
                <ul class="color-selector" style="padding-left: 0px;">
                    <li>
                        <div class="radio bg-blue-600">
                            <input id="radio1" type="radio" name="color" <?php if($event_info['color'] == '#62a8ea' || $event_info['color'] == ''): ?>checked="checked"<?php endif; ?> value="#62a8ea">
                            <label for="radio1"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-green-600">
                            <input id="radio2" type="radio" name="color" value="#46be8a" <?php if($event_info['color'] == '#46be8a'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio2"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-cyan-600">
                            <input id="radio3" type="radio" name="color" value="#57c7d4" <?php if($event_info['color'] == '#57c7d4'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio3"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-orange-600">
                            <input id="radio4" type="radio" name="color" value="#f2a654" <?php if($event_info['color'] == '#f2a654'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio4"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-red-600">
                            <input id="radio5" type="radio" name="color" value="#f96868" <?php if($event_info['color'] == '#f96868'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio5"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-blue-grey-600">
                            <input id="radio6" type="radio" name="color" value="#526069" <?php if($event_info['color'] == '#526069'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio6"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-purple-600">
                            <input id="radio7" type="radio" name="color" value="#926dde" <?php if($event_info['color'] == '#926dde'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio7"></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    <?php else: ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">类型：</label>
            <div class="col-sm-10">
                <span class="body-span"><?php echo ($event_info['subject']); ?></span>
            </div>
        </div>
        <?php if($event_info['remind_info'] != ''): ?><div class="form-group">
                <label class="col-sm-2 control-label">内容：</label>
                <div class="col-sm-10">
                    <span class="body-span"><?php echo ($event_info['remind_info']['content']); ?></span>
                </div>
            </div><?php endif; ?>
        <div class="form-group">
            <label class="col-sm-2 control-label">相关：</label>
            <div class="col-sm-10">
                <span class="body-span">
                    <?php if($event_info['module'] == 'receivables'): ?><a target="_blank" href="<?php echo U('finance/view','id='.$event_info['module_id'].'&t='.$event_info['t']);?>"><?php echo ($event_info['module_name']); ?></a>
                    <?php else: ?>
                        <a target="_blank" href="<?php echo U($event_info['module'].'/view','id='.$event_info['module_id']);?>"><?php echo ($event_info['module_name']); ?></a><?php endif; ?>
                </span>
            </div>
        </div><?php endif; ?>
</div>

<div class="modal-footer">
    <div class="form-actions">
        <?php if($event_info['event_type'] == 1): ?><button class="btn btn-primary" id="edit_dialog" rel="<?php echo ($event_info['event_id']); ?>" data-dismiss="modal" type="button">
                编辑
            </button><?php endif; ?>
        <?php if($event_info['event_type'] != 3): ?><a class="btn btn-danger" id="dialog_delete" rel="<?php echo ($event_info['event_id']); ?>" href="javascript:;">删除</a><?php endif; ?>
    </div>
</div>


<script>
	$('#edit_dialog').click(function(){
		var event_id = $(this).attr('rel');
		$('#editNewEvent').modal('show');
		var url = "<?php echo U('event/edit','event_id=');?>"+event_id;
		$('#edit_event').load(url);
	});

	//删除日程
	$('#dialog_delete').click(function(){
		var event_id = $(this).attr('rel');
		swal({
			title: "您确定要删除该日程吗？",
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
		            type:'post',
		            url: "<?php echo U('event/delete');?>",
		            data: {event_id: event_id},
		            async: false,
		            success: function (data) {
						if (data.status == 1) {
							swal("删除成功！", "您已经永久删除了信息！", "success");
							location.reload();
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