<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
/* Định dạng bảng */
/* Định dạng bảng */
table {
    width: 100%;
    border-collapse: collapse;
    margin-bottom: 20px;
    border: 1px solid #ddd;
}

th, td {
    padding: 12px;
    text-align: left;
    font-size: 14px;
}

th {
    background-color: #f4f4f4;
    font-weight: bold;
    text-transform: uppercase;
    border-bottom: 2px solid #ff5722;
}

/* Định dạng hàng thông tin đơn hàng */
.tr-order-header {
    background-color: #fff;
    font-weight: bold;
    font-size: 16px;
    padding: 15px;
    color: #ff5722;
    text-transform: uppercase;
    border-bottom: 2px solid #ff5722;
}

.tr-order-info {
    background-color: #fff;
    font-weight: bold;
}

.tr-order-info td {
    background-color: #fff;
    border: none;
}

.tr-order-info img {
    border-radius: 8px;
    box-shadow: 2px 2px 10px rgba(0, 0, 0, 0.1);
}

#total {
    font-weight: bold;
    color: #ff5722;
    font-size: 16px;
}

/* Số lượng có nút + và - */
button {
    background-color: #ff5722;
    color: white;
    border: none;
    padding: 8px 12px;
    font-size: 16px;
    cursor: pointer;
    border-radius: 5px;
    margin: 0 5px;
}

button:hover {
    background-color: #e64a19;
}

input[type="number"] {
    width: 50px;
    text-align: center;
    font-size: 16px;
    border: 1px solid #ddd;
    border-radius: 5px;
    padding: 5px;
}

/* Bố cục hai cột */
.container {
    display: flex;
    justify-content: space-between;
    align-items: flex-start;
}

.customer-section {
    width: 65%;
}

.order-section {
    width: 35%;
}

/* Định dạng hàng thông tin khách hàng */
.tr-customer-header {
    background-color: #fff;
    font-weight: bold;
    font-size: 16px;
    padding: 15px;
    color: #ff5722;
    text-transform: uppercase;
    border-bottom: 2px solid #ff5722;
}

.tr-customer-info td {
    background-color: #fff;
    border: none;
    padding: 10px;
}

.input info {
    width: 100%;
    padding: 10px;
    border: 1px solid #ccc;
    border-radius: 5px;
}
/* Ẩn modal khi chưa được kích hoạt */
.modal {
    display: none; /* Ẩn ban đầu */
    position: fixed;
    z-index: 1000;
    left: 0;
    top: 0;
    width: 100%;
    height: 100%;
    background-color: rgba(0,0,0,0.5); /* Làm tối nền */
    justify-content: center;
    align-items: center;
}
.modal-content {
    background: white;
    padding: 20px;
    border-radius: 10px;
    text-align: center;
}

/* Nút đóng modal */
.close {
    position: absolute;
    top: 10px;
    right: 15px;
    font-size: 20px;
    cursor: pointer;
}

/* Nút trở lại */
#backToForm {
    background-color: #007bff;
    color: white;
    border: none;
    padding: 10px;
    cursor: pointer;
    border-radius: 5px;
    margin-top: 10px;
}

#backToForm:hover {
    background-color: #0056b3;
}
    </style>
