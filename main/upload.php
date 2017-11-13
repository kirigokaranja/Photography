<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!-->
<html class="no-js" lang="">
<!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" type="image/ico" href="../favicon.ico" />
    <title>Photographer | Dashboard</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css">
    <link rel="stylesheet" href="../css/flexslider.css">
    <link rel="stylesheet" href="../css/jquery.fancybox.css">
    <link rel="stylesheet" href="../css/main.css">
    <link rel="stylesheet" href="../css/responsive.css">
    <link rel="stylesheet" href="../css/animate.min.css">
    <link rel="stylesheet" href="../css/font-icon.css">
    <link rel="stylesheet" href="../css/menuDropdown.css">
    <link rel="stylesheet" href="../css/dropzone.css">
    <link rel="stylesheet" href="../css/upload.css">
    <link rel="stylesheet" href="../css/gallery.css">
    <link rel="stylesheet" href="../main/scss/upload.scss">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="../js/upload.js"></script>
    <script src="../js/dropzone.js"></script>
    <style>body{background-image: url("../images/alif-ngoylung-243373.jpg")}</style>
</head>
<body>
<?php
include ('connect.php');
session_start();

global $db;

$folder1 = $_GET['folderName'];
$folderDir = $_GET['folderDir'];
$userID = $_GET['userID'];
$datePosted = $_GET['datePosted'];
$timePosted = $_GET['timePosted'];

$cSql = "SELECT firstName, surname FROM customer WHERE custID = $userID";
$cRes = $db->query($cSql) or trigger_error($db->error."[$cSql]");
$row1 = mysqli_fetch_array($cRes);
$fName = $row1['firstName'];
$sname = $row1['surname'];
?>
<h1>Re-uploading Edited Images</h1>
<h4>Please upload the required files for the selected user</h4>
<div class="container">
    <form enctype="multipart/form-data" action="../main/upload2.php" class="dropzone" id="my-dropzone" method="post"
          style="min-height: 620px; border: dotted">
        <div class="form-group">
            <label for="folder">Customer Name</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="<?php echo $fName." ".$sname?>" value="<?php echo $fName." ".$sname?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="folder">Folder Name</label>
            <input type="text" class="form-control" id="folder" name="folder" placeholder="<?php echo $folder1?>" value="<?php echo $folder1?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="folder">Customer Submission Date</label>
            <input type="text" class="form-control" id="date" name="date" placeholder="<?php echo $datePosted?>" value="<?php echo $datePosted?>" readonly="readonly">
        </div><div class="form-group">
            <label for="folder">Customer Submission Time</label>
            <input type="text" class="form-control" id="time" name="time" placeholder="<?php echo $timePosted?>" value="<?php echo $timePosted?>" readonly="readonly">
        </div>
        <div class="form-group">
            <label for="comment">Add a description of the work</label>
            <textarea class="form-control" rows="5" id="comment" name="description"></textarea>
        </div>
        <div class="fallback" style="position: relative">
            <input name="file" type="file" multiple />
        </div>
    </form>
    <div class="col-md-8 col-md-offset-2 text-center">
        <button class="btn btn-large" id="submit-all">Upload Photos</button>
        <button class="btn btn-large" onclick="goBack()">Back</button>
        <script>
            Dropzone.options.myDropzone = {

                // Prevents Dropzone from uploading dropped files immediately
                autoProcessQueue: false,
                addRemoveLinks:true,
                maxFiles:50,
                parallelUploads:50,
                acceptedFiles: "image/jpeg, image/jpg, image/png, image/gif",

                init: function() {
                    var submitButton = document.querySelector("#submit-all");
                    myDropzone = this; // closure

                    submitButton.addEventListener("click", function() {
                        myDropzone.processQueue(); // Tell Dropzone to process all queued files.
                    });

                    myDropzone.on('sending', function(file, xhr, formData){
                        formData.append('userName', 'bob');
                    });

                    // You might want to show the submit button only when
                    // files are dropped here:
                    this.on("addedfile", function() {
                        // Show submit button here and/or inform user to click it.
                    });

                    myDropzone.on("complete", function(file) {
                        setTimeout(remove,3000);
                        function remove () {
                            myDropzone.removeFile(file);
                        }
                    });

                }
            };

            function goBack() {
                window.history.back();
            }
        </script>
    </div>
</div>
</body>
</html>