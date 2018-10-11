<?php if (!defined('THINK_PATH')) exit();?><!-- 财务年度对比 -->
<div class="col-sm-6 sort-item" rel="<?php echo ($id); ?>" style="padding:0px;">
	<div class="dash-border" >
		<div class="dash-title" style="padding-left:15px;padding-right:15px;">
			<img src="__PUBLIC__/img/chart.png" style="width:17.5px;" />&nbsp;&nbsp;<?php echo ($title); ?>&nbsp;
			<small>
				<a rel="<?php echo ($id); ?>" class="update" href="javascript:void(0)" id="update_widget"><i class="icon-pencil"></i></a> &nbsp;
				<a rel="<?php echo ($id); ?>" class="delete_years" style="cursor:pointer"><i class="icon-remove"></i></a> &nbsp; 
			</small>
			<!-- <a href="<?php echo U('finance/analytics','&type_id=3&content_id=1');?>" class="dash-swtich">切换到财务统计 >></a> -->
		</div>
		<div class="content-chart" id="finance_year_<?php echo ($id); ?>">
			<div class="ibox-content">
                <div class="spiner-example" style="padding-top: 0px;">
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
	$('.delete_years').click(function(){
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
	var myChart = echarts.init(document.getElementById('finance_year_<?php echo ($id); ?>'),macarons);
	option = {
		tooltip : {
			trigger: 'axis'
		},
		legend: {
			data:['今年','去年']
		},
		calculable : true,
		xAxis : [
			{
				type : 'category',
				data : ['1月','2月','3月','4月','5月','6月','7月','8月','9月','10月','11月','12月']
			}
		],
		yAxis : [
			{
				type : 'value'
			}
		],
		series : [
			{
				name:'今年',
				type:'bar',
				data:[],
				markPoint : {
					data : [
						{type : 'max', name: '最大值'},
					]
				}
			},
			{
				name:'去年',
				type:'bar',
				data:[],
				markPoint : {
					data : [
						{type : 'max', name: '最大值'}
					]
				}
			}
		]
	};

	$.ajax({
		type: "get",
		url: "<?php echo U('finance/getYearReceiveComparison','id='.$id);?>",
		dataType: "json", //返回数据形式为json
		async: false, //同步执行
		success: function (result) {
			if (result) {
				option.series[0].data = result.data.this_year;
				option.series[1].data = result.data.prev_year;
				myChart.setOption(option);
			}
		},
		error: function (errorMsg) {
			$('#finance_year').html('<span class="error_msg">获取信息失败...</span>');
		}
	});
</script>
<!-- 财务年度对比 END-->