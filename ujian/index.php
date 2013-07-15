<html>
<head>
<title>Kuis Online</title>
</head>
<body bgcolor="#FFFFCC"  onunload=keluar()>
<center>
<p>&nbsp;</p>
<p>&nbsp;</p>
<p>&nbsp;</p>
<form action="soal.php" method="get">
Nama: <br>
<input type=text name=nama><p>
Jenis soal: <br>
<select name="topik">
<?php
include "koneksi.php";
$topik = mysql_query("SELECT DISTINCT tipe FROM tabel_soal");
while($t = mysql_fetch_array($topik)){
    echo "<option>".$t['tipe']."</option>\n";
}
?>
</select>
<p>
<input type=submit value="mulai">
</body>
</html>
