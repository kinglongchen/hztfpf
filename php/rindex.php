<?php
include("conn.php");
abstract class Rindex {
	public $dis = array("tf"=>"t_tf_rs");
	abstract public function day_query($data_index,$id,$year,$month,$day,$t_itv);
	abstract public function month_query($data_index,$id,$year,$month);
	abstract public function year_query($data_index,$id,$year);
	
	}
	
class RoadIndex extends Rindex {
	public function day_query($data_index,$id,$year,$month,$day,$t_itv) {
		$date_from = date('Y-m-d H:i:s',mktime(0,0,1,$month,$day,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day+1,$year));
		$db = $this->dis[$data_index];
		$sql = "select ID,to_char(CREATE_TIME,'yyyy-mm-dd hh24:mi:ss') CREATE_TIME,VALUE from $db where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time";
		
		//$sql = "select * from t_road_sec";
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$query_rs = array();
		
		$row = oci_fetch_array($r,OCI_BOTH);
		$from_time = $row['CREATE_TIME'];
		$value = 0;
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$to_time = $row['CREATE_TIME'];
			if (strtotime($to_time)-strtotime($from_time)>=$t_itv*60) {
					$value += $row['VALUE'];
					$tf_rs = array();
				
					$tf_rs['from_time'] = $from_time;
					$tf_rs['to_time'] = $to_time;
				
					$tf_rs['value'] = $value;
					array_push($query_rs,$tf_rs);
					$value = 0;
					$from_time = $to_time;
				
				} else {
					$value += $row['VALUE'];
					}
			
			
			}
		return $query_rs;
		}
		
	public function month_query($data_index,$id,$year,$month) {
		
		$date_from = date('Y-m-d H:i:s',mktime(0,0,1,$month,1,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,0,$month+1,1,$year));
		
		
		
		$db = $this->dis[$data_index];
		
		$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd') CREATE_TIME,SUM(VALUE) VALUE from $db where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd') order by create_time";
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$query_rs = array();
		
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$tf_rs = array();
			$tf_rs['create_time'] = $row['CREATE_TIME'];
			$tf_rs['value'] = $row['VALUE'];
			array_push($query_rs,$tf_rs);
			}
		//由于查询的日期范围是从一个月的1号00:00:001开始到下个月的1号00:00:00结束，查询的随后一项是分组下个月的1号的，但其实是
		if(count($query_rs)==0) return $query_rs;
		$lmonth = explode('-',$query_rs[count($query_rs)-1]['create_time']);
		$lmonth = intval($lmonth[1],10);
		if ($lmonth != $month) {
			if (count($query_rs)>=2) {
				$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
				array_pop($query_rs);
				} else {
					$query_rs[count($query_rs)-1]['create_time'] = $year."-".$month."-".getMonthDayNum($year,$month);
					}
			}
		return $query_rs;
		
		}
	
	public function year_query($data_index,$id,$year) {
		$date_from = $year."-01-01 00:00:01";
		$date_to = ($year+1)."-01-01 00:00:00";
		
		$date_from = date('Y-m-d H:i:s',mktime(0,0,1,1,1,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year+1));
		
		$db = $this->dis[$data_index];
		
		$sql = "select to_char(CREATE_TIME,'yyyy-mm') CREATE_TIME,SUM(VALUE) VALUE from $db where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm') order by create_time";
		
		echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$query_rs = array();
		
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$tf_rs = array();
			$tf_rs['create_time'] = $row['CREATE_TIME'];
			$tf_rs['value'] = $row['VALUE'];
			array_push($query_rs,$tf_rs);
			}
		if(count($query_rs)==0)return $query_rs;
		
		$lyear = explode('-',$query_rs[count($query_rs)-1]['create_time']);
		$lyear = intval($lyear[0],10);
		if ($lyear != $year) {
			if (count($query_rs)>=2) {
				$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
				array_pop($query_rs);
				} else {
					$query_rs[count($query_rs)-1]['create_time'] = $year."-12";
					}
			
			}
		return $query_rs;
		
	//	$sql = "select * from $dis[$data_index] where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time;";
		}
	}
	
/*class ZoneIndex extends Rindex {
		
	}*/

function getMonthDayNum($year,$month) {
	$day_num = -1;
	switch($month) {
		case 1:$day_num=31;break;
		case 2:$day_num=$year%4==0?29:28;break;
		case 3:$day_num=31;break;
		case 4:$day_num=30;break;
		case 5:$day_num=31;break;
		case 6:$day_num=30;break;
		case 7:$day_num=31;break;
		case 8:$day_num=31;break;
		case 9:$day_num=30;break;
		case 10:$day_num=31;break;
		case 11:$day_num=30;break;
		case 12:$day_num=31;break;
		default: throw new Exception("错误的月份：$month");
		}
		return $day_num;
	}

//$rins = new RoadIndex();

//print_r($rins->day_query('tf',0,2013,12,31,5));

//print_r($rins->month_query('tf',0,2014,12));

//print_r($rins->year_query('tf',0,2014));
//echo date('Y-m-d H:i:s',mktime(13,0,0,12,32,2012));
?>