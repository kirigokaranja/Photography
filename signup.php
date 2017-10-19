<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include ("connect.php");

$name = $_POST["name"];
$email = $_POST["email"];
$number = $_POST["number"];
$pass = $_POST["password"];
$type = "customer";



$sq = "INSERT INTO `users`(`user_type`, `email`, `password`) VALUES ('$type', '$email','$pass')";
$rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

if ($rslt)
{
    $sql = "INSERT INTO `customer`(`name`, `email`, `phone_number`) VALUES ( '$name', '$email', '$number')";
    $result = $db->query($sql) or trigger_error($db->error."[$sql]");
    if ($result){
        ?>
        <script>
            swal({
                title: "Success",
                text: "SignUp successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "log.php"
            }, 1000);
        </script>
        <?php
        //  header("Location: signin.php?message=success");
    }
}
else
{

    header("Location: signin.php?error=fail");
}
?>
</body>
</html>