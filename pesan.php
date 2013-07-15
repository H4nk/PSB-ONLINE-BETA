<?php
error_reporting(0);
session_start();
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
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
sambung();
$umum=mysql_fetch_array(mysql_query("select anoun from sistem"));
?>
<? include 'header2.php';?><div class="grid_16" id="content">
<table width='750' cellpadding='3' cellspacing='2' border='1' align='center' id='profil'>
    
    <tr>
        <td rowspan='1' width='155' valign='top' id='kiri'>
            
        </td>
        <td rowspan='0' valign='top'>

   
 <?
                        
                         $saya=$_SESSION['identitas'];
                         $sel=mysql_query("select * from pesan where kepada='$saya'");
                         echo "<table width='700' cellpadding='0' cellspacing='0' border='0' align='center'>";
                             while($x=mysql_fetch_array($sel)){ ?>
                            <a href='#'><?php echo $x['dari']; ?> : </a>
                            <?php echo $x['isi_pesan']; ?></br>
                            <a class='link' href="panitia/pesan.php?mode=jawab&dari=<?php echo $saya; ?>&kepada=<?php echo $x['dari']; ?>&pesan=<?php echo $x['id']; ?>"><img src='img/icon/chat.png' width='22' height='22' title='Balas Pesan ini'></a>
                            <a class='link' href="panitia/pesan.php?mode=hapus&id=<?php echo $x['id']; ?>"><img src='img/icon/hapus.png' width='22' height='22' title='Hapus Pesan ini'></a></br>
                            <?php }
                         echo "</table></br>";       
                       
                  
                  ?>
				  </div>