<?php if (!defined('THINK_PATH')) exit();?><div style="background-color: #F9F9F9;border-radius: 2px;">
	<input type="hidden" id="comment_task_id" value="<?php echo ($task_id); ?>"/>
	<?php if(is_array($comment_list)): $i = 0; $__LIST__ = $comment_list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$cvo): $mod = ($i % 2 );++$i;?><div class="talknow">
			<div class="imgtx">
				<?php if($cvo['img'] != ''): ?><img src="<?php echo ($cvo['img']); ?>" class="img-circle" />
				<?php else: ?>
					<img class="img-circle" src="__PUBLIC__/img/avatar_default.png"/><?php endif; ?>
			</div>
			<div class="neirong">
				<div class="reply_child">
					<p>
						<?php echo ($cvo['creator']['full_name']); ?>：<?php echo ($cvo['content']); ?>
					</p>
					<p><?php echo date('Y-m-d H:m',$cvo['create_time']);?> 
						<span class="pull-right controls" style="display: none;">
							<?php if($cvo['delete'] == 1): ?><a href="javascript:;" rel="<?php echo ($cvo['talk_id']); ?>" class="delitemall">删除</a> |<?php endif; ?>
							<a href="javascript:;" class="replayitem" rel="<?php echo ($cvo['talk_id']); ?>" receiveid="<?php echo ($cvo['send_role_id']); ?>" nowname="<?php echo ($cvo['creator']['full_name']); ?>">回复</a>
						</span>
					</p>
				</div>
				<?php if(is_array($cvo['comment_list_child'])): $i = 0; $__LIST__ = $cvo['comment_list_child'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$childvo): $mod = ($i % 2 );++$i;?><div class="reply_child">
						<div class="imgtx">
							<?php if($childvo['childimg'] != ''): ?><img src="<?php echo ($childvo['childimg']); ?>" class="img-circle" />
							<?php else: ?>
								<img class="img-circle" src="__PUBLIC__/img/avatar_default.png"/><?php endif; ?>
						</div>
						<div class="neirong" style="border:none;">
							<p>
								<?php echo ($childvo['creator_child']['full_name']); ?>：<?php echo ($childvo['content']); ?>
							</p>
							<p><?php echo date('Y-m-d H:m',$childvo['create_time']);?> 
								<span class="pull-right controls" style="display: none;">
									<?php if($childvo['delete'] == 1): ?><a href="javascript:;" rel="<?php echo ($childvo['talk_id']); ?>" class="delitem">删除</a> |<?php endif; ?>
									<a href="javascript:;" class="replayitem" rel="<?php echo ($cvo['talk_id']); ?>" nowname="<?php echo ($childvo['creator_child']['full_name']); ?>" receiveid="<?php echo ($childvo['send_role_id']); ?>">回复</a>
								</span>
							</p>
						</div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div id="reply_<?php echo ($cvo['talk_id']); ?>" class="reply_talk" style="display: none;">
					<div class="imgtx">
						<?php if($current_img != ''): ?><img src="<?php echo ($current_img); ?>" class="img-circle" />
						<?php else: ?>
							<img class="img-circle" src="__PUBLIC__/img/avatar_default.png"/><?php endif; ?>
					</div>
					<div id="contents_<?php echo ($cvo['talk_id']); ?>" class="reply_content" contenteditable="true" rel="<?php echo ($cvo['talk_id']); ?>"></div>
					<div style="margin-top: 5px;margin-left: 42px;">
						<input type="image" id="btn_emoji_<?php echo ($cvo['talk_id']); ?>" class="btn_emoji" src="__PUBLIC__/img/emoji.png" />
						<div id="btnreply_<?php echo ($cvo['talk_id']); ?>" class="btn_reply" style="display: none;">
							<button class="btn btn-primary addtalk" disabled="true" id="add_talk_<?php echo ($cvo['talk_id']); ?>" rel="<?php echo ($cvo['talk_id']); ?>" type="button">发 表</button>
						</div>
					</div>
					<div style="clear:both;"></div>
				</div>
			</div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script type="text/javascript">
