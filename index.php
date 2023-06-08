<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>Admin/User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
	<?php
		if(isset($_SESSION['reset_success'])){
			echo '<script>alert("User Password reset successfully")</script>';
			session_destroy();
		}
	?>

<div class="container">
	<div class="login-box">
	<div class="row">

	<?php
		if(isset($_SESSION['admin_logout'])){
			echo '<script>alert("Admin logged out successfully")</script>';
			session_destroy();
		}
	?>


	<?php
		if(isset($_SESSION['admin_error'])){
			echo '<script>alert("Invalid admin username or password")</script>';
			session_destroy();
		}
	?>

	<div class="col-md-6 login-right">			
		<h2> Admin Side</h2>
		<form action="admin_verification.php" method="post">
			<div class="form-group">
				<label>Username</label>
				<input type="email" name="a_email" class="form-control" placeholder="Enter email" required>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="a_password" class="form-control" placeholder="Enter password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>				
		</form>
	</div>		

	<?php
		if(isset($_SESSION['user_logout'])){
			echo '<script>alert("User logged out successfully")</script>';
			session_destroy();
		}
	?>

	<?php
		if(isset($_SESSION['user_error'])){
			echo '<script>alert("Invalid user username or password")</script>';
			session_destroy();
		}
	?>
	
	<div class="col-md-6 login-left">		
		<h2> User Side</h2>
		<form action="user_verification.php" method="post">			
			<div class="form-group">
				<label>Username</label>
				<input type="email" name="u_email" class="form-control" placeholder="Enter email" required>
			</div>
			
			<div class="form-group">
				<label>Password</label>
				<input type="password" name="u_password" class="form-control" placeholder="Enter password" required>
			</div>
			<button type="submit" class="btn btn-primary">Login</button>				
		</form>
	</div>	
</div>
</div>
</body>
</html>