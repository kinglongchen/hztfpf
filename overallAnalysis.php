<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="DATA_Statistics/Overall_analysis/css/overall.css" />
<script type='text/javascript' src='js/map.js'></script>
<script src="js/jquery.js"></script>
<script src="js/Highcharts-4.0.3/js/highcharts.js"></script>
<script src="DATA_Statistics/Overall_analysis/js/overall.js"></script>
</head>

<body>
    <div style="width:96%;height:40px;border:2px solid #0150a2;float:left; margin:10px 0 0 20px;">
        <div style="margin:10px 0 10px 20px;width:600px;float:left;">
            <form>
                <input type="radio" id="tflow" name="choose" onclick="tflow_data_req()" checked="checked">道路交通量
                <input type="radio" id="vspeed" class="choose" name="choose" onclick="vspeed_data_req()">行程车速
                <input type="radio" id="consindex" class="choose" name="choose" onclick="consindex_data_req()">拥堵指数
                <input type="radio" id="constime" class="choose" name="choose" onclick="constime_data_req()">拥堵时间
            </form>
        </div>
        <div style="margin:10px 0 10px 20px;width:25%;float:left;">
            <form>
                选择时段
                <select id="time_choose" onchange="day_month_year()">
                    <option value="day">最近三天</option>
                    <option value="week">最近三周</option>
                    <option value="month">最近三个月</option>
                    <option value="year">最近一年</option>
                </select>
            </form>
        </div>
    </div>
    <div id="map_container" style="border:1px solid #000"></div>
    <div>
        <div id="road_container" style="margin-left:20px;width:30%"></div>
        <div id="zone_container" style="width:30%"></div>
        <div id="pie_container" style="width:30%"></div>
        <div style="clear:both"></div>
    </div>

<div style="margin:0 0 20px 0;">
	<div style="width:100%;margin:0 0 0 20px;">
    <table border="1" style="width:96%;float:left; border-collapse:collapse;table-layout:fixed">
      <caption>
        常发拥堵路段分析
      </caption>
      <tr>
        <th scope="col" style="width:10%">分类</th>
        <th scope="row">日常发拥堵路段</th><th scope="row">月常发拥堵路段</th><th scope="row">年常发拥堵路段</th>
      </tr>
      <tr>
      	<th scope="col">分析</th>
        <td><div id="day_cons_bar"></div></td>
        <td><div id="month_cons_bar"></div></td>
        <td><div id="year_cons_bar"></div></td>
      </tr>
    </table>
    </div>
    <div style="clear:both"></div>  
</div>
</body>
</html>
