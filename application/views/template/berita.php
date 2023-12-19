<?php 
	include 'koneksi.php'; 
	$antiinject= str_replace("'", "", $_GET['id']);
	$id = intval($antiinject);
	if(preg_match("/'/",$_GET['id']))
		{
		session_start();
		session_destroy();
		header("location:../../404.php");
		exit();		
		}
	$sql    = $db->query("SELECT * FROM berita where id_berita = '$id'");
	$fil = mysqli_fetch_array($sql);
	if($berita != $fil['id_berita'] ){
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
    <h2>BERITA</h2>
<p><?php echo $head['nama_prodi'] ;?> </p>
  </div>
  <div class="col-md-6">
    <ul class="breadcrumbs">
    <li><a href="<?php $nama_server;?>/beranda"> Beranda</a></li>
     <li>Berita</li>
   </ul>
 </div>
</div>
</div>
</div>
<!-- End Page Banner -->
<?php
	$antiinject= str_replace("'", "", $_GET['id']);
	$id = intval($antiinject);
	$sql    = $db->query("SELECT * FROM berita where id_berita = '$id'");
	while   ($tampil = mysqli_fetch_array($sql)){
		
session_start();
$ipaddress = $_SERVER['REMOTE_ADDR']."";
$kunjungan = 1;
// Daftarkan Kedalam Session Lalu Simpan Ke Database
if (!isset($_SESSION['visitor'])){
$_SESSION['visitor']=$ipaddress;
$sql    = $db->query("update berita set visitors=visitors+'1' WHERE id_berita='$id' ");
} 

$id = $tampil['id_berita'];
$judul = $tampil['judul'];
$title=$tampil['judul'];
$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
$print = '../../printberita/'.$id.'/'.$slug.'';		
?>
<!-- Start Content -->
<div id="content">
 <div class="container">
  <div class="row blog-post-page">
   <div class="col-md-8 blog-box">
    <!-- Start Single Post Area -->
    <div class="blog-post gallery-post" >
	      <div class="post-head" >
          <a class="lightbox" title="<?php echo $tampil['judul']?>"  alt="<?php echo $tampil['judul'];?>" href="<?php if($tampil['gambar']!=''){ echo $tampil['gambar'];}else{echo 'http://pics.unipma.ac.id/no_image.png'; }?>" data-lightbox-gallery="gallery1">
            <img alt="<?php echo $tampil['judul']?>" class= " img-responsive center-block" src="<?php if($tampil['gambar']!=''){ echo $tampil['gambar'];}else{echo 'http://pics.unipma.ac.id/no_image.png'; }?>" 
			>
          </a>
          </a>
    </div>		
    <div class="post-content">
	 <div>
	 </div>
	 <div>
     <h2><?php echo $tampil['judul']?>&nbsp;</h2>
     <ul class="post-meta">
       <li ><span class="fa fa-calendar" aria-hidden="true"></span><?php echo ' '.date("d F Y", strtotime($tampil['tgl_posting'])).',  '.date("G:i", strtotime($tampil['tgl_posting'])).' WIB';?></li>  	 
       <li ><span class="fa fa-user"></span> <?php echo $tampil['penulis'];?></li>
	   <li ><span class="fa fa-eye"></span> <?php echo $tampil['visitors'];?> </li>  
	  <li ><a href="<?php echo $print;?>" target="_blank" class="btn-danger btn-mini " title="Print PDF" aria-hidden="true"><span class="fa fa-file-pdf-o" style="color:white;"></span></a> Print PDF</li></li>  
     </ul>
		<p><?php echo $tampil['isi']?></p>
     </div>
 </div>
 <!-- End Single Post Content -->
</div>
</div>
<!-- Sidebar -->
    <?php include 'sidebar.php'; ?>
<!--End sidebar-->
</div>
</div>
</div>
<?php
	}
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
<?php 
	}else{
		session_start();
		session_destroy();
		header("location:../../404.php");
		exit();	
		}
?>