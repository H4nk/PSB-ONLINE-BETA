<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['kepsek'])){
   header('location: index.php'); 
}else{
include 'inti.php';
loging($_SESSION['kepsek']." Download File Report Exel");
exel();
};
?>