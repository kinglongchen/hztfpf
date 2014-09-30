<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>
<script src="js_car_speed/day/road.js"></script>
</head>

<body>
    <form style="margin:10px 0 0 20px;">
      路段选择：
      <span style="height:20px;margin:0 30px 0 -13px;">
          <select id = "sroadid" >
              <option value="1">文一路</option>
              <option value="2">古墩路</option>
              <option value="3">凤起路</option>
              <option value="4">东坡路</option>
              <option value="5">平海路</option>
          </select>
      </span>
      时间选择：
      <span style="height:20px;margin-left:-13px;">
          <input type="date" id="sub_date"/>
      </span>
      <button type="button" onclick="tc_data_req($('#sroadid').val(),$('#sub_date').val())">确定</button>
    </form>
<div> 
    <div id="chart_container" style="width:96%;height:300px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
</div>
<div style="clear:both"></div> 
</body>
</html>