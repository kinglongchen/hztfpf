<!DOCTYPE HTML>  
<html>
<head>
<meta name="viewport" content="initial-scale=1.0,user-scalable=no">
<meta http-equiv="Content-Type" content="text/html;charset=utf-8">
<title>智慧交通信息服务平台</title>
<link rel="stylesheet" type="text/css" href="css/style.css" />
<link rel="stylesheet" type="text/css" href="css/choose.css">
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/AMP_F.js"></script>
<script type="text/javascript" src="js/rectRound.js"></script>
<script src="http://webapi.amap.com/maps?v=1.2&key=yourkey" type="text/javascript"></script>
<script type="text/javascript" src="js/sliderTime.js" ></script>  
<script type="text/javascript"  src="js/roadline_op.js"> </script>
<script type="text/javascript"  src="js/hashmap.js"> </script>
<script type="text/javascript"  src="js/drawGuide.js"> </script> 
<!--8_11添加################################################################################## -->
<link rel="stylesheet" type="text/css" href="css/jquery.jqGauges.css" />
<script src="js/jquery.jqGauges.min.js"></script>
<!--[if IE]><script lang="javascript" type="text/javascript" src="js/excanvas.js"></script><![endif]-->
<script lang="javascript" type="text/javascript">
 			$(document).ready(function () {
			initRadialGauge();
           	updateRadialGauge(1);
			
        });
	function updateRadialGauge(area_id) {
		url = 'area_con.php?area_id='+area_id;
		 $.get(
			url,
			function(data,status){
				var objs = eval(data);
				var crowded_num = String(objs.crowded_num).substring(0,3);
				var viaduct_num = String(objs.viaduct_num).substring(0,3);
				var ground_num = String(objs.ground_num).substring(0,3);
				document.getElementById("crowded_text").innerHTML=crowded_num;
				document.getElementById("viaduct_text").innerHTML=viaduct_num;
				document.getElementById("ground_text").innerHTML=ground_num;
				$('#chart_gauges').jqRadialGauge('option', 'scales')[0].needles[0].value=crowded_num;
				$('#chart_gauges').jqRadialGauge('update');
		
				}
			)
		
		}
	function initRadialGauge() {
		var crowded_num=0;
			var viaduct_num=0;
			var ground_num=0;
			document.getElementById("crowded_text").innerHTML=crowded_num;
			document.getElementById("viaduct_text").innerHTML=viaduct_num;
			document.getElementById("ground_text").innerHTML=ground_num;
			var gradient1 = {
                type: 'linearGradient',
                x0: 0,
                y0: 0.5,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#0065E0' },
                             { offset: 1, color: '#0AFFC9'}]
            };

            var gradient2 = {
                type: 'linearGradient',
                x0: 0,
                y0: 0.5,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#0AFFC9' },
                             { offset: 1, color: '#84FF00'}]
            };

            var gradient3 = {
                type: 'linearGradient',
                x0: 0,
                y0: 0.5,
                x1: 1,
                y1: 0.5,
                colorStops: [{ offset: 0, color: '#84FF00' },
                             { offset: 1, color: '#FFD700'}]
            };
			var gradient4 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 0,
                x1: 0.5,
                y1: 1,
                colorStops: [{ offset: 0, color: '#FFD700' },
                             { offset: 1, color: '#FF4E00'}]
            };
			var gradient5 = {
                type: 'linearGradient',
                x0: 0.5,
                y0: 0,
                x1: 0.5,
                y1: 1,
                colorStops: [{ offset: 0, color: '#FF4E00' },
                             { offset: 1, color: '#D00000'}]
            };

            var anchorGradient = {
                type: 'radialGradient',
                x0: 0.35,
                y0: 0.35,
                r0: 0.0,
                x1: 0.35,
                y1: 0.35,
                r1: 1,
                colorStops: [{ offset: 0, color: '#4F6169' },
                             { offset: 1, color: '#252E32'}]
            };
			
			
			
            $('#chart_gauges').jqRadialGauge({
                background: '#F7F7F7',
                border: {
                    lineWidth: 1,
                    strokeStyle: '#76786A',
                    padding: 7
                },
                shadows: {
                    enabled: true
                },
                anchor: {
                    visible: true,
                    fillStyle: anchorGradient,
                    radius: 0.10
                },
                tooltips: {
                    disabled: true,
                    highlighting: false
                },
                animation: {
                    duration: 1
                },
                scales: [
                         {
                             minimum: 0,
                             maximum: 10,
                             startAngle: 130,
                             endAngle: 410,
                             majorTickMarks: {
                                 lineWidth: 1,
								 length: 0,
                             },
                             minorTickMarks: {
                                 visible: true,
                                 interval: 1,
                                 lineWidth: 1,
								 length: 0,
                                 offset: 0.83
                             },
							 labels: {
                                 //orientation: 'horizontal',
                                 interval: 1,
                                 //offset: 1.00
                             },
                             needles: [
                                        {
                                            value: crowded_num,
                                            type: 'pointer',
                                            outerOffset: 0.7,
                                            mediumOffset: 0,
                                            width: 4,
                                            fillStyle: '#252E32'
                                        }
                                      ],
                             ranges: [
							 			{
											innerStartOffset: 0.05,
                                            innerEndOffset: 0.05,
                                            startValue: 0,
                                            endValue: 2,
                                            fillStyle: gradient1
                                        },
                                        {
											innerStartOffset: 0.05,
                                            innerEndOffset: 0.05,
                                            startValue: 2,
                                            endValue: 4,
                                            fillStyle: gradient2
                                        },
                                        {
											innerStartOffset: 0.05,
                                            innerEndOffset: 0.05,
                                            startValue: 4,
                                            endValue: 6,
                                            fillStyle: gradient3
                                        },
                                        {
											innerStartOffset: 0.05,
                                            innerEndOffset: 0.05,
                                            startValue: 6,
                                            endValue: 8,
                                            fillStyle: gradient4
                                        },
                                        {
											innerStartOffset: 0.05,
                                            innerEndOffset: 0.05,
                                            startValue: 8,
                                            endValue: 10,
                                            fillStyle: gradient5
                                        }
                                     ]
                         }
                        ]
            });
		}
    </script>
