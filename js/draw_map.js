// JavaScript Document
function drawGuide1()    //诱导屏  环城西路
	{
        document.getElementById("guidename").innerHTML="环城西路";
        cxt.clearRect(0,0,500,500);  //清除画布
		
		
		road_color(6);//竖
		cxt.beginPath();
		cxt.fillRect(65,38,10,65);
		cxt.beginPath();
		
		road_color(4);
		cxt.beginPath();//横的
		cxt.fillRect(80,124,150,10);			
		cxt.beginPath();
			
		road_color(4);
		cxt.beginPath();//横的
		cxt.fillRect(70,70,150,10);			
		cxt.beginPath();
		
		road_color(6);//竖
		cxt.beginPath();
		cxt.fillRect(130,38,10,102);
		cxt.beginPath();
		
		road_color(6);//竖
		cxt.beginPath();
		cxt.fillRect(190,38,10,42);
		cxt.beginPath();
		
		cxt.beginPath();	//三角
	    cxt.moveTo(60,38);
	    cxt.lineTo(80,38);
	    cxt.lineTo(70,28);
	    cxt.closePath();
	     cxt.fill();
	
	
		cxt.beginPath();	//三角
	    cxt.moveTo(125,38);
	    cxt.lineTo(145,38);
	    cxt.lineTo(135,28);
	    cxt.closePath();
	     cxt.fill();
		 
		 cxt.beginPath();	//三角
	    cxt.moveTo(185,38);
	    cxt.lineTo(205,38);
	    cxt.lineTo(195,28);
	    cxt.closePath();
	     cxt.fill();
		 
		  cxt.beginPath();	//箭头向上三角
	      cxt.moveTo(185,38);
	      cxt.lineTo(205,38);
	      cxt.lineTo(195,28);
	      cxt.closePath();
	      cxt.fill();
		  
		  cxt.beginPath();	//箭头向右三角
	      cxt.moveTo(220,65);
	      cxt.lineTo(220,85);
	      cxt.lineTo(235,75);
	      cxt.closePath();
	      cxt.fill();
		  
		    cxt.beginPath();	//箭头向上白色三角
			cxt.fillStyle ="#fff"
	      cxt.moveTo(130,148);
	      cxt.lineTo(140,148);
	      cxt.lineTo(135,140);
	      cxt.closePath();
	      cxt.fill();
		  
		
		 
	  cxt.beginPath();//弧线
        var t = 99;
		var oB = (120)*Math.PI/180;
		var oR = (-45+t)*3.6*Math.PI/180;
			var x = 100;
			var y =105;
			var r = 30;
			cxt.strokeStyle = 'red';
			cxt.lineWidth = '10';
			cxt.beginPath();
			cxt.arc(x,y,r,oB,oR,false);
			cxt.stroke();

		 
		 
		
		
	cxt.beginPath();//右上角
	cxt.fillStyle ="#fff"
	cxt.moveTo(285,10);
	cxt.lineTo(275,20);	
	cxt.lineTo(285,16);			
	cxt.lineTo(295,20);	
	cxt.fillText("东",260,20);
	cxt.closePath();
	cxt.fill();
	
	
	cxt.beginPath();	// 向右小箭头
	      cxt.moveTo(160,85);
	      cxt.lineTo(160,89);
	      cxt.lineTo(170,85);
	      cxt.closePath();
	cxt.fillRect(145,85,15,2);
	cxt.closePath();
	cxt.fill();	
		
	cxt.beginPath();	// 向左小箭头
	      cxt.moveTo(95,85);
	      cxt.lineTo(95,89);
	      cxt.lineTo(80,85);
	      cxt.closePath();
	cxt.fillRect(93,85,15,2);
	cxt.closePath();
	cxt.fill();		
	
	cxt.beginPath();	// 向左小箭头
	      cxt.moveTo(95,140);
	      cxt.lineTo(95,145);
	      cxt.lineTo(80,140);
	      cxt.closePath();
	cxt.fillRect(93,140,15,2);
	cxt.closePath();
	cxt.fill();		
		
		
	
		
    cxt.font = "5pt '微软雅黑'";
	cxt.fillStyle ="white";

	cxt.fillText("环城西路",120,22);
	cxt.fillText("保俶路",90,65);
	cxt.fillText("杭大路",90,115);
	
	cxt.fillText("天",40,53); 
	cxt.fillText("目",40,68);
	cxt.fillText("山",40,83);
	cxt.fillText("路",40,98);
	
	cxt.fillText("西",238,62); 
	cxt.fillText("湖",238,77);
	
	cxt.fillText("省",170,35); 
	cxt.fillText("府",170,50);
	cxt.fillText("路",170,65);
	
    //右上角标识
	cxt.strokeStyle="white"; 
	cxt.fillStyle="white"; 
	cxt.roundRect(250, 0, 50, 28, 5, true); 
	
	cxt.beginPath();
	cxt.fillRect(250, 0, 50, 10);
	cxt.beginPath();	
	
	cxt.beginPath();
	cxt.fillStyle ="#0033FF";
	cxt.moveTo(285,10);
	cxt.lineTo(275,20);	
	cxt.lineTo(285,16);			
	cxt.lineTo(295,20);	
	cxt.fillText("南",260,20);
	cxt.closePath();
	cxt.fill();
	

	
	
	
	};
