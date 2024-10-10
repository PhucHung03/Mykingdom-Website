<?php
    // Kết nối đến cơ sở dữ liệu
    require("../../conn/conn.php");

    // Lấy dữ liệu từ form
    $name = $_POST['nameTH'];
    $slug= strtolower(trim(preg_replace('/[^A-Za-z0-9-]+/','-',$name)));

    // Kiểm tra xem thương hiệu hoặc slug có tồn tại không
    $check_query = "SELECT * FROM `brands` WHERE `name` = '$name' OR `slug` = '$slug'";
    $result = mysqli_query($conn, $check_query);

    if (mysqli_num_rows($result) > 0) {
        // Nếu đã có thương hiệu hoặc slug trùng lặp
        echo "<script>
                alert('Tên thương hiệu hoặc slug đã tồn tại!');
                window.location.href = '../addBrand.php'; // Chuyển hướng về trang thêm brand
              </script>";
    } else {
        // Nếu không trùng lặp, thực hiện thêm mới
        $sql_str = "INSERT INTO `brands` (`name`, `slug`, `status`) VALUES ('$name', '$slug', 'Active');";

        // Thực thi câu lệnh SQL
        if (mysqli_query($conn, $sql_str)) {
            // Chuyển hướng về trang danh sách khi thành công
            header("location:../listBrand.php");
        } else {
            echo "<script>
                    alert('Có lỗi xảy ra khi thêm thương hiệu.');
                    window.location.href = '../addBrand.php';
                  </script>";
        }
    }

    // Đóng kết nối
    mysqli_close($conn);
?>
