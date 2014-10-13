function FloatToTime(f_val) {
	if (f_val>24)return;
	var t_val = "00:00";
	var h = parseInt(f_val)>=10?String(parseInt(f_val)):('0'+String(parseInt(f_val)))
	var m = parseInt((f_val-parseInt(f_val))*60)
	m=m>=10?String(m):("0"+String(m))
	t_val=h+":"+m
	return t_val;
	}