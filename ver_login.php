<?php
   include("include/connection.php");
   include 'include/links.php';
   session_start();

   $email = $_POST['email'];
   $password = $_POST['password'];


   $sql = mysqli_query($con, "select * from users where email = '$email' AND  password = '$password' limit 1");
  
    if(mysqli_num_rows($sql) == 1){

        while($row = mysqli_fetch_assoc($sql)){

    if(isset($_POST["email"]) && ($_POST["password"])){
      
                $date = $row["date_created"];
                $email = $row["email"];

                if($row["access"] == "admin"){
                    $_SESSION['admin_user'] = $row["email"];
                    $_SESSION['role'] = $row["access"];
                    header("location: admin/dashboard/");

                }else{
                    if($row["status"]==0)
                    {
                        ?>
                        <script>alert ("This account has not been verified. An email was sent to <?php echo $email;?> on <?php echo $date;?>")</script>
                        <script>window.location.href="ver_signup.php"</script>
                        <?php
                        
                    }else{
                        
                        $_SESSION['first_name'] = $row['first_name'];
                        $_SESSION['last_name'] = $row['last_name'];
                        $_SESSION['email'] = $row['email'];
                        $_SESSION['role'] = $row['access'];
                        $_SESSION['id'] = $row['id'];
                        $user_id = $row['id'];

                        header("location: user/patient/");
                    }
                    
                }
            }
        }

       
    }else if(($row["email"] != $email) && ($row["password"] != $password)) {
        
            header("location: login.php?error=Password is incorrect");
        
    }else{
        
        header("location: login.php?error=Email is incorrect");
    }
?>
