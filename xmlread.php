<?php 
$xml_array=simplexml_load_file('Mode.xml'); //将XML中的数据,读取到数组对象中 
foreach($xml_array as $tmp){ 
echo $tmp->modeNum; 
} 
?>

