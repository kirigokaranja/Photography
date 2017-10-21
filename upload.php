<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 10/19/2017
 * Time: 9:39 PM
 */

session_start();
include ('connect.php');
$id = $_SESSION['email'];

$s = "SELECT * FROM customer WHERE email = '$id'";
global $db;
$res = $db->query($s) or trigger_error($db->error . "[$s]");

while ($row = mysqli_fetch_array($res)) {
    $name = $row['name'];
    $custId = $row['custID'];

    if (!empty($_FILES)) {
        $temp = $_FILES['file']['tmp_name'];
        $dir_separator = DIRECTORY_SEPARATOR;
        $folder = "images";
        $id_separator = "-";
        $userFolder =$dir_separator. $folder . $dir_separator.$name.$id_separator.$custId . $dir_separator;

        $destination_path = dirname(__FILE__) .$userFolder;

        $target_path = $destination_path . $_FILES['file']['name'];
        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
        } else if (!is_dir($destination_path)) {
            mkdir($destination_path);
            move_uploaded_file($temp, $target_path);
        } else {
            move_uploaded_file($temp, $target_path);
        }
    }
}