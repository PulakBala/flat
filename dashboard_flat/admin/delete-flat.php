<?php
include('connection.php');

$id = $_GET['id'] ?? null;

if ($id) {
    $deleteQuery = "DELETE FROM flats WHERE id = '$id'";
    if (mysqli_query($conn, $deleteQuery)) {
        header("Location: addnewflat.php?status=deleted");
        exit();
    } else {
        echo "Error deleting record: " . mysqli_error($conn);
    }
}