$(".reply_child").mouseenter(function(){
	$(this).find(".controls").show();
}).mouseleave(function(){
	$(this).find(".controls").hide();
});

var task_id = $('#comment_task_id').val();
//删除单个回复
$('.delitem').click(function(){
	var id = $(this).attr('rel');
	swal({
	  title: "您确定要删除这条信息吗？",
	  text: "删除后将无法恢复，请谨慎操作！",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "删除",
	  cancelButtonText: "取消",
	  closeOnConfirm: false
	},
	function(isConfirm){
	  if (isConfirm) {
	   	$.post("<?php echo U('task/replyDel');?>",{id:id},function(data){
			if(data.status == 1){
				var url = "<?php echo U('task/commentShow');?>";
				$('.talkcontent').load(url,{task_id:task_id});
				swal("删除成功！", "您已经永久删除了这条信息。", "success");
			}else{
				alert_crm(data.info);
			}
			},"json"
	  	);
	  } else {
			swal("已取消","您取消了删除操作！","error");
		}
	});
});
$('.delitemall').click(function(){
	var id = $(this).attr('rel');
	swal({
	  title: "您确定要删除这条信息吗？",
	  text: "您将要删除这条评论信息，所有的回复也会删除!",
	  type: "warning",
	  showCancelButton: true,
	  confirmButtonColor: "#DD6B55",
	  confirmButtonText: "删除",
	  cancelButtonText: "取消",
	  closeOnConfirm: false
	},
	function(isConfirm){
	  if (isConfirm) {
	   	$.post("<?php echo U('task/replyAllDel');?>",{id:id},function(data){
			if(data.status == 1){
				var url = "<?php echo U('task/commentShow');?>";
				$('.talkcontent').load(url,{task_id:task_id});
				swal("删除成功！", "您已经永久删除了这条信息。", "success");
			}else{
				alert_crm(data.info);
			}
			},"json"
	  	);
	  } else {
			swal("已取消","您取消了删除操作！","error");
		}
	});
});

//回复
/*else{
		swal({
		  title: "您确定放弃发表吗?",
		  text: "你将要放弃这次发表!",
		  type: "warning",
		  showCancelButton: true,
		  confirmButtonColor: "#DD6B55",
		  confirmButtonText: "确认",
		  cancelButtonText: "取消",
		  closeOnConfirm: false
		},
		function(){
			$('#btnreply_'+talk_id).fadeOut('3000');
			$('#add_talk_'+talk_id).prop('disabled',true);
			$('#reply_'+talk_id).hide();
			$('#contents_'+talk_id).html('');
			$('#contents_'+talk_id).attr('placeholder');
		  	swal("删除", "已完成本次操作！", "success");
		});
	}*/
