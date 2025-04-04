<?php
session_start();
require("./conn/conn.php");
if (isset($_POST['addCard'])) {
        $id = $_POST['pid'];
        $quantity = $_POST['quantity'];
        $cart = [];
        if (isset($_SESSION['cart'])) {
            $cart = $_SESSION['cart'];
        }

        $isFound = false;
        for ($i = 0; $i < count($cart); $i++) {
            if ($cart[$i]['id'] == $id) {
                $cart[$i]['quantity'] = intval($cart[$i]['quantity']) + intval($quantity);
                $isFound = true;
                break;
            }
        }
        if (!$isFound) { //khong tim thay san pham trong gio hang
            $sql_str = "select*from products where id =$id";
            $result = mysqli_query($conn, $sql_str);
            $product = mysqli_fetch_assoc($result);
            $product['quantity'] = $quantity;
            $cart[] = $product;
        }

        //update session
        $_SESSION['cart'] = $cart;
}

require('./components/headerTC.php');
$idsp = $_GET['id'];
$sql_str = "select products.id as pid,summary,description, products.name as pname,stock,price,disscounted_price,
    products.images, categories.name as cname, brands.name as bname 
    from products,categories,brands 
    where products.category_id= categories.id and products.brand_id=brands.id and 
    products.id= $idsp";
$result = mysqli_query($conn, $sql_str);
$row = mysqli_fetch_assoc($result);
$arr = explode(";", $row["images"]);
?>
<!-- Breadcrumb Begin -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <a href="shop.php">Cửa hàng</a>
                    <span><?= $row['pname'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->


<!-- Product Details Section Begin -->
<section class="product-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-md-6">
                <div class="product__details__pic">
                    <div class="product__details__pic__left product__thumb nice-scroll">
                        <?php
                        for ($i = 0; $i < count($arr); $i++) {
                        ?>
                            <a class="pt <?php echo ($i == 0) ? 'active' : ''; ?>" href="#product-<?= $i + 1 ?>" onclick="swapImage('admin/<?= $arr[$i] ?>', <?= $i ?>)">
                                <img src="<?= "admin/" . $arr[$i] ?>">
                            </a>
                        <?php } ?>
                    </div>

                    <div class="product__details__slider__content">
                        <div class="product__details__pic__slider owl-carousel">
                            <img id="mainImage" class="product__big__img" src="<?= "admin/" . $arr[0] ?>" alt="<?= $row['pname'] ?>">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="product__details__text">
                    <h3><?= $row['pname'] ?> <span><?= $row['cname'] ?></span></h3>
                    <div class="rating">
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <i class="fa fa-star"></i>
                        <span>( 138 bình luận )</span>
                    </div>

                    <div class="product__details__price">
                        <?php if ($row["disscounted_price"] > 0): ?>
                            <?= number_format($row["disscounted_price"], 0, '', '.') . 'VNĐ' ?> <span><?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?></span>
                        <?php else: ?>
                            <?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?>
                        <?php endif; ?></span>
                    </div>
                    <p class="text-truncate-4-pd-details"><?= $row["summary"] ?></p>


                    <div class="product__details__button">
                        <form method="post">

                            <div class="input-group d-flex align-items-center">
                                <span class="text-dark">Số lượng</span>
                                <div class="input-next d-flex mx-4">
                                    <input type="button" value="-" class="button-minus" data-field="quantity">
                                    <input type="number" step="1" max="<?= $row["stock"] ?>" value="1" name="quantity" class="quantity-field">
                                    <input type="button" value="+" class="button-plus" data-field="quantity">
                                </div>
                                <!-- <input type="hidden" value="1" name="qty"> -->
                                <span class="text-dark"><?= $row["stock"] ?> sản phẩm có sẵn</span>
                                <input type="hidden" value="<?= $idsp ?>" name="pid">

                            </div>


                            <div class="quantity">

                                <button style="border: none;" type="submit" class="cart-btn btn-primary" name="addCard"><span class="icon_bag_alt"></span> Thêm vào giỏ</button>
                            </div>
                        </form>
                        <ul>
                            <li><a href="#"><span class="icon_heart_alt"></span></a></li>
                            <li><a href="#"><span class="icon_adjust-horiz"></span></a></li>
                        </ul>
                    </div>

                </div>
            </div>
            <div class="col-lg-12">
                <div class="product__details__tab">
                    <ul class="nav nav-tabs" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#tabs-1" role="tab">Mô tả</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#tabs-2" role="tab">Bình luận </a>
                        </li>

                    </ul>
                    <div class="tab-content">
                        <div class="tab-pane active" id="tabs-1" role="tabpanel">
                            <h6>Mô tả sản phẩm</h6>
                            <p><?= $row["description"] ?></p>

                        </div>

                        <div class="tab-pane" id="tabs-2" role="tabpanel">
                            <h6>Bình luận</h6>

                            <div class="row">
                                <div class="col-md-6">
                                    <h4 class="mb-4">Tính năng đang được cập nhật!</h4>

                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
<!-- Product Details Section End -->
<script>
    function swapImage(imageUrl, index) {
        // Thay đổi ảnh lớn
        document.getElementById('mainImage').src = imageUrl;

        // Loại bỏ lớp 'active' từ tất cả các ảnh thumb
        var thumbs = document.querySelectorAll('.product__thumb .pt');
        thumbs.forEach(function(thumb) {
            thumb.classList.remove('active');
        });

        // Thêm lớp 'active' cho ảnh thumb được chọn
        thumbs[index].classList.add('active');
    }

    // Tăng giảm số lượng sản phẩm giỏ hàng và chi tiết sản phẩm

    document.addEventListener('DOMContentLoaded', function() {
        const minusButton = document.querySelector('.button-minus');
        const plusButton = document.querySelector('.button-plus');
        const quantityInput = document.querySelector('.quantity-field');

        // Sự kiện khi bấm nút trừ
        minusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            if (currentValue > 1) {
                quantityInput.value = currentValue - 1;
            }
            console.log("Current value after decrement: " + quantityInput.value); // In giá trị sau khi giảm
        });

        // Sự kiện khi bấm nút cộng
        plusButton.addEventListener('click', function() {
            let currentValue = parseInt(quantityInput.value);
            let maxValue = parseInt(quantityInput.getAttribute('max'));
            if (currentValue < maxValue) {
                quantityInput.value = currentValue + 1;
            }
            console.log("Current value after increment: " + quantityInput.value); // In giá trị sau khi tăng
        });
    });
</script>


<?php
require("./components/scriptTC.php");
require("./components/footerTC.php");
?>