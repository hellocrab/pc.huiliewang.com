<?php if (!defined('THINK_PATH')) exit();?><!-- 回款金额统计 -->
<div class="col-sm-6 sort-item" rel="<?php echo ($id); ?>" style="padding:0px;">
	<div class="dash-border" >
		<div class="dash-title" style="padding-left:15px;padding-right:15px;">
			<img src="__PUBLIC__/img/chart.png" style="width:17.5px;" />&nbsp;&nbsp;<?php echo ($title); ?>&nbsp;
			<small>
				<a rel="<?php echo ($id); ?>" class="update" href="javascript:void(0)" id="update_widget"><i class="icon-pencil"></i></a> &nbsp;
				<a rel="<?php echo ($id); ?>" class="delete_month" style="cursor:pointer"><i class="icon-remove"></i></a> &nbsp; 
			</small>
			<a href="<?php echo U('contract/analytics','content_id=2');?>" class="dash-swtich">切换到回款金额统计 >></a>
		</div>
		<div class="content-chart" id="finance_monthly_<?php echo ($id); ?>">
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
	$('.delete_month').click(function(){
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
		var chart = new Highcharts.Chart({
			chart: {
				renderTo: 'finance_monthly_<?php echo ($id); ?>',
				type: 'column'
			},
			title:false,
			subtitle:false,
			 xAxis: {
				categories: []
			},
			yAxis: {
				min: 0,
				title:false
			},
			tooltip: {
				headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
				pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
					'<td style="padding:0"><b>{point.y:.1f} 元</b></td></tr>',
				footerFormat: '</table>',
				shared: true,
				useHTML: true
			},
			plotOptions: {
				column: {
					pointPadding: 0.2,
					borderWidth: 0
				}
			},
			legend: {
				enabled: true
			},
			series: [
				{name: '目标回款金额',data: ''},
				{name: '实际回款金额',data: ''},
			],
			credits: {
				enabled: false  
			} 
		});
		chart.showLoading('拼命加载中...');
		//使用JQuery从后台获取JSON格式的数据赋值到图标
		$.ajax({
			type: "get",
			url: "<?php echo U('contract/getmonthlycontract','type=2'.'&id='.$id);?>", 
			dataType: "json",
			success : function(result){
				var target_data = result.data.target_data;
				var receivingorder_data = result.data.receivingorder_data;
				for(var i=0; i<12; i++) {
				    // parseInt 用于转出整数，parseFloat 用于转换浮点型数值
				    target_data[i] = parseInt(target_data[i]);
				    receivingorder_data[i] = parseInt(receivingorder_data[i]);
				}
				chart.xAxis[0].setCategories(result.data.contract_month);
				chart.series[0].setData(target_data);
				chart.series[1].setData(receivingorder_data);
				chart.hideLoading();
				chart.redraw();
			}
		});
	});
</script>
<!-- 财务月度统计 END-->