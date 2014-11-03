<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../css/scollbar.css">
<link rel="stylesheet" type="text/css" href="../../../DATA_Statistics/Contrast_analysis/css/contrast.css" />
<script src="http://webapi.amap.com/maps?v=1.3&key=a1dbe1455fe51c2c903a6b9cd35af2fc"></script>
<script src="../../../js/jquery.js"></script>
<script src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script src="../../../DATA_Statistics/Contrast_analysis/js/contrast.js"></script>
<script src="../../../js/AMP_F.js"></script>
<script src="../../../js/slider.js"></script>
<script type="text/javascript" src="../../../js2/common4.js"></script>
<style>
#trf_container,#vhs_container,#coi_container,#cot_container,#rst_container{
	width:100%;
	height:250px;
	margin:10px 0 10px 0;
	padding-bottom:10px;
	border-bottom:1px solid #f00;}
#rst_container{
	border-bottom:none;}
#road_cont,#area_cont{
	padding:5px 10px 5px 10px;
	margin:0 10px 0 10px;
	background-color:#CFC;
	color:#000;
	border-radius:4px;
	overflow:hidden;}
a{
	text-decoration:none;
	color:#000;}
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
'url':'../../../query_road.php', //服务器的地址 
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


function query_road_sec() {
	
	roadname = $('#search').find('#search-text').val();
	$('#rs_slcer').empty()
	$.ajax({ 
		'url':'../../../query_road_sec.php', //服务器的地址 
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
function road_slec_change() {
	chart_data_remove();
	}
	
window.onload=function() {
	var date =new Date()
	tc_data_req("文三路-教工路-学院路",date.getFullYear()+"-"+(date.getMonth()+1)+"-"+date.getDate());
	get_now();
	}
	
//时间选择器显示当前日期
function get_now()
{
	var date=new Date();
	today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	document.getElementById("sub_date").value=today;
}
</script>

</head>

<body>
 <div id="scroll">
                       <div id="scroLeft" style="margin-top:10px">
    <div id="main" style="border:1px solid #000;margin:0 15px 0 15px;">
        <div>
              <form>
            	<!--路段选择：
                <span style="height:20px;margin:0 30px 0 -13px;">
                	<select id = "sroadid" onchange="chart_data_remove()">
                        <option value="1">文一路</option>
                        <option value="2">古墩路</option>
                        <option value="3">凤起路</option>
                        <option value="4">东坡路</option>
                        <option value="5">平海路</option>
                    </select>
                </span>-->
              <span style="margin:17px 0 0 40px;float:left;">
              <div id = "search">  <!--oninput="query_road(this.value)style="color:#ccc;""-->
              	搜索道路：<input id="search-text" name="search-text" type="text" size="20" value="文三路"/>
              	<input type="button" id="submit" value="搜索" onclick="query_road_sec()"/> 
              </div>
              </span>
              
              <span style="margin:19px 0 0 40px;float:left;">
              	选择路段：<select id="rs_slcer" onchange="road_slec_change()">
                	<option value=8>文三路-教工路-学院路</option>>
                </select>
              </span>
              
        
                <span style="margin:19px 0 0 40px;float:left;">
                    选择对比时间:<input type="date" id="sub_date"  onchange="tc_data_req($('#sroadid').val(),this.value)"/>
                </span>
                <span style="margin:19px 0 0 40px;float:left;">
                    <input type="button"  onclick="chart_data_remove()" value="清空"/>
                </span>
            </form>
        </div>
        <div style="clear:both;"></div>
        <div style="margin:0 18px 0 18px">
            <div id="trf_container"></div>
            <div id="vhs_container"></div>
            <div id="coi_container"></div>
            <div id="cot_container"></div>
            <div id="rst_container"></div>
        </div>
    </div>
</div>
                           
                       <div id="scroRight" >
                             <div id="scroLine"></div>
                       </div>
                </div>     
</body>
</html>