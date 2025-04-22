<?php
    include '/xamppp/htdocs/webtruyen/backend/sua-truyen.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sửa Truyện</title>
    <link rel="stylesheet" href="/webtruyen/css/sua-truyen-form.css" />
</head>
<body>

    <div class="form-container">
        <h2>Sửa truyện</h2>
        <!-- Form để nhập thông tin truyện mới -->
        <form action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
            <label for="oldStoryTitle">Tên Truyện Cũ:</label>
            <input type="text" id="oldStoryTitle" name="oldStoryTitle" required>
            <span style="color: red;"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($ten_truyen_error)?></span>
            
            <label for="newStoryTitle">Tên Truyện Mới:</label>
            <input type="text" id="newStoryTitle" name="newStoryTitle" required>

            <label for="genre">Thể Loại:</label>
            <select id="genre" name="genre" required>
                <option value="fantasy">Fantasy</option>
                <option value="action">Action</option>
                <option value="romance">Romance</option>
                <option value="mystery">Mystery</option>
                <option value="horror">Horror</option>
                <option value="science_fiction">Science Fiction</option>
            </select>

            <label for="status">Tình Trạng:</label>
            <select id="status" name="status" required>
                <option value="ongoing">Đang tiến hành</option>
                <option value="completed">Hoàn thành</option>
                <option value="paused">Tạm dừng</option>
            </select>

            <label for="description">Mô Tả:</label>
            <textarea id="description" name="description" rows="5" required></textarea>

            <label for="image">Ảnh Truyện:</label>
            <input type="text" id="image" name="image">

            <label for="gia_san_pham">Giá Truyện:</label>
            <input type="text" id="image" name="gia_san_pham">

            <button type="submit">Sửa đổi</button>
            <span style="color: red;"><?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($update. '  '.$ten_truyen_error)?></span>
        </form>

        <div class="go-back">
            <a href="/webtruyen/quan-ly.php">Quay lại trang quản lý</a>
        </div>
    </div>

</body>
</html>