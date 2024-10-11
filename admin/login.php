<?php
    session_start();
    $errorMsg = '';
    if(isset($_POST['login'])){
        $email = $_POST['username'];
        $pass = $_POST['password'];
        //ket noi co so du lieu
        require_once('../conn/conn.php');
        //cau lenh truy van 
        $sql = "select * from admins where email = '$email' and password= '$pass'";
        // thuc thi cau lenh
        $result = mysqli_query($conn,$sql);
        //kiem tra so luong record tra ve > 0 dang nhap thanh cong 
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            $_SESSION['user'] = $row;
            header('location: index.php');
        }else{
            $errorMsg ="Sai thông tin đăng nhập"; 
            require_once('giaoDien/formLogin.php');
        }
    }else{
        require_once('giaoDien/formLogin.php');
    }
?>