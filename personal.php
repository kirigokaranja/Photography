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
                        <div class="dropdown">
                        <li><a href="bookings.php">Bookings</a></li>
                            <div class="dropdown-content">
                                <a href="">Notifications</a>
                                <a href="personal.php">Personal Details</a>
                            </div>
                        </div>
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
    <label>Sir Name</label>
    <input type="text" name="name" value="<?php echo $sname;?>" readonly><br><br>
    <label>First Name</label>
    <input type="text" name="name" value="<?php echo $fname;?>" readonly><br><br>
    <label>Email</label>
    <input type="text" name="email" value="<?php echo $email;?>" readonly><br><br>
    <label>Phone Number</label>
    <input type="text" name="phneno" value="<?php echo $phne;?>" readonly><br><br>
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
