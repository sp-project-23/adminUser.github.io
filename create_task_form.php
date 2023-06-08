<?php session_start(); ?>
<!DOCTYPE html>
<head>
	<title>Create Task Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
</head>
<body>
		<?php
			if(isset($_SESSION['user_success'])){				
				echo '<script>alert("User Logged in successfully")</script>';  
				unset($_SESSION['user_success']);
			}
		?>
		
		<?php
		if(isset($_SESSION['user']))		
		{
		?>
		<div class="container">
			<div class="login-box">
			<div class="row">
			
			<div class="col-md-6 login-right">
		

			<h2> Add Task</h2>
			<form>			
				<div class="form-group">
					<input type="text" id="note" name="notes" class="form-control" placeholder="Type notes"  required>
				</div>
				
				<div class="form-group">
					<input type="text" id="desc" name="description" class="form-control" placeholder="Type description"  required>
				</div>

				<button type="submit" 
						formaction="<?php echo $_SERVER['PHP_SELF'];?>"
						formmethod="post"
						class="btn btn-success"
						onclick="add_alert()">
						Add Task
				</button>				
				
				<button type="button" onclick="location.replace('user_logout.php')" class="btn btn-danger" >Log out</button>			
				
			</form>
				
		<?php			
		}
		?>				
	</div>		
</div>
</div>
</div>
</body>
<script>
	function add_alert()
	{
		let n = document.getElementById("note").value;
		let d = document.getElementById("desc").value;
		if(n!='' && d!='')
			alert("Task added successfully");
		else
			alert("Fill up all fields");
	}
</script>
</html>
<?php
	include 'connect_db.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
		$note = $_REQUEST['notes'];
		$desc = $_REQUEST['description'];

		$q = "insert into user_info(start_time, stop_time, notes, description) values (null, null, '$note', '$desc')";

		$r = mysqli_query($con,$q);
	}
?>