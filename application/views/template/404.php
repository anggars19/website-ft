<?php 
	include 'koneksi.php'; 
	 include 'a-top.php';		
	 include 'a-header.php';
?>
            <!-- End Header Logo & Naviagtion -->
        </header> 
		<!-- Start Page Banner -->
<div class="page-banner">
 <div class="container">
  <div class="row">
   <div class="col-md-6">
<p><?php echo $head['nama_prodi'] ;?> </p>
  </div>
  <div class="col-md-6">
    <ul class="breadcrumbs">
     <li><a href="index.php"><span class="fa fa-home"></span> Beranda</a></li>
     <li><a href="#">404</a></li>
   </ul>
 </div>
</div>
</div>
</div>
<!-- End Page Banner -->

<!-- Start Content -->
<div id="content">
 <div class="container">
  <div class="row blog-post-page">
   <div class="col-md-8 blog-box">
    <!-- Start Single Post Area -->
    <div class="blog-post gallery-post">

			<div class="container">
				<div class="page-content">
					
					
					<div class="error-page">
						<h1>404</h1>
						<h3>File not Found</h3>
						<p>We're sorry, but the page you were looking for doesn't exist.</p>
						<div class="text-center"><a href="beranda" class="btn-system btn-small">Back To Home</a></div>
					</div>
					

				</div>
			</div>

	
 <!-- End Single Post Content -->
</div>
</div>
<!-- Sidebar -->
<!--End sidebar-->
</div>
</div>
</div>
<?php
	include 'a-foot.php';
?>
<!-- End content -->
    <!-- Start Footer Section -->
        <!-- Start Footer Section -->

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
