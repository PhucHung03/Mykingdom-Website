<?php
require("../conn/conn.php"); // Kết nối với cơ sở dữ liệu

// Kiểm tra xem form đã được submit chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Lấy giá trị từ form
    $title = isset($_POST["title"]) ? $_POST["title"] : '';
    $summary = isset($_POST["summary"]) ? $_POST["summary"] : '';
    $description = isset($_POST["description"]) ? $_POST["description"] : '';
    $newcategory_id = isset($_POST["newcategory_id"]) ? $_POST["newcategory_id"] : 0;
    
    // Kiểm tra nếu có file upload, nếu không thì đặt mặc định là 0
    if (isset($_FILES["myblog"])) {
        $countFile = count($_FILES["myblog"]["name"]);
    } else {
        $countFile = 0;
    }
    // Kiểm tra xem các giá trị quan trọng có rỗng hay không
    if (empty($title) || $countFile == 0) {
        echo "<script>
            alert('Vui lòng điền đầy đủ thông tin và tải lên ít nhất một ảnh.');
            window.location.href='add_Blog.php'; // Quay lại trang thêm bài viết nếu có lỗi
        </script>";
        exit();
    }

    // Xử lý hình ảnh nếu có
    $imgs = '';
    $upload_success = true; // Biến kiểm soát để theo dõi trạng thái upload
    for ($i = 0; $i < $countFile; $i++) {
        $namedelespace = str_replace(' ', '-', $_FILES["myblog"]["name"][$i]);
        $name_new = pathinfo($namedelespace, PATHINFO_FILENAME) . '_' . rand(100, 999);
        $exp = pathinfo($_FILES["myblog"]["name"][$i], PATHINFO_EXTENSION);
        $filename_new = $name_new . "." . $exp;
        $extension = strtolower($exp);
        $valid_extension = array("jpg", "png", "jpeg");
        $location = "hinhanh/img_blog/" . $filename_new;
        // Kiểm tra định dạng file và di chuyển file đã upload
        if (in_array($extension, $valid_extension)) {
            if (move_uploaded_file($_FILES["myblog"]["tmp_name"][$i], $location)) {
                $imgs .= $location . ";"; // Ghép các đường dẫn ảnh với dấu ;
            } else {
                $upload_success = false; // Cập nhật nếu upload thất bại
                break;
            }
        } else {
            echo "<script>
            alert('File không hợp lệ. Chỉ chấp nhận file jpg, png, jpeg!');
            window.location.href='add_Blog.php';
            </script>";
            exit();
        }
    }

    // Nếu upload ảnh thành công, tiếp tục lưu bài viết
    if ($upload_success) {
        $imgs = substr($imgs, 0, -1); // Loại bỏ dấu chấm phẩy cuối cùng

        // Câu lệnh thêm vào bảng
        $sql_str = "INSERT INTO `news` (`id`, `title`, `slug`, `summary`, `description`, `images`, `newcategory_id`, `created_at`, `updated_at`)
                    VALUES 
                    (NULL, '$title', 
                    '" . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $title))) . "', 
                    '$summary', '$description', '$imgs', '$newcategory_id', NOW(), NOW());";

        // Thực thi câu lệnh
        if (mysqli_query($conn, $sql_str)) {
            echo "<script>
                alert('Bài viết đã được thêm thành công!');
                window.location.href='list_Blog.php'; // Quay lại trang danh sách bài viết sau khi thành công
            </script>";
        } else {
            echo "<script>
                alert('Có lỗi xảy ra khi thêm bài viết.');
                window.location.href='add_Blog.php'; // Quay lại trang thêm bài viết sau khi thất bại
            </script>";
        }
    } else {
        // Nếu upload không thành công, báo lỗi và không thêm bài viết
        echo "<script>
            alert('Có lỗi xảy ra khi tải ảnh lên. Bài viết chưa được thêm!');
            window.location.href='add_Blog.php'; // Quay lại trang thêm bài viết nếu upload thất bại
        </script>";
    }
} else {
    echo "<script>
        window.location.href='add_Blog.php'; // Chuyển hướng nếu không phải phương thức POST
    </script>";
}
?>
