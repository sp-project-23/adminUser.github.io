<?php
	include 'connect_db.php';
	session_start();

	$fn = $_POST['fname'];
	$ln = $_POST['lname'];
	$em = $_POST['email'];
	$ph = $_POST['phone'];			
	$pw = md5($_POST['password']);
	//$cap = $_POST['captcha'];
					
	$q = "insert into user(first_name,last_name,email,phone,password) values ('$fn','$ln','$em','$ph','$pw')";

	$r = mysqli_query($con,$q);

	if($r){
		$_SESSION['pass'] = $_POST['password'];
		$_SESSION['create_user'] = "User created successfully";
		header('location:create_user_form.php');
		return;	
	}
?>