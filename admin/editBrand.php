<?php
require("../conn/conn.php");
$id = $_GET['id'];

$sqlStr = "select*from brands where id = $id";
$result = mysqli_query($conn,$sqlStr);

$brand = mysqli_fetch_assoc($result);
if(isset($_POST['btnUpdate'])){
    $name = $_POST['nameTH'];
    $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$name)));
    //update brand
    $sql_str2 = "update brands set name = '$name',slug = '$slug' where id = $id";

    mysqli_query($conn,$sql_str2);

    header("location: listBrand.php");
}else{
    require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');
?>

<div>

    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="#" method="post" >

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">Chỉnh sửa thương hiệu</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editBrand" name="nameTH" required value="<?php echo$brand['name']?>">
                        <label for="floatingInput">Tên thương hiệu</label>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="btnUpdate">
                        <a href="listBrand.php" class="btn btn-success">Danh sách Thương hiệu</a>
                    </h6>
                </div>
            </div>


        </form>
    </div>
    <!-- Form End -->
</div>
<?php
require('giaoDien/footer.php');
}
?>