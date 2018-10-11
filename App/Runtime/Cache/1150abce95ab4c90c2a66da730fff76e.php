<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>





    <meta charset="utf-8">
    <title><?php echo C('defaultinfo.name');?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="author" content="<?php echo L('AUTHOR');?>"/>
    <link rel="shortcut icon" href="__PUBLIC__/ico/favicon.png"/>

    <link href="__PUBLIC__/style/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/style/font-awesome/css/font-awesome.css" rel="stylesheet">
    
    <link href="__PUBLIC__/style/css/plugins/sweetalert/sweetalert.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/style.css" rel="stylesheet">
    <script src="__PUBLIC__/style/js/jquery-2.1.1.js"></script>
    <script src="__PUBLIC__/style/js/bootstrap.min.js"></script>
    <script src="__PUBLIC__/style/js/plugins/sweetalert/sweetalert.min.js"></script>

    <script src="__PUBLIC__/js/jquery.base64.js"></script>
    <script src="__PUBLIC__/js/jquery.md5.js"></script>

    <script src="__PUBLIC__/style/js/plugins/ladda/spin.min.js"></script>
    <script src="__PUBLIC__/style/js/plugins/ladda/ladda.min.js"></script>
    <script src="__PUBLIC__/style/js/plugins/ladda/ladda.jquery.min.js"></script>
    <link href="__PUBLIC__/style/css/plugins/ladda/ladda-themeless.min.css" rel="stylesheet">
</head>
<style>
    .img-circle{width: 140px;height: 140px;}
    .lock-word{margin-left: -496px;}
    .page-locked{
        background:url(__PUBLIC__/img/lockscreen.jpg) repeat center center;
    }
    .page-dark.layout-full:after{
        position: fixed;
        top: 0;
        left: 0;
        z-index: -1;
        width: 100%;
        height: 100%;
        content: "";
        background-color: rgba(38,50,56,.6);
    }
    body{
        color:#fff;
    }
</style>

<body class="gray-bg page-locked layout-full page-dark" >

<div class="lock-word animated fadeInDown">
    <span class="first-word">LOCKED</span><span>SCREEN</span>
</div>
<div class="middle-box text-center lockscreen animated fadeInDown">
    <div>
        <div class="m-b-md">
            <?php if($user_info['img']): ?><img alt="image" class="img-circle circle-border" src="<?php echo ($user_info['img']); ?>" />
            <?php else: ?>
                <img alt="image" class="img-circle circle-border" src="__PUBLIC__/img/avatar_default.png" /><?php endif; ?>
        </div>
        <h3><?php echo ($user_info['full_name']); ?></h3>
        <p>程序已锁屏，请输入您的登录密码进行解锁</p>
        <form class="m-t" role="form" id="form1" method="post">
            <div class="form-group">
                <input style="color:#76838f;" type="password" class="form-control" id="password" name="password" placeholder="" required="" onkeydown='if(event.keyCode==13) {$("#unlock").trigger("click");return false;}' />
            </div>
            <button class="ladda-button btn btn-primary" data-style="zoom-in" id="unlock" type="button">
                <span class="ladda-label">Unlock</span><span class="ladda-spinner"></span>
            </button>
            <!-- <div class="form-group" style="margin-top:15px;">
                <a href="<?php echo U('user/login');?>" style="color:#62a8ea;">或者使用其他账号登录</a>
            </div> -->
        </form>
    </div>
</div>
<script type="text/javascript">
$(function(){
    /*站内信*/
    message_tips();

    //保存按钮loading
    $( '.ladda-button' ).ladda( 'bind', { timeout: 2000 } );
     // Bind progress buttons and simulate loading progress
    Ladda.bind( '.ladda-button',{
        callback: function( instance ){
            var progress = 0;
            var interval = setInterval( function(){
                progress = Math.min( progress + Math.random() * 0.1, 1 );
                instance.setProgress( progress );

                if( progress === 1 ){
                    instance.stop();
                    clearInterval( interval );
                }
            }, 200 );
        }
    });
});
function message_tips(){
    $.get("<?php echo U('message/tips');?>", function(data){
        var is_lock = data.data['is_lock'];
        if(!is_lock){
            location.href = 'javascript:history.back(-1)';
        }
    },'json')
    setTimeout('message_tips()',5000);
}
$('#unlock').click(function() {
    $.base64.utf8encode = true;
    if($('#password').val() == ''){
        swal({
            title: "温馨提示",
            text: "密码不能为空！"
        })
        return false;
    }
    $('#password').val($.md5($('#password').val()));
    $.ajax({
        url : "<?php echo U('setting/lockscreen');?>",
        type: "POST",
        data:$("#form1").serialize(),
        async: true,
        success: function(data) {
            if(data.status == 1){
                swal({
                    title: "验证成功！",
                    text: "即将跳转页面!",
                    type: "success"
                });
                history.go(-1);
                //window.location.href="<?php echo U('user/index');?>";
            }else{
                swal({
                    title: "操作失败!",
                    text: data.info
                    // type: "error"
                });
                $('#password').val('');
                return false;
            }
        }
    });
    //$(this).submit();
});
</script>
</body>
</html>