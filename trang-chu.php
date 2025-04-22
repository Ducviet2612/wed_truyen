<?php
    include '/xamppp/htdocs/webtruyen/backend/hien-thi-truyen.php';
    session_start(); // Bắt đầu session
    $username = isset($_SESSION['email']) ? $_SESSION['email'] : null;
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- <link rel="stylesheet" href="/webtruyen/css/trang-chu.css" /> -->
    <link
      rel="stylesheet"
      href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css"
      integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg=="
      crossorigin="anonymous"
      referrerpolicy="no-referrer"
    />
    <style>
        /* CSS cho phần Header */
        .header {
    background-color: #333;
    padding: 10px 0;
}

.nav_bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 10px 20px;
}

/* Điều chỉnh phần bên trái */
.nav_left, .nav_right {
    display: flex;
    align-items: center;
}

.logo img {
    height: 50px; /* Điều chỉnh kích thước logo */
    margin-right: 15px;
}

.nav_left div {
    margin-left: 15px;
}

.nav_left a, .nav_right a, .mode p {
    display: flex;
    align-items: center;
    justify-content: center;
    height: 40px; /* Đảm bảo chiều cao đồng đều */
    padding: 0 12px;
    text-decoration: none;
    color: white;
    font-size: 16px;
    font-weight: bold;
}

/* Thanh tìm kiếm */
.search_bar form {
    display: flex;
    align-items: center;
}
.search_bar input {
    height: 36px;
    padding: 5px 10px;
    border-radius: 5px;
    border: none;
    outline: none;
}
/* Nút đổi chế độ */
.mode p {
    cursor: pointer;
    background: #555;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background 0.3s;
    display: flex;
    align-items: center;
}
.mode p:hover {
    background: #777;
}
.nav_right a:hover {
    background: rgba(255, 255, 255, 0.2);
}

        /* CSS cho phần hiển thị truyện */
        .picture_container {
            display: flex;
            flex-wrap: nowrap; /* Các phần tử không gãy dòng */
            justify-content: flex-start;
            gap: 20px; /* Khoảng cách giữa các phần tử */
            padding: 20px;
            margin: 0 auto;
            flex-wrap: wrap; /* Cho phép các phần tử wrap lại khi không đủ không gian */
        }

        .truyen1 {
            padding: 10px;
            border-radius: 20%;
            width: 200px; /* Đặt chiều rộng cho mỗi truyện */
            flex-shrink: 0; /* Không cho phần tử bị co lại */
            text-align: center;
        }

        .truyen1 img {
            width: 100%;
            height: auto;
            border-radius: 10px;
        }

        .truyen1 h3 {
            font-size: 18px;
            color: black;
            margin-top: 10px;
        }

        .truyen1 a {
            text-decoration: none;
            color: inherit;
        }

        /* CSS cho phần Footer */
        .end {
            text-align: center;
            margin-top: 50px;
        }

        .end p {
            font-size: 14px;
            color: #333;
        }

        .end b {
            color: #4CAF50;
        }

        /* CSS cho chế độ Dark Mode */
        .mode p {
            cursor: pointer;
        }
.chuduoi {
    text-align: center;
    margin-bottom: 10px;
}

/* Bọc phần giá và nút mua ngay chung một dòng */
.gia-mua {
    display: flex;
    justify-content: space-between;
    align-items: center;
    gap: 15px; /* Khoảng cách giữa giá và nút */
}

/* Giá sản phẩm */
.gia-mua h3 {
    font-size: 18px;
    font-weight: bold;
    color: #e60023;
    margin: 0;
}

/* Nút mua ngay */
.btn-mua {
    display: inline-block;
    padding: 10px 15px;
    background-color: #e60023;
    color: white;
    font-weight: bold;
    text-decoration: none;
    border-radius: 5px;
    transition: background 0.3s;
    white-space: nowrap; /* Tránh nút bị xuống dòng */
}

