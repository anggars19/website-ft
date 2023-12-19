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
                        <?php echo ($nama_halaman == 'galeri') ? 'Galeri' : (($nama_halaman == 'side') ? 'Slide' :  ''); ?>
                    </strong></h4>
                    </strong></h4>
                    <?php if($nama_halaman == 'galeri'){ 
                        foreach($galeri as $tampil): ?>
                    <?php echo form_open_multipart('galeri/edit/galeri', ['id' => 'updateForm']); ?>
						<div class="form-horizontal style-form" >
					  	   <!--hidden-->
                          <input type="hidden" class="form-control" name ="op" value="edit" required >	
                          <input type="hidden" class="form-control" name ="id_galeri" value="<?php echo $tampil['id_galeri'];?>" required >		 
						 <!--end-hidden-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" value="<?php echo $tampil['judul'];?>" placeholder="Judul" required >
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
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
                      <?php echo form_close(); endforeach; ?>
                      <?php }else if ($nama_halaman == 'slide'){ ?>
                      <?php foreach($slide as $tampil):
                        echo form_open_multipart(base_url().'galeri/edit/slide', ['id' => 'updateForm']); ?>
                        <div class="form-horizontal style-form" >
					  	   <!--hidden-->
                          <input type="hidden" class="form-control" name ="op" value="edit" required >	
                          <input type="hidden" class="form-control" name ="id_galeri" value="<?php echo $tampil['id_galeri'];?>" required >		 
						 <!--end-hidden-->
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" value ="<?php echo $tampil['gambar'];?>"> Maksimal 2 MB, Nama file : <?php echo $tampil['file_name'];?>
                                    <a></a>      
								</div>
                          </div>  
						   	<div class="form-group">
										<label  class="col-sm-2 control-label"> </label>
										<div class="col-sm-10">    
                                              <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                                        </div>
						</div>
					  </div>
                       <?php echo form_close(); endforeach;} ?>
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