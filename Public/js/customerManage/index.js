function getData(){
    $.ajax({
        url:'/index.php?m=customer_manage&a=customers',
        data:{
            page:1,
            page_size:20,
            is_manual:$('#is_manual').val(),
            is_black:$('#is_black').val(),
            is_perfection:$('#is_perfection').val(),
            rank:$('#rank').val(),
            pro_type:$('#pro_type').val(),
            name:$('#name').val(),
            birth_month:$('#birth_month').val(),
            order_file:'asc',
        },
        type:'post',
        success(res){

        }
    })
}
getData();