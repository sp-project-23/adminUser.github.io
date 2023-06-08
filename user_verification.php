<?php
	
	include 'connect_db.php';
	session_start();

	$user_email = validate($_POST['u_email']);
	$user_pass = md5(validate($_POST['u_password']));  	

	function validate($d)
	{
		$t = trim($d);
		$data = stripslashes($t);
		return $data;
	}

	
	$q = "select * from user where email='$user_email' && password='$user_pass'";
	
	$result = mysqli_query($con,$q);
	
	$row = mysqli_num_rows($result);	
	
	if($row>0){		

		$f = 0;
		$record = $result->fetch_assoc();
		
		if(is_null($record['last_password_change']))
			$f = 1;
		
		$last_login = date("Y-m-d h:i:s",time());	
		
		$q = "update user set last_login = '$last_login' where email = '$user_email' && password = '$user_pass'";	
		$r = mysqli_query($con,$q);		
		
		$date1 = date_create($record['last_password_change']);
		$date2 = date_create($record['last_login']);		
		$diff = date_diff($date1, $date2);		
		$d = $diff->format("%a");		

		if($f==1)
		{
			$_SESSION['user'] = $user_email;
			$_SESSION['reset'] = 'reset';
			header('location:new_password_form.php');
		}
		else if($d>30)
		{
			$_SESSION['user'] = $user_email;
			$_SESSION['reset_30'] = 'reset30';			
			header('location:new_password_form.php');
		}
		else
		{
			$_SESSION['user'] = $user_email;
			$_SESSION['user_success'] = 'success';	
			header('location:create_task_form.php');				
		}
	}
	else
	{
		$_SESSION['user_error'] = 'error';	
		header('location:index.php');	
	}
?>