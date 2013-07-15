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
 <div class="grid_16" id="content">
<table width='100%' cellpadding='3' cellspacing='2' border='3' align='center' id='profil'>
          <td> <center><h1>SILAHKAN UPLOAD FOTO TERLEBIH DAHULU, BARU CETAK FOMULIR</h1></center></tr>
        </td>
		<tr>
        <td rowspan='0' valign='top'>
        <!-- KETOKE AWITE KO KENE>  -->
		<h2>Upload Foto </h2>
         <table width='100%' border='0'>
                
                    <div id='form_upload'>
                        <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post' enctype='multipart/form-data' onsubmit='print.disabled=false;'>
                            <input type='file' name='the_file' onclick='unggah.disabled=false;'><br>
                            <input type='submit' name='unggah' value='Unggah Foto' disabled='disabled'>
                        </form>
                    </div>
        </table>
           </td>
    </tr>

</table>    
    </div>
</body>
</html>