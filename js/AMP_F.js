// JavaScript Document
//预测按钮
pre_time=0
function clievent(){
	AMap.event.addListener(map,"mapmove",function(e)
			{ 
			if(xxx==1){
				draw_via_rnxml_Request(map.getBounds());
				}
		    else if(xxx==2){
				};
			}
			); }

$(document).ready(function(){
		$("#btn2").click(function(){ $("#conIndicate").slideToggle(); }
			   	 
		);
		$("#btn3").click(function(){  $("#conIndicate2").slideToggle(); }
				 
		);
		$("#btn4").click(function(){  $("#staIndicate").slideToggle(); }
		
		);
});
					  
					  
					  
$(document).ready(function(){
		$("#btn1").click(function(){
			          $("#predict").slideToggle();
			         if(document.getElementById("btn1").className=="fBton"){
					    document.getElementById("btn1").className="fBton2";
						document.getElementById("btn3").className="fBton";
						$("#conIndicate2").slideUp();
					    document.getElementById("btn4").className="fBton";
						$("#staIndicate").slideUp(); 

					    mode=3;
						var myDate = new Date();
						pre_time=myDate.getHours()*60+myDate.getMinutes()+10;
						predict_req(map.getBounds(),pre_time)
				          //draw_via_rnxml_Request(map.getBounds()); 
					   }
			  else if(document.getElementById("btn1").className=="fBton2"){
			           document.getElementById("btn1").className="fBton"; 
					   deleteRoadInfo();
					   }
			  cong_flag=1;	
			  realconfig=1;
			 
			  }
			  );
});

//实时路况显示与隐藏
var xxx;
var realconfig=1;
function realSTA(){
	if (realconfig==1){
	deleteRoadInfo(); cong_flag=mode=1;
	draw_via_rnxml_Request(map.getBounds()); 
 	xxx=1;
	//clievent();
	document.getElementById("btn4").className="fBton2";
	document.getElementById("btn3").className="fBton";
	$("#conIndicate").slideUp();
	document.getElementById("btn1").className="fBton";
	$("#predict").slideUp();
	realconfig=2;
	}
	else if(realconfig==2)
	{
		deleteRoadInfo();
		realconfig=1;
		xxx=2;//clievent();
	    document.getElementById("btn4").className="fBton";}
}						


//拥堵指数显示与隐藏
var cong_flag=1;    
function setMode()
{	
    realconfig=1;
	if(cong_flag==1)   //1的时侯画拥堵指数
	{  
		document.getElementById("btn3").className="fBton2";
		document.getElementById("btn4").className="fBton";
		$("#staIndicate").slideUp();
		document.getElementById("btn1").className="fBton";
		$("#predict").slideUp();
		mode=cong_flag=2;
		draw_via_rnxml_Request(map.getBounds());
		xxx=1;
     	//clievent();
		}
	else if(cong_flag==2)   //2的时候删除路
	{
		xxx=2;//clievent();
		document.getElementById("btn3").className="fBton";
		mode=cong_flag=1;
		deleteRoadInfo();}
}
//地图图标显示与隐藏
	var iconFlag=1;
	function iconShow(){
	if(iconFlag==1){
	addIcon(); iconFlag=2;
	}
	else if(iconFlag==2){
	removeIcon();iconFlag=1;
	}	
	};
//热力图显示与隐藏	
    var heatflag=0;	   
	function heatONOFF(){
		if (heatflag==0){
			document.getElementById("btn2").className="fBton2";
			addHeatmap();
			heatflag=1;
			}
		else if (heatflag==1)
		{
			document.getElementById("btn2").className="fBton";
			removeMap();
			heatflag=0;
       	}
	}
    function addHeatmap(){
     bounds = new AMap.Bounds(new AMap.LngLat(120.117771,30.251559), new AMap.LngLat(120.188781,30.305243)),
     groundImageOpts = {
            opacity: 0.3,   //图片透明度
            clickable: true,//图片相应鼠标点击事件，默认：false
            map: map     //图片叠加的地图对象
        };
    groundImage = new AMap.GroundImage('img/heatmap.jpg', bounds, groundImageOpts);
   // map.setBounds(bounds);
		}
		
   function removeMap(){
	   groundImage.setMap(null);
	   }

	   

	
