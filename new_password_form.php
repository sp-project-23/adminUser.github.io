<!DOCTYPE html>
<head>
	<title>User Password Reset Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>

<div class="container">
	<div class="login-box">
	<div class="row">
	
	<div class="col-md-6 login-right">
		<h2> Reset Password</h2>
		<?php
			session_start();
			if(isset($_SESSION['reset_password'])){
				echo "<div align=left><font color=red>".$_SESSION['reset_password']."</font></div>";
				session_destroy();
			}
		?>	
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">			

			<div class="form-group">
				<input type="password" name="new_pass" class="form-control" placeholder="Enter new password" required>
			</div>
			<div class="form-group">
				<input type="hidden" name="user_email" class="form-control" value="<?php echo $_SESSION['user_email']; ?>" required>
			</div>						
			<input type="submit" class="btn btn-success" value="Submit" >			
			
		</form>			

	</div>		
</div>
</div>
</body>
</html>
<?php
	$con = mysqli_connect('localhost','root','','admin_user') or die('Unable To connect');
	date_default_timezone_set('Asia/Kolkata');

	if($_SERVER['REQUEST_METHOD']=='POST'){
	
		$user_email = $_REQUEST['user_email'];	
		$new_pass = md5($_REQUEST['new_pass']);
		$d = date("Y-m-d h:i:s",time());
		
		$q = "update user set password = '$new_pass', last_password_change = '$d' where email = '$user_email'";

		$r = mysqli_query($con,$q);

		if($r)
		{
			$_SESSION['user_password_reset'] = "User Password reset successfully";
			header('location:index.php');
			return;
		}
	}
?>