<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 10/28/2017
 * Time: 5:02 PM
 */
$db=mysqli_connect("localhost", "root","") ;
if (!$db) {
    die ("Could not connect to database" . mysqli_connect_error());
}

mysqli_select_db($db,'foto') or die('Error selecting database : ' . mysql_error());