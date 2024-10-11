<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Đăng nhập hệ thống</title>

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>
<body style="background-color: #ffff">
    <style>
        .login_oueter {
            width: 360px;
            max-width: 100%;
            
        }
        .logo_outer{
            text-align: center;
        }
        .logo_outer img{
            width:120px;
            margin-bottom: 40px;
        }
    </style>
    <div class="container">
        <div class="row d-flex justify-content-center mt-5" style="height: 100vh;">
          <div class="login_oueter">
            <form action="" method="post" id="login" autocomplete="off" class="bg-light border p-3">
              <div class="form-row">
                <h4 class="title my-3 text-center">ĐĂNG NHẬP ADMIN</h4>
                <?php echo $errorMsg?>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span style="padding: 0.62rem 0.62rem; border-radius: 0;" class="input-group-text" id="basic-addon1">
                        <i class="fas fa-user"></i>
                        </span>
                    </div>
                    <input name="username" type="text" value="" class="input form-control" id="username" placeholder="Username" aria-label="Username" aria-describedby="basic-addon1" />
                  </div>
                </div>
                <div class="col-12">
                  <div class="input-group mb-3">
                    <div class="input-group-prepend">
                      <span style="padding: 0.62rem 0.62rem; border-radius: 0;" class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                    </div>
                    <input name="password" type="password" value="" class="input form-control" id="password" placeholder="password" required="true" aria-label="password" aria-describedby="basic-addon1" />
                    <div class="input-group-append">
                      <span style="padding: 0.62rem 0.62rem; border-radius: 0;" class="input-group-text" onclick="password_show_hide_login();">
                        <i class="fas fa-eye" id="show_eye"></i>
                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                      </span>
                    </div>
                  </div>
                </div>
                <div class="col-6">
                  <div class="form-group form-check text-left">
                    <input type="checkbox" name="remember" class="form-check-input" id="remember_me" />
                    <label class="form-check-label" for="remember_me">Nhớ mật khẩu</label>
                  </div>
                </div>
                <div class="col-12 mt-3">
                    <button class="btn btn-primary w-100" type="submit" name="login">Đăng nhập</button>
                  </div>
                
              </div>
            </form>
          </div>
        </div>
      </div>

    <script>
        function password_show_hide_login() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye");
            var hide_eye = document.getElementById("hide_eye");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }

        function password_show_hide_register() {
            var x = document.getElementById("password");
            var show_eye = document.getElementById("show_eye_pw");
            var hide_eye = document.getElementById("hide_eye_pw");

            var show_eye_conirm = document.getElementById("show_eye_conirm");
            var hide_eye_conirm = document.getElementById("hide_eye_conirm");
            hide_eye.classList.remove("d-none");
            if (x.type === "password") {
                x.type = "text";
                show_eye.style.display = "none";
                hide_eye.style.display = "block";

                show_eye_conirm.style.display = "none";
                hide_eye_conirm.style.display = "block";
            } else {
                x.type = "password";
                show_eye.style.display = "block";
                hide_eye.style.display = "none";

                show_eye_conirm.style.display = "block";
                hide_eye_conirm.style.display = "none";
            }
        }
    </script>
</body>
</html>