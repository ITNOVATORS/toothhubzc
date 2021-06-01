<?php 
include '../../include/connection.php';

    if(isset($_POST['submit'])){
        
        $random1 = rand(111,999);
        $random2 = rand(111,999);
        $random3 = $random1.$random2;
        $random3 = md5($random3);


        $file_name = $_FILES['img']['name'];
        $destination = '../../services/'.$random3.$file_name;
        move_uploaded_file($_FILES['img']['tmp_name'],$destination);
        $destination_name = 'services/'.$random3.$file_name;

        mysqli_query($con, "insert into services (service_name, description, fee, img)
        values('$_POST[name]','$_POST[description]','$_POST[fee]','$destination_name')");
    }

    header("location: index.php");

?>