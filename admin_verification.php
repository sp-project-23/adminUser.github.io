<?php
	include 'connect_db.php';

	$admin_email = trim($_POST['a_email']);
	$admin_pass = trim($_POST['a_password']);

	$s = "select * from admin where email='$admin_email' && password='$admin_pass'";

	$result = mysqli_query($con,$s);
	$row = mysqli_num_rows($result);

	if($row==1)
	{
		//$_SESSION['admin_name'] = $admin_email;
		$_SESSION['admin_success'] = "Admin logged in successfully";
		header('location:create_user_form.php');
		return;
	}
	else
	{
		$_SESSION['admin_error'] = "Invalid Admin Email or Password";
		header('location:index.php');
		return;
	}
?>