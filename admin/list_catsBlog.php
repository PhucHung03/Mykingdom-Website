<?php
require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');

?>

<div>
    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="./blog_category/themChuyenMuc.php" method="post">

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Thêm Chuyên mục bài viết</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="addCategory" name="nameCM" required>
                        <label for="floatingInput">Tên chuyên mục</label>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Tạo mới" class="btn btn-primary">
                        
                    </h6>
                </div>
            </div>


        </form>
    </div>

    <!-- chuyên mục bài viết  -->
    <div class="container-fluid pt-4 px-4">
        <div class="row g-4">
            <div class="col-sm-12 col-xl-12">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4" style="color:blue;">Chuyên mục bài viết</h6>
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">Chuyên mục</th>
                                <th scope="col">Slug</th>
                                <th scope="col">Status</th>
                                <th scope="col">Điều chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- php -->
                        <?php
                        require("../conn/conn.php");
                        $sql_str = "select*from newscategories order by id asc";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tbody>
                                <tr>
                                    <th scope="row"><?= $row['id'] ?></th>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['slug'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><a class="btn btn-warning" href="editBlog_category.php?id=<?= $row['id'] ?>">Chỉnh sửa</a>
                                        <a class="btn btn-danger" href="./blog_category/deleteChuyenMuc.php?id=<?= $row['id'] ?>"
                                            onclick="return confirm('Bạn chắc chắn xóa mục này?');">Xóa</a>
                                    </td>
                                </tr>
                            </tbody>
                        <?php
                        }
                        ?>
                        <!-- end php -->
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require('giaoDien/footer.php');
?>