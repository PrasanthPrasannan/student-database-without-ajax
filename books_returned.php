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

$sql="SELECT  bd.`book-title`,bi.issuedate,bi.returndate FROM `book_details` bd JOIN books_issue bi ON bd.`Id`=bi.book_id  WHERE bi.student_id=$Sid and bi.returnflag=1";


$result=$connection->query($sql);

if($result->num_rows>0){

    while($row=$result->fetch_assoc()){

        
        
        $book=$row['book-title'];
        $return_date=$row['returndate'];
        
        
 echo "<div class='card text-center'>
<div class='card-header'>

Book: $book

</div>
  <div class='card-body'>
  <h5 class='card-title'> Return Date: $return_date.</h5>
  
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