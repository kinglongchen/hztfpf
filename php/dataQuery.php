<?php
header("content-type:application/json; charset=utf-8");
include('rindex.php');
if (isset($_GET['din']))
	$din = $_GET['din'];

if (isset($_GET['qrytype']))
	$qrytype = $_GET['qrytype'];

if (isset($_GET['timetype']))
	$timetype = $_GET['timetype'];

if (isset($_GET['year']))
	$year = $_GET['year'];

if (isset($_GET['month']))
	$month = $_GET['month'];

if (isset($_GET['day']))
	$day = $_GET['day'];


if (isset($_GET['t_itv']))
	$t_itv = $_GET['t_itv'];

if (isset($_GET['id']))
	$id = $_GET['id'];



if ($qrytype == 'road') {
	$rindex = new RoadIndex();
	if ($timetype == 'year') {
		
		echo json_encode($rindex->year_query($din,$id,$year));
	}

	if ($timetype == 'month') {
		echo json_encode($rindex->month_query($din,$id,$year,$month));
	}

	if ($timetype == 'day') {
		echo json_encode($rindex->day_query($din,$id,$year,$month,$day,$t_itv));
	}
	
	if ($timetype == 'all') {
		if ($din == 'ts') {
				echo json_encode($rindex->state_query($id,$year,$month,$day));
			}
		
	}
	
	}
if ($qrytype=='zone') {
		$zindex = new ZoneIndex();
		if($timetype=='day') {
				if ($din == 'ts') {
						echo json_encode($zindex->state_day_query($id,$year,$month,$day));
					} else {
						echo json_encode($zindex->day_query($din,$id,$year,$month,$day,$t_itv));
						}
			}
		
		if($timetype=='month') {
				if ($din == 'ts') {
						echo json_encode($zindex->state_month_query($id,$year,$month));
					} else {
						echo json_encode($zindex->month_query($din,$id,$year,$month));
						}
			}
		
		if($timetype=='year') {
				if ($din == 'ts') {
						echo json_encode($zindex->state_year_query($id,$year));
					} else {
						echo json_encode($zindex->year_query($din,$id,$year));
						}
			}
		
	}

?>