<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Banner Slider</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      padding: 0;
      font-family: sans-serif;
    }

    .banner-container {
      position: relative;
      width: 100%;
      max-width: 800px;
      height: 400px;
      margin: 50px auto;
      overflow: hidden;
      border-radius: 12px;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.2);
    }
    .banner-container p {
  position: absolute;
  top: 20px;
  right: 20px; /* đổi từ left -> right */
  background-color: #e53935;
  color: white;
  padding: 15px;
  border-radius: 8px;
  font-size: 16px;
  max-width: 200px;
  line-height: 1.4;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  text-align: left;
}
.banner-wrapper {
  display: flex;
  align-items: center;
  justify-content: center;
  gap: 20px;
  margin-top: 50px;
}
.promo-text {
  position: absolute;
  left: calc(50% - 800px / 2 - 220px); /* Căn trái ngoài banner */
  top: 80px; /* Khoảng cách từ trên xuống */
  width: 250px;  /* Độ rộng của phần văn bản */
  height: 150px; /* Cao hơn một chút để bao quát hết chữ */
  border-radius: 8px;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
  box-shadow: 0 4px 10px rgba(0, 0, 0, 0.2);
  z-index: 2; /* Đảm bảo phần chữ nổi bật lên */
}

.flag-icon {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  object-fit: cover; /* Giữ cho ảnh cờ phủ đầy phần chứa */
  border-radius: 8px;
}

.text-overlay {
  position: absolute;
  top: 50%;
  left: 50%;
  transform: translate(-50%, -50%); /* Căn giữa chữ */
  font-size: 18px;
  font-weight: bold;
  color: white;
  text-shadow: 2px 2px 4px rgba(0, 0, 0, 0.6);
  text-align: center;
  z-index: 2; /* Đảm bảo chữ luôn hiển thị trên cờ */
}

    .slides {
      display: flex;
      transition: transform 0.5s ease-in-out;
      width: 100%;
    }

    .slide {
      min-width: 100%;
      height: 100%;
      object-fit: cover;
    }

    .btn {
      position: absolute;
      top: 50%;
      transform: translateY(-50%);
      background-color: rgba(0, 0, 0, 0.5);
      color: white;
      border: none;
      padding: 10px 15px;
      font-size: 24px;
      cursor: pointer;
      z-index: 1;
      border-radius: 50%;
    }

    .btn.left {
      left: 10px;
    }

    .btn.right {
      right: 10px;
    }
    h2 {
    font-size: 28px;
    color: red;
    margin: 30px 0 15px 0;
    position: relative;
    text-transform: uppercase;
    font-weight: 700;
    display: inline-block;
    padding-bottom: 10px;
    border-bottom: 3px solid #e74c3c;
}

h2::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: -5px;
    width: 50%;
    height: 4px;
    background-color: #f39c12;
    border-radius: 2px;
    transition: width 0.3s ease;
}

h2:hover::after {
    width: 100%;
}
.truyen-row {
    display: flex;
    justify-content: center;  /* Căn giữa các truyện */
    flex-wrap: wrap; /* Chạy xuống khi hết không gian */
    gap: 20px;
    padding: 20px 0;
    margin: 0 auto;
    max-width: 1200px; /* Giới hạn chiều rộng */
}

.truyen {
    border: 1px solid #ccc;
    padding: 10px;
    width: 200px;
    min-width: 200px;
    flex-shrink: 0;
    text-align: center;
    background-color: #fff;
    border-radius: 10px;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
    display: flex;
    flex-direction: column;
    justify-content: space-between; /* Căn đều nội dung theo chiều dọc */
    height: 300px; /* Đảm bảo chiều cao đủ */
    transition: transform 0.2s;
}

.truyen:hover {
    transform: scale(1.05);
}

/* Ảnh truyện */
.truyen img {
    max-width: 100%;
    height: 150px;
    object-fit: cover;
    border-radius: 6px;
    margin-bottom: 10px;
}

/* Tên truyện */
.truyen h2 {
    font-size: 16px;
    margin: 10px 0 5px 0;
    color: #333;
    height: 40px; /* Hạn chế chiều cao cho tên truyện */
}

/* Giá truyện */
.truyen p {
    font-weight: bold;
    color: #e53935;
    font-size: 14px;
    margin-top: auto;  /* Đảm bảo giá căn xuống dưới */
}
  </style>
</head>
<body>
<!-- <div class="promo-text">
  <img src="image/covietnam.png" alt="Lá cờ Việt Nam" class="flag-icon">
  <div class="text-overlay">
    Mừng ngày 30/04<br>Shop free ship toàn bộ đơn hàng!
  </div>
</div> -->

  <div class="banner-container">
    <button class="btn left" onclick="prevSlide()">&#10094;</button>
    <button class="btn right" onclick="nextSlide()">&#10095;</button>
    <div class="slides" id="slides">
      <img src="image/doraemon.jpg" class="slide" />
      <img src="image/doraemon.jpg" class="slide" />
      <img src="image/doraemon.jpg" class="slide" />
    </div>
  </div>
</div>

    <h2>Truyện hot</h2>
    <div class="truyen-row">
    <?php
    include '/xamppp/htdocs/webtruyen/backend/connect.php';
    $sql = "SELECT * FROM truyen_hot";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='truyen'>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Ảnh truyện' width='150'>";
            echo "<h2>" . htmlspecialchars($row['ten_truyen']) . "</h2>";
            echo "<p>Giá: " . number_format($row['gia_san_pham'], 0, ',', '.') . " VNĐ</p>";
            echo "</div>";
        }
    } else {
        echo "Không có truyện hot nào.";
    }
    mysqli_close($conn);
    ?>
    </div>
    <h2>Truyện mới</h2>
    <div class="truyen-row">
    <?php
    include '/xamppp/htdocs/webtruyen/backend/connect.php';
    $sql = "SELECT * FROM truyen_moi";
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        while ($row = mysqli_fetch_assoc($result)) {
            echo "<div class='truyen'>";
            echo "<img src='" . htmlspecialchars($row['image']) . "' alt='Ảnh truyện' width='150'>";
            echo "<h2>" . htmlspecialchars($row['ten_truyen']) . "</h2>";
            echo "<p>Giá: " . number_format($row['gia_san_pham'], 0, ',', '.') . " VNĐ</p>";
            echo "</div>";
        }
    } else {
        echo "Không có truyện mới nào.";
    }
    mysqli_close($conn);
    ?>
</div>










  <script>
  const slides = document.getElementById("slides");
  const totalSlides = slides.children.length;
  let currentIndex = 0;
  let isJumping = false; // Trạng thái đang nhảy về đầu

  function updateSlidePosition() {
    slides.style.transition = "transform 0.5s ease-in-out";
    slides.style.transform = `translateX(-${currentIndex * 100}%)`;
  }

  function nextSlide() {
    if (isJumping) return; // Chặn khi đang nhảy

    currentIndex++;
    updateSlidePosition();

    // Nếu đến slide clone → chuẩn bị nhảy về đầu
    if (currentIndex === totalSlides - 1) {
      isJumping = true;
      setTimeout(() => {
        slides.style.transition = "none";
        currentIndex = 0;
        slides.style.transform = `translateX(0%)`;
        isJumping = false;
      }, 500); // chờ hiệu ứng xong
    }
  }

  function prevSlide() {
    if (isJumping) return;
    if (currentIndex > 0) {
      currentIndex--;
      updateSlidePosition();
    }
  }

  updateSlidePosition(); // Khởi tạo
</script>

</body>
</html>