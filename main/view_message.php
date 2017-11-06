<html>
<head>
    <title></title>
    <link href='https://fonts.googleapis.com/css?family=Playfair+Display' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" type="text/css" href="css/view_messages.css">
</head>
<body>

<?php
session_start();
include ("connect.php");

if(isset($_SESSION['Admin'])){

    $messid = $_POST["messid"];

    $sql = "SELECT * FROM messages WHERE messID = '$messid'";
    global $db;
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    while($row = mysqli_fetch_array($result)) {
        $message = $row['message'];
        $name = $row['name'];
        $email = $row['email'];
        $date = $row['date'];

        ?>
        <div class="container">
        <div class="picture-holder">
        </div>
        <div class="story-holder">

        <h1>Message</h1>


        <div class="article">
        <form method="post" action="message_action.php" >
        <input type="hidden" name="messid" value="<?php echo $messid;?>">
        <label>
            <span >Date</span>
            <input type="date" name="date" value="<?php echo $date;?>" readonly/>
        </label><br><br>
        <label>
            <span>Name</span>
            <input type="text" value="<?php echo $name;?>" readonly/>
        </label><br><br>
        <label>
            <span >Email</span>
            <input type="text" value="<?php echo $email;?>" readonly/>
        </label><br><br>
        <label>
            <span>Message</span>
            <input type="text" value="<?php echo $message;?>" readonly/>
        </label><br><br>
            <div class="text-center">
                <button type="submit" class="submit">READ</button>

            </div>
        <?php }?>
    </form>
    <button onclick=" window.location='message.php' " class="back">Back</button>
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