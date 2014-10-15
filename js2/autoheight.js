function autoHeight(){	
	if (window.innerHeight){//FF
		nowHeight = window.innerHeight;
	}else{
		nowHeight = document.documentElement.clientHeight;
	}
		var jianHeight = 60;
	if(nowHeight > jianHeight){
		document.getElementById('sideMenu').style.height = nowHeight - 102 + 'px';
	}else{
		document.getElementById('sideMenu').style.height = jianHeight + 'px';
	}
		document.getElementById('sideMenu').style.width = innerWidth - 417 + 'px';
	}
    autoHeight();