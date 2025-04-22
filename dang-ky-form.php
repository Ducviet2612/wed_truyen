<?php
    include '/xamppp/htdocs/webtruyen/backend/dang-ky.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Trang Đăng Ký</title>
  <link rel="stylesheet" href="/webtruyen/css/dang-ky.css">
</head>
<body>
  <!-- Thêm ảnh nền -->
  <div class="background-image">
    <img src="https://img3.thuthuatphanmem.vn/uploads/2019/06/13/anh-nen-anime-dep_095240141.jpg" alt="Hình nền anime đẹp">
  </div>

  <div class="container">
    <h1>Đăng Ký</h1>
    <form id="registrationForm" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
      <label for="username">Tên đăng nhập</label>
      <input type="text" id="username" name="username" placeholder="Nhập tên đăng nhập" required>

      <label for="email">Email</label>
      <input type="email" id="email" name="email" placeholder="Nhập email" required>
      <span> <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($error_email)?></span>

      <label for="password">Mật khẩu</label>
      <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>

      <label for="confirmPassword">Xác nhận mật khẩu</label>
      <input type="password" id="confirmPassword" name="confirmPassword" placeholder="Nhập lại mật khẩu" required>

      <button type="submit">Đăng Ký</button>
      <span> <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($ketqua)?></span>
    </form>
    <p id="message"></p>
    <a href="/webtruyen/index.php">Quay trở lại trang chủ.</a>
  </div>
  
  <!-- <script src="/project/js/dang-ky.js"></script> -->
</body>
</html>