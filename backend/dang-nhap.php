<?php
    session_start(); // Bắt đầu session
    if($_SERVER['REQUEST_METHOD'] == 'POST') {
        include '/xamppp/htdocs/webtruyen/backend/connect.php';
        $email = $password = $error_account = $error_password = $error_email = '';
        if (isset($_POST['email'])) {
            $email = $_POST['email'];
        }
        if (isset($_POST['password'])) {
            $password = $_POST['password'];
        }
    
        $user_sql = "SELECT email, password FROM user WHERE email='$email'";
        $admin_sql = "SELECT email, password FROM admin WHERE email='$email'";
        $result_user = mysqli_query($conn, $user_sql);
        $result_admin = mysqli_query($conn, $admin_sql);
        if(mysqli_num_rows($result_admin) > 0) {
            $row = mysqli_fetch_assoc($result_admin);
            if($row['email'] === $email) {
                if($row['password'] === $password) {
                    header('location: /webtruyen/trang-chu-quan-ly.php');
                }
                else {
                    $error_password = 'Mật khẩu không chính xác!';
                }
            }
        } else {
            if(mysqli_num_rows($result_user) > 0) {
                $row = mysqli_fetch_assoc($result_user);
                if($row['email'] === $email) {
                    if($row['password'] === $password) {
                        $_SESSION['email'] = $email;
                        header('location: /webtruyen/trang-chu.php?page=trangchu'); 
                    } else {
                        $error_password = 'Mật khẩu không chính xác!';
                    }
                } else {
                    $error_email = 'Email không chính xác!';
                }     
            } else {
                $error_account = 'Không tồn tại tài khoản!';
            }
        }
        mysqli_close($conn);
    }
?>