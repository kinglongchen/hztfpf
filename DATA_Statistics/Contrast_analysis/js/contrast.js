// JavaScript Document
$(function () {
    $('#trf_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '交通流量对比分析',
            x: -20 //center
        },
		credits: {
				enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+':00';
					}
				},
			
			plotLines:[{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				},{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				}]
			},
        yAxis: {
            title: {
                text: '交通流量'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            formatter:function() {
				var h = parseInt(this.x);
				var h_str = h.toString();
				if (h<10) h_str='0'+h_str
				var m = Math.round((this.x%1)*60);
				var m_str = m.toString()
				if (m<10) m_str = '0'+m_str;
				return '时间：'+h_str+':'+m_str+'<br>车流量：'+this.y+'辆';
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        }/*,
        series: [{
            name: '车流量',
            data: []
        }
		]*/
    });
});

$(function () {
    $('#vhs_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '行车速度对比分析',
            x: -20 //center
        },
		credits: {
				enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+':00';
					}
				},
			plotLines:[{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				},{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				}]
			},
        yAxis: {
            title: {
                text: '行车速度'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
			 formatter:function() {
				var h = parseInt(this.x);
				var h_str = h.toString();
				if (h<10) h_str='0'+h_str
				var m = Math.round((this.x%1)*60);
				var m_str = m.toString()
				if (m<10) m_str = '0'+m_str;
				return '时间：'+h_str+':'+m_str+'<br>行车速度：'+this.y+'公里/小时';
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        }/*,
        series: [{
            name: '车流量',
            data: []
        }
		]*/
    });
});




//#####################################################################
$(function () {
    $('#coi_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵指数对比分析',
            x: -20 //center
        },
		credits: {
				enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+':00';
					}
				},
			plotLines:[{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				},{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				}]
			},
        yAxis: {
            title: {
                text: '拥堵指数'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
             formatter:function() {
				var h = parseInt(this.x);
				var h_str = h.toString();
				if (h<10) h_str='0'+h_str
				var m = Math.round((this.x%1)*60);
				var m_str = m.toString()
				if (m<10) m_str = '0'+m_str;
				return '时间：'+h_str+':'+m_str+'<br>拥堵指数：'+this.y;
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        }/*,
        series: [{
            name: '车流量',
            data: []
        }
		]*/
    });
});



//#####################################################################
$(function () {
    $('#cot_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵时间对比分析',
            x: -20 //center
        },
		credits: {
				enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+':00';
					}
				},
			plotLines:[{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				},{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				}]
			},
        yAxis: {
            title: {
                text: '拥堵时间'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
             formatter:function() {
				var h = parseInt(this.x);
				var h_str = h.toString();
				if (h<10) h_str='0'+h_str
				var m = Math.round((this.x%1)*60);
				var m_str = m.toString()
				if (m<10) m_str = '0'+m_str;
				return '时间：'+h_str+':'+m_str+'<br>拥堵时间：'+this.y+'分钟';
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        }/*,
        series: [{
            name: '车流量',
            data: []
        }
		]*/
    });
});


