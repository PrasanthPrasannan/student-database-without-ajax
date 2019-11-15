<?php
include 'navbar_student.php';
?>


<?php

include 'dbcon.php';

$sql="SELECT bd.`book-title`, bi.`issuedate`, bi.`returndate`,bi.`returnflag` FROM `book_details` bd JOIN `books_issue` bi ON bd.`Id`=bi.book_id";

$result=$connection->query($sql);

if($result->num_rows>0){


    echo "<div class='container'> <div class='row'> <div class='col-md-12'>";
    echo "<form method='POST'><table class='table'> ";
    echo "<tr><th>Book Title</th><th>Issue Date </th><th>Return Date</th><th>Status</th></tr>";
   

while($row=$result->fetch_assoc()){

    $returnflag=$row['returnflag'];
    $booktitle=$row['book-title'];
    $issue_date=$row['issuedate'];
    $return_date=$row['returndate'];

    if($returnflag==0){

      $status="<p class='text-danger'>  Not Returned   </p>";
    }
    else{
      $status="<p class='text-success'>   Returned   </p>";


    }
    
    echo "<tr> <td> $booktitle  </td><td> $issue_date </td> <td>$return_date</td><td> $status</td></tr>";

  }
  echo "</table> </form>";
  echo "</div> </div> </div>";
}


else{

  echo "Invalid data";
}

?>
