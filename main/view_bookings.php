<html
<head>
    <link rel="stylesheet" href="css/view_bookings.css">
</head>
<body>
<?php
include ("connect.php");
$bookid = $_POST['bookid'];
$ddate = $_POST['date'];

$sql = "SELECT * FROM book WHERE bookID = '$bookid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

while($row = mysqli_fetch_array($result)) {

$event = $row['event'];
$date = $row['date'];
$location = $row['location'];
$id = $row['bookID'];
$cust = $row['custID'];
$photo = $row['photoID'];

$sql1 = "SELECT * FROM photographer WHERE photoID = '$photo'";
$res1 = $db->query($sql1) or trigger_error($db->error . "[$sql1]");

while ($row2 = mysqli_fetch_array($res1)) {
$pname = $row2['firstName'];
$pname2 = $row2['surname'];


$sq = "SELECT * FROM feedback WHERE bookID = '$bookid'";
$res = $db->query($sq) or trigger_error($db->error . "[$sq]");

while ($row1 = mysqli_fetch_array($res)) {
$reject = $row1['reject_reason'];

?>
<section>
    <div class="container1">
        <div class="picture-holder"></div>
        <div class="story-holder">
            <h1 class="formh1">Booking</h1><br>
            <form method="post" action="genre_action.php">
                <input type="hidden" name="bookid" value="<?php echo $bookid?>">
                <label>
                    <span>Date</span><br>
                    <input type="text" name="genre" value="<?php echo $date; ?>" readonly/>
                </label><br><br>
                <label>
                    <span>Event</span><br>
                    <input type="text" name="genre" value="<?php echo $event; ?>" readonly/>
                </label><br><br>
                <label>
                    <span>Location</span><br>
                    <input type="text" name="genre" value="<?php echo $location; ?>" readonly/>
                </label><br><br>
                <label>
                    <span>Photographer's Name</span><br>
                    <input type="text" name="genre" value="<?php echo $pname." ".$pname2; ?>" readonly/>
                </label><br><br>
                <label>
                    <span>Reject Reason</span><br>
                    <input type="text" name="genre" value="<?php echo $reject; ?>" readonly/>
                </label><br><br>

                <label>
                    <span>Free Photographers</span><br>
                    <select name="photographer"  class="input__field input__field--hoshi" id="photographer" required style="font-size:large; outline:none">
                        <option value="choose">Choose a photographer</option>
                        <?php
                        include ("connect.php");
                        global $db;

                        $date = $ddate;
                        $sql= "SELECT DISTINCT photoID FROM  book WHERE date <> '$date'";
                        $result = $db->query($sql) or trigger_error($db->error."[$sql]");

                        while($row = mysqli_fetch_array($result)) {
                        $photoid = $row['photoID'];

                        $sq = "SELECT DISTINCT * FROM photographer WHERE photoID <> '$photoid'";
                        $res = $db->query($sq) or trigger_error($db->error . "[$sq]");

                        while ($row1 = mysqli_fetch_array($res)) {
                        $fname = $row1['firstName'];
                        $sname = $row1['surname'];
                        $name = $fname . " " . $sname;

                        ?>
                        <option value="<?php echo $name; ?>"><?php echo $name; ?></option>
                    </select>
                    <?php
                    }
                    }
                    ?>
                </label><br><br>

                <div class="text-center">
                    <button type="submit" class="buttonsubmit">Change Photographer</button>
                </div>
            </form>
            <button class="buttonback" onclick=" window.location='bookings.php' ">Back</button>
        </div>
    </div>
</section>
<?php
}
}
}