<?php 

require_once '../require.php';
include '../../include/links.php';
include '../../include/scripts.php';

include '../../include/connection.php';
$id = $_SESSION['id'];
$new_id = $_SESSION['patient_id'];
?>
<!DOCTYPE html>
    <html lang="en">
    <head>
        <meta charset="UTF-8">
        <link rel="icon" type="image" href="../../images/logo.png">
        <link rel="stylesheet" href="../../css/all.css">
        <link rel="stylesheet" href="assets/custom-file.css">
        <!--========== BOX ICONS ==========-->
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <title>Tooth Hub Dental Clinic</title>
        <!--========== CSS ==========-->
        <link rel="stylesheet" href="assets/style.css">
    </head>
    
   <nav class="navbar navbar-expand-lg navbar-light bg-blue fixed-top">
  <div class="container-fluid">
    <a class="navbar-brand" href="#"> <img src="../../images/logo4.png" alt="" class=" ml-0" height=35></a>
    <div class="mx-auto">
        <div class="lead text-white">TOOTH HUB DENTAL CLINIC</div>
      </div>
    <button class="navbar-toggler " type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="fa fa-bars text-white fs-2"></span>
    </button>
      
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      
      <div class="mx-auto"></div>
      <li class=" nav-link dropdown mr-0 ml-0 pl-0 pr-0">
          <a class="nav-link dropdown-toggle  ml-auto pl-0" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            ACCOUNT
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
          <li></li>
            <li><a class="dropdown-item" href="settings.php">Settings</a></li>
            <li><a class="dropdown-item" href="../logout.php" onclick="return confirm('Are You sure you want to logout?')" href="../../include/logout.php">Log out</a></li> 
            
          </ul>
        </li>
    </div>
      

  </div>
</nav>

<div class="container mt-5 pt-5" id="search">
<div class="fs-3 d-flex align-items-center mt-3 "><span class=" bx bx-user fs-2 mr-3"></span> Welcome, <?php echo $_SESSION['first_name'] ." ". $_SESSION['last_name'] ; ?></div>
    <div class="row MX-1 mt-4">
        <div class="card col-sm mt-4 mr-3  shadow-sm">
        <div class="card-body  py-5 ">
                <h4 class="card-title fs-3 text-center">PERSONAL INFORMATION</h4>                       
                <?php
                    include '../../include/connection.php';
                   

                    $query=mysqli_query($con,"select * from `patient` where user_id = '$id'");
                
                    if(mysqli_num_rows($query) > 0)
                    {
                        while($row=mysqli_fetch_array($query)){
                        ?>

                        <div class="row">
                        <div class="col-sm-8 p-4">
                            <p class=" mt-5">
                            Name:  <b><?php echo $row['first_name'] ." ". $row['last_name']; ?></b>
                            </p>

                            <p class=" mt-3">
                            Address:  <b><?php echo $row['street'] . ", " .$row['barangay']   . ", " .$row['city'];?></b>
                            </p>

                            <p class=" mt-3">
                            Birthdate:  <b><?php echo $row['birthdate']; ?></b>
                            </p>

                            <p class=" mt-3">
                            Sex:  <b><?php echo $row['sex'];?></b>
                            </p>

                            <p class=" mt-3">
                            Status: <b><?php echo $row['status'];?></b> 
                            </p>

                            <p class=" mt-3">
                            Occupation: <b> <?php echo $row['occupation'];?></b>
                            </p>

                            <p class=" mt-3">
                            Contact number:  <b><?php echo $row['mobile_num'];?></b>
                            </p>
                            </div>
                            
                            <div class="col-sm bg-light shadow-sm p-5 my-3 d-flex align-items-center justify-content-center">
                              <div class="fs-1 px-5">
                              <div class="text-center">BALANCE <br>
                              &#8369; <?php echo $row['balance']; ?></div>
                            </div>
                             
                              
                            </div>
                    </div>



                    </div>

                    <?php 
                    } 
                  } else{?>
                      <div class="mx-0 px-0">
                      <div class="lead fs-6 text-center mt-5">No data available. Link your account now!</div>
                      <div class="d-flex justify-content-center">
                      
                      <button type="button" class="btn btn-success mt-5" data-toggle="modal" data-target="#link"><span class="bx bx-infinite mr-2"></span>Link account</button>
                      </div>

               
    

                      </div>
                  <?php } ?>
 
