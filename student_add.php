<?php

session_start();

if(!isset($_SESSION['loginsuccess'])){

    header('Location:login-admin.php');
}

?>

<?php
include 'navbar.php';
?>


<script>

$(document).ready(function(){

$("#submit").click(function(){

    console.log("test");

   var name=$("#name").val();
   var rollno=$("#rollno").val();
   var admno=$("#admno").val();
   var college=$("#college").val();
   var username=$("#username").val();
   var password=$("#password").val();

$.ajax({

type:'POST',
url:'addstudentapi.php',
data:{name:name,rollno:rollno,admno:admno,college:college,username:username,password:password},
success:function(response){

    console.log(response);
}

})   

})

})

</script>


<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">STUDENT ADD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Name
</td>
<td>
<input type="text" class="form-control" name="name">
</td>
</tr>
<tr>
<td>
Roll Number
</td>
<td>
<input type="number" class="form-control" name="rollno">
</td>
</tr>
<tr>
<td>
Admission Number
</td>
<td>
<input type="number" class="form-control" name="admno">
</td>
</tr>
<tr>
<td>
College
</td>
<td>
<input type="text" class="form-control" name="college">
</td>
</tr>
<tr>
<td>
User Name
</td>
<td>
<input type="text" class="form-control" name="username">
</td>
</tr>
<tr>
<td>
Password
</td>
<td>
<input type="password" class="form-control" name="password">
</td>
</tr>
<tr>
<td></td>
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

$name=$_POST['name'];
$rollno=$_POST['rollno'];
$admno=$_POST['admno'];
$college=$_POST['college'];
$username=$_POST['username'];
$password=$_POST['password'];

$hashpassword=md5($password);


$sql="INSERT INTO `student_details`(`name`, `rollno`, `admno`, `college`, `username`, `password`) VALUES ('$name',$rollno,$admno,'$college','$username','$hashpassword')";

$result=$connection->query($sql);

if($result===TRUE)
{

    echo "<script>alert('Data Inserted')</script>";

}
else{
    echo "<script>alert('Data Insertion Failed')</script>";

}
}

?>
