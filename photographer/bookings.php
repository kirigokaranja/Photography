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
    <link rel="stylesheet" type="text/css" href="css/booking.css">

</head>

<body>
<?php
session_start();
include ('connect.php');

if(isset($_SESSION['Photographer'])) {
    $pid = $_SESSION['Photographer'];

    $s = "SELECT * FROM photographer WHERE email = '$pid'";
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
                    <h1><?php echo $fname." ".$sname; ?></h1><br>
                    <p>Bookings</p>
                    <nav role="navigation"><a href="#photos" class="banner-btn"><img src="images/down-arrow.png" alt=""></a>
                    </nav>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <section class="wrapper">
        <!-- Row title -->
        <main class="row title">
            <ul>
                <li>Event</li>
                <li>Date</li>
                <li>Location</li>
                <li>Accept</li>
                <li>Decline</li>
            </ul>
        </main>
        <?php
        $e = "landscape";
        $e1 = "portrait";
        $sql = "SELECT * FROM book WHERE photoID = '$pid' AND event = '$e' OR event = '$e1'";
        global $db;
        $r1 = $db->query($sql) or trigger_error($db->error . "[$sql]");
        while($row = mysqli_fetch_array($r1)) {
            $date = $row['date'];
            $location = $row['location'];
            $photographer = $row['photoID'];
            $genre = $row['event'];
            $id = $row['bookID'];
            $description = $row['description'];

            ?>
            <article class="row mlb">
                <ul>
                    <li><?php echo $genre;?></li>
                    <li><?php echo $date;?></li>
                    <li><?php echo $location;?></li>
                    <li><form action="" method="post">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <input type="hidden" value="<?php echo $photographer;?>" name="photographer">
                            <button type="submit" class="submit">Accept</button>
                        </form></li>
                    <li><form action="" method="post">
                            <input type="hidden" value="<?php echo $id;?>" name="id">
                            <input type="hidden" value="<?php echo $photographer;?>" name="photographer">
                            <button type="submit" class="submit">Reject</button>
                        </form></li>
                </ul>
                <ul class="more-content">
                    <li><?php echo $description;}?></li>
                </ul>
            </article>

    </section>

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
                    location.href = "log.php"
                } else {
                    location.href = "index.php"
                }
            });
    </script>
<?php } ?>
</body>
</html>

