<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>
<body>
<div class="container border">
 <div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">STUDENT LOGIN</h1>
<form method="POST">
<table class="table">
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
<tr>
<td></td>
<td>
<a href="login-admin.php"><h3>User Login Here</h3></a>
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

session_start();

include 'dbcon.php';

if(isset($_POST['submit'])){

$username=$_POST['username'];
$password=$_POST['password'];

 $hash=md5($password);

 $sql="SELECT Id,`name`, `rollno`, `admno`, `college`, `username`, `password` FROM `student_details` WHERE `username`='$username' and `password`='$hash'";

$result=$connection->query($sql);

if($result->num_rows>0){

  while($row=$result->fetch_assoc()){

    $id=$row['Id'];

    $_SESSION['studentlogin']="true";
    
    $_SESSION['student_id']=$id;

header('Location:student_viewprofile.php');

  }

}


}

?>