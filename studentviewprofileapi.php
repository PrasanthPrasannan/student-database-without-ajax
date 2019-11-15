<?php

include 'dbcon.php';


$Sid=$_SESSION['student_id'];

$sql="SELECT * FROM `student_details` where Id=$Sid";

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


?>


