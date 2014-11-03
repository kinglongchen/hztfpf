<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交通信息诱导与发布</title>
<style type="text/css">
body{margin:0;padding:0;height:100%;font-family:"微软雅黑", Verdana, sans-serif;overflow: auto;color:#555555;	overflow-x:auto;}
ul{-webkit-padding-start: 0; -webkit-margin-after: 0;-webkit-margin-before: 0;}
</style>
<link rel="stylesheet" type="text/css" href="css/menu-css.css">
<link rel="stylesheet" type="text/css" href="css/choose.css">
<script type='text/javascript' src='js/map.js'></script>
<script>
window.onload=function()
{
	var map = new Map("map_container",1);
	map.request_rid(generate_roadids(),"../../../HZ/netQRY_rnet.php")	
}
</script>
</head>
<body style="overflow-y:hidden;overflow-x:hidden;">
  <!----------------------topbar------------------------------------>
  <div id="header" style="height:70px;width:100%;background-size:100% 100%;float:left;overflow:hidden;background:url(./img/barbg.png);" >
    <div style="width:320px;height:50px;float:left;background: url(./img/logo.png) no-repeat;; margin:10px 0 0 20px;"></div>
    <div id="conPad" style="width:365px;height:100%;overflow:hidden;float:right;">
      <div style="width:400px;height:100%;float:left;overflow:hidden;">
        <div  class="topbtn" style="margin:0 4px 0 4px;">
           <a  href="traffic.php" style="margin-left:1.5px;"> 
            <img src=img/jiaotong2.png  height="45" width="45" alt="" border="0">
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">路况显示</h>
        </div>
        <div class="topbtn">
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
        <div class="topbtn" style="background:url(./img/barbg2.png);">
           <a  href="induceRelease.php" style="margin-left:1.5px;">
            <img src=img/youdaos.png   height="45" width="45"  alt="" border="0" >
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">诱导发布</h>
        </div>
      </div>               
    </div> 
  </div>
  <!----------------------侧边栏------------------------------------>
  <div id="sideMenu" style="width:100px;height:597px;border-right:#CCC 1px solid;float:left;background:#ddcf8f;float:left;">
    <div class="menu" style="width:100%;">
       <div style="height:20px;"></div>
       <ul>
          <li >
              <a href="#"><div>诱导屏</div></a>
          </li>
          <li>
              <a href="#"><div>公交站牌</div></a>
          </li>
          <li>
              <a href="#"><div>网页发布</div></a>
          </li>   
       </ul>
    </div>
  </div>
  <!----------------------中央地图------------------------------------>
  <div id="map_container" style="width:70%;height:597px;float:left;"></div>
<!--  <div id="bMap"  style=" position:relative;float:left; overflow:hidden; margin:0;">
    <div id="iCenter"  style="width:100%;float:left; " ></div>  
  </div>-->
  <!----------------------右侧信息模块------------------------------------>
  <div style="width:22%;height:595px;border:1px solid #CCC;float:left;background-color:#6CC">
  对应信息显示
  </div>
</body>
</html>