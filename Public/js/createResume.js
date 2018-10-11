function expadd(exp) {
    var exphtml="";
    if(exp=="workExp"){
        exphtml="<div style=\"background: none;border-top: 1px solid #eeeeee;padding-top: 20px;padding-bottom: 10px;\" class=\"panel-body3 expbox\">\n" +
            "<div class=\"form-group\">\n" +
            "<label class=\"col-sm-2 control-label\">时间<span class=\"text-danger\">*</span></label>\n" +
            "<div class=\"col-sm-9\">\n" +
            "<input class=\"form-control text-center\" id=\"experienceStartInputOption\" type=\"text\" style=\"width:120px; display:inline;height: 25px;background: #ffffff\" placeholder=\"年-月\"   onFocus=\"WdatePicker({dateFmt:'yyyy-MM', minDate:&quot;#F{$dp.$D('experienceStartInputOption')}&quot;,maxDate:'2038-01-01'})\" readonly=\"readonly\"><span>-&gt;</span>\n" +
            "<input class=\"form-control text-center\" id=\"experienceEndInputOption\" type=\"text\" style=\"width:120px; display:inline;height: 25px;background: #ffffff\" placeholder=\"年-月\"    onFocus=\"WdatePicker({dateFmt:'yyyy-MM', minDate:&quot;#F{$dp.$D('experienceEndInputOption')}&quot;,maxDate:'2038-01-01'})\"  readonly=\"readonly\">\n" +
            "<div class=\"checkbox checkbox-info checkbox-inline\" style=\"vertical-align: baseline;\">\n" +
            "<input type=\"checkbox\">\n" +
            "<label>目前在职<span class=\"text-danger\">*</span></label>\n" +
            "</div>\n" +
            "</div>\n" +
            "</div>\n" +
            "<div class=\"form-group\" >\n" +
            "<label class=\"col-sm-2 control-label\">公司名称<span class=\"text-danger\">*</span></label>\n" +
            "<div class=\"col-sm-9\">\n" +
            "<input class=\"form-control\" type=\"text\" name=\"exps0.company\" typeahead=\"item.name for item in autocomplete(&quot;company&quot;, $viewValue)\" aria-autocomplete=\"list\" aria-expanded=\"false\" aria-owns=\"typeahead-268-5645\" required=\"required\"><ul class=\"dropdown-menu\" style=\"display: block;;display: block;\" role=\"listbox\" aria-hidden=\"true\" typeahead-popup=\"\" id=\"typeahead-268-5645\" matches=\"matches\" active=\"activeIdx\" select=\"select(activeIdx)\" move-in-progress=\"moveInProgress\" query=\"query\" position=\"position\">\n" +
            "</ul>\n" +
            "</div>\n" +
            "</div>\n" +
            "<div class=\"form-group\">\n" +
            "<label class=\"col-sm-2 control-label\">职位<span class=\"text-danger\">*</span></label>\n" +
            "<div class=\"col-sm-4\">\n" +
            "<input class=\"form-control\" type=\"text\" name=\"exps0.title\" typeahead=\"item for item in autocomplete(&quot;title&quot;, $viewValue)\" aria-autocomplete=\"list\" aria-expanded=\"false\" aria-owns=\"typeahead-269-2565\" required=\"required\"><ul class=\"dropdown-menu\" style=\"display: block;;display: block;\" role=\"listbox\" aria-hidden=\"true\" typeahead-popup=\"\" id=\"typeahead-269-2565\" matches=\"matches\" active=\"activeIdx\" select=\"select(activeIdx)\" move-in-progress=\"moveInProgress\" query=\"query\" position=\"position\">\n" +
            "</ul>\n" +
            "</div>\n" +
            "</div>\n" +
            "<div class=\"form-group\">\n" +
            "<label class=\"col-sm-2 control-label\">职责描述<span class=\"text-danger\">*</span></label>\n" +
            "<div class=\"col-sm-9\">\n" +
            "<textarea class=\"msd-elastic form-control\"  required=\"required\" style=\"min-height: 136px; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 136px;\"></textarea>\n" +
            "</div>\n" +
            "</div><button class=\"btn col-sm-offset-2 btn-danger btn-xs deletebtn\" type=\"button\" >删除</button>\n" +
            "</div>";

        $(".workExp .panel-body3").last().append(exphtml);

    }
    
    if(exp=="eduExp"){
        exphtml = '<div style="background: none;border-top: 1px solid #eeeeee;padding-top: 20px;padding-bottom: 10px;" class="panel-body3 expbox">\n' +
            '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-10">\n' +
            '<input class="form-control text-center timerinput" id="eduyearFrom" type="text" placeholder="年-月"   onFocus="WdatePicker({dateFmt:\'yyyy-MM\', minDate:&quot;#F{$dp.$D(\'workyearFrom\')}&quot;,maxDate:\'2038-01-01\'})" readonly="readonly"><span>-&gt;</span>\n' +
            '<input class="form-control text-center timerinput" id="eduyearEnd" type="text" placeholder="年-月"    onFocus="WdatePicker({dateFmt:\'yyyy-MM\', minDate:&quot;#F{$dp.$D(\'workyearFrom\')}&quot;,maxDate:\'2038-01-01\'})"  readonly="readonly">\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group" >\n' +
            '<label class="col-sm-2 control-label">学校名称<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-9">\n' +
            '<input class="form-control required" type="text" name="schoolName">\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label">专业<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-3">\n' +
            '<input class="form-control required" type="text" id="majorName" name="majorName" >\n' +
            '</div>\n' +
            '<label class="col-sm-2 control-label">学历<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-3">\n' +
            '<input class="form-control required" type="text" id="degree" name="degree" >\n' +
            '</div>\n' +
            '</div>\n' +
            '<button class="btn col-sm-offset-2 btn-danger btn-xs deletebtn" type="button" >删除</button>\n' +
            '\n</div>';

        $(".eduExp .panel-body3").last().append(exphtml);
    }
    
    if(exp=="projectExp"){
        exphtml = '<div style="background: none;border-top: 1px solid #eeeeee;padding-top: 20px;padding-bottom: 10px;" class="panel-body3 expbox">\n' +
            '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label">时间<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-10">\n' +
            '<input class="form-control text-center timerinput" id="projectyearFrom" type="text" placeholder="年-月"   onFocus="WdatePicker({dateFmt:\'yyyy-MM\', minDate:&quot;#F{$dp.$D(\'workyearFrom\')}&quot;,maxDate:\'2038-01-01\'})" readonly="readonly"><span>-&gt;</span>\n' +
            '<input class="form-control text-center timerinput" id="projectyearEnd" type="text" placeholder="年-月"    onFocus="WdatePicker({dateFmt:\'yyyy-MM\', minDate:&quot;#F{$dp.$D(\'workyearFrom\')}&quot;,maxDate:\'2038-01-01\'})"  readonly="readonly">\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group" >\n' +
            '<label class="col-sm-2 control-label">项目名称<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-9">\n' +
            '<input class="form-control required" type="text" name="proName">\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label">项目职位<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-4">\n' +
            '<input class="form-control required" type="text" id="projectOffice" name="projectOffice" >\n' +
            '</div>\n' +
            '</div>\n' +
            '<div class="form-group">\n' +
            '<label class="col-sm-2 control-label">职责描述<span class="text-danger">*</span></label>\n' +
            '<div class="col-sm-9">\n' +
            '<textarea class="msd-elastic form-control required"  name="proDes" style="min-height: 136px; overflow: hidden; word-wrap: break-word; resize: horizontal; height: 136px;"></textarea>\n' +
            '</div>\n' +
            '</div>\n' +
            '<button class="btn col-sm-offset-2 btn-danger btn-xs deletebtn" type="button" >删除</button>\n' +
            '</div>';
        $(".projectExp .panel-body3").last().append(exphtml);
    }
}





