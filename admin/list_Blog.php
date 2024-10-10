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
                <h3 class="mb-4">Danh sách Bài Viết</h3>
                <div class="d-flex align-items-center justify-content-between mb-4">

                    <a href="add_Blog.php" class="btn btn-success"><i class="fa fa-plus"></i></a>
                    <div class="d-flex">
                        <div class="form-group">
                            <input type="search" class="form-control" placeholder="Tìm bài viết">
                        </div>
                        <div class="form-group">
                            <select class="form-select" id="floatingSelect"
                                aria-label="Floating label select example">
                                <option selected>Chuyên mục</option>
                                <?php
                                require("../conn/conn.php");
                                $sql_str = "select*from newscategories order by id asc ";
                                $result = mysqli_query($conn, $sql_str);
                                while ($row = mysqli_fetch_assoc($result)) {
                                ?>
                                    <option><?= $row['name'] ?></option>
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
                                <th scope="col">STT</th>
                                <th scope="col">Tiêu đề</th>
                                <th scope="col">Tóm tắt</th>
                                <th scope="col">Ảnh đại diện</th>
                                <th scope="col">Chuyên mục</th>
                                <th scope="col">Ngày tạo</th>
                                <th scope="col">Điều chỉnh</th>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                        <!-- php -->
                        <?php
                        require("../conn/conn.php");
                        $sql_str = "SELECT news.id as nid, news.title, news.summary, news.description,images, news.created_at,newscategories.name as chuyenmuc 
                                    FROM news JOIN newscategories ON news.newcategory_id = newscategories.id 
                                    ORDER BY news.created_at desc";

                        $result = mysqli_query($conn, $sql_str);
                        $stt = 0;
                        while ($row = mysqli_fetch_assoc($result)) {
                            $stt++;
                        ?>
                            <tbody>
                                <tr>
                                    <td><?= $stt ?></td>
                                    <td><?= $row['title'] ?></td>
                                    <td><?= $row['summary'] ?></td>
                                    <td><?= anhSP($row['images'], "100px") ?></td>
                                    <td><?= $row['chuyenmuc'] ?></td>
                                    <td><?= $row['created_at'] ?></td>
                                    <td><a class="btn btn-sm btn-primary" href="edit_Blog.php?id=<?= $row['nid'] ?>">Sửa</a><a class="btn btn-sm btn-danger" href="./blog_category/deleteBlog.php?id=<?= $row['nid'] ?>"
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