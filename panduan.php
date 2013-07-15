<?php
error_reporting(E_ALL ^ (E_NOTICE | E_WARNING));
session_start();
if(isset($_SESSION['nama']) && isset($_SESSION['identitas'])){
    header('location: langkah2.php');
};
include 'include.php';
sambung();
$anoun=mysql_fetch_array(mysql_query("select anoun from sistem"));
 ?>
<? include'header.php';
include 'menu.php'; ?>
Informasi Panduan Di sini