<?php
require('./components/headerTC.php');
require('./conn/conn.php');

if (isset($_POST['register'])) {
    // Lấy thông tin từ form và bảo mật thông tin
    $email = mysqli_real_escape_string($conn, $_POST['email_register']);
    $name = mysqli_real_escape_string($conn, $_POST['full_name']);
    $password = mysqli_real_escape_string($conn, $_POST['password']);
    $phone = mysqli_real_escape_string($conn, $_POST['phone']);
    $address = mysqli_real_escape_string($conn, $_POST['address']);

    // Kiểm tra xem email hoặc số điện thoại đã tồn tại chưa
    $checkQuery = "SELECT * FROM users WHERE email = '$email' OR phone = '$phone'";
    $result = mysqli_query($conn, $checkQuery);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Email hoặc số điện thoại đã tồn tại. Vui lòng thử lại.');</script>";
    } else {
        // Mã hóa mật khẩu trước khi lưu vào cơ sở dữ liệu
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        // Thực hiện truy vấn chèn
        $sqlstr = "INSERT INTO users (name, email, email_verified_at, password, 
        remember_token, phone, address, status, created_at, updated_at)
         VALUES ('$name', '$email', NOW(), '$hashedPassword', NULL,
          '$phone', '$address', 'Active', NOW(), NOW())";

        // Thực hiện truy vấn và kiểm tra kết quả
        if (mysqli_query($conn, $sqlstr)) {
            echo "<script>alert('Đăng ký thành công!');</script>";
        } else {
            echo "<script>alert('Lỗi: " . mysqli_error($conn) . "');</script>";
        }
    }
}
?>

<div class="container my-5">
    <div class="row d-flex justify-content-center align-items-center m-0">
        <div class="login_outer">

            <form action="" method="post" id="register" autocomplete="off" class="p-3">
                <h4 class="my-3 text-center">ĐĂNG KÝ TÀI KHOẢN</h4>
                <div class="form-row">

                    <div class="col-12">
                        <div class="input-group mb-0">
                            <label class="w-100 text-dark" for="email_res">Địa chỉ Email</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-envelope"></i></span>
                            </div>
                            <input name="email_register" type="email" class="input form-control" id="email_res" required placeholder="Email" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group my-0">
                            <label class="w-100 text-dark" for="full_name">Họ và tên</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                            </div>
                            <input name="full_name" type="text" class="input form-control" id="full_name" required placeholder="Họ và tên" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group my-0">
                            <label class="w-100 text-dark" for="password_register">Mật khẩu</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                            </div>
                            <input name="password" type="password" class="input form-control" id="password_register" required placeholder="Mật khẩu" />
                            <div class="input-group-append">
                                <span class="input-group-text" onclick="password_show_hide_register();">
                                    <i class="fas fa-eye" id="show_eye_register"></i>
                                    <i class="fas fa-eye-slash d-none" id="hide_eye_register"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group my-0">
                            <label class="w-100 text-dark" for="phone">Số điện thoại</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-phone"></i></span>
                            </div>
                            <input name="phone" type="text" class="input form-control" id="phone" required placeholder="Số điện thoại" />
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="input-group mt-0 mb-3">
                            <label class="w-100 text-dark" for="address">Địa chỉ</label>
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"><i class="fas fa-map-marker"></i></span>
                            </div>
                            <input name="address" type="text" class="input form-control" id="address" required placeholder="Địa chỉ" />
                        </div>
                    </div>

                    <div class="col-12">
                        <button class="btn btn-primary w-100" type="submit" name="register">Đăng ký</button>
                    </div>
                    <div class="col-sm-12 pt-3 text-center">
                        <a href="#">Quên mật khẩu</a>
                    </div>

                </div>
                <div class="col-12 line"></div>
                <div class="col-12 text-center">
                    <a href="formLogin_user.php" class="btn btn-success w-50">Đăng nhập</a>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function password_show_hide_register() {
        var password = document.getElementById("password_register");
        var show_eye = document.getElementById("show_eye_register");
        var hide_eye = document.getElementById("hide_eye_register");

        if (password.type === "password") {
            password.type = "text";
            show_eye.style.display = "none";
            hide_eye.style.display = "block";
        } else {
            password.type = "password";
            show_eye.style.display = "block";
            hide_eye.style.display = "none";
        }
    }
</script>

<?php
require('./components/footerTC.php');
?>
