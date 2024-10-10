<?php
require("../conn/conn.php");
$id = $_GET['id'];

// Lấy thông tin danh mục hiện tại
$sql_str = "SELECT id, name, slug, images FROM categories WHERE id = $id";
$result = mysqli_query($conn, $sql_str);
$category = mysqli_fetch_assoc($result);

if (isset($_POST['btnUpdate'])) {
    // Lấy dữ liệu từ form
    $name = $_POST["nameDM"];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

    // Xử lý hình ảnh
    $countFile = count($_FILES["fileCats"]["name"]);
    $imgs = $category['images']; // Giữ nguyên hình ảnh cũ

    if (!empty($_FILES['fileCats']['name'][0])) { // Nếu có ảnh mới
        // Xóa ảnh cũ nếu có
        $img_arr = explode(';', $imgs);
        foreach ($img_arr as $img) {
            if (file_exists($img)) {
                unlink($img);
            }
        }
        $imgs = ''; // Reset biến ảnh

        // Xử lý upload ảnh mới
        for ($i = 0; $i < $countFile; $i++) {
            $namedelespace = str_replace(' ', '-', $_FILES["fileCats"]["name"][$i]);
            $name_new = pathinfo($namedelespace, PATHINFO_FILENAME) . '_' . rand(100, 999);
            $exp = pathinfo($_FILES["fileCats"]["name"][$i], PATHINFO_EXTENSION);
            $filename_new = $name_new . "." . $exp;
            $extension = strtolower($exp);
            $valid_extension = array("jpg", "png", "jpeg");
            $location = "hinhanh/img_blog/" . $filename_new;

            if (in_array($extension, $valid_extension)) {
                if (move_uploaded_file($_FILES["fileCats"]["tmp_name"][$i], $location)) {
                    $imgs .= $location . ";";
                }
            } else {
                echo "<script>
                alert('Không phải file ảnh!'); 
                window.location.href='editCategory.php?id=$id';
                </script>";
                exit();
            }
        }
        $imgs = rtrim($imgs, ';'); // Xóa dấu chấm phẩy cuối
    }

    // Câu lệnh cập nhật danh mục
    $sql_str = "UPDATE categories
                SET name = '$name', 
                    slug = '$slug', 
                    images = '$imgs' 
                WHERE id = $id";

    if (mysqli_query($conn, $sql_str)) {
        echo "<script>
        alert('Cập nhật danh mục thành công!'); 
        window.location.href='listCategory.php';
        </script>";
    } else {
        echo "<script>
        alert('Có lỗi xảy ra khi cập nhật danh mục.'); 
        window.location.href='listCategory.php';
        </script>";
    }
} else {
    require('giaoDien/header.php');
    require('giaoDien/sidebar.php');
    require('giaoDien/topbar.php');
?>

<div>

    <!-- Form Start -->
    <div class="container-fluid pt-4">

        <!-- Form thêm sản phẩm -->
        <form class="row g-4" action="#" method="post" enctype="multipart/form-data">

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h3 class="mb-4">CHỈNH SỬA DANH MỤC</h3>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="editCats" name="nameDM" required value="<?php echo $category['name']?>">
                        <label for="floatingInput">Tên Danh mục</label>
                    </div>
                    <div class="form-floating mb-3">
                    <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="fileCats[]" multiple="multiple" required >
                        <label for="floatingInput">Ảnh danh mục</label> <br>
                        <h6>Các ảnh hiện tại:</h6>
                        <?php
                         $arr = explode(";",$category['images']);
                         foreach($arr as $img){
                             echo "<img src='$img' height='100px'/>";
                         }
                         ?>
                    </div>
                    <h6 class="mb-4">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="btnUpdate">
                        <a href="listCategory.php" class="btn btn-success">Danh sách Danh mục</a>
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