// JavaScript Document
$(function () {
    $('#chart_traf_flow').highcharts({

        chart: {
            type: 'heatmap',
            //marginTop: 2,
            //marginBottom: 2
        },
		credits: {
			enabled:false
			},

        title: {
            text: '交通状态年趋势分析'
        },

        xAxis: {
			allowDecimals:false,
           // showLastLabel: false,
            tickLength: 5
        },

        yAxis: {
			allowDecimals:false,
			 title: {
                text: null
            },
            labels: {
                format: '{value}月'
            },
            minPadding: 0,
            maxPadding: 0,
            startOnTick: false,
            endOnTick: false,
            //tickPositions: [0, 6, 12, 18, 24],
            tickWidth: 1,
            //reversed: true
        },

        colorAxis: {
             stops: [
                [0, '#08F62C'],
                [0.5, '#F7F707'],
                [1, '#FF1900']
            ],
            min: 1,
            max: 3,
            startOnTick: false,
            endOnTick: false,
            labels: {
                format: '{value}'
            }
        },

        legend: {
            align: 'right',
            layout: 'vertical',
            margin: 0,
            verticalAlign: 'top',
            y: 25,
            symbolHeight: 320
        },

        tooltip: {
            formatter: function () {
                  return '时间：<b>' + this.point.y+'月'+this.point.x+'时' + '</b><br>交通状态值：<b>' +
                    this.point.value + '</b>';
            }
        },

        series: [{
            name: 'Sales per employee',
            //borderWidth: 1,
            data: [],
            dataLabels: {
                enabled: false,
                color: 'black',
                style: {
                    textShadow: 'none',
                    HcTextStroke: null
                }
            }
        }]

    });
});



$(function () {
    $('#chart_crowd_num').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '拥堵指数年趋势分析',
            x: -20 //center
        },
		credits:{
			enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+'月';
					}
				},
			},
        yAxis: {
            title: {
                text: '拥堵指数'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
			formatter:function() {
				return '时间：'+this.x+'月'+'<br>拥堵指数：'+this.y;
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            borderWidth: 0
        },
        series: [{
            name: '拥堵指数',
            data: []
        }
		]
    });
});			


$(function () {
    $('#chart_crowd_time').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵时间年趋势分析',
            x: -20 //center
        },
		credits:{
			enabled: false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+'月';
					}
				}
			
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
		tooltip: {
			formatter:function() {
				return '时间：'+this.x+'月'+'<br>拥堵时间：'+this.y+'分钟';
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
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
    $('#chart_car_speed').highcharts({
       chart: {
			type:"spline"
			},
        title: {
            text: '行程车速日趋势分析',
            x: -20 //center
        },
		credits:{
			enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+'月';
					}
				}
			},
        yAxis: {
            title: {
                text: '行程车速(公里/小时)'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
			
        },
        tooltip: {
			formatter:function() {
				return '时间：'+this.x+'月'+'<br>平均车速：'+this.y+'公里/小时';
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            borderWidth: 0
        },
        series: [{
            name: '车速',
            data: []
        }
		]
    });
});
	

$(document).ready(function(e) {
	var def_date = new Date();
	def_year = def_date.getYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone,'西湖区');
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)
});

var t_itv=5
var max_val_time_l = 0
var max_val_time_r = t_itv/120;

var avg_val = -1;

function state_data_update(data,zone_name) {
	remove_traf_ctb_data();
	var chart_year_data=data;
	for (var i = 0;i<chart_year_data.length;i++) {
		var time = chart_year_data[i][0];
		var month = chart_year_data[i][1];
		var val = chart_year_data[i][2];
		add_traf_ctb_data(i,time,month,val)
		}
	$('#chart_traf_flow').highcharts().series[0].setData(data);
	$('#chart_traf_flow').highcharts().setTitle({text:zone_name+'交通状态年变化情况'});
	}


