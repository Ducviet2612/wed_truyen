<?php
    include '/xamppp/htdocs/webtruyen/backend/hien-thi-truyen.php';
    $username = isset($_SESSION['email']) ? $_SESSION['email'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
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
</head>
<body>
<div class="picture_container">
            <?php
                $count = 0;
                foreach($storeData as $row) {
                    if($row['the_loai'] == 'anime'){
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

</body>
</html>