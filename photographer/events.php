<?php
include ("connect.php");
$json = array();

$id =1;
$sta = "accepted";
$sql="SELECT * FROM book WHERE photoID ='$id'AND status = '$sta' ORDER BY bookID ";

try {
    require "connect.php";
} catch(Exception $e) {
    exit('Unable to connect to database.');
}

global $db;

$result=mysqli_query($db,$sql);
echo json_encode(mysqli_fetch_all($result,MYSQLI_ASSOC));

?>