<?php
session_start();
include ("connect.php");
if(isset($_SESSION['Photographer'])) {
    $json = array();

    $pid = $_SESSION['Photographer'];
    $s = "SELECT * FROM photographer WHERE email = '$pid'";
    global $db;
    $res = $db->query($s) or trigger_error($db->error . "[$s]");
    while ($row = mysqli_fetch_array($res)) {
        $id = $row['photoID'];

        //$id = 1;
        $sta = "accepted";
        $sql = "SELECT * FROM book WHERE photoID ='$id'AND status = '$sta' ORDER BY bookID ";

        try {
            require "connect.php";
        } catch (Exception $e) {
            exit('Unable to connect to database.');
        }

        global $db;

        $result = mysqli_query($db, $sql);
        echo json_encode(mysqli_fetch_all($result, MYSQLI_ASSOC));
    }
}
?>