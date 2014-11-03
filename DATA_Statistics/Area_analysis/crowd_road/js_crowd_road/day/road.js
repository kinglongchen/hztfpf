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
                rotation: -45,
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
            data: [
			22,
			20,
			19.8,
			19,
			18.5,
			17,
			13.7,
			12.2,
			11.9,
			10.4
			]
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
	data_req(def_year,def_month,def_day,def_zone); 
	//map_init();
	var map1 =new Map("map_container",1)
	map1.request_rid(generate_roadids(),"../../../netQRY_rnet.php");
});


window.onload = function() {
	
	
	}


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

function data_req(year,month,day,zone) {
	data = generate_data()
	data_update(data)
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