<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';

if (isset($_POST['daftar']) && isset($_POST['setuju']) && $_POST['nama'] != '' && $_POST['mtk'] != ''  && $_POST['bin'] != '' && $_POST['big'] != ''){
    sambung();
  
    $kode=mysql_query("select max(no_reg) as KODE from biodata_siswa");
    $ar=mysql_fetch_array($kode);
    $id_kode= $ar['KODE'];
    $urut= substr($id_kode, 5,5);
    $urut++;
    $id_baru="SMK".date('m').date('d').sprintf("%05s", $urut);
    $kunci=password();
    $nama=htmlspecialchars($_POST['nama'], ENT_COMPAT);
    $nama=mysql_real_escape_string($nama);
    $jkel=mysql_real_escape_string($_POST['jkel']);
    $jkel=htmlspecialchars($jkel, ENT_QUOTES);
    $tem_lahir=mysql_real_escape_string($_POST['tem_lahir']);
    $tem_lahir=htmlspecialchars($tem_lahir, ENT_QUOTES);
    $tgl=mysql_real_escape_string($_POST['tgl']);
    $tgl=htmlspecialchars($tgl, ENT_QUOTES);
    $bln=mysql_real_escape_string($_POST['bln']);
    $bln=htmlspecialchars($bln, ENT_QUOTES);
    $tahun=mysql_real_escape_string($_POST['tahun']);
    $tahun=htmlspecialchars($tahun, ENT_QUOTES);
    $alamat=mysql_real_escape_string($_POST['alamat']);
        $alamat=htmlspecialchars($alamat, ENT_QUOTES);
    $k_pos=mysql_real_escape_string($_POST['k_pos']);
        $k_pos=htmlspecialchars($k_pos, ENT_QUOTES);
    $agama=mysql_real_escape_string($_POST['agama']);
        $agama=htmlspecialchars($agama, ENT_QUOTES);
    $gol_drh=mysql_real_escape_string($_POST['gol_drh']);
        $gol_drh=htmlspecialchars($gol_drh, ENT_QUOTES);
    $tinggi=mysql_real_escape_string($_POST['tinggi']);
        $tinggi=htmlspecialchars($tinggi, ENT_QUOTES);
    $berat=mysql_real_escape_string($_POST['berat']);
        $berat=htmlspecialchars($berat, ENT_QUOTES);
    $asal_sek=mysql_real_escape_string($_POST['asal_sek']);
        $asal_sek=htmlspecialchars($asal_sek, ENT_QUOTES);
    $alamat_sek=mysql_real_escape_string($_POST['alamat_sek']);
        $alamat_sek=htmlspecialchars($alamat_sek, ENT_QUOTES);
    $thn_lls=mysql_real_escape_string($_POST['thn_lls']);
        $thn_lls=htmlspecialchars($thn_lls, ENT_QUOTES);
    $no_ijazah=mysql_real_escape_string($_POST['no_ijazah']);
        $no_ijazah=htmlspecialchars($no_ijazah, ENT_QUOTES);
    $hp=mysql_real_escape_string($_POST['hp']);
        $hp=htmlspecialchars($hp, ENT_QUOTES);
    $email=mysql_real_escape_string($_POST['email']);
        $email=htmlspecialchars($email, ENT_QUOTES);
    $jurusan1=mysql_real_escape_string($_POST['jurusan1']);
        $jurusan1=htmlspecialchars($jurusan1, ENT_QUOTES);
    $nisn=mysql_real_escape_string($_POST['nisn']);
        $nisn=htmlspecialchars($nisn, ENT_QUOTES);
    
    $bin=mysql_real_escape_string($_POST['bin']);
        $bin=str_replace(",", ".", $bin);
            $bin=htmlspecialchars($bin, ENT_QUOTES);

    $big=mysql_real_escape_string($_POST['big']);
        $big=str_replace(",", ".", $big);
            $big=htmlspecialchars($big, ENT_QUOTES);

    $mtk=mysql_real_escape_string($_POST['mtk']);
        $mtk=str_replace(",", ".", $mtk);
            $mtk=htmlspecialchars($mtk, ENT_QUOTES);

    $ipa=mysql_real_escape_string($_POST['ipa']);
        $ipa=str_replace(",", ".", $ipa);
            $ipa=htmlspecialchars($ipa, ENT_QUOTES);
   $ayah=mysql_real_escape_string($_POST['ayah']);
        $ayah=htmlspecialchars($ayah, ENT_QUOTES);
    $ibu=mysql_real_escape_string($_POST['ibu']);
        $ibu=htmlspecialchars($ibu, ENT_QUOTES);
    $wali=mysql_real_escape_string($_POST['wali']);
        $wali=htmlspecialchars($wali, ENT_QUOTES);
    $alamat_wali=mysql_real_escape_string($_POST['alamat_wali']);
        $alamat_wali=htmlspecialchars($alamat_wali, ENT_QUOTES);
    $hp_wali=mysql_real_escape_string($_POST['hp_wali']);
        $hp_wali=htmlspecialchars($hp_wali, ENT_QUOTES);
    $kerja_wali=mysql_real_escape_string($_POST['kerja_wali']);
        $kerja_wali=htmlspecialchars($kerja_wali, ENT_QUOTES);
    $sql = mysql_query("INSERT INTO biodata_siswa values (NULL, '$id_baru', '$kunci', '$nama', '$jkel', '$tem_lahir', '$tgl', '$bln', '$tahun', '$alamat', '$gol_drh', '$k_pos', '$tinggi', '$berat', '$agama', '$asal_sek', '$alamat_sek', '$thn_lls', '$no_ijazah', '$hp', '$email', '$jurusan1', '$nisn', '$bin', '$big', '$ipa', '$mtk', '$ayah', '$ibu', '$wali', '$alamat_wali', '$hp_wali', '$kerja_wali')");
	$total1= $bin + $mtk + $ipa + $big;
/*$nilai_total= $total1/4;
	if ( $nilai_total >= 55 ){
		$status=2;}
		else {
		$status=0;}*/
    if ($sql){
        echo "<script type='text/javascript'>alert('Berhasil di simpan');</script>";
        $_SESSION['identitas']=$id_baru;
        $sss=mysql_query("select nama from biodata_siswa where no_reg='$id_baru'");
        $xxx=mysql_fetch_array($sss);
        $_SESSION['nama']=$xxx['nama'];
        loging($_SESSION['nama']." Terdaftar");
    }else{
        echo "<script type='text/javascript'>alert('Data Belum Tersimpan, Mohon di Chek Kembali !!')</script>";
    };
}else{
    loging($_POST['nama']." Data Belum Lengkap");
    echo "<script type='text/javascript'>alert('Mohon Di lengkapi Biodata anda !!')</script>";
    echo "<script type='text/javascript'>window.location = 'index.php';</script>";
};

