<?php
    require("../../conn/conn.php");
    //Lấy id
    $id = $_GET['id'];
    //tìm các ảnh của sản phẩm và xóa 
    $timAnh= "select images from products where id=$id";
    $result = mysqli_query($conn,$timAnh);
    $row = mysqli_fetch_assoc($result);
    //danh sách các ảnh
    $img_arr = explode(';',$row['images']);
    //xóa các ảnh
    foreach($img_arr as $img){
        unlink($img);
    }

    $sql_str = "delete from products where id= $id ";
    mysqli_query($conn, $sql_str);

    header('location: ../listsProduct.php');
?>