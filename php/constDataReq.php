<?php
header("content-type:application/json; charset=utf-8");
include('../conn.php');
include('req.php');
/*$areaid = 0;
$month = 11;
$day = 2;
$year = 2013;*/
$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));


if($din == "tf")
	$ctype = 'sum(value)';
else 
	$ctype = 'avg(value)';

if ($qrytype == 'zone')	
	$sql = "select trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30) CTIME,".$ctype." VAL from $dbname,t_road_sec where $dbname.road_sec_id = t_road_sec.id and area_id=$id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30) order by trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30)";

if ($qrytype == 'road')	
	$sql = "select trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30) CTIME,".$ctype." VAL from $dbname where $dbname.road_sec_id = ".$id." and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30) order by trunc((to_number(to_char(create_time, 'hh24'))*60+to_number(to_char(create_time, 'mi')))/30)";

//echo $sql.'<br>';
global $dbconn;
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);
$query_rs = array();


while($row = oci_fetch_array($r,OCI_BOTH)) {
		array_push($query_rs,array($row["CTIME"],$row["VAL"]));
	}

echo json_encode($query_rs);


?>