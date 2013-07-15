<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Dashboard | Modern Admin</title>
<link rel="stylesheet" type="text/css" href="panitia/css/960.css" />
<link rel="stylesheet" type="text/css" href="panitia/css/reset.css" />
<link rel="stylesheet" type="text/css" href="panitia/css/text.css" />
<link rel="stylesheet" type="text/css" href="panitia/css/blue.css" />
<link type="text/css" href="panitia/css/smoothness/ui.css" rel="stylesheet" />  
    <script type="text/javascript" src="../../ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>
    <script type="text/javascript" src="panitia/js/blend/jquery.blend.js"></script>
	<script type="text/javascript" src="panitia/js/ui.core.js"></script>
	<script type="text/javascript" src="panitia/js/ui.sortable.js"></script>    
    <script type="text/javascript" src="panitia/js/ui.dialog.js"></script>
    <script type="text/javascript" src="panitia/js/ui.datepicker.js"></script>
    <script type="text/javascript" src="panitia/js/effects.js"></script>
    <script type="text/javascript" src="panitia/js/flot/jquery.flot.pack.js"></script>
    <!--[if IE]>
    <script language="javascript" type="text/javascript" src="panitia/js/flot/excanvas.pack.js"></script>
    <![endif]-->
	<!--[if IE 6]>
	<link rel="stylesheet" type="text/css" href="panitia/css/iefix.css" />
	<script src="panitia/js/pngfix.js"></script>
    <script>
        DD_belatedPNG.fix('#menu ul li a span span');
    </script>        
    <![endif]-->
    <script id="source" language="javascript" type="text/javascript" src="panitia/js/graphs.js"></script>

</head>

<body>
<!-- WRAPPER START -->
<div class="container_16" id="1wrapper">	
<!-- HIDDEN COLOR CHANGER -->      
   
  	<!--LOGO-->
	<div class="grid_8" id="logo">Dashboard Peserta PSB</div>
    <div class="grid_8">
<!-- USER TOOLS START -->
      <div id="user_tools"><span><a> welcome <? echo $nama;?><a 150px;' onClick="window.open('panitia/pesan.php?mode=kirim','popupwindow','scrollbars=yes, width=400,height=400');">
                          <img src='img/icon/amplop.png' width='16' height='16'>Tanya</a>|<a>
                   
                        <?php
                         sambung();
                         $sq=mysql_query("select foto from siswa where no_reg='$iden'");
                         $f=mysql_fetch_array($sq);
                         echo "<img src='".$f['foto']."' width='50' height='35'></br>"; 
                        ?>                 
                </a></span></div>
    </div>
<!-- USER TOOLS END -->   
 
<div class="grid_16" id="header">
<!-- MENU START -->
<div id="menu">
	<ul class="group" id="menu_group_main">
		<li class="item first" id="two"><a href="langkah2.php" class="main current"><span class="outer"><span class="inner dashboard">Home</span></span></a></li>
        <li class="item middle" id="two"><a href="print-form.php?print=ya&no_reg=<?php echo $iden; ?>"<span class="main"><span class="outer"><span class="inner print">Cetak Fomulir</span></span></a></li>
        <li class="item middle" id="three"><a onclick='window.location="?hal=stat"' href='print-form.php?no_reg=<?php echo $iden; ?>'><span class="outer"><span class="inner view">Lihat Fomulir</span></span></a></li>
        <li class="item middle" id="four"><a onclick='window.location="?hal=list"' href='ujian.php' class="main"><span class="outer"><span class="inner users">Ujian Online</span></span></a></li>
		<li class="item middle" id="five"><a onclick='window.location="?hal=hasil"' href='pesan.php' class="main"><span class="outer"><span class="inner media_library">Lihat Pesan</span></span></a></li>        
		<li class="item middle" id="six"><a onclick='window.location="?hal=pengumuman"' href='status.php' class="main"><span class="outer"><span class="inner event_manager">Status</span></span></a></li>        
		<li class="item middle" id="seven"><a onclick='window.location="?hal=soal"' href='info.php' class="main"><span class="outer"><span class="inner newsletter">Pengumuman</span></span></a></li>        
    		<li class="item last" id="eight"><a onclick='window.location="?hal=log"' href='?sesi=selesai' class="main"><span class="outer"><span class="inner settings">KELUAR</span></span></a></li>        

	</ul>
</div>
<!-- MENU END -->
</div>
<div class="grid_16">
<!-- TABS START -->
   
<!-- TABS END -->    
</div>
