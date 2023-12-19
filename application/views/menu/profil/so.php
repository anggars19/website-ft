<?php include("application/views/template/top.php"); ?>

	<!-- Container -->
	<div id="container" class="boxed-page">
		
		<!-- Start Header -->
		<?php include("application/views/template/header.php"); ?>
        <!-- End Header -->
		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Struktur Organisasi</h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
						<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>					
							<li>Profil</li>
							<li>Struktur Organisasi</li>
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
					<div class="col-md-9 page-content" align="justify">
						<!-- Classic Heading -->
						<h4 class="classic-title"><span>Struktur Organisasi</span></h4>
						
						<!-- Some Text -->
						<p align="center">
						<?php
						foreach($so as $tampil):
						?>

						<img src="<?php echo $tampil['gambar']; endforeach;?>" />
						</p>
						
						<!-- Divider -->
						<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
					</div>

					<!--Sidebar-->
		<?php include("right.php"); ?>

					<!--End sidebar-->
					
					
				</div>
			</div>
		</div>
		<!-- End Content -->
		
		


		<!-- Start Footer -->
		<?php include("application/views/template/footer.php"); ?>
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