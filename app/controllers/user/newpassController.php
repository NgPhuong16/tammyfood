<?php
if(isset($_GET['token']) && isset($_GET['type']) && isset($_GET['email'])){
    if($_GET['type']=='newpass'){
        $checkTokens=checkTokens($_GET['email'],$_GET['token']);
        if(is_array($checkTokens)){
            include_once("app/views/user/resetpass.view.php");
        }else{
            header("Location: index.php?type=home");
        }
    }else{
    header("Location: index.php?type=home");

    }
}else{
    header("Location: index.php?type=home");
}