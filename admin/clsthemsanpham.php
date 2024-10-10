<?php
require("../conn/conn.php"); // Kết nối với cơ sở dữ liệu

// Kiểm tra xem form đã được submit chưa
if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Kiểm tra và lấy giá trị từ form, nếu không có thì đặt giá trị mặc định
    $name = isset($_POST["name"]) ? $_POST["name"] : '';
    $price = isset($_POST["price"]) ? $_POST["price"] : 0;
    $saleprice = isset($_POST["saleprice"]) ? $_POST["saleprice"] : 0;
    $stock = isset($_POST["stock"]) ? $_POST["stock"] : 0;
    $sumary = isset($_POST["sumary"]) ? $_POST["sumary"] : '';
    $description = isset($_POST["description"]) ? $_POST["description"] : '';
    $danhmuc = isset($_POST["danhmuc"]) ? $_POST["danhmuc"] : 0;
    $thuonghieu = isset($_POST["thuonghieu"]) ? $_POST["thuonghieu"] : 0;

    // Kiểm tra nếu có file upload, nếu không thì đặt mặc định là 0
    if (isset($_FILES["myfile"])) {
        $countFile = count($_FILES["myfile"]["name"]);
    } else {
        $countFile = 0;
    }

    // Kiểm tra xem các giá trị quan trọng có rỗng hay không
    if (empty($name) || $price <= 0 || $countFile == 0) {
        echo "<script>
            alert('Vui lòng điền đầy đủ thông tin và tải lên ít nhất một ảnh.');
            window.location.href='addproduct.php'; // Quay lại trang thêm sản phẩm nếu có lỗi
        </script>";
        exit();
    }


    $check_sql = "SELECT * FROM products WHERE name = '$name'";
    $check_result = mysqli_query($conn, $check_sql);

    if (mysqli_num_rows($check_result) > 0) {
        // Nếu sản phẩm đã tồn tại
        echo "<script>
            alert('Sản phẩm đã tồn tại. Vui lòng kiểm tra lại.');
            window.location.href='addproduct.php';
        </script>";
        exit();
    }
    // Xử lý hình ảnh nếu có
    $imgs = '';
    $upload_success = true; // Biến kiểm soát để theo dõi trạng thái upload
    for ($i = 0; $i < $countFile; $i++) {
        $namedelespace = str_replace(' ', '-', $_FILES["myfile"]["name"][$i]);
        $name_new = pathinfo($namedelespace, PATHINFO_FILENAME) . '_' . rand(100, 999);
        $exp = pathinfo($_FILES["myfile"]["name"][$i], PATHINFO_EXTENSION);
        $filename_new = $name_new . "." . $exp;
        $extension = strtolower($exp);
        $valid_extension = array("jpg", "png", "jpeg");
        $location = "hinhanh/" . $filename_new;
        // Kiểm tra định dạng file và di chuyển file đã upload
        if (in_array($extension, $valid_extension)) {
            if (move_uploaded_file($_FILES["myfile"]["tmp_name"][$i], $location)) {
                $imgs .= $location . ";";
            } else {
                $upload_success = false; // Cập nhật nếu upload thất bại
                break;
            }
        } else {
            echo "<script>
            alert('File không hợp lệ. Chỉ chấp nhận file jpg, png, jpeg!');
            window.location.href='addproduct.php';
            </script>";
            exit();
        }
    }

    // Nếu upload ảnh thành công, tiếp tục lưu sản phẩm
    if ($upload_success) {
        $imgs = substr($imgs, 0, -1); // Loại bỏ dấu chấm phẩy cuối cùng

        // Câu lệnh thêm vào bảng
        $sql_str = "INSERT INTO `products` (`id`, `name`, `slug`, `description`, `summary`, 
        `stock`, `price`, `disscounted_price`, `images`, `category_id`, `brand_id`, `status`,
        `created_at`, `updated_at`) VALUES 
        (NULL, '$name', 
        '" . strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/', '-', $name))) . "', 
        '$description', '$sumary',
        $stock, $price, $saleprice, '$imgs', '$danhmuc', '$thuonghieu', 'Active', NULL, NULL);";

        // Thực thi câu lệnh
        if (mysqli_query($conn, $sql_str)) {
            echo "<script>
                alert('Sản phẩm đã được thêm thành công!');
                window.location.href='addproduct.php'; // Quay lại trang thêm sản phẩm sau khi thành công
            </script>";
        } else {
            echo "<script>
                alert('Có lỗi xảy ra khi thêm sản phẩm.');
                window.location.href='addproduct.php'; // Quay lại trang thêm sản phẩm sau khi thất bại
            </script>";
        }
    } else {
        // Nếu upload không thành công, báo lỗi và không thêm sản phẩm
        echo "<script>
            alert('Có lỗi xảy ra khi tải ảnh lên. Sản phẩm chưa được thêm!');
            window.location.href='addproduct.php'; // Quay lại trang thêm sản phẩm nếu upload thất bại
        </script>";
    }
} else {
    echo "<script>
        window.location.href='../addproduct.php'; // Chuyển hướng nếu không phải phương thức POST
    </script>";
}
?>
