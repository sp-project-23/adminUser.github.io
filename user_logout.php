<?php
session_start();
unset($_SESSION['user']);
$_SESSION['user_logout'] = "user logout";
header("Location:index.php");
?>