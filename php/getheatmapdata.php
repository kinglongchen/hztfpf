<?php
header("content-type:application/json; charset=utf-8");
include('req.php');
$filename = "day.txt";
if ($qrytype=="day")
	$filename = "day.txt";
if ($qrytype=="month")
	$filename = "month.txt";
if ($qrytype=="year")
	$filename = "year.txt";

$filefullname = "C:\serverdata\heatmapdata\\".$filename;
$fp = fopen($filefullname,'r');
if($fp) {
	$contents = fread($fp,filesize($filefullname));
	fclose($fp);
	echo $contents;
	}
echo "";
?>