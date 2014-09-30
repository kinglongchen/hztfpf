<?php
header('Content-Type: text/xml');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 

//包含数据库连接文件
include ("obtain_roadnet_xml.php");

$roadids=$_GET["roadids"];

echo obtain_roadnet_xml_by_ids($roadids);

oci_close($dbconn);
?>
