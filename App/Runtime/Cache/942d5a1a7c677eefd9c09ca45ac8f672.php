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

<form class="form-horizontal" id="assign_form" action="<?php echo U('invoice/distribution_int');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <div class="full-height">

        <div class="content">

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
                                <input type="hidden" name="tikect_type" value="猎头顾问" />
                                <input type="hidden" name="user" class="user_id" value="<?php echo session('user_id');?>" />
                                <input class="form-control required user_name" aria-required="true" placeholder="请点击选择"  type="text" name="joiner_name" value="<?php echo ($user_name); ?>" readonly="true" style="cursor:pointer;" title="请点击选择"/>
                        </div>
                        <!--<select class="form-control" name="user[]">-->
                            <!--<option value="蔡雅">蔡雅</option>-->
                        <!--</select>-->
                    </td>
                    <td class="result_select" style="padding-left: 20px;position: relative">
                        <input type="text" class="form-control" id="num1" name="anum" value="<?php echo ($money); ?>">

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