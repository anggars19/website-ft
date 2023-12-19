<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
  include("application/views/template/admin/head.php"); 
  include("application/views/template/admin/left.php"); 
 ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <h4 class="mb">
                    <strong><i class="fa fa-angle-right"></i>
                    Kontak
                    </strong>
                </h4>
                <?php
                foreach($kontak as $tampil):
                    echo form_open_multipart(base_url().'pengaturan/edit/kontak', ['id' => 'updateForm']);
                ?>
                <div class="form-horizontal style-form">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Alamat</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="alamat"  value ="<?php echo $tampil['alamat'];?>" placeholder="Alamat" required >
                        </div>
                    </div>  
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Telepon</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="telepon"  value ="<?php echo $tampil['telepon'];?>"  placeholder="Telepon" required >
                        </div>
                    </div> 
	                <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Faksimile</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="faksimile"  value ="<?php echo $tampil['faksimile'];?>"  placeholder="Faksimile" required >
                        </div>
                    </div> 	
	                <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Email</label>
                        <div class="col-sm-10">
                            <input type="email" class="form-control" name="email"  value ="<?php echo $tampil['email'];?>"  placeholder="Email" required >
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
            </div>
        </div>
    </section>
</section>


<?php
  include("application/views/template/admin/footer2.php"); 
};
?>