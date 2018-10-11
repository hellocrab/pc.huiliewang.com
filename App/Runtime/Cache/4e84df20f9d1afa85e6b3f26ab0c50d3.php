<?php if (!defined('THINK_PATH')) exit();?><style>



</style>
<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="tjfk_form" action="<?php echo U('business/tjfk');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
<div class="full-height">
    <div class="content">
       <table class="beizhu">
           <tr>
               <td style="text-align: right;"><label style="color: red;">*</label>状态:</td>
               <td class="result_select" style="padding-left: 20px;">
                   <input value="" id="gjflag" type="hidden">
                   <input type="radio" name="gj" value="1" class="tongguo" <?php if($list['gj']): ?>checked<?php endif; ?> >
                   <label for="gj">通过</label>
                   <input type="radio" name="gj" value="0" class="buheshi" <?php if($list['gj'] == 0): ?>checked<?php endif; ?> >
                   <label for="gj">不合适</label>
               </td>
           </tr>

           <tr class="bureason" style="display: none;">
               <td style="text-align: right;"> </td>
               <td class="result_select" style="padding-left: 20px;">
                   <input value="" id="gjflag" type="hidden">
                   <input type="radio" name="bhs" value="1" class="taotai">
                   <label for="gj">客户淘汰</label>
                   <input type="radio" name="bhs" value="0" class="fangqi">
                   <label for="gj">候选人放弃</label>

                   <select class="form-control ttreason" id="" name="status_type" aria-required="true" style="margin-bottom: 20px;width: 180px;display: none">
                       <option value="" label="">请选择淘汰原因</option>
                       <option <?php if($list['status_type'] == '条件不太匹配'): ?>selected<?php endif; ?> value="条件不太匹配" label="条件不太匹配">条件不太匹配</option>
                       <option <?php if($list['status_type'] == '专业知识不够'): ?>selected<?php endif; ?> value="专业知识不够" label="专业知识不够">专业知识不够</option>
                       <option <?php if($list['status_type'] == '薪资要求过高'): ?>selected<?php endif; ?> value="薪资要求过高" label="薪资要求过高">薪资要求过高</option>
                       <option <?php if($list['status_type'] == '行业背景相差太多'): ?>selected<?php endif; ?> value="行业背景相差太多" label="行业背景相差太多">行业背景相差太多</option>
                       <option <?php if($list['status_type'] == '架构调整'): ?>selected<?php endif; ?> value="架构调整" label="架构调整">架构调整</option>
                       <option <?php if($list['status_type'] == '背调不通过'): ?>selected<?php endif; ?> value="背调不通过" label="背调不通过">背调不通过</option>
                       <option <?php if($list['status_type'] == '其他'): ?>selected<?php endif; ?> value="其他" label="其他">其他</option>
                   </select>

                   <select class="form-control fqreason" id="" name="status_type" aria-required="true" style="margin-bottom: 20px;width: 180px;display: none;">
                       <option value="" label="">请选择放弃原因</option>
                       <option <?php if($list['status_type'] == '接受其他offer'): ?>selected<?php endif; ?> value="接受其他offer" label="接受其他offer">接受其他offer</option>
                       <option <?php if($list['status_type'] == '角色职责不符'): ?>selected<?php endif; ?> value="角色职责不符" label="角色职责不符">角色职责不符</option>
                       <option <?php if($list['status_type'] == '工作地点不匹配'): ?>selected<?php endif; ?> value="工作地点不匹配" label="工作地点不匹配">工作地点不匹配</option>
                       <option <?php if($list['status_type'] == '原公司挽留'): ?>selected<?php endif; ?> value="原公司挽留" label="原公司挽留">原公司挽留</option>
                       <option <?php if($list['status_type'] == '家庭原因'): ?>selected<?php endif; ?> value="家庭原因" label="家庭原因">家庭原因</option>
                       <option <?php if($list['status_type'] == '其他'): ?>selected<?php endif; ?> value="其他" label="其他">其他</option>
                   </select>
               </td>
           </tr>
           <tr>
               <td style="text-align: right;"><label style="color: red;">*</label>候选人反馈:</td>
               <td style="padding-left: 20px;">
                   <textarea col="3" row="5" class="ccbeizhu" name="guest_feedback" placeholder="反馈（最多不超过1000字）" maxlength="1000" style="margin-top: 10px;"><?php echo ($list['guest_feedback']); ?></textarea>
               </td>
           </tr>
           <tr>
               <td style="text-align: right;">客户反馈:</td>
               <td style="padding-left: 20px;">
                   <textarea col="3" row="5" class="ccbeizhu" name="custom_feedback" placeholder="反馈（最多不超过1000字）" maxlength="1000" style="margin-top: 10px;"><?php echo ($list['custom_feedback']); ?></textarea>
               </td>
           </tr>
       </table>
    </div>
</div>
</form>




<script>
    var gj = "<?php echo ($list['gj']); ?>";
    var bhs = "<?php echo ($list['bhs']); ?>";
    var status_type = "<?php echo ($list['status_type']); ?>";
    var guest_feedback = "<?php echo ($list['guest_feedback']); ?>";
    var custom_feedback = "<?php echo ($list['custom_feedback']); ?>";
    console.log(status_type);
    $(function () {
        $(".buheshi").click(function () {
            $(".bureason").show();
        })
        $(".tongguo").click(function () {
            $(".bureason").hide();
            $(".ttreason").hide();
            $(".fqreason").hide();
            $("input[name=bhs]").prop("checked",false);
        })

        $(".taotai").on("click",function () {
            $(".ttreason").show();
            $(".fqreason").hide();
        })
        $(".fangqi").on("click",function () {
            $(".ttreason").hide();
            $(".fqreason").show();
        })
    })



</script>