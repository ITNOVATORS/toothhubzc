<?php 
    session_start();
    include '../../include/connection.php';
    require '../../include/PHPMailer.php';
    require '../../include/SMTP.php';
    require '../../include/Exception.php';
    include '../../include/links.php';

    use PHPMailer\PHPMailer\PHPMailer;
	use PHPMailer\PHPMailer\SMTP;
	use PHPMailer\PHPMailer\Exception;

   
    //Create instance of PHPMailer
	    $mail = new PHPMailer();
    //Set mailer to use smtp
        $mail->isSMTP();
        //$mail->SMTPDebug = 3;

    //Define smtp host
        $mail->Host = "sg2plzcpnl471123.prod.sin2.secureserver.net";
    //Enable smtp authentication
        $mail->SMTPAuth = true;
    //Set smtp encryption type (ssl/tls)
        $mail->SMTPSecure = "tls";
    //Port to connect smtp
        $mail->Port = "587";
        
        $id = $_GET['id'];
     
        
        $sql = mysqli_query($con, "select * from request_apnt where apnt_id = $id");
  
        if(mysqli_num_rows($sql) == 1){

            while($row = mysqli_fetch_assoc($sql)){
             
            
                    
                    //Set gmail username
                        $mail->Username = "toothhubtetuan@toothhubzc.online";
                        //Set gmail password
                        $mail->Password = "toothhubzcpass";
    
                        $mail->setFrom('toothhubtetuan@toothhubzc.online');
    
                        //Enable HTML
                        $mail->isHTML(true);
            
                        $mail->Subject = "Appointment accepted";
                        //Email body
                        $mail->Body = "<h2>Hi " .$row['name']. "! Your appointment request has been accepted. </h3>
                        <br> <h4>Appointment details: </h4>
                        <p>Date: ".$row['app_date']."<br>Time: ".$row['app_time']."<br>Service: ".$row['service']."</p> <br><br><br>
                        Your appointment request has been accepted.Kindly visit us on your treatment day! Thank you.";
    
                        //Add recipient
                        $mail->addAddress($row['email']);
            }
        }
                       
            if($mail->send())
            {
                    mysqli_query($con,"update request_apnt set accepted = 1, status= 'Accepted' where apnt_id = $id");
                ?>
                
                   <script>alert("Appointment schedule accepted")</script>
                   <script>window.location.href="index.php"</script>
                
                <?php
            }
                
                
                    
            $mail->smtpClose();     
         
?>