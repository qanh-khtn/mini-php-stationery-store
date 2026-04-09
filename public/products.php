<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalProducts = count($products); // Tổng số loại mặt hàng
$totalQuantity = getTotalQuantity($products); // Tổng số lượng tồn kho
$availableProducts = getAvailableProducts($products);
$availableCount = count($availableProducts); // Số mặt hàng còn bán
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Stationery Products</title>
</head>
<body>
    <h1>Stationery Store Inventory</h1>
    
    <h2>Statistics Overview</h2>
    <ul>
        <li>Total product types: <?php echo $totalProducts; ?></li>
        <li>Total inventory quantity: <?php echo $totalQuantity; ?></li>
        <li>Available products: <?php echo $availableCount; ?></li>
    </ul>

    <h2>Product List</h2>
    <?php foreach ($products as $product): ?>
        <div style="margin-bottom: 16px; padding: 10px; border: 1px solid #ccc; border-radius: 5px;">
            <p><strong>Name:</strong> <?php echo formatProductName($product['name']); ?></p>
            <p><strong>Brand:</strong> <?php echo $product['brand']; ?></p>
            <p><strong>Category:</strong> <?php echo $product['category']; ?></p>
            <p><strong>Price:</strong> <?php echo number_format($product['price'], 0, ',', '.'); ?> VND</p>
            <p><strong>Quantity:</strong> <?php echo $product['quantity']; ?></p>
            <p><strong>Status:</strong> <?php echo getStockStatus($product['quantity']); ?></p>
        </div>
    <?php endforeach; ?>
</body>
</html>