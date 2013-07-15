<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
 ?>
<? include'header.php';
include 'menu.php'; ?>
<p>Nama : Harry Setya Hadi  </p>
<p>Pangilan : H4nk  </p>
<p>Tempat/tgl lahir : Lubuk Sikaping / 23-Juli-1987  </p>
<p>Emai : XmoenseN[at]gmail.com</p>
<p> YM : xmonsen</p>
<p> Skype/Facebook/Twitter : xmoensen  </p>
<p>Alamat : Perumahan Tarok Indah Blok E/11 Kampung jua, Lubeg, Padang (25225)
  Contact HP : 081933536231  </p>
<p>WhatsApp = 081933536231</p>
<p> BNI 
  capen Sariah Padang :  
  0244108279 </p>
