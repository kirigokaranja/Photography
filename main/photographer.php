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
    <title>MainPhotographer | Photographers</title>
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
    <link rel="stylesheet" href="css/photographer.css">
    <link rel="stylesheet" href="../css/book1.css">
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
                    <p style="color: #003434;">Photographers</p>

                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
    <section class="addcontent">
        <button class="add" id="add">Add Photographer</button>
        <button class="add" id="act">Active Photographers</button>
        <button class="add" id="inact">Inactive Photographers</button>
<br>
        <div class="addphoto" id="addphoto">
            <br><br>
            <div class="left-side">
                <header>
                    <h3 style="color: #1157e6;"> Main Photographer,</h3>
                    <br>
                    <h3>Add a <br>New Photographer</h3>
                </header>
            </div>

            <div class=" right-side" >
                <form method="post" action="addPhotographer.php">
                          <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text"  name="fname" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" >
            <span class="input__label-content input__label-content--hoshi">First Name</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="text"  name="sname" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" >
            <span class="input__label-content input__label-content--hoshi">Sur Name</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="email"  name="email" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" >
            <span class="input__label-content input__label-content--hoshi">Email</span>
          </label>
        </span>
                    <span class="input input--hoshi">
                    <input type="text" readonly style="border: none">
          <input class="input__field input__field--hoshi" type="number"  name="pnumber" required  />
          <label class="input__label input__label--hoshi input__label--hoshi-color-3" >
            <span class="input__label-content input__label-content--hoshi">Phone Number</span>
          </label>
        </span>
                    <div class="cta">
                        <button class="btn btn-primary pull-left">
                            Add Photographer
                        </button> &emsp;&emsp;

                    </div>
                </form>
            </div>
        </div>
        <br><br>
        <div class="actphoto" id="actphoto">
            <?php
            include ("connect.php");
            $view = "active";
            $sql = "SELECT * FROM photographer WHERE status = '$view' ORDER BY photoID DESC ";
            $result = $db->query($sql) or trigger_error($db->error."[$sql]");

            ?>
            <div class="container1">
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Sur Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                    </tr>


                    <?php
                    while($row = mysqli_fetch_array($result)){

                    $firstnme = $row['firstName'];
                    $surnme = $row['surname'];
                    $pemail = $row['email'];
                    $pnumber = $row['phone_number'];
                    $status = $row['status'];
                    $id = $row['photoID'];


                    ?>
                    <tr>
                        <td><?php echo $firstnme; ?></td>
                        <td><?php echo $surnme; ?></td>
                        <td><?php echo $pemail; ?></td>
                        <td><?php echo $pnumber; ?></td>
                        <td>

                            <form action="changeStatus.php" method="post">
                                <input type="hidden" name="photoid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="status" value="active">
                                <button type="submit" class="statusbutton"> Deactivate </button>
                            </form>
                        </td>
                        <?php }?>
                    </tr>
                </table>
            </div>
        </div>
        <div class="inactphoto" id="inactphoto">
            <?php
            include ("connect.php");
            $view = "inactive";
            $sql = "SELECT * FROM photographer WHERE status = '$view' ORDER BY photoID DESC ";
            $result = $db->query($sql) or trigger_error($db->error."[$sql]");

            ?>
            <div class="container1">
                <table>
                    <tr>
                        <th>First Name</th>
                        <th>Sur Name</th>
                        <th>Email</th>
                        <th>Phone Number</th>
                        <th>Status</th>
                    </tr>


                    <?php
                    while($row = mysqli_fetch_array($result)){

                    $firstnme = $row['firstName'];
                    $surnme = $row['surname'];
                    $pemail = $row['email'];
                    $pnumber = $row['phone_number'];
                    $status = $row['status'];
                    $id = $row['photoID'];


                    ?>
                    <tr>
                        <td><?php echo $firstnme; ?></td>
                        <td><?php echo $surnme; ?></td>
                        <td><?php echo $pemail; ?></td>
                        <td><?php echo $pnumber; ?></td>
                        <td>

                            <form action="changeStatus.php" method="post">
                                <input type="hidden" name="photoid" value=" <?php echo $id; ?>">
                                <input type="hidden" name="status" value="inactive">
                                <button type="submit" class="statusbutton"> Activate </button>
                            </form>
                        </td>
                        <?php }?>
                    </tr>
                </table>
            </div>
        </div>
    </section>
    <script>
        // Get the modal
        var add = document.getElementById('add');
        var act = document.getElementById('act');
        var inact = document.getElementById('inact');

        // Get the button that opens the modal
        var actphoto = document.getElementById("actphoto");
        var addphoto = document.getElementById('addphoto');
        var inactphoto = document.getElementById('inactphoto');
        // When the user clicks the button, open the modal
        add.onclick = function() {
            addphoto.style.display = "block";
            actphoto.style.display = "none";
            inactphoto.style.display = "none";
        }
        act.onclick = function () {
            actphoto.style.display = "block";
            addphoto.style.display = "none";
            inactphoto.style.display = "none";
        }
        inact.onclick = function () {
            actphoto.style.display = "none";
            addphoto.style.display = "none";
            inactphoto.style.display = "block";
        }

        // When the user clicks on <span> (x), close the modal


        // When the user clicks anywhere outside of the modal, close it
        window.onclick = function(event) {
            if (event.target == modal) {
                modal.style.display = "none";
            }
        }
    </script>
<?php
}else{


?>
    <script>

        swal({
                title: "Login Required!",
                text: "Please login to access photographers",
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