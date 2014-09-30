// JavaScript Document
var alt_type = 0;
var rc_titles = new Array('交通流量','行车速度');
var rc_serie_names = new Array('交通流量','行车速度');
pie_name = new Array();
pie_name.push(new Array("小于20","20至40之间","40至60之间","60至80之间","80至100之间","大于100"));
pie_name.push(new Array("小于10","10至20之间","20至30之间","30至40之间","40至50之间","大于50"));


$(function () {                                                                
    $('#road_container').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                           
            text: rc_titles[0]                    
        },                                                                 
        yAxis: {                                                           
            min: 0,                                                        
            title: {                                                       
                text: 'Population (millions)',                             
                align: 'high'                                              
            },                                                             
            labels: {                                                      
                overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                     enabled: true,
               		// rotation: -90,
               		 color: '#FFFFFF',
                	 align: 'right',
               		 x: -10,//4
                	 y: 2,//10
                	 style: {
                     	fontSize: '13px',
                     	fontFamily: 'Verdana, sans-serif',
                     	textShadow: '0 0 3px black'
					 }
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
            name: rc_serie_names[0],                                             
            data: [],
			marker: {
				enabled:true,
                symbol: 'triangle'
            }                              
        }] 
		                                                                
    });                                                                    
});


$(function () {                                                                
    $('#zone_container').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                           
            text: '区域交通流量排名'                    
        },                                                                  
        yAxis: {                                                           
            min: 0,                                                        
            title: {                                                       
                text: 'Population (millions)',                             
                align: 'high'                                              
            },                                                             
            labels: {                                                      
                overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                     enabled: true,
               		// rotation: -90,
               		 color: '#FFFFFF',
                	 align: 'right',
               		 x: -10,//4
                	 y: 2,//10
                	 style: {
                     	fontSize: '13px',
                     	fontFamily: 'Verdana, sans-serif',
                     	textShadow: '0 0 3px black'
					 }
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
            name: '交通流量',                                             
            data: []
			                               
        }] 
		                                                                
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
            text: '交通流量分布'
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



$(function () {                                                                
    $('#day_cons_bar').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                         
            text: null                    
        },                                                                 
        yAxis: {                                                          
            title: {                                                       
               enabled:false                                              
            },                                                             
            labels: { 
				enabled:false                                                     
                //overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                     enabled: true,
               		// rotation: -90,
               		 color: '#000000',
                	 align: 'right',
               		 x: -10,//4
                	 y: 2,//10
                	 style: {
                     	fontSize: '8px'
					 }
                }                                                          
            }                                                              
        },                                                                 
        legend: {                                                          
            enabled:false                                                   
        },                                                                 
        credits: {                                                         
            enabled: false                                                 
        }, 
		series: [{                                                         
            name: '拥堵时间',                                             
            data: [],
			marker: {
				enabled:true,
                symbol: 'triangle'
            }                              
        }] 
		                                                                
    });                                                                    
});


$(function () {                                                                
    $('#month_cons_bar').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                         
            text: null                    
        },                                                                 
        yAxis: {                                                          
            title: {                                                       
               enabled:false                                              
            },                                                             
            labels: { 
				enabled:false                                                     
                //overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                     enabled: true,
               		// rotation: -90,
               		 color: '#000000',
                	 align: 'right',
               		 x: -10,//4
                	 y: 2,//10
                	 style: {
                     	fontSize: '8px'
					 }
                }                                                          
            }                                                              
        },                                                                 
        legend: {                                                          
            enabled:false                                                   
        },                                                                 
        credits: {                                                         
            enabled: false                                                 
        }, 
		series: [{                                                         
            name: '拥堵时间',                                             
            data: [],
			marker: {
				enabled:true,
                symbol: 'triangle'
            }                              
        }] 
		                                                                
    });                                                                    
});


