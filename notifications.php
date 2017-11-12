<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Book a photographer to cover an event for you ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />

    <title>Notifications</title>

    <!-- Stylesheets -->

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/menuDropdown.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="css/notifications.css">
    <link type="text/css" rel="stylesheet" href="photographer/css/modal.css">
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
                        <h1><?php echo $fname; echo $sname; ?></h1><br><br>
                        <p>Notifications</p>
                    </div>
                    <!-- banner text -->
                </div>
            </div>
        </section>
        <section class="secnot">
            <div class="notcontantainer">
                <h2>Notifications</h2><hr style="border: solid 1px #2d3033;">
                <?php
                $sql = "SELECT * FROM feedback WHERE custID = $custid ORDER BY feedbackID DESC ";
                $result = $db->query($sql) or trigger_error($db->error."[$sql]");

                while($row1 = mysqli_fetch_array($result)) {
                $bookid = $row1['bookID'];
                $dateposted = $row1['datePosted'];
                $status = $row1['status'];
                $seen = $row1['seen'];
                $reject = $row1['reject_reason'];


                $sql1 = "SELECT * FROM book WHERE bookID = $bookid ORDER BY bookID DESC ";
                $result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");

                while($row2 = mysqli_fetch_array($result1)) {
                $date = $row2['date'];
                $location = $row2['location'];
                $event = $row2['event'];
                $description = $row2['description'];


                ?>


                <ul class="notificationbar">
                    <li>
                        <?php
                        if ($seen == "unseen"){
                            ?>
                            <i> <img src="images/notification.png"></i>
                            <?php
                        }else{
                            if ($status == "accepted"){
                                ?>
                                <i><img src="images/check.png"></i>
                                <?php
                            }else{
                                ?>
                                <i><img src="images/error.png"></i>
                                <?php
                            }
                        }
                        ?>
                        <p>Date: <?php echo $date;?></p>
                        <p>Location: <?php echo $location;?></p>
                        <p>Genre: <?php echo $event;?></p>
                        <form action="view_notifications.php" method="post">
                            <input type="hidden" name="bookid" value="<?php echo $bookid?>">
                            <button type="submit" class="viewbutton"> view </button>
                        </form>
                    </li>
                    <?php }?>
                    <?php }?>
            </div>


        </section>


    <?php }?>
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
