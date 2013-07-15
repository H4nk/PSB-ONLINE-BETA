<?php
error_reporting(0);
session_start();
sambung();
//keluar//
if($_GET['keluar']=='yo'){ 
    sambung();
    $nama=$_SESSION['panitia'];
    mysql_query("update panitia set sedang_login='tidak' where nama='$nama'");
    unset($_SESSION['panitia']);
    loging($nama." Log Out");
}?>

 <div class="grid_16" id="content">
     <h1>Daftar Soal </h1>
     <a onclick='window.location="?hal=input_soal"' href='#' title='Lihat Statistik Pendaftaran'><img src="../img/icon/stat.png" >Tambah Soal</a>
       <?php
		$bts= 5;
        $hal = $_GET['no'];
        if (!isset($hal)){
        $mulai=0;
        }else{
        $mulai= $hal * $bts;};
		$query= "select * from tabel_soal,type_soal where tabel_soal.tipe=type_soal.id_soal limit $mulai, $bts";
		$exec=mysql_query($query) or die("Query failed with error: ".mysql_error());
		$no=$mulai + 1;?> 
        <table width="100%" cellpadding="0" cellspacing="0" id="box-table-a" summary="Employee Pay Sheet">
			<tr><?php while( $row = mysql_fetch_array($exec)){	?>
           		<td><?php echo $no++;?>.</font></td><td><strong><?php echo $row['pertanyaan'];?></strong></td>
            </tr>
            <tr>
           		<td></td><td>A. <?php echo $row['pilihan_a'];?></td>
            </tr>
            <tr>
           		<td></td><td>B. <?php echo $row['pilihan_b'];?></td>
            </tr>
            <tr>
           		<td></td><td>C. <?php echo $row['pilihan_c'];?></td>
            </tr>
            <tr>
           		<td></td><td>D. <?php echo $row['pilihan_d'];?></td>
            </tr>
            <tr>
           		<td></td><td>JAWABAN : <b><?php echo $row['jawaban'];?></b> &raquo; PUBLISH : <b><?php echo ucwords($row['publish']);?></b> &raquo;
               </font>
                <a href="?hal=edit&id=<?php echo $row['id_soal']?>" title="Edit"><img src="../img/icon/edit.png" /></a> <a href="?page=delete&id=<?php echo $row['id_soal']?>" title="Delete" onclick="return confirm('Apakah anda yakin akan menghapus pertanyaan ini ?')"><img src="../img/icon/hapus.png" /></a>
                </td>
            </tr>
               
           
                <?php
		}
		?>
		
                 <td colspan='4'><center> <a href='?hal=soal&no=<?php echo max($hal-1, 0); ?>'>PREV</a> | <a href='?hal=soal&<?php echo "no=".min($hal+1, $jhal+1); ?>'> NEXT</a> </center></td>
         
		
        </table>
</div>