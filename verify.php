<?php 
    session_start();
    include 'include/links.php';
    include 'include/connection.php';
  
    


    if($_SERVER['REQUEST_METHOD'] == "POST")
    {
        $verify = $_POST['verify_code'];

        $result = mysqli_query($con, "select * from users where status = 0 AND v_code = '$verify' LIMIT 1");
            if($result->num_rows == 1){
                while($row = mysqli_fetch_assoc($result)){

                    if($verify != $row['v_code']){
                        header("location: ver_signup.php?error=Invalid code");

                    }else{
                        mysqli_query($con, "update users set status = 1 where v_code = '$verify' LIMIT 1");
                        echo '<script>alert("Your account has been verified. You may now login")</script>';
                        echo '<script>window.location.href="login.php"</script>';
                    }
                }      
            }else{
                header("location: ver_signup.php?error=Invalid code");
            }
        

    }

?>
