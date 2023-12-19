<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
	?>
	<?php 
	exit;
	}
    include("application/views/template/admin/head.php"); 
	include("application/views/template/admin/left.php"); 

        //pagging
    $nama_halaman = $data['nama'];
    $halaman = $data['halaman'];
    $hal = $data['hal'];
    $per_hal = $data['per_hal'];
    $start = $data['start'];
?>


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
   <section id="main-content">
          <section class="wrapper">
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><strong><i class="fa fa-angle-right"></i> Prestasi</strong></h4>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
						    <div class="col-md-push-1">
									<a href="<?php echo base_url().'admin/prestasi/form_add'?>"><button type="button" class="btn btn-primary">Tambah data</button></a>
						    </div>
	                  	  	  <hr>
                              <thead>
                              <tr>
                                <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
								<th width="30%" >  <p align="center"  style="font-size:14px" >Prestasi</th>
								<th width="30%" >  <p align="center"  style="font-size:14px" >Penyelenggara</th>	
								<th width="15%" >  <p align="center"  style="font-size:14px" >Tanggal</th>	
								<th width="20%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                              </tr>
                              </thead>
                              <tbody>
									  <?php
										$offset=(($hal * $per_hal)-$per_hal);
										$n = $offset+1;
										foreach($prestasi as $tampil):
										?>
									    <tr>
										  <td> <p align="center"  style="font-size:14px" > <?php echo $n?></a></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['nama_prestasi']?></p></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['penyelenggara']?></p></td>
										  <td class="hidden-phone" align="center"><p style="font-size:14px" > <?php echo $tampil['tanggal']?></p></td>					   
										 <td>
												     <div class="btn-group  col-md-offset-2">
														 <a type="button" class="btn btn-primary " href="<?= base_url();?>admin/prestasi/form_edit/<?php echo $tampil['id_prestasi']?>"> Ubah</a>
														 <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
														 Hapus <span class="caret"></span>
														 <span class="sr-only">Toggle Dropdown</span>
														 </button>
															<ul class="dropdown-menu" role="menu">
																  <li><a href="<?= base_url();?>admin/prestasi/delete/<?php echo $tampil['id_prestasi']?>">Yes</a></li>
																  <li><a href="#">No</a></li>
															 </ul>
												  </div>
											     </td>
									    </tr>
                                </tbody>
					<?php
			$n++;
                                        endforeach;
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
  <a href="?hal=<?php echo $hal -1; ?>&page=prestasi" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>
    <li><?php 
 
for($x=1;$x<=$halaman;$x++){
	?>
 <a href="?hal=<?php echo $x ;?>&page=prestasi"><?php echo $x ?></a>
	<?php
}
 
?></li>
  
    <li>
      <a href="?hal=<?php echo $hal +1;?>&page=prestasi"  aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>

</nav>

</div>
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
		<?php include("application/views/template/admin/footer2.php");  ?>
