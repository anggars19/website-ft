<?php include("application/views/template/top.php");
  $jumlah_page = $data['halaman'];
  $hal = $data['hal'];
  $per_hal = $data['per_hal'];
  $start = $data['start'];
  $no = $data['no'];
  $page = $data['page'];
  $coba = $data['coba'];
  // $prodi = $data['prodi'];
  $tahun = $data['tahun'];
   ?>
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
						<h2>PRESTASI</h2>
							<p><?php echo $head['nama_prodi'] ;?> </p>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
						<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
						 <li>Prestasi</li>
           					
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
						<h4 class="classic-title"><span>Prestasi</span></h4>
            <?php 
             echo form_open_multipart(base_url().'prestasi/filter', ['id' => 'updateForm']); ?>
                  <div class="custom-row">
                    <div class="col-sm-10">
                        <select class="input select2 form-control" name="prodi" required>
                        <option value="" disabled selected hidden>pilih prodi</option>
                      <?php foreach($prodi as $tampil): ?>
                        <option value="<?= $tampil['id_prodi'] ?>"><?= $tampil['nama_prodi'] ?></option>
                        <?php endforeach; ?>
                      </select>
                    </div>         
                  </div>              
                  <div class="custom-row ">
                      <div class="col-sm-10 ">
                          <input class="input form_date form-control"  data-date-format="yyyy" name="tahun" value="<?php echo date('Y');?>" id="" placeholder="Tahun" required>
                      </div>
                  </div>                    
                  <div class="custom-row tombol">
                    <div class="col-sm-10">    
                         <button type="submit"  name="button" class="btn btn-info"><i class="fa fa-search"></i>Cari </button>
                    </div>
                  </div>  
                  <?php if($data['isi'] == "ada"){ ?>
                  <div class="custom-row">
                    <div class="col-sm-10">    
                    <a href="<?= base_url()?>prestasi/print?prodi=<?php echo $data['prodi']; ?>&tahun=<?php echo $data['tahun']; ?>" target="_blank" class=" btn btn-danger " type="submit" title="Print PDF" aria-hidden="true"><span class="fa fa-file-pdf-o" style="color:white;"> Print PDF</span></a> 
                    </div>
                  </div>   
                  <?php } ?>         
               </div>
              </div>               
            <?php echo form_close();?>
						<!-- Some Text -->
          
						<table width="100%" class="table table-hover">
							<tr>
                                <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
								<th width="30%" >  <p align="center"  style="font-size:14px" >Nama</th>
								<th width="30%" >  <p align="center"  style="font-size:14px" >Penyelenggara</th>	
								<th width="15%" >  <p align="center"  style="font-size:14px" >Tanggal</th>	
								<th width="20%" >  <p align="center"  style="font-size:14px" >Bukti</th>
							</tr>
						<?php
            foreach($prestasi as $tampil):
						$BulanIndo = array("Januari", "Februari", "Maret","April", "Mei", "Juni", "Juli", "Agustus", "September", "Oktober", "November", "Desember");
						$tahun = substr($tampil['tanggal_prestasi'], 0, 4); // memisahkan format tahun menggunakan substring
						$bln = substr($tampil['tanggal_prestasi'], 5, 2); // memisahkan format bulan menggunakan substring
						$bulan = $bln-1;
						$tgl   = substr($tampil['tanggal_prestasi'], 8, 2); // memisahkan format tanggal menggunakan substring							
						?>						
									    <tr>
										  <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['nama_prestasi']?></p></td>
										  <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['penyelenggara']?></p></td>
										  <td class="hidden-phone" align="center"><p style="font-size:14px" >  <?php  echo  $tgl.' '.$BulanIndo[(int)$bulan].' '.$tahun;?></td>				   
										<td align="center"><button data-toggle="modal" data-target="#view-modal<?php echo $tampil['id_prestasi']; ?>" data-id="<?php echo $tampil['id_prestasi']; ?>"  
									class="btn btn-sm btn-info "><i class="fa fa-search"></i> View</button></td>
									    </tr>
						<?php $no++; ?>
                <?php endforeach;?>
            </table>
         
    </div>


						<!-- Divider -->
<div class="hr5" style="margin-top:30px; margin-bottom:45px;"></div>
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
          $link_prev = ($page > 1)? $page - 1 : 1;
        ?>
          <li><a href="<?php echo base_url('prestasi?page=1')?>">First</a></li>
          <li><a href="<?php echo base_url('prestasi?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        <!-- LINK NUMBER -->
        <?php
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
          <li<?php echo $link_active; ?>><a href="<?php echo base_url('prestasi?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
          <li><a href="<?php echo base_url('prestasi?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="<?php echo base_url('prestasi?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
        <?php
        }
        ?> 
		
		</ul>			
</td>
		</tr>
	</tbody>
</table>							
					</div>								
				</div>
			</div>
		</div>
		
    <?php foreach ($prestasi as $tampil): ?>
    <!-- Kode modal -->
    <div id="view-modal<?php echo $tampil['id_prestasi']; ?>" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; margin-top: 10%;">
        <div class="modal-dialog"> 
            <div class="modal-content">  
                <!-- Konten modal -->
                <div class="modal-header"> 
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
                    <h4 class="modal-title">
                        <i class="fa fa-user"></i> Prestasi
                    </h4> 
                </div> 
                <div class="modal-body">                     
                    <!-- Gambar akan ditampilkan di sini -->
                    <img  src="<?= $tampil['gambar']?>" alt="<?= $tampil['nama_prestasi']?>">
                </div> 
                <div class="modal-footer"> 
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
                </div> 
            </div> 
        </div>
    </div>
<?php endforeach; ?>


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
<script>
  // Mengambil elemen <i> di dalam elemen <th> dengan kelas "prev"
var iconElement = document.querySelector('th.prev i');

// Mengganti kelas "icon-arrow-left" dengan kelas baru
iconElement.classList.remove('icon-arrow-left');
iconElement.classList.add('fa-arrow-left');

</script>



</html>


