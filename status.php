<?php
error_reporting(0);
session_start();
include 'include.php';
sambung();
//$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
//logout
if($_GET['sesi']=='selesai'){
   loging($_SESSION['nama']." Keluar");
   unset($_SESSION['nama']);
   unset($_SESSION['identitas']);
   header('location: index.php');
};
//chek jika belum ada sesi
if(empty($_SESSION['nama']) && empty($_SESSION['identitas'])){
    header('location: masuk.php');
};
//mendefinisikan sesi menjadi value
$nama=$_SESSION['nama'];
$iden=$_SESSION['identitas'];
if($_GET['confirm']=='ok'){
    echo "<script type='text/javascript'>alert('Terimakasih ".$_SESSION['nama'].", Anda Telah terdaftar dalam sistem Kami !!')</script>";
    loging($_SESSION['nama']." Langkah 2");    
    sambung();    
    mysql_query("update siswa set langkah='2' where no_reg='$iden'");
};
//upload foto//
if ($_POST['unggah'] && !empty($_FILES['the_file'])){
    $file_name = $_FILES['the_file']['name']; //Membaca nama file 
    $size = $_FILES['the_file']['size']; //Membaca ukuran file 
    $file_type = $_FILES['the_file']['type']; //Membaca jenis file 
    $dir="img/upload";// Nama Folder 
    $source = $_FILES['the_file']['tmp_name']; //Source tempat upload file sementara 
    $direktori = "$dir/$file_name";
    $file_path="upload/".$iden.substr($file_name, -4);
    //echo $file_type;
    //echo $size;
    $awas=getimagesize($source);
    if($awas){
      if($file_type == 'image/png' or $file_type == 'image/jpeg' or $file_type == 'image/gif' or $file_type == 'image/pjpeg' ){
          if (move_uploaded_file($source,$file_path)){
          loging($_SESSION['nama']." Unggah Foto");
          echo "<script type='text/javascript'>alert('Foto Berhasil di uplad')</script>";
          sambung();
          mysql_query("update siswa set foto='$file_path', langkah='3' where no_reg='$iden'");
          }else { 
          echo "<script type='text/javascript'>alert('Foto Gagal Di Upload')</script>"; 
          }
      }else{ echo "<script type='text/javascript'>alert('Bukan File Gambar !!')</script>";}
    }else{
      echo "<script type='text/javascript'>alert('Bukan File Gambar !!')</script>";
    }
};
//upload foto//
//sambung();
//$umum=mysql_fetch_array(mysql_query("select anoun from sistem"));
?>
<?php include 'header2.php';?>


        <td rowspan='0' valign='top'>
        <!-- KETOKE AWITE KO KENE>  -->
         <table width='100%' border='0'>
            <tr>
                <td>
                 <div class="grid_16" id="content">

                    <div id='status' align='center'>
                    <?php
                        sambung();
                        $sikil=mysql_query("select status from siswa where no_reg='$iden'");
                        $chek=mysql_fetch_array($sikil);
						$status=$chek['status'];
						switch ($status) {

   case 0:
echo "<img src='img/icon/0.png'><br><font color='red'><b>Maaf, Anda Belum Di Terima !!<b></font>";
   break;
   case 1:
echo "<img src='img/icon/1.png'><br><font color='orange'><b>Data Anda Dalam Proses Konfirmasi Oleh Petugas Kami, Mohon tunggu dan Chek Kembali Kebenaran Data Anda !!<b></font>";
   break;
   case 2:
echo "<img src='img/icon/2.png'><br><font color='#66cc00'><b>Selamat Anda Lulus Seleksi ADM. Silahkan Tunggu Informasi Untuk Tes Online<b></font>";
   break;
   case 3:
echo "<img src='img/icon/0.png'><br><font color='#red'><b>Selamat !! <br>Maaf Anda Gagal Pada Tes Online !!<b></font>";
   break;
   case 4:
echo "<img src='img/icon/2.png'><br><font color='#66cc00'><b>Selamat !! <br>Selamat Anda Lulus Tes Online dan di terima di sekolah SMK N 2 Sawah Lunto. Silahkan Hubungin Panitia Penerimaan Untuk informasi selanjutnya.<b></font>";
   break;
   default:
echo "<img src='img/icon/melet.png'><br><font color='blue'><b>Data Tidak ditemukan.<b></font>";
   }

                    ?>
                    </div>
                </td>
            </tr>
            
         </table>
       
        </td>

</table>    
    
</body>
</html>