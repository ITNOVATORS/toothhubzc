<?php 
include 'include/links.php'; 


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="icon" type="image" href="images/logo.png">
    <link rel="stylesheet" href="css/all.css">

</head>
<body class="bg-blue">
    
        <div class="container-fluid bg-light shadow rounded p-5" style="width:25rem; margin-top: 120px;">
        <img src="images/12.png" class="img-fluid" alt="">
                        <div class="form-title text-center mb-4 mt-0">
                        <h3 class="mt-3 mb-5">SIGN IN</h3>
                        </div>
                        <div class=" text-center">
                      <?php if(isset($_GET['error'])) {?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo $_GET['error']; ?>
                        </div>
                      <?php } ?>    

                            <form action="ver_login.php" method = "POST">
                                
                                <div class="input-group mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text d-flex align-items-center bx bx-at text-blue"></span>
                                    </div>
                                    <input type="email" class="form-control" placeholder="Email" name="email" id="email" required autofocus>
                                
                                </div>
                                <div class="input-group mb-4">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text d-flex align-items-center bx bx-lock-alt text-blue"></span>
                                     </div>
                                    <input type="password" class="form-control" placeholder="Password" name="password" id="password" required>
                                
                                </div>

                                <input type="submit" name="submit" class="btn btn-dark btn-block btn-round rounded mb-4" value="Login">
                            </form>
                            
                        
                            <div class="d-flex justify-content-center mx-0 ">
                             No account? <a href="signup.php" class="text-dark link ml-2 fw-bold">Register now!</a>
                            </div>
                       
                            </div>
                    </div>

                </div>
            </div>
</body>
</html>