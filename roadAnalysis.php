<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>

<style>
.tabon{
	width:83px;
	height:38px;
	background:url(./img/fxmin.png) no-repeat;
	color:#fff;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}
.taboff{
	width:83px;
	height:38px;
	background:url(./img/fxminoff.png) no-repeat;
	color:#0150a2;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}
.taboff:hover{
	width:83px;
	height:38px;
	background:url(./img/fxmin.png) no-repeat;
	color:#fff;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}	
.choose{
	padding:9px 0 11px 0;
	background:url(./img/tabmax1.png) no-repeat;
	color:#fff;
	overflow:hidden;}
.choose:hover{
	background-color:#fff;}	
.chooseoff{
	padding:9px 0 11px 0;
	background:url(./img/tabmax2.png) no-repeat;
	color:#fff;
	overflow:hidden;}
.chooseoff:hover{
	background:url(./img/tabmax1.png) no-repeat;
	overflow:hidden;}		
.font{
	padding:10px 37px 10px 37px;
	color:#fff;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}	
.font2{
	padding:10px 37px 10px 37px;
	color:#0150a2;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}		
.font2:hover{
	padding:10px 37px 10px 37px;
	color:#fff;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}
.item{
	color:#000;}
a{
	text-decoration:none;
	padding:10px 27px 10px 25px;}
#area_choose{
	display:none;}
/*#pie_container{
	width:400px;}*/
</style>

<style type="text/css">  
#search{  
text-align: center; 
position:relative; 
} 
.autocomplete{ 
border: 1px solid #9ACCFB; 
background-color: white; 
text-align: left; 
} 
.autocomplete li{ 
list-style-type: none; 
} 
.clickable { 
cursor: default; 
} 
.highlight { 
background-color: #9ACCFB; 
} 
</style> 

<script type="text/javascript" src="js/jquery.js"></script>
<script>
//$(".choose").click(function(){
//	choose_obj=document.getElementsByClassName("choose");alert("sss")
//	choose_obj.style.backgroundColor="#eee";
//	this.style.backgroundColor="#fff";
//})
window.onload=window.onresize=function(){
var De=document.documentElement;
//var Wh=self.innerHeight||(De && De.clientHeight)||document.body.clientHeight;
var Ww=self.innerWidth ||(De && De.clientWidth) ||document.body.clientWidth;
document.getElementById("Ana_iframe").style.width =(Ww-40)+"px";
//document.getElementById("Ana_iframe").style.height=(Wh-5)+"px";
get_now();
};

//给Ana_iframe一个标识，在点击年月日分析得时候识别这属于哪一个板块
function get_num(obj,selc_tab)
{
	document.getElementsByClassName("choose").item(0).className="chooseoff";
	document.getElementsByClassName("font").item(0).className="font2";
	obj.className="font"
	obj.parentNode.className="choose"
	document.getElementsByClassName('tabon').item(0).className='taboff';
	document.getElementById('day').className = 'tabon';
	document.getElementsByClassName("titvcls")[0].checked=true
	$("#t_itvsetter").show()
	//document.getElementById("Ana_iframe").className=obj.className;
	current_tab = selc_tab;
	document.getElementById('trctl_ck').checked=false
	if(selc_tab=="traf_state")   //交通状态没有可选的年月日分析，都在一个页面里
	{
		$("#time_choose").hide()
		$("#t_itvsetter").hide()
		$("#trctl_ck_span").hide()
		
		//document.getElementById("time_choose").innerHTML="";
	}
	else {
		$("#time_choose").show()
		document.getElementsByClassName("titvcls")[0].checked=true
		$("#t_itvsetter").show()
		$("#trctl_ck_span").show()
		}
	obj_parent=obj.parentNode;
	obj_parent.style.backgroundColor="#fff";
}

$(document).ready(function(e) {
	$('.titvcls').change(function() {
	  						 document.getElementById('Ana_iframe').contentWindow.set_t_itv(this.value)
	 						 road_analysis()
							}
						) 
	$('#trctl_ck').change(function(e){
		check = document.getElementById('trctl_ck').checked
		
		if (check==true)
			document.getElementById('Ana_iframe').contentWindow.add_tfctl_line()
		if (check==false)
			document.getElementById('Ana_iframe').contentWindow.remove_tfctl_line()
		
		})
			});

/*$('.titvcls').click(function() {
	alert ('asdfasdf')
	}
)
*/
var current_tab="traf_flow"
function day_month_year(obj)
{
	document.getElementsByClassName("tabon").item(0).className="taboff";
	obj.className = "tabon"
	document.getElementById('trctl_ck').checked=false
	if (obj.id != "day") {
		$("#t_itvsetter").hide()
		$("#trctl_ck_span").hide()
		}
	else {
		document.getElementsByClassName("titvcls")[0].checked=true
		$("#t_itvsetter").show()
		$("#trctl_ck_span").show()
		}
	Ana_iframe=document.getElementById("Ana_iframe");
	Ana_iframe.src="DATA_Statistics/Road_analysis/"+current_tab+"/"+current_tab+"_"+obj.id+".php";
	/*if(Ana_iframe.className == 1){Ana_iframe.src="DATA_Statistics/Road_analysis/traf_flow/traf_flow_"+obj.id+".php";}
	else if(Ana_iframe.className == 2){Ana_iframe.src="DATA_Statistics/Road_analysis/car_speed/car_speed_"+obj.id+".php"}
	else if(Ana_iframe.className == 3){Ana_iframe.src="DATA_Statistics/Road_analysis/crowd_num/crowd_num_"+obj.id+".php"}
	else if(Ana_iframe.className == 4){Ana_iframe.src="DATA_Statistics/Road_analysis/crowd_time/crowd_time_"+obj.id+".php"}
	else if(Ana_iframe.className == 5){Ana_iframe.src="DATA_Statistics/Road_analysis/traf_peak/traf_peak_"+obj.id+".php"}
	else if(Ana_iframe.className == 6){Ana_iframe.src="DATA_Statistics/Road_analysis/crowd_road/crowd_road_"+obj.id+".php"}
	else if(Ana_iframe.className == 7){Ana_iframe.src="DATA_Statistics/Road_analysis/traf_state/traf_state_"+obj.id+".php"}*/
}
function get_date(obj)
{
	a=obj.value
	var b=a.split('-');
} 
function query_road_sec() {
	roadname = $('#search').find('#search-text').val();
	$('#rs_slcer').empty()
	$.ajax({ 
		'url':'query_road_sec.php', //服务器的地址 
		'data':{'search-text':roadname}, //参数 
		//'dataType':'json', //返回数据类型 
		'type':'GET', //请求类型 
		'success':function(data){ 
			if(data.length) {
				//遍历data，添加到自动完成区 
				$.each(data, function(index,term) {
					$('<option></option>').text(term[1]).val(term[0]).appendTo($('#rs_slcer'))
					})
				}
			}
	})
	//$('<option></option>').text(roadname).appendTo($('#rs_slcer'));
	}
function road_analysis() {
	road_sec_id = $("#rs_slcer").val()
	road_sec_name = $("#rs_slcer").find("option:selected").text();
	if (road_sec_id==null) road_sec_id=1
	date = $("#date").val()
	if (date==''){
		nowdate = new Date()
		year = nowdate.getFullYear()
		month = nowdate.getMonth()
		day = nowdate.getDate()
		}
	else {
		date = date.split('-')
		year = parseInt(date[0])
		month = parseInt(date[1])-1
		day = parseInt(date[2])
		}
		
	document.getElementById('Ana_iframe').contentWindow.data_req(year,month,day,road_sec_id,road_sec_name)	
		
	
	}
</script>


<script type="text/javascript"> 
$(function(){
//取得div层 
var $search = $('#search'); 
//取得输入框JQuery对象 
var $searchInput = $search.find('#search-text'); 
//关闭浏览器提供给输入框的自动完成 
$searchInput.attr('autocomplete','off'); 
//创建自动完成的下拉列表，用于显示服务器返回的数据,插入在搜索按钮的后面，等显示的时候再调整位置 
var $autocomplete = $('<div class="autocomplete"></div>') 
.hide() 
.insertAfter('#submit'); 
//清空下拉列表的内容并且隐藏下拉列表区 
var clear = function(){ 
$autocomplete.empty().hide(); 
}; 
//注册事件，当输入框失去焦点的时候清空下拉列表并隐藏 
$searchInput.blur(function(){ 
setTimeout(clear,200); 
}); 
//下拉列表中高亮的项目的索引，当显示下拉列表项的时候，移动鼠标或者键盘的上下键就会移动高亮的项目，想百度搜索那样 
var selectedItem = null; 
//timeout的ID 
var timeoutid = null; 
//设置下拉项的高亮背景 
var setSelectedItem = function(item){ 
//更新索引变量 
selectedItem = item ; 
//按上下键是循环显示的，小于0就置成最大的值，大于最大值就置成0 
if(selectedItem < 0){ 
selectedItem = $autocomplete.find('li').length - 1; 
} 
else if(selectedItem > $autocomplete.find('li').length-1 ) { 
selectedItem = 0; 
} 
//首先移除其他列表项的高亮背景，然后再高亮当前索引的背景 
$autocomplete.find('li').removeClass('highlight') 
.eq(selectedItem).addClass('highlight'); 
}; 
var ajax_request = function(){
//ajax服务端通信 
$.ajax({ 
'url':'query_road.php', //服务器的地址 
'data':{'search-text':$searchInput.val()}, //参数 
//'dataType':'json', //返回数据类型 
'type':'GET', //请求类型 
'success':function(data){ 
if(data.length) {
//遍历data，添加到自动完成区 
$.each(data, function(index,term) { 
//创建li标签,添加到下拉列表中 
$('<li></li>').text(term).appendTo($autocomplete) 
.addClass('clickable') 
.hover(function(){ 
//下拉列表每一项的事件，鼠标移进去的操作 
$(this).siblings().removeClass('highlight'); 
$(this).addClass('highlight'); 
selectedItem = index; 
},function(){ 
//下拉列表每一项的事件，鼠标离开的操作 
$(this).removeClass('highlight'); 
//当鼠标离开时索引置-1，当作标记 
selectedItem = -1; 
}) 
.click(function(){ 
//鼠标单击下拉列表的这一项的话，就将这一项的值添加到输入框中 
$searchInput.val(term); 
//清空并隐藏下拉列表 
$autocomplete.empty().hide(); 
}); 
});//事件注册完毕 
//设置下拉列表的位置，然后显示下拉列表 
var ypos = $searchInput.position().top; 
var xpos = $searchInput.position().left; 
$autocomplete.css('width',$searchInput.css('width')); 
$autocomplete.css({'position':'relative','left':xpos + "px",'top':ypos +"px"}); 
setSelectedItem(0); 
//显示下拉列表 
$autocomplete.show(); 
} 
} 
}); 
}; 
//对输入框进行事件注册 
$searchInput 
.keyup(function(event) { 
//字母数字，退格，空格 
if(event.keyCode > 40 || event.keyCode == 8 || event.keyCode ==32) { 
//首先删除下拉列表中的信息 
$autocomplete.empty().hide(); 
clearTimeout(timeoutid); 
timeoutid = setTimeout(ajax_request,200); 
} 
else if(event.keyCode == 38){ 
//上 
//selectedItem = -1 代表鼠标离开 
if(selectedItem == -1){ 
setSelectedItem($autocomplete.find('li').length-1); 
} 
else { 
//索引减1 
setSelectedItem(selectedItem - 1); 
} 
event.preventDefault(); 
} 
else if(event.keyCode == 40) { 
//下 
//selectedItem = -1 代表鼠标离开 
if(selectedItem == -1){ 
setSelectedItem(0); 
} 
else {
//索引加1 
setSelectedItem(selectedItem + 1); 
} 
event.preventDefault(); 
} 
}) 
.keypress(function(event){ 
//enter键 
if(event.keyCode == 13) { 
//列表为空或者鼠标离开导致当前没有索引值 
if($autocomplete.find('li').length == 0 || selectedItem == -1) { 
return; 
} 
$searchInput.val($autocomplete.find('li').eq(selectedItem).text()); 
$autocomplete.empty().hide(); 
event.preventDefault(); 
} 
}) 
.keydown(function(event){ 
//esc键 
if(event.keyCode == 27 ) { 
$autocomplete.empty().hide(); 
event.preventDefault(); 
} 
}); 
//注册窗口大小改变的事件，重新调整下拉列表的位置 
$(window).resize(function() { 
var ypos = $searchInput.position().top; 
var xpos = $searchInput.position().left; 
$autocomplete.css('width',$searchInput.css('width')); 
$autocomplete.css({'position':'relative','left':xpos + "px",'top':ypos +"px"}); 
}); 
}); 

//时间选择器显示当前日期
function get_now()
{
	var date=new Date();
	today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	document.getElementById("date").value=today;
}

</script>

</head>

<body>
<div style="margin:0 -8px 0 -8px">
	

	<div id="second_top_bar" style="height:38px;line-height:38px;padding-right:10px;margin:0 10px 0 20px;">
    	<span class="choose"><a href="DATA_Statistics/Road_analysis/traf_flow/traf_flow_day.php" class="font" target="anaframe" onclick="get_num(this,'traf_flow')">交通流量</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Road_analysis/car_speed/car_speed_day.php" class="font2" target="anaframe" onclick="get_num(this,'car_speed')">行程车速</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Road_analysis/crowd_num/crowd_num_day.php" class="font2" target="anaframe" onclick="get_num(this,'crowd_num')">拥堵指数</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Road_analysis/traf_state/traf_state_day.php" class="font2" target="anaframe" onclick="get_num(this,'traf_state')">交通状态</a></span>
    </div>
    <div style="border:2px solid #0150a2;margin:0 10px 0 20px;">
    	<div id="time_choose" >
            <div style="height:40px; line-height:42px;border-bottom:1px solid #CCC;padding-left:10px;">
                <span class="item"><a href="#" id="day" class="tabon" onclick="day_month_year(this)">日分析</a></span>
                <span class="item"><a href="#" id="month"  class="taboff" onclick="day_month_year(this)">月分析</a></span>
                <span class="item"><a href="#" id="year"  class="taboff" onclick="day_month_year(this)">年分析</a></span>
            </div>
        </div>
        <!-- 时间的选择、区域的选择、数据来源-->
        <div><!--<a href="#" onclick='document.getElementById("time_choose").style.display="inline-block"'>时间 ></a><span id="time_choose"><a> 1小时 </a><a> 6小时 </a><a> 12小时 </a><a> 24小时 </a><a> 2天 </a><a> 3天 </a></span>-->
            <form>
              <span style="margin:15px 0 0 20px;float:left;">
              	<input id='date' type="date" onchange="get_date(this)"/>
              </span>
              <span style="margin:17px 0 0 40px;float:left;">
              <div id = "search">  <!--oninput="query_road(this.value)style="color:#ccc;""-->
              	<input id="search-text" name="search-text" type="text" size="20" value="文三路"/>
              	<input type="button" id="submit" value="搜索" onclick="query_road_sec()"/> 
              </div>
              </span>
              <span style="margin:19px 0 0 40px;float:left;">
              	<select id="rs_slcer" onchange="road_analysis()">
                	<option value=8>文三路-教工路-学院路</option>>
                </select>
              </span>
              
              
              <span id = 't_itvsetter' style="margin:19px 0 0 40px;float:left;">
              	时间间隔：
              	<input class='titvcls' checked="checked" type="radio" name="t_itv" value=5 /> 5分钟
                <input class='titvcls' type="radio" name="t_itv" value=10 /> 10分钟
                <input class='titvcls' type="radio" name="t_itv" value=30 /> 30分钟
                <input class='titvcls' type="radio" name="t_itv" value=60 /> 60分钟
              </span>
              <span id = 'trctl_ck_span' style="margin:19px 0 0 20px;float:left;">
              	<input id = 'trctl_ck' type="checkbox" >限行显示</input>
              </span>
              
            </form>
        </div>
        <div style="clear:both"></div> 
        
        <iframe id="Ana_iframe" class="1" src="DATA_Statistics/Road_analysis/traf_flow/traf_flow_day.php" name="anaframe" height="880" style="border:0;margin:0 0 0 0;"></iframe>
    </div>   <!--到这里为止是下面最大框框的结束-->
</div>
</body>
</html>