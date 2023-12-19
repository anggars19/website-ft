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
						<h2>Sambutan Dekan </h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
							<li><a href="#">Profil</a></li>
							<li>Sambutan Dekan </li>
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
				<div class="col-md-9 page-content" align="justify">
						<!-- Classic Heading -->
						<h4 class="classic-title"><span>Sambutan Dekan </span></h4>
					<?php
						foreach ($sambutan as $tampil):
					?>
					
					<!-- Page Content -->
						<a href="<?php echo $tampil['gambar']?>" class="lightbox">
							<div class="ratio3 img-thumbnail img-responsive" style="background-image:url('<?php echo $tampil['gambar']?>'); float:left; margin-right:25px; margin-bottom:25px;"></div>
                        </a>

						<!-- Some Text -->
						<p class=""  align="justify">
						<?php echo $tampil['isi']; ?>
						</p>
						
						<?php endforeach; ?>
				</div>
					<!--Sidebar-->
		<?php include("right.php"); ?>
					<!--End sidebar-->
				</div>
			</div>
		</div>
		<!-- End Content -->
						<!-- Divider -->
						<div class="hr5" style="margin-top:2px; margin-bottom:45px;"></div>
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