function ct_data_update(data,zone_name) {
	var max_val = -1;
	var max_val_time=0;
	var total_val = 0;
	var max_val_index=0;
	chart_data = data;
	remove_ctime_ctb_data()
	for (var i=0;i < data.length;i++) {
		tv=data[i];
		t = tv[0];
		v = tv[1];
		add_ctime_ctb_data(i,t,v)
		if(v>max_val){
			max_val = v;
			max_val_time = t;
			max_val_index = i; 
			}
		total_val+=v;
		
		}
	data[max_val_index]={x:max_val_time,y:max_val,color:'#FF0000',marker:{radius:6}}	
	max_val_time_l = max_val_time-t_itv/120;
	max_val_time_r = max_val_time+t_itv/120;
	
	//remove_max_timeband('chart_crowd_time')
//	add_max_timeband('chart_crowd_time',max_val_time_l,max_val_time_r)
	
	avg_val = total_val/data.length
	remove_avg_line('chart_crowd_time')
	add_avg_line('chart_crowd_time',avg_val);
	remove_his_avg_line('chart_crowd_time');
	add_his_avg_line('chart_crowd_time',10);
	//$('#chart_crowd_num').highcharts().series[0].setData(chart_data);
	$('#chart_crowd_time').highcharts().series[0].setData(chart_data,null,null,false);
	$('#chart_crowd_time').highcharts().setTitle({text:zone_name+'拥堵时间年变化情况'})
	//$('#chart_car_speed').highcharts().series[0].setData(chart_data);
	}

function ci_data_update(data,zone_name) {
	
	
	var max_val = -1;
	var max_val_time=0;
	var total_val = 0;
	var max_val_index=0;
	remove_cnum_ctb_data();
	chart_data = data;
	for (var i=0;i < data.length;i++) {
		tv=data[i];
		t = tv[0];
		v = tv[1];
		add_cnum_ctb_data(i,t,v)
		if(v>max_val){
			max_val = v;
			max_val_time = t;
			max_val_index = i; 
			}
		total_val+=v;
		}
	data[max_val_index]={x:max_val_time,y:max_val,color:'#FF0000',marker:{radius:6}}
	max_val_time_l = max_val_time-t_itv/120;
	max_val_time_r = max_val_time+t_itv/120;
	
	avg_val = total_val/data.length 
	remove_avg_line("chart_crowd_num")
	add_avg_line("chart_crowd_num",avg_val)
	remove_his_avg_line("chart_crowd_num")
	add_his_avg_line("chart_crowd_num",4.5)  
	$('#chart_crowd_num').highcharts().series[0].setData(chart_data,null,null,false);
	
	$('#chart_crowd_num').highcharts().setTitle({text:zone_name+'拥堵指数年变化情况'})
	
	//remove_max_timeband("chart_crowd_num")
//	add_max_timeband("chart_crowd_num",max_val_time_l,max_val_time_r)
	
	
	}
function speed_data_update(data,zone_name) {
	
	var max_val = -1;
	var max_val_time=0;
	var total_val = 0;
	var max_val_index=0;
	remove_cspeed_ctb_data();
	chart_data = data;
	for (var i=0;i < data.length;i++) {
		tv=data[i];
		t = tv[0];
		v = tv[1];
		add_cspeed_ctb_data(i,t,v)
		if(v>max_val){
			max_val = v;
			max_val_time = t; 
			max_val_index = i;
			}
		total_val+=v;
		}
	data[max_val_index]={x:max_val_time,y:max_val,color:'#FF0000',marker:{radius:6}}
	max_val_time_l = max_val_time-t_itv/120;
	max_val_time_r = max_val_time+t_itv/120;
	
	avg_val = total_val/data.length 
	remove_avg_line('chart_car_speed')
	add_avg_line('chart_car_speed',avg_val)
	remove_his_avg_line('chart_car_speed')
	add_his_avg_line('chart_car_speed',30)  
	$('#chart_car_speed').highcharts().series[0].setData(chart_data,null,null,false);
	
	$('#chart_car_speed').highcharts().setTitle({text:zone_name+'行程车速年变化情况'})
	//remove_max_timeband("chart_car_speed")
//	add_max_timeband("chart_car_speed",max_val_time_l,max_val_time_r)
	
	
	}


