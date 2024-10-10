<!DOCTYPE html>
<html lang="zxx">

<head>
    <meta charset="UTF-8">
    <meta name="description" content="Ashion Template">
    <meta name="keywords" content="Ashion, unica, creative, html">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>MYKINGDOM</title>

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Cookie&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800;900&display=swap"
        rel="stylesheet">

    <!-- Css Styles -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <link rel="stylesheet" href="css/font-awesome.min.css" type="text/css">
    <link rel="stylesheet" href="css/elegant-icons.css" type="text/css">
    <link rel="stylesheet" href="css/jquery-ui.min.css" type="text/css">
    <link rel="stylesheet" href="css/magnific-popup.css" type="text/css">
    <link rel="stylesheet" href="css/owl.carousel.min.css" type="text/css">
    <link rel="stylesheet" href="css/slicknav.min.css" type="text/css">
    <link rel="stylesheet" href="css/style.css" type="text/css">

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css"
        integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous" />

    <!-- Include Toastr CSS and JS files -->
    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
    <!-- Include Toastr CSS and JS files end -->


</head>

<body>
    <!-- Page Preloder -->
    <div id="preloder">
        <div class="loader"></div>
    </div>

    <!-- Offcanvas Menu Begin -->
    <div class="offcanvas-menu-overlay"></div>
    <div class="offcanvas-menu-wrapper">
        <div class="offcanvas__close">+</div>
        <ul class="offcanvas__widget">
            <li><span class="icon_search search-switch"></span></li>
            <li><a href="#"><span class="icon_heart_alt"></span>
                    <div class="tip">2</div>
                </a></li>
            <li><a href="#"><span class="icon_bag_alt"></span>
                    <div class="tip">2</div>
                </a></li>
        </ul>
        <div class="offcanvas__logo">
            <a href="./index.html"><img src="img/logo.png" alt=""></a>
        </div>
        <div id="mobile-menu-wrap"></div>
        <div class="offcanvas__auth">
            <a href="#">Đăng nhập</a>
            <a href="#">Đăng ký</a>
        </div>
        <div class="offcanvas__auth acount">
            <a href="#"><img src="img/product/product-1.jpg" alt="">KHOA123456</a>
        </div>

    </div>
    <!-- Offcanvas Menu End -->

    <!-- Header Section Begin -->
    <header class="header">
        <div class="container">
            <div class="row">
                <div class="col-xl-3 col-lg-2">
                    <div class="header__logo">
                        <a href="index.php"><img style="max-height: 45px;" src="img/logo-mykingdom.png" alt=""></a>
                    </div>
                </div>
                <div class="col-xl-6 col-lg-7">
                    <nav class="header__menu">
                        <ul>

                            <li><a href="index.php">TRANG CHỦ</a></li>
                            <li><a href="shop.php">Cửa hàng</a></li>

                            <li><a href="blog.php">Bài Viết</a></li>
                            <!-- <li><a href="./blog.html">bÀI viẾT</a></li> -->
                            <li><a href="#">LIÊN HỆ</a></li>

                            <li><a href="#">Trang</a>
                                <ul class="dropdown">
                                    <li><a href="cart.php">Giỏ hàng</a></li>
                                    <li><a href="#">Thanh toán</a></li>
                                    <li><a href="#">Đơn hàng của bạn</a></li>
                                </ul>
                            </li>



                        </ul>
                    </nav>
                </div>
                <div class="col-lg-3">
                    <div class="header__right">
                        <!-- <div class="header__right__auth">
                            <a href="#">Đăng nhập</a>
                            <a href="#">Đăng ký</a>
                        </div> -->

                        <!-- TÊn login tối đa 10 ky tự -->
                        <div class="header__right__auth acount">
                            <a href="#"><img src="img/product/product-1.jpg" alt="">PHÚC HƯNG</a>

                        </div>
                        <ul class="header__right__widget">
                            <li><span class="icon_search search-switch"></span></li>

                            <li><a id="cart-mini" href="cart.php"><span class="icon_bag_alt"></span>
                                    <div class="tip">
                                    <?php
                                        $cart = [];
                                        if (isset($_SESSION['cart'])) {
                                            $cart = $_SESSION['cart'];
                                        }
                                        $count = 0;
                                        foreach ($cart as $item) {
                                            $count += $item['quantity'];
                                        }
                                        echo $count;
                                        ?>

                                    </div>
                                </a></li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="canvas__open">
                <i class="fa fa-bars"></i>
            </div>
        </div>
    </header>
    <!-- Header Section End -->
    <div class=""></div>