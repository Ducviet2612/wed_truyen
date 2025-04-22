<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <a href="">Day la xoa gio hang</a>
    
<?php
include '/xamppp/htdocs/webtruyen/backend/connect.php'; // Kết nối database
session_start();
// Kiểm tra nếu có đủ tham số trên URL
if (isset($_GET['ID']) && isset($_GET['the_loai']) && isset($_GET['username'])) {
    $id_san_pham = intval($_GET['ID']);
    $the_loai = mysqli_real_escape_string($conn, $_GET['the_loai']);
    $username = mysqli_real_escape_string($conn, $_GET['username']);

    // Truy vấn DELETE
    $sql = "DELETE FROM `gio_hang` WHERE ID = '$id_san_pham' AND the_loai = '$the_loai' AND username = '$username'";

    if (mysqli_query($conn, $sql)) {
        header("Location: trang-chu.php?page=giohang"); // Điều hướng sau khi xóa thành công
        exit();
    } else {
        echo "Lỗi khi xóa: " . mysqli_error($conn);
    }
}
?>

</body>
</html>
