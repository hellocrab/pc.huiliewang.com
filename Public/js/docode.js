$(function () {

    //收藏人才
    $("#favorite").click(function(){
        var id=$(this).attr("rel");
        $.ajax({
            url:"/index.php?m=product&a=favorite",
            type:"post",
            data:{
                eid:id
            },
            success:function (data) {
                if(data.status==1){
                    swal({
                        title: data.info,
                        type: "success"
                    });
                    location.reload();
                }else{
                    swal({
                        title: data.info,
                        type: "error"
                    });
                }

            },error:function () {
                swal({
                    title: "系统出错",
                    type: "error"
                });
            }
        })

    });

//取消收藏人才
    $("#unfavorite").click(function(){
        var id=$(this).attr("rel");
        swal({
                title: "确定要取消收藏人才吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:"/index.php?m=product&a=unfavorite",
                    type:"post",
                    data:{
                        eid:id
                    },
                    success:function (data) {
                        if(data.status==1){
                            swal({
                                title: data.info,
                                type: "success"
                            });location.reload();
                        }else{
                            swal({
                                title: data.info,
                                type: "error"
                            });
                        }
                    },
                    error:function () {
                        swal({
                            title: "系统出错",
                            type: "error"
                        });
                    }
                })
            });
    });

    $(".change_file").click(function () {
        var id=$(this).attr("data-id");
        swal({
                title: "确定要替换简历原件吗？",
                type: "warning",
                showCancelButton: true,
                confirmButtonColor: "#DD6B55",
                confirmButtonText: "确定",
                closeOnConfirm: false
            },
            function(){
                $.ajax({
                    url:"",
                    type:"post",
                    data:{
                        eid:id
                    },
                    success:function (data) {
                        if(data.status==1){
                            swal({
                                title: data.info,
                                type: "success"
                            });location.reload();
                        }else{
                            swal({
                                title: data.info,
                                type: "error"
                            });
                        }
                    },
                    error:function () {
                        swal({
                            title: "系统出错",
                            type: "error"
                        });
                    }
                })
            });
    })

})

