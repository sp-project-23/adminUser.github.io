<?php
session_start();
unset($_SESSION['add_task']);
//unset($_SESSION['user_name']);
$_SESSION['user_logout'] = "User logged out successfully";
header("Location:index.php");
?>