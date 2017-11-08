<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php
session_start();
include ("connect.php");
global $db;
$genre = $_POST['genre'];

$sql = "INSERT INTO `genre`(`name`) VALUES ('$genre')";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");

if ($result)
{
    ?>
    <script>
        swal({
            title: "Success",
            text: "Genre added successful!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
        setTimeout(function () {
            location.href = "genre.php"
        }, 1000);
    </script>
    <?php
}
else
{
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
            location.href = "genre.php"
        }, 1000);
    </script>
    <?php

}