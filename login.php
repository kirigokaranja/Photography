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
            header("Location:index.php");
        } else {
            header("Location:log.php?error=fail");

        }


