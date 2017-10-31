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
$type = "Admin";


$sql = "SELECT * FROM `users` WHERE `email`='$name'and `password`='$pass' AND user_type = '$type'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");



if($result && $row = $result->fetch_assoc()){

session_start();
$adminID = $row['email'];

$_SESSION['Admin'] = $adminID;
?>
<script>
    swal({
        title: "Success",
        text: "Login successful!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "dashboard.php"
    }, 1000);
</script>
<?php

}
else {
    header("Location:signin.php?error=wrong");

}


