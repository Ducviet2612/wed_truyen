<?php
    $user = 'root';
    $pass = '';
    $db = 'truyentranhvietnam';
    $host = 'localhost';
    $port = '3307';
    $conn = mysqli_connect($host, $user, $pass, $db,$port);

    if($conn) {
    } else {
        die('Kết nối thất bại.' . mysqli_connect_error());
    }
?>
