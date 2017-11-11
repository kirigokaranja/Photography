<?php
include 'connect.php';
global $db;

$pname = $_POST["pname"];
$photoId = $pname;
$sq = "SELECT DISTINCT * FROM photographer WHERE photoID = '$photoId'";
$res = $db->query($sq);
while ($rw1 = mysqli_fetch_assoc($res)) {
    $fname = $rw1['firstName'];
    $sname = $rw1['surname'];

    $file_path = 'photographer/images/' . $fname . $sname . '-' . $photoId . '/';


    $sql = "SELECT * FROM photographer_upload WHERE photographerID = '$photoId'";
    $result = $db->query($sql) or trigger_error($db->error . "[$sql]");
    ?>
    <h1 style="text-align: center; font-size: 50px; margin-top: 5%; color: #24c315"><?php echo $fname . $sname;?>'s Works</h1>
    <?php
    while($all_images = mysqli_fetch_assoc( $result ))

    {
        $name = $all_images['name'];
        $ext = $all_images['extension'];
        $img = $name.".".$ext;
        $img_src = $file_path.$img;

        ?>
        <img src="<?php echo $img_src;?>" height="300" style="margin-left: 5%;margin-top: 5%">
        <?php
    }
}











