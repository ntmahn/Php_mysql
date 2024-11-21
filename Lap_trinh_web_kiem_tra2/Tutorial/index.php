<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Giao Diện Chính</title>
    <script>
        function loadPayment(mahang) {
            const xhr = new XMLHttpRequest();
            xhr.open("POST", "thanhtoan.php", true);
            xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhr.onload = function () {
                if (xhr.status === 200) {
                    document.getElementById("payment-section").innerHTML = xhr.responseText;
                } else {
                    console.error("Lỗi khi tải thanh toán");
                }
            };
            xhr.send("mahang=" + mahang);
        }
    </script>
</head>
<body>
    <h1>Chào Mừng Đến Trang Thanh Toán</h1>

    <h2>Danh Sách Sản Phẩm</h2>
    <div id="product-list">
        <?php
        // Kết nối danh sách sản phẩm từ file `laydanhsachsanpham.php`
        include("laydanhsachsanpham.php");
        ?>
    </div>

    <div id="product-details">
        <!-- Hiển thị chi tiết sản phẩm -->
        <?php
        // Kiểm tra nếu người dùng yêu cầu chi tiết sản phẩm
        if (isset($_GET['action']) && $_GET['action'] === 'details' && isset($_GET['mahang'])) {
            include("laychitietsanpham.php");
        }
        ?>
    </div>

    <div id="payment-section">
        <!-- Nội dung thanh toán sẽ được tải vào đây -->
        <?php
        // Khi nhấn nút Mua Ngay, gọi giao diện thanh toán
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['mahang'])) {
            include("thanhtoan.php"); // Chèn mã xử lý thanh toán tại đây
        }
        ?>
    </div>

    <div id="payment-callback">
        <!-- Xử lý callback từ PayPal -->
        <?php
        if (isset($_GET['payment_status'])) {
            include("thanhtoan_callback.php");
        }
        ?>
    </div>
</body>
</html>
