<?php
    require "db/connect.php";
    require "lib/templace.php";
    require "lib/data.php";
    require "lib/validation.php";
    require "lib/gender.php";
    require "lib/number.php";
?>
<?php
if(!empty($_GET['mod'])){
    $mod = $_GET['mod'];
}else{
    $mod = 'home';
}
if(!empty($_GET['act'])){
    $act = $_GET['act'];
}else{
    $act = 'main';
}

$path = "modules/{$mod}/{$act}.php";
if(file_exists($path)){
    require $path;
}else{
    get_404();
}

?>