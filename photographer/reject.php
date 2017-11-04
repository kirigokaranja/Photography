<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php

session_start();
include ("connect.php");

$bookid = $_POST["bookid"];
$status = $_POST["status"];
$reason = $_POST["reason"];

$sql = "UPDATE `book` SET `status`= '$status', reject_reason = '$reason' WHERE bookID = '$bookid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");

if ($result){
?>
    <script>
        swal({
            title: "Succcess",
            text: "You rejected the booking!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });


        setTimeout(function () {
            location.href = "trial.php"
        }, 1000);
    </script>
<?php
}else{
    ?>
    <script>
        swal({
            title: "Error",
            text: "An error ocurred!",
            type: "error",
            timer: 1500,
            showConfirmButton: false
        });


        setTimeout(function () {
            location.href = "trial.php"
        }, 1000);
    </script>
    <?php
}
