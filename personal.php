<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Book a photographer to cover an event for you ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Personal Details</title>

    <!-- Stylesheets -->
    <link rel="stylesheet" href="css/personal.css">
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
    <style>

    </style>
</head>

<body>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];

    $s = "SELECT * FROM customer WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error."[$s]");


    while($row = mysqli_fetch_array($res)) {
        $name = $row['name'];
        $custid = $row['custID'];


        ?>
<section>
    <div class="mainnav" >
        <ul>
            <li class="btn-2"><a href="index.php">Home</a></li>
            <li  class="btn-2"><a href="personal.php">Me</a></li>
            <li class="btn-2"><a href="bookings.php">Bookings</a></li>
            <li class="btn-2"><a>Notifications</a></li>
            <li class="btn-2"><a href="book.php">Book</a> </li>
            <li class="btn-2"><a href="upload.php">Upload Images</a></li>
        </ul>
    </div>
    <div class="left">
        <p>Welcome, <?php echo $name; }?></p>
<img src="images/cameron-kirby-179439.jpg" height="300" width="200"><br>
    <button class="btn1" onclick="window.location.href='logout.php'">
        Logout
    </button>
    </div>
    <div class="right">

    </div>
</section>
        <?php
    }else{

    session_destroy();


    ?>
    <br><br><br><br><br><br>
    <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P><br><br><br><br>
    <p style="text-align: center"><a href="signin.php" style="color: red; font-size: 30px; "> Login</a></p>
<?php } ?>
</body>
</html>
