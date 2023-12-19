<?php 
foreach($pengumuman as $res):
 ?>
<html>
<head>
<?php foreach($header as $head):?>
  <title>Berita <?php echo $head['nama_prodi'];?></title>
  <?php endforeach;?>
</head>
<body>
<?php
	$BulanIndo = array("Januari", "Februari", "Maret", "April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
	$tahun = substr($res['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
	$bln = substr($res['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
	$bulan = $bln-1;
	$tgl   = substr($res['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
$tgl_posting=$res['tgl_posting'];
$day = date('D', strtotime($tgl_posting));
$dayList = array(
	'Sun' => 'Minggu',
	'Mon' => 'Senin',
	'Tue' => 'Selasa',
	'Wed' => 'Rabu',
	'Thu' => 'Kamis',
	'Fri' => 'Jumat',
	'Sat' => 'Sabtu'
);
?>
<table border="0" cellpadding="0" cellspacing="0" style="width:500px">
	<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td><strong><?php echo $res['judul'];?></strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td><?php echo $dayList[$day].', '.$tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.date("G:i", strtotime($res['tgl_posting'])).' WIB, '.'Oleh: '.$res['penulis'];?></td>
		</tr>			
		<tr>
			<td><hr></td>
		</tr>		
		<tr>
			<td><?php echo $res['isi'];?></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>			
		<tr>
			<td><a href="<?php echo $res['gambar'];?>" target="_blank"><p style="color:black;background-color:#39b5c7;"> UNDUH DISINI</p></a></td>
		</tr>		
	</tbody>
</table>

</body>
</html>
<?php
endforeach;
?>

