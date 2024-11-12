<?php

header("Content-Type: application/json");
include("connect.inp");

if (!$con) {
    echo json_encode(["error" => "Kết nối cơ sở dữ liệu thất bại"]);
    exit;
}

$danhsach = [];

if (isset($_GET['mahang'])) {
    $mahang = $_GET['mahang'];
    $stmt = $con->prepare("SELECT * FROM sanpham WHERE mahang = ?");
    $stmt->bind_param("s", $mahang);
} else {
    $stmt = $con->prepare("SELECT * FROM sanpham");
}

$stmt->execute();
$result = $stmt->get_result();

if ($result && $result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $danhsach[] = [
            'mahang' => $row['mahang'],
            'tenhang' => $row['tenhang'], // e.g., "Du an Chung cu Mat troi"
            'giahang' => $row['giahang'], // e.g., "1000000 VND"
            'diachi' => $row['diachi'],   // cot dia chi san pham bds
            'hinhanh' => $row['hinhanh'],
            'mota' => $row['mota']        // cot mo ta san pham bds
        ];
    }
}

echo json_encode($danhsach);
$con->close();
?>




