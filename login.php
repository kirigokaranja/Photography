<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
    <style>body{background-image: url("images/alif-ngoylung-243373.jpg")}</style>
</head>
<body>
<?php

include ("connect.php");
global $db;

$email = $_POST['email'];
$pass = $_POST['password'];

$sql = "SELECT * FROM `users` WHERE `email`='$email'and `password`='$pass'";
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");
if ($result && $row = $result->fetch_assoc()) {
    $utype = $row['user_type'];
    $upass = $row['password'];

    session_start();
    if($utype == 1) {

        $custID = $row['email'];
        //  echo $custID;
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

    //   header("Location: index.php");

    }elseif ($utype == 2){

    $photoID = $row['email'];
    //echo $photoID;
    $_SESSION['Photographer'] = $photoID;
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
                location.href = "photographer/dashboard.php"
            }, 1000);
        </script>
    <?php
    // header("Location: photographer/dashboard.php");
    }elseif ($utype == 3){

    $pID = $row['email'];
    // echo $pID;
    $_SESSION['Admin'] = $pID;
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
                location.href = "main/dashboard.php"
            }, 1000);
        </script>
        <?php

        // header("Location: main/dashboard.php");
    }
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
</script>
<?php
}
