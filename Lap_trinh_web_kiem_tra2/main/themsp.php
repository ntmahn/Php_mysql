<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
</head>
<body>
    <div class="form-container">
        <h2>Thêm Sản Phẩm</h2>
        <form action="xlthemsp.php" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="mahang">Mã Hàng</label>
                <input type="text" id="mahang" name="mahang" required>
            </div>
            <div class="form-group">
                <label for="tenhang">Tên Hàng</label>
                <input type="text" id="tenhang" name="tenhang" required>
            </div>
            <div class="form-group">
                <label for="giahang">Giá</label>
                <input type="number" id="giahang" name="giahang" required>
            </div>
            <div class="form-group">
                <label for="diachi">Địa chỉ</label>
                <input type="text" id="diachi" name="diachi" required>
            </div>
            <div class="form-group">
                <label for="hinhanh">Hình Ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" accept="Image/*" required>
            </div>
            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>
</body>
</html>
