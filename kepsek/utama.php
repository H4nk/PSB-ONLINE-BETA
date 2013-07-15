<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
include 'inti.php';
//keluar//
if($_GET['keluar']=='yo'){ 
    sambung();
    $nama=$_SESSION['kepsek'];
    mysql_query("update kepsek set sedang_login='tidak' where nama='$nama'");
    unset($_SESSION['kepsek']);
    loging($nama." Log Out");
}
//**************Hapus Record Daftar Peserta *************//
if($_GET['hapus']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['hapus']);
    $hps=mysql_query("delete from biodata_siswa where no_reg='$noreg'");
    if($hps){
        loging($_SESSION['panitia'].", Menghapus ".$noreg);
        echo "<script type='text/javascript'>alert('Data Sudah Dihapus !')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=list'</script>";
    }
 }
 if($_GET['terima']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['terima']);
	$terima=mysql_query("update siswa set status=2 where no_reg='$noreg'");
    if($terima){
        loging($_SESSION['panitia'].", Terima ".$noreg);
        echo "<script type='text/javascript'>alert('siswa diterima!')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=list'</script>";
    }
 }
 if($_GET['ujian']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['ujian']);
	$terima=mysql_query("update siswa set langkah=5 where no_reg='$noreg'");
    if($terima){
        loging($_SESSION['panitia'].", Set Waktu Siswa Ujian Online ".$noreg);
        echo "<script type='text/javascript'>alert('Siswa diberikan Waktu untuk Ujian Online')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=list'</script>";
    }
 }
  if($_GET['tolak']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['tolak']);
	$tolak=mysql_query("update siswa set status=0 where no_reg='$noreg'");
    if($tolak){
        loging($_SESSION['panitia'].", tolak ".$noreg);
        echo "<script type='text/javascript'>alert('Siswa ditolak!')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=list'</script>";
    }
 }
 if($_GET['lulus']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['lulus']);
	$terima=mysql_query("update siswa set status=4 where no_reg='$noreg'");
    if($terima){
        loging($_SESSION['panitia'].", Terima ".$noreg);
        echo "<script type='text/javascript'>alert('siswa diterima!')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=hasil'</script>";
    }
 }
  if($_GET['gagal']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['gagal']);
	$terima=mysql_query("update siswa set status=3 where no_reg='$noreg'");
    if($terima){
        loging($_SESSION['kepsek'].", Terima ".$noreg);
        echo "<script type='text/javascript'>alert('siswa gagal!')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=hasil'</script>";
    }
 }
 if($_GET['id']){
    sambung();    
    $noreg=mysql_real_escape_string($_GET['id']);
	$hapus=mysql_query("delete from tabel_soal where id_soal='$noreg'");
    if($hapus){
        loging($_SESSION['kepsek'].", Menghapus ".$hapus);
        echo "<script type='text/javascript'>alert('Data Sudah Dihapus !')</script>";
        echo "<script type='text/javascript'>window.location='utama.php?hal=soal'</script>";
    }
 }
////////////////
if(!isset($_SESSION['kepsek'])){
    header('location: index.php?login=dulu');
}
?>
<html>

