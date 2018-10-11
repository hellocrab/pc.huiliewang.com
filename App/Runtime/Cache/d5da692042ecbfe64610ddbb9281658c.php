<?php if (!defined('THINK_PATH')) exit(); if(empty($actionLog)): ?><div class="alert alert-info">没有动态信息</div>
<?php else: ?>
	<div id="list">
	<?php if(is_array($actionLog)): $i = 0; $__LIST__ = $actionLog;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><div class="dy-content" id="anchor_<?php echo ($vo["log_id"]); ?>">
			<div class="title3">
				<?php if(empty($vo['creator']['img'])): ?><img src="__PUBLIC__/img/avatar_default.png" class="avatar"/>
				<?php else: ?>
					<img src="<?php echo ($vo["creator"]["img"]); ?>" class="avatar"/><?php endif; ?>
			</div>
			<div class="role0">
				<p>
					<a href="javascript:void(0)" class="role_info" rel="<?php echo ($vo["creator"]["role_id"]); ?>"><?php echo ($vo["creator"]["user_name"]); ?>（<?php echo ($vo["creator"]["department_name"]); ?> - <?php echo ($vo["creator"]["role_name"]); ?>）</a>
					|<span style="padding-left:10px;"><?php echo ($vo["dynamic"]); ?></span>
				</p>
			</div>
			<?php if($vo['module_name'] == 'sign'): ?><div class="conent0" style="width:100%;">
					<img style="height:15px;vertical-align:text-bottom;" src="__PUBLIC__/img/location.png"></img>
					<span style="color:#666"><?php echo ($vo["address"]); ?></span>
					<input class="longitude" type="hidden" rel="<?php echo ($vo["y"]); ?>"/>
					<a href="javascript:void(0);"style="font-size:12px;" class="pull-right map" >显示地图</a>
					<div id="allmap<?php echo ($key+1); ?>" rel="allmap<?php echo ($key+1); ?>" class="allmap"></div>
					<input class="latitude" type="hidden" rel="<?php echo ($vo["x"]); ?>"/>
				</div>
				<div class="conent0">
					<span style="color:#666">相关客户：<a href="<?php echo U('customer/view','id='.$vo['customer_info']['customer_id']);?>"><?php echo ($vo['customer_info']['name']); ?></a></span>
				</div>
				<div class="conent0">
					<span style="color:#666">签到说明：<?php echo ($vo["log"]); ?></span>
				</div>
				<div class="conent0">
					<div style="color:#666">现场照片：</div>
					<?php if(is_array($vo['sign_img'])): $i = 0; $__LIST__ = $vo['sign_img'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$v): $mod = ($i % 2 );++$i;?><div class="box-secondary" rel="<?php echo ($vo["img_id"]); ?>" style="width:30%;float:left;">
							<a href="<?php echo ($v["path"]); ?>" target="_self" class="litebox" data-litebox-group="group-1">
								<img src="<?php echo ($v["path"]); ?>" class="thumbnail thumb100">
							</a>
						</div><?php endforeach; endif; else: echo "" ;endif; ?>
					<div style="clear:both;"></div>
				</div>
			<?php elseif($vo['module_name'] == 'log'): ?>
				<div class="conent0" style="font-size: 12px;"><?php echo ($vo["create_time"]); ?></div>
				<div class="conent0" id="content_<?php echo ($vo['log_id']); ?>" style="word-wrap: break-word;word-break: normal;padding:10px 20px;padding-top: 10px;"><?php echo ($vo['cut_content']); ?></div>
				<?php if($vo['content_open'] == 1): ?><div class="conent0" style="padding: 0px;">
				    	<div id="open_<?php echo ($vo['log_id']); ?>" class="panel-collapse collapse">
				            <div class="panel-body" style="word-wrap: break-word;word-break: normal;padding-left: 20px;padding-top: 10px;">
				               <?php echo ($vo["log_content"]); ?>
				            </div>
				        </div>
				        <div class="panel-heading" style="padding-left: 20px;">
			                <a data-toggle="collapse" data-parent="#accordion" 
			                href="#open_<?php echo ($vo['log_id']); ?>" class="hide_content" rel="<?php echo ($vo['log_id']); ?>" rel1="0">展开全文</a>
				        </div>
					</div><?php endif; ?>
				<?php if($vo['log_files']): ?><div class="conent0" style="padding-left: 20px;padding-right:10px;margin-right: 10px;border: 1px dashed #d8e3ef;">
						<span class="tsinfo"><img src="__PUBLIC__/img/addFile.png"/><span class="fujian">附件&nbsp;(<?php echo ($vo['file_count']); ?>)</span></span>
						<?php if(is_array($vo['log_files'])): $i = 0; $__LIST__ = $vo['log_files'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$files): $mod = ($i % 2 );++$i;?><div class="file_tr" style="padding: 6px;">
								<img src="__PUBLIC__/productImg/<?php echo ($files['pic']); ?>">&nbsp;
								<a <?php if(in_array(getExtension($files['name']),imgFormat())): ?>class="litebox_file" href="<?php echo ($files['file_path']); ?>" title="点击查看大图"<?php else: ?>href="javascript:;" file="<?php echo ($files["file_path"]); ?>" filename="<?php echo ($files["name"]); ?>" onclick="filedown(this);"<?php endif; ?> title="<?php echo ($files['name']); ?>"><?php echo ($files["cut_name"]); ?></a><span style="color:#646464;">&nbsp;(&nbsp;<?php echo ($files['size']); ?>KB&nbsp;)</span>&nbsp;&nbsp;<a class="controls_file" style="float: right;display: none;" href="javascript:void(0);" file="<?php echo ($files["file_path"]); ?>" filename="<?php echo ($files["name"]); ?>" onclick="filedown(this);" title="<?php echo ($files['name']); ?>">下载</a>
							</div><?php endforeach; endif; else: echo "" ;endif; ?>
					</div><?php endif; ?>
				<div class="conent0" style="padding:10px 20px;height: 35px;">
				<?php if($vo['comment_count'] > 0): ?><div class="pull-left ">
		                <a href="javascript:void(0)" class="log_comment" rel="<?php echo ($vo['log_id']); ?>" rel1="0" rel2 = "<?php echo ($vo['action_id']); ?>">展开评论</a>
			        </div><?php endif; ?>
				<div class="pull-right" style="margin-right: 5px;">
					<a href="javascript:void(0)" class="reply" rel="<?php echo ($vo['action_id']); ?>" rel1="0"><span id="reply_<?php echo ($vo['action_id']); ?>" style="height:35px;font-size:14px;">回复</span></a>
				</div>
				</div>
				<div class="conent0" id="reparynow_<?php echo ($vo['action_id']); ?>" style="padding-left: 20px;padding-right: 20px;display: none;">
					<div id="content_lanage_<?php echo ($vo['action_id']); ?>" class="content_lanage" rel="<?php echo ($vo['action_id']); ?>" contenteditable="true" placeholder="添加回复..."></div>
					<div style="margin-top: 5px;">
						<input type="image" id="btn_emoji_<?php echo ($vo['action_id']); ?>" src="__PUBLIC__/img/emoji.png" />
						<button disabled="true" id="but_sub_<?php echo ($vo['action_id']); ?>" style="display: none;" class="btn btn-primary subit add_language pull-right" rel="<?php echo ($vo['action_id']); ?>" type="button">发 表</button>
					</div>
				</div>
				<div class="conent0" style="padding-left: 20px;padding-right: 20px;">
					<div class="talkcontent" rel="<?php echo ($vo['log_id']); ?>" id="talkcontent_<?php echo ($vo['action_id']); ?>">
						
					</div>
				</div>
			<?php else: ?>
				<div class="conent0" style="font-size: 12px;"><?php echo ($vo["create_time"]); ?></div>
				<div class="conent0"><?php echo ($vo["type"]); ?></div><?php endif; ?>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="weui-infinite-scroll">
		<div class="spiner-example">
			<div class="sk-spinner sk-spinner-three-bounce">
				<div class="sk-bounce1"></div>
				<div class="sk-bounce2"></div>
				<div class="sk-bounce3"></div>
			</div>
		</div>
	</div><?php endif; ?>
