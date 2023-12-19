<?php 
//atur id website prodi
$id_prodi='f5';
$id_fakultas='5';
$id_biro='0';
$id_sij=517;
$kode_fakultas='05';
$db = new mysqli('localhost','anggasap_ft','11223344','anggasap_ft');
	//echo $db->connect_errno;
if ($db->connect_errno) 
{
	echo $db->connect_error;
	die('Ada kesalahan');
}

?>