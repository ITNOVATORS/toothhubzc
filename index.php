<?php 
        include 'include/scripts.php';
        include 'include/links.php';
        $error = "";
        ?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
    <title>Tooth Hub Dental Clinic Zamboanga</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="style-customers.css">
    <link rel="icon" type="image" href="images/logo.png">
    <link rel="stylesheet" href="css/all.css">
   

    
</head>
<body>


        <nav class="navbar navbar-expand-lg navbar-style fixed-top">
            <a href="#" class="navbar-brand">
                <img src="images/logo4.png" height="30" alt="Tooth Hub">
            </a>
            <button class="navbar-toggler" data-toggle="collapse" data-target="#drop">
            <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="drop">
                <div class="navbar-nav">
                    <a href="#home" class="nav-item nav-link mr-2 active"> Home</a>
                    <a href="#about" class="nav-item nav-link mr-2"> About</a>
                    <a href="#services" class="nav-item nav-link mr-2"> Services</a>
                    <a href="#contact-us" class="nav-item nav-link mr-2"> Feedback</a>
                </div>
                <div class="navbar-nav ml-auto">
                    <a href="login.php" class="nav-item nav-link" >Login</a>
                </div>
            </div>
        </nav>
  
    
        <div class="container-fluid">        
            <div class="row" id="home" >
                <div class="col-sm-6">
                    <div class="container justify-content-center pt-3">
                        <div class="top-text">
                            <h1>Welcome to</h1>
                            <h3 class=" fs-3">Tooth Hub Dental Clinic Zamboanga</h3>
                            
                            <br>
                            <button type="button" class="btn-sub" data-bs-toggle="modal" data-bs-target="#schedule-appointment"><i class="fas fa-calendar-check icons"></i>Book an appointment</button>
                        </div>
                    </div>
                </div>
               
                <div class="col-sm-6">
                    <div class="container">
                        <img src="images/try1.png" class="img-fluid img justify-content-center"  alt="dentist">
                    </div>
                </div>

                <img src="images/wave.png" class="img-fluid mx-0 px-0" alt="">
            </div> 
        </div>   
  
    
     


            <div class="container-fluid con" id="about">
                <div class="row justify-content-center title">
                    <h3 class="text-center">About</h3>
                </div>
                
                <div class="row mb-4 justify-content-center">
                    <div class="col-sm-6">
                        
                            <img src="images/123.jpg" class="img-fluid mb-5" alt="">
                      
                    </div>

                    <div class="col-sm-6 d-flex align-items-center">
                        <div class="container line-right p-5">
                            <p class="lead">We are the main substance in the Asia whose medicinal staff take an interest in restrictive and constant preparing programs with the incredibly famous Tooth Hub Clinic, and take part in Tooth Hub’s progressing research and logical examinations.</</p>
                        </div>
                    </div>
                </div>

                <div class="row mb-4 justify-content-center">
                   
                    <div class="col-sm">
                       
                            <img src="images/12345.jpg" class="img-fluid mb-5">
                       
                    </div>
                    <div class="col-sm-6 d-flex align-items-center">
                        <div class="container text-right line-left p-5">
                            <p class="lead">We trust that no patient ought to acknowledge a treatment that they don’t get it. At Tooth Hub Dental Clinic educated consideration bases on patient instruction and finding the best choice for each and every patient without fail. We pride ourselves on the consideration of our patients. </p>
                        </div>
                    </div>
                </div>

            </div>
                  

            
        </div>
        <div class="row mx-5 pt-5" id="services">
                <div class="row pb-0">
                    <h3 class="title text-center">Services</h3>
                </div>
                <?php include 'services.php'; ?>
            </div>
              
        <div class="container-fluid mt-5">
         
                <div class="row text-center title">
                  
                </div>
                <div class="row" id="contact-us">

                <div class="col-sm-6 c-left bg-light">
                    <div class="container  justify-content-center mt-4 pb-3">
                        <h3>Working Hours </h3>
                    </div>

                    <div class="row mt-5">
                       <div class="container ">
                            <p><i class="fas fa-calendar-alt icons"></i>  Monday-Thursday & Saturday</p>
                       </div>
                    </div>

                    <div class="row mt-3">
                       <div class="container">
                            <p><i class="fas fa-clock icons"></i> 9:30 am - 4:30 pm</p>
                       </div>
                    </div>

                    <div class="row mt-3">
                        <div class="container">
                            <p><i class="fas fa-calendar-times icons"></i> Friday & Sunday (Closed)</p>
                        </div>
                    </div>

                    <div class="row mt-4">
                        <div class="container">
                            <button type="button" class="btn-style" data-bs-toggle="modal" data-bs-target="#schedule-appointment"><i class="fas fa-calendar-check icons"></i>Book an appointment</button>
                        </div>
                    </div>
                    
                </div>

                <div class="col-sm-6 c-right">
                    <div class="container justify-content-center">
                        
                    <h3>Feedback Us
                        </h3>
                        
                            <div class="container mt-5">
                            <form method="POST" action="include/insert-msg.php">
                                <div class="row mb-4">
                                    <label class="lbl">Name</label>
                                    <input class="form-control" type="name" id="name" name="name" placeholder="Full name" required>
                                </div>

                                <div class="row mb-4">
                                    <label class="lbl">Email Address</label>
                                    <input class="form-control" type="email" id="email" name="email" placeholder="example@gmail.com" required>
                                </div>

                                <div class="row mb-4">
                                    <label class="lbl">Feedback</label>
                                    <textarea class="form-control" id="message" name="message" rows="4" required></textarea>
                                </div>

                                <div class="row float-right">
                                    <button type="submit" name="send_message" class="btn-sub" id="msg"><i class="fas fa-send icons"></i> Submit</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
               
            </div>    
        </div>
      
            <footer>
                <img src="images/wave-footer.png" class="img-fluid mx-0 px-0" alt="">
                <div class="container">
                    <div class="row">
                        <div class="col-sm-5">
                            <div class="container">
                                <div class="row">
                                    <div class="row text-footer mb-4 ml-1">
                                       
                                        <p class="pl-3  lead font-weight-bold"> TOOTH HUB DENTAL CLINIC</p>
                                    </div>
                                        
                                    <div class="container side-line pl-4 mb-5">
                                        <p class="lead text-justify"><em>"We pride ourselves on the consideration of our patients. We enjoy incredible making your first dental involvement with us pleasant and keeping up long haul associations with all of our patients."</em></p>
                                    </div>
                                </div>
                                </div>
                        </div>

                        <div class="col-sm-4">
                            <div class="container justify-content-center mb-5 px-3">
                                <p class="lead font-weight-bold mb-5 text-center "> QUESTIONS?</p>
                                <div class="container">
                                    <div class="row">
                                            <div class="container">
                                            <i class="fas fa-map-marker-alt pr-3 pt-3 ic float-left"></i>
                                            <p>2nd Floor Door 1, A.S. Don Alfaro St., Tetuan, Zamboanga City </p>
                                            </div>
                                    </div>

                                    <div class="row mt-3">
                                            <div class="container">
                                            <i class="fas fa-phone pr-3 pt-3 ic float-left"></i>
                                            <p class="pt-3 font-weight-bold">0935-7345-789</p>
                                            </div>
                                    </div>

                                    <div class="row mt-3">
                                            <div class="container">
                                            <i class="fas fa-envelope pr-3 pt-3 ic float-left"></i>
                                            <p class="pt-3">toothhubzc.clinic@gmail.com</p>
                                            </div>
                                    </div>
                                    </div>
                            </div>
                        </div>
                                  
                        <div class="col-sm-3 ">
                            <p class="lead font-weight-bold text-center">FOLLOW US</p>
                            <div class="row text-center">
                                    <div class="container mt-3 mb-5 text-center">
                                        <!--fb-->
                                        <a href="https://www.facebook.com/Tooth-Hub-Dental-Clinic-Zamboanga-City-594721290973536" class="fb-ic fb">
                                            <i class="fab fa-facebook-f fa-lg white-text mr-5 fa-2x"> </i>
                                        </a>
                                        <!--ig-->
                                        <a href="https://www.facebook.com/Tooth-Hub-Dental-Clinic-Zamboanga-City-594721290973536"  class="ig-ic ig">
                                            <i class="fab fa-instagram fa-lg white-text fa-2x"> </i>
                                        </a> 
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </footer>

    <div class="modal fade" id="schedule-appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content p-3"> 
                        
                        <div class="modal-body">
                            <form>
                              
                                    <br>
                                    <div class="container">
                                    
                                            <div class="lead text-center">
                                            Log in or register to book an appointment. Thank you!
                                            </div>
                                     
                                
                                </div>
                                </div>
                            <div class="mt-2"> 
                              <center><a href="index.php" > <input type="button" value="Okay" class="btn btn-outline-primary mb-3"><a></center>
                            </div>
                        </form>
                    </div>                
                </div>
            </div>
        
   
</body>
</html>