<script type="text/javascript">
	$(document).ready(function (){
		$('.litebox').liteBox({
		  revealSpeed: 400,
		  background: 'rgba(0,0,0,.8)',
		  overlayClose: true,
		  escKey: true,
		  navKey: true,
		  errorMessage: '图片加载失败.'
		});
		
		$('.litebox_file').liteBox({
		  revealSpeed: 400,
		  background: 'rgba(0,0,0,.8)',
		  overlayClose: true,
		  escKey: true,
		  navKey: true,
		  errorMessage: '图片加载失败.'
		});
	});

	//地图
	$(document).on("click", ".map", function(){
		$(this).next('.allmap').slideToggle('show');
		var a =$(this).siblings('.longitude').attr('rel');
		var b =$(this).siblings('.latitude').attr('rel');
		var vals = $(this).next('.allmap').attr('rel');
		var url = "<?php echo U('index/gettranslocation');?>"+"&longtitude="+a+"&latitude="+b;
		$.get(url, function(data){
			var x = data.data.x;
			var y = data.data.y;
			setTimeout("mapInit("+y+","+x+","+vals+")",1000);
		})
	});
	function mapInit(x,y,mapID){
				var map = new BMap.Map(mapID);
				var point = new BMap.Point(y, x);
				map.centerAndZoom(point, 15);
				var marker = new BMap.Marker(point);  // 创建标注
				map.addOverlay(marker);               // 将标注添加到地图中
				map.enableScrollWheelZoom(true);
				marker.setAnimation(BMAP_ANIMATION_BOUNCE);
			}
</script>