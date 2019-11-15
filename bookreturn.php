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
<h1 style="text-align:center; font-size:18px;">BOOK RETURN</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Select Student
</td>

<?php
include 'dbcon.php';

$sql="SELECT `Id`, `name` FROM `student_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<td>

    <select name='student' class='form-control'>";

    while($row=$result->fetch_assoc()){

        $student_id=$row['Id'];
        $student_name=$row['name'];

echo "<option value='$student_id'>  $student_name</option>";

    }

    echo "</td>";
}

?>

<!-- <td>
<select name="student" class="form-control">
<option value="">Select Student</option>
</select>
</td> -->
</tr>
<tr>
<td>
Select Book
</td>

<?php

include 'dbcon.php';

$sql="SELECT `Id`, `book-title` FROM `book_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<td>
    <select name='book' class='form-control'>";

    while($row=$result->fetch_assoc()){

        $book_id=$row['Id'];
        $book_name=$row['book-title'];

        echo "<option value='$book_id'>$book_name</option>";
    }
    echo "</td>";

}




?>






<!-- <td>
<select name="student" class="form-control">
<option value="">Select Student</option>
</select>
</td> -->
</tr>
<tr>
<td>
</td>
<td>
<button type='submit' class='btn btn-success' name='submit'>RETURN</button>
</td>
</tr>
</table>
</form>
</div>
</div>
</div>

<?php
if(isset($_POST['submit'])){

$student=$_POST['student'];
$book=$_POST['book'];


$sql="UPDATE `books_issue` SET `returnflag`=1 WHERE `student_id`=$student and `book_id`=$book";

$result=$connection->query($sql);

if($result===TRUE){

echo "<script>alert('Book Returned Successfully') </script>" ;

}
else 
{

   echo " <script>alert('Books Return Failed') </script>";
}



}


?>

