<?php
$products = require __DIR__ . '/../src/Data/products.php';
require __DIR__ . '/../src/Helpers/functions.php';

// Lấy dữ liệu từ URL
$searchKeyword = trim((string) ($_GET['search'] ?? ''));
$selectedCategory = trim((string) ($_GET['category'] ?? ''));

// Cố định các danh mục
$categories = ['Bút', 'Sổ', 'Giấy', 'Dụng cụ'];

// Thực hiện xử lý lọc và tìm kiếm bằng array_filter
$filteredProducts = array_filter($products, function ($product) use ($searchKeyword, $selectedCategory) {
    $matchSearch = true;
    $matchCategory = true;

    // Lọc theo tên (không phân biệt hoa thường)
    if ($searchKeyword !== '') {
        $matchSearch = stripos($product['name'], $searchKeyword) !== false;
    }

    // Lọc theo danh mục sau khi đưa về 4 nhóm
    if ($selectedCategory !== '') {
        $matchCategory = normalizeCategory($product['category']) === $selectedCategory;
    }

    return $matchSearch && $matchCategory;
});

$filteredProducts = array_values($filteredProducts);

// Sử dụng để thống kê
$totalProducts = count($products);
$totalQuantity = getTotalQuantity($products);
$availableCount = count(getAvailableProducts($products));
$filteredCount = count($filteredProducts);
?>

<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Stationery Products</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body class="products-page">
    <div class="container">
        <div class="header">
            <h1>Mini Stationery Store</h1>
            <a class="home-link" href="index.php">Trang chủ</a>
        </div>

        <ul class="stats">
            <li>
                <span class="label">Tổng số mặt hàng</span>
                <span class="value"><?php echo $totalProducts; ?></span>
            </li>
            <li>
                <span class="label">Tổng số lượng tồn kho</span>
                <span class="value"><?php echo $totalQuantity; ?></span>
            </li>
            <li>
                <span class="label">Đang còn bán</span>
                <span class="value"><?php echo $availableCount; ?></span>
            </li>
            <li>
                <span class="label">Kết quả hiển thị</span>
                <span class="value"><?php echo $filteredCount; ?></span>
            </li>
        </ul>

        <form class="filter-form" method="GET" action="products.php">
            <input type="text" name="search" placeholder="Tìm theo tên sản phẩm..." value="<?php echo htmlspecialchars($searchKeyword); ?>">

            <select name="category" onchange="this.form.submit()">
                <option value="">Tất cả danh mục</option>
                <?php foreach ($categories as $cat): ?>
                    <option value="<?php echo $cat; ?>" <?php echo ($selectedCategory === $cat) ? 'selected' : ''; ?>>
                        <?php echo $cat; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            
            <button type="submit">Tìm kiếm</button>
            <a href="products.php" class="btn-reset">Đặt lại</a>
        </form>

        <h2>Danh sách sản phẩm</h2>
        <div class="product-grid">
            <?php if (empty($filteredProducts)): ?>
                <p class="no-results">Không tìm thấy sản phẩm phù hợp với bộ lọc hiện tại.</p>
            <?php else: ?>
                <?php foreach ($filteredProducts as $product): ?>
                    <div class="product-card">
                        <?php
                            $status = getStockStatus($product['quantity']);
                            $statusClass = getStatusClass($status);
                            $statusText = [
                                'Out of stock' => 'Hết hàng',
                                'Low stock' => 'Sắp hết',
                                'Available' => 'Còn hàng'
                            ][$status] ?? $status;
                            $normalizedCategory = normalizeCategory($product['category']);
                        ?>
                        <div class="product-header">
                            <p class="product-title"><?php echo formatProductName($product['name']); ?></p>
                            <span class="chip"><?php echo $normalizedCategory; ?></span>
                        </div>
                        <p class="product-meta">Thương hiệu: <?php echo $product['brand']; ?></p>
                        <p class="product-meta">Danh mục gốc: <?php echo $product['category']; ?></p>
                        <p class="product-meta">Tồn kho: <?php echo $product['quantity']; ?> sản phẩm</p>
                        <p class="price"><?php echo number_format($product['price'], 0, ',', '.'); ?> VND</p>
                        <p>
                            Trạng thái: 
                            <span class="status <?php echo $statusClass; ?>">
                                <?php echo $statusText; ?>
                            </span>
                        </p>
                    </div>
                <?php endforeach; ?>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>