<?php if (!defined('THINK_PATH')) exit();?><style>



</style>
<link href="__PUBLIC__/style/css/dialog.css" rel="stylesheet">
<script src="__PUBLIC__/style/js/jquery-ui-1.10.4.min.js" type="text/javascript"></script>

<form class="form-horizontal" id="status_form2" action="<?php echo U('business/msbz');?>" method="post">
    <input type="hidden" name="id" value="<?php echo I('id');?>">
    <input type="hidden" name="key" value="<?php echo I('key');?>">
<div class="full-height">
    <div class="content">
       <table class="beizhu">
           <tr height="50">
               <td style="text-align: right;"><label style="color: red;">*</label>选择类型:</td>
               <td class="result_select teltype" style="padding-left: 20px;">
                   <input type="hidden" value="<?php echo ($list['mstype']); ?>" class="mstype" id="mstype" name="mstype">
                   <input type="button" <?php if($list[mstype] == '候选人电话'): ?>class="btn btn-select staactive"<?php else: ?>class="btn btn-select"<?php endif; ?> value="候选人电话" rel="候选人电话">
                   <input type="button" <?php if($list[mstype] == '候选人面试'): ?>class="btn btn-select staactive"<?php else: ?>class="btn btn-select"<?php endif; ?> value="候选人面试"  rel="候选人面试">
                   <input type="button" <?php if($list[mstype] == '其他'): ?>class="btn btn-select staactive"<?php else: ?>class="btn btn-select"<?php endif; ?> value="其他" rel="其他">
               </td>
           </tr>
           <tr height="80">
               <td style="text-align: right;">候选人状态:</td>
               <td class="result_select cantype" style="padding-left: 20px;">
                   <input type="hidden" value="<?php echo ($list['jobstatus']); ?>" class="jobstatus" id="jobstatus" name="jobstatus">
                   <input type="button" class="btn btn-select " value="在职/看看新机会" rel="在职/看看新机会">
                   <input type="button" class="btn btn-select " value="在职/急寻新工作"  rel="在职/急寻新工作"><br>
                   <input type="button" class="btn btn-select " value="在职/暂无跳槽打算" rel="在职/暂无跳槽打算">
                   <input type="button" class="btn btn-select " value="离职/正在找工作" rel="离职/正在找工作">
               </td>
           </tr>
           <tr height="50">
               <td style="text-align: right;">意向城市</td>
               <td class="result_select" style="padding-left: 20px;">
                   <div class="" style="margin-bottom: 10px;">
                       <script type="text/javascript">
                           $(function(){
                               new PCAS("province","city","","<?php echo ($list['province']); ?>","<?php echo ($list['city']); ?>","");
                           });
                       </script>
                       <select class="form-control " input_type="address" name="province" style="width:32%;float:left;" data-max-options="2"></select>
                       <select class="form-control " input_type="address" name="city" style="width:32%;float:left;margin-left:1%;"><option value="">全部</option><option value="">--请选择城市--</option></select>
                       </div>
               </td>
           </tr>
           <tr>
               <td style="text-align: right;">候选人信息:</td>
               <td style="padding-left: 20px;">
                   <textarea col="3" row="5" class="ccbeizhu" placeholder="内容包含但不限于：目前公司、职位；主要职责、汇报线；对下一份工作最看重的三点；薪资水平，薪资构成（1000字以内）" maxlength="1000" name="info"><?php echo ($list['info']); ?></textarea>
               </td>
           </tr>
           <tr  height="50">
               <td style="text-align: right;">期望:（可拖动排序）</td>
               <input type="hidden" name="hope_order" id="hope_order" value="<?php echo ($list['hope_order']); ?>">
               <td style="padding-left: 20px;">
                   <div class="sortitems">
                       <?php
 if($list['hope_order']){ $hope_order = explode(",",$list['hope_order']); foreach($hope_order as $li){ echo "<span class='itemone'>".$li."</span>"; } }else{ ?>
                       <span class="itemone">薪水</span>
                       <span class="itemone">地点</span>
                       <span class="itemone">股份/期权</span>
                       <span class="itemone">职业发展</span>
                       <span class="itemone">团队</span>
                       <span class="itemone">文化</span>
                       <?php
 } ?>
                   </div>
               </td>
           </tr>

           <tr>
               <td style="text-align: right;">期望:</td>
               <td style="padding-left: 20px;">
                   <textarea col="3" row="5" class="ccbeizhu" placeholder="薪水、想看什么机会、可接受的工作区域（1000字以内）" maxlength="1000" name="hope_content"><?php echo ($list['hope_content']); ?></textarea>
               </td>
           </tr>

           <tr>
               <td style="text-align: right;">市场信息:</td>
               <td style="padding-left: 20px;">
                   <textarea col="3" row="5" class="ccbeizhu" placeholder="面过哪些公司想去哪、转介绍（1000字以内）" maxlength="1000" style="margin-top: 10px;" name="market_info"><?php echo ($list['market_info']); ?></textarea>
               </td>
           </tr>

           <tr>
               <td style="text-align: right;">标签:</td>
               <td style="padding-left: 20px;" class="biqiaon">
                   <div class="yibiqiao">
                       <?php if($list['tags']): if(is_array($list['tag_arr'])): $i = 0; $__LIST__ = $list['tag_arr'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><span class="itembq"><?php echo ($vo); ?><i class="mrl10 icon-remove"></i></span><?php endforeach; endif; else: echo "" ;endif; endif; ?>
                   </div>
                   <input type="text" class="form-control bqinput bqcontent" maxlength="20">
                   <input type="hidden" name="tags" value="<?php echo ($list['tags']); ?>">
                   <a href="javascript:void(0)" class="addgw" id="addbq">+添加标签</a>
               </td>
           </tr>
           <tr>
               <td style="text-align: right;"></td>
               <td style="padding-left: 20px;">
                   <a href="javascript:void(0)" class="addgw" id="addrenwu">添加任务</a>
                   <div class="editrw" <?php if($list['beizhu'] == ''): ?>style="display: none"<?php endif; ?> >
                       <textarea col="3" row="5" class="tjbeizhu" name="beizhu" id="beizhu" placeholder="请填写备注（500字以内）" maxlength="500"><?php echo ($list['beizhu']); ?></textarea>
                       <input type="text" readonly="readonly" style="display: block;margin-left: 0px" class="time_se form-control timerinput"  id="timeend" name="timeend"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd  HH:mm', minDate:&quot;#F{$dp.$D('timeend')}&quot;,maxDate:'2038-01-01'})"  placeholder="选择时间" value="<?php echo ($list['timeend']); ?>">
                   </div>
               </td>
           </tr>

           <tr>
               <td style="text-align: right;"><label style="color: red;">*</label>是否继续下一步:</td>
               <td style="padding-left: 20px;">
                   <input value="<?php echo ($list['gj']); ?>" id="gjflag" type="hidden">
                   <input type="radio" name="gj" value="1" checked>
                   <label for="gj">是</label>
                   <input type="radio" name="gj" value="0">
                   <label for="gj">否</label>
                   <input type="text" readonly="readonly" class="time_se form-control timerinput"  id="gjtime" name="gjtime"  onFocus="WdatePicker({dateFmt:'yyyy-MM-dd  HH:mm', minDate:&quot;#F{$dp.$D('gjtime')}&quot;,maxDate:'2038-01-01'})"  placeholder="选择时间">
               </td>
           </tr>
       </table>
    </div>
</div>
</form>




<script>


var mstype = "<?php echo ($list['mstype']); ?>";
    var jobstatus = "<?php echo ($list['jobstatus']); ?>";
    var province = "<?php echo ($list['province']); ?>";
    var city = "<?php echo ($list['city']); ?>";
    var info = "<?php echo ($list['info']); ?>";
    var hope_order = "<?php echo ($list['hope_order']); ?>";
    var hope_content= "<?php echo ($list['hope_content']); ?>";
    var market_info = "<?php echo ($list['market_info']); ?>";
    var beizhu = "<?php echo ($list['beizhu']); ?>";
    var timeend = "<?php echo ($list['timeend']); ?>";
    var gj = "<?php echo ($list['gj']); ?>";
    var tags="<?php echo ($list['tags']); ?>";
    console.log(tags);
    $(".teltype .btn").each(function () {
        if(mstype==$(this).val()){
            $(".teltype .btn").removeClass("staactive");
            $(this).addClass("staactive");
        }
    })
    $(".cantype .btn").each(function () {
        if(jobstatus==$(this).val()){
            $(".cantype .btn").removeClass("staactive");
            $(this).addClass("staactive");
        }
    })
//    $("select[name=province] option").each(function () {
//        if(province==$(this).val()){
//            $(this).prop("selected",true);
//            $("select[name=province] option").eq(0).click();
//        }
//    })
//
//    $("select[name=city] option").each(function () {
//        if(city==$(this).val()){
//            $(this).prop("selected",true);
//        }
//    })
    $(function () {
        $(".sortitems").sortable({
            delay:2,
            opacity:0.35,
            stop: function (e, info) {
                var result = "";
                $(".itemone").each(function () {
                    result += $(this).html()+",";
                })
                result = result.substring(0,result.length-1);
                $("#hope_order").val(result);
            }
        })

        $(".result_select input").click(function () {
            var result=$(this).attr("rel");
            $(this).closest("td").find("input").removeClass("staactive");
            $(this).addClass("staactive");
            $(this).closest("td").find(".mstype").val(result);
            $(this).closest("td").find(".jobstatus").val(result);
        })


        var tagstr=$("input[name=tags]").val() ? $("input[name=tags]").val() : '';
        $("#addbq").click(function () {
            var addbq=$(".bqcontent").val();
            var num=$(".itembq").length;
            if(num>=5){
                alert_crm("最多添加5个标签！");
                return false;
            }
            if(addbq==""){
                alert_crm("标签不能为空！");
                return false;
            }
            var flag=0;
            $(".itembq").each(function () {
                var _this=$(this);
                if(addbq==_this.text()){
                    flag=1;
                }
            })
            if(flag==1){
                alert_crm("不能添加相同标签！");
                return false;
            }
            $(".yibiqiao").append('<span class="itembq">'+addbq+'<i class="mrl10 icon-remove"></i></span>');
            if(tagstr){
                tagstr=tagstr+","+addbq;
            }else{
                tagstr+=addbq;
            }
            $("input[name=tags]").val(tagstr);
            $(".bqcontent").val("");

        })

        $("body").on("click",".icon-remove",function () {
            $(this).closest(".itembq").remove();
        })

        $("#addrenwu").click(function () {
            $(".editrw").show();
        })


    })



</script>