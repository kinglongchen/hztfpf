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
            formatter:function() {
				var ymd = (/[\d-]+/).exec(this.series.name)
				var rname = (/[^\d-]+/).exec(this.series.name)
				return '路段：'+rname+'<br>时间：'+ymd+' '+this.x+'月'+'<br>拥堵里程比例：'+this.y;
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
	table_get_data('year',1,data2)
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
	
	
	
	
var zone_name_dic = new Array("西湖区","拱墅区","余杭区","上城区","下城区","萧山区","江干区",'滨江区');
var day_display = new Array('00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00','05:30','06:00','06:30','07:00','07:30','08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30')
var month_display = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30')
var year_display = new Array('一月','二月','三月','四月','五月','六月','七月','八月','九月','十月','十一月','十二月')

function trf_tc_data_req(area_id,args) {
	road_name = zone_name_dic[parseInt(area_id)-1]
	for(var i = 0;i <args.length;i++) {
		var data = new Array()
		data.push(road_name+args[i]);
		data.push(generate_trf_data())
		chart_obj = $('#chart_container')
		data_add(chart_obj,data)
		table_get_data_add("year",area_id,data2)
		}
	
	
	}

function tc_data_req(area_id,date) {
	trf_tc_data_req(area_id,new Array(date));
}

//定于全局数组，只保存数据，不保存时间
var data2=new Array();
function generate_trf_data() {
	var data = new Array()
	data2.length=0;
	for (var i = 0;i<12;i++) {
		t = i+1; 
		v = parseInt(Math.random()*100);
		data.push([t,v]);
		data2.push(v);
		}
	return data;
	}
	
//新建函数，把时间间隔，区域名，当时的拥堵里程比例值填到表格中
function table_get_data(d_m_y,area_id,data)
{
	var tr1_str="";
	var tr2_str="";
	if(d_m_y == "day")
	{
		tr1_str+='<tr style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;"><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			if(i%2 == 0)
			tr1_str+='<th>'+day_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list_head").innerHTML=tr1_str;
	}
	else if(d_m_y == "month")
	{
		tr1_str+='<tr style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;"><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			tr1_str+='<th>'+month_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list_head").innerHTML=tr1_str;
	}
	else if(d_m_y == "year")
	{
		tr1_str+='<tr style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;"><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			tr1_str+='<th>'+year_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list_head").innerHTML=tr1_str;
	}
	area_name = zone_name_dic[parseInt(area_id)-1]
	tr2_str+='<tbody style="height:100px;overflow: auto;"><tr><td>'+area_name+'</td>'
	for(i=0;i<data.length;i++)
	{
		if(d_m_y == "day")
		{
			if(i%2 == 0)
			tr2_str+='<td>'+data[i]+'%</td>'
		}
		else
		tr2_str+='<td>'+data[i]+'%</td>'
	}
	tr2_str+='</tr></tbody>'
	document.getElementById("crowd_mileage_list_body").innerHTML=tr2_str;
}
//定义一个全局变量保存<tr>背景标示符，如果为0，则表格背景色为白色，如果为1，则表格背景色为#e2eaf0
var tr_bgcolor=1;
function table_get_data_add(d_m_y,area_id,data)
{
	var tr2_str="";
	area_name = zone_name_dic[parseInt(area_id)-1]
	if(tr_bgcolor==0) tr2_str+='<tr style="background-color:#e2eaf0"><td>'+area_name+'</td>'
	else tr2_str+='<tr><td>'+area_name+'</td>'
	if(d_m_y == 'day')
	{
		for(i=0;i<data.length;i++)
		{
			if(tr_bgcolor==0)
			{
				if(i%2 == 0)tr2_str+='<td style="background-color:#e2eaf0">'+data[i]+'%</td>'
			}
			else
			{
				if(i%2 == 0)tr2_str+='<td>'+data[i]+'%</td>'
			}
			
		}
	}
	else
	{
		for(i=0;i<data.length;i++)
		{
			if(tr_bgcolor==0) {tr2_str+='<td style="background-color:#e2eaf0">'+data[i]+'%</td>'}
			else {tr2_str+='<td>'+data[i]+'%</td>'}
		}
	}
	tr2_str+='</tr>'
	document.getElementById("crowd_mileage_list_body").innerHTML+=tr2_str;
	if(tr_bgcolor==0)tr_bgcolor=1
	else tr_bgcolor=0;
}	