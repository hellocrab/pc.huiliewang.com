<?php if (!defined('THINK_PATH')) exit();?><input type="hidden" id="allowExts" value="<?php echo ($allowExts); ?>" />
<script type="text/javascript">
	function add_file(id) {
		$("#add_more").before('<p id="attachment' + id + '"><input type="file" name="file[]"/> <a href=\'javascript:void(0)\'  onclick=\'javascript:$(\"#attachment' + id + '\").remove();\'><?php echo L('DELETE');?></a></p>');
		$("#add_more").attr('href', 'javascript:add_file(' + (id+1) + ');');
	}
</script>
<!-- 引用控制层插件样式 -->
<link rel="stylesheet" href="__PUBLIC__/uploadjs/control/css/zyUpload.css" type="text/css" />
<!-- 引用核心层插件 -->
<script type="text/javascript" src="__PUBLIC__/uploadjs/core/zyFile.js"></script>
<!-- 引用控制层插件 -->
<script type="text/javascript" src="__PUBLIC__/uploadjs/control/js/zyUpload.js"></script>
<div id="demo" class="demo"></div>
<div id="add_more"></div>
<style type="text/css">
	.upload_drag_area{height: 40px; line-height: 40px;}
</style>
<script type="text/javascript">
	$(function(){
		// 初始化插件
		$("#demo").zyUpload({
			width            :   "97%",                 // 宽度
			height           :   "230px",                 // 宽度
			itemWidth        :   "120px",                 // 文件项的宽度
			itemHeight       :   "100px",                 // 文件项的高度
			//url              :   "/Uploads",  // 上传文件的路径
			url              :   "./index.php?m=file&a=add&module=<?php echo ($module); ?>&r=<?php echo ($r); ?>&id=<?php echo ($id); ?>",
			multiple         :   true,                    // 是否可以多个文件上传
			dragDrop         :   true,                    // 是否可以拖动上传文件
			del              :   true,                    // 是否可以删除文件
			finishDel        :   false,  				  // 是否在上传文件完成后删除预览
			/* 外部获得的回调接口 */
			onSelect: function(selectFiles, allFiles){    // 选择文件的回调方法  selectFile:当前选中的文件  allFiles:还没上传的全部文件
				console.info("当前选择了以下文件：");
				console.info(selectFiles);
				$("#fileSubmit").click();
			},
			onProgress: function(file, loaded, total){    // 正在上传的进度的回调方法
				console.info("当前正在上传此文件：");
				console.info(file.name);
				console.info("进度等信息如下：");
				console.info(loaded);
				console.info(total);
			},
			onDelete: function(file, files){              // 删除一个文件的回调方法 file:当前删除的文件  files:删除之后的文件
				console.info("当前删除了此文件：");
				console.info(file.name);
			},
			onSuccess: function(file, response){          // 文件上传成功的回调方法
				console.info("此文件上传成功：");
				console.info(file.name);
				console.info(response);
			},
			onFailure: function(file, response){          // 文件上传失败的回调方法
				console.info("此文件上传失败：");
				console.info(file.name);
			},
			onComplete: function(response){           	  // 上传完成的回调方法
				console.info("文件上传完成");
				console.info(response);
			}
		});

		$('#allowExts_js').html($('#allowExts').val());
	});
</script>