// JavaScript Document
$(function () {
    $('#chart_traf_flow').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '交通状态年趋势分析',
            x: -20 //center
        },
		credits:{
			enabled:false
			},
        yAxis: {
            title: {
                text: '交通状态'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: '°C'
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            borderWidth: 0
        },
        series: [{
            name: '交通状态',
            data: []
        }
		]
    });
});



$(function () {
    $('#chart_crowd_num').highcharts({
        chart: {
            zoomType: 'x',
            spacingRight: 20
        },
        title: {
            text: '拥堵指数年趋势分析'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                '拖拽放大区域' :
                'Pinch the chart to zoom in'
        },
		credits:{
			enabled:false
			},
        xAxis: {
            type: 'datetime',
           // maxZoom: 1 * 48* 1000000, // fourteen days
            title: {
                text: null
            }
        },
        yAxis: {
            title: {
                text: '拥堵指数'
            }
        },
        tooltip: {
            shared: true
        },
        legend: {
            enabled: false
        },
        plotOptions: {
            area: {
                fillColor: {
                    linearGradient: { x1: 0, y1: 0, x2: 0, y2: 1},
                    stops: [
                        [0, Highcharts.getOptions().colors[0]],
                        [1, Highcharts.Color(Highcharts.getOptions().colors[0]).setOpacity(0).get('rgba')]
                    ]
                },
                lineWidth: 1,
                marker: {
                    enabled: false
                },
                shadow: false,
                states: {
                    hover: {
                        lineWidth: 1
                    }
                },
                threshold: null
            }
        },
		xAxis: {
            categories: [
                '1月',
				'2月',
				'3月',
				'4月',
				'5月',
				'6月',
				'7月',
				'8月',
				'9月',
				'10月',
				'11月',
				'12月'
            ],
		},
        series: [{
            type: 'area',
            name: '拥堵指数',
           // pointInterval: 6 * 100000,
            data: [
                0.7437, 0.7432, 0.7461, 0.7461, 0.7454, 0.7549, 0.7742, 0.7801, 0.7903, 0.7876,
                0.7928, 0.7991
			]
        }]
    });
});				


$(function () {
    $('#chart_crowd_time').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '拥堵时间年趋势分析',
            x: -20 //center
        },
		credits:{
			enabled: false
			},
		xAxis: {
			categories:[
				'1月',
				'2月',
				'3月',
				'4月',
				'5月',
				'6月',
				'7月',
				'8月',
				'9月',
				'10月',
				'11月',
				'12月'
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
            type: 'column',
            margin: [ 50, 50, 100, 80]
        },
        title: {
            text: '行程车速年趋势分析'
        },
		credits:{
			enabled:false
			},
        xAxis: {
            categories: [
                '1月',
				'2月',
				'3月',
				'4月',
				'5月',
				'6月',
				'7月',
				'8月',
				'9月',
				'10月',
				'11月',
				'12月'
            ],
        labels: {
                rotation: -45,
                align: 'right',
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        },
        yAxis: {
            min: 0,
            title: {
                text: '车速 (m/s)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '车速: <b>{point.y:.1f} m/s</b>',
        },
		xAxis: {
			categories:[
				'1月',
				'2月',
				'3月',
				'4月',
				'5月',
				'6月',
				'7月',
				'8月',
				'9月',
				'10月',
				'11月',
				'12月'
				]
			},
        series: [{
            name: '车速',
            data: [2.4,3.9,4,12.5, 28,21.7, 11.2,5.5,4.5,4,3.6,3.9,20.11],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: '#f00',
                align: 'right',
                x: 100,
                y: 10,
                style: {
                    fontSize: '13px',
                    fontFamily: 'Verdana, sans-serif',
                    textShadow: '0 0 3px black'
                }
            }
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
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)
});

var t_itv=5
var max_val_time_l = 0
var max_val_time_r = t_itv/120;

var avg_val = -1;

function data_update(data) {
	var max_val = -1;
	var max_val_time=0;
	var total_val = 0;
	
	chart_data = data;
	/*pie_data = new Array();
	for (var i = 0;i<5;i++) {
		pie_data.push(new Array("第"+i+"级",0));
		}*/
	for (var i=0;i < data.length;i++) {
		tv=data[i];
		t = tv[0];
		v = tv[1];
		if(v>max_val){
			max_val = v;
			max_val_time = t; 
			}
		total_val+=v;
		
		}
		
	max_val_time_l = max_val_time-0.5;
	max_val_time_r = max_val_time+0.5;
	
	remove_max_timeband()
	add_max_timeband(max_val_time_l,max_val_time_r)
	
	avg_val = total_val/data.length
	remove_avg_line()
	add_avg_line()
	remove_his_avg_line()
	add_his_avg_line(49)
	
	
	
	$('#chart_traf_flow').highcharts().series[0].setData(chart_data);
	//$('#chart_crowd_num').highcharts().series[0].setData(chart_data);
	$('#chart_crowd_time').highcharts().series[0].setData(chart_data);
	//$('#chart_car_speed').highcharts().series[0].setData(chart_data);
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


function set_t_itv(itv) {
	t_itv = itv
	}


var chart_array = new Array('#chart_traf_flow','#chart_crowd_time','#chart_crowd_num','#chart_car_speed')

var pline_id_pref='trfctl_l'
function add_tfctl_line() {
	
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		chart.xAxis[0].addPlotLine({
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
				id:pline_id_pref+String(i)+'1'
            });
	
	chart.xAxis[0].addPlotLine({
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,               //标示线的宽度，2
				id:pline_id_pref+String(i)+'2'
				});
		
	chart.xAxis[0].addPlotLine({
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
				id:pline_id_pref+String(i)+'3'
            });
	
	chart.xAxis[0].addPlotLine({
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				id:pline_id_pref+String(i)+'4'
				});
		}
		
	}
	
function remove_tfctl_line() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		for (var j = 0;j<4;j++) {
		var id=j+1;
		chart.xAxis[0].removePlotLine(pline_id_pref+String(i)+id);
		}
	}
	
	}
	
band_id_pref = 'timeband'	
function add_max_timeband() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		chart.xAxis[0].addPlotBand({ // mark the weekend
                color: '#FF7F00',
                from: max_val_time_l,
                to: max_val_time_r,
				id: band_id_pref+String(i)+'0'
            });
		}
	}
function remove_max_timeband() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		chart.xAxis[0].removePlotBand(band_id_pref+String(i)+'0');
		}
	}


for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
	}

var avg_id_pref="avg_val_line"
function add_avg_line() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
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
				id:avg_id_pref+String(i)+'0'
            });
		}
	}
	
function remove_avg_line() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		chart.yAxis[0].removePlotLine(avg_id_pref+String(i)+'0');
		}
	
	}


var his_avg_id_pref="his_avg_val_line"
function add_his_avg_line(h_avg_val) {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
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
				id:his_avg_id_pref+String(i)+'0'
            });
	}
	
	}
	
function remove_his_avg_line() {
	for (var i = 0;i<chart_array.length;i++) {
		var chart = $(chart_array[i]).highcharts();
		chart.yAxis[0].removePlotLine(his_avg_id_pref+String(i)+'0');
	}
	
	}

	
//test funciton
function generate_data() {
	dc = (24*60)/t_itv
	data = new Array()
	for (var i = 0;i<dc;i++) {
		t = i*t_itv/60;
		v = Math.random()*100;
		
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
function change_sub(){
	data=generate_data()
	$('#chart_traf_flow').highcharts().series[0].setData(data);
	$('#chart_crowd_time').highcharts().series[0].setData(data);
}