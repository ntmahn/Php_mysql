<?php
header("Content-Type: application/json");
include("connect.inp");

$masp = $_GET["mahang"];
$sql = "SELECT * FROM sanpham WHERE mahang='$masp'";
$result = $con->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    echo json_encode($row);
} else {
    echo json_encode(["Không tìm thấy sản phẩm"]);
}
$con->close();
?>