//光标到最后函数
function keyAction(el) {
	var textbox = document.getElementById(el);
	var sel = window.getSelection();
	var range = document.createRange();
	range.selectNodeContents(textbox);
	range.collapse(false);
	sel.removeAllRanges();
	sel.addRange(range);
}
$('.replayitem').click(function(){
	var rel = $(this).attr('rel');//获取唯一id	
	var receiveid = $(this).attr('receiveid');//接收者
	$('#reply_'+rel).slideToggle('slow');
	var contents = $('#contents_'+rel).html();
	$(".reply_talk").not('#reply_'+rel).hide();
	var nowname = $(this).attr('nowname');//当前name
	var txt = '<span>回复@'+nowname+'：</span>'; 
	$('#contents_'+rel).attr('receiveid',receiveid);
	$('#contents_'+rel).html(txt);

	//div 回复 添加
	$('#contents_'+rel).focus(function(){
		var talk_id = $(this).attr('rel');//获取唯一id	
		$('#add_talk_'+talk_id).removeAttr('disabled');
		$('#btnreply_'+talk_id).fadeIn('3000');
	});
	$('#contents_'+rel).focusout(function(){
		var talk_id = $(this).attr('rel');//获取唯一id	
		var content = $('#contents_'+talk_id).html();	
		if(!content){
			$('#btnreply_'+talk_id).fadeOut('3000');
			$('#add_talk_'+talk_id).prop('disabled',true);
			$('#reply_'+talk_id).hide();
		}
	});
	$('#contents_'+rel).emoji({
		button:"#btn_emoji_"+rel,
	    showTab: true,
	    animation: 'slide',
	    icons: [{
	    	name: "小表情",
        path: "__PUBLIC__/emoji/img/tieba/",
        maxNum: 50,
        file: ".jpg",
        placeholder: ":{alias}:",
        alias: {
            1: "hehe",
            2: "haha",
            3: "tushe",
            4: "a",
            5: "ku",
            6: "lu",
            7: "kaixin",
            8: "han",
            9: "lei",
            10: "heixian",
            11: "bishi",
            12: "bugaoxing",
            13: "zhenbang",
            14: "qian",
            15: "yiwen",
            16: "yinxian",
            17: "tu",
            18: "yi",
            19: "weiqu",
            20: "huaxin",
            21: "hu",
            22: "xiaonian",
            23: "neng",
            24: "taikaixin",
            25: "huaji",
            26: "mianqiang",
            27: "kuanghan",
            28: "guai",
            29: "shuijiao",
            30: "jinku",
            31: "shengqi",
            32: "jinya",
            33: "pen",
            34: "aixin",
            35: "xinsui",
            36: "meigui",
            37: "liwu",
            38: "caihong",
            39: "xxyl",
            40: "taiyang",
            41: "qianbi",
            42: "dnegpao",
            43: "chabei",
            44: "dangao",
            45: "yinyue",
            46: "haha2",
            47: "shenli",
            48: "damuzhi",
            49: "ruo",
            50: "OK"
        },
        title: {
            1: "呵呵",
            2: "哈哈",
            3: "吐舌",
            4: "啊",
            5: "酷",
            6: "怒",
            7: "开心",
            8: "汗",
            9: "泪",
            10: "黑线",
            11: "鄙视",
            12: "不高兴",
            13: "真棒",
            14: "钱",
            15: "疑问",
            16: "阴脸",
            17: "吐",
            18: "咦",
            19: "委屈",
            20: "花心",
            21: "呼~",
            22: "笑脸",
            23: "冷",
            24: "太开心",
            25: "滑稽",
            26: "勉强",
            27: "狂汗",
            28: "乖",
            29: "睡觉",
            30: "惊哭",
            31: "生气",
            32: "惊讶",
            33: "喷",
            34: "爱心",
            35: "心碎",
            36: "玫瑰",
            37: "礼物",
            38: "彩虹",
            39: "星星月亮",
            40: "太阳",
            41: "钱币",
            42: "灯泡",
            43: "茶杯",
            44: "蛋糕",
            45: "音乐",
            46: "haha",
            47: "胜利",
            48: "大拇指",
            49: "弱",
            50: "OK"
        }
    },
       {
	        name: "QQ表情",
	        path: "__PUBLIC__/emoji/img/qq/",
	        maxNum: 91,
	        excludeNums: [41, 45, 54],
	        file: ".gif"
	    }]
	});
	keyAction('contents_'+rel);

});

//发表回复
$('.addtalk').click(function(){
	var id = $(this).attr('rel');
	var contents = $('#contents_'+id).html();
	var receiveid = $('#contents_'+id).attr('receiveid');
	$(".addtalk").attr('disabled',true);
	$.post("<?php echo U('task/myReply');?>",{content:contents,talk_id:id,receiveid:receiveid},function(data){
			if(data.status == 1){
				add_after_reply(id);
				var url = "<?php echo U('task/commentShow');?>";
 				$('#talkcontent_'+task_id).load(url,{task_id:task_id});
			}else{
				alert_crm(data.info);
			}
			$(".addtalk").attr('disabled',false);
		},"json"
	);
});
// //点击发表后
function add_after_reply(id){
	$('#contents_'+id).html('');
	$('#add_talk_'+id).prop('disabled',true);
	$('#btnreply_'+id).fadeOut('3000');
	$('#reply_'+id).hide();
}
</script>