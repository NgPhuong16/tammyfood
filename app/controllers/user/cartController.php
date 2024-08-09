<?php
if(isset($_SESSION['user'])){
    if(checkUserFirstInAdd($_SESSION['user']['id_user'],$_SESSION['user']['address']) && checkUserNumberOrder($_SESSION['user']['id_user'])){
        $getVoucherById=getVoucherById(2);
        $giamgia=$getVoucherById['value'];
        $giamGiaText=$getVoucherById['nameVoucher'];
    }else{
        $giamgia=0;
        $giamGiaText='';
    }
}else{
    $giamgia=0;
    $giamGiaText='';
}
if(isset($_GET['del'])){
    $i=0;
    foreach ($_SESSION['cart'] as $key => $value) {
        if ($value['id_product'] == $_GET['del'] && $i==$_GET['id'] ) {
            unset($_SESSION['cart'][$key]);
            $_SESSION['cart'] = array_values($_SESSION['cart']);
            break;
        }
        $i++;
    }
}

$getAllShift=getAllShift3($totalMinutes);
include_once("app/views/user/cart.view.php");