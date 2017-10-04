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
    $doctid =$row['photoID'];

    $sql = "";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    if ($result) {

        header("Location:trial.php");
    } else {
        header("Location:signin.php?error=noexists");

    }
}