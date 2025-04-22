<?php
    include '/xamppp/htdocs/webtruyen/backend/them-truyen.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Thêm Truyện</title>
    <link rel="stylesheet" href="/webtruyen/css/them-truyen-form.css" />
</head>
<body>

    <div class="form-container">
        <h2>Thêm Truyện Mới</h2>
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="storyTitle">Tên Truyện:</label>
            <input type="text" id="storyTitle" name="storyTitle" required>
            
            <label for="genre">Thể Loại:</label>
            <select id="genre" name="genre" required>
                <option value="fantasy">Fantasy</option>
                <option value="anime">Anime</option>
                <option value="vietnam">Lich su Viet nam</option>
            </select>

            <label for="status">Tình Trạng:</label>
            <select id="status" name="status" required>
                <option value="ongoing">Đang tiến hành</option>
                <option value="completed">Hoàn thành</option>
                <option value="paused">Tạm dừng</option>
            </select>

            <label for="description">Mô Tả:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <!-- Thêm trường nhập liệu cho ảnh dưới dạng đường dẫn -->
            <label for="image">Ảnh:</label>
            <input type="text" id="image" name="image" required placeholder="Thêm ảnh">

            <button type="submit">Thêm Truyện</button>
            <span style="color: red;"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($ten_truyen_error)?></span>
        </form>

        <!-- Liên kết quay lại trang quản lý -->
        <div class="go-back">
            <a href="/webtruyen/quan-ly.php">Quay lại trang quản lý</a>
        </div>
    </div>

</body>
</html>