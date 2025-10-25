<?php
include("C:/xampp/htdocs/homelab/connection.php");

if (!isset($_GET['name'])) {
    header("Location: details.php");
    exit;
}

$name = $_GET['name'];
$stmt = $pdo->prepare("SELECT * FROM inventory WHERE name=?");
$stmt->execute([$name]);
$product = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$product) {
    die("Product not found!");
}
?>

<h2>Update Product</h2>
<form action="query.php" method="POST">
    <input type="hidden" name="product_name" value="<?php echo htmlspecialchars($product['name']); ?>">

    <label>Category:</label>
    <input type="text" name="product_category" value="<?php echo htmlspecialchars($product['category']); ?>" required><br><br>

    <label>Price:</label>
    <input type="number" step="0.01" name="product_price" value="<?php echo $product['price']; ?>" required><br><br>

    <label>Quantity:</label>
    <input type="number" name="product_quantity" value="<?php echo $product['quantity']; ?>" required><br><br>

    <button type="submit" name="update">Save Changes</button>
</form>
<br>
<a href="details.php">Back to Inventory</a>
