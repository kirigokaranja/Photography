<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 10/19/2017
 * Time: 9:39 PM
 */

session_start();
include ('connect.php');

$custName = explode(" ",$_POST["name"]);
$fname = $custName[0];
$sname = $custName[1];

$s = "SELECT custID FROM customer WHERE  firstName = '$fname' AND surname = '$sname'";
global $db;
$cID = $db->query($s) or trigger_error($db->error . "[$s]");
$cIDRow = mysqli_fetch_array($cID);
$custId = $cIDRow['custID'];

$folderName = $_POST["folder"];
$dateUploaded = $_POST["date"];
$timeUploaded = $_POST["time"];

if (!empty($_FILES)) {

    $temp = $_FILES['file']['tmp_name'];
    $path=$_FILES['file']['name'];
    $fileName = pathinfo($path, PATHINFO_FILENAME);
    $ext = pathinfo($path, PATHINFO_EXTENSION);

    $date = date('Y-m-d');
    $time = date('H:i:s');

    $dir_separator = DIRECTORY_SEPARATOR;
    $folder = "images";
    $edit = "edited";
    $id_separator = "-";
    $editUserFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$custId . $dir_separator.$edit.$dir_separator;
    $editPicFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$custId .$dir_separator.$folderName. $dir_separator;

    $destination_path = dirname(__FILE__) .$editUserFolder;
    $folder_path = dirname(__FILE__) .$editPicFolder;

    $target_path = $folder_path . $_FILES['file']['name'];

    if ($_FILES["fileToUpload"]["size"] > 10000000) {
        echo "Sorry, your file is too large.";
    } else if (!is_dir($destination_path) || !is_dir($folder_path)) {
        /*Insert file details into db*/
        $sq = "UPDATE `customer_upload` SET edit_status = '$edit', dateEdited = '$date', timeEdited = '$time'
                WHERE custID = '$custId' AND folderName = '$folderName' AND datePosted = '$dateUploaded' AND timePosted = '$timeUploaded'";
        $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

        mkdir($destination_path);
        mkdir($folder_path);
        move_uploaded_file($temp, $target_path);?>
        <script>
            swal({
                title: "Success",
                text: "Upload successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
        </script>
        <?php
    } else {
        /*Insert file details into db*/
        $sq = "UPDATE `customer_upload` SET edit_status = '$edit', dateEdited = '$date', timeEdited = '$time'
                WHERE custID = '$custId' AND folderName = '$folderName' AND datePosted = '$dateUploaded' AND timePosted = '$timeUploaded'";
        $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

        move_uploaded_file($temp, $target_path);?>
        <script>
            swal({
                title: "Success",
                text: "Upload successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
        </script>
        <?php
    }
}