if (sessionStorage.visit_Tab) {
    let sym = sessionStorage.visit_Tab - 0 + 1;
    $('.switchBox span').removeClass('choosed');
    $(`.switchBox span:nth-child(${sym})`).addClass('choosed');
}
$('.switchBox span').click(ev => {
    $('.switchBox span').removeClass('choosed');
    $(ev.target).addClass('choosed');
    getData()
    let sym = $('.switchBox .choosed').html().trim();
    if (sym == '待回访') sym = 0;
    else if (sym == '回访记录') sym = 1;
    else sym = 2;
    sessionStorage.visit_Tab = sym;
})
var current_page = 1;
var total_page = 1;

function getData(is_export) {
    let sym = $('.switchBox .choosed').html().trim();
    if (sym == '待回访') sym = 0;
    else if (sym == '回访记录') sym = 1;
    else {
        sym = 2;
        $('thead').css('display', 'none');
        if ($('#type option').length != 3)
            $('#type').html(`
            <option value="1">面试快</option>
            <option value="2">入职快</option>
            <option value="3">专业猎头</option>`);
        $.ajax({
            url: '/index.php?m=customermanage&a=logs',
            type: 'post',
            data: {
                page: current_page,
                page_size: $('#pageSize').val(),
                start_time: $('#start').val(),
                end_time: $('#end').val(),
                department_id: $('#department').val(),
                pro_type: $('#type').val(),
                search: $('#search').val(),
                is_export,
            },
            success(res) {
                if (res.code == 200) {
                    let doc = '';
                    if (!res.info.list) {
                        res.info.list = [];
                    }
                    if ($('#type').val() == 3) {
                        $('.he4').css('display', 'table');
                        res.info.list.map((val, index) => {
                            doc += `<tr>
                                <td>${val.p_department_name}</td>
                                <td>${val.pro_type}</td>
                                <td>${val.raw_data}</td>
                                <td>${val.can_visit}</td>
                                <td>${val.visit_success}</td>
                                <td>${val.in_time}</td>
                                <td>${val.not_in_time}</td>
                                <td>${val.understand}</td>
                                <td>${val.not_understand}</td>
                                <td>${val.recommend}</td>
                                <td>${val.not_recommend}</td>
                                <td>${val.quality_very_satisfied}</td>
                                <td>${val.quality_satisfaction}</td>
                                <td>${val.quality_general}</td>
                                <td>${val.quality_dissatisfied}</td>
                                <td>${val.quality_very_dissatisfied}</td>
                                <td>${val.business}</td>
                            </tr>`
                        })
                    } else if ($('#type').val() == 2) {
                        $('.he3').css('display', 'table');
                        res.info.list.map((val, index) => {
                            doc += `<tr>
                                <td>${val.p_department_name}</td>
                                <td>${val.pro_type}</td>
                                <td>${val.raw_data}</td>
                                <td>${val.can_visit}</td>
                                <td>${val.visit_success}</td>
                                <td>${val.enter_very_satisfied}</td>
                                <td>${val.enter_satisfaction}</td>
                                <td>${val.enter_general}</td>
                                <td>${val.enter_dissatisfied}</td>
                                <td>${val.enter_very_dissatisfied}</td>
                                <td>${val.very_satisfied}</td>
                                <td>${val.satisfaction}</td>
                                <td>${val.general}</td>
                                <td>${val.dissatisfied}</td>
                                <td>${val.very_dissatisfied}</td>
                                <td>${val.feedback_very_satisfied}</td>
                                <td>${val.feedbac_satisfaction}</td>
                                <td>${val.feedbac_general}</td>
                                <td>${val.feedbac_dissatisfied}</td>
                                <td>${val.feedbac_very_dissatisfied}</td>
                                <td>${val.recommends_very_satisfied}</td>
                                <td>${val.recommends_satisfaction}</td>
                                <td>${val.recommends_general}</td>
                                <td>${val.recommends_dissatisfied}</td>
                                <td>${val.recommends_very_dissatisfied}</td>
                                <td>${val.quality_very_satisfied}</td>
                                <td>${val.quality_satisfaction}</td>
                                <td>${val.quality_general}</td>
                                <td>${val.quality_dissatisfied}</td>
                                <td>${val.quality_very_dissatisfied}</td>
                            </tr>`
                        })
                    } else {
                        $('.he2').css('display', 'table');
                        res.info.list.map((val, index) => {
                            doc += `<tr>
                                <td>${val.p_department_name}</td>
                                <td>${val.pro_type}</td>
                                <td>${val.raw_data}</td>
                                <td>${val.can_visit}</td>
                                <td>${val.visit_success}</td>
                                <td>${val.service_very_satisfied}</td>
                                <td>${val.service_satisfaction}</td>
                                <td>${val.service_general}</td>
                                <td>${val.service_dissatisfied}</td>
                                <td>${val.service_very_dissatisfied}</td>
                                <td>${val.feedback_very_satisfied}</td>
                                <td>${val.feedbac_satisfaction}</td>
                                <td>${val.feedbac_general}</td>
                                <td>${val.feedbac_dissatisfied}</td>
                                <td>${val.feedbac_very_dissatisfied}</td>
                                <td>${val.resume_enough}</td>
                                <td>${val.resume_not_enough}</td>
                                <td>${val.quality_very_satisfied}</td>
                                <td>${val.quality_satisfaction}</td>
                                <td>${val.quality_general}</td>
                                <td>${val.quality_dissatisfied}</td>
                                <td>${val.quality_very_dissatisfied}</td>
                                <td>${val.Information_error}</td>
                                <td>${val.business}</td>
                            </tr>`
                        })
                    }
                    $('table tbody').empty();
                    $('table tbody').append(doc);
                    let totalPage = Math.ceil(res.info.counts / $('#pageSize').val());
                    totalPage_ = totalPage;
                    let page = '<span class="last">«</span>';
                    if (totalPage >= 3) {
                        if (res.info.current_page != 1 && res.info.current_page != totalPage) {
                            for (let i = 0; i < 3; i++) {
                                page += `<span class="page${i==1?' choosed':''}">${res.info.current_page-1+i}</span>`
                            }
                        } else if (res.info.current_page == 1) {
                            for (let i = 0; i < 3; i++) {
                                page += `<span class="page${i==0?' choosed':''}">${res.info.current_page-0+i}</span>`
                            }
                        } else if (res.info.current_page == totalPage) {
                            for (let i = 0; i < 3; i++) {
                                page += `<span class="page${i==2?' choosed':''}">${res.info.current_page-2+i}</span>`
                            }
                        }
                    } else if (totalPage < 3) {
                        for (let i = 0; i < totalPage; i++) {
                            page += `<span class="page${i+1==res.info.current_page?' choosed':''}">${i+1}</span>`
                        }
                    }
                    page += '<span class="next">»</span>';
                    $('.pageBox').empty();
                    $('.pageBox').append(page);
                    $('.totalPage').html(`共${res.info.counts}条&nbsp;第${res.info.current_page}/${totalPage}页`)
                    current_page = res.info.current_page;
                    $('.page').click(ev => {
                        current_page = $(ev.target).html().trim() - 0;
                        getData();
                    })
                    $('.last').click(ev => {
                        if (current_page == 1) return;
                        current_page--;
                        getData();
                    })
                    $('.next').click(ev => {
                        if (current_page == totalPage) return;
                        current_page++;
                        getData();
                    })
                }
            }
        })
        return;
    };
    $('thead').css('display', 'none');
    $('.he1').css('display', 'table');
    if ($('#type option').length != 8)
        $('#type').html(`<option value="">所有类型</option>
        <option value="1">线上面试快</option>
        <option value="2">线上入职快</option>
        <option value="3">线上专业猎头</option>
        <option value="4">线下慧沟通</option>
        <option value="5">线下慧面试</option>
        <option value="6">线下慧入职</option>
        <option value="7">线下专业猎头</option>`);
    $.ajax({
        url: '/index.php?m=customermanage&a=visitList',
        type: 'post',
        data: {
            visit_status: sym,
            page: current_page,
            page_size: $('#pageSize').val(),
            start_time: $('#start').val(),
            end_time: $('#end').val(),
            department_id: $('#department').val(),
            pro_type: $('#type').val(),
            search: $('#search').val(),
            is_phone: $('#phone_num').val(),
            is_business: sym == 1 ? $('#business').val() : '',
            is_export,
        },
        success(res) {
            if (res.code == 200) {
                let doc = '';
                if (!res.info.list) {
                    res.info.list = [];
                }
                if (sym == 0) {
                    res.info.list.map((val, index) => {
                        doc += `<tr>
                            <td>${val.pro_type}</td>
                            <td>${val.p_department_name}</td>
                            <td>${val.department_name}</td>
                            <td>${val.signer}</td>
                            <td><a href='/index.php?m=customer&a=view&id=${val.customer_id}content=1'>${val.customer_name}</a></td>
                            <td>${val.contact_name}</td>
                            <td>${val.phone}</td>
                            <td>${val.industry}</td>
                            <td>${val.city}</td>
                            <td>${val.last_visit_time}</td>
                            <td>${val.add_time}</td>
                            <td><span class='visit' cus_id='${val.id}' cus_name='${val.customer_name}' cus_id_='${val.customer_id}'>回访</span><span class='visitless' cus_id='${val.id}' cus_name='${val.customer_name}'>不回访</span></td>
                        </tr>`
                    })
                    $('th:nth-last-child(3)').css('display', 'block');
                    $('th:nth-last-child(2)').css('display', 'none');
                } else if (sym == 1) {
                    res.info.list.map((val, index) => {
                        doc += `<tr>
                            <td>${val.pro_type}</td>
                            <td>${val.p_department_name}</td>
                            <td>${val.department_name}</td>
                            <td>${val.signer}</td>
                            <td><a href='/index.php?m=customer&a=view&id=${val.customer_id}content=1'>${val.customer_name}</a></td>
                            <td>${val.contact_name}</td>
                            <td>${val.phone}</td>
                            <td>${val.industry}</td>
                            <td>${val.city}</td>
                            <td>${val.last_visit_time}</td>
                            <td>${val.is_business==1?'有<img class="canbusi" cus_id="'+val.id+'" cus_name="'+val.customer_name+'" src="Public/img/customerManage/cancel.png"/>':'无'}</td>
                            <td>
                                <i class="fa fa-play-circle" aria-hidden="true"></i>
                                <span class='notice_msg' cus_id='${val.id}' cus_name='${val.customer_name}' cus_id_='${val.customer_id}'>备注信息</span>
                            </td>
                        </tr>`
                    })
                    $('th:nth-last-child(3)').css('display', 'none');
                    $('th:nth-last-child(2)').css('display', 'block');
                }
                $('table tbody').empty();
                $('table tbody').append(doc);
                bindvisit();
                let totalPage = Math.ceil(res.info.counts / $('#pageSize').val());
                totalPage_ = totalPage;
                let page = '<span class="last">«</span>';
                if (totalPage >= 3) {
                    if (res.info.current_page != 1 && res.info.current_page != totalPage) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${i==1?' choosed':''}">${res.info.current_page-1+i}</span>`
                        }
                    } else if (res.info.current_page == 1) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${i==0?' choosed':''}">${res.info.current_page-0+i}</span>`
                        }
                    } else if (res.info.current_page == totalPage) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${i==2?' choosed':''}">${res.info.current_page-2+i}</span>`
                        }
                    }
                } else if (totalPage < 3) {
                    for (let i = 0; i < totalPage; i++) {
                        page += `<span class="page${i+1==res.info.current_page?' choosed':''}">${i+1}</span>`
                    }
                }
                page += '<span class="next">»</span>';
                $('.pageBox').empty();
                $('.pageBox').append(page);
                $('.totalPage').html(`共${res.info.counts}条&nbsp;第${res.info.current_page}/${totalPage}页`)
                current_page = res.info.current_page;
                $('.page').click(ev => {
                    current_page = $(ev.target).html().trim() - 0;
                    getData();
                })
                $('.last').click(ev => {
                    if (current_page == 1) return;
                    current_page--;
                    getData();
                })
                $('.next').click(ev => {
                    if (current_page == totalPage) return;
                    current_page++;
                    getData();
                })
            }
        }
    })
}

