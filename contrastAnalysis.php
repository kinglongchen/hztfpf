<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="DATA_Statistics/Contrast_analysis/css/contrast.css" />
<script src="http://webapi.amap.com/maps?v=1.3&key=a1dbe1455fe51c2c903a6b9cd35af2fc"></script>
<script src="js/jquery.js"></script>
<script src="js/Highcharts-4.0.3/js/highcharts.js"></script>
<script src="DATA_Statistics/Contrast_analysis/js/contrast.js"></script>
<script src="js/AMP_F.js"></script>
<script src="js/slider.js"></script>
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
	overflow:hidden;}
a{
	text-decoration:none;
	padding:10px 18px 10px 18px;}
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
	color:#fff;
	font-size:16px; 
	font-family: "Arial", Microsoft YaHei,"微软雅黑",Arial,Helvetica,Geneva,sans-serif;
	}		
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
<script>
var conts_obj = "road_const";
function space_time_change(obj) {
	
	
	document.getElementsByClassName("tabon").item(0).className="taboff";
	obj.className = "tabon"
	Ana_iframe=document.getElementById("Ana_iframe");
	Ana_iframe.src="DATA_Statistics/Contrast_analysis/"+conts_obj+"/"+obj.id+".php";
	
	//if(Ana_iframe.className == 4){Ana_iframe.src="Contrast_analysis/road_const/time.php";}
	//	else if(Ana_iframe.className == 6){Ana_iframe.src="DATA_Statistics/Area_analysis/crowd_road/crowd_road_"+obj.id+".php"}
	//	else if(Ana_iframe.className == 7){Ana_iframe.src="DATA_Statistics/Area_analysis/traf_state/traf_state_"+obj.id+".php"}
	}
</script>

<script>
//function space_time_change(obj) {
//	Ana_iframe=document.getElementById("Ana_iframe");
//	Ana_iframe.src="DATA_Statistics/Contrast_analysis/road_const/"+obj.id+".php";
//	//if(Ana_iframe.className == 4){Ana_iframe.src="Contrast_analysis/road_const/time.php";}
////	else if(Ana_iframe.className == 6){Ana_iframe.src="DATA_Statistics/Area_analysis/crowd_road/crowd_road_"+obj.id+".php"}
////	else if(Ana_iframe.className == 7){Ana_iframe.src="DATA_Statistics/Area_analysis/traf_state/traf_state_"+obj.id+".php"}
//	}
function conts_obj_change(obj,val) {
	
	
	
	document.getElementsByClassName("choose").item(0).className="chooseoff";
	document.getElementsByClassName("font").item(0).className="font2";
	obj.className="font"
	obj.parentNode.className="choose"
	document.getElementsByClassName('tabon').item(0).className='taboff';
	document.getElementById('time_const').className = 'tabon';
	conts_obj = val;
	}
</script>

</head>

<body>
    <div style="margin:0 -8px 0 -8px;">  
    	<div style="height:38px;line-height:38px;padding-right:10px;margin:0 10px 0 20px;"> 
        	<span class="choose"><a href="DATA_Statistics/Contrast_analysis/road_const/time_const.php" target="anaframe" class="font" id="road_cont" onclick="conts_obj_change(this,'road_const')">路段对比</a></span>
        	<span class="chooseoff"><a href="DATA_Statistics/Contrast_analysis/zone_const/time_const.php" target="anaframe" class="font2" id="area_cont" onclick="conts_obj_change(this,'zone_const')">区域对比</a></span>
    	</div>
    </div>
    <div id="main" style="border:2px solid #0150a2;margin:0 10px 0 12px;">
        <div>
            <div style="height:40px; line-height:42px;border-bottom:1px solid #CCC;padding-left:10px;">
                <span><a href="#" class="tabon" id = "time_const" onclick="space_time_change(this)">时间对比</a></span>
                <span><a href="#" class="taboff" id = "space_const" onclick="space_time_change(this)">空间对比</a></span>
            </div>
        </div>
        <iframe id="Ana_iframe" class="7" src="DATA_Statistics/Contrast_analysis/road_const/time_const.php" name="anaframe" width= "100%" height="810" style="border:0;margin:0 0 0 0;"></iframe>
      
        
    </div>
</body>
</html>