</div>
            
        </div>

        <div class="card col-sm mt-4 shadow-sm">
              <div class="card-body pt-5 pb-2 ">
                <h5 class="card-title fs-4 text-center">APPOINTMENTS</h5>
                <?php
                    include '../../include/connection.php';
                    

                    $query=mysqli_query($con,"select * from `request_apnt` where user_id = '$id'");
                
                    if(mysqli_num_rows($query) > 0)
                    {?>
                <div class="table-responsive mx-0 mt-5">
                      <table class="table table-hover">
                      <tr class="bg-light">
                      <td>Date</td>
                      <td>Treatment</td>
                      <td>Time</td>
                      <td>Status</td>
                      </tr>
      
               <?php
                        while($row=mysqli_fetch_array($query)){
                        
                         ?>
                     <tbody>
                      <tr>
                      <td><?php echo $row['app_date']; ?></td>
                      <td><?php echo $row['service']; ?></td>
                      <td><?php echo $row['app_time']; ?></td>
                      <td><span class="badge
               <?php 
               if($row['status'] == 'Accepted'){
                  echo "badge-success p-1";
                }else if($row['status'] == 'Cancelled'){
                  echo "badge-danger p-1";
                }else if($row['status'] == 'Done'){
                  echo "badge-info p-1";
                }else{
                  echo "badge-warning p-1";
                }
                   
                   ?>"><?php echo $row['status'];?></span></td>
                      </tr>
                          
                      </tbody>
                      
                      
                  
                    <?php 
                    } 
                    ?>
                    </table>
                      </div>
                    <div class="d-flex justify-content-center my-5">
                      
                      <a class="btn bg-blue text-white" data-bs-toggle="modal" data-bs-target="#schedule-appointment"><span class="bx bx-plus "></span> Request appointment</a>
                      </div><?php
                  }else{?>
                      <div class="mx-0 px-0">
                        <div class="lead fs-6 text-center mt-5">No appointments</div>
                        <div class="d-flex justify-content-center mb-5">
                        
                        <button type="button" class="btn bg-blue text-white mt-5" data-bs-toggle="modal" data-bs-target="#schedule-appointment"><span class="bx bx-plus mr-2"></span>Request appoinment</button>
                      </div>
                  </div>
                   <?php 
                  } ?>

       
    </div>
  </div>


<div class="card MT-5 p-0">
  <div class="card-header FS-5">
    TREATMENT HISTORY
  </div>       
    <div class="table-responsive"> 
    <?php
        

          $query = mysqli_query($con, "select * from `treatment` WHERE patient_id = '$new_id'");
                if(mysqli_num_rows($query) > 0)
                        { ?>
            <table class="table bg-white" width="100%">
                <thead>
                    <th>Date</th>
                   
                    <th>Treatment</th>
                    <th>Description</th>
                  
                    <th class="action">Fee</th>
                </thead>
                
                <?php


              
               
                while($row=mysqli_fetch_array($query)){
                ?>
                <tbody>
            <tr> 
            
              <td><?php echo $row['date']; ?></td>
							
							<td ><?php echo $row['treatment']; ?></td>
              <td><?php echo $row['description']; ?></td>
							<td>&#8369; &nbsp;<?php echo $row['fee']; ?></td>
             
                     
              </td>
			        </tr>
              </tbody>
              <?php
            } 
          }else{
            ?><tbody>
            <tr>
                    <div class="my-5">
                      <div class="lead fs-6 text-center ">No data available.</div>
                     </div>
                     </tr>
                     </tbody>
         <?php } ?>         
          
            </table>        
    </div>
  </div>


<div class="card MT-5 p-0">
  <div class="card-header FS-5">
    PAYMENT HISTORY
  </div>
  <div class="card-body table-responsive m-0 p-0">
  <?php    
          $query = mysqli_query($con, "select * from payments where user_id = '$id'");
          if(mysqli_num_rows($query) > 0)
          {?>
      
            <table class="table bg-white tbl_list" width="100%">
                <thead>
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Date</th>
              
                   
                </thead>
               
            <?php  
          while($row=mysqli_fetch_array($query)){
          ?>
           <tbody>
            <tr> 
            
              <td><?php echo $row['payment_id']; ?></td>
							<td>&#8369; <?php echo $row['amount']; ?></td>
							<td ><?php echo $row['date']; ?></td>
              
            
                     
             
			        </tr>
              </tbody>
              
              <?php
            } 
          }else{
            ?><tbody>
            <tr>
                    <div class="my-5">
                      <div class="lead fs-6 text-center ">No data available.</div>
                     </div>
                     </tr>
                     </tbody>
         <?php } ?>         
         </table>
                  
            </div>
            </div>
</div>




