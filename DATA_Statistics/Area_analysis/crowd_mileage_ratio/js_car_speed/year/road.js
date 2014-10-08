// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵里程比年趋势分析',
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
            valueSuffix: '%'
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
	def_year = def_date.getYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	data_req(def_year,def_month,def_day,def_zone); 
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)
});

function data_update(data) {
	var max_val = -1;
	var max_val_time=0;
	var avg_val = -1;
	var total_val = 0;
	
	chart_data = data;
	pie_data = new Array();
	for (var i = 0;i<5;i++) {
		pie_data.push(new Array("第"+i+"级",0));
		}
	for (var i=0;i < data.length;i++) {
		tv=data[i];
		t = tv[0];
		v = tv[1];
		if(v>max_val){
			max_val = v;
			max_time = t; 
			}
		total_val+=v;
		index = parseInt(v/20<5?v/20:4);
		//if (i == 0) {alert(v);alert(index)}
		pie_data[index][1]+=1/data.length;
		}
		
//	$('#max_val').text(parseInt(max_val));
//	$('#time').text(parseInt(max_time));
//	$('#arv_val').text(parseInt(total_val/24));
//	$('#total_val').text(parseInt(total_val))
//	$('#chart_container').highcharts().series[0].setData(chart_data);
//	$('#pie_container').highcharts().series[0].setData(pie_data);
tc_data_req('1','2014');
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
	for (var i = 0;i<145;i++) {
		t = i*5/60;
		if (t<36)v =parseInt( Math.random()*10);
		
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

function trf_tc_data_req(road_id,args) {
	if(road_id == 1)road_name="文一路"
	else if(road_id == 2)road_name="古墩路"
	else if(road_id == 3)road_name="凤起路"
	else if(road_id == 4)road_name="东坡路"
	else if(road_id == 5)road_name="平海路"
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		data.push(road_name+args[i]);
		data.push(generate_trf_data())
		chart_obj = $('#chart_container')
		data_add(chart_obj,data)
		}
	
	
	}

function tc_data_req(road_id,date) {
	trf_tc_data_req(road_id,new Array(date));
}

function generate_trf_data() {
	var data = new Array()
	for (var i = 0;i<13;i++) {
		t = i; 
		v = parseInt(Math.random()*100);
		data.push([t,v]);
		}
	return data;
	}
	