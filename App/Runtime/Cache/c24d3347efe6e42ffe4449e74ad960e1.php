<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php if(isset($message)): echo L('SUCCESSFUL_OPERATION'); else: echo L('OPERATION_FAILED'); endif; ?></title>
    <meta name="author" content="<?php echo L('AUTHOR');?>">
    <link href="__PUBLIC__/style/css/bootstrap.min.css" rel="stylesheet">
    <link href="__PUBLIC__/style/font-awesome/css/font-awesome.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/animate.css" rel="stylesheet">
    <link href="__PUBLIC__/style/css/style.css" rel="stylesheet">
</head>
<body class="gray-bg">
    <div class="middle-box text-center animated fadeInDown" style="min-width: 800px;">
        <span style="font-size:140px;"><?php if(isset($message)): ?><img src="__PUBLIC__/img/success.png"/><?php else: ?><img src="__PUBLIC__/img/error.png"/><?php endif; ?></span>
        <!-- <h2><?php if(isset($message)): echo L('SUCCESSFUL_OPERATION'); else: echo L('OPERATION_FAILED'); endif; ?></h2> -->
        <h3 class="font-bold"></h3>
        <div class="error-desc">
            <?php if(empty($alert)): if(isset($message)): echo ($message); ?>
                <?php else: ?>
                    <?php echo ($error); endif; endif; ?>
            <br/>
            <br/>
            <!-- <a href="index.html" class="btn btn-primary m-t"><?php echo L('JUMP',array($jumpUrl,$waitSecond));?></a> -->
            <a id="href" href="<?php echo ($jumpUrl); ?>" class="btn btn-primary m-t">页面自动跳转：<span id="wait"><?php echo ($waitSecond); ?></span>秒</a>
        </div>
    </div>
    <!-- Mainly scripts -->
    <script src="__PUBLIC__/style/js/jquery-2.1.1.js"></script>
    <script src="__PUBLIC__/style/js/bootstrap.min.js"></script>
    <script type="text/javascript">
    (function(){
        var wait = document.getElementById('wait'),href = document.getElementById('href').href;
        var interval = setInterval(function(){
            var time = --wait.innerHTML;
            if(time == 0) {
                location.href = href;
                clearInterval(interval);
            };
        }, 1500);
        })();
    </script>
</body>
</html>