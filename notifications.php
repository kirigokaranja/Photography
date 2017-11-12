<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Book a photographer to cover an event for you ">
    <meta name="author" content=" Foto">
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <meta name="description" content="">

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
            </div>
        </header>
        <!--header navigation -->
        <!-- banner text -->
        <div class="container" style="padding-top: 120px">
            <div class="col-md-10 col-md-offset-1">
                <div class="hero-text text-center">
                    <h1><?php echo $fname." " .$sname; ?></h1>
                    <p>Notifications</p>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>

<section class = "admin" style="margin-bottom: 200px">
    <div class="panel panel-default" style="border-top: none; margin: 10px 100px 20px 100px ;">
        <div class="panel-heading" style="padding: 0px; width: 100%">
            <div style="padding-top: 2px; ">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#booking" data-toggle="tab" style="float: left; height: 100%;">Booking Notifications</a></li>
                    <li><a href="#images" data-toggle="tab" style="float: left; height: 100%;">Images Edited</a></li>
                </ul>
                <div class="tab-content ">
                    <div id="booking"  style="padding: 10px 20px" class="tab-pane fade in active">
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
                                    <button id="myBtn" class="viewbutton"> view </button>
                                </li>

                                <div id="myModal" class="modal">
                                    <div class="modal-content">

                                        <h1>More Information!</h1>
                                        <form action="" method="post" >

                                            <p>Date: <?php echo $date;?></p>
                                            <p>Location: <?php echo $location;?></p>
                                            <p>Genre: <?php echo $event;?></p>
                                            <p>Description: <?php echo $description;?></p>
                                            <p>Status: <?php echo $status;?></p>
                                            <?php
                                            if ($status == "rejected")
                                            ?>
                                            <p>Reject Reason: <?php echo $reject;?></p>
                                            <?php
                                            ?>

                                            <input type="submit" name="submit" value="Okay">
                                        </form>
                                    </div>
                                </div>
                                <?php }?>
                                <?php }?>

                            </ul>
                        </div>
                    </div>

                    <div id="images"  style="padding: 10px 20px" class="tab-pane fade">
                        <?php
                        $edited = "Edited";
                        $sql = "SELECT * FROM customer_upload 
                                    WHERE edit_status = '$edited' AND custID = $custid
                                    GROUP BY custID, timePosted
                                    ORDER BY datePosted ASC , timePosted ASC ";
                        $result = $db->query($sql) or trigger_error($db->error."[$sql]");

                        while($row1 = mysqli_fetch_array($result)) {
                            $date = $row1['dateEdited'];
                            $time = $row1['timeEdited'];
                            $userID = $row1['custID'];

                            $folderName = $row1['folderName'];
                            $folder = "images";

                            $cSql = "SELECT * FROM customer WHERE custID = $userID";
                            $cRes = $db->query($cSql) or trigger_error($db->error."[$cSql]");
                            $cRow = mysqli_fetch_array($cRes);
                            $cFirst = $cRow['firstName'];
                            $cSurname = $cRow['surname'];


                            $dir_separator = DIRECTORY_SEPARATOR;
                            $id_separator = "-";
                            $folderName = $row1['folderName'];
                            $folder = "images";
                            $picFolder = $folder . $dir_separator.$cFirst.$cSurname.$id_separator.$userID .$dir_separator.$folderName;
                            $destination_path = dirname(__FILE__) .$picFolder;

                            ?>
                            <div class="panel panel-default" style="margin-bottom: 1px; padding-left: 50px;">
                                <h2>
                                    <?php
                                    echo "Your ".$folderName." folder has been curated";?>
                                </h2>
                                <h3>
                                    <?php
                                    echo "By our professional photographer";
                                    ?>
                                </h3>
                                <h3>
                                    <?php
                                    echo "On:     ".$date." at ".$time." UTC";
                                    ?>
                                </h3>
                                <div style="height: 50px">
                                    <a href="download.php?folderName=<?php echo $folderName ?>&folderDir=<?php echo $picFolder ?>&userID=<?php echo $userID?>" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-download-alt"></span> Download
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
    <script>
        // Get the modal
        var modal = document.getElementById('myModal');

        // Get the button that opens the modal
        var btn = document.getElementById("myBtn");

        // Get the <span> element that closes the modal
        var span = document.getElementsByClassName("close")[0];

        // When the user clicks the button, open the modal
        btn.onclick = function() {
            modal.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal
        span.onclick = function() {
            modal.style.display = "none";
        }

        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>

<?php }?>
<?php
}else{
?>
    <script>

        swal({
                title: "User Login Required!",
                text: "Please login to access upload feature",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Login",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function (isConfirm) {
                if (isConfirm) {
                    location.href = "log.php"
                } else {
                    location.href = "index.php"
                }
            });
    </script>
<?php } ?>

<!-- JS FILES -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery.flexslider-min.js"></script>
<script src="js/jquery.fancybox.pack.js"></script>
<script src="js/retina.min.js"></script>
<script src="js/modernizr.js"></script>
<script src="js/main.js"></script>
<script  src="js/hamburger.js"></script>
</body>
</html>
