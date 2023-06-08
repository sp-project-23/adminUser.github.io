<?php
	include 'connect_db.php';
	session_start();
	
	$admin_email = validate($_POST['a_email']);
	$admin_pass = validate($_POST['a_password']);

	function validate($d)
	{
		$t = trim($d);
		$data = stripslashes($t);
		return $data;
	}

	$s = "select * from admin where email='$admin_email' && password='$admin_pass'";

	$result = mysqli_query($con,$s);
	$row = mysqli_num_rows($result);

	if($row==1)
	{
		$_SESSION['admin'] = $admin_email;	
		$_SESSION['admin_success'] = 'success';	
		header('location:create_user_form.php');
	}
	else
	{
		$_SESSION['admin_error'] = 'error';	
		header('location:index.php');
	}
?>