// JavaScript Document

var cxPRO;	
var ymax; 
var interval;		
var lineName;
function set_rcon(){
	cxPRO='rcon_QRY';
	ymax=10;
	interval=1;
	};
function set_acon(){
	cxPRO='acon_QRY';
	ymax=10;
	interval=1;
	};

function set_rvol(){
	cxPRO='rvol_QRY';
	ymax=300;
	interval=20;
	};
function set_avol(){
	cxPRO='avol_QRY';
	ymax=300;
	interval=20;
	};
	
function set_rspe(){
	cxPRO='rspe_QRY';
	ymax=150;
	interval=10;
	};
function set_aspe(){
	cxPRO='aspe_QRY';
	ymax=150;
	interval=10;
	};
function set_rsta(){
	cxPRO='rsta_QRY';
	};
function set_asta(){
	cxPRO='asta_QRY';
	};
	
/////比较分析///	
function set_rcTime(){

	cxPRO='rcTime_QRY';
	ymax=300;
	interval=20;
	};
function set_acTime(){
	cxPRO='acTime_QRY';
	ymax=300;
	interval=20;
	};
	
function set_rcSpace(){
	cxPRO='rcSpace_QRY';
	ymax=300;
	interval=20;
	};
function set_acSpace(){
	cxPRO='acSpace_QRY';
	ymax=300;
	interval=20;
	};


$(document).ready(function () {
	       $('#QUERY').click(function () {
			  if (cxPRO=='rcon_QRY'||cxPRO=='rvol_QRY'||cxPRO=='rspe_QRY'||cxPRO=='rsta_QRY')
			      {
					   var obj = document.getElementById("roadSel");
			           var road_name = obj.options[obj.selectedIndex].text;  //获取路段名
					   lineName=road_name;
					   if(lineName=="选择路段"){alert("请选择路段！");return;}
				  }
			 else if(cxPRO=='acon_QRY'||cxPRO=='avol_QRY'||cxPRO=='aspe_QRY'||cxPRO=='asta_QRY')
				   {
					   var obj = document.getElementById("areaSel");
			           var area_name = obj.options[obj.selectedIndex].text;  //获取区域名
					   lineName=area_name;
					   if(lineName=="选择区域"){alert("请选择区域！");return;}
				   }
              inforQRY(lineName,cxPRO,ymax,interval);
			  
            });
	});			

	//查询数据		
function inforQRY(lineName,cxPRO,ymax,interval) {                  
			$.ajax({
			type:"POST",
			url:"chartQRY.php",
			data: {cxid:cxPRO,road_id:$("#roadSel").val(),area_id:$("#areaSel").val(), staTime:$("#staTime").val(),endTime:$("#endTime").val()},
			dataType:'json',
            success:function(data){ 
			    var jsonarray =data;
				  if(jsonarray.length==0){(alert('没有查询到数据')); return;};  //判断是否有数据
				  
		          if (cxPRO=='asta_QRY'||cxPRO=='rsta_QRY'){
						  var dataN = [];
						  for(var i =0;i<jsonarray.length;i++){
								var jsonobj = jsonarray[i];
								if(jsonobj[0]==1){jsonobj[0]="通畅";};
								if(jsonobj[0]==2){jsonobj[0]="一般";};
								if(jsonobj[0]==3){jsonobj[0]="拥堵";};
								dataN.push([jsonobj[0], jsonobj[1]]);
							}
					  pieChart(dataN,lineName);
					  }
					  else{
						  var dataN = [];
						  for(var i =0;i<jsonarray.length;i++){
								var jsonobj = jsonarray[i];
								jsonobj[0]=Date.parse(jsonobj[0]);
								 var d = new Date();
								 d.setTime(jsonobj[0]);
								 jsonobj[0]=d;
								 dataN.push([d, jsonobj[1]]);
							}
					  updateJqchart(dataN,lineName,ymax,interval); 
					  }
				   }, 
			error:function(){}
});
};
var background = {
                type: 'linearGradient',
                x0: 0,
                y0: 0,
                x1: 0,
                y1: 1,
                colorStops: [{ offset: 0, color: '#d2e6c9' },
                            { offset: 1, color: 'white' }]
            };
			
