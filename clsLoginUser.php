<?php
    session_start();
    $errorMsg = '';
    if(isset($_POST['sblogin'])){
        $username = $_POST['email'];
        $password = $_POST['pass'];
        //ket noi co so du lieu
        require_once('./conn/conn.php');
        //cau lenh truy van 
        $sql = "select * from users where email = '$username'";
        // thuc thi cau lenh
        $result = mysqli_query($conn,$sql);
        //kiem tra so luong record tra ve > 0 dang nhap thanh cong 
        if(mysqli_num_rows($result) > 0 ){
            $row = mysqli_fetch_assoc($result);
            if(password_verify($password, $row['password'])){
                $_SESSION['KH'] = $row;
                header('location: index.php');
                exit();
            }
        }else{
            $errorMsg ="Sai thông tin đăng nhập"; 
            require_once('formLogin_user.php');
        }
    }else{
        require_once('formLogin_user.php');
    }
?>