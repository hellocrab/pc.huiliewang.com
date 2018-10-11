<?php if (!defined('THINK_PATH')) exit();?><style>
    .fwb00{
        font-weight: bold;
        color: #000;
    }
    .icobs{
        position: absolute;
        right: 1px;
        top: 1px;
        display: block;
        width: 30px;
        height: 30px;
        text-align: center;
        border-left: 1px solid #eeeeee;
    }

</style>

<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">

<form class="form-horizontal" id="assign_form" action="<?php echo U('invoice/distribution');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <div class="full-height">

        <div class="content">
            <div class="radio radio-info radio-inline" style="margin-left: 20px;margin-right: 20px;">
                <input type="radio" name="achievement" checked class="achievement" value="1">
                <label for="sex">线下业绩</label>
            </div>
            <div class="radio radio-info radio-inline">
                <input type="radio" name="achievement" class="achievement" value="2">
                <label for="sex">线上业绩</label>
            </div>
            <table class="beizhu" style="background: #f5f5f6;">

                <tr  class="fwb00" height="30" style="border: 1px solid #eeeeee;">
                    <td style="text-align: right;">收费金额:</td>
                    <td class="result_select" style="padding-left: 20px;" colspan="3" id="moneny">
                        <?php echo ($money); ?>
                    </td>
                </tr>
                <tr  height="30" style="border: 1px solid #eeeeee;">
                    <td style="text-align: right;"></td>
                    <td class="result_select fwb00" style="padding-left: 20px;">
                        人员
                    </td>
                    <td class="result_select fwb00" style="padding-left: 20px;">
                        业绩
                    </td>
                    <!--<td class="result_select fwb00" style="padding-left: 20px;">-->
                        <!--提成-->
                    <!--</td>-->
                </tr>
                <tr height="10">
                    <td colspan="4"></td>
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">推荐，面试跟进人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="推荐，面试跟进人" />
                                <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                                <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                        <!--<select class="form-control" name="user[]">-->
                            <!--<option value="蔡雅">蔡雅</option>-->
                        <!--</select>-->
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num1" name="anum[]">
                        
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">线索提供人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="线索提供人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num2" name="anum[]">
                      
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                      <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">合同签订人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="合同签订人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num3" name="anum[]">
                        
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">项目经理:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="项目经理" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num4" name="anum[]">
                       
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">回款人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="回款人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num5" name="anum[]">
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">简历提供人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="简历提供人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num6" name="anum[]">
                       
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">意向沟通，报告制作人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="意向沟通，报告制作人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num7" name="anum[]">
                       
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">薪酬，Offer谈判人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="薪酬，Offer谈判人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num8" name="anum[]">
                       
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
                </tr>
                <tr  height="50">
                    <td class="fwb00" style="text-align: right;width: 140px;">背调，入职跟进人:</td>
                    <td class="result_select" style="padding-left: 20px;">
                        <div class="form-group">
                            <input type="hidden" name="tikect_type[]" value="背调，入职跟进人" />
                            <input type="hidden" name="user[]" class="user_id" value="<?php echo ($user['user_id']); ?>" />
                            <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user['full_name']); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num9" name="anum[]">
                       
                    </td>
                    <!--<td class="result_select" style="padding-left: 20px;padding-right: 10px;position: relative">-->
                        <!--<input type="text" class="form-control" name="cnum[]">-->
                       <!---->
                    <!--</td>-->
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
<div style="display:none" id="dialog-role-list2" title="选择维护人">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>



<script>

    var user_name = "";
    var user_id = "";

    $(function () {
        var moneny = $("#moneny").html();
        var onNum1 =moneny*0.05.toFixed(2);
        var onNum2 =moneny*0.17;
        var onNum3 =moneny*0.15;
        var onNum4 =moneny*0.05;
        var onNum5 =moneny*0.05;
        var onNum6 =moneny*0.16;
        var onNum7 =moneny*0.16;
        var onNum8 =moneny*0.16;
        var onNum9 =moneny*0.05;

        var unNum1 =moneny*0;
        var unNum2 =moneny*0;
        var unNum3 =moneny*0.15;
        var unNum4 =moneny*0.17;
        var unNum5 =moneny*0.05;
        var unNum6 =moneny*0.16;
        var unNum7 =moneny*0.16;
        var unNum8 =moneny*0.16;
        var unNum9 =moneny*0.05;

        $("#num1").val(onNum1.toFixed(2));
        $("#num2").val(onNum2.toFixed(2));
        $("#num3").val(onNum3.toFixed(2));
        $("#num4").val(onNum4.toFixed(2));
        $("#num5").val(onNum5.toFixed(2));
        $("#num6").val(onNum6.toFixed(2));
        $("#num7").val(onNum7.toFixed(2));
        $("#num8").val(onNum8.toFixed(2));
        $("#num9").val(onNum9.toFixed(2));


        $(".achievement").click(function () {
            var num = $(this).val();
            if(num==1){
                $("#num1").val(onNum1.toFixed(2));
                $("#num2").val(onNum2.toFixed(2));
                $("#num3").val(onNum3.toFixed(2));
                $("#num4").val(onNum4.toFixed(2));
                $("#num5").val(onNum5.toFixed(2));
                $("#num6").val(onNum6.toFixed(2));
                $("#num7").val(onNum7.toFixed(2));
                $("#num8").val(onNum8.toFixed(2));
                $("#num9").val(onNum9.toFixed(2));
            }else if(num==2){
                $("#num1").val(unNum1.toFixed(2));
                $("#num2").val(unNum2.toFixed(2));
                $("#num3").val(unNum3.toFixed(2));
                $("#num4").val(unNum4.toFixed(2));
                $("#num5").val(unNum5.toFixed(2));
                $("#num6").val(unNum6.toFixed(2));
                $("#num7").val(unNum7.toFixed(2));
                $("#num8").val(unNum8.toFixed(2));
                $("#num9").val(unNum9.toFixed(2));
            }
        })
    })


    $('.user_name').click(function () {
        user_name = $(this);
        user_id = $(this).prev();
        $('#dialog-role-list2').dialog('open');
        $('#dialog-role-list2').load("<?php echo U('User/listDialogs');?>");
    });


    $('#dialog-role-list2').dialog({
        autoOpen: false,
        modal: true,
        width: 700,
        maxHeight: 400,
        buttons: {
            "<?php echo L('CONFIRM');?>": function () {
                var item = $('input:radio[name="owner"]:checked').val();
                var name = $('input:radio[name="owner"]:checked').attr('rel');
                if(item){
                    user_name.val(name);
                    user_id.val(item);
                }

                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });





</script>