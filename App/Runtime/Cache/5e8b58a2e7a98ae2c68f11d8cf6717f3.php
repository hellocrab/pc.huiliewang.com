<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="__PUBLIC__/css/validator.css"/>
<script type="text/javascript" src="__PUBLIC__/js/checkuser.js"></script>
<style>
	.close{font-size:34px;font-weight:400;color:#fff;}
	.close:hover{color:#fff;}
</style>
<div class="modal-header" style="padding:3px 10px;">
	<b style="font-size:16px;">修改职级</b>
	<button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body clearfix">
	<form id="ad_Form" class="form-horizontal m-t" method="post">

		<div class="col-sm-12">
			<input type="hidden" name="id" value="<?php echo ($jobrankid); ?>">
			<div class="form-group ">
				<div class="col-sm-1">
				</div>
				<label class="control-label col-sm-2"  style="width:110px;"><span style="color:#FF0011;">*</span>职级名称：</label>
				<div class="col-sm-6">
					<input type="text" value="<?php echo ($jobrankname); ?>" id="jobrank_name" name="jobrank_name" rel="require" rell="职级名称" class="form-control checkit" onblur="checkform(this);" />
				</div>
				<div class="col-sm-3 error_msg" id="jobrank_nameTip"></div>
			</div>

		</div>
	</form>
</div>
<div class="modal-footer" style="padding:8px 22px;">
	<button type="button" id="adbtn" class="btn btn-primary">保存</button>
	<button type="button" class="btn btn-white" data-dismiss="modal">关闭</button>
</div>
<script>
    $("#adbtn").click(function(){
        if(input_msg && before_submit()){
            $.ajax({
                type: "POST",
                url: "<?php echo U('jobrankedit');?>",
                data:$("#ad_Form").serialize(),
                async: true,
                success: function(data) {
                    if(data.status == 1){
                        swal({
                            title: "修改成功！",
                            text: "跳转中!",
                            type: "success"
                        });
                        $('#Modal').modal('hide');
                        top.location.reload();
                    }else{
                        swal({
                            title: "修改失败!",
                            text: data.info,
                            type: "error"
                        });
                    }
                }
            });
        }else{
            var item_id = [];
            $('.checkit').each(function(k,v){
                checkform(v);
                item_id.push($(v).attr('id'));
            });
            $.each(item_id,function(k,v){
                if($('#'+v+'Tip').html() == ''){
                    item_id.splice(k,1);
                }
            });
            $('#'+item_id[0]).focus();
            return false;
        }
    });
</script>