<?php   include("application/views/template/top.php"); ?>
	<!-- Container -->
	<div id="container" class="boxed-page">
		
		<!-- Start Header -->
		<?php   include("application/views/template/header.php");?>
        <!-- End Header -->
		<!-- Start Page Banner -->
		<div class="page-banner no-subtitle">
			<div class="container">
				<div class="row">
					<div class="col-md-6">
						<h2>Dosen</h2>
							<p><?php echo $head['nama_prodi'] ;?> </p>
					</div>
					<div class="col-md-6">
						<ul class="breadcrumbs">
						<li><a href="<?php base_url('beranda')?>"> Beranda</a></li>
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
								<td><strong>Program Studi</strong></td>
								<td><strong>Lihat</strong></td>
							</tr>
						<?php
					  $page =  $data['page'];
					  $no =  $data['no'];
					  $limit =  $data['limit'];
					   foreach($dosen as $tampil):
						?>						
							<tr>
								<td><?php echo $no; ?></td>
								<td><?php echo $tampil['nama']; ?></td>
								<td><?php echo $tampil['nip']; ?></td>
								<td><?php echo $tampil['nama_prodi']; ?></td>								
								<td><button data-toggle="modal" data-target="#view-modal" data-id="<?php echo $tampil['id_dosen']; ?>" id="getUser" 
									class="btn btn-sm btn-info"><i class="fa fa-search"></i> View</button></td>
								
							</tr>
						<?php
					$no++;
					   endforeach;
						?>
						</table>
						
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
         <li><a href="<?php echo base_url('pengajar?page=1')?>">First</a></li>
          <li><a href="<?php echo base_url('pengajar?page=')?><?php echo $link_prev; ?>">&laquo;</a></li>
        <?php
        }
        ?>
        <!-- LINK NUMBER -->
        <?php		
	    $jumlah_page = ceil($jumlahData[0]['jumlah']  / $limit); // Hitung jumlah halamannya
        $jumlah_number = 3; // Tentukan jumlah link number sebelum dan sesudah page yang aktif
        $start_number = ($page > $jumlah_number)? $page - $jumlah_number : 1; // Untuk awal link number
        $end_number = ($page < ($jumlah_page - $jumlah_number))? $page + $jumlah_number : $jumlah_page; // Untuk akhir link number
        for($i = $start_number; $i <= $end_number; $i++){
          $link_active = ($page == $i)? ' class="active"' : '';
        ?>
         <li<?php echo $link_active; ?>><a href="<?php echo base_url('pengajar?page=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
           <li><a href="<?php echo base_url('pengajar?page=')?><?php echo $link_next; ?>">&raquo;</a></li>
          <li><a href="<?php echo base_url('pengajar?page=')?><?php echo $jumlah_page; ?>">Last</a></li>
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
		
<div id="view-modal" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" style="display: none; margin-top: 10%;">
  <div class="modal-dialog"> 
     <div class="modal-content">  
   
        <div class="modal-header"> 
           <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button> 
           <h4 class="modal-title">
           <i class="fa fa-user"></i> Profile Dosen
           </h4> 
        </div> 
            
        <div class="modal-body" style="padding: 0;">                     
           <div id="modal-loader" style="display: none; text-align: center;">
           <!-- ajax loader -->
           <img src="ajax-loader.gif">
           </div>
                            
           <!-- mysql data will be load here -->                          
           <div id="dynamic-content"></div>
        </div> 
                        
        <div class="modal-footer"> 
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>  
        </div> 
                        
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
<script>
$(document).ready(function(){

    $(document).on('click', '#getUser', function(e){
  
     e.preventDefault();
  
     var uid = $(this).data('id'); // get id of clicked row
  
     $('#dynamic-content').html(''); // leave this div blank
     $('#modal-loader').show();      // load ajax loader on button click
 
     $.ajax({
          url: 'getuser',
          type: 'POST',
          data: 'id='+uid,
          dataType: 'html'
     })
     .done(function(data){
          console.log(data); 
          $('#dynamic-content').html(''); // blank before load.
          $('#dynamic-content').html(data); // load here
          $('#modal-loader').hide(); // hide loader  
     })
     .fail(function(){
          $('#dynamic-content').html('<i class="glyphicon glyphicon-info-sign"></i> Something went wrong, Please try again...');
          $('#modal-loader').hide();
     });

    });
});
</script>

</html>


