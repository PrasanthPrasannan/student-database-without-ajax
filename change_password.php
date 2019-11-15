<?php

session_start();

if(!isset($_SESSION['student_id']))
{

    header('Location:student-login.php');

}
?>

<?php

include 'navbar_student.php';

?>
<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:28px;">CHANGE PASSWORD</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Current Password
</td>
<td>
<input type="password" class="form-control" name="current_pwd">
</td>
</tr>
<tr>
<td>
New Password
</td>
<td>
<input type="password" class="form-control" name="newpwd">
</td>
</tr>
<tr>
<td>
Confirm Password
</td>
<td>
<input type="password" class="form-control" name="confirmpwd">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="submit" class="btn btn-success" name="success">Change Password</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>

<?php

$Sid=$_SESSION['student_id'];

include 'dbcon.php';

if(isset($_POST['success'])){

$current_pwd=$_POST['current_pwd'];
$new_pwd=$_POST['newpwd'];
$confirm_pwd=$_POST['confirmpwd'];

$hash_currentpwd=md5($current_pwd);
$hash_newpwd=md5($new_pwd);
$hash_conformpwd=md5($confirm_pwd);

$sql="SELECT `password` FROM `student_details` WHERE `Id`='$Sid'";


$result=$connection->query($sql);

if($result->num_rows>0){

while($row=$result->fetch_assoc()){

 $password=$row['password'];

 if($password===$hash_currentpwd){

if($hash_newpwd===$hash_conformpwd){

    $sql="UPDATE `student_details` SET `password`='$hash_conformpwd' WHERE `Id`=$Sid";

    $result=$connection->query($sql);
    
    if($result===TRUE){

        echo "<script>alert('Password Changed Successfully')</script>";

        echo "<script>window.location.href='student_viewprofile.php'</script>";
    }
    else{

        echo "<script>alert('Password Changing Failed')</script>";
    }
}
 
else{

    echo "<script>alert('Current Password Invalid')</script>";
}


}

else{

echo "<script>alert('Invalid Credential')</script>";

}

}
}
}
?>