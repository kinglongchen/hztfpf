// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
        chart: {
            zoomType: 'x',
            spacingRight: 20
        },
        title: {
            text: '年拥堵时间分析'
        },
        subtitle: {
            text: document.ontouchstart === undefined ?
                '拖拽放大区域' :
                'Pinch the chart to zoom in'
        },
        xAxis: {
            type: 'datetime',
            maxZoom: 14 * 24 * 3600000, // fourteen days
            title: {
                text: null
            },
			labels:{
				formatter:function() {
					var date = new Date(this.value)
					
					return date.getFullYear()+'-'+(date.getMonth()+1)+'-'+(date.getDate());
					}
				}
        },
        yAxis: {
            title: {
                text: 'Exchange rate'
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

        series: [{
			type: 'area',
            name: '拥堵时间',
            pointInterval: 24 * 3600 * 1000,
            //pointStart: Date.UTC(2006, 0, 01),
			data:[]
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
            text: '拥堵时间年分布'
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
	def_year = def_date.getFullYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone); 
	history_req(def_year,def_month,def_day,def_zone)
	hot_data_req(def_year,def_month,def_day,def_zone)
});

function data_update(year,data) {
	var max_val = -1;
	var max_val_time=0;
	var total_val = 0;
	
	chart_data = data;
	pie_data = new Array();
	pie_data.push(new Array('250分钟以下',0));
	pie_data.push(new Array('250-500分钟',0));
	pie_data.push(new Array('500-750分钟',0));
	pie_data.push(new Array('750分钟以上',0));
	for (var i=0;i < data.length;i++) {
		v=data[i]
		if(v>max_val){
			max_val = v;
			max_val_time = i; 
			}
		total_val+=v;
		
		if (v<250) pie_data[0][1]+=1/data.length;
		if (v>=250&&v<500) pie_data[1][1]+=1/data.length;
		if (v>=500&&v<750) pie_data[2][1]+=1/data.length;
		if (v>=750) pie_data[3][1]+=1/data.length;
		
		}
		
	$('#max_val').text(String(max_val));
	
	
	$('#arv_val').text(parseInt(total_val/data.length));
	$('#total_val').text(String(total_val));
	$('#chart_container').highcharts().series[0].update({
		type: 'area',
        name: '拥堵时间',
        //pointInterval: 24 * 3600 * 1000,
		pointStart: Date.UTC(year, 0, 1),
		data:[]
		})
		
	
	$('#chart_container').highcharts().series[0].setData(chart_data);
	var max_val_date = new Date($('#chart_container').highcharts().series[0].data[max_val_time].x);
	$('#time').text(max_val_date.getFullYear()+'-'+max_val_date.getMonth()+'-'+max_val_date.getDate());
	$('#pie_container').highcharts().series[0].setData(pie_data);
	}

function data_req(year,month,day,zone) {
	data = generate_data(year)
	data_update(year,data)
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
function generate_data(year) {
	var data = new Array()
	var monthStartDate = new Date(year,1,1);
	var monthEndDate = new Date(year+1,1,1);
	var  days  =  (monthEndDate  -  monthStartDate)/(1000  *  60  *  60  *  24);
	for (var i = 0;i<days;i++) {
		//t = i;
		v = parseInt(Math.random()*1000);
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
