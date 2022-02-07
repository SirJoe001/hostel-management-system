<?php
include("../connection/db.php");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $sql = "DELETE FROM applications WHERE id='$id'";
    $query = mysqli_query($conn, $sql);

    if ($query) {
        echo "<script>alert('Applicant Deleted')</script>";
        
    } else {
        echo "<script>alert('Applicant not Deleted')</script>";
        
    }
}