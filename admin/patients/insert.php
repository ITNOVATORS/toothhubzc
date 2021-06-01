<?php 
    session_start();

  include '../../include/connection.php';
  $id = $_GET['id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	$first_name = $_POST['first_name'];	
	$last_name = $_POST['last_name'];	
	$street = $_POST['street'];
	$barangay = $_POST['barangay'];
	$city = $_POST['city'];
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
	insert into patient(first_name,last_name,street, barangay, city,birthdate,sex,status,occupation,mobile_num, linked) 
	values ('$first_name', '$last_name','$street', '$barangay', '$city','$birthdate','$sex','$status','$occupation','$mobile_num', 1)");
	
	mysqli_query($con, "
	insert into med_stat(weight,temperature,bp,pr,bleeding,heart,diabetes,hypertension,allergy,other,patient_id) 
	values (concat('$weight','$humid_weight'),concat('$temperature','$humid_temperature'),concat('$bp','$humid_bp'),concat('$pr','$humid_pr'),'$bleeding','$heart','$diabetes','$hypertension','$allergy','$other',LAST_INSERT_ID())");


	header("Location: index.php");

	}
?>