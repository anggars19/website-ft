<!DOCTYPE html>
<html>
<head>
 
</head>
<body>
<table border="0" cellpadding="0" cellspacing="0" style="width:700px">
	<tbody>
		<tr>
			<td>&nbsp;</td>
		</tr>		
		<tr>
			<td><strong>prestasi prodi <?= $data['prodi']['nama_prodi']; ?> tahun <?= $data['tahun']?></strong></td>
		</tr>
		<tr>
			<td>&nbsp;</td>
		</tr>					
		<tr>
			<td><hr></td>
		</tr>				
	</tbody>
</table>
<table border="1" cellpadding="5" cellspacing="0" style="width:700px">
    <thead>
             <tr>
                <td>no</td>
                <td>nama</td>
                <td>penyelenggara</td>
                <td>tanggal</td>
            </tr>
    </thead>
    <tbody>	
         <?php $no=0; foreach($prestasi as $tampil): $no++ ?>
        <tr>         
            <td><?= $no ?></td>
            <td><?= $tampil['nama_prestasi']?></td>
            <td><?= $tampil['penyelenggara']?></td>
            <td><?= $tampil['tanggal']?></td>        
        </tr>
        <?php endforeach;?>
    </tbody>
</table>
</body>
</html>
