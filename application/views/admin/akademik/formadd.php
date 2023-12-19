<?php
if ($this->session->userdata('userlogin')  == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
    include("application/views/template/admin/head.php"); 
    include("application/views/template/admin/left.php"); 
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
                  	  <h4 class="mb"><strong><i class="fa fa-angle-right"></i> Prestasi </strong></h4>	
                        <?php echo form_open_multipart(base_url().'admin/prestasi/add', ['id' => 'updateForm']); ?>	
                        <div class="form-horizontal" >
                            <input type="hidden" class="form-control" name="op" value="simpan" required >		
                        
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Prestasi</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Prestasi" required >
                                </div>
                            </div>			  
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Penyelenggara</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="penyelenggara" placeholder="Penyelenggara" required >
                                </div>
                            </div>	    
                            <div class="form-group">
                                <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Bukti</label>
                                    <div class="col-sm-10" class="btn btn-primary"  > 
                                        <input type="file"  name="data_upload" > Maksimal 2 MB
                                        <a></a>      
                                    </div>
                            </div>  						  
                                <div class="form-group" >
                                <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal  Posting</label>
                                <div class="col-sm-10">
                                    <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tgl_posting"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
                                </div>
                            </div> 
                                <div class="form-group" >
                                <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px" for="dp7">Tanggal Prestasi</label>
                                <div class="col-sm-10">
                                    <input class="input date form_date " data-date="" data-date-format="yyyy-mm-dd"  name="tanggal_prestasi"  value="<?php echo  date ('Y-m-d');?>" class="form-control"  id="dp7" placeholder="Penulis" required >
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
                        <?php echo form_close(); ?>
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                </div>
			</div>
	
<?php
 include("application/views/template/admin/footer2.php"); 
};
?>