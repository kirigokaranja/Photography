<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php

include ("connect.php");


$name = $_POST['email'];
$pass = $_POST['password'];
$type = "photoAdmin";
$act = "active";

$sql = "SELECT * FROM `users` WHERE `email`='$name'and `password`='$pass' AND user_type = '$type' AND active = '$act'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");



if($result && $row = $result->fetch_assoc()){

session_start();
$photoID = $row['email'];

$_SESSION['photographerAdmin'] = $photoID;
?>
<script>
    swal({
        title: "Success",
        text: "Login successful!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
</script>
<?php
if(isset($_SESSION['url']))
    $url = $_SESSION['url']; // holds url for last page visited.
else
    $url = "dashboard.php"; // default page for
header("Location: $url");
}
else {
    header("Location:signin.php?error=wrong");

}