function addIcon(){
       markerG1 = new AMap.Marker({ position: gPos1, offset:{x:-13,y:-29} ,icon:"ico/vled_marker.png"  });// 自定义构造AMap.Marker对象    
	   markerG2 = new AMap.Marker({ position: gPos2, offset:{x:-13,y:-29} ,icon:"ico/vled_marker.png"  });// 自定义构造AMap.Marker对象   	
	   markerG3 = new AMap.Marker({ position: gPos3, offset:{x:-13,y:-29} ,icon:"ico/vled_marker.png"  });// 自定义构造AMap.Marker对象  
	   markerG4 = new AMap.Marker({ position: gPos4, offset:{x:-13,y:-29} ,icon:"ico/vled_marker.png"  });// 自定义构造AMap.Marker对象   	
	   markerG5 = new AMap.Marker({ position: gPos5, offset:{x:-13,y:-29} ,icon:"ico/vled_marker.png"  });// 自定义构造AMap.Marker对象    
	   markerG1.setMap(map); markerG2.setMap(map); markerG3.setMap(map); markerG4.setMap(map); markerG5.setMap(map);
		
	
		 
		AMap.event.addListener(markerG1, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 }); 	
		
		AMap.event.addListener(markerG2, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 }); 
		
		AMap.event.addListener(markerG3, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 }); 
		
		AMap.event.addListener(markerG4, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 }); 
		
		AMap.event.addListener(markerG5, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 });  
			
		markerM1 = new AMap.Marker({ position: new AMap.LngLat(120.14197826,30.27819262), offset:{x:-13,y:-29} ,icon:"ico/weibo_marker1.png"  });
		markerM2 = new AMap.Marker({ position: new AMap.LngLat(120.15017509,30.2774514), offset:{x:-13,y:-29} ,icon:"ico/weibo_marker1.png"  });
		markerM3 = new AMap.Marker({ position: new AMap.LngLat(120.14725685,30.2829734), offset:{x:-13,y:-29} ,icon:"ico/weibo_marker1.png"  });
		markerM4 = new AMap.Marker({ position: new AMap.LngLat(120.13541222,30.27207734), offset:{x:-13,y:-29} ,icon:"ico/weibo_marker1.png"  });
        markerM1.setMap(map);  markerM2.setMap(map);  markerM3.setMap(map);  markerM4.setMap(map);
				
		
		
        markerV1 = new AMap.Marker({  position: new AMap.LngLat(120.141977,30.266036), offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});
		markerV2 = new AMap.Marker({  position: new AMap.LngLat(120.14735,30.267442),  offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});	
		markerV3 = new AMap.Marker({  position: new AMap.LngLat(120.154946,30.270755), offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});	
		markerV4 = new AMap.Marker({  position: new AMap.LngLat(120.145768,30.271762), offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});	
		markerV5 = new AMap.Marker({  position: new AMap.LngLat(120.140932,30.271723), offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});
	    markerV6 = new AMap.Marker({  position: new AMap.LngLat(120.15459,30.272612),  offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});
	    markerV7 = new AMap.Marker({  position: new AMap.LngLat(120.154608,30.272555), offset:{x:-13,y:-29} , icon:"ico/video_marker1.png" 	});
	    markerV1.setMap(map);  markerV2.setMap(map); markerV3.setMap(map); markerV4.setMap(map); markerV5.setMap(map); markerV6.setMap(map); 			        markerV7.setMap(map); 
	 
		addVideoMarker(markerV1,new AMap.LngLat(120.141977,30.266036),'曙光路-杭大路交叉口 曙光路');
		addVideoMarker(markerV2,new AMap.LngLat(120.14735,30.267442),'体育场路-保俶路交叉口 曙光路');
		addVideoMarker(markerV3,new AMap.LngLat(120.154946,30.270755),'体育场路-环城西路交叉口 环城西路');
		addVideoMarker(markerV4,new AMap.LngLat(120.145768,30.271762),'天目山路-保俶路交叉口 天目山路');
		addVideoMarker(markerV5,new AMap.LngLat(120.140932,30.271723),'天目山路-杭大路交叉口 杭大路');
		addVideoMarker(markerV6,new AMap.LngLat(120.15459,30.272612),'天目山路-环城西路交叉口 莫干山路');
		addVideoMarker(markerV7,new AMap.LngLat(120.154608,30.272555),'天目山路-环城西路交叉口 天目山路');
	   
	   }
	   
	function removeIcon(){
     	markerG1.setMap(null);markerG2.setMap(null);markerG3.setMap(null);markerG4.setMap(null);markerG5.setMap(null);
		markerV1.setMap(null);markerV2.setMap(null);markerV3.setMap(null);markerV4.setMap(null);markerV5.setMap(null);
		markerV6.setMap(null);markerV7.setMap(null);
		
		markerM1.setMap(null);  markerM2.setMap(null);  markerM3.setMap(null);  markerM4.setMap(null);
		}
   
	
