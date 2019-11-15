<?php

include 'navbar_student.php';
?>

<?php


include 'dbcon.php';

session_start();

$Sid=$_SESSION['student_id'];

$sql="SELECT `Id`, `student_id`, `book_id`, `issuedate`, `returndate` FROM `books_issue` WHERE `student_id`=$Sid and returnflag=0";


$result=$connection->query($sql);

if($result->num_rows>0){

    while($row=$result->fetch_assoc()){

        
        $student=$row['student_id'];
        $book=$row['book_id'];
        $issued_date=$row['issuedate'];
        $return_date=$row['returndate'];
        
 echo "<div class='card text-center'>
<div class='card-header'>
Student : $student
</div>
  <div class='card-body'>
  <h5 class='card-title'> Book: $book</h5>
  <p class='card-text'>Issued Date: $issued_date.</p>
  <p class='card-text'>Return Date: $return_date.</p>
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