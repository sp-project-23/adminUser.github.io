<!DOCTYPE html>
<head>
	<title>Admin/User</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
<div class="container">
	<div class="login-box">
	<div class="row">

	<div class="col-md-6 login-right">	
		<?php
			session_start();
			if(isset($_SESSION['admin_logout']))
			{
				echo "<div align=right><font color=red>".$_SESSION['admin_logout']."</font></div>";
				session_destroy();
			}
		?>		
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
			<?php
				if(isset($_SESSION['admin_error']))
				{
					echo "<div align=right><font color=red>".$_SESSION['admin_error']."</font></div>";
					session_destroy();
				}
			?>			
		</form>
	</div>		
	
	<div class="col-md-6 login-left">		
		<?php
			if(isset($_SESSION['user_logout']) && empty($_SESSION['add_task']) && empty($_SESSION['user_name']))
			{
				echo "<div align=right><font color=red>".$_SESSION['user_logout']."</font></div>";
				session_destroy();
			}
		?>	
		

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

			<?php
				if(isset($_SESSION['user_password_reset']))
				{
					echo "<div align=right><font color=green>".$_SESSION['user_password_reset']."</font></div>";
					session_destroy();
				}
			?>	
			<button type="submit" class="btn btn-primary">Login</button>
			<?php
				if(isset($_SESSION['user_error']))
				{
					echo "<div align=right><font color=red>".$_SESSION['user_error']."</font></div>";
					session_destroy();
				}
			?>				
		</form>
	</div>	
</div>
</div>
</body>
</html>