<?php $page='patients'; 
include '../../include/header.php'; 
include ('../../include/connection.php');
$id = $_GET['id'];

if(isset($_POST['first_name'])){
	$first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];	
    $street = $_POST['street'];
	$barangay = $_POST['barangay'];
	$city = $_POST['city'];
	$date = $_POST['birthdate'];
	$birthdate = date("Y-m-d", strtotime($date));
    $sex = $_POST['sex'];
    $status = $_POST['status'];
    $occupation = $_POST['occupation'];
    $mobile_num = $_POST['mobile_num'];
    
    $weight = $_POST['weight'];
	$temperature = $_POST['temperature'];
	$bp = $_POST['bp'];
	$pr = $_POST['pr'];


	$bleeding = $_POST['bleeding'];
	$heart = $_POST['heart'];
	$diabetes = $_POST['diabetes'];
	$hypertension = $_POST['hypertension'];
	$allergy = $_POST['allergy'];
	$other = $_POST['other'];

    $sql1 = mysqli_query($con, "
	update patient set first_name = '$first_name', last_name = '$last_name', street = '$street', barangay = '$barangay',city='$city', birthdate = '$birthdate',sex='$sex',status='$status',occupation='$occupation',mobile_num='$mobile_num' where patient_id = '$id'");
    

    $sql = mysqli_query($con, "
	update med_stat set weight = '$weight', temperature = '$temperature',bp = '$bp',pr='$pr',bleeding='$bleeding',heart='$heart',diabetes='$diabetes', hypertension='$hypertension',allergy='$allergy', other='$other' where patient_id = '$id'");
      
    if($sql1){
    echo '<script>alert("Record has been updated.");</script>';
    echo '<script>window.location.href = "profile.php?id='.$id.'"</script>';
    }

} 
    
   
?>


<!DOCTYPE html>
<html>
<head>
    <title>Patients</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="../../images/logo.png" type="image/png" sizes="16x16">
    <link rel="stylesheet" href="../../css/header.css">
    <link rel="stylesheet" href="../../css/style-patients.css">
    <link rel="stylesheet" href="../../css/main-container.css">
    <link rel="stylesheet" href="../../css/fontawesome/css/all.css" >
    <link rel="stylesheet" href="../../bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="../../css/scroll.css">
    <link rel="stylesheet" href="patients-style.css">
    <link href="../css/fontawesome/css/all.css" rel="stylesheet">
    <script type="text/javascript" src="../../jquery/jquery-3.6.0.js"></script>
    <script type="text/javascript" src="../../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>


</head>

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
<body style="background-color: #e6f2ff;">

<div class="main-container">
 
<form action="edit.php?id=<?php echo $row['patient_id'];?>" method="POST">


    <div class="container">
    
        <div class="row bg-white rounded p-4">
            <div class="col-sm-10">
            
            <div class="row d-flex align-items-center ml-0">
           
            Name: <input class="form-control ml-3" name="first_name" type="text" focus value="<?php echo $row['first_name']; ?>"><br>
            <input class="form-control ml-3" name="last_name" type="text" focus value="<?php echo $row['last_name']; ?>">    
        </div>
                <p>Patient ID: <?php echo $row['patient_id']; ?><em><br>
                Date added: <?php echo $row['dt']; ?></em></p>
            </div>
        </div>             
    </div>         
        <div class="row">
            <!--left-->
            <div class="col-sm-6">
                <div class="container px-5 pb-2 info bg-white rounded">
                    <h5 class="pb-5 pt-5 text-center LEAD">PERSONAL INFORMATION </h5>
                        <div class="row">
                            <div class="col-sm-5 pl-4">
                                <label>Address:</label>
                            </div>

                            <div class="col-sm-7 ">
                            <input class="form-control " type="text"  name="street" value="<?php echo $row['street']; ?>">
                            <input class="form-control mt-2" type="text"  name="barangay" value="<?php echo $row['barangay']; ?>">
                            <input class="form-control mt-2" type="text"  name="city" value="<?php echo $row['city']; ?>">
                            </div>
                        </div>       
                
                        <div class="row">
                            <div class="col-sm-5  pl-4">
                        
                                <label>Birthdate:</label>
                            </div>

                            <div class="col-sm-7">
                            <input class="form-control" type="date" name="birthdate" value="<?php echo $row['birthdate']; ?>">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-5 pl-4 ">
                                <label>Gender:</label>
                            </div>

                            <div class="col-sm-7">
                                    <select class="form-control" name="sex">
                                                <option selected="" value="<?php echo $row['sex']; ?>"><?php echo $row['sex']; ?></option>
                                                <option value="Female">Female</option>
                                                <option value="Male">Male</option>
                                            </select>
                        
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5 pl-4" >
                                <label>Status:</label>
                            </div>

                            <div class="col-sm-7">
                            <input class="form-control" type="text" name="status" focus value="<?php echo $row['status']; ?>">
                            </div>
                        </div> 

                        <div class="row">
                            <div class="col-sm-5 pl-4">
                                <label>Occupation:</label>
                            </div>

                            <div class="col-sm-7">
                            <input class="form-control" type="text"  name="occupation" focus value="<?php echo $row['occupation']; ?>">
                            </div>
                        </div>
                    
                        <div class="row pb-5">
                            <div class="col-sm-5 pl-4">
                                <label>Contact:</label>
                            </div>

                            <div class="col-sm-7">
                            <input class="form-control" type="tel" name="mobile_num" focus value="<?php echo $row['mobile_num']; ?>" pattern="[0-9]{11}">
                            </div>

                        </div> 
                        <div class="row d-flex justify-content-center mb-4">
                            <a href="profile.php?id=<?php echo $row['patient_id']?>"  type="button" class="btn btn-danger text-white mr-4">Cancel</a>
                            <input type="submit" onclick="return confirm('Are you sure you want to save changes?');" class="btn btn-success" value="Save changes">
                        
                        </div>
                             
                    </div>
                </div>
            

                <!--VITAL-->
                <div class="col-sm-6">
                    <div id="accordion">
                    
                        <div class="card">
                            <div class="card-header  bg-white" id="headingOne">
                            <h5 class="mb-0">
                                <a class="btn btn-link text-dark bg-white" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                                VITAL SIGNS
                                </a>
                            </h5>
                            </div>

                            <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body">
                            
                                    <div class="ml-3 row d-flex align-items-center">
                                        <div class="col-sm-5">
                                            Weight: 
                                        </div>
                                        <div class="col-sm">
                                            <input class="form-control col-sm-9 ml-4" type="text"  name="weight" value="<?php echo $row['weight']; ?>"> 
                                        </div>
                                    </div>

                                    <div class="ml-3 row d-flex justify-content-center align-items-center">
                                        <div class="col-sm-5">
                                        Temperature: 
                                        </div>
                                        <div class="col-sm">

                                        <input class="form-control col-sm-9 ml-4" type="text" name="temperature" focus value="<?php echo $row['temperature']; ?>">
                                        </div>
                                    </div>

                                    <div class="ml-3 row d-flex justify-content-center align-items-center">
                                        <div class="col-sm-5">
                                            Blood Pressure: 
                                            </div>
                                        <div class="col-sm">
                                            <input class="form-control col-sm-9 ml-4" type="text"  name="bp" focus value="<?php echo $row['bp']; ?>">
                                        </div>
                                    </div>

                                    <div class="ml-3 row d-flex justify-content-center align-items-center">
                                        <div class="col-sm-5">
                                        Pulse Rate:
                                        </div>
                                        <div class="col-sm">
                                         <input class="form-control col-sm-9 ml-4" type="text" name="pr"  focus value="<?php echo $row['pr']; ?>">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </DIV>
                      


                     <!--MEDICAL-->
                        <div class="card">
                                <div class="card-header bg-white" id="headingTwo">
                                    <h5 class="mb-0">
                                        <a class="btn btn-link collapsed bg-white text-dark" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                        MEDICAL CONDITION
                                        </a>
                                    </h5>
                                </div>
                            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordion">
                            <div class="card-body">
                                <div class="container mt-2">
                               

                               <div class="ml-3 row d-flex  align-items-center">
                                         <div class="col-sm-6">
                                            Bleeding Disorder: 
                                        </div>
                                        <div class="col-sm-5">
                                            <select class="form-control" name="bleeding">
                                                <option selected="" value="<?php echo $row['bleeding']; ?>"><?php echo $row['bleeding']; ?></option>
                                                <option value="None">None</option>
                                                <option value="Yes">Yes</option>
                                            </select>
                                        </div>
                                </div>

                                <div class="row ml-3 d-flex  align-items-center">
                                    <div class="col-sm-6">
                                            Heart Disease:
                                        </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="heart">
                                            <option selected="" value="<?php echo $row['heart']; ?>"><?php echo $row['heart']; ?></option>
                                            <option value="None">None</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row ml-3 d-flex  align-items-center">
                                    <div class="col-sm-6">
                                            Diabetes:
                                        </div>
                                    <div class="col-sm-5">
                                        <select class="form-control" name="diabetes">
                                            <option selected="" value="<?php echo $row['diabetes']; ?>"><?php echo $row['diabetes']; ?></option>
                                            <option value="None">None</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row ml-3 d-flex  align-items-center">
                                    <div class="col-sm-6">
                                    Hypertension: 
                                        </div>
                                   
                                    <div class="col-sm-5">
                                        <select class="form-control"  name="hypertension">
                                            <option selected="" value="<?php echo $row['hypertension']; ?>"><?php echo $row['hypertension']; ?>
                                            </option>
                                            <option value="None">None</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    </div>
                                <div class="row ml-3 d-flex  align-items-center">
                                    <div class="col-sm-6">
                                    Allergy
                                        </div>
                                
                                   
                                    <div class="col-sm-5">
                                        <select class="form-control"  name="allergy">
                                            <option selected="" value="<?php echo $row['allergy']; ?>"><?php echo $row['allergy']; ?></option>
                                            <option value="None">None</option>
                                            <option value="Yes">Yes</option>
                                        </select>
                                    </div>
                                    </div>
                                    <div class="row ml-3 d-flex  align-items-center">
                                    <div class="col-sm-6">
                                    Other:
                                        </div>
                                   <textarea class="form-control ml-3 mt-2" type="text"  name="other"><?php echo $row['other']; ?></textarea>
                                   </form>     
                                </div>
                            </div>
                            </div>
                        </div>

                        <!--END MEDICAL-->
                    </div> 
                </div>
        </div>    

</div>
</body>
</html>