// JavaScript Document
document.write("<script type='text/javascript' src='../../../js/jquery.js'></script>")
document.write("<script src='http://webapi.amap.com/maps?v=1.2&key=8d88ae03aa109003c5a3ca3dcac6e2fc' type='text/javascript'></script>")
function Map(map_container,m) {
		var mode = m;
		var mapobj = initMap(map_container);
		var roadinfo_data = null;
		var pl_clk_fun = null;
		var polyLineArray=new Array();
		var map_move_redraw_listener = null;
		var tfinfo_redraw_listener = null;
		
		var is_for_display = false;
		
		var addRoadInfo = function() {
			var roadinfo_list = roadinfo_data;
			var zoomLevel = mapobj.getZoom();
  			deleteRoadInfo();
  			if(zoomLevel<11) return;
  			var strokew = setRoadStrw(zoomLevel);
 			var tra_l = setRoadtral(zoomLevel);
 			var roadinfo_Paint;  
  			var roadinfo_Path;
  			var roadid;
  			var stroke_col;
			
  			if(roadinfo_list!=null)
  			for(var i=0;i<roadinfo_list.length;i++) {
	    		var roadinfo=roadinfo_list[i];
				var col=parseInt(roadinfo[0]);//路段状态
				
				if (is_for_display) col = Math.floor(10*Math.random()%3)+1;
				  
				roadid=roadinfo[1];
				roadinfo_Path=new Array();
				for(var j=2;j<roadinfo.length;j+=2) {		
			  		roadinfo_Path.push(new AMap.LngLat(roadinfo[j],roadinfo[j+1]));   //路段路径
					}
		
			if(tra_l>0)roadinfo_Path = roadline_tra(roadinfo_Path,tra_l);
			if (mode == 0)
			switch (col) {
				case 1:stroke_col="#006400";break;//线颜色 绿色
				case 2:stroke_col="#ff8c00";break;//线颜色 黄色
				case 3:stroke_col="#ff0000";break;//线颜色 红色
		   		default:stroke_col="#FF0000";break;//线颜色 白色
				}
			else stroke_col = "#ff0000";
		
		
			roadinfo_Paint=new AMap.Polyline({
				path:roadinfo_Path,
				strokeColor:stroke_col,//线颜色 绿色
				strokeOpacity:2,//线透明度
				strokeWeight:strokew,//线宽
				extData:roadid
  				});
			AMap.event.addListener(roadinfo_Paint,"click",function(e){
				if (pl_clk_fun) pl_clk_fun(e.target.getExtData())
				})
			roadinfo_Paint.setMap(mapobj);
			polyLineArray.push(roadinfo_Paint);
	
	  	}//for
			
	}
	
	this.open_display = function() {
		is_for_display = true;
		}
	this.close_display = function() {
		is_for_display = false;
		}
	this.get_MapObj = function() {return mapobj}
	this.set_pl_clk_fun = function(fun) {
		pl_clk_fun = fun;
		}		
	var deleteRoadInfo = function() {
		if (polyLineArray.length!=0) {
			for (i in polyLineArray) {
				polyLineArray[i].setMap(null);
    			//map.removeOverlays(polyLineArray[i]);
    			}
			}
		polyLineArray.length = 0;
		}
		
	var drawroadinfo_via_rnxml = function(data,status) {
		var x_offset,y_offset;
		var tax=0;	
		var xmlDoc=data;
		var roads= xmlDoc.getElementsByTagName("road");
		var roadinfo_list=new Array();

		for(var i=0;i<roads.length;i++) {
			var roadinfo=new Array();
    		//var otherroadinfo=new Array();
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
			for(var j=0;j<nodes.length;j++) {//遍历节点，push节点坐标
					node=nodes[j];
					var nodid=(node.getElementsByTagName("nodeid"))[0].childNodes[0].nodeValue;
					var nodx=((node.getElementsByTagName("nodx"))[0].childNodes[0].nodeValue)*1;
					var nody=((node.getElementsByTagName("nody"))[0].childNodes[0].nodeValue)*1;
					roadinfo.push(nodx);                                                       //x坐标
					roadinfo.push(nody);                                                       //y坐标
				}//for j
		
			roadinfo_list.push(roadinfo);//push(1)表示路况信息，用来表示线的颜色        
			//roadinfo_list.push(otherroadinfo);
			}//for 
			roadinfo_data=roadinfo_list;
			addRoadInfo();//显示路径信息
		}
	
	var request_rs_span = function(url) {
			url = url?url:"../../../HZ/netQRY_STA.php";
			var bounds = mapobj.getBounds();
			var botlat=bounds.southwest.lat;
			var rlng=bounds.northeast.lng;
			var uplat=bounds.northeast.lat;
			var llng=bounds.southwest.lng;
			//var url="netQRY_STA.php";
			$.get(url,{botlat:botlat,rlng:rlng,uplat:uplat,llng:llng},drawroadinfo_via_rnxml);
		}
	
	var request_rs_id = function(rids,url) {
		
			//var url = "netQRY_rnet.php"
			//var req_arges
			$.get(url,{roadids:rids},drawroadinfo_via_rnxml)
		}
	//不重新请求数据绘制	
	this.request_span = function(url) {
			request_rs_span(url);
			if (map_move_redraw_listener) remove_rsinfo();
			map_move_redraw_listener =  AMap.event.addListener(mapobj,"moveend",function(e) {
																addRoadInfo();
																}
															);
			}
	//重新请求数据绘制
	this.add_tfinfo_fun = function() {
		request_rs_span();
		tfinfo_redraw_listener = AMap.event.addListener(mapobj,"moveend",function(e) {
																request_rs_span();
																}
															);
		}
	
	this.remove_tfinfo_fun = function() {
			deleteRoadInfo();
			AMap.event.removeListener(tfinfo_redraw_listener);
		}
	
	this.remove_rsinfo= function() {
			deleteRoadInfo();
			AMap.event.removeListener(map_move_redraw_listener);
		}
	
	this.request_rid = function(rids,url) {
			//var url = "netQRY_rnet.php"
			//var req_arges
			request_rs_id(rids,url);
			if (map_move_redraw_listener) this.remove_rsinfo();
			map_move_redraw_listener =  AMap.event.addListener(mapobj,"moveend",function(e) {
																addRoadInfo();
																}
															);
		}
		
	
	}
	
