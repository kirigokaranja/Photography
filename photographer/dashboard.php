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
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
    <!-- script files -->
    <script src="../dist/sweetalert.min.js"></script>
    <script src="js/portfolio.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
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
            <div class="header-content clearfix"><a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="schedule.php">Schedule</a></li>
                        <li><a href="addPictures.php">Add Pictures</a></li>
                        <div class="dropdown">
                            <li><a href="trial.php">Bookings</a></li>
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
                    <p>Dashboard</p>
                    <nav role="navigation"><a href="#photos" class="banner-btn"><img src="images/down-arrow.png" alt=""></a>
                    </nav>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <!-- gallery section -->

    <?php
    $photoId = $row['photoID'];
    $folder_path = 'images/' . $fname . $sname . '-' . $photoId . '/'; //image folder path
    $dir_separator = DIRECTORY_SEPARATOR;
    $id_separator = "-";
    $userFolder = $dir_separator . 'images' . $dir_separator . $fname . $sname . $id_separator . $photoId . $dir_separator;

    $destination_path = dirname(__FILE__) . $userFolder;

if (!is_dir($destination_path)) {?>
        <section class="section quote">
            <div class="container">
                <div class="col-md-8 col-md-offset-2 text-center">
                    <h3>Aw Snap! You have not uploaded any photos yet!</h3>
                    <a href="../upload2.php" class="btn btn-large">Upload Photo</a></div>
            </div>
        </section>
    <?php
}else { ?>
    <section id="photos" style="padding-top: 5px; border: dotted">
        <div id="portfolio">
            <?php
            $sqlImage = "SELECT * FROM photographer_upload WHERE photographerID = '$photoId'";
            $resImage = $db->query($sqlImage) or trigger_error($db->error . "[$sqlImage]");
            while ($row = mysqli_fetch_array($resImage)) {
                $file_name = $row['name'];
                $ext = $row['extension'];
                if ($ext == 'jpg' || $ext == 'png' || $ext == 'gif' || $ext == 'JPG' || $ext == 'PNG' || $ext == 'GIF') {
                    $entry = $file_name . "." . $ext;
                    $file_path = $folder_path . $entry;
                    echo '
                                    <a href="' . $file_path . '" class="work-box"><img src="' . $file_path . '" alt="" ></a>';
                }
            } ?>
        </div>
    </section>
    <?php
}
}
    ?>
    <!-- gallery section -->

<?php
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
                        location.href = "signin.php"
                    } else {
                        location.href = "signin.php"
                    }
                });
        </script>
<?php } ?>
</body>
</html>

