<html>
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/view_bookings.css">
</head>
<body>

<?php
session_start();
include ("connect.php");

if(isset($_SESSION['email'])){
    $id = $_SESSION['email'];

    $bookid = $_POST["id"];
    $photographer = $_POST["photographer"];

    $sql = "SELECT * FROM book WHERE bookID = '$bookid'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    while($row = mysqli_fetch_array($result)) {
        $date = $row['date'];
        $location = $row['location'];
        $photographer = $row['photoID'];
        $genre = $row['event'];
        $description = $row['description'];

        ?>
        <div class="container">
        <div class="picture-holder">
        </div>
        <div class="story-holder">

        <h1>Booking</h1>


        <div class="article">
        <form>
        <input type="hidden" name="bookid" value="<?php echo $bookid;?>">
        <label>
            <span >Date</span>
            <input type="date" name="date" value="<?php echo $date;?>" readonly/>
        </label><br><br>
        <label>Location
            <input type="text" name="location" value="<?php echo $location;?>" readonly/>
        </label><br><br>
        <?php
        $s = "SELECT * FROM photographer WHERE photoID = '$photographer'";
        global $db;
        $res = $db->query($s) or trigger_error($db->error."[$s]");


        while($row = mysqli_fetch_array($res)) {
            $photo = $row['firstName']. " " . $row['surname'];
            ?>
            <label>Photographer
                <input type="text" name="location" value="<?php echo $photo;?>" readonly/>
            </label><br><br>
            <label>Genre
                <input type="text" name="location" value="<?php echo $genre;?>" readonly/>
            </label><br><br>
            <label>Description
                <input type="text" name="description" value="<?php echo $description;?>" readonly/>
            </label><br><br>

        <?php } }?>
    </form>
    <button onclick=" window.location='bookings.php' " class="back">Back</button>
    </div>
    </div>
    </div>
    <?php
}else{

    session_destroy();


    ?>
    <br><br><br><br><br><br>
    <P style="color: blue; text-align: center; font-size: 25px">You are Not logged in</P><br><br><br><br>
    <p style="text-align: center"><a href="signin.php" style="color: red; font-size: 30px; "> Login</a></p>
<?php } ?>
</body>
</html>