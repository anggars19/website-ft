<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
	include("application/views/template/admin/head.php"); 
	include("application/views/template/admin/left.php"); 
//include ("koneksi.php"); 
?>

      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
              <div class="row">
                  <div class="col-lg-9 main-chart">
					<h4 align="center" style="color:#000;"><strong>Selamat Datang di Sistem Informasi Administrasi <br /> Website <?php echo ucwords($head['nama_prodi']);?><br /> Universitas PGRI Madiun</strong></h4>
                  	<div class="row mtbox">
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_news"></span>
					  			<h3><?= $berita->total?></h3>
                  			</div>
					  			<p style="color:#000;">Berita yang sudah ditampilkan.</p>
						</div>
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_megaphone"></span>
					  			<h3><h3><?= $pengumuman->total?></h3>
                  			</div>
					  			<p style="color:#000;">Pengumuman yang sudah ditampilkan.</p>
                  		</div>
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_calendar"></span>
					  			<h3><?= $agenda->total?></h3>
                  			</div>
					  			<p style="color:#000;">Agenda yang sudah ditampilkan.</p>
                  		</div>
                  		<div class="col-md-3 col-sm-2 box0">
                  			<div class="box1">
					  			<span class="li_photo"></span>
					  			<h3><h3><?= $galeri->total?></h3>
                  			</div>
					  			<p style="color:#000;">Photo Galeri yang sudah ditampilkan.</p>
                  		</div>
                  	</div><!-- /row mt -->	
                  </div><!-- /col-lg-9 END SECTION MIDDLE -->
                  
      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
		<?php include("application/views/template/admin/right.php"); 
		include("application/views/template/admin/footer.php"); 
}?>
