<?php 
error_reporting(0);
session_start(); ?>
<html lang='en'>
<head>
    <title>SMKN 2 SAWAHLUNTO </title>
    
    <link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon" />
  <link rel='stylesheet' href='css/bootstrap.css'>
    <link rel='stylesheet' href='css/bootstrap.min.css'>
     <link rel='stylesheet' href='css/bootstrap-responsive.css'>
    <link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon" />
    <script type='text/javascript' src='js/bootstrap.js'></script>
</head>
<body>
<?php
include 'include.php';
//validasi form login
$pencet=$_POST['tmbl'];
sambung();
$nama=mysql_real_escape_string($_POST['no']);
$kunci=mysql_real_escape_string($_POST['kunci']);
//jika menekan tmbol login & nama tidak kosong
if ($pencet != '' && $nama != '' && $kunci != ''){
    //jalankan query
    
    $s=mysql_query("select nama, no_reg, kunci from biodata_siswa where no_reg='".$nama."' and kunci='".$kunci."'");
    //cek banyak data
    $c=mysql_num_rows($s);
    //jika data cocok
    if($c == '1'){
      $t= mysql_fetch_array($s);
      $_SESSION['nama']=$t['nama'];
      $_SESSION['identitas']=$t['no_reg'];
      loging($_SESSION['nama']." Login");
    }else{
        echo "<center><div id='peringatan' align='center'><img src='img/icon/0.png'> <br><b>Kombinasi Nomor Registrasi dan Kunci tidak cocok !!</b></div></center>";
        loging($nama." Login Gagal.");
    }
};
if(empty($_SESSION['identitas'])){


?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login | Profi Admin</title>
<link href="css/960.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/reset.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/text.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/login.css" rel="stylesheet" type="text/css" media="all" />
</head>

<body>
<div class="container_16">
  <div class="grid_6 prefix_5 suffix_5">
 
<br clear="all" />
</body>
</html>

<center>

<div align='center' id='login' width='500'>
<img src='img/icon/gembok.png'><br><b>Silahkan Login Terlebih Dahulu !</b>
<?php
masuk('');
//echo $_POST['kunci'];
}else{
    header('location: langkah2.php');
};

?>
Belum Punya No. Registrasi? Silahkan <a href='index.php'>Daftar</a> Terlebih dahulu.
</div>
</center>
</body>
</html>
  	  </div>

