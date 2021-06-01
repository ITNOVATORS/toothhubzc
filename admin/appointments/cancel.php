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
            
            
                        $mail->Subject = "Appointment cancelled";
                        //Email body
                        $mail->Body = "<h2>Hi " .$row['name']. "! I'm sorry to inform you that your appointment request has been declined. </h3>
                        <br> <h4>Appointment details: </h4>
                        <p>Date: ".$row['app_date']."<br>Time: ".$row['app_time']."<br>Service: ".$row['service']."<br><br><br>
                        You may contact us @ <b>0935-7345-789</b></p> ";
    
                        //Add recipient
                        $mail->addAddress($row['email']);
            }
        }
                       
                if($mail->send())
                {
                    mysqli_query($con,"update request_apnt set status = 'Cancelled' where apnt_id = '$id'");
                    echo '<script>alert("Appointment has been canceled")</script>';
                    echo '<script>window.location.href="index.php"</script>';
                }
  
            $mail->smtpClose();     
         
?>