<?php
require 'db.php';
session_start(); 

if ($_SERVER["REQUEST_METHOD"] == "POST") {
   
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];

    $stmt = $pdo->prepare("INSERT INTO product (name, description, price, quantity, barcode) VALUES (?, ?, ?, ?, ?)");
    
    $stmt->execute([$name, $description, $price, $quantity, $barcode]);

    $_SESSION['message'] = "Product added successfully!";


    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Add Product</title>
</head>
<body>
    <h1>Add Product</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" required><br>

        <label>Description:</label><br>
        <textarea name="description"></textarea><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" required><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" required><br>

        <label>Barcode:</label><br>
        <input type="text" name="barcode"><br>
        <br>

        <button type="submit">Add Product</button>
    </form>
</body>
</html>
