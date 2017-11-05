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
            <form method="post" action="book_edit.php">
    <input type="hidden" name="bookid" value="<?php echo $bookid;?>">
                <label>
                    <span >Date</span>
                    <input type="date" name="date" value="<?php echo $date;?>" required/>
                </label><br><br>
                <label>Location
                    <input type="text" name="location" value="<?php echo $location;?>" required/>
                </label><br><br>
    <?php
    $s = "SELECT * FROM photographer WHERE photoID = '$photographer'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error."[$s]");


    while($row = mysqli_fetch_array($res)) {
        $photo = $row['firstName']. " " . $row['surname'];
    ?>
                <label>Photographer
                    <?php
                    $sql=mysqli_query($db, "SELECT * FROM photographer" );
                    if(mysqli_num_rows($sql)){
                        ?>

                        <select name="photographer"  class="input__field input__field--hoshi" id="photographer" required style="font-size:large; outline:none">
                            <option value="<?php echo $photo;?>"><?php echo $photo;?></option>
                            <?php
                            while($rs=mysqli_fetch_array($sql)){
                            ?>
                            <option value="<?php echo $photo = $rs['firstName']. " " . $rs['surname']; ?>"><?php echo $photo = $rs['firstName']. " " . $rs['surname'];} ?></option></select>
                        <?php

                    }

                    ?>
                </label><br><br>
                <label>Genre
        <?php
        $sq=mysqli_query($db, "SELECT * FROM genre" );
        if(mysqli_num_rows($sq)){
            ?>
                    <select name="genre" id="genre"  required style="outline:none">
                        <option value="<?php echo $genre;?>"> <?php echo $genre;?> </option>
                        <?php
                        while($rs1=mysqli_fetch_array($sq)){
                        ?>
                        <option value="<?php echo $genre = $rs1['name']; ?>"><?php echo $genre=$rs1['name'];} ?></option></select>
            <?php

        }

        ?>
                </label><br><br>
                <label>Description
                    <input type="text" name="description" value="<?php echo $description;?>" required/>
                </label><br><br>
                <div class="text-center">
                <button type="submit" class="submit">EDIT</button>

                </div>
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