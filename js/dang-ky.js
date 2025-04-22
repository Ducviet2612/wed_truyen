document.getElementById('registrationForm').addEventListener('submit', function(e) {
    e.preventDefault(); // Ngăn chặn việc tải lại trang
  
    const username = document.getElementById('username').value;
    const email = document.getElementById('email').value;
    const password = document.getElementById('password').value;
    const confirmPassword = document.getElementById('confirmPassword').value;
    const message = document.getElementById('message');
  
    // Kiểm tra mật khẩu
    if (password !== confirmPassword) {
      message.textContent = "Mật khẩu không khớp!";
      return;
    }
  
    // Xử lý đăng ký thành công (ví dụ: gửi dữ liệu đến máy chủ)
    message.textContent = "Đăng ký thành công!";
    message.style.color = "green";
  
    // Dọn sạch form sau khi đăng ký thành công
    document.getElementById('registrationForm').reset();
  });
  