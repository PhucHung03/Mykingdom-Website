<?php
session_start();
require('./components/headerTC.php');
require('./conn/conn.php');
$id_blog = $_GET['id'];
$sql_str = "select title,summary,description,images,newscategories.name as bcname, news.created_at from news JOIN newscategories on news.newcategory_id=newscategories.id where news.id=$id_blog";
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
                    <a href="index.php"><i class="fa fa-home"></i>Trang chủ</a>
                    <a href="blog.php">Bài viết</a>
                    <span><?= $row['title'] ?></span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->

<!-- Blog Details Section Begin -->
<section class="blog-details spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 col-md-8">
                <div class="blog__details__content">
                    <div class="blog__details__item">
                        <img src="<?= "admin/" . $arr[0] ?>" alt="">
                        <div class="blog__details__item__title">
                            <span class="tip"><?= $row['bcname'] ?></span>
                            <h4><?= $row['title'] ?></h4>
                            <ul>
                                <li>by <span>Admin</span></li>
                                <li><?= $row['created_at'] ?></li>
                            </ul>
                        </div>
                    </div>
                    <div class="blog__details__quote">

                        <p><?= $row['summary'] ?></p>
                    </div>
                    <div class="blog__details__desc">
                        <p><?= $row['description'] ?></p>
                    </div>
                    <div class="blog__details__quote">
                        <div class="icon"><i class="fa fa-quote-left"></i></div>
                    </div>
                    <div class="blog__details__desc">
                        <p class="text-center">Hết cảm ơn đã đọc bài viết</p>
                    </div>

                </div>
            </div>
            <div class="col-lg-4 col-md-4">
            <div class="blog__sidebar">
                            <div class="blog__sidebar__item">
                                <div class="section-title">
                                    <h4>Chuyên mục</h4>
                                </div>
                                <ul>
                                    <li><a href="bai-viet">Tất cả</span></a></li>
                                    <?php
                                    require("./conn/conn.php");
                                    $sql_str2 = "select*from newscategories order by name";
                                    $result2 = mysqli_query($conn, $sql_str2);
                                    while ($row2 = mysqli_fetch_assoc($result2)) {
                                    ?>
                                        <li><a href="#"><?=$row2['name']?></a></li>
                                    <?php
                                    }
                                    ?>

                                </ul>
                            </div>
                            <div class="blog__sidebar__item">
                                <div class="section-title">
                                    <h4>Bài viết mới</h4>
                                </div>
                                <?php
                                    require("./conn/conn.php");
                                    $sql_str3 = "select*from news order by created_at desc limit 0,3";
                                    $result3 = mysqli_query($conn, $sql_str3);
                                    while ($row3 = mysqli_fetch_assoc($result3)) {
                                        $arr3 = explode(";", $row3["images"]);
                                    ?>
                                    <a href="blog_detail.php?id=<?=$row3['id']?>" class="blog__feature__item">
                                        <div class="blog__feature__item__pic">
                                            <img style="max-width: 110px;" src="<?= "admin/" . $arr3[0] ?>" alt="">
                                        </div>
                                        <div class="blog__feature__item__text">
                                            <h6 class="text-truncate-2"><?= $row3['title'] ?></h6>
                                            <span><?= $row3['created_at'] ?></span>
                                        </div>
                                    </a>
                            <?php }?>


                            </div>

                        </div>
            </div>
        </div>
    </div>
</section>
<!-- Blog Details Section End -->


<?php
    require("./components/footerTC.php");
?>