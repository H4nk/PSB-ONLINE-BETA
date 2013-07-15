<?php
session_start();
include 'inti.php';
?>
<html>
<head><title>DDD</title></head>
<body>
<?php
sambung();

if($_GET['lihat']){
$nomer=mysql_real_escape_string($_GET['lihat']);
//echo $nomer;
$pilih=mysql_query("select * from biodata_siswa where no_reg='$nomer'");
$i=mysql_fetch_array($pilih);
echo $i['nama'];
};

?>
</body>
</html>