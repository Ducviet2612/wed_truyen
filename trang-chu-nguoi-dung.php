<?php
    include '/xamppp/htdocs/webtruyen/backend/hien-thi-truyen.php';
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
    </style>
    <title>Mê đọc truyện cổ tích 😻</title>
</head>
<body>
        <div class="picture_container">
            <?php
                $count = 0;
                foreach($storeData as $row) {
                    if($row['the_loai'] == 'fantasy'){
                    if($count < 20) {
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
                    echo    '<div class="gia-mua">';
                    echo        '<h3><a title="'. htmlspecialchars(number_format($row['gia_san_pham'], 0, ',', '.')) .'" href="" style="text-decoration: none;">'. number_format($row['gia_san_pham'], 0, ',', '.') .'₫</a></h3>';
                    echo    '<a href="xu_ly_mua_hang_1.php?id='. $row['id'] .'&the_loai='. urlencode($row['the_loai']) .'&username='. urlencode($username).'" class="btn-mua">Mua ngay</a>';
                    echo '</div>';
                    echo '</div>';
                    }
                    $count++;
                }
            }
            ?>
        </div>
     
    <script src="/webtruyen/js/trang-chu.js"></script>
</body>
</html>