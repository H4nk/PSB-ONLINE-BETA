<?php
error_reporting(0);
session_start();
include 'include.php';
if(!isset($_SESSION['identitas'])){
    header('location: index.php');
}
sambung();
anti_injection($sql);
$get_no=anti_injection($_GET['no_reg']);
$s=mysql_query("select * from biodata_siswa where no_reg = '$get_no'");
$d=mysql_fetch_array($s);
?>

<html>
<head>
    <title>Print Formulir</title>
    <link rel='stylesheet' href='gaya.css'>
    <?php if($_GET['print']=='ya'){
        loging($_SESSION['identitas']." Print Formulir");
    echo "<script type='text/javascript'>javascript:window.print()</script>";
    mysql_query("update siswa set langkah='4' where no_reg='$get_no'");
    }; ?>
</head>
<body>
<!-- tabel body -->
<table border='0' cellpadding='3' cellspacing='1' width='700' style='font-family: "time news roman"; font-size: 12px; background: #ffffff;'>
    <!-- kop -->
    <tr><td colspan='3'><?php include 'kop.php' ?></td></tr>
    <!-- kop -->
    <tr>
        <td colspan='3' align='center'>FORMULIR PENDAFTARAN SISWA BARU SMKN 2 SAWAHLUNTO [ONLINE]</td>
    </tr>
    <tr>
        <td width='20'><!-- margin kanan --><br></td>
        <td>
        <!-- Bagian Tengah / Isi -->
            <!-- tabel kontent -->
            <table style='font-family: "time news roman"; font-size: 12px;' border='0' cellpadding='3' cellspacing='1' width='100%'>
                <tr>
                    <td colspan='3'><b>Biodata Siswa</b></td><!-- SubJudul/Kategori -->
                    <td><!-- nomor formulir --></td>
                </tr>
                <!-- Isi Konten -->
                <tr>
                    <td width='200'>No Registrasi</td><td width='5'>:</td><td><?php echo $d['no_reg']; ?></td>
                    <!-- Foto -->
                    <td width='150' rowspan='10' valign='top'>
                        <table border='1' cellpadding='2' cellspacing='0'>
                            <tr>
                                <td>
                                    <img src='<?php $no=$d['no_reg']; $s=mysql_fetch_array(mysql_query("select foto from siswa where no_reg='$no'")); echo $s['foto']; ?>' width='150' height='188'>
                                </td>
                            </tr>
                        </table>
                    </td>
                    <!-- Foto -->
                </tr>
				 <tr>
                    <td>NISN</td><td width='5'>:</td><td><?php echo $d['nisn']; ?></td>
                </tr>
                <tr>
                    <td>Nama</td><td width='5'>:</td><td><?php echo $d['nama']; ?></td>
                </tr>
                <tr>
                    <td>Jenis Kelamin</td><td width='5'>:</td><td><?php echo $d['jkel']; ?></td>
                </tr>
                <tr>
                    <td>Gol Darah</td><td width='5'>:</td><td><?php echo $d['gol_drh']; ?></td>
                </tr>
                <tr>
                    <td>Berat / Tinggi Badan</td><td width='5'>:</td><td><?php echo $d['berat']." Kg / ".$d['tinggi']." Cm"; ?></td>
                </tr>
                <tr>
                    <td>TTL</td><td width='5'>:</td><td><?php echo $d['tem_lahir']; ?>, <?php echo $d['tgl']; ?>/<?php echo $d['bln']; ?>/<?php echo $d['tahun']; ?></td>
                </tr>
                <tr>
                    <td>Alamat</td><td width='5'>:</td><td><?php echo $d['alamat']; ?></td>
                </tr>
                <tr>
                    <td>Kode Pos</td><td width='5'>:</td><td><?php echo $d['k_pos']; ?></td>
                </tr>
                <tr>
                    <td>Agama</td><td width='5'>:</td><td><?php echo $d['agama']; ?></td>
                </tr>
                <tr>
                    <td>Asal Sekolah</td><td width='5'>:</td><td><?php echo $d['asal_sek']; ?></td>
                </tr>
                <!-- batas foto sampek sini -->
                <tr>
                    <td>Alamat Sekolah</td><td width='5'>:</td><td><?php echo $d['alamat_sek']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Tahun Lulus</td><td width='5'>:</td><td><?php echo $d['thn_lls']; ?></td><td></td>
                </tr>
                <tr>
                    <td>No Ijazah</td><td width='5'>:</td><td><?php echo $d['no_ijazah']; ?></td><td></td>
                </tr>
                <tr>
                    <td>No Hp</td><td width='5'>:</td><td><?php echo $d['hp']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Email</td><td width='5'>:</td><td><?php echo $d['email']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Pilihan Jurusan</td><td width='5'>:</td><td><?php echo $d['jurusan1']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Nilai UN</td><td width='5'>:</td><td>MTK: <?php echo $d['mtk']; ?> BIN: <?php echo $d['bin']; ?> BIG: <?php echo $d['big']; ?> IPA: <?php echo $d['ipa']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Kode Kunci</td><td width='5'>:</td><td><b><?php echo $d['kunci']; ?></b></td><td></td>
                </tr>
                <tr>
                    <td colspan='4'><b>Data Orang Tua / Wali Murid</b></td>
                </tr>
                <tr>
                    <td>Ayah</td><td width='5'>:</td><td><?php echo $d['ayah']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Ibu</td><td width='5'>:</td><td><?php echo $d['ibu']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Wali</td><td width='5'>:</td><td><?php echo $d['wali']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Alamat</td><td width='5'>:</td><td><?php echo $d['alamat_wali']; ?></td><td></td>
                </tr>
                <tr>
                    <td>No HP</td><td width='5'>:</td><td><?php echo $d['hp_wali']; ?></td><td></td>
                </tr>
                <tr>
                    <td>Pekerjaan</td><td width='5'>:</td><td><?php echo $d['kerja_wali']; ?></td><td></td>
                </tr>
                <tr>
                    <td colspan='4'><br></td>
                </tr>
                <tr>
                    <td colspan='4' align='center'><img src='img/urs.jpg' width='75' height='43'></td>
                </tr>
                <!-- Isi Konten -->
            </table>
        </td>
        <td width='20'><!-- margin kiri --></td>
    </tr>
</table>   
</body>
    
</html>