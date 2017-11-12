<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 12/11/2017
 * Time: 10:56
 */?>
<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");

$feedid = $_POST["feedid"];
$seen = "seen";

$sql = "UPDATE feedback SET seen = '$seen' WHERE feedbackID = '$feedid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");
if ($result) {
    ?>
    <script>
        swal({
            title: "Success",
            text: "Notification Edit successful!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
        setTimeout(function () {
            location.href = "notifications.php"
        }, 1000);
    </script>
<?php

} else {
?>
    <script>
        swal({title: "Error", text: "An Error Ocurred!", type: "error", timer: 1500, showConfirmButton: false});
        setTimeout(function () {
            location.href = "notifications.php"
        }, 1000);
    </script>
    <?php

}
?>
