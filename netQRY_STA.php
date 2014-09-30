<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

//包含数据库连接文件
include("conn.php");

$botlat=$_GET["botlat"];
$uplat=$_GET["uplat"];
$rlng=$_GET["rlng"];
$llng=$_GET["llng"];


/*$botlat=30.2593266;
$uplat=30.27124341;
$rlng=120.1671052;
$llng=120.1381588;*/


$query="select distinct ROAD_ID from roadnet where NODEY>$botlat and NODEY<$uplat and NODEX>$llng and NODEX<$rlng";
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);








$row = oci_fetch_array($r, OCI_BOTH);
$query="select ROAD_ID,NODEINDEX,NODEID,NODEX,NODEY,FLAG,roadstatus from roadnet where ";



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

/*$query.="road_id=".$row['ROAD_ID'];
while(($row = oci_fetch_array($r, OCI_BOTH))) 
{ 
	$query.=" or road_id=".$row['ROAD_ID'];
}*/

$query.=" order by ROAD_ID,NODEINDEX";  
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);

$xml= '<?xml version="1.0" encoding="utf-8"?>
<roads>';
$roadid=null;
$roadname=null;

while($row = oci_fetch_array($r,OCI_BOTH))
 {  

	 if($roadid==null||$roadid!=$row['ROAD_ID'])
	 {
		 if($roadid!=null)
		 {
			 $xml.= "</road>\n";
		 }
		 $xml.= "<road>\n";
		 $xml.= "<roadid>".$row['ROAD_ID']."</roadid>\n";
		 if( $row['ROADSTATUS']!=null)
		 $xml.= "<roadstatus>".$row['ROADSTATUS']."</roadstatus>\n";
		 else
		 $xml.= "<roadstatus>".'0'."</roadstatus>\n";
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
		$xml.= "</road>\n";
		$xml.= "</roads>";

		echo $xml;
		oci_free_statement($r);
		oci_close($dbconn);
?>


