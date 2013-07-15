<?php

$ap=$_GET['ap'];
$ak=$_GET['ak'];
$pj=$_GET['pm'];
$tkj=$_GET['tkj'];
$tei=$_GET['tei'];
    Header("Content-Type:image/png");

    $data[0] = $ap; //biru
    $data[1] = $ak; //ijo nom
    $data[2] = $pj; //ungu
    $data[3] = $tkj; //oranye
    $data[4] = $tei; //coklat
    // --- deklarasi variabel --- //
    $total = 0;
    $d = array();
    $kor_x = array();
    $kor_y = array();
    $t_x = array();
    $t_y = array();
    // --- menentukan besar sudut setiap bagian pie --- //
    for($j=0;$j<=4;$j++) {
        $total += $data[$j];
    }
    $d[0] = 0;
    for($i=1;$i<=5;$i++) {
        $d[$i] = ($data[$i-1]/$total) * 360;
        $d[$i] += $d[$i-1];
    }
    // --- menentukan warna --- //
    $img = ImageCreate(300,300);
    $warna[0] = ImageColorAllocate($img,51,204,255);
    $warna[1] = ImageColorAllocate($img,153,204,51);
    $warna[2] = ImageColorAllocate($img,153,51,204);
    $warna[3] = ImageColorAllocate($img,255,153,0);
    $warna[4] = ImageColorAllocate($img,153,51,0);
    $hitam = ImageColorAllocate($img,165,424,2);
    $putih = ImageColorAllocate($img,156,152,129);
    ImageFill($img,0,0,$putih);
    // --- membentuk pie --- //
    for($k=1;$k<=5;$k++) {
    // --- menggambar bagian-bagian pie --- //
    ImageArc($img,150,150,250,250,$d[$k-1],
    $d[$k],$hitam);
        // --- mencari koordinat batas --- //
        $kor_x[$k] = round(150+(125*cos(deg2rad($d[$k-1]))));
        $kor_y[$k] = round(150+(125*sin(deg2rad($d[$k-1]))));
        // --- mencari titik tengah --- //
        $t = round(($d[$k-1]+$d[$k])/2);
        $t_x[$k] = round(150+(62.5*cos(deg2rad($t))));
        $t_y[$k] = round(150+(62.5*sin(deg2rad($t))));
        ImageLine($img,150,150,$kor_x[$k],$kor_y[$k],$hitam);
    }
    // --- mewarnai bagian pie --- //
    for($k=1;$k<=5;$k++) {
        ImageFillToBorder($img,$t_x[$k],$t_y[$k],$hitam,$warna[$k-1]);
    }
    ImagePNG($img);

?>