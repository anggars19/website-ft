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
                        <?php echo ($nama_halaman == 'galeri') ? 'Galeri' : (($nama_halaman == 'side') ? 'Slide' :  ''); ?>
                    </strong></h4>
                    <?php if($nama_halaman == 'galeri'){ ?>
                    <?php echo form_open_multipart('galeri/add/galeri', ['id' => 'updateForm']); ?>
						<div class="form-horizontal style-form" >
					  	   <!--hidden-->
						<input type="hidden" name="op" value="simpan"/>
						 <!--end-hidden-->
                          <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Judul</label>
                              <div class="col-sm-10">
                                  <input type="text" class="form-control" name="judul" placeholder="Judul" required >
                              </div>
                          </div>						 
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" required> Maksimal 2 MB
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
                      <?php echo form_close(); 
                             }else if ($nama_halaman == 'slide'){ ?>
                        <?php echo form_open_multipart('galeri/add/slide', ['id' => 'updateForm']); ?>	
						<div class="form-horizontal style-form" >
					  	   <!--hidden-->
						<input type="hidden" name="op" value="simpan"/>
						 <!--end-hidden-->
  						  <div class="form-group">
                              <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Gambar</label>
								<div class="col-sm-10" class="btn btn-primary"  > 
									<input type="file"  name="data_upload" required> Maksimal 2 MB
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
                        <?php echo form_close();} ?>
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