<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
    include("application/views/template/admin/head.php"); 
    include("application/views/template/admin/left.php"); 
    $nama_halaman = $data['nama'];
    $op="edit";
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
                    <?php  foreach($berita as $tampil):
                    echo form_open_multipart(base_url().'informasi/edit/berita', ['id' => 'updateForm']); ?>			
					<div class="form-horizontal style-form">
					  	   <!--hidden-->	 
                          <input type="hidden" class="form-control" name ="op" value="edit" required >		
				          <input type="hidden" class="form-control" name = "id_berita" value = "<?php echo  $tampil['id_berita'];?>">
						  <input type="hidden" class="form-control" name = "e_idprodi" value="<?php echo $tampil['id_prodi'];?>" required >
						  <input type="hidden" class="form-control" name = "e_idfakultas" value="<?php echo $tampil['id_fakultas'];?>" required > 						  
						 <!--end-hidden-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "judul"  value = "<?php echo  $tampil['judul'];?>" placeholder="Judul" required >
                              </div>
                          </div>			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi Berita</label>
                              <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi berita" required>		
								 <?php echo  $tampil['isi'];?>
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>
						  
                              </div>
                          </div>	    
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
									<a></a>      
								</div>
                          </div>  
					       <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" name="penulis" value = "<?php echo  $tampil['penulis']; ?>"   class="form-control" placeholder="Penulis" required >
                              </div>
                          </div>						  
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value = "<?php echo  $tampil['tgl_posting']; ?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control" placeholder="Penulis" value ="<?php echo  $tampil['user'];?>" readonly >
                              </div>
                          </div>
						  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit" name="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
                      <?php echo form_close(); endforeach; ?>
                      <?php }else if ($nama_halaman == 'pengumuman'){ ?>
                      <?php foreach($pengumuman as $tampil):
                        echo form_open_multipart(base_url().'informasi/edit/pengumuman', ['id' => 'updateForm']); ?>
                    <div class="form-horizontal style-form" >
					  	   <!--hidden-->	 
                    <input type="hidden" class="form-control" name ="op" value="edit" required >		
					<input type="hidden" class="form-control" name = "id_pengumuman" value ="<?php echo $tampil['id_pengumuman']?>">
					<input type="hidden" class="form-control" name = "e_idprodi" value="<?php echo $tampil['id_prodi'];?>" required >
					<input type="hidden" class="form-control" name = "e_idfakultas" value="<?php echo $tampil['id_fakultas'];?>" required > 					
						 <!--end-hidden-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name = "judul"  value ="<?php echo  $tampil['judul']; ?>" placeholder="Judul" required >
                              </div>
                          </div>			  
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi pengumuman</label>
                              <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi berita" required>		
								 <?php echo  $tampil['isi'];?>
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>
						  
                              </div>
                          </div>	    
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
									<a></a>      
								</div>
                          </div>
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name ="penulis"  value ="<?php echo $tampil['penulis']; ?>" placeholder="Penulis" required >
                              </div>
                          </div>						  
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  $tampil['tgl_posting'];?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						     <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
                              <div class="col-sm-10">
                                  <input type="text" name="user" class="form-control" placeholder="Penulis" value="<?php echo  $tampil['user'];?>" readonly >
                              </div>
                          </div>
						  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit"  name="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
                      <?php echo form_close(); endforeach;  ?>
                    <?php }else if ($nama_halaman == 'agenda'){ ?>
                    <?php  foreach($agenda as $tampil):
                        echo form_open_multipart(base_url().'informasi/edit/agenda', ['id' => 'updateForm']);?>
                    <div class="form-horizontal style-form">
                          <input type="hidden" class="form-control" name = "op" value="edit" required >		
                          <input type="hidden" class="form-control" name = "id_agenda" value="<?php echo $tampil['id_agenda'];?>" required >
						  <input type="hidden" class="form-control" name = "e_idprodi" value="<?php echo $tampil['id_prodi'];?>" required >
						  <input type="hidden" class="form-control" name = "e_idfakultas" value="<?php echo $tampil['id_fakultas'];?>" required > 
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" value="<?php echo $tampil['judul'];?>" placeholder="Judul" required >
                              </div>
                          </div>	
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penyelenggara</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="penyelenggara" value="<?php echo $tampil['penyelenggara'];?>" placeholder="Penyelenggara" required >
                              </div>
                          </div>
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Tempat</label>
                              <div class="col-sm-10">
                                  <input type="text" name="tempat" class="form-control" value="<?php echo $tampil['tempat'];?>" placeholder="tempat" required >
                              </div>
                          </div>						  
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Kontak</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="kontak" value="<?php echo $tampil['kontak'];?>" placeholder="Kontak" required >
                              </div>
                          </div>	
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Mulai </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="mulai"  value="<?php echo $tampil['tgl_mulai'];?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						  	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Selesai </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="selesai"  value="<?php echo $tampil['tgl_selesai'];?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                              </div>
                          </div> 
						    <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Waktu</label>
                              <div class="col-sm-10">
                                  <input type="text" name="waktu_mulai" class="form-control" value="<?php echo $tampil['waktu'];?>" placeholder="00:00 s/d 00:00" required >
                              </div>
                          </div>		
						<div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi agenda</label>
                              <div class="col-sm-10">
                                   <textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi agenda" required>	
									<?php echo $tampil['isi'];?>						   
						  </textarea>
							  <p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>						  
                              </div>
                          </div>	        						  
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
									<a></a>      
								</div>
                          </div> 
						   <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penulis</label>
                              <div class="col-sm-10">
                                  <input type="text" name="penulis" class="form-control"  value="<?php echo $tampil['penulis'];?>" placeholder="Penulis" required >
                              </div>
                          </div>							  
						   	<div class="form-group" >
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting </label>
                              <div class="col-sm-10">
                                  <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"   value="<?php echo $tampil['tgl_posting'];?>"  class="form-control"  id="dp7" placeholder="Penulis" required >
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
					  </div>
                    <?php  echo form_close(); endforeach; }?>
                        
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                </div>
			</div>
	
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
<?php
 include("application/views/template/admin/footer2.php"); 
};
?>