<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include 'inti.php';
//validasi form login
sambung();
$pencet=$_POST['tmbl'];
$nama=mysql_real_escape_string($_POST['nama']);
$kunci=md5($_POST['kunci']);
//jika menekan tmbol login & nama tidak kosong
if ($pencet != '' && $nama != '' && $kunci != ''){
    //jalankan query
    
    $s=mysql_query("select * from kepsek where nama='".$nama."' and kunci='".$kunci."'");
    //cek banyak data
    $c=mysql_num_rows($s);
    //jika data cocok
    if($c == '1'){
      $t= mysql_fetch_array($s);
      $_SESSION['kepsek']=$t['nama'];
      //echo $t['nama'];
      loging("User ".$nama." (Berhasil login)");
      $login=$t['login'] + 1;
      mysql_query("update kepsek set login='$login', sedang_login='ya' where nama='$nama'");
    }else{
        echo "<script type='text/javascript'>alert('Nama dan Kunci tidak cocok !');</script>";
        loging("User ".$nama." (Login Gagal)");
    }
};
//
if(isset($_SESSION['kepsek'])){
   header('location: utama.php'); 
}

echo "
<html lang='en'>
<head>
    <title>Login Panitia</title>
    <link rel='Shortcut Icon' href='../img/favicon.ico' type='image/x-icon' />
   <link rel='stylesheet' href='../css/960.css'>
    <link rel='stylesheet' href='../css/reset.css'>
     <link rel='stylesheet' href='../css/text.css'>
    <script type='text/javascript' src='../css/login.css'></script></script>
</head>

<body>
<div class='container_16'>
  <div class='grid_6 prefix_5 suffix_5'>
 <br clear='all' />
<center>

<div align='center' width='500'>
<img src='../img/icon/gembok.png'><br><b>Silahkan Login Terlebih Dahulu !</b>
</br>LOGIN KEPALA SEKOLAH SMKN 2 SAWAHLUNTO</b>
    <form action='' method='POST'>
        <img src='../img/icon/nulis.png'> Nama : </br>
        <input type='text' name='nama'></br>
        <img src='../img/icon/kunci.png'>Kunci: </br>
        <input type='password' name='kunci'></br>
        <input class='submit' type='submit' value='Masuk' name='tmbl'>
    </form>
    <a href='/psb'><img src='../img/icon/omah.png'></a>
</center>
</body>
</html></div>
";
?>