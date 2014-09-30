// JavaScript Document
function drawGuide1()    //诱导屏  保俶北-天目山南口（面北）
	{
        document.getElementById("guidename").innerHTML="保俶北-天目山南口（面北）";
        cxt.clearRect(0,0,500,500);  //清除画布
		
		road_color(4);
		cxt.beginPath();
		cxt.fillRect(70,28,150,10);			
		cxt.beginPath();	
	
		//市府大道东7
		road_color(7);
		cxt.beginPath();
		cxt.fillRect(40,28,20,10);			
		cxt.beginPath();
		
		road_color(7);
		cxt.beginPath();
		cxt.fillRect(40,100,20,10);			
		cxt.beginPath();
	
		//市府大道西3
		road_color(3);
		cxt.beginPath();
		cxt.fillRect(220,28,30,10);
		cxt.beginPath();
		
		road_color(3);
		cxt.beginPath();
		cxt.fillRect(220,100,30,10);
		cxt.beginPath();
	
			
		//岙里缪诱导 10号
		road_color(2);
		cxt.beginPath();			
		cxt.fillRect(70,100,150,10);	
		cxt.beginPath();
	
		//白云山中路2  爆出路
		road_color(6);
		cxt.beginPath();
		cxt.fillRect(220,28,10,72);
		cxt.beginPath();
	
		//白云山中路北1
		road_color(1);
		cxt.beginPath();
		cxt.fillRect(220,105,10,18);
		cxt.beginPath();
	
		//白云山中路南4
		road_color(4);
		cxt.beginPath();
		cxt.fillRect(220,15,10,23);
		cxt.beginPath();
		
		//东环大道8
		road_color(3);
		cxt.beginPath();
		cxt.fillRect(60,28,10,72);
		cxt.beginPath();
	
		//东环大道南6
		road_color(6);
		cxt.beginPath();
		cxt.fillRect(60,15,10,23);
		cxt.beginPath();
	
		//东环大道北9
		road_color(9);
		cxt.beginPath();
		cxt.fillRect(60,100,10,18);
		cxt.beginPath();
		
    cxt.font = "5pt '微软雅黑'";
	cxt.fillStyle ="white";

	cxt.fillText("体育场路",125,52);
	cxt.fillText("天目山路",125,125);
	
	cxt.fillText("环",40,53); 
	cxt.fillText("城",40,68);
	cxt.fillText("西",40,83);
	cxt.fillText("路",40,98);
	
	cxt.fillText("保",238,62); 
	cxt.fillText("俶",238,77);
	cxt.fillText("路",238,92);
	
	
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
	

	//当前位置标识
	cxt.beginPath();
	cxt.fillStyle ="white";
	cxt.moveTo(225,130);
	cxt.lineTo(215,140);		
	cxt.lineTo(235,140);		
	cxt.closePath();
	cxt.fill();
	
	

   //行驶方向标识
	cxt.beginPath();	//市府大道  体育场路
	cxt.moveTo(120,24);
	cxt.lineTo(130,24);
	cxt.lineTo(130,17);
	cxt.fillRect(130,22,30,2);
	cxt.closePath();
	cxt.fill();
	
	
	cxt.beginPath();	//岙里缪	 天目山
	cxt.moveTo(120,96);
	cxt.lineTo(130,96);
	cxt.lineTo(130,89);
	cxt.fillRect(130,94,30,2);
	cxt.closePath();
	cxt.fill();	

	cxt.beginPath();		//白云山中路
	cxt.moveTo(232,53);
	cxt.lineTo(232,60);
	cxt.lineTo(239,60);
	cxt.fillRect(232,58,2,25);
	cxt.closePath();
	cxt.fill();	
	
	cxt.beginPath();	//东环大道
	cxt.moveTo(58,83);
	cxt.lineTo(58,76);
	cxt.lineTo(51,76);
	cxt.fillRect(56,53,2,25);
	cxt.closePath();
	cxt.fill(); 		
	};