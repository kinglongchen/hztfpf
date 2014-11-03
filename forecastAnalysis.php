<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type='text/javascript' src='js/map.js'></script>
<script src="js/jquery.js"></script>
<script src="http://webapi.amap.com/maps?v=1.3&key=a1dbe1455fe51c2c903a6b9cd35af2fc"></script>
<script type="text/javascript" src="js/Highcharts-4.0.3/js/highcharts.js"></script>
<script src="DATA_Statistics/Forecast_analysis/js/forecast.js"></script>
<script src="js/slider.js"></script>
<!--<script type="text/javascript" src="js/sliderTime.js" ></script>-->
<script src="http://webapi.amap.com/maps?v=1.3&key=a1dbe1455fe51c2c903a6b9cd35af2fc"></script>
<script>
//时间选择器显示当前日期
function get_now()
{
	var date=new Date();
	today=date.getFullYear()+"-"+(date.getMonth()+1)+"-"+ date.getDate();
	document.getElementById("sub_date").value=today;
}
</script>
<link type="text/css" rel="stylesheet" href="DATA_Statistics/Forecast_analysis/css/forecast.css">

</head>
<style>
.time_choose{
	float:left;
	margin-right:50px;
	margin:7px 0 10px 10px;
	}
</style>
<body style="margin:0;" onload="get_now()">
<div>
 <script language="JavaScript">
	  
      var imagePath = 'img/';
      var TA_TPL = {
                    'b_vertical' : false,
                    'b_watch': true,
                    'n_controlWidth': 343,
      				'n_controlHeight': 33,
                    'n_sliderWidth': 6,
                    'n_sliderHeight': 17,
                    'n_pathLeft' : 10,
                    'n_pathTop' : 4,
                    'n_pathLength' : 310,
                    's_imgControl': 'img/timeSlider.gif',
                    's_imgSlider':  'img/sldr5h_sl.gif',
                    'n_zIndex': 1
                }
       var TA_INIT = {
                    's_form' : 0,
                    's_name': 'sliderValue',
                    'n_minValue' : 3600*0,
                    'n_maxValue' : 3600*24-1,
                    'n_value' : 3600*12,
                    'n_step' : 600
                }
                
				
		var PA_TPL = {
                    'b_vertical' : false,
                    'b_watch': true,
                    'n_controlWidth': 149,
      				'n_controlHeight': 17,
                    'n_sliderWidth': 9,
                    'n_sliderHeight': 17,
                    'n_pathLeft' : 0,
                    'n_pathTop' : 0,
                    'n_pathLength' : 140,
                    's_imgControl': 'img/sldr6h_bg.gif',
                    's_imgSlider':  'img/sldr5h_sl.gif',
                    'n_zIndex': 2
                }
          var PA_INIT = {
                    's_form' : 0,
                    's_name': 'p_slider',
                    'n_minValue' : 0,
                    'n_maxValue' : 100,
                    'n_value' : 50,
                    'n_step' : 10
                }
				
				
				//t_slider.f_setValue(3600,1)
            </script>
	<form style="width:96%;height:40px;border:2px solid #0150a2;float:left; margin:10px 0 0 20px;">
      <div class="time_choose">
        时间选择：
        <span>
            <input type="date" id="sub_date" onchange="tc_data_req(this.value)"/>
        </span>
      </div> 
      <div style="float:left;margin-right:50px;margin:7px 0 10px 20px;">拥堵概率：<span>
      <input type="text" id="p_slider" readonly name="p_slider"  size="2"/>%</span></div>  
      <div style="float:left;margin-right:50px;margin:13px 0 10px 15px;">
        <span>
        <script language="JavaScript">
        p_slider = new slider(PA_INIT, PA_TPL);
		p_slider.sliderStop=function() {
			query_conn_road(p_slider.n_value,t_slider.n_value)
			}
        </script>
        </span>
      </div>
      
      <div style="float:left;margin-right:50px;margin:10px 0 10px 25px;">预测时间：</div>
      <span class="time_choose">
      <input type="text" id="sliderValue" readonly name="sliderValue"  size="4" style="display:none;"/>
      <script language="JavaScript">
        t_slider = new slider(TA_INIT, TA_TPL);
		t_slider.sliderStop=function() {
			query_conn_road(p_slider.n_value,t_slider.n_value)
			}
      </script>
      </span>
     
     
      </span>
      <div style="clear:both;"></div>
    </form>
<div style="width:100%"> 
    <div id="map_container" style="border:1px solid #000;margin:10px 0 0 20px;width:58%;height:460px;float:left;"></div>
	<div style="width:36.9%;border:1px solid #000;margin:10px 0 0 10px;float:left;">
        <div id="chart_container" style="height:250px"></div>
        <div id="crowd_container" style="height:210px"></div>
	</div>

    
</div>
<div style="clear:both"></div> 
</div>
</body>
</html>