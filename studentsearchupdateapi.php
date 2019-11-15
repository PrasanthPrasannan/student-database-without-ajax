<?php

include 'dbcon.php';

if(isset($_POST['admno'])){

$admission_number=$_POST['admno'];


$sql="SELECT * FROM `student_details` WHERE `admno`='$admission_number'";

$result=$connection->query($sql);


if($result->num_rows>0){

  $r=array();

  while($row=$result->fetch_assoc()){

    $r["result"][]=$row;
    
}
echo json_encode($r);
}

else{

  echo "<script>alert('Invalid Credential')</script>";
}

}
?>