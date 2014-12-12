<?php
	header("content-type:application/json; charset=utf-8");
	include('rindex.php');
	include('req.php');
	$zindex = new ZoneIndex();
	if ($timetype == "day")
		echo json_encode($zindex->day_ConRoad_query($id,$year,$month,$day));
	if ($timetype == "month")
		echo json_encode($zindex->month_ConRoad_query($id,$year,$month));
	if ($timetype == "year")
		echo json_encode($zindex->year_ConRoad_query($id,$year));
	
	
?>