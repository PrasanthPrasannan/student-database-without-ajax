<?php
include 'dbcon.php';

if(isset($_POST['submit'])){


$book_title=$_POST['bookname'];



$sql="SELECT * FROM `book_details` WHERE `book-title`='$book_title'";

$result=$connection->query($sql);

if($result->num_rows>0){

    $r=array();

    while($row=$result->fetch_assoc()){

        $r["result"][]=$row;
    }
   
    echo json_encode($r);

}
    else{

        echo "<script>alert('Invalid Book Name')</script>";
    }
}


?>
