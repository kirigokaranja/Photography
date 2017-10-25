<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>demo</title>
    <link rel="stylesheet" type="text/css" href="css/bookings.css">
    <style>
        .navul{
            list-style-type: none;
            text-decoration: none;
            margin: 0;
            padding: 20px;
            overflow: hidden;
            border: 1px solid rgb(20,20,59);
            background-color: rgb(20,20,59);
            opacity: 0.8;
        }
        li {
            float: left;
        }

        li a {
            display: block;
            color: white;
            font-size: x-large;
            text-align: center;
            padding: 14px 16px;
            text-decoration: none;
        }
        .sidenav {
            height: 100%;
            width: 0;
            position: fixed;
            z-index: 1;
            top: 0;
            left: 0;
            background-color: #111;
            overflow-x: hidden;
            transition: 0.5s;
            padding-top: 60px;
        }

        .sidenav a {
            padding: 8px 8px 8px 32px;
            text-decoration: none;
            font-size: 25px;
            color: #818181;
            display: block;
            transition: 0.3s;
        }

        .sidenav a:hover {
            color: rgb(20,20,59);
        }

        .sidenav .closebtn {
            position: absolute;
            top: 0;
            right: 25px;
            font-size: 36px;
            margin-left: 50px;
        }

        #main {
            transition: margin-left .5s;
            padding: 10px;
        }

        @media screen and (max-height: 450px) {
            .sidenav {padding-top: 15px;}
            .sidenav a {font-size: 18px;}
        }

    </style>
</head>
<body>
<ul class="navul">

    <div id="mySidenav" class="sidenav">
        <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
        <a href="index.php">Home</a>
        <a href="notifications.php">Notifications</a>
        <a href="bookings.php">Bookings</a>
        <a href="personal.php">Personal Details</a>
        <a href="gallery.php">Gallery</a>
        <a href="logout.php">Logout</a>
    </div>

    <div id="main">

        <span style="font-size:40px;cursor:pointer;color: white" onclick="openNav()">&#9776;</span>
    </div>
</ul>
<?php
session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
$id = $_SESSION['email'];

$s = "SELECT * FROM customer WHERE email = '$id'";
global $db;
$res = $db->query($s) or trigger_error($db->error."[$s]");


while($row = mysqli_fetch_array($res)) {
$name = $row['name'];
$custid = $row['custID'];

$sql = "SELECT * FROM book WHERE custID = '$custid'";
global $db;
$result = $db->query($sql) or trigger_error($db->error . "[$sql]");
?>


<div class="container">
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

        ?>
        <tr>
            <td><?php echo $date;?></td>
            <td><?php echo $location;?></td>
            <td><?php echo $genre;?></td>
            <td>
                <form action="view_bookings.php" method="post">
                    <input type="hidden" value="<?php echo $id;?>" name="id">
                    <input type="hidden" value="<?php echo $photographer;?>" name="photographer">
                    <button type="submit" class="submit">View</button>
                </form>
            </td>
        </tr>
    <?php } }?>
    </table>
</div>
    <?php
}else{

    session_destroy();


    ?>
    <br><br><br><br><br><br>
    <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P><br><br><br><br>
    <p style="text-align: center"><a href="signin.php" style="color: red; font-size: 30px; "> Login</a></p>
<?php } ?>
<script>
    function openNav() {
        document.getElementById("mySidenav").style.width = "250px";
        document.getElementById("main").style.marginLeft = "250px";
        document.getElementById("opennav").style.display = "none";
        document.body.style.backgroundColor = "rgba(0,0,0,0.4)";
    }

    function closeNav() {
        document.getElementById("mySidenav").style.width = "0";
        document.getElementById("main").style.marginLeft= "0";
        document.getElementById("opennav").style.display = "block";
        document.body.style.backgroundColor = "white";
    }
</script>
</body>
</html>