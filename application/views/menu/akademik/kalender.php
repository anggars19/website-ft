<?php include("application/views/template/top.php"); ?>

	<div id="container" class="boxed-page">
		
		<!-- Start Header -->
		
<div class="hidden-header"></div>
        <header class="clearfix">
            
            <!-- Start Top Bar -->
            <div class="top-bar">
                <div class="container">
                    <div class="row">
                        <div class="col-md-7">
                            <!-- Start Contact Info -->
                            <ul class="contact-details">
                                <li><a href="http://www.unipma.ac.id/" target="_blank">
                                	<i class="fa fa-map-marker"></i>&nbsp;&nbsp;Website</a>
                                </li>
                                <li><a href="http://mail.unipma.ac.id/" target="_blank"></i> Webmail</a></li>
                                <li><a href="http://sia.ikippgrimadiun.ac.id/profile/mhs/" target="_blank"></i> SIAMa</a></li>
                                <li><a href="http://e-journal.ikippgrimadiun.ac.id/" target="_blank"></i> E-Journal</a></li>
                                <li><a href="http://pmb.unipma.ac.id/" target="_blank"></i> PMB Online</a></li>
                            </ul>
                            <!-- End Contact Info -->
                        </div><!-- .col-md-6 -->
                    </div><!-- .row -->
                </div><!-- .container -->
            </div><!-- .top-bar -->
            <!-- End Top Bar -->
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->	
							<table class="" border="0" cellpadding="0" cellspacing="0" style="width:400px;margin-top: 12px">
							<tbody>
								<tr>
									<td width="17%"> <img style="margin-top: -5px; width:60px; height:60px;" alt="" src="http://pics.unipma.ac.id/content/template/logo.png" ></td>
									<td width="83%" valign="middle" style="margin-bottom:60px;font-size: 1000px;"><?php   echo $template['logo_navbar'];?></td>
								</tr>
						</table>				
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Stat Search -->
                        <!-- End Search -->
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="active" href="<?php echo $nama_server.'/'; ?>beranda"><span class="fa fa-home"></span> Beranda</a>
                            </li>
                            <li>
                                <a>Profil</a>
                                <ul class="dropdown">
                                    <li><a href="<?php echo $nama_server.'/'; ?>profile/sambutan">Sambutan</a>
                                    </li>
                                    <li><a href="<?php echo $nama_server.'/'; ?>profile/vimitu">Visi, Misi dan Tujuan</a>
                                    </li>
                                    <li><a href="<?php echo $nama_server.'/'; ?>profile/sejarah">Sejarah</a>
                                    </li>
                                    <li><a href="<?php echo $nama_server.'/'; ?>profile/so">Struktur Organisasi</a>
                                    </li>
                                </ul>
                            </li>
							<li>
                                <a href="<?php echo $nama_server.'/'; ?>pengajar">Dosen</a>
                            </li>
							<li>
                                <a>Akademik</a>
                                <ul class="dropdown">
                                    <li><a href="http://pmb.unipma.ac.id/" target="_blank">Penerimaan Mahasiswa Baru</a>
                                    </li>
									<li><a href="<?php echo $nama_server.'/'; ?>kurikulum">Kurikulum</a>
                                    </li>
									<li><a href="<?php echo $nama_server.'/'; ?>lulusan">Profil Lulusan</a>
                                    </li>
									<li><a href="<?php echo $nama_server.'/'; ?>capaian">Capaian Pembelajaran</a>
                                    </li>
									<li><a href="<?php echo $nama_server.'/'; ?>prestasi">Prestasi</a>
                                    </li>			
									<li><a href="<?php echo $nama_server.'/'; ?>k_a">Kalender Akademik</a>
                                    </li>										
                                </ul>
                            </li>						
							<li>
                                <a href="../publikasi">Publikasi Ilmiah</a>
                            </li>	
						  <li> 
							<!-- Stat Search -->
							<?php 	
							if(isset($_GET['cari'])){
								$search = $_GET['search'];
								$link = 'search/?search='.$search;
								echo "<script type='text/javascript'>window.location.href = '$link';</script>";
							}
							?>		
							<div class="search-side">
							  <a class="show-search"  ><i class="fa fa-search" style="color: <?php echo $warna_font;?>;background-color: <?php echo $navbar;?>"></i></a>
							  <div class="search-form">
								<form autocomplete="off" role="search" method="GET" class="searchform" action="">
								  <input type="text" name="search" placeholder="Telusuri situs...">
								  <input type="submit" name="cari" style="visibility: hidden;">
								</form>
							  </div>
						   </li>									
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header> 
        <!-- End Header -->
		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Kalender Akademik</h2>
						<p><?php echo $head['nama_prodi'] ;?> </p>								
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="#">Beranda</a></li>
							<li>Kalender Akademik</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- End Page Banner -->
		<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class="row sidebar-page">
					<!-- Page Content -->
					<div class="col-md-12 page-content" align="justify">	
						<!-- Classic Heading -->
						<!-- Some Text -->					
		
					<div class="row">
						
						<div class="col-md-12 page-content">
							
							<!-- Classic Heading -->
							<h4 class="classic-title"><span>Kalender Akedemik</span></h4>
							
						
							<div class="post-head"> <iframe src="http://www.unipma.ac.id/akademik/images/kalenderakademik.pdf" width="100%" height="1000"></iframe></div>
												
					
                            <br>
						</div>
						
					</div>		
						

					</div>
				</div>
			</div>
		</div>
		<!-- End Content -->
		
		


		<!-- Start Footer -->
		<?php include("application/views/template/footer.php");  ?>
		<!-- End Footer -->
		
	</div>
	<!-- End Container -->
	
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