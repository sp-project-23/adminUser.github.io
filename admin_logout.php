<?php
session_start();
unset($_SESSION['create_user']);
//unset($_SESSION['admin_name']);
$_SESSION['admin_logout'] = "Admin logged out successfully";
header("Location:index.php");
?>