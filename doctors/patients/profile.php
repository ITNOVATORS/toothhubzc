<?php $page='patients'; 
include '../../include/header.php'; 
include ('../../include/connection.php');
$id = $_GET['id'];
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
    <link rel="stylesheet" href="../../css/modal-style.css">
    <link rel="stylesheet" href="patients-style.css">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


</head>
<body style="background-color: #F4F8FC;">
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
            <h4 class="font-weight-bold">BALANCE</h4>
            <div class="row"> 
                <h1 class="font-weight-bold ml-3 text-center"><?php echo $row['fee']; ?></h1>
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
                
            </table>    
        </div>
    </div>


</div>  
  
</body>
</html>