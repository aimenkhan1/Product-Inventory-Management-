<?php
include("C:/xampp/htdocs/homelab/connection.php");

// INSERT new product
if (isset($_POST['save'])) {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];

    $stmt = $pdo->prepare("INSERT INTO inventory (name, category, price, quantity) VALUES (?, ?, ?, ?)");
    $stmt->execute([$name, $category, $price, $quantity]);

    header("Location: details.php");
    exit;
}

// UPDATE existing product
if (isset($_POST['update'])) {
    $name = $_POST['product_name'];
    $category = $_POST['product_category'];
    $price = $_POST['product_price'];
    $quantity = $_POST['product_quantity'];

    $stmt = $pdo->prepare("UPDATE inventory SET category=?, price=?, quantity=? WHERE name=?");
    $stmt->execute([$category, $price, $quantity, $name]);

    header("Location: details.php");
    exit;
}

// DELETE product
if (isset($_GET['delete'])) {
    $name = $_GET['delete'];
    $stmt = $pdo->prepare("DELETE FROM inventory WHERE name=?");
    $stmt->execute([$name]);

    header("Location: details.php");
    exit;
}
?>
