<?php
include('template/top.php');
$keyword = $data['keyword'];
?>

<div class="boxed-page" id="container">
   <?php  include('template/header.php'); ?>
        <div class="page-banner no-subtitle">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <h2>Pencarian</h2>
                            <p><?php echo $head['nama_prodi'] ;?> </p>								
                        </div>
                        <div class="col-md-6">
                            <ul class="breadcrumbs">
                                <li><a href="#">Beranda</a></li>
                                <li>Pencarian</li>
                            </ul>
                        </div>
                    </div>
                </div>
        </div>
        <div id="content">
            <div class="container">
                <div class="row sidebar-page">
                    <div class="col-md-12 page-content" align="justify">
                        <h4 class="classic-title"><span>Pencarian</span></h4>
                        <form action="<?php echo base_url()?>search" method="get">
                            <div id="custom-search-input">
                                <div class="input-group col-md-6 col-md-push-1">
                                    <input type="text" name="keyword"  class="form-control input-lg" placeholder="Ketik disini untuk pencarian" />
                                    <span class="input-group-btn">
										<button class="btn btn-warning btn-lg" type="submit" name="">
											<i class="fa fa-search"></i>
										</button>
									</span>
                                </div>
                            </div>
                        </form>
                        <?php echo "<p style='font-size:16px;margin-left: 8.5%;font-weight: bold;'>"."Hasil pencarian : ".str_replace("'", "", $keyword)." <p>" ;?>
                        <div id="content">
                            <div class="container">
                                <div class="row blog-post-page">
                                    <div class="col-md-11 blog-box">
                                        <?php foreach($cari as $tampil):
                                            $id = $tampil['kode'];
                                            $judul = $tampil['judul'];
                                            $title=$tampil['judul'];
                                            $bagian=$tampil['bagian'];
                                            $slug = preg_replace('/[^a-z0-9-]+/', '-', trim(strtolower($title)));  
                                            $link =base_url().$bagian.'/'.$id.'/'.$slug.'';	
                                        ?>
                                        <div class="blog-post image-post">
                                            <div class="post-content">
                                                <h2><a href="<?php echo $link;?>"><?php echo $tampil['judul'] ;?></a></h2>
                                                <ul class="post-meta">
                                                    <li>Tanggal Terbit : <a href=""><?php  echo date("d F Y", strtotime($tampil['tanggal']));?></a></li>
                                                </ul>
                                                <p><?php $isi_berita	= substr($tampil['kutipan'],0,200); echo '<p>'.$isi_berita.'</p>';?></p>
                                                <a class="main-button" href="<?php echo  $link;?>" target="_blank">Selengkapnya <i class="fa fa-angle-right"></i></a>
                                            </div>
                                        </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php include('template/footer.php');?>
</div>

<a href="#" class="back-to-top"><i class="fa fa-angle-up"></i></a>
	
	<!-- <div id="loader">
		<div class="spinner">
			<div class="dot1"></div>
			<div class="dot2"></div>
		</div>
	</div> -->

</body>
</html>