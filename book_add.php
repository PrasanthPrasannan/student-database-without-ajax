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
<h1 style="text-align:center; font-size:18px;">ADD BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>Book Title</td>
<td>
<input type="text" class="form-control" name="book-title">
</td>
</tr>
<tr>
<td>
Description
</td>
<td>
<input type="text" class="form-control" name="description">
</td>
</tr>
<tr>
<td>
Author
</td>
<td>
<input type="text" class="form-control" name="author">
</td>
</tr>
<tr>
<td>
Price
</td>
<td>
<input type="text" class="form-control" name="price">
</td>
</tr>
<tr>
<td>
Distributor
</td>
<td>
<input type="text" class="form-control" name="distributor">
</td>
</tr>
<tr>
<td>
Publisher
</td>
<td>
<input type="text" class="form-control" name="publisher">
</td>
</tr>
<tr>
<td></td>
<td>
<button type="submit" class="btn btn-success" name="submit">ADD</button>
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

$booktitle=$_POST['book-title'];
$description=$_POST['description'];
$author=$_POST['author'];
$price=$_POST['price'];
$distributor=$_POST['distributor'];
$publisher=$_POST['publisher'];


$sql="INSERT INTO `book_details`(`book-title`, `description`, `author`, `price`, `distributor`, `publisher`) VALUES ('$booktitle','$description','$author',$price,'$distributor','$publisher')";

$result=$connection->query($sql);

if($result===TRUE){

    echo "<script>alert('Data Inserted')</script>";
}
    else 
    {

echo "<script>alert('Data Insertion Failed')</script>";
    
}


}

?>