let cus_id = window.location.href.match(/&cus_id=(\S*)&/)[1];
let id = window.location.href.match(/&id=(\S*)/)[1];
$.ajax({
    url: '/index.php?m=customermanage&a=customerInfo',
    data: {
        customer_id: cus_id
    },
    success(res) {
        if (res.code == 200) {
            $('.ti1 span:nth-child(1)').html(res.info.info.customer_name);
            $('.rank span:nth-child(2)').html(res.info.info.rank);
            $('.keli span:nth-child(2)').html(res.info.info.contacts);
            $('.tel span:nth-child(2)').html(res.info.info.contacts_phone);
            $('.kewei span:nth-child(2)').html(res.info.info.customer_owner_name);
            $('.create_time span:nth-child(2)').html(res.info.info.create_time);
            $('.much span:nth-child(2)').html(res.info.info.visit_times);
            $('.last_time span:nth-child(2)').html(res.info.info.last_visit_time);
            $('.gai span:nth-child(2)').html(res.info.info.seal_company);
            $('.qina span:nth-child(2)').html(res.info.info.signer);
            $('.start_time span:nth-child(2)').html(res.info.info.contract_start_time);
            $('.end_time span:nth-child(2)').html(res.info.info.contract_end_time);
            $('.hui span:nth-child(2)').html(res.info.info.invoice_time);
            if (res.info.info.visit_log.length == 0) {
                $('.record_wrap').css('display','none');
                $('.ti3').css('display','none');
            } else {
                let year = res.info.info.visit_log[0].add_time.substr(0, 4);
                $('.record_sec').append(`<span class='year'>${year}年</span>`)
                res.info.info.visit_log.map(val => {
                    if (year != val.add_time.substr(0, 4)) {
                        year = val.add_time.substr(0, 4);
                        $('.record_sec').append(`<span class='year'>${year}年</span>`)
                    }
                    create_record(val);
                })
                $('.line').height($('.record_sec').height()-20);
            }

            let doc = '';
            if(res.info.info.businessList.length==0){
                doc='<tr><td colume="10">暂无数据</td></tr>'
            }else{
                res.info.info.businessList.map(val => {
                    doc += `<tr>
                                <td>${val.name}</td>
                                <td>${val.pro_type}</td>
                                <td>${val.p_department}</td>
                                <td>${val.department}</td>
                                <td>${val.owner_list}</td>
                                <td>${val.status}</td>
                                <td>${val.update_time}</td>
                                <td>${val.interview_time}</td>
                                <td>${val.offer_time}</td>
                                <td>${val.enter_time}</td>
                            </tr>`
                })
            }
            $('tbody').html(doc)
        }
    }
})

function num2str(num) {
    if (num == 5) {
        return '非常满意'
    } else if (num == 4) {
        return '满意'
    } else if (num == 3) {
        return '基本满意'
    } else if (num == 2) {
        return '不太满意'
    } else if (num == 1) {
        return '不满意'
    } else {
        return '无'
    }
}

