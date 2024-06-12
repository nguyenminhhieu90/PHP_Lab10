<?php
$id = (int) $_GET['id'];

?>
<?php
get_header();
?>
<?php
    if(isset($_POST['btn_update'])){
        $error = array();
        if(empty($_POST['subject_name'])){
            $error['subject_name'] = "Không được để  trống tên môn học.";
        }else{
            $subject_name = $_POST['subject_name'];
        }

        if(empty($_POST['number'])){
            $error['number'] = "Không được để trống số tiết.";
        }else{
            $number = (int)$_POST['number'];
        }

        if(empty($error)){
            $sql = "update `monhoc` set `TenMH`='{$subject_name}', `SoTiet`='{$number}' where `MaMH`=$id ";
            if($conn->query($sql)){
                echo "Cập nhật thành công.";
            }
        }
    }
    $sql = "select * from `monhoc` where `MaMH`={$id}";
    $result = $conn->query($sql);
    $item = $result->fetch_assoc();
    
?>
<div id="content">
    <style>
        #form_reg{
            width: 250px;
        }

        label{
            display: block;
            margin: 0px 0px 5px 0px;
        }
        input{
            display: block;
            margin-bottom: 10px;
        }
        input[type='text']{
            padding: 5px 10px;
            border: 1px solid #dedede;
            width: 100%;
        }
        #btn_reg{
            margin-top: 20px;
            display: block;
            padding: 9px 10px;
            text-align: center;
            background-color: #ffa84c;
            width: 100%;
            text-transform: uppercase;
        }
   
        p.error{
            font-style: italic;
            color: red;
        }
    </style>
    <h1>Thêm mới</h1>
    <form id="form_reg" action="" method="post">
        <label for="subject_name">Tên môn học</label>
        <input type="text" name="subject_name" id="subject_name" value="<?php echo $item['TenMH'];?>">
        <?php echo form_error("subject_name");?>
        <label for="number">Số tiết</label>
        <input type="text" name="number" id="number" value="<?php echo $item['SoTiet'];?>">
        <?php echo form_error("number");?>
        <input id="btn_reg" type="submit" value="Cập nhật" name="btn_update">
    </form>
</div>
<?php
get_footer();?>