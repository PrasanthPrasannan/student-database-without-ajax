<?php

include 'dbcon.php';

if(isset($_POST['admnos'])){

  $admnos=$_POST['admnos'];
  $names=$_POST['names'];
  $rollnos=$_POST['rollnos'];
  $colleges=$_POST['colleges'];
  $usernames=$_POST['usernames'];
  $passwords=$_POST['passwords'];

  $sql="UPDATE `student_details` SET `name`='$names',`rollno`=$rollnos,`admno`=$admnos,`college`='$colleges',`username`='$usernames',`password`='$passwords' WHERE `admno`='$admnos'";

 $result=$connection->query($sql);

 $r=array();

if($result===TRUE){

    $r["Status"]="Updated Successfully";
}
else{

    $r["Status"]="Updation Failed";
}

echo json_encode($r);

}

?>