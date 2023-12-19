<?php 
if ($this->session->userdata('userlogin') == "")
{  
	echo "<script>alert('Akses Tidak di Izinkan !'); window.location = 'beranda';</script>";	
}else{
  include("application/views/template/admin/head.php"); 
  include("application/views/template/admin/left.php"); 
 ?>

<section id="main-content">
    <section class="wrapper">
        <div class="row mt">
            <div class="col-lg-12">
                <div class="form-panel">
                    <h4 class="mb">
                        <strong><i class="fa fa-angle-right"></i>
                        Trafik Pengunjung Berita
                        </strong>
                    </h4>
                    <div class="row mt">
                        <div class="col-md-12">
                            <div class="border-head">
                                <h3>Trafik Pengunjung</h3>
                            </div>
                            <div class="custom-bar-chart">
                                <ul class="y-axis">
                                    <li><span>1000</span></li>
                                    <li><span>800</span></li>
                                    <li><span>600</span></li>
                                    <li><span>400</span></li>
                                    <li><span>200</span></li>
                                    <li><span>0</span></li>
                                </ul>
                                <?php foreach($berita as $tampil): ?>
                                <div class="bar">
                                    <div class="title"><?php echo ' '.date("d F Y", strtotime($tampil['tgl_posting']));?></div>
                                    <div class="value tooltips" data-original-title="<?php echo $tampil['visitors'];?>" data-toggle="tooltip" data-placement="top"><?php echo $tampil['visitors']/10;?>%</div>
                                </div>
                                <?php endforeach; ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row-mt">
                    <div class="col-md-12">
                        <div class="content-panel">
                            <table class="table table-striped table-advance table-hover">
                                <tbody>
                                    <tr>
                                        <td width="5%" align="center">No</td>
                                        <td width="80%">Judul</td>			
                                        <td width="15%" align="center">Visitors</td>
                                    </tr>
                                    <?php $no =0;  foreach($berita as $tampil): $no++ ?>
                                    <tr>
                                        <td align="center"><?php echo $no++;?></td>		
                                        <td><?php echo $tampil['judul'];?></td>
                                        <td align="center"><?php echo $tampil['visitors'];?></td>
                                    </tr>
                                    <?php endforeach;?>
                                </tbody>
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