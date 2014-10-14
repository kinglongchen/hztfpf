<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../css/scollbar.css">
<script src="../../../js/jquery.js"></script>
<script type='text/javascript' src='../../../js/map.js'></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>
<script src="http://webapi.amap.com/maps?v=1.3&key=a1dbe1455fe51c2c903a6b9cd35af2fc"></script>
<script src="js_crowd_road/month/road.js"></script>
<script type="text/javascript" src="../../../js2/common2.js"></script>
</head>

<body>
<div> 
<div id="scroll">
                       <div id="scroLeft">
   <div id="map">
    <div id="map_container" style="border:1px solid #24C3F3;width:98%;height:500px;margin:10px 0 5px 20px;"></div></div>
    <div id="chart_container" style="width:48%;height:260px;margin-top:10px;margin:10px 0 0 20px; float:left;"></div>
    <div style="width:48%;margin-top:10px;margin:10px 0 0 20px; float:left;">
    	<table style="width:100%;table-layout:fixed" border="1" cellpadding="0" cellspacing="0">
        	<tr><th>道路名称</th><th>拥堵里程比例</th><th>日拥堵平均时长</th><th>行程车速</th><th>自由车速时间占有率</th><th>交通流量</th><th>拥堵指数</th></tr>
            <tr><td>学院路</td><td>78.8%</td><td>18</td><td>100m/s</td><td>10%</td><td>980</td><td>0.7</td></tr>
            <tr><td>玉古路</td><td>76%</td><td>17</td><td>91m/s</td><td>14%</td><td>980</td><td>0.7</td></tr>
            <tr><td>教工路</td><td>55.5%</td><td>16</td><td>90m/s</td><td>15%</td><td>980</td><td>0.7</td></tr>
            <tr><td>海关路</td><td>54.7%</td><td>16</td><td>87m/s</td><td>20%</td><td>980</td><td>0.7</td></tr>
            <tr><td>余杭塘路</td><td>53.7%</td><td>15</td><td>77m/s</td><td>22%</td><td>980</td><td>0.7</td></tr>
            <tr><td>南山路</td><td>53.4%</td><td>14.5</td><td>76m/s</td><td>25%</td><td>980</td><td>0.7</td></tr>
            <tr><td>平海路</td><td>50.9%</td><td>13</td><td>74m/s</td><td>27%</td><td>980</td><td>0.7</td></tr>
            <tr><td>文三路</td><td>43%</td><td>13</td><td>73m/s</td><td>33%</td><td>980</td><td>0.7</td></tr>
            <tr><td>留和路</td><td>42.8%</td><td>13</td><td>71m/s</td><td>34%</td><td>980</td><td>0.7</td></tr>
            <tr><td>建国北路</td><td>41.1%</td><td>12</td><td>70m/s</td><td>37%</td><td>980</td><td>0.7</td></tr>
        </table>
    </div>
</div>
                           
                       <div id="scroRight" >
                             <div id="scroLine"></div>
                       </div>
                </div>
<div style="clear:both"></div> 
</body>
</html>