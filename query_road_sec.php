<?php
header("content-type:application/json; charset=utf-8");
include("conn.php"); 
$roadname = $_GET['search-text'];
$encode = mb_detect_encoding($roadname);
$roadname = iconv($encode,"GBK",$roadname);
$sql = "select id,name from hz_roads where name='$roadname'";
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);

$row = oci_fetch_array($r,OCI_BOTH);
$roadid = $row['ID'];

$sql = "select id,name,road_id from hz_road_sec where road_id=$roadid";
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);

$rsecinfo=array();
while($row = oci_fetch_array($r,OCI_BOTH))
 {  
 	//$rsecinfo[$row['ID']]= mb_convert_encoding($row['NAME'],'utf-8','gbk');
	
	array_unshift($rsecinfo,array($row['ID'],mb_convert_encoding($row['NAME'],'utf-8','gbk')));
 }
 
//echo $roadinfo['0'];
//print_r($roadinfo);
//echo $roadinfo;
echo json_encode($rsecinfo,false);
?>