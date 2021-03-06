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
    $view = $_POST["view"];

    $read = "read";

    $sql1 = "UPDATE `messages` SET `viewed` ='$read' WHERE `messID` = '$messid'";
    global $db;
    $result1 = $db->query($sql1) or trigger_error($db->error."[$sql1]");

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

        <?php
        if ($view =="pending"){
        ?>
        <div class="article">
        <form  action="message_action.php" method="post">
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
        </form>

        </div>

            <?php }else{
        ?>
            <div class="article">
                <form>
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
                </form>
                <button onclick=" window.location='message.php' " class="back">Back</button>
            </div>
            <?php }?>
        <?php }?>

    </div>
    </div>
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