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
    <title>MainPhotographer | Dashboard</title>
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
    <link rel="stylesheet" href="../css/report.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <script src="../dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="../dist/sweetalert.css">
    <script src="js/Chart.min.js"></script>
</head>
<body>
<script>
    var event_no = [];
    var event = [];
    var photographer = [];
    var photo_no = [];
    var dates_n = [];
    var dates = [];
    var dates1_n = [];
    var dates1 = [];
    var dates2_n2 = [];
    var dates2 = [];
    var dates3_n = [];
    var dates3 = []
</script>
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
                        <li><a href="userUploads.php">User Uploads</a></li>
                        <li><a href="message.php">Messages</a></li>
                        <li><a href="dashboard.php">Photographers</a></li>
                        <li><a href="genre.php">Genre</a></li>
                        <li><a href="logout.php" class="btn btn-large">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1>Main Photographer</h1><br>
                    <p style="color: #003434;">Dashboard</p>

                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
<?php

global $db;
$sql2 = mysqli_query($db, "SELECT DISTINCT photoID FROM book");
while($row3 = mysqli_fetch_assoc($sql2)){
$pid = $row3["photoID"];
// echo $pid."<br>";

$query2 = mysqli_query($db, "select DISTINCT photoID, count(bookID) as 'total' from book where photoID='$pid'");
while($row1 = mysqli_fetch_assoc($query2)) {

$no = $row1['total'];
$dt = $row1['photoID'];


$sq = mysqli_query($db, "SELECT DISTINCT firstName , surname FROM photographer WHERE photoID = '$dt'");
while ($rw1 = mysqli_fetch_assoc($sq)) {
$fname = $rw1['firstName'];
$sname = $rw1['surname'];
$dname = $fname . " " . $sname;


?>
    <script>

        photo_no[photo_no.length] = "<?php echo $no; ?>";
        photographer[photographer.length] = "<?php echo $dname; ?>";
    </script>
<?php
}
}
}
?>
<?php

global $db;
$sql = mysqli_query($db, "SELECT DISTINCT event FROM book");
while($row = mysqli_fetch_assoc($sql)){
$event = $row["event"];


$query1 = mysqli_query($db, "select DISTINCT event, count(bookID) as 'total' from book where event='$event'");
while($row1 = mysqli_fetch_assoc($query1)) {
$no = $row1['total'];
$dt = $row1['event'];

?>
    <script>
        event_no[event_no.length]="<?php echo $no; ?>";
        event[event.length]="<?php echo $dt; ?>";
    </script>
<?php
}
}
?>
<?php

global $db;
$sql = mysqli_query($db, "SELECT DISTINCT datePosted FROM customer_upload");
while($row = mysqli_fetch_assoc($sql)){
$date = $row["datePosted"];


$query1 = mysqli_query($db, "select DISTINCT datePosted, count(picID) as 'total' from customer_upload where datePosted='$date'");
while($row1 = mysqli_fetch_assoc($query1)) {
$no = $row1['total'];
$dt = $row1['datePosted'];

?>
    <script>
        dates_n[dates_n.length]="<?php echo $no; ?>";
        dates[dates.length]="<?php echo $dt; ?>";
    </script>
<?php
}
}
?>
<?php

global $db;
$sql = mysqli_query($db, "SELECT DISTINCT date FROM messages");
while($row = mysqli_fetch_assoc($sql)){
$date = $row["date"];


$query1 = mysqli_query($db, "select DISTINCT date, count(messID) as 'total' from messages where date='$date'");
while($row1 = mysqli_fetch_assoc($query1)) {
$entry = $row1['date'] . ' ' . $row1['total'] . "<br>";
$no = $row1['total'];
$dt = $row1['date'];

?>
    <script>
        dates1_n[dates1_n.length]="<?php echo $no; ?>";
        dates1[dates1.length]="<?php echo $dt; ?>";
    </script>
<?php
}
}
?>
<?php

global $db;
$sql2 = mysqli_query($db, "SELECT DISTINCT photographerID FROM photographer_upload");
while($row3 = mysqli_fetch_assoc($sql2)){
$did = $row3["photographerID"];
// echo $did."<br>";

$query2 = mysqli_query($db, "select DISTINCT photographerID, count(picID) as 'total' from photographer_upload where photographerID='$did'");
while($row1 = mysqli_fetch_assoc($query2)) {

$no = $row1['total'];
$dt = $row1['photographerID'];


$sq = mysqli_query($db, "SELECT DISTINCT firstName , surname FROM photographer WHERE photoID = '$dt'");
while ($rw1 = mysqli_fetch_assoc($sq)) {
$fname = $rw1['firstName'];
$sname = $rw1['surname'];
$dname = $fname . " " . $sname;



?>
    <script>

        dates2_n2[dates2_n2.length] = "<?php echo $no; ?>";
        dates2[dates2.length] = "<?php echo $dname; ?>";
    </script>
<?php
}
}
}
?>
<?php

global $db;
$sql = mysqli_query($db, "SELECT DISTINCT status FROM book");
while($row = mysqli_fetch_assoc($sql)){
$date = $row["status"];


$query1 = mysqli_query($db, "select DISTINCT status, count(bookID) as 'total' from book where status='$date'");
while($row1 = mysqli_fetch_assoc($query1)) {
$no = $row1['total'];
$dt = $row1['status'];

?>
    <script>
        dates3_n[dates3_n.length]="<?php echo $no; ?>";
        dates3[dates3.length]="<?php echo $dt; ?>";
    </script>
<?php
}
}
?>
<?php

