<?php
get_header();
?>
<?php
$sql = "SELECT * FROM `monhoc`";
$result = $conn->query($sql);
$list_subject = array();
while ($row = $result->fetch_assoc()) {
    $list_subject[] = $row;
}
foreach ($list_subject as $key => $item) {
    $item['url_delete'] = "?mod=subject&act=delete&id={$item['MaMH']}";
    $item['url_update'] = "?mod=subject&act=update&id={$item['MaMH']}";
    $list_subject[$key] = $item;
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
    <a href="?mod=subject&act=add">Thêm mới</a>
    <h1>Danh sách Môn học</h1>
    <?php
if (!empty($list_subject)) {
    ?>
    <table class="table_data">
        <thead>
            <tr>
                <td>STT</td>
                <td>Mã môn học</td>
                <td>Tên môn học</td>
                <td>Số tiết</td>
                <td>Thao tác</td>
            </tr>
        </thead>
        <tbody>
            <?php
            $temp = 0;
foreach ($list_subject as $item) {
    $temp++;
        ?>
            <tr>
                <td><?php echo $temp; ?></td>
                <td><?php echo $item['MaMH']; ?></td>
                <td><?php echo $item['TenMH']; ?></td>
                <td><?php echo $item['SoTiet']; ?></td>
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