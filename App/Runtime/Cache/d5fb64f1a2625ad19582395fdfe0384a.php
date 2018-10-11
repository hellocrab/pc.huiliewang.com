<?php if (!defined('THINK_PATH')) exit();?><style>



</style>
<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="dialog_form1" action="<?php echo U('business/edit_project');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <input type="hidden" name="key" value="<?php echo I('key');?>">
    <input type="hidden" name="kind" value="calllist">
<div class="full-height">
    <div class="content">
       <table class="beizhu">
           <tr>
               <td style="text-align: right;"><label style="color: red;">*</label>电话结果:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input type="hidden" value="<?php echo ($cc_list['call_result']); ?>" class="result" id="gjresult" name="call_result">
                   <input type="button" class="btn btn-select <?php if($cc_list['call_result']=='接通电话'){echo 'staactive';}?>" value="接通电话" rel="接通电话">
                   <input type="button" class="btn btn-select <?php if($cc_list['call_result']=='电话未接听'){echo 'staactive';}?>" value="电话未接听"  rel="电话未接听">
                   <input type="button" class="btn btn-select <?php if($cc_list['call_result']=='无效电话'){echo 'staactive';}?>" value="无效电话" rel="无效电话">
                   <input type="button" class="btn btn-select <?php if($cc_list['call_result']=='电话忙'){echo 'staactive';}?>" value="电话忙" rel="电话忙">
               </td>
           </tr>
           <tr>
               <td style="text-align: right;">是否继续跟进:</td>
               <td style="padding-left: 20px;">
                   <input value="<?php echo ($cc_list['gj']); ?>" id="gjflag" type="hidden">
                   <input type="radio" name="gj" value="1" <?php if($cc_list['gj']==1){echo 'checked';}?> >
                   <label for="gj">是</label>
                   <input type="radio" name="gj" value="0" <?php if(empty($cc_list['gj'])){echo 'checked';}?> >
                   <label for="gj">否</label>
                   <input type="text" readonly="readonly" class="time_se form-control timerinput"  id="gjtime" name="gjtime"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd  HH:mm', minDate:&quot;#F{$dp.$D('gjtime')}&quot;,maxDate:'2038-01-01'})"  placeholder="选择时间" >
               </td>
           </tr>
           <tr>
               <td style="text-align: right;">是否目标候选人:</td>
               <td style="padding-left: 20px;">
                   <input value="<?php echo ($cc_list['target']); ?>" id="target" type="hidden">
                   <input type="radio" name="target" value="1" <?php if($cc_list['target']==1){echo 'checked';}?> >
                   <label for="mubiao">是</label>
                   <input type="radio" name="target" value="0" <?php if(empty($cc_list['target'])){echo 'checked';}?> >
                   <label for="mubiao">否</label>
               </td>
           </tr>
           <tr>
               <td style="text-align: right;">结果备注:</td>
               <td style="padding-left: 20px;">
                   <textarea name="remarks" col="3" row="5" class="ccbeizhu" placeholder="最多不超过1000字"><?php echo ($cc_list['remarks']); ?></textarea>
               </td>
           </tr>
       </table>
    </div>
</div>
</form>




<script>

    $(function () {
        $(".result_select input").click(function () {
            var result=$(this).attr("rel");
            $(".result_select input").removeClass("staactive");
            $(this).addClass("staactive");
            $(".result").val(result);
        })

        $("input[name=gj]").click(function () {
            var gjflag=$(this).val();
            if(gjflag=="1" || gjflag==1){
                $(".time_se").show();
            }else{
                $(".time_se").hide();
                $(".time_se").val("");
            }
            $("#gjflag").val(gjflag);
        })

        $("input[name=mubiao]").click(function () {
            var mbflag=$(this).val();
            $("#mbflag").val(mbflag);
        })
    })



</script>