<!--添加完毕###########################################################################################-->       
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
	/*AMap.event.addListener(map,"zoomchange",function(e)
			{ 
			alert('zoomchange')
			if(xxx==1){
				draw_via_rnxml_Request(map.getBounds());
				}
		    else if(xxx==2){};
			}
			);*/ 
			
			}	
function initialize(){
    map = new AMap.Map("iCenter",{   
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
function incr() {
	draw_via_rnxml_Request(map.getBounds());
	setTimeout("incr()",20000);
	}
	
	var win = document.documentElement;
	window.onload=function()
	{	
	var win_hei=self.innerHeight||(win && win.clientHeight)||document.body.clientHeight;
	var win_wid=self.innerWidth ||(win && win.clientWidth) ||document.body.clientWidth;
	document.getElementById("bMap").style.width=(win_wid-400-17)+"px";
	initialize();//高德api	
	}
	
	window.onresize=function()
	{
	var win_hei=self.innerHeight||(win && win.clientHeight)||document.body.clientHeight;
	var win_wid=self.innerWidth ||(win && win.clientWidth) ||document.body.clientWidth;
 	document.getElementById("bMap").style.width=(win_wid-400-17)+"px";
	}

	function getpage(url)
		{
		$.get(url,{},function(data){
		$("#tender").html(data);
		});
		}
	
	
	function stop(){ 
			return false; 
			} 
	document.oncontextmenu=stop; 
	
	</script>
</head>   

<body>    
<!---------------标题栏----------------->
    <div id="header" style="height:70px;width:100%;background-size:100% 100%;float:left;overflow:hidden;background:url(./img/barbg.png);" >

         <div style="width:320px;height:50px;float:left;background: url(./img/logo.png) no-repeat;; margin:10px 0 0 20px;">
         </div>
         
          <div id="conPad" style="width:365px;height:100%;overflow:hidden;float:right;">
           
            <div style="width:400px;height:100%;float:left;overflow:hidden;">
               <div  class="topbtn" style="background:url(./img/barbg2.png);margin:0 4px 0 4px;">
                   <a  style="margin-left:1.5px;" > 
                    <img src=img/jiaotong2.png  height="45" width="45" alt="" border="0">
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding-left:12px;">路况显示</h>
                </div>
                <div class="topbtn" >
                    <a  href="chart.php"  style="margin-left:1.5px;">
                    <img src=img/tongjis.png   height="45" width="45" alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding-left:12px;">数据统计</h>
                </div>
                <div class="topbtn">
                    <a  href="dataManage.html" style="margin-left:1.5px;">
                    <img src=img/guanlis.png  height="45" width="45"  alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding-left:12px;">信息管理</h>
                </div>    
                <div class="topbtn">
                   <a  href="#" style="margin-left:1.5px;">
                    <img src=img/youdaos.png   height="45" width="45"  alt="" border="0" >
                    </a>
                    <h style="float:left;color:#0150a2;font-size:8px;padding-left:12px;">诱导发布</h>
                </div>
            </div> 
                          
	    </div> 
         
     </div>
     
     <div id="inforbar" > 
        	<marquee id="marquee" onMouseOver="this.stop()" onMouseOut="this.start();" style="height:30px;margin-top:2px; font:10px;"> 
				<iframe name="sinaWeatherTool" src="http://weather.news.sina.com.cn/chajian/iframe/weatherStyle0.html?city=%E6%9D%AD%E5%B7%9E" 			 					width="200" height="20" marginwidth="0" marginheight="0" hspace="0" vspace="0" frameborder="0" scrolling="no"></iframe>
      
            </marquee>
         </div> 
				   
<!----------------------------------地图区域---------------------------------->      
          <div id="bMap"  style=" position:relative;float:left; overflow:hidden; margin:0;">
               <div id="iCenter"  style="width:100%;float:left; " ></div>  
          </div>
        
          <div id="shad_v" style="height:100%;"></div>
          <div id="shad_h"></div>
          <div id="mainBar"> 
            
              
              <div id="heatMAP"> 
              <button  id="btn2" class="fBton"  onClick="heatONOFF()">区域热力图</button> 
              </div> 
              <div id="conIndex"> 
              <button  id="btn3" class="fBton"  onClick="setMode()">路段拥堵指数</button> 
              </div>  
              <button  id="btn1" class="fBton">路况预测</button>
                <div id="realSta"> 
              <button  id="btn4" class="fBton"  onClick="realSTA()">实时路况</button> 
              </div>  
              
          </div> 
               
               <div id="conIndicate" ></div>
               <div id="conIndicate2" ></div>
               <div id="staIndicate" ></div>
                
               
               <!--区域拥堵指数-->
               <div id="tool_bar3">  
                      <ul id="navs" data-open="-" data-close="+">
                            <li ><a href="#" style="background:url(img/cclose.png) no-repeat;"></a></li>
                            <li ><a href="#" style="background:url(img/yclose.png) no-repeat;"></a></li>
                             <li ><a href="#" style="background:url(img/微波.png) no-repeat;"></a></li>
                     </ul>
               </div>
               
              <script type="text/javascript">
          (function(){
				var ul=$("#navs"),li=$("#navs li"),i=5,n=i-1,r=80;
				ul.click(function(){
				iconShow();
				$(this).toggleClass('active');
				if($(this).hasClass('active')){
					for(var a=0;a<i-1;a++){
						li.eq(a).css({
					  'transition-delay':""+(50*a)+"ms",
					  '-webkit-transition-delay':""+(50*a)+"ms",
					  'transform':"translate("+(r*Math.cos(160-(180/n*a*(Math.PI/180))))+"px,"+(-r*Math.sin(160-(180/n*a*(Math.PI/180))))+"px",                       
					   '-webkit-transform':"translate("+(r*Math.cos(160-(180/n*a*(Math.PI/180))))+"px,"+(-r*Math.sin(160-(180/n*a*(Math.PI/180))))+"px",
					  '-ms-transform':"translate("+(r*Math.cos(160-(180/n*a*(Math.PI/180))))+"px,"+(-r*Math.sin(160-(180/n*a*(Math.PI/180))))+"px"
						});
					}
					}else{
						li.removeAttr('style');
					}
				});
			})($);
             </script>
               <form action="predict.php" method="post" name="demoForm" >
                    <div id="predict" >
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
                                    's_imgControl': 'img/timeSlider.gif',
                                    's_imgSlider':  'img/sldr5h_sl.gif',
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
								//alert(t_slider.e_slider.name);
								t_slider.e_slider.onclick=function(){predict_req(map.getBounds(),t_slider.n_value/60)}
								
								// = drawroadinfo_via_rnxmlPRE();
								
								
                            </script>
                    </div>
                </form>
                
                <div id="tool_bar2">
                <!--8_12添加########################################################################-->
                  <div id="chart_gauges"></div>
                  <div style="float:right;width:100px">
                      <div style="float:right;width:100px">
                        <div style="float:left;font-size:16px;font-weight:bold"><div>拥堵</div><div>指数</div></div>
                        <div id="crowded_text" style="float:right;margin:10px;font-weight:bold;font-size:24px;color:#FF9600"></div> 
                      </div>
                      <div style="float:left;border-top:#000 solid 2px">
                        <div style="font-size:14px"><span>地面指数</span><span style="color:#EEAAB2;margin:10px" id="ground_text"></span></div>
                        <div style="font-size:14px"><span>高架指数</span><span style="color:#FF3232;margin:10px" id="viaduct_text"></span></div>
                      </div>
                  </div>
                  <!--添加完毕#####################################################################-->
                </div>
          
     </div>
        <div id="TextViewPanel" >
                        <div style="width:100%;height:28px; border-bottom:#f0f0f0 1px solid;background:#f8f8f8;">
                        <div id="guidename" class="guidename">虚拟诱导屏</div>
                        
                        </div>
                    <!-------------------------------------虚拟诱导屏---------------------------------------------->
                        <div id="guide" style="width:100%;height:230px;font:'微软雅黑';background:#fff;padding:8px 0 0 0;">
                            <div id="youdao">          
                                <canvas id="myCanvas"  style=" width:100%;height:210px;margin-bottom:5px;"> 
                                </canvas> 
                            </div>                             
                        </div>
                    
                    <div style="height:1px;width:382px;background:#fff;margin-left:14px;font-size:0px;margin-top:1px;"></div>

                    <div id="roadnamecopy2">
                  			<input type="text" value="当前路段：天目山路（保俶-杭大）" id="road_name2" name="road_name" disabled="disabled"
                                                    style="border:none;width:375px;font-family:微软雅黑, Verdana, sans-serif;font-size:18px;color:#555555;
                                                           text-align:center;background-color:#f8f8f8;margin-left:17px;" />
                  </div>
                   
                  <div id="ronghe"> </div>  
                    <!--------------------------各源详细信息+设置-------------------------------------> 
                  <div id="detailInfor"    style="margin-top:13px;">
                              <div id="bg">
                                        
                                         <div id="roadname">
                                         <form id="changeSta" action="change_record.php" method="post" target="blank_iframe">
                                             <input type="text" value="天目山路（保俶-杭大）" id="road_name1" name="road_name" disabled="disabled"
                                             style="border:none;width:100%;font-family:微软雅黑, Verdana, sans-serif;font-size:12px;color:#555555; text-align:center;background-color:#e7e7e7;" />  
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
                                                 style="font-family:微软雅黑, Verdana, sans-serif;float:right;width:73px;height:40px; position:absolute;margin-top:8px;left:318px;" 
                                                 onClick="pub_change();"/>

                                                 </form>
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
		document.getElementById('bMap').style.width = innerWidth - 417 + 'px';
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