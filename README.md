# Mini Stationery Store App

Ứng dụng web mini bằng Core PHP để quản lý dữ liệu văn phòng phẩm. Bài thực hành này tập trung vào các chức năng nền tảng gồm hiển thị danh sách, tìm kiếm, lọc danh mục, phân loại trạng thái tồn kho và thống kê tổng quan.

## 1. Mục tiêu bài thực hành

- Tổ chức dự án PHP theo từng thư mục một cách rõ ràng.
- Làm việc với dữ liệu mẫu bằng mảng trong PHP.
- Tách logic xử lý sang helper functions.
- Xây dựng giao diện trang chủ và trang danh sách dữ liệu.
- Quản lý mã nguồn bằng Git và đưa mã nguồn lên GitHub.

## 2. Các tính năng chính

- Trang chủ hiển thị thông tin tổng quan.

- Trang danh sách sản phẩm có thể tìm kiếm theo tên.

- Lọc theo danh mục: ***Bút, Sổ, Giấy, Dụng cụ***.

- Tự động lọc khi người dùng đổi danh mục.

- Phân loại trạng thái tồn kho theo điều kiện:
    - 🔴 Out of stock: số lượng = 0.
    - 🟠 Low stock: 0 < số lượng <= 10.
    - 🟢 Available: số lượng > 10.

- Khu vực thống kê tổng quan:
    - Tổng số mặt hàng
    - Tổng số lượng tồn kho
    - Số mặt hàng đang còn bán
    - Số kết quả hiển thị sau lọc

## 3. Cấu trúc thư mục

```text
php-stationery-store/
├── public/
│   ├── index.php          # Trang chủ
│   ├── products.php       # Trang danh sách dữ liệu
│   └── css/
│       └── style.css      # CSS dùng chung cho các trang
├── src/
│   ├── Data/
│   │   └── products.php   # Dữ liệu mẫu bằng array PHP
│   └── Helpers/
│       └── functions.php  # Hàm xử lý thống kê, trạng thái, danh mục
├── views/
│   └── home.php           # File dùng cho việc tách view (chưa sử dụng)
├── composer.json
├── .gitignore
└── README.md
```

## 4. Luồng nghiệp vụ chính

1. Người dùng truy cập trang chủ để xem thông tin tổng quan ban đầu.

2. Người dùng mở trang danh sách sản phẩm.

3. Hệ thống tải dữ liệu từ src/Data/products.php.

4. Nếu người dùng nhập từ khóa, hệ thống tìm theo tên bằng stripos.

5. Nếu người dùng chọn danh mục, hệ thống chuẩn hóa danh mục và lọc bằng array_filter.

6. Hệ thống tính toán thống kê và hiển thị danh sách kết quả tương ứng.

7. Trạng thái từng sản phẩm được phân loại theo số lượng tồn kho.

## 5. Hướng dẫn cài đặt và chạy

### Yêu cầu môi trường

- PHP 8.0+
- Composer
- Git

### Clone project

```bash
git clone <repo-url>
cd php-stationery-store
```

### Chạy ứng dụng local

```bash
php -S localhost:8000 -t public
```

Truy cập:

- Trang chủ: http://localhost:8000
- Trang danh sách: http://localhost:8000/products.php

## 6. Ảnh chụp màn hình

```md
![Trang chủ](screenshots/home.png)
![Danh sách sản phẩm](screenshots/products.png)
![Lọc theo danh mục](screenshots/filter-category.png)
```

## 7. Hạn chế hiện tại

- Dữ liệu đang lưu bằng array PHP chưa dùng database.
- Chưa có chức năng thêm, sửa, xóa sản phẩm.
- Chưa có đăng nhập và phân quyền người dùng.

## 8. Hướng phát triển

- Kết nối database (MySQL + PDO).
- Bổ sung CRUD sản phẩm.
- Thêm đăng nhập, phân quyền theo vai trò.
- Bổ sung phân trang, sắp xếp và kiểm tra dữ liệu chặt chẽ hơn.

## 9. Tác giả

- Tên: Quang Anh
- MSSV: 22110014
- Môn học: Lập trình Web với PHP - MTH10337