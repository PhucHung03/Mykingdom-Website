<?php
    $conn = mysqli_connect("localhost","phuchung340","12345","webdochoi"); 
    if(!$conn){
        echo 'Không kết nối được cơ sở dữ liệu!';
    }
?>