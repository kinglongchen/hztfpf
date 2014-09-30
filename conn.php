<?php
$dbconn = oci_connect("scott", "123456", '192.168.0.102');  
if(!$dbconn) 
{
     $e = oci_error();
    trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
} 
?>