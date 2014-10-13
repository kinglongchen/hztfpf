// JavaScript Document
$(function () {
    $('#chart_container').highcharts({
		chart: {
			type:"spline"
			},
        title: {
            text: '拥堵里程比月趋势分析',
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
				return '路段：'+rname+'<br>时间：'+ymd+'-'+this.x+'<br>拥堵里程比例：'+this.y;
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
	def_year = def_date.getFullYear();
	def_month = def_date.getMonth();
	def_day = def_date.getDay();
	def_area_id = 1;//默认的区域编号
	//table_get_data("month",1,data2)
	data_req(def_year,def_month,def_day,def_area_id); 
//	history_req(def_year,def_month,def_day,def_zone)
//	hot_data_req(def_year,def_month,def_day,def_zone)
});



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
var zone_name_dic = new Array("西湖区","拱墅区","余杭区","上城区","下城区","萧山区","江干区","滨江区");
var day_display = new Array('00:00','00:30','01:00','01:30','02:00','02:30','03:00','03:30','04:00','04:30','05:00','05:30','06:00','06:30','07:00','07:30','08:00','08:30','09:00','09:30','10:00','10:30','11:00','11:30','12:00','12:30','13:00','13:30','14:00','14:30','15:00','15:30','16:00','16:30','17:00','17:30','18:00','18:30','19:00','19:30','20:00','20:30','21:00','21:30','22:00','22:30','23:00','23:30')
var month_display = new Array('1','2','3','4','5','6','7','8','9','10','11','12','13','14','15','16','17','18','19','20','21','22','23','24','25','26','27','28','29','30','31')
var year_display = new Array('Jan','Feb','Mar','Apr','May','Jun','Jul','Aug','Sept','Oct','Nov','Dec')

function data_req(year,month,day,area_id) {
	area_name = zone_name_dic[parseInt(area_id)-1]
	var data = new Array()
	data.push(area_name+year+'-'+month);
	data.push(generate_data({year:year,month:month,day:day}))
	chart_obj = $('#chart_container')
	data_add(chart_obj,data)
	table_get_data_add("month",area_id,data2)
	}

//定于全局数组，只保存数据，不保存时间
var data2=new Array();
function generate_data(date) {
	var pdate = new Date(date.year,date.month-1,1)
	var ldate = new Date(date.year,date.month,1)
	var daynum = (ldate-pdate)/(1000*60*60*24)
	data2.length=0;
	var data = new Array()
	for (var i = 1;i<=daynum;i++) {
		t = i;
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
		tr1_str+='<tr><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			if(i%2 == 0)
			tr1_str+='<th>'+day_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list").innerHTML=tr1_str;
	}
	else if(d_m_y == "month")
	{
		tr1_str+='<tr><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			tr1_str+='<th>'+month_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list").innerHTML=tr1_str;
	}
	else if(d_m_y == "year")
	{
		tr1_str+='<tr><th>时间</th>'
		for(i=0;i<data.length;i++)
		{
			if(i%2 == 0)
			tr1_str+='<th>'+year_display[i]+'</th>'
		}
		tr1_str+='</tr>'
		document.getElementById("crowd_mileage_list").innerHTML=tr1_str;
	}
	area_name = zone_name_dic[parseInt(area_id)-1]
	tr2_str+='<tr><td>'+area_name+'</td>'
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
	tr2_str+='</tr>'
	document.getElementById("crowd_mileage_list").innerHTML+=tr2_str;
}
function table_get_data_add(d_m_y,area_id,data)
{
	var tr2_str="";
	area_name = zone_name_dic[parseInt(area_id)-1]
	tr2_str+='<tr><td>'+area_name+'</td>'
	if(d_m_y == 'day')
	{
		for(i=0;i<data.length;i++)
		{
			if(i%2 == 0)
			tr2_str+='<td>'+data[i]+'%</td>'
		}
	}
	else
	{
		for(i=0;i<data.length;i++)
		{
			tr2_str+='<td>'+data[i]+'%</td>'
		}
	}
	tr2_str+='</tr>'
	document.getElementById("crowd_mileage_list").innerHTML+=tr2_str;
}