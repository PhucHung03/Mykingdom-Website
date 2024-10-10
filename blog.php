<?php
session_start();
require("./components/headerTC.php");
?>


<!-- Breadcrumb stard -->
<div class="breadcrumb-option">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="breadcrumb__links">
                    <a href="index.php"><i class="fa fa-home"></i> Trang chủ</a>
                    <span>Bài viết</span>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Breadcrumb End -->
<!-- Blog Section Begin -->
<section class="blog spad">
    <div class="container">
        <div class="row">
            <div class="col-lg-8">
            <div class="row">
        <?php
        require("./conn/conn.php");
        $sql_str = "select*from news order by created_at desc";
        $result = mysqli_query($conn, $sql_str);
        while ($row = mysqli_fetch_assoc($result)) {
            $arr = explode(";", $row["images"]);
        ?>
            <!-- Mỗi bài viết sẽ chiếm 50% chiều rộng trên màn hình lớn và 100% trên màn hình nhỏ -->
            <div class="col-lg-6 col-md-6 col-sm-12 mb-4">
                <div class="blog__item">
                    <a href="blog_detail.php?id=<?=$row['id']?>">
                        <div class="blog__item__pic">
                            <img src="<?= "admin/" . $arr[0] ?>" class="img-fluid" alt="<?= $row['title'] ?>">
                        </div>
                        <div class="blog__item__text">
                            <h6><a href="blog_detail.php?id=<?=$row['id']?>"><?= $row['title'] ?></a></h6>
                            <ul>
                                <li>by <span>Admin</span></li>
                                <li><?= $row['created_at'] ?></li>
                            </ul>
                        </div>
                    </a>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
            </div>
            <div class="col-lg-4">
                <div class="row">
                    <div class="col-lg-12 col-md-12">
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
            <div class="col-lg-12 text-center">
                <a href="#" class="primary-btn load-btn">Xem thêm</a>
            </div>
        </div>
    </div>
</section>

<?php
require("./components/footerTC.php");
?>