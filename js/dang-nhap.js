// Lấy các phần tử từ form
const loginForm = document.getElementById('loginForm');
const emailInput = document.getElementById('email');
const passwordInput = document.getElementById('password');
const emailError = document.getElementById('emailError');
const passwordError = document.getElementById('passwordError');

// Hàm kiểm tra email hợp lệ
function isValidEmail(email) {
  const emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
  return emailPattern.test(email);
}

// Hàm xử lý khi người dùng submit form
loginForm.addEventListener('submit', (event) => {
  let isValid = true;

  // Kiểm tra email
  if (!isValidEmail(emailInput.value)) {
    emailError.textContent = 'Email không hợp lệ!';
    emailError.style.display = 'block';
    isValid = false;
  } else {
    emailError.style.display = 'none';
  }

  // Kiểm tra mật khẩu
  if (passwordInput.value.length < 6) {
    passwordError.textContent = 'Mật khẩu phải có ít nhất 6 ký tự!';
    passwordError.style.display = 'block';
    isValid = false;
  } else {
    passwordError.style.display = 'none';
  }

  // Nếu có lỗi, ngăn không cho gửi form
  if (!isValid) {
    event.preventDefault();
  } else {
    // Giả lập gửi form (thực tế sẽ gửi đến backend xử lý)
    alert('Đăng nhập thành công!');
  }
});