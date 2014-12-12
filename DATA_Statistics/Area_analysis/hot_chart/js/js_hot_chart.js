// JavaScript Document

var qrytype = 'day';

window.onload=function(){
	var map = new BMap.Map("container");          // 创建地图实例
	var point = new BMap.Point(120.134414,30.265591);
	map.centerAndZoom(point, 13);             // 初始化地图，设置中心点坐标和地图级别
	map.enableScrollWheelZoom(); // 允许滚轮缩放
	if(!isSupportCanvas()){
    	alert('热力图目前只支持有canvas支持的浏览器,您所使用的浏览器不能使用热力图功能');
    }
	heatmapOverlay = new BMapLib.HeatmapOverlay({"radius":20});
	map.addOverlay(heatmapOverlay);
	t_slider.sliderStop=updateHeatmapdata
	document.getElementById("play").onclick=function() {
		if(this.value=="播放") {
			this.value="停止";
			heatmapData_req();
			}
		else {
			this.value = "播放";
			heatmapstop()
			}
	}
	$(".titvcls").change(function() {
		var play = document.getElementById("play");
		qrytype = this.value;
		if(play.value=="停止") {
			play.value = "播放";
			heatmapstop();
			}
		})
	}

	//详细的参数,可以查看heatmap.js的文档 https://github.com/pa7/heatmap.js/blob/master/README.md
	//参数说明如下:
	/* visible 热力图是否显示,默认为true
     * opacity 热力的透明度,1-100
     * radius 势力图的每个点的半径大小   
     * gradient  {JSON} 热力图的渐变区间 . gradient如下所示
     *	{
			.2:'rgb(0, 255, 255)',
			.5:'rgb(0, 110, 255)',
			.8:'rgb(100, 0, 255)'
		}
		其中 key 表示插值的位置, 0~1. 
		    value 为颜色值. 
     */

	//是否显示热力图
function openHeatmap(){
        heatmapOverlay.show();
    }
function closeHeatmap(){
        heatmapOverlay.hide();
    }


function updateHeatmapdata() {
	var points = hm_itvator.popdata();
	heatmapOverlay.setDataSet({data:points,max:100});
	}	
//function setGradient(){
//     /*	格式如下所示:
//		{
//	  		0:'rgb(102, 255, 0)',
//	 	 	.5:'rgb(255, 170, 0)',
//		  	1:'rgb(255, 0, 0)'
//		}*/
//     var gradient = {};
//     var colors = document.querySelectorAll("input[type='color']");
//     colors = [].slice.call(colors,0);
//     colors.forEach(function(ele){
//		gradient[ele.getAttribute("data-key")] = ele.value; 
//     });
//     heatmapOverlay.setOptions({"gradient":gradient});
//    }
	//判断浏览区是否支持canvas
function isSupportCanvas(){
    var elem = document.createElement('canvas');
	return !!(elem.getContext && elem.getContext('2d'));
    }
//function test
cent_point = [120.161564,30.260846]

function generate_heatmap_data() {
	var w = 0.05;
	var h = 0.05;
	var sx = cent_point[0]-w;
	var sy = cent_point[1]-h;
	
	var data = [];
	data_count = 30+parseInt(Math.random()*20);
	for (var i=0;i<data_count;i++) {
		var setx = sx+Math.random()*w;
		var sety = sy+Math.random()*h;
		var setv = parseInt(Math.random()*100);
		data.push({"lng":setx,"lat":sety,"count":setv})
		}
	return data
	}

var hpsto_id = null;
function heatmapplay() {
	if (!t_slider.next(hm_itv,function(){
			updateHeatmapdata();
			})) {
				hpsto_id = setTimeout("heatmapplay()",1000)
				}
	}
	
function heatmapstop() {
	if (hpsto_id) {
		clearTimeout(hpsto_id)
		hhpsto_id=null
		t_slider.resetvalue()
		}
	}
	
var hm_itv = 2400;
var hm_itvator = null;
function heatmapData_req() {
	url = '../../../php/getheatmapdata.php';
	req_data = {qrytype:qrytype};
	var rs = new Array();
	$.get(url,req_data,function(ret_data) {
		hm_itv = 60*60*24/ret_data.length;
		for (var i = 0;i < ret_data.length;i++) {
				var udata = ret_data[i];
				var urs = new Array();
				for (var j = 0;j < udata.length;j++) {
						urs.push({"lng":udata[j].nodex,"lat":udata[j].nodey,"count":udata[j].value});
					}	
				rs.push(urs);		
			}
		hm_itvator = new Itervator(rs);
		heatmapplay();
		}
		);
	}

//##############################################################################################
// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '最繁忙路口',
            x: -20 //center
        },
		credits:{
			enabled: false
			},
		xAxis: {
			categories:[
				'文二路学院路口',
				'天目山路玉古路口',
				'教工路文三路口',
				'海关路学院路口',
				'登云路余杭塘路口',
				'南山路钱王祠路口',
				'东坡路平海路口',
				'古翠路文三路口',
				'留和路小和山路口',
				'建国北路文晖路口'
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
	//data_req(def_year,def_month,def_day,def_zone);
	//heatmapData_req(def_year,def_month,def_day,def_zone);
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
	var max=9;
	do{
			v = parseInt(Math.random()*100);
			}while(v > max)
	for (var i = 0;i<10;i++) {
		if (i<11)v+=1
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