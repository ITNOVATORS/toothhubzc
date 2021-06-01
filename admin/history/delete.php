<?php
	$id=$_GET['id'];
	
	include('../../include/connection.php');
	mysqli_query($con,"delete from `log_user`");
	header('location:index.php');
?>