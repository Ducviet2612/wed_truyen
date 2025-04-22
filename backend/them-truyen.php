<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '/xamppp/htdocs/webtruyen/backend/connect.php';
        $ten_truyen = $the_loai = $tinh_trang = $mo_ta = $image_url = $ten_truyen_error = '';
        if($_SERVER['REQUEST_METHOD'] == 'POST') {
            if(!empty($_POST['storyTitle'])) {
                $ten_truyen = $_POST['storyTitle'];
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
        }


        $sql = "SELECT ten_truyen FROM story WHERE ten_truyen='$ten_truyen'";
        $result = mysqli_query($conn, $sql);
        if(mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $ten_truyen_error = $row["ten_truyen"] . ' đã tồn tại';
        } else {
            $sql = "INSERT INTO story(ten_truyen, the_loai, tinh_trang, mo_ta, image_url) VALUES ('$ten_truyen', '$the_loai', '$tinh_trang', '$mo_ta', '$image_url')";
            if(mysqli_query($conn, $sql)) {
                $ten_truyen_error = 'Thêm thành công : ' . $ten_truyen;
            }   
        }

        mysqli_close($conn);
    }
?>