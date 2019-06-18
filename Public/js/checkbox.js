function createCon(boxId, dataUrl) {
    $.ajax({
        type: 'post',
        url: dataUrl,
        success(res) {
            if (res.code == 200) {
                let group = ""; //渲染分组
                for (let i = 0; i < res.data.length; i++) {
                    group += `<div class='memberGroup' index='${i}'>${res.data[i].name}</div>`
                }
                let chiose = []; //保存已选人员
                let chioseStr = '';
                if ($('#parter_name').val() != '') {
                    let names = $('#parter_name').val().split(',');
                    let ids = $('#parter_id').val().split(',');
                    ids.map((val, index) => {
                        chioseStr += `<div class='chiose' member_id='${val}' member_name='${names[index]}'>
                            ${names[index]}
                            <i class="fa fa-times-circle delChiose" member_id='${val}'/>
                        </div>`
                        chiose.push(val);
                    })
                }
                const element = `
                <div class="listBox">
                    <div class='groupBox'>
                        ${group}
                    </div>
                    <div class="memberBox">
                    </div>
                    <div class="chioseBox">
                        ${chioseStr}
                    </div>
                </div>
                `
                $(`#${boxId}`).empty();
                $(`#${boxId}`).append(element);
                $('.delChiose').click(ev => {
                    //删除
                    let delID = ev.currentTarget.attributes.member_id.value;
                    $(`.chiose[member_id="${delID}"]`).remove();
                    chiose.splice(chiose.findIndex(val => {
                        return val == delID;
                    }), 1)
                })
                $('.memberGroup').click(ev => {
                    //二级联动
                    let index = ev.currentTarget.attributes.index.value;
                    let members = '';
                    $('.memberGroup').removeClass('hoverGroup');
                    $(`.memberGroup[index="${index}"]`).addClass('hoverGroup');
                    if (res.data[index].children.length > 0) {
                        for (let i = 0; i < res.data[index].children.length; i++) {
                            members += `<div class='members' member_id='${res.data[index].children[i].role_id}' member_name='${res.data[index].children[i].user_name}'>${res.data[index].children[i].user_name}</div>`
                        }
                    } else {
                        members = `<div class="noChild">该部门暂无可选人员</div>`
                    }
                    $('.memberBox').empty();
                    $('.memberBox').append(members);
                    $('.members').click(ev => {
                        //添加人员
                        let memberId = ev.currentTarget.attributes.member_id.value;
                        let memberName = ev.currentTarget.attributes.member_name.value;
                        if (chiose.findIndex(val => {
                                return val == memberId;
                            }) == -1) {
                            chiose.push(memberId)
                            $('.chioseBox').append(`<div class='chiose' member_id='${memberId}' member_name='${memberName}'>
                            ${memberName}
                            <i class="fa fa-times-circle delChiose" member_id='${memberId}'/>
                        </div>`)
                            $('.delChiose').click(ev => {
                                //删除
                                let delID = ev.currentTarget.attributes.member_id.value;
                                $(`.chiose[member_id="${delID}"]`).remove();
                                chiose.splice(chiose.findIndex(val => {
                                    return val == delID;
                                }), 1)
                            })
                        } else {
                            $(`.chiose[member_id="${memberId}"]`).remove();
                            chiose.splice(chiose.findIndex(val => {
                                return val == memberId;
                            }), 1)
                        }
                    })
                })
            }
        }
    })
}
$(function () {
    $('#dialog-role-list3').dialog({
        autoOpen: false,
        modal: true,
        width: 800,
        height: 400,
        close: function () {
            $(this).html("");
        },
        buttons: {
            "确认": function () {
                var parter = new Array();
                var parter_name = new Array();
                $(".chiose").each(function () {
                    parter.push($(this).attr('member_id'));
                    parter_name.push($(this).attr('member_name'));
                })
                parter = parter.join(",");
                parter_name = parter_name.join(",");
                $('#parter_name').val("");
                $('#parter_id').val("");
                $('#parter_name').val(parter_name);
                $('#parter_id').val(parter);
                $(this).dialog("close");
            },
            "取消": function () {
                $(this).dialog("close");
            }
        },
        position: ["center", 100]
    });
})