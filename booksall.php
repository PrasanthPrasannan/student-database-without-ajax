<?php
include 'navbar_student.php';
?>


<?php

include 'dbcon.php';

$sql="SELECT `Id`, `book-title`, `description`, `author`, `price`, `distributor`, `publisher` FROM `book_details`";

$result=$connection->query($sql);

if($result->num_rows>0){

while($row=$result->fetch_assoc()){

    $booktitle=$row['book-title'];
    $description=$row['description'];
    $author=$row['author'];
    $price=$row['price'];
    $distributor=$row['distributor'];
    $publisher=$row['publisher'];

echo "<div class='card text-center'>
<div class='card-header'>
$booktitle
</div>
<div class='card-body'>
  <h5 class='card-title'> Author: $author</h5>
  <p class='card-text'>$description.</p>
  <p class='card-text'>Distributor Name: $distributor.</p>
  <p class='card-text'>Publisher Name: $publisher.</p>
  <a href='#' class='btn btn-primary'>Rs.$price /-</a>
</div>
<div class='card-footer text-muted'>

</div>
</div>";
echo "<br>";

  }
}


else{

  echo "Invalid data";
}

?>
