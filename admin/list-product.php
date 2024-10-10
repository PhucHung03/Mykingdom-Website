<?php
    require("./giaoDien/header.php");
    require("./giaoDien/topbar.php.php");
    require("./giaoDien/sidebar.php.php");

    function anhSP($arrstr,$height){
        //tách ảnh sản phẩm
        $arr = explode(";",$arrstr);
        return "<img src='$arr[0]' height='$height'/>";
    }
?>


<body>
    <div class="container-xxl position-relative bg-white d-flex p-0">
        <!-- Content Start -->
        <div class="content">      
            <!-- LIST PRODUCTS -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Danh sách sản phẩm</h6>
                        
                    </div>
                    <div class="d-flex align-items-center justify-content-between mb-4">
                       
                        <a href="" class="btn btn-success"><i class="fa fa-plus"></i></a>
                        <div class="d-flex">
                            <div class="form-group">
                                <input type="search" class="form-control" placeholder="Tìm sản phẩm">
                            </div>
                            <div class="form-group">
                                <select class="form-select" id="floatingSelect"
                                    aria-label="Floating label select example">
                                    <option selected>Danh mục</option>
                                    <option value="1">Tiểu thuyết</option>
                                    <option value="1">Thiếu nhi</option>
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
                                    <th scope="col">Điều chỉnh</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    
                                    <?php
                        require("../conn/conn.php");
                        $sql_str = "select products.id as pid, products.name as pname,stock,price,disscounted_price,images, categories.name as cname, brands.name as bname from products,categories,brands where products.category_id= categories.id and products.brand_id= brands.id order by products.name";
                        $result = mysqli_query($conn, $sql_str);
                        while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $row['pname'] ?></td>
                                    <td><?= $row['stock'] ?></td>
                                    <td><?= $row['price'] ?></td>
                                    <td><?= $row['disscounted_price'] ?></td>
                                    <td><?= anhSP($row['images'],"100px")?></td>
                                    <td><?= $row['cname'] ?></td>
                                    <td><?= $row['bname'] ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="editProduct.php?id=<?=$row['pid']?>"><i class="fa fa-eye"></a> 
                                        <a class="btn btn-sm btn-danger" href="./product/clsDeleteProduct.php?id=<?=$row['pid']?>"
                                        onclick="return confirm('Bạn chắc chắn xóa sản phẩm này?');"><i class="fa fa-trash"></a>
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
            <!-- LIST PRODUCTS END -->


            <style>
                .dropzone {
                    position: relative;
                    border: 2px dashed #c2c2c2;
                    border-radius: 14px;
                    width: auto;
                    height: auto;
                    padding: 13px;
                    min-height: auto;
                    display: flex !important;
                    align-items: flex-start;
                    gap: 15px;
                    flex-wrap: wrap;
                }
            </style>
            <div class="dropzone">
                <div class="d-flex align-items-center gap-3 w-auto">
                    <div class="bg-primary rounded-2 p-3 w-auto">
                        <img src="img/cloud-upload.svg" alt="img">
                    </div>
                    <div class="dz-message position-relative text-start" >
                        <label class="mb-0 fw-semibold text-gray">Upload File: JPG, PNG</label>
                        <input type="file" class="form-control" style="background: transparent;">
                       
                    </div>
                </div>
            </div>

        </div>
        <!-- Content End -->


        <!-- Back to Top -->
        <a href="#" class="btn btn-lg btn-primary btn-lg-square back-to-top"><i class="bi bi-arrow-up"></i></a>
    </div>

    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/chart/chart.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

<?php
require("./giaoDien/footer.php");
?>

