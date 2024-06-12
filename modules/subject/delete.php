<?php
$id = (int) $_GET['id'];
$sql = "delete from `monhoc` where `MaMH`={$id}";
if($conn->query($sql)){
    echo "Xóa dữ liệu thành công.";
}

?>
<a href="?">Quay lại trang chủ</a>