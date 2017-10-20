<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 10/19/2017
 * Time: 9:39 PM
 */

if(!empty($_FILES)){
    $temp = $_FILES['file']['tmp_name'];
    $dir_separator=DIRECTORY_SEPARATOR;
    $folder="images";

    $destination_path = dirname(__FILE__).$dir_separator.$folder.$dir_separator;

    $target_path = $destination_path.$_FILES['file']['name'];
    move_uploaded_file($temp, $target_path);
}