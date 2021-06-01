<?php $page='patients'; 
include '../../include/header.php'; 
include ('../../include/connection.php');
include '../../include/links.php';

?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <title>Patients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style-patients.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/scroll.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="patients-style.css">

    <script type="text/javascript" src="balance.js"></script>
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">

</head>
<body style="background-color: #e6f2ff;">
  <div class="main-container">
  <div class="row mx-1 mb-5">
      <div class="col-sm-8 col">
      <a href="index.php"  type="button" class="btn btn-info text-white py-2">
      <i class="fas fa-chevron-left pr-2"></i>  Back to Patients
      </a>
      </div>
     
    </div>




    <?php 
    $id = $_GET['id'];
    $query = mysqli_query($con, "
    SELECT patient.*, med_stat.*
    FROM `patient`
    JOIN `med_stat` ON patient.patient_id = med_stat.patient_id
    where med_id = '$id'
    ;");
    $row=mysqli_fetch_array($query);
   ?>
<div class="container">
    <div class="row mx-0 bg-white rounded py-4 px-5">
        <div class="col-sm-10">
            <h2 class="mt-3"><?php echo $row['first_name']." ". $row['last_name']; ?></h2 class="mt-3">
            <p class="pt-3">Patient ID: <?php echo $row['patient_id']; ?><br><em>
            Date added: <?php echo $row['dt']; ?></em></p>
        </div>
        <div class="col-sm-2">
            <h4 class="font-weight mt-3 text-center">BALANCE</h4>
            <div class="row"> 
                <h3 class="font-weight-bold text-center">&#8369; <?php echo $row['balance']; ?></h3>
                <button type="button" class="btn btn-success mt-2 px-2 mb-0" data-toggle="modal" data-target="#add-patient1">
                Update Balance</button>

            </div>
        </div>
    </div>   
      
         

        <div class="row">
            <!--left-->
            <div class="col-sm-6">
                <div class="container px-5 info bg-white rounded">
                    <h5 class="pb-5 pt-5 text-center LEAD">PERSONAL INFORMATION </h5>
                    <div class="row">
                        <div class="col-sm-6 pl-5">
                            <label>Address:</label>
                        </div>

                        <div class="col-sm-6 ">
                         <b><?php echo $row['street'] .', '.  $row['barangay'].', '.  $row['city'] ; ?></b>
                        </div>
                    </div>       
            
                    <div class="row">
                        <div class="col-sm-6  pl-5">
                       
                            <label>Birthdate:</label>
                        </div>

                        <div class="col-sm-6">
                        <b><?php echo $row['birthdate']; ?></b>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-6 pl-5 ">
                            <label>Gender:</label>
                        </div>

                        <div class="col-sm-6">
                        <b><?php echo $row['sex']; ?></b>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-sm-6 pl-5" >
                            <label>Status:</label>
                        </div>

                        <div class="col-sm-6">
                        <b><?php echo $row['status']; ?></b>
                        </div>
                    </div> 

                    <div class="row">
                        <div class="col-sm-6 pl-5">
                            <label>Occupation:</label>
                        </div>

                        <div class="col-sm-6">
                        <b> <?php echo $row['occupation']; ?></b>
                        </div>
                    </div>
                    
                    <div class="row pb-5">
                        <div class="col-sm-6 pl-5">
                            <label>Contact:</label>
                        </div>

                        <div class="col-sm-6">
                        <b> <?php echo $row['mobile_num']; ?></b>
                        </div>
                    </div> 
                </div>
            </div>

         <!--right-->
            <div class="col-sm-6">
                    <div id="accordion">
                        <div class="card">
                            <div class="card-header  bg-white" id="headingOne">
                            <h5 class="mb-0">
                                <button class="btn btn-link text-dark bg-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                VITAL SIGNS
                                </button>
                            </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container mt-5">
                                    <h>Weight: <b><?php echo $row['weight']; ?></b></h> <br><br>
                                    <h>Temperature: <b><?php echo $row['temperature']; ?></b></h><br><br>
                                    <h>Blood Pressure: <b><?php echo $row['bp']; ?></b></h> <br> <br>
                                    <h>Pulse Rate: <b><?php echo $row['pr']; ?></b></h> <br><br><br>
                                </div>
                            </div>
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header bg-white" id="headingTwo">
                            <h5 class="mb-0">
                                <button class="btn btn-link collapsed bg-white text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                MEDICAL CONDITION
                                </button>
                            </h5>
                            </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                            <div class="container mt-2">
                               
                                <h>Bleeding Disorder: <b><?php echo $row['bleeding']; ?></b></h> <br><br>
                                <h>Heart Disease: <b><?php echo $row['heart']; ?></b></h><br><br>
                                <h>Diabetes: <b><?php echo $row['diabetes']; ?></b><br><br>
                                <h>Hypertension: <b><?php echo $row['hypertension']; ?></b></h> <br> <br>
                                <h>Allergy: <b><?php echo $row['allergy']; ?></b></h> <br><br>
                                <h>Other Condition: <b><?php echo $row['other']; ?></b></h> <br><br>

                                
                            </div>
                            </div>
                            </div>
                        </div>
                    </div> 
                </div>
        </div>    

        <div class="container mb-4">
        
                <a href="edit.php?id=<?php echo $row['patient_id'];?>"  type="button" class="btn btn-success text-white mr-4">
                <i class="fas fa-edit pr-2"></i>  Edit details
                </a>
                <a onclick="return confirm('Are you sure you want to delete the entire record?')" href="delete-patient.php?id=<?php echo $row['patient_id'];?>"  type="button" class="btn btn-danger text-white">
                <i class="fas fa-trash pr-2"></i>  Delete patient
                </a>
        </div>
 <!---
                            <div class="row d-flex align-items-center  mt-5">
                              <div class="col-sm ml-3">
                              <div class="priority_low"></div>No treatment done
                              </div>
                             
                   <div class="col-sm">
                   <div class="priority_normal"></div>With treatment
                   </div>
                           
                            <div class="col-sm">
                            <div class="priority_high" ></div>Extracted
                            </div>
                           
                           
</div>
                            
          <div class="col-sm mt-5"> 
                 <center> <img src="../../images/charttop.jpg" alt="toothchart" width="900" height="150px"></center>  
                 
                  <center><table width="900">
                  
                    <tr>
                      <td>_ </td>
                      <td>1 </td> 
                      <td>2</td>  
                      <td>3</td>  
                      <td>4</td> 
                      <td>5</td>  
                      <td>6</td>  
                      <td>7</td> 
                      <td>8</td>  
                      <td>9</td>  
                      <td>10</td> 
                      <td>11</td>  
                      <td>12</td>  
                      <td>13</td> 
                      <td>14</td>  
                      <td>15</td>  
                      <td>16</td> 
   

                    <tr>
                      <tr>
                        <td> </td> 
                         <td><?php

                            $checkbox = 1

                       //     $query = mysqli_query("SELECT * FROM treatment WHERE tooth_num = '$checkbox' WHERE patient_id='$id'";)
                         //   $result = mysqli_query($query);
                          //  if ($result) {
                           //   if (mysql_num_rows($result) > 0) {
                            //    echo '<div class="priority_low">'.'</div>';
                             // } else {
                            //    echo '<div class="priority_normal">'.'</div>';
                            //  }
                           // } else {
                           //   echo 'Error: '.mysql_error();
                           // }
                           // ?>


                         </td> 
                      <td><div class="priority_normal"></td>  
                      <td><div class="priority_high"></td>  
                      <td>_</td>
                      <td><div class="priority_low"></td> 
                      <td><div class="priority_normal"></td>  
                      <td><div class="priority_high"></td>  
                      <td>_</td>
                      <td><div class="priority_low"></td> 
                      <td><div class="priority_normal"></td>  
                      <td><div class="priority_high"></td>  
                      <td>_</td>
                      <td><div class="priority_low"></td> 
                      <td><div class="priority_normal"></td>  
                      <td><div class="priority_high"></td>  
                      <td>_</td>
                    <tr>
                  <table>
                
            <hr width="100%">
              <center> <img src="../../images/chartbot.jpg" alt="toothchart" width="900" height="150px"> </center>
                    </div>  

                    <center><table width="900">
                  
                  <tr>
                    <td>_ </td>
                    <td>32</td> 
                    <td>31</td>  
                    <td>30</td>  
                    <td>29</td> 
                    <td>28</td>  
                    <td>27</td>  
                    <td>26</td> 
                    <td>24</td>  
                    <td>24</td>  
                    <td>23</td> 
                    <td>22</td>  
                    <td>21</td>  
                    <td>20</td> 
                    <td>19</td>  
                    <td>18</td>  
                    <td>17</td> 
                  <tr>
                    <tr>
                      <td> </td> 
                    <td><div class="priority_low"></td> 
                    <td><div class="priority_normal"></td>  
                    <td><div class="priority_high"></td>  
                    <td>_</td>
                    <td><div class="priority_low"></td> 
                    <td><div class="priority_normal"></td>  
                    <td><div class="priority_high"></td>  
                    <td>_</td>
                    <td><div class="priority_low"></td> 
                    <td><div class="priority_normal"></td>  
                    <td><div class="priority_high"></td>  
                    <td>_</td>
                    <td><div class="priority_low"></td> 
                    <td><div class="priority_normal"></td>  
                    <td><div class="priority_high"></td>  
                    <td>_</td>
                  <tr>
                <table>
             <br>
             <br>
             <br>
              
             
                
               
              
               
</div>   -->

    <div class="row mt-5 pt-5">

      <div class="col-sm">
      <div class="fs-4 text-left ml-3">Treatment History</div>
      </div>
      <div class="col-sm">
      <button type="button" class="btn btn-primary py-2 d-flex align-items-center" data-toggle="modal" data-target="#add-patient">
                  <i class="bx bx-plus mr-2"></i>  Add new treatment
                  </button>
      </div>
      <div class="col-sm mr-3">
        <input class="form-control float-right py-2" id="myInput" type="text" placeholder="Search..">
        </div></div>
       
      <div class="row">
        <div class="col-sm mx-3 ">
            <table class="table bg-white" width="100%">
                <thead>
                    <th>Date</th>
                    <th>Tooth Number</th>
                    <th>Treatment</th>
                    <th>Description</th>
                    <th>Fee</th>
                  
                </thead>
                <tbody>
				    <?php


              
            $query = mysqli_query($con, "select * from `treatment` WHERE patient_id = '$id' ");
            while($row=mysqli_fetch_array($query)){
            ?>
            <tr> 
            
              <td><?php echo $row['date']; ?></td>
							<td><?php echo $row['tooth_num']; ?></td>
							<td ><?php echo $row['treatment']; ?></td>
              <td><?php echo $row['description']; ?></td>
							<td>&#8369; &nbsp;<?php echo $row['fee']; ?></td>
        
                     
              </td>
			        </tr>
              <?php
            }          
            ?>
            </table>        
            </div>
            
            </div>
      </div>

        <!--payment history -->
        <div class="container">
     
    <div class="row mt-5  ">
    <div class="col-sm-7">
      <div class="fs-4 text-left ml-3">Payments</div>
    </div>
      
      <div class="col-sm mr-3">
        <input class="form-control float-right py-2" id="myInput" type="text" placeholder="Search..">
        </div>
    </div>
        <div class="row mx-3">
            <table class="table bg-white tbl_list" width="100%">
                <thead>
                    <th>Payment ID</th>
                    <th>Amount</th>
                    <th>Date</th>
              
                   
                </thead>
                <tbody>
				    <?php


              
            $query = mysqli_query($con, "select * from `payments` WHERE patient_id = '$id' ");
            while($row=mysqli_fetch_array($query)){
            ?>
            <tr> 
            
              <td><?php echo $row['payment_id']; ?></td>
							<td>&#8369; <?php echo $row['amount']; ?></td>
							<td ><?php echo $row['date']; ?></td>
              
            
                     
              </td>
			        </tr>
              <?php
            }          
            ?>
            </table>        
            </div>
            
        </div>
  
  

</div>  
  
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add-patient">
        <div class="modal-dialog modal-lg" role="document">
          <div class="modal-content  text-dark">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user-plus mr-2"></i> Add new treatment</h5>
              <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            
           
              <div class="modal-body p-5">
              


                    <?php 
                    $id = $_GET['id'];
                    $query = mysqli_query($con, "
                    SELECT patient.*, med_stat.*
                    FROM `patient`
                    JOIN `med_stat` ON patient.patient_id = med_stat.patient_id
                    where med_id = '$id'
                    ;");
                    $row=mysqli_fetch_array($query);
                  ?> <form method="POST" action="inserttreatment.php">
                        
                        <div class="row">
                          <div class="col-sm-7">
                            <p>Patient ID: <?php echo $row['patient_id']; ?>
                            <input type="hidden" name="id" value="<?php echo $row['patient_id'];?>">
                            <p>Patient name: <?php echo $row['first_name'] .' '. $row['last_name'] ; ?>
                          </div> 
                        
                     
                        <div class="col-sm">
                            <small name="date" id="date"></small>
                                <script>
                                document.getElementById("date").innerHTML = Date();
                                </script>
                            </div>

                        </div>
                            <br>

<table width="100%" bgcolor=#DFF3FA>
<tr class="text-center">
  <td> <label for="1"> 1</label></td>
  <td> <label for="1"> 2</label></td>
  <td> <label for="1"> 3</label></td>
  <td> <label for="1"> 4</label></td>
  <td> <label for="1"> 5</label></td>
  <td> <label for="1"> 6</label></td>
  <td> <label for="1"> 7</label></td>
  <td> <label for="1"> 8</label></td>
  <td> <label for="1"> 9</label></td>
  <td> <label for="1"> 10</label></td>
  <td> <label for="1"> 11</label></td>
  <td> <label for="1"> 12</label></td>
  <td> <label for="1"> 13</label></td>
  <td> <label for="1"> 14</label></td>
  <td> <label for="1"> 15</label></td>
  <td> <label for="1"> 16</label></td>
</tr>
<tr class="text-center">
<td> <input type="checkbox"  name="tooth_num[]" value=" 1 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 2 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 3 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 4 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 5 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 6 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 7 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 8 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 9 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 10 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 11 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 12 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 13 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 14 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 15 "></td>
<td> <input type="checkbox"  name="tooth_num[]" value=" 16 "></td>
</tr>
  </table>
              <div> 
                  <img src="../../images/chart3.jpg" alt="toothchart" width="100%" height="300px" >
              </div>
  <table width="100%" bgcolor=#DFF3FA>
  <tr class="text-center">    
  <td><input type="checkbox"  name="tooth_num[]" value=" 32  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 31  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 30  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 29  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 28  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 27  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 26  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 25  "></td>
  <td> <input type="checkbox"  name="tooth_num[]" value=" 24  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 23  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 22  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 21  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 20  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 19  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 18  "></td>
  <td><input type="checkbox"  name="tooth_num[]" value=" 17  "></td>

</tr>
<tr class="text-center mt-5">
<td><label for="1"> 32</label></td>
<td><label for="1"> 31</label></td>
<td><label for="1"> 30</label></td>
<td><label for="1"> 29</label></td>
<td><label for="1"> 28</label></td>
<td><label for="1"> 27</label></td>
<td><label for="1"> 26</label></td>
<td><label for="1"> 25</label></td>
<td><label for="1"> 24</label></td>
<td><label for="1"> 23</label></td>
<td><label for="1"> 22</label></td>
<td><label for="1"> 21</label></td>
<td><label for="1"> 20</label></td>
<td><label for="1"> 19</label></td>
<td><label for="1"> 18</label></td>
<td><label for="1"> 17</label></td>
</tr>
  </table>
  
              <div class="row mt-5">
                <div class="col-sm-3">
                  <label>Treatment</label>
                </div>
                  <div class="col-sm-7">
                  <select class="form-control" id="treatment" name="treatment" required>
                  <option disabled="" selected="">Please Select</option>
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
              <div class="row">
                <div class="col-sm-3">
                    <label>Description</label>
                  </div>
                  <div class="col-sm">
                <input class="form-control" type="text" name="description" required>
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                    <label>Fee</label>
                  </div>
                  <div class="col-sm">
                <input class="form-control" type="number" name="fee" placeholder="&#8369;" required>
                </div>
              </div>
              </div>
                            
              <div class="modal-footer m-0">
             
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <input id="button" type="submit"  class="btn btn-outline-success" value="Add treatment">
              </div>    
            </form>        
          
        </div>
      </div>
</div>
  <!--modalbalance    onclick="javascript:alert('success') -->
  <div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"  id="add-patient1">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Update Payment</h5>
                <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
              </div>
            <form method="POST" action="compute.php?id=<?php echo $row['patient_id']; ?>">
                <div class="modal-body mx-5 my-4">
                    <div class="row justify-content-center">
                      <h2 class="modal-title text-center">BALANCE</h2>
                    </div>
                     <div  class="modal-title text-center"> 
                      <h1 class="font-weight-bold ml-2 text-center"> &#8369; <?php echo $row['balance']; ?></h1>  
                  
                  </div>
                

                        <div class="row justify-content-center">
                            <!--<h6 class="modal-title text-center">ToothHub Dental Clinic QR Code<br><br><br>-->
                            
                            <div class="row d-flex mt-5 justify-content-center align-items-center">
                                  <div class="col-sm-3">
                                      <h5 class="font-weight-bold ml-2 text-center">Cash</h5>
                                  </div>
                                  <div class="col-sm-6">
                                        <input class="form-control" type="number" id="pay" min="1" max="<?php echo $row['balance']; ?>"  name="pay" required>
                                  </div>
                            </div>                        
                            
                        </div>
                        <br>
                        <div class="row my-0">
                              <div class="col-sm">
                                <label><em><h6>Permit number: 245-1202-ARGS-73</h6></em></label>
                              </div>

                        </div>
                        </div>       
                  <div class="modal-footer">
                    <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
                    <input id="button" type="submit" name="submit" class="btn btn-outline-success" value="Proceed">

                  
                </div> 
            </form>        
          </div>
        </div>
      </div>
</div> 
       
</body>
</html>