.btn-mua:hover {
    background-color: #cc001f;
}
.other-sales-platforms {
    background-color: #f5f5f5;
    padding: 20px;
    border-radius: 10px;
    width: fit-content;
    margin: 0 auto; /* căn giữa cả khối */
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    font-family: Arial, sans-serif;
    text-align: center; /* căn giữa nội dung bên trong */
}

/* Tiêu đề */
.other-sales-platforms .platform-title {
    font-size: 30px; /* to hơn */
    font-weight: bold;
    margin-bottom: 15px;
    color: #222;
}

/* Vùng chứa liên kết */
.other-sales-platforms .platform-links {
    display: flex;
    flex-direction: column;
    gap: 10px;
}

/* Liên kết */
.other-sales-platforms .platform-links a {
    text-decoration: none;
    color: #333;
    font-size: 18px;
    transition: color 0.3s ease;
}

/* Hiệu ứng hover */
.other-sales-platforms .platform-links a:hover {
    color: #007bff;
}
    </style>
    <title>Mê đọc truyện cổ tích 😻</title>
</head>
<body>
    <!-- Header -->
    <div class="header">
        <div class="nav_bar">
            <div class="nav_left">
                <div class="logo">
                    <img src="image/logo.png" alt="Logo">
                </div>
                
                <div class="home"><a href="trang-chu.php?page=trangchu">Trang chủ</a></div>
                <div class="theloai"><a href="trang-chu.php?page=anime">Truyện tranh anime</a></div>
                <div class="thinhhanh"><a href="trang-chu.php?page=cotich">Truyện cổ tích</a></div>
                <div class="theloai"><a href="trang-chu.php?page=lichsu">Truyện lịch sử Việt Nam</a></div>
                
            </div>
            <div class="nav_right">
            <div class="search_bar">
        <form action="/webtruyen/nguoi-dung-tim-kiem-form.php" method="post">
            <input type="text" placeholder="Search..." name="storyTitle">
        </form>
    </div>
                <div>
                    <div class="dang_xuat"><a href="/webtruyen/index.php">Đăng xuất</a></div>
                </div>
                <div>
                <div class="gio_hang"><a href="trang-chu.php?page=giohang">Giỏ hàng</a></div>
                </div>
            </div>
        </div>
    </div>
    <!-- Search Bar -->
    <!-- Main Content -->
    <div class="main_page">
        <div class="tag">
        </div>
        <?php
 if(isset($_GET['page'])){
    switch ($_GET['page']) {
        case 'anime':
            include("anime.php");
            break;
            case 'cotich':
            include("trang-chu-nguoi-dung.php");
            break;
            case 'lichsu':
                include("lichsuvietnam.php");
                break;
                case 'giohang':
                    include("gio-hang.php");
                    break;
                    case 'thanhtoan':
                        include("thanh-toan.php");
                        break;
                        case 'trangchu':
                            include("trang-chu-chinh.php");
                            break;
    }
 }
?>
       
        <!-- Footer -->
        <div class="end">
            <p>Website <b>LN</b> là Website bán truyện chất lượng hàng đầu việt nam, với nhiều truyện được tác giả và dịch giả chọn lọc. Truy cập website nghĩa là bạn đã đồng ý với các quy định và điều khoản của chúng tôi. Vui lòng đọc kỹ các thông tin liên quan ở phía dưới.</p>
            <div>
                <div><b>Chính sách bảo mật</b></div><br>
                <div><b>Về chúng tôi</b></div><br>
                <div><b>Điều khoản dịch vụ</b></div><br>
                <div><b>Liên hệ</b></div><br>
            </div>
            <div class="other-sales">
    <p class="other-sales-title">Các trang bán hàng khác</p>
    <div class="other-sales-links">
        <a href="#">Facebook</a> <br>
        <a href="#">TikTok</a> <br>
        <a href="#">Shopee</a> <br>
    </div>
</div>
        </div>
    </div>
    <script src="/webtruyen/js/trang-chu.js"></script>
</body>
</html>