//#####################################################################
$(function () {
    $('#rst_container').highcharts({
		chart: {
			type:"column"
			},
        title: {
            text: '交通状态对比分析',
            x: -20 //center
        },
		credits: {
				enabled:false
			},
		xAxis: {
			allowDecimals:false,
			labels:{
				formatter:function() {
					return this.value+':00';
					}
				},
			plotLines:[{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:7,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:8.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				},{
                color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:17,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2px
            },{
				color:'red',            //线的颜色，定义为红色
                dashStyle:'longdashdot',//标示线的样式，默认是solid（实线），这里定义为长虚线
                value:18.5,                //定义在那个值上显示标示线，这里是在x轴上刻度为3的值处垂直化一条线
                width:2,                //标示线的宽度，2
				}]
			},
        yAxis: {
            title: {
                text: '状态'
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
             formatter:function() {
				var h = parseInt(this.x);
				var h_str = h.toString();
				if (h<10) h_str='0'+h_str
				var m = Math.round((this.x%1)*60);
				var m_str = m.toString()
				if (m<10) m_str = '0'+m_str;
				return '时间：'+h_str+':'+m_str+'<br>交通状态：'+this.y;
				}
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        }/*,
        series: [{
            name: '车流量',
            data: []
        }
		]*/
    });
});

//var chart_objs = new Array($('#trf_container'),$('#vhs_container'),$('#coi_container'),$('#cot_container'),$('#rst_container'))
function data_update(chart_obj,data) {
	series_remove(chart_obj)
	for (var i = 0 ;i<data.length;i+=2) {
			s_name = data[i];
			s_data = data[i+1];
		data_add(new Array(s_name,s_data))	
		}
	}
	
function setTitle(name) {
		$('#trf_container').highcharts().setTitle({text:name+'交通流量对比分析'})
		$('#vhs_container').highcharts().setTitle({text:name+'行程车速对比分析'})
		$('#coi_container').highcharts().setTitle({text:name+'拥堵指数对比分析'})
		$('#cot_container').highcharts().setTitle({text:name+'拥堵时间对比分析'})
		$('#rst_container').highcharts().setTitle({text:name+'交通状态对比分析'})
	}
	
function data_add(char_obj,data) {
	
	chart_obj.highcharts().addSeries(
		{
		name:data[0],
		data:data[1]
			}
		)
	}
		
function series_remove(chart_obj) {
	var series = chart_obj.highcharts().series;
	sl = series.length;
	for (var i = 0; i<sl;i++) {
		series[0].remove(false)
		}
	chart_obj.highcharts().redraw();
	}
	
//时间对比的方法
function trf_tc_data_req(id,road_name,args,qrytype) {
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		/*data.push(args[i]);
		data.push(generate_trf_data());
		chart_obj = $('#trf_container');
		data_add(chart_obj,data)*/
		data.push(args[i]);
		var ymd = args[i].split('-');
		url = '../../../php/constDataReq.php';
		req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'tf',qrytype:qrytype};
		$.get(url,req_data,function(ret_data) {
			var data_array = Array();
				for (var i = 0;i<ret_data.length;i++) {
					var t = parseInt(ret_data[i][0])*30/60;
					var v = ret_data[i][1];
					data_array.push([t,parseInt(v)]);
					}
				data.push(data_array);
				chart_obj = $('#trf_container');
				data_add(chart_obj,data);
			}
		);
		}
	}

function vhs_tc_data_req(id,road_name,args,qrytype) {
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		/*data.push(args[i]);
		data.push(generate_vhs_data())
		chart_obj = $('#vhs_container')
		data_add(chart_obj,data)*/
		data.push(args[i]);
		var ymd = args[i].split('-');
		url = '../../../php/constDataReq.php';
		req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'cs',qrytype:qrytype};
		$.get(url,req_data,function(ret_data) {
			var data_array = Array();
				for (var i = 0;i<ret_data.length;i++) {
					var t = parseInt(ret_data[i][0])*30/60;
					var v = ret_data[i][1];
					data_array.push([t,Math.round(parseFloat(v)*100)/100]);
					}
				data.push(data_array);
				chart_obj = $('#vhs_container');
				data_add(chart_obj,data);
			}
		);
		}
	}


function coi_tc_data_req(id,road_name,args,qrytype) {
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		/*data.push(args[i]);
		data.push(generate_coi_data())
		chart_obj = $('#coi_container')
		data_add(chart_obj,data)*/
		data.push(args[i]);
		var ymd = args[i].split('-');
		url = '../../../php/constDataReq.php';
		req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ci',qrytype:qrytype};
		$.get(url,req_data,function(ret_data) {
			var data_array = Array();
				for (var i = 0;i<ret_data.length;i++) {
					var t = parseInt(ret_data[i][0])*30/60;
					var v = ret_data[i][1];
					data_array.push([t,Math.round(parseFloat(v)*100)/100]);
					}
				data.push(data_array);
				chart_obj = $('#coi_container');
				data_add(chart_obj,data);
				}
			);
		}
	}
	
