$('.switchBox span').click(ev=>{
    $('.switchBox span').removeClass('choosed');
    $(ev.target).addClass('choosed');
})
var current_page = 1;
var total_page = 1;
function getData(is_export){
    let sym = $('.switchBox .choosed').html().trim();
    if(sym=='待回访')sym = 0;
    else if(sym=='回访记录')sym = 1;
    else sym = 2;
    $.ajax({
        url:'/index.php?m=customermanage&a=visitList',
        type:'post',
        data:{
            visit_status:$('#type').val(),
            page:current_page,
            page_size:$('#pageSize').val(),
            start_time:$('#start').val(),
            end_time:$('#end').val(),
            department_id:$('#department').val(),
            pro_type:$('#type').val(),
            search:$('#search').val(),
            is_phone:$('#phone_num').val(),
            is_business:sym==2?$('#business').val():'',
            is_export,
        },
        success(res){
            if (res.code == 200) {
                let doc = '';
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
                        <td>${val.last_visit_time}</td>
                        <td>${val.industry}</td>
                        <td>${val.add_time}</td>
                        <td><span class='visit'>回访</span><span class='visitless'>不回访</span></td>
                    </tr>`
                })
                $('table tbody').empty();
                $('table tbody').append(doc);
                let totalPage = Math.ceil(res.info.counts / $('#pageSize').val());
                totalPage_ = totalPage;
                let page = '<span class="last">«</span>';
                if (totalPage >= 3) {
                    if (res.info.current_page != 1&&res.info.current_page != totalPage) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${i==1?' choosed':''}">${res.info.current_page-1+i}</span>`
                        }
                    } else if(res.info.current_page == 1) {
                        for (let i = 0; i < 3; i++) {
                            page += `<span class="page${i==0?' choosed':''}">${res.info.current_page-0+i}</span>`
                        }
                    }else if(res.info.current_page == totalPage){
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
                $('.page').click(ev=>{
                    current_page = $(ev.target).html().trim()-0;
                    getData();
                })
                $('.last').click(ev=>{
                    if(current_page==1)return;
                    current_page--;
                    getData();
                })
                $('.next').click(ev=>{
                    if(current_page==totalPage)return;
                    current_page++;
                    getData();
                })
        }
    }})
}
getData();