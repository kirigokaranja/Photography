<?php
include ('connect.php');
session_start();

$folder1 = $_GET['folderName'];
$folderDir = $_GET['folderDir'];
$userID = $_GET['userID'];
$dir = "images";
$zip_file = $folderDir."/".$folder1.'.zip';

// Get real path for our folder
$rootPath = realpath($folderDir);

global $db;
$status = "In Progress";
$sql = "UPDATE customer_upload SET edit_status='$status'
          WHERE custID='$userID' AND folderName='$folder1'";
$res = $db->query($sql) or trigger_error($db->error."[$sql]");

// Initialize archive object
$zip = new ZipArchive();
if($result = $zip->open($zip_file, ZipArchive::CREATE | ZipArchive::OVERWRITE)) {

// Create recursive directory iterator
    /** @var SplFileInfo[] $files */
    $files = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($rootPath),
        RecursiveIteratorIterator::LEAVES_ONLY
    );

    foreach ($files as $name => $file) {
        // Skip directories (they would be added automatically)
        if (!$file->isDir()) {
            // Get real and relative path for current file
            $filePath = $file->getRealPath();
            $relativePath = substr($filePath, strlen($rootPath) + 1);

            // Add current file to archive
            $zip->addFile($filePath, $relativePath);
        }
    }


    header("Content-type: application/zip");
    header("Content-Disposition: attachment; filename=$zip_file");
    header("Content-length: " . filesize($zip_file));
    header("Pragma: no-cache");
    header("Expires: 0");
    readfile("$zip_file");
}