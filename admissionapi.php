<?php

include 'dbcon.php';

if(isset($_POST['admno'])){

$admno=$_POST['admno'];


 $sql="SELECT `Id`, `name`, `rollno`, `admno`, `college`, `username`, `password` FROM `student_details` WHERE `admno`=$admno";


$result=$connection->query($sql);

if($result->num_rows>0){
    
    $r=array();

   while($row=$result->fetch_assoc()){ 

$r["result"][]=$row;

}
echo json_encode($r);
   
}
else{

    echo "Inalid Admission Number";
}
}
else
{

    echo "no input";
}
?>