function drawGuide2() //庆春路
{
	document.getElementById("guidename").innerHTML="庆春路";
        cxt.clearRect(0,0,500,500);  //清除画布
	
	
	
		road_color(4);
		cxt.beginPath();//横的 省府路
		cxt.fillRect(68,120,130,10);			
		cxt.beginPath();
		
		road_color(4);
		cxt.beginPath();//横的 凤起路
		cxt.fillRect(60,85,140,10);			
		cxt.beginPath();
		
		road_color(4);
		cxt.beginPath();//横的 北山
		cxt.fillRect(60,50,150,10);			
		cxt.beginPath();
		
		road_color(6);//竖 环山西路
		cxt.beginPath();
		cxt.fillRect(50,35,10,70);
		cxt.beginPath();
		
		road_color(6);//竖 
		cxt.beginPath();
		cxt.fillRect(190,60,10,80);
		cxt.beginPath();
	
	
	
	 cxt.beginPath();	//箭头向上三角
	      cxt.moveTo(45,38);
	      cxt.lineTo(65,38);
	      cxt.lineTo(55,28);
	      cxt.closePath();
	      cxt.fill();
		  
		  cxt.beginPath();	//箭头向右三角
	      cxt.moveTo(210,45);
	      cxt.lineTo(210,65);
	      cxt.lineTo(225,55);
	      cxt.closePath();
	      cxt.fill();
		  
		  cxt.font = "5pt '微软雅黑'";
	      cxt.fillStyle ="white";
		  cxt.fillText("庆春路",40,22);
		  cxt.fillText("西 湖",170,30);
		  cxt.fillText("北 山 路",100,75);
		  cxt.fillText("凤 起 路",100,110);
		  cxt.fillText("省 府 路",100,145);
		  
		  cxt.fillText("环",30,53); 
	      cxt.fillText("城",30,68);
	      cxt.fillText("西",30,83);
	      cxt.fillText("路",30,98);
	    	
		  cxt.fillText("灵",240,53); 
	      cxt.fillText("隐",240,68);
	      cxt.fillText("寺",240,83);
	     
		    
		   cxt.beginPath();	//箭头向上白色三角
			cxt.fillStyle ="#fff"
	      cxt.moveTo(190,148);
	      cxt.lineTo(200,148);
	      cxt.lineTo(195,140);
	      cxt.closePath();
	      cxt.fill();
		  
		  
		  	cxt.beginPath();	// 凤起路向左小箭头
	      cxt.moveTo(115,80);
	      cxt.lineTo(115,84);
	      cxt.lineTo(100,80);
	      cxt.closePath();
	     cxt.fillRect(115,80,15,2);
	     cxt.closePath();
        	cxt.fill();		
			
		   cxt.beginPath();	// 省府路向左小箭头
	      cxt.moveTo(115,115);
	      cxt.lineTo(115,119);
	      cxt.lineTo(100,115);
	      cxt.closePath();
	     cxt.fillRect(115,115,15,2);
	     cxt.closePath();
        	cxt.fill();	
			
			  cxt.beginPath();	// 北山路向左小箭头
	      cxt.moveTo(115,45);
	      cxt.lineTo(115,50);
	      cxt.lineTo(100,45);
	      cxt.closePath();
	     cxt.fillRect(115,45,15,2);
	     cxt.closePath();
        	cxt.fill();		
		
	
	
	cxt.beginPath();
	cxt.fillStyle ="#0033FF";
	cxt.moveTo(285,10);
	cxt.lineTo(275,20);	
	cxt.lineTo(285,16);			
	cxt.lineTo(295,20);	
	cxt.fillText("南",260,20);
	cxt.closePath();
	cxt.fill();
	
		  cxt.beginPath();//弧线
        var t = 99;
		var oB = (120)*Math.PI/180;
		var oR = (-45+t)*3.6*Math.PI/180;
			var x = 85;
			var y =100;
			var r = 30;
			cxt.strokeStyle = 'red';
			cxt.lineWidth = '10';
			cxt.beginPath();
			cxt.arc(x,y,r,oB,oR,false);
			cxt.stroke();
	
}