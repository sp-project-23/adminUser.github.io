<?php  
	include 'connect_db.php';
	session_start();
	$q = "select * from user_info";
	
	$r = mysqli_query($con, $q);
	
	
	if($r->num_rows > 0){ 
		$delimiter = ","; 
		$filename = "user_task_report_" . date('Y-m-d') . ".csv"; 		
		
		// Create a file pointer 
		$f = fopen('php://memory', 'w'); 
		 
		// Set column headers 
		$fields = array('Start Time', 'Stop Time', 'Notes', 'Description'); 
		fputcsv($f, $fields, $delimiter); 
		
		// Output each row of the data, format line as csv and write to file pointer 
		while($row = $r->fetch_assoc()){ 
			//$status = ($row['status'] == 1)?'Active':'Inactive'; 
			$lineData = array($row['start_time'], $row['stop_time'], $row['notes'], $row['description']); 
			fputcsv($f, $lineData, $delimiter); 
		} 
     
    // Move back to beginning of file 
    fseek($f, 0); 

	echo '<script>alert("Report generated")</script>';
     
    // Set headers to download file rather than displayed 
    header('Content-Type: text/csv'); 
    header('Content-Disposition: attachment; filename="' . $filename . '";'); 
     
    //output all remaining data on a file pointer 
    fpassthru($f); 

	} 
	else{
		$_SESSION['report_error'] = 'report error';
		header('location:create_user_form.php');
	}
	
	exit;  
?>