<?php
// Kết nối cơ sở dữ liệu
include("connect.inp");

// Lấy mã sản phẩm từ POST
if (!isset($_POST['mahang'])) {
    echo "Mã sản phẩm không hợp lệ.";
    exit;
}

$mahang = $_POST['mahang'];

// Truy vấn sản phẩm
$sql = "SELECT * FROM sanpham WHERE mahang = ?";
$stmt = $con->prepare($sql);
$stmt->bind_param("s", $mahang);
$stmt->execute();
$product = $stmt->get_result()->fetch_assoc();

if (!$product) {
    echo "Sản phẩm không tồn tại.";
    exit;
}

$productName = $product['tenhang'];
$productPrice = $product['giahang'];
$amount = number_format($productPrice, 2, '.', '');

// Thiết lập PayPal SDK
require 'vendor/autoload.php';
$clientId = 'Adrj3_brb8_r96YcD8WbFHurO-b9QXhamJ2CO6pWyihZ1Ie2QxTrrCOOzjigXHa2LUaZ13YqMySye4JL';
$clientSecret = 'EKXRcAT1Zbsfw-mgKdcMXYficfJ-zo295h8BVkGWRPMBXZdmjgVr-XtwL3I3aBB_H9Vfg6GPpXgoQltp';

$apiContext = new \PayPal\Rest\ApiContext(
    new \PayPal\Auth\OAuthTokenCredential($clientId, $clientSecret)
);

try {
    // Tạo thanh toán
    $payment = new \PayPal\Api\Payment();
    $payment->setIntent('sale')
        ->setPayer(new \PayPal\Api\Payer(['payment_method' => 'paypal']))
        ->setTransactions([new \PayPal\Api\Transaction([
            'amount' => new \PayPal\Api\Amount([
                'currency' => 'USD',
                'total' => $amount
            ]),
            'description' => $productName
        ])])
        ->setRedirectUrls(new \PayPal\Api\RedirectUrls([
            'return_url' => 'http://localhost/index.php?status=success',
            'cancel_url' => 'http://localhost/index.php?status=cancel'
        ]));

    $payment->create($apiContext);

    // Hiển thị nút thanh toán trên cùng giao diện
    echo "<h3>Chi Tiết Thanh Toán</h3>";
    echo "<p>Sản phẩm: $productName</p>";
    echo "<p>Giá: $amount USD</p>";
    echo "<a href='" . $payment->getApprovalLink() . "'>Thanh Toán Ngay</a>";

} catch (Exception $e) {
    echo "Lỗi khi tạo thanh toán: " . $e->getMessage();
    exit;
}
?>
