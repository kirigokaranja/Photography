<?php
include ("connect.php");

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$pass = $_POST["password"];
$type = "customer";

$sql1 = "select * from users";
global $db;
$result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");
while($row = mysqli_fetch_array($result1)){
    $emails = $row['email'];
    if ($emails == $email){
        header("Location: signin.php?error=exists");

    }else{

    $sq = "INSERT INTO `users`(`user_type`, `email`, `password`) VALUES ('$type', '$email','$pass')";
    $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

        if ($rslt)
        {
            $sql = "INSERT INTO `customer`(`name`, `email`, `phone_number`) VALUES ( '$name', '$email', '$number')";
            $result = $db->query($sql) or trigger_error($db->error."[$sql]");
            if ($result){
            header("Location: signin.php?message=success");
            }
        }
        else
        {

            header("Location: signin.php?error=fail");
        }
    }
}