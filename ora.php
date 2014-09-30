<?php

//包含数据库连接文件
include("conn.php");

$stid = oci_parse($dbconn,"select * from results WHERE rownum<11 order by DATATIME desc");
oci_execute($stid,OCI_DEFAULT);
$result="";

while($row=oci_fetch_row($stid)) {
   $result = $result . $row[3] . ',' . $row[1] . ',' ;
   }
echo $result;

oci_close($dbconn);

?>