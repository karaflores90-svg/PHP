<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

include 'db.php';

if (isset($_POST['add'])) {
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);

    mysqli_query($conn, "INSERT INTO cars (car_name, brand, price_per_day) VALUES ('$car_name', '$brand', '$price')");

    header("Location: viewcar.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Car - Admin</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; }
        .container { max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h2 { text-align:center; margin-bottom: 20px; }
        input[type=text], input[type=number] { width:100%; padding:12px; margin:8px 0 20px; border:1px solid #ccc; border-radius:5px; }
        button { width:100%; padding:12px; background:#4CAF50; border:none; color:white; border-radius:5px; font-size:16px; cursor:pointer; }
        button:hover { background:#45a049; }
        a { display:block; text-align:center; margin-top:15px; color:#4CAF50; text-decoration:none; }
        a:hover { text-decoration:underline; }
    </style>
</head>
<body>
<div class="container">
    <h2>Add Car</h2>
    <form method="post">
        <input type="text" name="car_name" placeholder="Car Name" required>
        <input type="text" name="brand" placeholder="Brand" required>
        <input type="number" step="0.01" name="price" placeholder="Price per Day" required>
        <button name="add" type="submit">Add Car</button>
    </form>
    <a href="dashboard.php">Back to Dashboard</a>
</div>
</body>
</html>
