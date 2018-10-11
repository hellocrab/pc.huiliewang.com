<?php if (!defined('THINK_PATH')) exit();?><!-- 便笺 -->
<div class="col-sm-6 sort-item" rel="<?php echo ($id); ?>" style="padding:0px;">
	<div class="dash-border" >
		<div class="dash-title" style="padding-left:15px;padding-right:15px;">
			<img src="__PUBLIC__/img/notepad.png" style="width:14.5px;" />&nbsp;&nbsp;<?php echo ($title); ?>&nbsp;
			<small>
				<a rel="<?php echo ($id); ?>" class="update" href="javascript:void(0)" id="update_widget"><i class="icon-pencil"></i></a> &nbsp;
				<a rel="<?php echo ($id); ?>" class="delete_notepad" style="cursor:pointer"><i class="icon-remove"></i></a> &nbsp; 
			</small>
		</div>
		<textarea class="notepad form-control" style="height:80%;" id="notepad">
		</textarea>
	</div>
</div>
<script type="text/javascript">
	$('.delete_notepad').click(function(){
		var id = $(this).attr('rel');
		swal({
			title: "",
			text: "确定要删除吗？",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false
		},
		function(){
			window.location.href = "index.php?m=index&a=widget_delete&id="+id;
		});
	});
	$(function () {
		$.get("<?php echo U('log/getnotepad');?>", function(data){
			$('.notepad').html(data.data);
		});

		var load_content = '';//点击时数据
		$('.notepad').unbind('focus');
		$('.notepad').focus(function(){
			load_content = $(this).val();
		});
		$('.notepad').unbind('blur');
		$('.notepad').blur(function(){
			var note_content = $(this).val();//修改后数据
			if(note_content == '' && load_content != ''){
				swal({
						title: "",
						text: "确定要清空便笺么",
						type: "warning",
						showCancelButton: true,
						closeOnConfirm: false
					},
					function(){
						$(this).val(load_content);
					}
				)
				// if(!confirm('确定要清空便笺么?')){
				// 	$(this).val(load_content);
				// 	return true;
				// }
			}
			if(load_content != note_content){
				$.ajax({
					type: "post",
					url: "<?php echo U('log/notepad');?>", 
					data: {content : note_content},
					dataType: "json",
					success : function(result){
						
						if(result.status != 1){
							alert('跑神儿了,没有写入成功!');
						}else{
							$('.notepad').html(note_content);
						}
					}
				});
			}
		});
	});
</script>
<!-- 便笺 END-->