<?php
	$id=$_GET['id'];
	include('../../include/connection.php');
	mysqli_query($con,"delete from `request_apnt` where apnt_id = '$id'");
	mysqli_query($con,"alter table request_apnt auto_increment=1"); 
	
	header('location:index.php');
?>