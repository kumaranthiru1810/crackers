<?php 
ob_start();
session_start();
include 'admin/inc/config.php';
unset($_SESSION['customer']);
unset($_SESSION['cust_name']);
unset($_SESSION['cust_id']);
header("location:index.php"); 
?>