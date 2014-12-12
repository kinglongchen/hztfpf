<?php
include("../conn.php");
abstract class Rindex {
	public $dis = array("tf"=>"t_tf_rs","cs"=>"t_cs_rs","ci"=>"t_ci_rs","ct"=>"t_ct_rs");
	public $avg_dis=array("cs","ci");
	abstract public function day_query($data_index,$id,$year,$month,$day,$t_itv);
	abstract public function month_query($data_index,$id,$year,$month);
	abstract public function year_query($data_index,$id,$year);
	
	}
	
class RoadIndex extends Rindex {
	public function day_query($data_index,$id,$year,$month,$day,$t_itv) {
		/*$date_from = date('Y-m-d H:i:s',mktime(0,0,1,$month,$day,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day+1,$year));*/
		
		$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
		$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
		
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
		
		$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
		
		
		
		$db = $this->dis[$data_index];
		
		$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd') CREATE_TIME,SUM(VALUE) VSUM,AVG(VALUE) VAVG from $db where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd') order by create_time";
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$query_rs = array();
		
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$tf_rs = array();
			$tf_rs['create_time'] = $row['CREATE_TIME'];
			if (in_array($data_index,$this->avg_dis))
				$tf_rs['value'] = $row['VAVG'];
			else
				$tf_rs['value'] = $row['VSUM'];
			array_push($query_rs,$tf_rs);
			}
		//由于查询的日期范围是从一个月的1号00:00:001开始到下个月的1号00:00:00结束，查询的随后一项是分组下个月的1号的，但其实是
		/*if(count($query_rs)==0) return $query_rs;
		$lmonth = explode('-',$query_rs[count($query_rs)-1]['create_time']);
		$lmonth = intval($lmonth[1],10);
		if ($lmonth != $month) {
			if (count($query_rs)>=2) {
				$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
				array_pop($query_rs);
				} else {
					$query_rs[count($query_rs)-1]['create_time'] = $year."-".$month."-".getMonthDayNum($year,$month);
					}
			}*/
		return $query_rs;
		
		}
	
	public function year_query($data_index,$id,$year) {
		/*$date_from = $year."-01-01 00:00:01";
		$date_to = ($year+1)."-01-01 00:00:00";
		*/
		$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
		$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
		
		$db = $this->dis[$data_index];
		
		$sql = "select to_char(CREATE_TIME,'yyyy-mm') CREATE_TIME,SUM(VALUE) VSUM,AVG(VALUE) VAVG from $db where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm') order by create_time";
		
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$query_rs = array();
		
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$tf_rs = array();
			$tf_rs['create_time'] = $row['CREATE_TIME'];
			if (in_array($data_index,$this->avg_dis))
				$tf_rs['value'] = $row['VAVG'];
			else
				$tf_rs['value'] = $row['VSUM'];
			array_push($query_rs,$tf_rs);
			}
		/*if(count($query_rs)==0)return $query_rs;
		
		$lyear = explode('-',$query_rs[count($query_rs)-1]['create_time']);
		$lyear = intval($lyear[0],10);
		if ($lyear != $year) {
			if (count($query_rs)>=2) {
				$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
				array_pop($query_rs);
				} else {
					$query_rs[count($query_rs)-1]['create_time'] = $year."-12";
					}
			
			}*/
		return $query_rs;
		
	//	$sql = "select * from $dis[$data_index] where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time;";
		}
		
	public function state_query($id,$year,$month,$day) {
			$rs = array();
			$rs['day'] = $this->state_day_query ($id,$year,$month,$day);
			$rs['month'] = $this->state_month_query ($id,$year,$month);
			$rs['year'] = $this->state_year_query ($id,$year);
			return $rs;
		}
		
	public function state_day_query ($id,$year,$month,$day) {
			$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
			$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
			$query_rs = array();
			
			
	
			$query_rs[0]=$this->count_state(1,$id,$date_from,$date_to);
			
			$query_rs[1]=$this->count_state(2,$id,$date_from,$date_to);
			
			$query_rs[2]=$this->count_state(3,$id,$date_from,$date_to);
			
			return $query_rs;
		}
		
	private function count_state($state,$id,$date_from,$date_to) {
		$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd hh24') CREATE_TIME,COUNT(VALUE) VSUM from t_ts_rs where road_sec_id = $id and VALUE=$state and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd hh24') order by create_time";
			
		//$sql = "select * from t_road_sec";
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$rs = array();
		while($row = oci_fetch_array($r,OCI_BOTH)) {
				$trs = array();
				$trs['create_time'] = $row['CREATE_TIME'];
				$trs['value'] = $row['VSUM'];
				array_push($rs,$trs);
			}
			return $rs;
			
		}
			
	public function state_month_query($id,$year,$month) {
			$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
			$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
			
			$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd') DAY,to_char(CREATE_TIME,'yyyy-mm-dd hh24') HOUR,AVG(VALUE) VAVG from t_ts_rs where road_sec_id=$id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd'),to_char(CREATE_TIME,'yyyy-mm-dd hh24') order by DAY,HOUR";
			
			//echo $sql.'<br>';
			
			global $dbconn;
			$r=oci_parse($dbconn,$sql);
			oci_execute($r,OCI_DEFAULT);
			$query_rs = array();
			
			while($row = oci_fetch_array($r,OCI_BOTH)) {
				$rs = array();
				$rs['day'] = $row['DAY'];
				$rs['hour'] = $row['HOUR'];
				$rs['value'] = $row['VAVG'];
				array_push($query_rs,$rs);
			}
			return $query_rs;
		}
		
		
		public function state_year_query($id,$year) {
			$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
			$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
			
			$sql = "select to_char(CREATE_TIME,'yyyy-mm') MONTH,to_char(CREATE_TIME,'hh24') HOUR,AVG(VALUE) VAVG from t_ts_rs where road_sec_id=$id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm'),to_char(CREATE_TIME,'hh24') order by MONTH";
			
			//echo $sql.'<br>';
			
			global $dbconn;
			$r=oci_parse($dbconn,$sql);
			oci_execute($r,OCI_DEFAULT);
			$query_rs = array();
			
			while($row = oci_fetch_array($r,OCI_BOTH)) {
				$rs = array();
				$rs['month'] = $row['MONTH'];
				$rs['hour'] = $row['HOUR'];
				$rs['value'] = $row['VAVG'];
				array_push($query_rs,$rs);
			}
			return $query_rs;
			
			
		}	
		
	}
	
	
	