//职位类别，支持单选、多选切换，限制最大选择数量，指定目标元素类型html(),val()
function index_job(allow_select_jobclass_count, target_jobclassin_names, target_jobclassin_ids, jobdiv_style, codeids, index_jobclass_callback) {
    $(".xubox_shade").show();
    $(".xubox_layer").show();
    if ($(target_jobclassin_names).length <= 0) {layer.msg('职位类别名称目标元素不存在！', 2, 8);return false;}
    if ($(target_jobclassin_ids).length <= 0) { layer.msg('职位类别编号目标元素不存在！', 2, 8);return false;}
    //允许选择的最大个数，等于1时为单选
    window.allow_select_jobclass_count = allow_select_jobclass_count;
    //职位类别名称目标元素的选择器
    window.target_jobclassin_names = target_jobclassin_names;
    //职位类别编号目标元素的选择器
    window.target_jobclassin_ids = target_jobclassin_ids;
    //职位类别名称目标元素的类型 html()、val()
    window.target_jobclassin_names_tagname = $(target_jobclassin_names)[0].nodeName;
    //职位类别编号目标元素的类型 html()、val()
    window.target_jobclassin_ids_tagname = $(target_jobclassin_ids)[0].nodeName;
    //弹出层的样式
    window.jobdiv_style = jobdiv_style;
    //选择确定后的回调函数
    window.index_jobclass_callback = index_jobclass_callback;
    //判断是否需要复选框checkbox，单选和没有子类的情况下需要复选框

    //计算职位类别级数
    var jobclass_deep = get_jobclass_deep();

    switch (jobclass_deep) {
        case 1:
            window.jobclass1_checkbox_type = 'checkbox';
            window.jobclass2_checkbox_type = 'hidden';
            window.jobclass3_checkbox_type = 'hidden';
            $('.yun_tck_con_list').hide();
            $('.yun_tck_con_list_jobclass1').show();
            break;
        case 2:
            window.jobclass1_checkbox_type = 'hidden';
            window.jobclass2_checkbox_type = 'checkbox';
            window.jobclass3_checkbox_type = 'hidden';
            $('.yun_tck_con_list').hide();
            $('.yun_tck_con_list_jobclass1').show();
            $('.yun_tck_con_list_jobclass2').show();
            break;
        case 3:
            window.jobclass1_checkbox_type = 'hidden';
            window.jobclass2_checkbox_type = 'hidden';
            window.jobclass3_checkbox_type = 'checkbox';
            $('.yun_tck_con_list_jobclass1').show();
            $('.yun_tck_con_list_jobclass2').show();
            $('.yun_tck_con_list_jobclass3').show();
            break;
        default: break;
    }
    //单选模式
    if (window.allow_select_jobclass_count == 1) {
        window.jobclass1_checkbox_type = 'hidden';
        window.jobclass2_checkbox_type = 'hidden';
        window.jobclass3_checkbox_type = 'hidden';
    }

    //$("#jobdiv").attr('style',$("#jobdiv").attr('style')+';'+window.jobdiv_style);
    var html = $("#jobdiv").html();
    if (html.replace(" ", "") == '') {
        var codeids_list = (codeids) ? codeids.split(',') : (new Array());
        var codeids_html = '';
        for (var i = 0; i < codeids_list.length; i++) {
            var codeid = codeids_list[i];
            var codename = jn[codeid];
            codeids_html += '<li codeid="' + codeid + '" codename="' + codename + '">' +
                '<a class="clean g3 selall" href="javascript:;">' +
                '<span class="text">' +
                codename +
                '</span>' +
                '<span class="delete">' +
                '移除' +
                '</span>' +
                '</a>' +
                '</li>';
        }
        var jobclass1_html = '';
        for (var i = 0; i < ji.length; i++) {
            var jobclassid1 = ji[i];
            jobclass1_html += '<li class="jobclassid1" codeid="' + jobclassid1 + '" codename="' + jn[jobclassid1] + '">' +
                '<labelabc for="jobclassid1_' + jn[jobclassid1] + '"><input type="' + window.jobclass1_checkbox_type + '" name="jobclassid1" class="jobclassid1_checkbox" id="jobclassid1_' + jn[jobclassid1] + '"/>' +
                jn[jobclassid1] +
                '</labelabc>' +
                '</li>';
        }
        html = '<div class="yun_tck">' +
            '<div class="yun_tck_box">' +
            '<div class="yun_tck_tit">' +
            '<span class="yun_tck_tit_span">' +
            '职位类别' +
            '</span>' +
            '<a href="javascript:;" class="yun_tck_tit_close">' +
            '关闭' +
            '</a>' +
            '</div>' +
            '<div class="yun_tck_title">' +
            '<div class="yun_tck_title_box">' +
            '<div class="yun_tck_tit_xz">' +
            '<span class="yun_tck_tit_xz_l">' +
            '已选择：' +
            '</span>' +
            '<span class="yun_tck_tit_xz_r">' +
            '(最多可以选择 ' + allow_select_jobclass_count + ' 项)' +
            '</span>' +
            '</div>' +
            '<div class="yun_tit_selected">' +
            '<ul class="selected clearfix">' +
            codeids_html +
            '</ul>' +
            '</div>' +
            '</div>' +
            '</div>' +
            '<div class="clear">' +
            '</div>' +
            '<div class="dropLst">' +
            '<div class="yun_tck_con">' +
            '<div class="yun_tck_con_list yun_tck_con_list_jobclass1">' +
            '<ul>' +
            jobclass1_html +
            '</ul>' +
            '</div>' +
            '<div class="yun_tck_con_list yun_tck_con_list_jobclass2">' +
            '<ul>' +
            '</ul>' +
            '</div>' +
            '<div class="yun_tck_con_list yun_tck_con_list_jobclass3">' +
            '<ul>' +
            '</ul>' +
            '</div>' +
            '<div class="clear">' +
            '</div>' +
            '</div>' +
            '</div>' +
            '</span>' +
            '</div>' +
            '<div class="clear">' +
            '</div>' +
            '<div class="actions">' +
            '<button class="button_a button_a_red" id="btnSubmitJobsort">' +
            '确定' +
            '</button>' +
            '<button class="button_a" id="cancel_btn">' +
            '取消' +
            '</button>' +
            '</div>' +
            '</div>';
        html += ' </tbody></table></div>';
        $("#jobdiv").html(html);
    } else {
        $("#jobdiv").html(html);
    }

    window.jobclass_layer = $.layer({
        type: 1,
        title: false,
        offset: ['100px', ($(window).width() - 620) / 2 + 'px'],
        closeBtn: [0, false],
        fix: false,
        border: [0, 0.3, '#000', true],
        move: false,
        area: ['620px', '440px'],
        page: { dom: '#jobdiv' }
    });
}


