<?php
session_start();

if(!isset($_SESSION['loginsuccess'])){

  header('Location:login-admin.php');
}

?>

<?php
include 'navbar.php';
?>

  <div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">STUDENT SEARCH</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Admission Number
</td>
<td>
<input type="text" class="form-control" name="admno">
</td>
</tr>
<tr>
<td>
</td>
<td>
<button type="submit" class="btn btn-success" name="submit">SUBMIT</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>  
</body>
</html>

<?php

include 'dbcon.php';

if(isset($_POST['submit'])){

$admtn_number=$_POST['admno'];

$sql="SELECT  `name`, `rollno`, `admno`, `college`, `username`, `password` FROM `student_details` WHERE `admno`='$admtn_number'";

$result=$connection->query($sql);

if($result->num_rows>0){

  echo "<form method='POST'> <table class='table'>";
  echo "<tr><th>Name</th><th>Roll Number</th><th>Admission Number</th><th>College</th><th>User Name</th><th>Password</th></tr>";

  while($row=$result->fetch_assoc()){


    $name=$row['name'];
    $rollno=$row['rollno'];
    $admno=$row['admno'];
    $college=$row['college'];
    $username=$row['username'];
    $password=$row['password'];
  
    echo "<tr><td>$name</td><td>$rollno</td><td>$admno</td><td>$college</td><td>$username</td><td>$password</td></tr>";

  }

    echo "</table> </form>";
}
else{

  echo "<script>alert('Invalid Admission Number')</script>";

}

}

?>
