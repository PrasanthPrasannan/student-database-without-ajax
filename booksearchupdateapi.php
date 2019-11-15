<?php

include 'dbcon.php';

if(isset($_POST['title'])){

$bookname=$_POST['title'];
$desctn=$_POST['desp'];
$atr=$_POST['atr'];
$prc=$_POST['prc'];
$distributor=$_POST['distributor'];
$publisher=$_POST['publisher'];


$sql="UPDATE `book_details` SET `book-title`='$bookname',`description`='$desctn',`author`='$atr',`price`=$prc,`distributor`='$distributor',`publisher`='$publisher' WHERE `book-title`='$bookname'";

$result=$connection->query($sql);

$r=array();

if($result===TRUE){

    $r["Status"]="updated Successfully";

}
else{

    $r["status"]="Updation Failed";

}
json_encode($r);
}

?>