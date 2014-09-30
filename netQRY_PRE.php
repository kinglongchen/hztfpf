<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

//包含数据库连接文件
include("conn.php");
/*$pre_time=$_GET["time_span"];
$botlat=$_GET["botlat"];
$uplat=$_GET["uplat"];
$rlng=$_GET["rlng"];
$llng=$_GET["llng"];
*/

/*$pre_time=12;
$botlat=0;
$uplat=0;
$rlng=0;
$llng=0;*/


$pre_time=12;
$botlat=30.2593266;
$uplat=30.27124341;
$rlng=120.1671052;
$llng=120.1381588;

$query="select distinct ROAD_ID from roadnet where NODEY>$botlat and NODEY<$uplat and NODEX>$llng and NODEX<$rlng";
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);

/*
$road_id_arr=array();
while(($row = oci_fetch_array($r, OCI_BOTH))) {
	array_push($road_id_arr,$row['ROAD_ID']);
	}*/


$query='select a.ROAD_ID,a.ROAD_TIME,a.ROAD_STATUS from HISTORYFORECAST a INNER JOIN (';
$query.="select ROAD_ID,max(ROAD_TIME) as ROAD_TIME from HISTORYFORECAST where (";


/*$query.="road_id=".$road_id_arr[0];
$road_id_count = count($road_id_arr);

for ($i = 1;$i< $road_id_count ;$i++) {
	$query.=" or road_id=".$road_id_arr[$i];
	}*/
	

$row = oci_fetch_array($r, OCI_BOTH);
if ($row) {
	$query.="road_id=".$row['ROAD_ID'];
	while(($row = oci_fetch_array($r, OCI_BOTH))) { 
		$query.=" or road_id=".$row['ROAD_ID'];
		}
} else {
	echo $xml= '<?xml version="1.0" encoding="utf-8"?>
<roads></roads>';
exit();
	}

$query.=") and ROAD_TIME<(to_date(to_char(sysdate,'yyyy-mm-dd'),'yyyy-mm-dd')+numtodsinterval(".($pre_time).",'minute')) and ROAD_TIME>(to_date(to_char(sysdate,'yyyy-mm-dd'),'yyyy-mm-dd')+numtodsinterval(".($pre_time-5).",'minute')) group by ROAD_ID) b on a.ROAD_ID=b.ROAD_ID AND a.ROAD_TIME=b.ROAD_TIME";

//echo $query ;


$r=oci_parse($dbconn,$query);
$road_pre_rs=array();
oci_execute($r,OCI_DEFAULT);
$is_val=false;
while($row = oci_fetch_array($r,OCI_BOTH)) {
	$is_val=true;
	$road_pre_rs[$row['ROAD_ID']]=$row['ROAD_STATUS'];
	
	}
if (!$is_val) {
	echo $xml= '<?xml version="1.0" encoding="utf-8"?><roads></roads>';
	exit();
	}	

$road_id_arr = array_keys($road_pre_rs);
$query="select ROAD_ID,NODEINDEX,NODEID,NODEX,NODEY,FLAG,CON_INDEX from roadnet where ";
$query.="road_id=".$road_id_arr[0];

$road_id_count = count($road_id_arr);

for ($i = 1;$i< $road_id_count ;$i++) {
	$query.=" or road_id=".$road_id_arr[$i];
	}

$query.=" order by ROAD_ID,NODEINDEX";  
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);

$xml= '<?xml version="1.0" encoding="utf-8"?>
<roads>';
$roadid=null;
$roadname=null;
$is_val=false;
while($row = oci_fetch_array($r,OCI_BOTH)) {  
	$is_val = true;
	if($roadid==null||$roadid!=$row['ROAD_ID']) {
		 if($roadid!=null) {
			 $xml.= "</road>\n";
		 	}
		 $xml.= "<road>\n";
		 $xml.= "<roadid>".$row['ROAD_ID']."</roadid>\n";
		 $xml.= "<roadstatus>". $road_pre_rs[$row['ROAD_ID']]."</roadstatus>\n";
		 
	 }
		 $xml.= "<node>\n";
		 $xml.= "<nodeid>" . $row['NODEID'] . "</nodeid>\n";
		 $xml.= "<nodx>" . $row['NODEX'] . "</nodx>\n";
		 $xml.= "<nody>" . $row['NODEY'] . "</nody>\n";
		 $xml.= "<nodeindex>".$row['NODEINDEX']."</nodeindex>\n";
		 $xml.= "</node>\n";
		 if($roadid!=$row['ROAD_ID'])
		 $roadid=$row['ROAD_ID'];
}
	if ($is_val) {
	$xml.= "</road>\n";
	}
		
	$xml.= "</roads>";

		echo $xml;
		oci_free_statement($r);
		oci_close($dbconn);
?>


