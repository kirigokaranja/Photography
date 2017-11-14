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
    <title>Photographer | User Uploads</title>
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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?php
session_start();
include ('connect.php');
global $db;
if(isset($_SESSION['Admin'])) {
$id = $_SESSION['Admin'];
?>

<section class="hero" role="banner">

    <!-- banner text -->
    <div class="container">
        <div class="header-content clearfix"> <a class="logo" href="#"><img src="../images/logo.ai" alt=""></a>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="userUploads.php">User Uploads</a></li>
                    <li><a href="message.php">Messages</a></li>
                    <li><a href="photographer.php">Photographers</a></li>
                    <li><a href="genre.php">Genre</a></li>
                    <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="col-md-10 col-md-offset-1">

            <div class="hero-text text-center">
                <h1>Main Photographer</h1>
                <p style="color: #003434;">User Uploads</p>

            </div>
            <!-- banner text -->
        </div>
    </div>
</section>
<section class = "admin">
    <div class="panel panel-default" style="border-top: none; margin: 10px 100px 20px 100px ;">
        <div class="panel-heading" style="padding: 0px; width: 100%">
            <div style="padding-top: 2px; ">
                <ul class="nav nav-tabs">
                    <li class="active"><a href="#notification" data-toggle="tab" style="float: left; height: 100%;">Upload Notifications</a></li>
                    <li><a href="#works" data-toggle="tab" style="float: left; height: 100%;">Works in Progress</a></li>
                    <li><a href="#completed" data-toggle="tab" style="float: left; height: 100%;">Completed</a></li>
                </ul>
                <div class="tab-content ">
                    <div id="works"  style="padding: 10px 20px" class="tab-pane fade">
                        <?php
                        $edited = "In Progress";
                        $sql = "SELECT * FROM customer_upload 
                                    WHERE edit_status = '$edited'
                                    GROUP BY custID, timePosted
                                    ORDER BY timePosted ASC , datePosted DESC ";
                        $result = $db->query($sql) or trigger_error($db->error."[$sql]");
                        while($row1 = mysqli_fetch_array($result)) {
                            $date = $row1['datePosted'];
                            $time = $row1['timePosted'];
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
                            $picFolder =$dir_separator. $folder . $dir_separator.$cFirst.$cSurname.$id_separator.$userID .$dir_separator.$folderName. $dir_separator;
                            $destination_path = dirname(__FILE__) .$picFolder;

                            $_SESSION['picFolder'] = $destination_path;
                            $_SESSION['folderName'] = $folderName;


                            ?>
                            <div class="panel panel-default" style="margin-bottom: 1px; padding-left: 50px;">
                                <h1>
                                    <?php
                                    echo "Working on ".$cFirst." ".$cSurname."'s photos";?>
                                </h1>
                                <h2>
                                    <?php
                                    echo "Uploaded photos to ".$folderName;?>
                                </h2>
                                <h3>
                                    <?php
                                    echo $date." at ".$time." UTC";
                                    ?>
                                </h3>
                                <div style="height: 50px">
                                    <a href="../main/upload.php?folderName=<?php echo $folderName ?>
                                        &folderDir=<?php echo $picFolder ?>
                                        &userID=<?php echo $userID?>
                                        &datePosted=<?php echo $date?>
                                        &timePosted=<?php echo $time?>" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-upload"></span>Upload
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                    <div id="completed"  style="padding: 10px 20px" class="tab-pane fade">
                        <?php
                        $edited = "Edited";
                        $sql = "SELECT * FROM customer_upload 
                                    WHERE edit_status = '$edited'
                                    GROUP BY custID, timePosted
                                    ORDER BY  datePosted DESC , timePosted DESC ";
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
                            $picFolder =$dir_separator. $folder . $dir_separator.$cFirst.$cSurname.$id_separator.$userID .$dir_separator.$folderName. $dir_separator;
                            $destination_path = dirname(__FILE__) .$picFolder;

                            $_SESSION['picFolder'] = $destination_path;
                            $_SESSION['folderName'] = $folderName;


                            ?>
                            <div class="panel panel-default" style="margin-bottom: 1px; padding-left: 50px;">
                                <h1>
                                    <?php
                                    echo " Completed working on ".$cFirst." ".$cSurname."'s photos";?>
                                </h1>
                                <h2>
                                    <?php
                                    echo "Re-uploaded photos to ".$folderName;?>
                                </h2>
                                <h3>
                                    <?php
                                    echo $date." at ".$time." UTC";
                                    ?>
                                </h3>
                            </div>
                        <?php }?>
                    </div>

                    <div id="notification" class="tab-pane fade in active">
                        <?php
                        $edited = "Unedited";
                        $sql = "SELECT * FROM customer_upload 
                                    WHERE edit_status = '$edited'
                                    GROUP BY custID, timePosted
                                    ORDER BY datePosted ASC , timePosted ASC ";
                        $result = $db->query($sql) or trigger_error($db->error."[$sql]");

                        while($row1 = mysqli_fetch_array($result)) {
                            $date = $row1['datePosted'];
                            $time = $row1['timePosted'];
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
                                <h1>
                                    <?php
                                    echo $cFirst." ".$cSurname;?>
                                </h1>
                                <h2>
                                    <?php
                                    echo "Uploaded photos to ".$folderName;?>
                                </h2>
                                <h3>
                                    <?php
                                    echo $date." at ".$time." UTC";
                                    ?>
                                </h3>
                                <div style="height: 50px">
                                    <a href="../test.php?folderName=<?php echo $folderName ?>&folderDir=<?php echo $picFolder ?>&userID=<?php echo $userID?>" class="btn btn-info btn-lg">
                                        <span class="glyphicon glyphicon-download-alt"></span> Download
                                    </a>
                                </div>
                            </div>
                        <?php }?>
                    </div>
                </div>
            </div>
        </div>
        <div class="panel-body">

        </div>
    </div>
</section>

<div id="myModal" class="modal fade" role="dialog">
    <div class="modal-dialog">

        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">

            </div>
            <div class="modal-body">

            </div>
            <div class="modal-footer">

            </div>

            <?php
            }else{


                ?>
                <script>

                    swal({
                            title: "Login Required!",
                            text: "Please login to access dashboard",
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