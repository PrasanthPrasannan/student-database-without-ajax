<?php

if(isset($_POST['admnos'])){

$student_delete=$_POST['admnos'];


$sql="DELETE FROM `student_details` WHERE `admno`=$student_delete";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="Deleted Successfully";

}
else{
    $r["Status"]="Deletion Failed";
  
}
  
}

?>