<?php
//****validasi apakah yang bukak panitia*****//
if($_SERVER['PHP_SELF']){
    if(!isset($_SESSION['panitia'])){    
        header('location: index.php');
    };
};
//****Perhitungan - Mumet deh*****//
sambung();
//******* Pilihan Pertama *********//
$ap=mysql_query("select * from biodata_siswa where jurusan1='Teknik Bangunan'");
$ap=mysql_num_rows($ap);

$ak=mysql_query("select * from biodata_siswa where jurusan1='Teknik Ketenagalistrikan'");
$ak=mysql_num_rows($ak);

$pm=mysql_query("select * from biodata_siswa where jurusan1='Teknik Mesin'");
$pm=mysql_num_rows($pm);

$tkj=mysql_query("select * from biodata_siswa where jurusan1='Teknik Otomotif'");
$tkj=mysql_num_rows($tkj);

$tei=mysql_query("select * from biodata_siswa where jurusan1='Geologi Pertambangan'");
$tei=mysql_num_rows($tei);

$jumlah=$ap+$ak+$pm+$tkj+$tei;
//**PURA PURA MATI JIKA DATA KOSONG**//
if($jumlah=='0'){
    die("<script type='text/javascript'>alert('Data Kosong');</script>");
}
//******* Pilihan Pertama *********//

$ap2=mysql_query("select * from biodata_siswa where jurusan2='Teknik Bangunan'");
$ap2=mysql_num_rows($ap2);

$ak2=mysql_query("select * from biodata_siswa where jurusan2='Teknik Ketenagalistrikan'");
$ak2=mysql_num_rows($ak2);

$pm2=mysql_query("select * from biodata_siswa where jurusan2='Teknik Mesin'");
$pm2=mysql_num_rows($pm2);

$tkj2=mysql_query("select * from biodata_siswa where jurusan2='Teknik Otomotif'");
$tkj2=mysql_num_rows($tkj2);

$tei2=mysql_query("select * from biodata_siswa where jurusan2='Geologi Pertambangan'");
$tei2=mysql_num_rows($tei2);
$terima=mysql_query("select count(status) from siswa where status='4'");
$terima=mysql_num_rows($terima);
$gagal_tes=mysql_query("select count(status) from siswa where status='3'");
$gagal_tes=mysql_num_rows($gagal_tes);
$tolak=mysql_query("select count(status) from siswa where status='0'");
$tolak=mysql_num_rows($tolak);


$jumlah2=$ap2+$ak2+$pm2+$tkj2+$tei2;

?>
 <div class="grid_16" id="content">
			
