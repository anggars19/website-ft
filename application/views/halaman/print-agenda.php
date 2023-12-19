<?php 
	foreach($agenda as $tampil):
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
	$tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
	$bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
	$bulan = $bln-1;
	$tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
$tgl_posting=$tampil['tgl_posting'];
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
<table border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>
		<tr>
			<td colspan="4"><strong><?php echo $tampil['judul'];?></strong></td>
		</tr>
		<tr>
			<td colspan="4">&nbsp;</td>
		</tr>	
		<tr>
			<td colspan="4"><?php echo $dayList[$day].', '.$tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.date("G:i", strtotime($tampil['tgl_posting'])).' WIB, '.'Oleh: '.$tampil['penulis'];?></td>
		</tr>		
		<tr>
			<td colspan="4"><hr></td>
		</tr>		
		<tr>
			<td>Penyelenggara</td>
			<td>:</td>
			<td><?php echo $tampil['penyelenggara']?></td>
		</tr>
		<tr>
			<td>Tempat</td>
			<td>:</td>
			<td><?php echo $tampil['tempat']?></td>
		</tr>
		<tr>
			<td>Kontak</td>
			<td>:&nbsp;</td>
			<td><?php echo $tampil['kontak']?></td>
		</tr>
		<tr>
			<td>Agenda</td>
			<td>:</td>
			<td><?php echo date("d F Y", strtotime($tampil['tgl_mulai'])).' s/d '. date("d F Y", strtotime($tampil['tgl_selesai']))?></td>
		</tr>
		<tr>
			<td>Waktu</td>
			<td>:</td>
			<td><?php echo $tampil['waktu']?></td>
		</tr>
	</tbody>
</table>

<p><?php echo $tampil['isi'];?></p>


</body>
</html>
<?php
endforeach;
?>