</head>
<body>
    <?php
    include '/xamppp/htdocs/webtruyen/backend/connect.php';
    $username = $_SESSION['email'];
    if (isset($_GET['tensp']) && isset($_GET['giasp']) && isset($_GET['soluong'])&& isset($_GET['img'])&& isset($_GET['mdh'])) {
        $ten_san_pham = mysqli_real_escape_string($conn,$_GET['tensp']);
        $gia_san_pham = mysqli_real_escape_string($conn, $_GET['giasp']);
        $so_luong = mysqli_real_escape_string($conn, $_GET['soluong']);
        $img = mysqli_real_escape_string($conn, $_GET['img']);
        $ma_don_hang = mysqli_real_escape_string($conn, $_GET['mdh']);
    ?>
<form id="paymentForm" action="luu-thong-tin.php" method="POST">
<input type="hidden" name="product_name" value="<?php echo $ten_san_pham; ?>">
<input type="hidden" name="product_price" value="<?php echo $gia_san_pham; ?>">
<input type="hidden" name="product_username" value="<?php echo $username; ?>">
<input type="hidden" name="product_mdh" value="<?php echo $ma_don_hang; ?>">
    <table>
            <tr class="tr-order-header">
            <th>Thông tin đơn hàng</th>
            </tr>
    <tr>
        <td class='tr-order-info'> Mã đơn hàng </td>
            <td class='tr-order-info'> Tên sản phẩm </td>
            <td class='tr-order-info'> Ảnh sản phẩm </td>
            <td class='tr-order-info'> Giá</td>
            <td class='tr-order-info'>Số lượng</td>
            <td class='tr-order-info'>Tổng</td>
    </tr>
    <tr>
        <td>
        <?php echo $ma_don_hang;?>
        </td>
            <td><?php echo $ten_san_pham;?>
            <br>
    </td>
    <td>
            <img src="<?php echo $img; ?>" alt="<?php echo $ten_san_pham; ?>" width="100">
            </td>
            <td><?php echo $gia_san_pham;?></td>
            <td>
        <button type="button" onclick="decreaseQuantity()">-</button>
        <input type="number" name="quantity" id="quantity" value="<?php echo $so_luong; ?>" min="1">
        <button type="button" onclick="increaseQuantity()">+</button>
            </td>
            <td id='total'>
            <?php echo $so_luong*$gia_san_pham;?>
            </td>
            <input type="hidden" name="product_tong" value="<?php echo $gia_san_pham * $so_luong; ?>">
    </tr> 
    </table>                                                                     
        <table border='1'>
            <tr class="tr-customer-header">
                <th>Thông tin khách hàng</th>
            </tr>
            <tr class="tr-customer-info">
                <td><input type="text" class='input info' placeholder='Tên khách hàng' id='customerName' name="customer_name"></td>
            </tr>
            <tr class="tr-customer-info">
                <td><input type="text" class='input info' placeholder='Số điện thoại' id='customerPhone'name="customer_phone"></td>
            </tr>
            <tr class="tr-customer-info">
                <td><input type="text" class='input info' placeholder='Địa chỉ giao hàng' id='customerAddress' name="customer_address"></td>
            </tr>
        </table>
        <table>
            <tr>
                <th>Hình thức thanh toán</th>
            </tr>
            <tr>
                <td><input type='radio' name='payment' value='Thanh toán khi nhận hàng' required>Thanh toán khi nhận hàng</input></td>
            </tr>
            <tr>
            <td><input type='radio' name='payment' value='Chờ xác nhận đã thanh toán'>Thanh toán bằng chuyển khoản</input></td>
            </tr>
        </table>
        <table>
            <button type="button" id="payBtn">Thanh toán</button>
        </table>
        <a href="trang-chu.php?page=giohang">Quay lai gio hang</a>
</form>
    <div id="bankModal" class="modal">
    <div class="modal-content">
        <span class="close">&times;</span>
        <h3>Thông tin tài khoản ngân hàng</h3>
        <p><strong>Ngân hàng:</strong> Vietcombank</p>
        <p><strong>Số tài khoản:</strong> 123456789</p>
        <p><strong>Chủ tài khoản:</strong> Nguyễn Văn A</p>
        <p><strong>Nội dung chuyển khoản:</strong> Thanh toán đơn hàng <?php echo $ma_don_hang?> </p>
        <button id="backToForm">Trở lại</button>
    </div>
    </div>
<?php
    }
?>
<script>
let price = <?php echo $gia_san_pham; ?>; // Giá sản phẩm
// hàm số lượng
function increaseQuantity() {
    let qty = document.getElementById("quantity");
    qty.value = parseInt(qty.value) + 1;
    updateTotal();
}
function decreaseQuantity() {
    let qty = document.getElementById("quantity");
    if (parseInt(qty.value) > 1) {
        qty.value = parseInt(qty.value) - 1;
        updateTotal();
    }
}
// hàm giá sản phẩm theo số lượng chọn
function updateTotal() {
    let qty = document.getElementById("quantity").value;
    document.getElementById("total").innerText = (qty * price).toLocaleString() + "đ";
}
// hàm hình thức thanh toán
document.addEventListener("DOMContentLoaded", function() {
        const payBtn = document.getElementById("payBtn");
        const bankModal = document.getElementById("bankModal");
        const closeModal = document.querySelector(".close");
        const backToFormBtn = document.getElementById("backToForm");
        const form = document.getElementById("paymentForm");

        payBtn.addEventListener("click", function() {
            event.preventDefault(); // Ngăn form gửi ngay lập tức

            const customerName = document.getElementById("customerName").value.trim();
            const customerPhone = document.getElementById("customerPhone").value.trim();
            const customerAddress = document.getElementById("customerAddress").value.trim();
            const paymentMethod = document.querySelector('input[name="payment"]:checked');
            // kiểm tra thông tin đã nhập đầy đủ chưa
            if (!customerName || !customerPhone || !customerAddress) {
                alert("Vui lòng nhập đầy đủ thông tin khách hàng!");
                return;
            }
            if (!paymentMethod) {
                alert("Vui lòng chọn phương thức thanh toán!");
                return;
            }
            if (paymentMethod.value === "bank") {
                console.log("Hiển thị modal");
                bankModal.style.display = "flex"; // Hiện modal
            } else {
                form.submit(); // Gửi form nếu chọn "Thanh toán khi nhận hàng"
            }
        });

        // Đóng modal khi nhấn "Trở lại"
backToFormBtn.addEventListener("click", function(event) {
    event.stopPropagation(); // Ngăn sự kiện lan sang window
    bankModal.style.display = "none";
});

// Đóng modal khi nhấn dấu X
closeModal.addEventListener("click", function(event) {
    event.stopPropagation(); // Ngăn sự kiện lan sang window
    bankModal.style.display = "none";
});

// Đóng modal khi click bên ngoài (chỉ khi click vào vùng nền)
window.addEventListener("click", function(event) {
    if (event.target === bankModal) {
        console.log("Đóng modal vì click ra ngoài"); // Kiểm tra log
        bankModal.style.display = "none";
    }
});
    });
</script>
</body>
</html>