function create_record(val) {
    if (val.nest_visit == 1) {
        if (val.pro_type == 1) {
            $('.record_sec').append(`<div class='record_box'>
            <p>用户<span>【${val.create_role}】</span>添加了回访备注</p>
            <p>电话结果：${val.call_status}</p>
            <p>是否继续跟进：${val.is_follow==1?'是':'否'}</p>
            <p>服务态度：${num2str(val.service_degree)}</p>
            <p>反馈速度：${num2str(val.feedback_degree)}</p>
            <p>简历数是否足够：${val.is_resume_enough==1?'是':'否'}</p>
            <p>推荐质量：${num2str(val.recommends_degree)}</p>
            <p>是否有商机：${val.is_business==1?'是':'否'}，备注内容：${val.business_note}</p>
            <p>下次是否回访：${val.nest_visit==1?'是':'否'}</p>
            <p>是否完成回访：${val.is_finish==1?'是':'否'}</p>
            <p style='display:none'>录音：${val.is_business==1?'是':'否'}</p>
            <span class='record_time'>
            <span>${val.add_time.substr(10,6)}</span><br/>
                <span>${val.add_time.substr(5,5)}</span>
            </span>
            <span class='point'>·</span>
        </div>`)
        } else if (val.protype == 2) {
            $('.record_sec').append(`<div class='record_box'>
            <p>用户<span>【${val.create_role}】</span>添加了回访备注</p>
            <p>电话结果：${val.call_status}</p>
            <p>是否继续跟进：${val.is_follow==1?'是':'否'}</p>
            <p>人员入职情况：${num2str(val.service_degree)}</p>
            <p>整体满意度：${num2str(val.degree)}</p>
            <p>反馈速度：${num2str(val.feedback_degree)}</p>
            <p>推荐数量：${num2str(val.recommends_degree)}</p>
            <p>推荐质量：${num2str(val.quality_degree)}</p>
            <p>是否有商机：${val.is_business==1?'是':'否'}，备注内容：${val.business_note}</p>
            <p>下次是否回访：${val.nest_visit==1?'是':'否'}</p>
            <p>是否完成回访：${val.is_finish==1?'是':'否'}</p>
            <p style='display:none'>录音：${val.is_business==1?'是':'否'}</p>
            <span class='record_time'>
            <span>${val.add_time.substr(10,6)}</span><br/>
                <span>${val.add_time.substr(5,5)}</span>
            </span>
            <span class='point'>·</span>
        </div>`)
        } else {
            $('.record_sec').append(`<div class='record_box'>
            <p>用户<span>【${val.create_role}】</span>添加了回访备注</p>
            <p>电话结果：${val.call_status}</p>
            <p>是否继续跟进：${val.is_follow==1?'是':'否'}</p>
            <p>是否及时联系对接：${val.is_in_time==1?'是':'否'}</p>
            <p>岗位理解：${val.is_understand==1?'是':'否'}</p>
            <p>是否推荐：${val.is_recommend==1?'是':'否'}</p>
            <p>推荐匹配度：${num2str(val.matching_degree)}</p>
            <p>是否有商机：${val.is_business==1?'是':'否'}，备注内容：${val.business_note}</p>
            <p>下次是否回访：${val.nest_visit==1?'是':'否'}</p>
            <p>是否完成回访：${val.is_finish==1?'是':'否'}</p>
            <p style='display:none'>录音：${val.is_business==1?'是':'否'}</p>
            <span class='record_time'>
            <span>${val.add_time.substr(10,6)}</span><br/>
                <span>${val.add_time.substr(5,5)}</span>
            </span>
            <span class='point'>·</span>
        </div>`)
        }
    } else {
        $('.record_sec').append(`<div class='record_box' style='margin:20px 0'>
            <p>用户<span>【${val.create_role}】</span>将客户标记为不回访</p>
            <span class='record_time'>
            <span>${val.add_time.substr(10,6)}</span><br/>
                <span>${val.add_time.substr(5,5)}</span>
            </span>
            <span class='point'>·</span>
        </div>`)
    }
}
$('.cannal').click(ev => {
    $('.dialog').css('display', 'none')
    $('.radio_box input[type=radio]').attr('checked', false);
    $('#visit_type').val('1');
    $('#next_time').val('');
    $('#business2').click();
    $('#break').click();
    $('.visit_dialog textarea').val('');
})
$('.dialog img').click(ev => {
    $('.dialog').css('display', 'none')
    $('.radio_box input[type=radio]').attr('checked', false);
    $('#visit_type').val('1');
    $('#next_time').val('');
    $('#business2').click();
    $('#break').click();
    $('.visit_dialog textarea').val('');
})
$('.ti1 span:nth-child(3)').click(ev => {
    $.ajax({
        url: '/index.php?m=customermanage&a=getCustomerUsers',
        data: {
            customer_id: cus_id
        },
        success(res) {
            if (res.code == 200) {
                $('#advicer').empty();
                res.info.list.map(val => {
                    $('#advicer').append(`<option value='${val.id}'>${val.name}</option>`);
                })
                $('.visit_dialog').css('display', 'block');
                $('.visit_dialog .submit').attr('sub_id', id);
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
})
$('#visit_type').change(ev => {
    let str = $(ev.target).val();
    if (str == 1) {
        $('.mi_box').css('display', 'block');
        $('.ru_box').css('display', 'none');
        $('.zh_box').css('display', 'none');
        $('.visit_dialog input[type=radio]').attr('checked', false);
    } else if (str == 2) {
        $('.mi_box').css('display', 'none');
        $('.ru_box').css('display', 'block');
        $('.zh_box').css('display', 'none');
        $('.visit_dialog input[type=radio]').attr('checked', false);
    } else if (str == 3) {
        $('.mi_box').css('display', 'none');
        $('.ru_box').css('display', 'none');
        $('.zh_box').css('display', 'block');
        $('.visit_dialog input[type=radio]').attr('checked', false);

    }
    $('#business2').click();
    $('#break').click();
})
$('.visit_dialog .submit').click(ev => {
    let temp = $('#visit_type').val();
    let speed = '';
    let quality = '';
    if ($('input[name=complate]:checked').val() == 1) {
        if ($('input[name=is_continue]:checked').val() == 1 && $('#next_time').val() == '') {
            swal('请填写完整', '', 'warning')
            return
        }
        if ($('input[name=business]:checked').val() == 1 && $('#advicer_area').val() == '') {
            swal('请填写完整', '', 'warning')
            return
        }
        if (
            $('input[name=visit]:checked').length == 0
        ) {
            swal('请填写完整', '', 'warning')
            return
        }
        if (temp == 1) {
            if ($('input[name=serve]:checked').length == 0 ||
                $('input[name=callback]:checked').length == 0 ||
                $('input[name=quality]:checked').length == 0) {
                swal('请填写完整', '', 'warning')
                return
            }
            speed = $('input[name=callback]:checked').val();
            quality = $('input[name=quality]:checked').val();

        } else if (temp == 2) {
            if ($('input[name=ruq]:checked').length == 0 ||
                $('input[name=ruma]:checked').length == 0 ||
                $('input[name=rufk]:checked').length == 0 ||
                $('input[name=rutj]:checked').length == 0 ||
                $('input[name=rutz]:checked').length == 0) {
                swal('请填写完整', '', 'warning')
                return
            }
            speed = $('input[name=rufk]:checked').val();
            quality = $('input[name=rutz]:checked').val();


        } else if (temp == 3) {
            if ($('input[name=zhd]:checked').length == 0 ||
                $('input[name=zhg]:checked').length == 0 ||
                $('input[name=zhtj]:checked').length == 0 ||
                $('input[name=zhtp]:checked').length == 0) {
                swal('请填写完整', '', 'warning')
                return
            }
        }
    } else if ($('input[name=complate]:checked').length == 0) {
        swal('请填写完整', '', 'warning')
        return
    }
    $.ajax({
        url: '/index.php?m=customermanage&a=visitRemark',
        type: 'post',
        data: {
            call_status: $('.claa_result').attr('chiose') ? $('.claa_result').attr('chiose') : '1',
            pro_type: $('#visit_type').val(),
            enter_degree: $('input[name=ruq]:checked').val(),
            is_follow: $('input[name=is_continue]:checked').val(),
            is_finish: $('input[name=complate]:checked').val(),
            is_business: $('input[name=business]:checked').val(),
            nest_visit: $('input[name=visit]:checked').val(),
            visit_id: $('.visit_dialog .submit').attr('sub_id'),
            follow_time: $('#next_time').val(),
            is_understand: $('input[name=zhg]:checked').val(),
            is_in_time: $('input[name=zhd]:checked').val(),
            is_recommend: $('input[name=zhtj]:checked').val(),
            matching_degree: $('input[name=zhtp]:checked').val(),
            service_degree: $('input[name=serve]:checked').val(),
            feedback_degree: speed,
            quality_degree: quality,
            degree: $('input[name=ruma]:checked').val(),
            recommends_degree: $('input[name=rutj]:checked').val(),
            is_resume_enough: $('input[name=mij]:checked').val(),
            message_role: $('#advicer').val(),
            business_note: $('#advicer_area').val(),
            visit_note: $('#visit_area').val()
        },
        success(res) {
            if (res.code == 200) {
                swal('操作成功', '', 'success')
                $('.visit_dialog').css('display', 'none')
                location.reload()
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
})
$('#continue').click(ev => {
    $('#next_time').css('display', 'inline-block');
})
$('#break').click(ev => {
    $('#next_time').css('display', 'none');
    $('#next_time').val('');
})
$('#business1').click(ev => {
    $('.business_box p:not(:nth-child(1))').css('display', 'block');
})
$('#business2').click(ev => {
    $('.business_box p:not(:nth-child(1))').css('display', 'none');
    $('.business_box textarea').val('');

})
$('.claa_result span:not(:nth-child(1))').click(ev => {
    $('.claa_result span').removeClass('choosed');
    $(ev.target).addClass('choosed');
    let str = $(ev.target).html().trim();
    switch (str) {
        case '接通电话':
            $('.claa_result').attr('chiose', '1');
            break
        case '电话未接听':
            $('.claa_result').attr('chiose', '2');
            break
        case '无效电话':
            $('.claa_result').attr('chiose', '3');
            break
        case '电话忙':
            $('.claa_result').attr('chiose', '4');
            break
    }
})