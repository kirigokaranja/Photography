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
    $fname = $row['firstName'];
    $sname = $row['surname'];
    $custId = $row['custID'];

    if (!empty($_FILES)) {

        $temp = $_FILES['file']['tmp_name'];
        $path=$_FILES['file']['name'];
        $fileName = pathinfo($path, PATHINFO_FILENAME);
        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $dir_separator = DIRECTORY_SEPARATOR;
        $folder = "images";
        $id_separator = "-";
        $userFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$custId . $dir_separator;

        $destination_path = dirname(__FILE__) .$userFolder;

        $target_path = $destination_path . $_FILES['file']['name'];

        $date = date('Y-m-d');

        if ($_FILES["fileToUpload"]["size"] > 10000000) {
            echo "Sorry, your file is too large.";
        } else if (!is_dir($destination_path)) {
            /*Insert file details into db*/
            $sq = "INSERT INTO `customer_upload`(`picID`,`datePosted`, `name`, `extension`, `edit_status`, `custID`) VALUES('','$date','$fileName','$ext', 'Unedited','$custId')";
            $rslt = $db->query($sq) or trigger_error($db->error."[$sq]");

            mkdir($destination_path);
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
            $sq = "INSERT INTO `customer_upload`(`picID`,`datePosted`, `name`, `extension`, `edit_status`, `custID`) VALUES('','$date','$fileName','$ext', 'Unedited','$custId')";
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
}