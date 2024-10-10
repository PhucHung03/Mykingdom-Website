<?php
// Kết nối đến cơ sở dữ liệu
require("../conn/conn.php");

// Lấy dữ liệu từ form
$name = $_POST['nameDM'];
$slug = strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name)));

// Kiểm tra xem thương hiệu hoặc slug có tồn tại không
$check_query = "SELECT * FROM `categories` WHERE `name` = '$name' OR `slug` = '$slug'";
$result = mysqli_query($conn, $check_query);

if (mysqli_num_rows($result) > 0) {
    // Nếu đã có thương hiệu hoặc slug trùng lặp
    echo "<script>
            alert('Tên danh mục hoặc slug đã tồn tại!');
            window.location.href = 'addCategories.php'; // Chuyển hướng về trang thêm danh mục
          </script>";
    exit();
}

// Kiểm tra và xử lý upload hình ảnh
$imgs = '';
$upload_success = true; // Biến kiểm soát trạng thái upload
 
if (isset($_FILES["fileCats"])) {
    $countFile = count($_FILES["fileCats"]["name"]);

    for ($i = 0; $i < $countFile; $i++) {
        $namedelespace = str_replace(' ', '-', $_FILES["fileCats"]["name"][$i]);
        $name_new = pathinfo($namedelespace, PATHINFO_FILENAME) . '_' . rand(100, 999);
        $exp = pathinfo($_FILES["fileCats"]["name"][$i], PATHINFO_EXTENSION);
        $filename_new = $name_new . "." . $exp;
        $extension = strtolower($exp);
        $valid_extension = array("jpg", "png", "jpeg");
        $location = "./hinhanh/img_blog/" . $filename_new;

        // Kiểm tra định dạng file và di chuyển file đã upload
        if (in_array($extension, $valid_extension)) {
            if (move_uploaded_file($_FILES["fileCats"]["tmp_name"][$i], $location)) {
                $imgs .= $location . ";";
            } else {
                $upload_success = false;
                break;
            }
        } else {
            echo "<script>
                    alert('File không hợp lệ. Chỉ chấp nhận file jpg, png, jpeg!');
                    window.location.href = 'addCategories.php';
                  </script>";
            exit();
        }
    }

    if ($upload_success) {
        $imgs = substr($imgs, 0, -1); // Loại bỏ dấu chấm phẩy cuối cùng

        // Thêm mới danh mục vào cơ sở dữ liệu
        $sql_str = "INSERT INTO `categories` (`name`, `slug`, `images`, `status`) VALUES ('$name', '$slug', '$imgs', 'Active');";

        if (mysqli_query($conn, $sql_str)) {
            // Chuyển hướng về trang danh sách khi thành công
            header("location: listCategory.php");
        } else {
            echo "<script>
                    alert('Có lỗi xảy ra khi thêm danh mục.');
                    window.location.href = 'addCategories.php';
                  </script>";
        }
    } else {
        // Nếu upload không thành công
        echo "<script>
                alert('Có lỗi xảy ra khi tải ảnh lên.');
                window.location.href = 'addCategories.php';
              </script>";
    }
} else {
    // Nếu không có ảnh được tải lên
    echo "<script>
            alert('Vui lòng tải lên ít nhất một ảnh!');
            window.location.href = 'addCategories.php';
          </script>";
}

// Đóng kết nối
mysqli_close($conn);
?>
