<?php if (!defined('THINK_PATH')) exit();?><style>


</style>

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="count_form" action="<?php echo U('invoice/count');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <div class="full-height">
        <div class="content">
            <table class="beizhu">

                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>时间:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input type="text" readonly="readonly" class="form-control timerinput"  style="background: #fff;" id="ctime" name="ctime"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd  HH:mm', minDate:&quot;#F{$dp.$D('ctime')}&quot;,maxDate:'2038-01-01'})"  placeholder="选择时间" >
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