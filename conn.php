<?php
$dbconn = oci_connect("scott", "123456", '192.168.0.117');
//$dbconn = oci_connect("system", "123456", '192.168.1.117');  
//$dbconn = oci_connect("system", "12345678", '192.168.1.113:1521/orcl');  
if(!$dbconn) 
{
    $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} 
?>