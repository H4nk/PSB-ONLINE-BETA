
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>SMKN 2 Sawahlunto</title>
<meta name="keywords" content="grand, mini, theme, free templates, website, CSS, HTML" />
<meta name="description" content="Grand Mini Theme - free CSS template provided by templatemo.com" />
<link href="templatemo_style.css" rel="stylesheet" type="text/css" />

</head>
<body>

<span id="top"></span>
<div id="templatemo_wrapper">
        <div>
            <h1><a href="index.php">SMKN 2 Sawahlunto</a></h1>
        </div>
	<!-- end of header -->
    <div id="twitter">"SISTEM PSB ONLINE DAN UJIAN ONLINE SMKN 2 SAWAHLUNTO"</div>
    <div id="templatemo_menu">
        <ul>
            <li><a href="index.php"><span class="home"></span>Home</a></li>
            <li><a href="guru.php"><span class="aboutus"></span>Fasilitas</a></li>
            <li><a href="galery.php"><span class="gallery"></span>Galery</a></li>
            <li><a href="daftar.php"><span class="siswa"></span>Daftar Siswa Baru</a></li>
            <li class="last"><a href="masuk.php"><span class="login"></span>Login Siswa Baru</a></li>
        </ul>    	
    </div>
	
        <td>
        <div style='background-color: silver; padding: 4;' id='div_menu'><table width='100%' style='font-size: 12px;'><tr><td width='55'>Pengumuman:</td><td> <marquee onmouseover='this.stop();' onmouseout='this.start();'><?php 
error_reporting(0);
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
echo $anoun['anoun']; ?></td></tr></table></marquee></div>
         <!-- keterangan di atas -->
        </td>
    </tr>
    <tr>
        <td></td>
    </tr>
  
	</head>