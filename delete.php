<?php
session_start();
include 'conn.php';
if (isset($_GET['id'])) {
    $delete_id = $_GET['id'];
    $delete_query = "DELETE FROM employees WHERE id=$delete_id";
    $delete_query_run = mysqli_query($conn, $delete_query);

    if ($delete_query_run) {
        $_SESSION['success'] = "Employees Record Deleted Successfully";
        header('Location:index.php');
    } else {
        $_SESSION['error'] = "Employees Record Not Deleted Successfully";
        header('Location:delete.php');
    }
}