function getDepartment() {
    $.ajax({
        url: '/index.php?m=user&a=departmentList',
        success(res) {
            if (res.code == 200) {
                res.info.map(val => {
                    $('#department').append(
                        `<option value='${val.department_id}'>${val.name}</option>`)
                })
            }
        }
    })
}

function bindvisit() {
    $('.visit').click(ev => {
        let id = ev.target.attributes[1].value;
        let name = ev.target.attributes[2].value;
        let cus_id = ev.target.attributes[3].value;
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
    $('.visitless').click(ev => {
        let id = ev.target.attributes[1].value;
        let name = ev.target.attributes[2].value;
        $('.visitless_notice').html(`${name}客户确认不用回访了吗`);
        $('.visitless_dialog').css('display', 'block');
        $('.visitless_notice').attr('cus_id', id);
    })
    $('.canbusi').click(ev => {
        let id = ev.target.attributes[1].value;
        let name = ev.target.attributes[2].value;
        $('.canbusi_notice').html(`确定取消${name}的商机标记吗？`);
        $('.canbusi_dialog').css('display', 'block');
        $('.canbusi_notice').attr('cus_id', id);
    })
    $('.notice_msg').click(ev => {
        let id = ev.target.attributes[1].value;
        let name = ev.target.attributes[2].value;
        let cus_id = ev.target.attributes[3].value;
        $('.record_dialog').css('display', 'block');
        $('.record_dialog .submit').attr('id_', id).attr('name_', name).attr('cus_id', cus_id);
        $.ajax({
            url: '/index.php?m=customermanage&a=customerInfo',
            data: {
                customer_id: cus_id
            },
            type: 'post',
            success(res) {
                $('.record_box').remove();
                if (res.code == 200) {
                    let year = res.info.info.visit_log[0].add_time.substr(0, 4);
                    $('.record_sec').append(`<span class='year'>${year}年</span>`)
                    res.info.info.visit_log.map(val => {
                        if (year != val.add_time.substr(0, 4)) {
                            year = val.add_time.substr(0, 4);
                            $('.record_sec').append(`<span class='year'>${year}年</span>`)
                        }
                        create_record(val);
                    })
                    $('.line').height($('.record_sec').height());
                }
            }
        })
    })
}

function datepicker(ev) {
    getData()
}

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
    }
}

