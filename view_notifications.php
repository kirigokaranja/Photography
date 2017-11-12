<?php
/**
 * Created by PhpStorm.
 * User: kirigo karanja
 * Date: 12/11/2017
 * Time: 10:55
 */?>
<html>
<head>
    <link type="text/css" rel="stylesheet" href="css/modal.css">
</head>
</html>
<?php

session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];

    $s = "SELECT * FROM customer WHERE email = '$id'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error."[$s]");


    while($row = mysqli_fetch_array($res)) {
        $fname = $row['firstName'];
        $sname = $row['surname'];
        $custid = $row['custID'];

$book = $_POST["bookid"];

        ?>
<?php
$sql = "SELECT * FROM feedback WHERE custID = $custid  AND bookID = '$book' ORDER BY feedbackID DESC ";
$result = $db->query($sql) or trigger_error($db->error."[$sql]");

while($row1 = mysqli_fetch_array($result)) {
$bookid = $row1['bookID'];
$dateposted = $row1['datePosted'];
$status = $row1['status'];
$seen = $row1['seen'];
$reject = $row1['reject_reason'];
$feedid = $row1['feedbackID'];


$sql1 = "SELECT * FROM book WHERE bookID = $book ORDER BY bookID DESC ";
$result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");

while($row2 = mysqli_fetch_array($result1)) {
$date = $row2['date'];
$location = $row2['location'];
$event = $row2['event'];
$description = $row2['description'];

if ($seen == "unseen"){
?>
<div id="myModal" class="modal" >
    <div class="modal-content">

        <h1>More Information!</h1>
        <form action="edit_notifications.php" method="post" >

            <p>Date: <?php echo $date;?></p>
            <p>Location: <?php echo $location;?></p>
            <p>Genre: <?php echo $event;?></p>
            <p>Description: <?php echo $description;?></p>
            <p>Status: <?php echo $status;?></p>
            <?php
            if ($status == "rejected")
            ?>
            <p>Reject Reason: <?php echo $reject;?></p>
            <?php
            ?>
            <input type="hidden" name="feedid" value="<?php echo $feedid;?>">
            <input type="submit" name="submit" value="Okay">
        </form>
    </div>
    <?php }else {?>
    <div id="myModal" class="modal" >
        <div class="modal-content">

            <h1>More Information!</h1>
            <form action="notifications.php" >

                <p>Date: <?php echo $date;?></p>
                <p>Location: <?php echo $location;?></p>
                <p>Genre: <?php echo $event;?></p>
                <p>Description: <?php echo $description;?></p>
                <p>Status: <?php echo $status;?></p>
                <?php
                if ($status == "rejected")
                ?>
                <p>Reject Reason: <?php echo $reject;?></p>
                <?php
                ?>
                <input type="submit" name="submit" value="Okay">
            </form>
        </div>

        <?php  }?>
        <?php }?>
        <?php }?>
        <?php }?>
        <?php }?>
