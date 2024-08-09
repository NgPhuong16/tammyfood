<?php
if(!isset($_SESSION['user'])){
    header("Location: index.php?type=home");
}
if(isset($_POST['change-infor-btn'])){
    $_SESSION['user']=changeInfor($_POST['fullName'],$_POST['phone'],$_POST['address'],$_POST['linkFaceBook'],$_SESSION['user']['id_user']);
}
include_once("app/views/user/changeinfor.view.php");