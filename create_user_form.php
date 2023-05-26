<!DOCTYPE html>
<head>
	<title>Create User Page</title>
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
			if(isset($_SESSION['admin_success']))
			{
				echo "<div align=left><font color=green>".$_SESSION['admin_success']."</font></div>";
				session_destroy();
			}
		?>	
		<?php
			if(isset($_SESSION['create_user']))
			{
				echo "<div align=right><font color=green>".$_SESSION['create_user']."</font></div>";
				session_destroy();
			}
		?>	
		<h2> Create User/Employee</h2>
		<form action="<?php echo $_SERVER['PHP_SELF'];?>" method="post">			
			<div class="form-group">
				<input type="text" name="fname" class="form-control" placeholder="Enter First name" required>
			</div>
			
			<div class="form-group">
				<input type="text" name="lname" class="form-control" placeholder="Enter Last name" required>
			</div>
			
			<div class="form-group">
				<input type="email" name="email" class="form-control" placeholder="Enter Email"  required>
			</div>
			
			<div class="form-group">
				<input type="number" name="phone" class="form-control" placeholder="Enter Phone" required>
			</div>
			
			
			<div class="form-group">
				<input type="checkbox" onclick="autogeneratePassword()">
				<input type="password" name="password" id="password" class="form-control" placeholder="Tick the box below to generate password" required>
			</div>
			
			<input type="submit" class="btn btn-success" value="Create"/>
			
			<button type="button" onclick="location.replace('report.php')" class="btn btn-primary" >Generate Report</button>	
			<button type="button" onclick="location.replace('admin_logout.php')" class="btn btn-danger" >Log out</button>
					
		</form>	
		<?php 	
			if(isset($_SESSION['user']) && isset($_SESSION['pass'])){

				echo "<h4>Note the user credentials for future</h4><div align=right><font color=red>Email = ".$_SESSION['user'].
				"<br>Password = ".$_SESSION['pass']."</font></div>";
			}
		?>
		
	</div>	
		
	</div>		
	</div>
</div>
</body>

<script> 
	function autogeneratePassword() {
		
		var pass = '';
		var str = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ' + 'abcdefghijklmnopqrstuvwxyz0123456789@#$';              
		for (let i = 1; i <= 8; i++) {
			var char = Math.floor(Math.random()* str.length + 1);                  
			pass += str.charAt(char);
		}         		
		document.getElementById("password").value=pass;
		return pass;
	}      
</script>
</html>
<?php
	include 'connect_db.php';

	if($_SERVER['REQUEST_METHOD']=='POST'){

		$fn = $_REQUEST['fname'];
		$ln = $_REQUEST['lname'];
		$em = $_REQUEST['email'];
		$ph = $_REQUEST['phone'];			
		$pw = md5($_REQUEST['password']);
		//$cap = $_POST['captcha'];
						
		$q = "insert into user(first_name,last_name,email,phone,password) values ('$fn','$ln','$em','$ph','$pw')";

		$r = mysqli_query($con,$q);

		if($r){
			$_SESSION['user'] = $_POST['email'];
			$_SESSION['pass'] = $_POST['password'];
			$_SESSION['create_user'] = "User created successfully";
			header('location:create_user_form.php');
			return;	
		}
	}
?>