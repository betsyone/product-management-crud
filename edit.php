<?php
require 'db.php';
session_start();

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $stmt = $pdo->prepare("SELECT * FROM product WHERE id = ?");
    $stmt->execute([$id]);
    $product = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!$product) {
        header("Location: index.php");
        exit();
    }
}

// Handle for updating the product
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $description = $_POST['description'];
    $price = $_POST['price'];
    $quantity = $_POST['quantity'];
    $barcode = $_POST['barcode'];
    $stmt = $pdo->prepare("
        UPDATE product 
        SET name = ?, description = ?, price = ?, quantity = ?, barcode = ?, updated_at = NOW()
        WHERE id = ?
    ");
    $stmt->execute([$name, $description, $price, $quantity, $barcode, $id]);

    $_SESSION['message'] = "Product updated successfully!";

    header("Location: index.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>
    <form method="POST">
        <label>Name:</label><br>
        <input type="text" name="name" value="<?= htmlspecialchars($product['name']); ?>" required><br>

        <label>Description:</label><br>
        <textarea name="description"><?= htmlspecialchars($product['description']); ?></textarea><br>

        <label>Price:</label><br>
        <input type="number" step="0.01" name="price" value="<?= htmlspecialchars($product['price']); ?>" required><br>

        <label>Quantity:</label><br>
        <input type="number" name="quantity" value="<?= htmlspecialchars($product['quantity']); ?>" required><br>

        <label>Barcode:</label><br>
        <input type="text" name="barcode" value="<?= htmlspecialchars($product['barcode']); ?>"><br>

        <br>
        <button type="submit">Update Product</button>
    </form>
</body>
</html>
