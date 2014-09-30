<?php
$dbconn = oci_connect("root", "123123", @$db, 'UTF8');  
if($dbconn!=false) 
{
//echo "连接成功"; 
} 
else 
{
echo "连接失败"; 
}   
    $cxid=$_POST["cxid"];      //查询项


	
	
	$result=array();
	
	if    ($cxid=='rcon_QRY'){
			$road_id=$_POST["road_id"];//路段id
			$area_id=$_POST["area_id"];//区域id
			$staTime=$_POST["staTime"];//开始时间
			$endTime=$_POST["endTime"];//结束时间
	     $sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'),CONINDEX from ROADINFO where road_id=$road_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss')";}//拥堵指数查询
	else if ($cxid=='rvol_QRY'){
			$road_id=$_POST["road_id"];//路段id
			$area_id=$_POST["area_id"];//区域id
			$staTime=$_POST["staTime"];//开始时间
			$endTime=$_POST["endTime"];//结束时间
		 $sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'), CARNUM from ROADINFO  where road_id=$road_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss') ";}//车流量查询
	else if ($cxid=="rspe_QRY"){
			$road_id=$_POST["road_id"];//路段id
			$area_id=$_POST["area_id"];//区域id
			$staTime=$_POST["staTime"];//开始时间
			$endTime=$_POST["endTime"];//结束时间
		$sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'), SPEED from ROADINFO WHERE road_id=$road_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss')";}	//速度查询
	else if ($cxid=="rsta_QRY")	{
			$road_id=$_POST["road_id"];//路段id
			$area_id=$_POST["area_id"];//区域id
			$staTime=$_POST["staTime"];//开始时间
			$endTime=$_POST["endTime"];//结束时间
	    $sql="select status,count(status) as x from roadinfo WHERE road_id=$road_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss') group by status order by status";}//状态百分比查询
		
	else if  ($cxid=='acon_QRY'){	$road_id=$_POST["road_id"];//路段id
	$area_id=$_POST["area_id"];//区域id
	$staTime=$_POST["staTime"];//开始时间
	$endTime=$_POST["endTime"];//结束时间
	     $sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'),CONINDEX from ROADINFO where road_id=$area_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss')";	}
    else if ($cxid=='avol_QRY'){
			$road_id=$_POST["road_id"];//路段id
	$area_id=$_POST["area_id"];//区域id
	$staTime=$_POST["staTime"];//开始时间
	$endTime=$_POST["endTime"];//结束时间
		 $sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'), CARNUM from ROADINFO  where road_id=$area_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss') ";}
	else if ($cxid=="aspe_QRY"){
			$road_id=$_POST["road_id"];//路段id
	$area_id=$_POST["area_id"];//区域id
	$staTime=$_POST["staTime"];//开始时间
	$endTime=$_POST["endTime"];//结束时间
		$sql="select to_char(DATATIME,'yyyy/mm/dd hh24:mi'),  SPEED from ROADINFO   where road_id=$area_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss')";	}
    else if ($cxid=="asta_QRY"){
		$road_id=$_POST["road_id"];//路段id
		$area_id=$_POST["area_id"];//区域id
		$staTime=$_POST["staTime"];//开始时间
		$endTime=$_POST["endTime"];//结束时间
		$sql="select status,count(status) as x from roadinfo WHERE road_id=$area_id and datatime>=to_date('$staTime','yyyy/mm/dd hh24:mi:ss')  and datatime<=to_date('$endTime','yyyy/mm/dd hh24:mi:ss') group by status order by status";}
		
	else if ($cxid=="rcTime_QRY"){
		$road_id=$_POST["road_id"];//路段id
		$area_id=$_POST["area_id"];//区域id
		$staTime=$_POST["staTime"];//开始时间
		$endTime=$_POST["endTime"];//结束时间
	    $sql="select to_char(DATATIME,'hh24:mi'),carnum from roadinfo WHERE road_id=$road_id and to_char(datatime,'yyyy-mm-dd')='$staTime' or to_char(datatime,'yyyy-mm-dd')='$endTime' and road_id=$road_id order by datatime";	}
		
	else if ($cxid=="acTime_QRY"){
			$road_id=$_POST["road_id"];//路段id
			$area_id=$_POST["area_id"];//区域id
			$staTime=$_POST["staTime"];//开始时间
			$endTime=$_POST["endTime"];//结束时间
	    $sql="select to_char(DATATIME,'hh24:mi'),carnum from roadinfo WHERE road_id=$area_id and to_char(datatime,'yyyy-mm-dd')='$staTime' or to_char(datatime,'yyyy-mm-dd')='$endTime' and road_id=$area_id order by datatime";	}
	
	
	else if ($cxid=="rcSpace_QRY"){
		$roadid1=$_POST["road_id1"];
		$roadid2=$_POST["road_id2"];
		$Time=$_POST["Time"];
	    $sql="select to_char(DATATIME,'hh24:mi'),carnum from roadinfo WHERE road_id=$roadid1 and to_char(datatime,'yyyy-mm-dd')='$Time' or   road_id=$roadid2 and to_char(datatime,'yyyy-mm-dd')='$Time' order by road_id,datatime";}	
	else if ($cxid=="acSpace_QRY"){
		$areaid1=$_POST["area_id1"];
		$areaid2=$_POST["area_id2"];
		$Time=$_POST["Time"];
	    $sql="select to_char(DATATIME,'hh24:mi'),carnum from roadinfo WHERE road_id=$areaid1 and to_char(datatime,'yyyy-mm-dd')='$Time' or to_char(datatime,'yyyy-mm-dd')='$Time' and road_id=$areaid2 order by datatime";	}
		
		
		
		
	$stid = oci_parse($dbconn,$sql);
	if($stid != false)
	{oci_execute($stid,OCI_DEFAULT);
	while($row=oci_fetch_row($stid)) {
	array_push($result,array($row[0],$row[1])); 
	};
	echo json_encode($result);}//格式转换
	else{ 
		$e = oci_error($stid); 
		echo $e['message']; 
	} 
	
	oci_free_statement($stid);
	oci_close($dbconn);
?>
