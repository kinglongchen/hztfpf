<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<!--<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>-->
<script src="js_car_speed/year/road.js"></script>
<link type="text/css" rel="stylesheet" href="css/crowd_mileage_ratio.css" />
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
              <option value="8">滨江区</option>
          </select>
      </span>
       <span style="height:20px;margin-left:3px;">
          <select id="year_selec">
          	<option value="2014">2014</option>
            <option value="2013" >2013</option>
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
      <button type="button" onclick="tc_data_req($('#zone_slcer').val(),$('#year_selec').val())">确定</button>
    </form>
    <div> 
        <div id="chart_container" style="width:96%;height:300px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
    </div>
    <div style="clear:both"></div> 
    <div>
    	<div id="div_crowd_mileage_list_head">
            <table id="crowd_mileage_list_head" border="1" cellspacing="0" cellpadding="0" style="text-align:center;margin:15px 20px 0 20px;" >
                <tr>
                    <th>Loading······</th>
                </tr>
            </table>
        </div>
        <div id="div_crowd_mileage_list_body" >
            <table id="crowd_mileage_list_body" border="1" cellspacing="0" cellpadding="0" style="text-align:center;margin:-1px 20px 0 20px;" >
            </table>
        </div>
    </div> 
</body>
</html>