<?php
$link = mysqli_connect('127.0.0.1', 'root', 'Wtfboom!!1');
if (!$link) {
    die('Could not connect: '.mysqli_error());
}
//echo "Connected successfully. \n";
$dbName= "docoffice";
mysqli_select_db($link, $dbName) or die("Unable to select database $dbName");
?>
