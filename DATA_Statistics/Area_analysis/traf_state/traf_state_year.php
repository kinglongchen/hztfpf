<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../css/tab3.css">
<link rel="stylesheet" type="text/css" href="../../../css/scollbar.css">

<script src="../../../js/util.js"></script>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/heatmap.js"></script>
<!--<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>-->
<script type="text/javascript" src="../../../js2/common3.js"></script>
<script src="js_traf_state/year/road.js"></script>
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
	zone_name = $("#zone_slcer").find("option:selected").text();
	if (zone_id==null) zone_id=1
	year = $("#year_selec").val()
	data_req(year,0,1,zone_id,zone_name)
	}
$(document).ready(function(e) {
    var date = new Date();
	year = date.getFullYear();
	$("#year_selec").val(year);
});
</script>

</head>

<body>
<div id="scroll">
                       <div id="scroLeft">
    <form style="margin:10px 0 0 20px;">
      区域选择：
      <span style="height:20px;margin:0 30px 0 -13px;">
          <select id = "zone_slcer" >
              <option value="0">西湖区</option>
              <option value="1">拱墅区</option>
              <option value="2">余杭区</option>
              <option value="3">上城区</option>
              <option value="4">下城区</option>
              <option value="5">萧山区</option>
              <option value="6">江干区</option>
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
      <button type="button" onclick="road_analysis()">确定</button>
    </form>
<div> 
    <div>
    	<div id="chart_traf_flow" style="width:55%;height:250px;border:1px solid #000;margin:10px 0 0 10px;float:left"></div>
                    <div class="glfx2" style="float:left; width: 42%;margin:10px 0 0 10px;height: 250px">
                    <div style="margin-right:17px;">
                    <table border="1px" style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;">
  						<tr style="margin:0 10px 0 0;">
    						<th width="25%">编号</th>
                            <th width="25%">月份(月)</th>
    						<th width="25%">时间(时)</th>
                            <th	width="25%">交通状态</th>
 				 		</tr>
                    </table>
                    </div>
                    <div style="float:left;overflow-x: hidden; width: 99.9%;margin:0px 0 0 0px;height: 230px;border-bottom:1px solid #0D60B6;">
                    	<table id ='traf_ctb' border="1" style="width:100%;border-collapse:collapse; text-align:center;">
  							<tr>
    							<td width="25%">Loading</td>
    							<td width="25%">Loading</td>
                            	<td width="25%">Loading</td>
                                <td width="25%">Loading</td>
 				 			</tr> 
                    	</table>
					</div>
                    
					</div>
                </div>
                <div style="clear:both"></div>
    
   
    <div style="margin-top:20px;">
    	<div id="chart_crowd_time" style="width:55%;height:250px;border:1px solid #000;margin:10px 0 0 10px;float:left"></div>
                    <div class="glfx2" style="float:left; width: 42%;margin:10px 0 0 10px;height: 250px">
                    <div style="margin-right:17px;">
                    <table border="1px" style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;">
  						<tr style="margin:0 10px 0 0;">
    						<th width="33%">编号</th>
    						<th width="33%">月份(月)</th>
                            <th	width="33%">拥堵时间(分钟)</th>
 				 		</tr>
                    </table>
                    </div>
                    <div style="float:left;overflow-x: hidden; width: 99.9%;margin:0px 0 0 0px;height: 230px;border-bottom:1px solid #0D60B6;">
                    	<table id ='ctime_ctb' border="1" style="width:100%;border-collapse:collapse; text-align:center;">
  							<tr>
    							<td width="33%">Loading</td>
    							<td width="33%">Loading</td>
                            	<td width="33%">Loading</td>
 				 			</tr> 
                    	</table>
					</div>
                    
					</div>
                </div>
                <div style="clear:both"></div>

    <div style="margin-top:20px;">
    	<div id="chart_crowd_num" style="width:55%;height:250px;border:1px solid #000;margin:10px 0 0 10px;float:left"></div>
                    <div class="glfx2" style="float:left; width: 42%;margin:10px 0 0 10px;height: 250px">
                    <div style="margin-right:17px;">
                    <table border="1px" style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;">
  						<tr style="margin:0 10px 0 0;">
    						<th width="33%">编号</th>
    						<th width="33%">月份(月)</th>
                            <th	width="33%">拥堵指数</th>
 				 		</tr>
                    </table>
                    </div>
                    <div style="float:left;overflow-x: hidden; width: 99.9%;margin:0px 0 0 0px;height: 230px;border-bottom:1px solid #0D60B6;">
                    	<table id ='cnum_ctb' border="1" style="width:100%;border-collapse:collapse; text-align:center;">
  							<tr>
    							<td width="33%">Loading</td>
    							<td width="33%">Loading</td>
                            	<td width="33%">Loading</td>
 				 			</tr> 
                    	</table>
					</div>
                    
					</div>
                </div>
                <div style="clear:both"></div>
    
    <div style="margin-top:20px;">
    <div id="chart_car_speed" style="width:55%;height:250px;border:1px solid #000;margin:10px 0 0 10px;float:left"></div>
                    <div class="glfx2" style="float:left; width: 42%;margin:10px 0 0 10px;height: 250px">
                    <div style="margin-right:17px;">
                    <table border="1px" style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;">
  						<tr style="margin:0 10px 0 0;">
    						<th width="33%">编号</th>
    						<th width="33%">月份(月)</th>
                            <th	width="33%">行车速度(km/h)</th>
 				 		</tr>
                    </table>
                    </div>
                    <div style="float:left;overflow-x: hidden; width: 99.9%;margin:0px 0 0 0px;height: 230px;border-bottom:1px solid #0D60B6;">
                    	<table id ='cspeed_ctb' border="1" style="width:100%;border-collapse:collapse; text-align:center;">
  							<tr>
    							<td width="33%">Loading</td>
    							<td width="33%">Loading</td>
                            	<td width="33%">Loading</td>
 				 			</tr> 
                    	</table>
					</div>
                    
					</div>
                </div>
                <div style="clear:both"></div>
    
</div>
</div>
                           
                       <div id="scroRight" >
                             <div id="scroLine"></div>
                       </div>
                </div>  
<div style="clear:both"></div> 

</body>
</html>