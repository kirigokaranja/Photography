<html>
<head>
    <script src="dist/sweetalert.min.js"></script>
    <link rel="stylesheet" type="text/css" href="dist/sweetalert.css">
</head>
<body>
<?php
include_once 'connect.php';
if(isset($_POST['btn-upload']))
{
$custid = $_POST["id"];

    $file = rand(1000,100000)."-".$_FILES['file']['name'];
    $file_loc = $_FILES['file']['tmp_name'];
    $file_size = $_FILES['file']['size'];
    $file_type = $_FILES['file']['type'];
    $folder="uploads/";

    // new file size in KB
    $new_size = $file_size/1024;
    // new file size in KB

    // make file name in lower case
    $new_file_name = strtolower($file);
    // make file name in lower case

    $final_file=str_replace(' ','-',$new_file_name);

    if(move_uploaded_file($file_loc,$folder.$final_file))
    {
        global  $db;
        // $sql="INSERT INTO tbl_uploads(file,type,size) VALUES('$final_file','$file_type','$new_size')";
        mysqli_query($db, "UPDATE customer SET picture ='$final_file' WHERE custID='$custid'");
        ?>
        <script>
            swal({
                title: "Success",
                text: "Image Upload successful!",
                type: "success",
                timer: 1500,
                showConfirmButton: false
            });
            setTimeout(function () {
                location.href = "personal.php"
            }, 1000);
        </script>
        <?php
    }
    else
    {
        ?>
<script>
    swal({
        title: "Success",
        text: "Error Ocurred!",
        type: "success",
        timer: 1500,
        showConfirmButton: false
    });
    setTimeout(function () {
        location.href = "personal.php"
    }, 1000);
</script>
        <?php
    }
}
?>