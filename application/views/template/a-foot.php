        <footer style="background-color:<?php echo $template['color_footer'];?>;">
		
            <div class="container">
                <div class="row footer-widgets">
                    
                    
                    <!-- Start Subscribe & Social Links Widget -->
                    <div class="col-md-9 col-xs-12">
                        <div class="footer-widget mail-subscribe-widget">
                            <h4>Berita UNIPMA<span class="head-line"></span></h4>
						
                            </div>
                        </div>
                    </div><!-- .col-md-3 -->
                    <!-- End Subscribe & Social Links Widget -->
<?php 
foreach($kontak as $tampil):

?>					
                    <div class="col-md-3 col-xs-12">
                      <div class="footer-widget contact-widget">
                            <h4>Kontak Departement<span class="head-line"></span></h4>
                            	<table class="table" style="border-style:hidden">
                                	<tr style="border-style:hidden">
                                    	<td><span class="fa fa-globe" aria-hidden="true">&nbsp;Alamat</span></td>
                                        <td>:</td>
                                    	<td><?php echo $tampil['alamat']?></td>
                                    </tr>
                                	<tr style="border-style:hidden">
                                    	<td><span class="fa fa-mobile" aria-hidden="true">&nbsp;Telepon</span></td>
                                        <td>:</td>
                                    	<td><?php echo $tampil['telepon']?></td>
                                    </tr>
                                	<tr style="border-style:hidden">
                                    	<td><span class="fa fa-fax" aria-hidden="true">&nbsp;Faksimile</span></td>
                                        <td>:</td>
                                    	<td><?php echo $tampil['faksimile']?></td>
                                    </tr>
                                	<tr style="border-style:hidden">
                                    	<td><span class="fa fa-envelope-o" aria-hidden="true">&nbsp;Email</span></td>
                                        <td>:</td>
                                    	<td><?php echo $tampil['email']?></td>
                                    </tr>
                                    </table>
                      </div>
                    </div><!-- .col-md-3 -->     
                    <?php endforeach;?>                      
                </div><!-- .row -->			
                <!-- Start Copyright -->
                <div class="copyright-section">
                    <div class="row">
                        <div class="col-md-6">
                            <p style="text-transform:none">Copyright &copy; 2017 UNIVERSITAS PGRI MADIUN</p>
                        </div>
                    </div><!-- .row -->
                </div>
                <!-- End Copyright -->

            </div>
        </footer>
        <!-- End Footer Section -->
    <!-- Margo JS  -->
    <?php $nama_server = base_url(); ?>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.migrate.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/modernizrr.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/css/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.fitvids.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/owl.carousel.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/nivo-lightbox.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.isotope.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.appear.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/count-to.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.textillate.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.lettering.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.easypiechart.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.nicescroll.min.js"></script>
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/jquery.parallax.js"></script>
    <!--<script type="text/javascript" src="js/mediaelement-and-player.js"></script>-->
    <script type="text/javascript" src="<?= $nama_server; ?>assets/js/script.js"></script>
    </div>