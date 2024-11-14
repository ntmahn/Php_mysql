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
            margin: 0;
            padding: 0;
        }

        h2 {
            color: black;
            margin-top: 20px;
        }

    
        .navbar {
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 20px;
            background-color: rgba(0, 0, 0, 0.5);
            color: white;
            margin: 0;
            position: fixed;
            top: 0;
            left: 0;
            right: 0;
            z-index: 1000;
        }

        .navbar .logo {
            margin-left: 40px;
        }

        .navbar .logo img {
            height: 40px;
            width: auto;
        }

        .navbar ul {
            display: flex;
            justify-content: center;
            margin: 0;
            padding: 0;
            list-style: none;
            flex-grow: 1;
            text-align: center;
        }

        .navbar ul li {
            margin: 0 20px;
        }

        .navbar ul li a {
            color: white;
            text-decoration: none;
            font-size: 1.1em;
            padding: 10px 15px;
            transition: background-color 0.3s ease;
        }

        
        .main-content {
            flex: 1; 
            width: 100%;
            max-width: 1200px; 
            margin: 0 auto;
            padding: 20px;
        }

        #product-list {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
            gap: 20px;
            margin: 20px 0;
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
            margin: 20px 0;
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
            z-index: 2000; 
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
            cursor: pointer;
        }

       
        .background-image {
            background-image: url('Image/background.jpg');
            background-size: cover;
            background-position: center;
            height: 500px;
            width: 100%;
            margin-top: 0px;
        }

        
        .footer {
            background-color: #1c1c1c;
            padding: 40px 20px;
            display: flex;
            flex-wrap: wrap; 
            justify-content: space-around;
            align-items: flex-start;
            color: #fff;
            width: 100%;
        }

        .footer .logo {
            flex: 1 1 200px; 
            margin-bottom: 20px;
        }

        .footer .logo img {
            height: 50px;
            margin-bottom: 10px;
        }

        .footer .logo div {
            margin-bottom: 10px;
        }

        .footer .social {
            display: flex;
            gap: 10px;
            margin-top: 10px;
        }

        .footer .social a {
            display: flex;
            align-items: center;
            justify-content: center;
            width: 30px;
            height: 30px;
            background-color: #444;
            border-radius: 50%;
            color: #fff;
            font-size: 18px;
            text-decoration: none;
        }

        .footer .section {
            flex: 1 1 150px; 
            margin-bottom: 20px;
        }

        .footer .section h3 {
            margin-bottom: 15px;
            font-size: 16px;
            font-weight: bold;
        }

        .footer .section a {
            text-decoration: none;
            color: #ccc;
            margin-bottom: 10px;
            font-size: 14px;
            display: block;
        }

        .footer .section a:hover {
            color: #fff;
        }

        
        @media (max-width: 768px) {
            #product-list {
                grid-template-columns: repeat(auto-fill, minmax(150px, 1fr));
            }

            .footer {
                flex-direction: column;
                align-items: center;
            }

            .footer .section {
                flex: 1 1 100%;
                text-align: center;
            }

            .footer .logo {
                text-align: center;
            }
        }
        .navbar.shrink {
    background-color: black;
    padding: 10px;
    transition: background-color 0.3s, padding 0.3s;
        }
        
    .footer-column.social-media a {
        display: block;
        margin-bottom: 5px; /* Khoảng cách giữa các icon */
        }
</style>

    </style>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>


