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

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/details.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/menuDropdown.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">


    <style>
        form label{
            border-bottom: 1px solid #333;
            display: block;
            font-size: 1.25em;
            margin-bottom: 0.5em;
            -webkit-transition: all 0.25s;
            transition: all 0.25s;
        }
        form label input{
            background: none;
            border: none;
            line-height: 1em;
            font-weight: 300;
            padding: 0.125em 0.25em;
            width: 100%;
            color: #1157e6;
        }
        form label span.label-text{
            display: block;
            font-size: 0.7em;
            font-weight: bold;
            padding-left: 0.5em;
            text-transform: uppercase;
            -webkit-transition: all 0.25s;
            transition: all 0.25s;
        }
        .personalcontent{
            float: left;
            border-radius: 0.5em;
            box-shadow: 0 0 1em 0 rgba(51,51,51,0.25);
            display: block;
            max-width: 480px;
            overflow: hidden;
            padding: 2em;
            position: absolute;
            width: 98%;
            margin-left: 10%;
            height: 80%;
        }
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
        $fname = $row['firstName'];
        $sname = $row['surname'];
        $custid = $row['custID'];
        $email = $row['email'];
        $phne = $row['phone_number'];
        $file = "uploads/";
        $img = $file.$row['picture'];


     ?>

    <section class="hero" role="banner">
        <!--header navigation -->
        <header id="header">
            <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="notifications.php">Notifications</a></li>
                        <li><a href="personal.php">Personal Details</a></li>
                        <li><a href="gallery.php">Gallery</a></li>
                        <li><a href="bookings.php">Bookings</a></li>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>

        </header>
        <!--header navigation -->
        <!-- banner text -->
        <div class="container">
            <div class="col-md-10 col-md-offset-1">
        <br><br><br><br>
                <div class="hero-text text-center">
                    <h1><?php echo $fname; echo $sname;?></h1><br><br>
                    <p>Personal Details</p>
                   </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <br><br>
        <div class="personalcontent">

<form>
    <label>
        <span class="label-text">Sir Name</span>
        <input type="text" name="name" value="<?php echo $sname;?>" readonly>
    </label><br>
    <label>
        <span class="label-text">First Name</span>
        <input type="text" name="name" value="<?php echo $fname;?>" readonly>
    </label><br>
    <label>
        <span class="label-text">Email</span>
        <input type="text" name="email" value="<?php echo $email;?>" readonly>
    </label><br>
    <label>
        <span class="label-text">Phone Number</span>
        <input type="text" name="phneno" value="<?php echo $phne;?>" readonly>
    </label><br>
</form>
            <h1 id="cursname"><?php echo $fname; echo $sname;?></h1>
        </div>
    <div class="imgcontent">
        <?php echo "<img class='persimg' height='300' width='300' src='$img' alt='personal image'>"; ?><br><br>
        <br><br>
        <form action="personal_image.php" method="post" enctype="multipart/form-data" class="uploadform">
            <input type="file" name="file" /><br>
            <input type="hidden" name="id" value="<?php echo $custid;}?>">
            <button type="submit" name="btn-upload">upload</button>
        </form>

    </div>



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