function updateJqchart(data,lineName,ymax,interval){
	    $('#jqChart').jqChart({
		legend: { location: 'top' },
		border: { strokeStyle: '#6ba851' },
		background: background,
		tooltips: { type: 'shared' },
		crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
		animation: { duration: 1 },//动画效果
		axes: [
			{
				location: 'left',//y轴位置，取值：left,right
				minimum:0,//y轴刻度最小值
				maximum: ymax,//y轴刻度最大值
				interval: interval,//刻度间距
			},
			{
			    type: 'dateTime',
                location: 'bottom',
                zoomEnabled: true,
			}
		],
		series: [
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:lineName,//标题
				data: data,//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			
			}
		]
	});			
	
	};
	
function pieChart(data,lineName) {
               $('#jqChart').jqChart({
               legend: { location: 'top' },
                border: { strokeStyle: '#6ba851' },
                background: background,
                animation: { duration: 1 },
                shadows: {
                   enabled: true
                },
                series: [
                    {
                        type: 'pie',
                      // fillStyles: ['#00FF66', '#FFFF00', '#FF0000', '#056492', '#BFBFBF', '#1A3B69', '#FFE382'],
                        labels: {
                            stringFormat: '%.1f%%',
                            valueType: 'percentage',
                            font: '15px sans-serif',
                            fillStyle: 'white'
                        },
                        explodedRadius: 10,
                        explodedSlices: [5],
                        data: data
                    }
                ]
            });

            $('#jqChart').bind('tooltipFormat', function (e, data) {
                var percentage = data.series.getPercentage(data.value);
                percentage = data.chart.stringFormat(percentage, '%.2f%%');

                return '<b>' + data.dataItem[0] + '</b><br />' +
                       data.value + ' (' + percentage + ')';
            });
        };   
	
///////////////////////////////////////////////////路段区域时间比较////////////////////////////////////////////////////////////

$(document).ready(function () {
	   $('#QUERY_Time_Compare').click(function () {
			  
		 if(cxPRO=='rcTime_QRY'){
			 if($("#roadSel").val()==""){
				 alert("请选择路段！");
				 return;
				
				 }
			  }
			 
			
	   else  if(cxPRO=='acTime_QRY'){
			 if($("#areaSel").val()==""){
				 alert("请选择区域！")
				 }
			    }
	
			 
			  
			  inforQRY_Compare(cxPRO,ymax,interval);
	   });
	});	
function inforQRY_Compare(cxPRO,ymax,interval) {                  
			$.ajax({
			type:"POST",
			url:"chartQRY.php",
			data: {cxid:cxPRO,road_id:$("#roadSel").val(),area_id:$("#areaSel").val(), staTime:$("#staTime").val(),endTime:$("#endTime").val()},
			dataType:'json',
            success:function(data){ 
			 var data1 = []; 
			 var data2 = [];
    		 var jsonarray =data;	
			 if(jsonarray.length==0){(alert('没有查询到数据')); return;};  //判断是否有数
			 for(var i =0;i<jsonarray.length;i++){
				 if(i<jsonarray.length/2)
				 data1.push(jsonarray[i]);
				 if(i>=jsonarray.length/2)
				 data2.push(jsonarray[i]);
			 }
               
				    lineName1=$("#staTime").val();
					lineName2=$("#endTime").val();

				    updateJqchart_com(data1,data2,lineName1,lineName2,ymax,interval);
		          
				   }, 
			error:function(){}
});
};
function updateJqchart_com(data1,data2,lineName1,lineName2,ymaxi,interval){
	    $('#jqChart').jqChart({
		legend: { location: 'top' },
		border: { strokeStyle: '#6ba851' },//边线颜色
		background: background,
		tooltips: { type: 'shared' },
		crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
		animation: { duration: 1 },//动画效果
		axes: [
			{
				location: 'left',//y轴位置，取值：left,right
				minimum:0,//y轴刻度最小值
				maximum: ymaxi,//y轴刻度最大值
				interval: interval,//刻度间距
			},
			{
			    type: 'category',
                location: 'bottom',
               
			}
		],
		series: [
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:lineName1,//标题
				data: data1,//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			
			},
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:lineName2,//标题
				data: data2,//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			
			}
		]
	});			
	
	};


////////////////////////////////////////////路段区域空间比较////////////////////////////////////////////////////////////////

$(document).ready(function () {
	   $('#QUERY_Space_Compare').click(function () {
		
 
					
			  inforQRY_Compare_Space(cxPRO,ymax,interval);
	   });
	});	

