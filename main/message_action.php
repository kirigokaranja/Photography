<html>
<head>
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");
$eid = $_POST["messid"];
$read = "read";

$sql = "UPDATE `messages` SET `viewed` ='$read' WHERE `messID` = '$eid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

if ($result)
{
?>
<script>
    swal({
        title: "Success",
        text: "Message read successful!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "message.php"
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
        location.href = "message.php"
    }, 1000);
</script>
<?php

}