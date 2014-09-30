<?php
header('Content-Type: application/json');
header("Cache-Control: no-cache, must-revalidate");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include("conn.php");
$area_id = $_GET['area_id'];
//$area_id = 1;
/*$query = "select a.AREA_ID,a.AREA_CON,a.DATATIME from AREA_CON a INNER JOIN (select AREA_ID,max(DATATIME) from AREA_CON where AR)"*/

$query ='select AREA_ID,AREA_CON,DATATIME from AREA_CON where DATATIME=(select max(DATATIME) from AREA_CON where AREA_ID='.$area_id.') and AREA_ID='.$area_id.'';
//echo $query;
$r=oci_parse($dbconn,$query);
oci_execute($r,OCI_DEFAULT);
$row = oci_fetch_array($r, OCI_BOTH);
$crowded_num=-1;
if($row) {
	$crowded_num=$row['AREA_CON'];
	}

echo '
{	
	"area_id":'.$area_id.',
	"crowded_num":'.$crowded_num.',
	"viaduct_num":3.8,
	"ground_num":9.9
	}
'

?>