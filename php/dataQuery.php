<?php
include('../conn.php');
$id = 0;
$year = "2013";
$month = "10";
$day = "12";
$date = $year."-".$month."-".$day;

$t_itv = 5;
$data_index = "tf";

$dis = array("tf"=>"t_tf_rs");


$date_from = $date." 00:00:00";
$date_to = $date." 23:59:59";
$sql = "select * from $dis[$data_index] where road_sec_id = $id and create_time between to_date('$date_from','yyyy-mm-dd hh24:mi:ss')  and to_date('$date_to','yyyy-mm-dd hh24:mi:ss') order by create_time;";

echo $sql;
?>