<?php
require 'db.php';
session_start();

$query = $pdo->query("SELECT * FROM product");
$products = $query->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Products</title>
</head>
<body>
    <h1>Products</h1>

    <?php if (isset($_SESSION['message'])): ?>
        <p style="color: green;"><?= $_SESSION['message']; ?></p>
        <?php unset($_SESSION['message']);  ?>
    <?php endif; ?>
    
    <a href="create.php">Add New Product</a>
    <br><br>
    <table border=".5" cellpadding="0" cellspacing="0" style="width: 65%;">
        <thead>
            <tr>
                <th>ID</th>
                <th>Name</th>
                <th>Description</th>
                <th>Price</th>
                <th>Quantity</th>
                <th>Barcode</th>
                <th>Created At</th>
                <th>Updated At</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?= $product['id']; ?></td>
                    <td><?= $product['name']; ?></td>
                    <td><?= $product['description']; ?></td>
                    <td><?= $product['price']; ?></td>
                    <td><?= $product['quantity']; ?></td>
                    <td><?= $product['barcode']; ?></td>
                    <td><?= $product['created_at']; ?></td>
                    <td><?= $product['updated_at']; ?></td>
                    <td>
                        <a href="edit.php?id=<?= $product['id']; ?>">Edit</a> | 
                        <a href="delete.php?id=<?= $product['id']; ?>" onclick="return confirm('Are you sure?')">Delete</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <br><br>
</body>
</html>
