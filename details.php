<?php 
include("C:/xampp/htdocs/homelab/connection.php");
?>

<h2>Product Inventory</h2>
<a href="entry.php">Add New Product</a>
<table border="1" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Category</th>
        <th>Price</th>
        <th>Quantity</th>
        <th>Status</th>
        <th>Actions</th>
    </tr>

<?php
$query = $pdo->query("SELECT * FROM inventory");
while ($row = $query->fetch(PDO::FETCH_ASSOC)) {
    $status = ($row['quantity'] < 10) ? "<b style='color:red;'>Low Stock!</b>" : "Available";
    $name = urlencode($row['name']); 
    echo "<tr>
            <td>{$row['name']}</td>
            <td>{$row['category']}</td>
            <td>{$row['price']}</td>
            <td>{$row['quantity']}</td>
            <td>$status</td>
            <td>
                <a href='update.php?name=$name'>Edit</a> |
                <a href='query.php?delete=$name' onclick='return confirm(\"Are you sure?\")'>Delete</a>
            </td>
        </tr>";
}
?>
</table>
