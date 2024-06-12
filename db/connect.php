<?php
    $conn = new mysqli('localhost', 'root', '', 'qlsv');
    if(!$conn){
        echo "Kết nối không thành công. Lỗi: ".$conn->connect_error;
        die();
    }
?>