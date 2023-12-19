<?php 
//ob_start();
	foreach($berita as $tampil):
	// include 'a-top.php';		
	// include 'a-header.php';

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
<table border="0" cellpadding="0" cellspacing="0" style="width:700px">
	<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td><strong><?php echo $tampil['judul'];?></strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td><?php echo $dayList[$day].', '.$tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun.', '.date("G:i", strtotime($tampil['tgl_posting'])).' WIB, '.'Oleh: '.$tampil['penulis'];?></td>
		</tr>			
		<tr>
			<td><hr></td>
		</tr>		
		<tr>
			<td><?php echo $tampil['isi'];?></td>
		</tr>		
	</tbody>
</table>


</body>
</html>
<?php
// $html = ob_get_contents();
// ob_end_clean();
        
// require_once('assets/html2pdf/html2pdf.class.php');
// $pdf = new HTML2PDF('P','A4','en');
// $pdf->WriteHTML($html);
// $pdf->Output('Berita'.$tampil['judul'].'.pdf', 'D');
endforeach;
?>

