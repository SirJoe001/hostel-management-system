<?php
include("../connection/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "UPDATE applications SET status='Approved' WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        header("Location: applicants.php?ms='Approved'");
    } else {
        echo "<script>alert('Not Approved')<script>";
    }
}