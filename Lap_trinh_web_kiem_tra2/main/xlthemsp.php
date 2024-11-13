<?php
include("connect.inp");

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Lấy dữ liệu từ form
    $mahang = $_POST['mahang'];
    $tenhang = $_POST['tenhang'];
    $giahang = $_POST['giahang'];
    $hinhanh = $_FILES['hinhanh']['name'];

    // Kiểm tra và di chuyển hình ảnh lên thư mục mong muốn
    $targetDir = "Image/"; // Thư mục lưu trữ hình ảnh
    $targetFile = $targetDir . basename($hinhanh);
    $imageFileType = strtolower(pathinfo($targetFile, PATHINFO_EXTENSION));

    if (move_uploaded_file($_FILES['hinhanh']['tmp_name'], $targetFile)) {
        // Thực thi câu lệnh SQL để thêm sản phẩm vào cơ sở dữ liệu
        $sql = "INSERT INTO sanpham (mahang, tenhang, giahang, hinhanh) VALUES (?, ?, ?, ?)";
        if ($stmt = $con->prepare($sql)) {
            $stmt->bind_param("ssis", $mahang, $tenhang, $giahang, $hinhanh);

            if ($stmt->execute()) {
                header("Location: giaodien.php");
                exit();
            } else {
                echo "Lỗi khi thêm sản phẩm: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Lỗi chuẩn bị câu lệnh SQL: " . $con->error;
        }
    } else {
        echo "Lỗi khi tải lên hình ảnh.";
    }

    // Đóng kết nối
    $con->close();
}
?>