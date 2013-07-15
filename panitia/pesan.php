<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
?>
<html>
<head>
<title>Pesan !</title>
<link rel='Shortcut Icon' href='../img/icon/amplop.png' type='image/png' />
<link rel='stylesheet' href='panitia.css'>
</head>
<body bgcolor='lightblue'>
<?php
include 'inti.php';
sambung();
$panitia=$_SESSION['panitia'];
$siswa=$_SESSION['identitas'];
$penerima=mysql_fetch_array(mysql_query("select * from panitia"));
if (isset($_SESSION['identitas'])){ //----------jika ada sesi siswa ------------//
    if ($_GET['mode']=='kirim'){
        
        if($_POST['pesan']){
            $kepada=$_POST['penerima'];
            $isi=mysql_real_escape_string($_POST['pesan']);
            //echo $isi;
            $isi=str_replace('\n', '<br>', $isi);
            sambung();
            $kirim=mysql_query("insert into pesan values (NULL, '$siswa', '$kepada', '$isi', DEFAULT)");
            if($kirim){
                echo "<script type='text/javascript'>alert('Pesan Berhasil di Kirim !!');</script>";
                echo "<script type='text/javascript'>window.close();</script>";
            }else{
                echo "<script type='text/javascript>alert('Pesan gagal terkirim, mohon di cek kembali !);</script>";
            };
        };
        ?>
        <form action='<?php echo $_SERVER['REQUEST_URI']; ?>' method='post' style='border-radius:4px 4px 4px 4px;' >
        <table id='pesenan' border='0' cellpadding='2' cellspacing='2' style='background-color: lightblue; box-shadow: 5px 5px 7px #222;' align='center'>
            <tr>
                <td width='130'>Kirim Kepada :</td>
                <td align='left'>
                    <select name='penerima'>
                        <?php
                        $str=mysql_query("select * from panitia");
                        while($sq=mysql_fetch_array($str))
                            {
                                echo "<option value='".$sq['nama']."'>".$sq['nama']."</option>";
                            };
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td colspan='3'><textarea name="pesan" style="margin-top: 2px; margin-bottom: 2px; height: 230px; margin-left: 2px; margin-right: 2px; width: 341px; "></textarea></td>
            </tr>
            <tr>
                <td colspan='4'><input type='submit' value='Kirim'></td>
            </tr>
        </table>
        </form>
        <?php
    };
}elseif(isset($_SESSION['panitia'])){ //*****jika login panitia*****//
    if($_GET['mode']=='lihat'){
    sambung();
    $saya=$_SESSION['panitia'];
    $sel=mysql_query("select * from pesan where kepada='$saya'");
    echo "<table width='700' cellpadding='5' cellspacing='3' border='0' align='center'>";
        while($x=mysql_fetch_array($sel)){ ?>
            <tr>
                <td valign='top' width='120' class='inbux' style='background-color: lightblue;'>
                    <img src='../img/icon/amplop.png' width='22' height='22' title='Dari Peserta'><a class='link' style='color: green;' href='detail.php?detil=<?php echo $x['dari']; ?>'><?php echo $x['dari']; ?> : </a>
                </td>
            </tr>            
            <tr>
                <td class='inbux'>
                    <?php echo $x['isi_pesan']; ?><br><br>
                    <a class='link' href="?mode=jawab&dari=<?php echo $saya; ?>&kepada=<?php echo $x['dari']; ?>&pesan=<?php echo $x['id']; ?>"><img src='../img/icon/chat.png' width='22' height='22' title='Balas Pesan ini'></a>
                    <a class='link' href="?mode=hapus&id=<?php echo $x['id']; ?>"><img src='../img/icon/hapus.png' width='22' height='22' title='Hapus Pesan ini'></a>
                
                </td>
                <td width='150' valign='top'>
                    </td>
            </tr>
        <?php }
    echo "</table>";       
    };

}else{
    echo "<script type='text/javascript'>alert('Anda belum Login');</script>";
    echo "<script type='text/javascript'>window.close();</script>";
};
//****************modus jawab********************//
if ($_GET['mode']=='jawab'){
    if(isset($_POST['kirim'])){
        sambung();
        $pid=mysql_real_escape_string($_GET['pesan']);
        $d=mysql_real_escape_string($_POST['dari']);
        $k=mysql_real_escape_string($_POST['kepada']);
        $s=mysql_real_escape_string($_POST['pesan']);
        $s=str_replace('\n', '<br>', $s);
        $krm=mysql_query("insert into pesan values (NULL, '$d', '$k', '$s', DEFAULT)");
        if($krm){
            echo "<script type='text/javascript'>alert('Pesan Berhasil di Kirim');</script>";
            mysql_query("update pesan set dibaca='1' where id='$pid'");
        }else{
            echo "<script type='text/javascript'>alert('Pesan Gagal di Kirim');</script>";
        }
    }
?>
<form action='<?php echo $_SERVER['REQUEST_URI']; ?>' method='post'>       
    <table>
    
        <tr>
            <td>Dari:</td><td><input name='dari' type='text' value='<?php echo $_GET['dari']; ?>' readonly='readonly' char='2'></td>
        </tr>
        <tr>
            <td>Kepada:</td><td><input name='kepada' type='text' value='<?php echo $_GET['kepada']; ?>' readonly='readonly' char='2'></td>
        </tr>
        <tr>
            <td colspan='3'><textarea name='pesan' rows='10' cols='40'></textarea></td>
        </tr>
        <tr>
            <td>
                <input type='submit' value='Kirim' name='kirim'>
            </td>
        </tr>
    </table>
</form>
<?php };

//*****************Hapus****************//
if($_GET['mode']=='hapus'){
    sambung();
    $pesid=mysql_real_escape_string($_GET['id']);
    $hp=mysql_query("delete from pesan where id='$pesid'");
    if($hp){
        echo "<script type='text/javascript'>alert('Pesan Di Hapus');</script>";
        echo "<script type='text/javascript'>window.location='?mode=lihat';</script>";
    }else{
        echo "Failed";
    }
}
?>
</body>
</html>