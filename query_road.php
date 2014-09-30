<?php
header("content-type:application/json; charset=utf-8");
include("conn.php"); 
$roadkey = $_GET['search-text'];
$encode = mb_detect_encoding($roadkey);
$roadkey = iconv($encode,"GBK",$roadkey);
$sql = "select id,name from hz_roads where name like '%$roadkey%'";
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);
$roadinfo=array();
while($row = oci_fetch_array($r,OCI_BOTH))
 {  
	array_unshift($roadinfo, mb_convert_encoding($row['NAME'],'utf-8','gbk'));
 }
 
//echo $roadinfo['0'];
//print_r($roadinfo);
//echo $roadinfo;
echo json_encode($roadinfo,false);
?>