<?php
	include('../../include/connection.php');
	
	$user_name = $_POST['user_name'];
	$current_password = $_POST['current_password'];
	$new_password = $_POST['new_password'];
	
	$query = mysqli_query($con, "select * from `users`;");

	$row = mysqli_fetch_array($query);

	if ($row['user_name'] == '$user_name' && $row['password'] == '$current_password'){
		mysqli_query($con,"update `users` set password = '$new_password' where id=1;");
		
	}else echo "Invalid password or username";
	
	header("Location: index.php");
	
?>