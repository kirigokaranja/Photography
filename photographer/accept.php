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
$title = $_POST["title"];
$cust = $_POST["cid"];
$pht = $_POST["pid"];
$date = date("Y-m-d");


    $sql = "UPDATE `book` SET `status`= '$status' , title = '$title' WHERE bookID = '$bookid'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    $sql1 = "INSERT INTO `feedback`(`bookID`, `custID`, `photoID`, `status`, datePosted) VALUES ('$bookid', '$cust', '$pht', '$status', '$date')";
    $result1 = $db->query($sql1) or trigger_error($db->error . "[$sql1]");
    if ($result && $result1){
        ?>
        <script>
            swal({
                title: "Success",
                text: "Booking Accepted!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "schedule.php"
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

