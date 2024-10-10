<?php
require('giaoDien/header.php');
require('giaoDien/sidebar.php');
require('giaoDien/topbar.php');


?>

<div>
    <div class="container-fluid pt-4 px-4">
        <div class="col-12">
            <div class="bg-light rounded h-100 p-4">
                <h3 class="mb-4">Danh sách đơn hàng</h3>
                <div class="d-flex align-items-center justify-content-between mb-4">

                    <div class="d-flex">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Tìm đơn hàng">
                        </div>
                        <input type="submit" class="btn btn-primary" value="Tìm">

                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table text-start align-middle table-bordered table-hover mb-0">
                        <thead>
                            <tr class="text-dark">
                                <th scope="col">STT</th>
                                <th scope="col">Mã đơn hàng</th>
                                <th scope="col">Tên khách hàng</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Trạng thái</th>
                                <th scope="col"></th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- php -->
                        <?php
                        require("../conn/conn.php");
                        $sql_str = "select * from orders order by created_at";
                        $result = mysqli_query($conn, $sql_str);
                        $stt =0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stt++;
                        ?>
                            <tbody>
                                <tr>
                                    <td><?=$stt?></td>
                                    <td><?= $row['id'] ?></td>
                                    <td><?= $row['name'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><?= $row['status'] ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="vieworders.php?id=<?= $row['id'] ?>">Xem</a>
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