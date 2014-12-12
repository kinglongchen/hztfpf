<?php 
	$dis = array("tf"=>"t_tf_rs","cs"=>"t_cs_rs","ci"=>"t_ci_rs","ct"=>"t_ct_rs","ts"=>"t_ts_rs");
	if (isset($_GET['din'])) {
		$din = $_GET['din'];
		$dbname = $dis[$din];
		}
		

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
	
	if (isset($_GET['hour']))
		$hour = $_GET['hour'];
	
	if (isset($_GET['minu']))
		$minu = $_GET['minu'];
	
	if (isset($_GET['sec']))
		$sec = $_GET['sec'];
	
	if (isset($_GET['prt']))
		$prt = $_GET['prt'];
	
	if (isset($_GET['ranknum']))
		$ranknum = $_GET['ranknum'];
		else
		$ranknum = 5;
?>