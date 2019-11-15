<?php

session_start();

if(!isset($_SESSION['student_id'])){

header('Location:student-login.php');

}

?>

<?php
include 'navbar_student.php';

?>

<?php

include 'dbcon.php';

$Sid=$_SESSION['student_id'];

$sql="SELECT * FROM `student_details` WHERE Id=$Sid";

$result=$connection->query($sql);


if($result->num_rows>0){

  echo "<div class='container border'> <div class='row'> <div class='col-md-12'>";
  echo "<h1 style='text-align:center; font-size:18px;'>Student Details</h1>";
  echo "<form method='POST'> <table class='table'>";

  while($row=$result->fetch_assoc()){

    $admno=$row['admno'];
    $name=$row['name'];
    $rollno=$row['rollno'];
    $college=$row['college'];
    $username=$row['username'];
    $password=$row['password'];

    echo "<tr><td>Name</td><td><input type='text' class='form-control' name='names' value='$name'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' name='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' name='admnos' value='$admno'></td></tr>";
    echo "<tr><td>College</td><td><input type='text' class='form-control' name='colleges' value='$college'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' name='usernames' value='$username'></td></tr>";
    echo "<tr><td></td><td><button type='submit' class='btn btn-success' name='update'>UPDATE</button> 
          <button type='submit' class='btn btn-success' name='delete'>DELETE</button></td><tr>";
}
echo "</table> </form>";
    echo "</div> </div> </div>";
}

else{

  echo "<script>alert('Invalid Credential')</script>";
}


?>

<?php

if(isset($_POST['update'])){

  $admnos=$_POST['admnos'];
  $names=$_POST['names'];
  $rollnos=$_POST['rollnos'];
  $colleges=$_POST['colleges'];
  $usernames=$_POST['usernames'];
  

  $sql="UPDATE `student_details` SET `name`='$names',`rollno`=$rollnos,`admno`=$admnos,`college`='$colleges',`username`='$usernames' WHERE `Id`='$Sid'";

 $result=$connection->query($sql);

if($result===TRUE){

  echo "<script>alert('Data Updated')</script>";
}
else{
  echo "<script>alert('Data Updation Failed')</script>";
}
}


if(isset($_POST['delete'])){

  $student_delete=$_POST['admnos'];


  $sql="DELETE FROM `student_details` WHERE `admno`=$student_delete";

  $result=$connection->query($sql);


if($result===TRUE){

echo "<script>alert('Data Deleted')</script>";

}
else{

    echo "<script>alert('Data Deletion Failed')</script>";
}
    
}

?>