function get_jobclass_deep() {

    var jt_length = 0, ji_length = 0;
    for (var j = 0; j <= jt.length; j++) {
        if (jt[j]) {
            jt_length++;
        }
    }
    for (var j = 0; j <= ji.length; j++) {
        if (ji[j]) {
            ji_length++;
        }
    }
    if ((jt_length > 0) && (ji_length < jt_length)) {
        window.jobclass_deep = 3;
    } else if ((jt_length > 0) && (ji_length == jt_length)) {
        window.jobclass_deep = 2;
    } else {
        window.jobclass_deep = 1;
    }
    return window.jobclass_deep;
}


//选中职位类别项目
function jobclass_item_select(jobclass_id, jobclass_name, type, jobclass_element) {
    //单选模式
    if (window.allow_select_jobclass_count == 1) {
        $('#jobdiv .yun_tit_selected .selected').html('');
        $('#jobdiv .yun_tit_selected .selected').append('<li codeid="' + jobclass_id + '" codename="' + jobclass_name + '">' +
            '<a class="clean g3 selall" href="javascript:;">' +
            '<span class="text">' +
            jobclass_name +
            '</span>' +
            '<span class="delete">' +
            '移除' +
            '</span>' +
            '</a>' +
            '</li>');
        $(jobclass_element).addClass('selected').siblings().removeClass('selected');
        //confirm_selected_jobclass_items()
        //layer.close(window.jobclass_layer);
        //return;
    } else {
        var jobclass_items = $('#jobdiv .yun_tit_selected .selected li');
        //检查是否已经被选中
        for (var i = 0; i < jobclass_items.length; i++) {
            if ($(jobclass_items[i]).attr('codeid') == jobclass_id) {
                if ($(jobclass_items[i]).find('input').is(":hidden")) {
                    $('#jobdiv li[codeid=' + $(jobclass_items[i]).attr('codeid') + ']').removeClass('selected');
                    $(jobclass_element).find('input')[0].checked = false;
                    return false;
                } else {
                    $(jobclass_items[i]).find('.delete').click();
                    $('#jobdiv li[codeid=' + $(jobclass_items[i]).attr('codeid') + ']').removeClass('selected');
                    $(jobclass_element).find('input')[0].checked = false;
                    return false;
                }
            }
            //判断是否所选元素的子类
            if (typeof (jt[jobclass_id]) == 'object') {
                if (jt[jobclass_id].length > 0) {
                    for (var j = 0; j < jt[jobclass_id].length; j++) {
                        if (jt[jobclass_id][j] == $(jobclass_items[i]).attr('codeid')) {
                            $(jobclass_items[i]).find('.delete').click();
                            $('#jobdiv li[codeid=' + $(jobclass_items[i]).attr('codeid') + ']').removeClass('selected');
                        }
                    }
                }
            }
        }
        //检查家否超出限制
        if (jobclass_items.length >= parseInt(window.allow_select_jobclass_count)) {
            layer.msg('最多不能超过'+parseInt(window.allow_select_jobclass_count)+'个！', 2, 8);return false;
            $(jobclass_element).find('.delete').click();
            $('#jobdiv li[codeid=' + jobclass_id + ']').removeClass('selected');
            $('#jobdiv li[codeid=' + jobclass_id + ']').find('input')[0].checked = false;
            return false;
        }
        //$(jobclass_element).find('input')[0].checked = true;
        $('#jobdiv li[codeid=' + jobclass_id + ']').addClass('selected');
        $('#jobdiv .yun_tit_selected .selected').append('<li codeid="' + jobclass_id + '" codename="' + jobclass_name + '">' +
            '<a class="clean g3 selall" href="javascript:;">' +
            '<span class="text">' +
            jobclass_name +
            '</span>' +
            '<span class="delete">' +
            '移除' +
            '</span>' +
            '</a>' +
            '</li>');
    }
    return true;
}


