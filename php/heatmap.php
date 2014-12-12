<?php
//以天为单位的sql设计
include('req.php');
include('../conn.php');
//测试数据
$qrytype='year';
$hour = 10;
$minu = 19;
$sec = 20;
$month = 11;
$day = 28;
$year = 2013;

$date_to = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));

if ($qrytype=="day") {
		$day--;
		$group_str = " to_char(create_time,'yyyy-mm-dd hh24') ";
	}

//以月为单位的sql设计
if ($qrytype=="month") {
		$month--;
		$group_str = " to_char(create_time,'yyyy-mm-dd') ";
	}

//以年为单位的sql设计
if ($qrytype=="year") {
		$year--;
		$group_str = " to_char(create_time,'yyyy-mm') ";
	}
	
$date_from = date('Y-m-d H:i:s',mktime($hour,$minu,$sec,$month,$day,$year));

//$t_itv  = ($date_end-$date_start)/36;
$sql = "select".$group_str."CT,T_RC.ID ID,AVG(NODEX) NODEX,AVG(NODEY) NODEY,AVG(VALUE) VALUE from t_rc_tf_rs,t_rc where t_rc_tf_rs.rc_id=t_rc.id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by".$group_str.",T_RC.ID order by".$group_str.",TO_NUMBER(T_RC.ID)";

//echo $sql.'<br>';
global $dbconn;
$r=oci_parse($dbconn,$sql);
oci_execute($r,OCI_DEFAULT);
$rs = array();
$urs=NULL;
$create_time = -1;
while($row = oci_fetch_array($r,OCI_BOTH)) {
	/*if (!array_key_exists($row['CT'],$rs)) {
			$urs = array();
			$rs[$row['CT']]=$urs;
		}*/
		
	if ($create_time!=$row['CT']) {
			if ($create_time!=-1) {
				array_push($rs,$urs);
				
				}
			$urs = array();
			$create_time=$row['CT'];
		}
		array_push($urs,array('nodex'=>$row['NODEX'],'nodey'=>$row['NODEY'],'value'=>$row['VALUE']));
	}
	
//echo json_encode($rs);
$fp = fopen("C:\serverdata\heatmapdata\year.txt",'w');
if($fp) {
	$flag = fwrite($fp,json_encode($rs));
	if ($flag) echo "写入成功！";
	}


?>