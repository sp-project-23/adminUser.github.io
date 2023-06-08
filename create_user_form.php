<?php session_start();?>
<!DOCTYPE html>
<head>
	<title>Create User Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">	
</head>
<body>
		<?php			
			if(isset($_SESSION['report_error']))	{
				echo '<script>alert("No data to be generated")</script>';
				unset($_SESSION['report_error']);
			}
		?>

		<?php			
			if(isset($_SESSION['admin_success']))	{
				echo '<script>alert("Admin logged in successfully")</script>';
				unset($_SESSION['admin_success']);
			}
		?>
		<?php
		if(isset($_SESSION['admin']))
		
		{
		?>
			<div class="container">
				<div class="login-box">
				<div class="row">
				
				<div class="col-md-6 login-right">
			

		

			<h2> Create User/Employee</h2>
			<form>		
				<div class="form-group">
					<input type="text" name="fname" class="form-control" placeholder="Enter First name" required/>
				</div>
				
				<div class="form-group">
					<input type="text" name="lname" class="form-control" placeholder="Enter Last name" required/>
				</div>
				
				<div class="form-group">
					<input type="email" id="email" name="email" class="form-control" placeholder="Enter Email"  required/>
				</div>
				
				<div class="form-group">
					<input type="number" name="phone" class="form-control" placeholder="Enter Phone" required/>
				</div>
				
				
				<div class="form-group">
					<input type="checkbox" onclick="autogeneratePassword()">
					<input type="password" 
							name="password" id="password" 
							class="form-control" 
							placeholder="Tick the box below to generate password"/>
				</div>
				
				<button type="submit" 
						formaction="<?php echo $_SERVER['PHP_SELF'];?>" 
						formmethod="post" 
						onclick="show_cred()" 
						class="btn btn-success">
						Create
				</button>			
					
				<button type="button" 
						onclick="location.replace('report.php')" 
						class="btn btn-primary" >
						Generate Report
				</button>	
						
				<button type="button" 
						onclick="location.replace('admin_logout.php')" 
						class="btn btn-danger" >
						Log out
				</button>
					
			</form>		
		</div>	
			
		</div>		
		</div>
		</div>
		<?php			
		}
		?>	
			
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

	function  show_cred(){

		let e = document.getElementById("email").value;
		let p = document.getElementById("password").value;
		if(e!='' && p!='')
			alert("User created successfully\n\nNote the credentials\nUsername = "+e+"\nPassword = "+p);
		else
			alert("Fill up all fields");
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
						
		$q = "insert into user(first_name,last_name,email,phone,password) values ('$fn','$ln','$em','$ph','$pw')";

		$r = mysqli_query($con,$q);			
	}
?>