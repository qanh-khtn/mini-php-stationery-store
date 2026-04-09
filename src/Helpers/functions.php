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

// Hàm này để gom các danh mục về 4 nhóm chính để lọc
function normalizeCategory(string $category): string
{
    if (str_contains($category, 'Bút') || str_contains($category, 'bút')) {
        return 'Bút';
    }

    if (str_contains($category, 'Sổ') || str_contains($category, 'sổ')) {
        return 'Sổ';
    }

    if (str_contains($category, 'Giấy') || str_contains($category, 'giấy')) {
        return 'Giấy';
    }

    return 'Dụng cụ';
}

function getStatusClass(string $status): string
{
    if ($status === 'Out of stock') {
        return 'status-out';
    }

    if ($status === 'Low stock') {
        return 'status-low';
    }

    return 'status-ok';
}