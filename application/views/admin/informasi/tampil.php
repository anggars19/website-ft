<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location =".base_url()." 'beranda';</script>";		
}else{
  include("application/views/template/admin/head.php"); 
  include("application/views/template/admin/left.php"); 

  $page =  $data['page'];
  $no =  $data['no'];
  $limit =  $data['limit'];
  $nama_halaman = $data['nama'];
 ?>


      <!-- **********************************************************************************************************************************************************
      MAIN CONTENT
      *********************************************************************************************************************************************************** -->
<!--main content start-->

      <section id="main-content">
          <section class="wrapper">
          	<div class="row mt">
          		<div class="col-lg-12">
                  <div class="form-panel">
                  	  <h4 class="mb"><strong><i class="fa fa-angle-right"></i>
                     <?php echo ($nama_halaman == 'berita') ? 'Berita' : 
                     (($nama_halaman == 'pengumuman') ? 'Pengumuman' : (($nama_halaman == 'agenda') ? 'Agenda' : '')); ?>
                    </strong></h4>

              <div class="row mt">
                  <div class="col-md-12">
                      <div class="content-panel">
                          <table class="table table-striped table-advance table-hover">
                          <div class="col-md-push-1">
                                            <a href="
                                            <?php echo ($nama_halaman == 'berita') ? base_url().'informasi/form_add/berita' : 
                                              (($nama_halaman == 'pengumuman') ? base_url().'informasi/form_add/pengumuman' : (($nama_halaman == 'agenda') ? base_url().'informasi/form_add/agenda' : ''));?>
                                            "><button type="button" class="btn btn-primary">Tambah data</button></a>
                                          </div>
                                                      <hr>
                                                        <thead>
                                                        <tr>
                                                          <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
                                                          <th width="50%" >  <p align="center"  style="font-size:14px" >Judul</th>
                                                          <th width="20%" >  <p align="center"  style="font-size:14px" >Tanggal Posting</th>	
                                                          <th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                                                        </tr>
                                                        </thead>
                          <?php                       
                          if($nama_halaman == 'berita'){
                              foreach($berita as $tampil):
                          ?>
                                            <tbody>
                                                <tr>
                                                <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                                <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['judul']?></p></td>
                                                <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo date("d F Y", strtotime($tampil['tgl_posting']))?></p></td>	
                                              <td>
                                                      <div class="btn-group  col-md-offset-2">
                                                      <a type="button" class="btn btn-primary " href="form_edit/berita/<?php echo $tampil['id_berita']?>"> Ubah</a>
                                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                      Hapus <span class="caret"></span>
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="delete/berita/<?php echo $tampil['id_berita']?>">Yes</a></li>
                                                            <li><a href="#">No</a></li>
                                                        </ul>
                                                    </div>
                                                    </td>
                                                </tr>
                                                          </tbody>
                          <?php
                                    $no++;
                                endforeach;
                          }else if($nama_halaman == 'pengumuman'){
                                foreach($pengumuman as $tampil):                         
                          ?>
                                                    <tr>
                                                <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                                <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['judul']?></p></td>
                                                <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo date("d F Y", strtotime($tampil['tgl_posting']))?></p></td>					   
                                              <td>
                                                      <div class="btn-group  col-md-offset-2">
                                                      <a type="button" class="btn btn-primary " href="form_edit/pengumuman/<?php echo $tampil['id_pengumuman']?>"> Ubah</a>
                                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                      Hapus <span class="caret"></span>
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="delete/pengumuman/<?php echo $tampil['id_pengumuman']?>">Yes</a></li>
                                                            <li><a href="#">No</a></li>
                                                        </ul>
                                                    </div>
                                                    </td>
                                                </tr>
                                                          </tbody>
                          <?php
                                    $no++;
                                endforeach;
                          }else if($nama_halaman == 'agenda'){
                                foreach($agenda as $tampil):   
                          ?>
                          <tr>
                                                <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                                <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['judul']?></p></td>
                                                <td class="hidden-phone"><p style="font-size:14px;" align="center" > <?php  echo date("d F Y", strtotime($tampil['tgl_posting']))?></p></td>										
                                              <td>
                                                      <div class="btn-group  col-md-offset-2">
                                                      <a type="button" class="btn btn-primary " href="form_edit/agenda/<?php echo $tampil['id_agenda']?>"> Ubah</a>
                                                      <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                      Hapus <span class="caret"></span>
                                                      <span class="sr-only">Toggle Dropdown</span>
                                                      </button>
                                                        <ul class="dropdown-menu" role="menu">
                                                            <li><a href="delete/agenda/<?php echo $tampil['id_agenda']?>">Yes</a></li>
                                                            <li><a href="#">No</a></li>
                                                        </ul>
                                                    </div>
                                                    </td>
                                                </tr>
                                                          </tbody>
                                    <?php
                                $no++;
                                endforeach;
                                  }
                              ?>
                                                  </table>
                                                </div><!-- /content-panel -->
                                            </div><!-- /col-md-12 -->
                                        </div><!-- /row -->
                          <table  class="table table-striped table-advance table-hover" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                            <tbody>
                              <tr>
                          <td align="right">
                            <?php if($nama_halaman == 'berita'){?>
                          <ul class="pagination" >
                                  <!-- LINK FIRST AND PREV -->
                                  <?php
                                  if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                  ?>
                                    <li class="disabled"><a href="#">First</a></li>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                  <?php
                                  }else{ // Jika page bukan page ke 1
                                    $link_prev = ($page > 1)? $page - 1 : 1;
                                  ?>
                                  <li><a href="<?php echo base_url('informasi/berita?page=1')?>">First</a></li>
                                    <li><a href="<?php echo base_url('informasi/berita?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
                                  <?php
                                  }
                                  ?>
                                  <!-- LINK NUMBER -->
                                  <?php
                                  // Buat query untuk menghitung semua jumlah data	
                                  $jumlah1 = $total->jumlah;
                                  $jumlah_page = ceil($jumlah1/ $limit); // Hitung jumlah halamannya
                                  $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                  for($i = $start_number; $i <= $end_number; $i++){
                                    $link_active = ($page == $i)? ' class="active"' : '';
                                  ?>
                                    <li<?php echo $link_active; ?>><a href="<?php echo base_url('informasi/berita?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                    <li><a href="<?php echo base_url('informasi/berita?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="<?php echo base_url('informasi/berita?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
                                  <?php
                                  }
                                  ?>
                          </ul>			
                          <?php }else if($nama_halaman == 'pengumuman'){?>
                            <ul class="pagination" >
                                  <!-- LINK FIRST AND PREV -->
                                  <?php
                                  if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                  ?>
                                    <li class="disabled"><a href="#">First</a></li>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                  <?php
                                  }else{ // Jika page bukan page ke 1
                                    $link_prev = ($page > 1)? $page - 1 : 1;
                                  ?>
                                  <li><a href="<?php echo base_url('informasi/pengumuman?page=1')?>">First</a></li>
                                    <li><a href="<?php echo base_url('informasi/pengumuman?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
                                  <?php
                                  }
                                  ?>
                                  <!-- LINK NUMBER -->
                                  <?php
                                  // Buat query untuk menghitung semua jumlah data	
                                  $jumlah1 = $total->jumlah;
                              $jumlah_page = ceil($jumlah1/ $limit); // Hitung jumlah halamannya
                                  $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                  for($i = $start_number; $i <= $end_number; $i++){
                                    $link_active = ($page == $i)? ' class="active"' : '';
                                  ?>
                                    <li<?php echo $link_active; ?>><a href="<?php echo base_url('informasi/pengumuman?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                    <li><a href="<?php echo base_url('informasi/pengumuman?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="<?php echo base_url('informasi/pengumuman?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
                                  <?php
                                  }
                                  ?>
                          </ul>	
                          <?php }else if($nama_halaman == 'agenda'){?>
                            <ul class="pagination" >
                                  <!-- LINK FIRST AND PREV -->
                                  <?php
                                  if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                  ?>
                                    <li class="disabled"><a href="#">First</a></li>
                                    <li class="disabled"><a href="#">&laquo;</a></li>
                                  <?php
                                  }else{ // Jika page bukan page ke 1
                                    $link_prev = ($page > 1)? $page - 1 : 1;
                                  ?>
                                  <li><a href="<?php echo base_url('informasi/agenda?page=1')?>">First</a></li>
                                    <li><a href="<?php echo base_url('informasi/agenda?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
                                  <?php
                                  }
                                  ?>
                                  <!-- LINK NUMBER -->
                                  <?php
                                  // Buat query untuk menghitung semua jumlah data	
                                  $jumlah1 = $total->jumlah;
                              $jumlah_page = ceil($jumlah1/ $limit); // Hitung jumlah halamannya
                                  $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
                                  $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
                                  $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
                                  for($i = $start_number; $i <= $end_number; $i++){
                                    $link_active = ($page == $i)? ' class="active"' : '';
                                  ?>
                                    <li<?php echo $link_active; ?>><a href="<?php echo base_url('informasi/agenda?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                    <li><a href="<?php echo base_url('informasi/agenda?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                    <li><a href="<?php echo base_url('informasi/agenda?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
                                  <?php
                                  }
                                  ?>
                          </ul>	
                          <?php }?>
                          </td>
                              </tr>
                            </tbody>
        
                          </table>			  
				  </div><!-- /col-lg-9 END SECTION MIDDLE -->
				  
				  
                </div>


				
	
       
	  

      <!-- **********************************************************************************************************************************************************
      RIGHT SIDEBAR CONTENT
      *********************************************************************************************************************************************************** -->                  
<?php
  include("application/views/template/admin/footer2.php"); 
};
?>