<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

$totalProducts = count($products);
$totalQuantity = getTotalQuantity($products);
$availableCount = count(getAvailableProducts($products));
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini Stationery Store</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="home-page">
    <main class="hero">
        <p class="eyebrow">PHP Website App - Lab 01</p>
        <h1>Mini Stationery Store</h1>
        <p class="lead">
            Trang web về ứng dụng quản lý dữ liệu văn phòng phẩm với danh sách sản phẩm, 
            có làm thêm bộ lọc để tìm kiếm, phân loại trạng thái tồn kho và 
            có thống kê tổng quan các mặt hàng.
        </p>

        <div class="actions">
            <a class="btn btn-primary" href="products.php">
                Mở trang danh sách dữ liệu
            </a>
            <a class="btn btn-ghost" 
                href="https://github.com/qanh-khtn/mini-php-stationery-store" 
                target="_blank" 
                rel="noopener noreferrer"
                style="display: inline-flex; align-items: center; gap: 6px;">
                
                <!-- Thêm icon Github -->
                <svg height="20" width="20" viewBox="0 0 16 16" fill="currentColor">
                    <path d="M8 0C3.58 0 0 3.58 0 8c0 3.54 2.29 6.53 5.47 7.59.4.07.55-.17.55-.38 0-.19-.01-.82-.01-1.49-2.01.37-2.53-.49-2.69-.94-.09-.23-.48-.94-.82-1.13-.28-.15-.68-.52-.01-.53.63-.01 1.08.58 1.23.82.72 1.21 1.87.87 2.33.66.07-.52.28-.87.51-1.07-1.78-.2-3.64-.89-3.64-3.95 0-.87.31-1.59.82-2.15-.08-.2-.36-1.02.08-2.12 0 0 .67-.21 2.2.82.64-.18 1.32-.27 2-.27.68 0 1.36.09 2 .27 1.53-1.04 2.2-.82 2.2-.82.44 1.1.16 1.92.08 2.12.51.56.82 1.27.82 2.15 0 3.07-1.87 3.75-3.65 3.95.29.25.54.73.54 1.48 0 1.07-.01 1.93-.01 2.2 0 .21.15.46.55.38A8.013 8.013 0 0016 8c0-4.42-3.58-8-8-8z"></path>
                </svg>
                GitHub
            </a>
        </div>

        <ul class="stats">
            <li>
                <span class="label">Tổng số mặt hàng</span>
                <span class="value"><?php echo $totalProducts; ?></span>
            </li>
            <li>
                <span class="label">Tổng tồn kho</span>
                <span class="value"><?php echo $totalQuantity; ?></span>
            </li>
            <li>
                <span class="label">Mặt hàng đang còn bán</span>
                <span class="value"><?php echo $availableCount; ?></span>
            </li>
        </ul>
    </main>
</body>
</html>