function add_traf_ctb_data(id,time,month,val) {
	var ctbg = id%2==0?'ctbg1':'ctbg2';
	val=val>=2?'拥堵':(val>=1?'一般':'通常');
	var tr = '<tr class='+ctbg+'><td width="25%">'+id+'</td><td width="25%">'+month+'</td><td width="25%">'+time+'</td><td width="25%">'+val+'</td></tr>';
	$('#traf_ctb').append(tr);
	}
function remove_traf_ctb_data() {
	$('#traf_ctb').empty();
	}
function add_ctime_ctb_data(id,time,val) {
	var ctbg = id%2==0?'ctbg1':'ctbg2';
	var tr = '<tr class='+ctbg+'><td width="33%">'+id+'</td><td width="33%">'+time+'</td><td width="33%">'+val+'</td></tr>';
	$('#ctime_ctb').append(tr);
	}
function remove_ctime_ctb_data() {
	$('#ctime_ctb').empty();
	}
function add_cnum_ctb_data(id,time,val) {
	var ctbg = id%2==0?'ctbg1':'ctbg2';
	var tr = '<tr class='+ctbg+'><td width="33%">'+id+'</td><td width="33%">'+time+'</td><td width="33%">'+val+'</td></tr>';
	$('#cnum_ctb').append(tr);
	}
function remove_cnum_ctb_data() {
	$('#cnum_ctb').empty();
	}
function add_cspeed_ctb_data(id,time,val) {
	var ctbg = id%2==0?'ctbg1':'ctbg2';
	var tr = '<tr class='+ctbg+'><td width="33%">'+id+'</td><td width="33%">'+time+'</td><td width="33%">'+val+'</td></tr>';
	$('#cspeed_ctb').append(tr);
	}
function remove_cspeed_ctb_data() {
	$('#cspeed_ctb').empty();
	}




function state_data_req(year,month,day,zoneid,zone_name) {
	/*var data = generate_state_data({year:year,month:month,day:day})
	state_data_update(data,zone_name)*/
	
	url = '../../../php/dataQuery.php';
	req_data = {year:year,month:month,day:day,id:zoneid,din:'ts',qrytype:'zone',timetype:'year'};
	$.get(url,req_data,function(ret_data) {
		var data_array = Array();
			
			
			
			var year_data = ret_data;
			
			var data = new Array()
			
			for (var i = 0;i<year_data.length;i++) {
					var hour = parseInt(year_data[i].hour);
					var month = GetMonthInfo(year_data[i].month);
					var v = year_data[i].value;
					data.push(new Array(hour+1,month,Math.round(v*100)/100))
				}
			state_data_update(data,zone_name);
		}
	);
	
	
	}

function ct_data_req(year,month,day,zoneid,zone_name) {
	/*var data = generate_ct_data({year:year,month:month,day:day})
	ct_data_update(data,zone_name);*/
	url = '../../../php/dataQuery.php';
	req_data = {year:year,id:zoneid,din:'ct',qrytype:'zone',timetype:'year'};
	$.get(url,req_data,function(ret_data) {
		var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = MonthToInt(ret_data[i].create_time);
				var v = ret_data[i].value;
				data_array.push([t,Math.round(v*100)/100]);
				}
				ct_data_update(data_array,zone_name);
		}
	);
	
	}

function ci_data_req(year,month,day,zoneid,zone_name) {
	/*var data = generate_ci_data({year:year,month:month,day:day})
	ci_data_update(data,zone_name);*/
	
	url = '../../../php/dataQuery.php';
	req_data = {year:year,id:zoneid,din:'ci',qrytype:'zone',timetype:'year'};
	$.get(url,req_data,function(ret_data) {
		var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = MonthToInt(ret_data[i].create_time);
				var v = ret_data[i].value;
				data_array.push([t,Math.round(v*100)/100]);
				}
				ci_data_update(data_array,zone_name);
		}
	);
	
	}
function speed_data_req(year,month,day,zoneid,zone_name) {
	/*var data = generate_speed_data({year:year,month:month,day:day})
	speed_data_update(data,zone_name);*/
	
	url = '../../../php/dataQuery.php';
	req_data = {year:year,id:zoneid,din:'cs',qrytype:'zone',timetype:'year'};
	$.get(url,req_data,function(ret_data) {
		var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = MonthToInt(ret_data[i].create_time);
				var v = ret_data[i].value;
				data_array.push([t,Math.round(v*100)/100]);
				}
				speed_data_update(data_array,zone_name);
		}
	);
	
	
	}

