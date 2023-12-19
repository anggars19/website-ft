<?php 
	// include 'koneksi.php'; 
	include("application/views/template/top.php");
?>
<body>

	<div id="container" class="boxed-page">
		
		<!-- Start Header -->
        <?php include("application/views/template/header.php");?>


<!-- Start Page Banner -->
<div class="page-banner">
 <div class="container">
  <div class="row">
   <div class="col-md-6">
    <h2>DAFTAR BERITA</h2>
<p><?php echo $head['nama_prodi'] ;?> </p>
  </div>
  <div class="col-md-6">
    <ul class="breadcrumbs">
    <li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
     <li><a href="#">Daftar Berita</a></li>
    
   </ul>
 </div>
</div>
</div>
</div>
<!-- End Page Banner -->
<!-- Start Content -->
<div id="content">
 <div class="container">
   <div class="col-md-12 blog-box">
    <div class="footer-widget mail-subscribe-widget">
        <div class="widget widget-categories">
    
<table width="100%">
				<th width="5%" ><p align="center" style="font-size:16px">NO</p></th>
                    		<th width="40%"><p align="center" style="font-size:16px">BERITA</p></th>
                    		<th width="40%"><p align="center" style="font-size:16px">PRODI</p></th>							
                    		<th width="15%"><p align="center" style="font-size:16px">TANGGAL</p></th>
			</tr>
			</table>
</br>
			
    <?php
      $page =  $data['page'];
      $no =  $data['no'];
      $limit =  $data['limit'];
       foreach($berita as $tampil):
								$array_bulan = array(1=>"Januari","Februari","Maret", "April", "Mei", "Juni","Juli","Agustus","September","Oktober", "November","Desember");
								$tahun = substr($tampil['tgl_posting'], 0, 4); // memisahkan format tahun menggunakan substring
								$bln = substr($tampil['tgl_posting'], 5, 2); // memisahkan format bulan menggunakan substring
								$bulan = $bln+0;
								$tgl   = substr($tampil['tgl_posting'], 8, 2); // memisahkan format tanggal menggunakan substring
								$bulan = $array_bulan[$bulan];
								$id = $tampil['id_berita'];
								$judul = $tampil['judul'];
								$title=$tampil['judul'];
								$slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
								$link = 'berita/'.$id.'/'.$slug.'';			       
            ?>
               <ul>
		<li>
			<table width="100%">
			<tr>
                    <td width="5%" ><p align="center" style="font-size:14px"><?php echo $no;?></p></td>
                    <td width="40%"><a href="<?php echo $link;?>" style="font-size:14px"><?php echo $tampil['judul']?></a></td>
                    <td width="40%" ><p align="center" style="font-size:14px">
							<?php 
							//filter id_prodi
							 if($tampil['id_prodi'] != $id_prodi) {echo $tampil['x'];} 
							else {echo $tampil['nama_fakultas'];}?>
							</p>
							</td>					
                    <td width="15%"><p align="center"><?php echo $tgl." ".$bulan." ". $tahun?></p></td>							
              
           	</tr>
			</table>
		</li>
	</ul>
    
          <?php

$no++;
       endforeach;
    ?>
	</br>

	

	
</div >

<table  class="table table-striped table-advance table-hover" border="0" cellpadding="0" cellspacing="0" style="width:100%">
	<tbody>
		<tr>
<td align="right">
<ul class="pagination" >
        <!-- LINK FIRST AND PREV -->
        <?php
        if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
        ?>
          <li class="disabled"><a href="#">First</a></li>
          <li class="disabled"><a href="#">&laquo;</a></li>
        <?php
        }else{ // Jika page bukan page ke 1
          $link_prev = ($page > 1)?  $page - 1 : 1;
        ?>
          <li><a href="<?php echo base_url('daftar_berita?page=1')?>">First</a></li>
          <li><a href="<?php echo base_url('daftar_berita?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        <!-- LINK NUMBER -->
        <?php
        // Buat query untuk menghitung semua jumlah data
       
	    $jumlah_page = ceil($jumlahData[0]['jumlah'] / $limit); // Hitung jumlah halamannya
        
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="<?php echo base_url('daftar_berita?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
        <?php
        }
        ?>    
        <!-- LINK NEXT AND LAST -->
        <?php
        // Jika page sama dengan jumlah page, maka disable link NEXT nya
        // Artinya page tersebut adalah page terakhir 
        if($page == $jumlah_page){ // Jika page terakhir
        ?>
          <li class="disabled"><a href="#">&raquo;</a></li>
          <li class="disabled"><a href="#">Last</a></li>
        <?php
        }else{ // Jika Bukan page terakhir
          $link_next = ($page < $jumlah_page)? $page + 1 : $jumlah_page;
        ?>
          <li><a href="<?php echo base_url('daftar_berita?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="<?php echo base_url('daftar_berita?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?>
      </ul>			
</td>
		</tr>
	</tbody>
</table>	

</div>
<!-- Sidebar -->
 
<!--End sidebar-->


</div>

</div>
</div>
<!-- End content -->


    <!-- Start Footer Section -->
    <?php include("application/views/template/footer.php"); ?>
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