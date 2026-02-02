<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

include '../db.php';

$id = $_GET['id'];
mysqli_query($conn, "DELETE FROM cars WHERE car_id=$id");

header("Location: view_cars.php");
exit();