function create_record(val) {
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
            <p>录音：${val.is_business==1?'是':'否'}</p>
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
            <p>录音：${val.is_business==1?'是':'否'}</p>
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
            <p>录音：${val.is_business==1?'是':'否'}</p>
            <span class='record_time'>
            <span>${val.add_time.substr(10,6)}</span><br/>
                <span>${val.add_time.substr(5,5)}</span>
            </span>
            <span class='point'>·</span>
        </div>`)
    }
}
getDepartment();
getData();
$('.settingBox>span:nth-child(2)').click(ev => {
    let sym = $('.switchBox .choosed').html().trim();
    if (sym == '待回访') sym = 0;
    else if (sym == '回访记录') sym = 1;
    else sym = 2;
    let url = `/index.php?m=customermanage&a=visitList&visit_status=${$('#type').val()}&page=${current_page}&page_size=${$('#pageSize').val()}&start_time=${$('#start').val()}&end_time=${$('#end').val()}&department_id=${$('#department').val()},&pro_type=${$('#type').val()}&search=${$('#search').val()}&is_phone=${$('#phone_num').val()}&is_business=${sym==2?$('#business').val():''}&is_export=1`
    var elemIF = document.createElement("iframe");
    elemIF.src = url;
    elemIF.style.display = "none";
    document.body.appendChild(elemIF);
})
$('#department').change(ev => {
    current_page = 1;
    getData()
})
$('#business').change(ev => {
    current_page = 1;
    getData()
})
$('#type').change(ev => {
    current_page = 1;
    getData()
})
$('#phone_num').change(ev => {
    current_page = 1;
    getData()
})
$('#pageSize').change(ev => {
    current_page = 1;
    getData()
})
$('#search').keydown(ev => {
    if (ev.keyCode == 13) {
        current_page = 1;
        getData()
    }
})
$('.searchBtn').click(ev => {
    current_page = 1;
    getData()
})
$('#goto').on('keydown', ev => {
    let reg = new RegExp(/^\d+$/);
    if (!($('#goto').val().trim().match(reg))) return;
    if (ev.keyCode == 13 && ($('#goto').val() - 0 <= totalPage_)) {
        current_page = $('#goto').val();
        getData();
    }
})
$('.dialog img').click(ev => {
    $('.dialog').css('display', 'none')

})
$('.cannal').click(ev => {
    $('.dialog').css('display', 'none')

})
$('.settingBox>span:nth-child(1)').click(ev => {
    $.ajax({
        url: '/index.php?m=customermanage&a=visitConfig',
        success(res) {
            if (res.code == 200) {
                $('.set_dialog2').css('display', 'block');
                res.info.map(val => {
                    if (val.id == 1) {
                        $('.mif').val(val.sons[0].min_condition);
                        $('.mim').val(val.sons[1].min_condition);
                        $('.mit').val(val.sons[1].times);
                    } else if (val.id == 2) {
                        $('.ruf').val(val.sons[0].min_condition);
                        $('.rum').val(val.sons[1].min_condition);
                        $('.rut').val(val.sons[1].times);
                    } else if (val.id == 3) {
                        $('.zhf').val(val.sons[0].min_condition);
                        $('.zhm').val(val.sons[1].min_condition);
                        $('.zht').val(val.sons[1].times);
                    } else if (val.id == 4) {} else if (val.id == 5) {
                        $('.xmia').val(val.sons[0].min_condition);
                        $(`#${val.sons[0].is_sign==1?'xmsq':'xmsm'}`).attr('checked', true)
                        $('.xmms').val(val.sons[1].min_condition);
                        $('.xmts').val(val.sons[1].times);
                    } else if (val.id == 6) {
                        $('.xrm').val(val.sons[0].min_condition);
                        $(`#${val.sons[0].is_sign==1?'xrsq':'xrsm'}`).attr('checked', true)
                        $('.xrms').val(val.sons[1].min_condition);
                        $('.xrts').val(val.sons[1].times);
                    } else if (val.id == 7) {
                        $('.xzha').val(val.sons[0].min_condition);
                        $(`#${val.sons[0].is_sign==1?'xzsq':'xzsm'}`).attr('checked', true)
                        $('.xzms').val(val.sons[1].min_condition);
                        $('.xzts').val(val.sons[1].times);
                    }
                })
            }
        }
    })
})
$('.set_dialog2 .submit').click(ev => {
    $.ajax({
        url: '/index.php?m=customermanage&a=visitConfigUp',
        data: {
            data: [{
                id: "1",
                min_condition: $('.mif').val(),
                times: 0,
                is_sign: "0"
            }, {
                id: "2",
                min_condition: $('.mim').val(),
                times: $('.mit').val(),
                is_sign: 0
            }, {
                id: "4",
                min_condition: $('.ruf').val(),
                times: 0,
                is_sign: 0
            }, {
                id: "5",
                min_condition: $('.rum').val(),
                times: $('.rut').val(),
                is_sign: 0
            }, {
                id: "7",
                min_condition: $('.zhf').val(),
                times: 0,
                is_sign: 0
            }, {
                id: "8",
                min_condition: $('.zhm').val(),
                times: $('.zht').val(),
                is_sign: 0
            }, {
                id: "9",
                min_condition: $('.xmia').val(),
                times: 0,
                is_sign: $('input[name=mi]:checked').val()
            }, {
                id: "10",
                min_condition: $('.xmms').val(),
                times: $('.xmts').val(),
                is_sign: 0
            }, {
                id: "11",
                min_condition: $('.xrm').val(),
                times: 0,
                is_sign: $('input[name=ru]:checked').val()
            }, {
                id: "12",
                min_condition: $('.xrms').val(),
                times: $('.xrts').val(),
                is_sign: 0
            }, {
                id: "13",
                min_condition: $('.xzha').val(),
                times: 0,
                is_sign: $('input[name=zh]:checked').val()
            }, {
                id: "14",
                min_condition: $('.xzms').val(),
                times: $('.xzts').val(),
                is_sign: 0
            }, ]
        },
        type: 'post',
        success(res) {
            if (res.code == 200) {
                swal('修改成功', '更改将于次日0:00生效', 'success')
                $('.set_dialog2').css('display', 'none')
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
})
$('.visitless_dialog .submit').click(ev => {
    $.ajax({
        url: '/index.php?m=customermanage&a=notVisit',
        data: {
            visit_id: $('.visitless_notice').attr('cus_id'),
            visit_note: $('.visitless_area').val()
        },
        type: 'post',
        success(res) {
            if (res.code == 200) {
                swal('操作成功', '已取消该客户回访计划', 'success')
                $('.visitless_dialog').css('display', 'none')
                $('.visitless_area').val('')
                getData()
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
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
})
$('.visit_dialog .submit').click(ev => {
    let temp = $('#visit_type').val();
    let speed = '';
    let quality = '';
    if ($('input[name=is_continue]:checked').length == 0 ||
        $('input[name=business]:checked').length == 0 ||
        $('input[name=visit]:checked').length == 0 ||
        $('input[name=complate]:checked').length == 0 ||
        $('#advicer_area').val() == '' ||
        $('#visit_area').val() == '' ||
        $('#next_time').val() == '') {
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
                getData();
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
})
$('.canbusi_dialog .submit').click(ev => {
    $.ajax({
        url: '/index.php?m=customermanage&a=businessCancel',
        data: {
            visit_id: $('.canbusi_notice').attr('cus_id'),
        },
        type: 'post',
        success(res) {
            if (res.code == 200) {
                swal('操作成功', '已取消商机标记', 'success')
                $('.canbusi_dialog').css('display', 'none')
                getData()
            } else {
                swal('操作失败', res.info, 'error')
            }
        }
    })
})