<?php
    include '/xamppp/htdocs/webtruyen/backend/xoa-truyen.php';
?>
<!DOCTYPE html>
<html lang="vi">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Xóa Truyện</title>
    <link rel="stylesheet" href="/webtruyen/css/xoa-truyen-form.css" />
</head>
<body>

    <div class="form-container">
        <h2>Xóa Truyện</h2>
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">
            <label for="storyTitle">Tên Truyện:</label>
            <input type="text" id="storyTitle" name="storyTitle" required>
            <button type="submit">Xóa Truyện</button>
            <span style="color: red;"> <?php  if($_SERVER['REQUEST_METHOD'] == 'POST') echo '*'. htmlspecialchars($ten_truyen_error) ?></span>
            <div class="back-link">
            <a href="/webtruyen/quan-ly.php">Quay lại trang quản lý</a>
        </div>
        </form>
    </div>

</body>
</html>