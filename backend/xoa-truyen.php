<?php
    if($_SERVER['REQUEST_METHOD'] == 'POST') {

    include '/xamppp/htdocs/webtruyen/backend/connect.php';

    $ten_truyen = $ten_truyen_error = '';
    
    if(!empty($_POST['storyTitle'])) {
        $ten_truyen = $_POST['storyTitle'];
    }
    $sql = "SELECT ten_truyen FROM story WHERE ten_truyen='$ten_truyen'";
    $result = mysqli_query($conn, $sql);
    if(mysqli_num_rows($result) > 0) {
        $sql_delete = "DELETE FROM story WHERE ten_truyen='$ten_truyen'";
        if(mysqli_query($conn, $sql_delete)) {
            $ten_truyen_error = 'Xóa thành công!';
        } else $ten_truyen_error = 'Xóa thất bại!';
    } else {
        $ten_truyen_error = 'Xóa thất bại, không tồn tại truyện!';
    }
    mysqli_close($conn);
    }
?>