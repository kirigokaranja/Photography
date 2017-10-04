<?php
include ("connect.php");

$date = $_POST["date"];
$location = $_POST["location"];
$photographer = $_POST["photographer"];
$genre = $_POST["genre"];
$description = $_POST["description"];
$custid = $_POST["custid"];

$s = "SELECT * FROM photographer WHERE name = '$photographer'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
    $photid =$row['photoID'];

    $sql = "INSERT INTO `book`( `custID`, `event`, `date`, `location`, `description`, `photoID`) VALUES ('$custid', '$genre','$date', '$location', '$description','$photid')";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    if ($result) {

       header("Location:book.php?message=success");
    } else {
        header("Location:book.php?error=fail");

    }
}