<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Kepala Sekolah</title>
<link rel="stylesheet" type="text/css" href="css/960.css" />
<link rel="stylesheet" type="text/css" href="css/reset.css" />
<link rel="stylesheet" type="text/css" href="css/text.css" />
<link rel="stylesheet" type="text/css" href="css/blue.css" />
<link type="text/css" href="css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="js/ui.core.js"></script>
	<script type="text/javascript" src="js/ui.sortable.js"></script>    
    <script type="text/javascript" src="js/ui.dialog.js"></script>
    <script type="text/javascript" src="js/ui.datepicker.js"></script>
    <script type="text/javascript" src="js/effects.js"></script>
    <script type="text/javascript" src="js/flot/jquery.flot.pack.js"></script>
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="css/iefix.css" />
	<script src="js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
    <script id="source" language="javascript" type="text/javascript" src="js/graphs.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="1wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
   
  	<!--LOGO-->
	<div class="grid_8" id="logo">Dashboard Kepala Sekolah </div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a><img src='../img/icon/cal.png' width='16' height='16'> <?php echo date('d M Y'); ?><img src='../img/icon/jam.png' width='16' height='16'><b id='jam'> <?php waktu(); ?></a><a href='#' onClick="window.open('pesan.php?mode=lihat','popupwindow','scrollbars=yes, width=400,height=500');"><img src='../img/icon/amplop.png' width='16' height='16'> Pesan masuk <?php if($belum > '0'){ echo "( ".$belum." )</b>";} ?></a><a href="#">|<?php hari($sekarang); echo " ".$_SESSION['kepsek']." !"; ?></a> |   <a href='#' onclick='window.location="?keluar=yo"' title='Keluar'><img src='../img/icon/lawang.png' width='16' height='16'>Keluar</a> </span></div>
    </div>
<!-- USER TOOLS END -->   
 
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="one" align="center"><a href="utama.php" class="main current"><span class="outer"><span class="inner dashboard">Home</span></span></a></li>
		           <li class="item middle" id="four" align="center"><a onclick='window.location="?hal=list"' href='#' class="main"><span class="outer"><span class="inner users">Data Siswa</span></span></a></li>

        <li class="item middle" id="two"><a href="exel.php" class="main"><span class="outer"><span class="inner content">Download Data</span></span></a></li>
		<li class="item middle" id="five"><a onclick='window.location="?hal=hasil"' href='#' class="main"><span class="outer"><span class="inner media_library">Hasil</span></span></a></li>        
		<li class="item last" id="eight"><a onClick="window.open('kunci.php','popupwindow','scrollbars=no, width=345,height=300');"' href='#' class="main"><span class="outer"><span class="inner password">Ganti Password</span></span></a></li>      
        <li class="item middle" id="three"><a onclick='window.location="?hal=stat"' href='#'><span class="outer"><span class="inner reports png">Reports</span></span></a></li>
<li class="item last" id="eight"><a onclick='window.location="?hal=log"' href='#' class="main"><span class="outer"><span class="inner settings">LOG</span></span></a>
<li class="item last" id="eight"><a onclick='window.location="?keluar=yo"' href='#' class="main"><span class="outer"><span class="inner logoof">KELUAR</span></span></a></li> </li> 
   </ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
    <div id="tabs">
         <div class="container">
            <ul>
                      <li><a href="#" class="current"><span>Dashboard elements</span></a></li>
                      <li><a href='#' onClick="window.open('kunci.php','popupwindow','scrollbars=no, width=345,height=300');"><span>Ganti Password</span></a></li>
                      <li><a href="exel.php"><span>Download Excel</span></a></li>
                               
           </ul>
        </div>
    </div>
<!-- TABS END -->    
</div>