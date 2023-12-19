<?php 
	include("application/views/template/top.php");
?>
<style type="text/css">
    .ratio4{
      position: relative;
      height: 210px;
      width: 280px;
      padding-bottom:100px;

      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }
</style>
    <link href="assets/css/css_galeri/css/lightbox.css" rel="stylesheet"/>

<body>

	<div id="container" class="boxed-page">
		<!-- Start Header -->
		<?php include("application/views/template/header.php");?>

			<!-- Start Page Banner -->
			<div class="page-banner">
				<div class="container">
					<div class="row">
						<div class="col-md-6">
							<h2>DAFTAR GALERI</h2>
<p><?php echo $head['nama_prodi'] ;?> </p>
						</div>
						<div class="col-md-6">
							<ul class="breadcrumbs">
							<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
							<li><a href="#">Daftar Galeri</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
			<!-- End Page Banner -->

<!-- Start Content -->
		<div id="content">
			<div class="container">
				<div class=" portfolio-page portfolio-4column">
					
					<ul id="portfolio-list" data-animated="fadeIn">
<?php
foreach($galeri as $tampil):
							?>						
                    <li>
								<a href="<?php echo $tampil['gambar']; ?>" class="lightbox">
								<a class="example-image-link" href="<?php echo $tampil['gambar']?>" alt="<?php echo $tampil['judul'];?>" data-lightbox="example-set" data-title="<?php echo $tampil['judul']; ?>">
									<div class="ratio4 img-thumbnail img-responsive" >
										<img src="<?php echo $tampil['gambar']; ?>"/>
									</div>
                                </a>

			
		    </li>
<?php endforeach;?>			
              </ul>
					<!-- End Portfolio Items -->
					
				</div>
			</div>
		</div>





<!-- Sidebar -->
 
<!--End sidebar-->



<!-- End content -->


    <!-- Start Footer Section -->
	<?php include("application/views/template/footer.php"); ?>
        <!-- End Footer Section -->
        
        
    </div>
    <!-- End Full Body Container -->
    <script src="assets/css/css_galeri/js/lightbox-plus-jquery.min.js"></script>		

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