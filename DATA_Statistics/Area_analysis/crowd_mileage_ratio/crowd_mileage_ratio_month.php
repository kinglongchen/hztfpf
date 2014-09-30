<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>
<script src="js_car_speed/month/road.js"></script>
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
          <select id="sub_date">
          	<option value="2013-10">2013-10</option>
            <option value="2013-11">2013-11</option>
            <option value="2013-12">2013-12</option>
            <option value="2014-1">2014-1</option>
            <option value="2014-2">2014-2</option>
            <option value="2014-3">2014-3</option>
            <option value="2014-4">2014-4</option>
            <option value="2014-5">2014-5</option>
            <option value="2014-6">2014-6</option>
            <option value="2014-7">2014-7</option>
            <option value="2014-8">2014-8</option>
            <option value="2014-9">2014-9</option>
          </select>
      </span>
      <button type="button" onclick="tc_data_req($('#sroadid').val(),$('#sub_date').val())">确定</button>
    </form>
<div> 
    <div id="chart_container" style="width:96%;height:300px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
</div>
<div style="clear:both"></div> 
</body>
</html>