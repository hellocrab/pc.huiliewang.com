<?php if (!defined('THINK_PATH')) exit();?><style>


</style>

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="examine_form" action="<?php echo U('invoice/examine');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <div class="full-height">
        <div class="content">
            <table class="beizhu">
                <tr>
                    <td style="text-align: right;"><label style="color: red;">*</label>是否同意:</td>
                    <td style="padding-left: 20px;">
                        <input value="0" type="hidden">
                        <input type="radio" name="type" value="1" checked="">
                        <label for="">是</label>
                        <input type="radio" name="type" value="0">
                        <label for="">否</label>
                        </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;">备注:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
                    </td>
                </tr>
            </table>
        </div>
    </div>
</form>

<div style="display:none" id="dialog-gw">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>




<script>



    $(function () {


    })



</script>