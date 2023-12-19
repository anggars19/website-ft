<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location = 'beranda';</script>";	
}else{
  include("application/views/template/admin/head.php"); 
  include("application/views/template/admin/left.php"); 

  $page =  $data['page'];
  $no =  $data['no'];
  $limit =  $data['limit'];
 ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <h4 class="mb">
                    <strong><i class="fa fa-angle-right"></i>
                    Page
                    </strong>
                </h4>

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover" id="">
                                <div class="col-md-push-1">                                                
                                    <div class="cari">
                                        <form method="post" action="<?php echo base_url('page'); ?>">
                                            <input type="text" name="keyword" placeholder="Cari...">
                                            <input type="submit" value="Cari">
                                        </form>
                                    </div>
                                </div>
                                <hr class="custom-hr">
                                <thead>
                                    <tr>
                                        <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
                                        <th width="50%" >  <p align="center"  style="font-size:14px" >Tema</th>
                                        <th width="20%" >  <p align="center"  style="font-size:14px" >Tanggal Posting</th>	
                                        <th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach($list as $tampil):  ?>
                                <tbody>
                                    <tr>
                                        <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                        <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['tema']?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo ($tampil['tgl_posting'] == "0000-00-00") ? "0000-00-00" : date("d M Y", strtotime($tampil['tgl_posting']));?></p></td>	
                                        <td>
                                            <a type="button" class="btn btn-primary " href="page/form_edit/<?php echo $tampil['id_list']?>"> Edit</a>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $no++; endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-advance table-hover" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                    <tbody>
                        <tr>
                            <td align="right">
                                <ul class="pagination">
                                    <?php
                                    if($page == 1){ // Jika page adalah page ke 1, maka disable link PREV
                                    ?>
                                        <li class="disabled"><a href="#">First</a></li>
                                        <li class="disabled"><a href="#">&laquo;</a></li>
                                    <?php
                                    }else{ // Jika page bukan page ke 1
                                        $link_prev = ($page > 1)? $page - 1 : 1;
                                    ?>
                                    <li><a href="<?php echo base_url('page?hal=1')?>">First</a></li>
                                    <li><a href="<?php echo base_url('page?hal=')?><?php echo $link_prev; ?>">&laquo;</a></li>
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
                                    <li<?php echo $link_active; ?>><a href="<?php echo base_url('page?hal=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                        <li><a href="<?php echo base_url('page?hal=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                        <li><a href="<?php echo base_url('page?hal=')?><?php echo $jumlah_page; ?>">Last</a></li>
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
    </section>
</section>


<?php
  include("application/views/template/admin/footer2.php"); 
};
?>