/*function addGuideScr(location){
	    var  marker = new AMap.Marker({  
			position: location,  
			offset:{x:-13,y:-29} , 
			icon:"ico/vled_marker.png" 
			});// 自定义构造AMap.Marker对象
	
		AMap.event.addListener(marker, 'click', function(event) {
		$("#guide").fadeOut("slow");
		$("#guide").fadeIn("slow");
		 }); 
		
	   marker.setMap(map);  
 	};*/
	
var selc_video_view = null;
function addVideoMarker(marker,location,videoname)
	{
		/*   marker = new AMap.Marker({  
			position: location,  
			offset:{x:-13,y:-29} , 
			icon:"ico/video_marker1.png" 
			});// 自定义构造AMap.Marker对象
		marker.setMap(map);  */
		AMap.event.addListener(marker, 'click', function(event) {
		var lnglat=event.lnglat;
		var alat=lnglat.lat;
		var alng=lnglat.lng;
		video_loc = location;
		addVideoView("rvideo/"+videoname+".mp4");
		 }); 
	

	}
	
function addVideoView(url) 
	{
		if(selc_video_view!=null) {
			selc_video_view.setMap(null);
			selc_video_view = null;
			}
		var video_c = document.createElement("div");
		video_c.className = "video_c";
		var video = document.createElement("video");
		//var video = document.getElementById("guide");
		video.className = "video";
		video.width = 352;
		video.height =228;
		video.style.backgroundColor="#000000"
		video.src = url;
		video.autoplay = "autoplay";
		video.loop="loop";
		
		var video_clo_btn = document.createElement("image");
		video_clo_btn.className = "video_clo_btn";
		video_clo_btn.width=40;
		video_clo_btn.height=15;
		video_clo_btn.src="ico/close.jpg";
		video_clo_btn.onclick=function(){
			selc_video_view.setMap(null);
			selc_video_view=null;
			};
		video_c.appendChild(video);
		video_c.appendChild(video_clo_btn);
		  
		  
		var marker = new AMap.Marker({  
			//map:map, //添加到地图  
			position:video_loc,//基点位置  
			offset:new AMap.Pixel(-187,-290),//相对于基点的偏移位置  
			 //draggable:true, //是否可拖动
			content:video_c //自定义覆盖物内容  
			});
			selc_video_view = marker;
			marker.setMap(map);
	};
	
	

function setRoadStrw(zoom) {
	var strokew = 3;
	if (zoom == 14) strokew = 2.5;
	if (zoom == 13) strokew = 2;
	if (zoom == 12) strokew = 1.5;
	if (zoom == 11) strokew = 1;
		return strokew;
	}
function setRoadtral(zoom) {
	var tra_l = -1;
    if (zoom == 15) tra_l = 0.00008;
	if (zoom == 14) tra_l = 0.00014;
	 if (zoom == 13) tra_l = 0.00025;
	if (zoom == 12) tra_l = 0.0004;
	if (zoom == 11) tra_l = 0.0006;
	return tra_l;
	}