<head>
<? include "header.php"; ?>
        </td>
 </tr>
    <tr>   
        <td colspan='4' valign='top' id='kontainer'>
        <!-- ISi Tengah -->
            <?php
            /////////////// Jika halaman Log /////////
                if($_GET['hal']=='log'){
                    sambung();
                    $q=mysql_fetch_array(mysql_query("select file_log from sistem "));
                    echo " <div class='grid_16' id='content'>
 <table border='0' width='100%' align='center' style='font-size: 12px;'><tr><td colspan='3'><img src='../img/icon/jejak.png' width='22' height='22'>Log Statistik Website - Jejak Aktifitas website</td><tr>";
                    echo "<tr><td width='50'>&nbsp;</td><td>";
                    buka_log("log/".$q['file_log']);
                    echo "</td>";
                    echo "</table></div>";
                    putus();
                };
            ////*********** Jika halaman Log ***********//
            //*********** Jika halaman statistik ***********///
                if($_GET['hal']=='stat'){
                    include 'statistik.php';
                };
				 if($_GET['hal']=='soal'){
					include 'soal.php';
                };
				if($_GET['hal']=='hasil'){
					include 'hasil.php';
                };
				 if($_GET['hal']=='input_soal'){
					include 'input_soal.php';
                };
					 if($_GET['hal']=='edit'){
					include 'edit_soal.php';
                };
            ///*********** Jika halaman statistik ***********///
             ///*********** Jika halaman pengumuman ***********///
                if($_GET['hal']=='pengumuman'){
                    sambung();
                    if($_POST['konten']){
                        $umum=mysql_real_escape_string($_POST['konten']);
                        $exe=mysql_query("update sistem set anoun='$umum' where id='1'");
                        if ($exe){
                            loging($_SESSION['panitia']." Mengubah Pengumuman.");
                            echo "<script type='text/javascript'>alert('Berhasil di Umumkan');</script>";
                        }
                    }
                    //--------untuk melihat pengumuman--------//
                    $sam=mysql_query("select anoun from sistem");
                    $last=mysql_fetch_array($sam);
                    ?>
					 <div class="grid_16" id="content">
                    <form action='<?php echo $_SERVER['REQUEST_URI']; ?>' method='post'>
                    <table border='1' cellspacing='0' cellpadding='3' width='100%'>
                        <tr>
                            <td><img src='../img/icon/mic.png' width='22' height='22'> Pengumuman</td>
                        </tr>
                        <tr>
                            <td width='100%'>
                                <textarea name="konten" rows="4" cols="30" style="margin-top: 2px; margin-bottom: 2px; height: 68px; margin-left: 2px; margin-right: 2px; width: 671px; "><?php echo $last['anoun']; ?></textarea>
                            </td>
                        </tr>
                        <tr>
                            <td><input type='submit' value='Umumkan'></td>
                        </tr>
                    </table>
                    </form>
					</div>
                    <?php
                };
            //*********** Jika halaman pengumuman ***********//
             //*********** Jika halaman pendaftar ***********//
                if($_GET['hal']=='list'){
                    sambung();
                        //keperluan halaman next dll
                        $bts= 30;
                        $hal = $_GET['no'];
						$jur =$_GET['jur'];
                        if (!isset($hal)){
                            $mulai=0;
                            }else{
                            $mulai= $hal * $bts;
                        };
                    $sql=@mysql_query("select * from biodata_siswa order by id DESC");
                    $jdt=mysql_num_rows($sql);
                    $jhal=ceil($jdt/$bts);
                    $daftar=mysql_query("Select biodata_siswa.*,
  biodata_siswa.asal_sek,
  siswa.status
From siswa Inner Join
  biodata_siswa On biodata_siswa.no_reg = siswa.no_reg and biodata_siswa.jurusan1 like '%$jur%' order by biodata_siswa.no_reg ASC  limit $mulai, $bts");
                    
                    ?>
					<div class="grid_16" id="content">
					          <table width="100%" cellpadding="3" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
                        <tr>
                            <td colspan='9'><img src='../img/icon/wong.png'> <b>Daftar Peserta PSB Online</b></td></tr>
							<tr><form method="post" action="?hal=list&jur=<?php echo $_POST['jur']; ?>"></br><td>FILTER JURUSAN :</td><td>
    <select name="jur"> 
        <option value=''>Semua Jurusan</option>
        <?php $ket = mysql_query("select * from type_soal ");
while($p=mysql_fetch_array($ket)){
echo "<option value=\"$p[ket_soal]\">$p[ket_soal]</option>\n";
} ?>
    <INPUT type="submit" name="submit" value="Input"/></td>
</form></tr>


                        <tr>
                            <td colspan='9'><b>Jumlah Total: <?php echo $jdt; ?></b></td>
                        </tr>
                        <tr>
                            <th width='11'>No Registrasi</th>
                            <th width='10'>Nama Pendaftar</th>
                            <th width='15'>Asal Sekolah</th>
                           <th width='20'>Tempat,Tgl Lahir</th>
						   <th width='20'>Jurusan</th>
						   <th width='20'>NISN</th>
						   <th width='20'>Nomor Ijazah</th>
						   <th width='20'>Status</th>
                            <th>Menu</th>
                        </tr>
                        <?php
                        while ($dt=mysql_fetch_array($daftar)){
                            $id=$dt['no_reg'];
							$status = $dt['status'];
                          if ($status==0){
							  $status ="DITOLAK";
						  }
						  else if ($status==1)
						  {
							  $status = "PROSES KONFIRMASI";
						  }

							 else if ($status==2)
						  {
							  $status = "LULUS ADM";
						  }
						   else if ($status==3)
						  {
							  $status = "GAGAL TES ONLINE";
						  }
						   else if ($status==4)
						  {
							  $status = "DITERIMA";
						  }
                            echo "
                            <tr>                           
                            <td width='100'>
                                ".$dt['no_reg']."</td>
                                <td width='150'>".$dt['nama']."</td>
                                <td width='200'>".$dt['asal_sek']."</td>
								<td width='200'>".$dt['tem_lahir']."</br>".$dt['tgl']."-".$dt['bln']."-".$dt['tahun']."</td>
								 <td width='200'>".$dt['jurusan1']."</td>
								 <td width='200'>".$dt['nisn']."</td>
								  <td width='200'>".$dt['no_ijazah']."</td>
								 <td width='20'>".$status."</td>
                                <td>
                                    <a href='utama.php?terima=".$dt['no_reg']."' title='Terima Pendaftaran'><img src='../img/icon/centang.png' width='22' height='22'></a>
                                    <a href='utama.php?tolak=".$dt['no_reg']."' title='Tidak Diterima'><img src='../img/icon/stop.png' width='22' height='22'></a>
									<a href='utama.php?ujian=".$dt['no_reg']."' title='Set Ujian Online'><img src='../img/icon/ujian.png' width='22' height='22'></a>
                                    &nbsp;&nbsp; <a title='Hapus Peserta' href='utama.php?hapus=".$dt['no_reg']."' onclick='return confirm(\"Yakin Dihapus?\"); '><img src='../img/icon/hapus.png' width='22' height='22'></a>
                                    <a title='Lihat Detail Peserta' onclick=\"window.open('detail.php?lihat=".$dt['no_reg']."','popupwindow','scrollbars=yes, width=600,height=600');\" href='#'><img src='../img/icon/goleki.png' width='22' height='22'></a>
                                                          
                            </td>
                            </tr>                            
                            ";
                        };
                        ?>
                        <tr>
                            <td colspan='9'><center> <a href='?hal=list&no=<?php echo max($hal-1, 0); ?>'>PREV</a> | <a href='?hal=list&<?php echo "no=".min($hal+1, $jhal+1); ?>'> NEXT</a> </center></td>
                        </tr>
                    </table>
					</div>
                    
               <?php };
            //*********** Jika halaman pendaftar ***********//
            ?>   
            <div class="grid_16" id="content">
		<? include 'footer.php'; ?>
			</div>
        <!-- ISi Tengah -->
        </td>
    </tr>
	</html>

</head>

  