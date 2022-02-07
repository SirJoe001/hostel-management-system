<?php
$serverName = "localhost";
$user = "root";
$password = "";
$dbname = "hostel";

$conn = mysqli_connect($serverName, $user, $password, $dbname);
$query = mysqli_query($conn, $dbname);

if (!$conn) {
    die("Not connected");
}
?>