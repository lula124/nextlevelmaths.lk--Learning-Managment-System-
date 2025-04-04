<?php
error_reporting(E_ALL);
ini_set('display_errors', 1);

$dbhost = "localhost";
$dbuser = "u935400905_root";
$dbpass = "Cd123-3164";
$dbname = "u935400905_nxtlvlmaths";

$con = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

if (!$con) {
    die("Failed to connect: " . mysqli_connect_error());
} else {
    echo "";
}
?>
