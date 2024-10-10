<?php
require('./giaoDien/header.php');
require('./giaoDien/sidebar.php');
require('./giaoDien/topbar.php');

?>

<div>

    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="./brand/clsAddbrand.php" method="post" >

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Thêm thương hiệu</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="addBrand" name="nameTH" required>
                        <label for="floatingInput">Tên thương hiệu</label>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Tạo mới" class="btn btn-primary">
                        <a href="listBrand.php" class="btn btn-success">Danh sách Thương hiệu</a>
                    </h6>
                </div>
            </div>


        </form>
    </div>
    <!-- Form End -->
</div>
<?php
require('./giaoDien/footer.php');
?>