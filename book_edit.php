<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");

$date = $_POST["date"];
$location = $_POST["location"];
$photographer = $_POST["photographer"];
$genre = $_POST["genre"];
$description = $_POST["description"];
$bookid = $_POST["bookid"];
$ph = explode(" ",$photographer);

$s = "SELECT * FROM photographer WHERE firstName = '$ph[0]'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
    $photid = $row['photoID'];

    $sql = "UPDATE `book` SET `event`='$genre',`date`='$date',`location`='$location',`description`='$description',`photoID`='$photid' WHERE bookID = '$bookid'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    if ($result) {
        ?>
        <script>
            swal({
                title: "Success",
                text: "Book Edit successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "bookings.php"
            }, 1000);
        </script>
        <?php

    } else {
        ?>
        <script>
            swal({title: "Error", text: "An Error Ocurred!", type: "error", timer: 1500, showConfirmButton: false});
            setTimeout(function () {
                location.href = "bookings.php"
            }, 1000);
        </script>
        <?php

    }
}
?>
