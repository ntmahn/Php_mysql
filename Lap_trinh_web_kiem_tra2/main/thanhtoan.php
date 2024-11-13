<?php
// Include PayPal SDK
require 'vendor/autoload.php'; // Đảm bảo bạn đã cài đặt SDK PayPal

// Thiết lập thông tin API client
$clientId = 'Adrj3_brb8_r96YcD8WbFHurO-b9QXhamJ2CO6pWyihZ1Ie2QxTrrCOOzjigXHa2LUaZ13YqMySye4JL'; // ClientID
$clientSecret = 'EKXRcAT1Zbsfw-mgKdcMXYficfJ-zo295h8BVkGWRPMBXZdmjgVr-XtwL3I3aBB_H9Vfg6GPpXgoQltp'; // ClientSecret

// Thiết lập PayPal API Context
$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential($clientId, $clientSecret)
);

// Lấy mã sản phẩm từ URL
$mahang = $_GET['mahang'];

// Kết nối cơ sở dữ liệu để lấy thông tin sản phẩm
include("connect.inp");
$sql = "SELECT * FROM sanpham WHERE mahang = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $mahang);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $product = $result->fetch_assoc();
    $productName = $product['tenhang'];
    $productPrice = $product['giahang'];
} else {
    echo "Sản phẩm không tồn tại.";
    exit;
}

// Chuyển đổi giá trị sản phẩm sang định dạng USD (hoặc sử dụng VND nếu cần)
$amount = number_format($productPrice, 2, '.', '');

// Tạo đối tượng thanh toán (Payment) của PayPal
$payment = new \PayPal\Api\Payment();
$payment->setIntent('sale')
    ->setPayer(new \PayPal\Api\Payer([
        'payment_method' => 'paypal'
    ]))
    ->setTransactions([new \PayPal\Api\Transaction([
        'amount' => new \PayPal\Api\Amount([
            'currency' => 'USD',
            'total' => $amount
        ]),
        'description' => $productName
    ])])
    ->setRedirectUrls(new \PayPal\Api\RedirectUrls([
        'return_url' => 'http://localhost/Php_mysql/Lap_trinh_web_kiem_tra2/main/thanhtoan_callback.php?payment_status=success',
        'cancel_url' => 'http://localhost/Php_mysql/Lap_trinh_web_kiem_tra2/main/thanhtoan_callback.php?payment_status=cancel'
    ]));

// Gửi yêu cầu thanh toán đến PayPal
try {
    $payment->create($apiContext);
    $approvalUrl = $payment->getApprovalLink(); // Link cho phép người dùng thanh toán
    header("Location: $approvalUrl");
    exit;
} catch (Exception $e) {
    echo "Lỗi khi tạo thanh toán: " . $e->getMessage();
    exit;
}
?>

