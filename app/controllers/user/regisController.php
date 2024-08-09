<?php
if(isset($_GET['type1'])){
    switch ($_GET['type1']) {
        case 'confirm':
            if(isset($_POST['confirm-regis-btn'])){
                if($_POST['confirm-regis-code']==$_SESSION['sendcode']){
                    dangKy($_SESSION['standBy']['fullName'], $_SESSION['standBy']['email'], $_SESSION['standBy']['password'], $_SESSION['standBy']['phone'], $_SESSION['standBy']['linkFaceBook'], $_SESSION['standBy']['address']);
                    unset($_SESSION['sendcode']);
                    unset($_SESSION['standBy']);
                    header('Location: index.php?type=login&regis=success');
                }
            }
            include_once("app/views/user/confirm.view.php");
            break;
        
        default:
        include_once("app/views/user/regis.view.php");
            break;
    }
}else{
    include_once("app/views/user/regis.view.php");
}