function addRoadInfo(roadinfo_list)
  {
  zoomLevel = map.getZoom();
  deleteRoadInfo();
  if(zoomLevel<11) return;
  var strokew = setRoadStrw(zoomLevel);
  var tra_l = setRoadtral(zoomLevel);
  var roadinfo_Paint;  
  var roadinfo_Path;
  var roadid;
  var stroke_col;
  if(roadinfo_list!=null)
  for(var i=0;i<roadinfo_list.length;i++)
  {
	    var roadinfo=roadinfo_list[i];
		var col=roadinfo[0];
		col=Number(col);   //路段状态
		roadid=roadinfo[1];
		roadinfo_Path=new Array();
		for(var j=2;j<roadinfo.length;j+=2)
		{		
			  roadinfo_Path.push(new AMap.LngLat(roadinfo[j],roadinfo[j+1]));   //路段路径
			}
		
		if(tra_l>0)
		roadline_tra(roadinfo_Path,tra_l);
	    if (mode==1){
		switch (col) {
			case 1:stroke_col="#006400";break;//线颜色 绿色
			case 2:stroke_col="#ff8c00";break;//线颜色 黄色
			case 3:stroke_col="#ff0000";break;//线颜色 红色
		   default:stroke_col="#FF0000";break;//线颜色 白色
		}}
		if (mode==2){
			switch (col) {
			case 0:stroke_col="#0033FF";break;//线颜色 绿色
			case 1:stroke_col="#00FFFF";break;//线颜色 绿色
			case 2:stroke_col="#00FF99";break;//线颜色 黄色
			case 3:stroke_col="#33FF00";break;//线颜色 红色
			case 4:stroke_col="#CCFF00";break;//线颜色 红色
			case 5:stroke_col="#FFFF00";break;//线颜色 红色
			case 6:stroke_col="#FFCC00";break;//线颜色 红色
			case 7:stroke_col="#FF9900";break;//线颜色 红色
			case 8:stroke_col="#FF6600";break;//线颜色 红色
			case 9:stroke_col="#FF3300";break;//线颜色 红色
			case 10:stroke_col="#FF0000";break;//线颜色 红色
			default:stroke_col="#FFFFFF";break;//线颜色 白色
		}}
		
		roadinfo_Paint=new AMap.Polyline({
			path:roadinfo_Path,
			strokeColor:stroke_col,//线颜色 绿色
			strokeOpacity:1,//线透明度
			strokeWeight:strokew,//线宽
  			});
			
	//if(i==2)
	roadinfo_Paint.setMap(map);	
	//map.setFitView();
	polyLineArray.push(roadinfo_Paint);
	
	  }//for
	  
  }//addRoadInfo 
  

function predict_req(bounds,pre_time) {
	deleteRoadInfo();
	var botlat=bounds.southwest.lat;
	var rlng=bounds.northeast.lng;
	var uplat=bounds.northeast.lat;
	var llng=bounds.southwest.lng;
		url="netQRY_PRE.php?pre_time="+pre_time+"&botlat="+botlat+"&rlng="+rlng+"&uplat="+uplat+"&llng="+llng;
		$.get(
		url,
		function(data,status){
			drawroadinfo_via_rnxmlPRE(data,status) 
			}
		)
	
	}
function drawroadinfo_via_rnxmlPRE(data,status) {          //随机预测状态画路
var xmlDoc = data;
//var xmlDoc=draw_v_rnxml_Http.responseXML;
var roads= xmlDoc.getElementsByTagName("road");
if (roads.length==0){alert("无数据");return;}
var roadinfo_list=new Array();

for(var i=0;i<roads.length;i++) {
	var roadinfo=new Array();
    var otherroadinfo=new Array();
	road=roads[i];
	var roadid=road.getElementsByTagName("roadid")[0].childNodes[0].nodeValue;
	var roadstatus = road.getElementsByTagName("roadstatus")[0].childNodes[0].nodeValue;
	//roadinfo.push(Math.floor(Math.random()*3+1));  //随机预测状态

	roadinfo.push(roadstatus);
	
	roadinfo.push(roadid);                         //路段id
	var nodes=road.getElementsByTagName("node");
	for(var j=0;j<nodes.length;j++) //遍历节点，push节点坐标
	{
		node=nodes[j];
		var nodid=(node.getElementsByTagName("nodeid"))[0].childNodes[0].nodeValue;
		var nodx=((node.getElementsByTagName("nodx"))[0].childNodes[0].nodeValue)*1;
		var nody=((node.getElementsByTagName("nody"))[0].childNodes[0].nodeValue)*1;
			roadinfo.push(nodx);                                                       //x坐标
			roadinfo.push(nody);                                                       //y坐标
		}
		roadinfo_list.push(roadinfo);//push(1)表示路况信息，用来表示线的颜色        
	}

	addRoadInfo(roadinfo_list);//显示路径信息；

}
  
  
  
