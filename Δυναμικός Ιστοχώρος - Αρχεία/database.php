<?php
$hostName = "webpagesdb.it.auth.gr:3306";
$dbUser = "mariannfk";
$dbPassword = "aggouri1234";
$dbName = "student4006partB";

$conn = mysqli_connect($hostName, $dbUser, $dbPassword, $dbName);

if (!$conn) {
    die("Κάτι πήγε στραβά;");
}
?>