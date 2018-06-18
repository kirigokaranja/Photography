<?php


session_start();
include ('connect.php');
$id = $_SESSION['Photographer'];

$s = "SELECT * FROM photographer WHERE email = '$id'";
global $db;
$res = $db->query($s) or trigger_error($db->error . "[$s]");

while ($row = mysqli_fetch_array($res)) {
    $fname = $row['firstName'];
    $sname = $row['surname'];
    $photographerId = $row['photoID'];



//        $temp = $_FILES['file']['tmp_name'];
//        $path=$_FILES['file']['name'];
//        $fileName = pathinfo($path, PATHINFO_FILENAME);
//        $ext = pathinfo($path, PATHINFO_EXTENSION);

        $dir_separator = DIRECTORY_SEPARATOR;
        $folder = "images";
        $id_separator = "-";
        $userFolder =$dir_separator. $folder . $dir_separator.$fname.$sname.$id_separator.$photographerId . $dir_separator;

        echo $destination_path = dirname(__FILE__) .$userFolder;

//        $target_path = $destination_path . $_FILES['file']['name'];

        echo $date = date('Y-m-d');



}