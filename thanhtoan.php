<?php
error_reporting(0);
session_start();
require('./conn/conn.php');
$cart = [];
if (isset($_SESSION['cart'])) {
    $cart = $_SESSION['cart'];
}

// Kiểm tra nếu nhấn nút "Đặt hàng"
if (isset($_POST['btdathang'])) {
    // Kiểm tra xem giỏ hàng có trống không
    if (empty($cart)) {
        echo "<script>alert('Giỏ hàng của bạn đang trống. Vui lòng thêm sản phẩm vào giỏ hàng.');
         window.location.href='shop.php';</script>";
         exit();
    }

    // Lấy thông tin khách hàng
    $name = $_POST['hoTen'];
    $email = $_POST['email'];
    $diachi = $_POST['diaChi'];
    $sdt = $_POST['sdt'];
    $ghiChu = $_POST['ghiChu'];

    // Thêm vào bảng order
    $sqli = "INSERT INTO orders 
             VALUES(0, 0, '$name', '$email', '$diachi', '$sdt', '$ghiChu', 'Processing', now(), now())";
    
    if (mysqli_query($conn, $sqli)) {
        $last_order_id = mysqli_insert_id($conn);
        // Sau đó thêm vào order_detail
        foreach ($cart as $item) {
            $masp = $item['id'];
            $disscounted_price = $item['disscounted_price'];
            $totalQuantity = $item['quantity']; // Số lượng từng sản phẩm
            $priceToUse = ($item['disscounted_price'] == 0) ? $item['price'] : $item['disscounted_price'];
            $total = $item['quantity'] * $priceToUse; 
            
            $sqli2 = "INSERT INTO order_details 
                      VALUES(0, $last_order_id, $masp, $disscounted_price, $totalQuantity, $total, now(), now())";
            
            mysqli_query($conn, $sqli2);
        }
    }

    // Xóa giỏ hàng sau khi đặt hàng
    unset($_SESSION["cart"]);
    header("Location: thank.php");

}
require('./components/headerTC.php');
?>


<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="./index.html"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="cart.php"><span>Giỏ hàng</span></a>
                    
                    <span>Thanh toán</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Checkout Section Begin -->
<section class="checkout spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <h6 class="coupon__link"><span class="icon_tag_alt mr-1"></span>Tiến hành thanh toán đơn hàng <a class="text-primary" href="shop.php">Trở lại cửa hàng</a> </h6>
            </div>
        </div>
        <form action="" method="post" class="checkout__form">
            <div class="row">
                <div class="col-lg-8">
                    <h5>CHI TIẾT THANH TOÁN</h5>
                    <div class="row">
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Họ tên <span>*</span></p>
                                <input type="text" name="hoTen" required>
                            </div>
                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">
                            <div class="checkout__form__input">
                                <p>Email <span>*</span></p>
                                <input type="text"  name="email" required>
                            </div>
                        </div>
                        <div class="col-lg-12">

                            <div class="checkout__form__input">
                                <p>Địa chỉ <span>*</span></p>
                                <input type="text" name="diaChi" required>

                            </div>

                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Số điện thoại <span>*</span></p>
                                <input type="text" name="sdt" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="checkout__form__input">
                                <p>Ghi chú<span></span></p>
                                <input type="text" name="ghiChu">
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-4">
                    <div class="checkout__order">
                        <h5>ĐƠN HÀNG</h5>
                        <div class="checkout__order__product">
                            <ul>
                                <li>

                                    <span class="top__text">Sản phẩm</span>
                                </li>
                                <?php
                                $cart = [];
                                if (isset($_SESSION['cart'])) {
                                    $cart = $_SESSION['cart'];
                                }
                                // var_dump($cart);die();
                                $count = 0; //số thứ tự
                                $total = 0;
                                $stt = 0;
                                foreach ($cart as $item) {
                                    $totalQuantity += $item['quantity']; // Cộng dồn số lượng
                                    $priceToUse = ($item['disscounted_price'] == 0) ? $item['price'] : $item['disscounted_price'];
                                    $total += $item['quantity'] * $priceToUse; // Cộng dồn tổng tiền
                                    // cắt ảnh chuỗi
                                    $images = explode(';', $item['images']);
                                    $firstImage = $images[0]; // Lấy ảnh đầu tiên
                                    $stt++;
                                ?>
                                    <li><?= $stt ?>. <?= $item['name'] ?> x<?= $item['quantity'] ?><span><?= number_format($priceToUse * $item['quantity'], 0, '', '.') . " VNĐ";?></span></li>
                                <?php } ?>
                            </ul>
                        </div>
                        <div class="checkout__order__total">
                            <ul>
                                <li>Tổng <span><?= number_format($total, 0, '', '.') . " VNĐ" ?></span></li>
                            </ul>
                        </div>
                        <div class="checkout__order__widget">

                            <label for="check-payment">
                                Chuyển khoản
                                <input type="checkbox" id="check-payment">
                                <span class="checkmark"></span>
                            </label>
                            <label for="paypal">
                                Thanh toán khi nhận hàng
                                <input type="checkbox" id="paypal">
                                <span class="checkmark"></span>
                            </label>
                        </div>
                        <button type="submit" class="site-btn" name="btdathang">Đặt hàng</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</section>
<!-- Checkout Section End -->
<?php
require('./components/footerTC.php');
?>