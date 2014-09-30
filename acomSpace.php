<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script type="text/javascript" src="js/jquery.js"></script>

<script type="text/javascript" src="js/rangeSlider.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery-ui.css">
<link rel="stylesheet" type="text/css" href="css/jqrangeslider.css">

<script type="text/javascript" src="js/jquery.autocomplete.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.autocomplete.css">

<script type="text/javascript" src="js/menu_min.js"></script>
<link rel="stylesheet" type="text/css" href="css/menu-css.css">

<script type="text/javascript" src="js/jquery.jqChart.min.js" ></script>
<script type="text/javascript" src="js/draw_chart.js" ></script>

<script type="text/javascript" src="js/jquery.easydropdown.js"></script>
<link rel="stylesheet" type="text/css" href="css/dropDown.css"/>

<script type="text/javascript" src="js/jquery.simple-dtpicker.js"></script>
<link rel="stylesheet" type="text/css" href="css/jquery.simple-dtpicker.css">

<link rel="stylesheet" type="text/css" href="css/choose.css">
<script type="text/javascript" >

     set_acSpace();  //设置查询拥堵指数

     var roadSet = [
         "建国北路-体育场路-环城北路","文一西路-狮山路-绿汀路","环城北路-环城东路-建国北路","庆春路-环城西路-延安路","莫干山路-天目山路-文晖路","天目山路-黄龙路-保俶路","中河路-凤起路-庆春路","古墩路-莲花街-天目山路","凤起路-中河北路-延安路","北山路-保俶路-曙光路","古墩路-董家路-金渡北路","庆春路-浣纱路-中河中路"];
	 $(function() {
		 $('#roadInput').autocomplete(roadSet,{
				minChars: 0,
				max: 5,
				mustMatch: true,
				matchContains: true
				})    
			  });
</script>
</head>

   <p style="font:20px 微软雅黑, Verdana, sans-serif; text-align:center;">区域空间对比分析</p>
   <!--------------------------右侧----------------------------------->
    <div id="chart1" >
    	<div id="chooseBar">
             <form action="chart_QRY.php" method="get"  >
             	<h style="position:relative; float:left;margin:6px 0 0 30px;">日期</h>
                
                <input type="text" id="Time" value="" style="position:relative; float:left;margin:5px 0 0 10px;">
                
                <script type="text/javascript">
                    $(function(){
                        $('#Time').appendDtpicker({"locale": "cn","dateOnly": "true"});
					});
                </script>
                
                  <!-- <select id="roadSel"class="dropdown" tabindex="8" style="position:relative; float:left;" data-settings='{"wrapperClass":"metro"}'>
                      <option value="">选择路段1</option>
                      <option value="1">文一西路-狮山路-绿汀路</option>
                      <option value="2">环城北路-环城东路-建国北路</option>
                      <option value="3">庆春路-环城西路-延安路</option>
                      <option value="4">莫干山路-天目山路-文晖路</option>
                      <option value="5">天目山路-黄龙路-保俶路</option>
                      <option value="6">古墩路-莲花街-天目山路</option>
                      <option value="7">凤起路-中河北路-延安路</option>
                  </select> -->
                  
                  
                   <select id="areaSel1"class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
                      <option value="">选择区域1</option>
                      <option value="1">上城区</option>
                      <option value="2">下城区</option>
                      <option value="3">西湖区</option>
                      <option value="4">江干区</option>
                      <option value="5">拱墅区</option>
                      <option value="6">滨江区</option>
                  </select> 
                   <select id="areaSel2"class="dropdown" tabindex="8" data-settings='{"wrapperClass":"metro"}'>
                      <option value="">选择区域2</option>
                      <option value="1">上城区</option>
                      <option value="2">下城区</option>
                      <option value="3">西湖区</option>
                      <option value="4">江干区</option>
                      <option value="5">拱墅区</option>
                      <option value="6">滨江区</option>
                  </select> 
                  <input id="QUERY_Space_Compare" style="position:relative; float:left;margin:5px 0 0 10px;" type="button"  value="查询" />          
             </form>
     </div>
	
<!-- -- -- -- -- -- --- -- -- 图表 -- -- -- -- -- -- - -- -->
      <div id="jqChart" ></div>
    </div>
</div>    

</html>