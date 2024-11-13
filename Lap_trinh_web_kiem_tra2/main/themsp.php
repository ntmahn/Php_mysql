<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Thêm Sản Phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h2 {
            text-align: center;
            color: #007bff;
        }

        .form-group {
            margin-bottom: 15px;
        }

        label {
            display: block;
            font-weight: bold;
            margin-bottom: 5px;
        }

        input[type="text"],
        input[type="number"],
        input[type="file"] {
            width: 100%;
            padding: 8px;
            border-radius: 5px;
            border: 1px solid #ddd;
        }

        button {
            width: 100%;
            background-color: #007bff;
            color: white;
            padding: 10px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }

        button:hover {
            background-color: #0056b3;
        }
    </style>
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
                <label for="hinhanh">Hình Ảnh</label>
                <input type="file" id="hinhanh" name="hinhanh" accept="Image/*" required>
            </div>
            <button type="submit">Thêm Sản Phẩm</button>
        </form>
    </div>
</body>
</html>
