      
      <!-- **********************************************************************************************************************************************************
      MAIN SIDEBAR MENU
      *********************************************************************************************************************************************************** -->
      <!--sidebar start-->
      <aside>
          <div id="sidebar"  class="nav-collapse ">
              <!-- sidebar menu start-->
              <ul class="sidebar-menu" id="nav-accordion">
              
              	  <p class="centered"><a href="main.php"><img src="<?php echo base_url() ?>assets/admin/assets/img/logo.png" width="100"></a></p>
              	  <h5 class="centered">Administrasi</h5>
              	  	
                  <li class="mt">
                      <a href="<?php echo base_url() ?>main">
                          <i class="fa fa-university"></i>
                          <span>Dashboard</span>
                      </a>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Pengaturan Menu</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url() ?>menu">Menu</a></li>
                          <li><a  href="<?php echo base_url() ?>sub_menu">Sub Menu</a></li>
                          <li><a  href="<?php echo base_url() ?>pages">Pages</a></li>
                      </ul>
                  </li>
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-info-circle"></i>
                          <span>Informasi</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url() ?>informasi/berita">Berita</a></li>
                          <li><a  href="<?php echo base_url() ?>informasi/pengumuman">Pengumuman</a></li>
                          <li><a  href="<?php echo base_url() ?>informasi/agenda">Agenda</a></li>
                      </ul>
                  </li>
                  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-image"></i>
                          <span>Gambar</span>
                      </a>
                      <ul class="sub">
                          <li><a  href="<?php echo base_url() ?>galeri/slide">Slide</a></li>
                          <li><a  href="<?php echo base_url() ?>galeri/galeri">Galeri</a></li>
                      </ul>
                  </li>

                  
				  <li class="sub-menu">
                      <a  href="<?php echo base_url() ?>admin/prestasi" >
                          <i class="fa fa-paper-plane"></i>
                          <span>Prestasi</span>
                      </a>
                  </li>
				  
                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-bar-chart-o"></i>
                          <span>Trafik Pengunjung</span>
                      </a>
                      <ul class="sub">
						 <li><a  href="<?php echo base_url() ?>trafik/berita">Berita</a></li>
						 <li><a  href="trafik-pengumuman.php">Pengumuman</a></li>
						 <li><a  href="trafik-agenda.php">Agenda</a></li>
						 
                      </ul>
                  </li>

                  <li class="sub-menu">
                      <a href="javascript:;" >
                          <i class="fa fa-cog"></i>
                          <span>Pengaturan</span>
                      </a>
                      <ul class="sub">	
						 <li><a   href="<?php echo base_url() ?>pengaturan/password">Ganti Password</a></li>								  					  
						 <li><a   href="<?php echo base_url() ?>pengaturan/kontak">Kontak</a></li>								  
						 <li><a   href="<?php echo base_url() ?>pengaturan/template">Template</a></li>			
                      </ul>
                  </li>					  
              </ul>
              <!-- sidebar menu end-->
          </div>
      </aside>
      <!--sidebar end-->
