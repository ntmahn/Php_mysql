<?php

if (isset($_GET['payment_status'])) {
    $status = $_GET['payment_status'];
    if ($status == 'success') {
        // Thanh toán thành công
        echo "<script>alert('Thanh toán thành công! Cảm ơn quý khách!');</script>";
    } elseif ($status == 'cancel') {
        // Thanh toán bị hủy
        echo "<script>alert('Thanh toán bị hủy.');</script>";
    } else {
        // Lỗi thanh toán
        echo "<script>alert('Đã xảy ra lỗi khi thanh toán.');</script>";
    }

    
    echo "<script>setTimeout(function() {
        window.location.href = 'index.php';
    }, 3000);</script>";
}
?>

<!-- Nội dung trang web -->
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thanh toán</title>
    <style>
        /* CSS cho thông báo */
        .alert {
            padding: 15px;
            margin: 20px;
            background-color: #f44336; /* Màu đỏ cho thông báo lỗi */
            color: white;
            border-radius: 5px;
            display: none;
        }
        .alert.success {
            background-color: #4CAF50; /* Màu xanh cho thông báo thành công */
        }
        .alert.cancel {
            background-color: #ff9800; /* Màu cam cho thông báo hủy */
        }
    </style>
</head>
<body>
    <h2>Trang Thanh toán</h2>
    
    <!-- Hiển thị thông báo thanh toán -->
    <div id="payment-status" class="alert">
       
    </div>

    <script>
        
        <?php if (isset($_GET['payment_status'])): ?>
            var status = "<?php echo $_GET['payment_status']; ?>";
            var message = "";
            var alertClass = "";

            if (status === 'success') {
                message = "Thanh toán thành công!";
                alertClass = "success";
            } else if (status === 'cancel') {
                message = "Thanh toán bị hủy.";
                alertClass = "cancel";
            } else {
                message = "Đã xảy ra lỗi khi thanh toán.";
                alertClass = "error";
            }

            document.getElementById('payment-status').innerHTML = message;
            document.getElementById('payment-status').classList.add(alertClass);
            document.getElementById('payment-status').style.display = "block";
        <?php endif; ?>
    </script>
</body>
</html>