function inforQRY_Compare_Space(cxPRO,ymax,interval) {  
	        var roadid1;
			var roadid2;
			var areaid1;
			var areaid2;    			
			if(cxPRO=='rcSpace_QRY'){
				roadid1=$("#roadSel1").val();
				roadid2=$("#roadSel2").val(); 
				var obj = document.getElementById("roadSel1");
				lineName1 = obj.options[obj.selectedIndex].text; 
				if(lineName1=="选择路段1"){alert("请输入路段1"); return;}
				var obj = document.getElementById("roadSel2");
				lineName2 = obj.options[obj.selectedIndex].text;
				if(lineName2=="选择路段2"){alert("请输入路段2"); return;}
			}//获取路段名
			
		    if(cxPRO=='acSpace_QRY'){
				areaid1=$("#areaSel1").val();areaid2=$("#areaSel2").val();
				var obj = document.getElementById("areaSel1");
				lineName1 = obj.options[obj.selectedIndex].text; 
				if(lineName1=="选择区域1"){alert("请输入区域1"); return;}
				var obj = document.getElementById("areaSel2");
				lineName2 = obj.options[obj.selectedIndex].text; 
				if(lineName2=="选择区域2"){alert("请输入区域2"); return;}
			}
			       
			$.ajax({
			type:"POST",
			url:"chartQRY.php",
			data: {cxid:cxPRO,road_id1:roadid1,road_id2:roadid2,area_id1:areaid1,area_id2:areaid2, Time:$("#Time").val()},
			dataType:'json',
            success:function(data){
			 var data1 = []; 
			 var data2 = [];
    		 var jsonarray =data;	
			 if(jsonarray.length==0){(alert('没有查询到数据')); return;};  //判断是否有数
			 for(var i =0;i<jsonarray.length;i++){
				 if(i<jsonarray.length/2)
				 data1.push(jsonarray[i]);
				 if(i>=jsonarray.length/2)
				 data2.push(jsonarray[i]);
			 }
 				    updateJqchart_com(data1,data2,lineName1,lineName2,ymax,interval);
		          
				   }, 
			error:function(){}
});
};






	function info_compare(text,t1,t2) {
       	$('#jqChart').jqChart({
		title: { text:text },
		border: { strokeStyle: '#6ba851' },//边线颜色
		background: background,
		animation: { duration: 1 },//动画效果
		tooltips: { type: 'shared' },
		 crosshairs: {
                    enabled: true,
                    hLine: false,
                    vLine: { strokeStyle: '#cc0a0c' }
                },
		axes: [
			{
				location: 'left',//y轴位置，取值：left,right
				minimum: 1000,//y轴刻度最小值
				maximum: 10000,//y轴刻度最大值
				interval: 1000//刻度间距
			},
			{
			    type: 'category',
                location: 'bottom',
                zoomEnabled: true,
			}
		],
		series: [
			//数据1开始
			{
				type: 'line',//图表类型，取值：column 柱形图，line 线形图
				title:t1,//标题
				data: [['1日',1223],['2日',1223],['3日',2223],['4日',4223],['5日',1333],['6日',7123],['7日',4623],['8日',2123],['9日',723],['10日',1113],['11日',2223],['12日',2313],['13日',6123],['14日',6623],['15日',5423],['16日',6423],['17日',4423],['18日',723],['19日',6623],['20日',1623],['21日',2923],['22日',3823],['23日',1723],['24日',4223],['25日',5423],['26日',6423],['27日',5223],['28日',2223],['29日',4923],['30日',4123],['31日',6723]],//数据内容，格式[[x轴标题,数值1],[x轴标题,数值2],......]
			},
			//数据1结束
		//数据2
			{
				type: 'line',
				title:t2,
				data: [['1日',7653],['2日',1923],['3日',3323],['4日',2223],['5日',4633],['6日',5723],['7日',2623],['8日',7123],['9日',1723],['10日',6113],['11日',4223],['12日',3313],['13日',5123],['14日',3623],['15日',2423],['16日',4423],['17日',1423],['18日',2923],['19日',5623],['20日',4623],['21日',3123],['22日',1823],['23日',1723],['24日',2223],['25日',2423],['26日',2423],['27日',1223],['28日',1223],['29日',1923],['30日',2123],['31日',2723]],
			},
			//数据2结束
		
		]
	});
}; 


