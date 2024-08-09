<?php
if(isset($_GET['regis'])){
    switch ($_GET['regis']) {
        case 'success':
            echo "<script>alert('Đăng ký thành công!')</script>";
            break;
        default:
            break;
    }
}
include_once("app/views/user/login.view.php");