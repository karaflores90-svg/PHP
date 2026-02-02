<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}

include '../db.php';

$id = $_GET['id'];

// Check if car exists and is available
$check = mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$id AND status='Available'");
if (mysqli_num_rows($check) == 1) {
    // Update car status to 'Rented'
    mysqli_query($conn, "UPDATE cars SET status='Rented' WHERE car_id=$id");
    $success = "Car rented successfully!";
} else {
    $error = "Car is not available.";
}

header("Location: dashboard.php");
exit();
