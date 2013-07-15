<?php
include '../include.php';
$jumlahbenar = 0;
$i = 1;
$jumlahsalah =0;
foreach($_POST['pilihan'] as $key => $value){
    if($value == $_POST['jawaban'][$key]){
        $j = "benar";
        $jumlahbenar++;
    }else{
        $j = "<font color='red'>salah</font>";
    }
}
$salah= 10-$jumlahbenar;
$point = $jumlahbenar * 20 ;
session_start();
$iden=$_SESSION['identitas'];
$waktumulai=$_SESSION['waktumulai'];
$waktuselesai = date("F j, Y, g:i a"); 
 sambung();
mysql_query("INSERT INTO tabel_nilai (id_nilai ,no_reg ,benar ,salah,point ,waktu_mulai ,waktu_selesai)values
('','$iden','$jumlahbenar','$jumlahsalah','$point','$waktumulai','$waktuselesai')");
mysql_query("update siswa set langkah='6' where no_reg='$iden'");

?>
<input type="button" onclick="window.open('http://google.com'); window.close();" value="SELESAI"/>
