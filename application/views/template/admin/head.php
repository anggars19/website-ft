<?php include("application/views/template/admin/top.php");  ?>
    <section id="container" >
      <!-- **********************************************************************************************************************************************************
      TOP BAR CONTENT & NOTIFICATIONS
      *********************************************************************************************************************************************************** -->
      <!--header start-->
      <header class="header black-bg">
              <div class="sidebar-toggle-box">
                  <div class="fa fa-bars tooltips" data-placement="right" data-original-title="Toggle Navigation"></div>
              </div>
            <!--logo start-->
            <a href="index.php" class="logo"><b> <?php echo $head['nama_prodi'];?> - UNIPMA</b></a>
            <!--logo end-->
            <div class="top-menu">
            	<ul class="nav pull-right top-menu">
			     	 <li><a class="logout" href="<?= base_url()?>beranda" target="_blank">Lihat Website</a></li>
				     <li><a class="logout" href="<?=base_url()?>logout">Logout</a></li>
            	</ul>
            </div>
        </header>
      <!--header end-->
