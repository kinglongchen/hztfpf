// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '拥堵时间月趋势分析',
            x: -20 //center
        },
		credits:{
			enabled: false
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
        title: {
            text: '拥堵时间月分布'
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
            name: 'Browser share',
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
	
	chart_data = new Array();
	categories = new Array();
	pie_data = new Array();
	pie_data.push(new Array('250分钟以下',0));
	pie_data.push(new Array('250-500分钟',0));
	pie_data.push(new Array('500-750分钟',0));
	pie_data.push(new Array('750分钟以上',0));
	
	for (var i=0;i < data.length;i++) {
		
		tv=data[i];
		t = tv[0];
		v = tv[1];
		chart_data.push(v)
		categories.push(t)
		if(v>max_val){
			max_val = v;
			max_time = t; 
			}
		total_val+=v;
		
		if (v<250) pie_data[0][1]+=1/data.length;
		if (v>=250&&v<500) pie_data[1][1]+=1/data.length;
		if (v>=500&&v<750) pie_data[2][1]+=1/data.length;
		if (v>=750) pie_data[3][1]+=1/data.length;
		}
		
	$('#max_val').text(String(max_val));
	$('#time').text(String(max_time));
	$('#arv_val').text(parseInt(total_val/data.length));
	$('#total_val').text(String(total_val));
	$('#chart_container').highcharts().xAxis[0].setCategories(categories)
	
	$('#chart_container').highcharts().series[0].setData(chart_data);
	$('#pie_container').highcharts().series[0].setData(pie_data);
	}


function data_req(year,month,zone) {
	data = generate_data(year,month)
	data_update(data)
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


//test funciton
function generate_data(year,month) {
	var monthStartDate = new Date(year,month,1);
	var monthEndDate = new Date(year,month+1,1);
	var  days  =  (monthEndDate  -  monthStartDate)/(1000  *  60  *  60  *  24);
	data = new Array()
	for (var i = 1;i<=days;i++) {
		t = i;
		v = parseInt(Math.random()*1000);
		
		data.push([t,v]);
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