/*window.onload  = function() {
	//alert ("asdf");
	var map = new Map(container,1);
	map.request_span("netQRY_STA.php");
	}*/
	
function initMap(map_container) {
	var map = new AMap.Map(map_container,{   
    center:new AMap.LngLat(120.150023,30.270743), //地图中心点   
    level:15,  //地图显示的比例尺级别	
    });
     
	map.plugin(["AMap.ToolBar"],function(){     
        toolBar = new AMap.ToolBar();
        map.addControl(toolBar);    
    }); 
	return map
	}

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

function roadline_tra(roadinfo_path,l) {
	var tra_dir;
	for (var i = 0;i < roadinfo_path.length;i++) {
		
		var sn = roadinfo_path[i];
		if(i != roadinfo_path.length-1) {
			var en = roadinfo_path[i+1];
			tra_dir= getnode_dir(sn.lng,sn.lat,en.lng,en.lat)-Math.PI/2;
			}
		//alert(tra_dir);	
		var sx_offset = Math.cos(tra_dir)*l;
		var sy_offset = Math.sin(tra_dir)*l;
		sn = new AMap.LngLat(sn.lng+sx_offset,sn.lat+sy_offset);
		roadinfo_path[i] = sn;
		
		}
	return roadinfo_path;
	}

function getnode_dir(nod1_x,nod1_y,nod2_x,nod2_y) {
	var tra_dir = Math.acos((nod2_x-nod1_x)/Math.sqrt(Math.pow(nod2_y-nod1_y,2)+Math.pow(nod2_x-nod1_x,2)));
	if((nod2_y-nod1_y) < 0)
		tra_dir=0-tra_dir;
	return tra_dir;
	}


//test data
function generate_roadids(rnum) {
	if (rnum==null)rnum = 30
	var data = new Array();
	var rcnt  = parseInt(rnum+Math.random()*50)
	var step = 400/rcnt;
	var ridg = 0;
	
	for (var i = 1;i<rcnt+1;i++) {
		var temrid = parseInt(ridg+Math.random()*(step+1))
		ridg+=step;
		//alert(temrid)
		data.push(temrid);
		}
	return data;
	}

function conRoad_req(zone_id,year,month,day,map_obj) {
		url = '../../../HZ/php/cr_query.php';
		req_data = {year:year,month:month,day:day,id:zone_id,timetype:'day'};
		$.get(url,req_data,function(ret_data) {
			
			var data_array = Array();
			for (var i = 0;i<ret_data.length;i++) {
				var road_id = ret_data[i];
				data_array.push(road_id);
				}
			map_obj.request_rid(data_array,"../../../HZ/netQRY_rnet.php");
			}
		);
	}