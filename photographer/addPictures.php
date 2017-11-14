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
    <title>Photographer | Dashboard</title>
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
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../css/main.css">
    <!--script files-->
    <script src="../dist/sweetalert.min.js"></script>
    <script src="../js/dropzone.js"></script>
    <script src="../js/upload.js"></script>
    <!-- script files -->

</head>

<body>
<?php
session_start();
include ('connect.php');

if(isset($_SESSION['Photographer'])) {
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
            <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="dashboard.php">Gallery</a></li>
                        <li><a href="schedule.php">Schedule</a></li>
                        <li><a href="addPictures.php">Add Pictures</a></li>
                        <li><a href="bookings.php">Bookings</a></li>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="col-md-10 col-md-offset-1">
                    <div class="hero-text text-center">
                        <h1><?php echo $fname." ".$sname?> </h1>
                        <p>Add photos to your gallery</p>
                        <nav role="navigation"> <a href="#works" class="banner-btn"><img src="../images/down-arrow.png" alt=""></a></nav>
                    </div>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <!-- work section -->
    <section id="works" class="works section no-padding" >
        <div class="container-fluid">
            <div class="row no-gutter">
                <form action="../photographer/upload2.php" method="post" enctype="multipart/form-data" class="dropzone" id="my-dropzone"
                      style="min-height: 350px; border: dotted; ">
                    <div class="fallback">
                        <input name="file" type="file" multiple />
                    </div>
                </form >
                <div class="col-md-8 col-md-offset-2 text-center">
                    <button class="btn btn-large" id="submit-all">Upload Photos</button>
                </div>
            </div>
        </div>
    </section>
    <!-- work section -->

<?php }
}else{

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
            function (isConfirm) {
                if (isConfirm) {
                    location.href = "photographer/signin.php"
                } else {
                    location.href = "index.php"
                }
            });
    </script>
<?php } ?>
</body>
</html>

