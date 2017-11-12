<?php session_start();
?>
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

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.0.0-alpha.6/css/bootstrap.css" />
    <link href='https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/2.3.1/fullcalendar.print.css' rel='stylesheet' media='print' />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.11.4/jquery-ui.css"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.18.1/moment.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fullcalendar/3.4.0/fullcalendar.min.js"></script>

    <link type="text/css" rel="stylesheet" href="css/modal.css">

    <script>
        $(document).ready(function() {
            var date = new Date();
            var d = date.getDate();
            var m = date.getMonth();
            var y = date.getFullYear();

            var calendar = $('#calendar').fullCalendar({
                editable: true,
                header: {
                    left: 'prev,next today',
                    center: 'title',
                    right: ''
                },
                events: "events.php",
                eventColor: '#1157e6',
                eventTextColor: 'white',
                eventClick: function(event, jsEvent, view) {

                    alert('Date: ' + event.date  + '\n\n Event: ' + event.event+ '\n\n Location: ' + event.location+ '\n\n Description: '+ event.description  );

                }

            });

        });

    </script>
    <style>
        body {
            background-color: white;
            text-align: center;
            font-size: 14px;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
        }
        #calendar {
            width: 750px;
            margin: 0 auto;
            background-color: whitesmoke;

        }
        .fc-event { height: 2em; }
    </style>

</head>

<body>
<?php

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
                        <li><a href="dashboard.php">Dashboard</a></li>
                        <li><a href="schedule.php">Schedule</a></li>
                        <li><a href="addPictures.php">Add Pictures</a></li>
                        <li><a href="bookings.php">Bookings</a></li>
                        <li><a href="logout.php" class="btn btn-large" style="padding: 20px">Logout</a></li>

                    </ul>
                </nav>
            </div>
            <div class="col-md-10 col-md-offset-1">

                <div class="hero-text text-center">
                    <h1><?php echo $fname." ".$sname; ?></h1><br>
                    <p>Schedule</p>
                    <nav role="navigation"><a href="#photos" class="banner-btn"><img src="images/down-arrow.png" alt=""></a>
                    </nav>
                </div>
                <!-- banner text -->
            </div>
        </div>
    </section>
<br><br>
    <div id='calendar'></div>

    <div id="myModal" class="modal" style="display: none">

        <!-- Modal content -->
        <div class="modal-content" id="eventContent"  style="display:none;">

            <h1>Reject Reason!</h1>
            <form>

                <p>Date: <span id="startTime"></span></p><br>
                <p>Event: <span id="eventevent"></span></p><br>
                <p>Location: <span id="eventLoca"></span></p><br>
                <p>Description: <span id="eventInfo"></span></p>
            </form>
        </div>

    </div>

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
                    location.href = "../log.php"
                } else {
                    location.href = "index.php"
                }
            });
    </script>
<?php } ?>
</body>
</html>

