<?php
// Hàm sử dụng để phân loại trạng thái kho
function getStockStatus(int $quantity): string
{
    if ($quantity <= 0) {
        return 'Out of stock'; // Hết hàng
    } elseif ($quantity <= 10) {
        return 'Low stock'; // Sắp hết 
    }
    return 'Available'; // Còn hàng
}

// Hàm để định dạng tên sản phẩm - In hoa chữ cái đầu mỗi từ
function formatProductName(string $name): string
{
    return ucwords(strtolower($name));
}

// Hàm tính tổng số lượng hàng có trong kho
function getTotalQuantity(array $products): int
{
    return array_reduce($products, function ($carry, $product) {
        return $carry + $product['quantity'];
    }, 0);
}

// Hàm lọc ra các mặt hàng còn bán được
function getAvailableProducts(array $products): array
{
    return array_values(array_filter($products, function ($product) {
        return $product['quantity'] > 0;
    }));
}