function cot_tc_data_req(id,road_name,args,qrytype) {
	
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		/*data.push(args[i]);
		data.push(generate_cot_data())
		chart_obj = $('#cot_container')
		data_add(chart_obj,data)*/
		
		data.push(args[i]);
		var ymd = args[i].split('-');
		url = '../../../php/constDataReq.php';
		req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ct',qrytype:qrytype};
		$.get(url,req_data,function(ret_data) {
			var data_array = Array();
				for (var i = 0;i<ret_data.length;i++) {
					var t = parseInt(ret_data[i][0])*30/60;
					var v = ret_data[i][1];
					data_array.push([t,Math.round(parseFloat(v)*100)/100]);
					}
				data.push(data_array);
				chart_obj = $('#cot_container');
				data_add(chart_obj,data);
				}
			);
		}
	}

function rst_tc_data_req(id,road_name,args,qrytype) {
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		/*data.push(args[i]);
		data.push(generate_rst_data())
		chart_obj = $('#rst_container')
		data_add(chart_obj,data)*/
		data.push(args[i]);
		var ymd = args[i].split('-');
		url = '../../../php/constDataReq.php';
		req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ts',qrytype:qrytype};
		$.get(url,req_data,function(ret_data) {
			var data_array = Array();
				for (var i = 0;i<ret_data.length;i++) {
					var t = parseInt(ret_data[i][0])*30/60;
					var v = ret_data[i][1];
					data_array.push([t,Math.round(parseFloat(v)*100)/100]);
					}
				data.push(data_array);
				chart_obj = $('#rst_container');
				data_add(chart_obj,data);
			}
		);
		}
	}


//路段对比的方法
function trf_rc_data_req(date,id,road_name,qrytype) {
			/*data.push(args[i]);
			data.push(generate_trf_data())
			chart_obj = $('#trf_container')
			data_add(chart_obj,data)*/	
	var ymd = date.split('-');
	var data = new Array();
	data.push(road_name);
	url = '../../../php/constDataReq.php';
	req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'tf',qrytype:qrytype};
	$.get(url,req_data,function(ret_data) {
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = parseInt(ret_data[i][0])*30/60;
				var v = ret_data[i][1];
				data_array.push([t,parseInt(v)]);
		}
		data.push(data_array);
		chart_obj = $('#trf_container');
		data_add(chart_obj,data);
		}
		);	
	}

function vhs_rc_data_req(date,id,road_name,qrytype) {
		
	var ymd = date.split('-');
	var data = new Array();
	data.push(road_name);
	url = '../../../php/constDataReq.php';
	req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ct',qrytype:qrytype};
	$.get(url,req_data,function(ret_data) {
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = parseInt(ret_data[i][0])*30/60;
				var v = ret_data[i][1];
				data_array.push([t,Math.round(parseFloat(v)*100)/100]);
		}
		data.push(data_array);
		chart_obj = $('#vhs_container');
		data_add(chart_obj,data);
		}
		);	
		
	}


function coi_rc_data_req(date,id,road_name,qrytype) {
	
	var ymd = date.split('-');
	var data = new Array();
	data.push(road_name);
	url = '../../../php/constDataReq.php';
	req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ci',qrytype:qrytype};
	$.get(url,req_data,function(ret_data) {
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = parseInt(ret_data[i][0])*30/60;
				var v = ret_data[i][1];
				data_array.push([t,Math.round(parseFloat(v)*100)/100]);
		}
		data.push(data_array);
		chart_obj = $('#coi_container');
		data_add(chart_obj,data);
		}
		);	
	
	
	}
	
function cot_rc_data_req(date,id,road_name,qrytype) {
	/*for(var i = 0;i <args.length;i++) {
		var data = new Array()
		data.push(args[i]);
		data.push(generate_cot_data())
		chart_obj = $('#cot_container')
		data_add(chart_obj,data)
		}
		*/
	var ymd = date.split('-');
	var data = new Array();
	data.push(road_name);
	url = '../../../php/constDataReq.php';
	req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ct',qrytype:qrytype};
	$.get(url,req_data,function(ret_data) {
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = parseInt(ret_data[i][0])*30/60;
				var v = ret_data[i][1];
				data_array.push([t,Math.round(parseFloat(v)*100)/100]);
		}
		data.push(data_array);
		chart_obj = $('#cot_container');
		data_add(chart_obj,data);
		}
		);	
	}

