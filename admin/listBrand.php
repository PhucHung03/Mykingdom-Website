<?php
    require('./giaoDien/header.php');
    require('./giaoDien/sidebar.php');
    require('./giaoDien/topbar.php');
    ?>

    <div>
     
        <div class="container-fluid pt-4 px-4">
            <div class="row g-4">
                <div class="col-sm-12 col-xl-12">
                    <div class="bg-light rounded h-100 p-4">
                        <h6 class="mb-4" style="color:blue;">Danh sách thương hiệu</h6>
                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">ID</th>
                                    <th scope="col">Thương hiệu</th>
                                    <th scope="col">Slug</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Operation</th>
                                </tr>
                            </thead>
                            <tbody>

                            </tbody>
                            <!-- php -->
                            <?php
                            require("../conn/conn.php");
                            $sql_str = "select*from brands order by name desc";

                            // print_r($sql_str); exit;
                            $result = mysqli_query($conn, $sql_str);
                            while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                                <tbody>
                                    <tr>
                                        <th scope="row"><?= $row['id'] ?></th>
                                        <td><?= $row['name'] ?></td>
                                        <td><?= $row['slug'] ?></td>
                                        <td><?= $row['status'] ?></td>
                                        <td><a class="btn btn-warning" href="editBrand.php?id=<?=$row['id']?>">Chỉnh sửa</a> 
                                        <a class="btn btn-danger" href="./brand/clsdeletebrand.php?id=<?=$row['id']?>"
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
    require('./giaoDien/footer.php');
    ?>