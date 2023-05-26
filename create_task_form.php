<!DOCTYPE html>
<head>
	<title>Create Task Page</title>
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
			if(isset($_SESSION['user_success'])){
				
				echo "<div align=left><font color=green>".$_SESSION['user_success']."</font></div>";
				session_destroy();
			}
		?>
		<?php
			
			if(isset($_SESSION['add_task'])){
				
				echo "<div align=right><font color=green>".$_SESSION['add_task']."</font></div>";
				session_destroy();				

			}
		?>
		<h2> Add Task</h2>
		<form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>">			
			<div class="form-group">
				<input type="text" name="notes" class="form-control" placeholder="Type notes"  required>
			</div>
			
			<div class="form-group">
				<input type="text" name="description" class="form-control" placeholder="Type description"  required>
			</div>

			<input type="submit" class="btn btn-success" value="Add Task"/>	
			
			<input type="button" onclick="location.replace('user_logout.php')" class="btn btn-danger" value="Log out">
			
		</form>					
	</div>		
</div>
</div>
</div>
</body>
</html>
<?php
	include 'connect_db.php';
	
	if($_SERVER['REQUEST_METHOD']=='POST'){
			
		$note = $_REQUEST['notes'];
		$desc = $_REQUEST['description'];

		$q = "insert into user_info(start_time, stop_time, notes, description) values (null, null, '$note', '$desc')";

		$r = mysqli_query($con,$q);

		if($r) 
		{
			$_SESSION['add_task'] = "Task added successfully";
			header('location:create_task_form.php');
			return;
		}
	}
?>