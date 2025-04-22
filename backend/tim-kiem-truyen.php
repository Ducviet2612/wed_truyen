<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

        include '/xamppp/htdocs/webtruyen/backend/connect.php';

        $tim_kiem_error = $ten_truyen = $ten_timkiem = $the_loai = $tinh_trang = $mo_ta = $image_url = '';

        if(!empty(($_POST['storyTitle']))) {
            $ten_truyen = $_POST['storyTitle'];
        }

        $sql = "SELECT * FROM story WHERE ten_truyen='$ten_truyen'";
        $result = mysqli_query($conn, $sql);
        $num = mysqli_num_rows($result);
        if($num > 0) {
            $row = mysqli_fetch_assoc($result);
            $id = $row['id'];
            $ten_timkiem = $row['ten_truyen'];
            $tinh_trang = $row['tinh_trang'];
            $the_loai = $row['the_loai'];
            $mo_ta = $row['mo_ta'];
            $image_url = $row['image_url'];
        }
        mysqli_close($conn);
    }
?>
