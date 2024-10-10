<?php
session_start();
require('./components/headerTC.php');
error_reporting(0);
?>

<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Home</a>
                    <span>Giỏ hàng</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Shop Cart Section Begin -->
<section class="shop-cart spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <form action="" method="post">
                    <div class="shop__cart__table">
                        <table>
                            <thead>
                                <tr>
                                    <th>SẢN PHẨM</th>
                                    <th>GIÁ</th>
                                    <th>SỐ LƯỢNG</th>
                                    <th>TỔNG</th>
                                    <th>Chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $cart = [];
                                if (isset($_SESSION['cart'])) {
                                    $cart = $_SESSION['cart'];
                                }

                                // Kiểm tra nếu giỏ hàng trống
                                if (empty($cart)) {
                                    // Giỏ hàng trống, hiển thị thông báo
                                    echo "<h3>Giỏ hàng của bạn trống. <a href='shop.php'>Mua sắm ngay</a></h3> <br>";
                                } else {
                                    // Giỏ hàng có sản phẩm, hiển thị sản phẩm
                                    $count = 0; // số thứ tự
                                    $total = 0;
                                    foreach ($cart as $item) {
                                        $totalQuantity += $item['quantity']; // Cộng dồn số lượng
                                        $priceToUse = ($item['disscounted_price'] == 0) ? $item['price'] : $item['disscounted_price'];
                                        $total += $item['quantity'] * $priceToUse; // Cộng dồn tổng tiền

                                        // Cắt ảnh chuỗi
                                        $images = explode(';', $item['images']);
                                        $firstImage = $images[0]; // Lấy ảnh đầu tiên
                                ?>
                                        <form action="updatecart.php?id=<?= $item['id'] ?>" method="post">
                                            <tr>
                                                <td class="cart__product__item">
                                                    <img src="<?= "admin/" . $firstImage ?>" alt="">
                                                    <div class="cart__product__item__title">
                                                        <h6 class="text-truncate-1"><?= $item['name'] ?></h6>
                                                    </div>
                                                </td>
                                                <td class="cart__price">
                                                    <?php
                                                    // Kiểm tra xem giá có giảm hay không
                                                    if ($item['disscounted_price'] == 0) {
                                                        // Giá không giảm
                                                        echo number_format($item['price'], 0, '', '.') . " VNĐ";
                                                    } else {
                                                        // Giá giảm
                                                        echo number_format($item['disscounted_price'], 0, '', '.') . " VNĐ";
                                                    }
                                                    ?>
                                                </td>
                                                <td class="cart__quantity">
                                                    <div class="input-group float-left">
                                                        <div class="input-next-cart d-flex">
                                                            <input type="button" value="-" class="button-minus" data-field="quantity">
                                                            <input type="number" step="1" min="1" max="<?= $item["stock"] ?>" value="<?= $item['quantity'] ?>" name="quantity" class="quantity-field-cart">
                                                            <input type="button" value="+" class="button-plus" data-field="quantity">
                                                        </div>
                                                    </div>
                                                </td>
                                                <td class="cart__total">
                                                    <?php
                                                    // Tính tổng tiền dựa trên giá đã giảm hoặc giá gốc
                                                    $priceToUse = ($item['disscounted_price'] == 0) ? $item['price'] : $item['disscounted_price'];
                                                    echo number_format($priceToUse * $item['quantity'], 0, '', '.') . " VNĐ";
                                                    ?>
                                                </td>
                                                <td class="cart__close">
                                                    <a href="">
                                                        <button type="submit" style="border: none; size: 5px;">
                                                            <span class="icon_loading"></span>
                                                        </button>
                                                        <a href="delete_cart.php?id=<?= $item['id'] ?>"><span class="icon_close"></span></a>
                                                    </a>
                                                </td>
                                            </tr>
                                        </form>
                                <?php
                                    } // Kết thúc vòng lặp foreach
                                } // Kết thúc else
                                ?>

                            </tbody>
                        </table>
                    </div>
                </form>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-md-6 col-sm-6">
                <div class="cart__btn">
                    <a href="shop.php">Tiếp tục mua sắm</a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
            </div>
            <div class="col-lg-4 offset-lg-2">
                <div class="cart__total__procced">
                    <h6>Tổng tiền</h6>
                    <ul>
                        <li>Số lượng <span><?= $totalQuantity ?></span></li>
                        <li>Tổng <span> <?= number_format($total, 0, '', '.') . " VNĐ" ?></span></li>
                    </ul>
                    <a href="thanhtoan.php" class="primary-btn">TIẾN HÀNH THANH TOÁN</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Shop Cart Section End -->


<?php
require('./components/footerTC.php');
?>