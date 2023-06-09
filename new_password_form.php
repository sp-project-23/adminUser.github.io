<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>User Password Reset Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php
		$flag = 0;
		if(isset($_SESSION['reset']))
			$flag = 1;		
			
	
		if(isset($_SESSION['reset']) || isset($_SESSION['reset_30']))
		
		{
			if($flag==0){
				echo '<script>alert("Last password changed 30 days ago")</script>';
				//unset($_SESSION['reset']);
			}
			else{
				echo '<script>alert("First time reset password")</script>';
				//unset($_SESSION['reset_30']);
			}
			session_destroy();
		?>

		<div class="container">
		<div class="login-box">
		<div class="row">
		
		<div class="col-md-6 login-left">
			<h2> Reset Password</h2>			
			<form>	
				<div class="form-group">
					<input type="password" name="new_pass" class="form-control" placeholder="Enter new password" required>
				</div>
				<div class="form-group">
					<input type="hidden" name="user_email" class="form-control" value="<?php echo $_SESSION['user']; ?>">
				</div>						
				<button type="submit" 
						formaction="<?php echo $_SERVER['PHP_SELF'];?>" 
						formmethod="post" 
						class="btn btn-success" >
						Submit
				</button>			
			</form>			

			</div>		
			</div>
		</div>

		<?php			
		}
		?>	
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
			$_SESSION['reset_success'] = "reset success";
			header('location:index.php');
		}
	}
?>