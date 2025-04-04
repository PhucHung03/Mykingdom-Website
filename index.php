<?php
session_start();
require("./components/headerTC.php");
require("./components/bannerTC.php");
?>


<!-- Product Section Begin -->
<section class="product spad" style="background-color: #F4F4F9;">

    <!-- CATER -->
    <section class="container cate-home" style="background-color: #ffffff; border-radius: 10px;">

        <div class="section-title pt-2" style="margin-bottom: 30px;">
            <h4>Danh mục sản phẩm</h4>
        </div>

        <div class="row g-1 mb-4 mt-2 pb-4">
            <div class="row g-1 mb-4 mt-2 pb-4 d-flex flex-wrap justify-content-start">
                <?php
                require("./conn/conn.php");
                $sql_str = "SELECT * FROM categories ORDER BY name DESC";
                $result = mysqli_query($conn, $sql_str);
                while ($row = mysqli_fetch_assoc($result)) {
                    $arr = explode(";", $row["images"]);
                ?>
                    <div class="col-lg-2 col-md-3 col-sm-6 text-center p-1 cate-gory">
                        <!-- Chuyển danh mục qua trang shop.php và lọc theo slug -->
                        <a href="shop.php?category=<?= $row['slug'] ?>">
                            <img style="width: 70%;" src="<?= 'admin/' . $arr[0] ?>" alt="">
                        </a>
                        <div class="mt-2">
                            <!-- Chuyển danh mục qua trang shop.php và lọc theo slug -->
                            <a class="cate-name text-dark" href="shop.php?category=<?= $row['slug'] ?>"><?= $row['name'] ?></a>
                        </div>
                    </div>
                <?php
                }
                ?>
            </div>
        </div>

    </section>
    <!-- CATE END-->


    <div class="container" style="background-color: #ffffff; border-radius: 10px;">

        <div class="row pt-3">
            <div class="col-lg-4 col-md-4">
                <div class="section-title">
                    <h4>Sản phẩm</h4>
                </div>
            </div>

        </div>
        <div class="row property__gallery">
            <!-- hien thi san pham -->
            <?php
            require("./conn/conn.php");
            $sql_str = "SELECT*, round((price - disscounted_price)/price*100) as discount FROM `products` ORDER BY `discount`";
            $result = mysqli_query($conn, $sql_str);
            while ($row = mysqli_fetch_assoc($result)) {
                $arr = explode(";", $row["images"]);
            ?>
                <div class="col-lg-3 col-md-4 col-sm-6 mix sach-1">
                    <div class="product__item sale">
                        <div class="product__item__pic set-bg" data-setbg="<?= 'admin/' . $arr[0] ?>">
                            <?php if (isset($row["discount"]) && $row["discount"] > 0 && $row["discount"] < 100): ?>
                                <div class="label_right sale"><?= $row['discount'] ?>%</div>
                            <?php endif; ?>
                            <ul class="product__hover">
                                <li><a href="<?= 'admin/' . $arr[0] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                <li><a href="product-details.php?id=<?= $row['id'] ?>"><span class="icon_search_alt"></span></a></li>

                            </ul>

                        </div>

                        <div class="product__item__text">
                            <h6 class="text-truncate-1"><a href="#"><?= $row["name"] ?></a></h6>
                            <div class="product__price">
                                <?php if ($row["disscounted_price"] > 0): ?>
                                    <?= number_format($row["disscounted_price"], 0, '', '.') . 'VNĐ' ?> <span><?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?></span>
                                <?php else: ?>
                                    <?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?>
                                <?php endif; ?>
                            </div>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

            <div class="col-lg-12 text-center mb-4">
                <a href="shop.php" class="btn btn-outline-primary">Xem tất cả</a>
            </div>
        </div>

    </div>




</section>
<!-- Trend Section Begin -->
<section class="trend spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>Mới nhất</h4>
                    </div>
                    <?php
                    require("./conn/conn.php");
                    $sql_str3 = "select*from products order by created_at desc limit 0,3";
                    $result3 = mysqli_query($conn, $sql_str3);
                    while ($row3 = mysqli_fetch_assoc($result3)) {
                        $arr3 = explode(";", $row3["images"]);
                    ?>
                    <a href="product-details.php?id=<?= $row['id'] ?>">  
                    <div class="trend__item">
                        <div class="trend__item__pic">
                            <img src="<?= "admin/" . $arr3[0] ?>" style="width: 90px;" alt="">
                        </div>
                        <div class="trend__item__text">
                            <h6><?= $row3['name'] ?></h6>
                            <div class="rating">
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                                <i class="fa fa-star"></i>
                            </div>
                            <div class="product__price"><?= number_format($row3["price"], 0, '', '.') . 'VNĐ' ?></div>
                        </div>
                    </div>
                    </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>BÁN CHẠY</h4>
                    </div>
                    <?php
                    require("./conn/conn.php");
                    $sql_str = "select * from products order by name desc limit 0,3";
                    $result = mysqli_query($conn, $sql_str);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr = explode(";", $row["images"]);
                    ?>
                        <a href="product-details.php?id=<?= $row['id'] ?>">
                            <div class="trend__item">
                                <div class="trend__item__pic">
                                    <img src="<?= "admin/" . $arr[0] ?>" style="width: 90px;" alt="">
                                </div>
                                <div class="trend__item__text">
                                    <h6><?= $row["name"] ?></h6>
                                    <div class="rating">
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                        <i class="fa fa-star"></i>
                                    </div>
                                    <div class="product__price"><?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?></div>
                                </div>
                            </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 col-sm-12">
                <div class="trend__content">
                    <div class="section-title">
                        <h4>HOT SALE</h4>
                    </div>
                    <?php
                    require("./conn/conn.php");
                    $sql_str = "select * from products order by disscounted_price desc limit 0,3";
                    $result = mysqli_query($conn, $sql_str);
                    while ($row = mysqli_fetch_assoc($result)) {
                        $arr = explode(";", $row["images"]);
                    ?>
                        <a href="product-details.php?id=<?= $row['id'] ?>">
                        <div class="trend__item">
                            <div class="trend__item__pic">
                                <img src="<?= "admin/" . $arr[0] ?>" style="width: 90px;" alt="">
                            </div>
                            <div class="trend__item__text">
                                <h6><?= $row["name"] ?></h6>
                                <div class="rating">
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                    <i class="fa fa-star"></i>
                                </div>
                                <div class="product__price">
                                    <?php if ($row["disscounted_price"] > 0): ?>
                                        <?= number_format($row["disscounted_price"], 0, '', '.') . 'VNĐ' ?> <span><?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?></span>
                                    <?php else: ?>
                                        <?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        </a>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Trend Section End -->
<!-- Services Section Begin -->
<section class="services spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-car"></i>
                    <h6>Miễn phí vận chuyển</h6>
                    <p>Cho tất cả các đơn hàng trên 200.000đ</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-money"></i>
                    <h6>Đảm bảo hoàn tiền</h6>
                    <p>Nếu sản phẩm có vấn đề</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-support"></i>
                    <h6>Hỗ trợ trực tuyến 24/7</h6>
                    <p>Hỗ trợ chuyên dụng</p>
                </div>
            </div>
            <div class="col-lg-3 col-md-4 col-sm-6">
                <div class="services__item">
                    <i class="fa fa-headphones"></i>
                    <h6>Thanh toán an toàn</h6>
                    <p>Thanh toán an toàn 100%</p>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Services Section End -->






<?php
require('./components/footerTC.php');
?>