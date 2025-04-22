<?php
     if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '/xamppp/htdocs/webtruyen/backend/connect.php';
        $username = $password = $email = $error_email = $result = $ketqua = '';

        if (isset($_POST['username'])) {
            $username = $_POST['username'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }

        $sql_get_user = "SELECT email FROM user WHERE email='$email'";
        $sql_get_admin = "SELECT email FROM admin WHERE email='$email'";
        $result_user = mysqli_query($conn, $sql_get_user);
        $result_admin = mysqli_query($conn, $sql_get_admin);
        if(mysqli_num_rows($result_user) > 0 || mysqli_num_rows($result_admin) > 0) {
            $error_email = 'Email đã được sử dụng để đăng ký, vui lòng sử dụng email khác.';
        } else {
        $sql = "INSERT INTO user(username, password, email) VALUES ('$username', '$password', '$email')";
        $ketqua = (mysqli_query($conn, $sql)) ? 'Đăng ký thành công' : 'Đăng ký thất bại' . mysqli_error($conn);
        }
     }
?>