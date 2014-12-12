<?php
include("../conn.php");
include("req.php");
include("util.php");
include("testvar.php");

//测试数据
$year = 2013;
$month = 12;
$day = 1;
$dbname = "t_cs_rs";
$timetype = 'day';



$ymdhis = explode(' ',date('Y-m-d H:i:s',time()));
$ymd = explode('-',$ymdhis[0]);
$his = explode(':',$ymdhis[1]); 


$year = $ymd[0];
if ($istest)
	$year = $ymd[0]-1; 
	
$month = $ymd[1]; 
$day = $ymd[2];

$hour = $his[0];
$minu = $his[1];
$sec = $his[2];
 
if($timetype=='day') {
	/*$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
	$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));*/
	
	
	$date_from = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day-1,$year));
	$date_to = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));
	
	}

if($timetype=='month') {
	/*$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
	$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));*/
	
	$date_from = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month-1,$day,$year));
	$date_to = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));
	
	}
	
if($timetype=='year') {
	/*$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
	$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));*/
	
	$date_from = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year-1));
	$date_to = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));
	
	}
if ($dbname == "t_tf_rs")
	$value_str = "SUM(VALUE)";
	else
	$value_str = "AVG(VALUE)";
	
$sql = "select NAME,$value_str VALUE from $dbname,t_road_sec where $dbname.road_sec_id=t_road_sec.id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by NAME order by value desc";

echo $sql;
global $dbconn;
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);
$rs = array();
$rs_num = 0;

while(($row = oci_fetch_array($r,OCI_BOTH))&&$rs_num++<$ranknum) {
	array_push($rs,array(icon_to_utf8($row['NAME']),$row['VALUE']));
	}
	
echo json_encode($rs);

?>