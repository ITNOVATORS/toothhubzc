<?php $page='patients'; 
include '../../include/header.php'; 
include ('../../include/connection.php');

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
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    
    <link rel="stylesheet" href="patients-style.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


</head>
<body style="background-color: #e6f2ff;">
  <div class="main-container">
  <div class="row">
      <div class="col-sm-7 col">
      <a href="index.php"  type="button" class="btn btn-info text-white">
      <i class="fas fa-chevron-left pr-2"></i>  Back to Patients
      </a>
      </div>
      <div class="col-sm-5">
      <input class="form-control float-right" id="myInput" type="text" placeholder="Search..">
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
<div class="container ">
    <div class="row bg-white rounded p-4">
        <div class="col-sm-10">
            <h3><?php echo $row['name']; ?></h3>
            <p>Patient ID: <?php echo $row['patient_id']; ?><br><em>
            Date added: <?php echo $row['dt']; ?></em></p>
        </div>
        <div class="col-sm-2">
            <h4 class="font-weight">BALANCE</h4>
            <div class="row"> 
                <h3 class="font-weight-bold ml-2 text-center"><?php echo $row['fee']; ?></h3>
                <button type="button" class="btn btn-success" data-toggle="modal" data-target="#add-patient">
                             <i></i>Update Balance</a></td>
                            
            </div>
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
                         <b><?php echo $row['address']; ?></b>
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
                    <div class="col-sm-15"> 
                  <img src="../../images/chart.jpg" alt="toothchart" width="100%" >
              </div>  
                </div>
                
        </div>    
             
        <div class="row ">
           <div class="container ">


                <a href=""  type="button" class="btn btn-success text-white mr-4">
                <i class="fas fa-edit pr-2"></i>  Edit details
                </a>
       
            
                <a href="delete-patient.php?id=<?php echo $row['patient_id']; ?>"  type="button" class="btn btn-danger text-white">
                <i class="fas fa-trash pr-2"></i>  Delete patient
                </a>
                </div>
              
                
        </div>

        
 
    

    
    <div class="lead mb-3">Treatment History</div>
    
   

    <div class="row">
        <div class="container">
            <table class="tbl-list bg-white" width="100%">
                <thead>
                    <th>Date</th>
                    <th>Tooth Number</th>
                    <th>Treatment</th>
                    <th>Description</th>
                    <th>Fee</th>
                    <th class="action">Action</th>
                </thead>
                <tbody>
				<?php
              
            $query = mysqli_query($con, "select * from `treatment`");
            while($row=mysqli_fetch_array($query)){
           
            ?>
            <tr> 
                            <td><?php echo $row['date']; ?></td>
							<td><?php echo $row['tooth_num']; ?></td>
							<td ><?php echo $row['treatment']; ?></td>
                            <td><?php echo $row['description']; ?></td>
							<td><?php echo $row['fee']; ?></td>
                            <td><a href=""  type="button" class="btn btn-primary text-white mr-1">
                             <i class="fas fa-edit pr-1"></i></a></td>
                     
              </td>
			  </tr>
              <?php
            }
                     
            ?>
            </table>    

           
            
        </div>
    </div>


</div>  
  
<div class="main-container">
    <div class="row">
      <div class="col-sm-7 col">
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#add-patient">
      <i class="fas fa-user-check"></i>  Add Treatment
      </button>
      </div>
    </div>
  
