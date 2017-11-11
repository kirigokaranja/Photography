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
    <title>MainPhotographer | Messages</title>
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
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="css/message.css">
    <link rel="stylesheet" href="css/paginate.css">
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
                        <li><a href="genre.php">Genre</a></li>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1>Main Photographer</h1><br>
                    <p style="color: #003434;">Messages</p>

                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <section>
        <form action="message.php" method="get">

            <input class="search" type="text" name="search" placeholder="Search..."/>
            <input type="submit" value="Search" class="ssubmit">
        </form>
        <?php
        include ("connect.php");

        $limit = 5;
        if(isset($_GET['page'])){
            $page = $_GET['page'];
        }else{
            $page = 1;
        }
        $start_from = ($page-1) * $limit;

        $view = "unread";
        $sql = "SELECT * FROM messages WHERE viewed = '$view' ORDER BY messID DESC LIMIT $start_from, $limit";
        if (isset($_GET['search'])) {
            $search = $_GET['search'];
            $sql = "SELECT * FROM messages WHERE  name LIKE '%$search%' OR email LIKE '%$search%' OR message LIKE '%$search%'  ORDER BY messID DESC LIMIT $start_from, $limit";

            if ($search !=null){
                ?>
                <br><br> <button class="viewall" onclick="window.location.href='message.php'">View All</button>
                <?php
            }
        }
        global $db;
        $result = $db->query($sql) or trigger_error($db->error."[$sql]");
        ?>
        <div class="container1">
            <table>
                <tr>
                    <th>Date</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>View</th>
                </tr>


                <?php
                while($row = mysqli_fetch_array($result)){

                $message = $row['message'];
                $name = $row['name'];
                $email = $row['email'];
                $id = $row['messID'];
                $view = $row['viewed'];
                $date = $row['date'];


                ?>
                <tr>
                    <td><?php echo $date; ?></td>
                    <td><?php echo $name; ?></td>
                    <td><?php echo $email; ?></td>

                    <?php
                    if ($view == "unread"){
                        ?>
                        <td>

                            <form action="view_message.php" method="post">
                                <input type="hidden" name="messid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="view" value="pending">
                                <button type="submit" STYLE="width: 150px;font-size: 20px;margin-top: 2%; color: #1157e6"> Pending </button>
                            </form>
                        </td>
                        <?php
                    }else {
                        ?>
                        <td>

                            <form action="view_message.php" method="post">
                                <input type="hidden" name="messid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="view" value="read">
                                <button type="submit" STYLE="width: 150px;font-size: 20px;margin-top: 2%;color: #24c315"> Read </button>
                            </form>
                        </td>
                        <?php
                    }
                    ?>

                    <?php }?>
                </tr>
            </table>
            <?php
            include ('../paginate.php');
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
    </section>

<?php
}else{


?>
    <script>

        swal({
                title: "Login Required!",
                text: "Please login to access messages",
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