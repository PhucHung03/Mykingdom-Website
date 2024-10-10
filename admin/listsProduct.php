<?php
require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');


function anhSP($arrstr, $height)
{
    //tách ảnh sản phẩm
    $arr = explode(";", $arrstr);
    return "<img src='$arr[0]' height='$height'/>";
}
?>

<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Danh sách sản phẩm</h3>
                <div class="d-flex align-items-center justify-content-between mb-4">

                    <a href="addproduct.php" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Tìm sản phẩm">
                        </div>
                        <div class="form-group">
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Danh mục</option>
                                <?php
                        require("../conn/conn.php");
                        $sql_str = "select*from categories order by id asc ";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <option ><?=$row['name']?></option>
                        <?php
                        }
                        ?>
                            </select>
                        </div>

                        <input type="submit" class="btn btn-primary" value="Tìm">

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">Tên sản phẩm</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Giá gốc</th>
                                <th scope="col">Giá giảm</th>
                                <th scope="col">Hình ảnh</th>
                                <th scope="col">Danh mục</th>
                                <th scope="col">Thương hiệu</th>
                                <th scope="col">Operation</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- php -->
                        <?php
                        require("../conn/conn.php");
                        $sql_str = "select products.id as pid, products.name as pname,stock,price,disscounted_price,products.images, categories.name as cname, brands.name as bname from products,categories,brands where products.category_id= categories.id and products.brand_id= brands.id order by products.name";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $row['pname'] ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['disscounted_price'] ?></td>
                                    <td><?= anhSP($row['images'], "100px") ?></td>
                                    <td><?= $row['cname'] ?></td>
                                    <td><?= $row['bname'] ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="editProduct.php?id=<?= $row['pid'] ?>">Sửa</a><a class="btn btn-sm btn-danger" href="./product/clsDeleteProduct.php?id=<?= $row['pid'] ?>"
                                            onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');">Xóa</a>
                                    </td>
                                </tr>

                            </tbody>
                        <?php
                        }
                        ?>
                    </table>
                    <div class="col-12 mt-4">
                        <nav>
                            <ul class="pagination justify-content-center">
                                <li class="page-item disabled"><a class="page-link" href="#">Prev</span></a></li>
                                <li class="page-item active">
                                    <a class="page-link" href="index.php?quanli=list_product&page=">1</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?quanli=list_product&page=">2</a>
                                </li>
                                <li class="page-item">
                                    <a class="page-link" href="index.php?quanli=list_product&page=">3</a>
                                </li>

                                <li class="page-item"><a class="page-link" href="#">Next</a></li>
                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </div>

    </div>
    
</div>
<?php
require('giaoDien/footer.php');
?>