<?php
error_reporting(0);
require("../conn/conn.php");
$id = $_GET['id'];

$sql_str = "select news.id as nid, title, summary,description, images,newcategory_id, newscategories.name as cname 
from news, newscategories 
where news.newcategory_id = newscategories.id and news.id = $id";

// Execute query
$result = mysqli_query($conn, $sql_str);

// Fetch post data
$blog = mysqli_fetch_assoc($result);

if(isset($_POST['btnUpdate'])){
    require("../conn/conn.php");

    $title = $_POST["title"];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title)));
    $summary = $_POST["summary"];
    $description = $_POST["description"];
    $newcategory_id = $_POST["newcategory_id"];

    // Handle images
    $countFile = count($_FILES["myblog"]["name"]);
    if(!empty($_FILES['myblog']['name']['0'])) { 
        // Delete old images
        $img_arr = explode(';', $blog['images']);
        foreach($img_arr as $img){
            unlink($img);  // Remove old image file
        }

        $imgs = '';
        for($i = 0; $i < $countFile; $i++){
            $namedelespace = str_replace(' ', '-', $_FILES["myblog"]["name"][$i]);
            $name_new = pathinfo($namedelespace, PATHINFO_FILENAME) . '_' . rand(100, 999);
            $exp = pathinfo($_FILES["myblog"]["name"][$i], PATHINFO_EXTENSION);
            $filename_new = $name_new . "." . $exp;
            $extension = strtolower($exp);
            $valid_extension = array("jpg", "png", "jpeg");
            $location = "hinhanh/img_blog/" . $filename_new;

            if(in_array($extension, $valid_extension)){
                if(move_uploaded_file($_FILES["myblog"]["tmp_name"][$i], $location)){
                    $imgs .= $location . ";";
                }
            } else {
                echo "<script>
                    alert('Không phải file ảnh!'); 
                    window.location.href='edit_Blog.php';
                </script>";
            }
        }
        $imgs = substr($imgs, 0, -1);

        // Update post with new image
        $sql_str = "UPDATE news
        SET title = '$title', 
        slug = '$slug', 
        summary = '$summary', 
        description = '$description',
        images = '$imgs', 
        newcategory_id = '$newcategory_id'
        WHERE id = $id";
    } else {
        // Update post without changing the image
        $sql_str = "UPDATE news
        SET title = '$title', 
        slug = '$slug', 
        summary = '$summary', 
        description = '$description',
        newcategory_id = '$newcategory_id'
        WHERE id = $id";
    }

    if (mysqli_query($conn, $sql_str)) {
        echo "<script>
            alert('Cập nhật bài viết thành công!'); 
            window.location.href='list_Blog.php';
        </script>";
    } else {
        echo "<script>
            alert('Có lỗi xảy ra khi cập nhật bài viết.'); 
            window.location.href='list_Blog.php';
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

        <!-- Form cập nhật bài viết -->
        <form class="row g-4" action="#" method="post" enctype="multipart/form-data">

            <div class="col-sm-12 col-xl-9">

                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">Cập nhật bài viết</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="Tiêu đề bài viết" name="title" required value="<?=$blog['title']?>">
                        <label for="floatingInput">Tiêu đề bài viết</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Tóm tắt" id="floatingTextarea"
                            style="height: 150px;" name="summary" required><?=$blog['summary']?></textarea>
                        <label for="floatingTextarea">Tóm tắt</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Nội dung chi tiết" id="floatingTextarea"
                            style="height: 300px;" name="description" required><?=$blog['description']?></textarea>
                        <label for="floatingTextarea">Nội dung chi tiết</label>
                    </div>
                </div>
            </div>

            <div class="col-sm-12 col-xl-3">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="btnUpdate">
                    </h6>

                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Hình ảnh (JPG, PNG)</label>
                        <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="myblog[]" multiple="multiple">

                        <br>
                        <h6>Các ảnh hiện tại:</h6>
                        <?php
                         $arr = explode(";", $blog['images']);
                         foreach($arr as $img){
                             echo "<img src='$img' height='100px'/>";
                         }
                        ?>
                    </div>

                    <!-- Danh mục -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="newcategory_id">
                            <option selected>Chọn danh mục</option>
                            <?php
                                $sql_str = "select*from newscategories order by name";
                                $result = mysqli_query($conn, $sql_str);
                                while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row["id"]; ?>"
                                <?php if($row['name'] == $blog['cname']) echo "selected"; ?>>
                                    <?php echo $row["name"]; ?>
                                </option>
                            <?php } ?>
                        </select>
                        <label for="floatingSelect">Danh mục</label>
                    </div>

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
