<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>交通信息诱导与发布</title>
<style type="text/css">
body{margin:0;padding:0;height:100%;font-family:"微软雅黑", Verdana, sans-serif;overflow: auto;color:#555555;	overflow-x:auto;}
ul{-webkit-padding-start: 0; -webkit-margin-after: 0;-webkit-margin-before: 0;}
</style>
<link rel="stylesheet" type="text/css" href="css/menu-css.css">
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/choose.css"><!--头部选项的样式链接-->
<script type="text/javascript" src="map.js"></script>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src=" Variable message signs.js"></script>
<script src="http://webapi.amap.com/maps?v=1.2&key=yourkey" type="text/javascript"></script>
<script type="text/javascript"  src="js/drawGuide.js"> </script> 
<script type="text/javascript">

<!----------------高德api----------------->
  $.ajaxSetup({  
	  async:false,
  });  
  var degree;
  var mode; 
  var flag; 
  var mapColor= new Array([10]);
  var map;
  var polyLineArray=new Array();
		  $.get(
		  'xmlread.php',   
		  function(data)
		  {
			  mode=Number(data);
		  }
		  );

    var gPos1= new AMap.LngLat(120.144786,30.273375);
	var gPos2= new AMap.LngLat(120.143173,30.265925);
	var gPos3= new AMap.LngLat(120.154803,30.273968);
	var gPos4= new AMap.LngLat(120.135277,30.27671);
	var gPos5= new AMap.LngLat(120.128496,30.271225); 
	
   function clievent(){
	AMap.event.addListener(map,"moveend",function(e)
			{
			if(xxx==1){
				draw_via_rnxml_Request(map.getBounds());
				}
		    else if(xxx==2){};
			}
			);
			
			}	
function initialize(){
   
    map = new AMap.Map("iCenter",{   
    center:new AMap.LngLat(120.150023,30.270743), //地图中心点   
    level:15,  //地图显示的比例尺级别	
    });
	
	 map2 = new AMap.Map("phonemap",{   
    center:new AMap.LngLat(120.150023,30.270743), //地图中心点   
    level:15,  //地图显示的比例尺级别	
    });
     
	map.plugin(["AMap.ToolBar"],function(){     
        toolBar = new AMap.ToolBar();
        map.addControl(toolBar);    
    }); 

	//draw_via_rnxml_Request(map.getBounds());
	//document.getElementById("btn4").className="fBton2";	
	// incr();
     scroll();
	 clievent(); 
	

 };
//初始化结束
function mapInit(){
  mapObj = new AMap.Map("iCenter",{
  center:new AMap.LngLat(120.150023,30.270743), //地图中心点
  level:13  //地图显示的比例尺级别
  }); 
  
    mapObj2 = new AMap.Map("phonemap",{
  center:new AMap.LngLat(120.150023,30.270743), //地图中心点
  level:13  //地图显示的比例尺级别
  }); 
  
  
}

  var  marker1=new AMap.Marker({ icon:"ico/vled_marker.png" , position:gPos1});
  var  marker2=new AMap.Marker({ icon:"ico/vled_marker.png" , position:gPos2});
  var  marker3=new AMap.Marker({ icon:"ico/vled_marker.png" , position:gPos3});
  var  marker4=new AMap.Marker({ icon:"ico/vled_marker.png" , position:gPos4});

  var  marker_bus1=new AMap.Marker({ icon:"ico/bus_maker.png", position:gPos1});
  var  marker_bus2=new AMap.Marker({ icon:"ico/bus_maker.png", position:gPos2})
  var  marker_bus3=new AMap.Marker({ icon:"ico/bus_maker.png", position:gPos3})
  var  marker_bus4=new AMap.Marker({ icon:"ico/bus_maker.png", position:gPos5})
  var trafficLayer = new AMap.TileLayer.Traffic({zIndex:10}); //实时路况图层
 
  //诱导屏显示
function addMarker(){
	$("#phone").fadeOut("slow");
    $("#bMap").fadeIn("slow");
	$("#Text").fadeIn("slow");//显示诱导屏
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");
	
  marker1.setMap(mapObj);//在地图上添加点
  marker2.setMap(mapObj);
  marker3.setMap(mapObj);
  marker4.setMap(mapObj);
  marker_bus1.setMap(null);  //在地图上隐藏公车站牌
  marker_bus2.setMap(null); 
  marker_bus3.setMap(null); 
  marker_bus4.setMap(null); 
  trafficLayer.setMap(null); //隐藏实时路况图层
  mapObj.setZoom(15);
  
	AMap.event.addListener(marker1, 'click', function(event) {//点击图标，网页右侧出现信息
	$("#Text").fadeOut("slow");
	$("#Text").fadeIn("slow");
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");});
	
	AMap.event.addListener(marker2, 'click', function(event) {//点击图标，网页右侧出现信息
	$("#Text").fadeOut("slow");
	$("#Text").fadeIn("slow");
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");});
	
	AMap.event.addListener(marker3, 'click', function(event) {//点击图标，网页右侧出现信息
	$("#Text").fadeOut("slow");
	$("#Text").fadeIn("slow");
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");}); 
	
	AMap.event.addListener(marker4, 'click', function(event) {//点击图标，网页右侧出现信息
	$("#Text").fadeOut("slow");
	$("#Text").fadeIn("slow");
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");});
  
}

//	公交车站牌显示
function addMarker_bus(){
  $("#phone").fadeOut("slow");
  $("#Text").fadeOut("slow");
  $("#bus1").fadeIn("slow");//显示公交站牌
  $("#bMap").fadeIn("slow");
  
  marker_bus1.setMap(mapObj);//在地图上添加点
  marker_bus2.setMap(mapObj);
  marker_bus3.setMap(mapObj);
  marker_bus4.setMap(mapObj);
  marker1.setMap(null);//在地图上隐藏诱导屏
  marker2.setMap(null); 
  marker3.setMap(null); 
  marker4.setMap(null); 
  trafficLayer.setMap(null); //隐藏实时路况图层
   mapObj.setZoom(15);
  AMap.event.addListener(marker_bus1, 'click', function(event) {
     $("#Text").fadeOut("slow");
   	 $("#bus1").fadeIn("slow");
	 $("#bus2").fadeOut("slow");
	 $("#bus3").fadeOut("slow");
	 $("#bus4").fadeOut("slow");
		 }); 
		 
  AMap.event.addListener(marker_bus2,'click', function(event) {
	 $("#Text").fadeOut("slow");
     $("#bus1").fadeOut("slow");
	 $("#bus2").fadeIn("slow");
	 $("#bus3").fadeOut("slow");
	 $("#bus4").fadeOut("slow");
		 }); 	
   AMap.event.addListener(marker_bus3,'click', function(event) {
     $("#Text").fadeOut("slow");
	 $("#bus1").fadeOut("slow");		
	 $("#bus3").fadeIn("slow");
	 $("#bus2").fadeOut("slow");
	 $("#bus4").fadeOut("slow");
		 });
  AMap.event.addListener(marker_bus4,'click', function(event) {
     $("#Text").fadeOut("slow");
	 $("#bus1").fadeOut("slow");		
	 $("#bus4").fadeIn("slow");
	 $("#bus2").fadeOut("slow");
	 $("#bus3").fadeOut("slow");
		 }); 		 
}

//网页分布

function addRoad(){
    	$("#phone").fadeOut("slow");
	$("#Text").fadeOut("slow");//右侧内容都消失
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");
    $("#bMap").fadeIn("slow");
	
	trafficLayer.setMap(mapObj); //添加实时路况图层
	marker_bus1.setMap(null);  //在地图上隐藏公车站牌
 	marker_bus2.setMap(null); 
  	marker_bus3.setMap(null); 
  	marker_bus4.setMap(null); 
	marker1.setMap(null);//在地图上隐藏诱导屏
  	marker2.setMap(null); 
  	marker3.setMap(null); 
 	marker4.setMap(null); 
	//cloudDataLayer.setMap(null);
	
}
//手机发布
function addphone(){
	$("#Text").fadeOut("slow");//右侧内容都消失
	$("#bus1").fadeOut("slow");
	$("#bus2").fadeOut("slow");
	$("#bus3").fadeOut("slow");
	$("#bus4").fadeOut("slow");
	$("#bMap").fadeOut("slow");
    $("#phone").fadeIn("slow");
	
	trafficLayer.setMap(mapObj); //添加实时路况图层
	marker_bus1.setMap(null);  //在地图上隐藏公车站牌
 	marker_bus2.setMap(null); 
  	marker_bus3.setMap(null); 
  	marker_bus4.setMap(null); 
	marker1.setMap(null);//在地图上隐藏诱导屏
  	marker2.setMap(null); 
  	marker3.setMap(null); 
 	marker4.setMap(null); 
	//cloudDataLayer.setMap(null);
	
}

	
	function stop(){ 
			return false; 
			} 
	document.oncontextmenu=stop; 	
//显示、隐藏侧边栏
function display_sidebar(){
	if(document.getElementById("sideMenu").style.display == "none")
	document.getElementById("sideMenu").style.display = "block"
	else
	document.getElementById("sideMenu").style.display = "none"	
}	
</script>

</head>
<body style="overflow-y:hidden;overflow-x:hidden; background-color:#ddcf8f" onload="mapInit()">
  <!----------------------topbar------------------------------------>
  <div id="header" style="height:70px;width:100%;background-size:100% 100%;float:left;overflow:hidden;background:url(./img/barbg.png);" >
    <div style="width:320px;height:50px;float:left;background: url(./img/logo.png) no-repeat;; margin:10px 0 0 20px;"></div>
    <div id="conPad" style="width:365px;height:100%;overflow:hidden;float:right;">
      <div style="width:400px;height:100%;float:left;overflow:hidden;">
        <div  class="topbtn" style="margin:0 4px 0 4px;">
           <a  href="traffic.php" style="margin-left:1.5px;"> 
            <img src=img/jiaotong2.png  height="45" width="45" alt="" border="0">
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">路况显示</h>
        </div>
        <div class="topbtn">
            <a  href="chart.php"  style="margin-left:1.5px;">
            <img src=img/tongjis.png  height="45" width="45" alt="" border="0" >
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">数据统计</h>
        </div>
        <div class="topbtn">
            <a  href="dataManage.html" style="margin-left:1.5px;">
            <img src=img/guanlis.png  height="45" width="45"  alt="" border="0" >
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">信息管理</h>
        </div>    
        <div class="topbtn" style="background:url(./img/barbg2.png);">
           <a  href="induceRelease.php" style="margin-left:1.5px;">
            <img src=img/youdaos.png   height="45" width="45"  alt="" border="0" >
            </a>
            <h style="float:left;color:#0150a2;font-size:8px;padding:4px 0 0 12px;">诱导发布</h>
        </div>
      </div>               
    </div> 
  </div>
  <div id="inforbar" > 
    <marquee id="marquee" onMouseOver="this.stop()" onMouseOut="this.start();" style="height:20px;margin-top:2px;"> 
    </marquee>
  </div> 
  <!----------------------侧边栏------------------------------------>
  <div id="sideMenu" style="width:7.8%;float:left;background:#ddcf8f;float:left;display:block;">
    <div class="inre_menu" style="width:100%;">
       <div style="height:20px;"></div>
       <ul>
          <li>
               <a href="#" onClick="javascript:addMarker()"> <img src="ico/the_first_ico/screen1.png" /><div class="menufont" >诱导屏</div></a>
          <li>
              <a href="#" onClick="javascript:addMarker_bus()"><img src="ico/the_first_ico/bus_station1.png" /><div  class="menufont">公交站牌</div></a>
          </li>
          <li>
              <a href="#" onClick="javascript:addRoad()"><img src="ico/the_first_ico/web_publish1.png" /><div  class="menufont">网页发布</div></a>
          </li> 
          <li>
              <a href="#" onClick="javascript:addphone()"><img src="ico/the_first_ico/phone1.png" /><div  class="menufont">手机发布</div></a>
          </li> 
          <li>
              <a href="#" onClick="javascript:addRoad()"><img src="ico/the_first_ico/information_board1.png" /><div  class="menufont">信息板</div></a>
          </li>   
       </ul>
    </div>
  </div>
  <div style="width:9px;height:700px;border-right:1px #999 solid;float:left;"><a href="#" onclick="display_sidebar()">></a></div>
  <!----------------------中央地图------------------------------------>
  <!--<div id="map_container" style="width:70%;height:597px;float:left;"></div>-->
  <div id="bMap"  style=" position:relative;float:left; overflow:hidden; margin:0;">
    <div id="iCenter"  style="width:100%;float:left; " ></div>  
  </div>
  <!----------------------右侧信息模块----------------------------------
  <div style="width:22%;height:595px;border:1px solid #CCC;float:left;background-color:#6CC">
  对应信息显示
  </div>-->
   <div id="TextViewPanel" style="background:#FFF;" >
    <!---------------------------------------手机发布---------------------------------------------->  
    <div id="phone" style="display:none;background:url(ico/the_first_ico/phone_app.png);width:280px;height:530px;"> 
    <div id="phonemap" style="width:210px;height:380px;position:absolute;left:30px;top:70px;"></div>
    </div>
    
    
    <!---------------------------------------公交站牌---------------------------------------------->  
        <script> var myArray = new Array('八字桥站','松木场站','市府大楼','天目山站');</script>
        
      
         <div id="bus3" style="background-color:#FFF;display:none;width:100%;height:550px; border-bottom:#fff 1px solid;"> 
            <div style="border:10px solid #fff ;border-radius:15px;"> <img src="images/bus3.png"  width="390" height="260" /></div>
            <div id="busname" ><script>document.write(myArray[2])</script></div> 
              <div id="stationname">6路(少年宫-长城机电)</div>
              <div id="stationname">21路(城站火车站-西湖体育馆)</div>
              <div id="stationname">24路(杭州高级中学-蒋村公交中心站)</div>
              <div id="stationname">57路(大关小区-大关小区)</div> 
              
            <div style="border-bottom::#fff 1px solid;text-align:center;font-size:15px;" >起点站首末班时间 06:00 - 22:00 </div></div>
            
            <div id="bus2" style="background-color:#FFF;display:none;width:100%;height:550px; border-bottom:#fff 1px solid;"> 
            <div style="border:10px solid #fff ;border-radius:15px;"> <img src="images/bus2.png"  width="390" height="260" /></div>
            <div id="busname" ><script>document.write(myArray[1])</script></div>
              <div id="stationname">16路(岳王路-浙大)</div>
              <div id="stationname">17路(西湖科技园-松木场河西)</div>
              <div id="stationname">28路(火车东站西-植物园)</div>
              <div id="stationname">49路(城站火车站-汽车西站)</div>
              
            <div style="border-bottom::#fff 1px solid;text-align:center;font-size:15px;" >起点站首末班时间 06:00 - 22:00 </div></div>
            
            <div id="bus1" style="background-color:#FFF;display:none;width:100%;height:550px; border-bottom:#fff 1px solid;"> 
            <div style="border:10px solid #fff ;border-radius:15px;"> <img src="images/bus1.png "  width="390" height="260" /></div>
            <div id="busname" ><script>document.write(myArray[0])</script></div> 
              <div id="stationname">24路(蒋村公交中心站-杭州高级中学)</div>
              <div id="stationname">900路(三墩-城站火车站 )</div>
              <div id="stationname">b1路(黄龙公交站-下沙高教东区)</div>
              <div id="stationname">b4路(闲林埠-火车东站西)</div>
            <div style="border-bottom::#fff 1px solid;text-align:center;font-size:15px;" >起点站首末班时间 06:00 - 22:00 </div></div>
           
            
            <div id="bus4" style="background-color:#FFF;display:none;width:100%;height:550px; border-bottom:#fff 1px solid;"> 
            <div style="border:10px solid #fff ;border-radius:15px;"> <img src="images/bus4.png"  width="390" height="260" /></div>
            <div id="busname" ><script>document.write(myArray[3])</script></div> 
              <div id="stationname">15路(汽车北站-植物园)</div>
              <div id="stationname">17路(西湖科技园-松木场河西)</div>
              <div id="stationname">49路(城站火车站-汽车西站 )</div>
              <div id="stationname">53路(蒋村公交中心站-蒋村公交中心站 )</div>
            <div style="border-bottom::#fff 1px solid;text-align:center;font-size:15px;" >起点站首末班时间 06:00 - 22:00 </div></div>
            
           
           
       
            <!-------------------------------------虚拟屏---------------------------------------------->
        <div id="Text" >
          <div style="width:100%;height:28px; border-bottom:#f0f0f0 1px solid;background:#f8f8f8;">
          
            <div id="guidename" class="guidename">虚拟诱导屏</div>
          </div>
          
        <!-------------------------------------虚拟诱导屏---------------------------------------------->
          <div id="guide" style="width:100%;height:230px;font:'微软雅黑';background:#f8f8f8;padding:8px 0 0 0;">
              <div id="youdao">          
                  <canvas id="myCanvas"  style=" width:100%;height:210px;margin-bottom:3px;"> 
                  </canvas> 
              </div>                             
          </div>
          <div style="height:1px;width:382px;background:#fff;margin-left:14px;font-size:0px;margin-top:1px;"></div>
 		  <div id="roadnamecopy2">
            <input type="text" value="当前路段：天目山路（保俶-杭大）" id="road_name2" name="road_name" disabled="disabled" style="border:none;width:375px;font-family:微软雅黑, Verdana, sans-serif;font-size:18px;color:#555555;text-align:center;background-color:#f8f8f8;margin-left:17px;" />
          </div>
          <div id="ronghe"> </div>          
          <!--------------------------各源详细信息+设置-------------------------------------> 
          <div id="detailInfor" style="margin-top:13px;">
            <div id="bg">
              <div id="roadname">
                <form id="changeSta" action="change_record.php" method="post" target="blank_iframe">
                  <input type="text" value="天目山路（保俶-杭大）" id="road_name1" name="road_name" disabled="disabled" style="border:none;width:100%;font-family:微软雅黑, Verdana, sans-serif;font-size:12px;color:#555555; text-align:center;background-color:#e7e7e7;" />  
                  <input type="hidden" value="2" id="road_id" name="road_id">        <!---隐藏表单--->         
                  <iframe id="blank_iframe" name="blank_iframe"  style="display:none;"></iframe>  <!---防跳转----->
               </div>                          
               <div id="l1" style=" position:absolute;margin-top:91px;left:84px;width:40px;height:15px;"></div>
               <div id="l2" style=" position:absolute;margin-top:91px;left:171px;width:40px;height:15px;"></div>
               <div id="l3" style=" position:absolute;margin-top:91px;left:258px;width:40px;height:15px;"></div>
               <div id="l4" style=" position:absolute;margin-top:91px;left:345px;width:40px;height:15px;"></div>
               <div id="fusionSta" style="position:absolute;margin-top:146px;left:219px;width:40px;height:15px;"></div>
               <div id="pubStatus" style="position:absolute;margin-top:222px;left:219px;width:40px;height:15px;"></div>
             </div>    
             <div style="height:20px;width:339px;background:#e7e7e7;margin-left:58px; color:#F30;font-size:12px;">
               <h style="padding-left:9px;">注意:下方控制台可调控当前路段发布状态，请谨慎使用!</h>
             </div>

             <div id="staSet">
                <div id="staSetbg">
                <table width="50%" table-layout:fixed; style="float:left;"> 
                 <tr> 
                    <td style="position:absolute; width:16px;height:16px; margin-top:5px;left:85px;">
                    <input type="radio" name="pub_status" id="sta1"  value="1" class="regular-radio" checked/>
                    <label for="sta1"></label> </td>
                    <td style=" position:absolute; width:16px;height:16px; margin-top:5px;left:121px;"> 
                    <input type="radio" name="pub_status" id="sta2"  value="2" class="regular-radio"/>
                    <label for="sta2"></label> </td>
                    <td style=" position:absolute; width:16px;height:16px; margin-top:5px;left:156px;"> 
                    <input type="radio" name="pub_status" id="sta3"  value="3" class="regular-radio"/>
                    <label for="sta3"></label> </td>
                 </tr>
                    
                 <tr > 
                     <td style="position:absolute; width:16px;height:16px; margin-top:5px;left:220px;">
                     <input type="radio"  name="time" id="time1" value="5"  class="regular-radio" checked/>
                     <label for="time1"></label>  </td>
                     <td style=" position:absolute; width:16px;height:16px; margin-top:5px;left:256px;">
                     <input type="radio"  name="time" id="time2" value="10" class="regular-radio"/>
                     <label for="time2"></label> </td>
                     <td style=" position:absolute; width:16px;height:16px; margin-top:5px;left:292px;">
                     <input type="radio"  name="time" id="time3" value="15" class="regular-radio"/>
                     <label for="time3"></label> </td>
                 </tr>   
                 </table>
                
                     <input type="submit" value="路况修改"  id="publish"
                     style="font-family:微软雅黑, Verdana, sans-serif;float:right;width:73px;height:40px; position:absolute;margin-top:8px;left:318px;" onClick="pub_change();"/>

                     </form>
                </div>
              </div>
            </div> 
            </div>
   </div>  
  

<!---------------------------------------js---------------------------------------------->   


<script>


function autoHeight(){	
	if (window.innerHeight){//FF
		nowHeight = window.innerHeight;
	}else{
		nowHeight = document.documentElement.clientHeight;
	}
		var jianHeight = 60;
	if(nowHeight > jianHeight){
		document.getElementById('bMap').style.height = nowHeight - 102 + 'px';
		document.getElementById('TextViewPanel').style.height = nowHeight - 102 + 'px';
	}else{
		document.getElementById('bMap').style.height = jianHeight + 'px';
		document.getElementById('TextViewPanel').style.height = jianHeight + 'px';
	}
		document.getElementById('bMap').style.width = innerWidth - 527 + 'px';
	}
    autoHeight();
    window.onresize = autoHeight;
		var	changetime=new Array([10]); 
		var pubSta=new Array([10]);
		var lastTime=new Array([10]);
		var sta=new Array([10]); 
		var status1,status2,status3,status4,ps,fs;
		var tmp,bcd;
		var c=document.getElementById("myCanvas"); 
		var cxt=c.getContext("2d");	

		
	function iconCh(){
		switch (status1)
		{
		case 1:
		  document.getElementById('l1').style.backgroundImage='url(img/gs.png)';
		  break;
		case 2:
		 document.getElementById('l1').style.backgroundImage='url(img/ys.png)';
		  break;
		case 3:
		 document.getElementById('l1').style.backgroundImage='url(img/rs.png)';
		  break;
		  default:
		 document.getElementById('l1').style.backgroundImage='url(img/dark.png)';
		  break;
		}
		switch (status2)
		{		
		case 1:
		  document.getElementById('l2').style.backgroundImage='url(img/gs.png)';
		  break;
		case 2:
		 document.getElementById('l2').style.backgroundImage='url(img/ys.png)';
		  break;
		case 3:
		 document.getElementById('l2').style.backgroundImage='url(img/rs.png)';
		  break;
		default:
		 document.getElementById('l2').style.backgroundImage='url(img/dark.png)';
		  break;
		}
		switch (status3)
		{		
		case 1:
		  document.getElementById('l3').style.backgroundImage='url(img/gs.png)';
		  break;
		case 2:
		 document.getElementById('l3').style.backgroundImage='url(img/ys.png)';
		  break;
		case 3:
		 document.getElementById('l3').style.backgroundImage='url(img/rs.png)';
		  break;
		default:
		 document.getElementById('l3').style.backgroundImage='url(img/dark.png)';
		  break;
		}		
		switch (status4)
		{		
		case 1:
		  document.getElementById('l4').style.backgroundImage='url(img/gs.png)';
		  break;
		case 2:
		 document.getElementById('l4').style.backgroundImage='url(img/ys.png)';
		  break;
		case 3:
		 document.getElementById('l4').style.backgroundImage='url(img/rs.png)';
		  break;
		default:
		 document.getElementById('l4').style.backgroundImage='url(img/dark.png)';
		  break;
		}
		switch (fs)
		{		
		case 1:
		  document.getElementById('fusionSta').style.backgroundImage='url(img/gb.png)';
		  break;
		case 2:
		 document.getElementById('fusionSta').style.backgroundImage='url(img/yb.png)';
		  break;
		case 3:
		 document.getElementById('fusionSta').style.backgroundImage='url(img/rb.png)';
		  break;
		default:
		 document.getElementById('fusionSta').style.backgroundImage='url(img/bd.png)';
		  break;
		}		
	
		switch (ps)
		{		
		case 1:
		
		 document.getElementById('pubStatus').style.backgroundImage='url(img/gb.png)';
		  break;
		case 2:
	
		 document.getElementById('pubStatus').style.backgroundImage='url(img/yb.png)';
		  break;
		case 3:
		 document.getElementById('pubStatus').style.backgroundImage='url(img/rb.png)';
		  break;
		default:
		 document.getElementById('pubStatus').style.backgroundImage='url(img/bd.png)';
		  break;
		}	
	};	
	
	function road_color(i){     
	  switch(mode){
		case 1:
			switch(sta[i]){
			case 1:
				cxt.fillStyle='#00ff34';
				mapColor[i]='#00ff34'
				break;
			case 2:
				cxt.fillStyle='yellow';
				mapColor[i]='yellow';
				break;
			case 3:
				cxt.fillStyle='red';
				mapColor[i]='red';
				break;
			default:
				cxt.fillStyle='#FF0000';
				mapColor[i]='#FF0000';
				break;

			}
			break;
		case 2:
				switch(sta[i]){
			case 1:
				cxt.fillStyle='#00ff34';
				mapColor[i]='#00ff34'
				break;
			case 2:
				cxt.fillStyle='yellow';
				mapColor[i]='yellow';
				break;
			case 3:
				cxt.fillStyle='red';
				mapColor[i]='red';
				break;
			default:
				cxt.fillStyle='#FF0000';
				mapColor[i]='#FF0000';
				break;
			}
		
			break;
		default:	
		     alert("模式设置错误！");
	  		 break;
	  }
// 	cxt_map.strokeStyle=cxt.fillStyle;
	}
		
	
function pub_change()                        	    //发布状态修改
	{
	
	  id= document.getElementById("road_id").value;  //获取隐藏表单中的当前显示路段的id

	  y=document.getElementsByName("pub_status");  
	   for(var i=0;i<y.length;i++)
	   {
		 if(y.item(i).checked){
			 x=y.item(i).getAttribute("value");  
	   break;
	  }
	  else{
	  continue;
	  }
	   }	   
	 pubSta[id]=x;                              //获取当前id状态变化修改的表单值
	
	  y=document.getElementsByName("time");  
	   for(var i=0;i<y.length;i++)
	   {
		 if(y.item(i).checked){
			 z=y.item(i).getAttribute("value");  
	   break;
	  }else{
	  continue;
	  }
	   }
	 lastTime[id]=z;  
	 
	 var myDate1 = new Date();
	 changetime[id]=myDate1.getTime()/1000;      
	  
	 ps=Number(pubSta[id]);                  	
	 iconCh();
	 
	 sta[id]=Number(pubSta[id]);
	 
	 drawGuide1(); 	//立即重新画一次路
	 }

	function timeJudge()
	{
		id= document.getElementById("road_id").value;   //！！
	    var myDate2 = new Date();
		nowTime=myDate2.getTime()/1000;  

		 if((nowTime-changetime[id])<lastTime[id]*60)	//比较当前时间和changeTime[id]
		 {
			 ps=Number(pubSta[id]);
			 sta[id]=Number(pubSta[id]);
		 }
		else 
		{
			ps=Number(bcd[2*id-2]); 
		}	
	};		
	
			
	function scroll() {
			
			$.get(
			'ora.php',    //donConn_mysql.php
			function(data)
			{
				tmp = data;
			}
			);
		 bcd = tmp.split(',');	                  
	   
	   for(i=0;i<11;i++){
			sta[i]=Number(bcd[2*i]);	   //融合结果放在sta[i]里面
			road_color(i);                 //map路段颜色
			};
			
			
	    id= document.getElementById("road_id").value;  //获取隐藏表单中的当前显示路段的id
		
	    sourceSta=String(bcd[2*id-1]);  //数据源状态转换为字符串
		status1=Number(sourceSta[0]);
		status2=Number(sourceSta[1]);
		status3=Number(sourceSta[2]);
		status4=Number(sourceSta[3]);
  	    fs=Number(bcd[2*id-2]);        
       
	    //roadline();  //根据上述状态设置道路性
		timeJudge();		
    	iconCh();
	    drawGuide1();
}

		   //这边要执行一次 不然打开网页的时候不会读取一次数据库 也就看不到路况了
	
	$(document).ready(
		function () 
		{
			//setInterval("scroll();",20000);
			setInterval("updateRadialGauge(1);",20000);
						
		});


	//静态标记  路段名 行驶方向 当前位置 
	
</script>

</body>
</html>