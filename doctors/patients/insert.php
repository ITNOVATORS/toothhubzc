<?php 
    session_start();

  include '../../include/connection.php';
  $id = $_GET['id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	$name = $_POST['name'];	
	$humid_lname = $_POST['humid-lname'];	
	$humid_mname = $_POST['humid-mname'];	
	$address = $_POST['address'];
	$date = $_POST['birthdate'];
	$birthdate = date("Y-m-d", strtotime($date));
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $occupation = $_POST['occupation'];
    $mobile_num = $_POST['mobile_num'];
	
	$weight = $_POST['weight'];
	$humid_weight = $_POST['humid-weight'];
	$temperature = $_POST['temperature'];
	$humid_temperature = $_POST['humid-temperature'];
	$bp = $_POST['bp'];
	$humid_bp = $_POST['humid-bp'];
	$pr = $_POST['pr'];
	$humid_pr = $_POST['humid-pr'];

	$bleeding = $_POST['bleeding'];
	$heart = $_POST['heart'];
	$diabetes = $_POST['diabetes'];
	$hypertension = $_POST['hypertension'];
	$allergy = $_POST['allergy'];
	$other = $_POST['other'];

	mysqli_query($con, "
	insert into patient(name,address,birthdate,sex,status,occupation,mobile_num) 
	values (concat('$name','$humid_lname','$humid_mname'),'$address','$birthdate','$sex','$status','$occupation','$mobile_num')");
	
	
	mysqli_query($con, "
	insert into med_stat(weight,temperature,bp,pr,bleeding,heart,diabetes,hypertension,allergy,other,patient_id) 
	values (concat('$weight','$humid_weight'),concat('$temperature','$humid_temperature'),concat('$bp','$humid_bp'),concat('$pr','$humid_pr'),'$bleeding','$heart','$diabetes','$hypertension','$allergy','$other',LAST_INSERT_ID())");


	header("Location: index.php");

	}
?>