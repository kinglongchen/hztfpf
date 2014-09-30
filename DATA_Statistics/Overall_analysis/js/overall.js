// JavaScript Document
var alt_type = 0;
var titles = new Array('交通流量','行车速度','拥堵指数','拥堵时间');
var serie_names = new Array('交通流量','行车速度','拥堵指数','拥堵时间');
var value_sufs=new Array('辆','公里/小时')
pie_name = new Array();
pie_name.push(new Array("小于20","20至40之间","40至60之间","60至80之间","80至100之间","大于100"));
pie_name.push(new Array("小于10","10至20之间","20至30之间","30至40之间","40至50之间","大于50"));
pie_name.push(new Array("小于0.1","0.1至0.4","0.4至0.6","0.6至0.7","0.6至0.7","0.6至01"));
pie_name.push(new Array("小于5分钟","5至8分钟","8至11分钟","11至13分钟","13至15分钟","大于15分钟"));

$(function () {                                                                
    $('#road_container').highcharts({                                           
        chart: {                                                           
            type: 'bar'                                                    
        },                                                                 
        title: {                                                           
            text: '路段'+titles[0]+'排名'                    
        },                                                                 
        yAxis: {                                                           
            min: 0,                                                        
            title: {                                                       
                text: null,                             
                align: 'high'                                              
            },                                                             
            labels: {                                                      
                overflow: 'justify'                                        
            }                                                              
        },                                                                 
        tooltip: {                                                         
            valueSuffix: value_sufs[0]                                       
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
			enabled:false,                                                        
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
            name: serie_names[0],                                             
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
            text: '区域'+titles[0]+'排名'                    
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
            valueSuffix: value_sufs[0]                                       
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
			enabled:false,                                                         
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
            name: serie_names[0],                                             
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
            text: titles[0]+'分布'
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
            name: serie_names[0],
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
	tflow_data_req();
	//vspeed_data_req();
	//constime_data_req()
	//map_init();
	var map = new Map("map_container",1);
	map.request_rid(generate_roadids(),"../../../HZ/netQRY_rnet.php");	
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

function alt_data_upate() {
	charts = $('#road_container').highcharts()
	charts.setTitle({ text: '路段'+titles[alt_type]+'排名'});
	charts.series[0].name=serie_names[alt_type];
	
	charts = $('#zone_container').highcharts()
	charts.setTitle({ text: '路段'+titles[alt_type]+'排名'});
	
	
	charts.series[0].name=serie_names[alt_type];
	
	pie_charts = $('#pie_container').highcharts()
	pie_charts.setTitle({ text: titles[alt_type]+'分布'});
	road_data_req(alt_type);
	zone_data_req(alt_type); 
	pied_data_req(alt_type);
	cons_data_req(alt_type);
	}

	
function tflow_data_req() {
	alt_type = 0;
	alt_data_upate();
	}
	

function vspeed_data_req() {
	alt_type = 1;
	alt_data_upate();
	}

function consindex_data_req() {
	alt_type = 2;
	alt_data_upate();
	}	

function constime_data_req() {
	alt_type = 3;
	alt_data_upate();
	}

////test funciton
function road_generate_data() {
	data = new Array()
	num=parseInt(Math.random()*100)
	data.push(new Array('文一路',1100+num))
	data.push(new Array('文二路',1000+num))
	data.push(new Array('文三路',900+num))
	data.push(new Array('海曙路',600+num))
	data.push(new Array('学院路',500+num))
	return data;
	}// JavaScript Document

function zone_generate_data() {
	data = new Array()
	num=parseInt(Math.random()*100)
	data.push(new Array('西湖区',1100+num))
	data.push(new Array('余杭区',1000+num))
	data.push(new Array('上城区',900+num))
	data.push(new Array('下城区',600+num))
	data.push(new Array('江干区',500+num))
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

//选择时段的函数
function day_month_year()
{
	time_choose_value=document.getElementById("time_choose").value;   //这边写了年月日的部分，但是暂时未用到，只要刷新就好
	tflow=document.getElementById("tflow");
	vspeed=document.getElementById("vspeed");
	consindex=document.getElementById("consindex");
	constime=document.getElementById("constime");
	//alert(tflow.checked+","+vspeed.checked+","+consindex.checked+","+constime.checked)
	if(tflow.checked!=false){tflow_data_req()}
	else if(vspeed.checked!=false){vspeed_data_req()}
	else if(consindex.checked!=false){consindex_data_req()}
	else if(constime.checked!=false){constime_data_req()}
}	