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
$custid = $_POST["custid"];

$s = "SELECT * FROM photographer WHERE name = '$photographer'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
    $photid = $row['photoID'];

    $sql = "INSERT INTO `book`( `custID`, `event`, `date`, `location`, `description`, `photoID`) VALUES ('$custid', '$genre','$date', '$location', '$description','$photid')";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    if ($result) {
        ?>
        <script>
            swal({
                    title: "Booking Successful",
                    text: "Choose your next option",
                    type: "success",
                    showCancelButton: true,
                    confirmButtonClass: "btn-danger",
                    confirmButtonText: "View Booking",
                    cancelButtonText: "Add Booking",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function(isConfirm) {
                    if (isConfirm) {
                        swal({
                            title: "View Bookings",
                            type: "info",
                            showConfirmButton: false
                        });

                        setTimeout(function () {
                            location.href = "bookings.php"
                        }, 1000);
                    } else {
                        swal({
                            title: "Add Another Booking",
                            type: "info",
                            showConfirmButton: false
                        });
                        setTimeout(function () {
                            location.href = "book.php"
                        }, 1000);
                    }
                });
        </script>
    <?php

    } else {
    ?>
        <script>
            swal({title: "Error", text: "An Error Ocurred!", type: "error", timer: 1500, showConfirmButton: false});
            setTimeout(function () {
                location.href = "book.php"
            }, 1000);
        </script>
        <?php



    }
}
?>
</body>
</html>