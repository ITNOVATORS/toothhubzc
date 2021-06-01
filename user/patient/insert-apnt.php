

<?php 
    session_start();

  include '../../include/connection.php';

  $id = $_SESSION['id'];

	if($_SERVER['REQUEST_METHOD'] == "POST")
	{
	$name = $_POST['name'];	
	$email = $_POST['email'];
    $num = $_POST['num'];
    $service= $_POST['service'];
    $date = $_POST['app_date'];
	$app_date = date("Y-m-d", strtotime($date));
    $app_time = $_POST['app_time'];
	
        if ($con->connect_error) {
            die("Connection failed: " . $con->connect_error);
        }

        $sql = "insert into request_apnt(name,email,num,service,app_date,app_time,user_id) 
                values ('$name','$email','$num','$service','$app_date','$app_time', '$id');";
        
        
        if ($con->query($sql) === TRUE) {
            echo "<script>alert('Request sent. Please wait for the approval!')</script>";
            echo "<script>window.location.href='index.php'</script>";
            
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        $con->close();
        }    
?>