$(function () {                                                                
    $('#year_cons_bar').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                         
            text: null                    
        },                                                                 
        yAxis: {                                                          
            title: {                                                       
               enabled:false                                              
            },                                                             
            labels: { 
				enabled:false                                                     
                //overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: ' millions'                                       
        },                                                                 
        plotOptions: {                                                     
            bar: {                                                         
                dataLabels: {                                              
                     enabled: true,
               		// rotation: -90,
               		 color: '#000000',
                	 align: 'right',
               		 x: -10,//4
                	 y: 2,//10
                	 style: {
                     	fontSize: '8px'
					 }
                }                                                          
            }                                                              
        },                                                                 
        legend: {                                                          
            enabled:false                                                   
        },                                                                 
        credits: {                                                         
            enabled: false                                                 
        }, 
		series: [{                                                         
            name: '拥堵时间',                                             
            data: [],
			marker: {
				enabled:true,
                symbol: 'triangle'
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
	//tflow_data_req();
	vspeed_data_req()
	map_init();
});

function road_data_update(data) {
	_name = new Array()
	_data = new Array()
	for (var i = 0; i < data.length;i++) {
		_name.push(data[i][0])
		_data.push(data[i][1])
		}
	$('#road_container').highcharts().xAxis[0].setCategories(_name);
	$('#road_container').highcharts().series[0].setData(_data);
	}
function zone_data_update(data) {
	_name = new Array()
	_data = new Array()
	for (var i = 0; i < data.length;i++) {
		_name.push(data[i][0])
		_data.push(data[i][1])
		}
	$('#zone_container').highcharts().xAxis[0].setCategories(_name);
	$('#zone_container').highcharts().series[0].setData(_data);
	}
	




function pied_data_update(data) {
	pie_data = new Array();
	switch(alt_type){
		case 0:
		}
	pie_data.push(new Array(pie_name[alt_type][0],data[0]));
	pie_data.push(new Array(pie_name[alt_type][1],data[1]));
	pie_data.push(new Array(pie_name[alt_type][2],data[2]));
	pie_data.push(new Array(pie_name[alt_type][3],data[3]));
	pie_data.push(new Array(pie_name[alt_type][4],data[4]));
	sum = 0;
	for (var i=0;i<5;i++) sum+=data[i];
	if (sum<1) {pie_data.push(new Array(pie_name[alt_type][5],1-sum))}
	$('#pie_container').highcharts().series[0].setData(pie_data);
	}
	
	
function cons_road_data_update(data) {
	day = data[0];
	_name = new Array()
	_data = new Array()
	for (var i = 0; i < day.length;i++) {
		_name.push(day[i][0])
		_data.push(day[i][1])
		}
	$('#day_cons_bar').highcharts().xAxis[0].setCategories(_name);
	$('#day_cons_bar').highcharts().series[0].setData(_data);
	
	
	month = data[1];
	_name = new Array()
	_data = new Array()
	for (var i = 0; i < month.length;i++) {
		_name.push(month[i][0])
		_data.push(month[i][1])
		}
	$('#month_cons_bar').highcharts().xAxis[0].setCategories(_name);
	$('#month_cons_bar').highcharts().series[0].setData(_data);
	
	year = data[2];
	_name = new Array()
	_data = new Array()
	for (var i = 0; i < year.length;i++) {
		_name.push(year[i][0])
		_data.push(year[i][1])
		}
	$('#year_cons_bar').highcharts().xAxis[0].setCategories(_name);
	$('#year_cons_bar').highcharts().series[0].setData(_data);
	}
	
function road_data_req() {
	data = road_generate_data()
	road_data_update(data);
	}

function zone_data_req() {
	data = zone_generate_data()
	zone_data_update(data)
	}
function pied_data_req() {
	data = pied_generate_data();
	pied_data_update(data);
	}
function cons_data_req() {
	data = cons_generate_data();
	cons_road_data_update(data);
	}


	
function tflow_data_req() {
	alt_type = 0;
	charts = $('#road_container').highcharts()
	charts.setTitle({ text: rc_titles[alt_type]});
	charts.series[0].name=rc_serie_names[alt_type];
	road_data_req(alt_type);
	zone_data_req(alt_type); 
	pied_data_req(alt_type);
	cons_data_req(alt_type);
	}
	

function vspeed_data_req() {
	alt_type = 1;
	charts = $('#road_container').highcharts();
	charts.setTitle({ text: rc_titles[alt_type]});
	charts.series[0].name=rc_serie_names[alt_type];
	//alert(charts.series[0].name);########################################此处已被注释
	road_data_req(alt_type);
	zone_data_req(alt_type); 
	pied_data_req(alt_type);
	cons_data_req(alt_type);
	}
	

var mapObj;
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
	}
////test funciton
function road_generate_data() {
	data = new Array()
	data.push(new Array('文一路',1100))
	data.push(new Array('文二路',1000))
	data.push(new Array('文三路',900))
	data.push(new Array('海曙路',600))
	data.push(new Array('学院路',500))
	return data;
	}// JavaScript Document

function zone_generate_data() {
	data = new Array()
	data.push(new Array('西湖区',1100))
	data.push(new Array('余杭区',1000))
	data.push(new Array('上城区',900))
	data.push(new Array('下城区',600))
	data.push(new Array('江干区',500))
	return data;
	}

function pied_generate_data() {
	data = new Array();
	data.push(0.16);
	data.push(0.1);
	data.push(0.25);
	data.push(0.2);
	data.push(0.1);
	return data;
	}

function cons_generate_data() {
		data = new Array();
		day_data = new Array();
		day_data.push(new Array('文一路',1100));
		day_data.push(new Array('文二路',1000));
		day_data.push(new Array('文三路',900));
		day_data.push(new Array('海曙路',600));
		day_data.push(new Array('学院路',500));
		data.push(day_data);
		
		
		month_data = new Array();
		month_data.push(new Array('文一路',1100));
		month_data.push(new Array('文二路',1000));
		month_data.push(new Array('文三路',900));
		month_data.push(new Array('海曙路',600));
		month_data.push(new Array('学院路',500));
		data.push(month_data);
		
		
		year_data = new Array();
		year_data.push(new Array('文一路',1100));
		year_data.push(new Array('文二路',1000));
		year_data.push(new Array('文三路',900));
		year_data.push(new Array('海曙路',600));
		year_data.push(new Array('学院路',500));
		data.push(year_data);
		return data;
	}
	