//确认选中的职位类别项目
function confirm_selected_jobclass_items() {
    //检查属否已经被选中
    var jobclass_items = $('#jobdiv .yun_tit_selected .selected li');
    var jobclass_ids = '';
    var jobclass_names = '';
    for (var i = 0; i < jobclass_items.length; i++) {
        jobclass_ids += ',' + $(jobclass_items[i]).attr('codeid');
        jobclass_names += ',' + $(jobclass_items[i]).attr('codename');
    }
    //if(jobclass_names.length<=0){
    //    //layer.msg('请选择具体类别！', 2, 8);return false;
    //}else{
    //将已选中的职位类别项目，ids,names赋值到目标元素
    if (window.target_jobclassin_names_tagname == 'INPUT') {
        $(window.target_jobclassin_names).val(jobclass_names.substring(1));
        var addtype=$("#addtype").val();
        if(addtype=='addexpect'){
            $("#hidjob_class").attr("class","resume_tipok");
            $("#hidjob_class").html('');
        }
    } else {
        $(window.target_jobclassin_names).html(jobclass_names.substring(1));
    }
    if (window.target_jobclassin_ids_tagname == 'INPUT') {
        $(window.target_jobclassin_ids).val(jobclass_ids.substring(1));
    } else {
        $(window.target_jobclassin_ids).html(jobclass_ids.substring(1));
    }
    if (window.index_jobclass_callback) {
        window.index_jobclass_callback();
    }
    layer.close(window.jobclass_layer);

    // $.post(weburl+"/index.php?m=ajax&c=getcontent",{ids:jobclass_ids.substring(1)},function(data){
    //     if(data){
    //         var datas=data.split('@@@@');
    //         for(var i=0;i<datas.length;i++){
    //             var ndata=datas[i].split('###');
    //             $("#JobRequInfoTemplate").append("<a href=\"javascript:void(0)\" onclick=\"setexample('"+ndata[0]+"')\">"+ndata[1]+"</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;");
    //         }
    //         $(".Description").show();
    //     }
    // });
    return true;
    //}
}


