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
$fname = $_POST['fname'];
$sname = $_POST['sname'];
$email = $_POST['email'];
$pnumber = $_POST['pnumber'];
$pass = 1234;
$hash = md5($pass);
$type = 2;

$sq = "INSERT INTO `users`(`user_type`, `email`, `password`) VALUES ('$type', '$email','$hash')";
global $db;
$rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

if ($rslt)
{
    $sql = "INSERT INTO `photographer`(firstName, surname, email, phone_number) VALUES ('$fname' , '$sname', '$email', '$pnumber')";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    if ($result) {
        ?>
        <script>
            swal({
                title: "Success",
                text: "Photographer added successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "photographer.php"
            }, 1000);
        </script>
        <?php
    }
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
        location.href = "photographer.php"
    }, 1000);
</script>
<?php

}