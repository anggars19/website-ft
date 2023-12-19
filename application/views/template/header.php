<div class="hidden-header"></div>
    <header class="clearfix">
            
            <!-- Start Top Bar -->
		<?php 
		include('top.php');
		include('topbar.php'); ?>
            <!-- End Top Bar -->
            <!-- Start  Logo & Naviagtion  -->
            <div class="navbar navbar-default navbar-top">
                <div class="container">
                    <div class="navbar-header">
                        <!-- Stat Toggle Nav Link For Mobiles -->
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                            <i class="fa fa-bars"></i>
                        </button>
                        <!-- End Toggle Nav Link For Mobiles -->	
							<table class="" border="0" cellpadding="0" cellspacing="0" style="width:400px;margin-top: 12px">
							<tbody>
								<tr>
									<td width="17%"> <img style="margin-top: -5px; width:60px; height:60px;" alt="" src="http://pics.unipma.ac.id/content/template/logo.png" ></td>
									<td width="83%" valign="middle" style="margin-bottom:60px;font-size: 1000px;"><?php   echo $template['logo_navbar'];?></td>
								</tr>
						</table>				
                    </div>
                    <div class="navbar-collapse collapse">
                        <!-- Stat Search -->
                        
                        <!-- End Search -->
                        <!-- Start Navigation List -->
                        <ul class="nav navbar-nav navbar-right">
                            <li>
                                <a class="active" href="<?php echo $nama_server;?>beranda"><span class="fa fa-home"></span> Beranda</a>
                            </li>
							<?php foreach($header_menu as $tampil): ?>
							<li>
							<a href="#"><?=$tampil['nama']?></a>
							<ul class="dropdown">
								<?php if($tampil['nama'] == "Profil"){ ?>
								<li><a href="<?= base_url('profile/sambutan'); ?>">Sambutan</a></li>
								<li><a href="<?= base_url('profile/vimitu'); ?>">Visi, Misi dan Tujuan</a></li>
								<li><a href="<?= base_url('profile/sejarah'); ?>">Sejarah</a></li>
								<li><a href="<?= base_url('profile/so'); ?>">Struktur Organisasi</a></li>
								<li><a href="<?= base_url('view/626'); ?>">Program Studi</a></li>
								<li><a href="<?= base_url('view/625'); ?>">Sarana dan Prasarana</a></li>
                                <li><a href="<?= base_url('view/608'); ?>">Kerjasama</a></li>
								<?php } else if($tampil['nama'] == "Akademik"){ ?>
									<li><a href="http://pmb.unipma.ac.id/" target="_blank">Penerimaan Mahasiswa Baru</a>
									<li><a href="<?= base_url('akademik/k_a'); ?>">Kalender Akademik</a></li>
								<?php   foreach($header_list as $tampil2):  
								if($tampil2['id_menu'] == $tampil['id_menu'] )	{
								?>
								<li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
								<?php } endforeach; foreach($header_sub as $tampil3): 
								if($tampil3['id_menu'] == $tampil['id_menu'] )	{	
								?>
								<li><a href="#" aria-label="link"><?= str_replace("_"," ", ucwords($tampil3['nama'])) ?></a>
										<ul class="sup-dropdown">
											<?php foreach($header_list as $tampil4):
											if($tampil4['id_sub'] == $tampil3['id_sub'] )	{	
											?>
											<li><a href="<?= base_url('view/'.$tampil4['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil4['tema'])) ?></a></li>	
											<?php }endforeach;?>
										</ul>
								</li>		
								<?php } endforeach; }else if($tampil['nama'] =="Kemahasiswaan & Publikasi" ){?>
								<li><a href="<?= base_url('prestasi'); ?>">Prestasi</a></li>
								<?php   foreach($header_list as $tampil2):  
								if($tampil2['id_menu'] == $tampil['id_menu'] )	{
								?>
								<li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
								<?php } endforeach; foreach($header_sub as $tampil3): 
								if($tampil3['id_menu'] == $tampil['id_menu'] )	{	
								?>
								<li><a href="#" aria-label="link"><?= str_replace("_"," ", ucwords($tampil3['nama'])) ?></a>
										<ul class="sup-dropdown">
											<?php foreach($header_list as $tampil4):
											if($tampil4['id_sub'] == $tampil3['id_sub'] )	{	
											?>
											<li><a href="<?= base_url('view/'.$tampil4['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil4['tema'])) ?></a></li>	
											<?php }endforeach;?>
										</ul>
								</li>	
								<?php }endforeach; }else{  foreach($header_list as $tampil2):
								if($tampil2['id_menu'] == $tampil['id_menu'] )	{	
								?>
								<li><a href="<?= base_url('view/'.$tampil2['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil2['tema'])) ?></a></li>	
								<?php } endforeach; foreach($header_sub as $tampil3): 
								if($tampil3['id_menu'] == $tampil['id_menu'] )	{
								?>
								<li><a href="#" aria-label="link"><?= str_replace("_"," ", ucwords($tampil3['nama'])) ?></a>
									<ul class="sup-dropdown">
										<?php foreach($header_list as $tampil4):
										if($tampil4['id_sub'] == $tampil3['id_sub'] )	{	
										?>
										<li><a href="<?= base_url('view/'.$tampil4['id_list']);?>"><?= str_replace("_"," ", ucwords($tampil4['tema'])) ?></a></li>	
										<?php }endforeach;?>
									</ul>
								</li>
								<?php } endforeach; }?>
							</ul>
							</li>
							<?php endforeach; ?>
							<li>
							<!-- Stat Search -->		
							<div class="search-side">
							  <a class="show-search"  href="#" aria-label="cari"><i class="fa fa-search" style="color: <?php echo $warna_font;?>;background-color: <?php echo $navbar;?>"></i></a>
							  <div class="search-form">
								<form autocomplete="off" role="search" method="GET" class="searchform" action="<?php echo base_url()?>search">
								  <input type="text" name="keyword" placeholder="Telusuri situs...">
								  <input type="submit" name="cari" style="visibility: hidden;">
								</form>
							  </div>
						   </li>									
                        </ul>
                        <!-- End Navigation List -->
                    </div>
                </div>
            </div>
            <!-- End Header Logo & Naviagtion -->
            
        </header> 