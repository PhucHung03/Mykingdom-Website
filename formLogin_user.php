
<?php 
    require('./components/headerTC.php');
?>

<div class="container">
        <div class="row d-flex justify-content-center align-items-center m-0" style="height: 100vh;">
            <div class="login_oueter">
                <form action="clsLoginUser.php" method="post" id="login" autocomplete="off" class="bg-light border p-3">
                    <h4 class="my-3 text-center">ĐĂNG NHẬP</h4>
                    <?php echo $errorMsg?>
                    <div class="form-row">
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-user"></i></span>
                                </div>
                                <input name="email" type="text" value="" class="input form-control" id="email"
                                    placeholder="email" aria-label="email" aria-describedby="basic-addon1" />
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                    <span class="input-group-text" id="basic-addon1"><i class="fas fa-lock"></i></span>
                                </div>
                                <input name="pass" type="password" value="" class="input form-control" id="pass"
                                    placeholder="pass" required="true" aria-label="pass"
                                    aria-describedby="basic-addon1" />
                                <div class="input-group-append">
                                    <span class="input-group-text" onclick="password_show_hide();">
                                        <i class="fas fa-eye" id="show_eye"></i>
                                        <i class="fas fa-eye-slash d-none" id="hide_eye"></i>
                                    </span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <button class="btn btn-primary w-100" type="submit" name="sblogin">Đăng nhập</button>
                        </div>
                        <div class="col-sm-12 pt-3 text-right">
                            <p>Bạn chưa có tài khoản ? <a href="#">Đăng ký</a></p>
                        </div>

                    </div>
                </form>
            </div>
        </div>
    </div>


    <script>
        function password_show_hide() {
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
            var password = document.getElementById("password_register");
            var password_confirm = document.getElementById("password_confirm");
            var show_eye = document.getElementById("show_eye_register");
            var hide_eye = document.getElementById("hide_eye_register");
            hide_eye.classList.remove("d-none");
            if (password.type === "password") {
                password.type = "text";
                password_confirm.type = "text";

                show_eye.style.display = "none";
                hide_eye.style.display = "block";
            } else {
                password.type = "password";
                password_confirm.type = "password";

                show_eye.style.display = "block";
                hide_eye.style.display = "none";
            }
        }


    </script>

<?php 
    require('./components/footerTC.php');
?>