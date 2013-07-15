<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
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
////////////////
if(!isset($_SESSION['kepsek'])){
    header('location: index.php?login=dulu');
}
?>

                    <?php
                if($_GET['hal']=='hasil'){
                    sambung();
                        $bts= 30;
                        $hal = $_GET['no'];
						$jur = $_GET['jur'];
                        if (!isset($hal)){
                            $mulai=0;
                            }else{
                            $mulai= $hal * $bts;
                        };
                    $sql=@mysql_query("select * from biodata_siswa where jurusan1 like '%$jur%' order by id DESC");
                    $jdt=mysql_num_rows($sql);
                    $jhal=ceil($jdt/$bts);
                    $daftar=mysql_query("Select biodata_siswa.no_reg as no,
  biodata_siswa.nama as nama,
  biodata_siswa.asal_sek as asal,
  biodata_siswa.jurusan1 as jur,
  tabel_nilai.`point` as pointx,
    siswa.status  as status
From siswa Inner Join
  biodata_siswa On siswa.no_reg = biodata_siswa.no_reg Inner Join
  tabel_nilai On tabel_nilai.no_reg = biodata_siswa.no_reg where biodata_siswa.jurusan1 like '%$jur%' order by tabel_nilai.point DESC  ");
                             ?>
							 <div class="grid_16" id="content">
							           <table width="100%" cellpadding="3" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">

                        <tr>
                            <td colspan='5'><img src='../img/icon/wong.png' width='22' height='22'> <b>Peringat Nilai Tertinggi Peserta Ujian Online</b></td></tr>
                        <tr>
						<tr><form method="post" action="?hal=hasil&jur=<?php echo $_POST['jur']; ?>"></br><td>FILTER JURUSAN :</td><td>
    <select name="jur"> 
        <option value=''>Semua Jurusan</option>
        <?php $ket = mysql_query("select * from type_soal ");
while($p=mysql_fetch_array($ket)){
echo "<option value=\"$p[ket_soal]\">$p[ket_soal]</option>\n";
} ?><INPUT type="submit" name="submit" value="Input"/></td>
</form></tr>
                            <td colspan='5'><b>Jumlah Total: <?php echo $jdt; ?></b></td>
                        </tr>
                        <tr>
                           <th width='20'>Nomor Registrasi</th>
                           <th width='20'>Nama Siswa</th>
                           <th width='20'>Asal Sekolah</th>
						    <th width='20'>Jurusan</th>
                           <th width='20'>Point</th>
                                                      <th width='20'>Status</th>
                        </tr>
                        <?php
                        while ($dt=mysql_fetch_array($daftar)){
                            $id=$dt['no_reg'];
							$status=$dt['status'];
							       if ($status==2){
							  $status ="PROSES";
						  }
						  else if ($status==3)
						  {
							  $status = "GAGAL";
						  }

							 else if ($status==4)
						  {
							  $status = "DITERIMA";
						  }
						   else if ($status==1)
						  {
							  $status = "PROSES KONFIRMASI";
						  }
						   else if ($status==0)
						  {
							  $status = "DITOLAK";
						  }
							echo "
                            <tr>                           
                            <td width='100'>".$dt['no']."</td>
                          <td width='20'>".$dt['nama']."</td>
						  <td width='20'>".$dt['asal']."</td>
						  <td width='20'>".$dt['jur']."</td>
						  <td width='20'>".$dt['pointx']."</td>
						   <td width='20'>".$status."</td>
                               
                            </tr>                            
                            ";
                        };
                        ?>
                        <tr>
                            <td colspan='4'><center> <a href='?hal=hasil&jur=<? echo $jur; ?>&no=<?php echo max($hal-1, 0); ?>'>PREV</a> | <a href='?hal=hasil&jur=<? echo $jur; ?>&<?php echo "no=".min($hal+1, $jhal+1); ?>'> NEXT</a> </center></td>
                        </tr>
                    </table>
                    </div>
               <?php };
            //*********** Jika halaman pendaftar ***********//
            ?>   
			
            
        