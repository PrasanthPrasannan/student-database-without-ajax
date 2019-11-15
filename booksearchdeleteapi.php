<?php

include 'dbcon.php';

if(isset($_POST['title'])){

$bookname_delete=$_POST['title'];




$sql="DELETE FROM `book_details` WHERE `book-title`='$bookname_delete'";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="Deletion Successfully";

}
else{

    $r["Status"]="Deletion Failed";
}

json_encode($r);

}

?>