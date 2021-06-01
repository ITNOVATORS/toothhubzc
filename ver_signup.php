
<?php 
    session_start();
    include 'include/connection.php';
    require 'include/PHPMailer.php';
    require 'include/SMTP.php';
    require 'include/Exception.php';
    include 'include/links.php';

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
        
        
     
        
      
        if($_SERVER["REQUEST_METHOD"] == "POST")
        {
           
                $first_name = $_POST['first_name'];
                $last_name = $_POST['last_name'];	
                $email = $_POST['email'];
                $password = $_POST['password'];
                $confirm_password = $_POST['confirm_password'];
                $code = rand(111111,999999);
            
           
            if($password != $confirm_password)
            {
               header("location: signup.php?error=Password not matched");
            }else
            {
                        
                    //Set gmail username
                        $mail->Username = "toothhubtetuan@toothhubzc.online";
                        //Set gmail password
                        $mail->Password = "toothhubzcpass";
    
                        $mail->setFrom('toothhubtetuan@toothhubzc.online');
    
                        //Enable HTML
                        $mail->isHTML(true);
            
                        $mail->Subject = "Account verification";
                        //Email body
                        $mail->Body = "<h2>Hi " .$first_name. "! Thank you for visiting Tooth Hub.</h2><h3>Your verification code is: ".$code. "</h3>";
    
                        //Add recipient
                        $mail->addAddress($email);
            
                       
                if(!$mail->send())
                {
                ?>
                    <script>alert("Invalid email")</script>
                
                <?php
                
                }
                else{
                    mysqli_query ($con, 
                    "insert into users(first_name,last_name,email,password,v_code)
                    values ('$first_name', '$last_name','$email', '$password', '$code')");

                    echo '<script>alert("Verify your account now")</script>';
                    echo '<script>window.location.href="ver_signup.php"</script>';
                }
            }
        
            $mail->smtpClose();     
    }  
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image" href="images/logo.png">
    <title>Verify account</title>
    <link rel="stylesheet" href="css/all.css">
</head>
<body class="bg-blue">
    <div class="container shadow rounded bg-white p-5" style="width: 25rem; margin-top:50px;">
        <form action="verify.php" method="POST">
           
            <h3 class="text-center my-2 mb-4 text-blue">Verify your account</h3>
            <div class=" text-center mr-2">
                        <?php if(isset($_GET['error'])) {?>
                            <div class="alert alert-danger p-1" role="alert">
                            <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>    
           <input type='code' class="form-control my-4" name="verify_code" placeholder="Verification code">
           <input type="submit" class="btn btn-dark col-sm-6" value="Verify">
            
       </div>
       </form>
       
    </div>
</body>
</html>
    