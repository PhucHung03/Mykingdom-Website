<?php
require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');

?>

<div>

    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="themDanhMuc.php" method="post" enctype="multipart/form-data">

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Thêm Danh mục</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="addCategory" name="nameDM" required>
                        <label for="floatingInput">Tên Danh mục</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="fileCats[]" multiple="multiple" required >
                        <label for="floatingInput">Ảnh danh mục</label>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Tạo mới" class="btn btn-primary">
                        <a href="listCategory.php" class="btn btn-success">Danh sách Danh Mục</a>
                    </h6>
                </div>
            </div>


        </form>
    </div>
    <!-- Form End -->
</div>
<?php
require('giaoDien/footer.php');
?>