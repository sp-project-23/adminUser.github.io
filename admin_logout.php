<?php
session_start();
unset($_SESSION['admin']);
$_SESSION['admin_logout'] = "admin logout";
header("Location:index.php");
?>