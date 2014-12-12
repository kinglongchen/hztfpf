<?php
header("content-type:application/json; charset=utf-8");
include("../conn.php");
include("req.php");
/*$year = 2014;
$month = 12;
$day = 3;*/

$ret_rs = array();

$road_id=$_GET["roadid"];
$query = "select NAME from new_road_info where id=$road_id";
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);
$row = oci_fetch_array($r, OCI_BOTH);

$ret_rs['name'] = mb_convert_encoding($row['NAME'],'utf-8','gbk');

$rfc_data = array();
for($i = 0;$i<24;$i++) {
	$rfc_data[$i] = -1;
	}
/*for($i = 0;$i<24;$i++) {
		$date_from = date('Y-m-d H:i:s',mktime($i,-4,0,$month,$day,$year));
		$date_to = date('Y-m-d H:i:s',mktime($i,4,0,$month,$day,$year));
		$sql = "select create_time,VALUE from t_ts_rs
			 where 
			 road_sec_id = $road_id 
			 and 
			 create_time between 
			 				to_date('$date_from','yyyy-mm-dd hh24:mi:ss') 
							and 
							to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time";
		//echo $sql."<br>";
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$row = oci_fetch_array($r, OCI_BOTH);
		array_push($rfc_data,$row?$row['VALUE']:-1);
	}*/
	
$sql = "select to_char(t_ts_rs.create_time,'yyyy-mm-dd hh24:mi:ss') ct,t_ts_rs.VALUE RS,t_fc_rs.VALUE prt from t_ts_rs,t_fc_rs
			 where 
			 t_ts_rs.road_sec_id = $road_id and t_ts_rs.road_sec_id = t_fc_rs.road_sec_id and t_ts_rs.create_time=t_fc_rs.create_time
			 and (
			 ";
			 
for($i = 0;$i<24;$i++) {
		$date_from = date('Y-m-d H:i:s',mktime($i,-4,0,$month,$day,$year));
		$date_to = date('Y-m-d H:i:s',mktime($i,4,0,$month,$day,$year));
		 $sql.="
		 		t_ts_rs.create_time between
			 				to_date('$date_from','yyyy-mm-dd hh24:mi:ss') 
							and 
							to_date('$date_to','yyyy-mm-dd hh24:mi:ss')
				
				/*and
				
				t_ts_rs.create_time between
			 				to_date('$date_from','yyyy-mm-dd hh24:mi:ss') 
							and 
							to_date('$date_to','yyyy-mm-dd hh24:mi:ss')*/
							";
		if($i!=23) $sql.=" or ";
		
	}
$sql.=") order by ct";

//echo $sql."<br>";
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);

while($row = oci_fetch_array($r, OCI_BOTH)) {
		
		$hms = explode(' ',$row['CT']);
		$h = explode(':',$hms[1]);
		$h = (int)$h[0];
		$rfc_data[$h] = array($row['RS'],'0'.$row['PRT']);
	}
$ret_rs['data'] = $rfc_data;

echo json_encode($ret_rs);
?>