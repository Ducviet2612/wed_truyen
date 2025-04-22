<?php
$username = isset($_SESSION['email']) ? $_SESSION['email'] : null;
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <style>
 .gio-hang {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    color: white;
    background-color: #ff6600; /* Màu cam nổi bật */
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

.gio-hang:hover {
    background-color: #e65c00; /* Màu cam đậm hơn khi hover */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
}

.gio-hang:active {
    transform: scale(0.95); /* Hiệu ứng nhấn xuống */
}
.go-back {
    margin: 20px 0;
    text-align: center;
}

.go-back a {
    display: inline-block;
    padding: 10px 20px;
    font-size: 16px;
    font-weight: bold;
    text-decoration: none;
    color: white;
    background-color: #007bff; /* Màu xanh dương */
    border-radius: 8px;
    transition: all 0.3s ease-in-out;
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.2);
}

.go-back a:hover {
    background-color: #0056b3; /* Xanh đậm hơn khi hover */
    transform: scale(1.05); /* Hiệu ứng phóng to nhẹ */
    box-shadow: 4px 4px 10px rgba(0, 0, 0, 0.3);
}

.go-back a:active {
    transform: scale(0.95); /* Hiệu ứng thu nhỏ khi nhấn */
}
table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 20px;
    background-color: #fff;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    overflow: hidden;
}

th, td {
    border: 1px solid #ddd;
    padding: 12px;
    text-align: center;
}

th {
    background-color: #007bff; /* Màu xanh dương */
    color: white;
    font-size: 16px;
}

td {
    font-size: 18px;
    color: #333;
}

tr:nth-child(even) {
    background-color: #f2f2f2; /* Màu nền xen kẽ */
}

tr:hover {
    background-color: #d4e3fc; /* Hiệu ứng khi hover */
    transition: 0.3s;
}
.product-img {
    width: 80px;  /* Điều chỉnh kích thước chiều rộng */
    height: auto; /* Giữ tỷ lệ ảnh */
    border-radius: 5px; /* Bo góc cho đẹp */
    box-shadow: 2px 2px 5px rgba(0, 0, 0, 0.1); /* Hiệu ứng bóng */
}
.btn-delete, .btn-pay {
    padding: 8px 10px;
    margin: 5px;
    font-size: 14px;
    border: none;
    border-radius: 5px;
    cursor: pointer;
    color: white;
    transition: all 0.3s;
}

.btn-delete {
    background-color: #dc3545; /* Màu đỏ */
}

.btn-delete:hover {
    background-color: #c82333; /* Đỏ đậm hơn khi hover */
}

.btn-pay {
    background-color: #28a745; /* Màu xanh lá */
}

.btn-pay:hover {
    background-color: #218838; /* Xanh đậm hơn khi hover */
}
td.gia {
    font-weight: bold;
    color: green;
    font-size: 25px;
}
td.ten-truyen {
    color: #333;
    font-size: 25px;
}
td.the-loai {
    color: darkred;
    font-size: 25px;
}
    </style>
     <table border="1">
        <tr>
            <th>Mã đơn hàng</th>
            <Th>Tên sản phẩm</Th>
            <th>Thể loại</th>
            <th>Ảnh sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá</th>
           <th>Chức năng</th>
           <th>Tình trạng giao hang</th>
           <th>Thanh Toan</th>
        </tr>
        <?php
         include '/xamppp/htdocs/webtruyen/backend/connect.php';
         $sql = "SELECT * FROM gio_hang";
         $result = mysqli_query($conn, $sql);
         
         // Duyệt từng dòng trong giỏ hàng
         while ($row = mysqli_fetch_array($result)) {
             // Lấy dữ liệu từ bảng story để kiểm tra
             $sql1 = "SELECT * FROM story WHERE ID = " . $row['ID'] . " AND the_loai = '" . $row['the_loai'] . "'";
             $result1 = mysqli_query($conn, $sql1);
             if($username == $row['username']){
             // Kiểm tra nếu tìm thấy dữ liệu trùng khớp trong bảng story
                if ($row1 = mysqli_fetch_array($result1)) {
                    $sql2 = "SELECT tinh_trang_giao_hang,hinh_thuc_thanh_toan FROM thong_tin_don_hang WHERE ten_truyen = '" . $row1['ten_truyen'] . "' AND username = '$username'";
                    $result2 = mysqli_query($conn, $sql2);
                    $tinh_trang = "Chưa đặt hàng"; // Mặc định nếu không có đơn hàng nào
                    $hinh_thuc_thanh_toan = '';
        
                    if ($row2 = mysqli_fetch_array($result2)) {
                        $tinh_trang = $row2['tinh_trang_giao_hang']; // Cập nhật tình trạng đơn hàng nếu có
                        $hinh_thuc_thanh_toan = $row2['hinh_thuc_thanh_toan'];
                    }
         ?>
                 <tr>
                 <td class='ten-truyen'><?php echo $row['STT']; ?></td>
                    <td class='ten-truyen'><?php echo $row1['ten_truyen']; ?></td>
                    <td class='the-loai'><?php echo $row1['the_loai']; ?></td>
                    <td>
                    <img class="product-img" src="<?php echo $row1['image_url']; ?>" alt="Truyện Image">
                    </td>
                    <td class='the-loai'><?php echo $row['so_luong']; ?></td>
                    <td class="gia"><?php echo number_format($row1['gia_san_pham']* $row['so_luong'], 0, ',', '.') . ' đ'; ?></td>
                    <td>
                    <a href='xoa-gio-hang-1.php?ID=<?php echo $row['ID']; ?>&the_loai=<?php echo urlencode($row['the_loai']); ?>&username=<?php echo urlencode($username);?>' class='btn-delete'>
                    Xóa truyện
                    </a>
                    <a href='trang-chu.php?page=thanhtoan&tensp=<?php echo $row1['ten_truyen']; ?>&giasp=<?php echo urlencode($row1['gia_san_pham']); ?>&soluong=<?php echo urlencode($row['so_luong']);?>&img=<?php echo $row1['image_url']; ?>&mdh=<?php echo $row['STT']; ?>' class="btn-pay">Thanh toán</a>
                    </td>
                    <td class="tinh-trang"><?php echo $tinh_trang; ?>
                <br>
                    
            </td>
            <td>
            <?php echo $hinh_thuc_thanh_toan;?>
            </td>
                 </tr>
         <?php
             }
         }
        }
         ?>
        
    </table>
    <div class="go-back">
            <a href="/webtruyen/trang-chu.php?page=trangchu">Quay lại trang sản phẩm</a>
    </div>   
</body>
</html>