<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<style>
.choose{
	padding:5px 0 5px 0;
	background-color:#eee;
	color:#000;}
.item{
	background-color:#ddd;
	color:#000;}
a{
	text-decoration:none;
	padding:10px 27px 10px 25px;}
#area_choose{
	display:none;}
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
</style>

<script type="text/javascript" src="js/jquery.js"></script>
<script>
//$(".choose").click(function(){
//	choose_obj=document.getElementsByClassName("choose");alert("sss")
//	choose_obj.style.backgroundColor="#eee";
//	this.style.backgroundColor="#fff";
//})
window.onload=window.onresize=function(){
	var iframeid=document.getElementById("Ana_iframe");
	var De=document.documentElement;
	//var Wh=self.innerHeight||(De && De.clientHeight)||document.body.clientHeight;
	var Ww=self.innerWidth ||(De && De.clientWidth) ||document.body.clientWidth;
	iframeid.style.width =(Ww-40)+"px";
	//iframeid.style.height=(Wh-5)+"px";
//	if(document.getElementById)
//	{
//		if (iframeid.contentDocument && iframeid.contentDocument.body.offsetHeight)
//		{
//			iframeid.height = iframeid.contentDocument.body.offsetHeight;
//		}
//		else if(iframeid.Document && iframeid.Document.body.scrollHeight)
//		{
//			iframeid.height = iframeid.Document.body.scrollHeight;
//		}	
//	}
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
	current_tab = selc_tab;
	if(selc_tab=="hot_chart") {
		$("#time_choose").hide()
		//$("#t_itvsetter").hide()
		//$("#trctl_ck_span").hide()
		
		//document.getElementById("time_choose").innerHTML="";
	}
	else {
		$("#time_choose").show()
		//document.getElementsByClassName("titvcls")[0].checked=true
		//$("#t_itvsetter").show()
		//$("#trctl_ck_span").show()
		}
	/*document.getElementById("Ana_iframe").className=obj.className;
	if(obj.className == 1)   //交通状态没有可选的年月日分析，都在一个页面里
	{document.getElementById("time_choose").innerHTML='';}
	else if(obj.className == 4)
	{document.getElementById("time_choose").innerHTML='<span class="item"><a href="#" id="day" onclick="day_month_year(this)">日分析</a></span><span class="item"><a href="#" id="month" onclick="day_month_year(this)">月分析</a></span><span class="item"><a href="#" id="year" onclick="day_month_year(this)">年分析</a></span>';}
	else if(obj.className == 6)
	{document.getElementById("time_choose").innerHTML='<span class="item"><a href="#" id="day" onclick="day_month_year(this)">日分析</a></span><span class="item"><a href="#" id="month" onclick="day_month_year(this)">月分析</a></span><span class="item"><a href="#" id="year" onclick="day_month_year(this)">年分析</a></span>';}
	else if(obj.className == 7)
	{document.getElementById("time_choose").innerHTML='<span class="item"><a href="#" id="day" onclick="day_month_year(this)">日分析</a></span><span class="item"><a href="#" id="month" onclick="day_month_year(this)">月分析</a></span><span class="item"><a href="#" id="year" onclick="day_month_year(this)">年分析</a></span>';}*/
//	obj_parent=obj.parentNode;
//	obj_parent.style.backgroundColor="#fff";
}

var current_tab="traf_state"
function day_month_year(obj)
{
	document.getElementsByClassName("tabon").item(0).className="taboff";
	obj.className = "tabon"
	Ana_iframe=document.getElementById("Ana_iframe");
	Ana_iframe.src="DATA_Statistics/Area_analysis/"+current_tab+"/"+current_tab+"_"+obj.id+".php";
}
</script>
</head>

<body>
<div style="margin:0 -8px 0 -8px">
	<div id="second_top_bar" style="height:38px;line-height:38px;padding-right:10px;margin:0 10px 0 20px;">
    	<span class="choose"><a href="DATA_Statistics/Area_analysis/traf_state/traf_state_day.php" class="font" target="anaframe" onclick="get_num(this,'traf_state')">交通状态</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Area_analysis/crowd_mileage_ratio/crowd_mileage_ratio_day.php" class="font2" target="anaframe" style="padding:10px 21px 10px 21px;" onclick="get_num(this,'crowd_mileage_ratio')">拥堵里程比例</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Area_analysis/crowd_road/crowd_road_day.php" class="font2" target="anaframe" onclick="get_num(this,'crowd_road')">拥堵路段</a></span>
        <span class="chooseoff"><a href="DATA_Statistics/Area_analysis/hot_chart/hot_chart_day.php" class="font2" target="anaframe" style="padding:10px 45px 10px 45px;" onclick="get_num(this,'hot_chart')" >热力图</a></span>
    </div>
    <div style="border:2px solid #0150a2;margin:0 10px 0 20px;">
        <div id="time_choose" style="height:40px; line-height:42px;border-bottom:1px solid #CCC;padding-left:10px;">
            <span class="item"><a href="#" id="day"  class="tabon" onclick="day_month_year(this)">日分析</a></span>
            <span class="item"><a href="#" id="month"  class="taboff" onclick="day_month_year(this)">月分析</a></span>
            <span class="item"><a href="#" id="year" class="taboff" onclick="day_month_year(this)">年分析</a></span>
        </div>
        <!-- 时间的选择、区域的选择、数据来源-->
<!--        <div>
            <span style="margin:20px 0 0 20px;float:left;"><a href="#" onclick='document.getElementById("time_choose").style.display="inline-block"'>时间 ></a><span id="time_choose"><a> 1小时 </a><a> 6小时 </a><a> 12小时 </a><a> 24小时 </a><a> 2天 </a><a> 3天 </a></span></span>
            <span style="margin:20px 0 0 80px;float:left;"><a href="#" onclick='document.getElementById("area_choose").style.display="inline-block"' style="color:#f00;font-weight:bold;">区域选择 ></a><span id="area_choose"><a> 西湖区 </a><a> 上城区 </a><a> 下城区 </a><a> 余杭区 </a><a> 萧山区 </a><a> 拱墅区 </a><a> 滨江区 </a><a> 江干区 </a></span></span>
        </div>
        <div style="clear:both"></div> 
        -->
        <iframe id="Ana_iframe" class="7" src="DATA_Statistics/Area_analysis/traf_state/traf_state_day.php" name="anaframe" height="550" style="border:0;margin:0 0 0 0;"></iframe>
    </div>   <!--到这里为止是下面最大框框的结束-->
</div>
</body>
</html>