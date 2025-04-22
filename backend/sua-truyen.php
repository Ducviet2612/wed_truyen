<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        include '/xamppp/htdocs/webtruyen/backend/connect.php';

        $ten_truyen_cu = $ten_truyen_moi = $the_loai = $tinh_trang = $mo_ta = $image_url = $gia_san_pham = $update = $ten_truyen_error = '';

        if(!empty($_POST['oldStoryTitle'])) {
            $ten_truyen_cu = $_POST['oldStoryTitle'];
        }
        if(!empty($_POST['newStoryTitle'])) {
            $ten_truyen_moi = $_POST['newStoryTitle'];
        }
        if(!empty($_POST['genre'])) {
            $the_loai = $_POST['genre'];
        }
        if(!empty($_POST['status'])) {
            $tinh_trang = $_POST['status'];
        }
        if(!empty($_POST['description'])) {
            $mo_ta = $_POST['description'];
        }
        if(!empty($_POST['image'])) {
            $image_url = $_POST['image'];
        }
        if(!empty($_POST['gia_san_pham'])) {
            $gia_san_pham = $_POST['gia_san_pham'];
        }

        $select_sql = "SELECT * FROM story WHERE ten_truyen='$ten_truyen_cu'";
        $result = mysqli_query($conn, $select_sql);
        if(mysqli_num_rows($result) > 0) {
            $update_sql = "UPDATE story SET ten_truyen='$ten_truyen_moi', the_loai='$the_loai', tinh_trang='$tinh_trang', mo_ta='$mo_ta', image_url='$image_url', gia_san_pham='$gia_san_pham' WHERE ten_truyen='$ten_truyen_cu'";
            if(mysqli_query( $conn, $update_sql )) {
                $update = "Cập nhật thành công!";
            } else $update = 'Cập nhật thất bại!';
        } else {
            $update = 'Cập nhật thất bại!';
            $ten_truyen_error = 'Không tồn tại truyện!';
        }
        mysqli_close($conn);
}
?>