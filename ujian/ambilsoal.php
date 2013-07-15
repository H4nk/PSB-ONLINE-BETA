<?php
include "koneksi.php";
$data = mysql_query("SELECT * FROM tabel_soal where publish=1 ");
$json = '{"soal":[ ';
while($x = mysql_fetch_array($data)){
    $json .= '{';
    $json .= '"id_soal":"'.$x['id_soal'].'",
        "topik":"'.htmlspecialchars($x['tipe']).'",
        "pertanyaan":"'.htmlspecialchars($x['pertanyaan']).'",
        "a":"'.$x['pilihan_a'].'",
        "b":"'.$x['pilihan_b'].'",
        "c":"'.$x['pilihan_c'].'",
        "d":"'.$x['pilihan_d'].'",
        "jawaban":"'.$x['jawaban'].'"
    },';
}
$json = substr($json,0,strlen($json)-1);
$json .= ']';

$json .= '}';
echo $json;

?>
