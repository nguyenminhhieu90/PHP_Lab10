<?php
get_header();
?>
<?php
    if(isset($_POST['btn_reg'])){
        $error = array();
        if(empty($_POST['tenmon'])){
            $error['tenmon'] = "Không được để trống tên môn học.";
        }else{
            $tenmon = $_POST['tenmon'];
        }

        if(empty($_POST['sotiet'])){
            $error['sotiet'] = "Không được để trống số tiết.";
        }else{
                $sotiet = $_POST['sotiet'];    
        }

  

        if(empty($error)){
           $sql = "INSERT INTO `monhoc` (`TenMH`, `SoTiet`) VALUES ('{$tenmon}','{$sotiet}')";
           if($conn -> query($sql)){
                echo "Thêm dữ liệu thành công.";
           }
        }
    }
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
        <label for="tenmon">Tên Môn học</label>
        <input type="text" name="tenmon" id="tenmon" value="">
        <?php echo form_error("tenmon");?>
        <label for="sotiet">Số tiết</label>
        <input type="text" name="sotiet" id="sotiet" value="">
        <?php echo form_error("sotiet");?>
    
        <input id="btn_reg" type="submit" value="Thêm mới" name="btn_reg">
    </form>
</div>
<?php
get_footer();?>