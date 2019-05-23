var current_page = 1;
var order_file = 0;
var con_id = '';
var con_proid = '';
var con_rank = '';
var con_black = '';
var con_note = '';

function getData() {
    $.ajax({
        url: '/index.php?m=customermanage&a=customers',
        data: {
            page: current_page,
            page_size: $('#pageSize').val(),
            is_manual: $('#is_manual').val(),
            is_black: $('#is_black').val(),
            is_perfection: $('#is_perfection').val(),
            rank_name: $('#rank').val(),
            pro_type: $('#pro_type').val(),
            name: $('#name').val(),
            birth_month: $('#birth_month').val(),
            order_file: 'money',
            order_asc: order_file == 0 ? 'asc' : 'desc',
        },
        type: 'post',
        success(res) {
            if (res.code == 200) {
                let doc = '';
                res.info.list.map((val, index) => {
                    doc += `<tr>
                        <td>${val.pro_type}</td>
                        <td>${val.customer_name}</td>
                        <td>${val.rank_name}</td>
                        <td>
                            ${val.money}&nbsp;&nbsp;
                            <img src='Public/img/customerManage/8_15.png' class='moneyDetail' 
                            reco='${index},${val.money_list["1"]?val.money_list["1"]:0},${val.money_list["2"]?val.money_list["2"]:0},${val.money_list["3"]?val.money_list["3"]:0}'>
                        </td>
                        <td>${val.contact_name}</td>
                        <td>${val.job}</td>
                        <td>${val.birth_month+'-'+val.birth_day}</td>
                        <td>${val.industry}</td>
                        <td>${val.city}</td>
                        <td>${val.role_name}</td>
                        <td>${val.add_time}</td>
                        <td>
                            ${val.is_black==0?'否':'&nbsp;&nbsp;&nbsp;&nbsp;是<img class="blackNote" corn="'+index+','+val.note+'" src="Public/img/customerManage/8_17.png">'}
                        </td>
                        <td><img src='Public/img/customerManage/8_11.png' corn='${index},${val.is_black}' class='mean'/></td>
                    </tr>`
                })
                $('table tbody').empty();
                $('table tbody').append(doc);
                let totalPage = Math.ceil(res.info.counts / $('#pageSize').val());
                let page = '<span class="last">«</span>';
                if (totalPage >= 3) {
                    if (res.info.current_page != 1) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${res.info.current_page-1+i+(i==1?' choosed':'')}">${res.info.current_page-1+i}</span>`
                        }
                    } else {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${res.info.current_page-1+i+(i==0?' choosed':'')}">${res.info.current_page-1+i}</span>`
                        }
                    }
                } else if (totalPage < 3) {
                    for (let i = 0; i < totalPage; i++) {
                        page += `<span class="page${(1+i)+(i+1==res.info.current_page?' choosed':'')}">${i+1}</span>`
                    }
                }
                page += '<span class="next">»</span>';
                $('.pageBox').empty();
                $('.pageBox').append(page);
                $('.totalPage').html(`共${res.info.counts}条&nbsp;第${res.info.current_page}/${totalPage}页`)
                current_page = res.info.current_page;
                $('.moneyDetail').on('mouseenter', ev => {
                    $('.showDetail').remove();
                    let arr = ev.target.attributes[2].nodeValue.split(',');
                    let temp = `<div class='showDetail'>
                        <span>面试快&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${arr[1]}<span>
                        <span>入职快&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;${arr[2]}<span>
                        <span>专业猎头&nbsp;&nbsp;${arr[3]}<span>
                    </div>`
                    $(`body`).append(temp)
                    $('.showDetail').on('mouseleave', ev => {
                        $('.showDetail').remove()
                    })
                    $('.showDetail').css('top', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-child(4)`).offset().top - 62 + 'px')
                    $('.showDetail').css('left', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-child(4)`).offset().left - 20 + 'px')
                })
                $('.blackNote').on('mouseenter', ev => {
                    $('.blackDetail').remove();
                    let arr = ev.target.attributes[1].nodeValue.split(',');
                    let temp = `<div class='blackDetail'>
                        ${arr[1]}
                    </div>`
                    $(`body`).append(temp)
                    $('.blackDetail').on('mouseleave', ev => {
                        $('.blackDetail').remove()
                    })
                    $('.blackDetail').css('top', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-child(12)`).offset().top - 62 + 'px')
                    $('.blackDetail').css('left', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-child(12)`).offset().left - 0 + 'px')
                })
                $('.mean').click(ev => {
                    $('.meanDetail').remove();
                    let arr = ev.target.attributes[1].nodeValue.split(',');
                    let temp = `<div class='meanDetail'>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;手动分级</span>
                        <span>&nbsp;&nbsp;&nbsp;&nbsp;${arr[1]==0?'加入':'移除'}黑名单</span>
                    </div>`
                    $(`body`).append(temp)
                    $('.meanDetail').on('mouseleave', ev => {
                        $('.meanDetail').remove()
                    })
                    $('.meanDetail').css('top', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-last-child(1)`).offset().top - 42 + 'px')
                    $('.meanDetail').css('left', $(`tbody tr:nth-child(${arr[0]-0+1}) td:nth-last-child(1)`).offset().left + 15 + 'px')
                    $('.meanDetail span:nth-child(2)').click(ev => {
                        con_id = res.info.list[arr[0]].customer_id;
                        con_proid = res.info.list[arr[0]].pro_type == '面试快' ? '1' : res.info.list[arr[0]].pro_type == '入职快' ? '2' : '3';
                        con_rank = res.info.list[arr[0]].rank_id;
                        if ($('.meanDetail span:nth-child(2)').html().trim().substr(24, 2) == '加入') {
                            $('.black_dialog').css('display', 'block');
                            $(document).bind('mousewheel', function (event, delta) {
                                return false;
                            });
                        } else {
                            swal({
                                title: '黑名单操作',
                                text: '将该客户移除黑名单',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonText: "确定"
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    $.ajax({
                                        url: '/index.php?m=customermanage&a=edit',
                                        type: 'post',
                                        data: {
                                            customer_id: con_id,
                                            pro_type: con_proid,
                                            rank_name: con_rank,
                                            is_black: 0,
                                            note: ''
                                        },
                                        success(res) {
                                            if (res.code == 200) {
                                                swal("", "操作成功", "success");
                                                getData();
                                            }
                                        }
                                    })
                                }
                            });
                        }
                    })
                    $('.meanDetail span:nth-child(1)').click(ev => {
                        con_id = res.info.list[arr[0]].customer_id;
                        con_proid = res.info.list[arr[0]].pro_type == '面试快' ? '1' : res.info.list[arr[0]].pro_type == '入职快' ? '2' : '3';
                        con_rank = res.info.list[arr[0]].rank_id;
                        is_black = res.info.list[arr[0]].is_black;
                        con_note = res.info.list[arr[0]].note;
                        if (res.info.list[arr[0]].is_manual==0) {
                            $('.custName').html(`<span>客户名称</span>${res.info.list[arr[0]].customer_name}`);
                            $('.rank_dialog').css('display', 'block');
                            $(document).bind('mousewheel', function (event, delta) {
                                return false;
                            });
                        } else {
                            swal({
                                title: '取消自动分级',
                                text: '取消后将会在次日0:00进行自动分级',
                                type: "warning",
                                showCancelButton: true,
                                confirmButtonText: "确定"
                            }, function (isConfirm) {
                                if (isConfirm) {
                                    $.ajax({
                                        url: '/index.php?m=customermanage&a=edit',
                                        type: 'post',
                                        data: {
                                            customer_id: con_id,
                                            pro_type: con_proid,
                                            rank_name: '',
                                            is_black: is_black,
                                            note: con_note,
                                            is_manual:0
                                        },
                                        success(res) {
                                            if (res.code == 200) {
                                                swal("", "操作成功", "success");
                                                getData();
                                            }
                                        }
                                    })
                                }
                            });
                        }
                    })
                })
            }
        }
    })
}

function getRank() {
    $.ajax({
        url: '/index.php?m=customermanage&a=rank',
        success(res) {
            if (res.code == 200) {
                res.info.map(val => {
                    if (val.id == 0) {
                        $('.chu').val(val.sons[0].min_condition);
                    } else if (val.id == 2) {
                        $('.rua').val(val.sons[0].min_condition);
                        $('.rub1').val(val.sons[1].min_condition);
                        $('.rub2').val(val.sons[1].max_condition);
                        $('.ruc1').val(val.sons[2].min_condition);
                        $('.ruc2').val(val.sons[2].max_condition);
                    } else if (val.id == 1) {
                        $('.mia').val(val.sons[0].min_condition);
                        $('.mib1').val(val.sons[1].min_condition);
                        $('.mib2').val(val.sons[1].max_condition);
                        $('.mic1').val(val.sons[2].min_condition);
                        $('.mic2').val(val.sons[2].max_condition);
                    } else if (val.id == 3) {
                        $('.zha').val(val.sons[0].min_condition);
                        $('.zhb1').val(val.sons[1].min_condition);
                        $('.zhb2').val(val.sons[1].max_condition);
                        $('.zhc1').val(val.sons[2].min_condition);
                        $('.zhc2').val(val.sons[2].max_condition);
                    }
                })
            }
        }
    })
}
getData();
$('select').on('change', ev => {
    current_page = 1;
    getData();
})
$('#name').on('keydown', ev => {
    if (ev.keyCode == 13) {
        current_page = 1;
        getData();
    }
})
$('#goto').on('keydown', ev => {
    if (ev.keyCode == 13) {
        current_page = $('#goto').val();
        getData();
    }
})
$('.order_file').click(ev => {
    order_file = Math.abs(order_file - 1);
    getData();
})
$('.setting').click(ev => {
    getRank()
    $(document).bind('mousewheel', function (event, delta) {
        return false;
    });
    $('.set_dialog').css('display', 'block');
})
$('.dialog').click(ev => {
    $('.dialog').css('display', 'none');
    $(document).unbind('mousewheel');
})
$('.dialogBox').click(ev => {
    window.event ? window.event.cancelBubble = true : e.stopPropagation();
})
$('.dialogHead img').click(ev => {
    $('.dialog').css('display', 'none');
    $(document).unbind('mousewheel');
})
$('.cannal').click(ev => {
    $('.dialog').css('display', 'none');
    $(document).unbind('mousewheel');
})
$(".set_dialog .submit").click(ev => {
    if (!$('.chu').val() || !$('.mia').val() || !$('.mib1').val() || !$('.mib2').val() || !$('.mic1').val() || !$('.mic2').val() || !$('.rua').val() || !$('.rub1').val() || !$('.rub2').val() || !$('.ruc1').val() || !$('.ruc2').val() || !$('.zha').val() || !$('.zhb1').val() || !$('.zhb2').val() || !$('.zhc1').val() || !$('.zhc2').val()) {
        swal("", "请填写完整", "error");
    } else {
        $.ajax({
            url: '/index.php?m=customermanage&a=rank_update',
            type: 'post',
            data: {
                data: [{
                    id: 1,
                    min_condition: $('.mia').val(),
                    max_condition: 0
                }, {
                    id: 2,
                    min_condition: $('.mib1').val(),
                    max_condition: $('.mib2').val()
                }, {
                    id: 3,
                    min_condition: $('.mic1').val(),
                    max_condition: $('.mic2').val()
                }, {
                    id: 4,
                    min_condition: $('.rua').val(),
                    max_condition: 0
                }, {
                    id: 5,
                    min_condition: $('.rub1').val(),
                    max_condition: $('.rub2').val()
                }, {
                    id: 6,
                    min_condition: $('.ruc1').val(),
                    max_condition: $('.ruc2').val()
                }, {
                    id: 7,
                    min_condition: $('.zha').val(),
                    max_condition: 0
                }, {
                    id: 8,
                    min_condition: $('.zhb1').val(),
                    max_condition: $('.zhb2').val()
                }, {
                    id: 9,
                    min_condition: $('.zhc1').val(),
                    max_condition: $('.zhc2').val()
                }, {
                    id: 10,
                    min_condition: $('.chu').val(),
                    max_condition: 0
                }]
            },
            success(res) {
                if (res.code == 200) {
                    swal("", "操作成功", "success");
                    $('.set_dialog').css('display', 'none');
                    $(document).unbind('mousewheel');
                }
            }
        })
    }
})
$(".black_dialog .submit").click(ev => {
    if (!$('.mp').val()) {
        swal("", "请填写完整", "error");
    } else {
        $.ajax({
            url: '/index.php?m=customermanage&a=edit',
            type: 'post',
            data: {
                customer_id: con_id,
                pro_type: con_proid,
                rank_name: con_rank,
                is_black: 1,
                note: $('.mp').val()
            },
            success(res) {
                if (res.code == 200) {
                    swal("", "操作成功", "success");
                    $('.dialog').css('display', 'none');
                    $(document).unbind('mousewheel');
                    getData()
                }
            }
        })
    }
})
$(".rank_dialog .submit").click(ev => {
    
        $.ajax({
            url: '/index.php?m=customermanage&a=edit',
            type: 'post',
            data: {
                customer_id: con_id,
                pro_type: con_proid,
                rank_name: $('.custRank input[checked]').val(),
                is_black: con_black,
                note: con_note,
                is_manual:1
            },
            success(res) {
                if (res.code == 200) {
                    swal("", "操作成功", "success");
                    $('.dialog').css('display', 'none');
                    $(document).unbind('mousewheel');
                    getData()
                }
            }
        })
})