<?php
    include '/xamppp/htdocs/webtruyen/backend/dang-nhap.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trang Đăng Nhập</title>
    <link rel="stylesheet" href="/webtruyen/css/dang-nhap.css">
</head>
<body>
    <div class="login-container">
        <form class="login-form" action="<?php echo $_SERVER['PHP_SELF']?>" method="post">
    <img src=" https://img.wattpad.com/a637b05a17ff39438d01432e724426ac1de84f7b/68747470733a2f2f73332e616d617a6f6e6177732e636f6d2f776174747061642d6d656469612d736572766963652f53746f7279496d6167652f4f69327a3636466f69494a6137673d3d2d313132393133313139362e313661343461376361643663393963343535343235373235303136352e6a7067" alt="Logo" class="login-logo">
            <h2>Đăng Nhập</h2>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" placeholder="Nhập email" required>
            <span> <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($error_email)?></span>
            
            <label for="password">Mật khẩu:</label>
            <input type="password" id="password" name="password" placeholder="Nhập mật khẩu" required>
            <span> <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($error_password)?></span>
            
            <button type="submit">Đăng Nhập</button>
            <span> <?php if($_SERVER['REQUEST_METHOD'] == 'POST') echo htmlspecialchars($error_account)?></span>
        </form>
        <a href="/webtruyen/index.php">Quay trở lại trang chủ.</a>
    </div>
    <script src="/webtruyen/js/dang-nhap.js"></script>
</body>
</html>