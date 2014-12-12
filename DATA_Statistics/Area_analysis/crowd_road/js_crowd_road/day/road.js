// JavaScript Document
/*document.write("<script type='text/javascript' src='../../../js/Highcharts-4.0.3/js/highcharts.js'></script>")
document.write("<script type='text/javascript' src='../../../js/Highcharts-4.0.3/js/modules/exporting.js'></script>")
document.write("<script type='text/javascript' src='../../../js/Highcharts-4.0.3/js/highcharts.js'></script>")
document.write("<script type='text/javascript' src='../../../js/jquery.js'/>")*/

$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '今日最拥堵的路',
            x: -20 //center
        },
		credits:{
			enabled: false
			},
		xAxis: {
			categories:[
				'学院路',
				'玉古路',
				'教工路',
				'海关路',
				'余杭塘路',
				'南山路',
				'平海路',
				'文三路',
				'留和路',
				'建国北路'
				],
				labels: {
                rotation: -60,
                align: 'right',
                style: {
                    fontSize: '10px',
                    fontFamily: '微软雅黑'
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
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: [{
            name: '拥堵时长',
			data:[]
        }
		]
    });
});

var map1 = null;
$(document).ready(function(e) {
	var def_date = new Date();
	def_year = def_date.getFullYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 0;//默认的区域编号
	data_req(def_year-1,def_month,def_day,def_zone); 
	//map_init();
	map1 =new Map("map_container",1)
	conRoad_req(def_zone,2013,3,12,map1)
});


window.onload = function() {
	
	
	}


function data_update(data) {
	
	var name_data = data[0]
	var chart_data = data[1];
	$('#chart_container').highcharts().xAxis[0].setCategories(name_data)
	$('#chart_container').highcharts().series[0].setData(chart_data);
	}
	
function history_req(year,month,day,zone) {
	data = generate_his_data()
	history_update(data)
	}

function hot_data_req(year,month,day,zone) {
	data = generate_hot_data()
	hot_data_update(data)
	}

function data_req(year,month,day,zone_id) {
		var data = Array();
		url = '../../../php/conRoadSort.php';
		req_data = {year:year,month:month,day:day,id:zone_id,timetype:'day'};
		$.get(url,req_data,function(ret_data) {
			
			var name_array = Array();
			var data_array = Array();
			
			for (var i = 0;i<ret_data.length;i++) {
				var it = ret_data[i];
				name_array.push(it.name);
				data_array.push(parseInt(it.ctime));
				}
			data.push(name_array);
			data.push(data_array);
			data_update(data);
			}
		);
	
	}

function conRoad_req(zone_id,year,month,day) {
		url = '../../../php/cr_query.php';
		req_data = {year:year,month:month,day:day,id:zone_id,timetype:'day'};
		$.get(url,req_data,function(ret_data) {
			
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var road_id = ret_data[i];
				data_array.push(road_id);
				}
			map1.request_rid(data_array,"../../../netQRY_rnet.php");
			}
		);
	}
	
//test funciton
function generate_data() {
	data = new Array()
	var max=19;
	do{
			v = parseInt(Math.random()*100);
			}while(v < max || v >24)
	for (var i = 0;i<10;i++) {
		if (i<11)v-=1.5
		data.push([i,v]);
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
/*var mapObj;
function map_init(){
		
  		var position=new AMap.LngLat(120.150023,30.270743);
 		var mapObj=new AMap.Map("map_container",{
  					view: new AMap.View2D({//创建地图二维视口
  					center:position,//创建中心点坐标
  					zoom:14, //设置地图缩放级别
  					rotation:0 //设置地图旋转角度
 				}),
 			lang:"zh_cn"//设置地图语言类型，默认：中文简体
			});//创建地图实例
	}*/