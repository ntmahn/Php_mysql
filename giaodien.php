<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <title>Danh sách sản phẩm</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f8f9fa;
            color: #333;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        h2 {
            color: #007bff;
            margin-top: 20px;
        }

        #product-list {
            display: grid;
            grid-template-columns: repeat(5, 1fr);
            gap: 20px;
            margin: 20px auto;
            width: 90%;
        }

        .product {
            background-color: #fff;
            border: 1px solid #ddd;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            padding: 15px;
            text-align: center;
            transition: transform 0.2s;
        }

        .product:hover {
            transform: scale(1.05);
        }

        .product img {
            width: 100%;
            height: auto;
            border-radius: 4px;
        }

        .product-name {
            font-weight: bold;
            margin: 10px 0;
            font-size: 1.1em;
            color: #333;
        }

        .product-price {
            color: #28a745;
            font-weight: bold;
            margin-bottom: 10px;
        }

        .product button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            padding: 8px 16px;
            font-size: 0.9em;
        }

        .product button:hover {
            background-color: #0056b3;
        }

        #pagination {
            margin: 20px;
            display: flex;
            justify-content: center;
            gap: 5px;
        }

        #pagination button {
            background-color: #007bff;
            border: none;
            border-radius: 5px;
            color: white;
            cursor: pointer;
            padding: 8px 12px;
            font-size: 0.9em;
        }

        #pagination button.active {
            background-color: #0056b3;
            font-weight: bold;
        }
    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <h2>Danh sách sản phẩm</h2>
    <div id="product-list"></div>
    <div id="pagination"></div>

    <script>
        let currentPage = 1;
        const productsPerPage = 5;
        let products = [];

        function fetchProducts() {
            $.ajax({
                url: 'Lap_trinh_web/laydanhsachsanpham.php',
                method: 'GET',
                dataType: 'json',
                success: function (data) {
                    products = data;
                    renderProducts();
                    renderPagination();
                },
                error: function () {
                    alert("Lỗi khi tải danh sách sản phẩm.");
                }
            });
        }

        function renderProducts() {
            $('#product-list').empty();
            const start = (currentPage - 1) * productsPerPage;
            const end = start + productsPerPage;
            const productsToShow = products.slice(start, end);
            productsToShow.forEach(product => {
                $('#product-list').append(`
                    <div class="product">
                        <img src="images/${product.hinhanh}" alt="${product.tenhang}">
                        <div class="product-name">${product.tenhang}</div>
                        <div class="product-price">${product.giahang} VND</div>
                        <button>Hiển thị chi tiết</button>
                    </div>
                `);
            });
        }

        function renderPagination() {
            $('#pagination').empty();
            const totalPages = Math.ceil(products.length / productsPerPage);
            for (let i = 1; i <= totalPages; i++) {
                $('#pagination').append(`
                    <button onclick="goToPage(${i})" class="${i === currentPage ? 'active' : ''}">${i}</button>
                `);
            }
        }

        function goToPage(page) {
            currentPage = page;
            renderProducts();
            renderPagination();
        }

        $(document).ready(function () {
            fetchProducts();
        });
    </script>
</body>
</html>
