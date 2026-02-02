<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'customer') {
    header("Location: ../login.php");
    exit();
}

include '../db.php';

// Get all available cars
$cars = mysqli_query($conn, "SELECT * FROM cars WHERE status='Available' ORDER BY car_id DESC");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Customer Dashboard - Car Rental</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; margin:0; padding:0; }

        /* Header */
        header {
            background-color: #4CAF50;
            color: white;
            padding: 20px;
            text-align: center;
        }

        header h1 {
            margin: 0;
        }

        /* Container */
        .container {
            max-width: 900px;
            margin: 50px auto 100px; /* bottom margin for footer */
            background: #fff;
            padding: 30px;
            border-radius: 10px;
            box-shadow: 0 0 15px rgba(0,0,0,0.1);
        }

        h2 { text-align:center; margin-bottom: 30px; }

        table { width:100%; border-collapse: collapse; }
        th, td { border:1px solid #ccc; padding:12px; text-align:center; }
        th { background:#4CAF50; color:white; }

        a { color:#4CAF50; text-decoration:none; }
        a:hover { text-decoration:underline; }

        .top-links { text-align:center; margin-bottom:20px; }
        .top-links a {
            margin:0 10px;
            padding:10px 20px;
            background:#4CAF50;
            color:white;
            border-radius:5px;
        }
        .top-links a:hover { background:#45a049; }

        /* Footer */
        footer {
            text-align: center;
            padding: 15px;
            background-color: #4CAF50;
            color: white;
            position: fixed;
            bottom: 0;
            width: 100%;
        }
    </style>
</head>
<body>

<!-- Header -->
<header>
    <h1>🚗 Car Rental System - Customer Panel</h1>
</header>

<div class="container">
    <h2>Available Cars</h2>
    <div class="top-links">
        
        <a href="../logout.php">Logout</a>
    </div>

    <table>
        <tr>
            <th>ID</th>
            <th>Car Name</th>
            <th>Brand</th>
            <th>Price/Day</th>
            <th>Status</th>
            <th>Action</th>
        </tr>
        <?php while($car = mysqli_fetch_assoc($cars)) { ?>
        <tr>
            <td><?= $car['car_id'] ?></td>
            <td><?= $car['car_name'] ?></td>
            <td><?= $car['brand'] ?></td>
            <td><?= $car['price_per_day'] ?></td>
            <td><?= $car['status'] ?></td>
            <td>
                <a href="rent_process.php?id=<?= $car['car_id'] ?>" onclick="return confirm('Rent this car?')">Rent</a>
            </td>
        </tr>
        <?php } ?>
    </table>
</div>

<!-- Footer -->
<footer>
    © 2026 Car Rental System
</footer>

</body>
</html>
