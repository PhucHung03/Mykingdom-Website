<?php
require("../conn/conn.php");
$id = $_GET['id'];

$sql_str = "select products.id as pid,summary,description, products.name as pname,stock,price,disscounted_price,
products.images, categories.name as cname, brands.name as bname 
from products,categories,brands 
where products.category_id= categories.id and products.brand_id=brands.id and 
products.id= $id";
// echo $sql_str;exit;

$result = mysqli_query($conn,$sql_str);

$products = mysqli_fetch_assoc($result);
if(isset($_POST['btnUpdate'])){
    require("../conn/conn.php");

    $name = $_POST["name"];
    $slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));
    $price = $_POST["price"];
    $saleprice = $_POST["saleprice"];
    $stock = $_POST["stock"];
    $summary = $_POST["sumary"];
    $description = $_POST["description"];
    $danhmuc = $_POST["danhmuc"];
    $thuonghieu = $_POST["thuonghieu"];

    //Xu li hinh anh
    $countFile = count($_FILES["myfile"]["name"]);
    if(!empty($_FILES['myfile']['name']['0'])){ //chọn ảnh mới, xóa ảnh cũ
            //xóa ảnh cũ
            $img_arr = explode(';',$row['images']);
            //xóa các ảnh
            foreach($img_arr as $img){
                unlink($img);
            }
            $imgs = '';
            for($i=0; $i<$countFile;$i++){
                $namedelespace = str_replace(' ', '-', $_FILES["myfile"]["name"][$i]);
                $name_new = pathinfo($namedelespace,PATHINFO_FILENAME).'_'.rand(100,999);
                $exp = pathinfo($_FILES["myfile"]["name"][$i],PATHINFO_EXTENSION);
                $filename_new = $name_new.".".$exp;
                $extension = strtolower($exp);
                $valid_extension = array("jpg","png","jpeg");
                $location = "hinhanh/".$filename_new;
                if(in_array(strtolower($exp),$valid_extension)){
                    if(move_uploaded_file($_FILES["myfile"]["tmp_name"][$i],$location)){
                        $imgs .= $location.";";
                    }
                }else{
                    echo "<script>
                    alert('Không phải file ảnh!'); 
                window.location.href='editProduct.php';
                </script>";
            }
            
        }
        $imgs = substr($imgs,0,-1);
        // echo substr($imgs,0,-1); exit;
        // Câu lệnh thêm vào bảng
        $sql_str = "UPDATE products
        SET name= '$name', 
        slug='$slug', 
        description = '$description', summary = '$summary', 
        stock =$stock, price=$price, disscounted_price=$saleprice, images='$imgs', category_id='$danhmuc', brand_id='$thuonghieu'
        WHERE id =$id";

        // Thực thi câu lệnh
    }else{
        $sql_str = "UPDATE products
        SET name= '$name', 
        slug='$slug', 
        description = '$description', summary = '$summary', 
        stock =$stock, price=$price, disscounted_price=$saleprice,category_id='$danhmuc', brand_id='$thuonghieu'
        WHERE id =$id";
    }
        if (mysqli_query($conn, $sql_str)) {
            echo "<script>
            alert('Cập nhật sản phẩm thành công!'); 
            window.location.href='listsProduct.php';
            </script>";
        } else {
            echo "<script>
            alert('Có lỗi xảy ra khi thêm sản phẩm.'); 
            window.location.href='listsProduct.php';
            </script>";
        }
}else{
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
                    <h6 class="mb-4">Cập nhật sản phẩm</h6>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="name" required value="<?=$products['pname']?>">
                        <label for="floatingInput">Tên sản phẩm</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="price" required value="<?=$products['price']?>">
                        <label for="floatingInput">Giá bán thường (đ)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="saleprice" required value="<?=$products['disscounted_price']?>">
                        <label for="floatingInput">Giá khuyến mãi (đ)</label>
                    </div>
                    <div class="form-floating mb-3">
                        <input type="text" class="form-control" id="floatingInput"
                            placeholder="name@example.com" name="stock" required value="<?=$products['stock']?>">
                        <label for="floatingInput">Số lượng</label>
                    </div>
                    <div class="form-floating mb-3">
                        <textarea class="form-control" placeholder="Mô tả ngắn" id="floatingTextarea"
                            style="height: 210px;" name="sumary" required>
                            <?=$products['summary']?>
                        </textarea>
                        <label for="floatingTextarea text-dark">Mô tả ngắn</label>
                    </div>
                    <div class="form-floating">
                        <textarea class="form-control" placeholder="Mô tả" id="floatingTextarea"
                            style="height: 300px;" name="description" required>
                            <?=$products['description']?>
                        </textarea>
                        <label for="floatingTextarea">Chi tiết</label>
                    </div>


                </div>
            </div>
            <div class="col-sm-12 col-xl-3">
                <div class="bg-light rounded h-100 p-4">
                    <h6 class="mb-4">
                        <input type="submit" value="Cập nhật" class="btn btn-primary" name="btnUpdate">
                    </h6>
                    <div class="mb-3">
                        <label for="formFileSm" class="form-label">Hình ảnh (JPG, PNG, )</label>
                        <input style="background-color: #fff" class="form-control form-control-sm"
                            id="formFileSm" type="file" name="myfile[]" multiple="multiple"  >

                        <br>
                        <h6>Các ảnh hiện tại:</h6>
                        <?php
                         $arr = explode(";",$products['images']);
                         foreach($arr as $img){
                             echo "<img src='$img' height='100px'/>";
                         }
                        
                        ?>
                    </div>
                    <!-- danh mục -->
                    <div class="form-floating mb-3">
                        <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="danhmuc" >
                            <option selected>Danh mục</option>
                            <?php
                                // require("../conn/conn.php");
                                $sql_str = "select*from categories order by name";
                                $result = mysqli_query($conn, $sql_str);
                                while ($row=mysqli_fetch_assoc($result)) {
                            ?>
                                <option value="<?php echo $row["id"]; ?>"
                                <?php
                                        if($row['name'] == $products['cname']){
                                            echo "selected = true";
                                        }
                                     ?>
                                ><?php echo $row["name"]; ?></option>
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
                            <option selected>Thương hiệu</option>
                        <?php
                            // require("../conn/conn.php");
                            $sql_str = "select*from brands order by name";
                            $result = mysqli_query($conn,$sql_str);
                            while($row= mysqli_fetch_assoc($result)){
                            ?>
                                <option value="<?php echo $row["id"];?>"
                                    <?php
                                        if($row['name'] == $products['bname']){
                                            echo "selected = true";
                                        }
                                     ?>
                                
                                
                                ><?php echo $row["name"]; ?></option>
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
}
?>