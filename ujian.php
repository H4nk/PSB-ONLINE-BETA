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
<? include 'header2.php';?>
<div class="grid_16" id="content">
  <table width='750' cellpadding='3' cellspacing='2' border='1' align='center' id='profil'>
    
    <tr>
        <td rowspan='1' width='155' valign='top' id='kiri'>
            
        </td>
        <td rowspan='0' valign='top'>
        <!-- KETOKE AWITE KO KENE>  -->
         <table width='100%' border='0'>
        <tr><b style='color: blue; font-size: 20px;'>Tata Tertib Ujian Online :</b></br>
1. Peserta datang ke tempat ujian 30 menit sebelum waktu ujian dimulai.</br>
2. Peserta mengenakan sepatu dan pakaian rapi, tidak diperkenankan memakai kaos oblong (tanpa kerah), jaket.</br>
3. Menunjukkan kartu ujian masing-masing kepada pengawas ujian / panitia dan mencari komputer yang sudah disediakan.</br>
4. Tidak diperkenankan membawa tas ke dalam ruang ujian, tas ditempatkan di tempat yang telah disediakan.</br>
5. Membawa alat tulis sendiri, tidak diperkenankan membawa catatan dalam bentuk apapun ke ruang ujian.</br>
6. Tidak mengaktifkan handphone selama ujian berlangsung.</br>
7. Mengerjakan soal sendiri dan tidak diperbolehkan mencontoh jawaban atau melakukan kecurangan dalam bentuk apapun.</br>
8. Tidak meninggalkan tempat ujian selama ujian berlangsung.</br>
9. Mematuhi semua peraturan diatas. Pelanggaran terhadap tata tertib ini akan dikenakan sanksi termasuk pencabutan status sebagai calon siswa.</br>
10. Untuk alat hitung silahkan menggunakan kalkulator pada komputer sendiri.</br>
11. Dilarang Browsing selain 99.99.99.99</br>
12. Melakukan ganti DNS akan menghambat anda melakukan ujian.</br>
13. Sebelum ujian aktifkan Javascript pada browser masing-masing, bagi yang tidak tahu silahkan tanya sama petugas ujian.</br>
14. Sewaktu anda melakukan Ujian di larang Untuk melakukan klik Tombol "BACK".</br>
15. Kesalahan klik tombol "<b style='color: red; font-size: 16px;'>BACK</b>" membuat anda tidak dapat masuk lagi ke menu Ujian Online dan anda dinyatakan "SELESAI" mengikuti ujian .</br>
16. Soal akan di berikan sebanyak 20 buah dengan waktu 200 detik.</br>
17. Soal bersifat umum</br>
18. Dilarang untuk melakukan <b style='color: red; font-size: 16px;'>Refresh atau tekan F5</b>.</br>
19. Jika peserta melakukan <b style='color: red; font-size: 16px;'>Refresh</b> maka peserta akan menjawab ulang pertanyaan dengan waktu yang tersisa.</br>
20. <b style='color: red; font-size: 16px;'>Jika waktu sudah habis tapi peserta masih menjawab dengan mematikan javascript, maka resiko semua jawaban anda menjadi 0.</b></br>
21. Perhitungan waktu akan di lakukan oleh sistem.</br>
22. <b style='color: red; font-size: 16px;'>Tidak ada sistem kembali menjawab soal yang belum terjawab.</b></br>
23. perhitungan nilai adalah kalkulasi jawaban benar, tidak ada pengurangan nilai jika jawaban salah.</br>
24. Panitia tidak bertanggung jawab atas kesalahan peserta sendiri.</br>
25. Hubungi panitia jika ada Tata tertib ini yang belum di mengerti.</br>
26. Belum masuk ke tahap ujian, silahkan berdoa menurut kepercayaan masing.</br>
27. Jangan melakukan kecurangan,Panitia tidak mengetahui anda curang, tapi <b style='color: blue; font-size: 16px;'>Tuhan Yang Maha Esa Maha Melihat </b>.</br>
28. Semoga anda sukses.</br>
29. Keputusan panitia tidak dapat diganggu gugat</br>
30. <b style='color: red; font-size: 16px;'>Jika anda mengetahui kecurangan yang di lakukan panitia silahkan hubungi administrator di <b style='color: blue; font-size: 16px;'>xmoensen@gmail.com </b> dengan memberikan bukti kecurangan yang dilakukan panitia tersebut. Biodata pelapor akan disembunyikan</b></br>
          <form>
                    <td colspan='3'><input type='radio' name='setuju' onClick="daftar.disabled=false;"><font size='2'><i><b>Saya setuju dengan peraturan tersebut, dan tidak akan menuntut panitia.</b></i></font></td>
                </tr>
                <tr><td colspan='3' align='center'><input class='inpuoet' name='daftar' type='submit' value='SETUJU' style='background-color: #ffa20f;' disabled='disabled'  onClick="window.open('ujian_online.php?no_reg=<?php echo $iden; ?>','popupwindow','scrollbars=yes, width=750,height=600');"></td></tr>
         </table>
         </form>
        </td>
    </tr>
   
</table>    
    
</body>
</html>
</div>