<?php include("../koneksi.php"); ?>
<?php include("top.php"); ?>
<body>

	<!-- Container -->
	<div id="container" class="boxed-page">
		
		<!-- Start Header -->
		<?php include("header.php"); ?>
        <!-- End Header -->

		
		
		
		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Dosen Pascasarjana PIPS</h2>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
							<li><a href="#">Profil</a></li>
							<li>Dosen</li>
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
						<h4 class="classic-title"><span>Dosen</span></h4>
						
						<!-- Some Text -->
						<table width="100%" class="table table-hover">
							<tr>
								<td><strong>No.</strong></td>
								<td><strong>Nama</strong></td>
								<td><strong>NIP/NIDN</strong></td>
								<td><strong>Lihat</strong></td>
							</tr>
						<?php
						$sql    = $db->query ("SELECT * FROM dosen where status='Y' AND id_prodi = '$id_prodi'");
						$n=1;
						while   ($tampil = mysqli_fetch_array($sql)){ ?>
							<tr>
								<td><?php echo $n; ?></td>
								<td><?php echo $tampil['nama']; ?></td>
								<td><?php echo $tampil['nip']; ?></td>
								<td><a href="#" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#myModal">Selengkapnya..</a>
<button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Open Modal</button>								</td>
								
							</tr>
						<?php
						$n++; }
						?>
						</table>
						
						<!-- Divider -->
						<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
					</div>								
				</div>
			</div>
		</div>
		<!-- End Content -->
		
		
		

		<!-- Start Footer -->
		<?php include("../footer.php"); ?>
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

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Modal Header</h4>
      </div>
      <div class="modal-body">
        <p>Some text in the modal.</p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>

  </div>
</div>