<body>
    <!-- Navbar -->
    <div class="navbar">
        <a class="navbar-brand" href="giaodien.php">
            <img src="Image/logo.png" width="90px" height="90px" alt="logo">
        </a>
        <ul>
            <li><a href="#">Trang Chủ</a></li>
            <li><a href="giaodien.php">Sản phẩm</a></li>
            <li><a href="#">Giới Thiệu</a></li>
            <li><a href="#">Liên Hệ</a></li>
            <li><a href="#">Tuyển dụng</a></li>
        </ul>
    </div>
    <div class="background-image"></div>

    <!-- Main Content -->
    <div class="main-content">
        <h2>Danh sách sản phẩm</h2>
        <div id="product-list"></div>
        <div id="pagination"></div>
    </div>

    <!-- Modal hiển thị chi tiết sản phẩm -->
    <div id="product-detail-modal" style="display: none;">
        <div id="product-detail-content">
            <span id="close-modal">&times;</span>
            <div id="product-detail-info"></div>
            <button id="payment-button">Thanh toán</button>
        </div>
    </div>

    <!-- Footer -->
    <footer class="footer">
        <div class="section">
            <div class="footer-column social-media">
				<h4>Theo dõi</h4>
				<a href="#"><img src="facebook-icon.png" alt="Facebook"></a>
				<a href="#"><img src="youtube-icon.png" alt="YouTube"></a>x
				<a href="#"><img src="tiktok-icon.png" alt="TikTok"></a>
		    </div>
        </div>
        <div class="section">
            <h3>Về XTTMD Group</h3>
            <a href="#">Trang chủ</a>
            <a href="#">Giới thiệu tập đoàn</a>
            <a href="#">Tin tức & sự kiện</a>
            <a href="#">Thư viện</a>
        </div>
        <div class="section">
            <h3>Thông tin khác</h3>
            <a href="#">Đối tác</a>
            <a href="#">Tuyển dụng</a>
            <a href="#">Liên hệ</a>
        </div>
        <div class="section">
            <h3>Điều khoản</h3>
            <a href="#">Chính sách bảo mật</a>
            <a href="#">Điều khoản sử dụng</a>
            <a href="#">Bản quyền</a>
        </div>
    </footer>

    
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
                        <img src="Image/${product.hinhanh}" alt="${product.tenhang}">
                        <div class="product-name">${product.tenhang}</div>
                        <div class="product-address"></div>
                        <div class="product-price">${product.giahang} USD</div>
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
    // Lưu lại vị trí cuộn hiện tại
    const scrollPosition = window.scrollY;
    
    currentPage = page;
    renderProducts();
    renderPagination();
    
    // Áp dụng lại vị trí cuộn sau khi render lại sản phẩm
    window.scrollTo({ top: scrollPosition, behavior: 'smooth' });
}

        $(document).ready(function () {
            fetchProducts();
        });

        // Hiển thị chi tiết sản phẩm trong popup
        let currentProductID;

        function showProductDetails(mahang) {
            $.ajax({
                url: 'laydanhsachsanpham.php',
                method: 'GET',
                dataType: 'json',
                data: { mahang: mahang },
                success: function (data) {
                    if (data.length > 0) {
                        const product = data[0];
                        $('#product-detail-info').html(`
                            <img src="Image/${product.hinhanh}" alt="${product.tenhang}" style="width: 100%; height: auto;">
                            <h3>${product.tenhang}</h3>
                            <p>Giá: ${product.giahang} VND</p>
                            <p>Mã hàng: ${product.mahang}</p>
                            <p>Địa chỉ: ${product.diachi}</p>
                        `);
                        currentProductID = mahang;
                        $('#product-detail-modal').fadeIn();
                    } else {
                        alert("Sản phẩm không tồn tại.");
                    }
                },
                error: function () {
                    alert("Lỗi khi tải chi tiết sản phẩm.");
                }
            });
        }

        // Đóng modal khi nhấn vào nút "x"
        $('#close-modal').click(function () {
            $('#product-detail-modal').fadeOut();
        });

        // Thanh toán
        $('#payment-button').click(function () {
            if (currentProductID) {
                window.location.href = `thanhtoan.php?mahang=${currentProductID}`;
            } else {
                alert("Không tìm thấy sản phẩm để thanh toán.");
            }
        });

        // Đóng modal khi nhấn ngoài nội dung modal
        $(window).click(function(event) {
            if ($(event.target).is('#product-detail-modal')) {
                $('#product-detail-modal').fadeOut();
            }
        });

        window.addEventListener('scroll', function () {
    const navbar = document.querySelector('.navbar');
    const backgroundHeight = document.querySelector('.background-image').offsetHeight;

    if (window.scrollY > backgroundHeight) {
        navbar.classList.add('shrink');
    } else {
        navbar.classList.remove('shrink');
    }
        });

    </script>

    
</body>
</html>
