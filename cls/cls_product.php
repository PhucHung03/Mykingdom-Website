<?php
    class ProductModel{
        function select_list_products($page, $perPage) {
            // Tính toán vị trí bắt đầu của kết quả trên trang hiện tại
            $start = ($page - 1) * $perPage;
        
            // Bắt đầu câu truy vấn SQL
            $sql = "SELECT * FROM products WHERE 1";
            
        
            // Sắp xếp theo id giảm dần
            $sql .= " AND status = 1 ORDER BY id DESC";
        
            // Thêm phần phân trang
            $sql .= " LIMIT " . $start . ", " . $perPage;
        
        }

    }

?>