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
  $nama_halaman = $data['nama'];
 ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <h4 class="mb">
                    <strong><i class="fa fa-angle-right"></i>
                    <?php echo ($nama_halaman == 'berita') ? 'Berita' : 
                    (($nama_halaman == 'pengumuman') ? 'Pengumuman' : (($nama_halaman == 'agenda') ? 'Agenda' : '')); ?>
                    </strong>
                </h4>

                <div class="row mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover" id="">
                                <div class="col-md-push-1">
                                    <a href="
                                    <?php echo ($nama_halaman == 'berita') ? base_url().'informasi/form_add/berita' : (($nama_halaman == 'pengumuman') ? base_url().'informasi/form_add/pengumuman' : (($nama_halaman == 'agenda') ? base_url().'informasi/form_add/agenda' : ''));?>
                                    "><button type="button" class="btn btn-primary">Tambah data</button></a>
                                    <div class="cari">
                                    <?php echo form_open('produk', 'id="updateForm"'); ?>
                                        <input type="text" name="keyword" placeholder="Cari produk...">
                                        <button type="submit">Cari</button>
                                    <?php echo form_close(); ?>
                                </div>
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
                                <?php foreach($berita as $tampil): ?>
                                <tbody>
                                    <tr>
                                        <td> <p align="center"  style="font-size:14px" > <?php echo $no;?></a></td>
                                        <td class="hidden-phone"><p style="font-size:14px" > <?php echo $tampil['judul']?></p></td>
                                        <td class="hidden-phone"><p style="font-size:14px;"   align="center" > <?php  echo date("d F Y", strtotime($tampil['tgl_posting']))?></p></td>	
                                        <td>
                                            <div class="btn-group col-md-offset-2">
                                                <a type="button" class="btn btn-primary " href="form_edit/berita/<?php echo $tampil['id_berita']?>"> Ubah</a>
                                                <button type="button" class="btn btn-warning dropdown-toggle" data-toggle="dropdown" aria-expanded="false">
                                                    hapus <span class="caret"></span>
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
                                <?php endforeach;?>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</section>


<?php
  include("application/views/template/admin/footer2.php"); 
};
?>