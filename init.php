<?php

$host="localhost";
$dbUser="root";
$dbPass="";
$dbName="boostrapslide";
$mysqli = new mysqli($host, $dbUser, $dbPass, $dbName);

if($mysqli->connect_error) {
    die("connection failed : " . $connect->connect_error);
} else {
    // echo "Successfully Connected";
}
?>