function deleteRoadInfo() {
	 
  if (polyLineArray.length!=0) {
	  
    for (i in polyLineArray) {
	polyLineArray[i].setMap(null);
    //map.removeOverlays(polyLineArray[i]);
    }
	
	polyLineArray.length = 0;
	
  }
  
}

function GetXmlHttpRequest()
{
	
	var xmlHttp=null;
	try
	{
		xmlHttp=new XMLHttpRequest();
		}
		catch(e)
		{
			try
			{
				xmlHttp=new ActiveXObject("Msxml2.XMLHTTP");
				}
				catch(e)
				{
					try
					{
						xmlHttp=new ActiveXObject("Microsoft.XMLHTTP");
						}
						catch(e)
						{
							xmlHttp=false;
							}
					}
			}
			
			return xmlHttp;
	}

var draw_v_rnxml_Http=null;
function draw_via_rnxml_Request(bounds)
	{
		if (mode==3) return;
	var botlat=bounds.southwest.lat;
	var rlng=bounds.northeast.lng;
	var uplat=bounds.northeast.lat;
	var llng=bounds.southwest.lng;
		var url;
		if (mode==1){
			url="netQRY_STA.php?";
			}
	   if (mode==2){
		   url="netQRY_CONGEST.php?";
		   }
		/*url=url+"?testvar="+roadid;*/
		url=url+"botlat="+botlat+"&rlng="+rlng+"&uplat="+uplat+"&llng="+llng;
		/*alert(url);*/
		draw_v_rnxml_Http=GetXmlHttpRequest();
		if(!draw_v_rnxml_Http)
		{
			alert("浏览器不支持XmlHttpRequest!");
			}
			draw_v_rnxml_Http.open("GET",url,true);
			
		draw_v_rnxml_Http.onreadystatechange=drawroadinfo_via_rnxml;
		
			draw_v_rnxml_Http.send(null);	
		}
	
function drawroadinfo_via_rnxml() { 
var x_offset,y_offset;
var tax=0;
if (draw_v_rnxml_Http.readyState==4 &&draw_v_rnxml_Http.status==200) {	
var xmlDoc=draw_v_rnxml_Http.responseXML;
var roads= xmlDoc.getElementsByTagName("road");
var roadinfo_list=new Array();

for(var i=0;i<roads.length;i++) {
	var roadinfo=new Array();
    var otherroadinfo=new Array();
	//roadinfo.push(Math.floor(10*Math.random()%3)+1);
	//otherroadinfo.push(Math.floor(10*Math.random()%3)+1);
	//roadinfo.push(1);
	road=roads[i];
	var roadid=road.getElementsByTagName("roadid")[0].childNodes[0].nodeValue;
	//roadinfo.push(Math.floor(10*Math.random()%3)+1);
	//alert (road.getElementsByTagName("roadstatus")[0].childNodes[0].nodeValue);
	
	roadinfo.push(road.getElementsByTagName("roadstatus")[0].childNodes[0].nodeValue);  //状态
	
	roadinfo.push(roadid);                                                              //路段id
	var nodes=road.getElementsByTagName("node");
	for(var j=0;j<nodes.length;j++) //遍历节点，push节点坐标
	{
		node=nodes[j];
		var nodid=(node.getElementsByTagName("nodeid"))[0].childNodes[0].nodeValue;
		var nodx=((node.getElementsByTagName("nodx"))[0].childNodes[0].nodeValue)*1;
		var nody=((node.getElementsByTagName("nody"))[0].childNodes[0].nodeValue)*1;
			roadinfo.push(nodx);                                                       //x坐标
			roadinfo.push(nody);                                                       //y坐标
		}//for j
		
		roadinfo_list.push(roadinfo);//push(1)表示路况信息，用来表示线的颜色        
		//roadinfo_list.push(otherroadinfo);
	}//for i
	addRoadInfo(roadinfo_list);//显示路径信息；
 }
}