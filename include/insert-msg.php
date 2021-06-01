<?php 

    include 'connection.php';


	if(isset($_POST['send_message']))
	{
    
        $name = $_POST['name'];	
        $email = $_POST['email'];
        $message = $_POST['message'];
	
        
        $query = "insert into contact_us(name,email,message,time_sent) 
        values ('$name','$email','$message',CURRENT_TIMESTAMP());";
        $query_run = mysqli_query($con, $query);
        
        
        if($query_run) {
            echo '<script>alert("Message sent!")</script>';
           echo '<script>window.location.href = "../index.php"</script>';
        } 
        else {
            $_SESSION['status'] = "Message not sent. Try again! Thank you.";
            $_SESSION['status_code'] = "error";
            header("Location: ../index.php");
        }
       
    }
      
 ?> 
   