<table border='1' cellpadding='3' cellspacing='0' id='tbl_stat' width='100%' style='font-family: time news roman; font-size: 12;'>
    <tr>
        <td colspan='6'>
          <img src='../img/icon/stat.png' width='22' height='22'>   Statistik Pendaftar Tanggal :<b> <?php echo date('d-M-Y') ?></b>  
        </td>
    </tr>
    <tr>
        <td colspan='6' align='left'>
          <b>Total Peserta Valid: <?php echo $jumlah; ?> | Total Peserta Diterima: <?php echo $terima; ?> |  Total Peserta Gagal Tes Online: <?php echo $gagal_tes; ?> |  Total Peserta Yang DiTolak: <?php echo $tolak; ?></b>
        </td>
    </tr>
    <!-------Pilihan Pertama--------->
    <tr>
        <td colspan='6' align='center'>
          <b>Pilihan Utama</b>
        </td>
    </tr>
    <tr>
        <td align='center' width='150' class='tbl'>
            Ket \ Kelas
        </td>
        <td align='center' class='tbl'>
            Teknik Bangunan
        </td>
        <td align='center' class='tbl'>
           Teknik Ketenagalistrikan
        </td>
        <td align='center' class='tbl'>
            Teknik Mesin
        </td>
        <td align='center' class='tbl'>
           Teknik Otomotif
        </td>
        <td align='center' class='tbl'>
           Geologi Pertambangan
        </td>
    </tr>
    <tr>
        <td align='center' class='tbl'>
            Jumlah
        </td>
        <td align='center' class='sub'>
            <?php echo $ap; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $ak; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $pm; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $tkj; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $tei; ?>
        </td>
    </tr>
    <tr>
        <td align='center' class='tbl' class='tbl'>
            Prosentase
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($ap/$jumlah)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($ak/$jumlah)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($pm/$jumlah)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($tkj/$jumlah)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($tei/$jumlah)*100, 0, 4)."%"; ?>
        </td>
    </tr>
    <tr>
        <td colspan='6' align='left'>
          <img src='chart.php?ap=<?php echo $ap; ?>&tkj=<?php echo $tkj; ?>&pm=<?php echo $pm; ?>&tei=<?php echo $tei; ?>&ak=<?php echo $ak; ?>' width='250' height='250' align='left'>
          <table style='font-size: 12;' cellpadding='4'>
            <tr>
                <td style='background-color: #33ccff;' >Teknik Bangunan</td>
            </tr>
            <tr>
                <td style='background-color: #99cc33;' >Teknik Ketenagalistrikan</td>
            </tr>
            <tr>
                <td style='background-color: #9933cc;' >Teknik Mesin</td>
            </tr> 
            <tr>
                <td style='background-color: #ff9900;' >Teknik Otomotif</td>
            </tr>
            <tr>
                <td style='background-color: #993300;' >Geologi Pertambangan</td>
            </tr> 
           
          </table>
        </td>
    </tr>
     <!-------Pilihan Kedua--------->
    <tr>
        <td colspan='6' align='center'>
          <b>Pilihan Kedua</b>
        </td>
    </tr>
    <tr>
        <td align='center' width='150' class='tbl'>
            Ket \ Kelas
        </td>
        <td align='center' class='tbl'>
            Teknik Bangunan
        </td>
        <td align='center' class='tbl'>
            Teknik Ketenagalistrikan
        </td>
        <td align='center' class='tbl'>
            Teknik Mesin
        </td>
        <td align='center' class='tbl'>
            Teknik Otomotif
        </td>
        <td align='center' class='tbl'>
            Geologi Pertambangan
        </td>
    </tr>
    <tr>
        <td align='center' class='tbl'>
            Jumlah
        </td>
        <td align='center' class='sub'>
            <?php echo $ap2; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $ak2; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $pm2; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $tkj2; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo $tei2; ?>
        </td>
    </tr>
    <tr>
        <td align='center' class='tbl'>
            Prosentase
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($ap2/$jumlah2)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($ak2/$jumlah2)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($pm2/$jumlah2)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
           <?php echo substr(($tkj2/$jumlah2)*100, 0, 4)."%"; ?>
        </td>
        <td align='center' class='sub'>
            <?php echo substr(($tei2/$jumlah2)*100, 0, 4)."%"; ?>
        </td>
    </tr>
    <tr>
        <td colspan='6' align='left'>
          <img src='chart.php?ap=<?php echo $ap2; ?>&tkj=<?php echo $tkj2; ?>&pm=<?php echo $pm2; ?>&tei=<?php echo $tei2; ?>&ak=<?php echo $ak2; ?>' width='250' height='250' align='left'>
            <table style='font-size: 12;' cellpadding='4'>
                <tr>
                    <td style='background-color: #33ccff;' >Teknik Bangunan</td>
                </tr>
                <tr>
                    <td style='background-color: #99cc33;' >Teknik Ketenagalistrikan</td>
                </tr>
                <tr>
                    <td style='background-color: #9933cc;' >Teknik Mesin</td>
                </tr> 
                <tr>
                    <td style='background-color: #ff9900;' >Teknik Otomotif</td>
                </tr>
                <tr>
                    <td style='background-color: #993300;' >Geologi Pertambangan</td>
                </tr> 
               
              </table>
        </td>
    </tr>
     <!---------------->
    <tr>
        <td colspan='6' style='font-size: 8;'>
         <br />* Mohon Refresh Halaman Setiap 5 Menit Sekali Untuk Melihat Update Data Terbaru.  
        </td>
    </tr>
</table>
</div>
