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
    background-color: #333;
    padding: 10px 0;
}

.nav_bar {
    display: flex;
    justify-content: space-between;
    align-items: center;
    max-width: 1200px;
    margin: 0 auto;
    padding: 0 20px;
}

/* Điều chỉnh phần bên trái */
.nav_left {
    display: flex;
    align-items: center;
}

.logo img {
    height: 50px; /* Điều chỉnh kích thước logo */
    margin-right: 15px;
}

.home a {
    color: white;
    text-decoration: none;
    font-size: 18px;
    font-weight: bold;
}

.home a:hover {
    text-decoration: underline;
}

/* Điều chỉnh phần bên phải */
.nav_right {
    display: flex;
    align-items: center;
}

.nav_right > div {
    margin-left: 15px;
}

.nav_right a {
    color: white;
    text-decoration: none;
    font-size: 16px;
    font-weight: bold;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background 0.3s;
}

.nav_right a:hover {
    background: rgba(255, 255, 255, 0.2);
}

/* Nút đổi chế độ */
.mode p {
    cursor: pointer;
    background: #555;
    padding: 8px 12px;
    border-radius: 5px;
    transition: background 0.3s;
}

.mode p:hover {
    background: #777;
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
        .khung {
    width: 200px;  /* Điều chỉnh kích thước khung */
    height: 300px; 
    overflow: hidden; /* Ẩn phần ảnh bị dư */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
}

.khung img {
    width: 100%;
    height: 100%;
    object-fit: cover; /* Cắt ảnh để vừa với khung mà không bị méo */
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
                <div class="home"><a href="#">Trang chủ</a></div>
            </div>
            <div class="nav_right">
                <div>
                    <div class="quan_ly"><a href="/webtruyen/quan-ly.php">Quản lý</a></div>
                </div>
                <div>
                    <div class="dang_xuat"><a href="/webtruyen/index.php">Đăng xuất</a></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Search Bar -->
    <div class="search_bar">
        <form action="/webtruyen/quan-ly-tim-kiem-form.php" method="post">
            <input type="text" placeholder="Search..." name="storyTitle">
        </form>
    </div>

    <!-- Main Content -->
    <div class="main_page">
        <div class="tag">
            <h2></h2>
        </div>
        <hr>

        <div class="picture_container">
            <?php
                $count = 0;
                foreach($storeData as $row) {
                    if($count < 100) {
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
                    echo     '<a href="xu_ly_truyen_hot.php?id='. $row['id'] .'&the_loai='. urlencode($row['the_loai']).'&ten_truyen='.$row['ten_truyen'].'&gia_san_pham='.$row['gia_san_pham'].'&image='.$row['image_url'].'">Đặt làm truyện hot</a>';
                    echo     '<a href="xu_ly_truyen_moi.php?id='. $row['id'] .'&the_loai='. urlencode($row['the_loai']).'&ten_truyen='.$row['ten_truyen'].'&gia_san_pham='.$row['gia_san_pham'].'&image='.$row['image_url'].'">Đặt làm truyện mới</a>';
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