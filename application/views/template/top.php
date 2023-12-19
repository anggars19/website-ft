<?php 
//$this->load->view('koneksi');
include('application/views/template/koneksi.php');
$sql    = $db->QUERY ("SELECT `nama_prodi`,`header`,`email`, `id_prodi`, `id_fakultas` FROM `header` WHERE `id_prodi`='$id_prodi' AND `id_fakultas`='$id_fakultas' ");
$head = mysqli_fetch_array($sql);
echo $head['header'];
$sql = $db->QUERY("SELECT  `id_prodi`,`id_fakultas`, `color_topbar`, `color_navbar`, `color_footer`, `logo_navbar`, `background` FROM `template` 
									WHERE  id_prodi='$id_prodi' AND id_fakultas='$id_fakultas' ");
$template=mysqli_fetch_array($sql);
//pecah link journal dan prosiding
$link =$template['color_navbar'];
//pecah string berdasarkan string ";" 
$pecah = explode(";", $link);
//mencari element array 0
$navbar = $pecah[0];
$font_hover = $pecah[1];
$garis_bawah_menu = $pecah[2];
$warna_font = $pecah[3];
//$nama_server='http://'.$_SERVER['HTTP_HOST'] ;
$nama_server = base_url();
//echo $nama_server;
?>

    <!-- Bootstrap CSS  -->
    <link rel="stylesheet" href="<?= $nama_server; ?>assets/css/bootstrap/bootstrap.min.css" type="text/css" media="screen">

    <!-- Font Awesome CSS -->
    <link rel="stylesheet" href="<?= $nama_server; ?>assets/css/fontAwesome/font-awesome.min.css" type="text/css" media="screen">

    <!-- Margo CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?= $nama_server; ?>assets/css/style.css" media="screen">

    <!-- Responsive CSS Styles  -->
    <link rel="stylesheet" type="text/css" href="<?= $nama_server; ?>assets/css/responsive.css" media="screen">

    <!-- Css3 Transitions Styles  -->
    <link rel="stylesheet" type="text/css" href="<?= $nama_server; ?>assets/css/animate.css" media="screen">

    <!-- Color CSS Styles  -->

    <link rel="stylesheet" type="text/css" href="<?= $nama_server; ?>assets/css/colors/red.css" title="red" media="screen" />

	<!-- Favicon -->
    <link rel="shortcut icon" href="<?= $nama_server; ?>assets/favicon.ico"/>
    <link href="<?php echo base_url() ?>assets/admin/assets/date/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen">
  
   

    

    <!--[if IE 8]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->
    <!--[if lt IE 9]><script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script><![endif]-->

</head>

<style type="text/css">
 
    .custom-row {
      display: inline-block;
      margin-right: -50px;
      /* width: 45%; */
    }

    .tombol{
      margin-right: 5px;
    }
  
    .ratio{
      position: relative;
      height: 100px;
      width: 300px;
      padding-bottom:100px;

      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    .ratio1{
	position: relative;
	height: 300px;
	width: 1200px;
	text-align: center;
	background-repeat: no-repeat;
	background-position: center center;
	background-size: cover;
    }

    .ratio2{
      position: relative;
      height: 150px;
      padding-bottom:100px;

      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }

    .ratio3{
      position: relative;
      width: 150px;
      height: 100px;
	  
      background-repeat: no-repeat;
      background-position: center center;
      background-size: cover;
    }	
	.top-bar {
    background-color:<?php echo $template['color_topbar'];?>;
	}
	.navbar {	
    background:<?php echo $navbar;?>;
	}
	.navbar-default .navbar-nav > li > a {
	 color: <?php echo $font_hover;?>;
	}
	.navbar-default .navbar-nav > li > a.active, .navbar-default .navbar-nav > li:hover > a {
    border-color:  <?php echo $garis_bawah_menu;?>
	}
	.navbar-default .navbar-nav > li > a.active {
    color: <?php echo $warna_font;?>;
</style>
<body style="background: url('<?php echo $template['background'];?>');no-repeat;
background-size: 100% 100%;
background-attachment:fixed;" >