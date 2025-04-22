<?php
    include '/xamppp/htdocs/webtruyen/backend/tim-kiem-truyen.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Danh Sách Truyện</title>
    <link rel="stylesheet" href="/webtruyen/css/tim-kiem-form.css" />
</head>
<body>

    <h1>Danh Sách Truyện</h1>
    
    <div class="story-list">
    <?php 
        if($num > 0) {
            echo '<div class="story-item">
                    <img src="' . htmlspecialchars($image_url) . '" alt="Truyện 1" class="story-image">
                        <div class="story-title">' . htmlspecialchars($ten_timkiem) . '</div>
                        <div class="story-genre">Thể loại: ' . htmlspecialchars($the_loai) . '</div>
                        <div class="story-status">Tình trạng: ' . htmlspecialchars($tinh_trang) . '</div>
                        <div class="story-description">' . htmlspecialchars($mo_ta) . '</div>
                        <div class="view-more">
                        <a href="#">Xem thêm</a>
                    </div>
                    </div>';
            } else if($num <= 0) {
                echo '<h1> Không tìm thấy truyện! </h1>';
            }
        ?>
    </div>

    <!-- Liên kết quay lại trang chủ -->
    <div class="back-to-home">
        <a href="/webtruyen/trang-chu-quan-ly.php">Quay lại trang chủ</a>
    </div>

</body>
</html>
