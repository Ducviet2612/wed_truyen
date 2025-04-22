<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include '/xamppp/htdocs/webtruyen/backend/connect.php'; // Kết nối database
session_start();
if(!isset($_SESSION['email'])){
    header("Location: dang-nhap-form.php");
}else{
if (isset($_GET['id']) && isset($_GET['the_loai']) && isset($_GET['username'])) {
    $id_san_pham = intval($_GET['id']);
    $the_loai = htmlspecialchars($_GET['the_loai']);
    $username = htmlspecialchars($_GET['username']);
    $sql1 = "SELECT * FROM gio_hang WHERE ID = '$id_san_pham' AND the_loai = '$the_loai' AND username = '$username'";
    $result1 = mysqli_query($conn, $sql1);

    if (mysqli_num_rows($result1) > 0) {
    // Nếu sản phẩm đã có, tăng số lượng lên 1
    $sql2 = "UPDATE gio_hang SET so_luong = so_luong + 1 WHERE ID = '$id_san_pham' AND the_loai = '$the_loai' AND username = '$username'";
    mysqli_query($conn, $sql2);
    } else {
    // Nếu chưa có, thêm sản phẩm mới vào giỏ hàng với số lượng = 1
    $sql3 = "INSERT INTO gio_hang (ID, the_loai, username, so_luong) VALUES ('$id_san_pham', '$the_loai', '$username', 1)";
    mysqli_query($conn, $sql3);
}
    if (mysqli_query($conn, $sql1)) {
        echo "Sản phẩm đã được thêm vào giỏ hàng!";
        header("Location: trang-chu.php?page=giohang"); // Chuyển hướng đến giỏ hàng
        exit();
    } else {
        echo "Lỗi: " . mysqli_error($conn);
    }
}
}
?>
</body>
</html> 