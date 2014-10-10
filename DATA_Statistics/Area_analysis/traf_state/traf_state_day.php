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
<script src="js_traf_state/day/road.js"></script>
<script type="text/javascript" src="../../../js2/common.js"></script>
<style>
#chart_traf_flow,#chart_crowd_time,#chart_crowd_num,#chart_car_speed{
	width:96%;
	height:300px;
	border:1px solid #000;
	margin:20px 0 0 20px;
	float:left;}
</style>
<script>//因为我把限行显示的代码写在iframe里面，所以还没有修改这个部分
$(document).ready(function(e) {
	$('.titvcls').change(function() {
	  						 set_t_itv(this.value)
	 						 road_analysis()
							}
						) 
	$('#trctl_ck').change(function(e){
		check = document.getElementById('trctl_ck').checked
		
		if (check==true)
			add_tfctl_line()
		if (check==false)
			remove_tfctl_line()
		})
	get_now();
});

function road_analysis() {
	zone_id = $("#zone_slcer").val()
	if (zone_id==null) zone_id=1
	date = $("#sub_date").val()
	if (date==''){
		nowdate = new Date()
		year = nowdate.getFullYear()
		month = nowdate.getMonth()
		day = nowdate.getDate()
		}
	else {
		date = date.split('-')
		year = parseInt(date[0])
		month = parseInt(date[1])-1
		day = parseInt(date[2])
		}
	data_req(year,month,day,zone_id)
	}

//时间选择器显示当前日期
function get_now()
{
	var date=new Date();
	today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	document.getElementById("sub_date").value=today;
}
</script>
</head>

<body>
 <div id="scroll">
                       <div id="scroLeft">
    <form style="margin:10px 0 5px 20px;">
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
      <span style="height:20px;margin-left:-13px;">
          <input type="date" id="sub_date"/>
      </span>
      <button type="button" onclick="road_analysis()">确定</button>
      
    </form>
    <span id = 't_itvsetter' style="margin:10px 0 0 20px;float:left;">
        时间间隔：
        <input class='titvcls' checked="checked" type="radio" name="t_itv" value=5 /> 5分钟
        <input class='titvcls' type="radio" name="t_itv" value=10 /> 10分钟
        <input class='titvcls' type="radio" name="t_itv" value=30 /> 30分钟
        <input class='titvcls' type="radio" name="t_itv" value=60 /> 60分钟
      </span>
      <span id = 'trctl_ck_span' style="margin:10px 0 0 20px;float:left;">
        <input id = 'trctl_ck' type="checkbox" >限行显示</input>
      </span>
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