<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>无标题文档</title>
<script src="../../../js/jquery.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/highcharts.js"></script>
<script type="text/javascript" src="../../../js/Highcharts-4.0.3/js/modules/exporting.js"></script>
<script src="js_traf_state/year/road.js"></script>
<style>
.choose{
	margin:0 0 0 20px;
	padding:5px 0 5px 0;
	background-color:#eee;
	color:#000;}
.item{
	margin:0 0 0 20px;
	background-color:#ddd;
	color:#000;}
a{
	color:#000;
	text-decoration:none;
	padding:5px 0 5px 0;}
a:hover{
	background-color:#fff;}
#area_choose{
	display:none;}
.anaList{
	margin:10px 10px 10px 5px;}
/*#pie_container{
	width:400px;}*/
</style>
</head>

<body>
<div> 
    <div id="chart_container" style="width:96%;height:300px;border:1px solid #000;margin:20px 0 0 20px;float:left"></div>
</div>
<div style="clear:both"></div> 
<div style="width:96%;margin:20px 0 0 20px;">
    <table border="1" style="width:100%;table-layout:fixed; border-collapse:collapse;text-align:center">
          <tr>
          <th scope="col">
              <div>最高值:<span id='max_val'>Loading...</span></div>
              <div>最高值对应时间:<span id='time'>Loading...</span></div>
          
          </th>
          <th scope="col">
              <div>平均值:<span id='arv_val'>Loading...</span></div>
          </th>
          <th scope="col">
              <div>总流量:<span id='total_val'>Loading...</span></div>
          
          </th>
        </tr>
    </table>
</div>
<div style="float:left;width:45%;margin:20px;">
    <div style="font-size:18px;font-weight:bold;margin:10px 0 0 10px;color:#0CF">同期均值</div>
    <div style="border-top:3px dashed #0CF;padding:10px;">
      <table border="1" style="border-collapse:collapse;width:99%;table-layout:fixed;">
          <tr>
            <th scope="col">
                历史同期平均值
            </th>
            <th scope="col">
                <div>最高均值:<span id='his_max_val'>Loading...</span></div>
                <div>最低均值:<span id='his_min_val'>Loading...</span></div>
            </th>
          </tr>
          <tr>
            <th>最近三天数据均值</th>
            <th>
                <div>最高值:<span id='last_arv_max_val'>Loading...</span></div>
                <div>平均值:<span id='last_arv_arv_val'>Loading...</span></div>
                <div>总流量:<span id='last_arv_total_val'>Loading...</span></div>
                
            </th>
          </tr>
      </table>
    </div>
    <div style="font-size:18px;font-weight:bold;margin:40px 0 0 10px;color:#0CF">重点分析</div>
    <div style="border-top:3px dashed #0CF;padding:10px;">
        <table border="1" style="border-collapse:collapse;width:99%;table-layout:fixed;text-align:center;">
          <tr>
            <th scope="col">区域名</th>
            <th scope="col">最高值</th>
            <th scope="col">平均值</th>
            <th scope="col">总流量</th>
          </tr>
          <tr>
            <th>西湖区</th>
            <td><div id='xh_max_val'>Loading...</div></td>
            <td><div id='xh_avg_val'>Loading...</div></td>
            <td><div id='xh_total_val'>Loading...</div></td>
          </tr>
          <tr>
            <th>下城区</th>
            <td><div id='xc_max_val'>Loading...</div></td>
            <td><div id='xc_avg_val'>Loading...</div></td>
            <td><div id='xc_total_val'>Loading...</div></td>
          </tr>
          <tr>
            <th>上传区</th>
            <td><div id='sh_max_val'>Loading...</div></td>
            <td><div id='sh_avg_val'>Loading...</div></td>
            <td><div id='sh_total_val'>Loading...</div></td>
          </tr>
          <tr>
            <th>拱墅区</th>
            <td><div id='gs_max_val'>Loading...</div></td>
            <td><div id='gs_avg_val'>Loading...</div></td>
            <td><div id='gs_total_val'>Loading...</div></td>
          </tr>
        </table>
    </div>
</div>
<div style="float:right;width:45%;margin-right:50px;">
    <div id="pie_container"></div>	
</div>
<div style="clear:both"></div> 
</body>
</html>