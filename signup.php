<?php include 'include/links.php'; ?>
        
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <link rel="icon" type="image" href="images/logo.png">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign up</title>
    <link rel="stylesheet" href="css/all.css">
</head>
<body class="bg-blue">
    
        <div class="container-fluid bg-light shadow rounded p-5" style="width: 30rem; margin-top: 40px;">
                        <img src="images/12.png" class="img-fluid" alt="">
                        <div class="form-title text-center mt-0">
                        <h2 class="mt-3 mb-4">REGISTER</h2>
                        </div>
                        
                        <div class="fs-6 text-center px-5 ">
                            <?php if(isset($_GET['error'])) {?>
                                <div class="alert alert-danger p-2" role="alert">
                                <?php echo $_GET['error']; ?>
                            </div>
                        <?php } ?>  
                        </div>
                        <form method="POST" action="ver_signup.php" class="px-5">



                         <div class="row mb-4">
                                <input type="text" class="form-control col-sm mt-4 mr-3 py-2" placeholder="First name" name="first_name" required>
                                <input type="text" class="form-control col-sm mt-4 py-2" placeholder="Last name" name="last_name" required>
                        </div>  
                        

                            <div class="row mb-4">
                               
                                <input type="email" class="form-control py-2" placeholder="Email address" name="email" id="email" required>
                            </div>

                            <div class="row mb-4">
                              
                                <input type="password"  minlength="8" title="Use letter, numbers, and characters" class="form-control py-2" placeholder="New Password" name="password" required>
                            </div>

                            <div class="row mb-4">
                                
                                <input type="password" class="form-control py-2" placeholder="Confirm Password" minlength="8" name="confirm_password" required>
                                
                            </div>
                        <div class="mt-5 d-flex justify-content-center">
                            <input type="submit" class="btn btn-dark btn-block btn-round w-50 py-2" value="Sign up" name="
                                signup"></div>
                        </form>
                        
                        
                        <div class="d-flex justify-content-center mx-0 mt-4 mb-3">
                             Already have an account? <a href="login.php" class="text-blue ml-2  fw-bold text-dark"> Sign in now!</a>
                    </div>
                      
                        
                    </div>
      
    </div>
</body>
</html>
