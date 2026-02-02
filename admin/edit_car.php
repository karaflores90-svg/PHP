<?php
session_start();
if (!isset($_SESSION['role']) || $_SESSION['role'] != 'admin') {
    header("Location: ../login.php");
    exit();
}

include '../db.php';

$id = $_GET['id'];
$car_query = mysqli_query($conn, "SELECT * FROM cars WHERE car_id=$id");
$car = mysqli_fetch_assoc($car_query);

if (isset($_POST['update'])) {
    $car_name = mysqli_real_escape_string($conn, $_POST['car_name']);
    $brand = mysqli_real_escape_string($conn, $_POST['brand']);
    $price = mysqli_real_escape_string($conn, $_POST['price']);
    $status = $_POST['status'];

    mysqli_query($conn, "UPDATE cars SET car_name='$car_name', brand='$brand', price_per_day='$price', status='$status' WHERE car_id=$id");
    header("Location: view_cars.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Car - Admin</title>
    <style>
        body { font-family: Arial; background: #f0f2f5; }
        .container { max-width: 500px; margin: 50px auto; background: #fff; padding: 30px; border-radius: 10px; box-shadow: 0 0 15px rgba(0,0,0,0.1); }
        h2 { text-align:center; margin-bottom: 20px; }
        input[type=text], input[type=number], select { width:100%; padding:12px; margin:8px 0 20px; border:1px solid #ccc; border-radius:5px; }
        button { width:100%; padding:12px; background:#4CAF50; border:none; color:white; border-radius:5px; font-size:16px; cursor:pointer; }
        button:hover { background:#45a049; }
        a { display:block; text-align:center; margin-top:15px; color:#4CAF50; text-decoration:none; }
        a:hover { text-decoration:underline; }
    </style>
</head>
<body>
<div class="container">
    <h2>Edit Car</h2>
    <form method="post">
        <input type="text" name="car_name" value="<?= $car['car_name'] ?>" required>
        <input type="text" name="brand" value="<?= $car['brand'] ?>" required>
        <input type="number" step="0.01" name="price" value="<?= $car['price_per_day'] ?>" required>
        <select name="status" required>
            <option value="Available" <?= $car['status']=="Available"?"selected":"" ?>>Available</option>
            <option value="Rented" <?= $car['status']=="Rented"?"selected":"" ?>>Rented</option>
        </select>
        <button name="update" type="submit">Update Car</button>
    </form>
    <a href="view_cars.php">Back to Car List</a>
</div>
</body>
</html>