function addsel(id, pid) {
    //判断数量
    var i = 0;
    $(".selall").each(function () {
        i++;
    });
    if (parseInt(pid) > 0) {
        if (i > 5) {
            unsel(id, pid);
            layer.msg('您最多只能选择五项！', 2, 8);
            return false;
        } else {
            var name = $('#job_class_' + id).attr('data-name');
            html = '<li class="job_class_' + id + ' parent_' + pid + '"><a class="clean g3 selall" href="javascript:void(0);" data-val="' + id + '+' + name + '"><span class="text">' + name + '</span><span class="delete" data-id="' + id + '" data-pid ="' + pid + '">移除</span></a></li>';
            $('.job_class_' + id).remove();
            $('.selected').first().append(html);
        }
    } else {
        if (i > 4) {
            unsel(id);
            layer.msg('您最多只能选择五项！', 2, 8);
            return false;
        } else {
            var name = $('#all' + id).attr('data-name');
            html = '<li class="all' + id + '"><a class="clean g3 selall" href="javascript:void(0);"  data-val="' + id + '+' + name + '"><span class="text">' + name + '</span><span class="delete" data-id="' + id + '">移除</span></a></li>';
            $('.parent_' + id).remove();
            $('.all' + id).remove();
            $('.selected').first().append(html);
        }
    }
}
function unsel(id, pid) {
    if (parseInt(pid) > 0) {
        $('.job_class_' + id).remove();
        $('#job_class_' + id).removeAttr("checked", "");
    } else {
        $('.all' + id).remove();
        $('#all' + id).removeAttr("checked", "");
        $('.labelabc' + id).removeAttr("disabled");
        $('.labelabc' + id).removeAttr("checked");
    }
}

