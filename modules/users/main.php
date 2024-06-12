<?php
get_header();
?>
<?php
$sql = "SELECT * FROM `sinhvien`";
$result = $conn->query($sql);
$list_user = array();
while ($row = $result->fetch_assoc()) {
    $list_user[] = $row;
}
foreach ($list_user as $key => $item) {
    $item['url_delete'] = "?mod=subject&act=delete&id={$item['MaSV']}";
    $item['url_update'] = "?mod=subject&act=update&id={$item['MaSV']}";
    $list_user[$key] = $item;
}

?>
<style>
    .table_data thead tr td{
        font-weight: bold;
        border-bottom: 2px solid #333;
    }
    .table_data tr td{
        border-bottom: 1px solid #333;
        padding: 8px 15px;
    }
</style>
<div id="content">
    <a href="?mod=users&act=add">Thêm mới</a>
    <h1>Danh sách Môn học</h1>
    <?php
if (!empty($list_user)) {
    ?>
    <table class="table_data">
        <thead>
            <tr>
                <td>STT</td>
                <td>Mã sinh viên</td>
                <td>Họ tên</td>
                <td>Phái</td>
                <td>Nơi Sinh</td>
                <td>Mã Khoa</td>
                <td>Học bổng</td>
                <td>Thao tác</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $temp = 0;
foreach ($list_user as $item) {
    $temp++;
        ?>
            <tr>
                <td><?php echo $temp; ?></td>
                <td><?php echo $item['MaSV']; ?></td>
                <td><?php echo $item['HoSV'].' '.$item['TenSV']; ?></td>
                <td><?php echo show_gender($item['Phai']); ?></td>
                <td><?php echo $item['NoiSinh']; ?></td>
                <td><?php echo $item['MaKH']; ?></td>
                <td><?php echo currentcy_format($item['HocBong']); ?></td>
                <td><a href="<?php echo $item['url_update']; ?>">Sửa</a>|<a href="<?php echo $item['url_delete']; ?>">Xóa</a></td>
            </tr>
            <?php
}
    ?>
        </tbody>
    </table>
<?php
} else {
    ?>
<p>Không có môn học nào</p>
<?php
}
?>
</div>
<?php
get_footer();
?>