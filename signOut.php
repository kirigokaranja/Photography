<?php
/**
 * Created by PhpStorm.
 * User: Githinji Wanjohi
 * Date: 10/8/2017
 * Time: 7:45 PM
 */

session_start();

if(session_destroy()) {
   header("Location: index.php");
}