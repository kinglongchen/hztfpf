<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../css/scollbar.css">
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/heatmap.js"></script>
<!--<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>-->
<script src="js_traf_state/month/road.js"></script>
<script type="text/javascript" src="../../../js2/common.js"></script>
<style>
#chart_traf_flow,#chart_crowd_time,#chart_crowd_num,#chart_car_speed{
	width:96%;
	height:300px;
	border:1px solid #000;
	margin:20px 0 0 20px;
	float:left;}
</style>

<script>
function road_analysis() {
	zone_id = $("#zone_slcer").val()
	if (zone_id==null) zone_id=1
	year = $("#year_selec").val()
	month = $("#month_selec").val()
	data_req(year,month,1,zone_id)
	}
$(document).ready(function(e) {
    var date = new Date();
	year = date.getFullYear();
	$("#year_selec").val(year);
	month = date.getMonth()+1;
	$("#month_selec").val(month);
});
</script>

</head>

<body>
 <div id="scroll">
                       <div id="scroLeft">
    <form style="margin:10px 0 0 20px;">
      区域选择：
      <span style="height:20px;margin:0 30px 0 -13px;">
          <select id = "sroadid" >
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
      <button type="button" onclick="road_analysis()">确定</button>
    </form>
<div> 
    <div id="chart_traf_flow" ></div>
    <div id="chart_crowd_time" ></div>
    <div id="chart_crowd_num" ></div>
    <div id="chart_car_speed" ></div>
</div>
</div>
                           
                       <div id="scroRight" >
                             <div id="scroLine"></div>
                       </div>
                </div>  
<div style="clear:both"></div> 

</body>
</html>