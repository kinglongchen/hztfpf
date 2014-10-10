// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵里程比月趋势分析',
            x: -20 //center
        },
		credits:{
			enabled:false
			},
        yAxis: {
            title: {
                text: '拥堵里程比例'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter:function() {
				var ymd = (/[\d-]+/).exec(this.series.name)
				var rname = (/[^\d-]+/).exec(this.series.name)
				return '路段：'+rname+'<br>时间：'+ymd+'-'+this.x+'<br>拥堵里程比例：'+this.y;
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'top',
            borderWidth: 0
        }
    });
});



$(document).ready(function(e) {
	var def_date = new Date();
	def_year = def_date.getFullYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone_id = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone_id); 
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)
});



function chart_data_remove() {
	series_remove($('#chart_container'))
	/*for (var i = 0;i<chart_objs.length;i++) {
		series_remove(chart_objs[i])
		}*/
	}


//关于添加路段跟时间
function series_remove(chart_obj) {
	var series = chart_obj.highcharts().series;
	sl = series.length;
	for (var i = 0; i<sl;i++) {
		series[0].remove(false)
		}
	chart_obj.highcharts().redraw();
	}
	

/*function crowd_rc_data_req(date,args) {
	
	}
*/
function data_add(char_obj,data) {
	
	chart_obj.highcharts().addSeries(
		{
		name:data[0],
		data:data[1]
			}
		)
	}
var zone_name_dic = new Array("西湖区","拱墅区","余杭区","上城区","下城区","萧山区","江干区");

function data_req(year,month,day,zone_id) {
	road_name = zone_name_dic[parseInt(zone_id)-1]
	var data = new Array()
	data.push(road_name+year+'-'+month);
	data.push(generate_data({year:year,month:month,day:day}))
	chart_obj = $('#chart_container')
	data_add(chart_obj,data)
	}

function generate_data(date) {
	var pdate = new Date(date.year,date.month-1,1)
	var ldate = new Date(date.year,date.month,1)
	var daynum = (ldate-pdate)/(1000*60*60*24)
	var data = new Array()
	for (var i = 1;i<=daynum;i++) {
		t = i;
		v = parseInt(Math.random()*100);
		data.push([t,v]);
		}
	return data;
	}
	