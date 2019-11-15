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

$sql="SELECT * FROM `student_details` where Id=$Sid";

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
    

    echo "<tr><td>Name</td><td><input type='text' class='form-control' name='names' value='$name'></td></tr>";
    echo "<tr><td>Roll Number</td><td><input type='text' class='form-control' name='rollnos' value='$rollno'></td></tr>"; 
    echo "<tr><td>Admission Number</td><td><input type='text' class='form-control' name='admnos' value='$admno'></td></tr>";
    echo "<tr><td>College</td><td><input type='text' class='form-control' name='colleges' value='$college'></td></tr>";
    echo "<tr><td>User Name</td><td><input type='text' class='form-control' name='usernames' value='$username'></td></tr>";
    
}
echo "</table> </form>";
    echo "</div> </div> </div>";
}

else{

  echo "<script>alert('Invalid Credential')</script>";
}


?>