class ZoneIndex extends Rindex {
	 
		public function day_ConRoad_Rank($id,$year,$month,$day) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
				$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
				$sql = "select NAME,SUM(VALUE) VALUE from t_road_sec,t_ct_rs where t_road_sec.id=t_ct_rs.road_sec_id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by NAME order by value desc";
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				$i = 0;
				while($i++<5&&$row = oci_fetch_array($r,OCI_BOTH)) {
						$urs = array();
						$urs['name'] = icon_to_utf8($row['NAME']);
						$urs['ctime'] = $row['VALUE'];
						array_push($rs,$urs);
					}
				return $rs;
			}
			
		public function month_ConRoad_Rank($id,$year,$month) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
				$sql = "select NAME,SUM(VALUE) VALUE from t_road_sec,t_ct_rs where t_road_sec.id=t_ct_rs.road_sec_id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by NAME order by value desc";
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				$i = 0;
				while($i++<5&&$row = oci_fetch_array($r,OCI_BOTH)) {
						$urs = array();
						$urs['name'] = icon_to_utf8($row['NAME']);
						$urs['ctime'] = $row['VALUE'];
						array_push($rs,$urs);
					}
				return $rs;
			}
		
		public function year_ConRoad_Rank($id,$year) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
				$sql = "select NAME,SUM(VALUE) VALUE from t_road_sec,t_ct_rs where t_road_sec.id=t_ct_rs.road_sec_id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by NAME order by value desc";
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				$i = 0;
				while($i++<5&&$row = oci_fetch_array($r,OCI_BOTH)) {
						$urs = array();
						$urs['name'] = icon_to_utf8($row['NAME']);
						$urs['ctime'] = $row['VALUE'];
						array_push($rs,$urs);
					}
				return $rs;
			}
					
		public function day_ConRoad_query($id,$year,$month,$day) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
				$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
				
				$id_codis = "and t_road_sec.area_id = $id";
				if($id == -1)
				$id_codis = "";
				
				$sql = "select distinct ROAD_SEC_ID from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id ".$id_codis." and VALUE=3 and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss')";
				
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				while($row = oci_fetch_array($r,OCI_BOTH)) {
					array_push($rs,$row['ROAD_SEC_ID']);
					}
				return $rs;  
				
			}
			
		public function month_ConRoad_query($id,$year,$month) {
			
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
				
				$id_codis = "and t_road_sec.area_id = $id";
				if($id == -1)
				$id_codis = "";
				
				$sql = "select distinct ROAD_SEC_ID from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id ".$id_codis." and VALUE=3 and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss')";
				
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				while($row = oci_fetch_array($r,OCI_BOTH)) {
					array_push($rs,$row['ROAD_SEC_ID']);
					}
				return $rs;
			}
			
		public function year_ConRoad_query($id,$year) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
				
				$id_codis = "and t_road_sec.area_id = $id";
				if($id == -1)
				$id_codis = "";
				
				$sql = "select distinct ROAD_SEC_ID from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id ".$id_codis." and VALUE=3 and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss')";
				//echo $sql;
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$rs = array();
				while($row = oci_fetch_array($r,OCI_BOTH)) {
					array_push($rs,$row['ROAD_SEC_ID']);
					}
				return $rs;
			}
			
		public function state_day_query($id,$year,$month,$day) {
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
				$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
				$query_rs = array();
			
				$query_rs[0]=$this->count_state(1,$id,$date_from,$date_to);
			
				$query_rs[1]=$this->count_state(2,$id,$date_from,$date_to);
			
				$query_rs[2]=$this->count_state(3,$id,$date_from,$date_to);
			
				return $query_rs;
				
			}
			
		private function count_state($state,$id,$date_from,$date_to) {
		$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd hh24') CREATE_TIME,COUNT(VALUE) VSUM from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and VALUE=$state and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd hh24') order by create_time";
			
		//$sql = "select * from t_road_sec";
		//echo $sql.'<br>';
		global $dbconn;
		$r=oci_parse($dbconn,$sql);
		oci_execute($r,OCI_DEFAULT);
		$rs = array();
		while($row = oci_fetch_array($r,OCI_BOTH)) {
			$trs = array();
			$trs['create_time'] = $row['CREATE_TIME'];
			$trs['value'] = $row['VSUM'];
			array_push($rs,$trs);
			}
		return $rs;
			
		}
		
		public function state_month_query($id,$year,$month) {
			$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
			$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
			
			$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd') DAY,to_char(CREATE_TIME,'yyyy-mm-dd hh24') HOUR,AVG(VALUE) VAVG from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd'),to_char(CREATE_TIME,'yyyy-mm-dd hh24') order by DAY,HOUR";
			
			//echo $sql.'<br>';
			
			global $dbconn;
			$r=oci_parse($dbconn,$sql);
			oci_execute($r,OCI_DEFAULT);
			$query_rs = array();
			
			while($row = oci_fetch_array($r,OCI_BOTH)) {
				$rs = array();
				$rs['day'] = $row['DAY'];
				$rs['hour'] = $row['HOUR'];
				$rs['value'] = $row['VAVG'];
				array_push($query_rs,$rs);
			}
			return $query_rs;
		}
		
		public function state_year_query($id,$year) {
			$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
			$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
			
			$sql = "select to_char(CREATE_TIME,'yyyy-mm') MONTH,to_char(CREATE_TIME,'hh24') HOUR,AVG(VALUE) VAVG from t_ts_rs,t_road_sec where t_ts_rs.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss') and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm'),to_char(CREATE_TIME,'hh24') order by MONTH";
			
			//echo $sql.'<br>';
			
			global $dbconn;
			$r=oci_parse($dbconn,$sql);
			oci_execute($r,OCI_DEFAULT);
			$query_rs = array();
			
			while($row = oci_fetch_array($r,OCI_BOTH)) {
				$rs = array();
				$rs['month'] = $row['MONTH'];
				$rs['hour'] = $row['HOUR'];
				$rs['value'] = $row['VAVG'];
				array_push($query_rs,$rs);
			}
			return $query_rs;
		}
		
		public function day_query($data_index,$id,$year,$month,$day,$t_itv) {
				/*$date_from = date('Y-m-d H:i:s',mktime(0,0,1,$month,$day,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day+1,$year));*/
		
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,$day,$year));
				$date_to = date('Y-m-d H:i:s',mktime(23,59,59,$month,$day,$year));
		
				$db = $this->dis[$data_index];
				$sql = "select $db.ID ID,to_char(CREATE_TIME,'yyyy-mm-dd hh24:mi:ss') CREATE_TIME,VALUE from $db,t_road_sec where $db.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time";
		
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
			
		public function month_query($data_index,$id,$year,$month){
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,$month,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,$month+1,1,$year));
		
		
		
				$db = $this->dis[$data_index];
		
				$sql = "select to_char(CREATE_TIME,'yyyy-mm-dd') CREATE_TIME,SUM(VALUE) VSUM,AVG(VALUE) VAVG from $db,t_road_sec where $db.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm-dd') order by create_time";
				//echo $sql.'<br>';
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$query_rs = array();
		
				while($row = oci_fetch_array($r,OCI_BOTH)) {
					$tf_rs = array();
					$tf_rs['create_time'] = $row['CREATE_TIME'];
					if (in_array($data_index,$this->avg_dis))
						$tf_rs['value'] = $row['VAVG'];
					else
						$tf_rs['value'] = $row['VSUM'];
					array_push($query_rs,$tf_rs);
					}
				//由于查询的日期范围是从一个月的1号00:00:001开始到下个月的1号00:00:00结束，查询的随后一项是分组下个月的1号的，但其实是
				/*if(count($query_rs)==0) return $query_rs;
				$lmonth = explode('-',$query_rs[count($query_rs)-1]['create_time']);
				$lmonth = intval($lmonth[1],10);
				if ($lmonth != $month) {
				if (count($query_rs)>=2) {
						$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
						array_pop($query_rs);
						} else {
							$query_rs[count($query_rs)-1]['create_time'] = $year."-".$month."-".getMonthDayNum($year,$month);
							}
					}*/
				return $query_rs;
			}
			
		public function year_query($data_index,$id,$year){
				/*$date_from = $year."-01-01 00:00:01";
				$date_to = ($year+1)."-01-01 00:00:00";
				*/
				$date_from = date('Y-m-d H:i:s',mktime(0,0,0,1,1,$year));
				$date_to = date('Y-m-d H:i:s',mktime(0,0,-1,1,1,$year+1));
		
				$db = $this->dis[$data_index];
		
				$sql = "select to_char(CREATE_TIME,'yyyy-mm') CREATE_TIME,SUM(VALUE) VSUM,AVG(VALUE) VAVG from $db,t_road_sec where $db.road_sec_id=t_road_sec.id and t_road_sec.area_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') group by to_char(CREATE_TIME,'yyyy-mm') order by create_time";
		
				//echo $sql.'<br>';
				global $dbconn;
				$r=oci_parse($dbconn,$sql);
				oci_execute($r,OCI_DEFAULT);
				$query_rs = array();
		
				while($row = oci_fetch_array($r,OCI_BOTH)) {
					$tf_rs = array();
					$tf_rs['create_time'] = $row['CREATE_TIME'];
					if (in_array($data_index,$this->avg_dis))
						$tf_rs['value'] = $row['VAVG'];
					else
						$tf_rs['value'] = $row['VSUM'];
					array_push($query_rs,$tf_rs);
					}
				/*if(count($query_rs)==0)return $query_rs;
		
				$lyear = explode('-',$query_rs[count($query_rs)-1]['create_time']);
				$lyear = intval($lyear[0],10);
				if ($lyear != $year) {
					if (count($query_rs)>=2) {
						$query_rs[count($query_rs)-2]['value']+=$query_rs[count($query_rs)-1]['value'];
						array_pop($query_rs);
						} else {
							$query_rs[count($query_rs)-1]['create_time'] = $year."-12";
							}
			
					}*/
				return $query_rs;
		
			//	$sql = "select * from $dis[$data_index] where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time;";
			}
		
		
	}

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
/*
    字符串GBK转码为UTF-8，数字转换为数字。
*/
function ct2($s){
    if(is_numeric($s)) {
        return intval($s);
    } else {
        return iconv("GBK","UTF-8",$s);
    }
}
/*
    批量处理gbk->utf-8
*/

function icon_to_utf8($s) {

  if(is_array($s)) {
    foreach($s as $key => $val) {
      $s[$key] = icon_to_utf8($val);
    }
  } else {
      $s = ct2($s);
  }
  return $s;

}

//$rins = new RoadIndex();
//print_r($rins->state_query(0,2013,2,1));

//print_r($rins->day_query('tf',0,2013,12,31,5));

//print_r($rins->month_query('tf',0,2014,12));

//print_r($rins->year_query('tf',0,2014));
//echo date('Y-m-d H:i:s',mktime(13,0,0,12,32,2012));

//$zins = new ZoneIndex();
//print_r($zins->day_query('tf',0,2013,12,31,5));
//print_r($zins->year_ConRoad_Rank(0,2013,2,15));
//print_r($zins->year_ConRoad_qeruy(0,2013,2));

?>