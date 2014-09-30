<?php
header("Content-Type: text/html; charset=utf-8");
include("conn.php");

$road_id=$_GET["roadid"];
$query = "select NAME from new_road_info where id=$road_id";
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);
$row = oci_fetch_array($r, OCI_BOTH);
echo mb_convert_encoding($row['NAME'],'utf-8','gbk');
?>