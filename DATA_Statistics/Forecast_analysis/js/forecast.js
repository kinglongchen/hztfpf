// JavaScript Document
var mapObj;
$(function () {
    $('#chart_container').highcharts({
        chart: {
           /* type: 'spline',
            margin: [ 50, 50, 100, 80]*/
        },
		credits:{
			enabled:false
			},
        title: {
            text: '预测与实际数据趋势图'
        },
        yAxis: [{
            type: 'logarithmic',
			max:100,
            title: {
                text: '拥堵概率(%)'
            }
        },{ // Secondary yAxis
            //allowDecimals:false,
//			type: 'logarithmic',
			max:3,
            title: {
                text: '交通状态',
                style: {
                    color: '#4572A7'
                }
            },
            labels: {
                style: {
                    color: '#4572A7'
                }
            },
			opposite: true

        }
		
		],
        legend: {
            enabled: false
        },
        tooltip: {
            shared: true
        },
		legend: {
            layout: 'horizontal',
            align: 'center',
            verticalAlign: 'bottom',
           // borderWidth: 0
        },
        series: [/*{
            name: '拥堵概率',
            data: [],
        }*/]
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
	
function series_add(chart_obj,type,yaxis_id,data) {
	chart_obj.highcharts().addSeries(
		{
		type:type,
		yAxis:yaxis_id,
		name:data[0],
		data:data[1],
		tooltip: {
                valueSuffix: yaxis_id==0?'%':''
            }
			}
		)
	}

function chart_data_update(datas) {
		var chart_obj = $('#chart_container')
		series_remove(chart_obj);
		chart_obj.highcharts().setTitle({
			text:datas[0]+"预测与实际数据对比"
			})
		var trf_state_data=new Array();
		for (var i = 0;i<datas[2][1].length;i++) {
			var val = datas[2][1][i];
			var col = "#000000";
			switch(val) {
				case(1):col = "#08F62C";break;
				case(2):col = "#F7F707";break;
				case(3):col = "#FF1900";break;
				default:col = "#000000";break;
				}
			trf_state_data.push({y:val,color:col});
			}
		datas[2][1]=trf_state_data;
		series_add(chart_obj,"column",1,datas[2]);
		series_add(chart_obj,"spline",0,datas[1]);
		
	}
	
function chart_data_req(roadid) {
	$.get("../../../HZ/query_rname.php",{roadid:roadid},function(roadname,status) {
		if(roadname=="") return;
		var datas = new Array();
		datas.push(roadname);
		var data = generate_data();
		datas.push(new Array("预测线",data[0]));
		datas.push(new Array("实际值",data[1]));
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
		var tr_state = parseInt(Math.random()*3+1)
		f_data.push(Math.round(data*100)/100);
		r_data.push(tr_state)
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
            floating: true                                               
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