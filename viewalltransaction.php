<?php

session_start();

if(!isset($_SESSION['loginsuccess'])){

    header('Location:login-admin.php');
}

?>

<?php
include 'navbar.php';
?>


<?php

include 'dbcon.php';

$sql="SELECT  sd.`admno`,sd.`name`,bd.`book-title`,bi.`issuedate`,bi.`returndate`,bi.`returnflag`  FROM `student_details` sd JOIN `books_issue` bi ON sd.`Id`=bi.student_id JOIN book_details bd ON bd.Id=bi.book_id ";

$result=$connection->query($sql);

if($result->num_rows>0){


    echo "<div class='container'> <div class='row'> <div class='col-md-12'>";
    echo "<form method='POST'><table class='table'> ";
    echo "<tr><th>Admission Number</th><th>Student Name</th><th>Book Name</th><th>Issue Date</th><th>Return date</th><th>Status</th></tr>";
   

while($row=$result->fetch_assoc()){


    $admissionnumber=$row['admno'];
    $name=$row['name'];
    $booktitle=$row['book-title'];
    $issue_date=$row['issuedate'];
    $return_date=$row['returndate'];
    $returnflag=$row['returnflag'];

    if( $returnflag==0){

      $status="<p class='text-danger'>  Not Returned   </p>";
    }
    else{

      $status="<p class='text-success'>  Returned   </p>";
    }
    
    echo "<tr><td>$admissionnumber</td><td>$name</td><td> $booktitle  </td><td> $issue_date </td> <td>$return_date</td><td>$status</td><td></td></tr>";

  }
  echo "</table> </form>";
  echo "</div> </div> </div>";
}


else{

  echo "Invalid data";
}

?>
