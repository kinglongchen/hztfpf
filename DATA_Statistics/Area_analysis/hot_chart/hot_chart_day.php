<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<link rel="stylesheet" type="text/css" href="../../../css/scollbar.css">
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>

<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=cF63rSFiQ00aIKrKGljcSdc4"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/Heatmap/2.0/src/Heatmap_min.js"></script>
<script src="../../../js/slider.js"></script>
<script src="js/js_hot_chart.js"></script>
<script type="text/javascript" src="../../../js2/common2.js"></script>

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
<div id="scroll">
    <div id="scroLeft">
				<div style="width:96%;height:40px;border:2px solid #0150a2;float:left; margin:10px 0 0 20px;">
     		 <div style="float:left;margin-right:50px;margin:7px 0 10px 20px;">
      <form>
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
         </form>
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
    <div id="map" style="width: 100%;height: 500px;">
    			<div id="container" style="width:96%;height:500px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div></div> 
    <div id="chart_container" style="width:48%;height:290px;margin-top:10px;margin:10px 0 0 20px;float:left"></div>
    <div style="width:46.5%;margin-top:10px;margin:10px 0 0 20px;float:left">
    	<table style="width:100%;table-layout:fixed" border="1" cellpadding="0" cellspacing="0">
        	<tr style="width:100%;border-collapse:collapse; background:#3b88e7;color:#fff;"><th style="width:26%">路口名称</th><th>拥堵里程比例</th><th>日拥堵平均时长</th><th>行程车速</th><th>自由车速时间占有率</th><th>交通流量</th><th>拥堵指数</th></tr>
            
            <tr><td>建国北路文晖路口</td><td>76%</td><td>17</td><td>91m/s</td><td>14%</td><td>980</td><td>0.7</td></tr>
            <tr><td>留和路小和山路口</td><td>55.5%</td><td>16</td><td>90m/s</td><td>15%</td><td>980</td><td>0.7</td></tr>
            <tr><td>古翠路文三路口</td><td>54.7%</td><td>16</td><td>87m/s</td><td>20%</td><td>980</td><td>0.7</td></tr>
            <tr><td>东坡路平海路口</td><td>53.7%</td><td>15</td><td>77m/s</td><td>22%</td><td>980</td><td>0.7</td></tr>
            <tr><td>南山路钱王祠路口</td><td>53.4%</td><td>14.5</td><td>76m/s</td><td>25%</td><td>980</td><td>0.7</td></tr>
            <tr><td>登云路余杭塘路口</td><td>50.9%</td><td>13</td><td>74m/s</td><td>27%</td><td>980</td><td>0.7</td></tr>
            <tr><td>海关路学院路口</td><td>43%</td><td>13</td><td>73m/s</td><td>33%</td><td>980</td><td>0.7</td></tr>
            <tr><td>教工路文三路口</td><td>42.8%</td><td>13</td><td>71m/s</td><td>34%</td><td>980</td><td>0.7</td></tr>
            <tr><td>天目山路玉古路口</td><td>41.1%</td><td>12</td><td>70m/s</td><td>37%</td><td>980</td><td>0.7</td></tr>
            <tr><td>文二路学院路口</td><td>40.8%</td><td>18</td><td>100m/s</td><td>10%</td><td>980</td><td>0.7</td></tr>
        </table>
    </div>     		 
</div>
                       <div id="scroRight" >
                             <div id="scroLine"></div>
                       </div>
                </div>
</body>
</html>