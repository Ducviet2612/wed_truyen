<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
include '/xamppp/htdocs/webtruyen/backend/connect.php';
session_start(); // Bắt đầu session
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Thông tin đơn hàng
    $product_mdh = mysqli_real_escape_string($conn, $_POST['product_mdh']);
    $product_name = mysqli_real_escape_string($conn, $_POST['product_name']);
    $product_price = mysqli_real_escape_string($conn, $_POST['product_price']);
    $product_username = mysqli_real_escape_string($conn, $_POST['product_username']);
    $quantity = (int)$_POST['quantity'];
    $product_tong = $product_price * $quantity; // Tính tổng giá trị đơn hàng

    // Thông tin khách hàng
    $customer_name = mysqli_real_escape_string($conn, $_POST['customer_name']);
    $customer_phone = mysqli_real_escape_string($conn, $_POST['customer_phone']);
    $customer_address = mysqli_real_escape_string($conn, $_POST['customer_address']);

    // Hình thức thanh toán
    $payment_method = mysqli_real_escape_string($conn, $_POST['payment']);

    // Tạo câu lệnh SQL
    $sql = "INSERT INTO thong_tin_don_hang 
            (ma_don_hang, ten_truyen, gia_san_pham, so_luong, tong_gia_tri_don_hang,username, ten_khach_hang, so_dien_thoai, dia_chi_giao_hang, hinh_thuc_thanh_toan, tinh_trang_giao_hang) 
            VALUES ('$product_mdh', '$product_name', '$product_price', '$quantity', '$product_tong','$product_username', '$customer_name', '$customer_phone', '$customer_address', '$payment_method', 'chuẩn bị hàng')";

    // Thực thi câu lệnh SQL
    if (mysqli_query($conn, $sql)) {
        // Chuyển hướng về trang giỏ hàng nếu xử lý thành công
        header("Location: trang-chu.php?page=giohang"); // Đường dẫn tới trang giỏ hàng của bạn
        exit();
    } else {
        echo "Lỗi: " . $sql . "<br>" . mysqli_error($conn);
    }
}
?>
</body>
</html>