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

    /* CSS cho phần hiển thị chi tiết sp */
    #product-detail-modal {
    position: fixed;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0, 0, 0, 0.5);
    display: flex;
    align-items: center;
    justify-content: center;
}

#product-detail-content {
    background-color: #fff;
    padding: 20px;
    border-radius: 8px;
    max-width: 500px;
    width: 90%;
    text-align: center;
    position: relative;
}

#close-modal {
    position: absolute;
    top: 10px;
    right: 10px;
    font-size: 1.5em;
    color: #333;
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
                url: 'laydanhsachsanpham.php',
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
                        <div class="product-address">${product.diachi}</div>
                        <div class="product-price">${product.giahang} VND</div>
                        <button onclick="showProductDetails('${product.mahang}')">Xem chi tiết</button>
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

       // Hiển thị chi tiết sản phẩm trong popup
       let currentProductID; // Biến để lưu mã sản phẩm hiện tại

function showProductDetails(mahang) {
    $.ajax({
        url: 'laydanhsachsanpham.php',
        method: 'GET',
        dataType: 'json',
        data: { mahang: mahang }, // Gửi mã hàng để lấy chi tiết
        success: function (data) {
            const product = data[0]; // Giả sử dữ liệu trả về là mảng chứa một sản phẩm
            $('#product-detail-info').html(`
                <img src="images/${product.hinhanh}" alt="${product.tenhang}" style="width: 100%; height: auto;">
                <h3>${product.tenhang}</h3>
                <p>Giá: ${product.giahang} VND</p>
                <p>Mã hàng: ${product.mahang}</p>
            `);
            currentProductID = mahang; // Lưu mã sản phẩm hiện tại
            $('#product-detail-modal').show(); // Hiển thị modal
        },
        error: function () {
            alert("Lỗi khi tải chi tiết sản phẩm.");
        }
    });
}

$(document).ready(function () {
    fetchProducts();

    // Đóng modal khi nhấn vào nút "x"
    $('#close-modal').click(function () {
        $('#product-detail-modal').hide();
    });

    // Sự kiện khi nhấn vào nút "Thanh toán"
    $('#payment-button').click(function () {
        // Điều hướng đến trang thanhtoan.php với mã sản phẩm
        window.location.href = `thanhtoan.php?mahang=${currentProductID}`;
    });
});
    </script>

<!--Hiện thị chi tiết sản phẩm-->
<div id="product-detail-modal" style="display: none;">
    <div id="product-detail-content">
        <span id="close-modal" style="cursor: pointer;">&times;</span>
        <div id="product-detail-info"></div>
        <!-- Thêm nút "Thanh toán" -->
        <button id="payment-button" style="background-color: #28a745; color: white; padding: 10px 20px; margin-top: 10px; border: none; border-radius: 5px; cursor: pointer;">
            Thanh toán
        </button>
    </div>
</div>


</body>
</html>


