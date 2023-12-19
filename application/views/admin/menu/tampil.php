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
  $halaman =$data['halaman'];
 ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <h4 class="mb">
                    <strong><i class="fa fa-angle-right"></i>
                    <?php echo ($halaman == 'menu') ? 'Menu' : 
                     (($halaman == 'sub_menu') ? 'Sub Menu' : (($halaman == 'pages') ? 'Pages' : '')); ?>
                    </strong>
                </h4>

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover" id="">
                                <div class="col-md-push-1">   
                                    <a href=" <?= base_url($halaman.'/form_add')?> "><button class="btn btn-primary" type="button" >Tambah Data</button></a>                                             
                                    <div class="cari">
                                        <form method="post" action="<?php echo base_url($halaman); ?>">
                                            <input type="text" name="keyword" placeholder="Cari...">
                                            <input type="submit" value="Cari">
                                        </form>
                                    </div>
                                </div>
                                <hr>
                                <?php if($halaman == "menu"){ ?>
                                <thead>
                                    <tr>
                                        <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
                                        <th width="25%" >  <p align="center"  style="font-size:14px" >Nama Menu</th>
                                        <th width="10%" >  <p align="center"  style="font-size:14px" >status</th>
                                        <th width="25%" >  <p align="center"  style="font-size:14px" >Tanggal Posting</th>	
                                        <th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach($menu as $tampil):  ?>
                                <tbody>
                                    <tr>
                                        <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                        <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['nama']?></p></td>
                                        <td class="hidden-phone" style="text-align: center;vertical-align: middle;"><p style="font-size:14px" > <?php  echo ($tampil['tampil'] == 'Y') ?  'tampil' : (($tampil['tampil'] == 'N') ? 'tidak tampil' : '');?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo ($tampil['tgl_posting'] == "0000-00-00") ? "0000-00-00" : date("d M Y", strtotime($tampil['tgl_posting']));?></p></td>	
                                        <td>
                                            <div class="btn-group  col-md-offset-2">
                                                <a type="button" class="btn btn-primary " href="menu/form_edit/<?php echo $tampil['id_menu']?>"> Edit</a>
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Hapus <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="delete/menu/<?php echo $tampil['id_menu']?>">Yes</a></li>
                                                    <li><a href="#">No</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $no++; endforeach;
                                }else if($halaman == "pages"){
                                ?>
                                <thead>
                                    <tr>
                                        <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
                                        <th width="25%" >  <p align="center"  style="font-size:14px" >Nama Pages</th>
                                        <th width="10%" >  <p align="center"  style="font-size:14px" >status</th>
                                        <th width="15%" >  <p align="center"  style="font-size:14px" >Tanggal Posting</th>	
                                        <th width="15%" >  <p align="center"  style="font-size:14px;" >Menu</th>
                                        <th width="15%" >  <p align="center"  style="font-size:14px;" >Sub Menu</th>	
                                        <th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach($join as $tampil):  ?>
                                <tbody>
                                    <tr>
                                        <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                        <td class="hidden-phone" style=""><p style="font-size:14px" > <?php echo $tampil['tema']?></p></td>
                                        <td class="hidden-phone" style="text-align: center;vertical-align: middle;"><p style="font-size:14px" > <?php  echo ($tampil['tampil'] == 'Y') ?  'tampil' : (($tampil['tampil'] == 'N') ? 'tidak tampil' : '');?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo ($tampil['tgl_posting'] == "0000-00-00") ? "0000-00-00" : date("d M Y", strtotime($tampil['tgl_posting']));?></p></td>	
                                        <td class="hidden-phone" style="text-align: center;vertical-align: middle;"><p style="font-size:14px" > <?php  echo ($tampil['id_menu'] == '0') ? '' : $tampil['nama_menu'] ?></p></td>
                                        <td class="hidden-phone" style="text-align: center;vertical-align: middle;"><p style="font-size:14px" > <?php  echo ($tampil['id_sub'] == '0') ? '' : $tampil['nama_sub'] ?></p></td>
                                        <td>
                                            <div class="btn-group  col-md-offset-2">
                                                <a type="button" class="btn btn-primary " href="pages/form_edit/<?php echo $tampil['id_list']?>"> Edit</a>
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Hapus <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="delete/pages/<?php echo $tampil['id_list']?>">Yes</a></li>
                                                    <li><a href="#">No</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $no++; endforeach; 
                                }else if($halaman == "sub_menu"){
                                ?>
                                <thead>
                                    <tr>
                                        <th width="5%" >   <p align="center"  style="font-size:14px" >No</th>
                                        <th width="25%" >  <p align="center"  style="font-size:14px" >Nama Sub Menu</th>
                                        <th width="10%" >  <p align="center"  style="font-size:14px" >Status</th>
                                        <th width="10%" >  <p align="center"  style="font-size:14px" >Menu</th>
                                        <th width="25%" >  <p align="center"  style="font-size:14px" >Tanggal Posting</th>	
                                        <th width="15%" >  <p align="center"  style="font-size:14px" >Aksi</th>
                                    </tr>
                                </thead>
                                <?php foreach($sub as $tampil):  ?>
                                <tbody>
                                    <tr>
                                        <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                        <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['nama']?></p></td>
                                        <td class="hidden-phone" style="text-align: center;vertical-align: middle;"><p style="font-size:14px" > <?php  echo ($tampil['tampil'] == 'Y') ?  'tampil' : (($tampil['tampil'] == 'N') ? 'tidak tampil' : '');?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['nama_menu']?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo ($tampil['tgl_posting'] == "0000-00-00") ? "0000-00-00" : date("d M Y", strtotime($tampil['tgl_posting']));?></p></td>	
                                        <td>
                                            <div class="btn-group  col-md-offset-2">
                                                <a type="button" class="btn btn-primary " href="sub_menu/form_edit/<?php echo $tampil['id_sub']?>"> Edit</a>
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    Hapus <span class="caret"></span>
                                                    <span class="sr-only">Toggle Dropdown</span>
                                                </button>
                                                <ul class="dropdown-menu" role="menu">
                                                    <li><a href="delete/sub_menu/<?php echo $tampil['id_sub']?>">Yes</a></li>
                                                    <li><a href="#">No</a></li>
                                                </ul>
                                            </div>
                                        </td>
                                    </tr>
                                </tbody>
                                <?php $no++; endforeach; } ?>
                            </table>
                        </div>
                    </div>
                </div>
                
                <table class="table table-striped table-advance table-hover" border="0" cellpadding="0" cellspacing="0" style="width:100%">
                    <tbody>
                        <tr>
                            <td align="right">
                                <?php if($halaman == "menu"){ ?>
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
                                        <li><a href="<?php echo base_url('menu?hal=1')?>">First</a></li>
                                        <li><a href="<?php echo base_url('menu?hal=')?><?php echo $link_prev; ?>">&laquo;</a></li>
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
                                        <li<?php echo $link_active; ?>><a href="<?php echo base_url('menu?hal=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                            <li><a href="<?php echo base_url('menu?hal=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                            <li><a href="<?php echo base_url('menu?hal=')?><?php echo $jumlah_page; ?>">Last</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                <?php }else if($halaman == "sub_menu"){ ?>
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
                                        <li><a href="<?php echo base_url('sub_menu?hal=1')?>">First</a></li>
                                        <li><a href="<?php echo base_url('sub_menu?hal=')?><?php echo $link_prev; ?>">&laquo;</a></li>
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
                                        <li<?php echo $link_active; ?>><a href="<?php echo base_url('sub_menu?hal=')?><?php echo $i; ?>"><?php echo $i; ?></a></li>
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
                                            <li><a href="<?php echo base_url('sub_menu?hal=')?><?php echo $link_next; ?>">&raquo;</a></li>
                                            <li><a href="<?php echo base_url('sub_menu?hal=')?><?php echo $jumlah_page; ?>">Last</a></li>
                                        <?php
                                        }
                                        ?>
                                    </ul>
                                <?php }?>
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