<?php if (!defined('THINK_PATH')) exit();?><style>
	.dialog_table >tbody>tr>td {
		border:none;
	}
</style>
<form class="form-horizontal" id="dialog_form1" action="<?php echo U('Log/add');?>" method="post">	
	<table class="table dialog_table" style="border:none;">
		<input type='hidden' name="module" id="dialog_module" <?php if(isset($module)): ?>value="<?php echo ($module); ?>"<?php endif; ?>/> 
		<input type='hidden' name="id" id="dialog_module_id" rel="<?php echo ($module_name); ?>" value="<?php echo ($model_id); ?>"/>
		<input type="hidden" name="r" value="<?php echo ($r); ?>" />
		<tr>
			<td style="border:none;" colspan="4">
				<textarea rows="3" class="form-control" name="content" id="log_content" placeholder="添加跟进记录"><?php echo ($subject); ?></textarea>
			</td>
		</tr>
		<?php if($module == 'customer' || $module == 'leads'): ?><tr >
				<td class="tdleft">跟进类型：</td>
				<td>
					<select name="status_id" id="status_id" class="form-control" onchange="selectStatus()">
						<option value="">--请选择--</option>
						<?php if(is_array($status_list)): $i = 0; $__LIST__ = $status_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['id']); ?>"><?php echo ($vo['name']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>
				</td>
				<td class="tdleft">快捷添加：</td>
				<td>
					<select id="replay_list" class="form-control select2" onchange="selectReply()">
						<option value="">--请选择--</option>
						<?php if(is_array($reply_list)): $i = 0; $__LIST__ = $reply_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><option value="<?php echo ($vo['content']); ?>" rel="<?php echo ($vo['status_id']); ?>"><?php echo ($vo['str_content']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>
					</select>&nbsp;&nbsp;
					<a href="javascript:void(0)" id="setting_reply_dialog" title="管理快捷跟进模板"><i class="fa fa-cog" style="color:#999;"></i></a>
				</td>
			</tr>
			<tr>
				<?php if($module == 'customer'): ?><td class="tdleft">下次联系时间：</td>
					<td>
						<input type="text" value="" id="nextstep_time" class="form-control Wdate" name="nextstep_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" style="width: 90%;">
					</td>
					<td class="tdleft">保存为快捷添加：</td>
					<td>
						<div class="checkbox checkbox-primary">
							<input type="hidden" name="type" value="2" />
							<input name="save_reply" class="select_list" id="save_reply" type="checkbox" value="1"/>
							<label for="save_reply">&nbsp;&nbsp;</label>
						</div>
					</td>
				<?php else: ?>
					<td class="tdleft">下次联系时间：</td>
					<td>
						<input type="text" value="" id="nextstep_time" class="form-control Wdate" name="nextstep_time" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm'})" style="width: 90%;">
					</td>
					<td class="tdleft">&nbsp;</td>
					<td></td><?php endif; ?>
			</tr><?php endif; ?>
	</table>
	<?php if($log_info): ?><div class="ibox-content" style="border:none;margin-top: 5px;border-top: 1px dashed #d3d3d6;background-color: #e6e9f0;">
			<div class="social-feed-separated clearfix">
	            <div class="social-feed-box">
	                <div class="social-avatar">
	                    <img alt="image" style="width:35px;height:35px;" class="img-circle" src="<?php echo ($log_info['user']['thumb_path']); ?>">
	                    <a class="role_info name-colors" rel="<?php echo ($log_info['user']['role_id']); ?>" href="javascript:void(0);"><?php echo ($log_info['user']['full_name']); ?></a>&nbsp;&nbsp;
	                    <span class="text-muted">发布了一条快速记录</span>&nbsp;&nbsp;&nbsp;
	                    <span class="text-muted" ><?php echo (date("Y-m-d H:i",$log_info['create_date'])); ?>&nbsp;&nbsp;<a title="沟通类型" href="javascript:void(0);"><?php echo ($log_info['status_name']); ?></a></span>
	                </div>
	                <div class="social-body">
	                    <span style="word-wrap:break-word;line-height: 21px;color: #000;"><?php echo ($log_info['content']); ?></span>
	                    <?php if(!empty($log_info["nextstep_time"])): ?><div class="social-avatar">
			                	<span class="text-muted pull-right">下次联系时间：<?php echo (date("Y-m-d  H:i",$log_info["nextstep_time"])); ?></span>
			                </div><?php endif; ?>
	                </div>
	            </div>
	        </div>
		</div>
		<?php if($log_count > 1): ?><div class="ibox-content" style="border:none;">
				<a href="javascript:void(0);" id="log_history"><span class="pull-right"><i class="fa fa-history"></i>&nbsp;查看更多</span></a>
			</div><?php endif; endif; ?>
</form>
<div style="display:none" id="dialog-setting_reply" title="管理快捷跟进模板">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<div style="display:none" id="dialog-log_history" title="跟进记录">
	<div class="spiner-example">
		<div class="sk-spinner sk-spinner-three-bounce">
			<div class="sk-bounce1"></div>
			<div class="sk-bounce2"></div>
			<div class="sk-bounce3"></div>
		</div>
	</div>
</div>
<script>
$(".select2").select2();

$("#dialog-setting_reply").dialog({
	autoOpen: false,
	// modal: true,
	width: 550,
	maxHeight: 450,
	position: ["center",100],
	close:function(){
		selectStatus();//更新
		$(this).html("");
	},
	buttons: {
		"确定": function () {
			$('#status_form1').submit();
			$(this).dialog("close");
		},
		"取消": function () {
            selectStatus();//更新
			$(this).dialog("close");
		}
	}
});

$("#dialog-log_history").dialog({
	autoOpen: false,
	modal: true,
	width: 650,
	maxHeight: 450,
	position: ["center",100],
	close:function(){
		$(this).html("");
	},
	buttons: {
		"确定": function () {
			$(this).dialog("close");
		},
		"取消": function () {
			$(this).dialog("close");
		}
	}
});

$(function(){
	$("#setting_reply_dialog").click(function(){
		$('#dialog-setting_reply').dialog('open');
		$('#dialog-setting_reply').load('<?php echo U("setting/replyList");?>');
	});

	$("#log_history").click(function(){
		var module = $('#dialog_module').val();
		var module_id = $('#dialog_module_id').val();
		$('#dialog-log_history').dialog('open');
		$('#dialog-log_history').load('<?php echo U("log/commun_list","module=");?>'+module+'&module_id='+module_id);
	});
})

//更新列表
function selectStatus(){
	var status_id = $("#status_id option:selected").val();
	var temp = '<option value="">--请选择--</option>';
	$.ajax({
        type:'post',
        url: "<?php echo U('setting/getReplyByStatus');?>",
        data: {status_id: status_id},
        async: false,
        success: function (data) {
        	$.each(data.data, function(k, v){
				temp += '<option value="'+v.content+'">'+v.str_content+'</option>';
        	});
        },
        dataType: 'json'
    });
    $('#replay_list').html(temp);
}

function selectReply(){
	var replay_content = $("#replay_list option:selected").val();
	var status_id = $("#replay_list option:selected").attr('rel');
    //修改跟进类型
    $("#status_id option[value="+status_id+"]").attr('selected',true);
	//判断是否替换
    var log_content = $('#log_content').val();
    if (log_content !== '') {
        swal({
            title: '',
            text: '已填写沟通日志内容，确定要替换吗？',
            type: "warning",
            showCancelButton: true,
            confirmButtonColor: "#DD6B55",
            confirmButtonText: "确认",
            cancelButtonText: "取消",
            closeOnConfirm: true,
            closeOnCancel:  true}, function(isConfirm){
            if (isConfirm) {
                $('#log_content').val(replay_content);
            } else {
                return false;
            } 
        });
    } else {
        $('#log_content').val(replay_content);
    }
}

$('.business_code').on('click',function(){
	var is_checked = $(this).attr('rel');
	if(is_checked == 1){
		$(this).attr('rel','');
		$(this).prop('checked', false);
	}else{
		$('.business_code').attr('rel','');
		$(this).attr('rel',1);
	}
});

//创建快捷沟通

</script>