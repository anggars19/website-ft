<?php
  include("waktu.php");
  include("koneksi.php");
  $sql    = $db->QUERY ("SELECT `nama_prodi`,`header_admin`,`nama_admin`, `id_prodi`, `id_fakultas` FROM `header` WHERE `id_prodi`='$id_prodi' AND `id_fakultas`='$id_fakultas' ");
  $head = mysqli_fetch_array($sql);
  echo $head['header_admin'];
  $sql    = $db->QUERY ("SELECT `color_navbar`, `id_prodi`, `id_fakultas`  FROM `template` WHERE `id_prodi`='$id_prodi' AND `id_fakultas`='$id_fakultas' ");
  $color = mysqli_fetch_array($sql);
  $color['color_navbar'];
  $idunitSIM = '05';
?>

    <!-- Bootstrap core CSS -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/bootstrap.css" rel="stylesheet">
    <!--ckeditor-->
    <script src="<?php echo base_url() ?>assets/admin/assets/ckeditor/ckeditor.js"></script>
	<script  src="<?php echo base_url() ?>assets/admin/assets/ckeditor/styles.js"></script>
	<!--external css-->
    <link href="<?php echo base_url() ?>assets/admin/assets/font-awesome/css/font-awesome.css" rel="stylesheet" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/css/zabuto_calendar.css">
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/js/gritter/css/jquery.gritter.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/admin/assets/lineicons/style.css">    
    <link rel="shortcut icon" href="<?= base_url()?>assets/favicon.ico"/>
    <!-- Custom styles for this template -->
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style.css" rel="stylesheet">
    <link href="<?php echo base_url() ?>assets/admin/assets/css/style-responsive.css" rel="stylesheet">
	   <link href="<?php echo base_url() ?>assets/admin/assets/date/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  <script src="<?php echo base_url() ?>assets/admin/assets/Chart.bundle.js"></script>
  <link rel="stylesheet" href="https://cdn.datatables.net/1.13.7/css/jquery.dataTables.css" />
  
  </head>
  <style type="text/css">
            .container {
                width: 50%;
                margin: 15px auto;
            }

            .cari{
                float: right;
                margin-top: 10px;
                margin-right: 10px;

                padding-bottom: 10px;
            }
            .custom-hr {
                margin-top: 50px; /* Mengatur jarak atas */
            }
        </style>
  <style type="text/css">

	/* warna pada login */
	.form-login h2.form-login-heading {	
    background:<?php echo $color['color_navbar'];?>;
	}
	.btn-theme {
    background-color: <?php echo $color['color_navbar'];?>;
	}
	/* warna pada halaman admin navbar*/	
	.black-bg {
    background: <?php echo $color['color_navbar'];?>;
    border-bottom: 1px solid<?php echo $color['color_navbar'];?>;
	}	
	ul.top-menu > li > .logout {
    background: <?php echo $color['color_navbar'];?>;
	}
	/* calender*/
	.site-footer {
		background: <?php echo $color['color_navbar'];?>;
	}
	.green-panel {
    background: <?php echo $color['color_navbar'];?>;
	}	
	/* hover sidebar*/
	.ul.sidebar-menu li a.active, ul.sidebar-menu li a:hover, ul.sidebar-menu li a:focus {
    background: <?php echo $color['color_navbar'];?>;
	}
	.ul.sidebar-menu li ul.sub li.active a {
    color: <?php echo $color['color_navbar'];?>;
	}
	.dropdown-menu.extended li p.green {
		background-color: <?php echo $color['color_navbar'];?>;
	}

</style>

  <body>