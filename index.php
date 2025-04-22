<?php
    include '/xamppp/htdocs/webtruyen/backend/hien-thi-truyen.php';
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
            background-color: black;
            height: 10vh;
            width: 100%;
            display: flex;
            align-items: center;
            z-index: 1000;
        }

        .nav_bar {
            display: flex;
            align-items: center;
        }

        .nav_left {
            margin-left: 40px;
            flex-direction: left;
            align-items: center;
            justify-content: left;
            display: flex;
        }

        .logo img {
            display: flex;
            justify-content: center;
            height: 75px;
        }

        .nav_right {
            margin-left: 700px;
            flex-direction:right;
            align-items: center;
            justify-content:right;
            display: flex;
        }

        .mode p {
            cursor: pointer;
        }

        a {
            display: flex;
            margin-left: 15px;
            text-decoration: none;
            color: white;
            text-align: center;
        }

        .search_bar {
            border-style: solid;
            border-width: 0cap;
            padding-left: 40% ;
            text-justify: auto;
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
                <div class="home"><a href="">Trang chủ</a></div>
            </div>
            <div class="nav_right">
                <div class="dang_nhap"><a href="/webtruyen/dang-nhap-form.php">Đăng nhập</a></div>
                <div class="dang_ky"><a href="/webtruyen/dang-ky-form.php">Đăng Ký</a></div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search_bar">
        <form action="/webtruyen/tim-kiem-form.php" method="post">
            <input type="text" placeholder="Search..." name="storyTitle">
        </form>
    </div>

    <!-- Main Content -->
    <div class="main_page">
        <div class="tag">
            <h2>Truyện mới đăng</h2>
        </div>
        <hr>

        <div class="picture_container">
            <?php
                $count = 0;
                foreach($storeData as $row) {
                    if($count < 7) {
                    echo '<div class="truyen1">';
                    echo    '<a title="'. htmlspecialchars($row['ten_truyen']) .'" href="">';
                    echo        '<span class="khung">';
                    echo            '<span class="khungtrong"></span>';
                    echo            '<img src="'. $row['image_url'] .'" alt="Truyện Image">';
                    echo        '</span>';
                    echo    '</a>';
                    echo    '<div class="chuduoi">';
                    echo        '<h3><a title="'. htmlspecialchars($row['ten_truyen']) .'" href="">'. htmlspecialchars($row['ten_truyen']) .'</a></h3>';
                    echo    '</div>';
                    echo '<a title="'. htmlspecialchars($row['gia_san_pham']) .'" href="">';
                    echo '</div>';
                   
                    }
                    $count++;
                }
            ?>
        </div>

        <hr>

        <!-- Footer -->
        <div class="end">
            <p>Website <b>LN</b> là Website đọc truyện online chất lượng hàng đầu việt nam, với nhiều truyện được tác giả và dịch giả chọn lọc và đăng tải. Truy cập website nghĩa là bạn đã đồng ý với các quy định và điều khoản của chúng tôi. Vui lòng đọc kỹ các thông tin liên quan ở phía dưới.</p>
            <div>
                <div><b>Chính sách bảo mật</b></div><br>
                <div><b>Về chúng tôi</b></div><br>
                <div><b>Điều khoản dịch vụ</b></div><br>
                <div><b>Liên hệ</b></div><br>
            </div>
        </div>
    </div>

    <script src="/webtruyen/js/trang-chu.js"></script>
</body>
</html>