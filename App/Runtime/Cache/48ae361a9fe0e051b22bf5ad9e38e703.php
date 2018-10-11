<?php if (!defined('THINK_PATH')) exit();?><style>


</style>

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="edit_form" action="<?php echo U('invoice/editer');?>" method="post">
    <input type="hidden" name="invoice_id" value="<?php echo I('id');?>">
    <div class="full-height">
        <div class="content">
            <table class="beizhu">
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>发票编号:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input type="text" class="form-control" name="name" value="<?php echo ($invoice["name"]); ?>">
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>费用类型:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <select name="cost_type" id="" class="form-control required valid" aria-required="true" aria-invalid="false">
                            <option value="招聘服务费" <?php if($invoice["cost_type"] == '招聘服务费'): ?>selected<?php endif; ?> >招聘服务费</option>
                            <option value="咨询费用" <?php if($invoice["cost_type"] == '咨询费用'): ?>selected<?php endif; ?> >咨询费用</option>
                            <option value="订金" <?php if($invoice["cost_type"] == '订金'): ?>selected<?php endif; ?> >订金</option>
                            <option value="其他"  <?php if($invoice["cost_type"] == '其他'): ?>selected<?php endif; ?>  >其他</option>
                        </select>
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>发票类型:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <select name="billing_type" id="" class="form-control required valid" aria-required="true" aria-invalid="false">
                            <option value=""></option>
                            <option value="普票" <?php if($invoice["billing_type"] == '普票'): ?>selected<?php endif; ?> >普票</option>
                            <option value="专票" <?php if($invoice["billing_type"] == '专票'): ?>selected<?php endif; ?> >专票</option>
                        </select>
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>发票抬头:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input class="form-control required valid" name="invoice_header" id="invoice_header" type="text" aria-required="true" aria-invalid="false" value="<?php echo ($invoice["invoice_header"]); ?>">
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;">税号:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input class="form-control required valid" name="number" value="<?php echo ($invoice["number"]); ?>" type="text" aria-required="true" aria-invalid="false">
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>内容:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input class="form-control valid" name="content" id="content" value="<?php echo ($invoice["content"]); ?>" type="text" aria-required="true" aria-invalid="false">
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;"><label style="color: red;">*</label>金额:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input class="form-control required valid" name="price" id="invoice_price" value="<?php echo ($invoice["price"]); ?>" type="text" aria-required="true" aria-invalid="false" placeholder="0.00" onkeyup="num_input(this)" onblur="bu(this)">
                    </td>
                </tr>
                <tr  height="50">
                    <td style="text-align: right;">备注:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <textarea name="description" class="form-control" cols="30" rows="3"><?php echo ($invoice["description"]); ?></textarea>
                    </td>
                </tr>
                <tr  height="10"></tr>
                <tr  height="50" style="display: none;">
                    <td style="text-align: right;">提醒对象:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <input type="text" class="form-control" >
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