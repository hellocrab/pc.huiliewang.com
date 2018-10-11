<?php if (!defined('THINK_PATH')) exit();?><style>


</style>

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="fapiao_form" action="<?php echo U('business/fapiao');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
<div class="full-height">
    <div class="content">
       <table class="beizhu">
           <?php if($pro_type == '面试快'): ?><tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>开票类型:</td>
               <td style="padding-left: 20px;">
                   <div class="col-md-6">
                       <input value="0" id="ftype" type="hidden">
                       <div class="radio radio-info radio-inline" style="margin-left: 20px;margin-right: 20px;padding: 0;">
                           <input type="radio" name="ispresent" checked=""  value="1" style="top: 6px;">
                           <label for="">到场</label>
                       </div>
                       <div class="radio radio-info radio-inline" style="padding: 0;">
                           <input type="radio" name="ispresent" value="2"style="top: 6px;">
                           <label for="">补偿</label>
                       </div>
                   </div>
                </td>
           </tr><?php endif; ?>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>发票编号:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input type="text" class="form-control" name="name" value="<?php echo ($name); ?>">
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>费用类型:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <select name="cost_type" id="" class="form-control required valid" aria-required="true" aria-invalid="false">
                       <option value="招聘服务费">招聘服务费</option>
                       <option value="咨询费用">咨询费用</option>
                       <option value="订金">订金</option>
                       <option value="其他">其他</option>
                   </select>
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>发票类型:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <select name="billing_type" id="" class="form-control required valid" aria-required="true" aria-invalid="false">
                       <option value=""></option>
                       <option value="普票">普票</option>
                       <option value="专票">专票</option>
                   </select>
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>发票抬头:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input class="form-control required valid" name="invoice_header" id="invoice_header" type="text" aria-required="true" aria-invalid="false">
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;">税号:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input class="form-control required valid" name="number" value="" type="text" aria-required="true" aria-invalid="false">
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>内容:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input class="form-control valid" name="content" id="content" type="text" aria-required="true" aria-invalid="false">
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>金额:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input class="form-control required valid" name="price" id="invoice_price" value="" type="text" aria-required="true" aria-invalid="false"  onkeyup="num_input(this)" onblur="bu(this)">
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;">备注:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <textarea name="description" class="form-control" cols="30" rows="3"></textarea>
               </td>
           </tr>
           <tr  height="10"></tr>
           <!--<tr  height="50">-->
               <!--<td style="text-align: right;">提醒对象:</td>-->
               <!--<td class="result_select" style="padding-left: 20px;">-->
                   <!--<input type="text" class="form-control" >-->
               <!--</td>-->
           <!--</tr>-->

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
        $("input[name=ftype]").click(function () {
            var flag=$(this).val();
            $("#ftype").val(flag);
            var a=0,b=270;
            if(flag==2){
                $("input[name=price]").val(b.toFixed(2));
                $("input[name=price]").attr("readOnly",true);
            }else{
                $("input[name=price]").val(a.toFixed(2));
                $("input[name=price]").attr("readOnly",false);
            }
        })

        $("input,select").on("blur",function () {
            $(this).css("border","1px solid #d8e3ef");
        })

    })




</script>