function FloatToTime(f_val) {
	if (f_val>24)return;
	var t_val = "00:00";
	var h = parseInt(f_val)>=10?String(parseInt(f_val)):('0'+String(parseInt(f_val)))
	var m = parseInt((f_val-parseInt(f_val))*60)
	m=m>=10?String(m):("0"+String(m))
	t_val=h+":"+m
	return t_val;
	}
	
function SpanTimeToFloat(from_time,to_time) {
	var f = TimeToFloat(from_time);
	var t = TimeToFloat(to_time);
	if (t>f) return (f+t)/2;
	else return f;
	}
	
function TimeToFloat(time_str) {
	var t_array = time_str.split(" ");
	return HMSToFloat(t_array[1]);
	}

function HMSToFloat(hms_str) {
	var hms_arr = hms_str.split(':');
	var h = hms_arr[0];
	var m = hms_arr[1];
	h = parseFloat(h);
	m = parseFloat(m);
	return h+m/60;
	}

function DayToInt(time_str) {
	var ymd = time_str.split('-');
	var d = parseInt(ymd[2]);
	return d;
	}

function MonthToInt(time_str) {
	var ymd = time_str.split('-');
	var m = parseInt(ymd[1]);
	return m;
	}
	
function GetHourInfo(time_str) {
		var dt = time_str.split(' ');
		var hms= dt[1].split(':');
		var h = parseInt(hms[0]);
		return h;
	}

function GetDayInfo(time_str) {
		var dt = time_str.split(' ');
		var ymd= dt[0].split('-');
		var d = parseInt(ymd[2]);
		return d; 
	}

function GetMonthInfo(time_str) {
		var dt = time_str.split(' ');
		var ymd= dt[0].split('-');
		var m = parseInt(ymd[1]);
		return m;
	
	}

function Itervator(data) {
		this.i  = 0;
		this.data = data;
		this.length = this.data.length;
		this.current=data[this.i];
		this.next = function() {
			if (this.i>=this.length) 
				return false;
			else
				this.current = this.data[++this.i];
			}
			
		this.cur = function() {
			if (this.i>=this.length)
				return false;
			else
				return this.current;
			}
		
		this.popdata = function() {
				var rdata = this.cur();
				this.next();
				return rdata;
			}
		
		
	}


function init_date(date_selc) {
		date = $("#"+date_selc).val()
			//alert(date);
			if (date==''){
				nowdate = new Date()
				year = nowdate.getFullYear()
				month = nowdate.getMonth()+1
				day = nowdate.getDate()
				}
			else {
				date = date.split('-')
				year = parseInt(date[0])
				month = parseInt(date[1])
				day = parseInt(date[2])
				}
			return {year:year,month:month,day:day};
	}