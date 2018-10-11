<?php if (!defined('THINK_PATH')) exit();?><link type="text/css" rel="stylesheet" href="__PUBLIC__/css/validator.css"/>
<script type="text/javascript" src="__PUBLIC__/js/checkuser.js"></script>
<style>
    .close{font-size:34px;font-weight:400;color:#fff;}
    .close:hover{color:#fff;}
</style>
<div class="modal-header" style="padding:3px 10px;">
    <b style="font-size:16px;">编辑日程</b>
    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
</div>
<div class="modal-body clearfix">
    <form class="form-horizontal m-t" id="edit_Form" action="#" method="post" role="form">
    <input type="hidden" name="event_id" value="<?php echo ($event_info['event_id']); ?>" />
		<div class="form-group ">
            <div class="col-sm-1"></div>
			<label class="control-label col-sm-2" for="subject" ><span style="color:#FF0011;">*</span>内容：</label>
			<div class="col-sm-6">
				<input type="text" id="subject" name="subject" rel="require" rell="内容" class="form-control checkit" onblur="checkform(this);" value="<?php echo ($event_info['subject']); ?>"/>
			</div>
			<div class="col-sm-3 error_msg" id="subjectTip"></div>
		</div>
        <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 control-label" for="start_date"><span style="color:#FF0011;">*</span>开始：</label>
            <div class="col-sm-6">
                <input class="Wdate text-input small-input form-control " name="start_date" id="start_date" rel="require" rell="开始时间" type="text" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" value="<?php echo (date('Y-m-d H:i:s',$event_info['start_date'])); ?>" onblur="checkform(this);"/>
            </div>
            <div class="col-sm-3 error_msg" id="start_dateTip"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 control-label" for="end_date"><span style="color:#FF0011;">*</span>结束：</label>
            <div class="col-sm-6">
                <input class="Wdate text-input small-input form-control " name="end_date" id="end_date" rel="require" rell="结束时间" type="text" value="<?php echo (date('Y-m-d H:i:s',$event_info['end_date'])); ?>" onClick="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" onblur="checkform(this);" />
            </div>
            <div class="col-sm-3 error_msg" id="end_dateTip"></div>
        </div>
        <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 control-label" for="people">相关：</label>
            <div class="col-sm-3">
                <select name="module" class="form-control" onchange="changeContent()" id="select1" style="padding-right: 0px;">
                    <option value="">--请选择--</option>
                    <option value="contacts" <?php if($event_info['module'] == 'contacts'): ?>selected<?php endif; ?>>联系人</option>
                    <!--<option value="leads" <?php if($event_info['module'] == 'leads'): ?>selected<?php endif; ?>>线索</option>-->
                    <option value="customer" <?php if($event_info['module'] == 'customer'): ?>selected<?php endif; ?>>客户</option>
                    <option value="business" <?php if($event_info['module'] == 'business'): ?>selected<?php endif; ?>>项目</option>
                    <!--<option value="product" <?php if($event_info['module'] == 'product'): ?>selected<?php endif; ?>>产品</option>-->
                </select>
            </div>
            <div class="col-sm-6" style="padding-left: 5px;">
                <input type="hidden" id="module_id" name="module_id" value="<?php echo ($event_info['module_id']); ?>" />
                <input type="text" class="form-control" name="module_name" id="module_name" value="<?php echo ($event_info['module_name']); ?>" />
            </div>
        </div>
        <!-- <div class="form-group">
            <label class="col-sm-2 control-label" for="venue">内容：</label>
            <div class="col-sm-6">
                <input type="text" class="form-control checkit" id="venue" name="venue" rel="require" rell="内容" value="<?php echo ($event_info['venue']); ?>" />
            </div>
            <div class="col-sm-3 error_msg" id="venueTip"></div>
        </div> -->
        <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="col-sm-2 control-label" for="description">描述：</label>
            <div class="col-sm-6">
            	<textarea class="form-control" name="description" id="description" cols="30" rows="3"><?php echo ($event_info['description']); ?></textarea>
            </div>
            <div class="col-sm-3" ></div>
        </div>
        <div class="form-group">
            <div class="col-sm-1"></div>
            <label class="control-label col-sm-2">标记：</label>
            <div class="col-sm-9">
                <ul class="color-selector" style="padding-left: 0px;">
                    <li>
                        <div class="radio bg-blue-600">
                            <input id="radio1" type="radio" name="color" <?php if($event_info['color'] == '#62a8ea' || $event_info['color'] == ''): ?>checked="checked"<?php endif; ?> value="#62a8ea">
                            <label for="radio1"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-green-600">
                            <input id="radio2" type="radio" name="color" value="#46be8a" <?php if($event_info['color'] == '#46be8a'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio2"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-cyan-600">
                            <input id="radio3" type="radio" name="color" value="#57c7d4" <?php if($event_info['color'] == '#57c7d4'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio3"></label>
                        </div>
                    </li>
                    <li>
                    	<div class="radio bg-orange-600">
                            <input id="radio4" type="radio" name="color" value="#f2a654" <?php if($event_info['color'] == '#f2a654'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio4"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-red-600">
                            <input id="radio5" type="radio" name="color" value="#f96868" <?php if($event_info['color'] == '#f96868'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio5"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-blue-grey-600">
                            <input id="radio6" type="radio" name="color" value="#526069" <?php if($event_info['color'] == '#526069'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio6"></label>
                        </div>
                    </li>
                    <li >
                    	<div class="radio bg-purple-600">
                            <input id="radio7" type="radio" name="color" value="#926dde" <?php if($event_info['color'] == '#926dde'): ?>checked="checked"<?php endif; ?>>
                            <label for="radio7"></label>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </form>
</div>
<div class="modal-footer">
    <div class="form-actions">
        <button class="btn btn-primary" id="editbtn" data-dismiss="modal" type="button">
            保存
        </button>
        <a class="btn btn-sm btn-white" data-dismiss="modal" href="javascript:;">取消</a>
    </div>
</div>

<div class="" style="display:none;" id="dialog-contacts-list" title="<?php echo L('SELECT_CONTACT');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-leads" title="<?php echo L('CHOOSE_CLUES');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-customer-list" title="<?php echo L('SELECT_THE_CUSTOMER');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-business" title="<?php echo L('SELECT_BUSINESS');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<div class="" style="display:none;" id="dialog-product" title="<?php echo L('SELECT_PRODUCT');?>">
    <div class="spiner-example">
        <div class="sk-spinner sk-spinner-three-bounce">
            <div class="sk-bounce1"></div>
            <div class="sk-bounce2"></div>
            <div class="sk-bounce3"></div>
        </div>
    </div>
</div>
<script>
    $("#dialog-role-info").dialog({
        autoOpen: false,
        modal: true,
        width: 800,
        maxHeight: 400,
        position: ["center",100]
    });

    $("#dialog-contacts-list").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="contacts"]:checked').val();
                var name = $('input:radio[name="contacts"]:checked').parent().next().html();
                $('#module_id').val(item);
                $('#module_name').val(name);
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    $("#dialog-leads").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="leads"]:checked').val();
                var name = $('input:radio[name="leads"]:checked').parent().next().html();
                var company = $('input:radio[name="leads"]:checked').parent().next().next().html();
                $('#module_id').val(item);
                $('#module_name').val(name+" "+company);
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    $("#dialog-customer-list").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="customer"]:checked').val();
                var name = $('input:radio[name="customer"]:checked').parent().next().html();
                $('#module_id').val(item);
                $('#module_name').val(name);
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    $("#dialog-business").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="business"]:checked').val();
                var name = $('input:radio[name="business"]:checked').parent().next().html();
                if(item){
                    $('#module_id').val(item);
                    $('#module_name').val(name);
                }
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    $("#dialog-product").dialog({
        autoOpen: false,
        modal: false,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "<?php echo L('OK');?>": function () {
                var item = $('input:radio[name="product_id"]:checked').val();
                var name = $('input:radio[name="product_id"]:checked').parent().next().html();
                $('#module_id').val(item);
                $('#module_name').val(name);
                $(this).dialog("close");
            },
            "<?php echo L('CANCEL');?>": function () {
                $(this).dialog("close");
            }
        },
        position:["center",100]
    });

    function changeContent(){
        $('#module_id').val("");
        $('#module_name').val("");
    }

    $(function(){
        $('#add_event').click(function(){
            var now_date = '<?php echo ($now_date); ?>';
            $('#start_date').val(now_date);
            $('#end_date').val(now_date);
            $('#addNewEvent').modal('show');
        });
        $('#delete').click(function(){
            if(confirm('<?php echo L('CONFIRM_TO_DELETE');?>')){
                $("#form1").attr('action', '<?php echo U("event/delete");?>');
                $("#form1").submit();
            }
        });
        $(".role_info").click(function(){
            $role_id = $(this).attr('rel');
            $('#dialog-role-info').dialog('open');
            $('#dialog-role-info').load('<?php echo U("user/dialoginfo","id=");?>'+$role_id);
        });

        $('#module_name').click(
            function(){
                a = $("#select1  option:selected").val();
                if (a == "contacts"){
                    $('#dialog-contacts-list').dialog('open');
                    $('#dialog-contacts-list').load('<?php echo U("contacts/radioListDialog");?>');
                }else if(a == "leads"){
                    $('#dialog-leads').dialog('open');
                    $('#dialog-leads').load('<?php echo U("leads/listDialog");?>');
                }else if(a == "business"){
                    $('#dialog-business').dialog('open');
                    $('#dialog-business').load('<?php echo U("business/listDialog");?>');
                }else if(a == "customer"){
                    $('#dialog-customer-list').dialog('open');
                    $('#dialog-customer-list').load('<?php echo U("customer/listDialog");?>');
                }else if(a == "product"){
                    $('#dialog-product').dialog('open');
                    $('#dialog-product').load('<?php echo U("product/allProductDialog");?>');
                }
            }
        );
    });

    $("#editbtn").click(function(){
        // if(input_msg && before_submit()){
            $.ajax({
                type: "POST",
                url: "<?php echo U('event/edit');?>",
                data:$("#edit_Form").serialize(),
                async: true,
                success: function(data) {
                    if(data.status == 1){
                        $('#editNewEvent').modal('hide');
                        $('#calendar').fullCalendar('refetchEvents'); //refetchEvents事件
                        // showResponse(role_id,now_month); //成功返回
                    }else{
                         swal({
                            title: "修改失败!",
                            text: data.info,
                            type: "error"
                        });
                    }
                }
            });
        // }else{
        //  var item_id = [];
        //  $('.checkit').each(function(k,v){
        //      checkform(v);
        //      item_id.push($(v).attr('id'));
        //  });
        //  $.each(item_id,function(k,v){
        //      if($('#'+v+'Tip').html() == ''){
        //          item_id.splice(k,1);
        //      }
        //  });
        //  $('#'+item_id[0]).focus();
        //  return false;
        // }
    });
</script>