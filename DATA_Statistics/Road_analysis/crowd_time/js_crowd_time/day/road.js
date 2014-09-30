// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '拥堵时间日趋势分析',
            x: -20 //center
        },
		credits:{
			enabled: false
			},
		xAxis: {
			categories:[
				'0:00',
				'1:00',
				'2:00',
				'3:00',
				'4:00',
				'5:00',
				'6:00',
				'7:00',
				'8:00',
				'9:00',
				'10:00',
				'11:00',
				'12:00',
				'13:00',
				'14:00',
				'15:00',
				'16:00',
				'17:00',
				'18:00',
				'19:00',
				'20:00',
				'21:00',
				'22:00',
				'23:00',
				'24:00'
				]
			},
			
        yAxis: {
            title: {
                text: '拥堵时间(分钟)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '拥堵时长',
            data: []
        }
		]
    });
});

$(function () {
    $('#pie_container').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false
        },
		credits:{
			enabled: false
			},
        title: {
            text: '拥堵时间日分布'
        },
        tooltip: {
    	    pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    color: '#000000',
                    connectorColor: '#000000',
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            type: 'pie',
            name: '拥堵时间百分比:',
            data: []
        }]
    });
});


$(document).ready(function(e) {
	var def_date = new Date();
	def_year = def_date.getYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone); 
	history_req(def_year,def_month,def_day,def_zone)
	hot_data_req(def_year,def_month,def_day,def_zone)
});

function data_update(data) {
	var max_val = -1;
	var max_val_time=0;
	var avg_val = -1;
	var total_val = 0;
	
	chart_data = data;
	pie_data = new Array();
	pie_data.push(new Array('5分钟以下',0));
	pie_data.push(new Array('5-10分钟',0));
	pie_data.push(new Array('10-20分钟',0));
	pie_data.push(new Array('20分钟以上',0));
	
	for (var i=0;i < data.length;i++) {
		v = data[i];
		if(v>max_val){
			max_val = v;
			max_time = i; 
			}
		total_val+=v;
		if (v<5) pie_data[0][1]+=1/24;
		if (v>=5&&v<10) pie_data[1][1]+=1/24;
		if (v>=10&&v<20) pie_data[2][1]+=1/24;
		if (v>=20) pie_data[3][1]+=1/24;
		//index = parseInt(v/20<5?v/20:4);
		//if (i == 0) {alert(v);alert(index)}
		//pie_data[index][1]+=1/data.length;
		}
		
	$('#max_val').text(parseInt(max_val));
	$('#time').text(parseInt(max_time));
	$('#arv_val').text(parseInt(total_val/24));
	$('#total_val').text(parseInt(total_val))
	$('#chart_container').highcharts().series[0].setData(chart_data);
	$('#pie_container').highcharts().series[0].setData(pie_data);
	}
function history_update(data) {
	$('#his_max_val').text(data[0])
	$('#his_min_val').text(data[1])
	$('#last_arv_max_val').text(data[2])
	$('#last_arv_arv_val').text(data[3])
	$('#last_arv_total_val').text(data[4])
	}
	
	
function hot_data_update(data) {
	$('#xh_max_val').text(data[0][0])
	$('#xh_avg_val').text(data[0][1])
	$('#xh_total_val').text(data[0][2])
	
	
	$('#xc_max_val').text(data[0][0])
	$('#xc_avg_val').text(data[0][1])
	$('#xc_total_val').text(data[0][2])
	
	
	$('#sh_max_val').text(data[0][0])
	$('#sh_avg_val').text(data[0][1])
	$('#sh_total_val').text(data[0][2])
	
	$('#gs_max_val').text(data[0][0])
	$('#gs_avg_val').text(data[0][1])
	$('#gs_total_val').text(data[0][2])
	
	
	
	}	
function history_req(year,month,day,zone) {
	data = generate_his_data()
	history_update(data)
	}

function hot_data_req(year,month,day,zone) {
	data = generate_hot_data()
	hot_data_update(data)
	}

function data_req(year,month,day,zone) {
	data = generate_data()
	data_update(data)
	}
//test funciton
function generate_data() {
	data = new Array()
	for (var i = 0;i<24;i++) {
		v = parseInt(Math.random()*40);
		data.push(v);
		}
	return data;
	}

function generate_his_data() {
	data = new Array()
	data.push(100)
	data.push(200)
	data.push(300)
	data.push(400)
	data.push(1000)
	return data
	}
function generate_hot_data() {
	data = new Array()
	for (var i = 0;i<4;i++) {
		h_data = new Array()
		h_data.push(100)
		h_data.push(200)
		h_data.push(300)
		data.push(h_data)
		}
	return data
	}