sambung();
//mysql_query("insert into siswa values (NULL,'$id_baru', DEFAULT, $status,1 )"); <<- Query Filter Nilai
mysql_query("insert into siswa values (NULL,'$id_baru', DEFAULT,1,1 )");

?>
<html>
<head>
    <title>Pendaftaran Siswa Baru [Online] - SMKN 1 Ngawi </title>
    <link rel='stylesheet' href='gaya.css'>
    <link rel="Shortcut Icon" href="img/favicon.ico" type="image/x-icon" />
    <script src='jquery.js' type='text/javascript'></script>
    <script src='trik.js' type='text/javascript'></script>
</head>
<body id='tampilkan'>
<center>
<div id='seneng' style='background-color: orange; width: 400px;'>
<div id='wokey'>
    <img src='img/logo.png' width='50' height='59'> <br>Klik Lanjut Untuk Melanjutkan Pendaftaran<br>
    <table border='0'>
        <tr>
            <td>Nama</td><td>:</td><td><?php echo $xxx['nama']; ?></td
        ></tr>
        <tr>
            <td>No Registrasi</td><td>:</td><td><?php echo $id_baru; ?></td>
        </tr>
        <tr>
            <td>Kode Kunci</td><td>:</td><td><b><?php echo $kunci; ?></b></td>
        </tr>
        <tr>
            <td colspan='3' style='font-size: 12px; color: brown;'>Note: Harap Simpan Detail di atas untuk keperluan pendaftaran selanjutnya</td>
        </tr>
    </table>

</div>
</div>
</center>
<center><a href='langkah2.php?confirm=ok'><button><img src='img/icon/mlayu.png' width='16' height='16' ><br> Lanjut</button></a></center>
</body>
</html>
