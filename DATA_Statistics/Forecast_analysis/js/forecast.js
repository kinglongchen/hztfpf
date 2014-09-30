// JavaScript Document
var mapObj;
$(function () {
    $('#chart_container').highcharts({
        chart: {
            type: 'spline',
            margin: [ 50, 50, 100, 80]
        },
		credits:{
			enabled:false
			},
        title: {
            text: '预测与实际数据趋势图'
        },
        yAxis: {
            min: 0,
            title: {
                text: '拥堵概率(%)'
            }
        },
        legend: {
            enabled: false
        },
        tooltip: {
            pointFormat: '拥堵概率: <b>{point.y:.1f} %</b>',
        },
		legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
           // borderWidth: 0
        },
        series: [{
            name: '拥堵概率',
            data: [],
            dataLabels: {
                enabled: false,
                rotation: -90,
                color: '#f00',
                align: 'right',
                x: 100,
                y: 10,
                style: {
                    fontSize: '16px',
					fontWeight:'blod',
                    fontFamily: 'Verdana, sans-serif'
                }
            }
        }]
    });
});

var map1

$(document).ready(function(e) {
	var def_date = new Date();
	def_year = def_date.getYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_zone = 1;//默认的区域编号
	//data_req(def_year,def_month,def_day,def_zone);
	map1 =new Map("map_container",1);
	map1.request_rid(generate_roadids(),"../../../HZ/netQRY_rnet.php");	
	map1.set_pl_clk_fun(f_r_diff_data_req);
	chart_data_req(300);
	//chart_crowd_sort();
});

function query_conn_road(p,t) {
	var rnum = parseInt((1-p/100)*450);
	//alert(rnum)
	map1.request_rid(generate_roadids(rnum),"../../../HZ/netQRY_rnet.php");
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
	
function series_add(chart_obj,data) {
	chart_obj.highcharts().addSeries(
		{
		name:data[0],
		data:data[1]
			}
		)
	}

function chart_data_update(datas) {
		var chart_obj = $('#chart_container')
		series_remove(chart_obj);
		chart_obj.highcharts().setTitle({
			text:datas[0]+"预测与实际数据趋势图"
			})
		series_add(chart_obj,datas[1]);
		series_add(chart_obj,datas[2]);
		
	}
	
function chart_data_req(roadid) {
	$.get("../../../HZ/query_rname.php",{roadid:roadid},function(roadname,status) {
		if(roadname=="") return;
		var datas = new Array();
		datas.push(roadname);
		var data = generate_data();
		datas.push(new Array("预测线",data[0]));
		datas.push(new Array("实际线",data[1]));
		chart_data_update(datas);
		})
	}

var f_r_diff_data_req=chart_data_req;

function generate_data() {
	var datas = new Array()
	var f_data = new Array()
	var r_data = new Array()
	for (var i = 0;i<25;i++) {
		var data = Math.random()*100;
		var f_r_dif = 10-Math.random()*20;
		if (Math.random()>0.8) f_r_dif = 40;
		f_data.push(data);
		r_data.push(((data+f_r_dif)>100||(data+f_r_dif)<0)?87:(data+f_r_dif))
		}
	datas.push(f_data);
	datas.push(r_data);
	return datas;
	}
//################拥堵概率排名###########################################################################	
$(function () {                                                                
    $('#crowd_container').highcharts({                                         
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                           
            text: '道路拥堵概率排名'                    
        },        xAxis: {                                                           
            categories: ['凤起路', '教工路', '虎跑路', '曙光路', '天目山路'],
            title: {                                                       
                text: null                                                 
            }                                                              
        },                                                                 
        yAxis: {                                                           
            min: 0,                                                        
            title: {                                                       
                text: '拥堵概率 (%)',                             
                align: 'high'                                              
            },                                                             
            labels: {                                                      
                overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' %'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                    enabled: true                                          
                }                                                          
            }                                                              
        },                                                                 
        legend: {                                                          
            layout: 'vertical',                                            
            align: 'right',                                                
            verticalAlign: 'top',                                          
            x: -40,                                                        
            y: 100,                                                        
            floating: true,                                                
            borderWidth: 1,                                                
            backgroundColor: '#FFFFFF',                                    
            shadow: true                                                   
        },                                                                 
        credits: {                                                         
            enabled: false                                                 
        },                                                                 
        series: [{
			name:'拥堵概率',                                            
            data: [89,77,74,68,67]                                                                   
        }]                                                                 
    });                                                                    
}); 

/*function road_generate_data() {
	data = new Array()
	num=parseInt(Math.random()*100)
	data.push(new Array('文一路',1100+num))
	data.push(new Array('文二路',1000+num))
	data.push(new Array('文三路',900+num))
	data.push(new Array('海曙路',600+num))
	data.push(new Array('学院路',500+num))
	return data;
	}

function chart_crowd_sort()
{
	data=road_generate_data();
	$('#crowd_container').highcharts().series[0].setData(data);
}*/