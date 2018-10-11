<?php if (!defined('THINK_PATH')) exit();?><!-- 客户来源 -->
<div class="col-sm-6  sort-item" rel="<?php echo ($id); ?>" style="padding:0px;">
	<div class="dash-border" >
		<div class="dash-title" style="padding-left:15px;padding-right:15px;">
			<img src="__PUBLIC__/img/chart.png" style="width:17.5px;" />&nbsp;&nbsp;<?php echo ($title); ?>&nbsp;
			<small>
				<a rel="<?php echo ($id); ?>" class="update" href="javascript:void(0)" id="update_widget"><i class="icon-pencil"></i></a> &nbsp;
				<a rel="<?php echo ($id); ?>" class="delete_customer" style="cursor:pointer"><i class="icon-remove"></i></a> &nbsp; 
			</small>
			<a href="<?php echo U('customer/analytics','&type_id=1&content_id=1');?>" class="dash-swtich"> 切换到客户统计>></a>
		</div>
		<div class="content-chart" id="customer_original_<?php echo ($id); ?>">
			<div class="ibox-content">
                <div class="spiner-example" style="padding-top: 0px;" >
                    <div class="sk-spinner sk-spinner-three-bounce">
                        <div class="sk-bounce1"></div>
                        <div class="sk-bounce2"></div>
                        <div class="sk-bounce3"></div>
                    </div>
                </div>
            </div>
		</div>
	</div>
</div>
<script type="text/javascript">
	$('.delete_customer').click(function(){
		var id = $(this).attr('rel');
		swal({
			title: "",
			text: "确定要删除吗？",
			type: "warning",
			showCancelButton: true,
			closeOnConfirm: false
		},
		function(){
			window.location.href = "index.php?m=index&a=widget_delete&id="+id;
		});
	});
	$(function () {
		var myChart<?php echo ($id); ?> = echarts.init(document.getElementById('customer_original_<?php echo ($id); ?>'),macarons);
		option = {
			tooltip : {
				trigger: 'item',
				formatter: "{a} <br/>{b} : {c} ({d}%)"
			},
			legend: {
				show:true,
				orient : 'horizontal',
				y : '85%',
				data:[]
			},
			toolbox: {
				feature : {
					magicType : {
						show: true, 
						type: ['pie', 'funnel']
					}
				}
			},
			series : [
				{
					name:'客户来源',
					type:'pie',
					radius : '70%',
					center: ['50%', '45%'],
					itemStyle: {
						normal: {
							label: {
								show: false
							},
							labelLine: {
								show: false
							}
						},
						emphasis: {
							label: {
								show: true,
								position: 'outer'
							},
							labelLine: {
								show: true,
								lineStyle: {
									color: 'red'
								}
							}
						}
					},
					data:[]
				}
			]
		};
		//使用Ajax从后台获取JSON格式的数据赋值到图标
		$.ajax({
			type: "get",
			url: "<?php echo U('customer/getcustomeroriginal','id='.$id);?>",
			dataType: "json", //返回数据形式为json
			success: function (result) {
				if (result) {
					option.legend.data = result.data.legend;
					option.series[0].data = result.data.series;
					myChart<?php echo ($id); ?>.setOption(option);
				}
			},
			error: function (errorMsg) {
				$("#customer_original_<?php echo ($id); ?>").html('<span class="error_msg">获取信息失败...</span>');
			}
		});
	})
</script>
<!-- 客户来源 END-->