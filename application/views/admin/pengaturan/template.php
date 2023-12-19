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
                    Template
                    </strong>
                </h4>
                <?php
                foreach($template as $tampil):
                    //pecah link journal dan prosiding
                    $link =$tampil['color_navbar'];
                    //pecah string berdasarkan string ";" 
                    $pecah = explode(";", $link);
                    //mencari element array 0
                    $navbar = $pecah[0];
                    $font_hover = $pecah[1];
                    $garis_bawah_menu = $pecah[2];
                    $warna_font = $pecah[3];
                    echo form_open_multipart(base_url().'pengaturan/edit/template', ['id' => 'updateForm']);
                ?>
                <div class="form-horizontal style-form">
                    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Color Topbar </label>
                        <div class="col-sm-10">
                            <input type="color" name="topbar" class="form-control"  value="<?php echo $tampil['color_topbar'];?>" readonly >
                        </div>
                    </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Color Navbar </label>
                        <div class="col-sm-10">
                            <input type="color" name="navbar" class="form-control" value="<?php echo $navbar;?>" readonly >
                        </div>
                    </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Font Hover </label>
                        <div class="col-sm-10">
                            <input type="color" name="font_hover" class="form-control" value="<?php echo $font_hover;?>" readonly >
                        </div>
                    </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Garis bawah menu </label>
                        <div class="col-sm-10">
                            <input type="color" name="garis_bawah_menu" class="form-control" value="<?php echo $garis_bawah_menu;?>" readonly >
                        </div>
                    </div>						  
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Warna Font </label>
                        <div class="col-sm-10">
                            <input type="color" name="warna_font" class="form-control"  value="<?php echo $warna_font;?>" readonly >
                        </div>
                    </div>
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Color Footer </label>
                        <div class="col-sm-10">
                                <input type="color" name="footer" class="form-control"  value="<?php echo $tampil['color_footer'];?>" readonly >
                        </div>
                    </div>					  
				    <div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Nama Website</label>
                        <div class="col-sm-10">
                            <textarea name="nama"  rows="6" class="ckeditor"   tabindex="4" placeholder="Isi berita" required>		
						     <?php echo $tampil['logo_navbar'];?>
						    </textarea>
                        </div>
                    </div>								
					<div class="form-group">
                        <label class="col-sm-2 col-sm-2 control-label" style="color:#000; font-size:16px">Backgraund</label>
                        <div class="col-sm-10">
							<input type="file"  name="data_upload" > Maksimal 2 MB <?php echo $tampil['background'];?>
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