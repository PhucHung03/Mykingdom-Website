<?php
    require("../../conn/conn.php");
    $delet = $_GET['id'];
    $sql_str = "delete from news where id='$delet' ";
    mysqli_query($conn, $sql_str);

    header('location:../list_Blog.php');
?>