include 'connect.php';
global $db;
$r = mysqli_query($db, "SELECT count(bookID) FROM book");
while($row1 = mysqli_fetch_assoc($r)){

$r3 = mysqli_query($db, "SELECT count(custID) FROM customer");
while($row3 = mysqli_fetch_assoc($r3)){

$r4 = mysqli_query($db, "SELECT count(email) FROM users");
while($row4 = mysqli_fetch_assoc($r4)){

$r5 = mysqli_query($db, "SELECT count(feedbackID) FROM feedback");
while($row5 = mysqli_fetch_assoc($r5)){

$r6 = mysqli_query($db, "SELECT count(messID) FROM messages");
while($row6 = mysqli_fetch_assoc($r6)){

$r7 = mysqli_query($db, "SELECT count(photoID) FROM photographer");
while($row7 = mysqli_fetch_assoc($r7)){

$r8 = mysqli_query($db, "SELECT count(picID) FROM photographer_upload");
while($row8 = mysqli_fetch_assoc($r8)){

$r9 = mysqli_query($db, "SELECT count(picID) FROM customer_upload");
while($row9 = mysqli_fetch_assoc($r9)) {
?>
    <section>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin3">
                <i><img src="images/book.png"></i>
            </span>
                <p> bookings</p>
                <h3><?php echo $row1['count(bookID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin1">
                <i><img src="images/specialist-user.png"></i>
            </span>
                <p> customers</p>
                <h3><?php echo $row3['count(custID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin">
                <i><img src="images/team.png"></i>
            </span>
                <p> total users</p>
                <h3><?php echo $row4['count(email)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin3">
                <i><img src="images/chat.png"></i>
            </span>
                <p> feedback</p>
                <h3><?php echo $row5['count(feedbackID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin">
                <i><img src="images/message.png"></i>
            </span>
                <p> messages</p>
                <h3><?php echo $row6['count(messID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin2">
                <i><img src="images/frame.png"></i>
            </span>
                <p> photographers</p>
                <h3><?php echo $row7['count(photoID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin2">
                <i><img src="images/upload-picture.png"></i>
            </span>
                <p> photographers uploads</p>
                <h3><?php echo $row8['count(picID)'];?></h3>
            </div>
        </div>
    </div>
    <div class="outer">
        <div class="widget">
            <div class="reportcontent">
            <span class="skin1">
                <i><img src="images/photo.png"></i>
            </span>
                <p> customers uploads</p>
                <h3><?php echo $row9['count(picID)'];?></h3>
            </div>
        </div>
    </div>
    </section>
<?php
} } } } } } } }
?>
    <br><br>
    <section class="report">
        <div class="chart">
            <br>
            <div class="fleft"><canvas id="myChart"></canvas></div>
            <div class="firstright"><canvas id="myChart5"></canvas></div><br><br>
            <div class="firstleft"><canvas id="myChart2"></canvas></div>
            <div class="firstright"><canvas id="myChart3"></canvas></div><br><br>
            <div class="firstleft"><canvas id="myChart4"></canvas></div>
            <div class="fright"><canvas id="myChart1"></canvas></div><br><br>
        </div>
    </section>
    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: photographer,
                datasets: [{
                    label: "Number of photographer bookings",
                    backgroundColor: 'rgb(75,0,130)',
                    borderColor: 'rgb(75,0,130)',
                    data:photo_no
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Photographers Names'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of bookings'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart1').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: event,
                datasets: [{
                    label: "Number of genres booked",
                    backgroundColor: 'rgb(20,20,59)',
                    borderColor: 'rgb(20,20,59)',
                    data:event_no
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Genre'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of genres booked'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart2').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: dates,
                datasets: [{
                    label: "Number of Customer Uploads per day",
                    backgroundColor: 'rgb(30,144,255)',
                    borderColor: 'rgb(30,144,255)',
                    data:dates_n
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Dates'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of Customer Uploads'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart3').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: dates1,
                datasets: [{
                    label: "Number of Messages per day",
                    backgroundColor: 'rgb(95,158,160)',
                    borderColor: 'rgb(95,158,160)',
                    data:dates1_n
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Dates'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of Messages'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart4').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: dates2,
                datasets: [{
                    label: "Number of Photographer upload",
                    backgroundColor: 'rgb(0,255,127)',
                    borderColor: 'rgb(0,255,127)',
                    data:dates2_n2
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Photographers Names'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of Uploads'
                        }
                    }]
                }
            }
        });
    </script>
    <script>
        var ctx = document.getElementById('myChart5').getContext('2d');
        var chart = new Chart(ctx, {
            // The type of chart we want to create
            type: 'bar',

            // The data for our dataset
            data: {
                labels: dates3,
                datasets: [{
                    label: "Number of Booking Status",
                    backgroundColor: 'rgb(143,188,143)',
                    borderColor: 'rgb(143,188,143)',
                    data:dates3_n
                }]
            },

            // Configuration options go here
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    xAxes: [{
                        barPercentage: 0.4,
                        scaleLabel:{
                            display: true,
                            labelString: 'Status'
                        }
                    }],
                    yAxes: [{
                        ticks: {
                            beginAtZero:true
                        },
                        scaleLabel:{
                            display: true,
                            labelString: 'Number of Status'
                        }
                    }]
                }
            }
        });
    </script>
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
                    location.href = "../log.php"
                } else {
                    location.href = "../index.php"
                }
            });
    </script>
<?php } ?>

</body>
</html>