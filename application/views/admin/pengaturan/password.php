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
                    Ganti Password
                    </strong>
                </h4>
                <?php
                    echo form_open_multipart(base_url().'pengaturan/edit/password', ['id' => 'updateForm']);
                ?>
                <div class="form-horizontal style-form">
                    <?php  foreach($user as $tampil):?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Username</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" name="username"  value ="<?php echo $tampil['username'];?>" placeholder="Username" required >
                        </div>
                    </div> 
                    <?php echo form_close(); endforeach; ?>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Password Lama</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass"  placeholder="Password Lama" required >
                        </div>
                    </div> 
                    <hr>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Password Baru</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass2"  value ="" placeholder="Password Baru" required >
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Ulangi Password</label>
                        <div class="col-sm-10">
                            <input type="password" class="form-control" name="pass3"  value ="" placeholder="Ulangi Password" required >
                        </div>
                    </div> 
                    <div class="form-group">
					    <label  class="col-sm-2 control-label"> </label>
						<div class="col-sm-10">    
                            <button type="submit" name="button" id="button" class="btn btn-info">Simpan </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<?php
  include("application/views/template/admin/footer2.php"); 
};
?>