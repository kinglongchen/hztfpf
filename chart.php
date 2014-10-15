<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml"><head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<style type="text/css">
body{margin:0;padding:0;height:100%;font-family:"微软雅黑", Verdana, sans-serif;overflow: auto;color:#555555;	overflow-x:auto;}
ul{-webkit-padding-start: 0; -webkit-margin-after: 0;-webkit-margin-before: 0;}
</style>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/menu_min.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu-css.css">
<link rel="stylesheet" type="text/css" href="css/choose.css">
<script type="text/javascript">
$(document).ready(function (){ 

  $(".menu ul li").menu();

  }); 

function stop(){ 
		return false; 
		} 
		document.oncontextmenu=stop; 
		
window.onload=window.onresize=function(){
var de=document.documentElement;
var wh=self.innerHeight||(de && de.clientHeight)||document.body.clientHeight;
var ww=self.innerWidth ||(de && de.clientWidth) ||document.body.clientWidth;
document.getElementById("ifra").style.width =(ww-101)+"px";
document.getElementById("ifra").style.height=(wh-102)+"px";
};

//增加一个对sidebar改变背景色的函数
function sidebar_bcolor(obj)
{
	Road_A_obj=document.getElementById("Road_A")
	Area_A_obj=document.getElementById("Area_A")
	Contrast_A_obj=document.getElementById("Contrast_A")
	Overall_A_obj=document.getElementById("Overall_A")
	Forecast_A_obj=document.getElementById("Forecast_A")
	
	if(Road_A_obj.style.backgroundColor != ""){Road_A_obj.style.background = ""}
	else if(Area_A_obj.style.backgroundColor != ""){Area_A_obj.style.background = ""}
	else if(Contrast_A_obj.style.backgroundColor != ""){Contrast_A_obj.style.background = ""}
	else if(Overall_A_obj.style.backgroundColor != ""){Overall_A_obj.style.background = ""}
	else if(Forecast_A_obj.style.backgroundColor != ""){Forecast_A_obj.style.background = ""}
	
	obj.style.background="url(./img/choose.png)";
}
</script>

<title>交通信息统计与分析</title>
</head>

<body style="overflow-y:hidden;overflow-x:hidden;">
	 <!----------------------------------------------标题栏----------------------------------------------------------->
<div id="header" style="height:70px;width:100%;background-size:100% 100%;float:left;overflow:hidden;background:url(./img/barbg.png);" >
         <div style="width:320px;height:50px;float:left;background: url(./img/logo.png) no-repeat;; margin:10px 0 0 20px;">
         </div>
         
          <div id="conPad" style="width:365px;height:100%;overflow:hidden;float:right;">
           
            <div style="width:400px;height:100%;float:left;overflow:hidden;">
               <div  class="topbtn" style="margin:0 4px 0 4px;">
                   <a  href="traffic.php" style="margin-left:1.5px;"> 
                    <img src=img/jiaotong2.png  height="45" width="45" alt="" border="0">
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">路况显示</h>
                </div>
                <div class="topbtn"   style="background:url(./img/barbg2.png);">
                    <a  href="chart.php"  style="margin-left:1.5px;">
                    <img src=img/tongjis.png  height="45" width="45" alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">数据统计</h>
                </div>
                <div class="topbtn">
                    <a  href="dataManage.html" style="margin-left:1.5px;">
                    <img src=img/guanlis.png  height="45" width="45"  alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">信息管理</h>
                </div>    
                <div class="topbtn">
                   <a  href="#" style="margin-left:1.5px;">
                    <img src=img/youdaos.png   height="45" width="45"  alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">诱导发布</h>
                </div>
            </div> 
                          
	    </div> 
         
     </div>
     
        <div id="inforbar" > 
        	<marquee id="marquee" onMouseOver="this.stop()" onMouseOut="this.start();" style="height:20px;margin-top:2px;"> 
				<!--<iframe name="sinaWeatherTool" src="http://weather.news.sina.com.cn/chajian/iframe/weatherStyle0.html?city=%E6%9D%AD%E5%B7%9E" 			 					width="200" height="20" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>-->
            </marquee>
         </div> 
      	<!----------------------侧边栏------------------------------------>
    


    
    <div id="sideMenu" style="width:100px;border-right:#CCC 1px solid;float:left;background:#1e62a9;">
        <div class="menu" style="width:100%;">
        	<div style="height:20px;"></div>
                 <ul>
                    <li >
                    	<a href="roadAnalysis.php" target="showframe" id="Road_A" onclick="sidebar_bcolor(this)" style=" background:url(./img/choose.png);"><img src="./img/sjjc.png" /><div  class="menufont">路段分析</div></a>
                    </li>
                    <li>
                    	<a href="areaAnalysis.php" target="showframe" id="Area_A" onclick="sidebar_bcolor(this)"><img src="./img/qyfx.png" /><div class="menufont">区域分析</div></a>
                    </li>
                    <li>
                    	<a href="contrastAnalysis.php" target="showframe" id="Contrast_A" onclick="sidebar_bcolor(this)"><img src="./img/dbfx.png" /><div class="menufont">对比分析</div></a>
                    </li>
                    <li>
                    	<a href="forecastAnalysis.php" target="showframe" id="Forecast_A" onclick="sidebar_bcolor(this)"><img src="./img/ycfx.png" /><div class="menufont">预测分析</div></a>
                    </li> 
                    <li>
                    	<a href="overallAnalysis.php" target="showframe" id="Overall_A" onclick="sidebar_bcolor(this)"><img src="./img/ztfx.png" /><div class="menufont">总体分析</div></a>
                    </li>  
                 </ul>
  	    </div>
    </div>
    
     
      <iframe id="ifra" src="roadAnalysis.php" name="showframe" style="border:0;margin:0 0 0 0;"></iframe>
<script type="text/javascript">
function autoHeight(){	
	if (window.innerHeight){//FF
		nowHeight = window.innerHeight;
	}else{
		nowHeight = document.documentElement.clientHeight;
	}
		var jianHeight = 60;
	if(nowHeight > jianHeight){
		document.getElementById('sideMenu').style.height = nowHeight - 102 + 'px';
	}else{
		document.getElementById('sideMenu').style.height = jianHeight + 'px';
	}
	}
    autoHeight();
</script>
</body>
</html>