$('#jobdiv').delegate('#btnSubmitCitysort', 'click', function () {
    confirm_selected_cityclass_items();
});

$('#jobdiv').delegate('.yun_tck_con_list_jobclass1 ul .jobclassid1', 'click', function () {
    if (window.jobclass1_checkbox_type == 'hidden') {
        $(this).addClass('selected').siblings().removeClass('selected');
    }
    var jobclassid1 = $(this).attr('codeid');
    var jobclassid2_html = '';
    if (typeof (jt[jobclassid1]) == 'object') {
        if (jt[jobclassid1].length <= 0) {
            //没有子类别，选中当前节点
            jobclass_item_select($(this).attr('codeid'), $(this).attr('codename'), 1, $(this));
        } else {
            //存在子类别，加载子类列表
            //全选
            if (window.jobclass2_checkbox_type != 'hidden') {
                jobclassid2_html += '<li class="jobclassid2_all jobclassid2" codeid="' + jobclassid1 + '" codename="' + jn[jobclassid1] + '">' +
                    '<labelabc for="jobclassid2_all_' + jn[jobclassid1] + '"><input type="' + window.jobclass2_checkbox_type + '" name="jobclassid2_all" class="jobclassid2_all_checkbox" id="jobclassid2_all_' + jn[jobclassid1] + '"/>全部(' +
                    jn[jobclassid1] +
                    ')</labelabc>' +
                    '</li>';
            }
            for (var j = 0; j < jt[jobclassid1].length; j++) {
                var jobclassid2 = jt[jobclassid1][j];
                jobclassid2_html += '<li class="jobclassid2" codeid="' + jobclassid2 + '" codename="' + jn[jobclassid2] + '">' +
                    '<labelabc for="jobclassid2_' + jn[jobclassid2] + '"><input type="' + window.jobclass2_checkbox_type + '" name="jobclassid2" class="jobclassid2_checkbox" id="jobclassid2_' + jn[jobclassid2] + '"/>' +
                    jn[jobclassid2] +
                    '</labelabc>' +
                    '</li>';
            }
        }
    } else {
        //没有子类别，选中当前节点
        jobclass_item_select($(this).attr('codeid'), $(this).attr('codename'), 1, $(this));
    }
    if (jobclassid2_html != '') {
        $('.yun_tck_con_list_jobclass3 li').remove();
        $('.yun_tck_con_list_jobclass2').show();
        $('.yun_tck_con_list_jobclass2 ul').html(jobclassid2_html);
    }
});
$('#jobdiv').delegate('.yun_tck_con_list_jobclass2 ul .jobclassid2', 'click', function () {
    if (window.jobclass2_checkbox_type == 'hidden') {
        $(this).addClass('selected').siblings().removeClass('selected');
    }
    var jobclassid2 = $(this).attr('codeid');
    var jobclassid3_html = '';
    if ((typeof (jt[jobclassid2]) == 'object') && (!$(this).hasClass('jobclassid2_all'))) {
        if (jt[jobclassid2].length <= 0) {
            //没有子类别，选中当前节点
            var checked_all = jobclass_item_select($(this).attr('codeid'), $(this).attr('codename'), 1, $(this));
            if ($(this).hasClass('jobclassid2_all')) {
                //判断是否全选项目
                if (checked_all) {
                    $(this).addClass('selected').siblings().removeClass('selected');
                } else {
                    $(this).removeClass('selected').siblings().removeClass('selected');
                }
                $(this).siblings().each(function () { $(this).find('input')[0].checked = checked_all; if (checked_all) { $(this).find('input').attr('disabled', 'disabled'); } else { $(this).find('input').removeAttr('disabled'); } });
            }
        } else {
            //存在子类别，加载子类列表
            if (window.jobclass3_checkbox_type != 'hidden') {
                jobclassid3_html += '<li class="jobclassid3_all jobclassid3" codeid="' + jobclassid2 + '" codename="' + jn[jobclassid2] + '">' +
                    '<labelabc for="jobclassid3_all_' + jn[jobclassid2] + '">全部(' +
                    jn[jobclassid2] +
                    ')</labelabc>' +
                    '</li>';
            }
            for (var j = 0; j < jt[jobclassid2].length; j++) {
                var jobclassid3 = jt[jobclassid2][j];
                jobclassid3_html += '<li class="jobclassid3" codeid="' + jobclassid3 + '" codename="' + jn[jobclassid3] + '">' +
                    '<labelabc for="jobclassid3_' + jn[jobclassid3] + '">' +
                    jn[jobclassid3] +
                    '</labelabc>' +
                    '</li>';
            }
        }
    } else {
        //没有子类别，选中当前节点
        var checked_all = jobclass_item_select($(this).attr('codeid'), $(this).attr('codename'), 1, $(this));
        if ($(this).hasClass('jobclassid2_all')) {
            //判断是否全选项目
            if (checked_all) {
                $(this).addClass('selected').siblings().removeClass('selected');
            } else {
                $(this).removeClass('selected').siblings().removeClass('selected');
            }
            $(this).siblings().each(function () { $(this).find('input')[0].checked = checked_all; if (checked_all) { $(this).find('input').attr('disabled', 'disabled'); } else { $(this).find('input').removeAttr('disabled'); } });
        }
    }
    if (jobclassid3_html != '') {
        $('.yun_tck_con_list_jobclass3').show();
        $('.yun_tck_con_list_jobclass3 ul').html(jobclassid3_html);
    }
});
$('#jobdiv').delegate('.yun_tck_con_list_jobclass3 ul .jobclassid3', 'click', function () {
    //没有子类别，选中当前节点
    if ($(this).siblings('.jobclassid3_all').length > 0) {
        if ($(this).siblings('.jobclassid3_all').hasClass('selected')) {
            return;
        }
    }
    var checked_all = jobclass_item_select($(this).attr('codeid'), $(this).attr('codename'), 1, $(this));
    if ($(this).hasClass('jobclassid3_all')) {
        //判断是否全选项目
        if (checked_all) {
            $(this).addClass('selected').siblings().removeClass('selected');
        } else {
            $(this).removeClass('selected').siblings().removeClass('selected');
        }
        $(this).siblings().each(function () { $(this).find('input')[0].checked = checked_all; if (checked_all) { $(this).find('input').attr('disabled', 'disabled'); } else { $(this).find('input').removeAttr('disabled'); } });
    }
});
$('#jobdiv').delegate('.yun_tit_selected .selected .delete', 'click', function () {
    var codeid = $(this).parent().parent().attr('codeid');
    $('#jobdiv li[codeid=' + codeid + ']').removeClass('selected');
    //$('#jobdiv li[codeid='+codeid+']').find('input')[0].checked=false;
    $(this).parent().parent().remove();
});
$('#jobdiv').delegate('.yun_tck_tit_close,#cancel_btn', 'click', function () {
    layer.close(window.jobclass_layer);
});
$('#jobdiv').delegate('#btnSubmitJobsort', 'click', function () {
    confirm_selected_jobclass_items();
});
$('#jobdiv').delegate('#jobclassification', 'input', function () {
    var jobclassification=$(this).val();
    if(!jobclassification){
        $(".jobclassificationtips").html("");
        return false;
    }
    $('.jobclassificationtips').show();
    var jobclassifications=new Array();
    var jobclassificationcontents="";
    for (var i in alljobclassid3){
        if(alljobclassid3[i][0].indexOf(jobclassification)>=0){
            if(jobclassifications.length<5){
                jobclassifications.push(alljobclassid3[i])
            }else{
                break;
            }
        }
    }
    for(var i in jobclassifications){
        jobclassificationcontents+='<span codeid="'+jobclassifications[i][1]+'"  >'+jobclassifications[i][0]+'</span>';
    }
    $(".jobclassificationtips").html(jobclassificationcontents)
});






