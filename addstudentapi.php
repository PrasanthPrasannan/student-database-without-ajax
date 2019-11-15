<?php

include 'dbcon.php';

if(isset($_POST['name'])){

    $name=$_POST['name'];
    $rollno=$_POST['rollno'];
    $admno=$_POST['admno'];
    $college=$_POST['college'];
    $username=$_POST['username'];
    $password=$_POST['password'];
    
    $hashpassword=md5($password);

    $sql="INSERT INTO `student_details`(`name`, `rollno`, `admno`, `college`, `username`, `password`) VALUES ('$name',$rollno,$admno,'$college','$username','$hashpassword')";

     $r=array();

    $result=$connection->query($sql);

    if($result===TRUE){

        $r["Status"]="Data Inserted";

    }
    else
    {
        $r["Status"]="Data Insertion Failed";
    }

echo json_encode($r);

}
else{

    echo "invalid";
}

?>