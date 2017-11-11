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
    <title>MainPhotographer | Bookings</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/flexslider.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/font-icon.css">
    <link rel="stylesheet" href="../css/menuDropdown.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/bookings.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
</head>
<body>
<?php
session_start();
include ('connect.php');
if(isset($_SESSION['Admin'])) {
    ?>

    <section class="hero" role="banner">

        <!-- banner text -->
        <div class="container">
            <br><br>
            <div class="header-content clearfix"> <a class="logo" href="#"><img src="images/logo.ai" alt=""></a>
                <nav class="navigation" role="navigation">
                    <ul class="primary-nav">
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="dashboard.php">User Uploads</a></li>
                        <li><a href="message.php">Messages</a></li>
                        <li><a href="photographer.php">Photographers</a></li>
                        <li><a href="bookings.php">Bookings</a></li>
                        <li><a href="genre.php">Genre</a></li>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1>Main Photographer</h1><br>
                    <p style="color: #003434;">Bookings</p>

                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <section>
        <form action="bookings.php" method="get">

            <input class="search" type="text" name="search" placeholder="Search..."/>
            <input type="submit" value="Search" class="ssubmit">
        </form>
        <?php
        include ("connect.php");
        $view = "rejected";
        $sql = "SELECT * FROM book WHERE status = '$view' ORDER BY bookID DESC ";
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM book WHERE  event LIKE '%$search%' OR date LIKE '%$search%' OR location LIKE '%$search%' AND status = '$view'";

            if ($search !=null){
                ?>
                <br><br> <button class="viewall" onclick="window.location.href='bookings.php'">View All</button>
                <?php
            }
        }
        global $db;
        $result = $db->query($sql) or trigger_error($db->error."[$sql]");
        ?>
        <div class="container1">
            <table>
                <tr>
                    <th>Event</th>
                    <th>Date</th>
                    <th>Location</th>
                    <th>View</th>
                </tr>


                <?php
                while($row = mysqli_fetch_array($result)){

                $event = $row['event'];
                $date = $row['date'];
                $location = $row['location'];
                $id = $row['bookID'];


                ?>
                <tr>
                    <td><?php echo $event; ?></td>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $location; ?></td>

                    <td>

                        <form action="view_bookings.php" method="post">
                            <input type="hidden" name="bookid" value=" <?php echo $id; ?>">
                            <input type="hidden" name="date" value=" <?php echo $date; ?>">
                            <input type="hidden" name="view" value="pending">
                            <button type="submit" class="statusbutton"> View </button>
                        </form>
                    </td>


                    <?php }?>
                </tr>
            </table>
        </div>
    </section>
<?php
}else{


?>
    <script>

        swal({
                title: "Login Required!",
                text: "Please login to access bookings",
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
                    location.href = "../log.php"
                } else {
                    location.href = "../index.php"
                }
            });
    </script>
<?php } ?>

</body>
</html>