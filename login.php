<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php

include ("connect.php");


$email = $_POST['email'];
$pass = $_POST['password'];
$type = "customer";


$sql = "SELECT * FROM `users` WHERE `email`='$email'and `password`='$pass' AND user_type = '$type'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");
if ($result && $row = $result->fetch_assoc()) {

    session_start();
    $custID = $row['email'];

    $_SESSION['email'] = $custID;
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
            location.href = "index.php"
        }, 1000);
    </script>
    <?php

} else {
    header("Location:log.php?error=fail");

}

?>
</body>
</html>