function rst_rc_data_req(date,id,road_name,qrytype) {
		
	var ymd = date.split('-');
	var data = new Array();
	data.push(road_name);
	url = '../../../php/constDataReq.php';
	req_data = {year:ymd[0],month:ymd[1],day:ymd[2],id:id,din:'ts',qrytype:qrytype};
	$.get(url,req_data,function(ret_data) {
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var t = parseInt(ret_data[i][0])*30/60;
				var v = ret_data[i][1];
				data_array.push([t,Math.round(parseFloat(v)*100)/100]);
		}
		data.push(data_array);
		chart_obj = $('#rst_container');
		data_add(chart_obj,data);
		}
		);	
	}

function tc_data_req(id,roadname,date,qrytype) {
	
		setTitle(date);
		trf_tc_data_req(id,roadname,new Array(date),qrytype);
		vhs_tc_data_req(id,roadname,new Array(date),qrytype);
		cot_tc_data_req(id,roadname,new Array(date),qrytype);
		coi_tc_data_req(id,roadname,new Array(date),qrytype);
		rst_tc_data_req(id,roadname,new Array(date),qrytype);
	}

function rc_data_req(date,id,road_name,qrytype) {
		setTitle(road_name);
		trf_rc_data_req(date,id,road_name,qrytype);
		vhs_rc_data_req(date,id,road_name,qrytype);
		cot_rc_data_req(date,id,road_name,qrytype);
		coi_rc_data_req(date,id,road_name,qrytype);
		rst_rc_data_req(date,id,road_name,qrytype);
	}
	
function chart_data_remove() {
	series_remove($('#trf_container'))
	series_remove($('#vhs_container'))
	series_remove($('#coi_container'))
	series_remove($('#cot_container'))
	series_remove($('#rst_container'))
	/*for (var i = 0;i<chart_objs.length;i++) {
		series_remove(chart_objs[i])
		}*/
	
	}
//$(document).ready(function(e) {
//	/*var def_date = new Date();
//	def_year = def_date.getYear();
//	def_month = def_date.getMonth();
//	def_day = def_date.getDay();*/
//	/*args = new Array('9月11号','9月12号','9月13号')
//	
//	trf_data_req(args);
//	vhs_data_req(args);
//	cot_data_req(args);
//	coi_data_req(args);
//	rst_data_req(args);*/
//	tc_data_req('12','2014-9-14');
//	tc_data_req('12','2014-9-15');
//});


//function test
function generate_trf_data() {
	var data = new Array()
	for (var i = 0;i<48;i++) {
		t = i*30/60;
		v = parseInt(Math.random()*100);
		data.push([t,v]);
		}
	return data;
	}
	
function generate_vhs_data() {
	var data = new Array()
	for (var i = 0;i<48;i++) {
		t = i*30/60;
		v = Math.random()*60;
		data.push([t,Math.round(v*100)/100]);
		}
	return data;
	}



function generate_coi_data() {
	var data = new Array()
	for (var i = 0;i<48;i++) {
		t = i*30/60;
		if (t<36)v = Math.random()*10;
		data.push([t,Math.round(v*100)/100]);
		}
	return data;
	}

function generate_cot_data() {
	var data = new Array()
	for (var i = 0;i<48;i++) {
		t = i*30/60;
		if (t<36)v = Math.random()*20;
		data.push([t,Math.round(v*100)/100]);
		}
	return data;
	}

function generate_rst_data() {
	var data = new Array()
	for (var i = 0;i<24;i++) {
		t = i;
		if (t<36)v = parseInt(1+Math.random()*3);
		data.push([t,v]);
		}
	return data;
	}