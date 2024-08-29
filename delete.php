<?php
require 'db.php';
session_start(); 

$id = $_GET['id'];
$stmt = $pdo->prepare("DELETE FROM product WHERE id = ?");
$stmt->execute([$id]);

$_SESSION['message'] = "Product deleted successfully!";

header("Location: index.php");
exit();