<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add-patient">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user-plus"></i> Add new treatment</h5>
              <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>
            
            <form method="POST" action="inserttreatment.php">
              <div class="modal-body">
                <br>
                
              <div class="row justify-content-center">
              <h5 class="modal-title text-center">Treatment<br><hr class="hr" style="width: 180px;"></h5>

              </div>

                <div class="row">            

                <p>Patient ID: <?php echo $row['patient_id']; ?><br>
              </div>
              <div class="row justify-content-center">
                            <p class="form-control"  name="date" id="date"></p>
                                <script>
                                document.getElementById("date").innerHTML = Date();
                                </script>
                </div>


  <input type="checkbox" name="tooth_num1" value="1, ">
  <label for="1"> 1</label>
  <input type="checkbox"  name="tooth_num2" value="2, ">
  <label for="1"> 2</label>
  <input type="checkbox"  name="tooth_num3" value="3, ">
  <label for="1"> 3</label>
  <input type="checkbox"  name="tooth_num4" value="4, ">
  <label for="1"> 4</label>
  <input type="checkbox"  name="tooth_num5" value="5, ">
  <label for="1"> 5</label>
  <input type="checkbox"  name="tooth_num6" value="6, ">
  <label for="1"> 6</label>
  <input type="checkbox"  name="tooth_num7" value="7, ">
  <label for="1"> 7</label>
  <input type="checkbox"  name="tooth_num8" value="8, ">
  <label for="1"> 8</label>
  <input type="checkbox"  name="tooth_num9" value="9, ">
  <label for="1"> 9</label>
  <input type="checkbox"  name="tooth_num10" value="10, ">
  <label for="1"> 10</label>
  <input type="checkbox"  name="tooth_num11" value="11, ">
  <label for="1"> 11</label>
  <input type="checkbox"  name="tooth_num12" value="12, ">
  <label for="1"> 12</label>
  <input type="checkbox"  name="tooth_num13" value="13, ">
  <label for="1"> 13</label>
  <input type="checkbox"  name="tooth_num13" value="13, ">


              <div class="col-sm-13"> 
                  <img src="../../images/chart.jpg" alt="toothchart" width="100%" >
              </div>
  <input type="checkbox"  name="tooth_num1" value="1, ">
  <label for="1"> 32</label>
  <input type="checkbox"  name="tooth_num2" value="2, ">
  <label for="2"> 31</label>
  <input type="checkbox"  name="tooth_num3" value="3, ">
  <label for="1"> 30</label>
  <input type="checkbox"  name="tooth_num4" value="4, ">
  <label for="1"> 29</label>
  <input type="checkbox"  name="tooth_num5" value="5, ">
  <label for="1"> 28</label>
  <input type="checkbox"  name="tooth_num6" value="6, ">
  <label for="1"> 27</label>
  <input type="checkbox"  name="tooth_num7" value="7, ">
  <label for="1"> 26</label>
  <input type="checkbox"  name="tooth_num8" value="8, ">
  <label for="1"> 25</label>
  <input type="checkbox"  name="tooth_num9" value="9, ">
  <label for="1"> 24</label>
  <input type="checkbox"  name="tooth_num10" value="10, ">
  <label for="1"> 23</label>
  <input type="checkbox"  name="tooth_num11" value="11, ">
  <label for="1"> 22</label>


  <div class="row justify-content-center">
              <h5 class="modal-title text-center">Treatment<br><hr class="hr" style="width: 85px;"></h5>
              </div>
              <div class="row">
                <div class="col-sm-3">
                  <label>Treatment</label>
                </div>
                  <div class="col-sm-7">
                  <select class="form-control" id="treatment" name="treatment" required>
                      <option>Select treatment</option>
                      <option value="Brace">Brace</option>
                      <option value="Bridge">Cannal</option>
                      <option value="Cleaning">Cleaning</option>
                      <option value="Dentures">Dentures</option>
                  </select>
                  </div>
                </div>
              <div class="row">
                <div class="col-sm-3">
                    <label>Description</label>
                  </div>
                  <div class="col-sm-7">
                <input class="form-control" type="text" name="description">
                </div>
              </div>

              <div class="row">
                <div class="col-sm-3">
                    <label>Fee</label>
                  </div>
                  <div class="col-sm-5">
                <input class="form-control" type="text" name="fee"placeholder="P 000.00">
                </div>
              </div>

                            
              <div class="modal-footer">
             
              <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
              <input id="button" type="submit"  class="btn btn-outline-success" value="Save">
              </div>
              
            </form>        
          </div>
        </div>
  
</div>

<div class="modal fade" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true" id="add-patient">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title"><i class="fas fa-user-plus"></i> Add new treatment</h5>
              <button type="button" class="btn bg-none text-white" data-dismiss="modal"><i class="fas fa-times"></i></button>
            </div>



</body>
</html>