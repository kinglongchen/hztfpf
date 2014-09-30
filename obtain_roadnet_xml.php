<?php
include ("conn.php");
function  obtain_roadnet_xml_by_ids($roadid_arr) {
	global $dbconn;
	$query="select ROAD_ID,NODEINDEX,NODEID,NODEX,NODEY,FLAG,roadstatus from roadnet where ";
	if (count($roadid_arr)!=0) {
		$query.="road_id=".$roadid_arr[0];
		foreach($roadid_arr as $rid) {
			$query.=" or road_id=".$rid;
			}
		} else {
				echo $xml= '<?xml version="1.0" encoding="utf-8"?><roads></roads>';
				exit();
			}
		$query.=" order by ROAD_ID,NODEINDEX";
		$r=oci_parse($dbconn,$query);
		oci_execute($r,OCI_DEFAULT);
		echo get_Roadnet_xml($r);
		//return get_Roadnet_xml($r);
		oci_free_statement($r);
	}

function obtain_roadnet_xml_all() {
	$sql = "select * from node_info";
	$r=oci_parse($dbconn,$query);
	oci_execute($r,OCI_DEFAULT);
	return get_Roadnet_xml($r);
	}	
function get_Roadnet_xml($r) {
	$xml= '<?xml version="1.0" encoding="utf-8"?>
		   <roads>';
	$roadid=null;
	$roadname=null;

	while($row = oci_fetch_array($r,OCI_BOTH)) { 
	 	if($roadid==null||$roadid!=$row['ROAD_ID']){
		if($roadid!=null) {
			 $xml.= "</road>\n";
		 }
		 $xml.= "<road>\n";
		 $xml.= "<roadid>".$row['ROAD_ID']."</roadid>\n";
		 if( $row['ROADSTATUS']!=null)
		 $xml.= "<roadstatus>".$row['ROADSTATUS']."</roadstatus>\n";
		 else
		 $xml.= "<roadstatus>".'0'."</roadstatus>\n";
	 	}
		 $xml.= "<node>\n";
		 $xml.= "<nodeid>" . $row['NODEID'] . "</nodeid>\n";
		 $xml.= "<nodx>" . $row['NODEX'] . "</nodx>\n";
		 $xml.= "<nody>" . $row['NODEY'] . "</nody>\n";
		 $xml.= "<nodeindex>".$row['NODEINDEX']."</nodeindex>\n";
		 $xml.= "</node>\n";
		 if($roadid!=$row['ROAD_ID'])
		 $roadid=$row['ROAD_ID'];
		 }
		$xml.= "</road>\n";
		$xml.= "</roads>";
		return $xml;
	}
?>