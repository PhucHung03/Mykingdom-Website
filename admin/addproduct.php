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
                        <a href="listsProduct.php" class="btn btn-success">Sản phẩm</a>
                    </div>
                </div>
            </div>

        </div>
        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="clsthemsanpham.php" method="post" enctype="multipart/form-data">

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Thêm sản phẩm</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="name" required >
                        <label for="floatingInput">Tên sản phẩm</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="price" required >
                        <label for="floatingInput">Giá bán thường (đ)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="saleprice" required >
                        <label for="floatingInput">Giá khuyến mãi (đ)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="stock" required >
                        <label for="floatingInput">Số lượng</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Mô tả ngắn" id="floatingTextarea"
                            style="height: 210px;" name="sumary" required ></textarea>
                        <label for="floatingTextarea text-dark">Mô tả ngắn</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Mô tả" id="floatingTextarea"
                            style="height: 300px;" name="description" required ></textarea>
                        <label for="floatingTextarea">Chi tiết</label>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">
                        <input type="submit" value="Tạo mới" class="btn btn-primary">
                        <a href="" class="btn btn-secondary">Ẩn</a>
                        <a href="" class="btn btn-danger">Xóa</a>
                    </h6>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Hình ảnh (JPG, PNG, )</label>
                        <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="myfile[]" multiple="multiple" required >
                    </div>
                    <!-- danh mục -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="danhmuc" >
                            <option value="" disabled selected>Chọn danh mục</option>
                            <?php
                                require("../conn/conn.php");
                                $sql_str = "select*from categories order by name";
                                $result = mysqli_query($conn, $sql_str);
                                while ($row=mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row["id"]; ?>"><?php echo $row["name"]; ?></option>
                            <?php
                            }
                            ?>
                        </select>
                        <label for="floatingSelect">Chọn danh mục</label>
                    </div>
                    <!-- thương hiệu -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="thuonghieu" >
                            <option value="" disabled selected>Chọn thương hiệu</option>
                        <?php
                            require("../conn/conn.php");
                            $sql_str = "select*from brands order by name";
                            $result = mysqli_query($conn,$sql_str);
                            while($row= mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row["id"];?>"><?php echo $row["name"]; ?></option>
                            <?php }?>
                        ?>
                        </select>
                        <label for="floatingSelect">Chọn thương hiệu</label>
                    </div>


                </div>
            </div>




        </form>
    </div>
    <!-- Form End -->
</div>
<?php
require('giaoDien/footer.php');
?>