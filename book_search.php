<?php

session_start();

if(!isset($_SESSION['loginsuccess'])){

    header('Location:login-admin.php');
}

?>

<?php
include 'navbar.php';
?>
  
</div>
</div>
</div>

<div class="container border">
<div class="row">
<div class="col-md-12">
<h1 style="text-align:center; font-size:18px;">SEARCH BOOK</h1>
<form method="POST">
<table class="table">
<tr>
<td>
Book Title
</td>
<td>
   <input type="text" class="form-control"name="bookname"> 
</td>
</tr>
<tr>
<td></td>
<td>
<button type="submit" class="btn btn-success" name="submit">SEARCH</button> 
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


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `book_details` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

if($result->num_rows>0){

    echo "<form method='POST'><table class='table'> ";
    echo "<tr><th>Book Title</th><th>Description </th><th>Author</th><th>Price</th> <th>Distributor</th> <th>Publisher</th></tr>";
    while($row=$result->fetch_assoc()){

        $booktitle=$row['book-title'];
        $description=$row['description'];
        $author=$row['author'];
        $price=$row['price'];
        $distributor=$row['distributor'];
        $publisher=$row['publisher'];

        echo "<tr> <td> $booktitle  </td><td> $description </td> <td>$author</td><td>$price</td><td>$distributor</td><td>$publisher</td></tr>";
    }

    echo "</table> </form>";
}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    }
}


?>
