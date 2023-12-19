<?php
include('template/top.php');
//echo base_url();
//include ("top.php"); 	
?>
    
    <!-- CSS Lightbox -->

<body style="background: url('<?php echo $template['background'];?>');no-repeat;
background-size: 100% 100%;
background-attachment:fixed;" >
    <!-- Full Body Container -->
    <div id="container" class="boxed-page">
        <!-- Start Header Section --> 
      <?php include('template/header.php'); ?>
        <!-- End Header Section -->
        <!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="page-content">
					<div class="row">
                    	<div class="col-md-12" align="justify"> 
							<!-- Start Touch Slider --><br /><br />
							<div class="touch-slider" data-slider-navigation="true" data-slider-pagination="true">
							<?php foreach ($slide as $item) : ?>
								<div class="ratio1 img-thumbnail img-responsive " alt="<?php echo $item->judul?>" style="background-image:url('<?php echo $item->gambar ?>')"></div>
								<?php endforeach; ?>
							</div>
							<!-- End Touch Slider -->
						</div>

						<div class="col-md-12" align="justify">
							<div class="recent-projects">
								<h3 class="classic-title "><a href="daftar_berita"><span class="fa fa-bookmark"> Berita</span></a></h3>
								<div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="5">
								<?php
									 foreach ($berita as $tampil) :
												
										
									$BulanIndo = array("Jan", "Peb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nop", "Des");
									$tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
									$bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
									$bulan = $bln-1;
									$tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
									$id = $tampil['id_berita'];
									$judul = $tampil['judul'];
									$title=$tampil['judul'];
									$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
									$link = 'berita/'.$id.'/'.$slug.'';											
								?>
								<div class="portfolio-item item">
								<div class="portfolio-border">
								<div class="portfolio-thumb">
									<div class="thumb-overlay"></div>
									<div class="ratio img-thumbnail img-responsive " alt="<?php echo $tampil['judul'];?>" style="background-image:url('<?php if($tampil['gambar']!=''){ echo $tampil['gambar'];}else{echo 'http://pics.unipma.ac.id/no_image.png'; }?>')">
									</div>
								</div>
								<div class="portfolio-details ratio2">
									<a href="#" aria-label="link">
										<h5 class="post-title"><a href="<?php echo $link;?>" title="<?php echo $tampil['judul']?>"><?php echo substr($tampil['judul'],0,90)?></a></h5>
										 <ul class="post-meta">
										   <li style="font-size:12px;font-weight: bold;color: #444;"><span class="fa fa-paper-plane"></span> <?php 
										   //filter id_prodi
											if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
											else {echo $tampil['singkatan_fakultas'];}?></li>
										 </ul>
										
									</a>
								</div>
								</div>
								</div>
								<?php  endforeach; ?>
								</div>
							</div>
						</div>
					</div>
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:10px;"></div>
					<div class="row">
		<!-- Pengumuman Start -->
		<div class="col-md-6">
		<!-- Classic Heading -->
			<h3 class="classic-title "><a href="<?=base_url()?>daftar_pengumuman"><span class="fa fa-bullhorn"> Pengumuman</span aria-label="pengumuman"></a></h3>
			<div class="latest-posts-classic custom-carousel show-one-slide touch-carousel" data-appeared-items="2">
			<?php
			 foreach ($pengumuman as $tampil) :
			
				$id = $tampil['id_pengumuman'];
				$judul = $tampil['judul'];
				$title=$tampil['judul'];
				$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
				$link = base_url().'pengumuman/'.$id.'/'.$slug.'';						
			?>
			<!-- Start Testimonials Carousel -->
			<div class="classic-testimonials item col-md-11">
			<div class="testimonial-content">
			<!-- Testimonial 1 -->
			<h5 class="post-title"><a href="<?php echo $link;?>"><?php echo $tampil['judul']?></a></h5>
			 <ul class="post-meta">
				<li style="font-size:12px;font-weight: bold;color: #444;"><span class="fa fa-paper-plane"></span> <?php 
					 //filter id_prodi
					if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
					else {echo $tampil['singkatan_fakultas'];}?>
					</li>
			 </ul>			
			<div class="post-content">
				<p>
					
					<a href="#" aria-label="pengumuman">&nbsp;</a>				
				</p>
			</div>
			</div>
			<div class="button-side" style="margin-top:4px;"><a href="<?php echo $tampil['gambar'];?>" target="_blank" class="btn-primary btn-large"> Unduh Disini </a></div>
			<br/>
			</div>
			<?php 
				endforeach;
			?>
			</div>
		</div>
		<!-- Pengumuman End -->

		<!-- Agenda Start -->
		<div class="col-md-6">
		<!-- Classic Heading -->
			<h3 class="classic-title"><a href="daftar_agenda"><span class="fa fa-calendar"> Agenda</span></a></h3>
    		<div class="latest-posts-classic custom-carousel touch-carousel" data-appeared-items="2">
			<?php
					 foreach ($agenda as $tampil) :
					$BulanIndo = array("JAN", "PEB", "MAR","APR", "MEI", "JUN", "JUL", "AGS", "SEP", "OKT", "NOV", "DES");
					$tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
					$bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
					$bulan = $bln-1;
					$tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
					$today = date("H:i"); 
					$jam = substr($tampil['tgl_posting'], 0, 5);
					$id = $tampil['id_agenda'];
					$judul = $tampil['judul'];
					$title=$tampil['judul'];
					$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
					$link = 'agenda/'.$id.'/'.$slug.'';						
			?>
			
			<div class="post-row item">
				<div class="left-meta-post">
					<div class="post-date" style="height:100px;width:50px">
						<span class="day" style="font-size:40px;margin-top:5px;font-family: Times New Roman,Times,serif";><?php echo $tgl?></span>
						<span class="month"style="margin-top:30px;font-size:15px;" ><?php echo $BulanIndo[(int)$bulan];?></span>
					</div>
				</div>
				<h5 class="post-title"><a href="<?php echo $link;	?>"><?php echo $tampil['judul']?></a></h5>
				<ul class="post-meta">
				<li style="font-size:12px;font-weight: bold;color: #444;"><span class="fa fa-paper-plane"></span> <?php 
					 //filter id_prodi
					if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
					else {echo $tampil['singkatan_fakultas'];}?>
					</li>
				</ul>				
				<div class="post-content">
					
				</div>
			</div>
			<?php 
					endforeach;
			?>

			</div>
		</div>
		<!-- Agenda End -->
	</div>
					<!-- End Berita 1 -->
					<!-- Divider -->
					<div class="hr1" style="margin-bottom:10px;"></div>
					<!-- Start Clients Carousel -->
					<div class="our-clients">
						<!-- Classic Heading -->
							<h3 class="classic-title">
                            	<a href="daftar_galeri"><span class="fa fa-camera"> Galeri</span></a>
                            </h3>
						<div class="clients-carousel custom-carousel touch-carousel" data-appeared-items="7">
							<?php
							 foreach ($galeri as $tampil) :
							?>
							<!-- Client 1 -->
							<div class="img-thumbnail img-responsive ratio3">
								<a href="<?php echo $tampil['gambar']; ?>" class="lightbox" aria-label="galeri">
								<a class="example-image-link" href="<?php echo $tampil['gambar']?>" alt="<?php echo $tampil['judul'];?>" data-lightbox="example-set" data-title="<?php echo $tampil['judul']; ?>" aria-label="galeri">
									<div class="ratio3 img-thumbnail img-responsive" >
										<img src="<?php echo $tampil['gambar']; ?>"  alt="<?php echo $tampil['judul'];?>">
									</div>
                                </a>
							</div>
							<?php endforeach; ?>
						</div>
					</div>
					<br />
					<!-- End Clients Carousel -->
				</div>
			</div>
		</div>
		
    <!-- jQuery Lightbox -->
	
		<!-- End content -->
        <!-- Start Footer Section -->
		<?php include('template/footer.php') ?>
        <!-- End Footer Section -->
    </div>
    <!-- End Full Body Container -->
    <!-- Go To Top Link -->
    <a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
    <div id="loader">
        <div class="spinner">
            <div class="dot1"></div>
            <div class="dot2"></div>
        </div>
    </div>
      

</body>
</html>