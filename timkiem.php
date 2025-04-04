<?php
session_start();
require("./components/headerTC.php");

$tukhoa = $_GET['tukhoa'];
?>

<div>
    <!-- Shop Section Begin -->
    <section class="shop spad">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-3">
                    <div class="shop__sidebar">
                        <div class="sidebar__categories">
                            <div class="section-title">
                                <!-- danh mục -->
                                <h4>DANH MỤC</h4>
                            </div>
                            <div class="categories__accordion">
                                <div class="accordion" id="accordionExample">
                                    <div class="card">
                                        <?php

                                        require("./conn/conn.php");
                                        $sql_str = "select * from categories order by name desc";
                                        $result = mysqli_query($conn, $sql_str);
                                        while ($row = mysqli_fetch_assoc($result)) {
                                        ?>
                                            <div class="card">
                                                <div class="card-heading active" data-filter="*">
                                                <a href="shop.php?category=<?= $row['slug'] ?>"><?= $row['name'] ?></a>
                                                </div>

                                            </div>
                                        <?php
                                        }
                                        ?>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
                <div class="col-lg-9 col-md-9">
                <div class="header__search text-center mb-4">
                        <form class="form-inline d-flex justify-content-center" action="timkiem.php" method="GET">
                            <input class="form-control mr-sm-2" type="search" name="tukhoa" placeholder="Tìm kiếm sản phẩm..." aria-label="Search" style="width: 35%;">
                            <button class="btn btn-outline-success my-2 my-sm-0" type="submit" name="timkiem">Tìm kiếm</button>
                        </form>
                    </div>
                    <div class="row">
                        <?php
                        require("./conn/conn.php");
                        $sql_str = "SELECT 
                                        products.id AS pid,
                                        products.name AS pname,
                                        categories.name AS cname,
                                        ROUND((price - disscounted_price) / price * 100) AS discount,
                                        products.images,
                                        products.price,
                                        products.disscounted_price,
                                        categories.slug AS cslug
                                    FROM 
                                        products
                                    JOIN 
                                        categories 
                                    ON 
                                        products.category_id = categories.id
                                    WHERE 
                                        products.name LIKE '%$tukhoa%' 
                                    ORDER BY 
                                        discount;";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                            $arr = explode(";", $row["images"]);
                        ?>
                            <div class="col-lg-4 col-md-6 col-6-rp-mobile mix <?= $row['cslug'] ?>">
                                <div class="product__item sale">
                                    <div class="product__item__pic set-bg" data-setbg="<?= 'admin/' . $arr[0] ?>">
                                        <?php if (isset($row["discount"]) && $row["discount"] > 0 && $row["discount"] < 100): ?>
                                            <div class="label_right sale"><?= $row['discount'] ?>%</div>
                                        <?php endif; ?>
                                        <ul class="product__hover">
                                            <li><a href="<?= 'admin/' . $arr[0] ?>" class="image-popup"><span class="arrow_expand"></span></a></li>
                                            <li><a href="product-details.php?id=<?= $row['pid'] ?>"><span class="icon_search_alt"></span></a></li>
                                            <li>
                                                <form action="#" method="post">
                                                    <button type="submit" id="toastr-success-top-right">
                                                        <a href="#"><span class="icon_bag_alt"></span></a>
                                                    </button>
                                                </form>
                                            </li>

                                        </ul>

                                    </div>

                                    <div class="product__item__text">
                                        <h6 class="text-truncate-1"><a href="#"><?= $row["pname"] ?></a></h6>
                                        <div class="product__price">
                                            <?php if ($row["disscounted_price"] > 0): ?>
                                                <?= number_format($row["disscounted_price"], 0, '', '.') . 'VNĐ' ?><span><?= number_format($row["price"], 0, '', '.') . 'VNĐ' ?></span>
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
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- Shop Section End -->
</div>
<script>
    // Tăng giảm số lượng sản phẩm giỏ hàng và chi tiết sản phẩm
    $('.input-next-cart').on('click', '.button-plus', function(e) {
        incrementValue(e);
    });

    $('.input-next-cart').on('click', '.button-minus', function(e) {
        decrementValue(e);
    });

    function incrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('.input-next-cart');
        var currentVal = parseInt(parent.find('.quantity-field-cart').val(), 10);

        var newValue = (!isNaN(currentVal) && currentVal > 0) ? currentVal + 1 : 1;

        parent.find('.quantity-field-cart').val(newValue);
    }

    function decrementValue(e) {
        e.preventDefault();
        var fieldName = $(e.target).data('field');
        var parent = $(e.target).closest('.input-next-cart');
        var currentVal = parseInt(parent.find('.quantity-field-cart').val(), 10);

        var newValue = (!isNaN(currentVal) && currentVal > 0) ? currentVal - 1 : 0;

        parent.find('.quantity-field-cart').val(newValue);
    }
</script>
<?php
require("./components/footerTC.php");
?>