<?php
session_start();
if(!isset($_SESSION['panitia'])){
    header('location: index.php');
}
include 'inti.php';
$panitia=$_SESSION['panitia'];
if(isset($_POST['pencet'])){
    sambung();
    $lama=mysql_real_escape_string($_POST['lama']);
    $lama=md5($lama);
    $baru=mysql_real_escape_string($_POST['baru']);
    $ulangi=mysql_real_escape_string($_POST['ulangi']);
    $new=md5($ulangi);
    $k=mysql_fetch_array(mysql_query("select kunci from panitia where nama='$panitia'"));
    if($lama == $k['kunci']){
        if($baru != '' && $ulangi != ''){       
            if($baru == $ulangi){
             $input=mysql_query("update panitia set kunci='$new' where nama='$panitia'");
             if($input){
                echo "<script type='text/javascript'> alert('Kunci Berhasil di Ganti !');</script>";
                echo "<script type='text/javascript'> window.close();</script>";
             }else{
               echo "<script type='text/javascript'> alert('Kunci Gagal di Ganti !');</script>"; 
             }
            }else{
             echo "<script type='text/javascript'> alert('Konfirmasi Sandi Baru Tidak Cocok !');</script>";
            }
        }else{
            echo "<script type='text/javascript'> alert('Sandi Baru Tidak Boleh Kosong !');</script>";
        }
    }else{
        echo "<script type='text/javascript'> alert('Sandi Lama Tidak Cocok');</script>";
    }
}
?>
<html>
<head>
    <title>Ganti Kunci Admin</title>
</head>
<body bgcolor='silver'>
<form action='' method='post'>
<table style='font-size: 12px; '>
    <tr>
        <td colspan='3'><img src='../img/icon/kunci.png'> Ganti Kunci Admin<hr></td>
    </tr>
    <tr>
        <td>Kunci Sekarang</td><td>:</td><td><input type='password' name='lama'></td>
    </tr>
    <tr>
        <td>Kunci Baru</td><td>:</td><td><input type='password' name='baru'></td>
    </tr>
    <tr>
        <td>Ulangi Kunci Baru</td><td>:</td><td><input type='password' name='ulangi'></td>
    </tr>
    <tr>
        <td colspan='3'><hr><input type='submit' value='Ganti' name='pencet'></td>
    </tr>
</table>
</form>
</body>
</html>