<?php if (!defined('THINK_PATH')) exit();?><form name="fenpei_form" id="hknum_form" action=""  method="post">
    <style>
        .tabTh{
            color: #000;
            font-weight: bold;
            background: #f5f5f6;
        }
        .dilog tr{
            height: 15px;
        }
    </style>
	<input type="hidden" name="id" value="<?php echo ($leads_id); ?>"/>
    <div class="nicescroll" style="left:0px;top:0px;">
        <table class="table table-hover dilog" id="tab_Test3" style="background:#fff;margin-bottom:0px;">
            <tr class="tabTh" style="width: 100%;">
                <td  style="padding-left: 15px;text-align: left;">员工姓名</td>
                <td>部门</td>
                <td>回款金额</td>
                <td>所属客户</td>
                <td>所属项目</td>
                <td>候选人</td>
                <td>到账时间</td>
            </tr>
            <tbody>
            <?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><tr>
                    <td  style="padding-left: 15px;text-align: left;" nowrap="nowrap"><a href="javascript:void(0);" class="role_info" rel=""><?php echo ($vo["user_name"]); ?></a></td>
                    <td style="min-width: 100px;"><?php echo ($vo["department_name"]); ?></td>
                    <td style="min-width: 80px;"><?php echo ($vo["money"]); ?></td>
                    <td style="min-width: 80px;"><a href="<?php echo U('customer/view', 'id='.$vo['customer_id']);?>" target="_blank"><?php echo ($vo["customer_name"]); ?></a></td>
                    <td style="min-width: 80px;"><a href="<?php echo U('business/view','id='.$vo['business_id']);?>" target="_blank"><?php echo ($vo["business_name"]); ?></a></td>
                    <td style="min-width: 80px;"><a href="<?php echo U('product/view','id='.$vo['eid']);?>" target="_blank"><?php echo ($vo["resume_name"]); ?></a></td>
                    <td style="min-width: 80px;"><?php echo (date('Y-m-d',$vo["create_time"])); ?></td>
                </tr><?php endforeach; endif; else: echo "" ;endif; ?>
            </tbody>
        </table>
    </div>
    <!--<div style="padding-left: 15px;background: #f5f5f6;height: 40px;line-height: 40px;">总共：10条结果</div>-->
</form>
<div style="display:none;" id="dialog-role-list2" title="<?php echo L('SELECT_CONTACTS_OWMER');?>">
	<div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<script type="text/javascript">

</script>