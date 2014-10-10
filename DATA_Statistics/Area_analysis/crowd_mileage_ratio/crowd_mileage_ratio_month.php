<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<!--<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>-->
<script src="js_car_speed/month/road.js"></script>
</head>

<body>
    <form style="margin:10px 0 0 20px;">
      区域选择：
      <span style="height:20px;margin:0 30px 0 -13px;">
          <select id = "zone_slcer" >
              <option value="1">西湖区</option>
              <option value="2">拱墅区</option>
              <option value="3">余杭区</option>
              <option value="4">上城区</option>
              <option value="5">下城区</option>
              <option value="6">萧山区</option>
              <option value="7">江干区</option>
          </select>
      </span>
     时间选择：
      <span style="height:20px;margin-left:3px;">
          <select id="year_selec">
          	<option value="2014">2014</option>
            <option value="2013">2013</option>
            <option value="2012">2012</option>
            <option value="2011">2011</option>
            <option value="2010">2010</option>
            <option value="2009">2009</option>
            <option value="2008">2008</option>
            <option value="2007">2007</option>
            <option value="2006">2006</option>
            <option value="2005">2005</option>
            
          </select>
      </span>年
      <span style="height:20px;margin-left:3px;">
          <select id="month_selec">
          	<option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            
          </select>
      </span>月
      <button type="button" onclick="data_req($('#year_selec').val(),$('#month_selec').val(),1,$('#sroadid').val())">确定</button>
    </form>
<div> 
    <div id="chart_container" style="width:96%;height:300px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
</div>
<div style="clear:both"></div> 
</body>
</html>