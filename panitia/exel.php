<?php
error_reporting(0);
session_start();
if(!isset($_SESSION['panitia'])){
   header('location: index.php'); 
}else{
include 'inti.php';
loging($_SESSION['panitia']." Download File Report Exel");
exel();
};
?>