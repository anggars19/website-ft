<?php 
$db = new mysqli('192.168.200.9','webikip','80%IPM!web','website');
	//echo $db->connect_errno;
if ($db->connect_errno) 
{
	echo $db->connect_error;
	die('Ada kesalahan');
}
?>