<div class="modal fade" id="link">
        <div class="modal-dialog modal-dialog-centered" >
            <div class="modal-content">
               <form action="link.php" method="POST">
                  <div class="ml-auto p-4">
                      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                      </button>
                  </div>
          
                  <div class="modal-body px-5">
                      <input type="text" name="account" id="" class="form-control" placeholder="Account number">
                  </div>

                  <div class="my-4 d-flex justify-content-center">
                      <button type="button" class="btn btn-danger mr-4" data-dismiss="modal">Close</button>
                      <input value="Link account" type="submit" class="btn btn-success">
                  </div>

                </form>
            </div>
        </div>
        </div>

        
        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
  <link rel="stylesheet" href="/resources/demos/style.css">
  <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

        <div class="modal fade" id="schedule-appointment" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content"> 
                        <div class="modal-header">
                            <h4 class="modal-title" id="staticBackdropLabel">Request Appointment</h4>
                            <button type="button" class="btn bg-none text-blue" data-bs-dismiss="modal"><i class="fas fa-times"></i></button>
                        </div>
               
                        <div class="modal-body px-1">
                            <form method="POST" action="insert-apnt.php">
                              
                                    <br>
                                    <div class="container px-5">
                                
                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Full Name</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" name="name" 
                                            value="<?php echo $_SESSION['first_name']." ". $_SESSION['last_name']; ?>" required focus>
                                        </div>
                                    </div>
                                
                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label>Email Address</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="email" name="email" value="<?php echo $_SESSION['email']; ?>" > 
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label>Mobile Number</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="tel" pattern="[0-9]{11}" name="num" placeholder="09" required>
                                        </div>
                                    </div>

                                    <div class="row ">
                                        <div class="col-sm-4">
                                            <label>Service</label>
                                        </div>
                                        <div class="col-sm-8">
                                        <select class="form-control" name="service" required>
                                            <option disabled>Please Select</option>
                                            <option value="Extraction">Extraction</option>
                                            <option value="Tooth Filling">Tooth Filling</option>
                                            <option value="Braces">Braces</option>
                                            <option value="Dentures">Dentures</option>
                                            <option value="Cleaning">Cleaning</option>
                                            <option value="Root Canal">Root Canal</option>
                                            <option value="Consultation">Consultation</option>
                                            <option value="Retainer">Retainer</option>
                                            <option value="Fixed Bridge and Jacket">Fixed Bridge and Jacket</option>
                                            <option value="Veneers">Veneers</option>
                                        </select>
                                        </div>
                                    </div>

                                    <div class="row mt-4">
                                        <div class="col-sm-4">
                                            <label>Time</label>
                                        </div>
                                        <div class="col-sm-8"> 
                                        <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.css">
                                        <script src="https://code.jquery.com/jquery-3.4.1.js"></script>
                                        <script src="//cdnjs.cloudflare.com/ajax/libs/timepicker/1.3.5/jquery.timepicker.min.js"></script>
                                       
                                       
                                            <input  type="text" class="timepicker form-control" name="app_time" placeholder="Select time" required>
                                            <br>
                                            <script>
                                        $('.timepicker').timepicker({
                                            timeFormat: 'h:mm p',
                                            interval: 60,
                                            dynamic: true,
                                            dropdown: true,
                                            scrollbar: true,
                                            minTime: '8:30am',
                                            maxTime: '3:30pm',
                                            zindex: 9999999,
                                        });//no sunday and friday
                                          $(document).ready(function(){
                                              $("#datepicker").datepicker({
                                                  beforeShowDay:date
                                                 
                                              });
                                              function date (date){
                                                  var day = date.getDay();
                                                  return [(day != 0 && day !=5)];
                                              };
                                          });
                                      </script>

                                        <link rel="stylesheet" href="//code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
                                        <link rel="stylesheet" href="/resources/demos/style.css">
                                        <script src="https://code.jquery.com/jquery-1.12.4.js"></script>
                                        <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>


                                                                          
                                        </div>
                                
                                    </div>

                                    <div class="row">
                                        <div class="col-sm-4">
                                            <label>Appointment Date</label>
                                        </div>
                                        <div class="col-sm-8">
                                            <input class="form-control" type="text" id="datepicker" name="app_date" placeholder="Select date" required>
                                        </div>
                                    </div>

                                </div>
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-outline-danger" data-bs-dismiss="modal">Cancel</button>
                               
                                <input type="submit" class="btn btn-outline-success" data-bs-toggle="modal" value="Request">
                                
                            </div>
                        </form>
                    </div>                
                </div>
            </div>




                
        <script src="assets/app.js"></script>
    </body>
</html>