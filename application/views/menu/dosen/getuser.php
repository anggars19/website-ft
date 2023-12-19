<?php
 foreach($dosen as $tampil):
 ?>
   
 <div class="table-responsive">
 <div class="col-md-4" style="margin-top:10px;">
 <img src="<?php if($tampil['file_name'] !=''){ echo $tampil['gambar']; }else{ echo 'http://pics.unipma.ac.id/no_image.png'; }?>" style=" border: 1px solid #ddd;
    border-radius: 4px;
    padding: 5px;
    width: 100%;" />
 </div>
 <div class="col-md-8" style="margin-top:10px;">
 <table class="table table-striped table-bordered">
 <tr>
 <th>NIP/NIDN</th>
 <td><?php echo $tampil['nip']; ?></td>
 </tr>
 <tr>
 <th>Nama</th>
 <td><?php echo $tampil['gelar_depan']; ?> <?php echo $tampil['nama']; ?><?php if($tampil['gelar_belakang']){echo ', ';} echo $tampil['gelar_belakang']; ?></td>
 </tr>
 <tr>
 <th>Jabatan Akademik</th>
 <td><?php echo $tampil['fungsional']; ?></td>
 </tr>
 <tr>
 <th>Pendidikan</th>
 <td><?php echo $tampil['pend']; ?></td>
 </tr>
 <tr>
 <th>Bidang Keahlian</th>
 <td><?php echo $tampil['keahlian']; ?></td>
 </tr>
 </table>
 </div>  
 </div>
   
 <?php    
endforeach; ?>