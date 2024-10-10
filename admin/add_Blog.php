<?php
require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');

?>

<div>

    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <div class="row">
            <div class="col-sm-12 col-md-6 col-xl-7 mb-3">
                <div class="bg-light rounded h-100 p-4">
                    <div class="d-flex mb-2">
                        <a href="list_Blog.php" class="btn btn-success">Bài viết</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="./clsthemBlog.php" method="post" enctype="multipart/form-data">

            <!-- Cột chính nội dung bên trái -->
            <div class="col-sm-12 col-xl-9">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Thêm bài viết</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="title" required>
                        <label for="floatingInput">Tiêu đề bài viết</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput" placeholder="name@example.com" name="summary" required>
                        <label for="floatingInput">Tóm tắt</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Mô tả" id="floatingTextarea"
                            style="height: 300px;" name="description" required ></textarea>
                        <label for="floatingTextarea">Nội dung bài viết</label>
                    </div>
                </div>
            </div>

            <!-- Cột chứa hình ảnh và chọn danh mục bên phải -->
            <div class="col-sm-12 col-xl-3">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Thông tin bổ sung</h6>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Hình ảnh (JPG, PNG, )</label>
                        <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="myblog[]" multiple="multiple" required >
                    </div>
                    <!-- Chọn chuyên mục -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect" aria-label="Floating label select example" name="newcategory_id" required>
                            <option value="" disabled selected>Chọn chuyên mục</option>
                            <?php
                            require("../conn/conn.php");
                            $sql_str = "SELECT * FROM newscategories ORDER BY name";
                            $result = mysqli_query($conn, $sql_str);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Chọn chuyên mục</label>
                    </div>

                    <!-- Nút Tạo mới -->
                    <input type="submit" value="Tạo mới" class="btn btn-primary">
                </div>
            </div>

        </form>

    </div>
    <!-- Form End -->
</div>
<?php
require('giaoDien/footer.php');
?>