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
if(!isset($_SESSION['panitia'])){
    header('location: index.php?login=dulu');
}
?>

                    <?php
                if($_GET['hal']=='hasil'){
                    sambung();
                        $bts= 30;
                        $hal = $_GET['no'];
                        if (!isset($hal)){
                            $mulai=0;
                            }else{
                            $mulai= $hal * $bts;
                        };
                    $sql=@mysql_query("select * from biodata_siswa order by id DESC");
                    $jdt=mysql_num_rows($sql);
                    $jhal=ceil($jdt/$bts);
                    $daftar=mysql_query("Select tabel_nilai.no_reg as no_reg,
  tabel_nilai.point as point,
  siswa.status as status
From tabel_nilai Inner Join
  siswa On tabel_nilai.no_reg = siswa.no_reg order by tabel_nilai.point DESC  ");
                             ?>
							 <div class="grid_16" id="content">
							           <table width="100%" cellpadding="3" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">

                        <tr>
                            <td colspan='5'><img src='../img/icon/wong.png' width='22' height='22'> <b>Peringat Nilai Tertinggi Peserta Ujian Online</b></td></tr>
                        <tr>
                            <td colspan='5'><b>Jumlah Total: <?php echo $jdt; ?></b></td>
                        </tr>
                        <tr>
                           <th width='20'>Nomor Registrasi</th>

                           <th width='20'>Point</th>
                                                      <th width='20'>Status</th>

                            <th>Menu</th>
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
							echo "
                            <tr>                           
                            <td width='100'>".$dt['no_reg']."</td>
                          <td width='20'>".$dt['point']."</td>
						   <td width='20'>".$status."</td>
                                <td>
                                    <a href='utama.php?lulus=".$dt['no_reg']."' title='LULUS'><img src='../img/icon/centang.png' width='22' height='22'></a>
                                    <a href='utama.php?gagal=".$dt['no_reg']."' title='Tidak Diterima'><img src='../img/icon/stop.png' width='22' height='22'></a>
                                                                                               
                            </td>
                            </tr>                            
                            ";
                        };
                        ?>
                        <tr>
                            <td colspan='4'><center> <a href='?hal=hasil&no=<?php echo max($hal-1, 0); ?>'>PREV</a> | <a href='?hal=hasil&<?php echo "no=".min($hal+1, $jhal+1); ?>'> NEXT</a> </center></td>
                        </tr>
                    </table>
                    </div>
               <?php };
            //*********** Jika halaman pendaftar ***********//
            ?>   
			
            
        