function data_req(year,month,day,zoneid,zone_name) {
	state_data_req(year,month,day,zoneid,zone_name);
	ct_data_req(year,month,day,zoneid,zone_name)
	ci_data_req(year,month,day,zoneid,zone_name)
	speed_data_req(year,month,day,zoneid,zone_name)
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


function set_t_itv(itv) {
	t_itv = itv
	}


var chart_array = new Array('#chart_traf_flow','#chart_crowd_time','#chart_crowd_num','#chart_car_speed')

band_id_pref = 'timeband'	
function add_max_timeband(chart_cont,max_val_time_l,max_val_time_r) {
		var chart = $("#"+chart_cont).highcharts();
		chart.xAxis[0].addPlotBand({ // mark the weekend
                color: '#FF7F00',
                from: max_val_time_l,
                to: max_val_time_r,
				id: band_id_pref+chart_cont+'0'
            });
	}
	
function remove_max_timeband(chart_cont) {
		var chart = $("#"+chart_cont).highcharts();
		chart.xAxis[0].removePlotBand(band_id_pref+chart_cont+'0');
	}


/*for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
	}*/

var avg_id_pref="avg_val_line"
function add_avg_line(chart_cont,avg_val) {
	return null;
		var chart = $("#"+chart_cont).highcharts();
		chart.yAxis[0].addPlotLine({ // mark the weekend
              	color:'#1E90FF',            //线的颜色，定义为红色
                dashStyle:'ShortDot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:avg_val,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,               //标示线的宽度，2
				label:{
					text:"平均线",
					style: {
                        color: '#1E90FF',
                        fontWeight: 'bold'
                    }
					},
				id:avg_id_pref+chart_cont+'0'
            });
	}
	
function remove_avg_line(chart_cont) {
	return null;
		var chart = $("#"+chart_cont).highcharts();
		chart.yAxis[0].removePlotLine(avg_id_pref+chart_cont+'0');
	}


var his_avg_id_pref="his_avg_val_line"
function add_his_avg_line(chart_cont,h_avg_val) {
	return null;
		var chart = $("#"+chart_cont).highcharts();
		chart.yAxis[0].addPlotLine({ // mark the weekend
              	color:'#FF0000',            //线的颜色，定义为红色
                dashStyle:'ShortDot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:h_avg_val,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,               //标示线的宽度，2
				label:{
					align:'right',
					text:"历史平均线",
					style: {
                        color: '#FF0000',
                        fontWeight: 'bold'
                    }
					},
				id:his_avg_id_pref+chart_cont+'0'
            });
	
	}
	
function remove_his_avg_line(chart_cont) {
	return null;
		var chart = $("#"+chart_cont).highcharts();
		chart.yAxis[0].removePlotLine(his_avg_id_pref+chart_cont+'0');
	}

	
//test funciton
function generate_state_data(date) {
	
	var data = new Array()
	for (var i=1;i<=24;i++) {
		for (var j=1;j<=12;j++) {
			var rs = Math.random()*3
			data.push(new Array(i,j,rs.toFixed(2)))
			}
		}
	return data;
	}

function generate_ct_data(date) {
	var data = new Array()
	for (var i = 1;i<=12;i++) {
		v = Math.random()*20;
		data.push([i,Math.round(v*100)/100]);
		}
	return data;
	}

function generate_ci_data(date) {
	var data = new Array()
	for (var i = 1;i<=12;i++) {
		v = Math.random()*10;
		data.push([i,Math.round(v*100)/100]);
		}
	return data;
	
	}

function generate_speed_data(date) {
	var data = new Array()
	for (var i = 1;i<=12;i++) {
		v = Math.random()*60;
		data.push([i,Math.round(v*100)/100]);
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
function change_sub(){
	data=generate_data()
	$('#chart_traf_flow').highcharts().series[0].setData(data);
	$('#chart_crowd_time').highcharts().series[0].setData(data);
}