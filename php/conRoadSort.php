<?php
	header("content-type:application/json; charset=utf-8");
	include('rindex.php');
	include('req.php');
	$zindex = new ZoneIndex();
	if ($timetype == "day")
		echo json_encode($zindex->day_ConRoad_Rank($id,$year,$month,$day),JSON_UNESCAPED_UNICODE);
	if ($timetype == "month")
		echo json_encode($zindex->month_ConRoad_Rank($id,$year,$month),JSON_UNESCAPED_UNICODE);
	if ($timetype == "year")
		echo json_encode($zindex->year_ConRoad_Rank($id,$year),JSON_UNESCAPED_UNICODE);
?>