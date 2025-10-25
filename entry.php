<?php include("C:/xampp/htdocs/homelab/connection.php"); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Product</title>
</head>
<body>
    <h2>Add New Product</h2>
    <form action="query.php" method="POST">
        <label>Product Name:</label>
        <input type="text" name="product_name" required><br><br>

        <label>Category:</label>
        <input type="text" name="product_category" required><br><br>

        <label>Price:</label>
        <input type="number" step="0.01" name="product_price" required><br><br>

        <label>Quantity:</label>
        <input type="number" name="product_quantity" required><br><br>

        <input type="submit" name="save" value="Add Product">
    </form>
    <br>
    <a href="details.php">View Product Inventory</a>
</body>
</html>
