// JavaScript Document
	
$(function(){
	
	/*rating*/						   
		$(".rate li").hover(function(){
				$(".select").removeClass("select");

				$(this).prevAll().andSelf().addClass("hover");
				},
							function(){
				$(this).prevAll().andSelf().removeClass("hover");
				});
		
		$(".rate li").click(function(){
				$(this).prevAll().andSelf().addClass("select");
				})
	
	/*number*/
	var num = 0;
	$("li.absolute").each(function(){
			num++;
			var src = "url(images/Absolut_00"+num+".png) center center no-repeat";
			$(this).css({"background":src});		   
	});
});


						
$(function(){
			  var scrolling=false;
			  $("scroll").onselectstart=function(e){return false}
			  function $(o){return document.getElementById(o)}

   			  //鼠标移入显示滚动条
			  $("scroll").onmouseover=function show(){
						//计算滚动条相对高度
						var height = $("scroLeft").scrollHeight/$("scroll").scrollHeight;
					   $("scroLine").style.height=220+"px";
					   
					   $("scroLine").style.opacity=1;//设置可见
			  }
			  //鼠标移出隐藏滚动条
			  $("scroll").onmouseout=function hide(){
					   
					   $("scroLine").style.opacity=0.3;//设置隐藏
			  }
			  	  
			  
			  //鼠标拖动 
			  $("scroLine").onmousedown=function scroMove(){
				   scrolling=true;
				   document.onmousemove=function(e){
					   if(scrolling){
					       scroNow(e)
					   }
					   else{
						   return false;
						   }
					   }
			       document.onmouseup=function(e){
					   document.onmousemove=null;
					   scrolling=false
					   }
					  return false;   //非常重要！防止鼠标粘连，特别是火狐下
				  }

			   
			   
					   
			   //鼠标点击 
			  function scroNow(event){
					   var event=event?event:(window.event?window.event:null);
					   var Y=event.clientY-$("scroll").getBoundingClientRect().top-$("scroLine").clientHeight/2;
					   var H=$("scroll").clientHeight-$("scroLine").clientHeight;
					   var SH=Y/H*($("scroLeft").scrollHeight-$("scroLeft").clientHeight);
				  
					   if (Y<0)Y=0;
					   if (Y>H)Y=H;
					   $("scroLine").style.top=Y+"px";
					   $("scroLeft").scrollTop=SH;
			  }
			  $("scroRight").onclick= scroNow;
			  //鼠标滚轮    
			  $("scroll").onmousewheel=function scrollWheel(){
				  var div = document.getElementById("traf_ctb"); 
						var x=event.clientX;  
                        var y=event.clientY;  
                        var divx1 = div.offsetLeft;  
                        var divy1 = div.offsetTop;  
                        var divx2 = div.offsetLeft + div.offsetWidth;  
                        var divy2 = div.offsetTop + div.offsetHeight;
                        if( x < divx1 || x > divx2 || y < divy1 || y > divy2){ 
						   var Y=$("scroLeft").scrollTop;
						   var H=$("scroLeft").scrollHeight-$("scroLeft").clientHeight;
						   if (event.wheelDelta >=10)
						   {Y=Y-70}
						   else
						   {Y=Y+70}
						   if(Y<0)Y=0;if(Y>H)Y=H;
						   $("scroLeft").scrollTop=Y;
						   var SH=Y/H*$("scroll").clientHeight-$("scroLine").clientHeight;
						   if(SH<0)SH=0;
						   $("scroLine").style.top=SH+"px";
						}
					   
			  }

});

