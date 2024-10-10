<?php
require("../conn/conn.php");
$id = $_GET['id'];

$sqlStr = "select*from newscategories where id = $id";
$result = mysqli_query($conn,$sqlStr);

$Blogcategory = mysqli_fetch_assoc($result);
if(isset($_POST['btnUpdate'])){
    $name = $_POST['nameCM'];
    $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$name)));
    //update brand
    $sql_str2 = "update newscategories set name = '$name',slug = '$slug' where id = $id";

    mysqli_query($conn,$sql_str2);

    header("location: list_catsBlog.php");
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
                    <h3 class="mb-4">CHỈNH SỬA CHUYÊN MỤC</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editCats" name="nameCM" required value="<?php echo $Blogcategory['name']?>">
                        <label for="floatingInput">Tên Chuyên Mục</label>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="btnUpdate">
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