<?php
        include '/xamppp/htdocs/webtruyen/backend/connect.php';
        $sql = "SELECT * FROM story";
        $storeData = [];
        $result = mysqli_query($conn, $sql);
        if ((mysqli_num_rows($result) > 0)) {
            while($row = mysqli_fetch_assoc($result)) {
                $storeData[] = $row;
            }
        }
        mysqli_close($conn);
?>




