<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
	include("application/views/template/admin/head.php"); 
	include("application/views/template/admin/left.php"); 


//pagging
$nama_halaman = $data['nama'];
$halaman = $data['halaman'];
$hal = $data['hal'];
$per_hal = $data['per_hal'];
$start = $data['start'];
?>
      <section id="main-content">
          <section class="wrapper">
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><strong><i class="fa fa-angle-right"></i> 
						<?php echo ($nama_halaman == 'galeri') ? 'Galeri' : (($nama_halaman == 'slide') ? 'Slide' :  ''); ?>
					</strong></h4>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
						    <div class="col-md-push-1">
									<a href=" <?php echo ($nama_halaman == 'galeri') ? base_url().'galeri/form_add/galeri' : 
                    (($nama_halaman == 'slide') ? base_url().'galeri/form_add/slide' : '');?>
                  "><button type="button" class="btn btn-primary">Tambah gambar</button></a>
						    </div>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
								<?php echo ($nama_halaman == 'galeri') ? '<th width="25%" >  <p align="center"  style="font-size:14px" >Judul Gambar</th>' : (($nama_halaman == 'slide') ? '' :  ''); ?>
															
								<th width="25%" >  <p align="center"  style="font-size:14px" >Nama Gambar</th>
								<th width="30%" >  <p align="center"  style="font-size:14px" >Fungsi</th>	
								<th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
									  <?php
										$offset=(($hal * $per_hal)-$per_hal);
										$n = $offset+1;
										if($nama_halaman == 'galeri'){
										foreach($galeri as $tampil):
										?>
									    <tr>
										  <td> <p align="center"  style="font-size:14px" > <?php echo $n?></a></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['judul']?></p></td>										  
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['file_name']?></p></td>
									      <td class="hidden-phone"><p   align="center"   style="font-size:14px" > <?php echo $tampil['fungsi']?></p></td> 
										  <td>
													 <div class="btn-group  col-md-offset-2">
														 <a type="button" class="btn btn-primary " href="form_edit/galeri/<?php echo $tampil['id_galeri']?>"> Ubah</a>
														 <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														 Hapus <span class="caret"></span>
														 <span class="sr-only">Toggle Dropdown</span>
														 </button>
															<ul class="dropdown-menu" role="menu">
																  <li><a href="delete/galeri/<?php echo $tampil['id_galeri']?>">Yes</a></li>
																  <li><a href="#">No</a></li>
															 </ul>
												  </div>
											     </td>	
									    </tr>
                                </tbody>
					<?php
			$n++;
										endforeach;}
										else if($nama_halaman == 'slide'){
										foreach($slide as $tampil):
    ?>
										    <tr>
										  <td> <p align="center"  style="font-size:14px" > <?php echo $n?></a></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['file_name']?></p></td>
									      <td class="hidden-phone"><p   align="center"   style="font-size:14px" > <?php echo $tampil['fungsi']?></p></td> 
										  <td>
													 <div class="btn-group  col-md-offset-2">
														 <a type="button" class="btn btn-primary " href="form_edit/slide/<?php echo $tampil['id_galeri']?>"> Ubah</a>
														 <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														 Hapus <span class="caret"></span>
														 <span class="sr-only">Toggle Dropdown</span>
														 </button>
															<ul class="dropdown-menu" role="menu">
																  <li><a href="delete/slide/<?php echo $tampil['id_galeri']?>">Yes</a></li>
																  <li><a href="#">No</a></li>
															 </ul>
												  </div>
											     </td>												 
									    </tr>
                                </tbody>
					<?php
			$n++;
		endforeach;}
    ?>
                        </table>
                      </div><!-- /content-panel -->
                  </div><!-- /col-md-12 -->
              </div><!-- /row -->
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                </div>
				
				 <div class="col-md-11 " align="center">

 <ul class="pagination  "  >
    <li>
  <a href="?hal=<?php echo $hal -1; ?>&page=berita" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><?php 
 
for($x=1;$x<=$halaman;$x++){
	?>
 <a href="?hal=<?php echo $x ;?>&page=berita"><?php echo $x ?></a>
	<?php
}
 
?></li>
  
    <li>
      <a href="?hal=<?php echo $hal +1;?>&page=berita"  aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>

</nav>

</div>
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
<?php 
include("application/views/template/admin/footer2.php"); 
} ?>
