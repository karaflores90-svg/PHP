<?php
session_start();

// Only allow admin users
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Dashboard - Car Rental</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f2f5;
            margin: 0;
            padding: 0;
        }

        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .container {
            padding: 30px;
            max-width: 900px;
            margin: auto;
        }

        h2 {
            text-align: center;
            margin-bottom: 30px;
            color: #333;
        }

        .nav {
            display: flex;
            justify-content: center;
            margin-bottom: 30px;
        }

        .nav a {
            background-color: #4CAF50;
            color: white;
            padding: 12px 20px;
            margin: 0 10px;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s;
        }

        .nav a:hover {
            background-color: #45a049;
        }

        .welcome {
            text-align: center;
            margin-bottom: 20px;
            font-size: 18px;
            color: #555;
        }
    </style>
</head>
<body>

<header>
    <h1>Admin Dashboard</h1>
</header>

<div class="container">
    <div class="welcome">
        Welcome, Admin! Use the links below to manage cars.
    </div>

    <div class="nav">
        <a href="addcar.php">Add Car</a>
        <a href="viewcar.php">View Cars</a>
        <a href="logout.php">Logout</a>
    </div>

    <h2>Dashboard Overview</h2>
    <p style="text-align:center;">You can add, view, edit, and delete cars using the links above.</p>
</div>

</body>
</html>
