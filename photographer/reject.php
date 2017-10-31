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

$sql = "UPDATE `book` SET `status`= '$status' WHERE bookID = '$bookid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");

if ($result){
?>
<script>
    swal({
            title: "An input!",
            text: "Write something interesting:",
            type: "input",
            showCancelButton: true,
            closeOnConfirm: false,
            animation: "slide-from-top",
            inputPlaceholder: "Write something"
        },
        function(inputValue){
            if (inputValue === false) return false;

            if (inputValue === "") {
                swal.showInputError("You need to write something!");
                return false
            }

            swal("Nice!", "You wrote: " + inputValue, "success");
        });

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
