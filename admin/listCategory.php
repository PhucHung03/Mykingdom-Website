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
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4" style="color:blue;">Danh mục sản phẩm</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Danh mục</th>
                                    <th scope="col">Ảnh</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <!-- php -->
                            <?php
                            require("../conn/conn.php");
                            $sql_str = "select*from categories order by id asc";
                            $result = mysqli_query($conn, $sql_str);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= anhSP($row['images'], "90px") ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><a class="btn btn-warning" href="editCategory.php?id=<?=$row['id']?>">Chỉnh sửa</a> 
                                        <a class="btn btn-danger" href="./category/clsDeleteCategory.php?id=<?=$row['id']?>"
                                        onclick="return confirm('Bạn chắc chắn xóa mục này?');">Xóa</a></td>
                                    </tr>
                                </tbody>
                            <?php
                            }
                            ?>
                            <!-- end php -->
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
    require('giaoDien/footer.php');
    ?>