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
    <link rel="icon" type="image/ico" href="favicon.ico" />
    <title>Foto | Bookings</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/flexslider.css">
    <link rel="stylesheet" href="css/jquery.fancybox.css">
    <link rel="stylesheet" href="css/main.css">
    <link rel="stylesheet" href="css/responsive.css">
    <link rel="stylesheet" href="css/animate.min.css">
    <link rel="stylesheet" href="css/font-icon.css">
    <link rel="stylesheet" href="css/menuDropdown.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/dropzone.css">
    <link rel="stylesheet" href="css/upload.css">
    <link rel="stylesheet" href="css/paginate.css">
    <link rel="stylesheet" href="css/gallery.css">
    <link rel="stylesheet" href="css/booking1.css">


    <!-- script files -->
    <script src="dist/sweetalert.min.js"></script>
    <script src="js/dropzone.js"></script>
    <script src="js/upload.js"></script>
    <!-- script files -->
</head>

<body>
<?php
session_start();
include ('connect.php');

if(isset($_SESSION['email'])) {
    $id = $_SESSION['email'];

    $s = "SELECT * FROM customer WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error . "[$s]");


while ($row = mysqli_fetch_array($res)) {
    $fname = $row['firstName'];
    $sname = $row['surname'];

    $custid = $row['custID'];
    ?>

    <section class="hero" role="banner">

        <!-- banner text -->
        <div class="container">
            <br><br>
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
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1><?php echo $fname." ".$sname ?></h1>
                    <p>Bookings</p>

                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
<br>

    <form action="bookings.php" method="get">

        <input class="search" type="text" name="search" placeholder="Search..."/>
        <input type="submit" value="Search" class="ssubmit">
    </form>
    <?php

    $limit = 5;
    if(isset($_GET['page'])){
        $page = $_GET['page'];
    }else{
        $page = 1;
    }
    $start_from = ($page-1) * $limit;

    $sql = "SELECT * FROM book WHERE custID = '$custid' ORDER BY bookID DESC LIMIT $start_from, $limit";
if (isset($_GET['search'])) {
    $search = $_GET['search'];
    $sql = "SELECT * FROM book WHERE  event LIKE '%$search%' OR date LIKE '%$search%' OR location LIKE '%$search%' LIMIT $start_from, $limit";

if ($search !=null){
    ?>
<br><br> <button class="viewall" onclick="window.location.href='bookings.php'">View All</button>
    <?php
}
}
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    ?>
    <div class="container1">
        <table >
            <tr class="heading">
                <th>Date</th>
                <th>Location</th>
                <th>Genre</th>
                <th>Edit</th>
            </tr>
            <?php
            while($row = mysqli_fetch_array($result)){
                $date = $row['date'];
                $location = $row['location'];
                $photographer = $row['photoID'];
                $genre = $row['event'];
                $id = $row['bookID'];
                $status = $row['status'];
                $pend = "pending";
                ?>
                <tr>
                    <td><?php echo $date;?></td>
                    <td><?php echo $location;?></td>
                    <td><?php echo $genre;?></td>
                    <td>
                        <?php
                        if ($status == $pend){
                            ?>
                            <form action="view_bookings.php" method="post">
                                <input type="hidden" value="<?php echo $id;?>" name="id">
                                <input type="hidden" value="<?php echo $photographer; ?>" name="photographer">
                                <button type="submit" class="submit">Edit</button>
                            </form>
                            <?php
                        }else{
                            ?>
                            <form action="view_bookings.php" method="post">
                                <input type="hidden" value="<?php echo $id;?>" name="id">
                                <input type="hidden" value="<?php echo $photographer; ?>" name="photographer">
                                <button type="submit" class="submit" style="background-color: midnightblue;border-color: midnightblue;color: white">View</button>
                            </form>
                            <?php
                        }
                        ?>

                    </td>
                </tr>
            <?php }?>

        </table>
        <?php
        include ('paginate.php');
        $sql1 = "SELECT COUNT(`messID`) FROM `messages`";
        $rs = mysqli_query($db ,$sql1);
        $row1 = mysqli_fetch_row($rs);
        $total_records = $row1[0];
        $total_pages = ceil($total_records / $limit);
        $tpages=$total_pages;
        $show_page=$page;
        $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
        echo '<div class="pagination"><ul>';
        if ($total_pages > 1) {
            echo paginate($reload, $show_page, $total_pages);
        }
        echo "</ul></div>";
        ?>
    </div>
    <footer style="height: 30%; background-color: transparent;"></footer>

<?php }?>




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
                    location.href = "log.php"
                } else {
                    location.href = "index.php"
                }
            });
    </script>
<?php } ?>
</body>
</html>

