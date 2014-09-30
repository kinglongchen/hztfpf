<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=cF63rSFiQ00aIKrKGljcSdc4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/Heatmap/2.0/src/Heatmap_min.js"></script>
<script src="../../../js/slider.js"></script>
<script src="js/js_hot_chart.js"></script>
<title>热力图功能示例</title>
<style type="text/css">
    ul,li{list-style: none;margin:0;padding:0;float:left;}
    html{height:100%}
    body{height:100%;margin:0px;padding:0px;font-family:"微软雅黑";}
    #container{height:400px;width:800px;}
    #r-result{width:100%;}
    #sliderValue{display:none;}
</style>
</head>

<body>
<div> 
	<div style="width:96%;height:40px;border:2px solid #0150a2;float:left; margin:10px 0 0 20px;">
      <div style="float:left;margin-right:50px;margin:7px 0 10px 20px;">
      <input type="text" id="sliderValue" readonly name="sliderValue"  size="4" />
      <script language="JavaScript">
	  
      var imagePath = 'img/';
      var A_TPL = {
                    'b_vertical' : false,
                    'b_watch': true,
                    'n_controlWidth': 343,
      				'n_controlHeight': 33,
                    'n_sliderWidth': 6,
                    'n_sliderHeight': 17,
                    'n_pathLeft' : 10,
                    'n_pathTop' : 4,
                    'n_pathLength' : 305,
                    's_imgControl': '../../../img/timeSlider.gif',
                    's_imgSlider':  '../../../img/sldr5h_sl.gif',
                    'n_zIndex': 1
                }
                var A_INIT = {
                    's_form' : 0,
                    's_name': 'sliderValue',
                    'n_minValue' : 3600*0,
                    'n_maxValue' : 3600*24-1,
                    'n_value' : 3600*12,
                    'n_step' : 600
                }
                t_slider = new slider(A_INIT, A_TPL);
				t_slider.f_setValue(3600,1)	
            </script>
            </div>
      <div style="float:left;margin-right:50px;margin:7px 0 10px 20px;">   
         <input type="button"   id="play" value="播放"/>
         <span id = 't_itvsetter' ><!--style="margin:19px 0 0 40px;float:left;"-->
            时间范围：
            <input class='titvcls' checked="checked" type="radio" name="t_itv" value=5 /> 近一天
            <input class='titvcls' type="radio" name="t_itv" value=10 /> 近一个月
            <input class='titvcls' type="radio" name="t_itv" value=30 /> 近一周
            <input class='titvcls' type="radio" name="t_itv" value=60 /> 近一年
          </span>
          </div>
   </div>
	
    <div id="container" style="width:96%;height:500px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
    <div id="chart_container" style="width:98%;"></div>    
</div>

</body>
</html>