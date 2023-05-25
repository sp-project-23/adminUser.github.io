<?php
	include 'connect_db.php';	
	date_default_timezone_set('Asia/Kolkata');
	
	$user_email = $_POST['user_email'];	
	$new_pass = md5($_POST['new_pass']);
	$d = date("Y-m-d h:i:s",time());
	
	$q = "update user set password = '$new_pass', last_password_change = '$d' where email = '$user_email'";

	$r = mysqli_query($con,$q);

	if($r)
	{
		$_SESSION['user_password_reset'] = "User Password reset successfully";
		header('location:index.php');
		return;
	}
?>