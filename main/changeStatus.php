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

$status = $_POST['status'];
$id = $_POST['photoid'];
$query = "SELECT * FROM photographer WHERE photoID = '$id'";
$res = $db->query($query) or trigger_error($db->error . "[$query]");
while ($rows = mysqli_fetch_array($res)) {
    $email = $rows['email'];


if ($status == "active"){
                $st1 = "inactive";
                $sq = "UPDATE users SET active = '$st1' WHERE email= '$email'";
                $result = $db->query($sq) or trigger_error($db->error . "[$sq]");

                $sql = "UPDATE `photographer` SET `status`= '$st1' WHERE photoID = '$id'";
                global $db;
                $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
            if ($result ){
                ?>
                <script>
                    swal({
                        title: "Success",
                        text: "Photographer Inactivated!",
                        type: "success",
                        timer: 1500,
                        showConfirmButton: false
                    });
                    setTimeout(function () {
                        location.href = "photographer.php"
                    }, 1000);
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
                    location.href = "photographer.php"
                }, 1000);
            </script>
            <?php
            }

}else {
$st2 = "active";
$sq = "UPDATE users SET active = '$st2' WHERE email= '$email'";
$result = $db->query($sq) or trigger_error($db->error . "[$sq]");

$sql = "UPDATE `photographer` SET `status`= '$st2' WHERE photoID = '$id'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");
if ($result){
    ?>
    <script>
        swal({
            title: "Success",
            text: "Photographer Activated!",
            type: "success",
            timer: 1500,
            showConfirmButton: false
        });
        setTimeout(function () {
            location.href = "photographer.php"
        }, 1000);
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
        location.href = "photographer.php"
    }, 1000);
</script>
<?php
}
}

}