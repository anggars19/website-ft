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
				  	<?php
						echo ($nama_halaman == 'kurikulum') ? 'Kurikulum' :
							(($nama_halaman == 'penjaminanmutu') ? 'Penjaminan Mutu' :
							(($nama_halaman == 'publikasi') ? 'Publikasi' :
							(($nama_halaman == 'prestasi') ? 'Prestasi' : '')));
					?>

					</strong></h4>
						<?php		
						if($nama_halaman == 'kurikulum'){
							foreach($kurikulum as $tampil):
								echo form_open_multipart(base_url().'akademik/edit/kurikulum', ['id' => 'updateForm']);
						?>
							<div class="form-horizontal style-form">
							<!--hidden-->	 
							<input type="hidden" class="form-control" name="op" value="edit">
							<input type="hidden" class="form-control" name ="id_list" value="<?php echo $tampil['id_list'];?>" required >		 
							<!--end-hidden-->
		
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi kurikulum</label>
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
								<div class="form-group" >
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value = "<?php echo $tampil['tgl_posting'];?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
								</div>
							</div> 
								<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
								<div class="col-sm-10">
									<input type="text" name="user" class="form-control" value="<?php  echo $_SESSION['userlogin'];?>" readonly >
								</div>
							</div>
							<div class="form-group">
											<label  class="col-sm-2 control-label"> </label>
											<div class="col-sm-10">    
												<button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
											</div>
							</div>
						</div>
					  <?php 
						 echo form_close(); endforeach;  
							}else if($nama_halaman == 'penjaminanmutu'){
								foreach($penjaminanmutu as $tampil):
									echo form_open_multipart(base_url().'akademik/edit/penjaminanmutu', ['id' => 'updateForm']);
					  ?>
					  <div class="form-horizontal style-form" >
					  		<input type="hidden" class="form-control" name="op" value="edit">
							<input type="hidden" class="form-control" name ="id_list" value="<?php echo $tampil['id_list'];?>" required >
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi</label>
								<div class="col-sm-10">
									<textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi agenda" required>		
									<?php echo $tampil['isi'];?>
									</textarea>
								<p class="help-block" style="font-size:16px;">* Agar tampilan lebih maksimal, disarankan mengganti font dengan Arial, dan tidak menggunakan Italic (huruf miring).</p>						  						  
								</div>
							</div>	  
								<div class="form-group" >
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value ="<?php echo date('Y-m-d'); ?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
								</div>
							</div> 
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
								<div class="col-sm-10">
									<input type="text" name="user" class="form-control" placeholder="User" value="<?php  echo $_SESSION['userlogin']; ?>" readonly >
								</div>
							</div>
							<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
												<button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
										</div>
							</div>
					</div>
					<?php 
						 echo form_close(); endforeach;  
							}else if($nama_halaman == 'publikasi'){
								foreach($publikasi as $tampil):
									echo form_open_multipart(base_url().'akademik/edit/publikasi', ['id' => 'updateForm']);
									$link =$tampil['gambar'];
									//pecah string berdasarkan string ";" 
									$pecah = explode(";", $link);
									//mencari element array 0
									$journal = $pecah[0];
									//$prosiding = $pecah[1];
					 ?>
						<div class="form-horizontal style-form" >
							<input type="hidden" class="form-control" name="op" value="edit">
							<input type="hidden" class="form-control" name ="id_list" value="<?php echo $tampil['id_list'];?>" required >
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Isi</label>
								<div class="col-sm-10">
									<textarea name="isi"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi agenda" required>		
									<?php echo $tampil['isi'];?>
									</textarea>
								</div>
							</div>
							<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Link Journal</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name ="journal" value="<?php echo $journal?>" placeholder="Link Journal" required >
								</div>
							</div>	
							<!-- <div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Link Prosiding</label>
								<div class="col-sm-10">
									<input type="text" class="form-control" name ="prosiding" value="<?php echo $prosiding?>" placeholder="Link Prosiding"  >
											<p class="help-block" style="color:#6f6f6f; font-size:14px">Tidak perlu di isi, jika belum memiliki web prosiding. </p>							  
								</div>
							</div>						   -->
								<div class="form-group" >
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
								<div class="col-sm-10">
									<input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value ="<?php echo $tampil['tgl_posting']; ?>"   class="form-control"  id="dp7" placeholder="Penulis" required >
								</div>
							</div>
								<div class="form-group">
								<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
								<div class="col-sm-10">
									<input type="text" name="user" class="form-control" placeholder="Penulis" value ="<?php  echo $_SESSION['userlogin']; ?>" readonly >
								</div>
							</div>
							<div class="form-group">
											<label  class="col-sm-2 control-label"> </label>
											<div class="col-sm-10">    
												<button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
											</div>
							</div>
					  </div>
					  <?php 
						 echo form_close(); endforeach;  
							}else if($nama_halaman == 'prestasi'){
								foreach($prestasi as $tampil):
									echo form_open_multipart(base_url().'admin/prestasi/edit', ['id' => 'updateForm']);
					  ?>
							<div class="form-horizontal style-form" >
								<input type="hidden" class="form-control" name="op" value="edit" required >					
								<input type="hidden" class="form-control" name="id_prestasi" value = "<?php echo  $tampil['id_prestasi']?>">
								
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Prestasi</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="nama" value="<?php echo $tampil['nama_prestasi']?>" placeholder="Nama Prestasi" required >
									</div>
								</div>			  
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penyelenggara</label>
									<div class="col-sm-10">
										<input type="text" class="form-control" name="penyelenggara" value="<?php echo $tampil['penyelenggara']?>" placeholder="Penyelenggara" required >
									</div>
								</div>	    
								<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Bukti</label>
										<div class="col-sm-10" class="btn btn-primary"  > 
											<input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
											<a></a>      
										</div>
								</div>  						  
									<div class="form-group" >
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Posting</label>
									<div class="col-sm-10">
										<input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo $tampil['tanggal']?>" class="form-control"  id="dp7" placeholder="Penulis" required >
									</div>
								</div> 
									<div class="form-group" >
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Prestasi</label>
									<div class="col-sm-10">
										<input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tanggal_prestasi"  value="<?php echo $tampil['tanggal_prestasi']?>" class="form-control"  id="dp7" placeholder="Penulis" required >
									</div>
								</div> 						  
									<div class="form-group">
									<label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">User</label>
									<div class="col-sm-10">
										<input type="text" name="user" class="form-control"  value ="<?php  echo $_SESSION['userlogin'] ?>" readonly >
									</div>
								</div>
									<div class="form-group">
												<label  class="col-sm-2 control-label"> </label>
												<div class="col-sm-10">    
													<button type="submit"  name="button" class="btn btn-info">Simpan </button>
												</div>
								</div>
							</div>
					<?php echo form_close(); endforeach;} ?>
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                </div>
			</div>
	
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
<?php 
 include("application/views/template/admin/footer2.php"); 
} ?>
