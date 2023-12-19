<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
    include("application/views/template/admin/head.php"); 
    include("application/views/template/admin/left.php"); 
    $nama_halaman = $data['nama'];
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
                  	  <h4 class="mb"><strong><i class="fa fa-angle-right"></i> 
                        <?php echo ($nama_halaman == 'berita') ? 'Berita' : 
                     (($nama_halaman == 'pengumuman') ? 'Pengumuman' : (($nama_halaman == 'agenda') ? 'Agenda' : '')); ?>
                    </strong></h4>

                    <?php if($nama_halaman == 'berita'){ ?>
                    <?php echo form_open_multipart('informasi/add/berita', ['id' => 'updateForm']); ?>			
					<div class="form-horizontal style-form" action="" method=""  >
                          <input type="hidden" class="form-control" name = "op" value="simpan" required >		
					
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" placeholder="Judul" required >
                              </div>
                          </div>			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi Berita</label>
                              <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi berita" required>		
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>						  
                              </div>
                          </div>	    
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" > Maksimal 2 MB
									<a></a>      
								</div>
                          </div>  
					       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" name="penulis" class="form-control" placeholder="Penulis" required >
                              </div>
                          </div>						  
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control" placeholder="Penulis" value="<?php  echo $_SESSION['userlogin'] ?>" readonly >
                              </div>
                          </div>
						  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit"  name="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  <?php echo form_close(); ?>
                      <?php }else if ($nama_halaman == 'pengumuman'){ ?>
                        <?php echo form_open_multipart('informasi/add/pengumuman', ['id' => 'updateForm']); ?>	
                        <div class="form-horizontal style-form">
                          <input type="hidden" class="form-control" name = "op" value="simpan" required >							
					
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "judul" placeholder="Judul" required >
                              </div>
                          </div>			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi pengumuman</label>
                              <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi pengumuman" required>		
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>
						  
                              </div>
                          </div>	    
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" > Maksimal 2 MB
									<a></a>      
								</div>
                          </div> 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="penulis" placeholder="Penulis" required >
                              </div>
                          </div>						  
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control"  value = " <?php  echo $_SESSION['userlogin'] ?>" readonly >
                              </div>
                          </div>
						  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit"  name="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <?php echo form_close(); ?>
                      <?php }else if ($nama_halaman == 'agenda'){ ?>
                        <?php echo form_open_multipart('informasi/add/agenda', ['id' => 'updateForm']); ?>
                        <div class="form-horizontal style-form">
                          <input type="hidden" class="form-control" name = "op" value="simpan" required >							
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "judul" placeholder="Judul" required >
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penyelenggara</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" required >
                              </div>
                          </div>
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Tempat</label>
                              <div class="col-sm-10">
                                  <input type="text" name="tempat" class="form-control" placeholder="tempat" required >
                              </div>
                          </div>						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Kontak</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="kontak" placeholder="Kontak" required >
                              </div>
                          </div>	
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Mulai </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="mulai"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Selesai </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="selesai"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Waktu</label>
                              <div class="col-sm-10">
                                  <input type="text" name="waktu_mulai" class="form-control" placeholder="00:00 s/d 00:00" required >
                              </div>
                          </div>		
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi agenda</label>
                              
							  <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" required>		
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>
						  
                              </div>
                          </div>	     
							
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" > Maksimal 2 MB
									<a></a>      
								</div>
                          </div> 
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" name="penulis" class="form-control" placeholder="Penulis" required >
                              </div>
                          </div>							  
						   	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 						  
						     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control" value ="<?php echo $_SESSION['userlogin'] ;?>" readonly  >
                              </div>
                          </div>
						  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit"  name="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </d>
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                        <?php echo form_close(); } ?>
                </div>
			</div>
	
<?php
 include("application/views/template/admin/footer2.php"); 
};
?>