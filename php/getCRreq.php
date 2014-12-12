<?php
header("content-type:application/json; charset=utf-8");
include('../conn.php');
include('req.php');
/*$prt = 0.5;
$hour = 12;
$minu = 13;
$sec = 14;
$year = 2014;
$month = 12;
$day = 3;*/


$date_from = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));
$date_to = date('Y-m-d H:i:s',mktime($hour,$minu+5,$sec,$month,$day,$year));
$sql = "select distinct ROAD_SEC_ID 
				from t_fc_rs 
				where value>$prt and
				create_time between
							to_date('$date_from','yyyy-mm-dd hh24:mi:ss') 
							and 
							to_date('$date_to','yyyy-mm-dd hh24:mi:ss')";

//echo $sql."<br>";

global $dbconn;
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);
$query_rs = array();

while($row = oci_fetch_array($r,OCI_BOTH)) {
		array_push($query_rs,$row["ROAD_SEC_ID"]);
	}

echo json_encode($query_rs);
?>