<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <title>Foto | User Upload</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/flexslider.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/font-icon.css">
    <link rel="stylesheet" href="../css/menuDropdown.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" type="../text/css" href="dist/sweetalert.css">
    <!-- script files -->
    <script src="../dist/sweetalert.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/upload.js"></script>
    <!-- script files -->
</head>

<body>
<?php
session_start();
include ('connect.php');

if(isset($_SESSION['Photographer'])){
    $id = $_SESSION['Photographer'];

    $s = "SELECT * FROM photographer WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error . "[$s]");
    while ($row = mysqli_fetch_array($res)) {
        $fname = $row['firstName'];
        $sname = $row['surname'];
        ?>
    <section class="hero" role="banner">

        <!-- banner text -->
        <div class="container">
            <br><br>
            <div class="header-content clearfix"><a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="schedule.php">Schedule</a></li>
                        <li><a href="addPictures.php">Add Pictures</a></li>
                        <div class="dropdown">
                            <li><a href="bookings.php">Bookings</a></li>
                            <div class="dropdown-content">
                                <a href="">Accepted</a>
                                <a href="">Rejected</a>
                            </div>
                        </div>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1><?php echo $fname . " " . $sname; ?></h1><br>
                    <p>Upload</p>
                    </nav>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <?php } ?>
    <!-- gallery section -->
    <!-- work section -->
    <section id="works" class="works section no-padding">
        <div class="container-fluid">
            <div class="row no-gutter">
                <form action="upload.php" method="post" enctype="multipart/form-data" class="dropzone" id="my-dropzone"
                      style="min-height: 350px; border: dotted">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form>
                <div class="col-md-8 col-md-offset-2 text-center">
                    <button class="btn btn-large" id="submit-all">Upload Photos</button>
                </div>
            </div>
        </div>
    </section>
    <!-- work section -->
    <!-- Footer section -->
    <footer class="footer" id="contact">
        <div class="footer-top section">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-6">
                        <form method="post" action="contact.php" >
                            <fieldset>
                                <h4 style="color: white;">CONTACT US</h4>

                                <input type="text" name="name" style="height: 50px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Name"><br><br>
                                <input type="email" name="email" style="height: 50px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Email"><br><br>
                                <input type="text" name="message" style="height: 100px; border-color: transparent; border-bottom-color: #2d3033;font-size: large; width: 60%;background-color: transparent;color: white;" placeholder="Your Message"><br><br>
                                <button type="submit" class="send" style="font-size: x-large; border-radius: 6px; border-color: #1157e6;background-color: transparent;padding: 10px 12px">Send Message</button>
                            </fieldset>
                        </form>
                    </div>
                    <div class="footer-col col-md-3">
                        <h5>Services We Offer</h5>
                        <p>
                        <ul>
                            <li><a href="#">Wedding photography</a></li>
                            <li><a href="#">Family Portraits</a></li>
                            <li><a href="#">Videography</a></li>
                            <li><a href="#">Photo Editing</a></li>
                        </ul>
                        </p>
                    </div>
                    <div class="footer-col col-md-3">
                        <h5>Share with Love</h5>
                        <ul class="footer-share">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                        </ul>
                        <h5>Foto Kenya</h5>
                        <p>Copyright © 2017 Foto. All Rights Reserved. <i class="fa fa-heart pulse"></i></p>
                    </div>
                </div>
            </div>
        </div>
        <!-- footer top -->

    </footer>
    <!-- Footer section -->
<?php

} else{

$_SESSION['url'] = $_SERVER['REQUEST_URI'];
?>
    <script>

        swal({
                title: "Login Required!",
                text: "Please login to access upload feature",
                type: "info",
                showCancelButton: true,
                confirmButtonClass: "btn-danger",
                confirmButtonText: "Login",
                cancelButtonText: "Cancel",
                closeOnConfirm: false,
                closeOnCancel: false
            },
            function(isConfirm) {
                if (isConfirm) {
                    location.href = "signin.php"
                } else {
                    location.href = "dasboard.php"
                }
            });
    </script>
    <?php
}


?>
</body>
</html>
