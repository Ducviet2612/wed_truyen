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

if (
    isset($_GET['id']) &&
    isset($_GET['the_loai']) &&
    isset($_GET['ten_truyen']) &&
    isset($_GET['gia_san_pham']) &&
    isset($_GET['image'])
) {
    $id = $_GET['id'];
    $the_loai = htmlspecialchars($_GET['the_loai']);
    $ten_truyen = htmlspecialchars($_GET['ten_truyen']);
    $gia_san_pham = htmlspecialchars($_GET['gia_san_pham']);
    $image = htmlspecialchars($_GET['image']);

    // Kiểm tra truyện đã tồn tại chưa
    $check_sql = "SELECT * FROM truyen_moi 
                  WHERE id = '$id' 
                  AND the_loai = '$the_loai' 
                  AND ten_truyen = '$ten_truyen' 
                  AND gia_san_pham = '$gia_san_pham'
                  AND image = '$image'";

    $result = mysqli_query($conn, $check_sql);

    if ($result === false) {
        echo "Lỗi truy vấn kiểm tra: " . mysqli_error($conn);
        exit();
    }

    if (mysqli_num_rows($result) > 0) {
        echo "Truyện đã tồn tại trong danh sách!";
        echo "<br>";
        echo "<a href=trang-chu-quan-ly.php>Quay lai</a>";
    } else {
        $insert_sql = "INSERT INTO truyen_moi (id, the_loai, ten_truyen, gia_san_pham, image) 
                       VALUES ('$id', '$the_loai', '$ten_truyen', '$gia_san_pham', '$image')";

        if (mysqli_query($conn, $insert_sql)) {
            header("Location: trang-chu-quan-ly.php"); 
            exit();
        } else {
            echo "Lỗi khi thêm truyện: " . mysqli_error($conn);
        }
    }
} else {
    echo "Thiếu tham số truyền vào.";
}
?>
</body>
</html>