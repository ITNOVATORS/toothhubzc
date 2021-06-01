<?php
	$id=$_GET['id'];
	include('../../include/connection.php');
	mysqli_query($con,"delete from `contact_us` where id = '$id'");
	mysqli_query($con,"alter table contact_us auto_increment=1"); 
	
	header('location:index.php');
?>