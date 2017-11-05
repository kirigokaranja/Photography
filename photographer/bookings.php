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
    <title>Bookings</title>
    <link rel="stylesheet" type="text/css" href="css/booking.css">
    <link type="text/css" rel="stylesheet" href="css/modal.css">
    <link rel="stylesheet" type="text/css" href="css/upload.css">
    <link rel="stylesheet" type="text/css" href="css/booktable.css">
    <link rel="stylesheet" href="../css/menuDropdown.css">
    <link rel="stylesheet" href="">

</head>
<body>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['Photographer'])) {
    $id = $_SESSION['Photographer'];

    $s = "SELECT * FROM photographer WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error . "[$s]");


while ($row = mysqli_fetch_array($res)) {
    $name = $row['surname'];
    $fname = $row['firstName'];
    $phtid = $row['photoID'];
    $status = "pending";

    $sql = "SELECT * FROM book WHERE photoID = '$phtid' AND status = '$status'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");

    ?>
    <section class="hero" role="banner">

        <!-- banner text -->
        <div class="container">
            <br><br>
            <nav class="navigation" role="navigation">
                <ul class="primary-nav">
                    <li><a href="dashboard.php">Dashboard</a></li>
                    <li><a href="schedule.php">Schedule</a></li>
                    <li><a href="addPictures.php">Add Pictures</a></li>
                        <li><a href="bookings.php">Bookings</a></li>
                    <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                </ul>
            </nav>
        </div>
        <div class="col-md-10 col-md-offset-1">
<br><br>
            <div class="hero-text text-center">
                <h1><?php echo $fname." ".$name; ?></h1><br>
                <p>Bookings</p>
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
        while($row = mysqli_fetch_array($result)) {
            $date = $row['date'];
            $cust = $row['custID'];
            $location = $row['location'];
            $photographer = $row['photoID'];
            $genre = $row['event'];
            $bookid = $row['bookID'];
            $description = $row['description'];
            $title = $genre." ,".$location;

            ?>

            <article class="row nfl">
                <ul>
                    <li><?php echo $genre;?></li>
                    <li><?php echo $date;?></li>
                    <li><?php echo $location;?></li>
                    <li><form action="accept.php" method="post">
                            <input type="hidden" value="<?php echo $bookid;?>" name="bookid">
                            <input type="hidden" value="<?php echo $title;?>" name="title">
                            <input type="hidden" value="<?php echo $photographer;?>" name="pid">
                            <input type="hidden" value="<?php echo $cust;?>" name="cid">
                            <input type="hidden" value="accepted" name="status">
                            <button type="submit" class="submit">Accept</button>
                        </form></li>
                    <li>
                        <button id="myBtn">Reject</button>
                    </li>
                </ul>
                <ul class="more-content">
                    <li style="text-align: center; font-size: x-large;color: #1157e6;"><?php echo $description;?></li>
                </ul>
            </article>
            <div id="myModal" class="modal" style="display: none">

                <!-- Modal content -->
                <div class="modal-content">

                    <h1>Reject Reason!</h1>
                    <form action="reject.php" method="post">

                        <label>Give your reject reason</label><br>
                        <input type="hidden" value="<?php echo $bookid;?>" name="bookid">
                        <input type="hidden" value="<?php echo $photographer;?>" name="pid">
                        <input type="hidden" value="<?php echo $cust;?>" name="cid">
                        <input type="hidden" value="rejected" name="status">
                        <input type="text" name="reason" placeholder="Write something">
                        <input type="submit" name="submit" value="Submit Reason">
                    </form>
                </div>

            </div>
        <?php }?>
        <?php }?>

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
<?php
}else{

session_destroy();


?>
<br><br>
    <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P>
    <p style="text-align: center"><a href="signin.php" style="color: red; font-size: 30px; "> Login</a></p>
<?php } ?>
</body>
</html>