 <?php 
 include("application/views/template/admin/top.php"); 
 include("application/views/template/admin/waktu.php"); 
 ?>
  <body>
  <?php echo form_open_multipart('auth/cek', ['id' => 'updateForm']); ?>
		      <div class="form-login">
		        <h2 class="form-login-heading">LOGIN<br /><?php echo $head['nama_admin'];?></h2>
		        <div class="login-wrap">
		            <input type="text" class="form-control" name="username" placeholder="Username" autofocus>
		            <br />
		            <input type="password" class="form-control"  name="password"  placeholder="Password" >
					<br />
					<img src="<?= base_url('captcha')?>" width="100%" height="8%" alt="Kode Acak" />
					<br /><br />					
		            <input type="text" class="form-control" name="kodeval" id="kodeval" maxlength="6" placeholder="Isikan text kode di atas" autofocus required>  
			    	<br />					
		          	<button type="submit" name="button" id="button" class="btn btn-theme btn-block">SIGN IN</button>
		            <hr>
          <div class="text-center">
              Copyright © 2017 - Unit Sistem Informasi dan Jaringan (SIJ)  UNIPMA
          </div>		
		        </div>
		
		          <!-- Modal -->
		     
		          <!-- modal -->
		
		      </div>	  	
			  <?php echo form_close(); ?>
	  	</div>
	  </div>

    <!-- js placed at the end of the document so the pages load faster -->
    <script src="<?php echo base_url() ?>assets/admin/assets/js/jquery.js"></script>
    <script src="<?php echo base_url() ?>assets/admin/assets/js/bootstrap.min.js"></script>

    <!--BACKSTRETCH-->
    <!-- You can use an image of whatever size. This script will stretch to fit in any screen size.-->
    <script type="text/javascript" src="<?php echo base_url() ?>assets/admin/assets/js/jquery.backstretch.min.js"></script>


  </body>
</html>
