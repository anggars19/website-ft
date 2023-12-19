<?php 

 include("application/views/template/a-top.php");
 include("application/views/template/a-header.php");
?>
            <!-- End Header Logo & Naviagtion -->
        </header> 
		<!-- Start Page Banner -->
<div class="page-banner">
 <div class="container">
  <div class="row">
   <div class="col-md-6">
    <h2>Pengumuman</h2>
<p><?php echo $head['nama_prodi'] ;?> </p>
  </div>
  <div class="col-md-6">
    <ul class="breadcrumbs">
	<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
     <li>Pengumuman</li>
   </ul>
 </div>
</div>
</div>
</div>
<!-- End Page Banner -->
<?php
	foreach($pengumuman as $tampil) :
$id = $tampil['id_pengumuman'];
$judul = $tampil['judul'];
$title=$tampil['judul'];
$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
$print = '../../printpengumuman/'.$id.'/'.$slug.'';		
?>
<!-- Start Content -->
<div id="content">
 <div class="container">
  <div class="row blog-post-page">
   <div class="col-md-8 blog-box">
    <!-- Start Single Post Area -->
    <div class="blog-post gallery-post">		
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
			<div class="button-side" style="margin-top:4px;"><a href="<?php echo $tampil['gambar'];?>" target="_blank" class="btn-primary btn-large"> Unduh Disini </a></div>		
     </div>
 </div>
 <!-- End Single Post Content -->
</div>
</div>
<!-- Sidebar -->
<div class="col-md-4 sidebar right-sidebar ">
  
  <!-- Popular Posts widget -->
  <div class="widget widget-popular-posts well">
  
  
   <h4><b>Berita Terbaru</b> <span class="head-line"></span></h4>
   <ul>
   <li>
     <?php
                                      foreach($berita as $tampil):
                                      $BulanIndo = array("Jan", "Peb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nop", "Des");
                                      $tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
                                      $bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
                                      $bulan = $bln-1;
                                      $tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
                                      $id = $tampil['id_berita'];
                                      $judul = $tampil['judul'];
                                      $title=$tampil['judul'];
                                      $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
                                      $link = '../../berita/'.$id.'/'.$slug.'';			
                          ?>
                          <br/>
     <div class="widget-thumb">
       <a href="#">
      <img src="<?php if($tampil['gambar']!=''){ echo $tampil['gambar'];}else{echo 'http://pics.unipma.ac.id/no_image.png'; }?>"/>
       </a>
     </div>
     <div class="widget-content">
       <h5><a href="<?php echo $link ;?>"><?php echo $tampil['judul']?></a></h5>
       <p style="font-size:12px;"><?php 
                                             //filter id_prodi 
                                             if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
                                              else {echo $tampil['singkatan_fakultas'];}?></p>		 
       <span><?php echo ' '.date("d F Y", strtotime($tampil['tgl_posting'])).',  '.date("G:i", strtotime($tampil['tgl_posting'])).' WIB';?></span>
     </div>
     <div class="clearfix"></div>
     <?php 
                              endforeach;
  ?>
   </li>
  </ul>
  
  
  </div>
  
  <div class="widget widget-popular-posts well">
  
  
   <h4> <b>Pengumuman</b> <span class="head-line"></span></h4>
   <ul>
   <li>
      <?php
                                      foreach($Npengumuman as $tampil):
                                      $BulanIndo = array("Jan", "Peb", "Mar", "Apr", "Mei", "Jun", "Jul", "Ags", "Sep", "Okt", "Nop", "Des");
                                      $tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
                                      $bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
                                      $bulan = $bln-1;
                                      $tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
                                      $id = $tampil['id_pengumuman'];
                                      $judul = $tampil['judul'];
                                      $title=$tampil['judul'];
                                      $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
                                      $link = '../../pengumuman/'.$id.'/'.$slug.'';	
                          ?>
                          <br/>
     
     <div class="widget-content">
       <h5><a href="<?php echo $link ;?>"><?php echo $tampil['judul']?></a></h5>
       <p style="font-size:12px;"><?php 
                                             //filter id_prodi 
                                             if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
                                              else {echo $tampil['singkatan_fakultas'];}?></p>	 
       <span><?php echo ' '.date("d F Y", strtotime($tampil['tgl_posting'])).',  '.date("G:i", strtotime($tampil['tgl_posting'])).' WIB';?></span>
     </div>
     <div class="clearfix"></div>
     <?php 
                              endforeach;
  ?>
   </li>
  </ul>
  
  
  </div>
  
  </div>
<!--End sidebar-->
</div>
</div>
</div>
<?php
	include("application/views/template/a-foot.php"); 
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
	endforeach;
?>